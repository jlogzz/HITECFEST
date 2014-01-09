<?php

	require 'config/config.php';
	require 'config/sesion.php';

	$title=$user->tipo;

	if($user->tipo == "capitan"){
		header("location:./capitan.php");
	}else if($user->tipo == "organizador"){
		header("location:./organizador.php");
	}else if($user->tipo=="admin" || $user->tipo=="ch"){
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

	function display_staff($fecha){
		
		$staffs = R::find('staff',' fecha = :param ',
		           array(':param' => $fecha )
		         );
		foreach ($staffs as $staff) {
			$asistencia=R::load("asistencia",$staff->ownAsistencia_id);
			echo '
					<tr>
						<td>'.$staff->tipo.'</td>
						<td>'.$staff->matricula.'</td>
						<td>'.$staff->nombre.'</td>
						<td>'.$staff->apaterno.'</td>
						<td>'.$staff->amaterno.'</td>';
						if($asistencia->capacitacion1){
							echo'<td class="center-text"><i class="fa fa-check-square-o"></i></td>';
						}else{
							echo'<td class="center-text"><i class="fa fa-square-o"></i></td>';
						}
						if($asistencia->capacitacion2){
							echo'<td class="center-text"><i class="fa fa-check-square-o"></i></td>';
						}else{
							echo'<td class="center-text"><i class="fa fa-square-o"></i></td>';
						}
						if($asistencia->dia1){
							echo'<td class="center-text"><i class="fa fa-check-square-o"></i></td>';
						}else{
							echo'<td class="center-text"><i class="fa fa-square-o"></i></td>';
						}
						if($asistencia->dia2){
							echo'<td class="center-text"><i class="fa fa-check-square-o"></i></td>';
						}else{
							echo'<td class="center-text"><i class="fa fa-square-o"></i></td>';
						}
						if($asistencia->dia3){
							echo'<td class="center-text"><i class="fa fa-check-square-o"></i></td>';
						}else{
							echo'<td class="center-text"><i class="fa fa-square-o"></i></td>';
						}
					echo '</tr>';
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
					<form action="ver_registros_staff.php" method="POST" class="form-inline" role="form">
						<div class="form-group">
							<select class="selectpicker" name="fecha" id="fecha" required>
							    <option value="Enero-2014">Enero-2014</option>
							    <option value="Mayo-2014">Mayo-2014</option>
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
		        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">		                
		                <div class="input-group">
		                	<a class="btn btn-primary" type="button" target="new" 
				            	href="./config/crear_excel.php?asistenciaStaff=true&reporte=AsistenciaStaff&fecha=<?= $fecha; ?>">
				            	GENERAR EXCEL
			            	</a>
		                </div>
		        </div>
		        <br />
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-1s2">
					<h1 class="center-text">Asistencia Staff de: <?= $fecha; ?></h1>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-list-search" id="datable">
							<thead>
								<tr>
									<th class="center-text">Tipo</th>
									<th class="center-text">Matricula</th>
									<th class="center-text">Nombre</th>
									<th class="center-text">Apellido Pat.</th>
									<th class="center-text">Apellido Mat.</th>
									<th class="center-text">Capacitacion 1</th>
									<th class="center-text">Capacitacion 2</th>
									<th class="center-text">Dia 1</th>
									<th class="center-text">Dia 2</th>
									<th class="center-text">Dia 3</th>
								</tr>
							</thead>
							<tbody>
								<?php display_staff($fecha); ?>
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
			});
		</script>
	</body>
</html>