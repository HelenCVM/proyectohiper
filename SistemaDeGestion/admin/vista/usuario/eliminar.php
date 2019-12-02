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
                               <li><a href="http://www." class="icon-facebook2"></a></li> 
                               <li><a href="http://www." class="icon-mail4"></a></li>
                               <li><a href="http://www." class="icon-whatsapp"></a></li>
                           </ul>
               </div>
               
         
           
       </article>
   </section>

   <br>
   <!--transicion de las imagenes -->
   <center><section class="transcicion">

    <?php              
    $codigo = $_GET["codigo"];         
    $sql = "SELECT * FROM Usuario where usu_codigo='$codigo'";                  
    include '../../../config/conexionBD.php';          
    $result = $conn->query($sql);                  
    if ($result->num_rows > 0) {                          
        while($row = $result->fetch_assoc()) {             
    ?> 
 
                <form class="formulario01" method="POST" action="../../controladores/usuario/eliminar.php">                     <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
 
                    <label for="cedula">Cedula (*)</label>                     
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled/>                     <br> 
 
                    <label for="nombres">Nombres (*)</label>                     
                    <input type="text" id="nombre" name="nombre" value="<?php echo $row["usu_nombres"]; ?>" disabled/>                     <br> 
 
                    <label for="apellidos">Apelidos (*)</label> 
                    <input type="text" id="apellido" name="apellido" value="<?php echo $row["usu_apellidos"]; ?>" disabled/>                     <br> 
                        
                    <label for="telefono">Teléfono (*)</label>                     
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled/>                     <br>                 
 
                    <label for="fecha">Fecha Nacimiento (*)</label>                     
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled/>                     <br> 
 
                    <label for="correo">Correo electrónico (*)</label>                     
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled/>                     <br>                                          
                    <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />                     
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
       