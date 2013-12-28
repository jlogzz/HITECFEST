<?php

	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_POST)){
		$asistencia = R::load('asistencia', $_POST['id']);

		$asistencia->$_POST['selAsistencia']=$_POST['asist'];

		R::store($asistencia);
	}
	
?>