@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($building))
								<p class="caption-title center-align">Editar Edificio</p>
							@else 
			               		<p class="caption-title center-align">Crear nuevo Edificio</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($building))
			                    {!! Form::open(['route' => ['buildings.update', $building->id], 'method' => 'PUT', 'onsubmit' => 'preloader()']) !!}
			                @else 
			                    {!! Form::open(['route' => 'buildings.store', 'method' => 'POST', 'onsubmit' => 'preloader()']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">location_city</i>
				                        {!! Form::text('name', isset($building)?$building->name:null, ['class' => '', 'required', 'id' => 'name']) !!}
				                        <label for="name">Nombre del Edificio</label>
				                    </div>
				                    <div class="input-field col s12 m6 l6">
				                        <i class="material-icons prefix">text_rotation_none</i>
				                        {!! Form::text('nomenclature', isset($building)?$building->nomenclature:null, ['class' => '', 'required', 'id' => 'nomenclature']) !!}
				                        <label for="nomenclature">Nomenclatura del Edificio</label>
				                    </div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">place</i>
										<select id="headquarter_id" class="icons" name="headquarter_id">
											<option value="" disabled selected>Selecciona la sede</option>
											@foreach($headquarters as $headquarter)
												@if(isset($building))
													<option value="{{ $headquarter->id }}" {{$headquarter->id===$building->headquarter->id?'selected=selected':''}}>{{ $headquarter->name }}</option>
												@else 
													<option value="{{ $headquarter->id }}">{{ $headquarter->name }}</option>
												@endif
											@endforeach
										</select>
										<label for="headquarter_id">Sede del edificio</label>
									</div>
				                </div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('buildings.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del Edificio?')">Cancelar</a>              
			                      @if(isset($building))
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