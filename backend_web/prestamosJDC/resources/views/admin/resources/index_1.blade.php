@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">
			<div class="card-panel card-panel-search-fgs">	
				@include('admin.layouts.partials._messages')				
				{!! Form::open(['route' => ['resources.index', $resource_type_id], 'method' => 'GET']) !!}
					<div class="row row-search-fgs">
						<div class="input-field col s12 m10 l10 input-field-fgs">
							<i class="material-icons prefix">search</i>
							<input id="title" type="text" class="validate" name="title">
							<label class="label-search-fgs" for="icon_prefix">Buscar {{ $title_page }}</label>
						</div>
						<div class="valign-wrapper col s12 m2 l2 panel-send-fgs">
                    		{!! Form::submit('Buscar', ['class' => 'btn btn-primary col s12 m12 l12']) !!}
						</div>
					</div>
					<br>
					<br>
                {!! Form::close() !!}
			</div>
            {!! Form::open(['route' => ['resources.multi_destroy', $resource_type_id], 'method' => 'POST', 'class' => '']) !!}
				<div class="row row-delete-all form-del-all">							
					<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Borrar Varios</div>							
					<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
					{!! Form::submit('Borrar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea borrar las imagenes seleccionadas?")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
				</div>
				<div class="row cards-container row-img">
					@foreach($resource as $image)
						<div class="col-img">
							<div class="col-buttons-img">								
								<div class="btn multi_input_delete z-depth-2" style="display: none;">
									<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$image->id}}" value="{{$image->id}}"/>
										<label for="input_{{$image->id}}"></label>
								</div>
								{!! Form::close() !!}
								<a href="{{ route('resources.destroy', [$image->id, $resource_type_id]) }}" onclick="return confirm('¿Desea borrar la imagen?')" class="btn btn-fgs btn-fgs-delete red darken-3 z-depth-2"><i class="material-icons">delete</i></a>
								<a href="{{ route('resources.edit', $image->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit z-depth-2"><i class="material-icons">create</i></a>
							</div>						
							<img class="responsive-img" src="{{ $image->resource }}" data-caption="{{ $image->title }}">
						</div>
					@endforeach
				</div>
        </div>
    </div>
	<?php $paginator = $resource; ?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')