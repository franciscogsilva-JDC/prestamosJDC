@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">	
                <div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'resources.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs">
							<div class="file-field input-field col s12 m12 l9 input-search-fgs">
								<div class="file-path-wrapper path-wrapper-fgs center-text">
									<input id="name" type="text" class="validate" name="name">
									<label class="label-search-fgs" for="icon_prefix">Buscar recurso por Nombre o # de referencia</label>
								</div>
							</div>
		                    	{!! Form::submit('Buscar', ['class' => 'btn btn-search-fgs col s10 m11 l2 btn-fgs-edit']) !!}
							<div id="btn-filters" class="btn col s2 m1 l1 btn-fgs-filter center-align btn-fgs-edit waves-effect waves-light">
								<span class="center-align"><i class="material-icons icon-filter">keyboard_arrow_down</i></span>
							</div>
						</div>
						<div class="section section-form">
                        	<div class="row" id="panel-filters">
								<div class="input-field col s12 m6 l4">
									<i class="material-icons prefix">phonelink_off</i>
									<select id="resource_status_id" name="resource_status_id">
										<option value="" disabled selected>Selecciona Estado</option>
										@foreach($resourceStatuses as $status)
											<option value="{{ $status->id }}">{{ $status->name }}</option>
										@endforeach
									</select>
									<label for="resource_status_id">Filtrar por Estado</label>
								</div>
								<div class="input-field col s12 m6 l4">
									<i class="material-icons prefix">tune</i>
									<select id="resource_type_id" name="resource_type_id">
										<option value="" disabled selected>Selecciona tipo</option>
										@foreach($resourceTypes as $type)
											<option value="{{ $type->id }}">{{ $type->name }}</option>
										@endforeach
									</select>
									<label for="resource_type_id">Filtrar por Tipo</label>
								</div>
								<div class="input-field col s12 m6 l4">
									<i class="material-icons prefix">device_hub</i>
									<select id="dependency_id" name="dependency_id">
										<option value="" disabled selected>Selecciona una Dependencia</option>
										@foreach($dependencies as $dependency)
											<option value="{{ $dependency->id }}">{{  $dependency->name }}</option>
										@endforeach
									</select>
									<label for="dependency_id">Filtrar por Dependencia</label>
								</div>
								<div class="input-field col s12 m6 l4">
									<i class="material-icons prefix">category</i>
									<select id="resource_category_id" name="resource_category_id">
										<option value="" disabled selected>Selecciona una Categoria</option>
										@foreach($resourceCategories as $category)
											<option value="{{ $category->id }}">{{  $category->name }}</option>
										@endforeach
									</select>
									<label for="resource_category_id">Filtrar por Categoria</label>
								</div>
								<div class="input-field col s12 m6 l4">
									<i class="material-icons prefix">device_unknown</i>
									<select id="physical_state_id" name="physical_state_id">
										<option value="" disabled selected>Selecciona un Estado Físico</option>
										@foreach($physicalStates as $physical)
											<option value="{{ $physical->id }}">{{  $physical->name }}</option>
										@endforeach
									</select>
									<label for="physical_state_id">Filtrar por Estado Físico</label>
								</div>
								<div class="input-field col s12 m6 l4">
									<i class="material-icons prefix">domain</i>
									<select id="space_id" name="space_id">
										<option value="" disabled selected>Selecciona un Espacio</option>
										@foreach($spaces as $space)
											<option value="{{ $space->id }}">{{  $space->name }}</option>
										@endforeach
									</select>
									<label for="space_id">Filtrar por Espacio</label>
								</div>
                        	</div>
                        </div>
	                {!! Form::close() !!}
				</div>
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						{!! Form::open(['route' => 'resources.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Inhabilitar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Inhabilitar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea Habilitar/Inhabilitar los recursos seleccionados? Si un recurso se encuentra INHABILITADO, pasará a estar HABILITADO con este método")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
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
								@foreach($resources as $resource)
									<tr>									
										<td>
											{{ $resource->name }}<br>
											<b># Referencia: </b><p class="date-deleted-at">{{ $resource->reference }}</p>
											<img class="factory-logo-fgs responsive-img materialboxed" src="{{ $resource->image }}">
										</td>
										<td>
											<b>Dependencia: </b> <a href="{{ route('dependencies.index', ['search' => $resource->dependency->name]) }}">{{ $resource->dependency->name }}</a><br>
											<b>Tipo: </b> {{ $resource->type->name }}<br>
											<b>Categoria: </b> {{ $resource->category->name }}<br>
											<b>Estado: </b> {{ $resource->physicalState->name }}<br>
											@if(isset($resource->spaces))
												<b>Espacios: </b>
												@foreach($resource->spaces as $space)
													<a href="">{{ $space->name }}</a><br>
												@endforeach()
												<br>
											@endif
										</td>
										<td id="td-logo">
											@if($resource->status->id == 1)
												<span class="badge green badge-status-factory center-text">
											@elseif($resource->status->id == 2)
												<span class="badge red badge-status-factory center-text">
											@elseif($resource->status->id == 3)
												<span class="badge blue badge-status-factory center-text">
											@endif
												{{ $resource->status->name }}
											</span>
										</td>
										<td id="td-logo">
											@if($resource->deleted_at)
												<span class="badge red badge-status-factory center-align">Inhabilitado</span><br>
												<p class="date-deleted-at">{{ ucwords($resource->deleted_at->format('F d\\, Y')) }}</p>
											@else
												<span class="badge green badge-status-factory center-text">Activo</span>
											@endif
										</td>
										<td class="td-fgs center-align">
											<div class="btn multi_input_delete" style="display: none;">
												<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$resource->id}}" value="{{$resource->id}}"/>
	      										<label for="input_{{$resource->id}}"></label>
											</div>
		                					{!! Form::close() !!}
											@if(!$resource->deleted_at)
												<a href="{{ route('resources.destroy', $resource->id) }}" onclick="return confirm('¿Desea Inhabilitar el recurso?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">visibility_off</i></a>
											@else
												<a href="{{ route('resources.destroy', $resource->id) }}" onclick="return confirm('¿Desea Habilitar el recurso?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">visibility</i></a>
											@endif
											<a href="{{ route('resources.edit', $resource->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit"><i class="material-icons">create</i></a>
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
	<?php $paginator = $resources;?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')