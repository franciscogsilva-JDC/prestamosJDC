@extends('front.layouts.front_layout')

@section('content')
	@include('admin.layouts.partials._messages')
	<div class="section no-pad-bot" id="index-banner">
		<div class="container">
			<br><br>
			<h1 class="header center color-index">{{ env('APP_NAME') }}</h1>
			<div class="row center">
				<h5 class="header col s12 light">Sistema de la Fundación Universitaria Juan de Castellanos para la solicitud de espacios y recursos</h5>
			</div>
			<div class="row center">
				<a href="{{ route('requests-front.create') }}" id="download-button" class="btn-large waves-effect waves-light btn-fgs-show">Nueva Solicitud</a>
			</div>
			<br><br>

		</div>
	</div>
	<div class="container">
		<div class="section">
			<!--   Icon Section   -->
			<div class="row">
				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center color-index"><i class="material-icons">flash_on</i></h2>
						<h5 class="center">Solicitudes en linea</h5>

						<p class="light">Agilizamos el proceso de solicitud de espacio físico y/o recurso, ya sea deporte, audiovisual y otros.</p>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center color-index"><i class="material-icons">group</i></h2>
						<h5 class="center">User Experience Focused</h5>

						<p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center color-index"><i class="material-icons">settings</i></h2>
						<h5 class="center">Administra</h5>

						<p class="light">Administra las solicitudes, así como revisa el historial de solicitudes de tu cuenta.</p>
					</div>
				</div>
			</div>
		</div>
		<br><br>
	</div>
@endsection()