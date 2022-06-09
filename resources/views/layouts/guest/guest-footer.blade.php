<footer class="section footer-section">
    <div class="footer-widget-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 order-md-1 order-lg-1">
                    <div class="footer-widget">
                        <div class="widget-logo">
                            <a href="/"><img src="{{asset('images/libra-main.png')}}" width="150" alt="Logo"></a>
                        </div>

                        <div class="widget-address">
                            <p>{{env('LIBRACLASS_ADDRESS')}}.</p>
                        </div>

                        <ul class="widget-info">
                            <li>
                                <p> <i class="flaticon-email"></i> <a href="mailto:{{env('LIBRACLASS_EMAIL')}}">{{env('LIBRACLASS_EMAIL')}}</a> </p>
                            </li>
                            <li>
                                <p> <i class="flaticon-phone-call"></i> <a href="tel:{{env('LIBRACLASS_PHONE')}}">{{env('LIBRACLASS_PHONE')}}</a> </p>
                            </li>
                        </ul>

                        <ul class="widget-social">
                            <li><a href="{{env('FACEBOOK_PROFILE_URL')}}{{env('LIBRACLASS_FACEBOOK')}}" target="_blank"><i class="flaticon-facebook"></i></a></li>
                            <li><a href="{{env('TWITTER_PROFILE_URL')}}{{env('LIBRACLASS_TWITTER')}}" target="_blank"><i class="flaticon-twitter"></i></a></li>
                            <li><a href="{{env('INSTAGRAM_PROFILE_URL')}}{{env('LIBRACLASS_INSTAGRAM')}}" target="_blank"><i class="flaticon-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 order-md-3 order-lg-2">
                    <div class="footer-widget-link">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Popular Categories</h4>

                            <ul class="widget-link">
                                @foreach ($data['categories'] as $category)
                                    <li><a href="/courses?category={{$category->slug}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Quick Links</h4>

                            <ul class="widget-link">
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                                <li><a href="/disclaimer">Disclaimer</a></li>
                                <li><a href="/terms">Terms & Conditions</a></li>
                                <li><a href="https://libraclass.tawk.help/" target="_blank">Help Center</a></li>
                                <li><a href="/faqs">Frequently Asked Questions</a></li>
                                <li><a href="/contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6 order-md-2 order-lg-3">

                    <!-- Footer Widget Start -->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Currency</h4>

                        <div class="widget-subscribe">
                            <div class="widget-form">
                                <p class="mb-1">Update Currency</p>
                                <x-currency-select name="currency" :currency="$currency" :data="$data" class="w-100" btnClasses="btn-light w-100 mt-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright " >
        <div class="container">
            <div class="copyright-wrapper">
                <div class="copyright-link">
                    <a href="/terms">Terms of Service</a>
                    <a href="/privacy-policy">Privacy Policy</a>
                    <a href="{{asset('sitemap.xml')}}" >Sitemap</a>
                    <a href="/disclaimer">Disclaimer</a>
                </div>
                <div class="copyright-text">
                    <p>&copy; {{Date::now()->format("Y")}} <a href="/"> {{env('APP_NAME')}}. </a> Powered by {{env('PARENT_COMPANY')}}.
                    </p>
                </div>
            </div>
            </div>
    </div>
</footer>
<!-- Footer End -->

<!--Back To Start-->
<a href="#" class="back-to-top" style="margin-bottom: 70px !important">
    <i class="icofont-simple-up"></i>
</a>
<!--Back To End-->
