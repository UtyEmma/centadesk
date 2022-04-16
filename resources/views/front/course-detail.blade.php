<x-guest-layout>
{{--
    <x-page-banner>
        <!-- Page Banner Start -->
        <div class="m-0">

        </div>
        <!-- Page Banner End -->
    </x-page-banner> --}}
       <!-- Page Banner Start -->
    <div class="section page-banner py-0 my-0">
        <img class="shape-1 animation-round" src="{{asset('images/shape/shape-8.png')}}" alt="Shape">

        {{-- <img class="shape-2" src="{{asset('images/shape/shape-23.png')}}" alt="Shape"> --}}
        <div class="page-banner-content container pt-3 mt-5">
            <div class="container p-0 mx-0 pt-5 page-banner-content"></div>

            <ul class="breadcrumb mb-0">
                <li><a href="/">Home</a></li>
                <li > <a href="/courses">Courses</a></li>
                <li class="active">{{$course->name}}</li>
            </ul>

            <div class="courses-details">
                <h3 class="mt-4 mb-1">{{$course->name}}</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, temporibus.</p>
                <div class="courses-details-admin mb-4 mt-0 p-0">
                    <div class="mb-0 p-0">
                        {{-- <div class="author-content ms-0 p-0">
                            <p class="mb-0 p-1 bg-white radius border d-flex align-items-center">
                                <span class="p-1 bg-light-primary radius px-2">
                                    <i class="icofont-user-suited me-1"></i>
                                    <small class="lh-0 me-1">Mentor</small>
                                </span>

                                <a style="font-weight: 500" class=" ps-2" href="/mentors/{{$mentor->username}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                            </p>
                        </div> --}}
                        <div class="author-content ms-0 p-0 d-flex align-items-center">
                            <i class="icofont-user-suited me-2"></i>
                            <a style="font-weight: 500" class="" href="/mentors/{{$mentor->username}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                        </div>
                        <div class="admin-rating ms-0 d-block">
                            <div>
                                <span class="rating-count">{{$course->rating}}.0</span>
                                <span class="rating-star">
                                    <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                                </span>
                                <span class="rating-text me-1">({{$course->reviews}} Reviews)</span>
                                |
                                <small class="Enroll ms-1">{{$course->total_students}} Students</small>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>

                    <div class="text-md-end">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page Banner End -->

    <!-- Courses Start -->
    <div class="section section-padding pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Courses Details Start -->
                    <div class="courses-details mt-0">
                        <!-- Courses Details Tab Start -->
                        <div class="courses-details-tab mt-0 p-0">
                            <!-- Details Tab Menu Start -->
                            <div>
                                <h5 class="tab-title">Description</h5>
                                <p>
                                    {!! $course->desc !!}
                                </p>
                            </div>
                            <!-- Details Tab Menu End -->

                            <div class="mt-3">
                                <h5 class="tab-title my-2">Active Batches</h5>

                                <div class="row">
                                    @foreach ($course->batches as $batch)
                                        <div class="col-md-6" >
                                            <x-batch.batch-item :course="$course" :user="Auth::user()" :batch="$batch" :mentor="$course->mentor" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Courses Details Tab End -->

                        <div class="w-100 mt-4 mb-0">
                            <h6>Tags</h6>
                            @if ($course->tags)
                                @foreach (json_decode($course->tags) as $tag)
                                    <span class="tag-item text-capitalize">{{$tag->value}}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Courses Details End -->
                </div>
                <div class="col-lg-4 mt-5 mt-md-0">
                    <div class="courses-details mb-3 mt-0">
                        <x-course-images :images="json_decode($course->images)" :video="$course->video" :alt="$course->name" />
                    </div>

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

            <div class="row mt-5">
                <h4>Suggested Courses:</h4>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <x-call-to-action></x-call-to-action>
</x-guest-layout>
