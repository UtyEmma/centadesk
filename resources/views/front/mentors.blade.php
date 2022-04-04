<x-guest-layout>

    <x-page-banner>
        <x-slot name="current">
            Mentors
        </x-slot>
        <x-slot name="title">
            Available <span>Mentors</span>
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
            </div>
            <!-- Courses Category Wrapper End  -->

            <!-- Courses Wrapper Start  -->
            <div class="courses-wrapper-02">
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
