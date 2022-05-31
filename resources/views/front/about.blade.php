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
                        <div class="about-images mt-0">
                            <div class="images">
                                <img src="{{asset('images/about.jpg')}}" alt="About">
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
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- About Item Start -->
                            <div class="about-item">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-tutor"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Find Expert Mentors</h3>
                                    </div>
                                </div>
                                <p>Learning is quite beneficial. All development and achievement are built on the basis of learning.</p>
                                <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled make.</p>
                            </div>
                            <!-- About Item End -->
                        </div>
                        <div class="col-lg-4">
                            <!-- About Item Start -->
                            <div class="about-item">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-coding"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Host Sessions Anywhere</h3>
                                    </div>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled to make type specimen book has survived.</p>
                                <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled make.</p>
                            </div>
                            <!-- About Item End -->
                        </div>
                        <div class="col-lg-4">
                            <!-- About Item Start -->
                            <div class="about-item">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-increase"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Recieve Enrollments</h3>
                                    </div>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled to make type specimen book has survived.</p>
                                <p>Lorem Ipsum has been the industry's standard dumy text since the when took and scrambled make.</p>
                            </div>
                            <!-- About Item End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

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
                            <h2 class="main-title">You can join with Edule as <span>a instructor?</span></h2>
                        </div>
                        <!-- Section Title End -->

                    </div>
                    <div class="col-md-6">
                        <div class="call-to-action-btn">
                            <a class="btn btn-primary btn-hover-dark" href="/mentor/onboarding">Become a Mentor</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call to Action Wrapper End -->

        </div>
    </div>
    <!-- Call to Action End -->

    <!-- Download App Start -->
    <div class="section section-padding download-section mt-5">

        <div class="app-shape-1"></div>
        <div class="app-shape-2"></div>
        <div class="app-shape-3"></div>
        <div class="app-shape-4"></div>

        <div class="container">

            <!-- Download App Wrapper Start -->
            <div class="download-app-wrapper mt-n6">

                <!-- Section Title Start -->
                <div class="section-title section-title-white">
                    <h5 class="sub-title">Ready to start?</h5>
                    <h2 class="main-title">Download our mobile app. for easy to start your course.</h2>
                </div>
                <!-- Section Title End -->

                <img class="shape-1 animation-right" src="assets/images/shape/shape-14.png" alt="Shape">

                <!-- Download App Button End -->
                <div class="download-app-btn">
                    <ul class="app-btn">
                        <li><a href="#"><img src="assets/images/google-play.png" alt="Google Play"></a></li>
                        <li><a href="#"><img src="assets/images/app-store.png" alt="App Store"></a></li>
                    </ul>
                </div>
                <!-- Download App Button End -->

            </div>
            <!-- Download App Wrapper End -->

        </div>
    </div>
    <!-- Download App End -->

    <!-- Testimonial End -->
    <div class="section section-padding-02 mt-n1">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title shape-03 text-center">
                <h5 class="sub-title">Student Testimonial</h5>
                <h2 class="main-title">Feedback From <span> Student</span></h2>
            </div>
            <!-- Section Title End -->

            <!-- Testimonial Wrapper End -->
            <div class="testimonial-wrapper testimonial-active">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Single Testimonial Start -->
                        <div class="single-testimonial swiper-slide">
                            <div class="testimonial-author">
                                <div class="author-thumb">
                                    <img src="assets/images/author/author-06.jpg" alt="Author">

                                    <i class="icofont-quote-left"></i>
                                </div>

                                <span class="rating-star">
                                        <span class="rating-bar" style="width: 80%;"></span>
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <p>Lorem Ipsum has been the industry's standard dummy text since the 1500s, when an unknown printer took a galley of type and scrambled it to make type specimen book has survived not five centuries but also the leap into electronic.</p>
                                <h4 class="name">Sara Alexander</h4>
                                <span class="designation">Product Designer, USA</span>
                            </div>
                        </div>
                        <!-- Single Testimonial End -->

                        <!-- Single Testimonial Start -->
                        <div class="single-testimonial swiper-slide">
                            <div class="testimonial-author">
                                <div class="author-thumb">
                                    <img src="assets/images/author/author-07.jpg" alt="Author">

                                    <i class="icofont-quote-left"></i>
                                </div>

                                <span class="rating-star">
                                        <span class="rating-bar" style="width: 80%;"></span>
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <p>Lorem Ipsum has been the industry's standard dummy text since the 1500s, when an unknown printer took a galley of type and scrambled it to make type specimen book has survived not five centuries but also the leap into electronic.</p>
                                <h4 class="name">Melissa Roberts</h4>
                                <span class="designation">Product Designer, USA</span>
                            </div>
                        </div>
                        <!-- Single Testimonial End -->

                        <!-- Single Testimonial Start -->
                        <div class="single-testimonial swiper-slide">
                            <div class="testimonial-author">
                                <div class="author-thumb">
                                    <img src="assets/images/author/author-03.jpg" alt="Author">

                                    <i class="icofont-quote-left"></i>
                                </div>

                                <span class="rating-star">
                                        <span class="rating-bar" style="width: 80%;"></span>
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <p>Lorem Ipsum has been the industry's standard dummy text since the 1500s, when an unknown printer took a galley of type and scrambled it to make type specimen book has survived not five centuries but also the leap into electronic.</p>
                                <h4 class="name">Sara Alexander</h4>
                                <span class="designation">Product Designer, USA</span>
                            </div>
                        </div>
                        <!-- Single Testimonial End -->
                    </div>

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- Testimonial Wrapper End -->

        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Brand Logo Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Brand Logo Wrapper Start -->
            <div class="brand-logo-wrapper">

                <img class="shape-1" src="assets/images/shape/shape-19.png" alt="Shape">

                <img class="shape-2 animation-round" src="assets/images/shape/shape-20.png" alt="Shape">

                <!-- Section Title Start -->
                <div class="section-title shape-03">
                    <h2 class="main-title">Best Supporter of <span> Edule.</span></h2>
                </div>
                <!-- Section Title End -->

                <!-- Brand Logo Start -->
                <div class="brand-logo brand-active">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="assets/images/brand/brand-01.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="assets/images/brand/brand-02.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="assets/images/brand/brand-03.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="assets/images/brand/brand-04.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="assets/images/brand/brand-05.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                            <!-- Single Brand Start -->
                            <div class="single-brand swiper-slide">
                                <img src="assets/images/brand/brand-06.png" alt="Brand">
                            </div>
                            <!-- Single Brand End -->

                        </div>
                    </div>
                </div>
                <!-- Brand Logo End -->

            </div>
            <!-- Brand Logo Wrapper End -->

        </div>
    </div>
    <!-- Brand Logo End -->
</x-guest-layout>
