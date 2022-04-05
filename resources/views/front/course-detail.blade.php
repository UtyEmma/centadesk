<x-guest-layout>

    <x-page-banner>
        <x-slot name="current">
            Courses
        </x-slot>
        <x-slot name="title">
            {{$course->name}}
        </x-slot>
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="row gx-10">
                <div class="col-lg-8">

                    <!-- Courses Details Start -->
                    <div class="courses-details">

                        <div class="courses-details-images">
                            <img src="{{json_decode($batch->images)[0] ?? asset('images/courses/courses-details.jpg')}}" alt="Courses Details">

                            <div class="courses-play">
                                <img src="{{asset('images/courses/circle-shape.png')}}" alt="Play">
                                <a class="play video-popup" href="{{$batch->video}}"><i class="flaticon-play"></i></a>
                            </div>
                        </div>

                        <div class="w-100 mt-4 mb-0">
                            @if ($course->tags)
                                @foreach (json_decode($course->tags) as $tag)
                                    <span class="tag-item">{{$tag->value}}</span>
                                @endforeach
                            @endif
                        </div>

                        <h2 class="title mt-2">{{$course->name}}</h2>

                        <div class="courses-details-admin">
                            <div class="admin-author">
                                <div class="rounded-img">
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
                                <ul class="nav justify-content-center">
                                    <li><button class="active" data-bs-toggle="tab" data-bs-target="#description">Description</button></li>
                                    <li><button data-bs-toggle="tab" data-bs-target="#instructors">Instructors</button></li>
                                    <li><button data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button></li>
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
                                                <div class="col-md-6 col-6">
                                                    <!-- Single Team Start -->
                                                    <div class="single-team border p-5 radius">
                                                        <div class="rounded-img-lg border mx-auto items-center">
                                                            <img src="{{$mentor->avatar ?? assets('images/author/author-01.jpg')}}" alt="Author">
                                                        </div>
                                                        <div class="team-content">
                                                            <div class="rating">
                                                                <span class="count">4.9</span>
                                                                <i class="icofont-star"></i>
                                                                <span class="text">(rating)</span>
                                                            </div>
                                                            <h4 class="name">{{$mentor->firstname}} {{$mentor->lastname}}</h4>
                                                            <span class="designation">{{$mentor->specialty}}</span>
                                                        </div>
                                                    </div>
                                                    <!-- Single Team End -->
                                                </div>
                                            </div>

                                            <div class="row gx-10">
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
                                <span class="price @if ($batch->discount !== 'none') {{'text-decoration-line-through'}} @endif">{{request()->cookie('currency')}} {{number_format($batch->price)}}</span>

                                @if ($batch->discount !== 'none')
                                    <span class="price">{{request()->cookie('currency')}} {{number_format($batch->discount_price)}}</span>
                                @endif
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
                                @if ($course->user_enrolled)
                                    <a href="/profile/courses/{{$course->slug}}" class="btn btn-primary btn-hover-dark">Go to Course</a>
                                @else
                                    <a href="{{$course->slug}}/enroll" class="btn btn-primary btn-hover-dark">Enroll for {{$batch->title}}</a>
                                @endif
                                {{-- <button onclick="createTransaction()" class="btn btn-primary btn-hover-dark">Enroll for Batch {{$batch->count}}</b> --}}
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

    <x-call-to-action></x-call-to-action>
</x-guest-layout>
