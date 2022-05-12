<div class="courses-item mt-2">
    <div class="row gx-2">
        <div class="col-md-4">
            <div id="course-images" style="height: 100%;" class="w-100 courses-active courses-details-images overflow-hidden radius position-relative">
                <img class="position-absolute img-cover" src="{{$batch->images}}" alt="{{$batch->title}}" />
            </div>
        </div>

        <div class="col-md-8">
            <div class="content-title">
                <div class="meta">
                    <a href="#" class="lh-0 action text-capitalize">{{$batch->status}}</a>
                    <a href="#" class="lh-0 action">{{$batch->price > 0 ? 'Paid' : 'Free'}}</a>
                    <a href="#" class="action text-capitalize">{{$batch->discount !== 'none' ? 'Discounted' : 'No Discount'}}</a>
                </div>
            </div>

            <div class="content-title pt-1">
                <h3 class="title mt-0">
                    <a class="mt-1" href="/me/courses/{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a>
                </h3>

                <small>{{$batch->excerpt}}</small>
            </div>

            <div class="d-flex content-title align-items-center justify-content-between pt-2">
                <x-batch-share :batch="$batch" />

                <div class="content-wrapper">
                    <div class="dropdown mt-0">
                        <button class="btn btn-primary btn-hover-dark dropdown-toggle  px-4 border-0" style="font-size: 14px; line-height: 3.5;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Options
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{$course->slug}}/{{$batch->short_code}}/edit">Edit</a></li>
                            <li><a class="dropdown-item" href="{{$course->slug}}/{{$batch->short_code}}">Details</a></li>
                            <li><a class="dropdown-item" href="/courses/{{$course->slug}}/{{$batch->short_code}}">Preview</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="{{$course->slug}}/{{$batch->short_code}}/delete">Delete</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
