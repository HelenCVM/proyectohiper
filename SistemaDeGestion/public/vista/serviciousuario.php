<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <title>Servicio</title>
       <!-- <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="style.css">-->
        

        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <link rel="stylesheet" href="css/bootstrap.min.css">
       <script src="js/bootstrap.min.js"></script>
       <link href="css/starrr.css" rel=stylesheet/>
    <script src="js/starrr.js"></script>
       <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    
        <script type="text/javascript" src="../vista/js/validacionusuario.js"></script>
        <link type="text/css" rel="stylesheet" href="css/pagina.css">

    </head>
    <body>
        <?php  
include '../../config/conexionBD.php';       
$codigo = $_GET["variable1"];

?> 
    <center><a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a><center>

            <header class="cabecera">
                <nav class="divmenu">
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
            <p class="bienvenida"> 
        <?php echo "BIENVENIDA " ?>
        <?php echo $codigo ?>
       </p>
        </section>
    <!-- ------- -->
        <br>
        <section class="productos">
                <h1 class="h1servicioss">PRODUCTOS</h1> 
     
                <?php
                include  '../../config/conexionBD.php';               
               $sql = "SELECT * FROM Producto";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
               
               while($row = $result->fetch_assoc()) {
                echo "<table class='produ'   CELLSPACING='50' CELLPADDING='2'>"  ;
                 echo "<tr>" ;
                echo  "<td>";
                echo "<h1>". $row['pro_nombre'] ."</h1>"; 
                echo "Marca:";
                echo "" . $row['pro_marca'] ."";
                echo "</br>";   
                echo "Descripcion:";
                echo "" . $row['pro_descripcion'] . ""; 
                echo "</br>"; 
                echo "Diametro Interno:";  
                echo " " . $row['pro_dia_in'] . "";  
                echo "</br>"; 
                echo "Peso Teorico:";          
                echo " " . $row['pro_peso_gm'] . "";
                echo "</br>";   
                echo "Presion de Trabajo:";
                echo " " . $row['pro_presi_bar'] . "";
                echo "</br>";   
                echo "Longitud:";
                echo " " . $row['pro_long_m'] . "";
                echo "</br>";  
                echo "Precio:"; 
                echo " " . $row['pro_precio'] . "";
                echo "</br>";   
                echo "Stock:";
                echo " " . $row['pro_stock'] . "</br>";  
                echo "</br>"; 

                
                echo  "  </td>";
              
                echo  "  <td class ='imagenproductos'>";
                    echo " <img class='perfil' src='../../../imagenes/industriales/".$row["pro_img"].".jpg' >";
                    echo  "  </td>";
                echo "  </tr>";
                echo " <form action=''>";

               echo" <div class='valoracion'>";
                echo "</table>";
               echo" <input id='radio1' type='radio' name='estrellas' value='5'>";
               echo " <label for='radio1'>&#9733</label>";
            
               echo" <input id='radio2' type='radio' name='estrellas' value='4'>";
                /*<label for="radio2">&#9733</label>
            
                <input id="radio3" type="radio" name="estrellas" value="3">
                <label for="radio3">&#9733</label>
            
                <input id="radio4" type="radio" name="estrellas" value="2">
                <label for="radio4">&#9733</label>
            
                <input id="radio5" type="radio" name="estrellas" value="1">
                <label for="radio5">&#9733</label>*/
                echo"</div>";
                echo"</form>";
                
               
                }     
                } else {
              
                echo " <td colspan='7'> No existen productos registradas en el sistema </td>";
                
                }
                $conn->close();
                ?>
        </section>
        
            </p>
            <hr/>
            Calificar: <span id="Estrellas"></span>
       