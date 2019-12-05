<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT p.pro_codigo,c.cate_nombre, p.pro_nombre , p.pro_img,p.pro_eliminado 
    FROM Producto p INNER JOIN Categoria c ON p.cate_codigo = c.cate_codigo WHERE p.pro_nombre LIKE '" 
    . $_GET['key'] . "%' AND p.pro_eliminado='N'";
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
            <a class="link_add" href="update_user.php?user=">Agregar</a> <br>
            <a class="link_edit" href="update_user.php?user=">Editar</a> <br>
            <a class="link_delete" href="confirmar_eliminar_producto.php?pro_codigo=' . $row["pro_codigo"] . '">Eliminar </a> <br>
            </td>';
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo '<td colspan="5" class="db_null"><p>No existen productos registrados con ese nombre</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
    $conn->close();
} else {

}

?>