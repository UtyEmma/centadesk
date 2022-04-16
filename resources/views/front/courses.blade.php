<x-guest-layout>

    <x-page-banner>
        <div class="d-md-flex justify-content-between align-items-center">
            <!-- Page Banner Start -->
            <div class="m-0 page-banner-content">
                <ul class="breadcrumb  mb-0">
                    <li><a href="/">Home</a></li>
                    <li class="active">Courses</li>
                </ul>
                <h4 class="title mt-0">Courses</h4>
            </div>
            <!-- Page Banner End -->

            <div class="courses-category-wrapper p-0 m-0" style="z-index: 11;">
                <form action="/courses" method="GET" class="courses-search search-2 m-0" >
                    <input name="keyword" type="text" placeholder="Search for courses...">
                    <button type="submit"><i class="icofont-search"></i></button>
                </form>
            </div>
        </div>

         <!-- All Courses Tabs Menu Start -->
         <div class="courses-tabs-menu courses-active mt-2 mx-0">
            <div class="swiper-container">
                <ul class="swiper-wrapper nav">
                    <li class="swiper-slide">
                        <a href="#">
                            <button class="active w-100 btn btn-hover-light" href="#" >All Courses</button>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#">
                            <button class="w-100 btn btn-hover-light" href="#" >Popular Courses</button>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#">
                            <button class="w-100 btn btn-hover-light" href="#" >Suggested for You</button>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-button-next"><i class="icofont-rounded-right"></i></div>
            <div class="swiper-button-prev"><i class="icofont-rounded-left"></i></div>
        </div>
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <!-- Courses Wrapper Start  -->
            <div class="courses-wrapper-02">
                <div class="row">
                    @forelse ($courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <x-courses.single-course-card :course="$course" :mentor="$course->mentor" />
                        </div>
                    @empty
                        <div class="text-center">
                            <img src="{{asset('images/states/empty-courses.svg')}}" />
                            <h4>There are no courses available at this time</h4>
                            <p class="px-5">Sign up as a Mentor to start earning money teaching the things you love</p>

                            <a href="{{Auth::user() ? '/mentor/onboarding' : '/register'}}" class="btn btn-primary w-auto">Start Creating Courses</a>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- Courses Wrapper End  -->

        </div>
    </div>
    <!-- Courses End -->

</x-guest-layout>
