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
			<li class="nav-0item">
				<a class="nav-link active" href="index.php">Productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Registro de productos</a>
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
		</ul>
		
		<h1>Registro de productos</h1>

		<form name="AgregarProducto" action="productos.php" method="post">
			<div class="form-group">
				<label for="NombreProducto">Nombre producto:</label>
				<input type="text" class="form-control" id="NombreProducto" name="NombreProducto" placeholder="Ingrese el nombre del producto">
			</div>
			<div class="form-group">
				<label for="TipoProducto">Tipo de producto</label>
				<input type="text" class="form-control" id="TipoProducto" name="TipoProducto" placeholder="Ingrese el tipo del producto">
			</div>
			<div class="form-group">
				<label for="CantidadProducto">Cantidad del producto</label>
				<input type="text" class="form-control" id="CantidadProducto" name="CantidadProducto" placeholder="Ingrese la cantidad del producto">
			</div>
			<div class="form-group">
				<label for="PrecioProducto">Precio del producto</label>
				<input type="text" class="form-control" id="PrecioProducto" name="PrecioProducto" placeholder="Ingrese el precio del producto">
			</div>
			<div class="form-group">
				<label for="DetalleProducto">Detalle del Producto</label>
				<input type="text" class="form-control" id="DetalleProducto" name="DetalleProducto" placeholder="Ingrese detalle del producto">
			</div>
			<div class="form-group">
				<label for="MarcaProducto">Marca del Producto</label>
				<input type="text" class="form-control" id="MarcaProducto" name="MarcaProducto" placeholder="Ingrese marca del producto">
			</div>
			<button type="submit" id="Agregar" name="Agregar" class="btn btn-primary">Agregar</button>
		</form>
		<?php 
		include_once "conexion.php";


		if(isset($_POST['Agregar'])){
			$Nombre = $_POST['NombreProducto'];
			$Tipo = $_POST['TipoProducto'];
			$Cantidad = $_POST['CantidadProducto'];
			$Precio = $_POST['PrecioProducto'];
			$Detalle = $_POST['DetalleProducto'];
			$Marca = $_POST['MarcaProducto'];

			$query = "INSERT INTO producto(id_producto, nombre_producto, genero_producto, cantidad_producto, precio_producto, detalle_producto, marca_producto)VALUES(null,'".$Nombre."','".$Tipo."','".$Cantidad."','".$Precio."','".$Detalle."','".$Marca."');";

			if (!$resultado = $mysqli->query($query)) {
				echo "Error: La ejecución de la consulta falló debido a: \n";
				echo "Query: " . $query . "\n";
				echo "Errno: " . $mysqli->errno . "\n";
				echo "Error: " . $mysqli->error . "\n";
				exit;
			} else {
				echo "Producto registrado";
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
