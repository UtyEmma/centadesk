<x-guest-layout>
    <x-page-banner>
        <div class="d-md-flex justify-content-between align-items-center">
            <div class="page-banner-content m-0">
                <ul class="breadcrumb mb-0">
                    <li><a href="/">Home</a></li>
                    <li class="active">Mentors</li>
                </ul>
                <h4 class="title mt-0">Mentors</h4>
            </div>

            <div class="courses-category-wrapper p-0 m-0" style="z-index: 11;">
                <form action="/mentors" method="GET" class="courses-search search-2 m-0" >
                    <input name="keyword" type="text" placeholder="Search for Mentors">
                    <button type="submit"><i class="icofont-search"></i></button>
                </form>
            </div>
        </div>
    </x-page-banner>

    <div class="section section-padding pt-0">
        <div class="container">
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
        </div>
    </div>
</x-guest-layout>
