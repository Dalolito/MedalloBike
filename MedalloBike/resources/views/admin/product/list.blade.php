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
        <div>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                {{ __('admin.create_product') }}
            </a>
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
                            <p class="card-text">{{ __('admin.products.list.price') }}: ${{ number_format($product->getPrice(), 2) }}</p>
                            <p class="card-text">{{ __('admin.products.list.category') }}: {{ $product->getCategoryId() }}</p>
                            <p class="card-text">{{ __('admin.products.create.form.brand') }}: {{ $product->getBrand() }}</p>
                            
                            <!-- Stock Status -->
                            @if($product->getStock() > 0)
                                <p class="badge bg-success">{{ __('admin.products.list.in_stock') }} ({{ $product->getStock() }})</p>
                            @else
                                <p class="badge bg-danger">{{ __('admin.products.list.out_of_stock') }}</p>
                            @endif

                            @if($product->getState() == 'disabled')
                                <p class="badge bg-secondary">{{ __('admin.products.edit.form.state_disabled') }}</p>
                            @endif
                        </div>
                        
                        <!-- Product Actions -->
                        <div class="card-footer bg-white text-center">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.product.show', ['id' => $product->getId()]) }}" class="btn btn-primary btn-sm">
                                    {{ __('admin.products.list.show_product') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('admin.products.list.no_products') }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection