<?php session_start();
	//Setear la sesión para saber si el usuario esta registrado, sino le vamos a decir que se registre
	if (isset($_SESSION['usuario'])) {
		# code...
		header('Location: contenido.php');
	} else {
		# code...
		header('Location: login.php');
	}
	
 ?>