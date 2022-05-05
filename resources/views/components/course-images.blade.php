@inject('link', 'App\Library\Links')
<div id="course-images" class="w-100 courses-active courses-details-images overflow-hidden radius position-relative">
    <div class="swiper-slide">
        <img src="{{$image}}" alt="{{$alt ?? ''}}" />
        <div class="courses-play">
            <img src="{{asset('images/courses/circle-shape.png')}}" class="" alt="Play">
            <a class="play video-popup" href="{{$link::youtubeEmbedded($video)}}"><i class="flaticon-play"></i></a>
        </div>
    </div>
</div>
