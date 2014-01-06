<?php

	require 'config/config.php';
	require 'config/sesion.php';

	$title="capitanes";

	if($staff->tipo == "capitan"){

	}else if($staff->tipo == "organizador"){
		header("location:./organizador.php");
	}else if($staff->tipo=="admin"){
		header("location:./admin.php");
	}else{
		header("Location:./");
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
				<h2 class="center-text">CAPITAN: <?= $staff->nombre.' '.$staff->apaterno.' '.$staff->amaterno; ?></h2>
				<h1 class="center-text">EQUIPO: <?= $staff->color.' - '.$staff->edificio; ?></h1>
			</div>
			<div class="row">
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-trophy"></i>
						</div>
						<a type="button" href="./ver_puntos.php" class="btn btn-primary btn-lg btn-block">
							Ver PUNTOS
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-clock-o"></i>
						</div>
						<a type="button" href="./ver_asistencia_alumnos.php" class="btn btn-primary btn-lg btn-block">
							Ver Asistencia de ALUMNOS
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<span class="glyphicon glyphicon-check"></span>
						</div>
						<a type="button" href="./tomar_asistencia_alumnos.php" class="btn btn-primary btn-lg btn-block">
							Tomar Asistencia ALUMNOS
						</a>
					</div>
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