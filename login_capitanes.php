<?php

		require 'config/config.php';
		require 'config/sesion.php';

		$title="capitanes";

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

	function display_colores(){
		
		$colores = R::findAll('colores');

		foreach ($colores as $color) {
			echo '
					<option class="center-text" value="'.$color->nombre.'">'.$color->nombre.'</option>
			     ';
		}
	}

	function display_edificios(){
		
		$edificios = R::findAll('edificios');

		foreach ($edificios as $edificio) {
			echo '
					<option class="center-text" value="'.$edificio->nombre.'">'.$edificio->nombre.'</option>
			     ';
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>HI! TEC FEST - <?= $title; ?></title>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
					<h2 class="text-center">INGRESO CAPITANES</h2>	
					<br />
					<form action="./checklogin_capitanes.php" method="POST" role="form">
						<input type="hidden" name="fecha" value="<?= $fecha; ?>">
						<div class="form-group">
							<select class="selectpicker col-md-12 col-xs-12 col-sm-12 col-lg-12" name="color" id="color" required>
							    <option class="center-text" value="">SELECCIONA UN COLOR</option>
							    <?php display_colores(); ?>
							</select>
						</div>
						<div class="form-group">
							<select class="selectpicker col-md-12 col-xs-12 col-sm-12 col-lg-12" name="edificio" id="edificio" required>
							    <option class="center-text" value="">SELECCIONA UN EDIFICIO</option>
							    <?php display_edificios(); ?>
							</select>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" name="password" id="password" placeholder="**********">
							</div>
						</div>
						<br />
						<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
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