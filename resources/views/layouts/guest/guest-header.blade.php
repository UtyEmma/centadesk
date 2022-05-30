<div class="main-wrapper">
    <!-- Header Section Start -->
    <div class="header-section">
        <!-- Header Top Start -->
        <div class="header-top d-none d-lg-block">
            <div class="container">

                <!-- Header Top Wrapper Start -->
                <div class="header-top-wrapper">

                    <!-- Header Top Left Start -->
                    <div class="header-top-left">
                        <p>All course 28% off for <a href="#">Liberian people’s.</a></p>
                    </div>
                    <!-- Header Top Left End -->

                    <!-- Header Top Medal Start -->
                    <div class="header-top-medal">
                        <div class="top-info">
                            <p><i class="flaticon-phone-call"></i> <a href="tel:9702621413">(970) 262-1413</a></p>
                            <p><i class="flaticon-email"></i> <a href="mailto:support@libraclass.com">support@libraclass.com</a></p>
                        </div>
                    </div>

                    <x-currency-select name="currency" :currency="$currency" :data="$data" btnClasses="text-white text-white fw-normal btn-custom" />
                    <!-- Header Top Medal End -->

                    <!-- Header Top Right Start -->
                    <div class="header-top-right">
                        <ul class="social">
                            <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                            <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                            <li><a href="#"><i class="flaticon-skype"></i></a></li>
                            <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Top End -->

        <!-- Header Main Start -->
        <div class="header-main">
            <div class="container">

                <!-- Header Main Start -->
                <div class="header-main-wrapper">

                    <!-- Header Logo Start -->
                    <div class="header-logo">
                        <a href="/"><img src="{{asset('images/libra-main.png')}}" width="150" class="img-fluid" alt="Logo"></a>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Menu Start -->
                    <div class="header-menu d-none d-lg-block">
                        <ul class="nav-menu">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="/sessions">Explore</a>
                            </li>
                            <li>
                                <a href="/about">About</a>
                            </li>
                            {{-- <li><a href="/mentors">FAQs</a></li> --}}
                        </ul>

                    </div>
                    <!-- Header Menu End -->

                    <!-- Header Sing In & Up Start -->
                    <div class="header-sign-in-up d-none d-lg-block">
                        @if ($user = Auth::user())
                            <ul>
                                <li ><a class="sign-in fs-6 fw-normal" href="/learning">My Learning</a></li>
                                @if ($user->role === 'mentor')
                                    <li ><a class="sign-in py-2 fs-6 fw-normal" href="/me">Mentor</a></li>
                                @else
                                    <li ><a class="sign-in py-2 fs-6 fw-normal" href="/mentor/join">Mentor</a></li>
                                @endif

                                <x-avatar :user="$user" />
                            </ul>
                        @else
                            <ul>
                                <li><a class="sign-in" href="/login">Sign In</a></li>
                                <li><a class="sign-up" href="/register">Sign Up</a></li>
                            </ul>
                        @endif
                    </div>
                    <!-- Header Sing In & Up End -->

                    <div class="d-flex d-lg-none align-items-center me-0">
                        @if ($user = Auth::user())
                            <div class="me-3">
                                <x-avatar :user="$user" />
                            </div>
                        @endif

                        <!-- Header Mobile Toggle Start -->
                        <div class="header-toggle d-lg-none">
                            <a class="menu-toggle" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Section End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu">

        <!-- Menu Close Start -->
        <a class="menu-close" href="javascript:void(0)">
            <i class="icofont-close-line"></i>
        </a>
        <!-- Menu Close End -->

        <!-- Mobile Top Medal Start -->
        <div class="mobile-top">
            <p><i class="flaticon-phone-call"></i> <a href="tel:9702621413">(970) 262-1413</a></p>
            <p><i class="flaticon-email"></i> <a href="mailto:address@gmail.com">address@gmail.com</a></p>
        </div>
        <!-- Mobile Top Medal End -->

        <!-- Mobile Menu Start -->
        <div class="mobile-menu-items mb-1">
            <ul class="nav-menu">
                <li><a href="/">Home</a></li>
                <li>
                    <a href="/courses">Courses</a>
                </li>
                <li>
                    <a href="/mentors">Mentors</a>
                </li>
            </ul>

        </div>
        <!-- Mobile Menu End -->

        <!-- Mobile Sing In & Up Start -->
        <div class="mobile-sign-in-up px-3 py-0 mb-2">
            @if ($user = Auth::user())
                <ul class="d-block ">
                    <li class="w-100 text-center mb-2"><a class="sign-in" href="/learning">My Learning</a></li>
                    @if ($user->role === 'mentor')
                        <li class="w-100 text-center mb-2"><a class="sign-in text-primary" href="/me">Mentor Dashboard</a></li>
                    @else
                        <li class="w-100 text-center">
                            <a class="sign-up" href="/mentor/join">Become a Mentor</a>
                        </li>
                    @endif
                </ul>

                @else

                <ul>
                    <li><a class="sign-in" href="/login">Sign In</a></li>
                    <li><a class="sign-up" href="/register">Sign Up</a></li>
                </ul>
            @endif
        </div>
        <!-- Mobile Sing In & Up End -->

        <div class="px-3">
            <p class="mb-0">Select Currency</p>
            <x-currency-select :name="'currency'" :currency="$currency" :data="$data" class="text-white" btnClasses="btn bg-secondary btn-hover-primary w-100 border border-primary btn-custom mt-0" />
        </div>


        <!-- Mobile Menu End -->
        <div class="mobile-social mt-3">
            {{-- <x-share-btns text="Join Libraclass" tags="Libraclass, Online Learning"  /> --}}
        </div>
        <!-- Mobile Menu End -->

    </div>
    <!-- Mobile Menu End -->


</div>
