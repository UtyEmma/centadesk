<!-- Question & Answer End -->
<div class="question-answer border p-4">

    <x-batch.js.forum-js :batch="$batch"></x-batch.js.forum-js>

    <div class="row">
        <div class="col-md-12">
            <!-- Answer Message Wrapper Start -->
            <div class="answer-message-wrapper border-0 p-0">

                <ul>
                    <li>

                        @if (count($messages) > 0)
                            @foreach ($messages as $message)
                                <x-messages.message :user="$user" :message="$message"></x-messages.message>
                            @endforeach
                        @else
                            <div class="text-center py-3">
                                <h5>There are no messages on this forum</h5>
                                <button>Star</button>
                            </div>
                        @endif
                    </li>
                </ul>

                {{-- <a class="loadmore" href="#">Loard more 22 answer</a> --}}

                <form onsubmit="sendMessage(event, '{{$user->unique_id}}')">
                    <div class="message-form">
                        <div class="auhtor">
                            <img src="{{asset('images/author/author-16.jpg')}}" alt="Author">
                        </div>
                        <div class="message-input">
                            <textarea name="message" placeholder="Post a public answer"></textarea>

                            <div class="message-btn">
                                <button type="button" class="btn btn-secondary btn-hover-primary">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-hover-dark">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- Answer Message Wrapper End -->

        </div>
    </div>

</div>
<!-- Question & Answer End -->
