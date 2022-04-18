    <!-- Single Team Start -->
    <div class="single-team py-5 mt-0 radius border {{$class}}">
        <div class="col-5 mx-auto">
            <div class="team-thumb ratio ratio-1x1" style="position: relative;">
                <img src="{{$mentor->avatar ?? asset('images/author/author-04.jpg')}}" class="ratio ratio-1x1 img-cover" alt="Author">
            </div>
        </div>
        <div class="team-content mb-0">
            <h4 class="name">
                <a href="/mentors/{{$mentor->username}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
            </h4>
            <span class="designation mt-0">{{$mentor->specialty}}</span>
        </div>
        <div class="single-courses border-0 py-0 mt-0">
            <div class="courses-content py-0">
                <div class="courses-meta">
                    <span> <i class="icofont-clock-time"></i> {{$mentor->total_courses}} Courses</span>
                    <span> <i class="icofont-read-book"></i> {{$mentor->total_batches}} Batches </span>
                </div>
                <div class="courses-price-review ">
                    <div class="courses-review d-flex justify-content-between w-100 align-items-center">
                        <div>
                            <span class="rating-count">{{$mentor->avg_rating}}.0</span>
                            <span class="rating-star">
                                    <span class="rating-bar" style="width: {{$mentor->avg_rating * 20}}%;"></span>
                            </span>
                        </div>

                        <small class="text">({{$mentor->total_reviews}} reviews)</small>
                    </div>
                </div>
            </div>

            @if ($btn)
                <div class="mt-2">
                    <a href="/mentors/{{$mentor->username}}" class="btn btn-primary w-100 btn-hover-dark">Visit Profile</a>
                </div>
            @endif
        </div>
    </div>
    <!-- Single Team End -->
