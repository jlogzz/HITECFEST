<?php

		require 'config/config.php';
		require 'config/sesion.php';

		$title="admin";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>HI! TEC FEST - <?= $title; ?></title>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="./css/index.css" rel="stylesheet" media="screen">
		<link href="./css/bootstrap-select.min.css" rel="stylesheet" media="screen">
		<link href="./css/datepicker.css" rel="stylesheet" media="screen">
	</head>
	<body data-active="<?= $title; ?>">
		<!-- BEGIN NAV -->
			<?php require 'nav.php'; ?>
		<!-- END NAV -->
		<!-- BEGIN CONTENT -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-4 col-sm-4 col-xs-1">
				</div>
				<div class="col-xs-10 col-sm-4 col-md-4 col-lg-4 login">
					<h1 class="text-center">Agregar Alumno</h1>	
					<br />
					<form action="./registrar_alumnos.php" method="POST" id="registro" role="form">
						<input type="hidden" name="id" value="<?= $_GET['id']; ?>">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
								<input type="text" class="form-control" name="matricula" id="matricula" placeholder="A0XXXXXXX" data-mask="a99999999" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" class="form-control" name="apaterno" id="apaterno" placeholder="Apellido Paterno" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" class="form-control" name="amaterno" id="amaterno" placeholder="Apellido Materno" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								<input type="text" class="form-control datepicker" name="fecha" id="fecha" value="01/01/1990" placeholder="dd/mm/yyyy" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
								<input type="text" class="form-control" name="carrera" id="carrera" placeholder="Carrera SIGLAS" required>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Agregar</button>
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
		<script src="js/inputmask.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script>
			$('.selectpicker').selectpicker();
			$('.datepicker').datepicker({'viewMode':2});
		</script>
	</body>
</html>