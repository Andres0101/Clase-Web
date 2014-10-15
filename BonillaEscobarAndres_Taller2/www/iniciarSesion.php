<!DOCTYPE html>
<html>
<head>
	<title>Shopping online</title>
	<link rel="stylesheet" href="css/styles.css">
	<!-- Fuentes -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<meta charset="utf-8" name="viewport" content="width=device-width">
</head>
<body>
	<div id="contenedor">
		<div class="logo">
			<img src="img/logo.png" alt="logo" />
		</div>

		<div class="formulario">
			<form action="iniciarSesion.php" method="POST">
				<input type="text" name="userName" placeholder="Nombre de usuario"/>
				<input type="password" name="password" placeholder="Contraseña"/>
				<input class="iniciar" type="submit" name="inciar" value="Iniciar sesión">
			</form>
		</div>
	</div>

	<?php
		session_start();
		include_once("includes/database.php");

		//Si se presiona el botón registrar
		if(isset($_POST['inciar'])){
			$_SESSION['nombreUsuario'] = $_POST['userName'];

		    $usuario = $_POST['userName'];
		    $contraseña = $_POST['password'];

		    //Selecciona nombres de usuarios
		    $sql = "SELECT nombreUsuario FROM usuarios WHERE nombreUsuario='$usuario' AND idUsuario='$contraseña'";
		    $rec = mysqli_query($conexion, $sql);
		  
			if($existe = mysqli_fetch_object($rec)) {				
			    //Lo redirecciona a la pagina Home
	    		header('Location: home.php');
			} else {	
			    echo "<p>";
			        echo "Usuario o contraseña incorrecta.";
			    echo "</p>"; 
			}
	    }
	?>
</body>
</html>