@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">	
                <div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'users.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs">
							<div class="file-field input-field col s12 m12 l9 input-search-fgs">
								<div class="file-path-wrapper path-wrapper-fgs center-text">
									<input id="name" type="text" class="validate" name="name">
									<label class="label-search-fgs" for="icon_prefix">Buscar usuario por Nombre, # de identificación, email o nombre de empresa</label>
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
									<i class="material-icons prefix">tune</i>
									<select id="user_type_id" name="user_type_id">
										<option value="" disabled selected>Selecciona tipo</option>
										@foreach($userTypes as $type)
											<option value="{{ $type->id }}">{{ $type->name }}</option>
										@endforeach
									</select>
									<label for="user_type_id">Filtrar por Tipo</label>
								</div>
								<div class="input-field col s12 m6 l4">
									<i class="material-icons prefix">phonelink_off</i>
									<select id="user_status_id" name="user_status_id">
										<option value="" disabled selected>Selecciona Estado</option>
										@foreach($userStatuses as $status)
											<option value="{{ $status->id }}">{{ $status->name }}</option>
										@endforeach
									</select>
									<label for="user_status_id">Filtrar por Estado</label>
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
									<i class="material-icons prefix">wc</i>
									<select id="gender_id" name="gender_id">
										<option value="" disabled selected>Selecciona un genero</option>
										@foreach($genders as $gender)
											<option value="{{ $gender->id }}">{{  $gender->name }}</option>
										@endforeach
									</select>
									<label for="gender_id">Filtrar por Genero</label>
								</div>
								<div class="input-field col s12 m6 l4">
									<i class="material-icons prefix">public</i>
									<select id="town_id" name="town_id">
										<option value="" disabled selected>Selecciona un Municipio</option>
										@foreach($towns as $town)
											<option value="{{ $town->id }}">{{  $town->name }}</option>
										@endforeach
									</select>
									<label for="town_id">Filtrar por Municipio</label>
								</div>
                        	</div>
                        </div>
	                {!! Form::close() !!}
				</div>
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						{!! Form::open(['route' => 'users.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Inhabilitar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Inhabilitar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea Habilitar/Inhabilitar los usuarios seleccionados? Si un usuario se encuentra INHABILITADO, pasará a estar HABILITADO con este método")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
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
								@foreach($users as $user)
									<tr>									
										<td>
											{{ $user->name }}<br>
											<p class="date-deleted-at minitem">{{ $user->email }}</p>
											<p class="date-deleted-at minitem">{{ $user->dni }}</p>
											<p class="date-deleted-at minitem">{{ $user->cellphone_number }}</p>
											<p class="date-deleted-at minitem">{{ $user->gender?$user->gender->name:'Sin genero' }}</p>
											<img class="factory-logo-fgs responsive-img circle materialboxed" src="{{ $user->image }}">
										</td>
										<td>
											@if(isset($user->company_name))
												<b>Empresa: </b> {{ $user->company_name }}<br>
											@elseif(isset($user->dependency))
												<b>Dependencia: </b><a href="{{ route('dependencies.index', ['search' => $user->dependency->name]) }}">{{ $user->dependency->name }}</a><br>
											@elseif(isset($user->attendedDependencies))
												<b>Dependencia a cargo: </b>
												@foreach($user->attendedDependencies as $dependency)
													<a href="{{ route('dependencies.index', ['search' => $dependency->name]) }}">{{ $dependency->name }}</a>
												@endforeach
												<br>
											@endif
											@if(isset($user->town))
												<b>Municipio: </b> {{ $user->town->name }}<br>
											@endif
											<b>Tipo: </b> {{ $user->type->name }}<br>
										</td>
										<td id="td-logo">
											@if($user->status->id == 1)
												<span class="badge green badge-status-factory center-text">
											@elseif($user->status->id == 2)
												<span class="badge grey badge-status-factory center-text">
											@elseif($user->status->id == 3)
												<span class="badge red badge-status-factory center-text">
											@endif
												{{ $user->status->name }}
											</span>
										</td>
										<td id="td-logo">
											@if($user->deleted_at)
												<span class="badge red badge-status-factory center-align">Inhabilitado</span><br>
												<p class="date-deleted-at">{{ ucwords($user->deleted_at->format('F d\\, Y')) }}</p>
											@else
												<span class="badge green badge-status-factory center-text">Activo</span>
											@endif
										</td>
										<td class="td-fgs center-align">
											<div class="btn multi_input_delete" style="display: none;">
												<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$user->id}}" value="{{$user->id}}"/>
	      										<label for="input_{{$user->id}}"></label>
											</div>
		                					{!! Form::close() !!}
											@if(!$user->deleted_at)
												<a href="{{ route('users.destroy', $user->id) }}" onclick="return confirm('¿Desea Inhabilitar el usuario?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">visibility_off</i></a>
											@else
												<a href="{{ route('users.destroy', $user->id) }}" onclick="return confirm('¿Desea Habilitar el usuario?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">visibility</i></a>
											@endif
											<a href="{{ route('users.edit', $user->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit"><i class="material-icons">create</i></a>
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
	<?php $paginator = $users;?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')