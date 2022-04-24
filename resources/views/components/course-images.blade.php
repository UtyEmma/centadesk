<script>
    $(document).ready(() => {
        new Swiper('#course-images', {
            speed: 600,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                }
            },
        });
    })
</script>

<div id="course-images" class="w-100 courses-active courses-details-images overflow-hidden radius position-relative">
    <div class="swiper-wrapper">
        @if (is_array($images))
            @forelse ($images as $key => $image )
                <div class="swiper-slide">
                    <img src="{{$image}}" alt="{{$alt ?? ''}}" />

                    @if ($key === 0)
                        <div class="courses-play">
                            <img src="{{asset('images/courses/circle-shape.png')}}" class="" alt="Play">
                            <a class="play video-popup" href="{{$video}}"><i class="flaticon-play"></i></a>
                        </div>
                    @endif
                </div>
        @empty

        @endforelse

        @endif
    </div>
    <div class="swiper-button-next">
        <i class="icofont-rounded-right"></i>
    </div>
    <div class="swiper-button-prev">
        <i class="icofont-rounded-left"></i>
    </div>
</div>
