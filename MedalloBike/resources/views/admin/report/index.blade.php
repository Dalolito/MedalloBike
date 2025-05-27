@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
    <div class="reports-bg-center">
        <div class="reports-card reports-card-lg">
            <h5 class="card-title">{{ __('admin.reports.index.reviews_card_title') }}</h5>
            <p class="card-text">{{ __('admin.reports.index.reviews_card_text') }}</p>
            <form action="{{ route('review.export') }}" method="GET">
                <div class="mb-3">
                    <label for="start_date" class="form-label">{{ __('admin.reports.index.start_date') }}</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">{{ __('admin.reports.index.end_date') }}</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="format" class="form-label">{{ __('admin.reports.index.format') }}</label>
                    <select name="format" id="format" class="form-control" required>
                        <option value="pdf"><i class="fas fa-file-pdf"></i> PDF</option>
                        <option value="word"><i class="fas fa-file-word"></i> Word</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-download"></i> {{ __('admin.reports.index.generate_report') }}
                </button>
            </form>
        </div>
    </div>
@endsection
