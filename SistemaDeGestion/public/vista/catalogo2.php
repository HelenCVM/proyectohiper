<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <title>Servicio</title>
        <link type="text/css" rel="stylesheet" href=" ../../css/estiloresu.css">
        
        <link type="text/css" rel="stylesheet" href="style.css">
        <script type="text/javascript" src="js/ajaxC2.js"></script>
    </head>
    <body>
            <header class="cabecera">
                    <a href="index.html"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                    <ul class="menunavegador">
                        <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png">INICIO</a></li> 
                        <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png">NOSOTROS</a></li>
                        <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png">PRODUCTOS</a></li>
                        <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png">CONTACTANOS</a></li>                                       
                        <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png">LOGIN</a></li>                
                        <li><a href="formulario.php"><img id ="iconmenu" src="img/icon6.png">REGISTRATE</a></li>  
                        <li><a href="carrito.php"><img id ="iconcarrito" src="img/icon8.png" data-pushbar-target='pushbar-carrito'> </a></li> 
                    </ul>
                </header>
                
        </header>
        <h1>Productos</h1> 
        
        <label for="nombres">Buscar Manguera:</label>
        <form  onsubmit="return buscarPornombre()">
                <input type="text" id="nombrep" name="nombrep" value="">
                <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPornombre()">
        </form>
        <br>
        <div id="informacion"><b></b></div>
        <br>
            
        <h1>Productos</h1> 
<section class="industriales">
    
<table class="indus">
 <tr>
     
 <th></th>
 <th>Nombre</th>
 <th>Marca</th>
 <th>Descripcion</th>
 <th>Diametro interno</th>
 <th>Peso Teorico</th> 
 <th>Presion de Trabajo</th>
 <th>Longitud</th>
 <th>Precio</th>
 <th>Stock</th>
 </tr>                </tr>

            
            <?php
            include  '../../config/conexionBD.php';               
           $sql = "SELECT * FROM Producto WHERE cate_codigo=8";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
           
           while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td> <a href='../controladores/buscar.php?codigo=" . $row["pro_nombre"] ."'></a></td>";
            echo "</br>";                 
            echo " <td id='nombreP' >" . $row['pro_nombre'] ."</td>";
            echo " <td>" . $row['pro_marca'] ."</td>";
            echo " <td>" . $row['pro_descripcion'] . "</td>"; 
            echo " <td>" . $row['pro_dia_in'] . "</td>";          
            echo " <td>" . $row['pro_peso_gm'] . "</td>";
            echo " <td>" . $row['pro_presi_bar'] . "</td>";
            echo " <td>" . $row['pro_long_m'] . "</td>";
            echo " <td>" . $row['pro_precio'] . "</td>";
            echo " <td>" . $row['pro_stock'] . "</td>";       

         echo " <td><img class='perfil' src='../../../imagenes/industriales/".$row["pro_img"].".jpg'  width=' 100px'
                height=' 100px' ></td>";
           
           
            }     
            } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
            }
            $conn->close();
            ?>

            </table>

           
          
            
           
            
        </section>
        <div class="ec-stars-wrapper">
            <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
            <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
            <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
            <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
            <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
        </div>

        <footer class="footernoso">
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>
    </body>
</html>