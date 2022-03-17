<script>
    function wallet(){
        if (typeof window.ethereum !== 'undefined') {
            return window.ethereum
        }
        return null
    }

    async function getWalletAddress(){

        const ethereum = wallet()
        if(!ethereum) return console.log("You do not have Metamask installed on your browser. Please paste your wallet address manually")

        const accounts = await ethereum.request({method: 'eth_requestAccounts'})
        document.querySelector("input[name='crypto_address']").value = accounts[0]
        // console.log(accounts)
    }
</script>
