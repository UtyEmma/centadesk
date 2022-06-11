<x-app-layout>

    <!-- Page Content Wrapper Start -->
    <div class="page-content-wrapper">
        <div class="container-fluid custom-container">
            <div class="row">
                <div class="col-md-4">
                    <div class="border radius p-2 mb-3">
                        <div class="row gy-4">
                            <div class="col-4 pe-0">
                                <div class="ratio ratio-1x1 radius h-100">
                                    <img src="{{$batch->images}}" class="w-100 h-100 radius" style="object-fit: cover" alt="">
                                </div>
                            </div>
                            <div class="col-8">
                                <div>
                                    <h4>{{$batch->title}}</h4>
                                    <a href="/me/courses/{{$course->slug}}">
                                        <h6 class="mb-1">{{$course->name}}</h6>
                                    </a>

                                    <p class="mb-0" style="font-size: 16px;">{{request()->cookie('currency')}} {{number_format($batch->price)}}</p>
                                    @if ($batch->discount === 'fixed' || $batch->discount === 'percent')
                                        <small><span style="font-weight: 500;" class="text-primary">Discount</span> <span>{{request()->cookie('currency')}} {{number_format($batch->discount_price)}}</span></small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mt-1">
                            <x-share-link link="{{env('MAIN_APP_DOMAIN')}}/{{$batch->short_code}}" />
                        </div>
                    </div>
                    <div class="row mb-3 gx-2">
                        <div class="col-6 col-md-6">
                            <div class="bg-secondary border border-primary radius p-3 h-100">
                                <h6>Students</h6>
                                <p>
                                    {{$batch->total_students}}
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="bg-secondary radius border border-primary p-3 h-100" >
                                <h6>Revenue</h6>
                                <p>
                                    {{$batch->currency}}
                                    {{number_format($batch->earnings)}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card radius">
                        <div class="card-body">

                            <div class="row gy-4">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="mb-0">
                                                <i class="icofont-ui-calendar fs-6"></i>
                                                Begins
                                            </p>

                                            <small>{{$batch->startdate}}</small>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">
                                                <i class="icofont-ui-calendar fs-6"></i>
                                                Ends
                                            </p>

                                            <small>{{$batch->enddate}}</small>
                                        </div>
                                    </div>
                                </div>

                                @if ($batch->class_link)
                                    <div class="col-12">
                                        <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-link"></i> Waiting Link</h5>
                                        <x-share-link :link="$batch->class_link" />
                                    </div>
                                @endif

                                <div class="col-12">
                                    <h5 class="title fs-6" style="font-weight: 500;"><i class="icofont-link"></i> Access Link</h5>
                                    <x-share-link :link="$batch->access_link" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="d-flex my-3 mt-md-0 justify-content-between align-items-center radius p-3 bg-light">
                        <div>
                            <a class="me-3 text-primary {{request()->routeIs('mentor_batch') ? 'fw-bold' : ''}}" href="/me/courses/{{$course->slug}}/{{$batch->short_code}}">
                                Students
                            </a>
                            <a class="me-3 text-primary {{request()->routeIs('mentor_batch_forum') ? 'fw-bold' : ''}}" href="/me/courses/{{$course->slug}}/{{$batch->short_code}}/forum">
                                Forum
                            </a>
                            <a class="me-3 text-primary {{request()->routeIs('mentor_batch_resources') ? 'fw-bold' : ''}}" href="/me/courses/{{$course->slug}}/{{$batch->short_code}}/resources">
                                Resources
                            </a>
                            <a class="me-3 text-primary {{request()->routeIs('mentor_batch_edit') ? 'fw-bold' : ''}}" href="/me/courses/{{$course->slug}}/{{$batch->short_code}}/edit">
                                Edit
                            </a>
                        </div>
                    </div>

                    <div class="p-2 border radius ">
                        {{$slot}}
                    </div>
                </div>
            </div>

            <x-new-course />
        </div>
   </div>

</x-app-layout>
