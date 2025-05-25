<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_product_getters_and_setters(): void
    {
        $product = new Product;

        $product->setTitle('Bicicleta Mountain Pro');
        $product->setDescription('Bicicleta de montaña profesional con suspensión completa');
        $product->setBrand('Trek');
        $product->setPrice(250000);
        $product->setStock(15);
        $product->setState('available');

        $this->assertEquals('Bicicleta Mountain Pro', $product->getTitle());
        $this->assertEquals('Bicicleta de montaña profesional con suspensión completa', $product->getDescription());
        $this->assertEquals('Trek', $product->getBrand());
        $this->assertEquals(250000, $product->getPrice());
        $this->assertEquals(15, $product->getStock());
        $this->assertEquals('available', $product->getState());
    }

    public function test_product_default_state(): void
    {
        $product = new Product;

        $product->setState('available');

        $this->assertEquals('available', $product->getState());
    }
}
