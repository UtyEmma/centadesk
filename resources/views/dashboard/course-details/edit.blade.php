<x-mentor-course-detail :course="$course" :batches="$batches" :mentor="$mentor">

    <div class="bg-transparent border-0">
        <h5 class="mb-0">Class Details</h5>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
    </div>
    <form action="/me/courses/{{$course->slug}}/update" method="post">
        @csrf

        <div class="card radius p-3 p-md-5 mt-1">
            <div class="single-form">
                <label>Class Title</label>
                <input type="text" name="name" value="{{old('name') ?? $course->name}}" placeholder="Class Title, Topic or Subject">
                <x-errors name="name" />
            </div>

            <div class="single-form">
                <label>Class Description</label>
                <x-rich-text placeholder="Write a compelling description of your class here" name="desc" value="{{old('desc') ?? $course->desc}}" />
                <x-errors name="desc" />
            </div>


            <div class="single-form">
                <label>Category</label>
                <select name="category" class="select border radius w-100 py-3 px-2">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option @selected({{$category->slug === $course->slug}}) value="{{$category->slug}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <x-errors name="desc" />
            </div>

            <div class="single-form">
                <label>Tags</label>
                <x-tag-input value="{{$course->tags}}" />
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
                <input type="text" name="video" value="{{old('video') ?? $course->video}}" placeholder="Link to promotional video" />
                <x-errors name="video" />
            </div>

            <div class="mt-3">
                <label class="mb-2">Upload Class Images</label>
                <x-dropzone multiple="true" name="images[]" value="{{old('images') ?? $course->images}}" />
                <x-errors name="images" />
            </div>
        </div>
    </form>

</x-mentor-course-detail>
