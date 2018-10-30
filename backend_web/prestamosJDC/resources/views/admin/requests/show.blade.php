@extends('admin.layouts.admin_layout')

@section('imported_css')
@endsection()

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						<h5>Tipo de solicitud: {{ $request->type->name }}</h5>
						<b>Solicitante:</b> {{ $request->user->name }}</br>
						<b>Responsable:</b> {{ $request->responsible->name }}</br>
						<b>Fecha de Solicitud:</b>{{ ucwords($request->created_at->format('F d\\, Y H:m:s')) }}</br>
						<b>Fecha de Inicio:</b>{{ ucwords($request->start_date->format('F d\\, Y H:m:s')) }}</br>
						<b>Fecha de Fin: </b>{{ ucwords($request->end_date->format('F d\\, Y H:m:s')) }}</br>
						@if($request->authorizations()->orderBy('created_at', 'DESC')->first()->received_by)
							<b>Fecha Recibido: </b>{{ ucwords($request->received_date?$request->received_date->format('F d\\, Y H:m:s'):'Sin dato') }}<br>
						@endif
			        </div>
				</div>
			</div>
        </div>
    </div>
@endsection()

@section('js')
@endsection()