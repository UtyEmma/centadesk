<x-guest-layout>
    <x-page-title title="Become a Mentor - Join an elite rank of experts that sell their knowledge on {{env("APP_NAME")}}" />
     <!-- Page Banner Start -->
     <div class="section page-banner bg-transparent">

        <div class="container mt-5">
            <!-- Page Banner Start -->
            <div class="page-banner-content py-5">
                <ul class="breadcrumb mt-3">
                    <li><a href="/">Home</a></li>
                    <li class="active">Become a Mentor</li>
                </ul>
                <h2 class="title mt-0">Become a <span>Mentor.</span></h2>
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
                    <div class="col-lg-8">
                        <div class="about-content mt-0 ms-0 ps-0 w-100" style="max-width: 100%;">
                            <h5 class="sub-title">Welcome to {{env("APP_NAME")}}.</h5>
                            <h2 class="main-title">Create courses and enroll students on {{env("APP_NAME")}}! <span>Host classes anywhere.</span></h2>
                            <p>The {{env("APP_NAME")}} Platform is solely for high-value digital knowledge contents, and to keep it that way, anything placed on the learning platform must meet certain criteria.</p>
                            <a href="/mentor/onboarding" class="btn btn-primary btn-hover-dark">Get Started!</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-md-0">
                        <div class="about-images h-100 mt-0">
                            <div class="images h-100 mt-0 pt-0">
                                <img src="{{asset('images/about.jpg')}}" style="object-fit: cover;" class="h-100 mt-0" alt="About">
                            </div>

                            <div class="about-years">
                                <div class="years-icon">
                                    <img src="{{asset('images/logo-icon.png')}}" alt="About">
                                </div>
                                <p><strong>28+</strong> Years Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-padding-02">
            <div class="container">
                <div class="section-title shape-03 text-center">
                    <h2 class="main-title">How to become a <span> Mentor</span></h2>
                </div>

                <div class="about-items-wrapper">
                    <div class="row">
                        <div class="col-lg-4 py-3">
                            <div class="about-item h-100">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-tutor"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Create A Mentor Account</h3>
                                    </div>
                                </div>
                                <p>To get started, we recommend you read our <a href="/terms">terms and conditions</a> about operating as a Mentor on {{env("APP_NAME")}}.</p>
                                <p>You can then proceed to <a href="/mentor/onboarding">Create a Mentor Account</a>.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 py-3">
                            <div class="about-item h-100">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-coding"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Provide Your Information</h3>
                                    </div>
                                </div>
                                <p>We are dedicated to providing the best programs and courses for our students, mentors need to provide information to help us assertain your expertise.</p>
                                <p>We also request your bank account details through which you can withdrawals from the platform.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 py-3">
                            <div class="about-item h-100">
                                <div class="item-icon-title">
                                    <div class="item-icon">
                                        <i class="flaticon-increase"></i>
                                    </div>
                                    <div class="item-title">
                                        <h3 class="title">Start Creating Courses</h3>
                                    </div>
                                </div>
                                <p>Once your Mentor account has been approved, you can start creating courses and hosting sessions on {{env("APP_NAME")}}.</p>
                                <p>Your earnings will be accumulated and you can make withdraw anytime.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-padding-02 pb-4">
        <div class="container">
            <div class="call-to-action-wrapper">
                <img class="cat-shape-01 animation-round" src="{{asset('images/shape/shape-12.png')}}" alt="Shape">
                <img class="cat-shape-02" src="{{asset('images/shape/shape-13.svg')}}" alt="Shape">
                <img class="cat-shape-03 animation-round" src="{{asset('images/shape/shape-12.png')}}" alt="Shape">

                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="section-title shape-02">
                            <h2 class="main-title">Join with {{env("APP_NAME")}} as a mentor?</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="call-to-action-btn">
                            <a class="btn btn-primary btn-hover-dark" href="/mentor/onboarding">Start Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($mentors->count() > 0)
        <div class="section section-padding">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title shape-03 text-center">
                    <h2 class="main-title">Frequently Asked<span> Questions</span></h2>
                </div>
                <!-- Section Title End -->

                <div class="faq-wrapper">
                    @forelse ($mentors as $mentor)
                        <x-faq :title="$mentor->title">
                            {{$mentor->content}}
                        </x-faq>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    @endif
</x-guest-layout>
