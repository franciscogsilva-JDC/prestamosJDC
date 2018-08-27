@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">	
                <div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'programs.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs">
							<div class="file-field input-field col s12 m12 l9 input-search-fgs">
								<div class="file-path-wrapper path-wrapper-fgs center-text">
									<input id="title" type="text" class="validate" name="title">
									<label class="label-search-fgs" for="icon_prefix">Buscar programa por Nombre</label>
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
									<i class="material-icons prefix">school</i>
									<select id="program_type_id" name="program_type_id">
										<option value="" disabled selected>Selecciona tipo</option>
										@foreach($programTypes as $type)
											<option value="{{ $type->id }}">{{ $type->name }}</option>
										@endforeach
									</select>
									<label for="program_type_id">Filtrar por Tipo</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">device_hub</i>
									<select id="dependency_id" name="dependency_id">
										<option value="" disabled selected>Selecciona una Dependencia</option>
										@foreach($dependencies as $dependency)
											<option value="{{ $dependency->id }}">{{  $dependency->name }}</option>
										@endforeach
									</select>
									<label for="dependency_id">Filtrar por Dependencia</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">brightness_4</i>
									<select id="working_day_id" name="working_day_id">
										<option value="" disabled selected>Selecciona una Jornada</option>
										@foreach($workingDays as $working)
											<option value="{{ $working->id }}">{{  $working->name }}</option>
										@endforeach
									</select>
									<label for="working_day_id">Filtrar por Jornada</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">local_library</i>
									<select id="modality_id" name="modality_id">
										<option value="" disabled selected>Selecciona una Modalidad</option>
										@foreach($modalities as $modality)
											<option value="{{ $modality->id }}">{{  $modality->name }}</option>
										@endforeach
									</select>
									<label for="modality_id">Filtrar por Modalidad</label>
								</div>
                        	</div>
                        </div>
	                {!! Form::close() !!}
				</div>
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						{!! Form::open(['route' => 'programs.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Inhabilitar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Inhabilitar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea borrar las publicaciones seleccionadas?")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
						</div>
			     		<table class="highlight striped">
							<thead>
								<th>Nombre</th>
								<th>Datos</th>
								<th id="td-logo">Estado</th>
								<th class="center-align">Opciones</th>
							</thead>
							<tbody>
								@foreach($programs as $program)
								<tr>									
									<td>{{ $program->name }}</td>
									<td>
										<b>Dependencia: </b> {{ $program->dependecy->name }}<br>
										<b>Tipo: </b> {{ $program->type->name }}<br>
										@if(isset($program->workingDays))}
											<b>Jornada: </b>
											@foreach($program->workingDays as $working)
												{{ $working->name }} - 
											@endforeach()
											<br>
										@endif
										@if(isset($program->modalities))}
											<b>Jornada: </b>
											@foreach($program->modalities as $modality)
												{{ $modality->name }} - 
											@endforeach()
											<br>
										@endif
									</td>
									<td id="td-sector" class="center-align">
										@if($program->deleted_at)
											<span class="badge red badge-status-factory center-text">Inhabilitado</span>
											<p>{{ ucwords($program->deleted_at->format('F d\\, Y')) }}</p>
										@else
											<span class="badge green badge-status-factory center-text">Activo</span>
										@endif
									</td>
									<td class="td-fgs center-align">
										<div class="btn multi_input_delete" style="display: none;">
											<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$program->id}}" value="{{$program->id}}"/>
      										<label for="input_{{$program->id}}"></label>
										</div>
	                					{!! Form::close() !!}
										<a href="{{ route('programs.destroy', $program->id) }}" onclick="return confirm('¿Desea Inhabilitar el programa?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">delete</i></a>
										<a href="{{ route('programs.edit', $program->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit"><i class="material-icons">create</i></a>
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
	<?php $paginator = $programs;?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')