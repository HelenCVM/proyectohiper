<?php
$db_servername="34.70.4.57";
$db_username="helen";
$db_password="helen2019@";
$db_name="importmangueras";

$conn= new mysqli($db_servername,$db_username,$db_password,$db_name);
$conn->set_charset("utf8");

#probar conexion
if ($conn->connect_error) {
    die("Connection Failed:".$conn->connect_error);
}else {
    echo "<p>Conexion Exitosa :) </p>";
}

?>