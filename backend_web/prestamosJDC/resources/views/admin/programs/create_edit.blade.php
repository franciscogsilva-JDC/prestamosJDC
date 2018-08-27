@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($program))
								<p class="caption-title center-align">Editar programa</p>
							@else 
			               		<p class="caption-title center-align">Crear nuevo programa</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($program))
			                    {!! Form::open(['route' => ['programs.update', $program->id], 'method' => 'PUT', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @else 
			                    {!! Form::open(['route' => 'programs.store', 'method' => 'POST', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">widgets</i>
				                        {!! Form::text('title', isset($program)?$program->title:null, ['class' => '', 'required', 'id' => 'title']) !!}
				                        <label for="title">Titulo del programa</label>
				                    </div>
			                    </div>
			                    @include('admin.layouts.partials._images_alert_program')
								<div class="row">									
									<div class="file-field input-field col s12 m12 l12">
										<div class="btn btn-fgs-edit">
											<span>Imagen</span>
											<input id="image" type="file" name="image" value="{{isset($program)?$program->image:''}}">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Selecciona la imagen del programa"">
										</div>
										<div class="center-align">
											<img id="image_container" src="{{isset($program)?$program->image:''}}" class="responsive-img img-preview-fgs"/>
										</div>
									</div>
								</div>
			                    <div class="input-field col s12 m6 l6">
			                        <i class="material-icons prefix">people</i>
			                        {!! Form::text('presenter', isset($program)?$program->presenter:null, ['class' => '', 'required', 'id' => 'presenter']) !!}
			                        <label for="presenter">Presentadores del programa</label>
			                    </div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">event_note</i>
									<select id="selected_days" class="icons" name="selected_days[]" multiple>
										<option value="" disabled selected>Selecciona los días de emisión</option>
										@foreach($days as $day)
											@if(isset($program) && count($program->days) > 0)
												<option value="{{ $day->id }}" {{in_array($day->id, $program->days->pluck('id')->ToArray())?'selected=selected':''}}>{{ $day->name }}</option>
											@else
												<option value="{{ $day->id }}">{{ $day->name }}</option>
											@endif
										@endforeach
									</select>
									<label for="selected_days">Días de emisión</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">schedule</i>
									<select id="initial_emission_hour" class="icons" name="initial_emission_hour">
										<option value="" disabled selected>Selecciona la hora de Inicio</option>
										@foreach($hours as $hour)
											@if(isset($program))
												<option value="{{ $hour }}" {{($program->initial_emission_hour===$hour)?'selected=selected':''}}>{{ $hour }}</option>
											@else
												<option value="{{ $hour }}">{{ $hour }}</option>
											@endif
										@endforeach
									</select>
									<label for="initial_emission_hour">Hora de inicio</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">schedule</i>
									<select id="end_emission_hour" class="icons" name="end_emission_hour">
										<option value="" disabled selected>Selecciona la hora de Fin</option>
										@foreach($hours as $hour)
											@if(isset($program))
												<option value="{{ $hour }}" {{($program->end_emission_hour===$hour)?'selected=selected':''}}>{{ $hour }}</option>
											@else
												<option value="{{ $hour }}">{{ $hour }}</option>
											@endif
										@endforeach
									</select>
									<label for="end_emission_hour">Hora de Fin</label>
								</div>
								<div class="row">
									<div class="input-field col s12 m12 l12">
			                        <span class="txt-title">Descripción</span>
										{!! Form::textArea('description', isset($program)?$program->description:null, ['class' => 'textArea_description', 'required', 'id' => 'description']) !!}
									</div>
								</div>
								<input name="program_type_id" type="hidden" value="1">
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('programs.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del programa?')" >Cancelar</a>              
			                      @if(isset($program))
			                        {!! Form::submit('Editar', ['class' => 'btn waves-effect btn-fgs-edit']) !!}
			                      @else 
			                        {!! Form::submit('Crear', ['class' => 'btn waves-effect btn-fgs-edit']) !!}
			                      @endif
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
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#image_container').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}	
		}

		$("#image").change(function() {
			readURL(this);
		});

    	$('.textArea_description').trumbowyg();
	</script>						
@endsection