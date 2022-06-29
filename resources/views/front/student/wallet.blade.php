<x-student-layout>
    <x-page-title title="My Wallet - Learning Center" />
    @inject('currency', "App\Library\Currency")

    <div class="section section-padding pt-3">
        <div class="container">
            <h4 class="title">Wallet Overview</h4>

            <div class="overview-box row">
                <div class="single-box col-md-4">
                    <h5 class="title">Deposits</h5>
                    <div class="count">
                        <span style="font-size: 14px;">
                            {{request()->cookie('currency')}}
                        </span>
                        <span style="font-size: 24px;">{{number_format($wallet->deposits)}}</span>
                    </div>
                </div>

                <div class="col-md-4 single-box">
                    <h5 class="title">Referral Earnings</h5>
                    <div class="count">
                        <span style="font-size: 16px;">{{request()->cookie('currency')}}</span>
                        <span style="font-size: 24px;">
                            {{number_format($wallet->referrals)}}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Graph Top Start -->
            <div class="graph border-0 p-0">
                <div class="w-100 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="title mb-0">My Deposits</h5>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#depositModal" class="btn btn-primary btn-hover-dark btn-custom">Add Deposit</i></a>
                    </div>
                </div>

                <div class="radius w-100 text-center radius border overflow-hidden">
                    <div class="table-responsive ">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="bg-light border-bottom border-muted" style="border-color: #dee2e6 !important;">
                                <th class="py-3"  style="font-weight: 500;">Amount</th>
                                <th class="py-3" style="font-weight: 500;">Payment Method</th>
                                <th class="py-3" style="font-weight: 500;">Status</th>
                                <th class="py-3" style="font-weight: 500;">Date</th>
                            </thead>

                            <tbody class="border-0 border-light border-1" style="border-style: none !important;">
                                @if (count($deposits) > 0)
                                    @foreach ($deposits as $deposit)
                                        <tr class="border-top">
                                            <td class="py-3">{{request()->cookie('currency')}} {{number_format($currency::convert($deposit->amount, $deposit->currency, request()->cookie('currency')))}}</td>
                                            <td class="py-3"> {{ucfirst($deposit->type)}} </td>
                                            <td class="py-3">
                                                {{ucfirst($deposit->status)}}
                                            </td class="py-3">
                                            <td class="py-3">
                                                {{Date::parse($deposit->updated_at)->format('jS M, Y')}}
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
            </div>
            <!-- Graph Top End -->
        </div>

        <x-deposit-modal :user="$user" />
    </div>

</x-student-layout>
