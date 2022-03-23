<script>
    const key = "{{env('RAVE_SECRET_KEY')}}"

    document.addEventListener('DOMContentLoaded', (event) => {
        fetchBanks()
    });

    async function fetchBanks(){
        const url = "{{env('MAIN_APP_URL')}}/api/banks"

        const element = document.querySelector('select[name="bank"]')
        const request = await Request.get(url, key, {mode: 'no-cors'} )

        if(request?.status){
            const banks = request.data.banks

            return banks.map(bank => {
                var option = document.createElement("option");
                option.text = bank.name;
                option.value = bank.code;
                element.append(option);
            })
        }

        const banks = await $.getJSON("{{asset('data/banks/banks.json')}}")
        return banks.map(bank => element.append(`<option value='${bank.code}'>${bank.name}</option>`))
    }

    async function verifyBankDetails(){

        const bank = document.querySelector('select[name="bank"]').value
        const acct_no = document.querySelector('input[name="account_number"]').value
        const err = document.querySelector('#bank_info_error')

        const url = "{{env('MAIN_APP_URL')}}/api/banks/verify"

        if(!bank || !acct_no) {
            return err.innerHTML = "Bank Name and Account Number are required";
        }else{
            err.innerHTML = "";
        }

        const data = {
            bank_code: bank,
            account_number: acct_no
        }

        const request = await Request.post(url, data, key)

        if(!request.status){
            const message = request.code === 400 ? request.data.error.message : "Your Bank Information could not be confirmed at the moment! Please retry later"
            return err.innerHTML = message
        }

        document.querySelector('input[name="account_name"]').hidden = false
        const res = request.data

        document.querySelector('input[name="account_name"]').value = res.account_name
        document.querySelector('#account_name').innerHTML = res.account_name
        document.querySelector('#account_name').hidden = true
    }

</script>
