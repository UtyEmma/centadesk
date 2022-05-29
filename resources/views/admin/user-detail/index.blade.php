<x-admin.app-layout>

    <div class="row">
        <div class="col-md-4">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="text-center">

                        <img src="{{$user->avatar ?? asset('images/icon/avatar.png')}}" alt="Admin" class="rounded-circle" style="object-fit: cover;" width="100" height="100" >
                        <div class="mt-3">
                            <h4>{{$user->firstname}} {{$user->lastname}}</h4>
                            <p class="text-secondary mb-1 text-capitalize">{{$user->role}}</p>
                            <p class="text-muted font-size-sm">{{$user->specialty}}</p>

                            @if ($user->role === 'mentor')
                                <div class="w-100 text-left">
                                    <p>Mentor Stats</p>
                                    <div class="bg-light p-4 text-center">
                                        <div class="row">
                                            <div class="col-4 mb-3">
                                                <h5 class="font-weight-bold mb-0">{{$user->total_courses}}</h5>
                                                <small class="text-muted">Courses</small>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <h5 class="font-weight-bold mb-0">{{$user->total_batches}}</h5>
                                                <small class="text-muted"> Batches</small>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <h5 class="font-weight-bold mb-0">0</h5>
                                                <small class="text-muted">Students</small>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <h5 class="font-weight-bold mb-0">{{$user->earnings}}</h5>
                                                <small class="text-muted">Earnings</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row py-3">
                            <div class="col-6">
                                <a href="/users/{{$user->unique_id}}/edit" class="btn btn-primary">Edit Profile</a>
                            </div>

                            <div class="col-6">
                                <a href="/users/{{$user->unique_id}}/status" class="btn btn-primary">Disable Account</a>
                            </div>

                            <div class="col-6">
                                <x-swal href="/users/{{$user->unique_id}}/delete"  class="btn btn-primary">Delete Account</x-swal>
                            </div>

                            @if($user->role === 'mentor')
                                <div class="col-6">
                                    <x-swal  type="button" class="btn btn-primary">Verify User</x-swal>
                                </div>

                                @if ($user->kyc_status === 'pending')
                                    <div class="col-6">
                                        <x-swal href="/users/{{$user->unique_id}}/actions/approve?action=true" class="btn btn-primary">Approve</x-swal>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="col-md-8">
            <div class="col-12 ">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link {{request()->is("users/$user->unique_id") ? 'active' : ''}}" href="/users/{{$user->unique_id}}">Profile</a>
                    </li>

                    @if ($user->role === 'mentor' && $user->kyc_status === 'approved')
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('users/*/courses') ? 'active' : ''}} " href="/users/{{$user->unique_id}}/courses">Courses</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link {{request()->is('users/*/enrolled') ? 'active' : ''}}" href="/users/{{$user->unique_id}}/enrolled">Enrollments</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{request()->is('users/*/payments') ? 'active' : ''}}" href="/users/{{$user->unique_id}}/payments">Payments</a>
                    </li>

                    @if ($user->role === 'mentor' && $user->kyc_status === 'approved')
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('users/*/withdrawals') ? 'active' : ''}}" href="/users/{{$user->unique_id}}/withdrawals">Withdrawals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('users/*/kyc') ? 'active' : ''}}" href="/users/{{$user->unique_id}}/kyc">KYC</a>
                        </li>
                    @endif

                </ul>
            </div>
            {{$slot}}
        </div>
    </div>

</x-admin.app-layout>
