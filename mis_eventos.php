<?php

	require 'config/config.php';
	require 'config/sesion.php';

	$title="admin";

	if($user->tipo == "capitan"){
		header("location:./capitan.php");
	}else if($user->tipo == "organizador"){
		header("location:./organizador.php");
	}else if($user->tipo=="admin" || $user->tipo=="ch"){
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

	function display_eventos(){
		$eventos = R::findAll('eventos','ORDER BY fecha');

		foreach ($eventos as $evento) {
			# code...
			echo '<option value="'.$evento->id.'">'.$evento->fecha.'</option>';
		}
	}

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
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css" media="screen">
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
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
					<form action="mis_eventos.php" method="POST" class="form-inline" role="form">
						<div class="form-group">
							<select class="selectpicker" name="id" id="id" required>
							    <?php display_eventos(); ?>
							</select>
						</div>	
						<button type="submit" class="btn btn-primary">Buscar</button>
					</form>		
				</div>
			</div>
			<br />
			<div class="row well">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1 class="center-text">Evento de: <?= $fecha; ?></h1>
				</div>
				<div class="row">
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
						<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
							<form action="config/upload_excel.php" target="new" enctype="multipart/form-data" method="POST" role="form">
								<input type="hidden" name="id" value="<?= $evento->id; ?>">
								<legend class="center-text">Cargar Excel de Alumnos</legend>
							
								<div class="form-group">
									<input type="file" name="ufile" class="form-control btn-danger" id="ufile" title="Seleccionar Archivo">
								</div>

								<button type="submit" class="btn btn-primary btn-block btn-lg">Cargar</button>
							</form>
						</div>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
						<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
							<div class="menu-icon">
								<span class="glyphicon glyphicon-list"></span>
							</div>
							<a type="button" href="./ver_registros_alumnos.php?id=<?= $evento->id; ?>" class="btn btn-primary btn-lg btn-block">
								Ver Registro de Alumnos
							</a>
						</div>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
						<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
							<div class="menu-icon">
								<i class="fa fa-plus-square-o"></i>
							</div>
							<a type="button" href="./agregar_alumno.php?id=<?= $evento->id; ?>" class="btn btn-primary btn-lg btn-block">
								Agregar Alumno
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
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
						<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
							<div class="menu-icon">
								<i class="fa fa-print"></i>
							</div>
							<a type="button" href="./generar_reportes.php?id=<?= $evento->id; ?>" class="btn btn-primary btn-lg btn-block">
								Generar Reportes
							</a>
						</div>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
						<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
							<div class="menu-icon">
								<i class="fa fa-pencil-square-o"></i>
							</div>
							<a type="button" href="./editar_evento.php?id=<?= $evento->id; ?>" class="btn btn-primary btn-lg btn-block">
								Editar Evento
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- Modal -->
		<div class="modal fade" id="modal-borrarevento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">BORRAR evento</h4>
		      </div>
		      <div class="modal-body" id="borrar-txt">
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        <a href="#" type="button" class="btn btn-danger" id="btn-borrar">Borrar</a>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<!-- all pages JavaScript -->
		<script src="js/main.js"></script>
		<!-- This page JavaScript -->
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.file-input.js"></script>
		<script>
			$('.selectpicker').selectpicker();
			$(document).ready(function() {
			    $('input[type=file]').bootstrapFileInput();
			});
		</script>
	</body>
</html>