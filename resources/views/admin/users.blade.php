<x-admin.app-layout>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Users</h4>
            <p class="card-description">
              {{-- Add class <code>.table-striped</code> --}}
            </p>
            <div>
              <table class="table table-bordered table-responsive-md">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{$user->avatar ?? asset('images/icon/avatar.png')}}" style="object-fit: cover" alt="image"/>
                                <a href="/users/{{$user->unique_id}}" class="ml-2">{{$user->firstname}} {{$user->lastname}}</a>
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="text-capitalize lh-1">
                                        {{$user->role}}
                                    </span>
                                    @if ($user->role === 'mentor' && $user->kyc_status === 'pending')
                                        <span class="badge badge-warning">{{$user->kyc_status}} approval</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="badge {{$user->status ? 'badge-success' : 'badge-warning' }}">{{$user->status ? 'active' : 'inactive'}}</span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/users/{{$user->unique_id}}">View Details</a>
                                    <a class="dropdown-item" href="/users/{{$user->unique_id}}/edit">Edit Info</a>
                                    <hr/>
                                    <a class="dropdown-item" href="/users/{{$user->unique_id}}/status">Disable</a>
                                    <x-swal class="dropdown-item" href="/users/{{$user->unique_id}}/delete">Delete</x-swal>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</x-admin.app-layout>
