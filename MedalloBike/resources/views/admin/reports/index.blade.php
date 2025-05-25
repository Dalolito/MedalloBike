@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('admin.reports.index.title') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('admin.reports.index.reviews_card_title') }}</h5>
                                    <p class="card-text">{{ __('admin.reports.index.reviews_card_text') }}</p>
                                    <form action="{{ route('admin.reports.reviews') }}" method="GET">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">{{ __('admin.reports.index.start_date') }}</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">{{ __('admin.reports.index.end_date') }}</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ __('admin.reports.index.generate_report') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('admin.reports.index.purchases_card_title') }}</h5>
                                    <p class="card-text">{{ __('admin.reports.index.purchases_card_text') }}</p>
                                    <form action="" method="GET">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">{{ __('admin.reports.index.start_date') }}</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">{{ __('admin.reports.index.end_date') }}</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date">
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ __('admin.reports.index.generate_report') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 