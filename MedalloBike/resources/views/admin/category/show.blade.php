@extends('layouts.admin')

@section('title', $viewData["title"])

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">{{ $viewData['category']->getName() }}</h3>
                        <div>
                            <a href="{{ route('admin.category.edit', ['id' => $viewData['category']->getId()]) }}" class="btn btn-warning">
                                {{ __('admin.category.show.edit_category') }}
                            </a>
                            <a href="{{ route('admin.category.list') }}" class="btn btn-primary">
                                {{ __('admin.category.show.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Category Details -->
                    <div class="mb-4">
                        <h4>{{ __('admin.category.show.details') }}</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>ID:</strong> {{ $viewData['category']->getId() }}</li>
                            <li class="list-group-item"><strong>{{ __('admin.category.show.created_at') }}:</strong> {{ $viewData['category']->getCreatedAt() }}</li>
                            <li class="list-group-item"><strong>{{ __('admin.category.show.updated_at') }}:</strong> {{ $viewData['category']->getUpdatedAt() }}</li>
                        </ul>
                    </div>

                    <!-- Products in this Category -->
                    <div class="mt-5">
                        <h4>{{ __('admin.category.show.products') }}</h4>
                        
                        @if(count($viewData['products']) > 0)
                            <div class="row">
                                @foreach($viewData['products'] as $product)
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <div class="card">
                                        <img src="{{ asset('/img/bike.jpg') }}" class="card-img-top img-card">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $product->getTitle() }}</h5>
                                            <p class="card-text">{{ __('admin.products.list.price') }}: ${{ number_format($product->getPrice(), 2) }}</p>
                                            <p class="card-text">{{ __('admin.products.create.form.brand') }}: {{ $product->getBrand() }}</p>
                                            <a href="{{ route('admin.product.show', ['id' => $product->getId()]) }}" class="btn btn-primary">
                                                {{ __('admin.products.list.show_product') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                {{ __('admin.category.show.no_products') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection