<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <title>Contacto</title>
        <a class="cerrarindex" href="../../config/cerrar_sesion.php">Cerrar sesion</a>
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
                          <li><a href="indexusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="nosotrosusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="serviciousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a>
                <ul>
                                    <li> <a href="catalogo1.php?variable1=<?php echo $codigo?>">Catalogo Hidraulicas</a></li>
                                    <li> <a href="catalogo2.php?variable1=<?php echo $codigo?>">Catalogo Industriales</a></li>
                                    <li> <a href="catalogo3.php?variable1=<?php echo $codigo?>">Catalogo de Alta Temperatura</a></li>
                        </ul>
                        </li>
                <li><a href="contactousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li>
                <li><a href="cuenta.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CUENTA </a></li> 
                <li><img id ="iconcarrito" src="img/icon8.png" data-pushbar-target='pushbar-carrito'></li>        
                    </ul>
                </header>
                
        <section class="columna1">
                <div class="social">
                        <ul >
                                <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"></a></li> 
                                
                            </ul>
                </div>
                <p class="bienvenida"> 
        <?php echo "BIENVENIDA " ?>
        <?php echo $codigo ?>
       </p>
                
                <center><table class="tablecuenta" style="width:200%">
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
    </table></center>
           
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