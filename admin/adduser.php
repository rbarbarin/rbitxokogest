<?php

require("connectdbadm.php");

if (!$con){
	die("No se pudo realizar la conexión.</p>" . mysqli_connect_error());           //Se produjo un error y se finaliza la ejecución del script.
	}

  //Seleccionamos la BD.
  mysqli_select_db($con, "rbitxgdb");     
  
  // Sentencia SELECT
  $sql = sprintf("insert into users (user, password, rol_id, name, surname, email )
  values ('%s', '%s', '%s', '%s', '%s', '%s') ",
  $_GET['user'],
  sha1($_GET['password']),
  $_GET['rol_id'],
  $_GET['name'],
  $_GET['surname'],
  $_GET['email']
  );

  //echo $sql;
  $r = mysqli_query($con, $sql);
 
  
  // verificamos que no haya error 
  if (!$r){
    echo "La consulta SQL contiene errores.".mysqli_error($con);
    exit();
} else {
    echo "<h2>Añadido user</h2>
			<hr/>";
        echo $r;
}









?>

