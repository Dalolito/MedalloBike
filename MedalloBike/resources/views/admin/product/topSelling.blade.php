<!-- Made by: David Lopera Londoño -->
@extends('layouts.admin')

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

        <!-- Products Table -->
        <div class="card">
            <div class="card-body">
                @if (isset($viewData['products']) && count($viewData['products']) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ __('admin.products.list.image') }}</th>
                                    <th>{{ __('admin.products.list.table_title') }}</th>
                                    <th>{{ __('admin.products.list.price') }}</th>
                                    <th>{{ __('admin.products.list.category') }}</th>
                                    <th>{{ __('admin.products.list.brand') }}</th>
                                    <th>{{ __('admin.products.top_selling.units_sold') }}</th>
                                    <th class="text-end">{{ __('admin.products.list.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewData['products'] as $product)
                                    <tr>
                                        <!-- Product Image -->
                                        <td>
                                            <img src="{{ $viewData['product']->getImageUrl() }}" class="img-thumbnail" style="max-width: 80px;" alt="{{ $product->getTitle() }}">
                                        </td>

                                        <!-- Product Info -->
                                        <td>{{ $product->getTitle() }}</td>
                                        <td>${{ number_format($product->getPrice(), 2) }}</td>
                                        <td>{{ $product->getCategoryId() }}</td>
                                        <td>{{ $product->getBrand() }}</td>

                                        <!-- Units Sold -->
                                        <td>
                                            <span class="badge bg-info">{{ $product->total_sold }}</span>
                                        </td>

                                        <!-- Actions -->
                                        <td class="text-end">
                                            <a href="{{ route('admin.product.show', ['id' => $product->getId()]) }}"
                                                class="btn btn-sm btn-info me-1"
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
                        {{ __('admin.products.top_selling.no_data') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
