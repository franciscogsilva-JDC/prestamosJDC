@extends('front.layouts.front_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">
			            	<p class="caption-title center-align">Perfil</p>
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			            	{!! Form::open(['route' => ['users-front.update'], 'method' => 'PUT', 'onsubmit' => 'preloader()', 'files' => 'true']) !!}
			                	<div class="row">
				                    <div class="input-field col s12 m6 l12">
				                        <i class="material-icons prefix">subject</i>
				                        {!! Form::text('name', isset($user)?$user->name:null, ['class' => '', 'required', 'id' => 'name', 'disabled' => 'disabled']) !!}
				                        <label for="name">Nombre del Usuario  <span class="required-input">*</span></label>
				                    </div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">email</i>
				                        {!! Form::email('email', isset($user)?$user->email:null, ['class' => '', 'id' => 'email', 'required', 'disabled' => 'disabled']) !!}
				                        <label for="email">Correo Electronico  <span class="required-input">*</span></label>
				                    </div>
				                    <div class="input-field col s12 m6 l6 external-user">
				                        <i class="material-icons prefix">phone</i>
				                        {!! Form::number('cellphone_number', isset($user)?$user->cellphone_number:null, ['class' => '', 'required', 'id' => 'cellphone_number', 'min' => '100']) !!}
				                        <label for="cellphone_number">Número Telefonico  <span class="required-input">*</span></label>
				                    </div> 
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">layers</i>
										<select id="dni_type_id" class="icons" name="dni_type_id">
											<option value="" disabled selected>Selecciona el Tipo de Documento</option>
											@foreach($dniTypes as $type)
												@if(isset($user))
													<option value="{{ $type->id }}" {{$type->id===$user->dniType->id?'selected=selected':''}}>{{ $type->name }}</option>
												@else
													<option value="{{ $type->id }}" {{old('dni_type_id')==$type->id?'selected=selected':''}}>{{ $type->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="dni_type_id">Tipo de Documento <span class="required-input">*</span></label>
									</div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">credit_card</i>
				                        {!! Form::number('dni', isset($user)?$user->dni:null, ['class' => '', 'id' => 'dni', 'min' => '0', 'required']) !!}
				                        <label for="dni">Número de documento <span class="required-input">*</span></label>
				                    </div>
			                    </div>
								@include('admin.layouts.partials._images_alert_image')
								<div class="row">									
									<div class="file-field input-field col s12 m12 l12">
										<div class="btn btn-fgs-edit">
											<span>Imagen</span>
											<input id="image" type="file" name="image" value="{{isset($user)?$user->image:''}}">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Selecciona la imagen del Usuario (Opcional)"">
										</div>
										<div class="center-align">
											<img id="image_container" src="{{isset($user)?$user->image:''}}" class="responsive-img img-preview-fgs"/>
										</div>
									</div>
								</div>
			                    <div class="row">
				                    <div id="company_name_div" class="input-field col s12 m6 l6 external-user" style="display: none;">
				                        <i class="material-icons prefix">account_balance</i>
				                        {!! Form::text('company_name', isset($user)?$user->company_name:null, ['class' => '', 'id' => 'company_name']) !!}
				                        <label for="company_name">Nombre de Empresa</label>
				                    </div>
				                    <div id="semester_div"  class="input-field col s12 m6 l6 student-user" style="display: none;">
				                        <i class="material-icons prefix">school</i>
				                        {!! Form::number('semester', isset($user)?$user->semester:null, ['class' => '', 'id' => 'semester', 'min' => '1']) !!}
				                        <label for="semester">Semestre del Usuario</label>
				                    </div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">wc</i>
										<select id="gender_id" class="icons" name="gender_id">
											<option value="" disabled selected>Selecciona el Genero</option>
											@foreach($genders as $gender)
												@if(isset($user))
													<option value="{{ $gender->id }}" {{$gender->id===$user->gender->id?'selected=selected':''}}>{{ $gender->name }}</option>
												@else 
													<option value="{{ $gender->id }}" {{old('gender_id')==$gender->id?'selected=selected':''}}>{{ $gender->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="gender_id">Genero del Usuario <span class="required-input">*</span></label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">public</i>
										<select id="departament_id" class="icons" name="departament_id">
											<option value="" disabled selected>Selecciona el Departamento</option>
											@foreach($departaments as $departament)
												@if(isset($user))
													@if($user->town)
														<option value="{{ $departament->id }}" {{$departament->id===$user->town->departament->id?'selected=selected':''}}>{{ $departament->name }}</option>
													@endif
												@else 
													<option value="{{ $departament->id }}" {{old('departament_id')==$departament->id?'selected=selected':''}}>{{ $departament->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="departament_id">Departamento del Usuario</label>
									</div>
									<div id="town_div" class="input-field col s12 m6 l6">
										<i class="material-icons prefix">place</i>
										<select id="town_id" class="icons" name="town_id">
											@if(isset($user))
												@if($user->town)
													@foreach($towns as $town)
														<option value="{{ $town->id }}" {{$town->id===$user->town->id?'selected=selected':''}}>{{ $town->name }}</option>
													@endforeach
												@endif 
											@else
												<option value="" disabled selected>Primero Selecciona un Departamento</option>
											@endif
										</select>
										<label for="town_id">Municipio del Usuario</label>
									</div>
				                </div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('welcome') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del Usuario?')">Cancelar</a>
			                        {!! Form::submit('Editar', ['class' => 'btn waves-effect btn-fgs-edit postulation-btn', 'id' => 'postulation-btn']) !!}
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
			Materialize.toast('Cargando Usuarios, este proceso puede tardar un poco', 2000, 'orange darken-1');
			$('#postulation-btn').hide();
			$('.postulation-btn').hide();
			$('#postulate-preloader').show();
		}

		$('#user_type_id').on('change', function(){
			if($('#user_type_id option:selected').val() == "5"){
				$('#company_name_div').show();
				$('#dependency_div').hide();
			}else{
				$('#company_name_div').hide();
				$('#dependency_div').show();
			}

			if($('#user_type_id option:selected').val() == "3"){
				$('#semester_div').show();
			}else{
				$('#semester_div').hide();
			}

			if($('#user_type_id option:selected').val() == "4" || $('#user_type_id option:selected').val() == "1"){
				$('#dependencies_div').show();
			}else{
				$('#dependencies_div').hide();
			}
		});

		$('#departament_id').change(function(){
			$.get("{{ route('cities') }}",
			{ departament_id: $(this).val() },
			function(data) {
				$('#town_id').empty();
	          	$('#town_id').append("<option value='' disabled selected>Selecciona un Municipio</option>");
				$.each(data, function(key, element) {
					$('#town_id').append("<option value='" + key + "'>" + element + "</option>");
				});
				$('select').material_select();
			});
		});
	</script>						
@endsection