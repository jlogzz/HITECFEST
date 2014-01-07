<?php
	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_POST['fecha'])){
		$fecha=$_POST['fecha'];
	}else{
		if(idate("m")<=6&&idate("m")>1){
			$fecha="Mayo-".idate("Y");
		}else if(idate("m")==1){
			$fecha="Enero-".(idate("Y"));
		}else{
			$fecha="Enero-".(idate("Y")+1);
		}
	}

	$evento = R::findOne('eventos',' fecha = :param ',
	           array(':param' => $fecha )
	         );

	if(isset($_POST)){

		$punto = R::dispense('puntos');
		$punto->nombre = $_POST['nombre'];
		$punto->porcentaje = $_POST['puntos'];
		$punto->tipo = $_POST['tipo'];
		$punto->code = strtolower(str_replace(' ', '', $_POST['nombre']));

		$evento->sharedPuntos[]=$punto;

		R::store($evento);


		header("Location:puntos.php?addPuntos=true");
	}else{
		header("Location:puntos.php?failPuntos=true");
	}

?>