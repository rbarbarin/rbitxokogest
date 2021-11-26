<?php
  // iniciar sesión 
  session_start();
  if ($_SESSION['rol_id']!=2){
     header('Location:../index.php');
  }
  require("../connectdb.php");

if (!empty($_POST)){


  // Pasamos las variabls del formulario al array de sesión.
  $booking_reference = $_POST['booking_reference'];
  $date = $_POST['date'];
  $user_id = $_SESSION['user_id'];
  $shift_id = $_POST['shift_id'];
  $obj_id = $_POST['obj_id'];
  $booking_note = $_POST['booking_note'];
  
  if (!$con){
	die("No se pudo realizar la conexión.</p>");           //Se produjo un error y se finaliza la ejecución del script.
	}

  //Seleccionamos la BD.
  mysqli_select_db($con, "rbitxgdb");     
  
  // Insertar los datos en la tabla bookings
  $query = "INSERT INTO bookings VALUES ('$booking_reference','$date','$user_id','$shift_id','$obj_id','$booking_note')";
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
  <form>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Example input placeholder">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <!-- Elegir turno -->
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
      <label class="form-check-label" for="exampleRadios1">
        Default radio
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
      <label class="form-check-label" for="exampleRadios2">
        Second default radio
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
      <label class="form-check-label" for="exampleRadios3">
        Disabled radio
      </label>
    </div>


    <!-- elegir objetos -->
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
      <label class="form-check-label" for="defaultCheck1">
        Default checkbox
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
      <label class="form-check-label" for="defaultCheck2">
        Disabled checkbox
      </label>
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
