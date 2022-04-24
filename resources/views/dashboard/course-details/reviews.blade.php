<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch">
    <!-- Student Top Start -->
    <div class="admin-top-bar students-top">
        <div class="courses-select pt-0">
            <h4 class="title">Here is what your students are saying</h4>
        </div>
    </div>
    <!-- Student Top End -->
    <div class="row">
        <div class="col-md-8">
            <div class="courses-rating-wrapper">
                @forelse ($reviews as $review)
                    <x-reviews.mentor-item :review="$review" />
                @empty
                    <div class="p-5 radius bg-light-primary text-center">
                        <h4>There are no reviews at the moment</h4>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="col-md-4 courses-details-tab my-0 py-0">
            <div class="details-tab-content  m-0 p-0">
                <div class="tab-rating-box w-100 m-0">
                    <span class="count">4.8 <i class="icofont-star"></i></span>
                    <p>Rating (86K+)</p>

                    <div class="rating-box-wrapper">
                        <div class="single-rating">
                            <span class="rating-star">
                                    <span class="rating-bar" style="width: 100%;"></span>
                            </span>
                            <div class="rating-progress-bar">
                                <div class="rating-line" style="width: 75%;"></div>
                            </div>
                        </div>

                        <div class="single-rating">
                            <span class="rating-star">
                                    <span class="rating-bar" style="width: 80%;"></span>
                            </span>
                            <div class="rating-progress-bar">
                                <div class="rating-line" style="width: 90%;"></div>
                            </div>
                        </div>

                        <div class="single-rating">
                            <span class="rating-star">
                                    <span class="rating-bar" style="width: 60%;"></span>
                            </span>
                            <div class="rating-progress-bar">
                                <div class="rating-line" style="width: 500%;"></div>
                            </div>
                        </div>

                        <div class="single-rating">
                            <span class="rating-star">
                                    <span class="rating-bar" style="width: 40%;"></span>
                            </span>
                            <div class="rating-progress-bar">
                                <div class="rating-line" style="width: 80%;"></div>
                            </div>
                        </div>

                        <div class="single-rating">
                            <span class="rating-star">
                                    <span class="rating-bar" style="width: 20%;"></span>
                            </span>
                            <div class="rating-progress-bar">
                                <div class="rating-line" style="width: 40%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-mentor-batch-detail>
