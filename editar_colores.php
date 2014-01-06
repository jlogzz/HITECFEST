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

	function display_colores(){
		
		$colores = R::findAll('colores');

		foreach ($colores as $color) {
			echo '
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
						<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
							<div class="menu-icon" style="background-color: #'.$color->hex.';">
							</div>
							<button type="button" href="#" class="btn btn-lg btn-primary btn-block"
								data-toggle="modal" data-target="#modal-'.$color->nombre.'">
								'.$color->nombre.'
							</button>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="modal-'.$color->nombre.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" id="edit-modal">
						    <div class="modal-content">
						      <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h2>Editar Color: '.$color->nombre.'</h2>
							  </div>
							<!-- The async form to send and replace the modals content with its response -->
						    <form class="form-horizontal well" data-async id="modal-form" data-target="#edit-modal" action="/editar_color.php" method="POST">
							  <input type="hidden" name="id" value="'.$color->id.'" >
							  <div class="modal-body">
							    
							      <fieldset>
							        <div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">COLOR</span>
											<input type="text" class="form-control" name="nombre" id="nombre" 
											placeholder="COLOR" value="'.$color->nombre.'" required>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">HEX</span>
											<input type="text" class="form-control pick-a-color" 
												value="#'.$color->hex.'" name="hex" id="hex" required>
										</div>
									</div>
							      </fieldset>
							  </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						        <button type="submit" id="modal-submit" class="btn btn-primary">Guardar Cambios</button>
						        <a href="./borrar_color.php?id='.$color->id.'" type="button" class="btn btn-danger">Borrar</a>
						      </div>
						    </form>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->  
					</div><!-- /.modal -->

			     ';
		}
	}

	function display_edificios(){
		
		$edificios = R::findAll('edificios');

		foreach ($edificios as $edificio) {
			echo '
					<option value="'.$edificio->nombre.'">'.$edificio->nombre.'</option>
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
		<link href="./css/bootstrap-colorpicker.min.css" rel="stylesheet">
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
				<h1 class="center-text">Editar Colores</h1>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
					<button href="agregar_colores.php" type="button" data-toggle="modal" data-target="#modal-add" class="btn btn-primary center btn-lg btn-block">
						Agregar Colores
					</button>
				</div>
			</div>
			<br />
			<div class="row">
				<?php display_colores(); ?>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- Modal -->
		<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" id="edit-modal">
			    <div class="modal-content">
			      <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal">×</button>
				    <h2>Agregar Color</h2>
				  </div>
				<!-- The async form to send and replace the modals content with its response -->
			    <form class="form-horizontal well" data-async id="modal-form" data-target="#edit-modal" action="/agregar_color.php" method="POST">
				  <div class="modal-body">
				      <fieldset>
				        <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">COLOR</span>
								<input type="text" class="form-control" name="nombre" id="nombre" 
								placeholder="COLOR" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">HEX</span>
								<input type="text" class="form-control pick-a-color" 
									name="hex" placeholder="#000000" id="hex" required>
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
		<script src="js/bootstrap-colorpicker.min.js"></script>

		<script>
			$(document).ready(function() {
					$(".pick-a-color").colorpicker();
			});
		</script>
	</body>
</html>