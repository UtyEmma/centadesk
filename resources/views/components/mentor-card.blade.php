    <!-- Single Team Start -->
    <div class="single-team py-5 mt-0 radius border {{$class}}">
        <div class="col-5 mx-auto">
            <div class="team-thumb ratio ratio-1x1" style="position: relative; ">
                <img src="{{$mentor->avatar ?? asset('images/author/author-04.jpg')}}" class="ratio ratio-1x1 img-cover" alt="Author">
            </div>
        </div>
        <div class="team-content mb-0">
            <h4 class="name">{{$mentor->firstname}} {{$mentor->lastname}}</h4>
            <span class="designation">{{$mentor->specialty}}</span>
        </div>
        <div class="single-courses border-0 py-0 mt-0">
            <div class="courses-content py-0">
                <div class="courses-meta">
                    <span> <i class="icofont-clock-time"></i> 29 Courses</span>
                    <span> <i class="icofont-read-book"></i> 29 Batches </span>
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
        </div>
    </div>
    <!-- Single Team End -->
