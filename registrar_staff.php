<?php

	require "config/config.php";

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

	if($_POST){
		$staff = R::dispense('staff');

		$staff->matricula = strtoupper($_POST['matricula']);
		$staff->nombre = $_POST['nombre'];
		$staff->apaterno = $_POST['apaterno'];
		$staff->amaterno = $_POST['amaterno'];
		$staff->carrera = strtoupper($_POST['carrera']);
		$staff->email = strtolower($_POST['email']);
		$staff->telefono = $_POST['telefono'];
		$staff->tipo = $_POST['tipo'];
		$staff->fecha = $fecha;
		$staff->camisa = $_POST['camisa'];


		$asistencia = R::dispense('asistencia');
		$asistencia->capacitacion1=false;
		$asistencia->capacitacion2=false;
		$asistencia->dia1=false;
		$asistencia->dia2=false;
		$asistencia->dia3=false;

		$staff->ownAsistencia=$asistencia;

		R::store($staff);

		header("Location:./?registroStaff=true");
	}else{
		header("Location:./");
	}

?>