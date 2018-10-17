@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">	
                <div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'spaces.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs">
							<div class="file-field input-field col s12 m12 l9 input-search-fgs">
								<div class="file-path-wrapper path-wrapper-fgs center-text">
									<input id="name" type="text" class="validate" name="name">
									<label class="label-search-fgs" for="icon_prefix">Buscar espacio por Nombre</label>
								</div>
							</div>
		                    	{!! Form::submit('Buscar', ['class' => 'btn btn-search-fgs col s10 m11 l2 btn-fgs-edit']) !!}
							<div id="btn-filters" class="btn col s2 m1 l1 btn-fgs-filter center-align btn-fgs-edit waves-effect waves-light">
								<span class="center-align"><i class="material-icons icon-filter">keyboard_arrow_down</i></span>
							</div>
						</div>
						<div class="section section-form">
                        	<div class="row" id="panel-filters">
								<div class="input-field col s12 m6 l6">
			                        <i class="material-icons prefix">drag_indicator</i>
									{!! Form::number('max_persons', null, ['class' => '', 'id' => 'max_persons', 'min' => '1']) !!}
									<label for="max_persons">Maximo de personas</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">tune</i>
									<select id="space_type_id" name="space_type_id">
										<option value="" disabled selected>Selecciona tipo</option>
										@foreach($spaceTypes as $type)
											<option value="{{ $type->id }}">{{ $type->name }}</option>
										@endforeach
									</select>
									<label for="space_type_id">Filtrar por Tipo</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">phonelink_off</i>
									<select id="space_status_id" name="space_status_id">
										<option value="" disabled selected>Selecciona Estado</option>
										@foreach($spaceStatuses as $status)
											<option value="{{ $status->id }}">{{ $status->name }}</option>
										@endforeach
									</select>
									<label for="space_status_id">Filtrar por Estado</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">weekend</i>
									<select id="property_type_id" name="property_type_id">
										<option value="" disabled selected>Selecciona una Tipo de propiedad</option>
										@foreach($propertyTypes as $type)
											<option value="{{ $type->id }}">{{  $type->name }}</option>
										@endforeach
									</select>
									<label for="property_type_id">Filtrar por Tipo de propiedad</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">location_city</i>
									<select id="building_id" name="building_id">
										<option value="" disabled selected>Selecciona un 1</option>
										@foreach($buildings as $building)
											<option value="{{ $building->id }}">{{  $building->name }}</option>
										@endforeach
									</select>
									<label for="building_id">Filtrar por Edificio</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">place</i>
									<select id="headquarter_id" name="headquarter_id">
										<option value="" disabled selected>Selecciona una Sede</option>
										@foreach($headquarters as $headquarter)
											<option value="{{ $headquarter->id }}">{{  $headquarter->name }}</option>
										@endforeach
									</select>
									<label for="headquarter_id">Filtrar por Sede</label>
								</div>
                        	</div>
                        </div>
	                {!! Form::close() !!}
				</div>
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						{!! Form::open(['route' => 'spaces.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Inhabilitar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Inhabilitar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea Habilitar/Inhabilitar los espacios seleccionados? Si un espacio se encuentra INHABILITADO, pasará a estar HABILITADO con este método")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
						</div>
			     		<table class="highlight striped">
							<thead>
								<th>Nombre</th>
								<th>Datos</th>
								<th id="td-logo">Estado</th>
								<th id="td-logo">Inhabilitado</th>
								<th class="center-align">Opciones</th>
							</thead>
							<tbody>
								@foreach($spaces as $space)
									<tr>									
										<td>
											{{ $space->name }}<br>
											@if($space->building)
												<b>Edificio: </b>{{ $space->building->name }}<br>
												<b>Sede: </b>{{ $space->building->headquarter->name }}<br>
												{{ $space->building->headquarter->town->name }}, {{ $space->building->headquarter->town->departament->name }}
											@elseif($space->headquarter)
												<b>Sede: </b>{{ $space->headquarter->name }}<br>
												{{ $space->headquarter->town->name }}, {{ $space->headquarter->town->departament->name }}
											@endif
										</td>
										<td>
											<b>Max Personas: </b>{{ $space->max_persons }}<br>
											<b>Tipo: </b> {{ $space->type->name }}<br>
											<b>Tipo de propiedad: </b> {{ $space->propertyType->name }}
										</td>
										<td id="td-logo">
											@if($space->status->id == 1)
												<span class="badge green badge-status-factory center-text">
											@elseif($space->status->id == 2)
												<span class="badge red badge-status-factory center-text">
											@endif
												{{ $space->status->name }}
											</span>
										</td>
										<td id="td-logo">
											@if($space->deleted_at)
												<span class="badge red badge-status-factory center-align">Inhabilitado</span><br>
												<p class="date-deleted-at">{{ ucwords($space->deleted_at->format('F d\\, Y')) }}</p>
											@else
												<span class="badge green badge-status-factory center-text">Activo</span>
											@endif
										</td>
										<td class="td-fgs center-align">
											<div class="btn multi_input_delete" style="display: none;">
												<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$space->id}}" value="{{$space->id}}"/>
	      										<label for="input_{{$space->id}}"></label>
											</div>
		                					{!! Form::close() !!}
											@if(!$space->deleted_at)
												<a href="{{ route('spaces.destroy', $space->id) }}" onclick="return confirm('¿Desea Inhabilitar el Espacio?')" class="btn btn-fgs btn-fgs-delete red darken-3 tooltipped" data-position="top" data-delay="50" data-tooltip="Inhabilitar"><i class="material-icons">delete</i></a>
											@else
												<a href="{{ route('spaces.destroy', $space->id) }}" onclick="return confirm('¿Desea Habilitar el Espacio?')" class="btn btn-fgs btn-fgs-delete grey darken-2 tooltipped" data-position="top" data-delay="50" data-tooltip="Habilitar"><i class="material-icons">update</i></a>
											@endif
											<a href="{{ route('spaces.edit', $space->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit tooltipped" data-position="top" data-delay="50" data-tooltip="Editar"><i class="material-icons">create</i></a>
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
	<?php $paginator = $spaces;?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')