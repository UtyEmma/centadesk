<x-guest-layout>

    <x-page-banner>
        <!-- Page Banner Start -->
        <div class="m-0">
            <ul class="breadcrumb mb-0">
                <li><a href="/">Home</a></li>
                <li><a href="/courses">Courses</a></li>
                <li><a href="/courses/{{$course->slug}}">{{$course->name}}</a></li>
                <li class="active">{{$batch->title}}</li>
            </ul>
        </div>
        <!-- Page Banner End -->
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding mt-0">
        <div class="container mt-5">
            <div class="row gx-10">
                <div class="col-lg-8">
                    <!-- Courses Details Start -->
                    <div class="courses-details mt-0">
                        <div class="courses-details-images mt-0">
                            <x-course-images :images="json_decode($batch->images)" :video="$batch->video" :alt="$course->name" />

                            <div class="courses-play">
                                <img src="{{asset('images/courses/circle-shape.png')}}" alt="Play">
                                <a class="play video-popup" href="{{$batch->video}}"><i class="flaticon-play"></i></a>
                            </div>
                        </div>

                        <div class="w-100 mt-4 mb-0">
                            @if ($course->tags)
                                @foreach (json_decode($course->tags) as $tag)
                                    <span class="tag-item text-capitalize">{{$tag->value}}</span>
                                @endforeach
                            @endif
                        </div>

                        <div class="w-100 d-flex justify-content-between">
                            <h3 class="title mt-2">{{$course->name}}</h3>

                        </div>

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
                            <h5 class="tab-title">Course Description</h5>
                            <div class="details-tab-menu">
                                <p>
                                    {!! $course->desc !!}
                                </p>
                            </div>
                            <!-- Details Tab Menu End -->
                        </div>
                        <!-- Courses Details Tab End -->
                    </div>
                    <!-- Courses Details End -->
                </div>
                <div class="col-lg-4 mt-5 mt-md-0">
                    <!-- Courses Details Sidebar Start -->
                    <div class="sidebar mt-0 p-0">

                        <!-- Sidebar Widget Information Start -->
                        <div class="sidebar-widget widget-information mt-0">
                            <div class="info-price text-start">
                                <h5 class="text-decoration-line-through">
                                    {{request()->cookie('currency')}}

                                    {{number_format($batch->price)}}
                                </h5>
                                <span class="price text-left">
                                    <span style="font-size: 1rem;">
                                        {{request()->cookie('currency')}}
                                    </span>
                                    {{number_format($batch->discount_price)}}
                                </span>
                            </div>
                            <div class="info-list">
                                <ul>
                                    <li><i class="icofont-man-in-glasses"></i> <strong>Instructor</strong> <span>{{$mentor->firstname}} {{$mentor->lastname}}</span></li>
                                    <li><i class="icofont-clock-time"></i> <strong>Duration</strong> <span>08 hr 15 mins</span></li>
                                </ul>
                            </div>

                            @if ($user = Auth::user())
                                <x-payment-modal :user="$user" :batch="$batch" :wallet="$user->wallet" />
                            @else
                                <div class="info-btn">
                                    <a href="/login" class="btn btn-primary btn-hover-dark">Login to Enroll</a>
                                </div>
                            @endif
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
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <x-call-to-action></x-call-to-action>
</x-guest-layout>
