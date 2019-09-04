<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar Sesión</title>
	<!-- Fuente Externa -->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<!-- Iconos Fuente -->
	<script src="https://use.fontawesome.com/5be26d0b6b.js"></script>
	<!-- Mis estilos -->
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Iniciar Sesión</h1>
		<hr class="border"></hr>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="formulario" name="login">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>
			<!-- Alertas al usuario -->
			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php  endif; ?>
		</form>
		<p class="texto-registrate">
			¿Aun no tienes cuenta?
			<a href="registro.php">Registrarse</a>
		</p>
	</div>
</body>
</html>