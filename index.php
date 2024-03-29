<?php
session_start();
if ($_SESSION['rol_id']!=2){
  header('Location:login-form.php');
}
// echo "rbiuser.php";
// include ("header.php");
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="RBI SysAdmin">
    <title>RBI-Txokogest v0.1 - Txokogalea</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
          }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/navbar.css" rel="stylesheet">
  </head>
  <body>
  
  <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">RBI - Txokogest</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="rbiuser.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bookings/listbooking.php">Reservas activas</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Reservas</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown04">
              <li><a class="dropdown-item" href="bookings/newbooking.php">Hacer reserva</a></li>
              <li><a class="dropdown-item" href="bookings/modifybooking.php">Modificar reserva</a></li>
              <li><a class="dropdown-item" href="bookings/delbooking.php">Eliminar reserva</a></li>
            </ul>
          </li>
        </ul>
        <p style="color:white">
        <?php
          echo "User: ".$_SESSION['user']." .";
          echo "User ID: ".$_SESSION['user_id']." .";
         ?>
         </p>
        <a href="logout.php" class="btn btn-warning">Logout</a>
      </div>
    </div>
  </nav>
  <script src="js/bootstrap.bundle.min.js"></script>

  
  </body>
</html>
<?php
include ("bookings/listbooking_front.php");
echo " <br/>";
include ("footer.php");
?>