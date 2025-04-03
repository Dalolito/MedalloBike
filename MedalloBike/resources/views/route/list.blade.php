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
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <!-- Route Image -->
                            <img src="{{ asset($route->getImageMap()) }}" class="card-img-top img-fluid"
                                style="height: 180px; object-fit: cover;" alt="{{ $route->getName() }}">

                            <!-- Route Info -->
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $route->getName() }}</h5>
                                <p class="card-text">{{ Str::limit($route->getDescription(), 80) }}</p>
                                <p class="text-muted mb-0"><small>{{ __('Dificultad') }}:
                                        {{ $route->getDifficulty() }}</small></p>
                                <p class="text-muted mb-0"><small>{{ __('Tipo') }}: {{ $route->getType() }}</small></p>
                                <p class="text-muted"><small>{{ __('Zona') }}: {{ $route->getZone() }}</small></p>
                            </div>

                            <!-- Action -->
                            <div class="card-footer bg-white text-center py-3">
                                <a href="{{ route('route.show', ['id' => $route->getId()]) }}"
                                    class="btn btn-outline-primary btn-sm w-100">
                                    <i class="bi bi-info-circle me-1"></i>
                                    {{ __('Ver Detalles') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        {{ __('No hay rutas disponibles por el momento.') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
