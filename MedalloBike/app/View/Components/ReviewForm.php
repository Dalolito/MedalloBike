<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class ReviewForm extends Component
{
    public Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('components.review-form');

    }
}
