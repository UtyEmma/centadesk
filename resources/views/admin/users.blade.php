<x-admin.app-layout>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Users</h4>
            <p class="card-description">
              {{-- Add class <code>.table-striped</code> --}}
            </p>
            <div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Amount</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="image"/>
                                <a href="/users/{{$user->unique_id}}" class="ml-2">{{$user->firstname}} {{$user->lastname}}</a>
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                <p class="text-capitalize">
                                    {{$user->role}}
                                </p>
                            </td>
                            <td>
                                $ 77.99
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
                                    <a class="dropdown-item" href="/users/{{$user->unique_id}}/delete">Delete</a>
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
