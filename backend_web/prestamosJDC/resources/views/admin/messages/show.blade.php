 @extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">
				<div class="card-panel card-panel-table-factories">
			        <div class="head-edit">
			            <div class="section">
			            	<p class="caption-title center-align">Mensaje</p>
			            </div>
        				@include('admin.layouts.partials._messages')
			            <div class="section">
			            	<div class="row">
			            		<div class="card-panel">
			            			<div class="row">		
					            		<b>Nombre:</b> {{ $message->name }}
										<br>
										<b>Correo:</b> {{ $message->email }}
										<br>
										<b>Enviado:</b> {{ $message->created_at != null ? ucwords($message->created_at->format('F d\\, Y')) : ' Sin Fecha ' }}
										<br>
			            			</div>
									<div class="row row-content-message-fgs">
										{!! $message->message !!}
									</div>
			            		</div>
			            	</div>
			            	<div class="row">
								<div class="row">
			            			{!! Form::open(['route' => ['messages.update.status', $message->id], 'method' => 'POST'], ['class' => 'form-container col s12 center-block form_status']) !!}
										{{ csrf_field() }}
										<div class="input-field col s12 m12 l12">
											<i class="material-icons prefix">swap_horiz</i>
											<select class="icons" name="readed" id="readed">
												<option value="1" {{$message->readed==1?'selected=selected':''}}>Leido</option>
												<option value="0" {{$message->readed==0?'selected=selected':''}}>No Leido</option>
											</select>
											<label for="readed">Estado del Mensaje</label>
										</div>
			                		{!! Form::close() !!}
								</div>
								<div class="row">
			                    	{!! Form::open(['route' => ['messages.response', $message->id], 'method' => 'POST'], ['class' => 'form-container col s12 center-block']) !!}
										<div class="input-field col s12 m12 l12">
					                        <i class="material-icons prefix">description</i>
											{!! Form::textArea('response', isset($message)?$message->response:null, ['class' => 'materialize-textarea', 'id' => 'response']) !!}
					                        <label for="antecedent">Respuesta</label>
										</div>
										<div class="row"></div>
					                    <div class="buttonpanel-edit center-align">
					                        <a href="{{ route('messages.index') }}" class="btn waves-effect waves-light grey" onclick="return confirm('¿Desea cancelar la respuesta al mensaje?')" >Cancelar</a>
					                        {!! Form::submit('Responder', ['class' => 'btn waves-effect btn-fgs-edit']) !!}
					                    </div>
			                		{!! Form::close() !!}
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
		$('#readed').on('change', function(event){
			event.preventDefault();
			var readed		=	$('#readed option:selected').val();
			var url_sent	=   $(this).closest('form').attr('action');
			var _token		=	$(this).closest('form').find("input[name=_token]").val();

			$.ajax({
				method  : 'POST',
				url     : url_sent,
				data    : {readed:readed, _token:_token},
				success : function(response) {
					console.log(response);
					if(response.readed == 1){
						Materialize.toast('Mensaje marcado como Leido', 4000, 'orange darken-1')
					}else{
						Materialize.toast('Mensaje marcado como No Leido', 4000, 'red darken-1')
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