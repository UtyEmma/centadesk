<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment" :report="$report">
    @push('styles')
        <link rel="stylesheet" href="{{asset('css/forum.css')}}">
    @endpush

    @push('scripts')
        <script>
            $(document).ready(() => {
                $("#forum-chat").animate({
                    scrollTop: $("#forum-chat").height()
                })
            })
        </script>
    @endpush

    <div class="d-flex">
         <div class="card radius border card-chat-body order-0 w-100 p-0"  style="height: 84vh;">
             <!-- Chat: Header -->
             <div class="chat-header border-bottom p-3" style="height: 10%">
                <h5 class="mb-0">{{$course->name}}</h5>
                <h6 class="mb-0">{{$batch->title}} - <span>Forum</span></h6>
             </div>
             {{-- Chat: Header --}}

             <!-- Chat: body -->
             <ul class="chat-history list-unstyled mb-0 p-3 pt-4 bg-light custom-scrollbar" id="forum-chat" style="height: 80%; overflow-y: scroll;">
                 <!-- Chat: left -->
                 @forelse ($forum as $message)
                    <li class="mb-4">
                        <div class="d-flex">
                            <x-profile-img :user="$message" />

                            <div class="flex-fill ms-3 pb-4 px-2">
                                <div class="col-md-8">
                                    <div>
                                        <span style="font-weight: 500;">{{$message->firstname}}</span>
                                        @if ($message->is_mentor)
                                            <span class="badge badge-primary bg-primary">Mentor</span>
                                        @endif
                                        <small class="text-muted small ms-1" style="font-size: 11px;">{{$message->time_interval}}</small>
                                    </div>
                                    <small>{{$message->message}}</small>
                                </div>
                            </div>
                        </div>
                    </li>
                 @empty

                 @endforelse
             </ul>

            <!-- Chat: Footer -->
            <form action="/forum/send/{{$batch->unique_id}}" method="POST" class="d-flex p-3 py-md-2 py-1 border-top" style="height: auto;">
                @csrf
                <div class="flex-fill">
                    <textarea name="message"  class="border p-2 h-100 w-100 radius bg-light custom-scrollbar me-2" rows="1" style="resize: none;" placeholder="Send a message..."></textarea>
                </div>

                <x-btn type="submit" classes="btn-primary btn-hover-dark ms-2 px-4">Send</x-btn>
            </form>

         </div>
    </div>
</x-enrolled-course>
