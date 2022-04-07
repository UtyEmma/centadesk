<!-- Single Courses Start -->
<div class="single-courses">
    <div class="courses-images position-relative" style="height: 200px">
        <a href="courses/{{$course->slug}}">
            <img class="img-cover" src="{{json_decode($course->images)[0] ?? asset('images/courses/courses-01.jpg')}}" alt="Courses">
        </a>
        <div class="light-tag position-absolute" style="right: 15px; bottom: 0px;">
            <a href="#">{{$course->category}}</a>
        </div>
    </div>
    <div class="courses-content">
        <div class="courses-author">
            <div class="author">
                <div class="author-thumb">
                    <a href="#" class="rounded-img"><img src="{{$mentor->avatar ?? asset('images/author/author-01.jpg')}}" alt="Author"></a>
                </div>
                <div class="author-name">
                    <a class="name" href="#">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                </div>
            </div>
        </div>

        <h4 class="title"><a href="/courses/{{$course->slug}}">{{$course->name}}</a></h4>
        <div class="courses-meta">
            <span>
                <i class="icofont-read-book"></i>{{$course->total_batches}} {{$course->no_batches}}
            </span>
            <span>
                <i class="icofont-comment"></i>{{$course->reviews}} {{$course->no_reviews}}
            </span>
        </div>
        <div class="courses-price-review">
            <div class="courses-price">
                <span class="sale-parice">
                    $385.00
                </span>
                <span class="old-parice">
                    $440.00
                </span>
            </div>
            <div class="courses-review">
                <span class="rating-count">4.9</span>
                <span class="rating-star">
                        <span class="rating-bar" style="width: 80%;"></span>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Single Courses End -->
