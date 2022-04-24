<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch" :batches="$batches">
    <div class="row">
        <div class="col-md-8">
            <div class="border radius p-4 mt-4">
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

                <div class="pt-2 px-3">
                    <form action="/profile/forum/send/{{$batch->unique_id}}" method="POST">
                        @csrf
                        <div class="message-form row">
                            <div class="auhtor col-3 col-md-2 ps-0">
                                <x-avatar-img :circle="true" :user="$user" />
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

        <div class="col-md-4">
        </div>
    </div>
</x-mentor-batch-detail>
