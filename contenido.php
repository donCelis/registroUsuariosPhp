<?php session_start();
	//
	#
	/* Setear la sesión= preguntar si hay una sesión iniciada de cualquier usuario */
	if (isset($_SESSION['usuario'])) {
		# code...
		require_once 'vistas/contenido.view.php';
	} else {
		# code...
		header('Location: login.php');
	}

	
 ?>