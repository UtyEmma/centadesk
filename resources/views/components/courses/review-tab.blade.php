<div class="tab-pane fade" id="reviews">

    <!-- Tab Reviews Start -->
    <div class="tab-reviews">
        <h4 class="tab-title">Student Reviews:</h4>

        <div class="reviews-wrapper reviews-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">
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
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- Tab Reviews End -->

</div>
