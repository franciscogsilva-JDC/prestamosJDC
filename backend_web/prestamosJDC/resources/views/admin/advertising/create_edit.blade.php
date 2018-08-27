@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($adv))
								<p class="caption-title center-align">Editar Publicidad</p>
							@else 
			               		<p class="caption-title center-align">Crear nueva Publicidad</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($adv))
			                    {!! Form::open(['route' => ['advertising.update', $adv->id], 'method' => 'PUT', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @else 
			                    {!! Form::open(['route' => 'advertising.store', 'method' => 'POST', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">monetization_on</i>
				                        {!! Form::text('title', isset($adv)?$adv->title:null, ['class' => '', 'required', 'id' => 'title']) !!}
				                        <label for="title">Titulo de la Publicidad</label>
				                    </div>
			                    </div>
								@include('admin.layouts.partials._images_alert')
			                    <div class="row">									
									<div class="file-field input-field col s12 m12 l12">
										<div class="btn btn-fgs-edit">
											<span>Banner</span>
											<input id="banner" type="file" name="banner" value="{{isset($adv)?$adv->banner:''}}">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Selecciona la Imagen de la Publicidad"">
										</div>
										<div class="center-align">
											<img id="banner_container" src="{{isset($adv)?$adv->banner:''}}" class="responsive-img img-preview-fgs"/>
										</div>
									</div>
								</div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('advertising.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación de la Publicidad?')" >Cancelar</a>              
			                      @if(isset($adv))
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
					$('#banner_container').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}	
		}

		$("#banner").change(function() {
			readURL(this);
		});
	</script>						
@endsection