<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment" :report="$report">
    <div class="mt-3">
        <h5>Batch Resources</h5>
        <p>Click copy the link on each resource to access the contents.</p>
        <div class="row">
            @forelse ($resources as $resource)
                <div class="col-md-6">
                    <div class="border border-primary p-2 radius">
                        <div class="mb-1 d-flex justify-content-between align-items-center">
                            <h6 class="m-0">{{$resource->title}}</h6>
                        </div>


                        <p class="mb-1">{{$resource->description}}</p>


                        <div class="d-flex">
                            <p id="aff_link_input" class="p-2 radius border m-0 me-2 flex-1 bg-light text-truncate" style="font-size: 14px;">
                                {{$resource->link}}
                            </p>

                            <div class="w-auto d-flex py-1">
                                <button onclick="copyLink()" title="Copy" type="button" class="btn btn-secondary btn-hover-primary h-auto btn-custom d-flex align-items-center justify-content-center py-1 px-2 me-2" >
                                    <i class="icofont-copy ms-0 fs-6"></i>
                                </button>
                                <button onclick="shareLink()" title="Copy" type="button" class="btn btn-secondary btn-hover-primary h-auto btn-custom d-flex align-items-center justify-content-center py-1 px-2" >
                                    <i class="icofont-external-link ms-0 fs-6"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <div class="border border-primary p-5 radius">
                        <h5>There are no Resources for this Batch</h5>
                        {{-- <p>Click the button Above to add resources for this class</p> --}}
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-enrolled-course>
