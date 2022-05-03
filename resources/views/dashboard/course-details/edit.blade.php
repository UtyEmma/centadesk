<x-mentor-course-detail :course="$course"  :mentor="$course->mentor" title="Course Batches">

    @include('dashboard.js.create-courses-js')

    <div class="page-content-wrapper">
        <div class="container px-3 px-md-0">
            <div class="mb-3">
                <h4 class="my-0">Edit Course</h4>
                <p class="my-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, aliquam.</p>
            </div>

            <x-mentor.kyc-warning />

            <form action="/me/courses/new" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bg-transparent border-0">
                                <h5 class="mb-0">Course Details</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                            </div>

                            <div class="card radius p-3 p-md-5 mt-1">
                                <div class="single-form mt-0">
                                    <label class="mb-1" style="font-weight: 500;">Course Title</label>
                                    <input type="text" name="name" value="{{$course->name}}" maxlength="60" value="{{old('name')}}" placeholder="Class Title, Topic or Subject">
                                    <x-errors name="name" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1" style="font-weight: 500;">Write a short catchy description of the course <small>(max 120 characters)</small></label>
                                    <input type="text" name="excerpt" value="{{$course->excerpt}}" maxlength="120" value="{{old('excerpt')}}" placeholder="Write a brief description - (Maximum 120 Characters)">
                                    <x-errors name="excerpt" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1" style="font-weight: 500;">Write a more detailed description of the course here.</label>
                                    <x-rich-text value="{{$course->desc}}" placeholder="Write a compelling description of your class here" name="desc" />
                                    <x-errors name="desc" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1" style="font-weight: 500;">What will your student's gain from this course:</label>
                                    <x-form-repeater />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1" style="font-weight: 500;">Category</label>

                                    <select name="category" class="selectpicker w-100" data-live-search="true" title="Select Category" data-style="border radius py-0 px-2 fw-normal">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->slug}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <x-errors name="category" />
                                </div>

                                <div class="single-form">
                                    <label class="mb-1" style="font-weight: 500;">Tags</label>
                                    <x-tag-input value="{{$course->tags}}" />
                                    <x-errors name="tags" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-5 mt-md-0">
                            <div class="bg-transparent border-0">
                                <h5 class="mb-0">Promotional Media</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                            </div>

                            <div class="card radius p-3 p-md-5 mt-1">
                                <div class="single-form my-2">
                                    <x-img-upload image="{{$course->images}}" name="images">Upload Image</x-img-upload>
                                    <x-errors name="images" />
                                </div>

                                <hr>

                                <div class="single-form my-2">
                                    <div class="row gx-3">
                                        <div class="col-md-6">
                                            <label class="mb-1" style="font-weight: 500;">Promotional Video Link</label>
                                            <input type="text" value="{{$course->video}}" name="video" class="px-2 mt-1" value="{{old('video')}}" placeholder="Link to promotional video" />
                                            <x-errors name="video" />
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative overflow-hidden radius mt-2" style="height: 180px;">
                                                <img src="{{asset('images/add_video.jpg')}}" id="avatar_preview" style="width: 100%;" class="img-cover radius" alt="">
                                            </div>
                                        </div>
                                    </div>
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
    </div>
</x-mentor-course-detail>
