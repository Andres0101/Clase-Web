<?php

	include_once("includes/database.php");

	echo "<h1>To Do List...</h1>";

	echo "<form action='' method='POST'>";
		echo "<input type='text' name='nombre' maxlength='16' placeholder='Nombre de usuario'/><br/>";
		echo "<input type='submit' name='enviar' value='Registrar'/>";
	echo "</form>";

	//Si se presiona el botón registrar
	if(isset($_POST['enviar'])){ 
	    // Evalua que el input no esté vacío
	    if($_POST['nombre'] == '') { // Si el input está vacío
	        echo 'Por favor llene el campo.'; 
	    } else { 
	        $sql = "SELECT `NombreUsuario` FROM `usuarios`"; //Selecciona nombres de usuarios
	        $rec = mysql_query($conexion, $sql); 
	        $verificar_usuario = 0; 
	  
	        while($result = mysql_fetch_object($rec)) { 
	            if($result>'usuario' == $_POST['usuario']){ //Verifica si ya existe el usuario
	                $verificar_usuario = 1; 
	            } 
	        } 
	  
	        if($verificar_usuario == 0){ //Si el usuario ingresado no existe
	                $usuario = $_POST['nombre'];
	                $sql = "INSERT INTO usuarios (NombreUsuario) VALUES ('$usuario')"; //Lo agrega a la base de datos de usuarios 
	                mysql_query($conexion, $sql); //Vuelve a llamar el query
	  
	                echo 'Registrado exitosamente.'; 
	        } else { 
	            echo 'Este usuario ya existe.'; 
	        } 
	    } 
    }


?>