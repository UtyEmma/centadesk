<x-guest-layout>
    <div class="section page-banner bg-transparent py-0 my-0" >
        <div class="container pt-5">
            <div class="page-banner-content">
                <ul class="breadcrumb mb-0">
                    <li><a href="/">Home</a></li>
                    <li > <a href="/courses">Courses</a></li>
                    <li class="active">{{$course->name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->

    <!-- Courses Start -->
    <div class="section section-padding pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="courses-details mt-0">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="courses-details mb-5 mt-0">
                                    <x-course-images :image="$course->images" :video="$course->video" :alt="$course->name" />
                                </div>
                            </div>

                            <div class="col-md-7">
                                <h4 class="mb-2">{{$course->name}}</h4>
                                <p class="mb-0">{{$course->excerpt}}</p>

                                <div class="courses-details-admin radius mb-4 mt-0">
                                    <div class="mb-0 p-0">
                                        <div class="author-content ms-0 p-0 d-flex align-items-center">
                                            <x-profile-img :user="$mentor" size="40px" />
                                            <a style="font-weight: 500" class="ms-2" href="/mentors/{{$mentor->username}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                                        </div>
                                        <div class="admin-rating ms-0 d-block">
                                            <div>
                                                <span class="rating-count">{{$course->rating}}.0</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                                                </span>
                                                <span class="rating-text me-1">({{$course->reviews}} {{$course->no_reviews}})</span>
                                                |
                                                <small class="Enroll ms-1">{{$course->total_students}} Students</small>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Courses Details Start -->
                    <div class="courses-details mt-0">
                        <!-- Courses Details Tab Start -->
                        <div class="courses-details-tab mt-0 p-0">
                            <div>
                                <h5 class="tab-title">About this Course</h5>
                                <p>
                                    {!! $course->desc !!}
                                </p>
                            </div>

                            <div>
                                <h5 class="tab-title">What you will learn:</h5>
                                <p>
                                    {{ $course->objectives }}
                                </p>
                            </div>

                            <div class="mt-4">

                                <h5 class="tab-title">Tags</h5>

                                <div class="widget-tags p-0 border-0 mt-3">
                                    <ul class="tags-list d-flex flex-wrap">
                                        @forelse (json_decode($course->tags) as $tag)
                                            <li class="text-capitalize"><a class="px-3" href="#">{{$tag->value}}</a></li>
                                        @empty

                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <x-courses.review-tab :reviews="$course->course_reviews" :batch="$batch" :can="false" />
                        <!-- Courses Details Tab End -->
                    </div>
                    <!-- Courses Details End -->
                </div>
                <div class="col-lg-4 mt-5 mt-md-0">
                    <div>
                        <h5 class="tab-title mb-2">Course Batches</h5>

                        <div class="widget-post mt-2 p-3">
                            <ul class="post-items">
                                @foreach ($course->batches as $batch)
                                    <x-batch.list-item :course="$course" :batch="$batch" />
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widget mt-5">
                        <x-mentor-card :mentor="$mentor" :class="''" :btn="true" />
                    </div>

                    <!-- Sidebar Widget Share Start -->
                    <div class="sidebar-widget mt-4">
                        <h5 class="tab-title mb-0">Share Course</h5>

                        <ul class="social mt-0">
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
                <h4>Suggested for you:</h4>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <x-call-to-action></x-call-to-action>
</x-guest-layout>
