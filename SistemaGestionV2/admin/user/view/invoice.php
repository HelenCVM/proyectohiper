<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if (!isset($_GET['fac_cab_id'])) {
        header("Location: shoppinghistory.php");
    }
} else {
    header("Location: ../../../index.php");
}
$usuario=$_SESSION['codigo'];
$fac=$_GET['fac_cab_id'];
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
    <script src="gene.js"></script>
    <title>Factura</title>
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
            <h2>Factura</h2>
            <div class="cardContent invoice">
                <div class="invoiceHeader">
                    <div class="invoiceDetail">
                        <h2>IMPORTMANGUERASIV</h2>
                        <p>Cuenca, Azuay</p>
                        <p>Tel. 0978781341</p>
                    </div>

                    <div class="invoicePrint">
                        <h2>Factura</h2>
                        <button onclick="generarFactura(<?php echo $usuario; ?>,<?php echo $fac; ?>)"><i
                                class="fas fa-print"></i> Imprimir</button>
                    </div>
                </div>
                <div class="invoiceBody">
                    <div class="ivoiceBodyDetall">
                        <?php
                        include '../../../config/configDB.php';


                        $sql = "SELECT * FROM Factura fc, Usuario u, Direccion d
                        WHERE fc.usu_codigo=u.usu_codigo AND
                        d.usu_codigo = u.usu_codigo AND
                        fc.fac_codigo=" . $_GET['fac_cab_id'] . ";";

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $result = $result->fetch_assoc();
                            ?>
                        <div class="invoiceDetailTo">
                            <h3>Factura a:</h3>
                            <p><span><?php echo $result['usu_nombres'] ?></span>
                                <span><?php echo $result['usu_apellidos'] ?></span></p>
                            <p>Cl. <span><?php echo $result['usu_cedula'] ?></span></p>
                            <p><?php echo $result['dir_calle_principal'] . ', ' . $result['dir_calle_secundaria'] ?>
                            </p>
                            <p>Tel. <span><?php echo $result['usu_telefono'] ?></span></p>
                        </div>
                        <div class="invoiceDetailStatus">
                            <p><span>Fecha: </span><?php echo $result['fac_fecha'] ?></p>
                            <p><span>Status: </span><span class="status"><?php echo $result['fac_estado'] ?></span>
                            </p>
                            <p><span>Codigo de orden: </span><?php echo $result['fac_codigo'] ?></p>
                        </div>
                        <?php
                    } else {
                        //redirigir
                    }
                    ?>
                    </div>

                    <article>
                        <table>
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Producto Codigo</td>
                                    <td>Descripcion</td>
                                    <td>Cantidad</td>
                                    <td>Precio</td>
                                </tr>
                            </thead>

                            <div id="floatWindow">
                                <div class="contentMap">
                                    <i class="fas fa-times" onclick="cluseWindow()"></i>
                                    <div id="map"></div>
                                </div>
                            </div>

                            <tbody>
                                <?php
                                $sql = "SELECT * FROM FacturaDetalle fd, Factura fc, Producto pro
                                        WHERE fd.fac_codigo = fc.fac_codigo AND
                                                fd.pro_codigo=pro.pro_codigo AND
                                                fc.fac_codigo=" . $_GET['fac_cab_id'] . ";";

                                $resultDet = $conn->query($sql);
                                $i = 1;
                                if ($resultDet->num_rows > 0) {
                                    while ($row = $resultDet->fetch_assoc()) {

                                        ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td>
                                        <a
                                            href="../../../public/view/product.php?producto=<?php echo $row['pro_id']; ?>">
                                            <p><?php echo $row['pro_codigo']; ?></p>
                                        </a>
                                    </td>
                                    <td><?php echo $row['pro_nombre']; ?></td>

                                    <td><?php echo $row['facd_cantidad']; ?></td>

                                    <?php
                                            $subTotal = $row['facd_cantidad'] * ($row['pro_precio'] );

                                            ?>

                                    <td>$ <?php echo round($subTotal, 2); ?></td>
                                    </td>
                                </tr>

                                <?php
                                        $i = $i + 1;
                                    }
                                } else {
                                    //error redirigir
                                }
                                ?>
                            </tbody>
                        </table>
                    </article>
                    <div class="invoiceFooter">
                        <p><span>Sub-total: </span> $<?php echo round($result['fac_subtotal'], 2) ?></p>
                        <p><span>IVA: </span> 12%</p>
                        <h2>USD <?php echo round($result['fac_total'], 2) ?></h2>
                        <button id="cancelar"
                            onclick="window.location.href = '../controller/deleteInvoice.php?fac_cab_id=<?php echo $_GET['fac_cab_id'] ?>'">Eliminar</button>
                    </div>
                </div>
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