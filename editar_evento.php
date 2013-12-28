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
		}else{
			$fecha="Enero-".(idate("Y")+1);
		}
	}

	$evento = R::load('eventos', $_GET['id']);

	function display_colores($evento, $i){
		
		$colores = R::findAll('colores');
		$nomcolors = R::findOne('nomcolors',' eventos_id = :param ',
		           array(':param' => $evento->id )
		         );

		foreach ($colores as $color) {

			if($color->nombre == $nomcolors->$i && $i <= $evento->numcolores){
				echo '
						<option selected value="'.$color->nombre.'">'.$color->nombre.'</option>
				     ';
			}else{
				echo '
						<option value="'.$color->nombre.'">'.$color->nombre.'</option>
				     ';
			}
		}
	}

	function display_selcolores($evento){
		$colores = R::findAll('colores');
		$i=0;

		foreach($colores as $color){
			$i++;
			echo'
					<div class="form-group">
						<label class="label-evento">Color '.$i.':</label>
						<select class="selectpicker" name="color'.$i.'" id="color'.$i.'" >
							<option value="">Selecciona un Color</option>
						    ';display_colores($evento, $i); echo'
						</select>
					</div>
				';
		}
	}

	function display_edificios($evento, $i){
		
		$edificios = R::findAll('edificios');
		$nomedificios = R::findOne('nomedificios',' eventos_id = :param ',
		           array(':param' => $evento->id )
		         );

		foreach ($edificios as $edificio) {
			if($edificio->nombre == $nomedificios->$i && $i <= $evento->numedificios){
				echo '
						<option selected value="'.$edificio->nombre.'">'.$edificio->nombre.'</option>
				     ';
			}else{
				echo '
						<option value="'.$edificio->nombre.'">'.$edificio->nombre.'</option>
				     ';
			}
		}
	}

	function display_seledificios($evento){

		$edificios = R::findAll('edificios');
		$i=0;

		foreach ($edificios as $edificio) {
			$i++;
			echo'
					<div class="form-group">
						<label class="label-evento">Edificio '.$i.':</label>
						<select class="selectpicker" name="edificio'.$i.'" id="edificio'.$i.'" >
							<option value="">Selecciona un Edificio</option>
						    ';display_edificios($evento, $i); echo'
						</select>
					</div>
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
				<h1 class="center-text">Editar Evento - <?= $evento->fecha; ?></h1>
			</div>
			<br />
			<div class="row well">
				<form action="editar_nuevo_evento.php" method="POST" role="form">
					<input type="hidden" name="id" value="<?= $evento->id; ?>">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">#</span>
									<input type="tel" class="form-control" name="numcolor" id="numcolor" value="<?= $evento->numcolores; ?>" placeholder="Numero de Colores" required>
								</div>
							</div>
							<?php display_selcolores($evento); ?>
						</div>				
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">#</span>
									<input type="tel" class="form-control" name="numedificio" id="numedificio" value="<?= $evento->numedificios; ?>" placeholder="Numero de Edificios" required>
								</div>
							</div>
							<?php display_seledificios($evento); ?>
						</div>	
						<button type="submit" class="btn btn-primary">EDITAR</button>			
					</div>
				</form>						
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
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
		<script>
			$('.selectpicker').selectpicker();
			$(document).ready(function() {
			    var activeSystemClass = $('.list-group-item.active');

			    //something is entered in search form
			    $('#system-search').keyup( function() {
			       var that = this;
			        // affect all table rows on in systems table
			        var tableBody = $('.table-list-search tbody');
			        var tableRowsClass = $('.table-list-search tbody tr');
			        $('.search-sf').remove();
			        tableRowsClass.each( function(i, val) {
			        
			            //Lower text for case insensitive
			            var rowText = $(val).text().toLowerCase();
			            var inputText = $(that).val().toLowerCase();
			            if(inputText != '')
			            {
			                $('.search-query-sf').remove();
			                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Buscando: "'
			                    + $(that).val()
			                    + '"</strong></td></tr>');
			            }
			            else
			            {
			                $('.search-query-sf').remove();
			            }

			            if( rowText.indexOf( inputText ) == -1 )
			            {
			                //hide rows
			                tableRowsClass.eq(i).hide();
			                
			            }
			            else
			            {
			                $('.search-sf').remove();
			                tableRowsClass.eq(i).show();
			            }
			        });
			        //all tr elements are hidden
			        if(tableRowsClass.children(':visible').length == 0)
			        {
			            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No se encontraron resultados.</td></tr>');
			        }
			    });

				//$('#datable').dataTable();
			});
		</script>
	</body>
</html>