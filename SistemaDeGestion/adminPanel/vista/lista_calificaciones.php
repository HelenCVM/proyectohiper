<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} elseif ($_SESSION['rol'] == 'user') {
    header("Location: #");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title> Lista de Categorias</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-boxes"></i> Lista de Comentario</h1>
        

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Valor de Estrella</th>
                    <th>Comentarios</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT pro_nombre,cali_valor,cali_comentario FROM Calificaciones c,Producto p WHERE c.pro_codigo=p.pro_codigo;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["pro_nombre"] . "</td>";
        echo "<td>" . $row["cali_valor"] . "</td>";
        echo "<td>" . $row["cali_comentario"] . "</td>";

        $user = serialize($row);
        $user = urlencode($user);
    }
} else {
    echo "<tr>";
    echo '<td colspan="3" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>