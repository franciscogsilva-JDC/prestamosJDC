@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($publication))
								<p class="caption-title center-align">Editar Publicación</p>
							@else 
			               		<p class="caption-title center-align">Crear nueva Publicación</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($publication))
			                    {!! Form::open(['route' => ['publications.update', $publication->id], 'method' => 'PUT', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @else 
			                    {!! Form::open(['route' => 'publications.store', 'method' => 'POST', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @endif
			                    <div class="input-field col s12 m12 l12">
			                        <i class="material-icons prefix">description</i>
			                        {!! Form::text('title', isset($publication)?$publication->title:null, ['class' => '', 'required', 'id' => 'title']) !!}
			                        <label for="title">Titulo de la Publicación</label>
			                    </div>
								<div class="row">
									<div class="input-field col s12 m12 l12">
			                        <span class="txt-title">Contenido</span>
										{!! Form::textArea('content', isset($publication)?$publication->content:null, ['class' => 'textArea_content', 'required', 'id' => 'content']) !!}
									</div>
								</div>
								@include('admin.layouts.partials._images_alert_image')
								<div class="row">									
									<div class="file-field input-field col s12 m12 l12">
										<div class="btn btn-fgs-edit">
											<span>Imagen</span>
											<input id="image" type="file" name="image" value="{{isset($publication)?$publication->image:''}}">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Selecciona la imagen de la Publicación"">
										</div>
										<div class="center-align">
											<img id="image_container" src="{{isset($publication)?$publication->image:''}}" class="responsive-img img-preview-fgs"/>
										</div>
									</div>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">tune</i>
									<select id="publication_type_id" class="icons" name="publication_type_id" required>
										<option value="" disabled selected>Selecciona la categoria</option>
										@foreach($publication_types as $type)
											@if(isset($publication))
												<option value="{{ $type->id }}" {{($type->id===$myType->id)?'selected=selected':''}}>{{ $type->name }}</option>
											@else 
												<option value="{{ $type->id }}">{{ $type->name }}</option>
											@endif
										@endforeach
									</select>
									<label for="publication_type_id">Categoria</label>
								</div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">visibility_off</i>
									<select id="publication_status_id" class="icons" name="publication_status_id" required>
										<option value="" disabled selected>Selecciona el Estado de la publicación</option>
										@foreach($publication_statuses as $type)
											@if(isset($publication))
												<option value="{{ $type->id }}" {{($type->id===$myType->id)?'selected=selected':''}}>{{ $type->name }}</option>
											@else 
												<option value="{{ $type->id }}">{{ $type->name }}</option>
											@endif
										@endforeach
									</select>
									<label for="publication_status_id">Estado</label>
								</div>
			                    <div class="input-field col s12 m6 l6">
			                        <i class="material-icons prefix">people</i>
			                        {!! Form::text('author_other', isset($publication)?$publication->author_other:null, ['class' => '', 'required', 'id' => 'author_other']) !!}
			                        <label for="author_other">Autor o autores</label>
			                    </div>
			                    <div class="input-field col s12 m6 l6">
			                        <i class="material-icons prefix">ondemand_video</i>
			                        {!! Form::text('resource_url', isset($publication)?$publication->resource_url:null, ['class' => '', 'id' => 'resource_url']) !!}
			                        <label for="resource_url">Url del video</label>
			                    </div>
			                    <div class="input-field col s12 m6 l6">
			                        <i class="material-icons prefix">audiotrack</i>
			                        {!! Form::text('resource_sound_url', isset($publication)?$publication->resource_sound_url:null, ['class' => '', 'id' => 'resource_sound_url']) !!}
			                        <label for="resource_sound_url">Url del Audio</label>
			                    </div>
								<div class="input-field col s12 m6 l6">
									<i class="material-icons prefix">sort</i>
									<select id="polls" class="icons" name="polls[]" multiple>
										<option value="" disabled selected>Selecciona las encuentas para la publicación</option>
										@foreach($polls as $poll)
											@if(isset($publication) && count($publication->polls) > 0)
												<option value="{{ $poll->id }}" {{in_array($poll->id, $publication->polls->pluck('id')->ToArray())?'selected=selected':''}}>{{ $poll->title }}</option>
											@else
												<option value="{{ $poll->id }}">{{ $poll->title }}</option>
											@endif
										@endforeach
									</select>
									<label for="polls">Anexar Encuentas</label>
								</div>
								@if(isset($publication))
		                    		<div id="event_options" class="row {{ ($publication->publication_type_id!=3)?'nones':'' }}">
								@else
		                    		<div id="event_options" class="row nones"> 
								@endif
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">pin_drop</i>
				                        {!! Form::text('location', isset($publication)?$publication->location:null, ['class' => '', 'id' => 'location']) !!}
				                        <label for="location">Lugar del Evento</label>
				                    </div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">event_available</i>
										@if(isset($publication))
											@if($publication->start_date != null)
												<input type="text" class="datepicker" id="start_date" name="start_date" value="{{ $publication->start_date->toDateString() }}">
											@else
												<input type="text" class="datepicker" id="start_date" name="start_date">
											@endif
										@else
											<input type="text" class="datepicker" id="start_date" name="start_date">
										@endif
										<label for="start_date">Fecha de Inicio</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">query_builder</i>
										@if(isset($publication))
											@if($publication->start_date != null)
												<input type="text" class="timepicker" id="start_time" name="start_time" value="{{ $publication->start_date->format('h:i A') }}">
											@else
												<input type="text" class="timepicker" id="start_time" name="start_time">
											@endif
										@else
											<input type="text" class="timepicker" id="start_time" name="start_time">
										@endif
										<label for="start_time">Hora de Inicio</label>
									</div>
				                    <div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">event_busy</i>
										@if(isset($publication))
											@if($publication->end_date != null)
												<input type="text" class="datepicker" id="end_date" name="end_date" value="{{ $publication->end_date->toDateString() }}">
											@else
												<input type="text" class="datepicker" id="end_date" name="end_date">
											@endif
										@else
											<input type="text" class="datepicker" id="end_date" name="end_date">
										@endif
										<label for="end_date">Fecha de Cierre</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">query_builder</i>
										@if(isset($publication))
											@if($publication->end_date != null)
												<input type="text" class="timepicker" id="end_time" name="end_time" value="{{ $publication->end_date->format('h:i A') }}">
											@else
												<input type="text" class="timepicker" id="end_time" name="end_time">
											@endif
										@else
											<input type="text" class="timepicker" id="end_time" name="end_time">
										@endif
										<label for="end_time">Hora de Cierre</label>
									</div>
		                    	</div>
		                    	<div class="row"></div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('publications.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del Publicación?')" >Cancelar</a>              
			                      @if(isset($publication))
			                        {!! Form::submit('Editar', ['class' => 'btn waves-effect btn-fgs-edit', 'type' => 'button']) !!}
			                      @else 
			                        {!! Form::submit('Crear', ['class' => 'btn waves-effect btn-fgs-edit', 'type' => 'button']) !!}
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

    	$('.textArea_content').trumbowyg({
		    removeformatPasted: true
		});

    	$('#publication_type_id').on('change', function(){
			if($('#publication_type_id option:selected').val() == "3"){
				$('#event_options').toggle();
        		$('.timepicker').pickatime();
			}else if($('#publication_type_id option:selected').val() != "3"){
				$('#event_options').hide();
			}
		});
	</script>						
@endsection