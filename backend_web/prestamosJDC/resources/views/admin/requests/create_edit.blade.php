@extends('admin.layouts.admin_layout')

@section('imported_css')
@endsection()

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($request))
								<p class="caption-title center-align">Editar Solicitud #{{ $request->id }}</p>
							@else 
			               		<p class="caption-title center-align">Crear nueva Solicitud</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($request))
			                    {!! Form::open(['route' => ['requests.update', $request->id], 'method' => 'PUT', 'onsubmit' => 'preloader()']) !!}
			                @else 
			                    {!! Form::open(['route' => 'requests.store', 'method' => 'POST', 'onsubmit' => 'preloader()']) !!}
			                @endif
			                	<div class="row">
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">tune</i>
										<select id="request_type_id" class="icons" name="request_type_id">
											<option value="" disabled selected>Selecciona el Tipo <span class="required-input">*</span></option>
											@foreach($requestTypes as $type)
												@if(isset($request))
													<option value="{{ $type->id }}" {{$type->id===$request->type->id?'selected=selected':''}}>{{ $type->name }}</option>
												@else 
													<option value="{{ $type->id }}">{{ $type->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="request_type_id">Tipo de Solicitud <span class="required-input">*</span></label>
									</div>
									<div id="space_type_id_div" class="input-field col s12 m6 l6" hidden>
										<i class="material-icons prefix"></i>
										<select id="space_type_id" class="icons" name="space_type_id">
											<option value="" disabled selected>Selecciona el Tipo de espacio<span class="required-input">*</span></option>
											@foreach($statusTypes as $type)
												@if(isset($request))
													@if($request->type->id == 1)
														<option value="{{ $type->id }}" {{$type->id===$thisSpaceType->id?'selected=selected':''}}>{{ $type->name }}</option>
													@endif
												@else 
													<option value="{{ $type->id }}">{{ $type->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="space_type_id">Tipos de Espacios<span class="required-input">*</span></label>
									</div>
									<div id="description_div" class="input-field col s12 m12 l12" hidden>
				                        <i class="material-icons prefix">description</i>
										{!! Form::textArea('description', isset($request)?$request->description:null, ['class' => 'materialize-textarea', 'id' => 'description']) !!}
				                        <label for="description">Descripción y/o proposito</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">person</i>
										<select class="icons" name="user_id" id="user_id">
											<option value="" disabled selected>Selecciona el solicitante <span class="required-input">*</span></option>
											@foreach($users as $user)
												@if(isset($request))
													<option value="{{ $user->id }}" data-icon="{{ $user->image_thumbnail }}" class="rigth circle" {{in_array($user->id, $request->user->pluck('id')->ToArray())?'selected=selected':''}}>{{ $user->name }}</option>
												@else
													<option value="{{ $user->id }}" data-icon="{{ $user->image_thumbnail }}" class="rigth circle" >{{ $user->name }}</option>		
												@endif
											@endforeach
										</select>
										<label for="user_id">Solicitante <span class="required-input">*</span></label>
									</div>
									<div id="responsible_div" class="input-field col s12 m6 l6">
										<i class="material-icons prefix">how_to_reg</i>
										<select class="icons" name="responsible_id" id="responsible_id">
											<option value="" disabled selected>Selecciona el responsable</option>
											@foreach($users as $user)
												@if(isset($request))
													<option value="{{ $user->id }}" data-icon="{{ $user->image_thumbnail }}" class="rigth circle" {{in_array($user->id, $request->responsible->pluck('id')->ToArray())?'selected=selected':''}}>{{ $user->name }}</option>
												@else
													<option value="{{ $user->id }}" data-icon="{{ $user->image_thumbnail }}" class="rigth circle" >{{ $user->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="responsible_id">Responsable</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">done_all</i>
										<select id="authorization_status_id" class="icons" name="authorization_status_id">
											<option value="" disabled selected>Selecciona el Estado de la Solicitud <span class="required-input">*</span></option>
											@foreach($authorizationStatuses as $status)
												@if(isset($request))
													<option value="{{ $status->id }}" {{$status->id===$request->authorizations()->orderBy('created_at', 'DESC')->first()->status->id?'selected=selected':''}}>{{ $status->name }}</option>
												@else 
													<option value="{{ $status->id }}">{{ $status->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="authorization_status_id">Estado de Solicitud <span class="required-input">*</span></label>
									</div>
									<div class="input-field col s6 m6 l6">
										<i class="material-icons prefix">event_available</i>
										@if(isset($request))
											<input type="text" class="datepicker" id="start_date" name="start_date" required value="{{ $request->start_date->toDateString() }}">
										@else
											<input type="text" class="datepicker" id="start_date" name="start_date" required>
										@endif
										<label for="start_date">Fecha de Inicio <span class="required-input">*</span></label>
									</div>
									<div class="input-field col s6 m6 l6">
										<i class="material-icons prefix">query_builder</i>
										@if(isset($request))
											<input type="text" class="timepicker" id="start_time" name="start_time" required value="{{ $request->start_date->format('h:i A') }}">
										@else
											<input type="text" class="timepicker" id="start_time" name="start_time" required>
										@endif
										<label for="start_time">Hora de Inicio <span class="required-input">*</span></label>
									</div>
									<div id="end_date_div" class="input-field col s6 m6 l6">
										<i class="material-icons prefix">event_busy</i>
										@if(isset($request))
											<input type="text" class="datepicker" id="end_date" name="end_date" value="{{ $request->end_date->toDateString() }}">
										@else
											<input type="text" class="datepicker" id="end_date" name="end_date" >
										@endif
										<label for="end_date">Fecha Fin <span class="required-input">*</span></label>
									</div>
									<div id="end_time_div" class="input-field col s6 m6 l6">
										<i class="material-icons prefix">query_builder</i>
										@if(isset($request))
											<input type="text" class="timepicker" id="end_time" name="end_time" value="{{ $request->end_date->format('h:i A') }}">
										@else
											<input type="text" class="timepicker" id="end_time" name="end_time" >
										@endif
										<label for="end_time">Hora Fin <span class="required-input">*</span></label>
									</div>
									<div id="spaces_div" class="input-field col s12 m6 l6" hidden>
										<i class="material-icons prefix">domain</i>
										<select class="icons" name="space_id" id="space_id">
											@if(isset($request))
												<option value="" disabled selected>Selecciona el espacio</option>
												@if($request->type->id == 1)
													@foreach($thisSpaces as $space)
														<option value="{{ $space->id }}" {{$space->id===$request->authorizations()->orderBy('created_at', 'DESC')->first()->spaces()->orderBy('created_at', 'DESC')->first()->id?'selected=selected':''}}>{{ $space->name }} ({{ $space->max_persons }})</option>
													@endforeach
												@endif
											@else
												<option value="" disabled selected>Primero Selecciona un tipo de Espacio</option>
											@endif
										</select>
										<label for="space_id">Espacios</label>
									</div>
									<div id="resources_div" class="input-field col s12 m6 l6" hidden>
										<i class="material-icons prefix">category</i>
										<select id="resources" class="icons" name="resources[]" multiple>
											@if(isset($request))
												<option value="" disabled selected>Selecciona un recurso</option>
												@if($request->authorizations()->orderBy('created_at', 'DESC')->first()->spaces()->count()>0)
													@if($resources->count()>0)
														@foreach($resources as $resource)
															<option value="{{ $resource->id }}" data-icon="{{ $resource->image_thumbnail }}" class="rigth circle" {{in_array($resource->id, $request->authorizations()->orderBy('created_at', 'DESC')->first()->resources()->pluck('resource_id')->ToArray())?'selected=selected':''}}>{{ $resource->name }} - {{ $resource->reference }}</option>
														@endforeach
													@else
														<option value="" disabled selected>No hay recursos disponibles para este espacio</option>
													@endif
												@endif
											@else
												<option value="" disabled selected>Primero Selecciona un Espacio</option>
											@endif
										</select>
										<label for="resources">Recursos</label>
									</div>
									<div id="dependencies_div" class="input-field col s12 m6 l6" hidden>
										<i class="material-icons prefix">device_hub</i>
										<select class="icons" name="dependency_id" id="dependency_id">
											<option value="" disabled selected>Selecciona la dependencia <span class="required-input">*</span></option>
											@foreach($dependencies as $dependency)
												@if(isset($request))
													@if($request->type->id == 2)
														<option value="{{ $dependency->id }}" {{$dependency->id===$thisDependency?'selected=selected':''}}>{{ $dependency->name }}</option>
													@endif
												@else
													<option value="{{ $dependency->id }}">{{ $dependency->name }}</option>		
												@endif
											@endforeach
										</select>
										<label for="dependency_id">Dependencia <span class="required-input">*</span></label>
									</div>
									<div id="dep_resources_div" class="input-field col s12 m6 l6" hidden>
										<i class="material-icons prefix">category</i>
										<select id="resources_dep" class="icons" name="resources_dep">
											@if(isset($request))
												@if($request->type->id == 2)
													@foreach($resources as $resource)
														<option value="{{ $resource->id }}" data-icon="{{ $resource->image_thumbnail }}" class="rigth circle" {{in_array($resource->id, $thisDependencyResources)?'selected=selected':''}}>{{ $resource->name }} - {{ $resource->reference }}</option>
													@endforeach
												@endif
											@else
												<option value="" disabled selected>Primero Selecciona una Dependencia</option>
											@endif
										</select>
										<label for="resources_dep">Recursos</label>
									</div>
									<div id="participant_types_div" class="input-field col s12 m6 l6" hidden>
										<i class="material-icons prefix">group</i>
										<select class="icons" name="participantsTypes" id="participantsTypes[]" multiple>
											<option value="" disabled selected>Selecciona el Tipo de participantes <span class="required-input">*</span></option>
											@foreach($participantTypes as $type)
												@if(isset($request))
													<option value="{{ $type->id }}" {{in_array($type->id, $request->participantTypes->pluck('id')->ToArray())?'selected=selected':''}}>{{ $type->name }}</option>
												@else
													<option value="{{ $type->id }}">{{ $type->name }}</option>		
												@endif
											@endforeach
										</select>
										<label for="participantsTypes">Tipo de participantes <span class="required-input">*</span></label>
									</div>
				                    <div id="participants_div"  class="input-field col s12 m6 l6 student-user" hidden>
				                        <i class="material-icons prefix">group</i>
				                        {!! Form::number('participants', isset($request)?$request->participants:null, ['class' => '', 'id' => 'participants', 'min' => '1']) !!}
				                        <label for="participants"># Total de Participantes</label>
				                    </div>
				                    <div id="internal_participants_div"  class="input-field col s12 m6 l6 student-user" hidden>
				                        <i class="material-icons prefix">person</i>
				                        {!! Form::number('internal_participants', isset($request)?$request->internal_participants:null, ['class' => '', 'id' => 'internal_participants', 'min' => '1']) !!}
				                        <label for="internal_participants"># Participantes Internos</label>
				                    </div>
				                    <div id="external_participants_div"  class="input-field col s12 m6 l6 student-user" hidden>
				                        <i class="material-icons prefix">person_outline</i>
				                        {!! Form::number('external_participants', isset($request)?$request->external_participants:null, ['class' => '', 'id' => 'external_participants', 'min' => '1']) !!}
				                        <label for="external_participants"># Participantes Externos</label>
				                    </div>
								</div>
			                    <div class="buttonpanel-edit center-align">
									<a href="{{ route('requests.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación de la Solicitud?')">Cancelar</a>              
									@if(isset($request))
										{!! Form::submit('Editar', ['class' => 'btn waves-effect btn-fgs-edit postulation-btn', 'id' => 'postulation-btn']) !!}
									@else 
										{!! Form::submit('Crear', ['class' => 'btn waves-effect btn-fgs-edit postulation-btn', 'id' => 'postulation-btn']) !!}
									@endif
									<div class="postulate-preloader" id="postulate-preloader" style="display: none;">
										<div class="preloader-wrapper big active">
											<div class="spinner-layer spinner-red-only">
												<div class="circle-clipper left">
													<div class="circle"></div>
												</div>
												<div class="gap-patch">
													<div class="circle"></div>
												</div>
												<div class="circle-clipper right">
													<div class="circle"></div>
												</div>
											</div>
										</div>	
									</div>
			                    </div>
			                {!! Form::close() !!}              
			            </div>
			        </div>
				</div>
			</div>
        </div>
    </div>
@endsection()

@section('js')
	<script>
		function preloader(){
			Materialize.toast('Cargando Solicituds, este proceso puede tardar un poco', 2000, 'orange darken-1');
			$('#postulation-btn').hide();
			$('.postulation-btn').hide();
			$('#postulate-preloader').show();
		}

		$(function(){
			validateInputs();
		});

		$('#request_type_id').on('change', function(){
			validateInputs();
		});

		function validateInputs(){
			if($('#request_type_id option:selected').val() == "1"){
				showSpaceInputs();
			}if($('#request_type_id option:selected').val() == "2"){
				showResourceInputs();
			}
		}

		function showSpaceInputs(){
			$('#description_div').show();
			$('#space_type_id_div').show();
			$('#spaces_div').show();
			$('#resources_div').show();
			$('#participants_div').show();
			$('#participant_types_div').show();
			$('#internal_participants_div').show();
			$('#external_participants_div').show();
			$('#responsible_div').show();
			$('#dependencies_div').hide();
			$('#dep_resources_div').hide();
			//$('#complements_div').hide();
		}

		function showResourceInputs(){	
			$('#description_div').hide();	
			$('#spaces_div').hide();	
			$('#space_type_id_div').hide();	
			$('#resources_div').hide();
			$('#participants_div').hide();
			$('#participant_types_div').hide();
			$('#internal_participants_div').hide();
			$('#external_participants_div').hide();
			$('#dependencies_div').show();
			$('#dep_resources_div').show();
			$('#responsible_div').show();
		}

		$('.timepicker').pickatime();

		$('#space_type_id').change(function(){
			$.get("{{ route('types.spaces') }}",
			{ space_type_id: $(this).val() },
			function(data) {
				$('#space_id').empty();
	          	$('#space_id').append("<option value='' disabled selected>Selecciona un Espacio</option>");
				$.each(data, function(key, element) {
					$('#space_id').append("<option value='" + element.id + "'>" + element.name + " (" + element.max_persons + ")</option>");
				});
				$('select').material_select();
			});
		});

		$('#space_id').change(function(){
			$.get("{{ route('spaces.resources') }}",
			{ space_id: $(this).val() },
			function(data) {
				$('#resources').empty();
	          	$('#resources').append("<option value='' disabled selected>Selecciona un Recurso</option>");
				$.each(data, function(key, element) {
					$('#resources').append("<option value='" + element.id + "' data-icon='"+ element.image_thumbnail +"' class='rigth circle'>" + element.name + " - " + element.reference + "</option>");
				});
				$('select').material_select();
			});
		});

		$('#dependency_id').change(function(){			
			/*
			$('#complements').empty();
			$('#complements_div').hide();
			*/
			$.get("{{ route('dependencies.resources') }}",
			{ dependency_id: $(this).val() },
			function(data) {
				$('#resources_dep').empty();
	          	$('#resources_dep').append("<option value='' disabled selected>Selecciona un Recurso</option>");
				/*
				$('#complements').empty();
	          	$('#complements').append("<option value='' disabled selected>Selecciona un Recurso</option>");
	          	*/
				$.each(data, function(key, element) {
					$('#resources_dep').append("<option value='" + element.id + "' data-icon='"+ element.image_thumbnail +"' class='rigth circle'>" + element.name + " - " + element.reference + "</option>");
				});
				$('select').material_select();
			});
		});

		$('#resources_dep').change(function(){
			$.get("{{ route('validate.resources') }}",
			{ resource_id: $(this).val() },
			function(data) {
				/*
				if(data == 'true'){
					$('#complements_div').show();			
					$.get("{{ route('complements') }}",
					//{ resources_dep: $(this).val() },
					function(data) {
						$('#complements').empty();
			          	$('#complements').append("<option value='' disabled selected>Selecciona complementos</option>");
						$.each(data, function(key, element) {
							$('#complements').append("<option value='" + element.id + "'>" + element.name + "</option>");
						});
						$('select').material_select();
					});
				}else{
					$('#complements').empty();
					$('#complements_div').hide();
				}
				*/
			});
		});
	</script>						
@endsection