<?php
	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_POST)){
		$color = R::load('colores', $_POST['id']);
		$color->nombre = strtoupper($_POST['nombre']);
		$color->hex = strtoupper(substr($_POST['hex'],1));
		R::store($color);

		header("Location:editar_colores.php?alertColores=true");
	}else{
		header("Location:editar_colores.php?failColores=true");
	}

?>