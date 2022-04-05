<x-guest-layout>

    @auth
        @include('front.student.js.enrollment-js')
    @endauth

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
            <div class="card radius p-5">
                <div class="card-body">
                    <div class="container row">
                        <div class="col-md-6 bg-light user">
                            <div class="mb-3">
                                <p class="dis fw-bold mb-0">Full Name</p>
                                <p>{{$user->firstname}} {{$user->lastname}}</p>
                            </div>
                            <div class="mb-3">
                                <p class="dis fw-bold mb-0">Email address</p>
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div >
                                <div>
                                    <p class="fw-bold mb-0">Payment Details</p>
                                    <p class="dis mb-3 mt-0">Complete your purchase by providing your payment details</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-4">
                                        <x-custom-radio name="method" :default="true" value="bank">
                                            Pay with Flutterwave
                                        </x-custom-radio>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <x-custom-radio name="method" :default="false" value="crypto">
                                            Pay with Crypto
                                        </x-custom-radio>
                                    </div>
                                </div>

                                <hr />

                                <div>
                                    <div class="address">
                                        <div class="d-flex flex-column dis">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p>Base Price</p>
                                                <p><span class="fas fa-dollar-sign"></span>{{$user->currency}} {{number_format($batch->price)}}</p>
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
                                                <p><span class="fas fa-dollar-sign"></span>
                                                    @if ($batch->discount === 'percent')
                                                        - {{$user->currency}} {{ceil($batch->percent / 100 * $batch->price)}}
                                                    @elseif ($batch->discount === 'fixed')
                                                        {{$batch->fixed}}
                                                    @else
                                                        None
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p class="fw-bold">Total</p>
                                                <p class="fw-bold"><span class="fas fa-dollar-sign"></span>{{$user->currency}} {{number_format($batch->discount_price)}}</p>
                                            </div>

                                            <button type="button" onclick="handlePayment()" class="btn btn-primary mt-2">Proceed with payment</button>
                                            <a href="/enroll/crypto/pay/{{$batch->unique_id}}" type="button" class="btn btn-primary mt-2">Pay with Crypto</a>


                                            {{-- <div>
                                                <a class="donate-with-crypto"
                                                href="https://commerce.coinbase.com/checkout/42020482-bc91-4b3e-bc80-ffd7e0e55e50">
                                                Pay with Crypto
                                                </a>
                                                <script src="https://commerce.coinbase.com/v1/checkout.js?version=201807">
                                                </script>
                                            </div> --}}

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
