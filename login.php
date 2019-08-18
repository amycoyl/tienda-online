<!DOCTYPE html>
<html>
<head>
	<title>Tienda</title>
	<meta charset="utf-8">
	<!-- Librerías de JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<!-- <ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" href="#">Productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="cliente.php">Clientes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Carrito de compra</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><?php echo $_SESSION['Nombre']; ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Cerrar Sesion</a>
			</li>
		</ul>-->

		<h1>Inicio de Sesion</h1>

		<form name="Login" action="login.php" method="post">
			<div class="form-group">
				<label for="NombreUsuario">Nombre de Usuario:</label>
				<input type="text" class="form-control" id="NombreUsuario" name="NombreUsuario" placeholder="Ingrese el nombre de Usuario">
			</div>
			<div class="form-group">
				<label for="password">Contraseña:</label>
				<input type="text" class="form-control" id="password" name="password" placeholder="Ingrese la Contraseña">
			</div>
			
			<button type="submit" id="Iniciar" name="Iniciar" class="btn btn-primary">Iniciar</button>
		</form>
		<?php 
		include_once "conexion.php";

		if(isset($_POST['Iniciar'])){
			$Nombre = $_POST['NombreUsuario'];
			$Password = $_POST['password'];

			// Consulta SQL, seleccionamos todos los datos de la tabla y obtenemos solo
            // la fila que tiene el usario especificado
			$query = "SELECT * FROM cliente WHERE usuario_cliente='" . $Nombre . "';";
			if (!$resultado = $mysqli->query($query)) {
				echo "Error: La ejecución de la consulta falló debido a: \n";
				echo "Query: " . $query . "\n";
				echo "Errno: " . $mysqli->errno . "\n";
				echo "Error: " . $mysqli->error . "\n";
				exit;
			} else {
				if ($resultado->num_rows == 0) {
					echo "Usuario no registrado";
					exit;
				}else{
					$ArrayCarrito = array(); 
					$ResultadoConsulta = $resultado->fetch_assoc();
					if ($ResultadoConsulta['usuario_cliente'] == $Nombre) {
						if ($ResultadoConsulta['contrasenia_cliente'] == $Password) {
							session_start();
							$_SESSION['Nombre'] = $ResultadoConsulta['nombre_cliente'];
							$_SESSION['Apellido'] = $ResultadoConsulta['apellido_cliente'];
							$_SESSION['Direccion'] = $ResultadoConsulta['direccion_cliente'];
							$_SESSION['Telefono'] = $ResultadoConsulta['tel_cliente'];
							$_SESSION['NombreUsuario'] = $Nombre;
							$_SESSION['Carrito'] = $ArrayCarrito;
							//$_SESSION['Contrasenia'] = $Password;
							$_SESSION['Rol'] = $ResultadoConsulta['rol_cliente'];
							header("location:index.php");
						}
					}
				}
			}
		}
		?>
		<footer>
			<hr>
			<div>
				<strong>UMG - Morales Izabal</strong>
			</div>
			<div>
				<small>Amy C. Leiva</small>
			</div>
			<div>
				<small>&copy; - Amy C. Leiva - 2019</small>
			</div>
		</footer>
	</div>
</body>
</html>
