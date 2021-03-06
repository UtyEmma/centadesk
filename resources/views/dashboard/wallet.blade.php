<x-app-layout>
    <x-page-title title="Mentor Dashboard - My Wallet" />
    <!-- Page Content Wrapper Start -->
    <div class="page-content-wrapper">
        <div class="container-fluid">

            <div class="mb-3">
                <h4 class="my-0">Wallet</h4>
            </div>

            <x-mentor.kyc-warning :user="$user" />

            <!-- Overview Top Start -->
            <div class="admin-top-bar flex-wrap">
                <div class="overview-box">
                    <div class="row gx-2">
                        <div class="col-md-3 col-6">
                            <div class="single-box w-100 px-3">
                                <h5 class="title mb-0">Lifetime Earnings</h5>
                                <div class="count mt-0">
                                    <span style="font-size: 14px;">{{request()->cookie('currency') ?? $user->currency}}</span>
                                    <span style="font-size: 18px">
                                        {{number_format($wallet->earnings)}}
                                    </span>
                                </div>
                                {{-- <p><span>$235.00</span> This months</p> --}}
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="single-box w-100 px-3">
                                <h5 class="title mb-0">Available Balance</h5>
                                <div class="count mt-0">
                                    <span style="font-size: 14px;">{{request()->cookie('currency') ?? $user->currency}}</span>
                                    <span style="font-size: 18px">
                                        {{number_format($wallet->available)}}
                                    </span>
                                </div>
                                {{-- <p><span>345</span> This months</p> --}}
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <div class="single-box w-100 px-3">
                                <h5 class="title mb-0">Pending Balance</h5>
                                <div class="count mt-0">
                                    <span style="font-size: 14px;">{{request()->cookie('currency') ?? $user->currency}}</span>
                                    <span style="font-size: 18px">
                                        {{number_format($wallet->escrow)}}
                                    </span>
                                </div>
                                {{-- <p><span>345</span> This months</p> --}}
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="single-box w-100 px-3">
                                <h5 class="title mb-0">Pending Payment</h5>
                                <div class="count mt-0">
                                    <span style="font-size: 14px;">{{request()->cookie('currency') ?? $user->currency}}</span>
                                    <span style="font-size: 18px">
                                        {{number_format($wallet->payouts)}}
                                    </span>
                                </div>
                                {{-- <p><span>345</span> This months</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Overview Top End -->

            <!-- Graph Top Start -->
            <div class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="title">Withdrawals</h4>
                    <x-withdrawal-modal />
                </div>

                <div class="card radius p-4">
                    <x-data-table id="withdrawal-table">
                        <thead class="text-center bg-light p-3 radius mb-2">
                            <th class="p-2 py-3">Amount</th>
                            <th>Payment Method</th>
                            <th>Account Number</th>
                            <th>Bank</th>
                            <th>Status</th>
                            <th>Withdrawal Date</th>
                        </thead>

                        <tbody class="text-center">
                            @if (count($withdrawals) > 0)
                                @foreach ($withdrawals as $withdrawal)
                                    <tr >
                                        <td class="py-2">{{request()->cookie('currency')}} {{number_format($withdrawal->amount)}}</td>
                                        <td> {{$withdrawal->type}} </td>
                                        <td>
                                            {{-- @if ($withdrawal->type === 'crypto')
                                                {{$withdrawal->wallet_key}} --}}
                                            {{-- @elseif ($withdrawal->type === 'bank') --}}
                                            {{$withdrawal->account_no}}
                                            {{-- @endif --}}
                                        </td>
                                        <td>
                                            {{-- @if ($withdrawal->type === 'crypto') --}}
                                            {{-- @elseif ($withdrawal->type === 'bank') --}}
                                            {{$withdrawal->bank_name}}
                                            {{-- @endif --}}
                                        </td>
                                        <td>
                                            <small class="bg-secondary p-2 py-1 rounded fs-6">
                                                {{$withdrawal->status}}
                                            </small>
                                        </td>
                                        <td>
                                            {{$withdrawal->created->date}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center pt-5 ">
                                        <h4>You have not made any withdrawals</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </x-data-table>
                </div>
            </div>
            <!-- Graph Top End -->

        </div>
    </div>
    <!-- Page Content Wrapper End -->
</x-app-layout>
