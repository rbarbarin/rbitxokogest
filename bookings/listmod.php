<!-- 

ASIR_18-19_IAW_UT06

AUTOR: Ricardo Barbarin

Archivo: listmod.php

Función del archivo:
 1. Presenta un listado de alumnos por clase 
 2. Muestra un enlace para modificar el registro deseado

-->
<?php
  //Variables para crear la conexión.
  $host = "localhost";           
  $user = "iawreadusr";
  $pwd = "Asir1819";

  //Creamos la conexión a la BD.
  $enlace = mysqli_connect($host, $user, $pwd);           

  if (!$enlace){
	die("No se pudo realizar la conexión.</p>" . mysqli_connect_error());           //Se produjo un error y se finaliza la ejecución del script.
	}

  //Seleccionamos la BD.
  mysqli_select_db($enlace, "baloncesto");     
  
  // Sentencia SELECT
  $consulta = "SELECT * FROM jugadores order by clase";
  $result = mysqli_query($enlace, $consulta);
  
  // verificamos que no haya error 
  if (!$result){
    echo "La consulta SQL contiene errores.".mysqli_error($enlace);
    exit();
} else {
    echo "<h2>Listado de alumnos para modificar - IAW UT06 - RBarbarin</h2>
			<hr/>
	
	<table border='1' cellpadding='2' cellspacing='2' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
    <tr>  
      <td width='150' style='font-weight: bold'>CodAlumno</td>  
      <td width='150' style='font-weight: bold'>Nombre</td>  
      <td width='150' style='font-weight: bold'>Apellido</td>  
      <td width='150' style='font-weight: bold'>Tantos</td>
      <td width='150' style='font-weight: bold'>Puesto</td>
      <td width='150' style='font-weight: bold'>Clase</td>	 
	  <td width='150' style='font-weight: bold'>Modificar</td>
    </tr>";

    //obtenemos los datos resultado de la consulta 
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
            <td>".$row['codalumno']."</td>
            <td>".$row['nombre']."</td>
            <td>".$row['apellido']."</td>
			<td>".$row['tantos_marcados']."</td>
			<td>".$row['puesto']."</td>
			<td>".$row['clase']."</td>
			<td><a href='modifica.php?codalumno=".$row['codalumno']."'>Modificar</td>
        </tr>";
    }
    echo "</table>";

    mysqli_free_result($result);
}

mysqli_close($enlace);
echo "	<hr/>
    <p><input type='button' value='Atras' onClick='history.go(-1);'></p>";
?>
