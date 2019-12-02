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
    <title>Productos Eliminados</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-archive"></i> Lista de Productos Eliminados</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por Nombre" onkeyup="buscar(this, 'productoEliminado')">
        <input type="submit" value="Buscar" class="btn_search">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php

include '../config/conexionDB.php';
$sql = "SELECT p.pro_codigo,c.cate_nombre, p.pro_nombre , p.pro_img FROM Producto p INNER JOIN Categoria c ON p.cate_codigo = c.cate_codigo WHERE p.pro_eliminado='S'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($row["pro_img"]!="img_producto.png"){
            $foto='../img/uploads/'.$row["pro_img"];

        }else{
            $foto='../img/'.$row["pro_img"];
        }
        echo "<tr>";
        echo "<td>" . $row["pro_codigo"] . "</td>";
        echo "<td>" . $row["cate_nombre"] . "</td>";
        echo "<td>" . $row["pro_nombre"] . "</td>";
        echo "<td><img class='img_producto'src=" . $foto . " alt=".$row["cate_nombre"]."></td>";
        echo '<td>
        <a class="link_activar" href="confirmar_activar_producto.php?pro_codigo=' . $row["pro_codigo"] . '"><i class="fas fa-trash-restore-alt"></i> Activar </a> <br>
        </td>';
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="5" class="db_null"><p>No existen productos Discontinuados</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>