@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($resource))
								<p class="caption-title center-align">Editar Recurso</p>
							@else 
			               		<p class="caption-title center-align">Crear nuevo Recurso</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($resource))
			                    {!! Form::open(['route' => ['resources.update', $resource->id], 'method' => 'PUT', 'onsubmit' => 'preloader()', 'files' => 'true']) !!}
			                @else 
			                    {!! Form::open(['route' => 'resources.store', 'method' => 'POST', 'onsubmit' => 'preloader()', 'files' => 'true']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">subject</i>
				                        {!! Form::text('name', isset($resource)?$resource->name:null, ['class' => '', 'required', 'id' => 'name']) !!}
				                        <label for="name">Nombre del Recurso</label>
				                    </div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">dns</i>
				                        {!! Form::text('reference', isset($resource)?$resource->reference:null, ['class' => '', 'id' => 'reference']) !!}
				                        <label for="reference">Número de referencia</label>
				                    </div>
			                    </div>
			                    <div class="row">
									<div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">description</i>
										{!! Form::textArea('description', isset($resource)?$resource->description:null, ['class' => 'materialize-textarea', 'id' => 'description']) !!}
				                        <label for="description">Descripción</label>
									</div>
								</div>
								@include('admin.layouts.partials._images_alert_image')
								<div class="row">									
									<div class="file-field input-field col s12 m12 l12">
										<div class="btn btn-fgs-edit">
											<span>Imagen</span>
											<input id="image" type="file" name="image" value="{{isset($resource)?$resource->image:''}}">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Selecciona la imagen del recurso (Opcional)"">
										</div>
										<div class="center-align">
											<img id="image_container" src="{{isset($resource)?$resource->image:''}}" class="responsive-img img-preview-fgs"/>
										</div>
									</div>
								</div>
			                    <div class="row">
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">phonelink_off</i>
										<select id="resource_status_id" class="icons" name="resource_status_id">
											<option value="" disabled selected>Selecciona el Estado</option>
											@foreach($resourceStatuses as $status)
												@if(isset($resource))
													<option value="{{ $status->id }}" {{$status->id===$resource->status->id?'selected=selected':''}}>{{ $status->name }}</option>
												@else 
													<option value="{{ $status->id }}">{{ $status->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="resource_status_id">Estado del Recurso</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">tune</i>
										<select id="resource_type_id" class="icons" name="resource_type_id">
											<option value="" disabled selected>Selecciona el Tipo</option>
											@foreach($resourceTypes as $type)
												@if(isset($resource))
													<option value="{{ $type->id }}" {{$type->id===$resource->type->id?'selected=selected':''}}>{{ $type->name }}</option>
												@else 
													<option value="{{ $type->id }}">{{ $type->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="resource_type_id">Tipo de Recurso</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">device_hub</i>
										<select id="dependency_id" class="icons" name="dependency_id">
											<option value="" disabled selected>Selecciona la Dependencia</option>
											@foreach($dependencies as $dependency)
												@if(isset($resource))
													<option value="{{ $dependency->id }}" {{$dependency->id===$resource->dependency->id?'selected=selected':''}}>{{ $dependency->name }}</option>
												@else 
													<option value="{{ $dependency->id }}">{{ $dependency->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="dependency_id">Dependencia del Recurso</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">category</i>
										<select id="resource_category_id" class="icons" name="resource_category_id">
											<option value="" disabled selected>Selecciona la Categoria</option>
											@foreach($resourceCategories as $category)
												@if(isset($resource))
													<option value="{{ $category->id }}" {{$category->id===$resource->category->id?'selected=selected':''}}>{{ $category->name }}</option>
												@else 
													<option value="{{ $category->id }}">{{ $category->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="resource_category_id">Categoria del Recurso</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">device_unknown</i>
										<select id="physical_state_id" class="icons" name="physical_state_id">
											<option value="" disabled selected>Selecciona el Estado Físico</option>
											@foreach($physicalStates as $state)
												@if(isset($resource))
													<option value="{{ $state->id }}" {{$state->id===$resource->physicalState->id?'selected=selected':''}}>{{ $state->name }}</option>
												@else 
													<option value="{{ $state->id }}">{{ $state->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="physical_state_id">Estado Físico del Recurso</label>
									</div>
				                </div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('resources.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del Recurso?')">Cancelar</a>              
			                      @if(isset($resource))
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

		function preloader(){
			Materialize.toast('Cargando recursos, este proceso puede tardar un poco', 2000, 'orange darken-1');
			$('#postulation-btn').hide();
			$('.postulation-btn').hide();
			$('#postulate-preloader').show();
		}
	</script>						
@endsection