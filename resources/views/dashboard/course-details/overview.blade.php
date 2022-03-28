<x-mentor-course-detail :course="$course" :batches="$batches" :mentor="$mentor">
    <div>
        <h5 class="mb-3">Class Overview</h5>

        <div class="overview-box mt-0">
            <div class="single-box mt-0">
                <h5 class="title">Total Earnings</h5>
                <div class="count">${{$course->earnings}}</div>
                <p><span>$235.00</span> This months</p>
            </div>

            <div class="single-box mt-0">
                <h5 class="title">Total Enrollment’s</h5>
                <div class="count">{{$course->total_students}}</div>
                <p><span>345</span> This months</p>
            </div>

            <div class="single-box mt-0">
                <h5 class="title">Mentor Rating</h5>
                <div class="count">
                    {{$course->rating}}.0

                    <span class="rating-star">
                            <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                    </span>
                </div>
                <p><span>58</span> This months</p>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <h5 class="mb-3">Course Info</h5>

        <div class="card radius">
            <div class="card-body">
                <div class="courses-details my-0">
                    <div class="courses-details-images">
                        <img src="{{asset('images/courses/courses-details.jpg')}}" alt="Courses Details">
                        <span class="tags">Finance</span>

                        <div class="courses-play">
                            <img src="{{asset('images/courses/circle-shape.png')}}" alt="Play">
                            <a class="play video-popup" href="{{$course->video}}"><i class="flaticon-play"></i></a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-tags :element="'tags'" :tags="$course->tags"  />
                    </div>

                    <div class="courses-details-admin">
                        <div class="description-wrapper">
                            <h5 class="mb-0">Description</h5>
                            <p class="mt-0">
                                {!! $course->desc !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <h5>Top Reviews</h5>

        <div class="courses-details-tab m-0 p-0">
            <!-- Tab Reviews Start -->
            <div class="details-tab-content p-0 m-0">
                <div id="reviews">
                    <div class="tab-reviews">
                        <div class="reviews-wrapper reviews-active mb-0">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <!-- Single Reviews Start -->
                                    <div class="single-review swiper-slide">
                                        <div class="review-author">
                                            <div class="author-thumb">
                                                <img src="assets/images/author/author-06.jpg" alt="Author">
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
                                                <img src="assets/images/author/author-07.jpg" alt="Author">
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
                                                <img src="assets/images/author/author-03.jpg" alt="Author">
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

                        <div class="reviews-btn mt-0">
                            <a href="{{$course->slug}}/reviews" class="btn btn-primary btn-hover-dark">View All Reviews</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-mentor-course-detail>
