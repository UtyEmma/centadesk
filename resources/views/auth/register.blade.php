<x-guest-layout>
    <x-page-banner>
        <x-slot name="current">
            Register
        </x-slot>
        <x-slot name="title">
            Create your <span>Account</span>
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
                            <h3 class="title">Registration <span>Now</span></h3>

                            <div class="form-wrapper">
                                <form action="/register" method="POST">
                                    @csrf
                                    <!-- Single Form Start -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-form">
                                                <input type="text" name="firstname" value="{{old('firstname')}}" placeholder="First Name">
                                                <x-errors name="firstname" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-form">
                                                <input type="text" name="lastname" value="{{old('lastname')}}" placeholder="Last Name">
                                                <x-errors name="lastname" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="email" name="email" value="{{old('email')}}" placeholder="Email">
                                        <x-errors name="email" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="password" name="password" value="{{old('password')}}" placeholder="Password">
                                        <x-errors name="email" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <button type="submit" class="btn btn-primary btn-hover-dark w-100">Create an account</button>

                                        <p class="text-center my-3">
                                            or
                                        </p>

                                        <x-google-btn>Register with Google</x-google-btn>
                                        <x-facebook-btn>Register with Facebook</x-facebook-btn>
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
</x-guest-layout>
