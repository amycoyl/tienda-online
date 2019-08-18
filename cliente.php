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
	<?php 
		include_once "conexion.php";
		include_once "seguro.php";
		if($_SESSION['Rol'] == 1){
	 ?>
	<div class="container">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" href="index.php">Productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="productos.php">Registro de productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Clientes</a>
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
		</ul>

		<h1>Registro de  clientes</h1>

		<form name="AgregarCliente" action="index.php" method="post">
			<div class="form-group">
				<label for="NombreCliente">Nombre del cliente:</label>
				<input type="text" class="form-control" id="NombreCliente" name="NombreCliente" placeholder="Ingrese el nombre del cliente">
			</div>
			<div class="form-group">
				<label for="ApellidoCliente">Apellido del cliente</label>
				<input type="text" class="form-control" id="ApellidoCliente" name="ApellidoCliente" placeholder="Ingrese el apellido del cliente">
			</div>
			<div class="form-group">
				<label for="TelefonoCliente">Telefono del cliente</label>
				<input type="text" class="form-control" id="TelefonoCliente" name="TelefonoCliente" placeholder="Ingrese el telefono del cliente">
			</div>
			<div class="form-group">
				<label for="DireccionCliente">Direccion del cliente</label>
				<input type="text" class="form-control" id="DireccionCliente" name="DireccionCliente" placeholder="Ingrese la direccion del cliente">
			</div>
			<button type="submit" id="Agregar" name="Agregar" class="btn btn-primary">Agregar</button>
		</form>
		<?php 

		if(isset($_POST['Agregar'])){
			$Nombre = $_POST['NombreCliente'];
			$Apellido = $_POST['ApellidoCliente'];
			$Telefono = $_POST['TelefonoCliente'];
			$Direccion = $_POST['DireccionCliente'];

			$query = "INSERT INTO cliente(id_cliente, nombre_cliente, apellido_cliente, tel_cliente, direccion_cliente)VALUES(null,'".$Nombre."','".$Apellido."','".$Telefono."','".$Direccion."');";

			if (!$resultado = $mysqli->query($query)) {
				echo "Error: La ejecución de la consulta falló debido a: \n";
				echo "Query: " . $query . "\n";
				echo "Errno: " . $mysqli->errno . "\n";
				echo "Error: " . $mysqli->error . "\n";
				exit;
			} else {
				echo "Cliente registrado";
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
	<?php
		}else{
			header("location:login.php");
		}
		?>
</body>
</html>
