<x-app-layout>
    @include('dashboard.js.create-courses-js')

    <script>
        $(document).ready(function(){
            // Dropzone has been added as a global variable.
            const element = document.querySelector('#dropzone')
            console.log(element)
            const dropzone = new Dropzone("#dropzone", { url: "/file/post" });
        })
      </script>

    <div class="container-fluid my-5">
        <div>
            <h4 class="my-0">Create a New Course</h4>
            <p class="my-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, aliquam.</p>
        </div>

        <form action="/me/courses/new" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bs-stepper card radius p-2 mt-4">
                <div class="bs-stepper-header card-header p-3 bg-muted radius border-0" role="tablist">
                    <div class="step" data-target="#details">
                        <button type="button" class="step-trigger" role="tab" aria-controls="details" id="details-trigger">
                            <span class="bs-stepper-label">Course Details</span>
                        </button>
                    </div>

                    <div class="step" data-target="#batch">
                        <button type="button" class="step-trigger" role="tab" aria-controls="batch" id="batch-trigger">
                            <span class="bs-stepper-label">Course Batch Details</span>
                        </button>
                    </div>
                </div>

                <div class="bs-stepper-content px-0">
                    <div id="details" class="content px-0" role="tabpanel" aria-labelledby="details-trigger">
                        <div class="p-md-4">
                            <div class="bg-transparent border-0">
                                <h5 class="mb-0">Class Details</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                            </div>

                            <div class="pt-0">
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>Class Title</label>
                                            <input type="text" name="name" value="{{old('name')}}" placeholder="Class Title, Topic or Subject">
                                            @error('name')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="single-form">
                                            <label>Class Description</label>
                                            <textarea id="summernote" type="text" value="{{old('desc')}}" class="bg-white" name="desc" placeholder="Write a compelling description of your class here" ></textarea>
                                            @error('desc')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="single-form">
                                            <label>Tags</label>
                                            <input class="form-control border radius px-0 py-1 fs-6" value="{{old('tags')}}" name="tags" type="text">
                                            @error('tags')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="pt-3 bg-transparent border-0">
                                            <h5 class="mb-0">Promotional Media</h5>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                        </div>

                                        <div class="pt-0">
                                            <div class="single-form">
                                                <label>Promotional Video Link</label>
                                                <input type="text" name="video" value="{{old('video')}}" placeholder="Class Title, Topic or Subject">
                                                @error('video')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="mt-3">
                                                <label class="mb-2">Upload Class Images</label>
                                                <div id="dropzone" class="p-4 mt-4 alert alert-primary">

                                                </div>
                                                @error('images')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-form d-flex justify-content-end px-0">
                            <button type="button" class="btn btn-primary" onclick="handleNext()">Next</button>
                        </div>
                    </div>

                    <div id="batch" class="content px-0" role="tabpanel" aria-labelledby="batch-trigger">
                        <div class="p-md-4">
                            <div class="bg-transparent border-0">
                                <h5 class="mb-0">Batch Details</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                            </div>

                            <div class="pt-0">
                                <div class="row pb-5" >
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>Batch Title</label>
                                            <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="eg. Cohort One">
                                            @error('title')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <label class="mb-2" for="title">
                                                Short Link
                                                <br/>
                                                <small>A Short Shareable URL (Not More than 7 Letters)</small>
                                            </label>
                                            <div class="w-auto d-flex align-items-center border px-2 radius mr-0">
                                                <small for="short_code" class="h-100 w-auto pe-0">{{env('MAIN_APP_DOMAIN')}}/</small>
                                                <input type="text" id="short_code" value="{{old('title')}}" name="short_code" class="ml-0 form-control border-0 py-3 px-2 flex-1 fs-6" placeholder="link" aria-describedby="basic-addon3">
                                            </div>

                                            <small class="text-danger text-capitalize" id="error-facebook">
                                                @error('title')
                                                    {{$message}}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="row">
                                            <div class="single-form col-md-6">
                                                <label>Start Date</label>
                                                <input  class="form-control" name="startdate" value="{{old('startdate')}}" type="date" placeholder="Select Course Duration" />
                                                @error('startdate')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="single-form col-md-6">
                                                <label>End Date</label>
                                                <input  class="form-control" name="enddate" value="{{old('enddate')}}" type="date" placeholder="Select Course Duration" />
                                                @error('enddate')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="single-form">
                                            <label>Batch Link</label>
                                            <input type="text" name="class_link" value="{{old('class_link')}}" class="form-control" placeholder="Link to a waiting forum or access link to the class">
                                            @error('link')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-form">
                                                    <label>Set Number of Attendees</label>
                                                    <input  class="form-control" type="number" value="{{old('attendees')}}" class="hide-increment" min="0" name="attendees" placeholder="0" />
                                                    @error('attendees')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-form">
                                                    <label>Base Price (NGN) </label>
                                                    <input  class="form-control" type="number" value="{{old('price')}}" class="hide-increment" min="0" name="price" placeholder="0.00" />
                                                    @error('price')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="py-6 mt-3">
                                            <h6 class="">Batch Discounts</h6>

                                            <div class="col-md-12">
                                                <div class="form-check mt-1 form-switch">
                                                    <input class="form-check-input" id="discounts" value="{{old('discounts') || true}}" onchange="toggleDiscount(event)" role="switch" name="discounts" type="checkbox" checked  >
                                                    <label class="form-check-label" for="discounts"><small id="discount_switch_label">Discounts Enabled</small></label>
                                                </div>

                                                @error('discounts')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div id="discount_container">
                                                <div class="mt-5">
                                                    <div class="mb-2">
                                                        <h6 class="mb-0">Time-based Discount</h6>
                                                        <small class="mt-0 mb-0">Set a timed Discount for Early Sign ups</small>
                                                    </div>

                                                    <div class="single-form  mt-0">
                                                        <label>Select Expiration Date </label>
                                                        <input  class="form-control" type="date" value="{{old('time_discount')}}" class="form-control" id="date" name="time_discount" placeholder="Year Acquired" />

                                                        @error('time_discount')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="row" id="time_discount_container">
                                                        <div class="single-form col-md-6">
                                                            <label>Price Rate</label>
                                                            <select name="time_discount_rate" value="{{old('time_discount_rate')}}" onchange="setDiscountRate(event, 'time_discount_price', 'time_discount_percentage', 'time_discount_container')" class="radius form-select border py-3 mb-3" id="">
                                                                <option value="flat">Flat Rate</option>
                                                                <option value="percent">Percentage</option>
                                                            </select>

                                                            @error('time_discount_rate')
                                                                <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="single-form col-md-6">
                                                            <label>Price</label>
                                                            <input  class="form-control" value="{{old('time_discount_price')}}" type="number" class="hide-increment" min="0" name="time_discount_price" placeholder="0.00" />
                                                            @error('time_discount_price')
                                                                <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="single-form col-md-6">
                                                            <label>Percentage </label>
                                                            <input  class="form-control" value="{{old('time_discount_percentage')}}" type="number" class="hide-increment" min="0" name="time_discount_percentage" placeholder="0" />
                                                            @error('time_discount_percentage')
                                                                <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-5">
                                                    <div class="mb-2">
                                                        <h6 class="mb-0">Limited Signups Discount</h6>
                                                        <small class="mt-0">Set a Discount for Early Sign ups</small>
                                                    </div>

                                                    <div class="single-form mt-0">
                                                        <label>Number of Sign ups</label>
                                                        <input  class="form-control" type="number" value="{{old('signups_discount')}}" class="hide-increment" id="signups_discount" placeholder="Year Acquired" />
                                                        @error('signups_discount')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>


                                                    <div class="row" id='signup_discount_container'>
                                                        <div class="single-form col-md-6">
                                                            <label>Price Rate</label>
                                                            <select name="signups_discount_rate" value="{{old('signups_discount_rate')}}" onchange="setDiscountRate(event, 'signups_discount_price', 'signups_discount_percentage', 'signup_discount_container')" class="radius form-select border py-3 mb-3" id="">
                                                                <option value="flat">Flat Rate</option>
                                                                <option value="percent">Percentage</option>
                                                            </select>
                                                        </div>

                                                        <div class="single-form col-md-6">
                                                            <label>Price (NGN) </label>
                                                            <input  class="form-control" type="number" value="{{old('signups_discount_price')}}" class="hide-increment" min="0" name="signups_discount_price" placeholder="0.00" />
                                                        </div>

                                                        <div class="single-form col-md-6">
                                                            <label>Percentage </label>
                                                            <input  class="form-control" type="number"  value="{{old('signups_discount_percentage')}}" class="hide-increment" min="0"  name="signups_discount_percentage" placeholder="0" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-form d-flex justify-content-between px-0">
                            <button type="button" class="btn btn-primary" onclick="handlePrevious()">Previous</button>
                            <button type="submit" class="btn btn-primary radius">Create Class</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
