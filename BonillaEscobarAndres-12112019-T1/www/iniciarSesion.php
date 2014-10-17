<?php
session_start();
include_once("includes/database.php");

echo "<h1>To Do List...</h1>";

echo "<form action='iniciarSesion.php' method='POST'>";
echo "<input type='text' name='nombre' maxlength='16' placeholder='Nombre de usuario'/><br/>";
echo "<input type='submit' name='iniciar' value='Iniciar sesion'/>";
echo "</form>";

//Si se presiona el botón iniciar sesion
if(isset($_POST['iniciar'])){
	$_SESSION['NombreUsuario'] = $_POST['nombre'];

	$usuario = $_POST['nombre'];

	//Selecciona nombres de usuarios
	$sql = "SELECT `NombreUsuario` FROM `usuarios` WHERE NombreUsuario='$usuario'";
	$rec = mysqli_query($conexion, $sql);

	if($existe = mysqli_fetch_object($rec)) {				
		//Si el usuario ya esta registrado lo redirecciona a su perfil
		header('Location: perfil.php');
	} else {	
		//Si el usuario no esta registrado entonces...
		echo "<p>";
		echo "Usuario incorrecto.";
		echo "</p>"; 
	}
}

?>