<?php

		require 'config/config.php';
		require 'config/sesion.php';

		$title="staff";

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
					<h1 class="text-center">REGISTRAR</h1>	
					<br />
					<form action="./registrar_staff.php" method="POST" id="registro" role="form">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
								<input type="text" class="form-control" name="matricula" id="matricula" placeholder="A0XXXXXXX" required>
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
								<span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
								<input type="text" class="form-control" name="carrera" id="carrera" placeholder="Carrera SIGLAS" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
								<input type="email" class="form-control" name="email" id="email" placeholder="E-Mail" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
								<input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
							</div>
						</div>
						<h3 class="center-text">CAMISA</h3>
						<div class="form-group">
								<select class="selectpicker col-md-12 col-xs-12 col-sm-12 col-lg-12" name="camisa" id="camisa" required>
							    <option value="S">Small</option>
							    <option value="M">Medium</option>
							    <option value="L">Large</option>
							    <option value="XL">Extra Large</option>
							  </select>
						</div>
						<h3 class="center-text">TIPO</h3>
						<div class="form-group">
								<select class="selectpicker col-md-12 col-xs-12 col-sm-12 col-lg-12" name="tipo" id="tipo" required>
							    <option value="staff">Staff</option>
							    <option value="capitan">Capitan</option>
							    <option value="organizador">Organizador</option>
							  </select>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Registrar</button>
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