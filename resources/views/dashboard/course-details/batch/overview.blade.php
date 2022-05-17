<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch">
    <x-page-title title="Mentor Dashboard - {{$batch->title}}" />
    <div class="mt-2">
        <div class="mb-2">
            <h5>Overview</h5>
        </div>

        <div class="row mt-0">
            <div class="col-md-8">
                <div class="overview-box">
                    <div class="row">
                        <div class="col-md-4 px-md-3 my-2">
                            <div class="single-box mt-md-0 my-2 h-100 w-100">
                                <h5 class="title">Students</h5>
                                <div class="count">
                                    {{$batch->total_students}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-md-3 my-2">
                            <div class="single-box mt-md-0 my-2 h-100 w-100">
                                <h5 class="title">Revenue</h5>
                                <div class="count">
                                    <span class="fs-5">
                                        {{$batch->currency}}
                                    </span>
                                    {{number_format($batch->earnings)}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-md-3 my-2">
                            <div class="single-box mt-md-0 my-2 h-100 w-100">
                                <h5 class="title">Price</h5>
                                <div class="count">
                                    <span class="fs-5">
                                        {{$batch->currency}}
                                    </span>
                                    {{number_format($batch->price)}}
                                </div>
                                <p><span>Discount</span> {{$batch->currency}} {{number_format($batch->discount_price)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <div class="sidebar-widget h-100 mt-md-0 my-3">
                    <x-batch-countdown :batch="$batch" />
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center students-top mt-3">
            <div class="courses-select mb-3">
                <h4 class="title my-0">Details</h4>
            </div>

            <a href="{{$batch->short_code}}/edit">
                <x-btn classes="btn-secondary btn-hover-primary">Edit Details</x-btn>
            </a>
        </div>

        <div class="row my-3">
            <div class="col-md-3 col-6">
                <div class="radius">
                    <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-ui-calendar"></i> Begins</h5>
                    <div class="count fs-5" style="color: #0f42cd; font-weight: 500;">
                        {{$batch->startdate}}
                    </div>
                    {{-- <p style="font-size: 13px; font-weight: 500;"><span>58</span> This months</p> --}}
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="radius">
                    <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-ui-calendar"></i> Ends</h5>
                    <div class="count fs-5" style="color: #0f42cd; font-weight: 500;">
                        {{$batch->enddate}}
                    </div>
                    {{-- <p style="font-size: 13px; font-weight: 500;"><span>58</span> This months</p> --}}
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="radius">
                    <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-link"></i> Waiting Link</h5>
                    <div class="d-flex align-items-center">
                        <small id="aff_link_input" class="p-2 bg-light radius border m-0 me-2 w-auto text-truncate">
                            {{$batch->class_link}}
                        </small>
                        <div>
                            <button onclick="copyLink()" class="me-1 bg-transparent border-0 outline-0">
                                <i class="icofont-ui-copy"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="radius">
                    <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-link"></i> Access Link</h5>
                    <div class="d-flex align-items-center">
                        <small id="aff_link_input" class="p-2 bg-light radius border m-0 me-2 w-auto text-truncate">
                            {{$batch->access_link}}
                        </small>
                        <div>
                            <button onclick="copyLink()" class="me-1 bg-transparent border-0 outline-0">
                                <i class="icofont-ui-copy"></i>
                            </button>
                            {{-- <button class="bg-transparent border-0 outline-0">
                                <i class="icofont-share"></i>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 students-top d-flex justify-content-between">
            <div class="courses-select mb-3">
                <h4 class="title my-0">Latest Students</h4>
            </div>

            <a href="{{$batch->short_code}}/students">
                <x-btn classes="btn-secondary btn-hover-primary">View All</x-btn>
            </a>
        </div>

        <div class="engagement-courses pt-0 mt-3">
            <div class="courses-top">
                <ul class="w-100 d-flex justify-content-around">
                    <li>Student</li>
                    <li>Enrollment Date</li>
                    {{-- <li>Active Student’s</li> --}}
                </ul>
            </div>

            <div class="courses-list">
                <ul>
                    @forelse ($students as $student)
                        <li class="d-flex justify-content-around">
                            <div class="courses">
                                <div class="thumb">
                                    <x-profile-img :user="$student" />
                                </div>
                                <div class="content pt-2">
                                    <h5 class="title">{{$student->firstname}} {{$student->lastname}}</h5>
                                </div>
                            </div>
                            <div class="taught">
                                <span>{{$student->enrolled_at}}</span>
                            </div>
                        </li>
                    @empty
                        <div class="bg-light p-5 text-center radius mt-5">
                            <h3>No Student has enrolled for this batch yet!</h3>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>

    </div>

</x-mentor-batch-detail>
