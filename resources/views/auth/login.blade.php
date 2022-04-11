<x-guest-layout :data="$data">

    <x-page-banner>
        <x-slot name="current">
            Login
        </x-slot>
        <x-slot name="title">
            Login <span>Form</span>
        </x-slot>
    </x-page-banner>

    <!-- Register & Login Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Register & Login Wrapper Start -->
            <div class="register-login-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">

                        <!-- Register & Login Images Start -->
                        <div class="register-login-images">
                            <div class="shape-1">
                                <img src="{{asset('images/shape/shape-26.png')}}" alt="Shape">
                            </div>


                            <div class="images">
                                <img src="{{asset('images/register-login.png')}}" alt="Register Login">
                            </div>
                        </div>
                        <!-- Register & Login Images End -->

                    </div>
                    <div class="col-lg-6">

                        <!-- Register & Login Form Start -->
                        <div class="register-login-form">
                            <h3 class="title">Login <span>Now</span></h3>

                            <div class="form-wrapper">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
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
                                        <label class="form-check-label" for="remember">
                                          Remember Me
                                        </label>
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <button type="submit" class="btn btn-primary btn-hover-dark w-100">Login</button>

                                        <hr class="my-5" />

                                        <x-google-btn>Login with Google</x-google-btn>
                                        <x-facebook-btn>Login with Facebook</x-facebook-btn>
                                    </div>
                                    <!-- Single Form End -->
                                </form>
                            </div>
                        </div>
                        <!-- Register & Login Form End -->

                    </div>
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
