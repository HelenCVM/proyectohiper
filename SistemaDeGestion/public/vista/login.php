<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Iniciar sesión</title>
 <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="style.css">
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <link type="text/css" rel="stylesheet" href="../../css/registrar.css">
        <script type="text/javascript" src="../vista/js/validacionusuario.js"></script>
 
</head>

<body>
        <header class="cabecera">
                
                <ul class="menunavegador">
                        <a href="index.php"><img src=" ../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                        <hr color="slategrey" >
                        <nav class="divmenu">
                <ul class="menunavegador">
                <hr color="slategrey" >
                <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a></li>
                <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li>
                <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png"> LOGIN</a></li>                
                <li><a href="formulario.php"> <img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li>                                         
              

              
                </ul>
            </header>

 <section class="login">
        <div class="social">
                <ul >
                <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"></a></li> 
                                    
                    </ul>
        </div>
<div class="login-box">
    <img src="../../../imagenes/manguera1.png" class="avatar" alt="">
    <h1>Login</h1>
    <form id="formulario02" method="POST" action="../../config/login.php" onsubmit="return validarCamposObligatorios()">
    <label for="correo">Correo electrónico(*) </label>
    <input type="text" id="correo" name="correo" value="" placeholder="Ingrese el correo ..."   onkeyup="validarCorreo('errorEmail',this)"/>
    <span id="mensajeCorreo" class="error"></span>      
    <br>
    <label for="nombres">Constraseña (*)</label>
    <input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su
   contraseña ..."/>
   <span id="mensajeContra" class="error"></span>      
    <br>
    <input type="submit" id="login" name="login" value="Iniciar Sesión" />
    
    </form>
</div>

   
</section>

</body>

</html>

