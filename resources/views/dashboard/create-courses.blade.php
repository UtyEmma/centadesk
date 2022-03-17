<x-app-layout>

    @include('dashboard.js.create-courses-js')

    <div class="container py-4 md:px-0">
        <div class="mt-3 px-0">
            <h3 class="my-0">Create a New Course</h3>
            <p class="my-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, aliquam.</p>
        </div>

        <form action="/me/courses/new" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card radius p-2">
                        <div class="card-header pt-3 bg-transparent border-0">
                            <h5 class="mb-0">Class Details</h5>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                        </div>

                        <div class="card-body pt-0">
                            <div class="single-form">
                                <label>Class Title</label>
                                <input type="text" name="name" placeholder="Class Title, Topic or Subject">
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="single-form">
                                <label>Class Description</label>
                                <textarea id="summernote" type="text" class="bg-white" name="desc" placeholder="Write a compelling description of your class here" ></textarea>
                                @error('desc')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="single-form">
                                <label>Tags</label>
                                <input class="form-control" name="tags" type="text">
                                @error('tags')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card radius mt-5 p-2">
                        <div class="card-header pt-3 bg-transparent border-0">
                            <h5 class="mb-0">Promotional Media</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        </div>

                        <div class="card-body pt-0">
                            <div class="single-form">
                                <label>Promotional Video Link</label>
                                <input type="text" name="video" placeholder="Class Title, Topic or Subject">
                                @error('video')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label class="mb-2">Upload Class Images</label>
                                <input class="form-control border form-control-lg radius" type="file" name="images[]" class="h-100" multiple>
                                @error('images')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-5 mt-md-0">
                    <div class="card radius p-2 position-sticky top-5">
                        <div class="card-header pt-3 bg-transparent border-0">
                            <h5 class="mb-0">Batch Details</h5>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                        </div>

                        <div class="card-body pt-0">
                            <div class="single-form">
                                <label>Batch Duration</label>
                                <input  class="form-control" name="duration" placeholder="Select Course Duration" />
                                @error('duration')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="single-form">
                                <label>Batch Link</label>
                                <input type="text" name="class_link" class="form-control" placeholder="Link to a waiting forum or access link to the class">
                                @error('link')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <label>Limit Attendees</label>
                                        <input  class="form-control" type="number" class="hide-increment" min="0" name="attendees" placeholder="0" />
                                        @error('attendees')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-form">
                                        <label>Price (NGN) </label>
                                        <input  class="form-control" type="number" class="hide-increment" min="0" name="price" placeholder="0.00" />
                                        @error('price')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check mt-3 form-switch">
                                        <input class="form-check-input" id="discounts" role="switch" name="discounts" type="checkbox" checked>
                                        <label class="form-check-label" for="discounts">
                                          Enable Discounts
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-4">
                                        <label class="mb-2">Discount Limit</label>
                                        <select class="form-select radius border mb-3 py-3 px-3" aria-label=".form-select-lg example">
                                            <option selected>Select Limit</option>
                                            <option value="time">Time</option>
                                            <option value="signups">Sign ups</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-form">
                                        <label>Price (NGN) </label>
                                        <input  class="form-control" type="number" class="hide-increment" min="0" name="price" placeholder="0.00" />
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>


                    <div class="text-end px-0 mt-5">
                        <button type="submit" class="btn btn-primary radius">Create Class</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
