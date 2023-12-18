<?php
  // iniciar sesión 
  session_start();
  if ($_SESSION['rol_id']!=2){
     header('Location:../index.php');
  }
  require("../connectdb.php");
      

  if (!$con){
	die("No se pudo realizar la conexión.</p>" . mysqli_connect_error());           //Se produjo un error y se finaliza la ejecución del script.
	}

  //Seleccionamos la BD.
  mysqli_select_db($con, "rbitxgdb");     
  
  // Sentencia SELECT
  $consulta = "SELECT booking_reference,date,user_id,shift_id,obj_id,booking_note FROM bookings where date >= curdate() order by date";
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
      <td width='150' style='font-weight: bold'>Referencia</td>  
      <td width='150' style='font-weight: bold'>Fecha</td>  
      <td width='150' style='font-weight: bold'>usuario</td>  
      <td width='150' style='font-weight: bold'>Tipo</td>
      <td width='150' style='font-weight: bold'>Objeto</td>
      <td width='150' style='font-weight: bold'>Notas</td>	  
    </tr>";

    //obtenemos los datos resultado de la consulta 
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
            <td>".$row['booking_reference']."</td>
            <td>".$row['date']."</td>
            <td>".$row['user_id']."</td>
			      <td>".$row['shift_id']."</td>
			      <td>".$row['obj_id']."</td>
		      	<td>".$row['booking_note']."</td>
            </tr>";
        }
    echo "</table>";

    mysqli_free_result($result);
}

mysqli_close($con);
echo "	<hr/>
    <p><input type='button' value='Atras' onClick='history.go(-1);'></p>";
?>
