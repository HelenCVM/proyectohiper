<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
       <!-- <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="style.css">
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <link type="text/css" rel="stylesheet" href="../../css/formulario.css ">-->
        <script type="text/javascript" src="../vista/js/validacionusuario.js"></script>

        <link type="text/css" rel="stylesheet" href="css/pagina.css">
    
</head>
<body>
    <center> <a href="index.html"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a></center>
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
<!-- públicidad-->
<section class="seccion">
            <div class="social1">
                    <ul >
                    <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"><img id="iconmenu"src="img/img10.png"></a></li> 
                    </ul>       
            </div>
        </section>
    <!-- ------- -->
    
    <section class="login">
 <br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br><br>    
        <div class="loginboxe">
    <form id="formulario011" method="POST" action="../../config/creacion_usuario.php" onsubmit="return validarCamposObligatorioss()">
          
        <label for="cedula">Cedula (*)</label>
        <input type="text" maxlength="10" id="cedula" name="cedula" value="" placeholder="Ingrese el número de cedula ..."
        onkeypress="return validarNumero(event, this)"
                onkeyup="validarCedula(this)"
         />
        <span id="mensajeCedula" class="error"></span>        
        <br>

        <label for="nombres">Nombres (*)</label>
        <input type="text" id="nombre" name="nombre" value="" placeholder="Ingrese sus dos nombres ..."
        onkeyup="this.value = validarLetras(this.value)"
        />
       <span id="mensajeNombre" class="error"></span>        
     
        <br>

        <label for="apellidos">Apelidos (*)</label>
        <input type="text" id="apellidos" name="apellidos" value="" placeholder="Ingrese sus dos apellidos ..." 
        onkeyup="this.value = validarLetras(this.value)"
        />
        <span id="mensajeApellido" class="error"></span>        
     

        <br>
        <label for="fechanaci">Fecha de nacimiento (*)</label>
        <input type="text" id="fechanaci" name="fechanaci" value="" placeholder="Ingrese su dirección ..." 
        
       />
       <span id="mensajeFecha" class="error"></span>        
     

        <br>

        <label for="telefono">Teléfono (*)</label>
        <input type="text" maxlength="10" id="telefono" name="telefono" value=""  placeholder="Ingrese su número telefónico ..." 
        onkeypress="return validarNumero(event, this)"
        />
        <span id="mensajeTelefono" class="error"></span>        
     
        <br>  

        <label for="correo">Correo electrónico (*)</label>
        <input type="email" id="correo" name="correo"  placeholder="Ingrese su correo electrónico ..."
       />
       <span id="mensajeCorreo" class="error"></span>        
     
        <br>

        <label for="correo">Contraseña (*)</label>
        <input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su contraseña ..." />
        <br>

        <input type="submit" id="crear" name="crear" value="Aceptar" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form> 

</div>
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