@extends('layouts.app')
@section('title', 'MedalloBike')
@section('content')
    <div class="container">
        <!-- Hero Banner -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-primary text-white rounded-3 overflow-hidden"
                    style="background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%); height: 400px;">
                    <div class="card-img-overlay d-flex flex-column justify-content-center text-center">
                        <h1 class="card-title display-4 fw-bold">{{ __('app.hero.title') }}</h1>
                        <p class="card-text fs-5">{{ __('app.hero.subtitle') }}</p>
                        <div>
                            <a href="{{ route('product.index') }}" class="btn btn-light btn-lg">
                                {{ __('app.hero.shop_now') }}
                            </a>
                            <a href="{{ route('route.index') }}" class="btn btn-outline-light btn-lg ms-3">
                                {{ __('app.hero.explore_routes') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
