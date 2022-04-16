<x-guest-layout>

    <x-page-banner>
        <div class="d-md-flex justify-content-between align-items-center">
            <!-- Page Banner Start -->
            <div class="page-banner-content m-0">
                <ul class="breadcrumb mb-0">
                    <li><a href="/">Home</a></li>
                    <li class="active">Mentors</li>
                </ul>
                <h4 class="title mt-0">Mentors</h4>
            </div>
            <!-- Page Banner End -->

            <div class="courses-category-wrapper p-0 m-0" style="z-index: 11;">
                <form action="/mentors" method="GET" class="courses-search search-2 m-0" >
                    <input name="keyword" type="text" placeholder="Search for Mentors">
                    <button type="submit"><i class="icofont-search"></i></button>
                </form>
            </div>
        </div>

        <!-- All Courses Tabs Menu Start -->
        <div class="courses-tabs-menu courses-active mt-2">
            <div class="swiper-container">
                <ul class="swiper-wrapper nav">
                    <li class="swiper-slide">
                        <a href="#">
                            <button class="active w-100 btn btn-hover-light" >All Mentors</button>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#">
                            <button class="w-100 btn btn-hover-light" >Top Mentors</button>
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#">
                            <button class="w-100 btn btn-hover-light" >Suggested for You</button>
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
            <div class="courses-wrapper-02 px-md-0 px-4">
                <div class="row">
                    @forelse ($mentors as $mentor)
                        <div class="col-md-4">
                            <x-mentor-card :mentor="$mentor" :class="''" :btn="true" />
                        </div>
                    @empty
                        <div class="text-center">
                            <img src="{{asset('images/states/empty-mentors.svg')}}" />
                            <h4>There are no mentors found at the moment</h4>
                            <p>Sign up as a Mentor to start earning money teaching the things you love</p>

                            <a href="{{Auth::user() ? '/mentor/onboarding' : '/register'}}" class="btn btn-primary w-auto">Become a Mentor</a>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- Courses Wrapper End  -->

        </div>
    </div>
    <!-- Courses End -->

</x-guest-layout>
