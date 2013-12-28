<?php
	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_POST)){

		$evento = R::load('eventos', $_POST['id']);

		$staffs = R::find('staff',' fecha = :param && tipo = "capitan"',
		           array(':param' => $evento->fecha )
		         );

		foreach ($staffs as $staff) {
			# code...
			$colorid="color".$staff->id;
			$staff->color=$_POST[$colorid];
			$edificioid="edificio".$staff->id;
			$staff->edificio=$_POST[$edificioid];

			R::store($staff);
		}

		header("Location:./mis_eventos.php?asignarCapitanes=true");
	}else{
		header("Location:./mis_eventos.php?failCapitanes=true");
	}

?>