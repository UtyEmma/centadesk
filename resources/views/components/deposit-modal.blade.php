@push('scripts')
    <script src="https://checkout.flutterwave.com/v3.js"></script>

    <script>
        async function handleDeposit(e){
            e.preventDefault();
            const transaction = {}
            transaction.amount = $('input[name="amount"]').val()
            handleCheckout(transaction)
        }

        async function handleCheckout(transaction){
            FlutterwaveCheckout({
                public_key: "{{env('RAVE_PUBLIC_KEY')}}",
                amount: transaction.amount,
                currency: "{{$user->currency}}",
                payment_options: "card, mobilemoneyghana, ussd",
                customer: {
                    email: "{{$user->email}}",
                    name: '{{$user->firstname}} {{$user->lastname}}',
                },
                customizations: {
                title: "{{env('APP_NAME')}}",
                description: "Deposit to LibraClass",
                },
                onClose: handleOnClose,
                callback: completeTransaction
            });
        }

        function handleOnClose(res){
            console.log(response)
        }

        function completeTransaction(response){

            console.log(response)
        }
    </script>
@endpush
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content w-75-md mx-auto">
        <div class="modal-header border-0 pt-5">
          <h5 class="modal-title" id="exampleModalLabel">Deposit Funds</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="handleDeposit(event)">
            <div class="modal-body">
                <div class="single-form">
                    <label for="">Select Payment Method</label>

                    <div class="row">
                        <div class="col-6">
                            <x-custom-radio default="true" name="payment_method" value="crypto">Crypto</x-custom-radio>
                        </div>
                        <div class="col-6">
                            <x-custom-radio :default="false" name="payment_method" value="bank">Card</x-custom-radio>
                        </div>
                    </div>
                </div>

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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Proceed to payment</button>
            </div>
        </form>
      </div>
    </div>
</div>
