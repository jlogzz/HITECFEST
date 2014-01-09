<?php

	require 'config/config.php';
	require 'config/sesion.php';

	$title="ch";

	if($user->tipo == "admin"){
		header("location:./admin.php");
	}else if($user->tipo == "contenido"){
		header("location:./contenido.php");
	}else if($user->tipo=="ch"){

	}else{
		header("Location:./");
	}

	if(isset($_POST['id'])){
		$evento = R::load('eventos', $_POST['id']);
		$fecha=$evento->fecha;
	}else{
		if(idate("m")<=6&&idate("m")>1){
			$fecha="Mayo-".idate("Y");
		}else if(idate("m")==1){
			$fecha="Enero-".(idate("Y"));
		}else{
			$fecha="Enero-".(idate("Y")+1);
		}
		$evento = R::findOne('eventos',' fecha = :param ',
		           array(':param' => $fecha )
		         );
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
							<i class="fa fa-th"></i>
						</div>
						<a type="button" href="./asignar_capitanes.php?id=<?= $evento->id; ?>" class="btn btn-primary btn-lg btn-block">
							Asignar Capitanes
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