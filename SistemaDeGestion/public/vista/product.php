
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
       <script src="js/carrito.js"></script>
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
    <form action="">


    <span></span>
    </form>


    <div class="content">
        <?php
        include  '../../config/conexionBD.php'; 
    

        $sql="SELECT c.cate_codigo, p.pro_codigo, p.pro_nombre, p.pro_descripcion,p.pro_dia_in,p.pro_peso_gm,p.pro_presi_bar,p.pro_long_m,
        p.pro_precio,
         p.pro_stock, p.pro_img
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

            $diametro=$row['pro_dia_in'];
            $peso=$row['pro_peso_gm'];
            $presion=$row['pro_presi_bar'];
            $longitud =$row['pro_long_m'];


            //$descuento = $row['pro_descuento'];
            $categoria = $row['cate_codigo'];
            $stock=$row['pro_stock'];
            $imagen=$row['pro_img'];
            
            
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
                    <div class ="restante">
                    <table class="tablapro">      
                        <tr>
                        <td><h6>Diametro Interno:    </h6></td>
                        <td><?php echo $diametro; ?></td>
                        </tr>              
                        <tr>
                        <td><h6>Peso Teorico:     </h6>  </td>
                        <td> <?php echo $peso; ?></td>
                        </tr>
                        <tr>
                        <td><h6>Presion de Trabajo:     </h6></td>
                        <td><?php echo $presion; ?> </td>
                        </tr>
                        <tr>
                        <td><h6>Longitud:   </h6> </td>
                        <td> <?php echo $longitud; ?></td>
                        </tr>
                        
                    </table>
                    </div>
                    <br>

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
                        
                        <button onclick="cartAdd(<?php echo $codigo; ?>)">
                            <i class="fas fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                    </div>
                </div>
                   
            </div>
        </section>

        
    </div>

    <section>
    
    <?php
                        //incluir conexión a la base de datos
                        include "../../config/conexionBD.php";

                        $sql = "SELECT p.pro_nombre,p.pro_codigo ,sum(cali_valor) as total,COUNT(cali_valor) as
                        cantidas,AVG(cali_valor) as promedio FROM Calificaciones c ,Producto p WHERE p.pro_codigo=c.pro_codigo  and p.pro_codigo=$codigo
                        group by p.pro_codigo;"; 
                        //cambiar la consulta para puede buscar por ocurrencias de letras
                        $result = $conn->query($sql);
                        echo " <table style='width:100%'>
                        <tr>
                        <th>estrella</th>
                        </tr>";
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>"."★"."</td>";
                            echo " <td>" . $row['pro_nombre'] . "</td>";
                            echo " <td>" . $row['promedio'] ."</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>"."★★"."</td>";
                            echo " <td>" . $row['pro_nombre'] . "</td>";
                            echo " <td>" . $row['promedio'] ."</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>"."★★★"."</td>";
                            echo " <td>" . $row['pro_nombre'] . "</td>";
                            echo " <td>" . $row['promedio'] ."</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>"."★★★★"."</td>";
                            echo " <td>" . $row['pro_nombre'] . "</td>";
                            echo " <td>" . $row['promedio'] ."</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>"."★★★★★"."</td>";
                            echo " <td>" . $row['pro_nombre'] . "</td>";
                            echo " <td>" . $row['promedio'] ."</td>";
                            echo "</tr>";
                            

                                                                }
                        } 
                        $conn->close();

                ?>
    
    </section>
    <section>

    <footer class="footernos">
                <br>
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
    </footer>

    </section>
</body>

</html>