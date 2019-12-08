<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title>Lista de Productos</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-pallet"></i> Lista de Productos</h1>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Subtotal</th>
                    <th>Iva</th>
                    <th>Total</th>
                    <th>Metodo de pago</th>
                    <th>Tarjeta</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php

include '../config/conexionDB.php';
$sql = "SELECT f.fac_fecha,u.usu_nombres,u.usu_apellidos,f.fac_subtotal,f.fac_iva,f.fac_total,f.fac_metodoPago,f.fac_tarjeta,f.fac_estado FROM Factura f INNER JOIN Usuario u ON f.usu_codigo = u.usu_codigo WHERE f.fac_eliminado='N'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["fac_fecha"] . "</td>";
        echo "<td>" . $row["usu_nombres"] . "</td>";
        echo "<td>" . $row["usu_apellidos"] . "</td>";
        echo "<td>" . $row["fac_subtotal"] . "</td>";
        echo "<td>" . $row["fac_iva"] . "</td>";
        echo "<td>" . $row["fac_total"] . "</td>";
        echo "<td>" . $row["fac_metodoPago"] . "</td>";
        echo "<td>" . $row["fac_tarjeta"] . "</td>";
        echo "<td>" . $row["fac_estado"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="5" class="db_null"><p>No existen productos registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>