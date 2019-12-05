<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="keywords" content="manguera, importación, import"/>
        <!--<link type="text/css" rel="stylesheet" href="style.css">
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css"> -->
        <!-- Link Swiper's CSS -->
        <a class="cerrarindex" href="../../config/cerrar_sesion.php">Cerrar sesion</a>
        <link rel="stylesheet" href="css/swiper.min.css">
        <link rel="stylesheet" href="css/pagina.css">
         <!--<link type="text/css" rel="stylesheet" href="../../css/estilos.css">-->

        <!-- Swiper JS -->
        <script src="js/swiper.min.js"></script>
       
        <title>Inicio</title>

  </head>
  <body>
 

  
    </head>
    <body>
    <?php  
include '../../config/conexionBD.php';       
$codigo = $_GET["variable1"];
?> 
    <center><a href="indexusuario.php" ><img src="../../../imagenes/banner-imi.png"  alt="Import Mangueras"/></a></center>

        <header class="cabecera">
                                   
                <nav class="divmenu">
                
                <ul class="menunavegador">
                <li><a href="indexusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="nosotrosusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="serviciousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a>
                <ul>
                                    <li> <a href="catalogousuario1.php?variable1=<?php echo $codigo?>">Catalogo Hidraulicas</a></li>
                                    <li> <a href="catalogousuario2.php?variable1=<?php echo $codigo?>">Catalogo Industriales</a></li>
                                    <li> <a href="catalogousuario3.php?variable1=<?php echo $codigo?>">Catalogo de Alta Temperatura</a></li>
                        </ul>
              </li>
                <li><a href="contactousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li> 
                <li><a href="cuenta.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CUENTA </a></li>

              </ul>
           </nav>
        </header> 
   
        
        <section class="seccion">
            <div class="social">
                    <ul >
                    <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"><img id="iconmenu"src="img/img10.png"></a></li> 
                    </ul>       
            </div>
            <p class="bienvenida"> 
        <?php echo "BIENVENIDA " ?>
        <?php echo $codigo ?>
       </p>
        </section>
        <br>
         
        <br>
     
        <section class="seccion1">
           <table class="tablecuenta" style="width:100%">
<tr class="iteme">
<th class="item">Cedula</th></br>
<th class="item">Rol</th>
<th class="item">Nombres</th>
<th class="item">Apellidos</th>
<th class="item">Fecha de nacimiento</th>
<th class="item">Telefono</th>
<th class="item">Correo</th>
<th class="item">Elimina</th>
<th class="item">Modificar</th>
<th class="item">Cambiar contraseña</th>
</tr>

<?php
include '../../config/conexionBD.php';
$usuario = $_GET["variable1"];
$sql = "SELECT * FROM Usuario WHERE usu_nombres = '$usuario'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo " <tr>";
        echo " <td>" . $row["usu_cedula"] . "</td>";
        echo " <td>" . $row["usu_rol"] ."</td>";
        echo " <td>" . $row["usu_nombres"] . "</td>";
        echo " <td>" . $row["usu_apellidos"] . "</td>";
        echo " <td>" . $row["usu_fecha_nacimiento"] . "</td>";
        echo " <td>" . $row["usu_telefono"] . "</td>";
        echo " <td>" . $row["usu_correo"] . "</td>";
        echo " <td> <a href='../../admin/vista/usuario/eliminar.php?codigo=" . $row['usu_codigo'] . "'> E </a> </td>";
        echo " <td> <a href='../../admin/vista/usuario/modificar.php?codigo=" . $row['usu_codigo'] . "'> M </a> </td>";
        echo " <td> <a href='../../admin/sssvista/usuario/cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'> CC</a> </td>";
        echo "</tr>";
    
}
} else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
    ?>
     </table>
        </section>
         <br>
      
        <footer class="footernos">
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>
            
    </body>
</html>