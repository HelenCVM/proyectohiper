

<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';     

if ($_GET != '') {
    $sql = "SELECT * FROM Producto  WHERE pro_nombre LIKE '" . $_GET['key'] . "%' AND cate_codigo='1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           
            echo "<tr>";            
            echo " <td>" . $row['pro_nombre'] ."</td>";
            echo " <td>" . $row['pro_marca'] ."</td>";            
            echo " <td>" . $row['pro_descripcion'] . "</td>"; 
            echo " <td>" . $row['pro_dia_in'] . "</td>";          
            echo " <td>" . $row['pro_peso_gm'] . "</td>";
            echo " <td>" . $row['pro_presi_bar'] . "</td>";
            echo " <td>" . $row['pro_long_m'] . "</td>";
            echo " <td>" . $row['pro_precio'] . "</td>";
            echo " <td>" . $row['pro_stock'] . "</td>";       
            echo " <td><img class='perfil' src='../../../imagenes/hidraulicaa/".$row["pro_img"].".jpg' width=' 100px'
                height=' 100px'></td>";
          
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo '<td colspan="8" class="db_null"><p>No existen productos registrados con ese nombre</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
    $conn->close();
}

?>
