<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location:login.php");
} elseif ($_SESSION['rol'] == 'user') {
    header("Location:nosotros.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../../css/estilos.css">
        <title>Nosotros</title>
        <a href="../../config/cerrar_sesion.php">Cerrar sesion</a>
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="style.css">
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
    </head>
    <body>
    <?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location:login.php");
}
?>
  <?php
        $correo=$_GET["correo"];
        $sql = "SELECT * FROM Usuario where usu_correo='$correo'";
        include '../../config/conexionBD.php';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
            <header class="cabecera">
                    
                    <ul class="menunavegador">
                        <a href="index.html"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                        <hr color="slategrey" >
                        <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                        <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                        <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a></li>
                        <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS</a></li>
                        <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png"> LOGIN</a></li>                
                        <li><a href="formulario.php"><img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li> 
                        <li><?php include "php/header.php";?>></li>                                                
                       <!-- <li><a href="buscar.html">BUSCAR</a></li> -->
                    </ul>
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
                <h1 class="h1nosotros">
                    QUIENES SOMOS
                
                </h1>
                <iframe width="1170" height="500" src="https://www.youtube.com/embed/z3QVtk1iOM0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class="p1nosotros">
                <img class="imanoso" src="../../../imagenes/Comercializar mangueras y marcas ,con estandar y certificaciones internacionales.png" alt="Import Mangueras"/> 
                
                </p>
                
            </article>
            <aside class="imgabout">
                
            </aside>
        </section>
        
        <footer class="footernoso">
            <br>
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