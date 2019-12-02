<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../../public/vista/style.css">
        <link type="text/css" rel="stylesheet" href="../../../css/estiloresu.css">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="../../../public/vista/css/swiper.min.css">
        <link type="text/css" rel="stylesheet" href="../../../css/estilos.css">
        <!-- Swiper JS -->
        <script src="../../../public/vista/js/swiper.min.js"></script>
       
        <title>Inicio</title>
        <a class="cerrarindex" href="../../../config/cerrar_sesion.php">Cerrar sesion</a>
    </head> 
 
<body> 
<header class="cabecera">   
           <a href="indexusuario.php"><img src="../../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
            
   </header>
   <section>
       <article class="indexabout">
               <div class="social">
                       <ul >
                               <li><a href="http://www." class="icon-facebook2"></a></li> 
                               <li><a href="http://www." class="icon-mail4"></a></li>
                               <li><a href="http://www." class="icon-whatsapp"></a></li>
                           </ul>
               </div>
               
         
           
       </article>
   </section>

   <br>
   <!--transicion de las imagenes -->
   <center><section class="transcicion">

 
<?php         
$codigo = $_GET["codigo"];             
?> 
 
    <form class="formulario01" method="POST" action="../../controladores/usuario/cambiar_contrasena.php">                  
    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
 
        <label for="cedula">Contraseña Actual (*)</label>         
        <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..."/>         
        <br> 
 
        <label for="cedula">Contraseña Nueva (*)</label>         
        <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..."/>         
        <br>                  
        <input type="submit" id="modificar" name="modificar" value="Modificar" />         
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />     
        </form>                                 
 
</body> 
</html> 