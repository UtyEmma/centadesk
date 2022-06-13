<!-- Button trigger modal -->
<div class="info-btn">
    <button type="button" class="btn btn-primary btn-hover-dark btn-custom" data-bs-toggle="modal" data-bs-target="#withdrawalModal">
        Withdraw Funds
      </button>
</div>

<div class="modal fade" id="withdrawalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content mx-auto ">
        <div class="modal-header pt-5">
          <h5 class="modal-title" id="exampleModalLabel">Withdraw Funds</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="/me/wallet/withdraw" method="POST">
            <div class="modal-body text-start">
                @csrf
                {{-- <div class="single-form">
                    <label for="">Select Withdrawal Method</label>

                    <div class="row">
                        <div class="col-6">
                            <x-custom-radio :default="true" name="payment_method" value="bank">Card</x-custom-radio>
                        </div>
                        <div class="col-6">
                            <x-custom-radio :default="false" name="payment_method" value="crypto">Crypto</x-custom-radio>
                        </div>
                    </div>
                </div> --}}

                <div class="single-form">
                    <label for="">Amount</label>
                    <div class="w-auto d-flex align-items-center border px-3 radius mr-0">
                        <small for="short_code" class="h-100 w-auto fw-medium fs-6">{{Auth::user()->currency}}</small>
                        <input class="form-control flex-1 border-0 radius-left-0" type="number" value="{{old('price')}}" class="hide-increment" min="0" name="amount" placeholder="0.00" />
                    </div>
                    <x-errors name="price" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-hover-primary btn-custom" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-hover-dark btn-custom">Withdraw</button>
            </div>
        </form>
      </div>
    </div>
</div>
