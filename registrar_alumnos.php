<?php

	require "config/config.php";

	if($_POST){

		$evento = R::load('eventos', $_POST['id']);

		$date = strtotime($_POST['fecha']);
		$fecha = date("d-M-Y",$date);
		
		$alumnos = R::dispense('alumnos');

		$alumnos->nombre=$_POST['nombre'];
		$alumnos->apaterno=$_POST['apaterno'];
		$alumnos->amaterno=$_POST['amaterno'];
		$alumnos->matricula=strtoupper($_POST['matricula']);
		$alumnos->fecha=$fecha;
		$alumnos->carrera=strtoupper($_POST['carrera']);
		$alumnos->registrado=false;

		$evento->ownAlumnos[]=$alumnos;

		R::store($evento);

		header("Location:./mis_eventos.php?registroAlumno=true");
	}else{
		header("Location:./mis_eventos.php");
	}

?>