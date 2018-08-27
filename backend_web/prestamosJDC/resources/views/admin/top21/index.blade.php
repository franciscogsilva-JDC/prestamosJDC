@extends('admin.layouts.admin_layout')

@section('content')
	<div class="container container-fgs">
        <div class="row">	
			<div class="col s12 m12 l12">	
                <div class="card-panel card-panel-search-fgs">	
					@include('admin.layouts.partials._messages')				
					{!! Form::open(['route' => 'top21.index', 'method' => 'GET'], ['class' => 's12 m12 l12']) !!}
						<div class="row row-search-fgs ">
							<div class="input-field col s12 m10 l10 input-field-fgs">
								<i class="material-icons prefix">search</i>
								<input id="search" type="text" class="validate" name="search">
								<label class="label-search-fgs" for="icon_prefix">Buscar canción por nombre o número</label>
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
			     		<table class="highlight striped">
							<thead>
								<th class="td-fgs center-align">Canción</th>
							</thead>
							<tbody>
								@foreach($top21 as $top)
								<tr>
									<td class="td-fgs center-align" id="td_{{ $top->id }}">
										<p><b># {{ $top->id }}</b> - {{ $top->artist_name }}</p>
										<div class="video-container center-align">
											<iframe width="853" height="480" src="{{ $top->embed_video }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
										</div>
										<a href="#modal_edit_{{ $top->id }}" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit modal-trigger">cambiar</a>
									</td>
									<!-- Modal Structure -->
									<div id="modal_edit_{{ $top->id }}" class="modal bottom-sheet center-align">
				            			{!! Form::open(['route' => ['top21.update', $top->id], 'method' => 'POST', 'id' => 'form_update_top_'.$top->id]) !!}
											<div class="modal-content">
												<h4>Canción # {{ $top->id }}</h4>
												<br>
												<div class="row">
													<div class="input-field col s12 m6 l6">
								                        <i class="material-icons prefix">headset</i>
								                        {!! Form::text('artist_name', $top->artist_name, ['class' => '', 'required', 'id' => 'artist_name_'.$top->id]) !!}
								                        <label for="artist_name">Nombre de la canción</label>
													</div>
													<div class="input-field col s12 m6 l6">
								                        <i class="material-icons prefix">movie</i>
								                        {!! Form::text('video', $top->video, ['class' => '', 'required', 'id' => 'video_'.$top->id]) !!}
								                        <label for="video">Url de youtube de la canción</label>
													</div>
												</div>
											</div>
											<div class="modal-footer center-align">
												<a onclick="return confirm('¿Desea editar la canción # {{ $top->id }}')" class="btn btn-raised btn-primary btn-fgs btn-fgs-edit update_top">cambiar
													<input type="hidden" name="id" value="{{ $top->id }}">
												</a>
											</div>
				                		{!! Form::close() !!}
									</div>	
								</tr>
								@endforeach	
								<div id="tok">							
	            					{{ csrf_field() }}
								</div>
							</tbody>
						</table>
			        </div>
				</div>
			</div>
        </div>
    </div>
	<?php $paginator = $top21; ?>
    @include('admin.layouts.partials._paginator')
@endsection()

@section('js')
	<script type="text/javascript">
		$('.update_top').on('click', function(event){
			event.preventDefault();
			var id 			= $(this).find('input[name=id]').val();
			var artist_name	=	$('#artist_name_'+id).val();
			var video		=	$('#video_'+id).val();
			var url_sent	=   $('#form_update_top_'+id).attr('action');
			var _token		=	$('#tok').find('input[name=_token]').val();

			$.ajax({
				method  : 'POST',
				url     : url_sent,
				data    : {artist_name:artist_name, video:video, _token:_token},
				success : function(response) {
					if(response.success == true){
						$('.modal').modal('close');
						Materialize.toast('Canción actualizada correctamente', 2000, 'orange darken-1');
						replace_song(response.top21);
					}else{
						Materialize.toast('Error al actualizar la canción', 2000, 'red darken-1');
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

		function replace_song(item){			
			$('#td_'+item.id).empty();
			$('#td_'+item.id).append("<p><b># "+item.id+"</b> - "+item.artist_name+"</p><div class='video-container center-align'><iframe width='853' height='480' src='"+item.embed_video+"' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe></div><a href='#modal_edit_"+item.id+"' class='btn btn-raised btn-primary btn-fgs btn-fgs-edit modal-trigger'>cambiar</a>");
		}
	</script>
@endsection()