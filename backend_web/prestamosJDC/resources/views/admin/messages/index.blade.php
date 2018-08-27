@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-search-fgs">
					@include('admin.layouts.partials._messages')					
					{!! Form::open(['route' => 'messages.index', 'method' => 'GET'], ['class' => '']) !!}
						<div class="row row-search-fgs">
							<div class="file-field input-field col s12 m12 l9 input-search-fgs">
								<div class="file-path-wrapper path-wrapper-fgs center-text">
									<input id="content" type="text" class="validate" name="content">
									<label class="label-search-fgs" for="icon_prefix">Buscar Mensaje</label>
								</div>
							</div>
		                    	{!! Form::submit('Buscar', ['class' => 'btn btn-search-fgs col s10 m11 l2 btn-fgs-edit']) !!}
							<div id="btn-filters" class="btn col s2 m1 l1 btn-fgs-filter center-align btn-fgs-edit">
								<span class="center-align"><i class="material-icons icon-filter">keyboard_arrow_down</i></span>
							</div>
						</div>
						<div class="section section-form">
                        	<div class="row" id="panel-filters">
								<div class="input-field col s12 m12 l12">
									<i class="material-icons prefix">tune</i>
									<select id="readed" name="readed">
										<option value="" disabled selected>Selecciona un Estado</option>
										<option value="true">Leido</option>
										<option value="false">No Leido</option>
									</select>
									<label for="sector_id">Filtrar por Estado</label>
								</div>
                        	</div>
                        </div>
	                {!! Form::close() !!}
				</div>
				<div class="card-panel card-panel-table-factories">
					<div class="card-content">
						{!! Form::open(['route' => 'messages.multi_destroy', 'method' => 'POST'], ['class' => '']) !!}
						<div class="row row-delete-all">							
							<div class="btn red darken-3 right" id="multipleDelete" onclick="multiDelete()">Borrar Varios</div>							
							<div class="btn red darken-3 right cancel_multipleDelete" id="cancel_multipleDelete" onclick="cancel_multipleDelete()" style="display: none;"><i class="material-icons">clear</i></div>
							{!! Form::submit('Borrar', ['class' => 'btn red darken-3 right', 'onclick' => 'return confirm("¿Desea borrar los mensajes seleccionados?")', 'id' => 'multiDeleteAction', 'style' => 'display: none;']) !!}	
						</div>
			     		<table class="highlight striped">
							<thead>
								<th>Mensaje</th>
								<th id="td-sector" class="th-status-fgs">Estado</th>
								<th class="th-status-fgs">Opciones</th>
							</thead>
							<tbody>
								@foreach($messages_all as $message)
								<tr>
									<td>
										<div id="td-span">
											@if($message->readed == false)
												<span class="badge badge-status-factory center-text red darken-1">No Leido</span>
											@else 
												<span class="badge grey badge-status-factory center-text">Leido</span>
											@endif
											<br>
											<br>
										</div>
										<b>Nombre:</b> {{ $message->name }}
										<br>
										<b>Correo:</b> {{ $message->email }}
										<br>
										<b>Enviado:</b> {{ $message->created_at != null ? ucwords($message->created_at->format('F d\\, Y')) : ' Sin Fecha ' }}
										<br>
										<br>
										{!! $message->message = str_limit($message->message, 200) !!}
										<br>
										<a href="{{ route('messages.show', $message->id) }}">Continuar leyendo</a>
									</td>
									<td id="td-sector">
										@if($message->readed == false)
											<span class="badge red darken-1 badge-status-factory center-text">No Leido</span>
										@else 
											<span class="badge grey badge-status-factory center-text">Leido</span>
										@endif
									</td>
									<td class="td-fgs center-text">
										<div class="btn multi_input_delete" style="display: none;">
											<input name="items_to_delete[]" type="checkbox" class="filled-in filled-in-fgs" id="input_{{$message->id}}" value="{{$message->id}}"/>
      										<label for="input_{{$message->id}}"></label>
										</div>
	                					{!! Form::close() !!}
										<a href="{{ route('messages.destroy', $message->id) }}" onclick="return confirm('¿Desea borrar la noticia?')" class="btn btn-fgs btn-fgs-delete red darken-3"><i class="material-icons">delete</i></a>
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
	<?php $paginator = $messages_all; ?>
    @include('admin.layouts.partials._paginator')
@endsection()

@include('admin.layouts.partials._js_filters')
