<div class="single-message border-0 bg-light radius p-3 mb-2">
    <div class="message-author row">
        <div class="author-images col-3 col-md-2">
            <x-avatar-img :circle="true" :user="$message" />
        </div>
        <div class="author-content col-md-6 ps-3 ps-md-0">
            <h6 class="name">
                <strong>{{$message->firstname}} {{$message->lastname}}</strong>
                <br>
                @if ($message->is_mentor)
                    <span class="instructor">Mentor</span>
                @endif
            </h6>
            <span class="time">Posted: {{$message->time_interval}}</span>
        </div>
        <div class="meta col-md-2 d-flex justify-content-end">
            <a href="forum/{{$message->unique_id}}" class="answer" ><i class="icofont-ui-messaging"></i> View</a>
        </div>
    </div>

    <div class="mt-3">
        <a href="forum/{{$message->unique_id}}">
            <h5 class="mb-0">{{$message->title}}</h5>
        </a>
        <p class="mt-1">{{$message->message}}</p>
    </div>
</div>
<!-- Single Message End -->
