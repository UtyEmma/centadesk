<x-admin.user-details :user="$user">
    <div class="card mb-3">
        <div class="card-body">
            <div>

            </div>

            <div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <span class="badge badge-primary">{{$user->role}}</span>
                                @if ($user->role === 'mentor')
                                    @if ($user->kyc_status === 'pending')
                                        <span class="badge badge-info">Pending Approval</span>
                                    @endif

                                    <span class="badge {{$user->is_verified ? 'badge-success' : 'badge-warning' }}">{{$user->is_verified ? 'Verified' : 'Not Verified'}}</span>

                                @endif
                            </div>
                            <div class="col-6">
                                <h6 class="mb-2">First Name</h6>
                                <p class="text-secondary">{{$user->firstname}}</p>
                            </div>
                            <div class="col-6">
                                <h6 class="mb-2">Last Name</h6>
                                <p class="text-secondary">{{$user->lastname}}</p>
                            </div>

                            <div class="col-6">
                                <h6 class="mb-2">Email Address</h6>
                                <p class="text-secondary">{{$user->email}}</p>
                            </div>

                            <div class="col-6">
                                <h6 class="mb-2">User Role</h6>
                                <p class="text-secondary text-capitalize">{{$user->role}}</p>
                            </div>
                        </div>

                        <div class="bg-light p-4">

                        </div>
                    </div>

                    <div class="col-md-6">
                    </div>

                    <div class="col-md-12 mt-3">
                        <h6 class="mb-2">Description</h6>
                        <p class="text-secondary">{!! $user->desc !!}</p>
                    </div>

                    @if ($user->role === 'mentor')
                        <div class="col-md-12">
                            <ul class="nav nav-tabs border-top-0 border-right-0 border-left-0" id="myTab" role="tablist">
                                <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Education</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Work Experience</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    @foreach ($user->qualification as $qualification)
                                        <div class="card my-2 border-5 pt-2 active pb-0 px-3">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 class="card-title text-capitalize mb-0"><b>{{$qualification->qualification}}</b></h4>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="card-subtitle text-muted">
                                                            <p class="card-text text-muted small">
                                                                <span class="ml-0"></span> Institution -  <span class="font-weight-bold"> {{$qualification->institution}}</span> {{$qualification->date}}
                                                            </p>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    @foreach ($user->experience as $experience)
                                        <div class="card my-2 border-5 pt-2 active pb-0 px-3">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <h4 class="card-title text-capitalize mb-0">
                                                            <b>{{$experience->role}}</b>
                                                        </h4>
                                                        <p class="font-weight-normal">{{$experience->startdate}} - {{$experience->enddate}}</p>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="card-subtitle text-muted">
                                                            <p class="card-text text-muted">
                                                                <span class="ml-0"></span> Company -  <span class=""> {{$experience->company}}</span>
                                                            </p>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a class="btn btn-info" href="/users/{{$user->unique_id}}/edit">Edit Profile</a>
            </div>
        </div>
    </div>
</x-admin.user-details>
