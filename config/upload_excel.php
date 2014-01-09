<?php
	require('excelreader.php');
	require('config.php');

	//header('Content-Type: text/html; charset=utf-8');

	// ExcelFile($filename, $encoding);
	$data = new Spreadsheet_Excel_Reader();


	// Set output Encoding.
	$data->setOutputEncoding('CP1251');

	echo "Cargando Excel a base de datos...";
	
	$evento=R::load('eventos',$_POST['id']);
	$uploaddir = './uploads/';
	$uploadfile = $uploaddir . basename($_FILES['ufile']['name']);
	if (move_uploaded_file($_FILES['ufile']['tmp_name'], $uploadfile)) {
	    echo "File is valid, and was successfully uploaded.\n";
		echo $uploadfile;
		$data->read($uploadfile);
		for($i=2;$i<= $data->sheets[0]['numRows'];$i++){
			$alumno=R::dispense('alumnos');
			$alumno->nombre=$data->sheets[0]['cells'][$i][1];
			$alumno->apaterno=$data->sheets[0]['cells'][$i][2];
			$alumno->amaterno=$data->sheets[0]['cells'][$i][3];
			$alumno->matricula=$data->sheets[0]['cells'][$i][4];
			$alumno->fecha=$data->sheets[0]['cells'][$i][5];
			$alumno->carrera=$data->sheets[0]['cells'][$i][6];
			$alumno->registrado=false;
			$alumno->edificio;
			$alumno->color;
			$asistencia = R::dispense('asistencia');		
			$alumno->ownAsistencia[]=$asistencia;
			R::store($alumno);
			$evento->ownAlumnos[]=$alumno;
		}
		R::store($evento);
		
		echo "<script>window.close();</script>";
	} else {
	    echo "Possible file upload attack!\n";
	}

?>