<?php
session_start();
if (isset($_SESSION['isLogin'])) {

    header("Location: ../../index.php");
}
include '../../config/configDB.php';

$nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
$apellido = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
$fecha = $_POST["fechaNac"];
$email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
$date = date(date("Y-m-d H:i:s"));
$pass=$_POST["pass"];

$sql = "INSERT INTO Usuario  VALUES ( 0,'$cedula','user',
    '$nombre', '$apellido','$fecha','$telefono', '$email', MD5('$pass'),'N','$date',null);";

if ($conn->query($sql) == true) {
    header("Location: ../view/successful.php?register=true");
} else {
    if ($conn->errno == 1062) {
        header("Location: ../view/successful.php?register=false&error=1062");
    } else {
        echo mysqli_error($conn);
        header("Location: ../view/successful.php?register=false&error=" . mysqli_error($conn));
    }
}
$conn->close();
?>  

