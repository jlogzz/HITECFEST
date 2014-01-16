<?php

	require 'config/config.php';
	require 'config/sesion.php';
	$title="index";

	$cdate = mktime(0, 0, 0, 1, 10, 2014);
	$today = time();
	$difference = $cdate - $today;
	if ($difference < 0) { $difference = 0; }

	$amarillo=0;
	$verde=0;
	$rojo=0;
	$morado=0;
	$rosa=0;
	$ale=0;
	$bib=0;
	$ciap=0;
	$rectoria=0;

	$alumnos = R::findAll('alumnos');
	foreach ($alumnos as $alumno) {
		if($alumno->color=="AMARILLO"){
			$amarillo++;
		}else if($alumno->color=="VERDE"){
			$verde++;
		}else if($alumno->color=="ROJO"){
			$rojo++;
		}else if($alumno->color=="MORADO"){
			$morado++;
		}else if($alumno->color=="ROSA"){
			$rosa++;
		}

		if($alumno->edificio=="ALE"){
			$ale++;
		}else if($alumno->edificio=="BIB"){
			$bib++;
		}else if($alumno->edificio=="CIAP"){
			$ciap++;
		}else if($alumno->edificio=="RECTORIA"){
			$rectoria++;
		}
	}

	$total=$amarillo+$verde+$rojo+$morado+$rosa;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>HI!TECFEST</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
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
				<div class="col-md-2 col-lg-2 col-sm-2 col-xs-1">
				</div>
				<div class="col-xs-10 col-sm-8 col-md-8 col-lg-8">
					<br />
					<br />
					<h1 class="text-center">Faltan <?= floor($difference/60/60/24); ?> dias para HI! TEC FEST!!!</h1>	
					<div class="center-text">
					<?php
						echo "TOTAL: ".+$total."<br /><br />";

						echo "amarillo: ".+$amarillo."<br />";
						echo "verde: ".+$verde."<br />";
						echo "rojo: ".+$rojo."<br />";
						echo "morado: ".+$morado."<br />";
						echo "rosa: ".+$rosa."<br /><br />";

						echo "ale: ".+$ale."<br />";
						echo "bib: ".+$bib."<br />";
						echo "ciap: ".+$ciap."<br />";
						echo "rectoria: ".+$rectoria."<br />";
					?>
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