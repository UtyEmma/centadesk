<x-guest-layout>

    <x-metadata :title="$course->name" :image="$course->images" :excerpt="$course->excerpt" />

    <div class="section page-banner bg-transparent py-0 my-0" >
        <div class="container pt-5">
            <div class="page-banner-content">
                {{-- <ul class="breadcrumb mb-0">
                    <li><a href="/">Home</a></li>
                    <li > <a href="/courses">Courses</a></li>
                    <li class="active">{{$course->name}}</li>
                </ul> --}}
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
                                <h6 class="tab-title">About this Course</h6>
                                <p>
                                    {!! $course->desc !!}
                                </p>
                            </div>

                            <div>
                                <h6 class="tab-title">What you will learn:</h6>
                                <p>
                                    @if ($course->objectives)
                                        @forelse (json_decode($course->objectives) as $objective)
                                            <ul>
                                                <li class="my-2"><i class="icofont-check text-primary fs-4"></i> {{$objective}}</li>
                                            </ul>
                                        @empty
                                        @endforelse
                                    @endif
                                </p>
                            </div>

                            <div class="mt-4">

                                <h6 class="tab-title">Tags</h6>

                                <div class="widget-tags p-0 border-0 mt-3">
                                    <ul class="tags-list d-flex flex-wrap">
                                        @forelse (json_decode($course->tags) as $tag)
                                            <li class="text-capitalize"><a class="px-3">{{$tag->value}}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="py-1">
                            <x-courses.review-tab :reviews="$course->course_reviews" :batch="$batch" :can="['status' => false, 'message' => '']" />
                        </div>
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
                        <h5>Meet the Mentor</h5>
                        <x-mentor-card :mentor="$mentor" :class="''" :btn="true" />
                    </div>

                    <!-- Sidebar Widget Share Start -->
                    <div class="sidebar-widget mt-4">
                        <h5 class="tab-title mb-0">Share Course</h5>

                        <x-share-btns :text="$course->excerpt" :tags="$course->tags" />
                    </div>
                    <!-- Sidebar Widget Share End -->
                </div>
            </div>

            @if (count($related) > 0)
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
            @endif
        </div>
    </div>
    <!-- Courses End -->

    <x-call-to-action></x-call-to-action>
</x-guest-layout>
