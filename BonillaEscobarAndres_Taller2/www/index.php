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
			<form action="index.php" method="POST">
				<input type="text" name="userName" placeholder="Nombre de usuario"/>
				<input type="password" name="password" placeholder="Contraseña"/>
				<input class="registrar" type="submit" name="registrar" value="Registrar">
				<img src="img/o.png" alt="o" />
				<input class="iniciar" type="submit" name="inciar" value="Iniciar sesión">
			</form>
		</div>
	</div>

	<?php
		include_once("includes/database.php");

		//Si se presiona el botón registrar
		if(isset($_POST['registrar'])){
		    $usuario = $_POST['userName'];
		    $contraseña = $_POST['password'];

		    $sql = "SELECT nombreUsuario FROM usuarios WHERE nombreUsuario='$usuario'"; //Selecciona nombres de usuarios
		    $rec = mysqli_query($conexion, $sql);
		  
		    //Evalua si los campos están vacios
		    if ($_POST['userName'] == '' || $_POST['password'] == '') {
		    	echo "<p>";
		    		echo "Por favor llene ambos campos.";
		    	echo "</p>";
		    } else {
		    	//Verifica si ya existe el usuario
			    if($existe = mysqli_fetch_object($rec)){ 
			        echo "<p>";
			        	echo "El usuario ".$usuario." ya existe";
			        echo "</p>";
			    } else {
			    	$usuario = $_POST['userName'];
			    	$contraseña = $_POST['password'];

			    	//Lo agrega a la base de datos de usuarios.
			        $sql = "INSERT INTO `usuarios`(`nombreUsuario`, `idUsuario`) VALUES ('$usuario','$contraseña')"; 
			        $insertar = mysqli_query($conexion, $sql);
			  			
			  		if($insertar) {
			        	echo "<p>";
			        		echo "Registrado exitosamente";
			        	echo "</p>";
			  		} else {
			  			echo "Error al registrar usuario.";
			  		}
			    }
		    }
	    }

	    //Si presiona el boton de inicar sesión
	    if (isset($_POST['inciar'])) {
	    	//Lo redirecciona a la pagina de iniciar sesion
	    	header('Location: iniciarSesion.php');
	    }
	?>
</body>
</html>