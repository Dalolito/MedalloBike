@extends('layouts.app')
@section('title', 'MedalloBike')

@push('styles')
<link href="{{ asset('/css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="home-page">
    <section class="hero-section" id="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">{{ __('app.hero.title') }}</h1>
                <p class="hero-subtitle">{{ __('app.hero.subtitle') }}</p>
                <div class="hero-buttons">
                    <a href="{{ route('product.index') }}" class="btn-hero btn-hero-primary">
                        <i class="bi bi-bicycle me-2"></i>
                        {{ __('app.hero.shop_now') }}
                    </a>
                    <a href="{{ route('route.index') }}" class="btn-hero btn-hero-secondary">
                        <i class="bi bi-map me-2"></i>
                        {{ __('app.hero.explore_routes') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section" id="features">
        <div class="container">
            <div class="section-title">
                <h2>{{ __('app.features.title') }}</h2>
                <p>{{ __('app.features.subtitle') }}</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h3>{{ __('app.features.quality.title') }}</h3>
                        <p>{{ __('app.features.quality.description') }}</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-map"></i>
                        </div>
                        <h3>{{ __('app.features.routes.title') }}</h3>
                        <p>{{ __('app.features.routes.description') }}</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h3>{{ __('app.features.support.title') }}</h3>
                        <p>{{ __('app.features.support.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stats-section" id="stats">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="stat-item">
                        <span class="stat-number" data-count="1000">1000+</span>
                        <span class="stat-label">{{ __('app.stats.customers') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="stat-item">
                        <span class="stat-number" data-count="500">500+</span>
                        <span class="stat-label">{{ __('app.stats.bikes') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="stat-item">
                        <span class="stat-number" data-count="50">50+</span>
                        <span class="stat-label">{{ __('app.stats.routes') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="stat-item">
                        <span class="stat-number" data-count="5">5+</span>
                        <span class="stat-label">{{ __('app.stats.experience') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products-preview-section" id="productos">
        <div class="container">
            <div class="section-title">
                <h2>{{ __('app.products_preview.title') }}</h2>
                <p class="preview-description">{{ __('app.products_preview.subtitle') }}</p>
            </div>
            
            <div class="text-center">
                <a href="{{ route('product.index') }}" class="btn-hero btn-hero-primary">
                    <i class="bi bi-bicycle me-2"></i>
                    {{ __('app.products_preview.view_all') }}
                </a>
            </div>
        </div>
    </section>

    <section class="about-section" style="padding: 70px 0; background: var(--white);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="content-card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('app.about.title') }}</h3>
                        </div>
                        <div class="card-body">
                            <p>{{ __('app.about.description') }}</p>
                            <p>{{ __('app.about.mission') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('app.services.title') }}</h3>
                        </div>
                        <div class="card-body">
                            <ul style="list-style: none; padding: 0;">
                                <li style="margin-bottom: 10px;"><i class="bi bi-check-circle text-primary me-2"></i>{{ __('app.services.sales') }}</li>
                                <li style="margin-bottom: 10px;"><i class="bi bi-check-circle text-primary me-2"></i>{{ __('app.services.maintenance') }}</li>
                                <li style="margin-bottom: 10px;"><i class="bi bi-check-circle text-primary me-2"></i>{{ __('app.services.consulting') }}</li>
                                <li style="margin-bottom: 10px;"><i class="bi bi-check-circle text-primary me-2"></i>{{ __('app.services.routes') }}</li>
                                <li><i class="bi bi-check-circle text-primary me-2"></i>{{ __('app.services.community') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section" id="cta">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">{{ __('app.cta.title') }}</h2>
                <p class="cta-subtitle">{{ __('app.cta.subtitle') }}</p>
                <div class="hero-buttons">
                    <a href="{{ route('product.index') }}" class="btn-hero btn-hero-primary">
                        <i class="bi bi-shop me-2"></i>
                        {{ __('app.cta.shop_now') }}
                    </a>
                    @auth
                        <a href="{{ route('Myaccount.orders') }}" class="btn-hero btn-hero-secondary">
                            <i class="bi bi-person me-2"></i>
                            {{ __('app.cta.my_account') }}
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn-hero btn-hero-secondary">
                            <i class="bi bi-person-plus me-2"></i>
                            {{ __('app.cta.register') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('/js/home.js') }}"></script>
@endpush