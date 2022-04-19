<x-guest-layout :data="$data">

    <!-- Page Banner Start -->
    <div class="section page-banner py-0 pt-5 pb-0 px-0 w-100 bg-transparent">
        <div class="container mt-5 pt-5 w-100">
            <img class="shape-1 animation-round" src="{{asset('images/shape/shape-8.png')}}" alt="Shape">

            <img class="shape-2" src="{{asset('images/shape/shape-23.png')}}" alt="Shape">
            <div class="pt-5 px-0 banner-header">

                <div class="m-0 page-banner-content pb-0">
                    <ul class="breadcrumb  mb-0">
                        <li><a href="/">Home</a></li>
                        <li class="active">Login</li>
                    </ul>
                </div>
                <!-- Page Banner End -->
                <h4 class="title fs-5 pb-0 d-md-none mt-0">Log into your <span>account</span></h4>

                <img class="shape-3" src="{{asset('images/shape/shape-24.png')}}" alt="Shape">
            </div>
        </div>
    </div>
    <!-- Page Banner End -->

    <!-- Register & Login Start -->
    <div class="section section-padding pt-md-3 pt-5 pt-md-0 mt-0">
        <div class="container">

            <!-- Register & Login Wrapper Start -->
                <div class="row align-items-center">
                    <div class="col-lg-7 d-lg-block d-none h-100 ">
                        <!-- Register & Login Images Start -->
                        <div class="register-login-images h-100 my-0">
                            <div class="shape-1">
                                <img src="{{asset('images/shape/shape-26.png')}}" alt="Shape">
                            </div>


                            <div class="images">
                                <img src="{{asset('images/register-login.png')}}" alt="Register Login">
                            </div>
                        </div>
                        <!-- Register & Login Images End -->
                    </div>
                    <div class="col-lg-5 col-md-7 mx-auto mt-0">

                        <!-- Register & Login Form Start -->
                        <div class="register-login-form mx-0 mt-0 mt-lg-5 pb-lg-5 ">
                            <h3 class="title pb-0 d-none d-md-block">Log into your <span>account</span></h3>

                            <div class="form-wrapper w-100 pb-lg-5 pt-3">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <!-- Single Form Start -->
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <x-google-btn>Continue with Google</x-google-btn>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <x-facebook-btn>Continue with Facebook</x-facebook-btn>
                                        </div>
                                    </div>

                                    <p class="text-center mt-3 mb-0" style="font-weight: 500;">or Login with your details</p>

                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="email" name="email" placeholder="Username or Email" value="{{old('email')}}" required autofocus>
                                        @error('email')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="password" name="password" placeholder="Password"  required autocomplete="current-password">
                                        @error('password')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-check mt-3">
                                        <input class="form-check-input" id="remember" name="remember" type="checkbox">
                                        <label class="form-check-label fs-6" for="remember">
                                          Remember Me
                                        </label>
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <button type="submit" class="btn btn-primary btn-hover-dark w-100">Login</button>
                                    </div>
                                    <!-- Single Form End -->

                                    <p class="mt-5 text-center">Do not have an account? <a href="/register" class="text-primary" style="font-weight: 500;">Sign up here</a></p>
                                </form>
                            </div>
                        </div>
                        <!-- Register & Login Form End -->

                    </div>
                </div>
            <!-- Register & Login Wrapper End -->

        </div>
    </div>
    <!-- Register & Login End -->

    <!-- Download App Start -->
    <div class="section section-padding download-section">

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

                <img class="shape-1 animation-right" src="{{asset('images/shape/shape-14.png')}}" alt="Shape">

                <!-- Download App Button End -->
                <div class="download-app-btn">
                    <ul class="app-btn">
                        <li><a href="#"><img src="{{asset('images/google-play.png')}}" alt="Google Play"></a></li>
                        <li><a href="#"><img src="{{asset('images/app-store.png')}}" alt="App Store"></a></li>
                    </ul>
                </div>
                <!-- Download App Button End -->

            </div>
            <!-- Download App Wrapper End -->

        </div>
    </div>
    <!-- Download App End -->

</x-guest-layout>
