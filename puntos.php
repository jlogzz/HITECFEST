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
						<a type="button" href="./ver_registros_staff.php" class="btn btn-primary btn-lg btn-block">
							Ver Registro de STAFF
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-clock-o"></i>
						</div>
						<a type="button" href="./ver_asistencia_staff.php" class="btn btn-primary btn-lg btn-block">
							Ver Asistencia de STAFF
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<span class="glyphicon glyphicon-check"></span>
						</div>
						<a type="button" href="./tomar_asistencia_staff.php" class="btn btn-primary btn-lg btn-block">
							Tomar Asistencia STAFF
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-calendar"></i>
						</div>
						<a type="button" href="./mis_eventos.php" class="btn btn-primary btn-lg btn-block">
							Mis Eventos
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-plus-square-o"></i>
						</div>
						<a type="button" href="./nuevo_evento.php" class="btn btn-primary btn-lg btn-block">
							Nuevo Evento
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-trophy"></i>
						</div>
						<a type="button" href="./puntos.php" class="btn btn-primary btn-lg btn-block">
							Puntos
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-print"></i>
						</div>
						<a type="button" href="./generar_reportes.php" class="btn btn-primary btn-lg btn-block">
							Generar Reportes
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-th"></i>
						</div>
						<a type="button" href="./editar_colores.php" class="btn btn-primary btn-lg btn-block">
							Colores
						</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
					<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
						<div class="menu-icon">
							<i class="fa fa-building-o"></i>
						</div>
						<a type="button" href="./editar_edificios.php" class="btn btn-primary btn-lg btn-block">
							Edificios
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