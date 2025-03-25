<?php

namespace App\View\Components;

use App\Models\Review;
use Illuminate\View\Component;
use Illuminate\View\View;

class ReviewList extends Component
{
    public string $type;

    public mixed $product;

    public mixed $route;

    public function __construct(string $type = 'route', $product = null, $route = null)
    {
        $this->type = $type;
        $this->product = $product;
        $this->route = $route;
    }

    public function render(): View
    {

        if ($this->type === 'route' and $this->product === null) {
            $reviews = Review::where('route_id', $this->route->getId())->get();
        } else {

            $reviews = Review::where('product_id', $this->product->getId())->get();
        }

        return view('components.reviewList', compact('reviews'));
    }
}
