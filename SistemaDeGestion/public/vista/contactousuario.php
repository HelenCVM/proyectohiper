<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <title>Contacto</title>
        <a href="../../config/cerrar_sesion.php">Cerrar sesion</a>
        <link type="text/css" rel="stylesheet" href=" style.css">
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="css/dos_columnas.css">
        
    </head>
    <body>
    <?php  
include '../../config/conexionBD.php';       
$codigo = $_GET["variable1"];
?> 
            <header class="cabecera">
                    
                    <ul class="menunavegador">
                            <a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                            <hr color="slategrey" >
                        <li><a href="indexusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                        <li><a href="nosotrosusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                        <li><a href="serviciousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a></li>
                        <li><a href="contactousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS</a></li>                                       
                        
                    
                    </ul>
                </header>
                
        <section class="columna1">
                <div class="social">
                        <ul >
                                <li><a href="http://www." class="icon-facebook2"></a></li> 
                                <li><a href="http://www." class="icon-mail4"></a></li>
                                <li><a href="http://www." class="icon-whatsapp"></a></li>
                            </ul>
                </div>
                <?php echo "BIENVENIDA " ?>
                <?php echo $codigo ?>
                <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.720758876699!2d-78.99957548518545!3d-2.8966001978901956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd1816254c84e9%3A0x5453d59aeec7e540!2sImport%20Mangueras%20Idrovo!5e0!3m2!1ses!2sec!4v1574872033881!5m2!1ses!2sec" width="90%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
           
        </section>

        <section class="columna2"> 
            <h2> &#128222 Contactanos :</h2>
                <br>
                <form id="formularioc" action="#" method="POST" >
                    <br>
                    <label for="regis" >Ingrese su nombre:</label>
                            <input type="text" id="regis" name="regis" value="" placeholder="Ingrese su nombre completo" />
                            <br>
                            <br>
                            <label for="nombres" >Ingrese su correo :</label>
                            <input type="text" id="nombres" name="nombres" value="" placeholder="Ingrese su correo" />
                            <br>

                            <br>
                                <textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
                             <br>
                            <br>
                            <center><input type="submit" class="enviar" id="enviar" name="enviar" value="Enviar" /></center>
                         </form> 

            </section>

            <footer class="footernoso">
                    <br>
                    &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                    &#8226; Telefono: 074115436 <br/>
                    &#8226; Celular: +593985633576 <br/>
                    &#8226; Whatsapp: +593985633576 <br/>
                    &#8226; Correo: importmanguerasiv@gmail.com 
                </footer>
    </body>
</html>