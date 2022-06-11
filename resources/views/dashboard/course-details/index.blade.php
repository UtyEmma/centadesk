<x-app-layout>
    <div class="page-content-wrapper pt-0">
        <div class="container-fluid custom-container">
            <div class="mb-2 mb-md-0 admin-courses-tab d-md-flex justify-content-between">
                <h3 class="mb-2 mb-md-0 lh-0">{{$course->name}}</h3>


                <a href="{{$course->slug}}/batch/new" class="btn btn-primary btn-hover-dark btn-custom">Create a New Session</a>
            </div>


            {{$slot}}
        </div>
    </div>
</x-app-layout>
