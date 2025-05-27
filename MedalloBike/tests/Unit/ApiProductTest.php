<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\ProductApiController;
use App\Models\Product;
use Mockery;
use PHPUnit\Framework\TestCase;

class ProductApiTest extends TestCase
{
    public function test_index_returns_200_json_response(): void
    {
        $mockProduct1 = Mockery::mock(Product::class);
        $mockProduct1->shouldReceive('getId')->andReturn(1);
        $mockProduct1->shouldReceive('getTitle')->andReturn('Bicicleta Mountain');
        $mockProduct1->shouldReceive('getPrice')->andReturn(150000);

        $mockCollection = collect([$mockProduct1]);

        Product::shouldReceive('where')
            ->with('state', 'available')
            ->andReturnSelf();

        Product::shouldReceive('where')
            ->with('stock', '>', 0)
            ->andReturnSelf();

        Product::shouldReceive('get')
            ->andReturn($mockCollection);

        $controller = new ProductApiController;
        $this->assertInstanceOf(ProductApiController::class, $controller);
        $this->assertTrue(method_exists($controller, 'index'));

        $response = $controller->index();

        $this->assertInstanceOf(\Illuminate\Http\JsonResponse::class, $response);

        $this->assertEquals(200, $response->getStatusCode());

        $jsonContent = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('data', $jsonContent);
        $this->assertArrayHasKey('additionalData', $jsonContent);

        $this->assertCount(1, $jsonContent['data']);

        $this->assertEquals(1, $jsonContent['data'][0]['id']);
        $this->assertEquals('Bicicleta Mountain', $jsonContent['data'][0]['title']);
        $this->assertEquals(150000, $jsonContent['data'][0]['price']);
        $this->assertArrayHasKey('links', $jsonContent['data'][0]);
        $this->assertContains('/product/show/1', $jsonContent['data'][0]['links']['view']);

        $this->assertEquals('MedalloBike', $jsonContent['additionalData']['storeName']);
        $this->assertArrayHasKey('storeProductsLink', $jsonContent['additionalData']);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
