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
        <a href="../../config/cerrar_sesion.php">Cerrar sesion</a>
  </head>
  <body>
  <?php
//incluir conexión a la base de datos
include '../../config/conexionBD.php';
$usuario = $_GET['correo'];
echo "$usuario";
$sql = "SELECT * FROM Usuario WHERE usu_correo = '$usuario'";
echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$_SESSION['isLogged'] = TRUE;
while($row = $result->fetch_assoc()) {
if($row['usu_correo']==$usuario){
?>
        <header class="cabecera">
           
             
                <a href="index.html"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                 
                <nav class="divmenu">
                <ul class="menunavegador">
                <hr color="slategrey" >
                <li><a href="index1.php"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="nosotros1.php"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a></li>
                <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li>
                <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png"> LOGIN</a></li>                
                <li><a href="formulario.php"> <img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li>     
                <li><span class="user"><?php echo ($row['usu_nombres'] . ' ' . $row['usu_apellidos']) ?></span></li>                                    
              

              </ul>
           </nav>

        </header>    
<?php
}
}
}
$conn->close();
?>
</body>
</html>