<?php
/*session_start();
if (isset($_SESSION['isLogin'])) {
        if ($_SESSION['rol'] == 'admin') {
                header("Location: ../../admin/view/index.php");
        }
} else {
        header("Location: ../../../index.php");
}*/
include '../config/conexionDB.php';
//if (isset($_GET['fac'])) { }
$fac_codigo=$_GET['fac'];
$sql="SELECT * FROM Factura f INNER JOIN Usuario u ON f.usu_codigo=u.usu_codigo INNER JOIN Direccion d ON u.usu_codigo= d.usu_codigo WHERE f.fac_codigo=$fac_codigo";
$sqlDirUser = $conn->query($sql);
$sqlDirUser = $sqlDirUser->fetch_assoc();
$dirEnd = $sqlDirUser['dir_calle_principal'] . ', ' . $sqlDirUser['dir_calle_secundaria'] . ', ' . $sqlDirUser['ciu_nombre'] . ', ' . $sqlDirUser['pro_nombre'].',Ecuador';
$dirStart = "Calle Mariscal Lamar, Manuel Vega, Cuenca, Ecuador";
echo '<input id="start" type="hidden" name="" value="' . $dirStart . '">';
echo '<input id="end" type="hidden" name="" value="' . $dirEnd . '">';