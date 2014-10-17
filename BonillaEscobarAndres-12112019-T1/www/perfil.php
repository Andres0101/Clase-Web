<?php

	include_once("includes/database.php");
	session_start();

	echo "<h1>Perfil</h1>";
	echo "</p>";
	echo "Bienvenid@ ".$_SESSION['NombreUsuario'].".";
	echo "</p>";

	echo "</p>";
	echo "Estas son tus notas asignadas por los otros usuarios.";
	echo "</p>";

	$idUser = $_SESSION['NombreUsuario'];

	//Realiza una busqueda en la tres tablas de base de datos y selecciona el nombre de usuario, nombre tarea, descripcion, fecha y prioridad
	//teniendo en cuenta el id del usuario que acabo de iniciar sesion
	$tareas = "SELECT usuarios.NombreUsuario, tareas.NombreTarea, tareas.descripcion, tareas.fecha, tareas.prioridad FROM tareas
		JOIN tareasdeusuarios ON tareasdeusuarios.idTarea=tareas.idTarea
		JOIN usuarios ON usuarios.idUsuario=tareasdeusuarios.idUsuario
		WHERE usuarios.NombreUsuario='$idUser'";

	$result = mysqli_query($conexion, $tareas);

	echo "<table border='1'>
	<tr>
		<th>Nombre</th>
		<th>Tarea</th>
		<th>Fecha limite</th>
		<th>Prioridad</th>
	</tr>";

	//Recorre la seleccion
	while($row = mysqli_fetch_array($result)) {
		//Realiza una tabla con los datos obtenidos
		echo "<tr>";
		echo "<td>" . $row['NombreUsuario'] . "</td>";
		echo "<td>" . $row['NombreTarea'] . "</td>";
		echo "<td>" . $row['fecha'] . "</td>";
		echo "<td>" . $row['prioridad'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
	echo "</br>";

	echo "<form action='perfil.php' method='POST'>";
		echo "<input type='submit' name='asignar' value='Asignar tarea'/>";
	echo "</form>";

//Si presiona el boton de asignar tarea
if (isset($_POST['asignar'])) {
	//Lo redirecciona a la pagina de tareas
	header('Location: tarea.php');
}

?>