<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <title>Servicio</title>
        <link type="text/css" rel="stylesheet" href=" ../../css/estiloresu.css">
        
        <link type="text/css" rel="stylesheet" href="style.css">
        <script type="text/javascript" src="js/ajaxC3.js"></script>
    </head>
    <body>
    <?php  
include '../../config/conexionBD.php';       
$codigo = $_GET["variable1"];

?> 
 
            <header class="cabecera">
                    <a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
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
                </header>
                
        </header>

        
        <label for="nombres">Buscar Manguera:</label>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por cedula" onkeyup="buscarPornombre3(this)">
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
 <tbody id="data">
            
            <?php
            include '../../config/conexionBD.php';               
            $sql = "SELECT * FROM Producto WHERE cate_codigo=9";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
           
           while($row = $result->fetch_assoc()) {
            echo "<tr>";         
            echo " <td>" . $row['pro_nombre'] ."</td>";
            echo "</br>"; 
            echo " <td>" . $row['pro_marca'] ."</td>";
            echo "</br>"; 
            echo " <td>" . $row['pro_descripcion'] . "</td>"; 
            echo " <td>" . $row['pro_dia_in'] . "</td>";          
            echo " <td>" . $row['pro_peso_gm'] . "</td>";
            echo " <td>" . $row['pro_presi_bar'] . "</td>";
            echo " <td>" . $row['pro_long_m'] . "</td>";
            echo " <td>" . $row['pro_precio'] . "</td>";
            echo " <td>" . $row['pro_stock'] . "</td>";          
             echo " <td><img class='perfil' src='../../../imagenes/altatemperatura/".$row["pro_img"].".jpg' width=' 100px'
                height=' 100px'></td>";

            }     
            } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
            }
            $conn->close();
            ?>
  </tbody>

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