<script>
    async function sendMessage(e, user_id, type){
        e.preventDefault()
        const form = e.target
        const formData = new FormData(form)

        formData.append('user_id', user_id)
        formData.append('type', 'message')
        formData.append('batch_id', "{{$batch->unique_id}}")

        const data = Object.fromEntries(formData.entries())

        const request = await Request.post('{{env('MAIN_APP_URL')}}/api/forum/send/', data)
        if(!request.status) return console.log("Request Failed")

        form.reset()
    }

    function setMessages(){
        const container = $('#message-container')
        const message = ``;
    }

    function sendResponse(e, user_id, message_id) {
        e.preventDefault()
        const formData = new FormData(e.target)
        formData.append('user_id', user_id)
        const data = Object.fromEntries(formData.entries())

        const request = Request.post(`{{env('MAIN_APP_URL')}}/api/forum/reply/${message_id}`, data)
        if(!request.status) return console.log("Request Failed")
        console.log(request.data)

    }

    function showReplyForm(id){
        $(`#${id}`)[0].style.display = 'block'
    }

    function hideReplyForm(id){
        $(`#${id}`)[0].style.display = 'none'
    }

</script>
