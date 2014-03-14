<?php
	session_start();
	require('../conexion/class.php');
	require('../conexion/conf.php');

	$session_creada;

        //si esta vacio
	if(empty($_SESSION['valid_user'])) {   //mostramos formulario para autenticar
	    $session_creada=array('session_creada'=>false,'success'=>true);
	} else {   //si existe mostramos index para registrados
	    $session_creada=array('session_creada'=>true,'success'=>true);
	}

	// Codificar los datos.
	$json = json_encode($session_creada);
	echo $json;
?>
