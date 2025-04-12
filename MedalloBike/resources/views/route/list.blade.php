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

        <!-- Routes Grid -->
        <div class="row">
            @if (isset($viewData['routes']) && count($viewData['routes']) > 0)
                @foreach ($viewData['routes'] as $route)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <!-- Route Image -->
                            <img src="{{ asset('img/routes/' . $route->getImageMap()) }}" class="card-img-top img-fluid"
                                style="height: 220px; object-fit: cover;" alt="{{ $route->getName() }}">

                            <!-- Route Info -->
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $route->getName() }}</h5>
                                <p class="card-text fs-5 text-primary fw-bold">
                                    {{ __('app.routes_user.show.description') }}: {{ $route->getDescription() }}
                                </p>
                                <p class="card-text text-muted">
                                    <small>
                                        {{ __('app.routes_user.list.difficulty') }}: {{ $route->getDifficulty() }} <br>
                                        {{ __('app.routes_user.show.zone') }}: {{ $route->getZone() }} <br>
                                        {{ __('app.routes_user.show.start') }}: {{ $route->getCoordinateStart() }} <br>
                                        {{ __('app.routes_user.show.end') }}: {{ $route->getCoordinateEnd() }}
                                    </small>
                                </p>
                            </div>

                            <!-- Route Actions -->
                            <div class="card-footer bg-white text-center py-3">
                                <a href="{{ route('routes.show', $route->getId()) }}"
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
@endsection
