<?php

	if($_GET['registroStaff']==true){
		echo '
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Registro completado <strong>exitosamente</strong>.
				</div>
			';
	}else if($_GET['login']){
		echo '
				<div class="alert alert-danger alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Username o Password <strong>incorrectos</strong>.
				</div>
			';
	}else if($_GET['alertColores']){
		echo '
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Color editado <strong>exitosamente</strong>.
				</div>
			';
	}else if($_GET['addColores']){
		echo '
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Color agergado <strong>exitosamente</strong>.
				</div>
			';
	}else if($_GET['borrarColores']){
		echo '
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Color borrado <strong>exitosamente</strong>.
				</div>
			';
	}else if($_GET['failColores']){
		echo '
				<div class="alert alert-danger alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Color <strong>fallo</strong> al editarse.
				</div>
			';
	}else if($_GET['alertEdificios']){
		echo '
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Edificio editado <strong>exitosamente</strong>.
				</div>
			';
	}else if($_GET['addEdificios']){
		echo '
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Edificio agergado <strong>exitosamente</strong>.
				</div>
			';
	}else if($_GET['borrarEdificios']){
		echo '
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Edificio borrado <strong>exitosamente</strong>.
				</div>
			';
	}else if($_GET['failEdificios']){
		echo '
				<div class="alert alert-danger alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Edificio <strong>fallo</strong> al editarse.
				</div>
			';
	}else if($_GET['editarStaff']){
		echo '
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Staff editado <strong>exitosamente</strong>.
				</div>
			';
	}else if($_GET['borrarStaff']){
		echo '
				<div class="alert alert-success alert-dismissable fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		Staff borrado <strong>exitosamente</strong>.
				</div>
			';
	}


?>