<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../../public/vista/style.css">
        <link type="text/css" rel="stylesheet" href="../../../css/estiloresu.css">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="css/swiper.min.css">
        <link type="text/css" rel="stylesheet" href="../../../css/estilos.css">
        <!-- Swiper JS -->
        <script src="../../../public/js/swiper.min.js"></script>
       
        <title>Inicio</title>
  
    </head>
    <body>
      
        <header class="cabecera">
           
             
                <a href="index.html"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                 
                <nav class="divmenu">
                <ul class="menunavegador">
                <hr color="slategrey" >
                <li><a href="index.html"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="nosotros.html"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="servicios.html"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a></li>
                <li><a href="contacto.html"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li>
                <li><a href="login.html"><img id ="iconmenu" src="img/icon5.png"> LOGIN</a></li>                
                <li><a href="formulario.html"> <img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li>                                         
                <li><a href="carrito.php"><img id ="iconcarrito" src="img/icon8.png"> </a></li> 

              </ul>
           </nav>

        </header>    
        
        <section class="seccion">
            <div class="social">
                    <ul >
                            <li><a href="http://www." class="icon-facebook2"></a></li> 
                            <li><a href="http://www." class="icon-mail4"></a></li>
                            <li><a href="http://www." class="icon-whatsapp"></a></li>
                        </ul>
                        
            </div>
        </section>

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


        <section class="seccion">
            <br>
            <br>
            <article class="indexcontenido">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur mollitia expedita sit quam voluptatum itaque accusamus ipsa optio illo quidem dignissimos, reprehenderit quibusdam vel eius! Culpa asperiores sequi aspernatur maxime?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, quidem. Excepturi magnam voluptas eaque repellat laboriosam ipsa, illum dolores quis aut voluptatem ad in? Nostrum accusamus excepturi sit quis impedit!
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed veritatis quas cumque explicabo impedit et aut eaque quam porro, ea ex quidem suscipit temporibus optio molestiae. Aperiam, adipisci. Sapiente, maxime.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, officia consequatur ipsum quibusdam voluptatibus autem blanditiis reiciendis! Reprehenderit perferendis nam porro esse libero fuga sequi obcaecati iure, commodi officiis consectetur!
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus ut quis rem iste, est, odio minus suscipit praesentium atque veritatis consectetur beatae vero delectus? Suscipit aperiam natus voluptate illum officia?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo inventore, atque tempore harum pariatur magni numquam cum, vero modi, libero deserunt enim quaerat? Quo beatae unde in dolore nulla voluptatibus.
            </article> 
            
            <aside class="imgcontenido">
               
                <center><img src="../../../imagenes/ACOPLES_thumb.png" alt="acoples"/></center>
             
            </aside>         
        </section>
         <br>

        <footer class="footernoso">
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>
    </body>
</html>