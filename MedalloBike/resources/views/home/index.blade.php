@extends('layouts.app')
@section('title', 'MedalloBike')
@section('content')
    <div class="container">
        <!-- Hero Banner -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-dark text-white rounded-3 overflow-hidden">
                    <img src="{{ asset('/img/bike.jpg') }}" class="card-img opacity-60" alt="Cycling"
                        style="height: 400px; object-fit: cover;">
                    <div class="card-img-overlay d-flex flex-column justify-content-center text-center">
                        <h1 class="card-title display-4 fw-bold">{{ __('app.hero.title') }}</h1>
                        <p class="card-text fs-5">{{ __('app.hero.subtitle') }}</p>
                        <div>
                            <a href="{{ route('product.list') }}" class="btn btn-primary btn-lg">
                                {{ __('app.hero.shop_now') }}
                            </a>
                            <a href="{{ route('route.list') }}" class="btn btn-outline-light btn-lg ms-3">
                                {{ __('app.hero.explore_routes') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
