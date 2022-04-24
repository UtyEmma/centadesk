<li>
    <!-- Single Message Start -->
    <div class="single-message">
        <div class="message-author row">
            <div class="author-images col-3 col-md-2">
                <x-avatar-img :user="$reply" />
            </div>
            <div class="author-content col-md-6 ps-3 ps-md-0">
                <h6 class="name"><strong>{{$reply->firstname}} {{$reply->lastname}}</strong>
                    <span class="instructor">Instructor</span>
                </h6>
                {{-- <span class="time">Asked: March 28, 2021</span> --}}
            </div>
        </div>
        <p>{{$reply->message}}</p>
    </div>
    <!-- Single Message End -->
</li>
