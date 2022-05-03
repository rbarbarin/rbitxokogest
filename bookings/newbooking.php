<?php
  // iniciar sesión 
  session_start();
  if ($_SESSION['rol_id']!=2){
     header('Location:../index.php');
  }
  require("../connectdb.php");

if (!empty($_POST)){

  echo "Variable date: ".$_POST['date']."";
  // Pasamos las variabls del formulario al array de sesión.
  // $date2 = date_create($_POST['date']);
  $date2 = str_replace('-', '', $_POST['date']);
  // echo "New date format is: ".date_format($date2,"Ymd");
  settype($date2,"integer");

  $date = $_POST['date'];
  $user_id = $_SESSION['user_id'];
  settype($user_id,"integer");
  $turn_id = $_POST['turn_id'];
  settype($turn_id,"integer");
  $obj_id = $_POST['obj_id'];
  settype($obj_id,"integer");
  $booking_reference = (int) $date2.sprintf("%03d", $user_id).sprintf("%02d", $turn_id).sprintf("%02d", $obj_id);
  $booking_note = $_POST['booking_note'];
  
  echo "Variable referencia: ".$booking_reference."";
  echo "Variable date: ".$date."";



  echo "Variable user_id: ".$user_id."";
  echo "Variable turn_id: ".$turn_id."";
  echo "Variable obj_id: ".$obj_id."";
  echo "Variable booking_note: ".$booking_note."";

  if (!$con){
	die("No se pudo realizar la conexión.</p>");           //Se produjo un error y se finaliza la ejecución del script.
	}

  //Seleccionamos la BD.
  mysqli_select_db($con, "rbitxgdb");     
  
  // Insertar los datos en la tabla bookings
  $query = "INSERT INTO bookings (booking_reference,date,user_id,turn_id,obj_id,booking_note) VALUES ('$booking_reference','$date','$user_id','$turn_id','$obj_id','$booking_note')";
  if(mysqli_query($con, $query)){
    echo "Reserva realizada correctamente.";
	
} else{
    echo "ERROR: No es posible ejecucion sql. " . mysqli_error($con);
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
  <form>
  <div class="form-group">
      <label for="date">Fecha</label>
      <input type="date" class="form-control" name="date" id="date" data-date-format="YYYYMMDD">
      <small id="date" class="form-text text-muted">Selecciona una fecha.</small>
    </div>
    <div class="form-group">
      <label for="turno">Turno</label>
      </br>
      <!-- SELECT `turns`.`turn_id`, `turns`.`turn_name`, `turns`.`turn_description` FROM `rbitxgdb`.`turns`; -->
      <?php  
        if (!$con){
	        die("No se pudo realizar la conexión.</p>" . mysqli_connect_error());           //Se produjo un error y se finaliza la ejecución del script.
	        }
        //Seleccionamos la BD.
        mysqli_select_db($con, "rbitxgdb");     
        // Sentencia SELECT
        $consulta = "SELECT turn_id, turn_name, turn_description FROM turns";
        $result = mysqli_query($con, $consulta);
  
        // verificamos que no haya error 
        if (!$result){
          echo "La consulta SQL contiene errores.".mysqli_error($con);
          exit();
        } else {
          while ($row = mysqli_fetch_assoc($result)){
          echo "<p>
          <input class='form-check-input' type='radio' name='turn_id' id='turn_id' value='".$row['turn_id']."'>
	        <label class='form-check-label' for='turn_id'> ".$row['turn_name']." horas: ".$row['turn_description']." </label>
          </p>          
          ";
        }
        // mysqli_free_result($result);
        }
        // mysqli_close($con);
      ?>
    <div class="form-group">
      <label for="turno">Elementos a reservar</label>
      </br>
      <?php  
        if (!$con){
	        die("No se pudo realizar la conexión.</p>" . mysqli_connect_error());           //Se produjo un error y se finaliza la ejecución del script.
	        }
        //Seleccionamos la BD.
        mysqli_select_db($con, "rbitxgdb");     
        // Sentencia SELECT
        $consulta = "SELECT * FROM objects";
        $result = mysqli_query($con, $consulta);
  
        // verificamos que no haya error 
        if (!$result){
          echo "La consulta SQL contiene errores.".mysqli_error($con);
          exit();
        } else {
          while ($row = mysqli_fetch_assoc($result)){
          echo "<p>
          <input class='form-check-input' type='checkbox' name='obj_id' id='obj_id' value='".$row['obj_id']."'>
	        <label class='form-check-label' for='obj_id'> ".$row['obj_name']." --> ".$row['obj_description']." </label>
          </p>          
          ";
        }
        mysqli_free_result($result);
        }
        mysqli_close($con);
      ?>
    <div class="form-group">  
      <label for="booking_note" class="sr-only">Notas</label>
      <input type="text" id="booking_note" name="booking_note" class="col-md-6" placeholder="Notas">
    </div>
    <button type="submit" class="btn btn-primary">Reservar</button>
    <button type="reset" class="btn btn-primary">Limpiar formulario</button>
  </form>

	<hr/>
    <p><input type='button' value='Atras' onClick='history.go(-1);'></p>
  </body>
</html>
<?php
	} // Fin del else
?>
