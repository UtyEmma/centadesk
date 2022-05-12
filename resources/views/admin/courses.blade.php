<x-admin.app-layout>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Courses</h4>
            <p class="card-description">
              {{-- Add class <code>.table-striped</code> --}}
            </p>
            <div class="w-100">
              <table class="table table-bordered table-responsive-md">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Mentor</th>
                    <th>No. Batches</th>
                    <th>No. Students</th>
                    <th>Earnings</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>
                                <a href="/courses/{{$course->slug}}" class="ml-2">{{$course->name}}</a>
                            </td>
                            <td>
                                {{$course->mentor->firstname}} {{$course->mentor->lastname}}
                            </td>
                            <td>
                                {{$course->total_batches}}
                            </td>
                            <td>
                                {{$course->total_students}}
                            </td>
                            <td>
                                {{$course->revenue}}
                            </td>
                            <td>
                                <span class="badge {{$course->status === 'published' ? 'badge-success' : 'badge-warning' }}">{{$course->status ? 'active' : 'inactive'}}</span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/courses/{{$course->unique_id}}">View Details</a>
                                    <a class="dropdown-item" href="/courses/{{$course->unique_id}}/edit">Edit Info</a>
                                    <hr/>
                                    <a class="dropdown-item" href="/courses/{{$course->unique_id}}/status">Disable</a>
                                    <a class="dropdown-item" href="/courses/{{$course->unique_id}}/delete">Delete</a>
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
