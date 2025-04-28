<div class="mt-4">
    <h4>Reviews</h4>
    @forelse($reviews as $review)
        <!-- Nombre correcto -->
        <div class="border p-2 mb-2 rounded">
            <strong>Rating:</strong> {{ $review->getQualification() }}/5 <br>
            <p>{{ $review->getReview() }}</p> <!-- Nombre correcto -->
        </div>
    @empty
        <p>No reviews yet.</p>
    @endforelse
</div>
