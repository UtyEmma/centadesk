<div class="card radius border card-chat-body bg-white order-0 w-100 p-0"  style="height: 84vh;">
    <div class="chat-header border-bottom bg-light radius-top p-3 py-2" >
        <div class="d-flex align-items-center">
            <div class="ratio ratio-1x1 me-2" style="width: 50px; height: 50px;">
                <img src="{{$batch->images}}" class="img-fluid rounded" style="object-fit: cover;" alt="">
            </div>

            <div>
                <h5 class="mb-0 mt-0">{{$batch->title}} </h5>
                <p style="font-size: 14px; font-weight: 500;">
                    Discussion Forum @if ($batch->enrollments->count() > 0)
                        - <span  class="mb-0">{{$batch->enrollments->count()}} {{Str::plural('Member', $batch->enrollments->count())}}</span>
                    @endif
                </p>
            </div>
        </div>

   </div>

    <ul class="chat-history list-unstyled mb-0 p-3 pt-4 float-left w-100 custom-scrollbar" id="forum-chat" style="height: 80%; overflow-y: scroll;">
        @forelse ($messages as $message)
           @if ($message->is_sender)
               <li class="float-right offset-3 col-9">
                   <div class="single-message p-0" >
                       <div class="message-author justify-content-end align-items-start mx-0 px-0 gx-3">
                           <div class="flex-1 col-10 me-2">
                               <div class="author-content bg-primary text-right text-white p-2 w-100 radius mt-1 mb-0">
                                   <p class="my-0 text-end">
                                       <small class="name text-right mb-1" style="font-size: 14px;">
                                           <small >You</small>
                                       </small>
                                   </p>
                                   <p class="mt-0 text-right" style="font-size: 13px;">{{$message->message}}</p>
                               </div>

                               <p class="my-0 text-end p-0 lh-0">
                                   <small class="time my-0 lh-0 text-end" style="font-size: 11px;">{{$message->time_interval}}</small>
                               </p>
                           </div>

                           <div class="author-images col-1 pt-2">
                               <div class="ratio ratio-1x1">
                                   <img src="{{$message->user->avatar ?? asset('images/icon/avatar.png')}}" class="" style="object-fit: cover;"  alt="Author">
                               </div>
                           </div>
                       </div>
                   </div>
               </li>
           @else
               <li class="col-9 float-left">
                   <div class="single-message p-0">
                       <div class="message-author align-items-start mx-0 px-0 gx-3">
                           <div class="author-images col-1 pt-2">
                               <div class="ratio ratio-1x1">
                                   <img src="{{$message->user->avatar ?? asset('images/icon/avatar.png')}}" class="" style="object-fit: cover;"  alt="Author">
                               </div>
                           </div>

                           <div class="flex-1 col-10 ms-2">
                               <div class="author-content bg-light p-2 radius mt-1">
                                   <small class="name mb-1" style="font-size: 14px;">
                                       <small >{{$message->user->firstname}} {{$message->user->lastname}}</small>
                                       @if ($message->is_mentor)
                                           <span class="bg-secondary text-primary rounded p-1 py-0 mt-0" style="font-size: 11px;">Mentor</span>
                                       @endif
                                   </small>
                                   <p class="mt-0" style="font-size: 13px;">{{$message->message}}</p>
                               </div>

                               <small class="time mt-0" style="font-size: 11px;">{{$message->time_interval}}</small>
                           </div>
                       </div>
                   </div>
               </li>
           @endif
        @empty
        @endforelse
    </ul>

    @push('scripts')
        <script>
            function markup (message) {
                return `<li class="float-right offset-3 col-9">
                    <div class="single-message p-0" >
                        <div class="message-author justify-content-end align-items-start mx-0 px-0 gx-3">
                            <div class="flex-1 me-2">
                                <div class="author-content bg-primary text-right text-white p-2 float-left w-100 radius mt-1 mb-0">
                                    <p class="my-0 text-end">
                                        <small class="name text-right mb-1" style="font-size: 14px;">
                                            <small >You</small>
                                        </small>
                                    </p>
                                    <p class="mt-0 text-right" style="font-size: 13px;">${message}</p>
                                </div>

                                <p class="my-0 text-end p-0 lh-0">
                                    <small class="time my-0 lh-0 text-end" style="font-size: 11px;">Just Now</small>
                                </p>
                            </div>

                            <div class="author-images col-1 pt-2">
                                <div class="ratio ratio-1x1">
                                    <img src="{{$user->avatar}}" class="" style="object-fit: cover;"  alt="Author">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>`
            }
            async function sendMessage(e){
                e.preventDefault()

                const data = new FormData(e.target)

                if(data.get('message') === "") {
                    new Notify ({
                        text: "Please type a message to send!",
                        effect: 'slide',
                        status: 'error',
                        autoclose: true,
                        autotimeout: 3000,
                        speed: 500 // animation speed
                    })
                    return;
                }

                const spinner = document.getElementById('spinner')
                const submitBtn = document.getElementById('submit-btn')
                spinner.style.display = 'block'
                submitBtn.disabled = true

                const message = markup(data.get('message'))

                const url = 'http://localhost:8000/api/forum/send/{{$batch->unique_id}}/{{$user->unique_id}}'

                const request = await fetch(url, {
                method: 'POST',
                body: data,
                headers: {
                    'Accept': 'application/json',
                    'ContentType': 'application/json'
                }
                }).then((response) => {
                    console.log(response)
                    console.log(response.ok)
                        if(response.ok){
                            $('#forum-chat').append(message)

                            e.target.reset()
                            spinner.style.display = 'none'
                            submitBtn.disabled = false


                            new Notify ({
                                text: "Your Message was Sent!",
                                effect: 'slide',
                                status: 'success',
                                autoclose: true,
                                autotimeout: 3000,
                                speed: 500 // animation speed
                            })
                        }else{
                            new Notify ({
                                text: "Your Message could not be sent!",
                                effect: 'slide',
                                status: 'error',
                                autoclose: true,
                                autotimeout: 3000,
                                speed: 500 // animation speed
                            })
                            spinner.style.display = 'none'
                            submitBtn.disabled = false
                        }
                    }).catch((err) => {
                        new Notify ({
                            text: "Your Message Could Not be Sent!",
                            effect: 'slide',
                            status: 'error',
                            autoclose: true,
                            autotimeout: 3000,
                            speed: 500 // animation speed
                        })
                        submitBtn.disabled = false
                        spinner.style.display = 'none'
                    }
                );

            }
        </script>
    @endpush

   <!-- Chat: Footer -->
   <form onsubmit="sendMessage(event)" class="d-flex p-3 py-md-2 py-1 border-top" style="height: auto;">
       @csrf
       <div class="flex-fill">
           <textarea name="message"  class="border p-2 h-100 w-100 radius bg-light custom-scrollbar me-2" rows="1" style="resize: none;" placeholder="Send a message..."></textarea>
       </div>
       <button type="submit" id="submit-btn" class="btn btn-primary btn-hover-dark btn-custom ms-2 px-4 d-flex align-items-center">
           <span>Send</span>
           <div style="display: none;" id="spinner" class="spinner-border text-light spinner-border-sm ms-2" role="status">
                <span class="visually-hidden">Loading...</span>
          </div>
        </button>
   </form>
</div>
