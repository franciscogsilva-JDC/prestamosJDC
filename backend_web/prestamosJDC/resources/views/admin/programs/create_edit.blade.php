@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($program))
								<p class="caption-title center-align">Editar Programa</p>
							@else 
			               		<p class="caption-title center-align">Crear nuevo Programa</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($program))
			                    {!! Form::open(['route' => ['programs.update', $program->id], 'method' => 'PUT', 'onsubmit' => 'preloader()']) !!}
			                @else 
			                    {!! Form::open(['route' => 'programs.store', 'method' => 'POST', 'onsubmit' => 'preloader()']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">subject</i>
				                        {!! Form::text('name', isset($program)?$program->name:null, ['class' => '', 'required', 'id' => 'name']) !!}
				                        <label for="name">Nombre del Programa</label>
				                    </div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">school</i>
										<select id="program_type_id" class="icons" name="program_type_id">
											<option value="" disabled selected>Selecciona el Tipo</option>
											@foreach($programTypes as $type)
												@if(isset($program))
													<option value="{{ $type->id }}" {{$type->id===$program->type->id?'selected=selected':''}}>{{ $type->name }}</option>
												@else 
													<option value="{{ $type->id }}">{{ $type->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="program_type_id">Tipo de Programa</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">device_hub</i>
										<select id="dependency_id" class="icons" name="dependency_id">
											<option value="" disabled selected>Selecciona la Dependencia</option>
											@foreach($dependencies as $dependency)
												@if(isset($program))
													<option value="{{ $dependency->id }}" {{$dependency->id===$program->dependency->id?'selected=selected':''}}>{{ $dependency->name }}</option>
												@else 
													<option value="{{ $dependency->id }}">{{ $dependency->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="dependency_id">Dependencia del Programa</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">brightness_4</i>
										<select class="icons" name="workingDays[]" multiple>
											<option value="" disabled selected>Selecciona la/las Jornadas</option>
											@foreach($workingDays as $working)
												@if(isset($program))
													<option value="{{ $working->id }}" {{in_array($working->id, $program->workingDays->pluck('id')->ToArray())?'selected=selected':''}}>{{ $working->name }}</option>
												@else
													<option value="{{ $working->id }}">{{ $working->name }}</option>		
												@endif
											@endforeach
										</select>
										<label for="workingDays">Jornadas</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">local_library</i>
										<select class="icons" name="modalities[]" multiple>
											<option value="" disabled selected>Selecciona la/las Modalidades</option>
											@foreach($modalities as $modality)
												@if(isset($program))
													<option value="{{ $modality->id }}" {{in_array($modality->id, $program->modalities->pluck('id')->ToArray())?'selected=selected':''}}>{{ $modality->name }}</option>
												@else
													<option value="{{ $modality->id }}">{{ $modality->name }}</option>		
												@endif
											@endforeach
										</select>
										<label for="modalities">Modalidades</label>
									</div>
				                </div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('programs.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del Programa?')">Cancelar</a>              
			                      @if(isset($program))
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