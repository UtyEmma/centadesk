<x-app-layout>
    @include('dashboard.js.create-courses-js')

    <div class="page-content-wrapper">
        <div class="container-fluid my-5 px-3 px-md-5">
            <div class="mb-3">
                <h4 class="my-0">Create a New Course</h4>
                <p class="my-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, aliquam.</p>
            </div>

            <x-mentor.kyc-warning />

            <form action="/me/courses/new" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bg-transparent border-0">
                                <h5 class="mb-0">Class Details</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                            </div>

                            <div class="card radius p-3 p-md-5 mt-1">
                                <div class="single-form">
                                    <label>Class Title</label>
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="Class Title, Topic or Subject">
                                    <x-errors name="name" />
                                </div>

                                <div class="single-form">
                                    <label>Class Description</label>
                                    <x-rich-text placeholder="Write a compelling description of your class here" name="desc" />
                                    {{-- <textarea id="summernote" type="text" value="{{old('desc')}}" class="bg-white" name="desc" placeholder="" ></textarea> --}}
                                    <x-errors name="desc" />
                                </div>


                                <div class="single-form">
                                    <label>Category</label>
                                    <select name="category" class="select border radius w-100 py-3 px-2">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->slug}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <textarea id="summernote" type="text" value="{{old('desc')}}" class="bg-white" name="desc" placeholder="" ></textarea> --}}
                                    <x-errors name="desc" />
                                </div>

                                <div class="single-form">
                                    <label>Tags</label>
                                    <x-tag-input />
                                    <x-errors name="tags" />
                                </div>
                            </div>

                            <div class="mt-5 bg-transparent border-0">
                                <h5 class="mb-0">Promotional Media</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                            </div>

                            <div class="card radius p-3 p-md-5 mt-1">

                                <div class="single-form">
                                    <label>Promotional Video Link</label>
                                    <input type="text" name="video" value="{{old('video')}}" placeholder="Link to promotional video" />
                                    <x-errors name="video" />
                                </div>

                                <div class="mt-3">
                                    <label class="mb-2">Upload Class Images</label>
                                    <x-dropzone multiple="true" name="images[]" />
                                    <x-errors name="images" />
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class=" bg-transparent border-0">
                                <h5 class="mb-0">Batch Details</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                            </div>
                            <div class="card radius p-3 p-md-5 mt-1">

                                <div class="single-form">
                                    <label>Batch Title</label>
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="eg. Cohort One">
                                    <x-errors name="title" />
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
                                            <small for="enddate" class="h-100 w-auto fw-medium fs-5 text-primary">
                                                <i class="icofont-ui-calendar"></i>
                                            </small>
                                        </label>
                                        <x-errors name="enddate" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 single-form">
                                        <label>Price</label>
                                        <div class="w-auto d-flex align-items-center border px-3 radius mr-0">
                                            <small for="short_code" class="h-100 w-auto fw-medium fs-6">{{Auth::user()->currency}}</small>
                                            <input class="form-control flex-1 border-0 radius-left-0" type="number" value="{{old('price')}}" class="hide-increment" min="0" name="price" placeholder="0.00" />
                                        </div>
                                        <x-errors name="price" />
                                    </div>

                                    <div class="col-md-6 single-form">
                                        <label>Set Attendance Limit</label>
                                        <input  class="form-control" type="number" value="{{old('attendees')}}" class="hide-increment" min="0" name="attendees" placeholder="0" />
                                        <x-errors name="attendees" />
                                    </div>
                                </div>

                                <div class="single-form">
                                    <label>
                                        Batch Waiting Link
                                        <p style="font-size: 13px">This link will be sent to registered users to join a waiting group</p>
                                    </label>
                                    <input type="text" name="class_link" value="{{old('class_link')}}" class="form-control" placeholder="Link to a waiting forum or access link to the class">
                                    <x-errors name="link" />
                                </div>

                                <div class="single-form">
                                    <label>
                                        Batch Access Link
                                        <p style="font-size: 13px">This link will be sent to registered users to join the class</p>
                                    </label>
                                    <input type="text" name="access_link" value="{{old('access_link')}}" class="form-control" placeholder="Link to a waiting forum or access link to the class">
                                    <x-errors name="link" />
                                </div>
                            </div>

                            <div class="mt-5 bg-transparent border-0">
                                <h5 class="mb-0">Batch Discounts</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                            </div>

                            <div class="card radius p-3 p-md-5 mt-1">

                                <div class="row mt-2">
                                    <div class="col-md-4 mt-2">
                                        <input class="radio-custom" onchange="setDiscount(event)" checked hidden type="radio" onchange="" name="discount" id="none" value="none">
                                        <label for="none" class="border cursor-pointer d-flex justify-content-between align-items-center radius p-4 w-100">
                                            <span>No Discount</span>
                                            <i class="icofont-check-circled fs-4 d-none"></i>
                                        </label>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <input class="radio-custom" onchange="setDiscount(event)" hidden type="radio" name="discount" id="percent" value="percent">
                                        <label for="percent" class="cursor-pointer border p-4 d-flex justify-content-between align-items-center radius w-100">
                                            <span>Percentage</span>
                                            <i class="icofont-check-circled fs-4 d-none"></i>
                                        </label>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <input class="radio-custom" onchange="setDiscount(event)" hidden type="radio" name="discount" id="fixed" value="fixed">
                                        <label for="fixed" class="cursor-pointer border p-4 d-flex justify-content-between align-items-center radius w-100">
                                            <span>Fixed Amount</span>
                                            <i class="icofont-check-circled fs-4 d-none"></i>
                                        </label>
                                    </div>


                                    <div class="col-12" id="discount_types">
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
                                                    <h5 class="lh-0 mb-0">Discount Limit</h5>
                                                </div>
                                                <div class="single-form col-md-6 mt-2">
                                                    <label>Set Expiration Date </label>
                                                    <input  class="form-control" type="date" value="{{old('time_discount')}}" class="form-control" id="date" name="time_discount" placeholder="Discount Expiration Date" />
                                                    <x-errors name="time_discount" />
                                                </div>
                                                <div class="single-form col-md-6 mt-2">
                                                    <label>Limit Sign ups</label>
                                                    <input  class="form-control hide-increment" type="number" value="{{old('signups_discount')}}" id="signups_discount" placeholder="Year Acquired" />
                                                    <x-errors name="signups_discount" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            @if (Auth::user()->kyc_status !== 'approved')
                                <div class="text-end mt-3">
                                    <p style="font-size: 14px;">You cannot create any classes until your Mentor Request is approved</p>
                                </div>
                            @endif
                            <div class="mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn float-right btn-primary radius" @disabled(Auth::user()->kyc_status === 'approved' ? false : true)>Create Class</button>
                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
