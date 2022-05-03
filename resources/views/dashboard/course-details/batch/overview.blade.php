<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch" :batches="$batches">
    <div class="mt-2 container">
        <div>
            <h3 >{{$batch->title}}</h3>
            <h5>Overview</h5>
        </div>


        <div class="row mt-0">
            <div class="col-md-8">
                <div class="overview-box row">
                    <div class="col-md-4">
                        <div class="single-box m-0 w-100">
                            <h5 class="title">Students</h5>
                            <div class="count">
                                {{$batch->total_students}}
                            </div>
                            <p><span>58</span> This months</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="single-box m-0 h-auto w-100">
                            <h5 class="title">Revenue</h5>
                            <div class="count">
                                <span class="fs-5">
                                    {{$batch->currency}}
                                </span>
                                {{number_format($batch->earnings)}}
                            </div>
                            <p><span>58</span> This months</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="single-box m-0 h-auto w-100">
                            <h5 class="title">Price</h5>
                            <div class="count">
                                <span class="fs-5">
                                    {{$batch->currency}}
                                </span>
                                {{number_format($batch->price)}}
                            </div>
                            <p><span>58</span> This months</p>
                        </div>
                    </div>
                </div>

                <div class="admin-top-bar students-top">
                    <div class="courses-select mb-3">
                        <h4 class="title my-0">Details</h4>
                    </div>

                    <a href="{{$batch->short_code}}/edit">
                        <x-btn classes="btn-secondary btn-hover-primary">Edit</x-btn>
                    </a>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6 mt-md-0 mb-3">
                        @if ($batch->discount)
                            <x-price-discount-card :batch="$batch" />
                        @else
                            <x-price-normal-card :batch="$batch" />
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="row gy-3">
                            <div class="col-md-4 col-6">
                                <div class="radius">
                                    <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-ui-calendar"></i> Begins</h5>
                                    <div class="count fs-5" style="color: #0f42cd; font-weight: 500;">
                                        {{$batch->startdate}}
                                    </div>
                                    <p style="font-size: 13px; font-weight: 500;"><span>58</span> This months</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="radius">
                                    <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-ui-calendar"></i> Ends</h5>
                                    <div class="count fs-5" style="color: #0f42cd; font-weight: 500;">
                                        {{$batch->enddate}}
                                    </div>
                                    <p style="font-size: 13px; font-weight: 500;"><span>58</span> This months</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-top-bar students-top">
                    <div class="courses-select mb-3">
                        <h4 class="title my-0">Latest Students</h4>
                    </div>
                </div>


                <!-- Engagement Courses Start -->
                <div class="engagement-courses pt-0 mt-3">
                    <div class="courses-top">
                        <ul>
                            <li>Student</li>
                            <li>Enrollment Date</li>
                            {{-- <li>Active Student’s</li> --}}
                        </ul>
                    </div>

                    <div class="courses-list">
                        <ul>
                            @forelse ($students as $student)
                                <li>
                                    <div class="courses">
                                        <div class="thumb">
                                            <img src="assets/images/courses/admin-courses-01.jpg" alt="Courses">
                                        </div>
                                        <div class="content">
                                            <h4 class="title">{{$student->firstname}} {{$student->lastname}}</h4>
                                        </div>
                                    </div>
                                    <div class="taught">
                                        <span>{{$student->enrolled_at}}</span>
                                    </div>
                                    {{-- <div class="student">
                                        <span>{{$student->}}</span>
                                    </div>
                                    <div class="button">
                                        <a class="btn" href="#">View Details</a>
                                    </div> --}}
                                </li>
                            @empty
                                <div class="bg-light p-5 text-center radius mt-5">
                                    <h3>No Student has enrolled for this batch yet!</h3>
                                </div>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <!-- Engagement Courses End -->
            </div>

            <div class="col-md-4">
                <div class="sidebar-widget mt-md-0 mb-3">
                    <x-batch-countdown :batch="$batch" />
                </div>
            </div>
        </div>
    </div>

</x-mentor-batch-detail>
