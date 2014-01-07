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

?>
<!DOCTYPE html>
<html>
	<head>
		<title>HI!TECFEST</title>
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
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<span class="glyphicon glyphicon-list"></span>
						</div>
						<a type="button" href="./ver_actividades.php" class="btn btn-primary btn-lg btn-block">
							Ver Actividades
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-plus-square-o"></i>
						</div>
						<a type="button" href="./agregar_actividades.php" class="btn btn-primary btn-lg btn-block">
							Agregar Actividad
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-trophy"></i>
						</div>
						<a type="button" href="./ver_puntos.php" class="btn btn-primary btn-lg btn-block">
							Ver Puntos
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