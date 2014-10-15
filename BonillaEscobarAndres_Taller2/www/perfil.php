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
	<div class="head">
		<header>
			<nav id="navUno">
				<ul>
					<li>
						<figure class="logomenu">
							<img src="img/logoMenu.png" alt="logoMenu"/>
						</figure>
					</li>
					<li>
						<figure>
							<a href="home.php">
								<img src="img/home.png" alt="home"/>
								<p>inicio</p>
							</a>
						</figure>
					</li>
					<li>
						<figure>
							<a href="catalogo.php">
								<img src="img/catalogo.png" alt="catalogo"/>
								<p>Catalogo</p>
							</a>
						</figure>
					</li>
				</ul>
			</nav>
			<nav id="navDos">
					<li>
						<figure>
							<a href="perfil.php">
								<img src="img/usuario.png" alt="usuario"/>
								<?php
									session_start();
									echo "</p>".$_SESSION['nombreUsuario']."</p>";
								?>
							</a>
						</figure>
					</li>
					<li>
						<div class="formularioDos">
							<form action="perfil.php" method="POST">
								<input class="cerrar" type="submit" name="cerrarSesion" value="Cerrar Sesion">
							</form>
						</div>
					</li>
				</ul>
			</nav>
		</header>
	</div>

	<div id="productos">
		<h3>Productos comprados</h3>
		<hr>

		<?php
			include_once("includes/database.php");

			//Si se presiona el boton de cerrar sesión.
			if(isset($_POST['cerrarSesion'])){
				session_start();
				setcookie(session_name(), '', 100); //Elimina todas las cookies
				session_unset();
				session_destroy();
				$_SESSION = array(); //Vuelve vacia la sesión

				//Lo redirecciona a la pagina de registro
	    		header('Location: index.php');
			}

			$idUser = $_SESSION['nombreUsuario'];

			//Selecciona el nombre y id del usuario que está en la sesion
			$query0 = "SELECT usuarios.nombreUsuario, usuarios.idUsuario
				FROM usuarios
				WHERE usuarios.nombreUsuario='".$idUser."'";

			$resultQuery0 = mysqli_query($conexion, $query0);

			while($otheRow0 = mysqli_fetch_array($resultQuery0)) {
				//Obtiene el id del usuario
				$idUsuario = $otheRow0['idUsuario'];
			}

			$r = array();

			//Selecciona los productos comprados del usuario
			$productosCarrito = "SELECT productos.nombreProducto, productos.descripcionProducto, productos.imagenProducto, compras.fecha FROM productos
				JOIN compras ON compras.idProducto=productos.idProducto
				JOIN usuarios ON compras.idUsuario=usuarios.idUsuario
				WHERE usuarios.idUsuario='".$idUsuario."'";

			$resultCarrito = mysqli_query($conexion, $productosCarrito);

			$i = 0;
			//Recorre la seleccion   
		   	while($row = mysqli_fetch_array($resultCarrito)) {
		   		$r[] = $row;

			   	echo "<article>";
					echo "<div class='contenido'";
						echo "<figure>";
							echo"<img class='imagen' src='".$r[$i]['imagenProducto']."'/>";				
						echo"</figure>";				

					    echo "<h4>".$r[$i]['nombreProducto']."</h4>";
					    echo "<p>".$r[$i]['descripcionProducto']."</p>";
					    echo "<p>"."Fecha de compra: ".$r[$i]['fecha']."</p>";

					echo "</div>";
				echo "</article>";

			    //Suma el indicador para que cada vez que recorra la seleccion salte a la siguiente fila
			    $i++;
		    };
	?>
	</div>
</body>
</html>