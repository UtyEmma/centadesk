<x-guest-layout>
    <x-page-title title="{{$course->name}} by {{$mentor->firstname}} {{$mentor->lastname}}" />
    <x-metadata :title="$course->name" :image="$course->images" :excerpt="$course->excerpt" />

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
                            <h4 class="mb-2">{{$course->name}}</h4>
                            <div class="courses-details-admin radius mb-4 mt-0">
                                <div class="author-content ms-0 p-0 d-flex align-items-center">
                                    <x-profile-img :user="$mentor" size="40px" />
                                    <a style="font-weight: 500" class="ms-2" href="/mentors/{{$mentor->username}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                                </div>
                                <div class="mb-0 p-0">
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
                    <!-- Courses Details Start -->
                    <div class="courses-details mt-0">
                        <div>
                            <h5 class="tab-title mb-2">Sessions Under this Series</h5>

                            <div class="mt-4">
                                <ul class="row">
                                    @foreach ($batches as $batch)
                                        <div class="col-md-6 post-item">
                                            {{-- <x-batch.single :course="$course" :batch="$batch" /> --}}
                                            <x-batch.suggested :course="$batch" :batch="$batch" />
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="py-1">
                            <x-courses.review-tab :reviews="$course->course_reviews" :batch="$batch" :can="['status' => false, 'message' => '']" />
                        </div> --}}
                        <!-- Courses Details Tab End -->
                    </div>
                    <!-- Courses Details End -->
                </div>
                <div class="col-lg-4 mt-5 mt-md-0">
                    <div class="sidebar-widget mt-0 mb-4">
                        <h5 class="tab-title mb-2">Share This Course</h5>
                        <x-share-link :link="request()->url()" />
                    </div>



                    <div class="sidebar-widget mt-5">
                        <h5>Meet the Mentor</h5>
                        <x-mentor-card :mentor="$mentor" :class="''" :btn="true" />
                    </div>
                </div>
            </div>

            {{-- @if (count($related) > 0)
                <div class="mt-5">
                    <h5 class="mb-4">Related Courses:</h5>

                    <div class="row">
                        @foreach ($related as $course)
                            <div class="col-md-4">
                                <x-courses.single-course-card :course="$course" :mentor="$course->mentor" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif --}}
        </div>
    </div>
    <!-- Courses End -->
    <x-mentor-cta />
</x-guest-layout>
