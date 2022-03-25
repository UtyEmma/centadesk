<!-- Single Message Start -->
<script>
    $(document).ready(
        hideReplyForm("reply-{{$message['id']}}")
    )
</script>

<div class="single-message border-0">
    <div class="message-author">
        <div class="author-images">
            <img src="{{asset('images/author/author-12.jpg')}}" alt="Author">
        </div>
        <div class="author-content">
            <h6 class="name">
                <strong>{{$message['firstname']}} {{$message['lastname']}}</strong> <br/>
                <span class="time">{{$message['created_at']}}</span>
            </h6>
            <h5 class="title">{{$message['title']}}</h5>
        </div>
        <div class="meta">
            <span class="view"><i class="icofont-eye-alt"></i> 526 Views</span>
            <button class="answer" onclick="showReplyForm('reply-{{$message['id']}}')"><i class="icofont-ui-messaging"></i> Answer</button>
        </div>
    </div>
    <p>{{$message['message']}}</p>

    <div>
        @if (count($message['replies']) > 0)
            @foreach ($message['replies'] as $reply)
                <x-messages.reply :reply="$reply" ></x-messages.reply>
            @endforeach
        @endif
    </div>


    <div class="row" style="display: none" id="reply-{{$message['id']}}">
        <div class="col-md-11 offset-md-1">
            <form  onsubmit="sendResponse(event,  '{{$user->unique_id}}', '{{$message['unique_id']}}')">
                <div class="message-form">
                    <div class="auhtor">
                        <img src="{{asset('images/author/author-16.jpg')}}" alt="Author">
                    </div>
                    <div class="w-100 ms-2">
                        <div class="single-form mt-0">
                            <textarea class="form-control w-100 h-auto border radius p-3 my-0" style="resize: none" name="message" rows="2" placeholder="Post a public answer"></textarea>
                        </div>

                        <div class="message-btn d-flex justify-content-end mt-2">
                            <button type="button" onclick="hideReplyForm('reply-{{$message['id']}}')" class="btn btn-secondary btn-hover-primary">Cancel</button>
                            <button type="submit" class="btn btn-primary ms-2 btn-hover-dark">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Single Message End -->
