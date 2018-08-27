@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">
							<p class="caption-title center-align">Agregar respuestas a:</p>
							<p class="center-align">{{ $poll->title }}</p>
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section ">
		                    {!! Form::open(['route' => 'responses.store', 'method' => 'POST']) !!}
								{{ csrf_field() }}
			                    <div class="input-field col s12 m12 l12">
			                        <i class="material-icons prefix">sort</i>
			                        {!! Form::text('question', null, ['class' => '', 'required', 'id' => 'question']) !!}
			                        <label for="title">Respuesta</label>
			                    </div>
			                    <div class="row center-align">
			                    	{!! Form::submit('Crear', ['class' => 'btn waves-effect btn-fgs-edit', 'id' => 'create_response_btn']) !!}
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
			                <div class="row">
								<div class="row center-align">
									<p>Respuestas</p>
									<table class="highlight striped" id="table_responses">
										<thead>
											<th class="center-align">Respuesta</th>
											<th class="center-align">Opciones</th>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
								<div class="row"></div>
			                    <div class="buttonpanel-edit center-align">
			                        <a href="{{ route('polls.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea salir del panel de creación de respuestas?')">Volver</a>
			                    </div>
		                    </div>
			            </div>
			        </div>
				</div>
			</div>
        </div>
    </div>
@endsection()

@section('js')
	<script type="text/javascript">
		var _token = '';

		$('#create_response_btn').on('click', function(event){
			event.preventDefault();
			var response 	=	$('#question').val();
			var poll_id		=   "{{ $poll->id }}";
			var url_sent	=   $(this).closest('form').attr('action');
			_token			=	$(this).closest('form').find("input[name=_token]").val();

			$.ajax({
				method  : 'POST',
				url     : url_sent,
				data    : {response:response, poll_id:poll_id,  _token:_token},
				success : function(response) {
					if(response.success == true){
						Materialize.toast('Respuesta cargada con exito', 2000, 'orange darken-1')
 						$('#table_responses > tbody:last-child').append("<tr id="+response.response.id+"><td class='center-align'>"+response.response.question+"</td><td class='td-fgs center-align'><button onclick='response_delete_btn("+response.response.id+")' class='btn btn-fgs btn-fgs-delete red darken-3'><i class='material-icons'>delete</i></button><button onclick='response_edit_btn("+response.response.id+")' class='btn btn-raised btn-primary btn-fgs btn-fgs-edit'><i class='material-icons'>create</i></button></td></tr>");
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
	    	var url_sent = "{{ env('APP_URL') }}admin/responses/"+id+"/destroy";
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
			var poll_id		=   "{{ $poll->id }}";

			$.ajax({
				method  : 'POST',
				url     : url_sent,
				data    : {response:response, poll_id:poll_id,  _token:_token},
				success : function(response) {
					if(response.success == true){
						Materialize.toast('Respuesta cargada con exito', 2000, 'orange darken-1')
						$('#'+response.response.id).empty();
 						$('#'+response.response.id).append("<td class='center-align'>"+response.response.question+"</td><td class='td-fgs center-align'><button onclick='response_delete_btn("+response.response.id+")' class='btn btn-fgs btn-fgs-delete red darken-3'><i class='material-icons'>delete</i></button><button onclick='response_edit_btn("+response.response.id+")' class='btn btn-raised btn-primary btn-fgs btn-fgs-edit'><i class='material-icons'>create</i></button></td>");
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