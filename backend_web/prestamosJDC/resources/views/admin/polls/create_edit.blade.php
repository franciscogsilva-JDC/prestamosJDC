@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">              
							@if(isset($poll))
								<p class="caption-title center-align">Editar encuesta</p>
							@else 
			               		<p class="caption-title center-align">Crear nueva encuesta</p>
							@endif
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
			                @if(isset($poll))
			                    {!! Form::open(['route' => ['polls.update', $poll->id], 'method' => 'PUT', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @else 
			                    {!! Form::open(['route' => 'polls.store', 'method' => 'POST', 'files' => 'true'], ['class' => 'form-container col s12 center-block']) !!}
			                @endif
			                	<div class="row">
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">sort</i>
				                        {!! Form::text('title', isset($poll)?$poll->title:null, ['class' => '', 'required', 'id' => 'title']) !!}
				                        <label for="title">Titulo de la encuesta</label>
				                    </div>
				                    <div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">trending_up</i>
				                        {!! Form::text('poll_question', isset($poll)?$poll->poll_question:null, ['class' => '', 'required', 'id' => 'poll_question']) !!}
				                        <label for="poll_question">Pregunta de la Encuesta</label>
				                    </div>
				                </div>
								@include('admin.layouts.partials._images_alert_image')
								<div class="row">									
									<div class="file-field input-field col s12 m12 l12">
										<div class="btn btn-fgs-edit">
											<span>Imagen</span>
											<input id="image" type="file" name="image" value="{{isset($poll)?$poll->image:''}}">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Selecciona la imagen de la encuesta"">
										</div>
										<div class="center-align">
											<img id="image_container" src="{{isset($poll)?$poll->image:''}}" class="responsive-img img-preview-fgs"/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m12 l12">
				                        <i class="material-icons prefix">description</i>
										{!! Form::textArea('description', isset($poll)?$poll->description:null, ['class' => 'materialize-textarea', 'required', 'id' => 'description']) !!}
				                        <label for="description">Descripción</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">event_busy</i>
										@if(isset($poll))
											@if($poll->end_date != null)
												<input type="text" class="datepicker" id="end_date" name="end_date" value="{{ $poll->end_date->toDateString() }}">
											@else
												<input type="text" class="datepicker" id="end_date" name="end_date">
											@endif
										@else
											<input type="text" class="datepicker" id="end_date" name="end_date">
										@endif
										<label for="end_date">Fecha de Cierre</label>
									</div>
									<div class="input-field col s12 m6 l6">
										<i class="material-icons prefix">query_builder</i>
										@if(isset($poll))
											@if($poll->end_date != null)
												<input type="text" class="timepicker" id="end_time" name="end_time" value="{{ $poll->end_date->format('h:i A') }}">
											@else
												<input type="text" class="timepicker" id="end_time" name="end_time">
											@endif
										@else
											<input type="text" class="timepicker" id="end_time" name="end_time">
										@endif
										<label for="end_time">Hora de Cierre</label>
									</div>
								</div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('polls.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la creación del encuesta?')" >Cancelar</a>              
			                      @if(isset($poll))
			                        {!! Form::submit('Editar', ['class' => 'btn waves-effect btn-fgs-edit']) !!}
			                      @else 
			                        {!! Form::submit('Crear y Agregar Respuestas', ['class' => 'btn waves-effect btn-fgs-edit']) !!}
			                      @endif
			                    </div>
			                {!! Form::close() !!}
							<div class="row"></div>
							<div class="row"></div>
							@if(isset($poll))
				                <div class="section">
									<p class="caption-title center-align">Agregar respuestas a:</p>
									<p class="center-align">{{ $poll->title }}</p>
					            </div>
					            <div class="section ">
				                    {!! Form::open(['route' => 'responses.store', 'method' => 'POST']) !!}
										{{ csrf_field() }}
					                    <div class="input-field col s12 m12 l12">
					                        <i class="material-icons prefix">sort</i>
					                        {!! Form::text('question', null, ['class' => '', 'required', 'id' => 'question']) !!}
					                        <label for="title">Respuesta</label>
					                    </div>
					                    <div class="row center-align">
					                    	{!! Form::submit('Agregar', ['class' => 'btn waves-effect btn-fgs-edit', 'id' => 'create_response_btn']) !!}
					                    </div>
					                {!! Form::close() !!}
									<div id="modal_update" class="modal modal-fixed-footer">
				                    	{!! Form::open() !!}
											<div class="modal-content">
												<p class="caption-title center-align">Editar respuesta</p>
							                    <div class="input-field col s12 m12 l12">
							                        <i class="material-icons prefix">sort</i>
							                        {!! Form::text('question', null, ['class' => '', 'required', 'id' => 'response_to_edit']) !!}
							                        <label for="title">Respuesta</label>
							                    </div>
					                    		<input type="hidden" name="id" id="id_edit">
											</div>
											<div class="modal-footer">
					                    		{!! Form::submit('Editar', ['class' => 'btn waves-effect btn-fgs-edit', 'id' => 'edit_response_btn']) !!}
											</div>
					                	{!! Form::close() !!}
									</div>
									@if(isset($poll))							
										<div class="row center-align">
											<table class="highlight striped" id="table_responses">
												<thead>
													<th class="center-align">Respuesta</th>
													<th id="td-logo" class="center-align">Votos</th>
													<th class="center-align">Opciones</th>
												</thead>
												<tbody>
													@if(isset($poll->questions))
														@foreach($poll->questions as $i => $response)
														<tr id="{{ $response->id }}">
															<td class="center-align">{{ $response->question }}</td>
															<td id="td-logo" class="center-align">{{ $response->votes }}</td>
															<td class="td-fgs center-align">
																<button onclick="response_delete_btn('{{ $response->id }}')" class='btn btn-fgs btn-fgs-delete red darken-3'><i class='material-icons'>delete</i></button>
																<button onclick="response_edit_btn('{{ $response->id }}')" class='btn btn-raised btn-primary btn-fgs btn-fgs-edit'><i class='material-icons'>create</i></button>
															</td>
														</tr>
														@endforeach
													@endif
												</tbody>
											</table>
										</div>
									@endif
									<div class="row"></div>
					            </div>
							@endif       
			            </div>
			        </div>
				</div>
			</div>
        </div>
    </div>
@endsection()

@section('js')
	<script type="text/javascript">
        $('.timepicker').pickatime();
        
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#image_container').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}	
		}

		$("#image").change(function() {
			readURL(this);
		});

		var _token = '';

		$('#create_response_btn').on('click', function(event){
			event.preventDefault();
			var response 	=	$('#question').val();
			var poll_id		=   "{{ isset($poll)?$poll->id:'' }}";
			var url_sent	=   $(this).closest('form').attr('action');
			_token			=	$(this).closest('form').find("input[name=_token]").val();

			$.ajax({
				method  : 'POST',
				url     : url_sent,
				data    : {response:response, poll_id:poll_id,  _token:_token},
				success : function(response) {
					if(response.success == true){
						Materialize.toast('Respuesta cargada con exito', 2000, 'orange darken-1')
 						$('#table_responses > tbody:last-child').append("<tr id="+response.response.id+"><td class='center-align'>"+response.response.question+"</td><td id='td-logo' class='center-align'>"+response.response.votes+"</td><td class='td-fgs center-align'><button onclick='response_delete_btn("+response.response.id+")' class='btn btn-fgs btn-fgs-delete red darken-3'><i class='material-icons'>delete</i></button><button onclick='response_edit_btn("+response.response.id+")' class='btn btn-raised btn-primary btn-fgs btn-fgs-edit'><i class='material-icons'>create</i></button></td></tr>");
						$('#question').val('');
					}else{
						Materialize.toast('Error al procesar la solicitud', 4000, 'red darken-1')
					}
				},
				error : function(request, error) {
					if (arguments[2] == "Unauthorized") {
						window.location="{{URL::to('login')}}";
					}
				},
			}).done(function() {

			});
		});

	    function response_delete_btn(id){
			event.preventDefault();
	    	var url_sent = "{{ env('APP_URL') }}admin/responses/"+id+"/destroy";
			_token			=	$(this).closest('form').find("input[name=_token]").val();
	    	if (confirm('¿Desea borrar la respuesta?')) {
		    	$.ajax({
					method  : 'GET',
					url     : url_sent,
					data    : {_token:_token},
					success : function(response) {
						if(response.success == true){
							Materialize.toast('Respuesta eliminada con exito', 2000, 'orange darken-1')
	 						$('#'+id).hide();
						}else{
							Materialize.toast('Error al procesar la solicitud', 4000, 'red darken-1')
						}
					},
					error : function(request, error) {
						if (arguments[2] == "Unauthorized") {
							window.location="{{URL::to('login')}}";
						}
					},
				}).done(function() {

				});
			}
	    }

	    function response_edit_btn(id){
	    	var url_sent = "{{ env('APP_URL') }}admin/responses/"+id+"/edit";
			event.preventDefault();
	    	$.ajax({
				method  : 'GET',
				url     : url_sent,
				data    : {_token:_token},
				success : function(response) {
					if(response.success == true){
						$('#response_to_edit').val(response.response.question);
						$('#id_edit').val(response.response.id);
	    				$('#modal_update').modal('open');
					}else{
						Materialize.toast('Error al procesar la solicitud', 4000, 'red darken-1')
					}
				},
				error : function(request, error) {
					if (arguments[2] == "Unauthorized") {
						window.location="{{URL::to('login')}}";
					}
				},
			}).done(function() {

			});
	    }
			
	    $('#edit_response_btn').on('click', function(event){
			event.preventDefault();

	    	var url_sent = "{{ env('APP_URL') }}admin/responses/"+$('#id_edit').val()+"/update";
			var response 	=	$('#response_to_edit').val();
			var poll_id		=   "{{ isset($poll)?$poll->id:'' }}";
			_token			=	$(this).closest('form').find("input[name=_token]").val();

			$.ajax({
				method  : 'POST',
				url     : url_sent,
				data    : {response:response, poll_id:poll_id,  _token:_token},
				success : function(response) {
					if(response.success == true){
						Materialize.toast('Respuesta cargada con exito', 2000, 'orange darken-1')
						$('#'+response.response.id).empty();
 						$('#'+response.response.id).append("<td class='center-align'>"+response.response.question+"</td><td id='td-logo' class='center-align'>"+response.response.votes+"</td><td class='td-fgs center-align'><button onclick='response_delete_btn("+response.response.id+")' class='btn btn-fgs btn-fgs-delete red darken-3'><i class='material-icons'>delete</i></button><button onclick='response_edit_btn("+response.response.id+")' class='btn btn-raised btn-primary btn-fgs btn-fgs-edit'><i class='material-icons'>create</i></button></td>");
						$('#question').val('');
						Materialize.toast('Respuesta actualizada con exito', 2000, 'orange darken-1');
						$('#modal_update').modal('close');
					}else{
						Materialize.toast('Error al procesar la solicitud', 4000, 'red darken-1')
					}
				},
				error : function(request, error) {
					if (arguments[2] == "Unauthorized") {
						window.location="{{URL::to('login')}}";
					}
				},
			}).done(function() {

			});
	    });
	</script>						
@endsection