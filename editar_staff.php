<?php

	require "config/config.php";

	if($_POST){
		$staff = R::load('staff', $_POST['id']);

		$staff->matricula = strtoupper($_POST['matricula']);
		$staff->nombre = $_POST['nombre'];
		$staff->apaterno = $_POST['apaterno'];
		$staff->amaterno = $_POST['amaterno'];
		$staff->carrera = strtoupper($_POST['carrera']);
		$staff->email = strtolower($_POST['email']);
		$staff->telefono = $_POST['telefono'];
		$staff->tipo = $_POST['tipo'];
		$staff->camisa = $_POST['camisa'];

		R::store($staff);

		header("Location:./ver_registros_staff.php?editarStaff=true");
	}else{
		header("Location:./");
	}

?>