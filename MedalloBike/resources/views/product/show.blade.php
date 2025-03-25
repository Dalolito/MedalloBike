<!-- Made by: David Lopera Londoño -->
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

    <div class="card">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h1 class="fs-5 mb-0">{{ $viewData['product']->getTitle() }}</h1>
            <div>
                <!-- Action Button -->
                <a href="{{ route('product.list') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> {{ __('app.products_user.show.back_to_list') }}
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <!-- Product Image and Reviews -->
                <div class="col-md-4">
                    <div class="product-image-container text-center">
                        <img src="{{ asset('/img/bike.jpg') }}" class="img-fluid rounded">
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-md-8">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5>{{ __('app.products_user.show.details') }}</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>{{ __('app.products_user.show.price') }}</th>
                                        <td>${{ number_format($viewData['product']->getPrice(), 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.products_user.show.brand') }}</th>
                                        <td>{{ $viewData['product']->getBrand() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.products_user.show.category') }}</th>
                                        <<td>{{ $viewData['product']->getCategory()->getName() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.products_user.show.stock') }}</th>
                                        <td>
                                            @if($viewData['product']->getStock() > 0)
                                                <span class="badge bg-success">{{ $viewData['product']->getStock() }}</span>
                                            @else
                                                <span class="badge bg-danger">0</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.products_user.show.state') }}</th>
                                        <td>
                                            @if($viewData['product']->getState() == 'available')
                                                <span class="badge bg-success">{{ __('admin.products.edit.form.state_available') }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ __('admin.products.edit.form.state_disabled') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <!-- Add to Cart Section -->
                            @if($viewData['product']->getState() == 'available' && $viewData['product']->getStock() > 0)
                                <h5>{{ __('app.products_user.cart.add_to_cart') }}</h5>
                                <div class="p-3 bg-light rounded mb-3">
                                    <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}"> 
                                        @csrf 
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">{{ __('app.products_user.cart.quantity') }}</label>
                                            <input type="number" min="1" max="{{ $viewData['product']->getStock() }}" class="form-control" id="quantity" name="quantity" value="1"> 
                                        </div>
                                        <button class="btn bg-primary text-white w-100" type="submit">
                                            <i class="bi bi-cart-plus"></i> {{ __('app.products_user.cart.add_to_cart') }}
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Product Description -->
                    <div class="product-description mb-4">
                        <h5>{{ __('app.products_user.show.description') }}</h5>
                        <div class="p-3 bg-light rounded">
                            {{ $viewData['product']->getDescription() }}
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reviews Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">{{ __('app.products_user.show.create_review') }}</h5>
                        </div>
                        <div class="card-body">
                            <!-- Review Form -->
                            <div class="mb-4">
                                <x-review-form :product="$viewData['product']" />
                            </div>
                            
                            <!-- Review List -->
                            <div class="review-list">
                                <x-review-list :product="$viewData['product']" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection