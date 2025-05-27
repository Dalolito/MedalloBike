{{-- Review form for product or route --}}
<div class="review-form-container">
    <h5 class="mb-3">{{ __('app.review.form.add_review') }}</h5>
    <form action="{{ route('review.save') }}" method="POST">
        @csrf
        @if (isset($product))
            <input type="hidden" name="product_id" value="{{ $product->getId() }}">
        @endif
        @if (isset($route))
            <input type="hidden" name="route_id" value="{{ $route->getId() }}">
        @endif
        <div class="mb-3">
            <label for="qualification" class="form-label">{{ __('app.review.form.qualification') }}</label>
            <select name="qualification" class="form-select" required>
                <option value="">{{ __('app.review.form.select_rating') }}</option>
                <option value="5">5 - {{ __('app.review.form.rating.excellent') }}</option>
                <option value="4">4 - {{ __('app.review.form.rating.very_good') }}</option>
                <option value="3">3 - {{ __('app.review.form.rating.good') }}</option>
                <option value="2">2 - {{ __('app.review.form.rating.fair') }}</option>
                <option value="1">1 - {{ __('app.review.form.rating.poor') }}</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('app.review.form.label_review') }}</label>
            <textarea name="description" class="form-control" rows="3"
                placeholder="{{ __('app.review.form.review_placeholder') }}" required></textarea>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                {{ __('app.review.form.submit') }}
            </button>
        </div>
    </form>
    @if (session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
</div>
