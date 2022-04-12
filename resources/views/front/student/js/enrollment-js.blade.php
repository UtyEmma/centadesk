@push('scripts')
    <script src="https://checkout.flutterwave.com/v3.js"></script>
@endpush

<script>

    async function handlePayment(){
        const type = $("input[name='method']").val()
        let transaction;

        if(type === 'bank'){
            transaction = await createTransaction()
        }else if(type === 'crypto'){
            transaction = await createCryptoTransaction()
        }
        return window.location.href = `{{env('MAIN_APP_URL')}}/profile/courses/${transaction.course}`;
    }

    function handleCryptoPayment(){

    }

    async function createCryptoTransaction(){

    }

    async function createTransaction(){
        const data = {
            course: '{{$course->slug}}',
            batch: '{{$batch->unique_id}}',
            amount: "{{$batch->discount === 'percent' || $batch->discount === 'fixed' ? $batch->discount_price : $batch->price}}",
            name: "{{$user->firstname.' '.$user->lastname}}",
            email: "{{$user->email}}",
            user_id: "{{$user->unique_id}}"
        }

        const response = await fetch('{{env('MAIN_APP_URL')}}/api/transaction/initialize', {
            method: 'POST',
            // mode: 'same-origin',
            // credentials: 'same-origin', // include, *same-origin, omit
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })

        if(!response.status === 200) return false
        const res = await response.json()
        const transaction = res.transaction
        return handleCheckout(transaction)
    }

    async function handleOnClose (transaction){
        console.log(transaction)
    }

    async function enrollUser(payment){
        const response = await fetch('{{env('MAIN_APP_URL')}}/api/enroll/'+'{{$batch->unique_id}}/'+payment.transaction_id, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
        })

        if(response.status !== 200) return false
        return await response.json()
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
