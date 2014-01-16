<?php

	require 'rb.php';
	R::setup('mysql:host=50.63.234.73; dbname=hitecdb','hitecdb','Sauali!123');

	$amarillo=0;
	$verde=0;
	$rojo=0;
	$morado=0;
	$rosa=0;
	$ale=0;
	$bib=0;
	$ciap=0;
	$rectoria=0;

	$alumnos = R::findAll('alumnos');
	foreach ($alumnos as $alumno) {
		if($alumno->color=="AMARILLO"){
			$amarillo++;
		}else if($alumno->color=="VERDE"){
			$verde++;
		}else if($alumno->color=="ROJO"){
			$rojo++;
		}else if($alumno->color=="MORADO"){
			$morado++;
		}else if($alumno->color=="ROSA"){
			$rosa++;
		}

		if($alumno->edificio=="ALE"){
			$ale++;
		}else if($alumno->edificio=="BIB"){
			$bib++;
		}else if($alumno->edificio=="CIAP"){
			$ciap++;
		}else if($alumno->edificio=="RECTORIA"){
			$rectoria++;
		}
	}

	$total=$amarillo+$verde+$rojo+$morado+$rosa;

	echo "TOTAL: ".+$total."<br />";

	echo "amarillo: ".+$amarillo."<br />";
	echo "verde: ".+$verde."<br />";
	echo "rojo: ".+$rojo."<br />";
	echo "morado: ".+$morado."<br />";
	echo "rosa: ".+$rosa."<br />";

	echo "ale: ".+$ale."<br />";
	echo "bib: ".+$bib."<br />";
	echo "ciap: ".+$ciap."<br />";
	echo "rectoria: ".+$rectoria."<br />";

?>