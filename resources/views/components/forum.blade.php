<div class="card radius border card-chat-body order-0 w-100 p-0"  style="height: 84vh;">
    <div class="chat-header border-bottom p-3" style="height: 15%">
       <x-layered-profile-images :users="$batch->enrollments" />
       <h6 class="mb-0">{{$batch->title}}</h6>
   </div>

    <ul class="chat-history list-unstyled mb-0 p-3 pt-4 float-left w-100 custom-scrollbar" id="forum-chat" style="height: 75%; overflow-y: scroll;">
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

    <script>
        async function sendMessage(e){
            e.preventDefault()

            const data = new FormData(e.target)
            let sent = false


            const message = `<li class="float-right offset-3 col-9">
                   <div class="single-message p-0" >
                       <div class="message-author justify-content-end align-items-start mx-0 px-0 gx-3">
                           <div class="flex-1 me-2">
                               <div class="author-content bg-primary text-right text-white p-2 float-left w-100 radius mt-1 mb-0">
                                   <p class="my-0 text-end">
                                       <small class="name text-right mb-1" style="font-size: 14px;">
                                           <small >You</small>
                                       </small>
                                   </p>
                                   <p class="mt-0 text-right" style="font-size: 13px;">${data.get('message')}</p>
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

           //  console.log()
            const url = 'http://localhost:8000/api/forum/send/{{$batch->unique_id}}/{{$user->unique_id}}'

            const request = await fetch(url, {
               method: 'POST',
               body: data,
               headers: {
                   'Accept': 'application/json',
                   'ContentType': 'application/json'
               }
            }).then((result) => {
                $('#forum-chat').append(message)
                e.target.reset()
                sent = true
            }).catch((err) => {

            });

        }
    </script>

   <!-- Chat: Footer -->
   <form onsubmit="sendMessage(event)" class="d-flex p-3 py-md-2 py-1 border-top" style="height: auto;">
       @csrf
       <div class="flex-fill">
           <textarea name="message"  class="border p-2 h-100 w-100 radius bg-light custom-scrollbar me-2" rows="1" style="resize: none;" placeholder="Send a message..."></textarea>
       </div>
       <x-btn type="submit" classes="btn-primary btn-hover-dark ms-2 px-4">Send</x-btn>
   </form>
</div>
