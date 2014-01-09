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

	if(isset($_GET['id'])){
		$evento = R::load('eventos', $_GET['id']);
		$fecha = $evento->fecha;
	}else{
		header("Location:./admin.php");
	}

	function display_staff($fecha, $evento){
		
		$staffs = R::find('staff',' fecha = :param && tipo = "capitan" ',
		           array(':param' => $fecha )
		         );
		foreach ($staffs as $staff) {
			echo '
					<tr>
						<td class="center-text">'.$staff->matricula.'</td>
						<td class="center-text">'.$staff->nombre.'</td>
						<td class="center-text">'.$staff->apaterno.'</td>
						<td class="center-text">'.$staff->amaterno.'</td>
						<td class="center-text">'.$staff->carrera.'</td>
						<td class="center-text">'.$staff->telefono.'</td>
						<td class="center-text">
							<select class="selectpicker" name="color'.$staff->id.'" id="color">
								<option value="">Selecciona un color</option>';
							    display_colores($evento, $staff);
						echo'
							</select>
						</td>
						<td class="center-text">
							<select class="selectpicker" name="edificio'.$staff->id.'" id="edificio">
							    <option value="">Selecciona un color</option>';
							    display_edificios($evento, $staff);
						echo'
							</select>
						</td>
					</tr>
			     ';
		}
	}

	function display_colores($evento, $staff){
		$colores = R::findOne('nomcolors',' eventos_id = :param ',
		           array(':param' => $evento->id )
		         );
		for ($i = 1; $i <= $evento->numcolores; $i++) { 
			# code...
			echo '<option '; 
				if($staff->color==$colores->$i){echo 'selected';}
			echo ' value="'.$colores->$i.'">'.$colores->$i.'</option>';
		}
	}

	function display_edificios($evento, $staff){
		$edificios = R::findOne('nomedificios',' eventos_id = :param ',
		           array(':param' => $evento->id )
		         );
		for ($i = 1; $i <= $evento->numedificios ; $i++) { 
			# code...
			echo '<option ';
				if($staff->edificio==$edificios->$i){echo 'selected';}
			echo ' value="'.$edificios->$i.'">'.$edificios->$i.'</option>';
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
				            	href="./config/crear_excel.php?reporte=RegistroStaff&fecha=<?= $fecha; ?>">
				            	GENERAR EXCEL
			            	</a>
		                </div>
		        </div>
		        <br />
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-1s2">
				<form action="editar_capitanes.php" method="POST">
					<input type="hidden" name="id" value="<?= $evento->id; ?>">
					<h1 class="center-text">Capitanes de: <?= $fecha; ?></h1>
					<button type="submit" class="btn btn-primary btn-lg center">Guardar</button>
					<br />
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-list-search" id="datable">
							<thead>
								<tr>
									<th class="center-text">Matricula</th>
									<th class="center-text">Nombre</th>
									<th class="center-text">Apellido Pat.</th>
									<th class="center-text">Apellido Mat.</th>
									<th class="center-text">Carrera</th>
									<th class="center-text">Telefono</th>
									<th class="center-text">Color</th>
									<th class="center-text">Edificio</th>
								</tr>
							</thead>
							<tbody>
								<?php display_staff($fecha, $evento); ?>
							</tbody>
						</table>
					</div>
				</form>
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- Modal -->
		<div class="modal fade" id="modal-borrarStaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">BORRAR STAFF</h4>
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

				$(".btn-borrar-staff").click(function(event) {
					/* Act on the event */
					var id = $(this).data('staff');
					var txt = $(this).data('txt');
					$("#btn-borrar").attr('href', './borrar_staff.php?id='+id);
					$("#borrar-txt").html("¿Estás seguro que deseas borrar el registro de "+txt+ "?");
					//alert($("#btn-borrar").attr('href'));
				});

				//$('#datable').dataTable();
			});
		</script>
	</body>
</html>