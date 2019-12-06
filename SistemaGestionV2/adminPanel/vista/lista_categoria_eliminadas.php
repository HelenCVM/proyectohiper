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
    <title> Lista de Categorias Eliminadas</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-boxes"></i> Lista de Categorias Eliminadas</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por nombre" onkeyup="buscar(this, 'categoriaEliminada')">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT * FROM Categoria WHERE cate_eliminado='S'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["cate_codigo"] . "</td>";
        echo "<td>" . $row["cate_nombre"] . "</td>";

        $user = serialize($row);
        $user = urlencode($user);
            echo '<td>
            <a class="link_activar" href="confirmar_activar_categoria.php?cate_codigo=' . $row["cate_codigo"] . '"><i class="fas fa-trash-restore-alt"></i> Activar</a> <br>
            </td>';
        

        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="3" class="db_null"><p>No existen Categorias Eliminadas</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>