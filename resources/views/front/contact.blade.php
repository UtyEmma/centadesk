<x-guest-layout>
    <x-page-title title="Contact Us - Libraclass" />
    <div class="section page-banner bg-transparent">
        <div class="container mt-5">
            <div class="page-banner-content py-5">
                <ul class="breadcrumb mt-5">
                    <li><a href="#">Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
                <h2 class="title">Contact <span>Us</span></h2>
            </div>
        </div>
    </div>

    <!-- Contact Map Start -->
    <div class="section section-padding-02">
        <div class="container">

            <!-- Contact Map Wrapper Start -->
            <div class="contact-map-wrapper">
                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
            <!-- Contact Map Wrapper End -->

        </div>
    </div>
    <!-- Contact Map End -->

    <!-- Contact Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Contact Wrapper Start -->
            <div class="contact-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">

                        <!-- Contact Info Start -->
                        <div class="contact-info">

                            <img class="shape animation-round" src="{{asset('images/shape/shape-12.png')}}" alt="Shape">

                            <!-- Single Contact Info Start -->
                            <div class="single-contact-info">
                                <div class="info-icon">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <div class="info-content">
                                    <h6 class="title">Phone No.</h6>
                                    <p><a href="tel:88193326867">{{env('LIBRACLASS_PHONE')}}</a></p>
                                </div>
                            </div>
                            <!-- Single Contact Info End -->
                            <!-- Single Contact Info Start -->
                            <div class="single-contact-info">
                                <div class="info-icon">
                                    <i class="flaticon-email"></i>
                                </div>
                                <div class="info-content">
                                    <h6 class="title">Email Address.</h6>
                                    <p><a href="mailto:edule100@gmail.com">{{env('LIBRACLASS_EMAIL')}}</a></p>
                                </div>
                            </div>
                            <!-- Single Contact Info End -->
                            <!-- Single Contact Info Start -->
                            <div class="single-contact-info">
                                <div class="info-icon">
                                    <i class="flaticon-pin"></i>
                                </div>
                                <div class="info-content">
                                    <h6 class="title">Office Address.</h6>
                                    <p>{{env('LIBRACLASS_ADDRESS')}}</p>
                                </div>
                            </div>
                            <!-- Single Contact Info End -->
                        </div>
                        <!-- Contact Info End -->

                    </div>
                    <div class="col-lg-6">

                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <h3 class="title">Get in Touch <span>With Us</span></h3>

                            <div class="form-wrapper">
                                <form action="/contact/send" method="POST">
                                    @csrf
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="text" name="name" placeholder="Name">
                                        <x-errors name="name" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="email" name="email" placeholder="Email">
                                        <x-errors name="email" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input type="text" name="subject" placeholder="Subject">
                                        <x-errors name="subject" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <textarea name="message" placeholder="Message"></textarea>
                                        <x-errors name="message" />
                                    </div>
                                    <!-- Single Form End -->
                                    <p class="form-message"></p>
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <button class="btn btn-primary btn-hover-dark w-100">Send Message <i class="flaticon-right"></i></button>
                                    </div>
                                    <!-- Single Form End -->
                                </form>
                            </div>
                        </div>
                        <!-- Contact Form End -->

                    </div>
                </div>
            </div>
            <!-- Contact Wrapper End -->

        </div>
    </div>
    <!-- Contact End -->
</x-guest-layout>
