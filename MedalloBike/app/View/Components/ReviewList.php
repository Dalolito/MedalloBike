<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Review;
use Illuminate\View\Component;
use Illuminate\View\View;

class ReviewList extends Component
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function render(): View
    {
        $productActual = $this->product;
        $productId = $productActual->getId();
        $reviews = Review::where('product_id', $productId)->get();

        return view('components.review-list', compact('reviews'));
    }
}
