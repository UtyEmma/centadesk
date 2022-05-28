<x-guest-layout>
    <x-page-title title="Courses - Find Amazing courses based on what you are interested in" />
    <x-page-banner>
        <div class="d-md-flex justify-content-between align-items-end">
            <!-- Page Banner Start -->
            <div class="m-0 page-banner-content">
                <h4 class="title mt-0 pb-0">Courses</h4>
                <ul class="d-flex mb-0">
                    <li class="me-3 "><a class="btn btn-primary btn-hover-dark btn-custom" href="/courses">All Courses</a></li>
                    <li class="active me-3"><a class="btn btn-secondary btn-hover-primary btn-custom" href="/courses?filter=suggestions">Suggested Courses</a></li>
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
                            @if($user)
                                <div class="sidebar-widget mt-5 mt-md-0">
                                    <div class="widget-tags mt-3 p-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <h6>Your Interests</h6>
                                            <a href="/"><small>Update Interests</small></a>
                                        </div>
                                        <ul class="tags-list">
                                            @foreach ($user->interests as $interest)
                                                <li>
                                                    <a class="px-3" href="/courses?category={{Str::slug($interest)}}">{{$interest}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="sidebar-widget mt-5">
                                <h5>Top Categories</h5>

                                <div class="widget-category mt-3">
                                    <ul class="category-list">
                                        @forelse ($categories as $category)
                                            <li><a href="/courses?category={{$category->slug}}">{{$category->name}} <span>({{$category->get_courses_count}})</span></a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</x-guest-layout>
