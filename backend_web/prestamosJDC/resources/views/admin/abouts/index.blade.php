@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">
							<p class="caption-title center-align">Editar Acerca de</p>
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
		                    {!! Form::open(['route' => ['abouts.update', $about->id], 'method' => 'PUT', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
								<div class="row">
									<div class="input-field col s12 m12 l12">
			                        	<span class="txt-title">Misión</span>
										{!! Form::textArea('mission', isset($about)?$about->mission:null, ['class' => 'textArea_content', 'required', 'id' => 'mission']) !!}
									</div>
									<div class="input-field col s12 m12 l12">
			                        	<span class="txt-title">Visión</span>
										{!! Form::textArea('vision', isset($about)?$about->vision:null, ['class' => 'textArea_content', 'required', 'id' => 'vision']) !!}
									</div>
									<div class="input-field col s12 m12 l12">
			                        	<span class="txt-title">Objetivos</span>
										{!! Form::textArea('objectives', isset($about)?$about->objectives:null, ['class' => 'textArea_content', 'required', 'id' => 'objectives']) !!}
									</div>
								</div>
			                    <div class="buttonpanel-edit center-align">
			                        {!! Form::submit('Editar', ['class' => 'btn waves-effect btn-fgs-edit']) !!}
			                    </div>
			                {!! Form::close() !!}
							<div class="row"></div>
			            </div>
			        </div>
				</div>
			</div>
        </div>
    </div>
@endsection()

@section('js')
	<script>
    	$('.textArea_content').trumbowyg({
		    removeformatPasted: true
		});
	</script>
@endsection