<x-guest-layout :data="$data">
    <x-page-title title="Reset Your Password" />
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
                            <h3 class="title">Reset your <span>Password?</span></h3>
                            <div class="mt-2">
                                <p>Please set a new password for your account.</p>
                            </div>

                            <div class="form-wrapper w-100 pb-lg-5 pt-3">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="email" name="email" placeholder="Email Address" value="{{old('email', $request->email)}}" required autofocus>
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

                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password"  required autocomplete="current-password">
                                        @error('password_confirmation')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>


                                    <!-- Single Form Start -->
                                    <div class="single-form mt-2">
                                        <button type="submit" class="btn btn-primary btn-hover-dark w-100">{{__('Reset Password')}}</button>
                                    </div>
                                    <!-- Single Form End -->

                                    @if (!Auth::user())
                                        <p class="mt-5 text-center">Do not have an account? <a href="/register" class="text-primary" style="font-weight: 500;">Sign up here</a></p>
                                    @endif
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

</x-guest-layout>
