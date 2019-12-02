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
       <!--<a href="../../config/cerrar_sesion.php">Cerrar sesion</a>-->
  </head>
  <body>
  <?php     
  session_start();     
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){                 
    header("Location: /SistemaDeGestion/public/vista/login.html");             
    } 
?>  
<?php  
include '../../config/conexionBD.php';       
$codigo = $_GET["correo"];  

?> 
 
    
  
        <header class="cabecera">
           
             
                <a href="index.html"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                 
                <nav class="divmenu">
                <ul class="menunavegador">
                <hr color="slategrey" >
                <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a></li>
                <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li>    
                                                  
              

              </ul>
           </nav>

        </header>  
        <?php echo "Bienvenida " ?>
        <?php echo $codigo ?>
       
</body>
</html>