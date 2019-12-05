<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM Categoria WHERE cate_nombre LIKE '" . $_GET['key'] . "%' AND cate_eliminado='N';";
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
        echo '<td colspan="3" class="db_null"><p>No existen Categorias con ese nombre</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
} else {

}
$conn->close();
?>