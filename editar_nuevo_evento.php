<?php
	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_POST)){

	$evento = R::load('eventos', $_POST['id']);
	$evento->numcolores=$_POST['numcolor'];
	$evento->numedificios=$_POST['numedificio'];
	$evento->seledificios=1;

	$selEdificio = R::findOne('seledificios',' eventos_id = :param ',
	           array(':param' => $evento->id )
	         );
	$j=0;//numero de color
	for ($i=1; $i <= $evento->numedificios; $i++) { //numero de edificio

		if($j==$evento->numColores){
			$j=1;
		}else{
			$j++;
		}
		
		$selEdificio->$i=$j;//asigna color a cada edificio

	}

	$nomColor = R::findOne('nomcolors',' eventos_id = :param ',
	           array(':param' => $evento->id )
	         );
	for ($i=1; $i <= $evento->numcolores; $i++) { 
		$nomColor->$i=$_POST['color'.$i];			
	}

	$nomEdificio = R::findOne('nomedificios',' eventos_id = :param ',
	           array(':param' => $evento->id )
	         );
	for ($i=1; $i <= $evento->numedificios; $i++) { 
		$nomEdificio->$i=$_POST['edificio'.$i];			
	}		

	R::store($selEdificio);
	R::store($nomColor);
	R::store($nomEdificio);
	R::store($evento);

		header("Location:admin.php?crearEvento=true");
	}else{
		header("Location:admin.php?failEvento=true");
	}

?>