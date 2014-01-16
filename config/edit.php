<?php

	require 'rb.php';
	R::setup('mysql:host=50.63.234.73; dbname=hitecdb','hitecdb','Sauali!123');

	// $alumnos = R::findAll('alumnos');
	// foreach ($alumnos as $alumno) {
	// 	$alumno->fecha=date("d-M-Y",($alumno->fecha-25570)*86400-1); 
	// 	R::store($alumno);
	// }

	$staffs = R::findAll('staff');
	foreach ($staffs as $staff) {
		$asistencia = R::dispense('asistencia');
		$asistencia->capacitacion1=false;
		$asistencia->capacitacion2=false;
		$asistencia->dia1=false;
		$asistencia->dia2=false;
		$asistencia->dia3=false;

		$staff->ownAsistencia=$asistencia;

		R::store($staff);
	}

?>