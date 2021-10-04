<?php
  // iniciar sesión 
  session_start();
  if ($_SESSION['role_id']!=2){
    header('Location:index.php');
  }
  require("../connectdb.php");

if (!empty($_POST)){


  // Pasamos las variabls del formulario al array de sesión.
  $codalumno = $_POST['codalumno'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tantos = $_POST['tantos'];
  $puesto = $_POST['puesto'];
  $clase = $_POST['clase'];
  
  if (!$con){
	die("No se pudo realizar la conexión.</p>");           //Se produjo un error y se finaliza la ejecución del script.
	}

  //Seleccionamos la BD.
  mysqli_select_db($con, "rbitxgdb");     
  
  // Insertar los datos en la tabla bookings
  $query = "INSERT INTO bookings VALUES ('$codalumno','$nombre','$apellido','$tantos','$puesto','$clase')";
  if(mysqli_query($con, $query)){
    echo "Reserva realizada correctamente.";
	
} else{
    echo "ERROR: No es posible ejecucion $sql. " . mysqli_error($con);
}
  // cerrar conexión 
  mysqli_close($con); 
  echo "<br/><input type='button' value='Atras' onClick='history.go(-1);'>";
 } // fin del if
 else{
  //Seleccionamos la BD.
  mysqli_select_db($con, "rbitxgdb");     
  // Leer objetos a reservar
  $query = "SELECT * FROM objects";
  $result = (mysqli_query($con, $query))
?>
  <br />
  
  
<!-- Formulario HTML -->
  
<html>
  <head>
    <title>Formulario de reserva</title>
  </head>
  <body>
	<h2>Formulario de reserva</h2>
	<hr/>
	<form method="POST" action="<?php $PHP_SELF ?>"> <!-- forma de indicar que la acción del formulario está en el propio fichero -->
	  <p>C&oacutedigo: <input type="text" name="codalumno" placeholder="Codigo de alumno"/></p>
	  <p>Nombre: <input type="text" name="nombre" placeholder="Nombre de alumno"/></p>
	  <p>Apellido: <input type="text" name="apellido" placeholder="apellido de alumno"/></p>
	  <p>Tantos: <input type="text" name="tantos" placeholder="tantos del alumno"/></p>
	  <p>Puesto: <select name="puesto">
					<option value="1">BASE</option>
					<option value="2">ALERO</option>
					<option value="3">ALA-PIVOT</option>
					<option value="4">PIVOT</option>
					<option value="5">ESCOLTA</option>
				</select></p>
	  <p>Clase: <select name="clase">
					<option>E1A</option>
					<option>E1B</option>
					<option>E2A</option>
					<option>E2B</option>
				</select></p>
	  
	  <p><input type="submit" name="enviar" value="Reservar" /> <input type="reset" name="limpiar" value="Limpiar formulario"/></p>
	</form>
	<hr/>
    <p><input type='button' value='Atras' onClick='history.go(-1);'></p>
  </body>
</html>
<?php
	} // Fin del else
?>
