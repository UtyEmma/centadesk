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
            {{-- <div class="courses-category-wrapper"> --}}
                <div class="courses-search search-2">
                    <input type="text" placeholder="Search here">
                    <button><i class="icofont-search"></i></button>
                </div>
            {{-- </div> --}}
            <!-- Courses Category Wrapper End  -->

            <!-- Courses Wrapper Start  -->
            <div class="courses-wrapper-02">
                <div class="row">
                    @foreach ($mentors as $mentor)
                        <div class="col-md-4">
                            <x-mentor-card :mentor="$mentor" :class="" />
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Courses Wrapper End  -->

        </div>
    </div>
    <!-- Courses End -->

</x-guest-layout>
