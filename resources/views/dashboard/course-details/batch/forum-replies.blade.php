<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch">
    <div class="row">
        <div class="col-md-8">
            <div class="border radius p-4 mb-3 mt-3">
                <a href="../forum" style="font-weight: 500;">Back to Forum</a>
            </div>

            <div class="border radius p-4">
                <div class="bg-light-primary p-4 radius">
                    {{-- <strong>Created By</strong> --}}
                    <div class="d-flex align-items-center">
                        <div class="author-images me-2" style="width: 70px;">
                            <x-avatar-img :user="$message" />
                        </div>

                        <div class="author_content">
                            <h6 class="name">
                                <strong>{{$message->firstname}} {{$message->lastname}}</strong> <br/>
                            </h6>
                            <span class="time">{{$message->time_interval}}</span>
                        </div>
                    </div>
                </div>

                <div class="single-message border-0 py-0 pt-2">
                    <div class="message-author w-100 pe-0">
                        <div class="author-content px-0">
                            <h5 class="title ml-0 mb-0">{{$message->title}}</h5>
                            <p>{{$message->message}}</p>
                        </div>
                    </div>
                </div>

                <hr>
                <div>
                    <h5>Responses</h5>

                    <ul class="message-replay">
                        @forelse ($replies as $reply)
                            <x-messages.reply :reply="$reply" />
                        @empty
                            <div class="text-center p-5">
                                <h4>There are no replies for this issue</h4>
                            </div>
                        @endforelse
                    </ul>
                </div>

                <div class="pt-2 px-3">
                    <form action="/forum/reply/{{$message->unique_id}}" method="POST" >
                        @csrf

                        <div class="message-form row">
                            <div class="auhtor col-3 col-md-1 ps-0">
                                <x-avatar-img :circle="true" :user="$user" />
                            </div>
                            <div class="message-input ps-0">
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
        </div>
    </div>
</x-mentor-batch-detail>
