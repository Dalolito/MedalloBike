@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>{{ $viewData["title"] }}</h1>
            <h5 class="text-muted">{{ $viewData["subtitle"] }}</h5>
        </div>
    </div>

    <!-- Category Filter -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('app.products_user.list.filter_by_category') }}</h5>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('product.list') }}" class="d-flex">
                        <select name="category" class="form-select me-2">
                            <option value="">{{ __('app.products_user.list.all_categories') }}</option>
                            @foreach($viewData['categories'] as $category)
                                <option value="{{ $category->getId() }}" 
                                    {{ isset($viewData['selectedCategory']) && $viewData['selectedCategory'] == $category->getId() ? 'selected' : '' }}>
                                    {{ $category->getName() }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">{{ __('app.products_user.list.filter') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row">
        @if(isset($viewData['products']) && count($viewData['products']) > 0)
            @foreach($viewData['products'] as $product)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100">
                        <!-- Product Image -->
                        <img src="{{ asset('/img/bike.jpg') }}"
                             class="card-img-top img-card" alt="{{ $product->getTitle() }}">
                        
                        <!-- Product Info -->
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->getTitle() }}</h5>
                            <p class="card-text">{{ __('app.products_user.list.price') }}: ${{ number_format($product->getPrice(), 2) }}</p>
                            <p class="card-text">{{ __('app.products_user.list.brand') }}: {{ $product->getBrand() }}</p>
                            
                            <!-- Stock Status -->
                            @if($product->getStock() > 0)
                                <p class="badge bg-success">{{ __('app.products_user.list.in_stock') }} ({{ $product->getStock() }})</p>
                            @else
                                <p class="badge bg-danger">{{ __('app.products_user.list.out_of_stock') }}</p>
                            @endif
                        </div>
                        
                        <!-- Product Actions -->
                        <div class="card-footer bg-white text-center">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('product.show', ['id' => $product->getId()]) }}" class="btn btn-primary btn-sm">
                                    {{ __('app.products_user.list.show_product') }}
                                </a>
                            </div>
                        </div>
                        
                        <!-- Create Review -->
                        <div class="p-2 border-top">
                            <x-review-form :product="$product" />
                        </div>

                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('app.products_user.list.no_products') }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection