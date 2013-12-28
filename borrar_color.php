<?php
	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_GET['id'])){
		$color = R::load('colores', $_GET['id']);
		R::trash( $color );
		header("Location:editar_colores.php?borrarColores=true");
	}else{
		header("Location:editar_colores.php?failColores=true");
	}

?>