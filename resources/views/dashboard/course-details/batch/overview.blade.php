<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch" :batches="$batches">
    <div class="mt-2">
        <div class="admin-top-bar students-top">
            <div class="courses-select pt-0">
                <h4 class="title my-0">Overview</h4>
            </div>
        </div>

        <div class="overview-box mt-0">
            <div class="row w-100">
                <div class="col-md-3">
                    <div class="single-box mb-2 w-100">
                        <h5 class="title">Students</h5>
                        <div class="count">
                            {{$batch->total_students}}
                        </div>
                        <p><span>58</span> This months</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="single-box mb-2 h-auto w-100">
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

                <div class="col-md-3">
                    <div class="single-box mb-2 h-auto w-100">
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

                <div class="col-md-3 ">
                    @if ($batch->discount !== 'none' && $batch->discount_price)
                        <div class="single-box mb-2 bg-light-primary h-auto w-100">
                            <h5 class="title">Discount</h5>
                            <div class="count">
                                <span class="fs-5">
                                    {{$batch->currency}}
                                </span>
                                {{number_format($batch->discount_price)}}
                            </div>
                            <p><span>58</span> This months</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <div class="admin-top-bar students-top">
            <div class="courses-select mb-3">
                <h4 class="title my-0">Details</h4>
            </div>

            {{-- <a href="{{$batch->short_code}}/edit">
                <x-btn classes="btn-secondary btn-hover-primary">Edit</x-btn>
            </a> --}}
        </div>

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

</x-mentor-batch-detail>
