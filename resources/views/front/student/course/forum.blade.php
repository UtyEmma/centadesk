<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment">
    <!-- Question & Answer End -->
    <div class="question-answe">

        @include('front.student.js.forum-js')

        <div class="row">
            <div class="col-md-12 p-0">
                <!-- Answer Message Wrapper Start -->
                <div class="answer-message-wrapper border-0 p-0" >

                    <div class="courses-enroll-tab mt-0 mb-3">
                        <div class="enroll-tab-menu">

                            <div class="enroll-share">
                                <a href="#">
                                    {{-- <i class="icofont-share-alt"></i>  --}}
                                    Ask a Question
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="border radius p-4">
                        <div class="border-0" id="message-container">
                            @if (count($forum) > 0)
                                @foreach ($forum as $message)
                                    <x-messages.message :user="$user" :message="$message"></x-messages.message>
                                @endforeach
                            @else
                                <div class="text-center border-0 py-3">
                                    <h5>There are no messages on this forum</h5>
                                    <p>You can ask any question</p>
                                </div>
                            @endif
                        </div>

                        <div class="pt-2">
                            <form action="/profile/forum/send/{{$batch->unique_id}}" method="POST">
                                @csrf
                                <div class="message-form">
                                    <div class="auhtor">
                                        <img src="{{asset('images/author/author-16.jpg')}}" alt="Author">
                                    </div>
                                    <div class="message-input">
                                        <div class="single-form mt-0">
                                            <input name="title" class="form-control" placeholder="Ask a question" />
                                        </div>

                                        <div class="single-form">
                                            <textarea name="message" class="form-control radius" placeholder="Your question details"></textarea>
                                        </div>

                                        <div class="message-btn ">
                                            {{-- <button type="button" class="btn btn-secondary btn-hover-primary">Cancel</button> --}}
                                            <button type="submit" class="btn btn-primary btn-hover-dark">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
                <!-- Answer Message Wrapper End -->
            </div>
        </div>

    </div>
    <!-- Question & Answer End -->
</x-enrolled-course>
