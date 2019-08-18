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
		include_once "seguro.php";
		include_once "conexion.php";
		if($_SESSION['Rol'] == 1 || $_SESSION['Rol'] == 2){
	?>
	<div class="container">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" href="#">Productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="productos.php">Registro de productos</a>
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

		<h1>Productos</h1>

		<div class="panel panel-primary">
			<div class="table-responsive">          
				<table class="table table-hover table-striped">
					<!-- Título -->
					<thead>
						<!-- Contenido -->
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Nombre del producto</th>
							<th class="text-center">Genero</th>
							<th class="text-center">Precio del producto</th>
							<th class="text-center">Detalle de producto</th>
							<th class="text-center">Marca del producto</th>
						</tr>
					</thead>
					<!-- Cuerpo de la tabla -->
					<tbody>
						<?php 

						// Hacemos la consulta
						$VerProductos = "Select * from producto";

						$Resultado = $mysqli->query($VerProductos);

						while ($row = mysqli_fetch_array($Resultado)) {
							?>
							<tr>
								<td><span id="id_producto<?php echo $row['id_producto']; ?>"><?php echo $row['id_producto'] ?></span></td>
								<td><span id="nombre_producto<?php echo $row['id_producto']; ?>"><?php echo $row['nombre_producto'] ?></span></td>
								<td><span id="genero_producto<?php echo $row['id_producto']; ?>"><?php echo $row['genero_producto'] ?></span></td>
								<td><span id="precio_producto<?php echo $row['id_producto']; ?>"><?php echo $row['precio_producto'] ?></span></td>
								<td><span id="detalle_producto<?php echo $row['id_producto']; ?>"><?php echo $row['detalle_producto'] ?></span></td>
								<td><span id="marca_producto<?php echo $row['id_producto']; ?>"><?php echo $row['marca_producto'] ?></span></td>
								<td>
									<div>
										<div class="input-group input-group-lg">
											<form action=index.php method="post">
												<button type="submit" class="btn btn-primary AgregarCarrito" value="<?php echo $row['id_producto']; ?>" name="Agregar" id="Agregar">Agregar al carrito</span></button>
											</form>
										</div>
									</div>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Datos para el pago</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="panel panel-primary">
							<div class="table-responsive">          
								<table class="table table-hover table-striped">
									<!-- Título -->
									<thead>
										<!-- Contenido -->
										<tr>
											<th class="text-center">Nombre</th>
											<th class="text-center">Apellido</th>
											<th class="text-center">Teléfono</th>
											<th class="text-center">Dirección</th>
										</tr>
									</thead>
									<!-- Cuerpo de la tabla -->
									<tbody>
										<tr>
											<td><span></span><?php echo $_SESSION['Nombre']; ?></td>
											<td><span></span><?php echo $_SESSION['Apellido']; ?></td>
											<td><span></span><?php echo $_SESSION['Telefono']; ?></td>
											<td><span></span><?php echo $_SESSION['Direccion']; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<h5 class="modal-title" id="exampleModalLongTitle">Detalle de compra</h5>
							<div class="table-responsive">          
								<table class="table table-hover table-striped">
									<!-- Título -->
									<thead>
										<!-- Contenido -->
										<tr>
											<th class="text-center">Nombre del producto</th>
											<th class="text-center">Genero</th>
											<th class="text-center">Precio del producto</th>
											<th class="text-center">Detalle de producto</th>
											<th class="text-center">Marca del producto</th>
										</tr>
									</thead>
									<!-- Cuerpo de la tabla -->
									<tbody>
										<?php 
									// Contador para que recorra el array
										$Contador = 0;
									// Cantidad de elementos del array
										$CantidadElemento = count($_SESSION['Carrito']);
									// Primero recorremos el array que se encuentra en la sesión
										while ($Contador != $CantidadElemento) {
										// Almacenamos el valor del id en una variable										
											$idProducto = $_SESSION['Carrito'][$Contador];
										// Hacemos la consulta pero esta vez de un producto en específico
											$VerProducto = "Select * from producto where id_producto = " . $idProducto;

											$Resultados = $mysqli->query($VerProducto);

											while ($row = mysqli_fetch_array($Resultados)) {
												?>
												<tr>
													<td><span id="nombre_producto<?php echo $row['id_producto']; ?>"><?php echo $row['nombre_producto'] ?></span></td>
													<td><span id="genero_producto<?php echo $row['id_producto']; ?>"><?php echo $row['genero_producto'] ?></span></td>
													<td><span id="precio_producto<?php echo $row['id_producto']; ?>"><?php echo $row['precio_producto'] ?></span></td>
													<td><span id="detalle_producto<?php echo $row['id_producto']; ?>"><?php echo $row['detalle_producto'] ?></span></td>
													<td><span id="marca_producto<?php echo $row['id_producto']; ?>"><?php echo $row['marca_producto'] ?></span></td>
												</tr>
												<?php
											}
											$Contador++;
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success" data-dismiss="modal">Pagar</button>
					</div>
				</div>
			</div>
		</div>
		<?php 
		if(isset($_POST['Agregar'])){
			array_push($_SESSION['Carrito'], $_POST['Agregar']);
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
