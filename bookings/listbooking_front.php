<?php
  // iniciar sesión 
  // session_start();
  if ($_SESSION['rol_id']!=2){
     header('Location:login-form.php');
  }
  require("connectdb.php");
      

  if (!$con){
	die("No se pudo realizar la conexión.</p>" . mysqli_connect_error());           //Se produjo un error y se finaliza la ejecución del script.
	}

  //Seleccionamos la BD.
  mysqli_select_db($con, "rbitxgdb");     
  
  // Sentencia SELECT
  $consulta = "select bookings.date, turns.turn_name, users.user, objects.obj_name, bookings.booking_note from bookings inner join turns inner join users inner join objects where bookings.turn_id = turns.turn_id and bookings.user_id = users.user_id and bookings.obj_id =objects.obj_id and bookings.date >= date order by bookings.date";
  // $consulta = "SELECT booking_reference,date,user_id,turn_id,obj_id,booking_note FROM bookings order by date";
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
      <td width='150' style='font-weight: bold'>Fecha</td>  
      <td width='150' style='font-weight: bold'>Turno</td>  
      <td width='150' style='font-weight: bold'>Reservado por...</td>
      <td width='150' style='font-weight: bold'>Reservado</td>
      <td width='150' style='font-weight: bold'>Notas</td>	  
    </tr>";

    //obtenemos los datos resultado de la consulta 
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
            <td>".$row['date']."</td>
            <td>".$row['turn_name']."</td>
            <td>".$row['user']."</td>
			      <td>".$row['obj_name']."</td>
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
