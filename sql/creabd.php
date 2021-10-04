<?php
$host = "localhost";           //Variables para crear la conexión.
$user = "iawroot";
$pwd = "Asir1819";

$enlace = mysqli_connect($host, $user, $pwd);           //Creamos la conexión a la BD.

if (!$enlace){
     die("No se pudo realizar la conexión.</p>");           //Se produjo un error y se finaliza la ejecución del script.
}
echo "<p>Creando base de datos baloncesto...</p>";
$sql = "create database if not exists baloncesto";
mysqli_query($enlace, $sql);           //Creamos la BD.
echo "<p>Base de dtos creada.</p>";

mysqli_select_db($enlace, "baloncesto");           //Seleccionamos la BD recién creada.

//Creamos la tabla jugadores almacenando el código SQL en una variable.
echo "<p>Creando tabla jugadores...</p>";
	$consulta = "CREATE TABLE jugadores(
				codalumno char(7) primary key not null,
				nombre varchar(20) not null,
				apellido varchar(20) not null,
				tantos_marcados smallint unsigned default 0, 
				puesto tinyint unsigned not null,
				clase char(3) not null
				)";
          mysqli_query($enlace, $consulta);
echo "<p>Tabla jugadores creada.</p>";

//Creamos la tabla clases almacenando el código SQL en una variable.
echo "<p>Creando tabla clases...</p>";
	$consulta = "CREATE TABLE clases(
				codigo char(3) primary key not null,
				grupo varchar(20) not null,
				nombre_tutor varchar(40),
				puntuacion int unsigned,
				capitan char(7)
				)";
          mysqli_query($enlace, $consulta);
echo "<p>Tabla clases creada.</p>";		  

//Creamos la tabla puestos almacenando el código SQL en una variable.
echo "<p>Creando tabla puestos...</p>";
	$consulta = "CREATE TABLE puestos( 
				codigo tinyint(3) primary key not null auto_increment,
				nombre varchar(10) not null, 
				descripcion text null
				)";
          mysqli_query($enlace, $consulta);
echo "<p>Tabla puestos creada.</p>";		  
		  
// Insertar datos en tabla clases
echo "<p>Insertando datos en tabla clases...</p>";
	$consulta = "INSERT INTO clases VALUES 
				('E1A','1 ESO A','FEDERICO PEREZ',6,'E1A137'),
                ('E1B','1 ESO B','TERESA CANO',2,'E1B015'),
				('E2A','2 ESO A','JAVIER GONZALEZ',0,'E2A422'),
				('E2B','2 ESO B','PATRICIA SANCHEZ',4,'E2B327')";
          mysqli_query($enlace, $consulta);
echo "<p>Datos insertados en tabla clases.</p>";

// Insertar datos en tabla puestos
echo "<p>Insertando datos en tabla puestos...</p>";
	$consulta = "INSERT INTO puestos set nombre = 'BASE'";
    mysqli_query($enlace, $consulta);
	$consulta = "INSERT INTO puestos set nombre = 'ALERO'";
    mysqli_query($enlace, $consulta);
	$consulta = "INSERT INTO puestos set nombre = 'ALA-PIVOT'";
    mysqli_query($enlace, $consulta);
	$consulta = "INSERT INTO puestos set nombre = 'PIVOT'";
    mysqli_query($enlace, $consulta);
	$consulta = "INSERT INTO puestos set nombre = 'ESCOLTA'";
    mysqli_query($enlace, $consulta);
echo "<p>Datos insertados en tabla puestos.</p>";

echo "<p>Cerrando conexión a SGBD...</p>";
	mysqli_close($enlace);           //Cerramos la conexión al SGBD
echo "<p>Conexión a SGBD cerrada.</p>";
echo "<input type='button' value='Atras' onClick='history.go(-1);'>";
?>