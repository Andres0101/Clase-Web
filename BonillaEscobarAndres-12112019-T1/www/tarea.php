<?php

	include_once("includes/database.php");

	$result = mysqli_query($conexion,"SELECT `NombreUsuario` FROM `usuarios`");

	echo "<h1>Tarea</h1>";

	echo "<form action='http://localhost/www/includes/asignarTarea.php' method='POST'>";
		echo "<label>Titulo: </label><input type='text' name='titulo' maxlength='16'/>";
		echo "<br/><br/>";
		
		echo "<label>Descripcion: </label><input type='text' name='descripcion'/>";
		echo "<br/><br/>";
		
		echo "<label>Importancia: </label>";
		echo "<select name='importancia'>";
		   echo"<option value='Muy importante'>Muy importante</option>";
		   echo"<option value='Importante'>Importante</option>";
		   echo"<option value='Normal'>Normal</option>";
		echo"</select>";
		echo "<br/><br/>";

		echo "<label>Fecha limite: </label><input type='text' name='fecha'/>";
		echo "<br/><br/>";

		echo "<label>Dirigida a: </label><input type='text' name='destinatario'/>";
		echo "<br/><br/>";

		echo "<input type='submit' name='enviar' value='Asignar tarea'/>";
	echo "</form>";

	
	echo "<h4>Participantes a los que se le puede dirigir la nota<h4/>";
	echo "<table border='1'>
	<tr>
		<th>Nombre</th>
	</tr>";

	while($row = mysqli_fetch_array($result)) {
	  echo "<tr>";
	  echo "<td>" . $row['NombreUsuario'] . "</td>";
	  echo "</tr>";
	}

	echo "</table>";

?>