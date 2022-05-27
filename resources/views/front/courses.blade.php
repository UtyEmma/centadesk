<x-guest-layout>
    <x-page-title title="Courses - Find Amazing courses based on what you are interested in" />
    <x-page-banner>
        <div class="d-md-flex justify-content-between align-items-center">
            <!-- Page Banner Start -->
            <div class="m-0 page-banner-content">
                <h4 class="title mt-0 pb-0">Courses</h4>
                <ul class="breadcrumb  mb-0">
                    <li><a href="/">Home</a></li>
                    <li class="active">Courses</li>
                </ul>
            </div>
            <!-- Page Banner End -->

            <div class="courses-category-wrapper p-0 m-0" style="z-index: 11;">
                <form action="/courses" method="GET" class="courses-search search-2 m-0" >
                    <input name="keyword" type="text" placeholder="Search for courses...">
                    <button type="submit"><i class="icofont-search"></i></button>
                </form>
            </div>
        </div>
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding pt-4">
        <div class="container">
            <!-- Courses Wrapper Start  -->
            <div class="courses-wrapper-02 mt-0 pt-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            @forelse ($courses as $course)
                                <div class="col-md-6">
                                    <x-courses.single-course-card :course="$course" :mentor="$course->mentor" />
                                </div>
                            @empty
                                <div class="text-center">
                                    <img src="{{asset('images/states/empty-courses.svg')}}" />
                                    <h4>There are no courses available at this time</h4>
                                    <p class="px-5">Sign up as a Mentor to start earning money teaching the things you love</p>

                                    <a href="{{Auth::user() ? '/mentor/onboarding' : '/register'}}" class="btn btn-primary btn-hover-dark btn-custom w-auto">Start Creating Courses</a>
                                </div>
                            @endforelse
                        </div>

                        <div class="d-flex justify-content-center">
                            {{ $courses->onEachSide(5)->links() }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Blog Sidebar Start -->
                        <div class="sidebar">
                            <!-- Sidebar Widget Category Start -->
                            <div class="sidebar-widget mt-0">
                                <h5>Categories</h5>

                                <div class="widget-category mt-3">
                                    <ul class="category-list">
                                        <li><a href="#">UI/UX Design <span>(16)</span></a></li>
                                        <li><a href="#">Creative Writing <span>(03)</span></a></li>
                                        <li><a href="#">Graphic Design <span>(08)</span></a></li>
                                        <li><a href="#">Fine Arts <span>(18)</span></a></li>
                                        <li><a href="#">Business Analytics <span>(02)</span></a></li>
                                        <li><a href="#">Marketing <span>(14)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Widget Category End -->

                            <!-- Sidebar Widget Tags Start -->
                            <div class="sidebar-widget mt-5">
                                <h5>Popular Tags</h5>

                                <div class="widget-tags mt-3">
                                    <ul class="tags-list">
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Education</a></li>
                                        <li><a href="#">Education</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Education</a></li>
                                        <li><a href="#">Education</a></li>
                                        <li><a href="#">Design</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar Widget Tags End -->
                        </div>
                        <!-- Blog Sidebar End -->
                    </div>
                </div>

            </div>
            <!-- Courses Wrapper End  -->

        </div>
    </div>
    <!-- Courses End -->

</x-guest-layout>
