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

	function display_edificios(){
		
		$edificios = R::findAll('edificios');

		foreach ($edificios as $edificio) {
			echo '
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
						<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
							<div class="menu-icon-edificios">
								<img src="/img/placeholders/'.$edificio->nombre.'.png" class="placeholder-edificio" />
							</div>
							<button type="button" href="#" class="btn btn-lg btn-primary btn-block"
								data-toggle="modal" data-target="#modal-'.$edificio->nombre.'">
								'.$edificio->nombre.'
							</button>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="modal-'.$edificio->nombre.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" id="edit-modal">
						    <div class="modal-content">
						      <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h2>Editar Edificio: '.$edificio->nombre.'</h2>
							  </div>
							<!-- The async form to send and replace the modals content with its response -->
						    <form class="form-horizontal well" data-async id="modal-form" data-target="#edit-modal" action="/editar_edificio.php" method="POST">
							  <input type="hidden" name="id" value="'.$edificio->id.'" >
							  <div class="modal-body">
							    
							      <fieldset>
							        <div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
											<input type="text" class="form-control" name="nombre" id="nombre" 
											placeholder="EDIFICIO" value="'.$edificio->nombre.'" required>
										</div>
									</div>
							      </fieldset>
							  </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						        <button type="submit" id="modal-submit" class="btn btn-primary">Guardar</button>
						        <a href="./borrar_edificio.php?id='.$edificio->id.'" type="button" class="btn btn-danger">Borrar</a>
						      </div>
						    </form>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->  
					</div><!-- /.modal -->

			     ';
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
	</head>
	<body data-active="<?= $title; ?>">
		<!-- BEGIN NAV -->
			<?php require 'nav.php'; ?>
		<!-- END NAV -->
		<!-- BEGIN CONTENT -->
		<div class="container">
			<div class="row">
				<div id="alerts" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
					<?php require 'config/alerts.php'; ?>
				</div>
			</div>
			<div class="row">
				<h1 class="center-text">Editar Edificios</h1>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
					<button href="agregar_edificios.php" type="button" data-toggle="modal" data-target="#modal-add" class="btn btn-primary center btn-lg btn-block">
						Agregar Edificios
					</button>
				</div>
			</div>
			<br />
			<div class="row">
				<?php display_edificios(); ?>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- Modal -->
		<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" id="edit-modal">
			    <div class="modal-content">
			      <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal">×</button>
				    <h2>Agregar Edificio</h2>
				  </div>
				<!-- The async form to send and replace the modals content with its response -->
			    <form class="form-horizontal well" data-async id="modal-form" data-target="#edit-modal" action="/agregar_edificio.php" method="POST">
				  <div class="modal-body">
				      <fieldset>
				        <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
								<input type="text" class="form-control" name="nombre" id="nombre" 
								placeholder="EDIFICIO" required>
							</div>
						</div>
				      </fieldset>
				  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			        <button type="submit" id="modal-submit" class="btn btn-primary">Guardar Cambios</button>
			      </div>
			    </form>
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

		<script>
			$(document).ready(function() {
			});
		</script>
	</body>
</html>