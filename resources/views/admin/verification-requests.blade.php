<x-admin.app-layout>
    <div class="stretch-card mb-4">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Verification Requests</h4>
              <p class="card-description">
                <span class="badge badge-light font-weight-bolder">{{count($verification_requests)}}</span> {{Str::plural('request', count($verification_requests))}}
              </p>
              <div class="table-responsive-md">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Verification Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($verification_requests as $mentor)
                            <tr>
                                <td>
                                    <a href="/users/{{$mentor->unique_id}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                                </td>
                                <td><label class="badge badge-warning">{{$mentor->is_verified}}</label></td>
                                <td colspan="2">
                                    <a href="/users/{{$mentor->unique_id}}" class="btn btn-outline-warning">View Profile</a>
                                    <x-swal href="/users/{{$mentor->unique_id}}/actions/verify?status=true" class="btn btn-outline-primary">Verify</x-swal>
                                    <x-swal href="/users/{{$mentor->unique_id}}/actions/verify?status=false" class="btn btn-outline-danger">Decline</x-swal>
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
