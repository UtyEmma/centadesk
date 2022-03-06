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
                                                <input type="text" name="firstname" placeholder="First Name">
                                                @error('firstname')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-form">
                                                <input type="text" name="lastname" placeholder="Last Name">
                                                @error('lastname')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="email" name="email" placeholder="Email">
                                        @error('email')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="password" name="password" placeholder="Password">
                                        @error('password')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <button type="submit" class="btn btn-primary btn-hover-dark w-100">Create an account</button>
                                        <a class="btn btn-secondary btn-outline w-100" href="#">Sign up with Google</a>
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
