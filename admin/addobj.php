<?php

require("connectdbadm.php");
$sql = sprintf("insert into objects (name, place, note, kind)
        values ('%s', '%s', '%s', '%s') ",
        $_GET['name'],
        $_GET['place'],
        $_GET['note'],
        $_GET['kind_id']);

//echo $sql;
$r = mysqli_query($con, $sql);
echo $r;

?>

