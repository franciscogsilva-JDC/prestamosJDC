@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($space))
								<p class="caption-title center-align">Editar espacio</p>
							@else 
			               		<p class="caption-title center-align">Crear nuevo espacio</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($space))
			                    {!! Form::open(['route' => ['spaces.update', $space->id], 'method' => 'PUT', 'onsubmit' => 'preloader()']) !!}
			                @else 
			                    {!! Form::open(['route' => 'spaces.store', 'method' => 'POST', 'onsubmit' => 'preloader()']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">subject</i>
				                        {!! Form::text('name', isset($space)?$space->name:null, ['class' => '', 'required', 'id' => 'name']) !!}
				                        <label for="name">Nombre del espacio</label>
				                    </div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">drag_indicator</i>
				                        {!! Form::number('max_persons', isset($space)?$space->max_persons:null, ['class' => '', 'id' => 'max_persons', 'min' => '1']) !!}
				                        <label for="max_persons">Maximo de personas</label>
				                    </div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">tune</i>
										<select id="space_type_id" class="icons" name="space_type_id">
											<option value="" disabled selected>Selecciona el Tipo</option>
											@foreach($spaceTypes as $type)
												@if(isset($space))
													<option value="{{ $type->id }}" {{$type->id===$space->type->id?'selected=selected':''}}>{{ $type->name }}</option>
												@else
													<option value="{{ $type->id }}">{{ $type->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="space_type_id">Tipo de espacio</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">phonelink_off</i>
										<select id="space_status_id" class="icons" name="space_status_id">
											<option value="" disabled selected>Selecciona el Estado</option>
											@foreach($spaceStatuses as $status)
												@if(isset($space))
													<option value="{{ $status->id }}" {{$status->id===$space->status->id?'selected=selected':''}}>{{ $status->name }}</option>
												@else 
													<option value="{{ $status->id }}">{{ $status->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="space_status_id">Estado de espacio</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">weekend</i>
										<select id="property_type_id" class="icons" name="property_type_id">
											<option value="" disabled selected>Selecciona el Tipo de propiedad</option>
											@foreach($propertyTypes as $type)
												@if(isset($space))
													<option value="{{ $type->id }}" {{$type->id===$space->propertyType->id?'selected=selected':''}}>{{ $type->name }}</option>
												@else 
													<option value="{{ $type->id }}">{{ $type->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="property_type_id">Selecciona el Tipo de propiedad</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">location_city</i>
										<select id="building_id" class="icons" name="building_id">
											<option value="" disabled selected>Selecciona el Edificio</option>
											@foreach($buildings as $building)
												@if(isset($space) && isset($space->building))
													<option value="{{ $building->id }}" {{$building->id===$space->building->id?'selected=selected':''}}>{{ $building->name }}</option>
												@else 
													<option value="{{ $building->id }}">{{ $building->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="building_id">Edificio del espacio</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">place</i>
										<select id="headquarter_id" class="icons" name="headquarter_id">
											<option value="" disabled selected="selected">Selecciona la Sede</option>
											@foreach($headquarters as $headquarter)
												@if(isset($space) && isset($space->headquarter))
													<option value="{{ $headquarter->id }}" {{$headquarter->id===$space->headquarter->id?'selected=selected':''}}>{{ $headquarter->name }}</option>
												@else 
													<option value="{{ $headquarter->id }}">{{ $headquarter->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="headquarter_id">Sede del espacio</label>
									</div>
				                </div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('spaces.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del espacio?')">Cancelar</a>              
			                      @if(isset($space))
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
	<script type="text/javascript">

		$(document).ready(function() {
			$('#building_id').change(function(){
				$('#headquarter_id').val('').attr('selected', true);
        		$('#headquarter_id').material_select();
        		alert('Al asignar un espacio a un edificio, este automáticamente obtiene la sede, no es necesario seleccionarla');
			});

			$('#headquarter_id').change(function(){
				$('#building_id').val('').attr('selected', true);
        		$('#building_id').material_select();
        		alert('Al asignar una sede, no es necesario seleccionar un edificio');
			});			
		});

		function preloader(){
			Materialize.toast('Cargando espacios, este proceso puede tardar un poco', 2000, 'orange darken-1');
			$('#postulation-btn').hide();
			$('.postulation-btn').hide();
			$('#postulate-preloader').show();
		}
	</script>						
@endsection