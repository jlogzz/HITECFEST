<?php

		require 'config/config.php';
		$title="registro";

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

		$validado='<h1 class="center-text">Validar Alumno</h1>';

		if(isset($_POST['matricula'])&&$_POST['matricula']!=""){
			$alumno = R::findOne('alumnos',' matricula = :param && eventos_id = :id ',
			           array(':param' => strtoupper($_POST['matricula']), ':id' => $evento->id )
			         );
			if ($alumno->id!=0) {
				$validado='
							<h4 class="center-text">Alumno: '.$alumno->nombre.' '.$alumno->apaterno.' '.$alumno->amaterno.'</h4>
							<h4 class="center-text">Matircula: '.$alumno->matricula.'</h4>
							<input type="hidden" name="cmatricula" value="'.$alumno->matricula.'">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
									<input type="text" class="form-control" name="codigo" id="codigo" data-mask="9999" placeholder="CODIGO: ####" required>
								</div>
							</div>

							<button type="submit" class="btn btn-primary btn-block">Validar</button>
				';
			}else{
				$validado='
							<h1 class="center-text">Alumno no encontrado, Pase a modulo de informacion</h1>
						  ';
			}
		}else if(isset($_POST['nombre'])){
			$idate = $_POST['month']."/".$_POST['day']."/".$_POST['year'];
			$idate = strtotime($idate);
			$date = date("d-M-Y", $idate);
			$alumno = R::findOne('alumnos', ' eventos_id = ? && nombre like ? && fecha = ?',
				array($evento->id, "%".$_POST['nombre']."%", $date));
			if ($alumno->id!=0 && $alumno->registrado==0) {
				$validado='
							<h4 class="center-text">Alumno: '.$alumno->nombre.' '.$alumno->apaterno.' '.$alumno->amaterno.'</h4>
							<h4 class="center-text">Matircula: '.$alumno->matricula.'</h4>
							<input type="hidden" name="cmatricula" value="'.$alumno->matricula.'">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
									<input type="tel" class="form-control" name="codigo" id="codigo" data-mask="9999" placeholder="CODIGO:####" required>
								</div>
							</div>

							<button type="submit" class="btn btn-primary btn-block">Validar</button>
				';
			}else if($alumno->registrado){
				$validado= '
					<h1 class="center-text">El alumno ya fue registrado.</h1>
				';
			}else{
				$validado='
							<h1 class="center-text">Alumno no encontrado, Pase a modulo de informacion</h1>
						  ';
			}
		}else if(isset($_POST['codigo'])){
			$alumno = R::findOne('alumnos',' matricula = :param && eventos_id = :id ',
			           array(':param' => strtoupper($_POST['cmatricula']), ':id' => $evento->id )
			         );
			if(!$alumno->registrado){
				if($alumno->codigo==$_POST['codigo']){
					$registrado= '
						<h1 class="center-text">El codigo ya fue utilizado.</h1>
					';
				}else{
					$seledificios=R::findOne('seledificios', 'eventos_id = ?', array($evento->id));
					$nomcolors = R::findOne('nomcolors',' eventos_id = :param ',
					           array(':param' => $evento->id )
					         );
					$nomedificios = R::findOne('nomedificios',' eventos_id = :param ',
					           array(':param' => $evento->id )
					         );
					$seledificio=$evento->seledificios;
					$selcolor=$seledificios->$seledificio;
					$alumno->registrado=true;
					$alumno->codigo=$_POST['codigo'];
					$alumno->color=$nomcolors->$selcolor;
					$alumno->edificio=$nomedificios->$seledificio;
					$color = R::findOne('colores',' nombre = :param ',
					           array(':param' => $nomcolors->$selcolor )
					         );
					$registrado= '
						<h2 class="center-text">Alumno: '.$alumno->nombre.' '.$alumno->apaterno.' '.$alumno->amaterno.'</h2>
						<h2 class="center-text">Matricula: '.$_POST['cmatricula'].'</h2>
						<h2 class="center-text">Codigo: '.$_POST['codigo'].'</h2>
						<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 col-md-offset-1 col-lg-offset1 btn-wall">
							<div class="menu-icon" style="background-color: #'.$color->hex.';">
							</div>
							<button type="button" href="#" class="btn btn-lg btn-primary btn-block">
								'.$color->nombre.'
							</button>
						</div>
					';
					if ($seledificios->$seledificio>=$evento->numcolores) {
						$seledificios->$seledificio=1;
					}else{
						$seledificios->$seledificio=($seledificios->$seledificio+1);
					}
					if($evento->seledificios>=$evento->numedificios){
						$evento->seledificios=1;
					}else{
						$evento->seledificios=$evento->seledificios+1;
					}
					R::store($alumno);
					R::store($evento);
					R::store($seledificios);
				}
			}else{
				$registrado= '
					<h1 class="center-text">El alumno ya fue registrado.</h1>
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
						<form action="./registro.php" method="POST" role="form">
							<legend class="center-text">Validar Alumno</legend>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
									<input type="text" class="form-control" name="matricula" id="matricula" data-mask="a99999999" placeholder="A0XXXXXXX">
								</div>
							</div>
							<hr noshade>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											<input type="tel" class="form-control" name="day" id="day" placeholder="dd" data-mask="99">
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											<input type="tel" class="form-control" name="month" id="month" placeholder="mm" data-mask="99">
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											<input type="tel" class="form-control" name="year" id="year" placeholder="yyyy" data-mask="9999">
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Validar</button>
						</form>
					</div>
					<div class="well">
						<form action="" method="POST" role="form">
							<legend class="center-text">Registro</legend>
							
							<?php echo $validado; ?>


						</form>
					</div>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
					<div class="well">
						<?php echo $registrado; ?>
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