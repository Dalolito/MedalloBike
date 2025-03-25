<!-- Made by: Camilo Monsalve Montes -->
@extends('layouts.admin')

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

        <!-- Dashboard Cards -->
        <div class="row">
            <!-- Products Card -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-bicycle text-primary me-2"></i>
                            {{ __('admin.dashboard.products.title') }}
                        </h5>
                        <p class="card-text">{{ __('admin.dashboard.products.description') }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="{{ route('admin.product.list') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-list"></i> {{ __('admin.dashboard.products.view') }}
                        </a>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success">
                            <i class="bi bi-plus-circle"></i> {{ __('admin.dashboard.products.create') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Categories Card -->
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-tags text-primary me-2"></i>
                            {{ __('admin.dashboard.categories.title') }}
                        </h5>
                        <p class="card-text">{{ __('admin.dashboard.categories.description') }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="{{ route('admin.category.list') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-list"></i> {{ __('admin.dashboard.categories.view') }}
                        </a>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success">
                            <i class="bi bi-plus-circle"></i> {{ __('admin.dashboard.categories.create') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection