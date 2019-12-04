<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
     
        <title>Nosotros</title>
        <!--<link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="style.css">
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">-->
        <link type="text/css" rel="stylesheet" href="css/pagina.css">

    </head>
    <body>
    <?php  
include '../../config/conexionBD.php';       
$codigo = $_GET["variable1"];
?> 
    <center><a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a></center>

            <header class="cabecera">
            <nav class="divmenu">
                <ul class="menunavegador">
                
                <li><a href="indexusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="nosotrosusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="serviciousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a>
                <ul>
                                    <li> <a href="catalogo1.php?variable1=<?php echo $codigo?>">Catalogo Hidraulicas</a></li>
                                    <li> <a href="catalogo2.php?variable1=<?php echo $codigo?>">Catalogo Industriales</a></li>
                                    <li> <a href="catalogo3.php?variable1=<?php echo $codigo?>">Catalogo de Alta Temperatura</a></li>
                        </ul>
              </li>
                <li><a href="contactousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li> 
                <li><a><img id ="iconcarrito" src="img/icon8.png" data-pushbar-target='pushbar-carrito'>CARRITO</a></li>


              </ul>
           </nav>
     </header>
    <!-- públicidad-->
    <section class="seccion">
            <div class="social">
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
     
        <section>
            <article class="indexabout">
                    <div class="social">
                            <ul >
                            <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"></a></li> 
                                    
                                </ul>
                    </div>
                <h1 class="h1nosotros">
                    QUIENES SOMOS
                
                </h1>
                <iframe id="videoYT" width="1170" height="500" src="https://www.youtube.com/embed/Y9RWAVsWOT8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class="p1nosotros">
                <img class="imanoso" src="../../../imagenes/Comercializar mangueras y marcas ,con estandar y certificaciones internacionales.png" alt="Import Mangueras"/> 
                
                </p>
                
            </article>
            <aside class="imgabout">
                
            </aside>
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