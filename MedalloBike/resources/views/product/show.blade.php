@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
<div class="container my-5">
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <div class="product-image-container text-center">
                <img src="{{ asset('/img/bike.jpg') }}" class="card-img-top img-card">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="product-title">{{ $viewData['product']->getTitle() }}</h1>
            <p class="product-price">${{ number_format($viewData['product']->getPrice(), 2) }}</p>

            <!-- Product Description -->
            <div class="product-description mb-4">
                <h3>{{ __('user.products.show.description') }}</h3>
                <p>{{ $viewData['product']->getDescription() }}</p>
            </div>

            <!-- Additional Details -->
            <div class="product-details mb-4">
                <h3>{{ __('user.products.show.details') }}</h3>
                <ul class="list-unstyled">
                    <li><strong>{{ __('user.products.show.brand') }}:</strong> {{ $viewData['product']->getBrand() }}</li>
                    <li><strong>{{ __('user.products.show.category') }}:</strong> {{ $viewData['product']->getCategoryId() }}</li>
                    <li><strong>{{ __('user.products.show.stock') }}:</strong> {{ $viewData['product']->getStock() }}</li>
                    <li><strong>{{ __('user.products.show.state') }}:</strong> 
                        @if($viewData['product']->getState() == 'available')
                            <span class="badge bg-success">{{ __('admin.products.edit.form.state_available') }}</span>
                        @else
                            <span class="badge bg-secondary">{{ __('admin.products.edit.form.state_disabled') }}</span>
                        @endif
                    </li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="mt-4">
                <a href="{{ route('product.list') }}" class="btn btn-secondary">
                    {{ __('user.products.show.back_to_list') }}
                </a>
                
                @if($viewData['product']->getState() == 'available' && $viewData['product']->getStock() > 0)
                    <button class="btn btn-primary ms-2">
                        {{ __('user.products.show.add_to_cart') }}
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection