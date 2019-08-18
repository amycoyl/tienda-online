-- Cuando existe la bse de datos se usa la primer linea
-- cuando no existe se borra por que no tiene nada que eliminar
drop database bd_sport;

create database bd_sport;

use bd_sport;

create table carrito(
	id_carrito			integer				not null		primary key			auto_increment,
	nombre_producto		text 				not null,
	precio_producto		decimal(10,2)		not null
);

create table categoria(
	id_categoria		tinyint				not null		primary key			auto_increment,
	nombre_categoria	integer				not null
);

create table cliente(
	id_cliente			integer				not null		primary key			auto_increment,
	nombre_cliente		varchar(30)			not null,
	apellido_cliente	varchar(30)			not null,
	tel_cliente			integer				not null,
	direccion_cliente	varchar(200)		not null,
	usuario_cliente		varchar(10)			not null,
	contrasenia_cliente	varchar(10)			not null,
	rol_cliente			tinyint 			not null
);

create table factura(
	id_factura			integer				not null		primary key			auto_increment,
	fecha_factura		date 				not null,
	id_producto			integer				not null,
	detalle_factura		text				not null,
	estado_factura		text				not null
);

create table pedido(
	id_pedido			integer				not null		primary key			auto_increment,
	fecha_pedido		date 				not null,
	codigo_usuario		integer				not null,
	total_pedido		decimal(6,2)		not null
);

create table producto(
	id_producto			integer				not null		primary key			auto_increment,
	nombre_producto		text				not null,
	genero_producto		text				not null,
	cantidad_producto	integer 			not null,
	precio_producto		decimal(10,2)		not null,
	detalle_producto	text				not null,
	marca_producto		text				not null,
	imagen_producto		varchar(30)			not null
);

create table proveedor(
	id_proveedor		integer				not null		primary key			auto_increment,
	nombre_proveedor	text				not null,
	tel_proveedor		integer				not null
);

create table tienda_sport(
	id_tienda			integer				not null		primary key			auto_increment,
	direccion_tienda	text				not null,
	tel_tienda			integer				not null
);

create table usuario(
	idusuario			tinyint				not null		primary key			auto_increment,
	nombreusuario		varchar(15)			not null,
	contrasenia_usuario	varchar(15)			not null,
	rol_usuario			tinyint				not null
);
