<x-guest-layout>

    <x-page-banner></x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding mt-0 pt-0">
        <div class="container">
            <div class="row gx-10">
                <div class="col-lg-8">
                    <div class="courses-details mt-0">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="courses-details mb-5 mt-0">
                                    <x-course-images :image="$batch->images" :video="$batch->video" :alt="$batch->title" />
                                </div>
                            </div>

                            <div class="col-md-7">
                                <h4 class="mb-2">{{$batch->title}}</h4>
                                <a href="/courses/{{$course->slug}}">
                                    <h6 class="mb-2">{{$course->name}}</h6>
                                </a>

                                <p class="mb-0">{{$batch->excerpt}}</p>

                                <div class="mt-2 mb-4 w-100">
                                    <div class="author-content ms-0 p-0 d-flex align-items-center w-100">
                                        <x-profile-img :user="$mentor" size="45px" />
                                        <a style="font-weight: 500" class="ms-2" href="/mentors/{{$mentor->username}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <small class="rating-text me-1">
                                            <i class="text-primary fs-5 icofont-calendar"></i>
                                            {{$batch->startdate}} - {{$batch->enddate}}
                                        </small>

                                        <small class="ms-1">
                                            <i class="text-primary fs-5 icofont-user"></i>
                                            {{$course->total_students}} Students
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="courses-details-tab">
                            <h6 class="tab-title">What you will learn?</h6>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 mt-md-0">
                    <div class="sidebar mt-0 p-0">
                        <div class="sidebar-widget mt-md-0 mb-3">
                            <x-batch-countdown :batch="$batch" />
                        </div>

                        <div class="sidebar-widget mt-md-0 mb-3">
                            <h5>Enroll for this Batch</h5>
                            @if ($batch->discount)
                                <x-price-discount-card :batch="$batch" />
                            @else
                                <x-price-normal-card :batch="$batch" />
                            @endif
                        </div>

                        <div class="sidebar-widget mt-5">
                            <h5>Meet the Mentor</h5>
                            <x-mentor-card :mentor="$mentor" :class="''" :btn="true" />
                        </div>

                        <div class="sidebar-widget">
                            <h5>Share to your friends:</h5>

                            <ul class="social">
                                <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                                <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                                <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                <li><a href="#"><i class="flaticon-skype"></i></a></li>
                                <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <x-call-to-action></x-call-to-action>
</x-guest-layout>
