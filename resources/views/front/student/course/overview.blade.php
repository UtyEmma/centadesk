<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment" :report="$report">
    <div class="row">
        <div class="col-md-8">
            <div class="blog-details-wrapper mb-3 mt-0">
                <h2 class="title mt-0 mb-1">{{$course->name}}</h2>

                <div class="blog-details-admin-meta align-items-center">
                    <div class="">
                        <h5>{{$batch->title}}</h5>
                    </div>
                    <div class="blog-meta">
                        <span> <i class="icofont-calendar"></i> 21 March, 2021</span>
                        <span> <i class="icofont-heart"></i> 2,568+ </span>
                        <span class="tag"><a href="#">Science</a></span>
                    </div>
                </div>
            </div>

            <div class="overview">
                <div class="enroll-tab-title">
                    <h5 >Course Details</h5>
                </div>
                <div class="enroll-tab-content">
                    {!! $course->desc !!}
                </div>
            </div>

            <x-courses.review-tab :reviews="$reviews" :batch="$batch" :can="true" />
        </div>

        <div class="col-lg-4">
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
        </div>
    </div>
</x-enrolled-course>
