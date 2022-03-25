<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment">

        <!-- Courses Enroll Tab Start -->
        <div class="courses-enroll-tab">
            <div class="enroll-tab-menu">
                <ul class="nav">
                    <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab1">Overview</button></li>
                    <li><button data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button></li>
                    <li><button data-bs-toggle="tab" data-bs-target="#tab3">Instructor</button></li>
                </ul>
            </div>
            <div class="enroll-share">
                <a href="{{$course->slug}}/forum"><i class="icofont-share-alt"></i> Go to Forum</a>
            </div>
        </div>
        <!-- Courses Enroll Tab End -->

        <!-- Courses Enroll Tab Content Start -->
        <div class="courses-enroll-tab-content">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1">

                    <!-- Overview Start -->
                    <div class="overview">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="enroll-tab-title">
                                    <h3 class="title">Course Details</h3>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="enroll-tab-content">
                                    {{$course->desc}}

                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Instructor <span>:</span></th>
                                                <td>Pamela Foster</td>
                                            </tr>
                                            <tr>
                                                <th>Duration <span>:</span></th>
                                                <td>08 hr 15 mins</td>
                                            </tr>
                                            <tr>
                                                <th>Lectures <span>:</span></th>
                                                <td>2,16</td>
                                            </tr>
                                            <tr>
                                                <th>Level <span>:</span></th>
                                                <td>Secondary</td>
                                            </tr>
                                            <tr>
                                                <th>Language <span>:</span></th>
                                                <td>English</td>
                                            </tr>
                                            <tr>
                                                <th>Caption’s <span>:</span></th>
                                                <td>Yes</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been industry's standard dummy text ever since the 1500s when andom unknown printer took a galley of type scrambled it to make a type specimen book.</p>

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been industry's standard dummy text ever since the 1500s when andom unknown printer took a galley of type scrambled it to make a type specimen book.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Overview End -->

                </div>
                <div class="tab-pane fade" id="reviews">

                    <!-- Tab Reviews Start -->
                    <div class="tab-reviews">
                        <h3 class="tab-title">Student Reviews:</h3>

                        <div class="reviews-wrapper reviews-active">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                    <!-- Single Reviews Start -->
                                    <div class="single-review swiper-slide">
                                        <div class="review-author">
                                            <div class="author-thumb">
                                                <img src="{{asset('images/author/author-06.jpg')}}" alt="Author">
                                                <i class="icofont-quote-left"></i>
                                            </div>
                                            <div class="author-content">
                                                <h4 class="name">Sara Alexander</h4>
                                                <span class="designation">Product Designer, USA</span>
                                                <span class="rating-star">
                                                        <span class="rating-bar" style="width: 100%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                    </div>
                                    <!-- Single Reviews End -->

                                    <!-- Single Reviews Start -->
                                    <div class="single-review swiper-slide">
                                        <div class="review-author">
                                            <div class="author-thumb">
                                                <img src="{{asset('images/author/author-07.jpg')}}" alt="Author">
                                                <i class="icofont-quote-left"></i>
                                            </div>
                                            <div class="author-content">
                                                <h4 class="name">Karol Bachman</h4>
                                                <span class="designation">Product Designer, USA</span>
                                                <span class="rating-star">
                                                        <span class="rating-bar" style="width: 100%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                    </div>
                                    <!-- Single Reviews End -->

                                    <!-- Single Reviews Start -->
                                    <div class="single-review swiper-slide">
                                        <div class="review-author">
                                            <div class="author-thumb">
                                                <img src="{{asset('images/author/author-03.jpg')}}" alt="Author">
                                                <i class="icofont-quote-left"></i>
                                            </div>
                                            <div class="author-content">
                                                <h4 class="name">Gertude Culbertson</h4>
                                                <span class="designation">Product Designer, USA</span>
                                                <span class="rating-star">
                                                        <span class="rating-bar" style="width: 100%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                    </div>
                                    <!-- Single Reviews End -->

                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

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
                                        <form action="/reviews/submit" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- Single Form Start -->
                                                    <div class="reviews-rating">
                                                        <label>Rating</label>
                                                        <x-rating-select :name="'rating'" />
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

                    </div>
                    <!-- Tab Reviews End -->

                </div>
                <div class="tab-pane fade" id="tab3">

                    <!-- Instructor Start -->
                    <div class="instructor">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="enroll-tab-title">
                                    <h3 class="title">Instructor</h3>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="enroll-tab-content">

                                    <!-- Single Instructor Start -->
                                    <div class="single-instructor">
                                        <div class="review-author">
                                            <div class="author-thumb">
                                                <img src="assets/images/author/author-06.jpg" alt="Author">
                                            </div>
                                            <div class="author-content">
                                                <h4 class="name">Sara Alexander</h4>
                                                <span class="designation">Product Designer, USA</span>
                                                <span class="rating-star">
                                                        <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been industry's standard dummy text ever since the 1500s when andom unknown printer took a galley of type scrambled it to make a type specimen book.</p>
                                    </div>
                                    <!-- Single Instructor End -->

                                    <!-- Single Instructor Start -->
                                    <div class="single-instructor">
                                        <div class="review-author">
                                            <div class="author-thumb">
                                                <img src="assets/images/author/author-07.jpg" alt="Author">
                                            </div>
                                            <div class="author-content">
                                                <h4 class="name">Karol Bachman</h4>
                                                <span class="designation">Product Designer, USA</span>
                                                <span class="rating-star">
                                                        <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been industry's standard dummy text ever since the 1500s when andom unknown printer took a galley of type scrambled it to make a type specimen book.</p>
                                    </div>
                                    <!-- Single Instructor End -->

                                    <!-- Single Instructor Start -->
                                    <div class="single-instructor">
                                        <div class="review-author">
                                            <div class="author-thumb">
                                                <img src="assets/images/author/author-03.jpg" alt="Author">
                                            </div>
                                            <div class="author-content">
                                                <h4 class="name">Gertude Culbertson</h4>
                                                <span class="designation">Product Designer, USA</span>
                                                <span class="rating-star">
                                                        <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been industry's standard dummy text ever since the 1500s when andom unknown printer took a galley of type scrambled it to make a type specimen book.</p>
                                    </div>
                                    <!-- Single Instructor End -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Instructor End -->

                </div>
            </div>
        </div>
        <!-- Courses Enroll Tab Content End -->




    <!-- Courses Enroll Content End -->

</x-enrolled-course>
