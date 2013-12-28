<?php
	require 'config/config.php';
	require 'config/sesion.php';

	if(isset($_POST)){

	$evento = R::dispense('eventos');
	$evento->fecha=$_POST['fecha'];
	$evento->registrando=false;
	$evento->numcolores=$_POST['numcolor'];
	$evento->numedificios=$_POST['numedificio'];
	$evento->seledificios=1;

	$selEdificio = R::dispense('seledificios');	
	$j=0;//numero de color
	for ($i=1; $i <= $evento->numedificios; $i++) { //numero de edificio

		if($j==$evento->numColores){
			$j=1;
		}else{
			$j++;
		}
		
		$selEdificio->$i=$j;//asigna color a cada edificio

	}

	$nomColor = R::dispense('nomcolors');
	for ($i=1; $i <= $evento->numcolores; $i++) { 
		$nomColor->$i=$_POST['color'.$i];			
	}

	$nomEdificio = R::dispense('nomedificios');
	for ($i=1; $i <= $evento->numedificios; $i++) { 
		$nomEdificio->$i=$_POST['edificio'.$i];			
	}		

	$evento->ownSeledificios[]=$selEdificio;
	$evento->ownNomcolors[]=$nomColor;
	$evento->ownNomedificios[]=$nomEdificio;
	// R::store($selEdificio);
	// R::store($nomColor);
	// R::store($nomEdificio);
	R::store($evento);

		header("Location:admin.php?crearEvento=true");
	}else{
		header("Location:admin.php?failEvento=true");
	}

?>