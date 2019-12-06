<?php
session_start();
include '../../config/configDB.php';
if (isset($_SESSION['codigo'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    } else {
        $sqlRatP = "SELECT cali_valoracion
            FROM Producto pro, Calificaciones rat, Usuario usu
            WHERE pro.pro_codigo = rat.pro_codigo AND
            usu.usu_codigo = rat.usu_codigo AND
            pro.pro_eliminado='N' AND
            usu.usu_codigo=" . $_SESSION['codigo'] . " AND
            pro.pro_codigo=" . $_GET['prodID'] . ";";
        $resultRatP = $conn->query($sqlRatP);
        $resultCal = $resultRatP->fetch_assoc();
        if ($resultRatP->num_rows > 0) {
            echo 'Ya se a calificado con ' . $resultCal['cali_valor'];
        } else {
            $sql = "INSERT INTO Calificacion VALUE (0, " . $_GET['prodID'] . ",
            " . $_GET['rat'] . ",
            'jhjh',
            " . $_SESSION['codigo'] . ",'N'
        );";
            if ($conn->query($sql)) {
                echo  $_GET['rat'];
            } else {
                echo 'Error al calificar';
            }
        }
    }
} else {
    header("Location: ../login.php");
}