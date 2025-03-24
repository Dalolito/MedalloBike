@extends('layouts.app')

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

    <!-- Routes Grid -->
    <div class="row">
        @if(isset($viewData['routes']) && count($viewData['routes']) > 0)
            @foreach($viewData['routes'] as $route)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100">
                        <!-- Route Image -->
                        <img src="{{ asset('/img/bike.jpg') }}"
                             class="card-img-top img-card" alt="{{ $route->getName() }}">
                        
                        <!-- Route Info -->
                        <div class="card-body text-center">
                            <h5 class="card-title">{{  $route->getName() }}</h5>
                            <p class="card-text">{{ __('app.routes_user.list.type') }}: {{ $route->getType() }}</p>
                            <p class="card-text">{{ __('app.routes_user.list.zone') }}:{{ $route->getZone() }}</p>
                            <p class="card-text">{{ __('app.routes_user.list.difficulty') }}: {{ $route->getDifficulty() }}</p>
                        </div>
                        
                        <!-- Route Actions -->
                        <div class="card-footer bg-white text-center">
                            <div class="d-flex justify-content-between">
                                <a href="" class="btn btn-primary btn-sm">
                                    {{ __('app.view_route') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('app.routes_user.list.no_routes') }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
