<?php session_start();
	//Setear el inicio de sesión
	if (isset($_SESSION['usuario'])) {
		# code...
		header('Location: index.php');
	}

	#Recibiendo los datos del formulario
	//Si el metodo es igual a post
	//Vamos a llamar los datos del name y los vamos a guardar en variables, las vamos a convertir en minuscula, comparar las contraseñas
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		# code...
		$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);

		$password = $_POST['password'];

		$password2 = $_POST['password2'];

		#echo $usuario . $password . $password2;

		$errores= '';

		//Validar los datos recibidos del formulario registro.php
		if (empty($usuario) or empty($password) or empty($password2)) {
			# code...
			//publicar los errores desde la variable errores
			$errores .= '<li><i class="fa fa-exclamation-circle"></i>Por favor rellena todos los campos correctamente</li>';
		} else {
			# code...
			try{
				$conexion = new PDO ('mysql:host=localhost;dbname=login', 'root', 'root');
			}catch(PDOException $e){
				echo 'Error:'.$e->getMessage();
			}
			
			//Ejecutar las consultas a la base datos
			//:usuario pertenece al name del input del campo Usuario
			$estado = $conexion->prepare('SELECT * FROM usuarios WHERE usuario =:usuario LIMIT 1');
			//Asignarle un array al estado del usuario
			$estado->execute(array(':usuario' => $usuario));

			#fecth = asignarle las posiciones a los nombres de la variable usuarios
			$resultado = $estado->fetch();
			if ($resultado != false) {
				# code...
				$errores .= '<li><i class="fa fa-exclamation-circle"></i>El nombre de usuario ya existe</li>';
			}
			//Encriptar las contraseñas
			$password = hash('sha512', $password);
			$password2 = hash('sha512', $password2);

			if ($password != $password2) {
				# code...
				$errores .= '<li><i class="fa fa-exclamation-circle"></i>Las contraseñas no coinciden</li>';
			}
		}
		//Si todo esta correcto entonces procedemos a guardar los datos del formulario en nuestra base de datos.
		if ($errores == '') {
			# code...
			$estado = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');

				$estado->execute(array(
						':usuario'=>$usuario,
						':pass'=>$password
					));
				header('Location: login.php');
		}
	}

	require_once 'vistas/registro.view.php';						 

?>