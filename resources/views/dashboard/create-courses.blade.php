<x-app-layout>
    @include('dashboard.js.create-courses-js')

    @push('scripts')
        <script src="{{asset('js/pages/createcourse.js')}}"></script>
    @endpush

    <x-page-title title="Mentor Dashboard - Create Courses" />
    <div class="page-content-wrapper">
        <div class="container px-3 px-md-0">
            <div class="mb-3">
                <h4 class="my-0">Create a New Course</h4>
                <p class="my-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, aliquam.</p>
            </div>

            <x-mentor.kyc-warning />

            <form action="/me/courses/new" method="POST" onsubmit="return validateCourseInput(event)" enctype="multipart/form-data">
                @csrf

                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card radius p-3 p-md-5 border mt-1">
                                <h5 class="mb-3">Course Details</h5>

                                <div class="single-form">
                                    <label class="mb-1">Course Title</label>
                                    <input type="text" name="name" onblur="validateInput(event, __courseSchema)" maxlength="60" value="{{old('name')}}" placeholder="Class Title, Topic or Subject">
                                    <x-errors name="name" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1">Short Description <small>(max 120 characters)</small></label>
                                    <input type="text" name="excerpt" onblur="validateInput(event, __courseSchema)" maxlength="120" value="{{old('excerpt')}}" placeholder="Write a brief description - (Maximum 120 Characters)">
                                    <x-errors name="excerpt" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1">Long Description</label>
                                    <x-rich-text placeholder="Write a compelling description of your class here" name="desc" />
                                    <x-errors name="desc" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1">Course Benefits</label>
                                    <x-form-repeater name="objectives" />
                                    <x-errors name="objectives" />
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 mt-5 mt-md-0">
                            <div class="card border radius p-3 p-md-5">
                                <h5 class="mb-3">Course Meta</h5>

                                <div class="single-form">
                                    <div class="d-flex justify-content-between">
                                        <label class="mb-1">Category</label>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#suggest-category" class="p-0 mb-1 bg-transparent border-0"><small>Suggest a Category</small></button>
                                    </div>

                                    <select onblur="validateInput(event, __courseSchema)" name="category" class="selectpicker w-100" data-live-search="true" title="Select Category" data-style="border radius py-0 px-2 fw-normal">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->slug}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <x-errors name="category" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1">Tags</label>
                                    <x-tag-input />
                                    <x-errors name="tags" />
                                </div>
                            </div>

                            <div class="card border radius p-3 p-md-5 mt-5">
                                <h5 class="mb-3">Course Media</h5>
                                <div class="single-form my-2">
                                    <label class="mb-1">Course Image</label>
                                    <x-img-upload name="images">Upload Image</x-img-upload>
                                    <x-errors name="images" />
                                </div>

                                <div class="single-form my-2">
                                    <label class="mb-1">Course Video Link</label>
                                    <input onblur="validateInput(event, __courseSchema)" type="text" name="video" class="px-2 mt-1" value="{{old('video')}}" placeholder="Link to promotional video" />
                                    <x-errors name="video" />
                                </div>
                            </div>

                            <div class="mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn float-right btn-primary btn-hover-dark radius" @disabled(Auth::user()->kyc_status === 'approved' ? false : true)>Create Class</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        @include('components.suggest-category')
    </div>

</x-app-layout>
