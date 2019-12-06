<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM Usuario WHERE usu_cedula LIKE '" . $_GET['key'] . "%' AND usu_eliminado='S';";
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
        echo '<td colspan="10" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
} else {

}
$conn->close();
?>