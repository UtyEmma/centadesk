<x-admin.user-details :user="$user">
    <div class="stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Courses</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Course Title</th>
                    <th>Batches</th>
                    <th>Students</th>
                    <th>Earnings</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->name}}</td>
                            <td>{{$course->total_batches}}</td>
                            <td> {{$course->total_students}}</td>
                            <td>{{$course->revenue}}</td>
                            <td><label class="badge {{$course->status ? 'badge-success' : 'badge-warning'}}">{{$course->status}}</label></td>
                            <td><button class="btn btn-sm btn-outline-primary">View Course</button></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</x-admin.user-details>
