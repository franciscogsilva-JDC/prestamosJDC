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
				weekends: true
			})
		});
    </script>
@endsection