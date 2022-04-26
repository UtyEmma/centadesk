<x-app-layout>
    @include('dashboard.js.create-courses-js')

    <div class="page-content-wrapper mt-3">
        <div class="container-fluid px-3 px-md-5">
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

                                    <select name="category" class="selectpicker w-100" data-live-search="true" title="Select Category" data-style="border radius py-0 px-2 fw-normal">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->slug}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <x-errors name="category" />
                                </div>

                                <div class="single-form">
                                    <label>Tags</label>
                                    <x-tag-input />
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

                                <div class="single-form">
                                    <label>Promotional Video Link</label>
                                    <p>
                                        <small>This is a short introductory video that introduces the course. It is recommended that specific details like date, venue etc should not be included in this video.</small>
                                    </p>
                                    <input type="text" name="video" value="{{old('video')}}" placeholder="Link to promotional video" />
                                    <x-errors name="video" />
                                </div>

                                <div class="mt-3">
                                    <label class="mb-2">Upload Class Images</label>
                                    <x-dropzone multiple="true" name="images[]" />
                                    <x-errors name="images" />
                                </div>
                            </div>

                            @if (Auth::user()->kyc_status !== 'approved')
                                <div class="text-end mt-3">
                                    <p style="font-size: 14px;">You cannot create any classes until your Mentor Request is approved</p>
                                </div>
                            @endif

                            <div class="mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn float-right btn-primary btn-hover-dark radius" @disabled(Auth::user()->kyc_status === 'approved' ? false : true)>Create Class</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
