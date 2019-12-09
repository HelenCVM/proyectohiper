<?php
session_start();
if (isset($_SESSION['isLogin'])) {
}
include '../../config/configDB.php';
$sql = "SELECT SUM(car_cantidad) AS car_cantidad FROM carrito WHERE 
    USUARIO_usu_id=" . $_SESSION['codigo'] . ";";
$result = $conn->query($sql);
$res = $result->fetch_assoc();
if ($res['car_cantidad'] > 0) {
    echo '<span>' . $res['car_cantidad'] . '</span>';
}