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
    <title> Lista de Usuarios</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-user-minus"></i> Lista de Usuarios Inactivos</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por cedula" onkeyup="buscar(this, 'eliminado')">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Cedula</th>
                    <th>Rol</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Fecha de Creacion</th>
                    <th>Fecha de Modificacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT * FROM Usuario WHERE usu_eliminado='S'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["usu_codigo"] . "</td>";
        echo "<td>" . $row["usu_cedula"] . "</td>";
        echo "<td>" . $row["usu_rol"] . "</td>";
        echo "<td>" . $row["usu_nombres"] . "</td>";
        echo "<td>" . $row["usu_apellidos"] . "</td>";
        echo "<td>" . $row["usu_fecha_nacimiento"] . "</td>";
        echo "<td>" . $row["usu_telefono"] . "</td>";
        echo "<td>" . $row["usu_correo"] . "</td>";
        echo "<td>" . $row["usu_fecha_creacion"] . "</td>";
        echo "<td>" . $row["usu_fecha_modificacion"] . "</td>";
        $user = serialize($row);
        $user = urlencode($user);
       
            echo '<td>
            <a class="link_activar" href="confirmar_activar_user.php?usu_codigo=' . $row["usu_codigo"] . '"><i class="fas fa-trash-restore-alt"></i> Activar </a> <br>
            </td>';
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="12" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>