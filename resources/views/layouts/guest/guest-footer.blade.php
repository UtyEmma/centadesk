<footer class="section footer-section">
    <div class="footer-widget-section">
        <img class="shape-1 animation-down" src="{{asset('images/shape/shape-21.png')}}" alt="Shape">

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 order-md-1 order-lg-1">
                    <div class="footer-widget">
                        <div class="widget-logo">
                            <a href="#"><img src="{{asset('images/libra-main.png')}}" width="150" alt="Logo"></a>
                        </div>

                        <div class="widget-address">
                            <h4 class="footer-widget-title">Caribbean Ct</h4>
                            <p>Haymarket, Virginia (VA).</p>
                        </div>

                        <ul class="widget-info">
                            <li>
                                <p> <i class="flaticon-email"></i> <a href="mailto:address@gmail.com">address@gmail.com</a> </p>
                            </li>
                            <li>
                                <p> <i class="flaticon-phone-call"></i> <a href="tel:9702621413">(970) 262-1413</a> </p>
                            </li>
                        </ul>

                        <ul class="widget-social">
                            <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                            <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                            <li><a href="#"><i class="flaticon-skype"></i></a></li>
                            <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- Footer Widget End -->

                </div>
                <div class="col-lg-6 order-md-3 order-lg-2">

                    <!-- Footer Widget Link Start -->
                    <div class="footer-widget-link">

                        <!-- Footer Widget Start -->
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Popular Categories</h4>

                            <ul class="widget-link">
                                @foreach ($data['categories'] as $category)
                                    <li><a href="/courses?category={{$category->slug}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                        <!-- Footer Widget End -->

                        <!-- Footer Widget Start -->
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Quick Links</h4>

                            <ul class="widget-link">
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                                <li><a href="/disclaimer">Disclaimer</a></li>
                                <li><a href="/terms">Terms & Conditions</a></li>
                                <li><a href="https://libraclass.tawk.help/" target="_blank">Help Center</a></li>
                                <li><a href="/faqs">Frequently Asked Questions</a></li>
                            </ul>

                        </div>
                        <!-- Footer Widget End -->

                    </div>
                    <!-- Footer Widget Link End -->

                </div>
                <div class="col-lg-3 col-md-6 order-md-2 order-lg-3">

                    <!-- Footer Widget Start -->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Currency</h4>

                        <div class="widget-subscribe">
                            {{-- <p>Lorem Ipsum has been them an industry printer took a galley make book.</p> --}}

                            <div class="widget-form">
                                <x-currency-select name="currency" :currency="$currency" :data="$data" class="" btnClasses="btn-light" />
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget End -->

                </div>
            </div>
        </div>

        <img class="shape-2 animation-left" src="{{asset('images/shape/shape-22.png')}}" alt="Shape">

    </div>
    <!-- Footer Widget Section End -->

    <!-- Footer Copyright Start -->
    <div class="footer-copyright " >
        <div class="container">

            <!-- Footer Copyright Start -->
            <div class="copyright-wrapper">
                <div class="copyright-link">
                    <a href="/terms">Terms of Service</a>
                    <a href="/privacy-policy">Privacy Policy</a>
                    <a href="{{asset('sitemap.xml')}}" >Sitemap</a>
                    <a href="#">Security</a>
                </div>
                <div class="copyright-text">
                    <p>&copy; 2021 <span> Edule </span> Made with <i class="icofont-heart-alt"></i> by <a href="#">Codecarnival</a></p>
                </div>
            </div>
            <!-- Footer Copyright End -->

        </div>
    </div>
    <!-- Footer Copyright End -->

</footer>
<!-- Footer End -->

<!--Back To Start-->
<a href="#" class="back-to-top" style="margin-bottom: 70px !important">
    <i class="icofont-simple-up"></i>
</a>
<!--Back To End-->
