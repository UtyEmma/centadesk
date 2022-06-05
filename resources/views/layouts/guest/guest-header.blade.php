<div class="main-wrapper">
    <div class="header-section">
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="header-top-wrapper pb-0">
                    <div class="header-top-left">
                        <p>Create and Join <a href="#">amazing Courses.</a></p>
                    </div>

                    <div class="header-top-medal">
                        <div class="top-info">
                            <p><i class="flaticon-phone-call"></i> <a href="tel:{{env('LIBRACLASS_PHONE')}}">{{env('LIBRACLASS_PHONE')}}</a></p>
                            <p><i class="flaticon-email"></i> <a href="mailto:{{env('LIBRACLASS_EMAIL')}}">{{env('LIBRACLASS_EMAIL')}}</a></p>
                        </div>
                    </div>

                    <x-currency-select name="currency" :currency="$currency" class="w-auto" :data="$data" btnClasses="text-white text-white fw-normal btn-custom" />

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

        <div class="header-main">
            <div class="container">
                <div class="header-main-wrapper">
                    <div class="header-logo">
                        <a href="/"><img src="{{asset('images/libra-main.png')}}" width="150" class="img-fluid" alt="Logo"></a>
                    </div>

                    <div class="header-menu d-none d-lg-block">
                        <ul class="nav-menu">
                            <li>
                                <a href="/sessions">Explore</a>
                            </li>
                            <li>
                                <a href="/about">About</a>
                            </li>
                            <li>
                                <a href="/blog">Blog</a>
                            </li>
                            <li>
                                <a href="/mentor/join">Mentors</a>
                            </li>
                        </ul>
                    </div>

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
            <p><i class="flaticon-phone-call"></i> <a href="tel:{{env('LIBRACLASS_PHONE')}}">{{env('LIBRACLASS_PHONE')}}</a></p>
            <p><i class="flaticon-email"></i> <a href="mailto:{{env('LIBRACLASS_EMAIL')}}">{{env('LIBRACLASS_EMAIL')}}</a></p>
        </div>
        <!-- Mobile Top Medal End -->

        <!-- Mobile Menu Start -->
        <div class="mobile-menu-items mb-1">
            <ul class="nav-menu">
                <li>
                    <a href="/sessions">Explore</a>
                </li>
                <li>
                    <a href="/about">About</a>
                </li>
                <li>
                    <a href="/blog">Blog</a>
                </li>
                <li>
                    <a href="/mentor/join">Mentors</a>
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
