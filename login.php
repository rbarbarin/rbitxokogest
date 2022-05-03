<?php
// Conectar a la base de datos
session_start();
require("connectdb.php");

echo "rbiuser.php";
$username = $_POST['username'];
$password = $_POST['password'];
// $sql = "SELECT u.id, r.name AS role, password FROM users u INNER JOIN roles r ON r.id = u.role_id WHERE username = '$username';";
$sql = sprintf("select * from users where user='%s' and password = '%s'", $_POST['username'], sha1($_POST['password']));

// $data = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL."Consulta SQL: ".$sql.PHP_EOL."-------------------------".PHP_EOL;
// $pathToFile = 'rbilog.log';
// file_put_contents($pathToFile, $data, FILE_APPEND);


// ejecutar la consulta
$query = mysqli_query($con, $sql);

$fila = mysqli_fetch_assoc($query);
$encontrados = mysqli_num_rows($query);

if ($encontrados >= 1){
	$_SESSION['name'] = $fila['name'];
	$_SESSION['user'] = $fila['user'];
	$_SESSION['rol_id'] = $fila['rol_id'];
	$_SESSION['user_id'] = $fila['user_id'];
	if ($_SESSION['rol_id']==1){
      file_put_contents('rbilog.log', date("Y-m-d, H:i")." Login: ".$_SESSION['user'].' - Nivel de acceso: Admin '.PHP_EOL."-------".PHP_EOL, FILE_APPEND);
		header('Location:admin/rbiadmin.php');	
	}
	else if ($_SESSION['rol_id']==2){
      file_put_contents('rbilog.log', date("Y-m-d, H:i")." Login: ".$_SESSION['user'].' - Nivel de acceso: User '.PHP_EOL."-------".PHP_EOL, FILE_APPEND);
		header('Location:index.php');	
	}
}
else{
	header('Location:loginerror.php');
}

?>

