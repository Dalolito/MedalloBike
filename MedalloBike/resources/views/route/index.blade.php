<!-- Made by: Juan Camilo Villa Correa -->
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

        <!-- Routes Grid -->
        <div class="row">
            @if (isset($viewData['routes']) && count($viewData['routes']) > 0)
                @foreach ($viewData['routes'] as $route)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 hover-shadow">
                            <!-- Route Image -->
                            <img src="{{ asset('/img/image.png') }}" class="card-img-top img-fluid"
                                style="height: 220px; object-fit: cover;" alt="{{ $route->getName() }}">

                            <!-- Route Info -->
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-3">{{ $route->getName() }}</h5>

                                <!-- Description -->
                                <div class="mb-3">
                                    <p class="card-text text-muted mb-2">
                                        <i class="bi bi-info-circle me-2"></i>
                                        {{ Str::limit($route->getDescription(), 100) }}
                                    </p>
                                </div>

                                <!-- Route Details Grid -->
                                <div class="row g-2 mb-3">
                                    <!-- Difficulty -->
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-bar-chart-fill text-primary me-2"></i>
                                            <div>
                                                <small
                                                    class="text-muted d-block">{{ __('app.routes_user.list.difficulty') }}</small>
                                                <div class="text-warning">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $route->getDifficulty())
                                                            <i class="bi bi-star-fill"></i>
                                                        @else
                                                            <i class="bi bi-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Zone -->
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                                            <div>
                                                <small
                                                    class="text-muted d-block">{{ __('app.routes_user.list.zone') }}</small>
                                                <span class="fw-medium">{{ $route->getZone() }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Start Coordinate -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-cursor-fill text-success me-2"></i>
                                            <div>
                                                <small
                                                    class="text-muted d-block">{{ __('app.routes_user.list.coordinateStar') }}</small>
                                                <span class="fw-medium">{{ $route->getCoordinateStart() }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- End Coordinate -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-flag-fill text-danger me-2"></i>
                                            <div>
                                                <small
                                                    class="text-muted d-block">{{ __('app.routes_user.list.coordinateEnd') }}</small>
                                                <span class="fw-medium">{{ $route->getCoordinateEnd() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Route Actions -->
                            <div class="card-footer bg-white text-center py-3">
                                <a href="{{ route('route.show', ['id' => $route->getId()]) }}"
                                    class="btn btn-outline-primary btn-sm w-100">
                                    <i class="bi bi-info-circle me-1"></i>
                                    {{ __('app.routes_user.list.show_route') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        {{ __('app.routes_user.list.no_routes') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .fw-medium {
            font-weight: 500;
        }
    </style>
@endsection
