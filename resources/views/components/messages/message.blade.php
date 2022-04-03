<div class="single-message border-0 bg-light radius p-3 mb-3">
    <div class="message-author">
        <div class="author-images">
            <img src="{{asset('images/author/author-12.jpg')}}" alt="Author">
        </div>
        <div class="author-content">
            <h6 class="name">
                <strong>{{$message['firstname']}} {{$message['lastname']}}</strong> <br/>
                <span class="time">{{$message['created_at']}}</span>
            </h6>
            <a href="forum/{{$message['unique_id']}}">
                <h5 class="title">{{$message['title']}}</h5>
            </a>
        </div>
        <div class="meta">
            <span class="view"><i class="icofont-eye-alt"></i> 526 Views</span>
            <a href="forum/{{$message['unique_id']}}" class="answer" ><i class="icofont-ui-messaging"></i> Responses</a>
        </div>
    </div>
    <p>{{$message['message']}}</p>
</div>
<!-- Single Message End -->
