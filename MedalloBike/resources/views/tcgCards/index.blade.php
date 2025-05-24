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

        <!-- Cards Grid -->
        <div class="row">
            @if (isset($viewData['cards']) && count($viewData['cards']) > 0)
                @foreach ($viewData['cards'] as $card)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <!-- Card Image -->
                            @if ($card['image'])
                                <img src="{{ $card['image'] }}" class="card-img-top img-fluid"
                                    style="height: 250px; object-fit: cover;" alt="{{ $card['name'] }}">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
                                    style="height: 250px;">
                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif

                            <!-- Card Info -->
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $card['name'] ?: __('app.tcg_cards.list.no_name') }}</h5>
                                
                                @if ($card['description'])
                                    <p class="card-text text-muted">
                                        {{ Str::limit($card['description'], 100) }}
                                    </p>
                                @endif

                                @if ($card['language'])
                                    <div class="mt-2">
                                        <span class="badge rounded-pill bg-primary text-white px-3 py-2">
                                            <i class="bi bi-translate me-1"></i>
                                            {{ $card['language'] }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        {{ __('app.tcg_cards.list.no_cards') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection