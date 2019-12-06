<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../../../public/css/globalStyle.css">
    <script src="../js/funciones.js"></script>
    <title>Historial</title>
</head>

<body>
    <header>
        <?php
        include("../../../global/php/headerPublicUser.php");
        ?>
    </header>

    <div class="container">
        <header>
            <?php
            include("../../../global/php/headerUser.php");
            ?>
        </header>
        <section>
            <h2>Historial de compras</h2>
            <div class="cardContent">
                <article>
                    <table>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Codigo</td>
                                <td>Metodo de pago</td>
                                <td>Total</td>
                                <td>
                                    <select id="selectStatus" onchange="status(this)">
                                        <option value="pendiente">todo</option>
                                        <option value="pendiente">pendiente</option>
                                        <option value="enviado">entregado</option>
                                    </select>
                                </td>
                                <td>Fecha</td>
                                <td></td>

                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="10">
                                    <div class="links">
                                        <a href="#"><i class="fas fa-angle-left"></i></a>
                                        <a class="active" href="#">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#"><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>

                        <tbody id="tableHistory">
                            <?php
                            include '../../../config/configDB.php';
                            $sql = "SELECT * FROM Factura
                                    WHERE usu_codigo=" . $_SESSION['codigo'] . " AND
                                    fac_eliminado='N'
                                    ORDER BY 1 DESC;";

                            $result = $conn->query($sql);
                            $i = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['fac_codigo'] ?></td>
                                <td><?php echo $row['fac_metodoPago'] ?></td>
                                <td>$<?php echo $row['fac_total'] ?></td>
                                <?php
                                        if ($row['fac_estado'] == 'pendiente') {
                                            echo "<td><span>" . $row['fac_estado'] . "</span></td>";
                                        } else {
                                            echo '<td><span style="background-color: #69E4A6" >' . $row['fac_estado'] . '</span></td>';
                                        }
                                        ?>

                                <td><?php echo $row['fac_fecha'] ?></td>
                                <td><a href="invoice.php?fac_cab_id=<?php echo $row['fac_codigo'] ?>">Ver orden</a>
                                </td>
                            </tr>
                            <?php
                                    $i = $i + 1;
                                }
                            } else {
                                echo '<td colspan="7"><h2>No hay facturas que mostrar</h2></td>';
                            }
                            ?>

                        </tbody>
                    </table>
                </article>
            </div>
        </section>
    </div>

    <footer>
        <?php
        include("../../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>