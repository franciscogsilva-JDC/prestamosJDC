@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($publication_type))
								<p class="caption-title center-align">Editar Categoria</p>
							@else 
			               		<p class="caption-title center-align">Crear nueva Categoria</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section">
			                @if(isset($publication_type))
			                    {!! Form::open(['route' => ['publication_types.update', $publication_type->id], 'method' => 'PUT'], ['class' => 'form-container col s12 center-block']) !!}
			                @else 
			                    {!! Form::open(['route' => 'publication_types.store', 'method' => 'POST'], ['class' => 'form-container col s12 center-block']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">tune</i>
				                        {!! Form::text('name', isset($publication_type)?$publication_type->name:null, ['class' => '', 'required', 'id' => 'name']) !!}
				                        <label for="name">Titulo del Categoria</label>
				                    </div>
			                    </div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('publication_types.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación de la Categoria?')" >Cancelar</a>
			                      @if(isset($publication_type))
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