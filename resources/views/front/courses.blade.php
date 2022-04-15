<x-guest-layout>

    <x-page-banner>
        <div class="d-md-flex justify-content-between align-items-center">
            <!-- Page Banner Start -->
            <div class="m-0">
                <ul class="breadcrumb mb-0">
                    <li><a href="/">Home</a></li>
                    <li class="active">Courses</li>
                </ul>
                <h4 class="title mt-0">Courses</h4>
            </div>
            <!-- Page Banner End -->

            <div class="courses-category-wrapper p-0 m-0" style="z-index: 11;">
                <form action="/courses" method="GET" class="courses-search search-2 m-0" >
                    <input name="keyword" type="text" placeholder="Search here">
                    <button type="submit"><i class="icofont-search"></i></button>
                </form>
            </div>
        </div>


        <div class="courses-category-wrapper w-100 d-block p-0">
            <div class="w-100">
                <ul class="category-menu p-0">
                    <li><a class="active" href="#">All Courses</a></li>
                    <li><a href="#">Popular Courses</a></li>
                    <li><a href="#">Suggested</a></li>
                </ul>
            </div>
        </div>
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <!-- Courses Wrapper Start  -->
            <div class="courses-wrapper-02">
                <div class="row">
                    @if (count($courses) > 0)
                        @foreach ($courses as $course)
                            <div class="col-lg-4 col-md-6">
                                <x-courses.single-course-card :course="$course" :mentor="$course->mentor" />
                            </div>
                                {{-- <x-courses.course-item  /> --}}
                        @endforeach
                    @else
                        <div class="text-center">
                            <h4>There are no courses available at this time</h4>
                            <p>You can start earning money teaching the things you love</p>

                            <a href="{{Auth::user() ? '/mentor/onboarding' : '/register'}}" class="btn btn-primary w-auto">Start Creating Courses</a>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Courses Wrapper End  -->

        </div>
    </div>
    <!-- Courses End -->

</x-guest-layout>
