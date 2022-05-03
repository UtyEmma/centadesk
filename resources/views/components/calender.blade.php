@push('styles')
    <link rel="stylesheet" href="{{asset('css/plugins/fullcalender.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('js/plugins/fullcalender.min.js')}}"></script>
@endpush

<div id='calendar'></div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
        });
    </script>
@endpush
