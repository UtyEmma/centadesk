<x-app-layout>
    <!-- Page Content Wrapper Start -->
    <div class="page-content-wrapper">
        <div class="container-fluid">

            <x-mentor.kyc-warning :user="$user" />

            <!-- Overview Top Start -->
            <div class="admin-top-bar flex-wrap">
                <div class="overview-box">
                    <div class="single-box w-auto">
                        <h5 class="title">Lifetime Earnings</h5>
                        <div class="count">
                            <span style="font-size: 1rem;">{{request()->cookie('currency') ?? $user->currency}}</span>
                            {{number_format($wallet->earnings)}}
                        </div>
                        <p><span>$235.00</span> This months</p>
                    </div>

                    <div class="single-box w-auto">
                        <h5 class="title">Available Balance</h5>
                        <div class="count">
                            <span style="font-size: 1rem;">{{request()->cookie('currency') ?? $user->currency}}</span>
                            {{number_format($wallet->available)}}
                        </div>
                        <p><span>345</span> This months</p>
                    </div>

                    <div class="single-box w-auto">
                        <h5 class="title">Pending Balance</h5>
                        <div class="count">
                            <span style="font-size: 1rem;">{{request()->cookie('currency') ?? $user->currency}}</span>
                            {{number_format($wallet->escrow)}}
                        </div>
                        <p><span>345</span> This months</p>
                    </div>
                </div>
            </div>
            <!-- Overview Top End -->

            <!-- Graph Top Start -->
            <div class="graph">
                <div class="graph-title mb-3">
                    <h4 class="title">Withdrawals</h4>

                    <div class="graph-btn">
                        <x-withdrawal-modal />
                    </div>
                </div>

                <div class="card radius p-4">
                    <table class="table-responsive w-100">
                        <thead>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Account</th>
                            <th>Status</th>
                            <th>Withdrawal Date</th>
                        </thead>

                        <tbody>
                            @if (count($withdrawals) > 0)
                                @foreach ($withdrawals as $withdrawal)
                                    <tr>
                                        <td>{{$withdrawal->amount}}</td>
                                        <td> {{$withdrawal->type}} </td>
                                        <td>
                                            @if ($withdrawal->type === 'crypto')
                                                {{$withdrawal->wallet_key}}
                                            @elseif ($withdrawal->type === 'bank')
                                                {{$withdrawal->account_name}}
                                            @endif
                                        </td>
                                        <td>
                                            {{$withdrawal->status}}
                                        </td>
                                        <td>
                                            {{$withdrawal->created_at}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center pt-5 ">
                                        <h4>You have not made any withdrawals</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Graph Top End -->

        </div>
    </div>
    <!-- Page Content Wrapper End -->
</x-app-layout>
