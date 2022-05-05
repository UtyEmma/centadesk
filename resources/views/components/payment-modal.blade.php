<!-- Button trigger modal -->
<div class="info-btn">
    <button type="button" class="btn btn-primary btn-hover-dark w-100" style="font-size: 14px; line-height: 3.5;" data-bs-toggle="modal" data-bs-target="#enrollmentModal">
        Enroll Now
      </button>
</div>

  <!-- Modal -->
<div class="modal fade" id="enrollmentModal" tabindex="-1" aria-labelledby="enrollmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollmentModalLabel">Complete your Enrollment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/enroll/{{$batch->unique_id}}" method="POST" class="modal-body p-5">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex flex-column bg-light radius p-4 mb-3">
                            <div>
                                <h6 class="text-primary">Personal Details</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <small class="fw-bold mb-0">Firstname</small>
                                        <p class="mt-0">{{$user->firstname}}</p>
                                    </div>

                                    <div class="col-md-6">
                                        <small class="fw-bold mb-0">Lastname</small>
                                        <p class="mt-0">{{$user->firstname}}</p>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <small class="fw-bold mb-0">Email Address</small>
                                        <p class="mt-0">{{$user->email}}</p>
                                    </div>

                                </div>
                            </div>

                            <hr />
                            <div>
                                <h6 class="text-primary">Payment Details</h6>

                                <div class="d-flex align-items-center justify-content-between">
                                    <p>Base Price</p>
                                    <p>
                                        <small>{{$user->currency}}</small> {{number_format($batch->price)}}
                                    </p>
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
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

                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-bold">Total</p>
                                    <p class="fw-bold">
                                        <small>{{$user->currency}}</small>
                                        {{number_format($batch->discount_price)}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h6>Select Payment Option</h6>
                        <div class="mb-2">
                            <x-custom-radio name="payment" value="card" :default="true">
                                <div>
                                    <small>Pay with Card</small>
                                </div>
                                {{-- <img src="{{asset('images/logos/flutterwave.png')}}" width="200" class="img-fluid" alt=""> --}}
                            </x-custom-radio>
                        </div>
                        <div class="mb-2">
                            <x-custom-radio name="payment" value="crypto" :default="false">
                                <div>
                                    <small>Pay with Crypto</small>
                                </div>
                            </x-custom-radio>
                        </div>
                        <div class="mb-2">
                            <x-custom-radio name="payment" value="wallet" :default="false">
                                <div>
                                    <small>Pay with Wallet</small>
                                    <p >
                                        <small class="fw-bold">{{$user->currency}}</small>
                                        <span class="fs-5">
                                            {{number_format($wallet->referrals)}}
                                        </span>
                                    </p>
                                </div>
                            </x-custom-radio>
                        </div>
                    </div>
                </div>
                <div class="modal-footer w-100">
                    <button type="button" class="btn btn-secondary btn-hover-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-hover-dark">Proceed with Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
