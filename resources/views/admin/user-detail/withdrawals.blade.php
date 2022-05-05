<x-admin.user-details :user="$user">
    <div class="stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Withdrawals</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Amount</th>
                    <th>Bank</th>
                    <th>Account No</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($withdrawals as $withdrawal)
                        <tr>
                            <td>{{$withdrawal->amount}}</td>
                            <td>{{$withdrawal->bank_name}}</td>
                            <td> {{$withdrawal->account_no}}</td>
                            <td><label class="badge {{$withdrawal->status ? 'badge-success' : 'badge-warning'}}">{{$withdrawal->status}}</label></td>
                            <td>{{$withdrawal->created->date}}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</x-admin.user-details>
