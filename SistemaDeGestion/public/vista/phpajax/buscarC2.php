<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';      
 $nombre = $_GET['producto'];
 //echo "Hola " . $cedula;

 $sql = "SELECT * FROM Producto WHERE pro_nombre='$nombre' and cate_codigo='8' ";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:100%'>
 <tr>
 <th>Nombre</th>
 <th>Marca</th>
 <th>Descripcion</th>
 <th>Diametro interno</th>
 <th>Peso Teorico</th> 
 <th>Presion de Trabajo</th>
 <th>Longitud</th>
 <th>Precio</th>
 <th>Stock</th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row['pro_marca'] ."</td>";
 echo " <td>" . $row['pro_descripcion'] . "</td>"; 
 echo " <td>" . $row['pro_dia_in'] . "</td>";          
 echo " <td>" . $row['pro_peso_gm'] . "</td>";
 echo " <td>" . $row['pro_presi_bar'] . "</td>";
 echo " <td>" . $row['pro_long_m'] . "</td>";
 echo " <td>" . $row['pro_precio'] . "</td>";
 echo " <td>" . $row['pro_stock'] . "</td>";       
 echo " <td><img class='perfil' src='../../../imagenes/industriales/".$row["pro_img"].".jpg' width=' 100px'
     height=' 100px'></td>";

 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>