<!-- Single Courses Start -->
<div class="single-courses">
    <div class="courses-images position-relative" style="height: 200px">
        <a href="courses/{{$course->slug}}">
            <img class="img-cover" src="{{json_decode($course->images)[0] ?? asset('images/courses/courses-01.jpg')}}" alt="Courses">
        </a>
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
                <i class="icofont-read-book"></i> {{$course->total_batches}} {{$course->no_batches}}
            </span>
        </div>
        <div class="courses-price-review">
            <span>
                <i class="icofont-comment"></i>
                <small>
                    {{$course->reviews}} {{$course->no_reviews}}
                </small>
            </span>
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
