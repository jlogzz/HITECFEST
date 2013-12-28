<?php

		require 'config/config.php';
		$title="kit";

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

		if(isset($_POST['codigo'])){
			$kit='<h1 class="center-text">EL CODIGO NO FUE ENCONTRADO</h1>';
			$alumno = R::findOne('alumnos',' codigo = :param && eventos_id = :id',
			           array(':param' => $_POST['codigo'], ':id' => $evento->id )
			         );

			if ($alumno->id!=0) {
				$kit= '
						<h2 class="center-text">Alumno: '.$alumno->nombre.' '.$alumno->apaterno.' '.$alumno->amaterno.'</h2>
						<h2 class="center-text">Matricula: '.$alumno->matricula.'</h2>
						<h2 class="center-text">Codigo: '.$alumno->codigo.'</h2>
						<h2 class="center-text">'.$alumno->color.' - '.$alumno->edificio.'</h2>
						<img class="center" src="/img/banners/'.$alumno->color.'/'.$alumno->edificio.'.png" >
					';
			}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>HI!TECFEST - <?= $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8"> 
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
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<div class="well">
						<form action="./kit.php" method="POST" role="form">
							<legend class="center-text">ASIGNACION DE EQUIPO</legend>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
									<input type="teL" class="form-control" name="codigo" id="codigo" data-mask="9999" placeholder="CODIGO: ####">
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Buscar</button>
						</form>
					</div>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<div class="well">
						<?php echo $kit; ?>
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
		<!-- This Page JavaScript -->
		<script src="js/inputmask.js"></script>
	</body>
</html>