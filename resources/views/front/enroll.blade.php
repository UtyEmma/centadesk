<x-guest-layout>
    <x-page-banner>
        <x-slot name="current">
            Courses
        </x-slot>
        <x-slot name="title">
            Enroll for <span>{{$batch->title}}</span>
        </x-slot>
    </x-page-banner>

    <div class="section section-padding">
        <div class="container">
            <div class="card radius p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 bg-light radius p-2 ">
                            <div class="mb-3">
                                <p class="fw-bold mb-0">Full Name</p>
                                <p>{{$user->firstname}} {{$user->lastname}}</p>
                            </div>
                            <div class="mb-3">
                                <p class="fw-bold mb-0">Email address</p>
                                <p>{{$user->email}}</p>
                            </div>
                        </div>

                        <div class="col-md-6 p-md-4">
                            <div >
                                <div>
                                    <h5>Payment Details</h5>
                                    <p class="mb-3 mt-0">Complete your purchase by providing your payment details</p>
                                </div>

                                <div class="row">
                                    {{-- <div class="mb-2">
                                        <x-custom-radio name="method" value="bank" :default="true">
                                            <div>
                                                <small>Pay with Card</small>
                                                <small>Flutterwave</small>
                                            </div>
                                        </x-custom-radio>
                                    </div>
                                    <div class="mb-2">
                                        <x-custom-radio name="method" value="crypto" :default="false">
                                            <div>
                                                <small>Pay with Cryptocurrency</small>
                                                <small>Coinbase</small>
                                            </div>
                                        </x-custom-radio>
                                    </div>
                                    <div class="mb-2">
                                        <x-custom-radio name="method" value="wallet" :default="false">
                                            <div>
                                                <small>Pay with Referral Earnings</small>
                                                <p >
                                                    <small class="fw-bold">{{$user->currency}}</small>
                                                    <span class="fs-5">
                                                        {{number_format($wallet->referrals)}}
                                                    </span>
                                                </p>
                                            </div>
                                        </x-custom-radio>
                                    </div> --}}
                                </div>

                                <div>
                                    <div class="address">
                                        <div class="d-flex flex-column dis">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p>Base Price</p>
                                                <p>
                                                    <small>{{$user->currency}}</small> {{number_format($batch->price)}}
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p>Discount
                                                    <span>
                                                        (@if ($batch->discount === 'percent')
                                                                {{$batch->percent}}%
                                                            @elseif ($batch->discount === 'fixed')
                                                                Fixed
                                                            @else
                                                                None
                                                            @endif)
                                                    </span></p>
                                                <p>
                                                     @if ($batch->discount === 'percent')
                                                        -
                                                        <small>{{$user->currency}}</small> {{number_format(ceil($batch->percent / 100 * $batch->price))}}
                                                    @elseif ($batch->discount === 'fixed')
                                                        {{$batch->fixed}}
                                                    @else
                                                        None
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p class="fw-bold">Total</p>
                                                <p class="fw-bold">
                                                    <small>{{$user->currency}}</small>
                                                    {{number_format($batch->discount_price)}}
                                                </p>
                                            </div>

                                            <div class="col-md-8">
                                                <a href="/enroll/card/{{$batch->unique_id}}" class="btn btn-primary mt-2 w-100 me-3">Proceed with Payment</a>
                                                <a href="/enroll/crypto/{{$batch->unique_id}}" type="button" class="btn btn-primary mt-2">Pay with Crypto</a>
                                                <a href="/enroll/wallet/{{$batch->unique_id}}" type="button" class="btn btn-primary mt-2">Pay with Wallet Balance</a>
                                            </div>

                                            {{Session::get('error')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
