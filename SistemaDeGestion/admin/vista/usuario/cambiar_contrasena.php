<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="keywords" content="manguera, importación, import"/>
        
        <!-- Link Swiper's CSS -->
       
        <!-- Swiper JS -->
        <link rel="stylesheet" href="../../../public/vista/css/pagina.css">
       
       
        <title>Inicio</title>
        <a class="cerrarindex" href="../../../config/cerrar_sesion.php">Cerrar sesion</a>
    </head> 
 
<body> 
<?php  
include '../../../config/conexionBD.php';       
$codigo = $_GET["variable1"];
?> 
<header class="cabecera">   
           <a href="indexusuario.php"><img src="../../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
           <nav class="divmenu">
                    <ul class="menunavegador">
                <li><a href="../../../public/vista/indexusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="../../../public/vista/nosotrosusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="../../../public/vista/serviciousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a>
                <ul>
                                    <li> <a href="../../../public/vista/catalogousuario1.php?variable1=<?php echo $codigo?>">Catalogo Hidraulicas</a></li>
                                    <li> <a href="../../../public/vista/catalogousuario2.php?variable1=<?php echo $codigo?>">Catalogo Industriales</a></li>
                                    <li> <a href="../../../public/vista/catalogousuario3.php?variable1=<?php echo $codigo?>">Catalogo de Alta Temperatura</a></li>
                        </ul>
              </li>
                <li><a href="../../../public/vista/contactousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li>
                <li><a href="../../../public/vista/cuenta.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CUENTA </a></li> 
               

              </ul>
                    </nav>
   </header>
   <section>
       <article class="indexabout">
               <div class="social">
                       <ul >
                       <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"></a></li> 
                                    
                           </ul>
               </div>
               
               
           
       </article>
   </section>

   <br>
   <!--transicion de las imagenes -->
   <center><section class="transcicion">

   <p class="bienvenida"> 
        <?php echo "BIENVENIDA " ?>
        <?php echo $codigo ?>
       </p>
<?php         
$codigo = $_GET["variable1"];             
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