<?php
session_start();
if (isset($_SESSION['isLogin'])) {
}
if (!isset($_GET['producto'])) {
    header("Location: index.php");
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
    <script src="../js/funciones.js"></script>
    <title>Producto</title>
</head>

<body>


    <header>
        <?php
        include("../../global/php/headerPublic.php");
        ?>
    </header>


    <div class="content">
        <?php
        include '../../config/configDB.php';
        /*$sql = "SELECT c.cat_id, p.pro_nombre, p.pro_descripcion, p.pro_precio, p.pro_descuento
                FROM producto p, categoria c
                WHERE p.pro_id=" . $_GET['producto'] . " AND c.cat_id=p.CATEGORIA_cat_id;";*/
                $sql="SELECT c.cate_codigo, p.pro_codigo, p.pro_nombre, p.pro_descripcion,p.pro_dia_in,p.pro_peso_gm,p.pro_presi_bar,p.pro_long_m,
                p.pro_precio,
                 p.pro_stock, p.pro_img
                FROM Producto p, Categoria c
                WHERE p.pro_codigo=". $_GET['producto'] ." AND c.cate_codigo=p.cate_codigo;";

        $result = $conn->query($sql);
        if (isset($_GET['producto']) && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre = $row['pro_nombre'];
            $descripcion = $row['pro_descripcion'];
            $precio = $row['pro_precio'];
            //$descuento = $row['pro_descuento'];
            $categoria = $row['cate_codigo'];
            $imagen=$row['pro_img'];
        }
        //Stock
        /*$sqlStock = "SELECT ps.pro_suc_stock FROM producto p, producto_sucursal ps, sucursal s
                                WHERE p.pro_id= ps.PRODUCTO_pro_id AND
                                s.suc_id= ps.SUCURSAL_suc_id AND 
                                s.suc_id=1;";

        $resultStock = $conn->query($sqlStock);
        $rowStock = $resultStock->fetch_assoc();*/
        $stok = $row['pro_stock'];

        ?>

        <section class="product">
            <div class="productSlide">
                <div class="productSlideImg">

                    <?php
                    /*$sqlimagen = 'SELECT  img_nombre FROM imagen WHERE PRODUCTO_pro_id=' . $_GET['producto'] . ';';
                    $resultimagen = $conn->query($sqlimagen);
                    $i = 0;

                    if ($resultimagen->num_rows > 0) {
                        while ($rowimagen = $resultimagen->fetch_assoc()) {
                            $imagenunica = $rowimagen['img_nombre'];*/
                            ?>
                    <script>
                    
                    galeria('../../adminPanel/img/uploads/<?php echo $row['pro_img']; ?>')
                    </script>
                    <?php
                      /*      $i = $i + 1;
                        }
                    }*/
                    ?>

                    <!--<i class="fas fa-angle-left" onclick="cambiarImagen(0)"></i>-->
                    <div class="contetImg">
                        <img id="galeria" src="../../adminPanel/img/uploads/<?php echo $row['pro_img']; ?>"
                            alt="">
                    </div>
                    <!--<i class="fas fa-angle-right" onclick="cambiarImagen(1)"></i>-->
                </div>
                <!-- <a href="">Next</a> -->
            </div>
            <div class="productInfo">
                <h2><?php echo $nombre; ?></h2>
                <h3>Descripcion</h3>
                <p><?php echo $descripcion; ?></p>
                <h3>Caracteristicas</h3>
                <div class ="restante">
                    <table class="tablapro">      
                        <tr>
                        <td><h6>Diametro Interno (in):    </h6></td>
                        <td><?php echo $row['pro_dia_in']; ?></td>
                        </tr>              
                        <tr>
                        <td><h6>Peso Teorico (g):     </h6>  </td>
                        <td> <?php echo $row['pro_peso_gm']; ?></td>
                        </tr>
                        <tr>
                        <td><h6>Presion de Trabajo(bar):     </h6></td>
                        <td><?php echo $row['pro_presi_bar']; ?> </td>
                        </tr>
                        <tr>
                        <td><h6>Longitud (m):   </h6> </td>
                        <td> <?php echo $row['pro_long_m']; ?></td>
                        </tr>
                        
                    </table>
                    </div>
                <span>$<?php echo $precio; ?></span>
                <div class="dataStore">
                    <!--<div>
                        <label for="selectStore">Seleccionar tienda:</label>
                        <select id="selectStore" onchange="stock(this)">
                            <option value="quito">Guayaquil</option>
                            <option value="guayaquil">Quito</option>
                            <option value="cuenca">Cuenca</option>
                        </select>
                    </div>-->

                    <p><span>Stock:</span> <span id="stok"><?php echo $stok; ?></span></p>
                </div>
                <div class="productPrice">
                    <p><span>Sub-Total: </span>$<?php echo $precio; ?></p>
                    <!--<p><span>Descuento: </span>%</p>-->
                    <p><span id="shopTotal">Total: </span>$<?php 
                                                            echo $precio; ?></p>
                </div>
                <div class="productBtns">
                    <div class="valoration" id="valoration" onmousemove="elemento(event)">
                    <?php                         
                      echo " <form id='formulario0' method='POST' action='insertacalifica.php?codigo=" . $row['pro_codigo'] . "'>";
                      echo" <div class='valoracio'>";
                      echo" <input id='radio' type='radio' name='radio' value='1'>";
                      echo " <label for='radio1'></label>";
                      
                      echo" <input id='radio' type='radio' name='radio' value='2'>";
                      echo "<label for='radio2'></label>";
                      
                      echo" <input id='radio' type='radio' name='radio' value='3'>";
                      echo"<label for='radio3'></label>";
                      
                      echo"<input id='radio' type='radio' name='radio' value='4'>";
                      echo"<label for='radio4'></label>";
                      
                      echo"<input id='radio' type='radio' name='radio' value='5'>";
                      echo" <label for='radio5'></label>";
                      echo"<input id='mensaje' type='mensaje' name='mensaje' value=''>";
                      
                      echo "<p><input type='submit' value='Enviar datos'></p>";
                      echo"</div>";
                      echo"</form>";
                     
                        
                       
                       /* if (isset($_SESSION['codigo'])) {
                            $sqlRatP = "SELECT rat.rat_calificacion
                                    FROM producto pro, rating rat, usuario usu
                                    WHERE pro.pro_id = rat.PRODUCTO_pro_id AND
                                    usu.usu_id = rat.USUARIO_usu_id AND
                                    pro.pro_estado=0 AND
                                    usu.usu_id=" . $_SESSION['codigo'] . " AND
                                    pro.pro_id=" . $_GET['producto'] . ";";
                        } else {

                            $sqlRatP = "SELECT COALESCE(AVG(rat.rat_calificacion),0) AS rat_calificacion FROM producto pro, rating rat 
                                            WHERE rat.PRODUCTO_pro_id = pro.pro_id AND
                                            pro.pro_id=" . $_GET['producto'] . ";";
                        }

                        $resultRatP = $conn->query($sqlRatP);
                        //echo $resultRatP->num_rows;
                        if ($resultRatP->num_rows > 0) {
                            $resultCal = $resultRatP->fetch_assoc();
                            echo '<span id="clasificacion">' . $resultCal['rat_calificacion'] . '</span>';
                        } else {
                            echo '<span id="clasificacion">Sin calificar</span>';
                        }*/
                        ?>

                    </div>
                    <div class="btns">
                        <button onclick="cartAdd(<?php echo $_GET['producto']; ?>)">
                            <i class="fas fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <a href="#">
                <h2>Productos relacionados</h2>
            </a>
            <div class="contentCards">

                <?php
                $sql = "SELECT pro.pro_codigo, pro.pro_nombre, pro.pro_descripcion, pro.pro_precio, pro.pro_img
                FROM Producto pro, Categoria cat
                WHERE pro.pro_codigo!=" . $_GET['producto'] . " AND cat.cate_codigo = pro.cate_codigo AND
                pro.pro_eliminado='N'limit 4";
                /*$sql = "SELECT pro.pro_id, pro.pro_nombre, pro.pro_descripcion, pro.pro_precio, img.img_nombre 
                            FROM producto pro, imagen img, categoria cat
                            WHERE pro.pro_id = img.PRODUCTO_pro_id AND
                            cat.cat_id = pro.CATEGORIA_cat_id AND
                            pro.pro_estado=0 AND
                            cat.cat_id = pro.CATEGORIA_cat_id AND
                            pro.pro_id = " . $_GET['producto'] . "
                            limit 4;";*/

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                <article>
                    <div class="contentImg">
                        <div class="cardImg">
                            <a href="product.php?producto=<?php echo $row['pro_codigo']; ?>"><img
                                    src="../../adminPanel/img/uploads/<?php echo $row['pro_img']; ?>"
                                    alt="<?php echo $row['img_nombre']; ?>"></a>
                        </div>
                       <!-- <div class="ranking">
                            <i class="fas fa-star"></i>
                            <?php
                                   /* $sqlRating = "SELECT COALESCE(AVG(rat.rat_calificacion),0) AS rat_calificacion FROM producto pro, rating rat 
                                            WHERE rat.PRODUCTO_pro_id = pro.pro_id AND
                                            pro.pro_id=" . $row['pro_id'] . ";";

                                    $resultRating = $conn->query($sqlRating);
                                    $rowRating = $resultRating->fetch_assoc();
                                    echo '<span>' . $rowRating['rat_calificacion'] . '</span>';*/
                                    ?>
                        </div>-->
                    </div>
                    <div class="contentDescription">
                        <div class="descripProduct">
                            <a href="product.php?producto=<?php echo $row['pro_codigo']; ?>">
                                <h2><?php echo $row['pro_nombre']; ?></h2>
                            </a>
                            <p><?php echo $row['pro_descripcion']; ?></p>
                        </div>
                        <span>$<?php echo $row['pro_precio']; ?></span>
                    </div>
                </article>
                <?php
                }
            }
            $conn->close();
            ?>

            </div>
        </section>
    </div>

    <footer>
        <?php
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>