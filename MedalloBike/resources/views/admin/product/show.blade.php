@extends('layouts.admin')

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
                    <li><strong>{{ $viewData['labels']['state'] }}:</strong> 
                        @if($viewData['product']->getState() == 'available')
                            <span class="badge bg-success">{{ $viewData['labels']['state_available'] }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $viewData['labels']['state_disabled'] }}</span>
                        @endif
                    </li>
                    
                    <!-- Additional fields specific to admin view -->
                    <li><strong>{{ $viewData['labels']['created_at'] }}:</strong> {{ $viewData['product']->getCreatedAt() }}</li>
                    <li><strong>{{ $viewData['labels']['updated_at'] }}:</strong> {{ $viewData['product']->getUpdatedAt() }}</li>
                </ul>
            </div>

            <!-- Action Buttons - Admin-specific actions -->
            <div class="mt-4">
                <a href="{{ route('admin.product.edit', ['id' => $viewData['product']->getId()]) }}" class="btn btn-primary me-2">
                    {{ $viewData['labels']['edit'] }}
                </a>
                <a href="{{ route('admin.product.list') }}" class="btn btn-secondary">
                    {{ $viewData['labels']['back_to_list'] }}
                </a>
                
                @if($viewData['product']->getState() == 'available')
                    <a class="btn btn-danger ms-2" href="{{ route('admin.product.disable', ['id' => $viewData['product']->getId()]) }}">
                        {{ $viewData['labels']['disable'] }}
                    </a>
                @else
                    <a class="btn btn-success ms-2" href="{{ route('admin.product.enable', ['id' => $viewData['product']->getId()]) }}">
                        {{ $viewData['labels']['enable'] }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection