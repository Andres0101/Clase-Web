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
							<form action="home.php" method="POST">
								<input class="cerrar" type="submit" name="cerrarSesion" value="Cerrar Sesion">
							</form>
						</div>
					</li>
				</ul>
			</nav>
		</header>
	</div>

	<div id="productos">
		<div class="header">
			<h3>Productos destacados</h3>
			<a href="carroCompras.php">
				<img src="img/carrito.png" alt="carrito"/>
			</a>
		</div>
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

			//Selecciona el nombre y id del usuario que esta en la sesion
			$query0 = "SELECT usuarios.nombreUsuario, usuarios.idUsuario
				FROM usuarios
				WHERE usuarios.nombreUsuario='".$idUser."'";

			$resultQuery0 = mysqli_query($conexion, $query0);

			while($otheRow0 = mysqli_fetch_array($resultQuery0)) {
				//Obtiene el id del usuario
				$idUsuario = $otheRow0['idUsuario'];
			}


			//Si se ha seleccionado un producto entonces...
			if($_GET != null) {
				$idProductoSeleccionado = $_GET['idProducto'];

				//Agrega al carrito el producto que el usuario seleccionó
				$agregarProducto = "INSERT INTO `carrito`(`idUsuario`, `idProducto`)
					VALUES ('".$idUsuario."', '".$idProductoSeleccionado."')";
					
				$resultadoAgregar = mysqli_query($conexion, $agregarProducto);
			}

			$r = array();

			//Selecciona los productos destacados
			$destacados = "SELECT productos.nombreProducto, productos.descripcionProducto, productos.imagenProducto
				FROM productos WHERE favorito='1'";
			$result = mysqli_query($conexion, $destacados);

			$i = 0;
			//Recorre la seleccion   
		   	while($row = mysqli_fetch_array($result)) {
		   		$r[] = $row;

			   	echo "<article>";
					echo "<div class='contenido'";
						echo "<figure>";
							echo"<img class='imagen' src='".$r[$i]['imagenProducto']."'/>";				
						echo"</figure>";				

					    echo "<h4>".$r[$i]['nombreProducto']."</h4>";
					    echo "<p>".$r[$i]['descripcionProducto']."</p>";

					    //Selecciono el nombre de los productos destacados
					    $query = "SELECT productos.idProducto, productos.nombreProducto
							FROM productos WHERE productos.nombreProducto='".$r[$i]['nombreProducto']."'";
						$resultQuery = mysqli_query($conexion, $query);

						while($otheRow = mysqli_fetch_array($resultQuery)) {
							//Obtengo el id de los productos
							$idProducto = $otheRow['idProducto'];
						}

						echo "<div class='contenido2'>";							
							echo "<a href='home.php?idProducto=".$idProducto."'>"; //Escribe en la url el id del producto
								echo "<img src='img/carrito2.png' alt='carritoCompra'/>";
							echo "</a>";
						echo "</div>";

					echo "</div>";
				echo "</article>";

			    //Suma el indicador para que cada vez que recorra la seleccion salte a la siguiente fila
			    $i++;
		    };
	?>
	</div>
</body>
</html>