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
                <form action="/courses" method="GET" class="courses-search search-2">
                    <input name="keyword" type="text" placeholder="Search here">
                    <button type="submit"><i class="icofont-search"></i></button>
                </form>

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
