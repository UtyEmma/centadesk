<x-guest-layout :data="$data">
    <x-page-title title="Forgot your Password" />
    <!-- Page Banner Start -->
    <div class="section page-banner py-0 pt-5 pb-0 px-0 w-100 bg-transparent">
        <div class="container mt-5 pt-5 w-100">
            <div class="pt-5 px-0 banner-header">
            </div>
        </div>
    </div>
    <!-- Page Banner End -->

    <!-- Register & Login Start -->
    <div class="section section-padding pt-md-3 pt-5 pt-md-0 mt-0">
        <div class="container">

            <!-- Register & Login Wrapper Start -->
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-7 mx-auto mt-0">

                        <!-- Register & Login Form Start -->
                        <div class="register-login-form mx-0 mt-0 mt-lg-5 p-5 border radius ">
                            <h3 class="title">Forgot your <span>Password?</span></h3>
                            <div class="mt-2">
                                <p>No problem! Let us know your email address and we will send you a password reset link.</p>
                            </div>

                            <div class="form-wrapper w-100 pb-lg-5 pt-3">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="email" name="email" placeholder="Email Address" value="{{old('email')}}" required autofocus>
                                        @error('email')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->

                                    <!-- Single Form Start -->
                                    <div class="single-form mt-2">
                                        <button type="submit" class="btn btn-primary btn-hover-dark w-100">Email Password Reset Link</button>
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
