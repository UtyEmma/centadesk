<x-guest-layout>
    <x-page-title title="Our Blog - News and Information for You" />
    <x-page-banner>
        <div class="d-md-flex justify-content-between align-items-end">
            <div class="m-0 page-banner-content w-100 d-md-flex justify-content-between align-items-end">
                <div>
                    <h3 class="title mt-0 pb-0">Blog</h3>
                </div>
            </div>
        </div>
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <!-- Courses Wrapper Start  -->
            <div class="courses-wrapper-02 mt-0 pt-0">
                <div class="row">
                    @forelse ($posts as $post)
                        <x-blog-post :post="$post"/>
                    @empty
                            <div class="text-center">
                                <img src="{{asset('images/states/empty-courses.svg')}}" />
                                <h5>No results found.</h5>
                                <p class="px-5">Please check your filters again or click the button below to view all courses.</p>
                                <a href="/courses" class="btn btn-primary btn-hover-dark btn-custom w-auto">All Courses</a>
                            </div>
                    @endforelse
                </div>

                <div class="d-flex justify-content-center">
                    {{ $posts->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
