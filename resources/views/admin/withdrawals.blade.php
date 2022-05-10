<x-admin.app-layout>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Withdrawals</h4>

                <form action="/withdrawals/update" method="post">
                    @csrf
                    <div class="float-right">
                        <a href="" class="btn btn-outline-success">Confirm Selected</a>
                        <a href="" class="btn btn-outline-warning">Decline Selected</a>
                    </div>

                    <table class="table table-bordered mt-3 table-responsive-md">
                        <thead>
                            <script>
                                function checkAll(e){
                                    const name = e.target.name
                                    $(`input[name='withdrawals[]']`).prop('checked', e.target.checked)
                                    console.log($(`input[name='withdrawals[]']`))
                                }
                            </script>
                            <tr>
                                <th>
                                    <input  name="withdrawals[]" type="checkbox" onchange="checkAll(event)">
                                </th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Wallet Balance</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($withdrawals as $withdrawal)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="withdrawals[]" value="{{$withdrawal->unique_id}}" >
                                    </td>
                                    <td>
                                        {{$withdrawal->firstname}} {{$withdrawal->lastname}}
                                    </td>
                                    <td>
                                        <div class="badge {{$withdrawal->status ? 'badge-primary' : 'badge-warning'}}">{{$withdrawal->status}}</div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/withdrawals/{{$withdrawals->unique_id}}/confirm" class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                Confirm
                                            </a>
                                            <a href="/withdrawals/{{$withdrawals->unique_id}}/decline" class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
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
                </form>
            </div>
        </div>
    </div>
</x-admin.app-layout>
