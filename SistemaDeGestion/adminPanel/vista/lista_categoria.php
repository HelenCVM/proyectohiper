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
        <h1><i class="fas fa-boxes"></i> Lista de Categorias</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por nombre" onkeyup="buscar(this, 'categoria')">
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
$sql = "SELECT * FROM Categoria WHERE cate_eliminado='N'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["cate_codigo"] . "</td>";
        echo "<td>" . $row["cate_nombre"] . "</td>";

        $user = serialize($row);
        $user = urlencode($user);
            echo '<td>
            <a class="link_delete" href="confirmar_eliminar_categoria.php?cate_codigo=' . $row["cate_codigo"] . '"><i class="fas fa-trash-alt"></i> Delete </a> <br>
            </td>';
        

        echo "</tr>";
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