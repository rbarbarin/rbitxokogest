<?php

require("connectdbadm.php");
$sql = sprintf("insert into users (name, surname, user, password, role_id)
        values ('%s', '%s', '%s', '%s', '%s') ",
        $_GET['name'],
        $_GET['surname'],
        $_GET['user'],
        sha1($_GET['password']),
        $_GET['role_id']);

//echo $sql;
$r = mysqli_query($con, $sql);
echo $r;

?>

