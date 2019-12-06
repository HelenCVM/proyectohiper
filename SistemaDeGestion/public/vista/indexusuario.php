<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="keywords" content="manguera, importación, import"/>
        <!--<link type="text/css" rel="stylesheet" href="style.css">
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css"> -->
        <!-- Link Swiper's CSS -->
        <a class="cerrarindex" href="../../config/cerrar_sesion.php">Cerrar sesion</a>
        <link rel="stylesheet" href="css/swiper.min.css">
        <link rel="stylesheet" href="css/pagina.css">
         <!--<link type="text/css" rel="stylesheet" href="../../css/estilos.css">-->

        <!-- Swiper JS -->
        <script src="js/swiper.min.js"></script>
       
        <title>Inicio</title>

  </head>
  <body>
 

  
    </head>
    <body>
    <?php  
include '../../config/conexionBD.php';       
$codigo = $_GET["variable1"];
?> 
    <center><a href="index.php" ><img src="../../../imagenes/banner-imi.png"  alt="Import Mangueras"/></a></center>

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
        <br>
         <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!--transicion de las imagenes -->
        <center><section class="transcicion">
          
              <!-- Swiper -->
              <div class="swiper-container">
                <div class="swiper-wrapper">
                  <div class="swiper-slide" style="background-image:url(img/img1.jpg);"></div>
                  <div class="swiper-slide" style="background-image:url(img/img2.jpg);"></div>
                  <div class="swiper-slide" style="background-image:url(img/img3.jpg);"></div>
                  <div class="swiper-slide" style="background-image:url(img/img4.jpg);"></div>
                  <div class="swiper-slide" style="background-image:url(img/img5.jpg);"></div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
              </div> 
              <!-- Initialize Swiper -->
              <script>
                var swiper = new Swiper('.swiper-container', {
                  effect: 'coverflow',
                  grabCursor: true,
                  centeredSlides: true,
                  slidesPerView: 'auto',
                  coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows : true,
                  },
                  pagination: {
                    el: '.swiper-pagination',
                  },
                });
              </script>
        </section></center>

<br>
<br>
        <section class="seccion1">
            <br>
            <br>
            <article class="indexcontenido">
            La Importadora de Mangueras nació hace 5 años como un almacén distribuidor en la ciudad de Cuenca de 
            mangueras nacionales e importadas. En la actualidad cuenta con un local matriz que tiene todos los 
            servicios para satisfacer las necesidades de los clientes. Está ubicado en Lamar y Huayna-Capac, zona 
            comercial del centro de la ciudad de Cuenca. Dentro de los beneficios que Importadora Mangueras ofrece
             a sus clientes está la calidad de los productos a un precio justo. Importamos insumos de: USA, Europa, 
             América Latina, India, China, Indonesia. En estos años de trayectoria y establecimiento hemos podido aumentar
              nuestras habilidades y soporte a los clientes según sus necesidades. Además de que nos hemos posicionado como 
              una empresa líder en el mercado. 
            </article> 
            
            <aside class="imgcontenido">
               
                <center><img src="../../../imagenes/ACOPLES_thumb.png" alt="acoples"/></center>
             <br>
            </aside>      
        </section>
         <br>
      
        <footer class="footernos">
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>
            
    </body>
</html>