<form action="{{ route('review.save') }}" method="POST" class="mt-3">
    @csrf
    @if($type=="route")
        <input type="hidden" name="route_id" value="{{ $route->getId() }}">
    @else
        <input type="hidden" name="product_id" value="{{ $product->getId() }}">
    @endif

    <div class="mb-2">
        <label for="review" class="form-label">
            {{ __('app.review.form.label_review') }}
        </label>
        <textarea name="review" class="form-control" rows="2" placeholder="{{ __('app.review.form.add_review') }}" required></textarea>
    </div>
    <!-- qualification -->
    <div class="mb-3">
        <label for="qualification" class="form-label">{{ __('app.review.form.qualification') }}</label>
        <input type="number" class="form-control" id="qualification" name="qualification" placeholder="{{ __('app.review.form.qualification') }}" value="{{ old('qualification') }}" step="1" required>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-sm btn-secondary">
            {{ __('app.review.form.submit') }}
        </button>
    </div>
    @if(session('success'))
        <div class= "alert alert-success" >{{ session('success') }}</div>
    @endif
    
    
</form>