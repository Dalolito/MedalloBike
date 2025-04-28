<!-- Made by: David Lopera Londoño -->
@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <div class="container">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1>{{ $viewData['title'] }}</h1>
                <h5 class="text-muted">{{ $viewData['subtitle'] }}</h5>
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
                        <form method="GET" action="{{ route('product.index') }}" class="d-flex">
                            <select name="category" class="form-select me-2">
                                <option value="">{{ __('app.products_user.list.all_categories') }}</option>
                                @foreach ($viewData['categories'] as $category)
                                    <option value="{{ $category->getId() }}"
                                        {{ isset($viewData['selectedCategory']) && $viewData['selectedCategory'] == $category->getId() ? 'selected' : '' }}>
                                        {{ $category->getName() }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">
                                {{ __('app.products_user.list.filter') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row">
            @if (isset($viewData['products']) && count($viewData['products']) > 0)
                @foreach ($viewData['products'] as $product)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <!-- Product Image -->
                            <img src="{{ asset('/img/bike.jpg') }}" class="card-img-top img-fluid"
                                style="height: 180px; object-fit: cover;" alt="{{ $product->getTitle() }}">

                            <!-- Product Info -->
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $product->getTitle() }}</h5>
                                <p class="card-text fs-5 text-primary fw-bold">
                                    ${{ number_format($product->getPrice(), 2) }}
                                </p>
                                <p class="card-text text-muted">
                                    <small>
                                        {{ __('app.products_user.list.brand') }}: {{ $product->getBrand() }}
                                    </small>
                                </p>

                                <!-- Stock Status -->
                                @if ($product->getStock() > 0)
                                    <div class="mt-2">
                                        <span class="badge rounded-pill bg-success text-white px-3 py-2">
                                            <i class="bi bi-check-circle me-1"></i>
                                            {{ __('app.products_user.list.in_stock') }} ({{ $product->getStock() }})
                                        </span>
                                    </div>
                                @else
                                    <div class="mt-2">
                                        <span class="badge rounded-pill bg-danger text-white px-3 py-2">
                                            <i class="bi bi-x-circle me-1"></i>
                                            {{ __('app.products_user.list.out_of_stock') }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Product Actions -->
                            <div class="card-footer bg-white text-center py-3">
                                <a href="{{ route('product.show', ['id' => $product->getId()]) }}"
                                    class="btn btn-outline-primary btn-sm w-100">
                                    <i class="bi bi-info-circle me-1"></i>
                                    {{ __('app.products_user.list.show_product') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        {{ __('app.products_user.list.no_products') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
