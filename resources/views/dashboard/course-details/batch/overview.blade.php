<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch" :batches="$batches">
    <div class="row mt-2">
        <div class="col-md-8">
            <div class="admin-top-bar students-top">
                <div class="courses-select pt-0">
                    <h4 class="title my-0">Overview</h4>
                </div>
            </div>

            {{-- <div class="w-100">

                <div class="p-2 bg-light-primary radius h-100">
                    <div>
                        <h5 >Batch Status</h5>
                        <span class="tag-item text-capitalize px-2">{{$batch->status}}</span>
                    </div>
                    <div class="">
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, laborum!</small>
                    </div>
                </div>
            </div> --}}

            <div class="overview-box mt-0">
                <div class="single-box mb-2">
                    <h5 class="title">Students</h5>
                    <div class="count">
                        {{$batch->total_students}}
                    </div>
                    <p><span>58</span> This months</p>
                </div>
                <div class="single-box mb-2 h-auto">
                    <h5 class="title">Revenue</h5>
                    <div class="count">
                        <span class="fs-5">
                            {{$batch->currency}}
                        </span>
                        {{number_format($batch->earnings)}}
                    </div>
                    <p><span>58</span> This months</p>
                </div>
                <div class="py-5 w-auto">
                    <div class="mb-3">
                        <h3 class="text-primary"><span class="fs-5">{{$batch->currency}}</span> {{number_format($batch->price)}}</h3>
                        <h5 class="fs-6">Base Price</h5>
                    </div>

                    @if ($batch->discount !== 'none' && $batch->discount_price)
                        <div>
                            <h3><span class="fs-5">{{$batch->currency}}</span> {{number_format($batch->discount_price)}}</h3>
                            <h5 class="fs-6">Discount Price</h5>
                        </div>
                    @endif
                </div>

            </div>

            <div>
                <div class="admin-top-bar students-top">
                    <div class="courses-select mb-3">
                        <h4 class="title my-0">Details</h4>
                    </div>

                    <a href="{{$batch->short_code}}/edit">
                        <x-btn classes="btn-secondary btn-hover-primary">Edit</x-btn>
                    </a>
                </div>

                <div class="row gy-3">
                    <div class="col-md-4 col-6">
                        <div class="radius">
                            <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-ui-calendar"></i> Start Date</h5>
                            <div class="count fs-5" style="color: #0f42cd; font-weight: 500;">
                                {{$batch->startdate}}
                            </div>
                            <p style="font-size: 13px; font-weight: 500;"><span>58</span> This months</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="radius">
                            <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-ui-calendar"></i> End Date</h5>
                            <div class="count fs-5" style="color: #0f42cd; font-weight: 500;">
                                {{$batch->enddate}}
                            </div>
                            <p style="font-size: 13px; font-weight: 500;"><span>58</span> This months</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5 class="fs-6">Access Link</h5>
                        <div class="radius w-auto mt-4">
                            <p class="bg-light py-2 px-4 radius d-inline border">{{$batch->access_link}}</p>
                            <span>
                                <button class="border-0 p-0 bg-transparent m-0 p-0 fs-5 ms-2"><i class="icofont-ui-copy"></i></button>
                                <a href="{{$batch->access_link}}" target="_blank" class="fs-5 ms-2"><i class="icofont-external-link"></i></a>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5 class="fs-6">Waiting Link</h5>
                        <div class="radius w-auto mt-4">
                            <p class="bg-light py-2 px-4 radius d-inline border">{{$batch->class_link}}</p>
                            <span>
                                <button class="border-0 p-0 bg-transparent m-0 p-0 fs-5 ms-2"><i class="icofont-ui-copy"></i></button>
                                <a href="{{$batch->class_link}}" target="_blank" class="fs-5 ms-2"><i class="icofont-external-link"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="courses-details mb-3 mt-0">
                <x-course-images :images="json_decode($course->images)" :video="$course->video" :alt="$course->name" />
            </div>

            <!-- Sidebar Widget Share Start -->
            <div class="sidebar-widget">
                <h4 class="widget-title">Share Batch:</h4>

                <div class="mt-3">
                    <x-batch-share :batch="$batch" />
                </div>

                <ul class="social">
                    <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                    <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                    <li><a href="#"><i class="flaticon-skype"></i></a></li>
                    <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                </ul>
            </div>
            <!-- Sidebar Widget Share End -->

        </div>
    </div>

</x-mentor-batch-detail>
