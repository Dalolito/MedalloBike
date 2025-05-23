<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($product) {
                return array_merge($product->toArray(), [
                    'links' => [
                        'view' => url('/product/show/' . $product->getId()),
                    ]
                ]);
            }),
            'additionalData' => [
                'storeName' => 'MedalloBike',
                'storeProductsLink' => 'http://127.0.0.1:8000/products',
            ],
        ];
    }
}