<!-- 

ASIR_18-19_IAW_UT06

AUTOR: Ricardo Barbarin

Archivo: modifica.php

Función del archivo:
 1. Muestra un formulario con los datos del alumno seleccionando el CodAlumno
 2. Permite modificar datos en el formulario
 3. Actualiza los datos en la tabla correspondiente. 

-->
<?php
  if (!empty($_POST)){
  // iniciar sesión 
  session_start();

  // Pasamos las variabls del formulario al array de sesión.
  $codalumno = $_POST['codalumno'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tantos = $_POST['tantos'];
  $puesto = $_POST['puesto'];
  $clase = $_POST['clase'];
  
  //Variables para crear la conexión.
  $host = "localhost";           
  $user = "iawmodusr";
  $pwd = "Asir1819";

  //Creamos la conexión a la BD.
  $enlace = mysqli_connect($host, $user, $pwd);           

	if (!$enlace){
		die("No se pudo realizar la conexión.</p>");           //Se produjo un error y se finaliza la ejecución del script.
	}
	
	//Seleccionamos la BD.
	mysqli_select_db($enlace, "baloncesto");     
	
	// Actualizar los datos en la tabla jugadores
	$consulta = "UPDATE jugadores SET nombre='$nombre',apellido='$apellido',tantos_marcados='$tantos',puesto='$puesto',clase='$clase' WHERE codalumno = '$codalumno'";
	if(mysqli_query($enlace, $consulta)){
		echo "Alumno actualziado correctamente.";
	} 
	else{
		echo "ERROR: No es posible ejecucion $sql. " . mysqli_error($enlace);
	}
  // cerrar conexión 
  mysqli_close($enlace); 
  echo "<br/><input type='button' value='Atras' onClick='history.go(-1);'>";
 } // fin del if
 else{
	// iniciar sesión 
    session_start(); 
  // Conectar a BBDD
  //Variables para crear la conexión.
  $host = "localhost";           
  $user = "iawmodusr";
  $pwd = "Asir1819";
  //Creamos la conexión a la BD.
  $enlace = mysqli_connect($host, $user, $pwd);           
  if (!$enlace){
	die("No se pudo realizar la conexión.</p>" . mysqli_connect_error());           //Se produjo un error y se finaliza la ejecución del script.
	}
  //Seleccionamos la BD.
  mysqli_select_db($enlace, "baloncesto");   
  
  //Leer variable codalumno
  $codalumno = @$_GET["codalumno"];
  
  // control 1
  // echo "CodAlumno: $codalumno" ;
  
  // Sentencia SELECT
  $consulta = "SELECT * FROM jugadores WHERE codalumno = '$codalumno'";
  /* CONTROL 2
  if(mysqli_query($enlace, $consulta)){
    echo "Alumno añadido correctamente.";
  } else{
    echo "ERROR: No es posible ejecucion $sql. " . mysqli_error($enlace);
  } */
  
  $result = mysqli_query($enlace, $consulta);
  
  // Pasamos los datos de la query a un array con un bucle while. 
	while($row = mysqli_fetch_assoc($result)) { 
	// Sacamos todas las filas de la base con el array. 
	/* //CONTROL
	echo "Nombre: "; 
	echo $row['nombre'] . " | "; 
	echo "Apellido: "; 
	echo $row['apellido'] . " | "; 
	echo "Tantos: "; 
	echo $row['tantos_marcados'] . " | "; 
	echo "Puesto: "; 
	echo $row['puesto'] . " | "; 
	echo "Clase: "; 
	echo $row['clase'] . "<br /><br />";  */
	
	// Pasmos el codalumno seleccionado a una sesión y las demás filas = campos. 
	$_SESSION['codalumno']=$codalumno; 
	$_SESSION['nombre']=$row['nombre']; 
	$_SESSION['apellido']=$row['apellido']; 
	$_SESSION['tantos_marcados']=$row['tantos_marcados']; 
	$_SESSION['puesto']=$row['puesto']; 
	$_SESSION['clase']=$row['clase']; 
} 
// En el formulario pasamos los datos en cada celda. 
  
  
?>
  <br />
  
  
<!-- Formulario HTML -->
  
<html>
  <head>
    <title>Formulario Inscrici&oacuten de jugadores - IAW UT06 - RBarbarin</title>
  </head>
  <body>
	<h2>Formulario Inscrici&oacuten de jugadores - IAW UT06 - RBarbarin</h2>
	<hr/>
	<p>C&oacutedigo de alumno: <?php echo $_SESSION['codalumno']; ?></p>
	<form method="POST" action="<?php $PHP_SELF ?>"> <!-- forma de indicar que la acción del formulario está en el propio fichero -->
	  <p><input type="hidden" name="codalumno" value="<?php echo $_SESSION['codalumno']; ?>"/></p>
	  <p>Nombre: <input type="text" name="nombre" value="<?php echo $_SESSION['nombre']; ?>"/></p>
	  <p>Apellido: <input type="text" name="apellido" value="<?php echo $_SESSION['apellido']; ?>"/></p>
	  <p>Tantos: <input type="text" name="tantos" value="<?php echo $_SESSION['tantos_marcados']; ?>"/></p>
	  <p>Puesto: <input type="text" name="puesto" value="<?php echo $_SESSION['puesto']; ?>"/></p>
	  <p>Clase: <input type="text" name="clase" value="<?php echo $_SESSION['clase']; ?>"/></p>
	  <p><input type="submit" name="enviar" value="Actualizar" /></p>
	</form>
	<hr/>
    <p><input type='button' value='Atras' onClick='history.go(-1);'></p>
  </body>
</html>
<?php
	} // Fin del else
?>