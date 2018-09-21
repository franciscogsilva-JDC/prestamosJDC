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
									<label class="label-search-fgs" for="icon_prefix">Buscar solicitud por Nombre, # de identificación, email o nombre de empresa</label>
								</div>
							</div>
		                    	{!! Form::submit('Buscar', ['class' => 'btn btn-search-fgs col s10 m11 l2 btn-fgs-edit']) !!}
							<div id="btn-filters" class="btn col s2 m1 l1 btn-fgs-filter center-align btn-fgs-edit waves-effect waves-light">
								<span class="center-align"><i class="material-icons icon-filter">keyboard_arrow_down</i></span>
							</div>
						</div>
						<div class="section section-form">
                        	
                        </div>
	                {!! Form::close() !!}
				</div>
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						{!! Form::open(['route' => 'requests.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Inhabilitar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Inhabilitar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea Habilitar/Inhabilitar las solicitudes seleccionadas? Si una solicitud se encuentra INHABILITADA, pasará a estar HABILITADA con este método")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
						</div>
			     		<table class="highlight striped">
							<thead>
								<th id="td-logo">Image</th>
								<th>Datos</th>
								<th id="td-logo">Estado</th>
								<th id="td-logo">Inhabilitado</th>
								<th class="center-align">Opciones</th>
							</thead>
							<tbody>
								@foreach($requests as $request)
									<tr>									
										<td id="td-logo">
											<img class="factory-logo-fgs responsive-img circle materialboxed" src="{{ $request->image }}">
										</td>
										<td>
											{{ $request->name }}<br>
											<p class="date-deleted-at minitem">{{ $request->email }}</p><br>
											@if(isset($request->company_name))
												<b>Empresa: </b> {{ $request->company_name }}<br>
											@elseif(isset($request->dependency))
												<b>Dependencia: </b><a href="{{ route('dependencies.index', ['search' => $request->dependency->name]) }}">{{ $request->dependency->name }}</a><br>
											@elseif(isset($request->attendedDependencies))
												<b>Dependencia a cargo: </b>
												@foreach($request->attendedDependencies as $dependency)
													<a href="{{ route('dependencies.index', ['search' => $dependency->name]) }}">{{ $dependency->name }}</a>
												@endforeach
												<br>
											@endif
											@if(isset($request->town))
												<b>Municipio: </b> {{ $request->town->name }}<br>
											@endif
											<b>Tipo: </b> {{ $request->type->name }}<br>
										</td>
										<td id="td-logo">
											@if($request->status->id == 1)
												<span class="badge green badge-status-factory center-text">
											@elseif($request->status->id == 2)
												<span class="badge grey badge-status-factory center-text">
											@elseif($request->status->id == 3)
												<span class="badge red badge-status-factory center-text">
											@endif
												{{ $request->status->name }}
											</span>
										</td>
										<td id="td-logo">
											@if($request->deleted_at)
												<span class="badge red badge-status-factory center-align">Inhabilitado</span><br>
												<p class="date-deleted-at">{{ ucwords($request->deleted_at->format('F d\\, Y')) }}</p>
											@else
												<span class="badge green badge-status-factory center-text">Activo</span>
											@endif
										</td>
										<td class="td-fgs center-align">
											<div class="btn multi_input_delete" style="display: none;">
												<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$request->id}}" value="{{$request->id}}"/>
	      										<label for="input_{{$request->id}}"></label>
											</div>
		                					{!! Form::close() !!}
											@if(!$request->deleted_at)
												<a href="{{ route('requests.destroy', $request->id) }}" onclick="return confirm('¿Desea Inhabilitar el solicitud?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">visibility_off</i></a>
											@else
												<a href="{{ route('requests.destroy', $request->id) }}" onclick="return confirm('¿Desea Habilitar el solicitud?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">visibility</i></a>
											@endif
											<a href="{{ route('requests.edit', $request->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit"><i class="material-icons">create</i></a>
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