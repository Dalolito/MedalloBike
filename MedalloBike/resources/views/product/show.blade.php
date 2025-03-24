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
        <!-- Product Image and Revies -->
        <div class="col-md-6">
            <div class="product-image-container text-center">
                <img src="{{ asset('/img/bike.jpg') }}" class="card-img-top img-card">
            </div>

            <!-- Create Review -->
            <div class="p-2 border-top">
                <x-review-list :product="$viewData['product']" />
            </div>
        </div>

        

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="product-title">{{ $viewData['product']->getTitle() }}</h1>
            <p class="product-price">${{ number_format($viewData['product']->getPrice(), 2) }}</p>

            <!-- Product Description -->
            <div class="product-description mb-4">
                <h3>{{ __('app.products_user.show.description') }}</h3>
                <p>{{ $viewData['product']->getDescription() }}</p>
            </div>

            <!-- Additional Details -->
            <div class="product-details mb-4">
                <h3>{{ __('app.products_user.show.details') }}</h3>
                <ul class="list-unstyled">
                    <li><strong>{{ __('app.products_user.show.brand') }}:</strong> {{ $viewData['product']->getBrand() }}</li>
                    <li><strong>{{ __('app.products_user.show.category') }}:</strong> {{ $viewData['product']->getCategoryId() }}</li>
                    <li><strong>{{ __('app.products_user.show.stock') }}:</strong> {{ $viewData['product']->getStock() }}</li>
                    <li><strong>{{ __('app.products_user.show.state') }}:</strong> 
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
                @if($viewData['product']->getState() == 'available' && $viewData['product']->getStock() > 0)
                    <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}"> 
                        <div class="row"> 
                            @csrf 
                            <div class="col-auto"> 
                                <div class="input-group col-auto"> 
                                    <div class="input-group-text">{{ __('app.products_user.cart.quantity') }}</div> 
                                    <input type="number" min="1" max="{{ $viewData['product']->getStock() }}" class="form-control quantity-input" name="quantity" value="1"> 
                                </div> 
                            </div> 
                            <div class="col-auto"> 
                                <button class="btn bg-primary text-white" type="submit">{{ __('app.products_user.cart.add_to_cart') }}</button> 
                            </div> 
                        </div> 
                    </form> 
                @endif

                <a href="{{ route('product.list') }}" class="btn btn-secondary">
                    {{ __('app.products_user.show.back_to_list') }}
                </a>

                <!-- Create Review -->
                <div class="p-2 border-top">
                <x-review-form :product="$viewData['product']" />
                </div>

            </div>
        </div>
    </div>
</div>
@endsection