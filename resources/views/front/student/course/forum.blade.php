<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment" :report="$report">
    <x-page-title title="Forum - {{$batch->title}} of {{$course->name}}" />
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

    <div class="d-flex">
         @include('components.forum')
    </div>
</x-enrolled-course>
