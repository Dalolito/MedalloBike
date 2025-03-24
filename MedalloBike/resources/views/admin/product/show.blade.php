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

    <div class="card">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h1 class="fs-5 mb-0">{{ $viewData['product']->getTitle() }}</h1>
            <div>
                <!-- Actions in card header -->
                <a href="{{ route('admin.product.edit', ['id' => $viewData['product']->getId()]) }}" class="btn btn-light btn-sm me-1">
                    <i class="bi bi-pencil-fill"></i> {{ __('admin.products.list.edit') }}
                </a>
                
                @if($viewData['product']->getState() == 'available')
                    <a class="btn btn-warning btn-sm me-1" href="{{ route('admin.product.disable', ['id' => $viewData['product']->getId()]) }}">
                        <i class="bi bi-toggle-off"></i> {{ __('admin.products.list.disable') }}
                    </a>
                @else
                    <a class="btn btn-success btn-sm me-1" href="{{ route('admin.product.enable', ['id' => $viewData['product']->getId()]) }}">
                        <i class="bi bi-toggle-on"></i> {{ __('admin.products.list.enable') }}
                    </a>
                @endif
                
                <!-- No delete button as products are only disabled, not deleted -->
                
                <a href="{{ route('admin.product.list') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> {{ __('admin.products.show.back_to_list') }}
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-4">
                    <div class="product-image-container text-center">
                        <img src="{{ asset('/img/bike.jpg') }}" class="img-fluid rounded">
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-md-8">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5>{{ __('admin.products.show.basic_details') }}</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>{{ __('admin.products.show.price') }}</th>
                                        <td>${{ number_format($viewData['product']->getPrice(), 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.products.show.brand') }}</th>
                                        <td>{{ $viewData['product']->getBrand() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.products.show.category') }}</th>
                                        <td>{{ $viewData['product']->getCategory()->getName() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.products.show.stock') }}</th>
                                        <td>
                                            @if($viewData['product']->getStock() > 0)
                                                <span class="badge bg-success">{{ $viewData['product']->getStock() }}</span>
                                            @else
                                                <span class="badge bg-danger">0</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.products.show.state') }}</th>
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
                            <h5>{{ __('admin.products.show.system_details') }}</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $viewData['product']->getId() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.products.show.created_at') }}</th>
                                        <td>{{ $viewData['product']->getCreatedAt() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('admin.products.show.updated_at') }}</th>
                                        <td>{{ $viewData['product']->getUpdatedAt() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Product Description -->
                    <div class="product-description mb-4">
                        <h5>{{ __('admin.products.show.description') }}</h5>
                        <div class="p-3 bg-light rounded">
                            {{ $viewData['product']->getDescription() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection