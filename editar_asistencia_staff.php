<?php

	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_POST)){
		$staff = R::load('staff', $_POST['id']);
		$asistencia = R::load('asistencia', $staff->ownAsistencia_id);

		$asistencia->$_POST['selAsistencia']=$_POST['asist'];

		R::store($asistencia);
	}
	
?>