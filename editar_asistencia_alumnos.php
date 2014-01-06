<?php

	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_POST)){
		$asistencia = R::findOne('asistencia',' alumnos_id = :id ',
			           array(':id' => $_POST['id'] )
			         );

		$asistencia->$_POST['selAsistencia']=$_POST['asist'];

		R::store($asistencia);
	}
	
?>