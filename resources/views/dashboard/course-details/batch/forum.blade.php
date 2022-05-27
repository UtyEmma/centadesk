<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch">
    @push('styles')
        <link rel="stylesheet" href="{{asset('css/forum.css')}}">
    @endpush

    @push('scripts')
        <script>
            $(document).ready(() => {
                $("#forum-chat").animate({
                    scrollTop: $("#forum-chat").height()
                })
            })
        </script>
    @endpush

    <x-page-title title="Mentor Dashboard | Forum - {{$batch->title}} " />

    <div class="d-flex">
         @include('components.forum')
    </div>
</x-mentor-batch-detail>
