@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'polls.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs ">
							<div class="input-field col s12 m10 l10 input-field-fgs">
								<i class="material-icons prefix">search</i>
								<input id="title" type="text" class="validate" name="title">
								<label class="label-search-fgs" for="icon_prefix">Buscar Encuesta</label>
							</div>
							<div class="valign-wrapper col s12 m2 l2 panel-send-fgs">
	                    		{!! Form::submit('Buscar', ['class' => 'btn btn-primary col s12 m12 l12']) !!}
							</div>
						</div>
	                {!! Form::close() !!}
	                <div class="row"></div>
				</div>
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						{!! Form::open(['route' => 'polls.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Borrar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Borrar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea borrar las encuestas seleccionadas?")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
						</div>
			     		<table class="highlight striped">
							<thead>
								<th id="td-logo"></th>
								<th>Titulo</th>
								<th>Estado</th>
								<th>Opciones</th>
							</thead>
							<tbody>
								@foreach($polls as $poll)
								<tr>
									<td id="td-logo">
										<img class="factory-logo-fgs responsive-img materialboxed" src="{{ $poll->image }}">
									</td>									
									<td>{{ $poll->title }}</td>									
									<td>{{ $poll->poll_status->name }}</td>
									<td class="td-fgs center-align">
										<div class="btn multi_input_delete" style="display: none;">
											<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$poll->id}}" value="{{$poll->id}}"/>
      										<label for="input_{{$poll->id}}"></label>
										</div>
	                					{!! Form::close() !!}
										<a href="{{ route('polls.destroy', $poll->id) }}" onclick="return confirm('¿Desea borrar la encuesta?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">delete</i></a>
										<a href="{{ route('polls.edit', $poll->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit"><i class="material-icons">create</i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
			        </div>
				</div>
			</div>
        </div>
    </div>
	<?php $paginator = $polls; ?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')