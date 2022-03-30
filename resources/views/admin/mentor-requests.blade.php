<x-admin.app-layout>
    <div class="stretch-card mb-4">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Mentor Requests</h4>
              <p class="card-description">
                There are <span class="badge badge-light font-weight-bolder">{{count($mentor_requests)}}</span> requests
              </p>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>KYC Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if(count($mentor_requests) > 0)
                        @foreach ($mentor_requests as $mentor)
                            <tr>
                                <td>
                                    <a href="/users/{{$mentor->unique_id}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                                </td>
                                <td><label class="badge badge-warning">{{$mentor->kyc_status}}</label></td>
                                <td colspan="2">
                                    <a href="/users/{{$mentor->unique_id}}" class="btn btn-outline-warning">View Profile</a>
                                    <a href="/users/{{$mentor->unique_id}}/actions/approve?action=true" class="btn btn-outline-primary">Approve</a>
                                    <a href="/users/{{$mentor->unique_id}}/actions/approve?action=false" class="btn btn-outline-primary">Disapprove</a>
                                </td>
                            </tr>
                        @endforeach
                      @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
</x-admin.app-layout>
