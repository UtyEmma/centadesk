<x-student-layout>
    <!-- Courses Start -->
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="row gx-10">
                <div class="col-lg-8">

                    <!-- Courses Details Start -->
                    <div class="courses-details">

                        <h2 class="title">{{$course->name}}</h2>

                        <div class="courses-details-admin">
                            <div class="admin-author">
                                <div class="author-thumb">
                                    <img src="{{asset($mentor->avatar)}}" alt="Author">
                                </div>
                                <div class="author-content">
                                    <a class="name" href="#">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                                    <span class="Enroll">{{$course->total_students}} Enrolled Students</span>
                                </div>
                            </div>
                            <div class="admin-rating">
                                <span class="rating-count">{{$course->rating}}.0</span>
                                <span class="rating-star">
                                        <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                                </span>
                                <span class="rating-text">({{$course->reviews}} Reviews)</span>
                            </div>
                        </div>

                        <!-- Courses Details Tab Start -->
                        <div class="courses-details-tab">

                            <!-- Details Tab Menu Start -->
                            <div class="details-tab-menu">
                                <ul class="nav justify-content-between">
                                    <div class="d-flex">
                                        <li><button class="active" data-bs-toggle="tab" data-bs-target="#description">Description</button></li>
                                        {{-- <li><button data-bs-toggle="tab" data-bs-target="#instructors">Instructors</button></li> --}}
                                        <li><button data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button></li>
                                    </div>

                                    <li><button data-bs-toggle="tab" data-bs-target="#forum">Forum</button></li>
                                </ul>
                            </div>
                            <!-- Details Tab Menu End -->

                            <!-- Details Tab Content Start -->
                            <div class="details-tab-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="description">
                                        <!-- Tab Description Start -->
                                        <div class="tab-description">
                                            <div class="description-wrapper">
                                                <h3 class="tab-title">Description:</h3>
                                                <p>
                                                    {!! $course->desc !!}
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Tab Description End -->
                                    </div>
                                    <div class="tab-pane fade" id="instructors">
                                        <!-- Tab Instructors Start -->
                                        <div class="tab-instructors">
                                            <h3 class="tab-title">Course Instructor:</h3>

                                            <div class="row">
                                                <div class="col-md-3 col-6">
                                                    <!-- Single Team Start -->
                                                    <div class="single-team">
                                                        <div class="team-thumb">
                                                            <img src="{{asset('images/author/author-01.jpg')}}" alt="Author">
                                                        </div>
                                                        <div class="team-content">
                                                            <div class="rating">
                                                                <span class="count">4.9</span>
                                                                <i class="icofont-star"></i>
                                                                <span class="text">(rating)</span>
                                                            </div>
                                                            <h4 class="name">Margarita James</h4>
                                                            <span class="designation">MSC, Instructor</span>
                                                        </div>
                                                    </div>
                                                    <!-- Single Team End -->
                                                </div>
                                            </div>

                                            <div class="row gx-10">
                                                <div class="col-lg-6">
                                                    <div class="tab-rating-content">
                                                        <h3 class="tab-title">Rating:</h3>
                                                        <p>Lorem Ipsum is simply dummy text of printing and typesetting industry. Lorem Ipsum has been the i dustry's standard dummy text ever since the 1500 unknown printer took a galley of type.</p>
                                                        <p>Lorem Ipsum is simply dummy text of printing and typesetting industry text ever since</p>
                                                        <p>Lorem Ipsum is simply dummy text of printing and dustry's standard dummy text ever since the 1500 unknown printer took a galley of type.</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="tab-rating-box">
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
                                        <!-- Tab Instructors End -->

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
                                                            <form action="#">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <!-- Single Form Start -->
                                                                        <div class="single-form">
                                                                            <input type="text" placeholder="Enter your name">
                                                                        </div>
                                                                        <!-- Single Form End -->
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <!-- Single Form Start -->
                                                                        <div class="single-form">
                                                                            <input type="text" placeholder="Enter your Email">
                                                                        </div>
                                                                        <!-- Single Form End -->
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <!-- Single Form Start -->
                                                                        <div class="reviews-rating">
                                                                            <label>Rating</label>
                                                                            <ul id="rating" class="rating">
                                                                                <li class="star" title='Poor' data-value='1'><i class="icofont-star"></i></li>
                                                                                <li class="star" title='Poor' data-value='2'><i class="icofont-star"></i></li>
                                                                                <li class="star" title='Poor' data-value='3'><i class="icofont-star"></i></li>
                                                                                <li class="star" title='Poor' data-value='4'><i class="icofont-star"></i></li>
                                                                                <li class="star" title='Poor' data-value='5'><i class="icofont-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                        <!-- Single Form End -->
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

                                        </div>
                                        <!-- Tab Reviews End -->

                                    </div>
                                    <div class="tab-pane fade" id="forum">
                                        <x-batch.forum :messages="$forum" :user="$user" :batch="$batch" />
                                    </div>
                                </div>
                            </div>
                            <!-- Details Tab Content End -->

                        </div>
                        <!-- Courses Details Tab End -->

                    </div>
                    <!-- Courses Details End -->

                </div>
                <div class="col-lg-4">
                    <!-- Courses Details Sidebar Start -->
                    <div class="sidebar">

                        <!-- Sidebar Widget Information Start -->
                        <div class="sidebar-widget widget-information">
                            <div class="info-price">
                                <span class="price">$ {{$batch->price}}</span>
                            </div>
                            <div class="info-list">
                                <ul>
                                    <li><i class="icofont-man-in-glasses"></i> <strong>Instructor</strong> <span>{{$mentor->firstname}} {{$mentor->lastname}}</span></li>
                                    <li><i class="icofont-clock-time"></i> <strong>Duration</strong> <span>{{$batch->duration}}</span></li>
                                    <li><i class="icofont-ui-video-play"></i> <strong>Lectures</strong> <span>29</span></li>
                                    <li><i class="icofont-bars"></i> <strong>Batch</strong> <span>{{$batch->count}}</span></li>
                                    {{-- <li><i class="icofont-book-alt"></i> <strong>Language</strong> <span>English</span></li> --}}
                                    <li><i class="icofont-certificate-alt-1"></i> <strong>Certificate</strong> <span>Yes</span></li>
                                </ul>
                            </div>
                            <div class="info-btn">
                                <button onclick="createTransaction()" class="btn btn-primary btn-hover-dark">Enroll for Batch {{$batch->count}}</b>
                            </div>
                        </div>
                        <!-- Sidebar Widget Information End -->

                        <!-- Sidebar Widget Share Start -->
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Share Course:</h4>

                            <ul class="social">
                                <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                                <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                                <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                <li><a href="#"><i class="flaticon-skype"></i></a></li>
                                <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- Sidebar Widget Share End -->

                    </div>
                    <!-- Courses Details Sidebar End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->
</x-student-layout>
