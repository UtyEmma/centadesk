<div class="tab-pane fade" id="reviews">

    <!-- Tab Reviews Start -->
    <div class="tab-reviews">
        <h5 class="mb-3 mt-4">Student Reviews:</h5>

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

    @if ($can)
        <div class="reviews-btn">
            <button type="button" class="btn btn-primary btn-hover-dark" data-bs-toggle="modal" data-bs-target="#reviewsModal">Write A Review</button>
        </div>

        <!-- Reviews Form Modal Start -->
        <div class="modal fade" id="reviewsModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add a Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Reviews Form Start -->
                    <div class="modal-body reviews-form">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-12">
                                    <x-reviews.input />
                                </div>
                                <div class="col-md-12">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <textarea placeholder="Write your comments here"></textarea>
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                                <div class="col-md-12">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <button class="btn btn-primary btn-hover-dark">Submit Review</button>
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Reviews Form End -->
                </div>
            </div>
        </div>
        <!-- Reviews Form Modal End -->
    @endif
    <!-- Tab Reviews End -->

</div>
