<!-- Made by: Camilo Monsalve Montes -->
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
    <div class="container my-5">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h1 class="fs-5 mb-0">{{ __('admin.category.show.details') }}</h1>
                <div>
                    <!-- Actions in card header -->
                    <a href="{{ route('admin.category.edit', ['id' => $viewData['category']->getId()]) }}"
                        class="btn btn-light btn-sm me-1">
                        <i class="bi bi-pencil-fill"></i> {{ __('admin.category.show.edit_category') }}
                    </a>

                    <!-- Enable/Disable button -->
                    @if ($viewData['category']->getState() == 'available')
                        <a class="btn btn-warning btn-sm me-1"
                            href="{{ route('admin.category.disable', ['id' => $viewData['category']->getId()]) }}">
                            <i class="bi bi-toggle-off"></i> {{ __('admin.category.list.disable') }}
                        </a>
                    @else
                        <a class="btn btn-success btn-sm me-1"
                            href="{{ route('admin.category.enable', ['id' => $viewData['category']->getId()]) }}">
                            <i class="bi bi-toggle-on"></i> {{ __('admin.category.list.enable') }}
                        </a>
                    @endif

                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> {{ __('admin.category.show.back_to_list') }}
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- Category Details -->
                    <div class="col-md-12 mb-4">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $viewData['category']->getId() }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin.category.show.name') }}</th>
                                    <td>{{ $viewData['category']->getName() }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin.category.show.state') }}</th>
                                    <td>
                                        @if ($viewData['category']->getState() == 'available')
                                            <span
                                                class="badge bg-success">{{ __('admin.category.edit.form.state_available') }}</span>
                                        @else
                                            <span
                                                class="badge bg-secondary">{{ __('admin.category.edit.form.state_disabled') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin.category.show.created_at') }}</th>
                                    <td>{{ $viewData['category']->getCreatedAt() }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin.category.show.updated_at') }}</th>
                                    <td>{{ $viewData['category']->getUpdatedAt() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Products in this Category -->
                    <div class="col-md-12">
                        <h5>{{ __('admin.category.show.products') }}</h5>

                        @if (count($viewData['products']) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>{{ __('admin.products.list.image') }}</th>
                                            <th>{{ __('admin.products.list.table_title') }}</th>
                                            <th>{{ __('admin.products.list.price') }}</th>
                                            <th>{{ __('admin.products.list.brand') }}</th>
                                            <th>{{ __('admin.products.list.stock') }}</th>
                                            <th>{{ __('admin.products.list.state') }}</th>
                                            <th class="text-end">{{ __('admin.products.list.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viewData['products'] as $product)
                                            <tr>
                                                <!-- Product Image -->
                                                <td>
                                                    <img src="{{ asset('/img/bike.jpg') }}" class="img-thumbnail"
                                                        style="max-width: 80px;" alt="{{ $product->getTitle() }}">
                                                </td>

                                                <!-- Product Info -->
                                                <td>{{ $product->getTitle() }}</td>
                                                <td>${{ number_format($product->getPrice(), 2) }}</td>
                                                <td>{{ $product->getBrand() }}</td>

                                                <!-- Stock Status -->
                                                <td>
                                                    @if ($product->getStock() > 0)
                                                        <span class="badge bg-success">{{ $product->getStock() }}</span>
                                                    @else
                                                        <span class="badge bg-danger">0</span>
                                                    @endif
                                                </td>

                                                <!-- State -->
                                                <td>
                                                    @if ($product->getState() == 'available')
                                                        <span
                                                            class="badge bg-success">{{ __('admin.products.edit.form.state_available') }}</span>
                                                    @else
                                                        <span
                                                            class="badge bg-secondary">{{ __('admin.products.edit.form.state_disabled') }}</span>
                                                    @endif
                                                </td>

                                                <!-- Actions -->
                                                <td class="text-end">
                                                    <a href="{{ route('admin.product.show', ['id' => $product->getId()]) }}"
                                                        class="btn btn-sm btn-info"
                                                        title="{{ __('admin.products.list.show_product') }}">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
@endsection
