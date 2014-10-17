<?php

include_once("includes/database.php");

// Selecciona todos los nombres de los usuario
$usuarios = "SELECT `NombreUsuario` FROM `usuarios`";

$result = mysqli_query($conexion, $usuarios);

echo "<h1>Tarea</h1>";

echo "<form action='tarea.php' method='POST'>";
echo "Titulo: <input type='text' name='titulo' />";
echo "<br/><br/>";

echo "Descripcion: <input type='text' name='descripcion' />";
echo "<br/><br/>";

echo "Fecha: <input type='date' name='fecha' />";
echo "<br/><br/>";

echo "Prioridad: <input type='text' name='prioridad' placeholder='(alta, media o baja)'/>";
echo "<br/><br/>";

echo "Destinatario: <input type='text' name='destinatario' />";
echo "<br/><br/>";

echo "<input type='submit' name='asignar' value='Asignar'/>";
echo "</form>";

echo "<br/><br/><br/>";


echo "<h4>Participantes a los que se le puede otorgar tareas<h4/>";
echo "<table border='1'>";

while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" . $row['NombreUsuario'] . "</td>";
	echo "</tr>";
}

echo "</table>";

//Si se presiona el botón asignar entonces...
if(isset($_POST['asignar'])){
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$fecha = $_POST['fecha'];
	$prioridad = $_POST['prioridad'];
	$destinatario = $_POST['destinatario'];

	//Selecciona nombre de usuario que sea igual al que se puesto como destinatario en la tarea
	$sql = "SELECT `NombreUsuario` FROM `usuarios` WHERE NombreUsuario='$destinatario'"; 
	$rec = mysqli_query($conexion, $sql);

	//Verifica si ya existe el usuario
	if($existe = mysqli_fetch_object($rec)){

		//Agrega a la base de datos de tareas la tarea asignada.
		$sql = "INSERT INTO `tareas`(`NombreTarea`, `descripcion`, `fecha`, `prioridad`, `destinatario`) VALUES ('$titulo','$descripcion','$fecha','$prioridad','$destinatario')"; 
		$insertar = mysqli_query($conexion, $sql);

		//Selecciona el id de la tarea agregada
		$idNota = "SELECT `idTarea` FROM `tareas` WHERE NombreTarea='$titulo'";
		$resultadoId = mysqli_query($conexion, $idNota);

		//Selecciona el id del usuario a quien va dirigida la tarea
		$idDestinatario = "SELECT `idUsuario` FROM `usuarios` WHERE NombreUsuario='$destinatario'";
		$resultadoIdDestinatario = mysqli_query($conexion, $idDestinatario);

		//Recorre la primera seleccion
		if($row = mysqli_fetch_array($resultadoId)){
			//Obtiene el id de la tarea asignada
			$id = $row['idTarea'];
		}

		//Recorre la segunda seleccion
		if($rowDos = mysqli_fetch_array($resultadoIdDestinatario)){
			//Obtiene el id del usuario puesto como destinatario
			$idUser = $rowDos['idUsuario'];
		}

		//Agrega a la base de datos de tareasdeusuarios.
		$sql0 = "INSERT INTO `tareasdeusuarios`(`idUsuario`, `idTarea`) VALUES ('".$idUser."','".$id."')"; 
		$agregar = mysqli_query($conexion, $sql0);

		if($agregar) {
			//Lo redirecciona a la pagina de iniciar sesion
			header('Location: perfil.php');
		} else {
			echo "Error al asignar nota.";
		}
	} else {
		//Si el usuario puesto como destinatario no existe entonces...
		echo "<p>";
		echo "El usuario ".$destinatario." no existe";
		echo "</p>";
	}

}

?>