<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
   // header("Location: admin_login.php");
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
        <h1><i class="fas fa-boxes"></i> Lista de Comentario</h1>
        

        <table>
            <thead>
                <tr>
                     <th>Codigo</th>
                    <th>Producto</th>
                    <th>Valor de Estrella</th>
                    <th>Comentarios</th>
                
                 
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT * FROM Comentarios c INNER JOIN Producto p ON c.pro_codigo=p.pro_codigo;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        
        echo "<td>" . $row["com_codigo"] . "</td>";
        echo "<td>" . $row["pro_nombre"] . "</td>";
        
        echo "<td>" . $row["com_cali"] . "</td>";
        echo "<td>" . $row["com_comentario"] . "</td>";

        $user = serialize($row);
        $user = urlencode($user);

        echo '<td>
        <a class="link_delete" href="confirmar_eliminar_comentario.php?comentario_codigo=' 
        . $row["com_codigo"] . '"><i class="fas fa-trash-alt"></i> Delete </a> <br>
        </td>';
    

    echo "</tr>";
    
    }
} else {
    echo "<tr>";
    echo '<td colspan="3" class="db_null"><p>No existen Comentarios</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>