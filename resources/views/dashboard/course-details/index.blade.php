<x-app-layout>
    <div class="page-content-wrapper pt-0">
        <div class="container-fluid custom-container">
            <div class="mb-3 mb-md-0 admin-courses-tab d-flex justify-content-between">
                <h3 class="mb-0 lh-0">{{$course->name}}</h3>

                <div class="courses-tab-wrapper">
                    <div class="tab-btn py-0">
                        <a href="{{$course->slug}}/edit" class="btn btn-secondary btn-hover-primary">Edit Course</a>
                    </div>
                </div>
            </div>

            {{$slot}}
        </div>
    </div>
</x-app-layout>
