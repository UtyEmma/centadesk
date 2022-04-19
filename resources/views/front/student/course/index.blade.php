<x-student-layout>
    <!-- Courses Start -->
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="row gx-10">
                <div class="col-lg-8">
                    <!-- Courses Enroll Content Start -->
                    <div class="courses-enroll-content px-0">

                        <!-- Courses Enroll Title Start -->
                        <div class="courses-enroll-title">
                            <div>
                                <h2 class="title mb-0">{{$course->name}}</h2>
                                <p class="mt-0">
                                    <i class="icofont-eye-alt"></i>
                                    <span>{{$batch->total_students}}</span> Students
                                </p>

                            </div>

                            <div>
                                <p class="mb-0 text-end">Current Batch</p>
                                <h5 class="text-end">{{$batch->title}}</h5>
                                <strong>Begins {{$batch->begins}}</strong>
                            </div>
                        </div>
                        <!-- Courses Enroll Title End -->

                        <!-- Courses Enroll Tab Start -->
                        <div class="courses-enroll-tab">
                            <div class="enroll-tab-menu">
                                <ul class="nav">
                                    <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab1">Overview</button></li>
                                    <li><button data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button></li>
                                    <li><button data-bs-toggle="tab" data-bs-target="#tab3">Instructor</button></li>
                                    <li>
                                        <button>
                                            <a href="{{$batch->short_code}}/forum">Forum</a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="enroll-share">
                            </div>
                        </div>
                        <!-- Courses Enroll Tab End -->

                        <!-- Courses Enroll Tab Content Start -->
                        <div class="courses-enroll-tab-content p-0 border-0">
                            {{$slot}}
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <!-- Courses Details Sidebar Start -->
                    <div class="sidebar">

                        <!-- Sidebar Widget Information Start -->
                        <x-mentor-card :mentor="$mentor" :class="''" :btn="false" />
                        <!-- Sidebar Widget Information End -->

                        <div class="w-100 mt-4">
                            @if (!$report)
                            <x-reports.modal :batch="$batch" />
                            @else
                            <x-reports.view :report="$report" :batch="$batch" />
                            @endif
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
                    <!-- Courses Details Sidebar End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->
</x-student-layout>
