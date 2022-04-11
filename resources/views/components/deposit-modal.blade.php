@push('scripts')
    <script>
        async function handleDeposit(e){

        }
        async function handleCheckout(transaction){
            FlutterwaveCheckout({
                public_key: "{{env('RAVE_PUBLIC_KEY')}}",
                tx_ref: transaction.reference,
                amount: transaction.amount,
                currency: transaction.currency,
                payment_options: "card, mobilemoneyghana, ussd",
                customer: {
                    email: "{{$user->email}}",
                    name: '{{$user->firstname}} {{$user->lastname}}',
                },
                customizations: {
                title: "{{env('APP_NAME')}}",
                description: "Payment for Batch {{$course->name}}",
                },
                onClose: handleOnClose,
                callback: enrollUser
            });
        }
    </script>
@endpush
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deposit Funds</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="single-form">
                    <label for="">Select Payment Method</label>

                    <div class="row">
                        <div class="col-3">
                            <x-custom-radio default="true" name="payment_method" value="crypto">Crypto</x-custom-radio>
                        </div>
                        <div class="col-3">
                            <x-custom-radio :default="false" name="payment_method" value="bank">Card Payment</x-custom-radio>
                        </div>
                    </div>
                </div>

                <div class="single-form col-6">
                    <label for="">Amount</label>
                    <input type="number" placeholder="00" name="amount">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Proceed to payment</button>
        </div>
      </div>
    </div>
</div>
