<?php
	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_GET['id'])){
		$staff = R::load('staff', $_GET['id']);
		R::trash( $staff );
		header("Location:ver_registros_staff.php?borrarStaff=true");
	}else{
		header("Location:ver_registros_staff.php?failStaff=true");
	}

?>