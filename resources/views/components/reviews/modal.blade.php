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
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Single Form Start -->
                            <div class="reviews-rating">
                                <label>Rating</label>
                                <x-reviews.star-select name="rating" />
                            </div>
                            <!-- Single Form End -->
                        </div>
                        <div class="col-md-12">
                            <!-- Single Form Start -->
                            <div class="single-form">
                                <textarea name="review" placeholder="Write your comments here"></textarea>
                            </div>
                            <!-- Single Form End -->
                        </div>
                        <div class="col-md-12">
                            <!-- Single Form Start -->
                            <div class="single-form">
                                <button type="submit" class="btn btn-primary btn-hover-dark">Submit Review</button>
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
