<?php

	require 'config/config.php';
	require 'config/sesion.php';

	$title="admin";

	if($user->tipo == "capitan"){
		header("location:./capitan.php");
	}else if($user->tipo == "organizador"){
		header("location:./organizador.php");
	}else if($user->tipo=="admin" || $user->tipo=="contenido"){

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

?>
<!DOCTYPE html>
<html>
	<head>
		<title>HI!TECFEST</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8"> 
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href="./css/index.css" rel="stylesheet" media="screen">
		<link href="./css/bootstrap-select.min.css" rel="stylesheet" media="screen">
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
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-1">
				</div>
				<div class="col-xs-10 col-sm-4 col-md-4 col-lg-4 login">
					<h1 class="text-center">AGREGAR ACTIVIDADES</h1>	
					<br />
					<form action="./nueva_actividad.php" method="POST" id="registro" role="form">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></span>
								<input type="tel" class="form-control" name="puntos" id="puntos" placeholder="Puntos" required>
							</div>
						</div>
						<h3 class="center-text">TIPO</h3>
						<div class="form-group">
							<select class="selectpicker col-md-12 col-xs-12 col-sm-12 col-lg-12" name="tipo" id="tipo" required>
							    <option value="asistencia">ASISTENCIA</option>
							    <option value="rally">RALLY</option>
							    <option value="feria azul">FERIA AZUL</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary btn-block">AGREGAR</button>
					</form>
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
		<!-- This page JavaScript -->
		<script src="js/bootstrap-select.min.js"></script>
		<script>
			$('.selectpicker').selectpicker();
		</script>
	</body>
</html>