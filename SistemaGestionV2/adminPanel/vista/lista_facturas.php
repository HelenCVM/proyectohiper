
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
    <title> Lista de Pedidos</title>
    <script src="gene.js"></script>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-archive"></i> Lista de Pedidos</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por # Factura" onkeyup="buscar(this, 'index')">
        </form>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Fecha / Hora</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th class="textrigth">Total Factura</th>
                    <th class="textrigth">Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT f.fac_codigo,f.fac_fecha, f.fac_total,f.fac_estado, u.usu_nombres,f.usu_codigo , u.usu_apellidos FROM Factura f INNER JOIN Usuario u ON f.usu_codigo= u.usu_codigo AND f.fac_eliminado='N'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($row["fac_estado"]=='creado'){
            $estado='<span class="creado">Creada</span>';
        }elseif($row["fac_estado"]=='Aceptado'){
            $estado='<span class="aceptado">Aceptado</span>';
        }elseif($row["fac_estado"]=='EnCamino'){
            $estado='<span class="EnCamino">En Camino</span>';
        }elseif($row["fac_estado"]=='Finalizada'){
            $estado='<span class="finalizada"> Finalizada</span>';
        }elseif($row["fac_estado"]=='Rechazada'){
            $estado='<span class="rechazada"> Rechazada</span>';
        }
        echo "<tr id=".$row["fac_codigo"].">";
        echo "<td>" . $row["fac_codigo"] . "</td>";
        echo "<td>" . $row["fac_fecha"] . "</td>";
        echo "<td>" . $row["usu_nombres"] .' '.$row["usu_apellidos"]. "</td>";
        echo "<td>" . $estado . "</td>";
        echo "<td>$ " . $row["fac_total"] . "</td>";
        echo '<td>
        <button onclick="generarFactura('. $row["usu_codigo"] .','.$row["fac_codigo"].')"><i class="fas fa-eye"></i> Ver</button>
        <a class="link_delete" href="confirmar_anular_factura.php?fac_codigo='.$row["fac_codigo"].'"><i class="fas fa-minus-circle"></i> Anular </a> <br>
        </td>';
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="6" class="db_null"><p>No existen Facturas</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>