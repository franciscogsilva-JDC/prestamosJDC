@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">	
                <div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'headquarters.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs">
							<div class="file-field input-field col s12 m12 l9 input-search-fgs">
								<div class="file-path-wrapper path-wrapper-fgs center-text">
									<input id="search" type="text" class="validate" name="search">
									<label class="label-search-fgs" for="icon_prefix">Buscar Sede por nombre o dirección</label>
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
									<select id="town_id" name="town_id">
										<option value="" disabled selected>Selecciona Ciudad</option>
										@foreach($towns as $town)
											<option value="{{ $town->id }}">{{ $town->name }}</option>
										@endforeach
									</select>
									<label for="town_id">Filtrar por Ciudad</label>
								</div>
                        	</div>
                        </div>
	                {!! Form::close() !!}
				</div>
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						{!! Form::open(['route' => 'headquarters.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Inhabilitar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Inhabilitar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea Habilitar/Inhabilitar las sedes seleccionadas? Si una sede se encuentra INHABILITADA, pasará a estar HABILITADA con este método")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
						</div>
			     		<table class="highlight striped">
							<thead>
								<th>Nombre</th>
								<th>Ciudad</th>
								<th class="center-align">Opciones</th>
							</thead>
							<tbody>
								@foreach($headquarters as $headquarter)
									<tr>
										<td>
											<b>Nombre: </b>{{ $headquarter->name }}<br>
											<b>Ciudad: </b>{{ $headquarter->address }}<br>
										</td>
										<td>{{ $headquarter->town->name }} - {{ $headquarter->town->departament->name }}</td>
										<td class="td-fgs center-align">
											<div class="btn multi_input_delete" style="display: none;">
												<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$headquarter->id}}" value="{{$headquarter->id}}"/>
	      										<label for="input_{{$headquarter->id}}"></label>
											</div>
		                					{!! Form::close() !!}
											@if(!$headquarter->deleted_at)
												<a href="{{ route('headquarters.destroy', $headquarter->id) }}" onclick="return confirm('¿Desea Inhabilitar la sede?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">visibility_off</i></a>
											@else
												<a href="{{ route('headquarters.destroy', $headquarter->id) }}" onclick="return confirm('¿Desea Habilitar la sede?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">visibility</i></a>
											@endif
											<a href="{{ route('headquarters.edit', $headquarter->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit"><i class="material-icons">create</i></a>
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
	<?php $paginator = $headquarters;?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')