@extends('front.layouts.front_layout')

@section('content')
	@include('admin.layouts.partials._messages')
	<div class="parallax-container center valign-wrapper">
		<div class="parallax">
			<img src="https://images.pexels.com/photos/356065/pexels-photo-356065.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260">
		</div>
	</div>
	<div class="section white">
		<div class="center-align">
			<a href="{{ route('welcome') }}" class="btn waves-effect btn-bts-edit btn-login btn-fgs-show">Nueva Solicitud</a>			
		</div>
	</div>
@endsection()

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
      $('.slider').slider();
    });
	</script>
@endsection