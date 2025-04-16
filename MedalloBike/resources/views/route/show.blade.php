@extends('layouts.app')

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

        <div class="card">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h1 class="fs-5 mb-0">{{ $viewData['route']->getName() }}</h1>
                <div>
                    <a href="{{ route('route.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> {{ __('app.routes_user.show.back_to_list') }}
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- Route Map Image -->
                    <div class="col-md-6">
                        <div class="route-image-container text-center mb-4">
                            <img src="{{ asset('/img/image.png') }}" 
                                class="img-fluid rounded shadow" 
                                alt="{{ $viewData['route']->getName() }}"
                                style="max-height: 400px; width: 100%; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Route Details -->
                    <div class="col-md-6">
                        <div class="route-details">
                            <h5 class="border-bottom pb-2">{{ __('app.routes_user.show.details') }}</h5>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>{{ __('app.routes_user.show.description') }}</th>
                                        <td>{{ $viewData['route']->getDescription() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.routes_user.show.zone') }}</th>
                                        <td>{{ $viewData['route']->getZone() }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.routes_user.show.difficulty') }}</th>
                                        <td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $viewData['route']->getDifficulty())
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @else
                                                    <i class="bi bi-star text-warning"></i>
                                                @endif
                                            @endfor
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.routes_user.show.coordinates') }}</th>
                                        <td>
                                            <strong>{{ __('app.routes_user.show.start') }}:</strong> 
                                            {{ $viewData['route']->getCoordinateStart() }}<br>
                                            <strong>{{ __('app.routes_user.show.end') }}:</strong> 
                                            {{ $viewData['route']->getCoordinateEnd() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('app.routes_user.show.created_at') }}</th>
                                        <td>{{ date(__('app.routes_user.show.date_format'), strtotime($viewData['route']->getCreatedAt())) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">{{ __('app.review.list.title') }}</h5>
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
                                        <a href="{{ route('login') }}">{{ __('app.login') }}</a>
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