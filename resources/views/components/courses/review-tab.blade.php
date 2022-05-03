<!-- Tab Reviews Start -->
<div class="py-4">
    <h5 class="mb-3 mt-4">Student Reviews:</h5>

    <div class="reviews-wrapper reviews-active">
        @if (count($reviews) > 0)
            @foreach ($reviews as $review)
                <x-reviews.item :review="$review" />
            @endforeach
        @else
            <div class="text-center w-100 p-5 border radius">
                <h4>There are no Reviews</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, ea.</p>
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
