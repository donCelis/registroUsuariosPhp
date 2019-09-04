<?php session_start();
		//Terminar una sesion
		session_destroy();
		//Limpiar la sesión y dejar en ceros
		$_SESSION= array();

		header('Location: index.php');
		die();
 ?>