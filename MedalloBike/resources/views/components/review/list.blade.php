{{-- Simple review list to be included directly --}}
<div class="review-list-container">
    <h5 class="mb-3">{{ __('app.review.list.title') }}</h5>

    @if (count($reviews) > 0)
        @foreach ($reviews as $review)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <span class="fw-bold">{{ __('app.review.list.rating') }}: </span>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->getQualification())
                                    <i class="bi bi-star-fill text-warning"></i>
                                @else
                                    <i class="bi bi-star text-secondary"></i>
                                @endif
                            @endfor
                        </div>
                        <small class="text-muted">{{ $review->getCreatedAt() }}</small>
                    </div>
                    <p class="card-text">{{ $review->getDescription() }}</p>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            {{ __('app.review.list.no_reviews') }}
        </div>
    @endif
</div>
