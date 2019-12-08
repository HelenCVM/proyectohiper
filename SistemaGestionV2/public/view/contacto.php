<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <title>Contacto</title>
    
        
        
        <link rel="stylesheet" href="../css/globalStyle.css">
    <link rel="stylesheet" href="../css/generalStyle.css">
        
    </head>
    <body>

    <header>
        
        <?php
        include_once("../../global/php/headerPublic.php");
        ?>

    </header>
                
                  <!-- públicidad
    <section class="seccion">
            <div class="social1">
                    <ul >
                    <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"><img id="iconmenu"src="img/img10.png"></a></li> 
                    </ul>       
            </div>
        </section>
    ------- -->

                <br>
                <br>
                <br>                
              <center>  <section class="columna1">
                               <h1 id="localM">&#128205;LOCALIZACION :</h1>
                               <br>
                <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.720758876699!2d-78.99957548518545!3d-2.8966001978901956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd1816254c84e9%3A0x5453d59aeec7e540!2sImport%20Mangueras%20Idrovo!5e0!3m2!1ses!2sec!4v1574872033881!5m2!1ses!2sec" width="90%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
           
        </section></center>

        <br>
                <br>
                <br>
        <center><section class="columna22"> 
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
                                <textarea type="text" name="message" rows="15" cols="40">Escribe aquí tus comentarios</textarea>
                             <br>
                            <center><input type="submit" class="enviar" id="enviar" name="enviar" value="Enviar" /></center>
                         </form> 
                         <br>
                     </section><center>

                     <br>
                     <br>
                     <footer>
        <?php
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

    </body>
</html>