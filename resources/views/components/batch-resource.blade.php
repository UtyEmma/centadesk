<div class="col-md-6">
    <div class="border border-primary p-2 radius">
        <div class="mb-1 d-flex justify-content-between align-items-center">
            <h6 class="m-0">{{$resource->title}}</h6>

            <div class="d-flex align-items-center">
                <button data-bs-toggle="modal" data-bs-target="#res-{{$resource->unique_id}}" class="p-0 bg-transparent border-0 text-primary me-2"><small>Edit</small></button>
                <a href="/me/courses/{{$course->slug}}/{{$batch->short_code}}/resources/{{$resource->unique_id}}/delete" class="text-danger"><small>Delete</small></a>
            </div>
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

    <div class="modal fade" id="res-{{$resource->unique_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/me/courses/{{$course->slug}}/{{$batch->short_code}}/resources/{{$resource->unique_id}}/edit" method="POST">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Resource</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="single-form">
                    <label for="">Resource Title</label>
                    <input type="text" value="{{$resource->title}}" name="title" class="" placeholder="Title">
                </div>

                <div class="single-form">
                    <label for="">Resource Link</label>
                    <input type="url" name="link" class="" value="{{$resource->link}}" placeholder="https://">
                </div>

                <div class="single-form">
                    <label for="">Write a Short Description</label>
                    <textarea  name="description" placeholder="Description" class="form-control" id="" rows="5">{{$resource->description}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-hover-primary btn-custom" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-hover-dark btn-custom">Update Resource</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
