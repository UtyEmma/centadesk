<x-admin.app-layout>
    <div class="row">
        <div class="col-md-4">
            <div class="p-4 bg-white">
                <h4>Create Category</h4>

                <div class="mt-4">
                    <form action="/categories/create" method="POST">
                        @csrf
                        <div>
                            <label for="name">Category Name</label>
                            <input name="name" id="name" placeholder="Category Name" class="form-control" type="text" />
                            <x-errors name="name" />
                        </div>

                        <button class="btn btn-primary mt-3" type="submit">Create Category</button>
                    </form>
                </div>

                <hr class="mt-4" />

                <div>
                    <button class="btn btn-primary mt-3">Fetch Categories</button>
                </div>
            </div>

        </div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Categories</h4>
                <p class="card-description">
                  {{-- Add class <code>.table-striped</code> --}}
                </p>
                <div>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (count($categories) > 0)

                        @else

                        @endif
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    <div class="badge {{$category->status ? 'badge-primary' : 'badge-warning'}}">{{$category->status ? 'Enabled' : 'Disabled' }}</div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/categories/{{$category->unique_id}}">View Details</a>
                                        <a class="dropdown-item" href="/categories/{{$category->unique_id}}/edit">Edit Info</a>
                                        <hr/>
                                        <a class="dropdown-item" href="/categories/{{$category->unique_id}}/status">Disable</a>
                                        <a class="dropdown-item" href="/categories/{{$category->unique_id}}/delete">Delete</a>
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
    </div>
</x-admin.app-layout>
