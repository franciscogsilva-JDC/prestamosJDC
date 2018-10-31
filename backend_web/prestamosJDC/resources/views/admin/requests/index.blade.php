@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">	
                <div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'requests.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs">
							<div class="file-field input-field col s12 m12 l9 input-search-fgs">
								<div class="file-path-wrapper path-wrapper-fgs center-text">
									<input id="name" type="text" class="validate" name="name">
									<label class="label-search-fgs" for="icon_prefix">Buscar solicitud por Nombre, # de identificación, email del solicitante</label>
								</div>
							</div>
		                    	{!! Form::submit('Buscar', ['class' => 'btn btn-search-fgs col s10 m11 l2 btn-fgs-edit']) !!}
							<div id="btn-filters" class="btn col s2 m1 l1 btn-fgs-filter center-align btn-fgs-edit waves-effect waves-light">
								<span class="center-align"><i class="material-icons icon-filter">keyboard_arrow_down</i></span>
							</div>
						</div>
						<div class="section section-form">
                        	<div class="row" id="panel-filters">
                        		@if(Auth::user()->type->id == 1)
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">assignment</i>
										<select id="request_type_id" name="request_type_id">
											<option value="" disabled selected>Selecciona tipo de Solicitud</option>
											@foreach($requestTypes as $type)
												<option value="{{ $type->id }}">{{ $type->name }}</option>
											@endforeach
										</select>
										<label for="request_type_id">Filtrar por Tipo de Solicitud</label>
									</div>
								@endif
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">assignment_late</i>
									<select id="authorization_status_id" name="authorization_status_id">
										<option value="" disabled selected>Selecciona un Estado de Autorización</option>
										@foreach($authorizationStatuses as $status)
											<option value="{{ $status->id }}">{{  $status->name }}</option>
										@endforeach
									</select>
									<label for="authorization_status_id">Filtrar por Estado de Autorización</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">tune</i>
									<select id="user_type_id" name="user_type_id">
										<option value="" disabled selected>Selecciona tipo de Usuario</option>
										@foreach($userTypes as $type)
											<option value="{{ $type->id }}">{{ $type->name }}</option>
										@endforeach
									</select>
									<label for="user_type_id">Filtrar por Tipo de Usuario</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">event</i>
									<input type="text" class="datepicker" id="start_date" name="start_date">
									<label for="start_date">Filtrar por Fecha de Inicio</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">event</i>
									<input type="text" class="datepicker" id="end_date" name="end_date">
									<label for="end_date">Filtrar por Fecha de Cierre</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">query_builder</i>
									<input type="text" class="datepicker" id="received_date" name="received_date">
									<label for="received_date">Filtrar por Fecha de recibido</label>
								</div>
                        	</div>
                        </div>
	                {!! Form::close() !!}
				</div>
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						{!! Form::open(['route' => 'requests.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Inhabilitar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Inhabilitar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea Inhabilitar las solicitudes seleccionadas? Si una solicitud se encuentra INHABILITADA, esta será CANCELADA y todos los espacios o recursos asociados pasarán a estar DISPONIBLES INMEDIATAMENTE.")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
						</div>
			     		<table class="highlight striped">
							<thead>
								<th>Datos</th>
								<th>Fechas</th>
								<th>Estado</th>
								<th class="center-align">Opciones</th>
							</thead>
							<tbody>
								@foreach($requests as $request)
									<tr>
										<td>
											<b>Solicitante: </b><a href="{{ route('users.index', ['search' => $request->user->email]) }}">{{ $request->user->name }}</a><br>
											<b>Responsable: </b><a href="{{ route('users.index', ['search' => $request->responsible->email]) }}">{{ $request->responsible?$request->responsible->name:$request->user->name }}</a><br>
											@if($request->authorizations()->orderBy('created_at', 'DESC')->first()->approved_by)
												<b>Aprobado: </b><a href="{{ route('users.index', ['search' => $request->authorizations()->orderBy('created_at', 'DESC')->first()->approver->email]) }}">{{ $request->authorizations()->orderBy('created_at', 'DESC')->first()->approver->name }}</a><br>
											@endif
											@if($request->authorizations()->orderBy('created_at', 'DESC')->first()->received_by)
												<b>Recibido: </b><a href="{{ route('users.index', ['search' => $request->authorizations()->orderBy('created_at', 'DESC')->first()->receiver->email]) }}">{{ $request->authorizations()->orderBy('created_at', 'DESC')->first()->receiver->name }}</a><br>
											@endif
											<b>Tipo: </b> {{ $request->type->name }}<br>
											@if($request->type->id == 1)
												<b>Espacio: </b> 
												@foreach($request->authorizations()->orderBy('created_at', 'DESC')->first()->spaces()->get() as $i => $space)
													<a href="{{ route('spaces.index', ['search' => $space->namel]) }}">{{ $space->name }}</a>, 
												@endforeach()
												<br>
												@if($request->authorizations()->orderBy('created_at', 'DESC')->first()->resources()->count()>0)
													<b>Recurso: </b> 
													@foreach($request->authorizations()->orderBy('created_at', 'DESC')->first()->resources()->get() as $i => $resource)
														<a href="{{ route('resources.index', ['search' => $resource->namel]) }}">{{ $resource->name }}</a>, 
													@endforeach()
													<br>
												@endif
												<b>Valor: </b> {{ $request->value }}<br>
											@else
											 
											@endif
										</td>
										<td>
											<b>Fecha de Inicio: </b>{{ ucwords($request->start_date->format('F d\\, Y H:m:s')) }}<br>
											<b>Fecha de Fin: </b>{{ ucwords($request->end_date->format('F d\\, Y H:m:s')) }}<br>
											@if($request->authorizations()->orderBy('created_at', 'DESC')->first()->received_by)
												<b>Fecha Recibido: </b>{{ ucwords($request->received_date?$request->received_date->format('F d\\, Y H:m:s'):'Sin dato') }}<br>
											@endif
										</td>
										<td>
											@if($request->authorizations()->count()>0)
												@if($request->authorizations()->orderBy('created_at', 'DESC')->first()->status->id == 1)
													<span class="badge blue badge-status-factory center-text">
												@elseif($request->authorizations()->orderBy('created_at', 'DESC')->first()->status->id == 2)
													<span class="badge green badge-status-factory center-text">
												@elseif($request->authorizations()->orderBy('created_at', 'DESC')->first()->status->id == 3)
													<span class="badge red badge-status-factory center-text">
												@elseif($request->authorizations()->orderBy('created_at', 'DESC')->first()->status->id == 4)
													<span class="badge grey badge-status-factory center-text">
												@elseif($request->authorizations()->orderBy('created_at', 'DESC')->first()->status->id == 5)
													<span class="badge orange badge-status-factory center-text">
												@endif
													{{ $request->authorizations()->orderBy('created_at', 'DESC')->first()->status->name }}
												</span>
											@endif
										</td>
										<td class="td-fgs center-align">
											<div class="btn multi_input_delete" style="display: none;">
												<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$request->id}}" value="{{$request->id}}"/>
	      										<label for="input_{{$request->id}}"></label>
											</div>
		                					{!! Form::close() !!}
											<a href="{{ route('requests.destroy', $request->id) }}" onclick="return confirm('¿Desea Inhabilitar la solicitud? Si una solicitud se encuentra INHABILITADA, esta será CANCELADA y todos los espacios o recursos asociados pasarán a estar DISPONIBLES INMEDIATAMENTE')" class="btn btn-fgs btn-fgs-delete red darken-3 tooltipped {{ $request->deleted_at?'disabled':'' }}" data-position="top" data-delay="50" data-tooltip="Inhabilitar"><i class="material-icons">delete</i></a>
											<a href="{{ route('requests.edit', $request->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit tooltipped {{ $request->deleted_at?'disabled':'' }}" data-position="top" data-delay="50" data-tooltip="Editar"><i class="material-icons">create</i></a>
											<a href="{{ route('requests.show', $request->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-show tooltipped {{ $request->deleted_at?'disabled':'' }}" data-position="top" data-delay="50" data-tooltip="Ver Detalles"><i class="material-icons">more_horiz</i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
			        </div>
				</div>
			</div>
        </div>
    </div>
	<?php $paginator = $requests;?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')