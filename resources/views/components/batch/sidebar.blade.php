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
