<x-guest-layout>

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
    <div class="section section-padding pt-0">
        <div class="container">
            <!-- Courses Wrapper Start  -->
            <div class="courses-wrapper-02 mt-0 py-0">
                <div class="row">
                            @forelse ($courses as $course)
                                <div class="col-md-4">
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
                </div>
            </div>
            <!-- Courses Wrapper End  -->

        </div>
    </div>
    <!-- Courses End -->

</x-guest-layout>
