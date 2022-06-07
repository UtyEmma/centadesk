<x-guest-layout>
    <x-page-title title="Register on Libraclass" />

    <div class="section page-banner py-0 pt-5 pb-0 px-0 w-100 bg-transparent">
        <div class="container pt-5 w-100">
            <div class="pt-5 px-0 banner-header"></div>
        </div>
    </div>

    <div class="section section-padding pt-md-3 pt-0 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 d-lg-block d-none">
                    <!-- Register & Login Images Start -->
                    <div class="register-login-images h-100 my-0">
                        <div class="shape-1">
                            <img src="{{asset('images/shape/shape-26.png')}}" alt="Shape">
                        </div>


                        <div class="images h-100">
                            <img src="{{asset('images/register-login.png')}}" alt="Register Login">
                        </div>
                    </div>
                    <!-- Register & Login Images End -->
                </div>
                <div class="col-lg-5 col-md-7 mx-auto pt-4">
                    <!-- Register & Login Form Start -->
                    <div class="register-login-form mx-0 mt-0">
                        <h3 class="title pb-0 d-md-block d-none">Lets get you <span>Started</span></h3>

                        <div class="form-wrapper w-100 pb-lg-5 pt-3">
                            <form action="/register?redirect={{request()->redirect}}" method="POST">
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

                                <p class="text-center mt-3 mb-0" style="font-weight: 500;">or Sign Up with your details</p>

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
                                    <x-errors name="password" />
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <button type="submit" class="btn btn-primary btn-hover-dark w-100">Create an account</button>
                                </div>
                                <!-- Single Form End -->
                                <p class="mt-5 text-center">Already have an account? <a href="/login?redirect={{request()->redirect}}" class="text-primary" style="font-weight: 500;">Login Here</a></p>
                            </form>
                        </div>
                    </div>
                    <!-- Register & Login Form End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Register & Login End -->
</x-guest-layout>
