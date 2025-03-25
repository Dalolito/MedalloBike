@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
<div class="container my-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h1 class="fs-5 mb-0">{{ $viewData['route']->getName() }}</h1>
            <div>
                <a href="{{ route('route.list') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> {{ __('app.routes_user.list.title') }}
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Imagen del mapa -->
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="{{ asset($viewData['route']->getImageMap()) }}" class="img-fluid rounded">
                    </div>
                </div>

                <!-- Detalles de la ruta -->
                <div class="col-md-8">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5>{{ __('app.products_user.show.details') }}</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>{{ __('app.routes_user.list.type') }}</th>
                                        <td>{{ $viewData['route']->getType() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.routes_user.list.zone') }}</th>
                                        <td>{{ $viewData['route']->getZone() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.routes_user.list.difficulty') }}</th>
                                        <td>{{ $viewData['route']->getDifficulty() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Coordenadas de inicio</th>
                                        <td>{{ $viewData['route']->getCoordinateStart() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Coordenadas de fin</th>
                                        <td>{{ $viewData['route']->getCoordinateEnd() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Descripción de la ruta -->
                    <div class="route-description mb-4">
                        <h5>{{ __('app.products_user.show.description') }}</h5>
                        <div class="p-3 bg-light rounded">
                            {{ $viewData['route']->getDescription() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección de reseñas -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">{{ __('app.products_user.show.create_review') }}</h5>
                        </div>
                        <div class="card-body">
                            <!-- Formulario de reseñas -->
                            <div class="mb-4">
                                
                            </div>

                            <!-- Lista de reseñas -->
                            <div class="review-list">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
