<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment">
    <div class="border radius p-4 mb-3">
        <a href="../forum">Back to forum</a>
    </div>

    <div class="border radius p-4">
        <div class="single-message border-0">
            <div class="message-author">
                <div class="author-content px-0">
                    <h5 class="title ml-0 mb-0">{{$message->title}}</h5>
                    <p>{{$message->message}}</p>
                    {{-- <div class="row">
                        <div class="author-images">
                            <img src="{{asset('images/author/author-12.jpg')}}" alt="Author">
                        </div>

                        <div>
                            <h6 class="name">
                                <strong>{{$message->firstname}} {{$message->lastname}}</strong> <br/>
                                <span class="time">{{$message->created_at}}</span>
                            </h6>
                        </div>
                    </div> --}}
                </div>
                <div class="meta">
                    <span class="view"><i class="icofont-eye-alt"></i> 526 Views</span>
                </div>
            </div>

        </div>

        <div>
            @if (count($replies) > 0)
                <x-messages.reply :reply="$replies" />
            @else
                <div class="text-center p-5">
                    <h4>There are no replies for this issue</h4>
                </div>
            @endif
        </div>

        <div class="row">
            <form action="/forum/reply/{message_id}" method="POST" >
                @csrf

                <div class="message-form">
                    <div class="auhtor">
                        <img src="{{asset('images/author/author-16.jpg')}}" alt="Author">
                    </div>
                    <div class="w-100 ms-2">
                        <div class="single-form mt-0">
                            <textarea class="form-control w-100 h-auto border radius p-3 my-0" style="resize: none" name="message" rows="3" placeholder="Post a public answer"></textarea>
                        </div>

                        <div class="message-btn d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-primary ms-2 btn-hover-dark">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-enrolled-course>
