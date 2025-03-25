<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FeedbackForm extends Component
{
    public $entity;

    public string $type;

    public function __construct($entity, string $type)
    {
        $this->target = $entity; // Product or Route
    }

    public function render()
    {
        return view('components.feedback-form');
    }
}
