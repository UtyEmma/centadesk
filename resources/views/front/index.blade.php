<x-guest-layout>
    <!-- Slider Start -->
    <x-page-title title="Home - Libraclass, Create and sell online courses" />

    <div class="section slider-section">
        <div class="container">
            <div class="slider-content">
                <h4 class="sub-title">Find your favourite course</h4>
                <h2 class="main-title">Start learning from anywhere, and build your <span>bright career.</span></h2>
                <p>Find and create amazing courses, host sessions anywhere and enroll students anytime.</p>
                <a class="btn btn-primary btn-hover-dark" href="/courses">Start A Course</a>
            </div>
        </div>

        <!-- Slider Courses Box Start -->
        <div class="slider-courses-box">

            <img class="shape-1 animation-left" src="{{asset('images/shape/shape-5.png')}}" alt="Shape">

            <div class="box-content">
                <div class="box-wrapper">
                    <i class="flaticon-open-book"></i>
                    <span class="count">{{$courses->count() + env('NUMBER_OF_COURSES')}}+</span>
                    <p>courses</p>
                </div>
            </div>

            <img class="shape-2" src="{{asset('images/shape/shape-6.png')}}" alt="Shape">

        </div>
        <!-- Slider Courses Box End -->

        <!-- Slider Rating Box Start -->
        <div class="slider-rating-box">

            <div class="box-rating">
                <div class="box-wrapper">
                    <span class="count">{{env('APP_RATING')}} <i class="flaticon-star"></i></span>
                    <p>Rating ({{env('APP_REVIEWS_COUNT')}})</p>
                </div>
            </div>

            <img class="shape animation-up" src="{{asset('images/shape/shape-7.png')}}" alt="Shape">

        </div>
        <!-- Slider Rating Box End -->

        <!-- Slider Images Start -->
        <div class="slider-images">
            <div class="images">
                <img src="{{asset('images/slider/slider-1.png')}}" style="z-index: 0;" alt="Slider">
            </div>
        </div>
        <!-- Slider Images End -->

        <!-- Slider Video Start -->
        <div class="slider-video">
            <img class="shape-1" src="{{asset('images/shape/shape-9.png')}}" alt="Shape">

            <div class="video-play">
                <img src="{{asset('images/shape/shape-10.png')}}" alt="Shape">
                {{-- Watch Video --}}
                <a href="https://www.youtube.com/watch?v=BRvyWfuxGuU" class="play video-popup"><i class="flaticon-play"></i></a>
            </div>
        </div>
        <!-- Slider Video End -->

    </div>
    <!-- Slider End -->

    @if (count($categories) > 0)
        <x-category :categories="$categories" />
    @endif

    @if (count($courses) > 0)
        <!-- All Courses Start -->
        <div class="section section-padding-02">
            <div class="container">
                <!-- All Courses Top Start -->
                <div class="courses-top">
                    <!-- Section Title Start -->
                    <div class="section-title shape-01">
                        <h2 class="main-title">All <span>Courses</span> of {{env('APP_NAME')}}</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Courses Search Start -->
                    <div class="courses-search">
                        <form action="/courses" type="GET">
                            @csrf
                            <input type="text" name="keyword" placeholder="Search for Courses...">
                            <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <!-- Courses Search End -->
                </div>
                <!-- All Courses Top End -->
                <!-- All Courses tab content Start -->
                <div class="row mt-5">
                    @foreach ($courses as  $course )
                        <div class="col-lg-4 col-md-6">
                            <x-courses.single-course-card :course="$course" :mentor="$course->mentor" />
                        </div>
                    @endforeach
                </div>
                <!-- All Courses tab content End -->

                <!-- All Courses BUtton Start -->
                <div class="courses-btn text-center">
                    <a href="/courses" class="btn btn-secondary btn-hover-primary">View Courses</a>
                </div>
            </div>
        </div>
        <!-- All Courses End -->
    @endif

    <!-- Call to Action Start -->
    <div class="section section-padding-02">
        <div class="container">

            <!-- Call to Action Wrapper Start -->
            <div class="call-to-action-wrapper">

                <img class="cat-shape-01 animation-round" src="{{asset('images/shape/shape-12.png')}}" alt="Shape">
                <img class="cat-shape-02" src="{{asset('images/shape/shape-13.svg')}}" alt="Shape">
                <img class="cat-shape-03 animation-round" src="{{asset('images/shape/shape-12.png')}}" alt="Shape">

                <div class="row align-items-center">
                    <div class="col-md-6">

                        <!-- Section Title Start -->
                        <div class="section-title shape-02">
                            <h5 class="sub-title">Become A Instructor</h5>
                            <h2 class="main-title">You can join with {{env('APP_NAME')}} as <span>a instructor?</span></h2>
                        </div>
                        <!-- Section Title End -->

                    </div>
                    <div class="col-md-6">
                        <div class="call-to-action-btn">
                            <a class="btn btn-primary btn-hover-dark" href="/mentor/join">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call to Action Wrapper End -->

        </div>
    </div>
    <!-- Call to Action End -->

    <!-- How It Work End -->
    <div class="section section-padding mt-n1">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title shape-03 text-center">
                <h5 class="sub-title">Over {{$courses->count() + env('NUMBER_OF_COURSES')}}+ Course</h5>
                <h2 class="main-title">How It <span> Work?</span></h2>
            </div>
            <!-- Section Title End -->

            <!-- How it Work Wrapper Start -->
            <div class="how-it-work-wrapper">

                <!-- Single Work Start -->
                <div class="single-work">
                    <img class="shape-1" src="{{asset('images/shape/shape-15.png')}}" alt="Shape">

                    <div class="work-icon">
                        <i class="flaticon-transparency"></i>
                    </div>
                    <div class="work-content">
                        <h3 class="title">Find a Course</h3>
                        <p>Find your life-changing course from curated experts in your field of interest.</p>
                    </div>
                </div>
                <!-- Single Work End -->

                <!-- Single Work Start -->
                <div class="work-arrow">
                    <img class="arrow" src="{{asset('images/shape/shape-17.png')}}" alt="Shape">
                </div>
                <!-- Single Work End -->

                <!-- Single Work Start -->
                <div class="single-work">
                    <img class="shape-2" src="{{asset('images/shape/shape-15.png')}}" alt="Shape">

                    <div class="work-icon">
                        <i class="flaticon-forms"></i>
                    </div>
                    <div class="work-content">
                        <h3 class="title">Join A Session</h3>
                        <p>Book and Join an ongoing session of your desired courses with your mentor.</p>
                    </div>
                </div>

                <div class="work-arrow">
                    <img class="arrow" src="{{asset('images/shape/shape-17.png')}}" alt="Shape">
                </div>

                <div class="single-work">
                    <img class="shape-3" src="{{asset('images/shape/shape-16.png')}}" alt="Shape">

                    <div class="work-icon">
                        <i class="flaticon-badge"></i>
                    </div>
                    <div class="work-content">
                        <h3 class="title">Get Certificate</h3>
                        <p>Optionally receive certification upon when your current session is completed.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('components.video-cta')

    @include('components.testimonial-slider')

    @include('components.partner-brands')

    <!-- Blog Start -->
    @if ($posts->count() > 0)
        <div class="section section-padding mt-n1">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title shape-03 text-center">
                    <h5 class="sub-title">Latest News</h5>
                    <h2 class="main-title">Educational Tips & <span> Updates</span></h2>
                </div>
                <!-- Section Title End -->

                <!-- Blog Wrapper Start -->
                <div class="blog-wrapper">
                    <div class="row">
                        @foreach ($posts as $post)
                            <x-blog-post :post="$post" />
                        @endforeach
                    </div>
                </div>
                <!-- Blog Wrapper End -->

            </div>
        </div>
    @endif
</x-guest-layout>
