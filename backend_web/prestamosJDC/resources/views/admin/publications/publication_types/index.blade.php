@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'publication_types.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs ">
							<div class="input-field col s12 m10 l10 input-field-fgs">
								<i class="material-icons prefix">search</i>
								<input id="name" type="text" class="validate" name="name">
								<label class="label-search-fgs" for="icon_prefix">Buscar Categoria</label>
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
						{!! Form::open(['route' => 'publication_types.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Borrar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Borrar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea borrar las categorias seleccionadas?")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
						</div>
			     		<table class="highlight striped">
							<thead>
								<th>Nombre</th>
								<th class="center-align">Opciones</th>
							</thead>
							<tbody>
								@foreach($publication_types as $type)
								<tr>
									<td>{{ $type->name }}</td>
									<td class="td-fgs center-align">
										<?php $ids = [1, 2, 3] ?>
										@if(!in_array($type->id, $ids))
											<div class="btn multi_input_delete" style="display: none;">
												<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$type->id}}" value="{{$type->id}}"/>
	      										<label for="input_{{$type->id}}"></label>
											</div>
		                					{!! Form::close() !!}
											<a href="{{ route('publication_types.destroy', $type->id) }}" onclick="return confirm('¿Desea borrar el typea?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">delete</i></a>
											<a href="{{ route('publication_types.edit', $type->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit"><i class="material-icons">create</i></a>
										@else 
											<span class="center-align">El Item no es editable</span>
										@endif
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
	<?php $paginator = $publication_types; ?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')