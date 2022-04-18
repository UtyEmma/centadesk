<x-admin.course-detail-layout :course="$course">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-2">
                    <span class="badge badge-primary">Status: <span class="text-uppercase">{{$batch->status}}</span></span>
                    <div>
                        <h6 class="mb-0 mt-2">Batch Link</h6>

                        <p>
                            <a href="{{env('MAIN_APP_URL')}}/{{$batch->short_code}}" target="_blank">{{env('MAIN_APP_URL')}}/{{$batch->short_code}}</a>
                        </p>
                    </div>
                </div>

                {{-- <div class="col-md-12">
                    <div class="row" style="height: 200px;">
                        @foreach (json_decode($batch->images) as $image)
                            <div class="col-md-4 col-2 ratio ratio-1/1 position-relative overflow-hidden">
                                <img src="{{$image}}" class="position-absolute" style="object-fit: cover;" />
                            </div>
                        @endforeach
                    </div>
                </div> --}}

                <div class="col-md-12 bg-light p-3">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <h6 class="mb-2">Batch Title</h6>
                            <p class="text-secondary">{{ $batch->title }}</p>
                        </div>

                        <div class="col-md-3 col-6">
                            <h6 class="mb-2">Batch Shortcode</h6>
                            <p class="text-secondary">{{ $batch->short_code }}</p>
                        </div>

                        <div class="col-md-3 col-6">
                            <h6 class="mb-2">Start Date</h6>
                            <p>{{$batch->startdate}}</p>
                        </div>

                        <div class="col-md-3 col-6">
                            <h6 class="mb-2">End Date</h6>
                            <p>{{$batch->enddate}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.course-detail-layout>
