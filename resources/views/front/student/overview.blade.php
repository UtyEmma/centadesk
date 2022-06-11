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
                        {{-- <div class="alert alert-secondary border-primary bg-secondary radius my-4" role="alert">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <i class="icofont-info-square text-warning fs-1"></i>
                                </div>

                                <div class="flex-1 ms-3">
                                    <h6></h6>
                                    <p>
                                        <small>This process will a few days depending on the number of applications we have received! We appreciate your patience and will duly inform you when the process is completed.</small>
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="alert alert-secondary border alert-dismissible fade show my-3 radius" role="alert">
                            <small>
                                <strong>Your Mentor Application is under Review</strong> This might take a few days depending on the number of applications we have received! We appreciate your patience and will duly inform you when the process is completed.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </small>
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


                    @if ($suggested->count() > 0)
                        <div class="py-5">

                            <!-- All Courses Tabs Menu Start -->
                            <div class="courses-tabs-menu courses-active p-0 m-0 bg-transparent">
                                <div class="d-flex justify-content-between align-content-center mb-4">
                                    <h5>Upcoming Sessions you might be interested in.</h5>
                                    <div class="d-flex ms-4">
                                        <div style="left: 0;" class="swiper-button-prev border position-relative"><i class="icofont-rounded-left"></i></div>
                                        <div style="left: 0;" class="swiper-button-next border ms-4 position-relative"><i class="icofont-rounded-right"></i></div>
                                    </div>
                                </div>
                                <div class="swiper-container">
                                    <ul class="swiper-wrapper nav row">
                                        @forelse ($suggested as $course)
                                            <div class="col-lg-6 col-md-6 pe-0">
                                                <x-batch.suggested :btn="true" :course="$course" />
                                            </div>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
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
