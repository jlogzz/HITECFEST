<?php

	require 'config/config.php';
	require 'config/sesion.php';

	$title="capitanes";

	if($staff->tipo == "capitan"){

	}else if($staff->tipo == "organizador"){
		header("location:./organizador.php");
	}else if($staff->tipo=="admin"){
		header("location:./admin.php");
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

	$puntos=$evento->withCondition(' tipo = ? ',
        array("asistencia"))->sharedPuntos;

	if(isset($_POST['selAsistencia'])){
		$selAsistencia=$_POST['selAsistencia'];
		foreach ($puntos as $punto) {
			if($selAsistencia==$punto->code){$txtAsistencia=$punto->nombre;}
		}
	}else{
		$selAsistencia=$puntos[1]->code;
		$txtAsistencia=$puntos[1]->nombre;
	}

	function display_alumnos($evento, $staff, $selAsistencia){
		
		$alumnos = R::find('alumnos',' eventos_id = :id && color = :color && edificio = :edificio',
		           array(':id' => $evento->id, ':color' => $staff->color, ':edificio' => $staff->edificio )
		         );
		foreach ($alumnos as $alumno) {
			$asistencia = R::findOne('asistencia',' alumnos_id = :id ',
			           array(':id' => $alumno->id )
			         );
			echo '
					<tr>
						<td class="center-text">'.$alumno->matricula.'</td>
						<td class="center-text">'.$alumno->codigo.'</td>
						<td class="center-text">'.$alumno->nombre.'</td>
						<td class="center-text">'.$alumno->apaterno.'</td>
						<td class="center-text">'.$alumno->amaterno.'</td>
						<td class="center-text">';
						if($asistencia->$selAsistencia==1){
							echo '<i class="fa fa-check-square-o asist" data-asist="1" data-id="'.$alumno->id.'"></i>';
						}else{
							echo '<i class="fa fa-square-o asist" data-asist="0" data-id="'.$alumno->id.'"></i>';
						}
						echo'</td>
					</tr>';
		}
	}

	function display_puntos($puntos, $selAsistencia){

		foreach ($puntos as $punto) {
			if($selAsistencia==$punto->code){
				echo '<option selected value="'.$punto->code.'">'.$punto->nombre.'</option>';
			}else{
				echo '<option value="'.$punto->code.'">'.$punto->nombre.'</option>';
			}
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
					<form action="tomar_asistencia_alumnos.php" method="POST" class="form-inline" role="form">
						<div class="form-group">
							<select class="selectpicker" name="selAsistencia" id="selAsistencia" required>
								<?php display_puntos($puntos, $selAsistencia); ?>
							</select>
						</div>	
						<button type="submit" class="btn btn-primary">Buscar</button>
					</form>		
				</div>
			</div>
			<br />
			<div class="row well">
				<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
		            <form action="#" method="get">
		                <div class="input-group">
		                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
		                    <input class="form-control" id="system-search" name="q" placeholder="Buscar" required>
		                    <span class="input-group-btn">
		                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
		                    </span>
		                </div>
		            </form>
		        </div>
		        <br />
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-1s2">
					<h2 class="center-text">Tomar asistencia de Alumnos</h2>
					<h2 class="center-text"><?= $staff->color.' - '.$staff->edificio; ?></h2>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-list-search" id="datable">
							<thead>
								<tr>
									<th class="center-text">Matricula</th>
									<th class="center-text">Codigo</th>
									<th class="center-text">Nombre</th>
									<th class="center-text">Apellido Pat.</th>
									<th class="center-text">Apellido Mat.</th>
									<th class="center-text"><?= $txtAsistencia; ?></th>
								</tr>
							</thead>
							<tbody>
								<?php display_alumnos($evento, $staff, $selAsistencia); ?>
							</tbody>
						</table>
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

				$(".asist").click(function(event) {
					var vid = $(this).data('id');
					var checkbox = $(this);
					/* Act on the event */
					if($(this).data('asist')==1){
						$(this).data('asist', 0);
						$.ajax({
							url: 'editar_asistencia_alumnos.php',
							type: 'POST',
							data: {id: vid, selAsistencia: '<?php echo $selAsistencia; ?>', asist: $(this).data('asist')},
						})
						.done(function() {
							checkbox.removeClass('fa-check-square-o');
							checkbox.addClass('fa-square-o');
							//alert("success - "+vid+" - "+checkbox.data('asist'));
						})
						.fail(function() {
							alert("Error al tomar asistencia, verifica conexion a Internet");
						})
												
					}else if($(this).data('asist')==0){
						$(this).data('asist', 1);
						$.ajax({
							url: 'editar_asistencia_alumnos.php',
							type: 'POST',
							data: {id: vid, selAsistencia: '<?php echo $selAsistencia; ?>', asist: $(this).data('asist')},
						})
						.done(function() {
							checkbox.removeClass('fa-square-o');
							checkbox.addClass('fa-check-square-o');
							//alert("success - "+vid+" - "+checkbox.data('asist'));
						})
						.fail(function() {
							alert("Error al tomar asistencia, verifica conexion a Internet");
						})
					}
				});
			});
		</script>
	</body>
</html>