@extends('partial.dashboard-main')

@section('title', 'View Request')
    
@section('content')
  <div class="div-block-41">
    <div class="div-block-42" style="padding: 30px">
        <div id='calendar-container'>
            <div id='calendar'></div>
          </div>
    </div>
  </div>
  @php
  $eventData = [];
  foreach ($sponsor as $sponsorship) {
      $eventData[] = [
          'title' => $sponsorship->event_name,
          'start' => $sponsorship->from_date,
          'end' => $sponsorship->to_date,
          // Add other event properties as needed
      ];
  }
@endphp

  <script>
    document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  const year = new Date().getFullYear();
  const month = new Date().getMonth() + 1;
  const day = new Date().getDate();
  const date = year + "-" + month + "-" + day;
  var events = @json($eventData); // Convert PHP array to JavaScript array
  events.forEach(function(event) {
    var endDate = new Date(event.end);
    endDate.setDate(endDate.getDate() + 1);
    event.end = endDate.toISOString().split('T')[0]; // Convert the modified date back to a string
  })

  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
    height: 'parent',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    defaultView: 'dayGridMonth',
    defaultDate: date,
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: events
  });

  calendar.render();
});

  </script>
@endsection