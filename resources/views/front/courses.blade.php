<x-guest-layout>

    <x-page-banner>
        <x-slot name="current">
            Courses
        </x-slot>
        <x-slot name="title">
            Available <span>Courses</span>
        </x-slot>
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Courses Category Wrapper Start  -->
            <div class="courses-category-wrapper">
                <div class="courses-search search-2">
                    <input type="text" placeholder="Search here">
                    <button><i class="icofont-search"></i></button>
                </div>

                <ul class="category-menu">
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
                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <!-- Single Courses Start -->
                            <div class="single-courses">
                                <div class="courses-images">
                                    <a href="classes/{{$course->slug}}"><img src="{{asset('images/courses/courses-01.jpg')}}" alt="Courses"></a>

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
                                                {{-- <a class="name" href="#">Jason Williams</a> --}}
                                                <a class="name" href="#">Ohula Malsh</a>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="title"><a href="classes/{{$course->slug}}">{{$course->name}}</a></h4>

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
                    @endforeach
                </div>
            </div>
            <!-- Courses Wrapper End  -->

        </div>
    </div>
    <!-- Courses End -->

</x-guest-layout>
