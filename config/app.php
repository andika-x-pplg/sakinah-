<?php
include 'connect.php';
function query($q)
{
    global $db;
    return mysqli_query($db, $q);
}
?>