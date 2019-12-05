<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <title>Contacto</title>
    
        <!--<link type="text/css" rel="stylesheet" href=" style.css">
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">-->

        <link type="text/css" rel="stylesheet" href="css/pagina.css">
        <link type="text/css" rel="stylesheet" href="css/dos_columnas.css">
        
    </head>
    <body>

    <center><a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a></center>
            <header class="cabecera">
                    <nav class="divmenu">
                       <ul class="menunavegador">
                        <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                        <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                        <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a>
                        <ul>
                                    <li> <a href="catalogo1.php">Catalogo Hidraulicas</a></li>
                                    <li> <a href="catalogo2.php">Catalogo Industriales</a></li>
                                    <li> <a href="catalogo3.php">Catalogo de Alta Temperatura</a></li>
                        </ul>
                        </li>
                        <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS</a></li>                                       
                        <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png"> LOGIN</a></li>                
                        <li><a href="formulario.php"><img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li>                         
                        <li><a><img id ="iconcarrito" src="img/icon8.png" data-pushbar-target='pushbar-carrito'>CARRITO</a></li>  
                    
                        </ul>
                    </nav>
                </header>
                
                <div class="social">
                        <ul >
                                <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"></a></li> 
                               
                            </ul>
                </div>

                <br>
                <br>
                <br>                
                <section class="columna1">
                               
                <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.720758876699!2d-78.99957548518545!3d-2.8966001978901956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd1816254c84e9%3A0x5453d59aeec7e540!2sImport%20Mangueras%20Idrovo!5e0!3m2!1ses!2sec!4v1574872033881!5m2!1ses!2sec" width="90%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
           
        </section>

        <br>
                <br>
                <br>
        <section class="columna2"> 
            <h2 id="Contactanos"> &#128222 Contactanos :</h2>
                <br>
                <form id="formularioc" action="../controladores/enviar2.php" method="POST" >
                    <br>
                    <label for="nomrbes" id="nombreslabel">Ingrese su nombre:</label>
                            <input type="text" id="nombres" name="name" required="required" placeholder="Ingrese su nombre completo" />
                            <br>
                            <br>
                            <label for="correo" id="nombreslabel">Ingrese su correo :</label>
                            <input type="email" id="nombres" name="email" required="required"  placeholder="Ingrese su correo" />
                            <br>
                            <br>
                                <textarea type="text" name="message" rows="15" cols="60">Escribe aquí tus comentarios</textarea>
                             <br>
                            <center><input type="submit" class="enviar" id="enviar" name="enviar" value="Enviar" /></center>
                         </form> 
                         <br>
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