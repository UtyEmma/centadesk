<div class="col-lg-4 col-md-6">
    <!-- Single Courses Start -->
    <div class="single-courses">
        <div class="courses-images">

            <a href="courses/{{$course->slug}}"><img src="{{json_decode($course->images)[0]}}" alt="Courses" class="img-fluid"></a>

            <div class="courses-option dropdown">
                <button class="option-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icofont-share-alt"></i> Share</a></li>
                    <li><a href="#"><i class="icofont-plus"></i> Create Collection</a></li>
                    <li><a href="#"><i class="icofont-star"></i> Favorite</a></li>
                    <li><a href="#"><i class="icofont-archive"></i> Archive</a></li>
                </ul>
            </div>
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
    <!-- Single Courses End -->
</div>
