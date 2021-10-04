<!-- 

ASIR_18-19_IAW_UT06

AUTOR: Ricardo Barbarin

Archivo: infousr.php

Función del archivo:
 1. Muestra información de los usuarios 

-->
<?php
  //Variables para crear la conexión.
  $host = "localhost";           
  $user = "iawroot";
  $pwd = "Asir1819";

  //Creamos la conexión a la BD.
  $enlace = mysqli_connect($host, $user, $pwd);           

  if (!$enlace){
	die("No se pudo realizar la conexión.</p>" . mysqli_connect_error());           //Se produjo un error y se finaliza la ejecución del script.
	}

  //Seleccionamos la BD.
  mysqli_select_db($enlace, "baloncesto");     
  
  // Sentencia SELECT
  $consulta = "SELECT * FROM  INFORMATION_SCHEMA.USER_PRIVILEGES where grantee LIKE '%iaw%'";
  $result = mysqli_query($enlace, $consulta);
  
  // verificamos que no haya error 
  if (!$result){
    echo "La consulta SQL contiene errores.".mysqli_error($enlace);
    exit();
} else {
     echo "	<h2>INFORMATION_SCHEMA.USER_PRIVILEGES - IAW UT06 - RBarbarin</h2>
			<hr/>
	 
	<table border='1' cellpadding='1' cellspacing='1' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
    <tr>  
      <td width='150' style='font-weight: bold'>GRANTEE</td>  
      <td width='150' style='font-weight: bold'>TABLE_CATALOG</td>  
      <td width='150' style='font-weight: bold'>PRIVILEGE_TYPE</td>  
      <td width='150' style='font-weight: bold'>IS_GRANTABLE</td> 
    </tr>";

    //obtenemos los datos resultado de la consulta 
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
            <td>".$row['GRANTEE']."</td>
            <td>".$row['TABLE_CATALOG']."</td>
            <td>".$row['PRIVILEGE_TYPE']."</td>
			<td>".$row['IS_GRANTABLE']."</td>
        </tr>";
    }
    echo "</table>";

    mysqli_free_result($result);
}

mysqli_close($enlace);
echo "	<hr/>
    <p><input type='button' value='Atras' onClick='history.go(-1);'></p>";
?>
