<!DOCTYPE html> 
<html> 
    <head>     
    <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../../public/vista/style.css">
        <link type="text/css" rel="stylesheet" href="../../../css/estiloresu.css">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="../../../public/vista/css/swiper.min.css">
        <link type="text/css" rel="stylesheet" href="../../../css/estilos.css">
        <!-- Swiper JS -->
        <script src="../../../public/vista/js/swiper.min.js"></script>
       
        <title>Inicio</title>
        <a class="cerrarindex" href="../../../config/cerrar_sesion.php">Cerrar sesion</a>
    </head> 
 
<body> 
<header class="cabecera">   
           <a href="indexusuario.php"><img src="../../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
            
   </header>
   
   <section>
       <article class="indexabout">
               <div class="social">
                       <ul >
                       <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"></a></li> 
                                    <li><a href="importmanguerasiv@gmail.com" class="icon-mail4"></a></li>
                                    <li><a href="api.whatsapp.com/send?phone=+593992726928" class="icon-whatsapp"></a></li>
                           </ul>
               </div>
               
         
           
       </article>
   </section>

   <br>
   <!--transicion de las imagenes -->
   <center><section class="transcicion">

    <?php         
    $codigo = $_GET["codigo"];         
    $sql = "SELECT * FROM Usuario where usu_codigo=$codigo"; 
 
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