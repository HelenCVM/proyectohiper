
<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <title>Servicio</title>
       <!-- <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="style.css">
    
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">-->
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <link rel="stylesheet" href="css/bootstrap.min.css">
       <script src="js/bootstrap.min.js"></script>
       <link href="css/starrr.css" rel=stylesheet/>
       <script src="carrito.js"></script>
    <script src="js/starrr.js"></script>
       <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    
        <script type="text/javascript" src="../vista/js/validacionusuario.js"></script>
        <link type="text/css" rel="stylesheet" href="css/pagina.css">


    </head>

<body>


<center><a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a><center>

<header class="cabecera">
    <nav class="divmenu">
        <ul class="menunavegador">
            
            <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
            <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>                                            
            <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a>
            <ul>
                        <li> <a href="catalogo1.php">Catalogo Hidraulicas</a></li>
                        <li> <a href="catalogo2.php">Catalogo Industriales</a></li>
                        <li> <a href="catalogo3.php">Catalogo de Alta Temperatura</a></li>
            </ul>
            </li>
            <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS</a></li>                                                                     
            <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png"> LOGIN</a></li>                
            <li><a href="formulario.php"><img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li> 
            <li><a><img id ="iconcarrito" src="img/icon8.png" data-pushbar-target='pushbar-carrito'>CARRITO</a></li>                            
         
        </ul>
        </nav>
    </header>


    <div class="content">
        <?php
        include  '../../config/conexionBD.php'; 
        $sql="SELECT c.cate_codigo, p.pro_codigo, p.pro_nombre, p.pro_descripcion, p.pro_precio, p.pro_stock, p.pro_img
        FROM Producto p, Categoria c
        WHERE p.pro_codigo=". $_GET['producto'] ." AND c.cate_codigo=p.cate_codigo;";
       /* $sql = "SELECT c.cat_id, p.pro_nombre, p.pro_descripcion, p.pro_precio, p.pro_descuento
                FROM producto p, categoria c
                WHERE p.pro_codigo=" . $_GET['producto'] . " AND c.cat_id=p.CATEGORIA_cat_id;";*/

        $result = $conn->query($sql);
        if (isset($_GET['producto']) && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $codigo=$row['pro_codigo'];
            $nombre = $row['pro_nombre'];
            $descripcion = $row['pro_descripcion'];
            $precio = $row['pro_precio'];

            //$descuento = $row['pro_descuento'];
            $categoria = $row['cate_codigo'];
            $stock=$row['pro_stock'];
            $imagen=$row['pro_img'];
            echo " <form id='formulario0' method='POST' action='../../config/insertacalifica.php?codigo=" . $row['pro_codigo'] . "'>";
echo" <div class='valoracio'>";
echo" <input id='radio' type='radio' name='radio' value='1'>";
echo " <label for='radio1'>&#9733</label>";

echo" <input id='radio' type='radio' name='radio' value='2'>";
echo "<label for='radio2'>&#9733</label>";

echo" <input id='radio' type='radio' name='radio' value='3'>";
echo"<label for='radio3'>&#9733</label>";

echo"<input id='radio' type='radio' name='radio' value='4'>";
echo"<label for='radio4'>&#9733</label>";

echo"<input id='radio' type='radio' name='radio' value='5'>";
echo" <label for='radio5'>&#9733</label>";
echo"<input id='mensaje' type='mensaje' name='mensaje' value=''>";

echo "<p><input type='submit' value='Enviar datos'></p>";
echo"</div>";
echo"</form>";
        }
        //Stock
      /*  $sqlStock = "SELECT ps.pro_suc_stock FROM producto p, producto_sucursal ps, sucursal s
                                WHERE p.pro_id= ps.PRODUCTO_pro_id AND
                                s.suc_id= ps.SUCURSAL_suc_id AND 
                                s.suc_id=1;";

        $resultStock = $conn->query($sqlStock);
        $rowStock = $resultStock->fetch_assoc();
        $stok = $rowStock['pro_suc_stock'];*/

        ?>

        <section class="product">
            <div class="productSlide">
                <div class="productSlideImg">

                    <?php
                   /* $sqlimagen = 'SELECT  img_nombre FROM imagen WHERE PRODUCTO_pro_id=' . $_GET['producto'] . ';';
                    $resultimagen = $conn->query($sqlimagen);
                    $i = 0;

                    if ($resultimagen->num_rows > 0) {
                        while ($rowimagen = $resultimagen->fetch_assoc()) {
                            $imagenunica = $rowimagen['img_nombre'];
                            ?>
                    <script>
                    galeria('../../img/product/<?php echo $_GET['producto'] . '/' . $rowimagen['img_nombre'] ?>',
                        <?php echo $i ?>)
                    </script>
                    <?php
                            $i = $i + 1;
                        }
                    }*/
                   
                    ?>

                    <div class="contetImg">
                    <img src="../../adminPanel/img/uploads/<?php echo $imagen; ?>" alt="<?php echo $nombre; ?>">
                    </div>
                </div>
                <!-- <a href="">Next</a> -->
            </div>
            <div class="productInfo">
                <h2><?php echo $nombre; ?></h2>
                <h3>Descripcion</h3>
                <p><?php echo $descripcion; ?></p>
                <span>$<?php echo $precio; ?></span>
                <div class="dataStore">


                    <p><span>Stock:</span> <span id="stok"><?php echo $stock; ?></span></p>
                </div>
                <div class="productPrice">
                    <p><span>Sub-Total: </span>$<?php echo $precio; ?></p>
                    
                    <p><span id="shopTotal">Total: </span>$<?php 
                                                            echo $precio; ?></p>
                </div>
            
                    <div class="btns">
                        
                        <button onclick="cartAdd('<?php echo $imagen; ?>',<?php echo $codigo; ?>,'<?php echo $nombre; ?>',<?php echo $precio; ?>,1)">
                            <i class="fas fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                    </div>
                </div>
            </div>
        </section>

        
    </div>

    <footer class="footernos">
                <br>
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>

</body>

</html>