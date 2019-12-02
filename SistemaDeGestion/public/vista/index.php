<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="style.css">
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="css/swiper.min.css">
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <!-- Swiper JS -->
        <script src="js/swiper.min.js"></script>
       
        <title>Inicio</title>

  </head>
  <body>
 

  
    </head>
    <body>
      

        <header class="cabecera">
           
             
                <a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                 
                <nav class="divmenu">
                <ul class="menunavegador">
                <hr color="slategrey" >
                <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a></li>
                <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li>
                <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png"> LOGIN</a></li>                
                <li><a href="formulario.php"> <img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li>     
                <?php
                include '../../config/conexionBD.php';
                $usuario = $_GET['correo'];
                
                $sql = "SELECT * FROM Usuario WHERE usu_correo = '$usuario'";
               
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                $_SESSION['isLogged'] = TRUE;
                while($row = $result->fetch_assoc()) {
                if($row['usu_correo']==$usuario){

?>   

                <li><a href="formulario.php"> <img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li>                                         
              


<li><span class="user"><?php echo ($row['usu_nombres'] . ' ' . $row['usu_apellidos']) ?></span></li>    
              
<?php
}
}
}
$conn->close();
?>
              </ul>
           </nav>


        </header> 

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