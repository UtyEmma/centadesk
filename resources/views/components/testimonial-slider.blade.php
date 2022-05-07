<!-- Testimonial End -->
<div class="section section-padding-02 mt-n1">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title shape-03 text-center">
            <h5 class="sub-title">Student Testimonial</h5>
            <h2 class="main-title">Feedback From <span> Student</span></h2>
        </div>
        <!-- Section Title End -->

        <!-- Testimonial Wrapper End -->
        <div class="testimonial-wrapper testimonial-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- Single Testimonial Start -->
                    @foreach ($testimonials as $testimonial)
                        <div class="single-testimonial swiper-slide">
                            <div class="testimonial-author">
                                <div class="author-thumb">
                                    <img src="{{$testimonial->image ?? asset('images/icon/user.png')}}" alt="{{$testimonial->name}}">
                                    <i class="icofont-quote-left"></i>
                                </div>

                                {{-- <span class="rating-star">
                                        <span class="rating-bar" style="width: 80%;"></span>
                                </span> --}}
                            </div>
                            <div class="testimonial-content">
                                <p>{{$testimonial->feedback}}</p>
                                <h4 class="name">{{$testimonial->name}}</h4>
                                <span class="designation">{{$testimonial->occupation}}, {{$testimonial->location}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- Testimonial Wrapper End -->

    </div>
</div>
<!-- Testimonial End -->
