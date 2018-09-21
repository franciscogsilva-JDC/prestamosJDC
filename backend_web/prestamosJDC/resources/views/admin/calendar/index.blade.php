@extends('admin.layouts.admin_layout')

@section('imported_css')
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.min.css')  }}">
@endsection

@section('content')
	<div class="container container-fgs">
		<div class="row">
			<div id='calendar'></div>
		</div>
	</div>
@endsection()

@section('imported_js')
    <script src="{{ asset('plugins/fullcalendar/lib/moment.min.js')}}"></script>
    <script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('plugins/fullcalendar/locale/es.js')}}"></script>
    <script type="text/javascript">
		$(function() {
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'listDay,listWeek,month'
				},
				// customize the button names,
				// otherwise they'd all just say "list"
				views: {
					listDay: { buttonText: 'Día' },
					listWeek: { buttonText: 'Semana' }
				},
                //editable: true,
                events: [
                    {               
                        title: 'All Day Event',
                        start: '2018-09-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2018-09-07',
                        end: '2018-09-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2018-09-09T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2018-09-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2018-09-11',
                        end: '2018-09-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2018-09-12T10:30:00',
                        end: '2018-09-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2018-09-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2018-09-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2018-09-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2018-09-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2018-09-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2018-09-28'
                    }
                ]
			})
		});
    </script>
@endsection