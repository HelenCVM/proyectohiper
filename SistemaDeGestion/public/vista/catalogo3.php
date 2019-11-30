<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <title>Servicio</title>
        <link type="text/css" rel="stylesheet" href=" ../css/estiloresu.css">
        
        <link type="text/css" rel="stylesheet" href="style.css">
        <script type="text/javascript" src="js/ajaxC3.js"></script>
    </head>
    <body>
            <header class="cabecera">
                    <a href="index.html"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                    <ul class="menunavegador">
                        <li><a href="index.html">INICIO</a></li> 
                        <li><a href="nosotros.html">NOSOTROS</a></li>
                        <li><a href="servicios.html">PRODUCTOS</a></li>
                        <li><a href="contacto.html">CONTACTANOS</a></li>                                       
                        <li><a href="login.html">LOGIN</a></li>                
                        <li><a href="formulario.html">REGISTRATE</a></li>                         
                        <li><a href="buscar.html">BUSCAR</a></li>
                    </ul>
                </header>
                
        </header>

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
 <th>Nombre</th>
 <th>Marca</th>
 <th>Stock</th>
 <th>Descripcion</th>
 <th>Precio</th>
 </tr>                </tr>

            
            <?php
            include '../../config/conexionBD.php';               
            $sql = "SELECT * FROM producto WHERE id_categoria=5";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
           
           while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row["pro_nombre"] . "</td>";
            echo "</br>";
            echo " <td>" . $row['pro_marca'] ."</td>";
            echo " <td>" . $row['pro_stock'] . "</td>";
            echo " <td>" . $row['pro_descripcion'] . "</td>";
            echo " <td>" . $row['pro_precio'] . "</td>";             

                echo " <td><img class='perfil' src='../../../imagenes/altatemperatura/".$row["imagen"].".jpg' width=' 100px'
                height=' 100px'></td>";
           
           
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

        <footer>
            <br>
            &copy; Jorge Vinicio Pizarro Romero &#8226; Universidad Politécnica Salesiana &#8226; <a href=»mailto:jpizarror@est.ups.edu.ec»>jpizarror@est.ups.edu.ec</a>
        </footer>
    </body>
</html>