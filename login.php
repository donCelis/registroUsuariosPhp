<?php session_start();

//Setear el inicio se sesión
	if (isset($_SESSION['usuario'])) {
		# code...
		header('Location: index.php');
	}

	$errores = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
		# code...
		$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
		$password = $_POST['password'];
		$password = hash('sha512', $password);

		try{
				$conexion = new PDO ('mysql:host=localhost;dbname=login', 'root', 'root');
			}catch(PDOException $e){
				echo 'Error:'.$e->getMessage();
			}
			//ejecutar una consulta preparada, verificar si hay en la base de datos, si esxiste nuestro usuario


			$estado = $conexion->prepare('
				SELECT * FROM usuarios WHERE usuario = :usuario AND pass =:password');
			$estado->execute(array(
				':usuario' => $usuario,
				':password' => $password
			));
			//Resultado de la ejecución
			$resultado = $estado->fetch();

			//Si el resultado = verdadero entonces inicie sesión
			if ($resultado != false) {
				# code...
				$_SESSION['usuario'] = $usuario;
				header('Location: index.php');
			} else {
				# code...
				$errores.= '<li><i class="fa fa-exclamation-circle"></i>Datos incorrectos</li>';
			}
			
	}
	require_once 'vistas/login.view.php';
?>