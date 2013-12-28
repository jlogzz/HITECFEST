<?php
/**
	Cambiar el nombre del archivo a config.php y cambiar los valores del setup a los de la base de datos a utilizar
*/
		require 'rb.php';
		R::setup('mysql:host=hostADDR; dbname=DATABASE','USERNAME','PASSWORD');

?>