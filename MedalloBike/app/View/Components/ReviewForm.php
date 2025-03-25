<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReviewForm extends Component
{
    public string $type;

    public mixed $product;

    public mixed $route;

    public function __construct(string $type = 'product', $product = null, mixed $route = null)
    {
        $this->product = $product;
        $this->route = $route;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.reviewForm');
    }
}
