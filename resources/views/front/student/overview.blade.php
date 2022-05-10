<x-student-layout>
    <div class="section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="new-courses px-8 my-0 pt-2" style="background-image: url({{asset('images/new-courses-banner.jpg')}});">
                        <div class="row">
                            <div class="new-courses-title">
                                <h3 class="title">Welcome, Utibe-Abasi</h3>
                                <p class="text-white">You can start enrolling for courses you are interested in.</p>
                                <x-btn classes="btn-warning btn-hover-dark">Find Courses</x-btn>
                            </div>
                        </div>
                    </div>


                    <div class="py-5">
                        <h5 class="mb-2">Upcoming Classes</h5>

                        <div class="row">
                            @forelse ($courses['upcoming'] as $course)
                                <div class="col-lg-6 col-md-6">
                                    <x-batch.upcoming :course="$course" />
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h5 class="mb-2">Events</h5>
                    <div class="custom-scrollbar p-3 radius border border-primary">
                        <x-calender :events="$events" />
                    </div>

                    @php
                        $user = Auth::user();
                    @endphp

                    <div class="mt-4">
                        <h6>Earn with your Affiliate link.</h6>
                        <x-affiliate-link :user="$user" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>