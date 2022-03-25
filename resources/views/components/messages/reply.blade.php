<ul class="message-replay">
    <li>
        <!-- Single Message Start -->
        <div class="single-message">
            <div class="message-author">
                <div class="author-images">
                    <img src="{{asset('images/author/author-16.jpg')}}" alt="Author">
                </div>
                <div class="author-content">
                    <h6 class="name"><strong>Ashley Reeves</strong> <span class="instructor">Instructor</span></h6>
                    <span class="time">Asked: March 28, 2021</span>
                </div>
                <div class="meta">
                    <a class="answer" href="#"><i class="icofont-ui-messaging"></i> Answer</a>
                </div>
            </div>
            <p>{{$reply['message']}}</p>
        </div>
        <!-- Single Message End -->
    </li>
</ul>
