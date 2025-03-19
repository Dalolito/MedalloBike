@extends('layouts.admin')

@section('title', $viewData["title"])

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <div class="product-image-container text-center">
                <<img src="{{ asset('/img/bike.jpg') }}" class="card-img-top img-card">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="product-title">{{ $viewData['product']->getTitle() }}</h1>
            <p class="product-price">${{ number_format($viewData['product']->getPrice(), 2) }}</p>

            <!-- Product Description -->
            <div class="product-description mb-4">
                <h3>{{ $viewData['labels']['description'] }}</h3>
                <p>{{ $viewData['product']->getDescription() }}</p>
            </div>

            <!-- Additional Details -->
            <div class="product-details mb-4">
                <h3>{{ $viewData['labels']['details'] }}</h3>
                <ul class="list-unstyled">
                    <li><strong>{{ $viewData['labels']['brand'] }}:</strong> {{ $viewData['product']->getBrand() }}</li>
                    <li><strong>{{ $viewData['labels']['category'] }}:</strong> {{ $viewData['product']->getCategoryId() }}</li>
                    <li><strong>{{ $viewData['labels']['stock'] }}:</strong> {{ $viewData['product']->getStock() }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection