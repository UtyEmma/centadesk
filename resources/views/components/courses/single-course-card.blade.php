<div class="single-courses mt-0 mb-4">
    <div class="courses-images position-relative overflow-hidden radius" style="height: 200px">
        <a href="courses/{{$course->slug}}">
            <img class="img-cover" src="{{$course->images}}" alt="Courses">
        </a>

        <div class="light-tag position-absolute" style="right: 15px; bottom: 10px;">
            <a href="/courses?category={{Str::slug($course->category)}}">{{$course->category}}</a>
        </div>
    </div>
    <div class="courses-content pt-0">
        <h4 class="title mb-2"><a href="/courses/{{$course->slug}}">{{$course->name}}</a></h4>

        <div class="courses-author">
            <div class="author">
                <div class="author-thumb">
                    <a href="/mentors/{{$course->mentor->username}}" class="rounded-img">
                        <img src="{{$course->mentor->avatar ?? asset('images/icon/user.png')}}" alt="Author">
                    </a>
                </div>
                <div class="author-name">
                    <div>
                        <a class="mb-1 name" style="font-weight: 500; line-height: 2px;"  href="/mentors/{{$course->mentor->username}}">
                            {{$course->mentor->firstname}} {{$course->mentor->lastname}}
                            <span class="ms-0"><x-mentor-verified :status="$course->mentor->is_verified" /></span>
                        </a>
                        <p style="font-size: 12px; line-height: 1px;" class="mt-1 mb-2">{{$course->mentor->specialty}}</p>
                    </div>
                </div>
            </div>
        </div>


            <div class="mt-2 d-flex align-items-center">
                <x-layered-profile-images :users="$course->enrollments" />

                {{-- @if ($course->enrollments_count > 0)
                    <small class="ms-4">{{$course->enrollments_count}} {{Str::plural('Student', $course->enrollments_count)}}</small>
                @endif --}}
            </div>

        <div class="courses-price-review mt-2">
            <span>
                <i class="icofont-comment"></i>
                <small>
                    {{$course->all_reviews_count}} {{Str::plural('review', $course->all_reviews_count) }}
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
