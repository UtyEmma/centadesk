<x-app-layout>

    <!-- Page Content Wrapper Start -->
    <div class="page-content-wrapper">
        <div class="container-fluid custom-container">

            <!-- Admin Courses Tab Start -->
            <div class="admin-courses-tab mt-0">
                <h3 class="title">{{$course->name}}</h3>

                <div class="courses-tab-wrapper">
                    {{-- <div class="courses-select">
                        <select>
                            <option data-display="Newest First">Newest First</option>
                            <option value="1">Oldest First</option>
                        </select>
                    </div> --}}
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-7">
                    {{$slot}}
                </div>

                <div class="col-md-5">

                    <div class="ps-3">
                        <h6 class="mb-2">Course Batches</h6>

                        @foreach ($batches as $batch)
                            <x-batch.item :batch="$batch" :course="$course" />
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
