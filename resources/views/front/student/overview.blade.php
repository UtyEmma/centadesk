<x-student-layout>
    <x-page-title title="Learning Center" />

    @php
        $user = Auth::user();
    @endphp

    <div class="section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 py-3">
                    <div class="new-courses px-8 my-0 pt-2" style="background-image: url({{asset('images/new-courses-banner.jpg')}});">
                        <div class="row">
                            <div class="new-courses-title">
                                <h3 class="title">Hi, {{$user->firstname}}</h3>
                                <p class="text-white">You can start enrolling for courses you are interested in.</p>
                                <a href="/courses" class="btn btn-custom btn-warning btn-hover-dark">Discover Courses</a>
                            </div>
                        </div>
                    </div>

                    @if ($user->role === 'mentor' && $user->kyc_status === 'pending')
                        <div class="alert alert-primary bg-light-primary radius my-4" role="alert">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <i class="icofont-info-square fs-1"></i>
                                </div>

                                <div class="flex-1 ms-3">
                                    <strong>Your Mentor Application is under Review</strong>
                                    <p>This process will take less than 2 weeks in most instances and may be more depending on the number of applications our team have to review! We appreciate your patience and will duly inform you when the process is completed.</p>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if (count($courses['upcoming']) > 0)
                        <div class="py-5">
                            <h5 class="mb-2">Upcoming Sessions</h5>

                            <div class="row">
                                @forelse ($courses['upcoming'] as $course)
                                    <div class="col-lg-6 col-md-6">
                                        <x-batch.upcoming :course="$course" />
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <div class="border radius p-4">
                                            <h5>You have not enrolled for any courses yet!</h5>
                                            <a href="/courses">
                                                <x-btn classes="btn-primary btn-hover-dark">Find Courses</x-btn>
                                            </a>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endif

                    {{-- <div class="py-5">
                        <h5 class="mb-2">Suggested For You</h5>
                    </div> --}}
                    @if ($suggested->count() > 0)
                        <div class="py-5">
                            <h5 class="mb-2">Suggested For You!</h5>

                            <div class="row">
                                @forelse ($courses['upcoming'] as $course)
                                    <div class="col-lg-6 col-md-6">
                                        <x-batch.upcoming :course="$course" />
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <div class="border radius p-4">
                                            <h5>You have not enrolled for any courses yet!</h5>
                                            <a href="/courses">
                                                <x-btn classes="btn-primary btn-hover-dark">Find Courses</x-btn>
                                            </a>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-md-4 py-3">
                    {{-- <h5 class="mb-2">Your Calender</h5> --}}
                    <div class="custom-scrollbar p-3 radius border border-primary">
                        <x-calender :events="$events" />
                    </div>

                    @php
                        $user = Auth::user();
                    @endphp

                    <div class="mt-4">
                        <h5>Earn with your Affiliate link.</h5>
                        <x-affiliate-link :user="$user" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>
