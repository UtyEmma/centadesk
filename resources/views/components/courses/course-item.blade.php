<div class="col-lg-4 col-md-6">
    <div class="single-courses">
        <div class="courses-images">
            <a href="courses/{{$course->slug}}"><img src="{{json_decode($course->images)[0]}}" alt="Courses" class="img-fluid"></a>
        </div>
        <div class="courses-content">
            <div class="courses-author">
                <div class="author">
                    <div class="rounded-img">
                        <a href="#"><img src="{{$mentor->avatar ?? asset('images/author/author-01.jpg')}}" alt="Author"></a>
                    </div>
                    <div class="author-name">
                        <a class="name lh-0 mb-0" style="font-weight: 500; margin-bottom: 0;" href="/mentor/{{$mentor->username}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                        <p class="my-0 lh-0" style="font-size: 12px; margin-top: 0;">{{$mentor->specialty}}</p>
                    </div>
                </div>
            </div>

            <h4 class="title"><a href="courses/{{$course->slug}}">{{$course->name}}</a></h4>

            <div class="courses-rating">
                <p>Starts in 2 days</p>

                <div class="rating-progress-bar">
                    <div class="rating-line" style="width: 80%;"></div>
                </div>

                <div class="rating-meta">
                    <span class="rating-star">
                            <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                    </span>
                    <p>Enroll Now</p>
                </div>
            </div>
        </div>
    </div>
</div>
