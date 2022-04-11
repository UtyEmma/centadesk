    <!-- Page Banner Start -->
    <div class="section pt-10 bg-secondary ">
        @php
            $user = Auth::user();
        @endphp

        <img class="shape-1 animation-round" src="{{asset('images/shape/shape-8.png')}}" alt="Shape">

        <img class="shape-2" src="{{asset('images/shape/shape-23.png')}}" alt="Shape">


        <!-- Shape Icon Box Start -->
        <div class="shape-icon-box">
            <img class="icon-shape-2" src="{{asset('images/shape/shape-6.png')}}" alt="Shape">
        </div>
        <!-- Shape Icon Box End -->

        {{-- <img class="shape-3" src="{{asset('images/shape/shape-24.png')}}" alt="Shape"> --}}

        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-end">
                    <div class="page-banner-content mb-10">
                        <h2 class="title pb-0">Learning Center</h2>
                        <ul class="breadcrumb">
                            <li><a href="/">Account</a></li>
                            <li class="active">Courses</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">

                    @if (Auth::user()->role === 'mentor')
                        <div class="new-courses px-8 mt-0" style="background-image: url({{asset('images/new-courses-banner.jpg')}});">
                            <div class="row">
                                <div class="new-courses-title">
                                    <h3 class="title">Your students are waiting for you.</h3>
                                </div>
                                <div class="new-courses-btn mt-3">
                                    <a href="/me" class="btn">Visit Mentor Dashboard<i class="icofont-rounded-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="new-courses px-8 mt-0" style="background-image: url({{asset('images/new-courses-banner.jpg')}});">
                            <div class="row">
                                <div class="new-courses-title">
                                    <h3 class="title">Start earning Money by publishing your courses on Centadesk.</h3>
                                </div>

                                <div class="new-courses-btn mt-3">
                                    <a href="/mentor/onboarding" class="btn">Create Mentor Account<i class="icofont-rounded-right"></i></a>
                                </div>
                            </div>
                            {{-- <img class="shape d-none d-xl-block" src="{{asset('images/shape/shape-27.png')}}" alt="Shape"> --}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row py-4">
                <!-- All Courses Tabs Menu Start -->
                <div class="bg-transparent bg-primary px-0 d-md-flex justify-content-between align-items-center">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('profile/courses')) ? 'text-primary fw-bold' : '' }}" aria-current="page" href="/profile/courses">My Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('profile/mentors')) ? 'text-primary fw-bold' : '' }}" href="/profile/mentors">My Mentors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('profile')) ? 'text-primary fw-bold' : '' }}" href="/profile">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('profile/wallet')) ? 'text-primary fw-bold' : '' }}" href="/profile/wallet">My Wallet</a>
                        </li>
                    </ul>


                    <div class="d-md-flex justify-content-end align-items-center">
                        <x-affiliate-link :user="$user" />

                        <a class="nav-link" href="/logout">
                            <i class="icofont-logout"></i>
                            Logout
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->
