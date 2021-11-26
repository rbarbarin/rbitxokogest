<?php

require("connectdbadm.php");
$sql = sprintf("insert into objects (obj_name, place_id, kind_id, obj_description)
        values ('%s', '%s', '%s', '%s') ",
        $_GET['obj_name'],
        $_GET['place_id'],
        $_GET['kind_id'],
        $_GET['obj_description']);

//echo $sql;
$r = mysqli_query($con, $sql);
echo $r;

?>

