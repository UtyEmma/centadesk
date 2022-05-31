<x-guest-layout>
    <x-page-title title="Mentors - Find experts and professionals in your interested field " />
    <x-page-banner>
        @push('scripts')
            <script>
                function searchAndfilter(e) {
                    e.preventDefault()
                    const form = document.getElementById('filter-form')
                    const category = form.category?.value ?? ''
                    const price = form.price?.value ?? ''
                    const order = form.order?.value ?? ''
                    const keyword = form.keyword?.value ?? ''

                    const params = [
                        {name: 'category', value: category},
                        {name: 'price', value: price},
                        {name: 'order', value: order},
                        {name: 'keyword', value: keyword},
                    ]

                    let query = 'mentors?'

                    const validArray =  params.filter(param => param.value !== '')

                    validArray.map((param, index) => {
                        if(param.value){
                            query+=`${index === 0 ? '' : '&'}${param.name}=${param.value}`
                        }
                    });
                    window.location.href = query
                }
            </script>
        @endpush
        <form action="/courses" id="filter-form" onsubmit="searchAndfilter(event)" onchange="searchAndfilter(event)" method="GET"  >
            <div class="d-md-flex justify-content-between align-items-end">
                <!-- Page Banner Start -->
                <div class="m-0 page-banner-content w-100 d-md-flex justify-content-between align-items-end">
                    <div>
                        <h3 class="title mt-0 pb-0">Explore</h3>
                        <x-explore-menu page='mentors' />
                    </div>

                    <div class="courses-search search-2 m-0">
                        <input name="keyword" type="text" placeholder="Search for courses...">
                        <button type="submit"><i class="icofont-search"></i></button>
                        </div>
                </div>
                <!-- Page Banner End -->
            </div>

            <div class=" p-0 m-0 bg-transparent mt-3 d-flex justify-content-between" style="z-index: 11;">
                <div>
                    <x-selectpicker name='order' class="btn btn-custom border" title="Sort By">
                        <option value="">All</option>
                        <option @selected(request()->has('order') && request()->order === 'popularity') value="popularity">Popularity</option>
                        {{-- <option @selected(request()->has('order') && request()->order === 'batches') value="batches">Active Batches</option> --}}
                        {{-- <option @selected(request()->has('order') && request()->order === 'mentor') value="mentor">Mentor Status</option> --}}
                        <option @selected(request()->has('order') && request()->order === 'rating') value="rating">Rating</option>
                    </x-selectpicker>
                </div>
            </div>

            @if (request()->has('order'))
            <div class="mt-2 d-flex align-items-center">
                <p class="me-2 my-0 ">Filters:</p>
                @if (request()->has('order'))
                    <span class="badge badge-light me-2 rounded-pill text-muted bg-light fw-normal border px-2">
                        {{request()->order}}
                    </span>
                @endif
                <a href="/courses" style="font-size: 0.75em; line-height: 0 !important;" class="badge me-2 badge-light btn btn-light btn-hover-primary p-1 btn-custom rounded-pill text-muted text-accent fw-normal border h-auto mt-0">
                    <i class="icofont-close ms-0 me-1"></i>
                    Clear Filters
                </a>
            </div>
            @endif
        </form>
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

            <div class="d-flex justify-content-center">
                {{ $mentors->onEachSide(5)->links() }}
            </div>
        </div>
    </div>
</x-guest-layout>
