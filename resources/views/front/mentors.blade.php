<x-guest-layout>

    <x-page-banner>
        <div class="d-md-flex justify-content-between align-items-center">
            <!-- Page Banner Start -->
            <div class="m-0">
                <ul class="breadcrumb mb-0">
                    <li><a href="/">Home</a></li>
                    <li class="active">Mentors</li>
                </ul>
                <h4 class="title mt-0">Mentors</h4>
            </div>
            <!-- Page Banner End -->

            <div class="courses-category-wrapper p-0 m-0" style="z-index: 11;">
                <form action="/mentors" method="GET" class="courses-search search-2 m-0" >
                    <input name="keyword" type="text" placeholder="Search here">
                    <button type="submit"><i class="icofont-search"></i></button>
                </form>
            </div>
        </div>


        <div class="courses-category-wrapper w-100 d-block p-0">
            <div class="w-100">
                <ul class="category-menu p-0">
                    <li><a class="active" href="#">All Mentors</a></li>
                    <li><a href="#">Top Mentors</a></li>
                    <li><a href="#">Suggested</a></li>
                </ul>
            </div>
        </div>
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <!-- Courses Wrapper Start  -->
            <div class="courses-wrapper-02 px-md-0 px-4">
                <div class="row">
                    @if (count($mentors) > 0)
                        @foreach ($mentors as $mentor)
                            <div class="col-md-4">
                                <x-mentor-card :mentor="$mentor" :class="''" />
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            <h4>There are no mentors available at this time</h4>
                            <p>You can start earning money teaching the things you love</p>

                            <a href="{{Auth::user() ? '/mentor/onboarding' : '/register'}}" class="btn btn-primary w-auto">Become a Mentor</a>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Courses Wrapper End  -->

        </div>
    </div>
    <!-- Courses End -->

</x-guest-layout>
