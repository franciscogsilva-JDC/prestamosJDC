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
			                    {!! Form::open(['route' => ['resources.update', $resource->id], 'method' => 'POST', 'files' => 'true', 'onsubmit' => 'preloader()']) !!}
			                @else 
			                    {!! Form::open(['route' => ['resources.store', $resource_type_id], 'method' => 'POST', 'files' => 'true', 'onsubmit' => 'preloader()']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">insert_photo</i>
				                        {!! Form::text('title', isset($resource)?$resource->title:null, ['class' => '', 'required', 'id' => 'title']) !!}
				                        <label for="title">Titulo del Recurso</label>
				                    </div>
			                    </div>
			                    @if($resource_type_id == 1)
			                    	@if(!isset($resource))
					                    <div class="row">									
											<div class="file-field input-field col s12 m12 l12">
												<div class="btn btn-fgs-edit">
													<span>Imagenes</span>
													<input id="image" type="file" name="image[]" multiple value="">
												</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text" placeholder="Selecciona las imagenes del Recurso"">
												</div>
											</div>
											<div class="center-align">
												<div class="image_container" id="image_container"/>
													@if(isset($resource))
														<img src="{{isset($resource)?$resource->resource:''}}" class="responsive-img img-preview-fgs"/>
													@endif
												</div>
											</div>
										</div>
									@else
									<div class="row">									
										<div class="file-field input-field col s12 m12 l12">
											<div class="btn btn-fgs-edit">
												<span>Imagen</span>
												<input id="image_res" type="file" name="image_res" value="{{isset($resource)?$resource->resource:''}}">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text" placeholder="Selecciona la imagen"">
											</div>
											<div class="center-align">
												<img id="image_container_res" src="{{isset($resource)?$resource->resource:''}}" class="responsive-img img-preview-fgs"/>
											</div>
										</div>
									</div>
									@endif
								@elseif($resource_type_id == 2)
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">ondemand_video</i>
				                        {!! Form::text('resource', isset($resource)?$resource->resource:null, ['class' => '', 'required', 'id' => 'resource']) !!}
				                        <label for="resource">Url del video</label>
				                    </div>
								@elseif($resource_type_id == 3)
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">audiotrack</i>
				                        {!! Form::text('resource', isset($resource)?$resource->resource:null, ['class' => '', 'required', 'id' => 'resource']) !!}
				                        <label for="resource">Url del audio</label>
				                    </div>
			                    @endif
								<div class="input-field col s12 m12 l12">
			                        <i class="material-icons prefix">description</i>
									{!! Form::textArea('description', isset($resource)?$resource->description:null, ['class' => 'materialize-textarea', 'id' => 'description']) !!}
			                        <label for="description">Descripción</label>
								</div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('resources.index', $resource_type_id) }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del Recurso?')">Cancelar</a>              
			                      	@if(isset($resource))
			                        	{!! Form::submit('Editar', ['class' => 'btn waves-effect btn-fgs-edit postulation-btn', 'onclick' => 'return confirm("¿Esta seguro de Editar el Recurso?")', 'id' => 'postulation-btn']) !!}
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
		$(function() {
			// Multiple images preview in browser
			var imagesPreview = function(input, placeToInsertImagePreview) {
				if (input.files) {
					var filesAmount = input.files.length;
					for (i = 0; i < filesAmount; i++) {
						var reader = new FileReader();
						reader.onload = function(event) {
							$($.parseHTML('<img class="responsive-img img-preview-fgs-multiple image_container_js">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
						}
						reader.readAsDataURL(input.files[i]);
						if(i >= 50){
							alert('El sistema cargará un máximo de 50 Imagenes');
							break;
						}
					}
				}
			};

			$('#image').on('change', function() {
				$('.image_container_js').hide();
				imagesPreview(this, 'div.image_container');
			});

			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#image_container_res').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}	
			}

			$("#image_res").change(function() {
				readURL(this);
			});
		});

		function preloader(){
			Materialize.toast('Cargando recursos, este proceso puede tardar un poco', 2000, 'orange darken-1');
			$('#postulation-btn').hide();
			$('.postulation-btn').hide();
			$('#postulate-preloader').show();
		}
	</script>						
@endsection