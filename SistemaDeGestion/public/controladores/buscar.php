<?php
 //incluir conexión a la base de datos
 include "../../config/conexionBD.php";
 $motivo = $_GET['motivo'];
 echo "Hola " . $motivo;

 $sql = "SELECT * FROM producto WHERE pro_nombre ='$motivo' AND id_categoria=4";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Nombre</th>
 <th>Marca</th>
 <th>Stock</th>
 <th>Descripcion</th>
 <th>Precio</th>
 <th></th>
 <th></th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
 echo "<tr>";
 echo " <td>" . $row['pro_nombre'] . "</td>";
 echo " <td>" . $row['pro_marca'] ."</td>";
 echo " <td>" . $row['pro_stock'] . "</td>";
 echo " <td>" . $row['pro_descripcion'] . "</td>";
 echo " <td>" . $row['pro_precio'] . "</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='5'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>
    
