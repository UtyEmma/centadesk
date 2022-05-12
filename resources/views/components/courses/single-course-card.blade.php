<!-- Single Courses Start -->
<div class="single-courses mt-0 mb-4">
    <div class="courses-images position-relative overflow-hidden radius" style="height: 200px">
        <a href="courses/{{$course->slug}}">
            <img class="img-cover" src="{{$course->images}}" alt="Courses">
        </a>

        <div class="light-tag position-absolute" style="right: 15px; bottom: 10px;">
            <a href="/courses?category={{Str::slug($course->category)}}">{{$course->category}}</a>
        </div>
    </div>
    <div class="courses-content">
        <div class="courses-author">
            <div class="author">
                <div class="author-thumb">
                    <a href="/mentors/{{$mentor->username}}" class="rounded-img">
                        <img src="{{$mentor->avatar ?? asset('images/icon/user.png')}}" alt="Author">
                    </a>
                </div>
                <div class="author-name">
                    <a class="name" href="/mentors/{{$mentor->username}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                    <x-mentor-verified :status="$mentor->is_verified" />
                </div>
            </div>
        </div>

        <h4 class="title"><a href="/courses/{{$course->slug}}">{{$course->name}}</a></h4>

        <div class="courses-price-review">
            <span>
                <i class="icofont-comment"></i>
                <small>
                    {{$course->reviews}} {{$course->no_reviews}}
                </small>
            </span>
            <div class="courses-review">
                <span class="rating-count">{{$course->rating}}.0</span>
                <span class="rating-star">
                        <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Single Courses End -->
