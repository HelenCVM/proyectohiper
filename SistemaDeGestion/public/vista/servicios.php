<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <title>Servicio</title>
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="style.css">
<<<<<<< HEAD
        
        <script type="text/javascript" src="../vista/js/validacionusuario.js"></script>
   

=======
      
>>>>>>> a406986c571b8a64252cc49f80bee1005df86780

    </head>
    <body>
            <header class="cabecera">
                    
                    <ul class="menunavegador">
                        <a href="index.html"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                        <hr color="slategrey" >
                        <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                        <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>                                            
                        <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a>
                        <ul>
                                    <li> <a href="catalogo1.php">Catalogo Hidraulicas</a></li>
                                    <li> <a href="catalogo2.php">Catalogo Industriales</a></li>
                                    <li> <a href="catalogo3.php">Catalogo de Alta Temperatura</a></li>
                        </ul>
                        </li>
                        <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS</a></li>                                                                     
                        <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png"> LOGIN</a></li>                
                        <li><a href="formulario.php"><img id ="iconmenu" src="img/icon6.png"> REGISTRATE</a></li>                             
                      <!-- <li><a href="buscar.html">BUSCAR</a></li> -->
                    </ul>
                </header>
                <section>
                <div class="social">
                        <ul >
                        <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"></a></li> 
                                    
                            </ul>
                </div>
                </section>
        
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
                
                echo "</table>";
               
                }     
                } else {
              
                echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                
                }
                $conn->close();
                ?>
            


        </section>
       
        <p>EStrellas</p>
        <form action="">

 

  <form id="formulario1" action="creacion.php" method="post">
  <div class="valoracion">
    <input id="radio1" type="radio" name="estrella1" value="5" onclick="mostrarDetalle()">
    <label for="radio1">&#9733  </label>

    <input id="radio2" type="radio" name="estrella2" value="4" onclick="mostrarDetalle()">
    <label for="radio2">&#9733</label>

    <input id="radio3" type="radio" name="estrella3" value="3" onclick="mostrarDetalle()">
    <label for="radio3">&#9733</label>

    <input id="radio4" type="radio" name="estrella4" value="2" onclick="mostrarDetalle()">
    <label for="radio4">&#9733</label>

    <input id="radio5" type="radio" name="estrella5" value="1" onclick="mostrarDetalle()">
    <label for="radio5">&#9733</label>
    <span id="valor"> </span>
    </div>
    </form>
    

        <section class="video">
                <iframe width="1000" height="315" src="https://www.youtube.com/embed/lR4MaqQWvaw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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