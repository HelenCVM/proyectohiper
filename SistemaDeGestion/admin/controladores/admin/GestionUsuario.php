<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../../public/vista/style.css">
        <link type="text/css" rel="stylesheet" href="../../../css/estiloresu.css">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="css/swiper.min.css">
        <link type="text/css" rel="stylesheet" href="../../../css/estilos.css">
        <!-- Swiper JS -->
        <script src="js/swiper.min.js"></script>
       
        <title>Inicio</title>
  
    </head>
    <body>
        <header class="cabecera">
           
             
                <a href="index.html"><img src="../../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                
                <nav class="divmenu">
                <ul class="menunavegador">
                <hr color="slategrey" >
                <li><a href="GestionUsuario.php"> GESTION USUARIOS</a></li>
                <li><a href="GestionProductos.php"> GESTION PRODUCTOS </a></li>
                <li><a href="GestionPedidos.php"> GESTION PEDIDOS </a></li>                
                <li><a href="GestionFactura.php"> GESTION FACTURA </a></li>                                         
                <!-- <li><a href="buscar.html"><img id ="iconmenu" src="img/icon7.png"> BUSCAR</a></li> -->

              </ul>
           </nav>

        </header>    
        
        <section class="seccion">
            <div class="social">
                    <ul >
                            <li><a href="http://www." class="icon-facebook2"></a></li> 
                            <li><a href="http://www." class="icon-mail4"></a></li>
                            <li><a href="http://www." class="icon-whatsapp"></a></li>
                        </ul>
            </div>
        </section>

        <br>
        <!--transicion de las imagenes -->
        <center><section class="transcicion">
        <table style="width:100%">
<tr>
<th>Cedula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Dirección</th>
<th>Telefono</th>
<th>Ciudad</th>
<th>Provincia</th>
<th>Correo</th>

</tr>
<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location:../../../public/login.html");
}
?>
<?php
include '../../../config/conexionBD.php';
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location:../../../public/login.html");
}
$sql = "SELECT * FROM usuario WHERE usu_rol='U'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo " <tr>";
        echo " <td>" . $row["usu_cedula"] . "</td>";
        echo " <td>" . $row["usu_nombre"] ."</td>";
        echo " <td>" . $row["usu_apellido"] . "</td>";
        echo " <td>" . $row["usu_direccion"] . "</td>";
        echo " <td>" . $row["usu_telefono"] . "</td>";
        echo " <td>" . $row["usu_ciudad"] . "</td>";
        echo " <td>" . $row["usu_provincia"] . "</td>";
        echo " <td>" . $row["usu_email"] . "</td>";
        echo " <td> <a href='../../vista/admin/modificar.php?codigo=" . $row['usu_codigos'] . "'> Modificar </a> </td>";
        echo " <td> <a href='../../vista/admin/eliminar.php?codigo=" . $row['usu_codigos'] . "'> Eliminar</a> </td>";
        echo " <td> <a href='../../vista/admin/cambiar_contrasena.php?codigo=" . $row['usu_codigos'] . "'> Cambiar contraseña</a> </td>";
        echo "</tr>";
    
}
} else {
echo "<tr>";
echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
echo "</tr>";
}
?>
</table>
              
        </section></center>


        

        <footer class="footernoso">
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>
    </body>
</html>