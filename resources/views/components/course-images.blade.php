<script>
    var edule = new Swiper('.course-images .swiper-container', {
        speed: 600,
        spaceBetween: 30,
        navigation: {
            nextEl: '.students-active .swiper-button-next',
            prevEl: '.students-active .swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            1600: {
                slidesPerView: 1,
            }
        },
    });
</script>



<div class="course-images mt-0">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- Single Reviews Start -->
            <div class="swiper-slide">
                @foreach ($images as $key => $image)
                    <img src="{{json_decode($images)}}" alt="{{$alt ?? ''}}">

                    @if ($key === 0)
                        <div class="courses-play">
                            <img src="{{asset('images/courses/circle-shape.png')}}" alt="Play">
                            <a class="play video-popup" href="{{$video}}"><i class="flaticon-play"></i></a>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- Single Images -->

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>
