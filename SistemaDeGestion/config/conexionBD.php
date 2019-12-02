<?php
$db_servername="34.70.4.57:3389";
$db_username="root";
$db_password="importamangueras2019@";
$db_name="importmanguerasiv";

$conn= new mysqli($db_servername,$db_username,$db_password,$db_name);
$conn->set_charset("utf8");

#probar conexion
if ($conn->connect_error) {
    die("Connection Failed:".$conn->connect_error);
}else {
    echo "<p></p>";
}

?>