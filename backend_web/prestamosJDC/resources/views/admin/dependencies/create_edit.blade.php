@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($dependency))
								<p class="caption-title center-align">Editar Dependencia</p>
							@else 
			               		<p class="caption-title center-align">Crear nueva Dependencia</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($dependency))
			                    {!! Form::open(['route' => ['dependencies.update', $dependency->id], 'method' => 'PUT', 'onsubmit' => 'preloader()']) !!}
			                @else 
			                    {!! Form::open(['route' => 'dependencies.store', 'method' => 'POST', 'onsubmit' => 'preloader()']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">subject</i>
				                        {!! Form::text('name', isset($dependency)?$dependency->name:null, ['class' => '', 'required', 'id' => 'name']) !!}
				                        <label for="name">Nombre de la Dependencia</label>
				                    </div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">mail_outline</i>
				                        {!! Form::email('email', isset($dependency)?$dependency->email:null, ['class' => '', 'required', 'id' => 'email']) !!}
				                        <label for="email">Email de la Dependencia</label>
				                    </div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">location_city</i>
										<select id="headquarter_id" class="icons" name="headquarter_id">
											<option value="" disabled selected>Selecciona la Sede</option>
											@foreach($headquarters as $headquarter)
												@if(isset($dependency))
													<option value="{{ $headquarter->id }}" {{$headquarter->id===$dependency->headquarter->id?'selected=selected':''}}>{{ $headquarter->name }}</option>
												@else 
													<option value="{{ $headquarter->id }}">{{ $headquarter->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="headquarter_id">Sede de la Dependencia</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">supervisor_account</i>
										<select class="icons" name="attendants[]" multiple>
											<option value="" disabled selected>Selecciona el/las Responsables</option>
											@foreach($attendants as $user)
												@if(isset($dependency))
													<option value="{{ $user->id }}" data-icon="{{ $user->image_thumbnail }}" class="rigth circle" {{in_array($user->id, $dependency->attendants->pluck('id')->ToArray())?'selected=selected':''}}>{{ $user->name }}</option>
												@else
													<option value="{{ $user->id }}" data-icon="{{ $user->image_thumbnail }}" class="rigth circle" >{{ $user->name }}</option>		
												@endif
											@endforeach
										</select>
										<label for="attendants">Responsables</label>
									</div>
				                </div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('dependencies.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación la Dependencia?')">Cancelar</a>              
			                      @if(isset($dependency))
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
		function preloader(){
			Materialize.toast('Cargando recursos, este proceso puede tardar un poco', 2000, 'orange darken-1');
			$('#postulation-btn').hide();
			$('.postulation-btn').hide();
			$('#postulate-preloader').show();
		}
	</script>						
@endsection