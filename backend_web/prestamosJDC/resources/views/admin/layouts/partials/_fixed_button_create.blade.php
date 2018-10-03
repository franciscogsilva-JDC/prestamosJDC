	<?php
		$route = "";
		switch ($menu_item) {
		    case 2:
		    	$route = route('requests.create');
		        break;
		    case 4:
		    	$route = route('users.create');
		        break;
		    case 5:
		    	$route = route('spaces.create');
		        break;
		    case 6:
		    	$route = route('resources.create');
		        break;
		    case 7:
		    	$route = route('dependencies.create');
		        break;
		    case 8:
		    	$route = route('programs.create');
		        break;
		    case 9:
		    	$route = route('headquarters.create');
		        break;
		    case 10:
		    	$route = route('buildings.create');
		        break;
		}
	?>
	<div class="fixed-action-btn">
		<a class="waves-effect waves-light btn-floating btn-large teal z-depth-3 create-new-fgs pulse tooltipped" data-position="left" data-delay="50" data-tooltip="Crear Nuevo" href="{{ $route }}">
			<i class="large material-icons">add</i>
		</a>		
	</div>