<x-admin.app-layout>
    <div class="grid-margin stretch-card">
        @inject('currency', 'App\Library\Currency')
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Withdrawal Requests</h4>
                    <div >
                        <a href="/withdrawals" class="btn btn-outline-success">Withdrawals</a>
                        {{-- <a href="" class="btn btn-outline-warning">Decline Selected</a> --}}
                    </div>
                </div>

                {{-- <form action="/withdrawals/update" method="post">
                    @csrf --}}

                    <table class="table table-bordered mt-3 table-responsive-md">
                        <thead>
                            {{-- <script>
                                function checkAll(e){
                                    const name = e.target.name
                                    $(`input[name='withdrawals[]']`).prop('checked', e.target.checked)
                                    console.log($(`input[name='withdrawals[]']`))
                                }
                            </script> --}}
                            <tr>
                                {{-- <th> --}}
                                    {{-- <input  name="withdrawals[]" type="checkbox" onchange="checkAll(event)"> --}}
                                {{-- </th> --}}
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Wallet Balance</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($withdrawals->items() as $withdrawal)
                                <tr>
                                    {{-- <td> --}}
                                        {{-- <input type="checkbox" name="withdrawals[]" value="{{$withdrawal->unique_id}}" > --}}
                                    {{-- </td> --}}
                                    <td>
                                        <a href="/users/{{$withdrawal->user_id}}">
                                            {{$withdrawal->firstname}} {{$withdrawal->lastname}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$withdrawal->currency}} {{number_format($withdrawal->amount)}}
                                    </td>
                                    <td>
                                        {{$withdrawal->type}}
                                    </td>
                                    <td>
                                        {{$withdrawal->currency}} {{number_format($currency::convert($withdrawal->available, $withdrawal->currency, 'NGN'))}}
                                    </td>
                                    <td>
                                        <div class="badge {{$withdrawal->status ? 'badge-primary' : 'badge-warning'}}">{{$withdrawal->status}}</div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/withdrawals/confirm?withdrawal_id={{$withdrawal->unique_id}}" class="btn btn-outline-primary" type="button">
                                                Confirm
                                            </a>
                                            <a href="/withdrawals/decline?withdrawal_id={{$withdrawal->unique_id}}" class="btn btn-outline-danger" type="button">
                                                Decline
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p>No Categories</p>
                            @endforelse
                        </tbody>
                    </table>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</x-admin.app-layout>
