<x-admin.app-layout>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3>Register Admin</h3>
                    <hr>
                    <form action="/admins/create" method="POST" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name="name" required id="exampleInputUsername1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" required id="exampleInputEmail1" placeholder="Email Adress">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Role</label>
                            <select name="role" class="form-control form-select" id="">
                                <option value="super-admin">Super Administrator</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Register</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>Administrators</h3>
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
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>
                                        {{$admin->name}}
                                    </td>
                                    <td>
                                        {{$admin->email}}
                                    </td>
                                    <td>
                                        <div admin>
                                            <span class="text-capitalize lh-1">
                                                {{Str::headline($admin->role)}}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge {{$admin->status ? 'badge-success' : 'badge-warning' }}">{{$admin->status ? 'active' : 'suspended'}}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="/admin/{{$admin->unique_id}}/status">{{$admin->status ? 'Suspend' : 'Unsuspend'}}</a>
                                            <a class="dropdown-item" href="/admin/{{$admin->unique_id}}/delete">Delete</a>
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
