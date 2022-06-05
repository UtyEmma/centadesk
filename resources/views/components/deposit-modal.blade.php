<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content w-50-md  mx-auto">
        <div class="modal-header border-0 pt-5">
          <h5 class="modal-title" id="exampleModalLabel">Deposit Funds</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/wallet/deposit" method="POST">
            @csrf
            <div class="modal-body">
                <div class="single-form pt-0 mt-0">
                    <label for="">Amount</label>
                    <div class="w-auto d-flex align-items-center border px-3 radius mr-0">
                        <small for="short_code" class="h-100 w-auto fw-medium fs-6">{{Auth::user()->currency}}</small>
                        <input class="form-control flex-1 border-0 radius-left-0" type="number" value="{{old('price')}}" class="hide-increment" min="0" name="amount" placeholder="0.00" />
                    </div>
                    <x-errors name="price" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-hover-primary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-hover-dark">Proceed to payment</button>
            </div>
        </form>
      </div>
    </div>
</div>
