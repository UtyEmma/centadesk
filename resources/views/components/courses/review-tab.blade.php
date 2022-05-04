<!-- Tab Reviews Start -->
<div class="py-4">
    <h5 class="mb-3 mt-4">Student Reviews:</h5>

    <div class="reviews-wrapper reviews-active">
        @if (count($reviews) > 0)
            @foreach ($reviews as $review)
                <x-reviews.item :review="$review" />
            @endforeach
        @else
            <div class="w-100">
                @if (Auth::user())
                    <h6>Be the first to review this Course</h6>
                    <p>Enroll in any of the active batches and let us know what you think.</p>
                @else
                    <h6>There are no reviews yet</h6>
                    <p>Login and Enroll in any of the active batches and let us know what you think.</p>
                @endif
            </div>
        @endif
    </div>
</div>

@if ($can)
    <div>
        <h5 class="modal-title">Write your Review</h5>
    </div>

    <!-- Reviews Form Start -->
    <div class="reviews-form">
        <form action="/profile/reviews/submit/{{$batch->unique_id}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <!-- Single Form Start -->
                    <div class="reviews-rating">
                        <label>Rating</label>
                        <x-rating-select name="rating" />
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Single Form Start -->
                    <div class="single-form">
                        <textarea name="review" placeholder="Write your comments here"></textarea>
                    </div>
                    <!-- Single Form End -->
                </div>
                <div class="col-md-12">
                    <div class="single-form">
                        <button class="btn btn-primary btn-hover-dark">Submit Review</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endif
