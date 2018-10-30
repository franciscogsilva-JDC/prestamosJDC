@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">	
                <div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'dependencies.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs">
							<div class="file-field input-field col s12 m12 l9 input-search-fgs">
								<div class="file-path-wrapper path-wrapper-fgs center-text">
									<input id="search" type="text" class="validate" name="search">
									<label class="label-search-fgs" for="icon_prefix">Buscar dependencia por nombre o responsable</label>
								</div>
							</div>
		                    	{!! Form::submit('Buscar', ['class' => 'btn btn-search-fgs col s10 m11 l2 btn-fgs-edit']) !!}
							<div id="btn-filters" class="btn col s2 m1 l1 btn-fgs-filter center-align btn-fgs-edit waves-effect waves-light">
								<span class="center-align"><i class="material-icons icon-filter">keyboard_arrow_down</i></span>
							</div>
						</div>
						<div class="section section-form">
                        	<div class="row" id="panel-filters">
								<div class="input-field col s12 m12 l12">
									<i class="material-icons prefix">location_city</i>
									<select id="headquarter_id" name="headquarter_id">
										<option value="" disabled selected>Selecciona Sede</option>
										@foreach($headquarters as $headquarter)
											<option value="{{ $headquarter->id }}">{{ $headquarter->name }}</option>
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
						{!! Form::open(['route' => 'dependencies.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Inhabilitar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Inhabilitar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea Habilitar/Inhabilitar las dependencias seleccionadas? Si una dependencia se encuentra INHABILITADA, pasará a estar HABILITADA con este método")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
						</div>
			     		<table class="highlight striped">
							<thead>
								<th>Nombre</th>
								<th>Datos</th>
								<th id="td-logo" class="center-align"># Recursos</th>
								<th id="td-logo">Estado</th>
								<th class="center-align">Opciones</th>
							</thead>
							<tbody>
								@foreach($dependencies as $dependency)
									<tr>									
										<td>{{ $dependency->name }}</td>
										<td>
											<b>Sede: </b>{{ $dependency->headquarter->name }}<br>
											<b>Responsables: </b><br>
											@foreach($dependency->attendants as $attendant)												
												{{ $attendant->name }}<br>
												<span class="date-deleted-at">{{ $attendant->email }}</span><br>
											@endforeach()
										</td>
										<td id="td-logo" class="center-align">
											{{ count($dependency->resources) }}
										</td>
										<td id="td-logo">
											@if($dependency->deleted_at)
												<span class="badge red badge-status-factory center-align">Inhabilitado</span><br>
												<p class="date-deleted-at">{{ ucwords($dependency->deleted_at->format('F d\\, Y')) }}</p>
											@else
												<span class="badge green badge-status-factory center-text">Activo</span>
											@endif
										</td>
										<td class="td-fgs center-align">
											<div class="btn multi_input_delete" style="display: none;">
												<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$dependency->id}}" value="{{$dependency->id}}"/>
	      										<label for="input_{{$dependency->id}}"></label>
											</div>
		                					{!! Form::close() !!}
											@if(!$dependency->deleted_at)
												<a href="{{ route('dependencies.destroy', $dependency->id) }}" onclick="return confirm('¿Desea Inhabilitar la Dependencia?')" class="btn btn-fgs btn-fgs-delete red darken-3 tooltipped" data-position="top" data-delay="50" data-tooltip="Inhabilitar"><i class="material-icons">delete</i></a>
											@else
												<a href="{{ route('dependencies.destroy', $dependency->id) }}" onclick="return confirm('¿Desea Habilitar la Dependencia?')" class="btn btn-fgs btn-fgs-delete grey darken-2 tooltipped" data-position="top" data-delay="50" data-tooltip="Habilitar"><i class="material-icons">update</i></a>
											@endif
											<a href="{{ route('dependencies.edit', $dependency->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit tooltipped" data-position="top" data-delay="50" data-tooltip="Editar"><i class="material-icons">create</i></a>
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
	<?php $paginator = $dependencies;?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')