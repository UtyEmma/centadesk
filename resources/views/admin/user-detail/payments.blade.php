<x-admin.user-details :user="$user">
    <div class="stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Payments</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Amount</th>
                    <th>Reference</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->currency}} {{number_format($transaction->amount)}}</td>
                            <td>{{$transaction->reference}}</td>
                            <td> {{$transaction->type}}</td>
                            <td><label class="badge {{$transaction->status ? 'badge-success' : 'badge-warning'}}">{{$transaction->status}}</label></td>
                            <td>{{$transaction->created->date}}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</x-admin.user-details>
