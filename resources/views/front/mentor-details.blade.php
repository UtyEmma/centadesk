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
            <div class="row">
                <div class="col-md-4">
                    <x-mentor-card :mentor="$mentor" :class="''" />
                </div>

                <div class="col-md-8 mt-3 mt-md-0">
                    <div class="bg-light-primary radius p-3 mb-3">
                        <h5>About this Mentor</h5>
                        <p>
                            {{$mentor->desc}}
                        </p>

                        <div>
                            <strong class="mb-0">Connect on Social Media</strong>
                            <div class="d-flex fs-4 mt-0">
                                <a href="" class="me-3">
                                    <i class="icofont-facebook"></i>
                                </a>
                                <a href="" class="me-3">
                                    <i class="icofont-twitter"></i>
                                </a>
                                <a href="" class="me-3">
                                    <i class="icofont-instagram"></i>
                                </a>
                                <a href="" class="me-3">
                                    <i class="icofont-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light-primary radius p-3 mb-3">
                        <h5>Educational Background</h5>
                        <div class="mt-5">
                            @foreach (json_decode($mentor->qualification) as $education)
                                <div class="bg-white border radius p-3 my-2">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div>
                                                <small class="fw-bold">Qualification</small>
                                                <p>{{$education->qualification}}</p>
                                            </div>
                                            <div>
                                                <small class="fw-bold">Institution: </small>
                                                <span>{{$education->institution}}</span>
                                            </div>
                                        </div>

                                        <div>
                                            <small class="fw-bold">Year Acquired</small>
                                            <p>{{$education->date}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-light-primary radius p-3 mb-3">
                        <h5>Work Experience</h5>
                        <div class="mt-5">
                            @foreach (json_decode($mentor->experience) as $experience)
                                <div class="bg-white border radius p-3 my-2">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div>
                                                <small class="fw-bold">Company</small>
                                                <p>{{$experience->company}}</p>
                                            </div>
                                            <div>
                                                <small class="fw-bold">Role: </small>
                                                <span>{{$experience->role}}</span>
                                            </div>
                                        </div>

                                        <div>
                                            <small class="fw-bold">End Date</small>
                                            <p>{{$experience->enddate}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-3">
                        <h5 class="lh-0 mb-0">Mentor Courses</h5>

                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($courses as $course)
                                    <x-courses.single-course-card :course="$course" :mentor="$mentor" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
