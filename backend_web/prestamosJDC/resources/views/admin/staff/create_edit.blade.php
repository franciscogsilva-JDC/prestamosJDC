@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($user))
								<p class="caption-title center-align">Editar Usuario</p>
							@else 
			               		<p class="caption-title center-align">Crear nuevo Usuario</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($user))
			                    {!! Form::open(['route' => ['staff.update', $user->id], 'method' => 'PUT', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @else 
			                    {!! Form::open(['route' => 'staff.store', 'method' => 'POST', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">people</i>
				                        {!! Form::text('name', isset($user)?$user->name:null, ['class' => '', 'required', 'id' => 'name']) !!}
				                        <label for="name">Nombre</label>
				                    </div>	
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">email</i>
				                        {!! Form::email('email', isset($user)?$user->email:null, ['class' => '', 'id' => 'email']) !!}
				                        <label for="email">Correo Electronico</label>
				                    </div>
			                    </div>
								@include('admin.layouts.partials._images_alert_profile')
								<div class="row">									
									<div class="file-field input-field col s12 m12 l12">
										<div class="btn btn-fgs-edit">
											<span>Imagen</span>
											<input id="profile_image" type="file" name="profile_image" value="{{isset($user)?$user->profile_image:''}}">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Selecciona la imagen del usuario"">
										</div>
										<div class="center-align">
											<img id="profile_image_container" src="{{isset($user)?$user->profile_image:''}}" class="responsive-img img-preview-fgs"/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12 l12">
			                        <span class="txt-title">Descripción</span>
										{!! Form::textArea('description', isset($user)?$user->description:null, ['class' => 'textArea_description', 'required', 'id' => 'description']) !!}
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12 l12">
										<i class="material-icons prefix">school</i>
										<select id="position_id" class="icons" name="position_id">
											<option value="" disabled selected>Selecciona el cargo del usuario</option>
											@foreach($positions as $position)
												@if(isset($user))
													<option value="{{ $position->id }}" {{($position->id===$myPosition->id)?'selected=selected':''}}>{{ $position->name }}</option>
												@else 
													<option value="{{ $position->id }}">{{ $position->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="position_id">Cargo del Usuario</label>
									</div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="fa fa-fw fa-facebook prefix"></i>
				                        {!! Form::text('facebook_url', isset($user)?$user->facebook_url:null, ['class' => '', 'id' => 'facebook_url']) !!}
				                        <label for="facebook_url">URl Facebook</label>
				                    </div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="fa fa-fw fa-twitter prefix"></i>
				                        {!! Form::text('twitter_url', isset($user)?$user->twitter_url:null, ['class' => '', 'id' => 'twitter_url']) !!}
				                        <label for="twitter_url">URl Twitter</label>
				                    </div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="fa fa-fw fa-instagram prefix"></i>
				                        {!! Form::text('instagram_url', isset($user)?$user->instagram_url:null, ['class' => '', 'id' => 'instagram_url']) !!}
				                        <label for="instagram_url">URl Instagram</label>
				                    </div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="fa fa-fw fa-linkedin prefix"></i>
				                        {!! Form::text('linkedin_url', isset($user)?$user->linkedin_url:null, ['class' => '', 'id' => 'linkedin_url']) !!}
				                        <label for="linkedin_url">URl Linkedin</label>
				                    </div>	
								</div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('staff.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del usuario?')" >Cancelar</a>              
			                      @if(isset($user))
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
					$('#profile_image_container').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}	
		}

		$("#profile_image").change(function() {
			readURL(this);
		});

    	$('.textArea_description').trumbowyg();
	</script>						
@endsection