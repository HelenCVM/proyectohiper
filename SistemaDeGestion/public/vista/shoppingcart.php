<?php

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
    <script src="js/carrito.js"></script>
    <title>Carrito</title>
</head>

<body>
    <header>
    
    </header>

    <div id="floatWindow">
        <div class="contentWindow" id="payWindow">
            <!-- FORMULARIO  -->
            <div class="form">
                <form action="../controller/payments.php" method="post">
                    <h2>Pagar con tarjeta</h2>
                    <p>Introdisca los datos de su tarjeta</p>
                    <input type="text" name="numbreCard" id="numbreCard" placeholder="1234 1234 1234 1234" required>
                    <div class="nombres">
                        <input type="text" name="dateCard" id="dateCard" placeholder="MM/YY" required>
                        <input type="text" name="cvcCard" id="cvcCard" placeholder="CVC" required>
                    </div>

                    <input type="text" name="nameCard" id="nameCard" placeholder="Nombre del propietario" required>
                    <input type="text" name="countryCard" id="countryCard" placeholder="Pais" required>
                    <div class="btns">
                        <input type="submit" value="Pagar">
                    </div>
                </form>
            </div>

            <!-- ESTADOS DEL PAGO -->
            <!-- <div class="confirmVtn">
                <h2>Gracias por su compra.</h2>
                <p>Pago realizado con exito</p>
                <i class="far fa-check-circle"></i>

                <h2>No se pudo realizar el pago.</h2>
                <i class="far fa-times-circle"></i>

                <div class="btns">
                    <input type="button" value="Inicio" onclick="window.location.href = 'index.html'">
                    <input type="button" value="Ver Compras"
                        onclick="window.location.href = '../../admin/user/view/shoppinghistory.html'">
                </div>
            </div> -->
            <i class=" fas fa-times" onclick="cluseWindow()"></i>
        </div>

    </div>

    <div class="content">
        <section class="product">
            <div class="productSlide cart" id="cart">

                <?php
                //Pendiente query para la tienda 
                include  '../../config/conexionBD.php';  
                $sql = "SELECT * FROM carrito WHERE
                        USUARIO_usu_id=50;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sqlP = "SELECT * FROM carrito WHERE
                        USUARIO_usu_id=50;";
                        
                        $resultP = $conn->query($sqlP);
                        $rowP = $resultP->fetch_assoc();

                        $sqlProducto="SELECT * FROM Producto WHERE pro_codigo=".$row['PRODUCTO_PRO_ID'].";";
                        echo"$sqlProducto";
                        $resultProducto = $conn->query($sqlProducto);
                        $rowProducto = $resultProducto->fetch_assoc();
                      
                    
                        ?>

                <article>
                    <div class="cartImg">
                        <img src="../../adminPanel/img/uploads/<?php echo $rowProducto['pro_img']; ?>" alt="<?php echo $rowProducto['pro_nombre']; ?>">
                    </div>
                    <div class="cartDescription">
                        <h2><?php echo $rowProducto['pro_nombre'] ?></h2>
                        <h3>Descripcion</h3>
                        <p><?php echo $rowProducto['pro_descripcion'] ?></p>
                        <div class="inf">
                            
                            <div>
                                <h3>Cantidad:</h3>
                                <span><?php echo $row['car_cantidad'] ?></span>
                            </div>
                        </div>
                    </div>
                    <span>$<?php echo $rowProducto['pro_precio']; ?></span>
                    <!--Parametro para eliminar -->
                    <i class="fas fa-times" onclick="cartDelete(<?php echo $row['car_id'] ?>)"></i>
                </article>

                <?php

                }
                //echo '<h2>Si hay productos.</h2>';
            } else {
                echo '<h2 style="color: #FF6565">No hay productos.</h2>';
            }
            ?>

            </div>

            <div class="productInfo bill">
                <div class="billInfo">
                    <div class="nameBill">
                        <?php
                        /*
                        $sqlUser = "SELECT * FROM usuario, direccion 
                        WHERE usuario.usu_id=direccion.USUARIO_usu_id AND 
                        usuario.usu_id = " . $_SESSION['codigo'] . ";";

                        $sqlUser = $conn->query($sqlUser);

                        $sqlUser = $sqlUser->fetch_assoc();
                        if ($sqlUser['usu_nombres'] != '' && $sqlUser['usu_apellidos'] != '' && $sqlUser['usu_cedula'] != '' && $sqlUser['dir_nombre'] != '' && $sqlUser['dir_calle_principal'] != '' && $sqlUser['dir_calle_secundaria'] != '' && $sqlUser['dir_ciudad'] != '' && $sqlUser['dir_provincia'] != '' && $sqlUser['dir_codigo_postal'] != '') {
                            ?>
                        <h2>Factura</h2>
                        <p><?php echo $sqlUser['usu_nombres'] . ' ' . $sqlUser['usu_apellidos'] ?></p>
                        <span><?php echo $sqlUser['dir_nombre'] . ', ' . $sqlUser['dir_calle_principal'] . ', ' . $sqlUser['dir_calle_secundaria'] ?></span>
                        <span
                            class="data"><?php echo $sqlUser['usu_cedula'] . ', ' . $sqlUser['dir_ciudad'] . ', ' . $sqlUser['dir_provincia'] ?></span>

                        <?php
                            $usuDates = true;
                        } else {
                            $usuDates = false;
                            echo '<h3 style="color: #FF6565">Por favor complete la informacion de su perfil.</h3>';
                            echo '<p>Para continuar con el pago...</p>';
                        }*/
                        ?>
                    </div>
                    <button onclick="window.location.href = '../../admin/user/view/index.php'">
                        <i class="far fa-edit"></i> Editar
                    </button>
                </div>
                <div class="buydetall" id="buydetall">
                    <?php
                    $sqlSubTot = "SELECT SUM(c.car_cantidad*(p.pro_precio)) AS sub_total FROM carrito c, Producto p WHERE 
                                        c.PRODUCTO_pro_id = p.pro_codigo AND 
                                        c.USUARIO_usu_id = 50;";

                    $sqlSubTot = $conn->query($sqlSubTot);
                    $subTot = $sqlSubTot->fetch_assoc();
                    $subTotal = $subTot['sub_total'];
                    $total = ($subTotal * 1.12);
                    $ivaS=($subTotal * 0.12);

                    ?>
                    <h2>Detalle</h2>
                    <div class="price">
                        <p><span>Sub-Total: </span>$<?php echo round($subTotal, 2) ?></p>
                        <p><span>IVA: </span>12%</p>
                        <p><span>Total: </span>$<?php echo round($total, 2) ?></p>
                    </div>

                    <input type="button" value="Factura" onclick="factura(50,<?php echo round($subTotal, 2) ?>,<?php echo round($ivaS, 2)?>, <?php echo round($total, 2) ?>)";>
                    <?php
                    if ($subTotal > 0 ) {
                        ?>
                    <div class="btns">
                        <button onclick="openWindow()">
                            <i class="far fa-credit-card"></i> Tarjeta
                        </button>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </section>
    </div>

    <footer>
 
    </footer>

</body>

</html>