@extends('front.layouts.front_layout')

@section('content')
	<div class="section no-pad-bot" id="index-banner">
		<div class="container">
			<br><br>
			<h1 class="header center color-index"> 401</h1>
			<div class="row center">
				<h5 class="header col s12 light">¡Acceso no autorizado!</h5>
			</div>
			<div class="row center">
				<a href="{{ URL::previous() }}" id="download-button" class="btn-large waves-effect waves-light">Volver</a>
				<a href="{{ route('welcome') }}" id="download-button" class="btn-large waves-effect waves-light btn-fgs-show">Inicio</a>
			</div>
			<br><br>

		</div>
	</div>
@endsection()