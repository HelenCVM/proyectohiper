<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    }
} else {
    header("Location: ../view/index.php");
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
    <link rel="stylesheet" href="../css/globalStyle.css">
    <link rel="stylesheet" href="../css/generalStyle.css">
    <title>Successful4</title>
</head>

<body>
    <header>
        <?php
        //echo (getcwd());
        include("../../global/php/headerPublic.php");
        ?>
    </header>

    <div class="headerImg pageError pageSuccess">
        <?php
        include '../../config/configDB.php';

        $cardNumber = isset($_POST["numbreCard"]) ? trim($_POST["numbreCard"]) : null;
        $dateCard = isset($_POST["dateCard"]) ? trim($_POST["dateCard"]) : null;
        $cvcCard = isset($_POST["cvcCard"]) ? trim($_POST["cvcCard"]) : null;
        $nameCard = isset($_POST["nameCard"]) ? mb_strtolower(trim($_POST["nameCard"]), 'UTF-8') : null;
        $countryCard = isset($_POST["countryCard"]) ? mb_strtolower(trim($_POST["countryCard"]), 'UTF-8') : null;
        $date = date(date("Y-m-d H:i:s"));

        //echo 'NUMERO DE TARJETA' . $cardNumber . '<br>';

        $sql = "SELECT * FROM Tarjeta WHERE
            usu_codigo=" . $_SESSION['codigo'] . ";";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sqlCard = "UPDATE Tarjeta SET
            tar_nombreU='$nameCard',
            tar_numero='$cardNumber',
            tar_fechaVen='$dateCard',
            tar_cvv='$cvcCard',
            tar_pais='$countryCard'
            WHERE tar_codigo=" . $row['tar_codigo'] . ";";
        } else {
            $sqlCard = "INSERT INTO Tarjeta  VALUES (0, " . $_SESSION['codigo'] . ",'$cardNumber','$dateCard', '$nameCard',
        '$cvcCard','MasterCard','$countryCard');";
        }
        if ($conn->query($sqlCard)) {

            $sqlCart = "SELECT * FROM carrito WHERE
                        USUARIO_usu_id=" . $_SESSION['codigo'] . ";";

            $resultCart = $conn->query($sqlCart);
            //echo 'Datos del carrito. ' . $resultCart->num_rows;
            if ($resultCart->num_rows > 0) {

                $sqlTarUsu = "SELECT * FROM Tarjeta WHERE
                                usu_codigo=" . $_SESSION['codigo'] . ";";
                $sqlTarUsu = $conn->query($sqlTarUsu);
                $sqlTarUsu = $sqlTarUsu->fetch_assoc();
                $cardUser = $sqlTarUsu['tar_codigo'];
                //echo 'Tarjeta usuario' . $cardUser;

                $sqlSubTot = "SELECT SUM(c.car_cantidad*(p.pro_precio)) AS sub_total FROM carrito c, Producto p WHERE 
                        c.PRODUCTO_pro_id = p.pro_codigo AND 
                        c.USUARIO_usu_id = " . $_SESSION['codigo'] . ";";
                $sqlSubTot = $conn->query($sqlSubTot);
                $subTot = $sqlSubTot->fetch_assoc();
                $subTotal = round($subTot['sub_total'], 2);
                $subIva=round($subTotal*0.12);
                // echo 'SUBTOTAL: ' . $subTotal . '<br>';
                $total = round(($subTotal * 1.12));
                // echo 'TOTAL: ' . $total . '<br>';

                $sqlCabFact = "INSERT INTO Factura VALUES ( 0, " . $_SESSION['codigo'] . ",'$date', 
                        $subTotal, 
                        $subIva,
                        $total,
                        'Tarjeta', 
                        $cardUser
                        );";
                echo"$sqlCabFact";
                //echo 'Codigo de la cabecera.' . $codigoNewFacCab;

                if ($conn->query($sqlCabFact)) {
                    $sql = "SELECT MAX(fac_codigo) AS codigo  
                    FROM Factura;";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $codigoNewFacCab = ($row['codigo']);

                    while ($rowCart = $resultCart->fetch_assoc()) {

                        $sqlDetFact = "INSERT INTO FacturaDetalle VALUES ( 0, " . $rowCart['PRODUCTO_pro_id'] . ",
                                " . $rowCart['car_cantidad'] . ", 
                                '$codigoNewFacCab');";

                        if ($conn->query($sqlDetFact)) {
                            

                            $sqlDropCart = "DELETE FROM carrito WHERE USUARIO_usu_id =" . $_SESSION['codigo'] . ";";
                            $conn->query($sqlDropCart);


                            //echo 'Detalle agregado stok en: ' . $rowStok . '<br>';
                        } else {
                            ?>
        <div class="contentSucce">
            <h2>Error al agregar los datos en el.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <button onclick="window.location.href = '../view/shoppingcart.php'">Inicio</button>
        </div>
        <?php
                    }
                }

                $conn->close();
                ?>
        <div class="contentSucce">
            <h2>Pago realizado con exito</h2>
            <p>Gracias por su compra..</p>
            <i class="far fa-check-circle"></i>
            <button onclick="window.location.href = '../view/index.php'">Inicio</button>
        </div>
        <?php
            } else {
                ?>
        <div class="contentSucce">
            <h2>Error al agregar los datos.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <button onclick="window.location.href = '../view/shoppingcart.php'">Inicio</button>
        </div>
        <?php
                //echo 'error al introducir la cabecera';
                //echo mysqli_error($conn);
            }
        } else {
            ?>
        <div class="contentSucce">
            <h2>Error al agregar los datos.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <button onclick="window.location.href = '../view/shoppingcart.php'">Inicio</button>
        </div>
        <?php
        }
    } else {
        ?>
        <div class="contentSucce">
            <h2>La tarjeta no es correcta.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <button onclick="window.location.href = '../view/shoppingcart.php'">Inicio</button>
        </div>
        <?php
    }
    ?>

    </div>
    <footer>
        <?php
        //echo (getcwd());
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>
</body>

</html>