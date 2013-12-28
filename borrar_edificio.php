<?php
	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_GET['id'])){
		$edificio = R::load('edificios', $_GET['id']);
		R::trash( $edificio );
		header("Location:editar_edificios.php?borrarEdificios=true");
	}else{
		header("Location:editar_edificios.php?failEdificios=true");
	}

?>