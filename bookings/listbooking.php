<?php
require("../connectdb.php");
      

  if (!$con){
	die("No se pudo realizar la conexión.</p>" . mysqli_connect_error());           //Se produjo un error y se finaliza la ejecución del script.
	}

  //Seleccionamos la BD.
  mysqli_select_db($con, "rbitxgdb");     
  
  // Sentencia SELECT
  $consulta = "SELECT * FROM rbitxgdb order by fecha";
  $result = mysqli_query($con, $consulta);
  
  // verificamos que no haya error 
  if (!$result){
    echo "La consulta SQL contiene errores.".mysqli_error($con);
    exit();
} else {
    echo "<h2>Listado de reservas</h2>
			<hr/>
	
	<table border='1' cellpadding='0' cellspacing='0' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
    <tr>  
      <td width='150' style='font-weight: bold'>CodAlumno</td>  
      <td width='150' style='font-weight: bold'>Nombre</td>  
      <td width='150' style='font-weight: bold'>Apellido</td>  
      <td width='150' style='font-weight: bold'>Tantos</td>
      <td width='150' style='font-weight: bold'>Puesto</td>
      <td width='150' style='font-weight: bold'>Clase</td>	  
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
        </tr>";
    }
    echo "</table>";

    mysqli_free_result($result);
}

mysqli_close($enlace);
echo "	<hr/>
    <p><input type='button' value='Atras' onClick='history.go(-1);'></p>";
?>
