<?php

include_once("includes/database.php");

echo "<h1>To Do List...</h1>";

echo "<form action='index.php' method='POST'>";
echo "<input type='text' name='nombre' maxlength='16' placeholder='Nombre de usuario'/><br/>";
echo "<input type='submit' name='registrar' value='Registrar'/>";
echo "<input type='submit' name='iniciar' value='Iniciar sesion'/>";
echo "</form>";

//Si se presiona el botón registrar
if(isset($_POST['registrar'])){
	$usuario = $_POST['nombre'];

	//Selecciona nombre de usuario
	$sql = "SELECT `NombreUsuario` FROM `usuarios` WHERE NombreUsuario='$usuario'"; 
	$rec = mysqli_query($conexion, $sql);

	//Evalua si el campo est vacio
	if ($_POST['nombre'] == '') {
		echo "<p>";
		echo "Por favor llene el campo.";
		echo "</p>";
	} else {
		//Verifica si ya existe el usuario
		if($existe = mysqli_fetch_object($rec)){ 
			//Si ya existe el usuario entonces...
			echo "<p>";
			echo "El usuario ".$usuario." ya existe";
			echo "</p>";
		} else {
			//Si el usuario no existe entonces...
			$usuario = $_POST['nombre'];

			//Lo agrega a la base de datos de usuarios.
			$sql = "INSERT INTO `usuarios`(`NombreUsuario`) VALUES ('$usuario')"; 
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
if (isset($_POST['iniciar'])) {
	//Lo redirecciona a la pagina de iniciar sesion
	header('Location: iniciarSesion.php');
}
?>