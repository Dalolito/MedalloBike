@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <div class="container my-4">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
                <h1 class="fs-5 mb-0">
                    <i class="bi bi-bicycle me-2"></i>
                    {{ $viewData['route']->getName() }}
                </h1>
                <div>
                    <a href="{{ route('route.index') }}" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-arrow-left"></i> {{ __('app.routes_user.show.back_to_list') }}
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="row g-4">
                    <!-- Route Map Image -->
                    <div class="col-lg-6">
                        <div class="route-image-container">
                            <img src="{{ asset('/img/image.png') }}" 
                                class="img-fluid w-100" 
                                alt="{{ $viewData['route']->getName() }}"
                                style="height: 400px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 w-100 p-3 text-white" 
                                style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                <h5 class="mb-0">{{ $viewData['route']->getZone() }}</h5>
                                <small>
                                    <i class="bi bi-geo-alt-fill me-1"></i>
                                    {{ __('app.routes_user.show.zone') }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Route Details -->
                    <div class="col-lg-6">
                        <div class="route-details">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">
                                        <i class="bi bi-info-circle me-2"></i>
                                        {{ __('app.routes_user.show.details') }}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <h6 class="text-muted mb-2">{{ __('app.routes_user.show.description') }}</h6>
                                        <p class="mb-0">{{ $viewData['route']->getDescription() }}</p>
                                    </div>

                                    <div class="row g-3">
                                        <!-- Difficulty -->
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded-3">
                                                <h6 class="text-muted mb-2">
                                                    <i class="bi bi-bar-chart-fill text-primary me-2"></i>
                                                    {{ __('app.routes_user.show.difficulty') }}
                                                </h6>
                                                <div class="text-warning">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $viewData['route']->getDifficulty())
                                                            <i class="bi bi-star-fill"></i>
                                                        @else
                                                            <i class="bi bi-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Creation Date -->
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded-3">
                                                <h6 class="text-muted mb-2">
                                                    <i class="bi bi-calendar-event text-success me-2"></i>
                                                    {{ __('app.routes_user.show.created_at') }}
                                                </h6>
                                                <p class="mb-0">
                                                    {{ date(__('app.routes_user.show.date_format'), strtotime($viewData['route']->getCreatedAt())) }}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Coordinates Section -->
                                        <div class="col-12">
                                            <div class="p-3 bg-light rounded-3">
                                                <h6 class="text-muted mb-3">
                                                    <i class="bi bi-geo-alt text-danger me-2"></i>
                                                    {{ __('app.routes_user.show.coordinates') }}
                                                </h6>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-center">
                                                            <div class="route-coordinate-icon start me-2">
                                                                <i class="bi bi-cursor-fill"></i>
                                                            </div>
                                                            <div>
                                                                <small class="text-muted d-block">{{ __('app.routes_user.show.start') }}</small>
                                                                <strong>{{ $viewData['route']->getCoordinateStart() }}</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="d-flex align-items-center">
                                                            <div class="route-coordinate-icon end me-2">
                                                                <i class="bi bi-flag-fill"></i>
                                                            </div>
                                                            <div>
                                                                <small class="text-muted d-block">{{ __('app.routes_user.show.end') }}</small>
                                                                <strong>{{ $viewData['route']->getCoordinateEnd() }}</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">
                                    <i class="bi bi-star me-2"></i>
                                    {{ __('app.review.list.title') }}
                                </h5>
                            </div>
                            <div class="card-body">
                                <!-- Review Form -->
                                @auth
                                    <div class="mb-4">
                                        @include('components.review.form', [
                                            'route' => $viewData['route'],
                                        ])
                                    </div>
                                    <hr>
                                @else
                                    <div class="alert alert-info mb-4">
                                        <i class="bi bi-info-circle me-2"></i>
                                        {{ __('app.review.form.login_to_review') }}
                                        <a href="{{ route('login') }}" class="alert-link">{{ __('app.login') }}</a>
                                    </div>
                                @endauth

                                <!-- Review List -->
                                @include('components.review.list', ['reviews' => $viewData['reviews']])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 