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

    <!-- difficulty Filter  -->
    <div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ __('app.routes.list.filter') }}</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('route.list') }}" class="d-flex">
                    <select name="difficulty" class="form-select me-2">
                        <option value="">{{ __('app.routes.list.all_difficulties') }}</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}"
                            {{ isset($viewData['selectedDifficulty']) && $viewData['selectedDifficulty'] == $i ? 'selected' : '' }}>
                             {{ 'Nivel ' . $i }}
                        </option>
                         @endfor
                    </select>
                    <button type="submit" class="btn btn-primary">
                        {{ __('app.routes.list.level') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



    <!-- Routes Grid -->
    <div class="row">
        @if(isset($viewData['routes']) && count($viewData['routes']) > 0)
            @foreach($viewData['routes'] as $route)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100">
                        <!-- Route Image -->
                        <img src="{{ asset($route->getImageMap()) }}"
                            class="card-img-top img-fluid" style="height: 180px; object-fit: cover;" alt="{{ $route->getName() }}">

                        <!-- Route Info -->
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $route->getName() }}</h5>
                            <p class="card-text">{{ Str::limit($route->getDescription(), 80) }}</p>
                            <p class="text-muted mb-0"><small>{{ __('app.routes.list.difficulty') }}: {{ $route->getDifficulty() }}</small></p>
                            <p class="text-muted mb-0"><small>{{ __('app.routes.list.type') }}: {{ $route->getType() }}</small></p>
                            <p class="text-muted"><small>{{ __('app.routes.list.zone') }}: {{ $route->getZone() }}</small></p>
                        </div>

                        <!-- Action -->
                        <div class="card-footer bg-white text-center py-3">
                            <a href="{{ route('route.show', ['id' => $route->getId()]) }}" 
                               class="btn btn-outline-primary btn-sm w-100">
                                <i class="bi bi-info-circle me-1"></i>
                                {{ __('app.routes.list.view_details') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    {{ __('app.routes.list.not_routes') }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
