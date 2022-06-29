<x-guest-layout>
    <x-page-title title="About - We are the next level online classes marketplace" />
    <!-- Page Banner Start -->
    <div class="section page-banner bg-transparent">
        <div class="container mt-5">
            <!-- Page Banner Start -->
            <div class="page-banner-content py-5">
                <ul class="breadcrumb mt-3">
                    <li><a href="/">Home</a></li>
                    <li class="active">About</li>
                </ul>
                <h2 class="title mt-0">About <span>{{env('APP_NAME')}}.</span></h2>
            </div>
            <!-- Page Banner End -->
        </div>
    </div>
    <!-- Page Banner End -->

    <!-- About Start -->
    <div class="section">
        <div class="section-padding-02 mt-0 pt-0">
            <div class="container mt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- About Images Start -->
                        <div class="about-images mt-0 h-100">
                            <div class="images h-100">
                                <img src="{{asset('images/about.jpg')}}" class="h-100" style="object-fit: cover;" alt="About">
                            </div>

                            <div class="about-years">
                                <div class="years-icon">
                                    <img src="{{asset('images/logo-icon.png')}}" alt="About">
                                </div>
                                <p>Join Over <strong>100+</strong> Mentors</p> {{-- dynamic --}}
                            </div>
                        </div>
                        <!-- About Images End -->

                    </div>
                    <div class="col-lg-6">

                        <!-- About Content Start -->
                        <div class="about-content mt-3">
                            <h5 class="sub-title">Welcome to {{env('APP_NAME')}}.</h5>
                            <h2 class="main-title">The world is your classroom. Upgrade yourself for a bigger, <span>brighter future.</span></h2>
                            <p>Libraclass is a worldwide learning innovation company that works with students and businesses to transform the future of learning and work.</p>
                            <p>We're paving the path for individualised learning, driven by the notion that everyone, regardless of age, ability, or geography, deserves access to high-quality education. Our cutting-edge technology is applicable at every stage of learning, from kindergarten to retirement.</p>
                            <a href="/courses" class="btn btn-primary btn-hover-dark">Start A Course</a>
                        </div>
                        <!-- About Content End -->

                    </div>
                </div>
            </div>
        </div>

        <div class="section-padding-02 mt-n6">
            <div class="container">
                <div class="about-items-wrapper">
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <!-- About Item Start -->
                            <div class="about-item h-100">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-tutor"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Find Expert Mentors</h3>
                                    </div>
                                </div>
                                <p>You can find experts in various areas, join mentorship programs and fastpace your personal development in your area of interest.</p>
                            </div>
                            <!-- About Item End -->
                        </div>
                        <div class="col-lg-4">
                            <!-- About Item Start -->
                            <div class="about-item h-100">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-coding"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Host Sessions Anywhere</h3>
                                    </div>
                                </div>
                                <p>Are you an expert looking for a platform to sell sessions and recieve payments. You can sign up as a mentor and start creating your courses.</p>
                            </div>
                            <!-- About Item End -->
                        </div>
                        <div class="col-lg-4">
                            <!-- About Item Start -->
                            <div class="about-item h-100">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-increase"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Recieve Enrollments</h3>
                                    </div>
                                </div>
                                <p>As a Mentor, you can signup new students for both free and paid courses, recieve payments from students and withdraw your earnings when the class is completed.</p>
                            </div>
                            <!-- About Item End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <x-mentor-cta />

    @include('components.video-cta')

    <x-testimonial-slider :testimonials="$testimonials" />

    {{-- <div class="my-5">
        @include('components.partner-brands')
    </div> --}}

</x-guest-layout>
