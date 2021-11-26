<?php
session_start();
if ($_SESSION['rol_id']!=1){
  header('Location:../index.php');
}

echo "rbiADMIN.php";
?>