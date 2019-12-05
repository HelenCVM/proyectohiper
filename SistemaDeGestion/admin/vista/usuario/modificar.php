<!DOCTYPE html> 
<html> 
    <head>     
    <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="keywords" content="manguera, importación, import"/>
        <link rel="stylesheet" href="../../../public/vista/css/pagina.css">
       
        <title>Inicio</title>
        <a class="cerrarindex" href="../../../config/cerrar_sesion.php">Cerrar sesion</a>
    </head> 
 
<body> 
<?php  
include '../../../config/conexionBD.php';       
$codigo = $_GET["variable1"];
?> 
<header class="cabecera">   
           <a href="indexusuario.php"><img src="../../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
           <nav class="divmenu">
                    <ul class="menunavegador">
                <li><a href="../../../public/vista/indexusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                <li><a href="../../../public/vista/nosotrosusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                <li><a href="../../../public/vista/serviciousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a>
                <ul>
                                    <li> <a href="../../../public/vista/catalogousuario1.php?variable1=<?php echo $codigo?>">Catalogo Hidraulicas</a></li>
                                    <li> <a href="../../../public/vista/catalogousuario2.php?variable1=<?php echo $codigo?>">Catalogo Industriales</a></li>
                                    <li> <a href="../../../public/vista/catalogousuario3.php?variable1=<?php echo $codigo?>">Catalogo de Alta Temperatura</a></li>
                </ul>
              </li>
                <li><a href="../../../public/vista/contactousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS </a></li>
                <li><a href="../../../public/vista/cuenta.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CUENTA </a></li> 
               

              </ul>
                    </nav>
   </header>
   
   <section>
       <article class="indexabout">
               <div class="social">
                       <ul >
                       <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"></a></li> 
                                   
                           </ul>
               </div>
               
               <p class="bienvenida"> 
        <?php echo "BIENVENIDA " ?>
        <?php echo $codigo ?>
       </p>
           
       </article>
   </section>

   <br>
   <!--transicion de las imagenes -->
   <center><section class="transcicion">

    <?php         
    $codigo = $_GET["variable1"];         
    $sql = "SELECT * FROM Usuario where usu_nombres='$codigo'"; 
 
        include '../../../config/conexionBD.php';          
        $result = $conn->query($sql);                  
        if ($result->num_rows > 0) {                          
            while($row = $result->fetch_assoc()) {             
        ?> 
 
                <form class="formulario01" method="POST" action="../../controladores/usuario/modificar.php"> 
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
 
                    <label for="cedula">Cedula (*)</label>                     
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" required placeholder="Ingrese la cedula ..."/>                     
                    <br> 
 
                    <label for="nombres">Nombres (*)</label>                     
                    <input type="text" id="nombre" name="nombre" value="<?php echo $row["usu_nombres"]; ?>" required placeholder="Ingrese los dos nombres ..."/>                     
                    <br> 
 
                    <label for="apellidos">Apelidos (*)</label>                     
                    <input type="text" id="apellido" name="apellido" value="<?php echo $row["usu_apellidos"]; ?>" required placeholder="Ingrese los dos apellidos ..."/>                     
                    <br> 
 
                    <label for="telefono">Teléfono (*)</label>                     
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" required placeholder="Ingrese el teléfono ..."/>                     
                    <br>                 
 
                    <label for="fecha">Fecha Nacimiento (*)</label>                     
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required placeholder="Ingrese la fecha de nacimiento ..."/>                     
                    <br> 
 
                    <label for="correo">Correo electrónico (*)</label>                     
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required placeholder="Ingrese el correo electrónico ..."/>                     
                    <br>                                         
                     <input type="submit" id="modificar" name="modificar" value="Modificar" />                     
                     <input type="reset" id="cancelar" name="cancelar" value="Cancelar" /> 
                </form>                     
 
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