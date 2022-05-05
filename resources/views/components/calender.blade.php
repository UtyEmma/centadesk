@push('styles')
    <link rel="stylesheet" href="{{asset('css/plugins/fullcalender.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('js/plugins/fullcalender.min.js')}}"></script>
@endpush

<style>
    .fc .fc-toolbar-title{
        font-size: 24px;
    }
    .fc-button-group button{
        background: #309255 !important;
        border: none !important;
    }

    .fc-button-group button:hover{
        background: #174e2c !important;
    }
</style>

<div id='calendar'></div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: {!! $events !!},
                eventColor: '#309255'
            });

            calendar.render();
        });
    </script>
@endpush
