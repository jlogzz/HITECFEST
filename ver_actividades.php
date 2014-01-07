<?php

	require 'config/config.php';
	require 'config/sesion.php';

	$title="admin";

	if($user->tipo == "capitan"){
		header("location:./capitan.php");
	}else if($user->tipo == "organizador"){
		header("location:./organizador.php");
	}else if($user->tipo=="admin"){

	}else{
		header("Location:./");
	}

	if(isset($_POST['fecha'])){
		$fecha=$_POST['fecha'];
	}else{
		if(idate("m")<=6&&idate("m")>1){
			$fecha="Mayo-".idate("Y");
		}else if(idate("m")==1){
			$fecha="Enero-".(idate("Y"));
		}else{
			$fecha="Enero-".(idate("Y")+1);
		}
	}

	$evento = R::findOne('eventos',' fecha = :param ',
	           array(':param' => $fecha )
	         );

	$puntos = $evento->with(' ORDER BY tipo ')->sharedPuntos;

	$asistencia=0;
	$puntaje=0;

	foreach ($puntos as $punto) {
		if($punto->tipo=="asistencia"){
			$asistencia+=$punto->porcentaje;
		}else{
			$puntaje+=$punto->porcentaje;
		}
	}

	function display_actividades($puntos){
		foreach ($puntos as $punto) {
			echo '
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<h4 class="center-text">'.$punto->nombre.'</h4>
						<h5 class="center-text">'.strtoupper($punto->tipo).'</h5>
						<h4 class="center-text">'.$punto->porcentaje.'</h4>
						<button type="button" href="#" class="btn btn-lg btn-primary btn-block"
							data-toggle="modal" data-target="#modal-'.$punto->code.'">
							EDITAR
						</button>
					</div>
				</div>
			';
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>HI!TECFEST</title>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href="./css/index.css" rel="stylesheet" media="screen">
	</head>
	<body data-active="<?= $title; ?>">
		<!-- BEGIN NAV -->
			<?php require 'nav.php'; ?>
		<!-- END NAV -->
		<!-- BEGIN CONTENT -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
					<?php require 'config/alerts.php'; ?>
				</div>
			</div>
			<div class="row">
				<h1 class="center-text">Ver Actividades</h1>
				<h4 class="center-text">Total Asistencia: <?= $asistencia; ?></h4>
				<h4 class="center-text">Total Puntaje: <?= $puntaje; ?></h4>
			</div>
			<div class="well">
				<div class="row">
					<?php display_actividades($puntos); ?>
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<!-- all pages JavaScript -->
		<script src="js/main.js"></script>
	</body>
</html>