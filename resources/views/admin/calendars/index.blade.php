@extends('admin.layouts.adminapp')

@section('title')
    T | Calendar
@endsection

@section('customCss')
{{--    <link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />

@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="au-card">
                <div id="calendar"></div>
            </div>
        </div><!-- .col -->
    </div>

@endsection

@section('customJs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function () {
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                navLinks: true,
                editable: true,

                // getEvent -------------------------
                events: "getEvent",
                displayEventTime: false,
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                // END getEvent -------------------------

                // createEvent -------------------------
                select: function (start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
                        var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD');
                        $.ajax({
                            url: "{{ URL::to('admin/calendars/createEvent') }}",
                            data: 'title=' + title + '&start=' + start + '&end=' + end +'&_token=' +"{{ csrf_token() }}",
                            type: "post",
                            success: function (data) {
                                alert("Added Successfully");
                                $('#calendar').fullCalendar('refetchEvents');
                            }
                        });
                    }
                },
                // END createEvent -------------------------


                // deleteEvent -------------------------
                eventClick: function (event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('admin/calendars/deleteEvent') }}",
                            data: "&id=" + event.id+'&_token=' +"{{ csrf_token() }}",
                            success: function (response) {
                                if(parseInt(response) > 0) {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                    alert("Deleted Successfully");
                                }
                            }
                        });
                    }
                }
                // END deleteEvent -------------------------



            }); /* END var calendar */
        });
    </script>
@endsection
