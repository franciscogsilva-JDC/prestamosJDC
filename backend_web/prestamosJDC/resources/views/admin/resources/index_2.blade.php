@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => ['resources.index', $resource_type_id], 'method' => 'GET']) !!}
						<div class="row row-search-fgs ">
							<div class="input-field col s12 m10 l10 input-field-fgs">
								<i class="material-icons prefix">search</i>
								<input id="title" type="text" class="validate" name="title">
								<label class="label-search-fgs" for="icon_prefix">Buscar Recurso</label>
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
						{!! Form::open(['route' => ['resources.multi_destroy', $resource_type_id], 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Borrar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Borrar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea borrar los recursos seleccionados?")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
							</div>
							<div class="row">
								@foreach($resource as $res)
									<div class="col s12 m6 l6">
										<div class="card">
											<div class="card-image">
												<div class="video-container center-align">
													<iframe width="853" height="480" src="{{ $res->embed_video }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
												</div>
												<span class="card-title">{{ $res->title }}</span>
											</div>
											<div class="card-content">
												<p>{{ $res->description }}</p>
											</div>
											<div class="card-action center-align card-action-audio">
												<div class="btn multi_input_delete" style="display: none;">
													<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$res->id}}" value="{{$res->id}}"/>
													<label for="input_{{$res->id}}"></label>
												</div>
												{!! Form::close() !!}
												<a href="{{ route('resources.destroy', [$res->id, $resource_type_id]) }}" onclick="return confirm('¿Desea borrar el resa?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">delete</i></a>
												<a href="{{ route('resources.edit', $res->id) }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit"><i class="material-icons">create</i></a>
											</div>
										</div>
									</div>
								@endforeach	
							</div>
						</div>						
			        </div>
				</div>
			</div>
        </div>
    </div>
	<?php $paginator = $resource; ?>
    @include('admin.layouts.partials._paginator')
    @include('admin.layouts.partials._fixed_button_create')
@endsection()

@include('admin.layouts.partials._js_filters')