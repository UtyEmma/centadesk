<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch">
    <x-page-title title="Course Resources - {{$batch->title}}" />

    <div>
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <h5>Add links to resources for this batch!</h5>

                <button class="btn btn-primary btn-hover-dark btn-custom"  data-bs-toggle="modal" data-bs-target="#exampleModal">Add Resource</button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <form action="/me/courses/{{$course->slug}}/{{$batch->short_code}}/resources/create" method="POST">
                            @csrf
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Resource</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="single-form">
                                    <label for="">Resource Title</label>
                                    <input type="text" name="title" class="" placeholder="Title">
                                    <x-errors name="title" />
                                </div>

                                <div class="single-form">
                                    <label for="">Resource Link</label>
                                    <input type="url" name="link" class="" placeholder="https://">
                                    <x-errors name="link" />
                                </div>

                                <div class="single-form">
                                    <label for="">Write a Short Description</label>
                                    <textarea name="description" placeholder="Description" class="form-control" id="" rows="5"></textarea>
                                    <x-errors name="description" />
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-hover-primary btn-custom" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary btn-hover-dark btn-custom">Add Resource</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

        <div class="mt-3">
            <div class="row">
                @forelse ($resources as $resource)
                    @include('components.batch-resource')
                @empty
                    <div class="text-center">
                        <div class="border border-primary p-5 radius">
                            <h5>There are no Resources</h5>
                            <p>Click the button Above to add resources for this class</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-mentor-batch-detail>
