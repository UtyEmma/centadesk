<x-student-layout>

    <!-- Courses Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Courses Category Wrapper Start  -->
            <div class="courses-category-wrapper">
                <div class="courses-search search-2">
                    <input type="text" placeholder="Search here">
                    <button><i class="icofont-search"></i></button>
                </div>

                <ul class="category-menu overflow-x-scroll w-100 ">
                    <li><a class="active" href="#">All Courses</a></li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="#">Archived</a></li>
                </ul>
            </div>
            <!-- Courses Category Wrapper End  -->

            <!-- Courses Wrapper Start  -->
            <div class="courses-wrapper-02">
                <div class="row">
                    @if (count($courses) > 0)
                        @foreach ($courses as $course)
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Courses Start -->
                                <div class="single-courses">
                                    <div class="courses-images">
                                        <a href="/profile/courses/{{$course->slug}}/{{$course->short_code}}"><img src="{{json_decode($course->images)[0] ?? asset('images/courses/courses-01.jpg')}}" alt="Courses"></a>

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
                                                <div class="author-thumb">
                                                    <a href="#"><img src="{{asset('images/author/author-01.jpg')}}" alt="Author"></a>
                                                </div>
                                                <div class="author-name">
                                                    <a class="name" href="#">{{$course->firstname}} {{$course->lastname}}</a>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="title"><a href="/profile/courses/{{$course->slug}}/{{$course->short_code}}">{{$course->name}}</a></h4>

                                        <div class="courses-rating">
                                            <p>38% Complete</p>

                                            <div class="rating-progress-bar">
                                                <div class="rating-line" style="width: 38%;"></div>
                                            </div>

                                            <div class="rating-meta">
                                                <span class="rating-star">
                                                        <span class="rating-bar" style="width: 80%;"></span>
                                                </span>
                                                <p>Your rating</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Courses End -->
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">You have not enrolled for any courses</div>
                        <a href="/classes" class="btn btn-primary mx-auto w-auto mt-5">Find Courses</a>
                    @endif
                </div>
            </div>
            <!-- Courses Wrapper End  -->

        </div>
    </div>
    <!-- Courses End -->

</x-student-layout>
