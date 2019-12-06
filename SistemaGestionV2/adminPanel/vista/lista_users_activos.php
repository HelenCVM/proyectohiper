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
    <title> Lista de Usuarios</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-user-check"></i> Lista de Usuarios Activos</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por cedula" onkeyup="buscar(this, 'index')">
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
$sql = "SELECT * FROM Usuario WHERE usu_eliminado='N'";
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
        if($row["usu_codigo"]!=1){
            echo '<td>
            <a class="link_edit" href="editar_usuario.php?user=' . $user . '"><i class="fas fa-user-edit"></i> Edit </a> <br>
            <a class="link_delete" href="confirmar_eliminar_user.php?usu_codigo=' . $row["usu_codigo"] . '"><i class="fas fa-trash-alt"></i> Delete </a> <br>
            </td>';
        }else{
            echo '<td>
            <a class="link_edit" href="editar_usuario.php?user=' . $user . '"><i class="fas fa-user-edit"></i> Edit </a> <br>
            </td>';   
        }

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