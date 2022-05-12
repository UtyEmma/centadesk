<!-- Testimonial End -->
<div class="section section-padding-02 mt-n1">
    <div class="container">
        <div class="section-title shape-03 text-center">
            <h5 class="sub-title">Student Testimonial</h5>
            <h2 class="main-title">Feedback From <span> Student</span></h2>
        </div>

        <div class="testimonial-wrapper testimonial-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    @foreach ($testimonials as $testimonial)
                        <div class="single-testimonial swiper-slide">
                            <div class="testimonial-author">
                                <div class="author-thumb">
                                    <img src="{{$testimonial->image ?? asset('images/icon/user.png')}}" style="object-fit: cover; min-height: 90px;"  alt="{{$testimonial->name}}">
                                    <i class="icofont-quote-left"></i>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <p>{{$testimonial->feedback}}</p>
                                <h4 class="name">{{$testimonial->name}}</h4>
                                <span class="designation">{{$testimonial->occupation}}, {{$testimonial->location}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>

    </div>
</div>
