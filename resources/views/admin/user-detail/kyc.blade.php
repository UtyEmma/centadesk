<x-admin.user-details :user="$user">
    <div class="stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">KYC Information</h4>
            <div>
                <div class="mb-4">
                    <a href="/users/{{$user->unique_id}}" class="btn btn-outline-warning">View Profile</a>
                    @if ($user->kyc_status == 'pending')
                        <x-swal href="/users/{{$user->unique_id}}/actions/approve?action=true&type=approval" class="btn btn-outline-primary">Approve</x-swal>
                        <x-swal href="/users/{{$user->unique_id}}/actions/approve?action=false&type=approval" class="btn btn-outline-danger">Decline</x-swal>
                    @elseif ($user->kyc_status === 'approved')
                        <x-swal href="/users/{{$user->unique_id}}/actions/approve?action=false&type=revoke" class="btn btn-outline-primary">Revoke KYC</x-swal>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>KYC Status</h5>
                        <p>{{$user->kyc_status}}</p>
                    </div>

                    <div class="col-md-4">
                        <h5>KYC Method</h5>
                        <p>{{Str::headline($user->kyc_method)}}</p>
                    </div>

                    <div class="col-md-4">
                        <h5>ID Number</h5>
                        <p>{{$user->id_number}}</p>
                    </div>
                </div>
            </div>
            <div>
                <h5 class="mb-3">KYC Status</h5>
                <a href="{{$user->id_image}}" target="__blank">
                    <img src="{{$user->id_image}}" class="img-fluid" alt="">
                </a>
            </div>
          </div>
        </div>
      </div>
</x-admin.user-details>
