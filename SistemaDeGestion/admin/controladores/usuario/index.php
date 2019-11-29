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
        <script src="js/swiper.min.js"></script>
       
        <title>Inicio</title>
  
    </head>
    <body>
        <?php
        $correo=$_GET["correo"];
        $sql = "SELECT * FROM usuario where usu_email='$correo'";
        include '../../../config/conexionBD.php';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
      
        <header class="cabecera">
           
             
                <a href="index.html"><img src="../../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                <li><h3><?php echo $row["usu_nombre"].$row["usu_apellido"]; ?></h3></li>
                <nav class="divmenu">
                <ul class="menunavegador">
                <hr color="slategrey" >
                 
                <li><a href="../../../public/vista/index.html"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="../../../public/vista/nosotros.html"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="../../../public/vista/servicios.html"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a></li>
                <li><a href="../../../public/vista/contacto.html"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li>
                <li><a href="../../../public/vista/login.html"><img id ="iconmenu" src="img/icon5.png"> LOGIN</a></li>                
                <li><a href="../../../public/vista/formulario.html"> <img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li>                                         
                <li><a href="../../../public/vista/carrito.php"><img id ="iconcarrito" src="img/icon8.png"> </a></li> 
               
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


        
        <footer class="footernoso">
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>
            <?php
        }
} else {
echo "<p>Ha ocurrido un error inesperado !</p>";
echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>
    </body>
</html>