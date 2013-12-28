<?php
	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_POST)){
		$edificio = R::load('edificios', $_POST['id']);
		$edificio->nombre = strtoupper($_POST['nombre']);
		R::store($edificio);

		header("Location:editar_edificios.php?alertEdificios=true");
	}else{
		header("Location:editar_edificios.php?failEdificios=true");
	}

?>