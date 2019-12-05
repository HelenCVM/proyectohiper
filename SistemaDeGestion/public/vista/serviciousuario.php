<!DOCTYPE html>
<html>
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
       <link href="css/pagina.css" rel=stylesheet/>
    <script src="js/starrr.js"></script>
       <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
       <a class="cerrarindex" href="../../config/cerrar_sesion.php">Cerrar sesion</a>
        <script type="text/javascript" src="../vista/js/validacionusuario.js"></script>
        <link type="text/css" rel="stylesheet" href="css/pagina.css">

    </head>
    <body>
    <?php  
include '../../config/conexionBD.php';       
$codigo = $_GET["variable1"];
?> 
    <center><a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a><center>

            <header class="cabecera">
                <nav class="divmenu">
                <ul class="menunavegador">
                
                <li><a href="indexusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="nosotrosusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="serviciousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a>
                <ul>
                                    <li> <a href="catalogousuario1.php?variable1=<?php echo $codigo?>">Catalogo Hidraulicas</a></li>
                                    <li> <a href="catalogousuario2.php?variable1=<?php echo $codigo?>">Catalogo Industriales</a></li>
                                    <li> <a href="catalogousuario3.php?variable1=<?php echo $codigo?>">Catalogo de Alta Temperatura</a></li>
                        </ul>
              </li>
                <li><a href="contactousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li> 
                <li><a href="cuenta.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CUENTA </a></li>


              </ul>
                    </nav>
                </header>

              <!-- públicidad-->
    <section class="seccion">
            <div class="social1">
                    <ul >
                    <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"><img id="iconmenu"src="img/img10.png"></a></li> 
                    </ul>       
            </div>
            <p class="bienvenida"> 
        <?php echo "BIENVENIDA " ?>
        <?php echo $codigo ?>
       </p>
        </section>
    <!-- ------- -->
        <br> 
    
        <div class="content">
        <section>
            <a href="#">
                <h2>PRODUCTOS</h2>
            </a>
            <div class="contentCards">

                <?php
                        include  '../../config/conexionBD.php';  
                $sql="SELECT pro.pro_nombre,pro.pro_codigo,pro.pro_descripcion, pro.pro_precio, pro.pro_img FROM Producto pro WHERE pro.pro_eliminado='N'  GROUP BY pro.pro_codigo;";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                <article>
                    <div class="contentImg">
                        <div class="cardImg">
                            <a href="product.php?producto=<?php echo $row['pro_codigo']; ?>"><img src="../../adminPanel/img/uploads/<?php echo $row['pro_img']; ?>" alt="<?php echo $row['pro_nombre']; ?>"></a>
                     
                        </div>
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
        
            </p>
            
    </div>
	<script>
   $('#Estrellas').starrr({
       rating:3,
       change:function(e,valor){
           alert(valor);
           
       }
       
   });
    
    </script>
    

        <section class="video">
                <iframe width="1000" height="315" src="https://www.youtube.com/embed/lR4MaqQWvaw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </section>
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