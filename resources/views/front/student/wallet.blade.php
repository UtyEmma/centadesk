<x-student-layout>
    <x-page-title title="My Wallet - Learning Center" />
    <div class="section section-padding pt-3">
        <div class="container">
            <h4 class="title">Wallet Overview</h4>

            <div class="overview-box row">
                <div class="single-box col-md-4">
                    <h5 class="title">Deposits</h5>
                    <div class="count">
                        <span style="font-size: 16px;">
                            {{request()->cookie('currency')}}
                        </span>
                        {{number_format($wallet->deposits)}}</div>
                </div>

                <div class="col-md-4 single-box">
                    <h5 class="title">Referral Earnings</h5>
                    <div class="count">
                        <span style="font-size: 16px;">{{request()->cookie('currency')}}</span>
                        {{number_format($wallet->referrals)}}</div>
                </div>
            </div>

            <!-- Graph Top Start -->
            <div class="graph border-0 p-0">
                <div class="graph-title mb-3">
                    <h4 class="title">Your Deposits</h4>

                    <div class="graph-btn text-right">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#depositModal" class="btn btn-primary btn-hover-dark">Add Deposit</i></a>
                    </div>

                    <x-deposit-modal :user="$user" />

                </div>

                <div class="card radius p-4 w-100 text-center">
                    <table class="w-100 hover table-striped table-active
                    table-hover table-responsive">
                        <thead class="bg-light radius" >
                            <th class="py-3">Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Deposit Date</th>
                        </thead>

                        <tbody>
                            @if (count($deposits) > 0)
                                @foreach ($deposits as $deposit)
                                    <tr class="border-top">
                                        <td class="py-3">{{$deposit->currency}} {{number_format($deposit->amount)}}</td>
                                        <td> {{$deposit->type}} </td>
                                        <td>
                                            {{$deposit->status}}
                                        </td>
                                        <td>
                                            {{$deposit->created->date}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center pt-5 ">
                                        <h4>You have not made any deposits</h4>
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

</x-student-layout>
