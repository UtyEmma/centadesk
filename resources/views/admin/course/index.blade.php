<x-admin.app-layout>
    <div class="row">
        <div class="col-md-4">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <div class="text-center">
                        <div class="mt-3">
                            {{-- @if ($user->role === 'mentor') --}}
                                <div class="w-100 text-left">
                                    <div class="mb-2">
                                        <h6 class="mb-0">Course Title</h6>
                                        <p>{{$course->name}}</p>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Course Category</h6>
                                        <p class="text-secondary text-capitalize">{{$course->category}}</p>
                                    </div>
                                    <div class="bg-light p-4 text-center">
                                        <div class="row">
                                            <div class="col-4 mb-3">
                                                <h5 class="font-weight-bold mb-0">{{$course->total_batches}}</h5>
                                                <small class="text-muted">Batches</small>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <h5 class="font-weight-bold mb-0">{{$course->total_students}}</h5>
                                                <small class="text-muted"> Students</small>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <h5 class="font-weight-bold mb-0">{{$course->reviews}}</h5>
                                                <small class="text-muted">Reviews</small>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <h5 class="font-weight-bold mb-0">{{$course->revenue}}</h5>
                                                <small class="text-muted">Revenue</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- @endif --}}
                        </div>

                        <div class="row py-3 g-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-primary w-100">Edit Profile</button>
                            </div>

                            <div class="col-6">
                                <button type="button" class="btn btn-primary w-100">Disable Account</button>
                            </div>

                            <div class="col-6 ">
                                <button type="button" class="btn btn-primary w-100">Delete Account</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
        </div>

        <div class="col-md-8">
            {{$slot}}
        </div>
    </div>
</x-admin.app-layout>
