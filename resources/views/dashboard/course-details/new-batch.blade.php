<x-app-layout>
    <x-page-title title="Mentor Dashboard - Create a New Batch" />
    @include('dashboard.js.create-courses-js')

    @push('scripts')
        <script src="{{asset('js/pages/createbatch.js')}}"></script>
    @endpush

    <div class="page-content-wrapper">
        <div class="container-fluid custom-container">
            <div>
                <div >
                    <h3 class="mt-1 mb-0 lh-0">Create a New Batch</h3>
                    <h6 class="mb-0 lh-0">{{$course->name}}</h6>
                </div>

                <form class="mt-5" action="/me/courses/{{$course->unique_id}}/batch/create" onsubmit="return validateBatchDetails(event)"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bg-transparent">
                                <h6 class="mb-0">Batch Details</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                            </div>
                            <div class="card radius p-3 p-md-5 mt-1">
                                <div class="single-form">
                                    <label>Batch Title</label>
                                    <input type="text" name="title" value="{{old('title')}}"  class="form-control" placeholder="eg. Cohort One">
                                    <x-errors name="title" />
                                </div>

                                <div class="single-form">
                                    <label>Short Description </label>
                                    <input type="text" name="excerpt" maxlength="120" value="{{old('name')}}" placeholder="Write a precise description - (Maximum 120 Characters)">
                                    <x-errors name="excerpt" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1">Description</label>
                                    <x-rich-text placeholder="Write a compelling description of your class here" name="desc" />
                                    <x-errors name="desc" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-0">Objectives</label>
                                    <x-form-repeater name="objectives" />
                                </div>


                                <div class="row">
                                    <div class="single-form col-md-6">
                                        <label>Start Date</label>
                                        <x-date-range-picker name="startdate" enddate=".enddate" placeholder="Start Date" />
                                        <x-errors name="startdate" />
                                    </div>

                                    <div class="single-form col-md-6">
                                        <label>End Date</label>
                                        <label for="startdate" class="w-auto d-flex align-items-center border radius pe-3 ms-0">
                                            <input  class="form-control flex-1 border-0 radius-left radius-right-0 enddate" name="enddate" value="{{old('enddate')}}" placeholder="End Date" />
                                            <small for="short_code" class="h-100 w-auto fw-medium fs-5 text-primary">
                                                <i class="icofont-ui-calendar"></i>
                                            </small>
                                        </label>
                                        <x-errors name="enddate" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 single-form">
                                        <label>Price</label>
                                        <label for="price" class="w-auto d-flex align-items-center border px-3 radius mr-0">
                                            <small for="short_code" class="h-100 w-auto fw-medium fs-6">{{Auth::user()->currency}}</small>
                                            <x-amount-input name="price" class="form-control flex-1 border-0 radius-left-0" value="{{old('price')}}" />
                                        </label>
                                        <x-errors name="price" />
                                    </div>

                                    <div class="col-md-6 single-form">
                                        <label>Set Attendance Limit</label>
                                        <input  class="form-control" type="number" value="{{old('attendees')}}" class="hide-increment" min="0" name="attendees" placeholder="0" />
                                        <x-errors name="attendees" />
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" id="certificates" name="certificates" type="checkbox">
                                    <label class="form-check-label fs-6" for="certificates">
                                        Issue a Certificate for this Session
                                    </label>
                                    <div>
                                        <x-errors name="certificates" />
                                    </div>
                                </div>

                                <div class="single-form">
                                    <label>Batch Waiting Link</label>
                                    <input type="text" name="class_link" value="{{old('class_link')}}" class="form-control" placeholder="https://">
                                    <x-errors name="link" />
                                </div>

                                <div class="single-form">
                                    <label>Batch Access Link</label>
                                    <input type="text" name="access_link" value="{{old('access_link')}}" class="form-control" placeholder="https://">
                                    <x-errors name="link" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-5 mt-md-0">
                            <div class="mt-5 mt-md-0">
                                <h6 class="mb-0">Batch Media</h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                            </div>

                            <div class="card radius p-3 p-md-5 mt-1">
                                <div class="single-form my-2">
                                    <label class="mb-1">Batch Image</label>
                                    <x-img-upload name="images" :image="old('images')">Upload Image</x-img-upload>
                                    <x-errors name="images" />
                                </div>

                                <div class="single-form my-2">
                                    <label class="mb-1">Promotional Video Link</label>
                                    <input type="text" name="video" class="px-2 mt-1" value="{{old('video')}}" placeholder="Link to promotional video" />
                                    <x-errors name="video" />
                                </div>
                            </div>


                            <div class="mt-5 border-0">
                                <h6 class="mb-0">Batch Discounts</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                            </div>

                            <div class="card radius p-3 p-md-5 mt-1">
                                <div class="row mt-2">
                                    <div class="col-md-4 mt-2">
                                        <input class="radio-custom" onchange="setDiscount(event)" checked hidden type="radio" onchange="" name="discount" id="none" value="none">
                                        <label for="none" class="border cursor-pointer d-flex justify-content-between align-items-center radius p-4 px-2 w-100">
                                            <small class="fs-6">No Discount</small>
                                            <i class="icofont-check-circled fs-4 d-none"></i>
                                        </label>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <input class="radio-custom" onchange="setDiscount(event)" hidden type="radio" name="discount" id="percent" value="percent">
                                        <label for="percent" class="cursor-pointer border p-4 px-2 d-flex justify-content-between align-items-center radius w-100">
                                            <small>Percentage</small>
                                            <i class="icofont-check-circled fs-4 d-none"></i>
                                        </label>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <input class="radio-custom" onchange="setDiscount(event)" hidden type="radio" name="discount" id="fixed" value="fixed">
                                        <label for="fixed" class="cursor-pointer border p-4 px-2 d-flex justify-content-between align-items-center radius w-100">
                                            <small>Fixed Amount</small>
                                            <i class="icofont-check-circled fs-4 d-none"></i>
                                        </label>
                                    </div>
                                </div>

                                <div id="discount_types">
                                    <div class="single-form">
                                        <label>Percentage</label>
                                        <input  class="form-control hide-increment" name="percent" type="number" value="{{old('signups_discount')}}" id="percent" placeholder="Percent" />
                                        <x-errors name="percent" />
                                    </div>

                                    <div class="single-form">
                                        <label>Fixed Price</label>
                                        <input  class="form-control hide-increment" name="fixed" type="number" value="{{old('signups_discount')}}" id="fixed" placeholder="Fixed Price" />
                                        <x-errors name="fixed" />
                                    </div>

                                    <div id="discount_container">
                                        <div class="row">
                                            <div class="mt-4">
                                                <h6 class="lh-0 mb-0">Discount Limit</h6>
                                            </div>
                                            <div class="single-form col-md-6 mt-2">
                                                <label>Expiration Date</label>
                                                <input  class="form-control" type="date" value="{{old('time_limit')}}" class="form-control" id="date" name="time_limit" placeholder="Expiration Date" />

                                                <x-errors name="time_limit" />
                                            </div>
                                            <div class="single-form col-md-6 mt-2">
                                                <label>Limit Sign ups</label>
                                                <input  class="form-control hide-increment" name="signup_limit" type="number" value="{{old('signup_limit')}}" id="signup_limit" placeholder="Signups Limit" />
                                                <x-errors name="signup_limit" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 d-flex justify-content-end">
                                <button type="submit" class="btn float-right btn-primary btn-hover-dark radius">Create new Batch</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
