@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($headquarter))
								<p class="caption-title center-align">Editar Sede</p>
							@else 
			               		<p class="caption-title center-align">Crear nueva Sede</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($headquarter))
			                    {!! Form::open(['route' => ['headquarters.update', $headquarter->id], 'method' => 'PUT', 'onsubmit' => 'preloader()']) !!}
			                @else 
			                    {!! Form::open(['route' => 'headquarters.store', 'method' => 'POST', 'onsubmit' => 'preloader()']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">subject</i>
				                        {!! Form::text('name', isset($headquarter)?$headquarter->name:null, ['class' => '', 'required', 'id' => 'name']) !!}
				                        <label for="name">Nombre de la Sede</label>
				                    </div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">place</i>
				                        {!! Form::text('address', isset($headquarter)?$headquarter->address:null, ['class' => '', 'required', 'id' => 'address']) !!}
				                        <label for="address">Dirección de la Sede</label>
				                    </div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">public</i>
										<select id="departament_id" class="icons" name="departament_id">
											<option value="" disabled selected>Selecciona el Departamento</option>
											@foreach($departaments as $departament)
												@if(isset($headquarter))
													@if($headquarter->town)
														<option value="{{ $departament->id }}" {{$departament->id===$headquarter->town->departament->id?'selected=selected':''}}>{{ $departament->name }}</option>
													@endif
												@else 
													<option value="{{ $departament->id }}">{{ $departament->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="departament_id">Departamento del Usuario</label>
									</div>
									<div id="town_div" class="input-field col s12 m6 l6">
										<i class="material-icons prefix">place</i>
										<select id="town_id" class="icons" name="town_id">
											@if(isset($headquarter))
												@if($headquarter->town)
													@foreach($towns as $town)
														<option value="{{ $town->id }}" {{$town->id===$headquarter->town->id?'selected=selected':''}}>{{ $town->name }}</option>
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
			                        <a href="{{ route('headquarters.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación la Sede?')">Cancelar</a>              
			                      @if(isset($headquarter))
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