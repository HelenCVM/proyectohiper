<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
<<<<<<< HEAD
        <meta name="keywords" content="manguera, importación, import"/>
        <!-- <link type="text/css" rel="stylesheet" href=" ../css/estiloresu.css">-->
  
        <link type="text/css" rel="stylesheet" href="style.css">    
        <link rel="stylesheet" href="css/pushbar.css">
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css"> 

=======
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
       <link type="text/css" rel="stylesheet" href=" ../../css/estiloresu.css">
      
        <link type="text/css" rel="stylesheet" href="style.css">        
>>>>>>> a9d59caf1c7b4326dc178dd13142626632d43fc5
        <title>Productos</title>
       
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
        <section class="buscar">
       
        <form onsubmit="return busqueda()" >
        <input type="text" id="motivo" name="motivo" value="">
        <input type="submit" id="buscar" name="buscar" value="Buscar" onclick="busqueda()">
       </form>
       <div id="informacion"><b>Datos de la persona</b></div>
   
       </section>
       <script src="../../public/vista/js/funcion.js"> </script>

 <h1>Productos</h1> 
<section class="industriales">
    
<table class="indus">
 <tr>
     
 <th></th>
 <th>Nombre</th>
 <th>Marca</th>
 <th>Stock</th>
 <th>Descripcion</th>
 <th>Precio</th>
 </tr>              
            
            <?php
            include '../../config/conexionBD.php';               
            $sql = "SELECT * FROM producto WHERE id_categoria=3";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
           
           while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td> <a href='../controladores/buscar.php?codigo=" . $row["pro_nombre"] ."'></a></td>";
            echo "</br>";                 
            echo " <td>" . $row['pro_nombre'] ."</td>";
            echo " <td>" . $row['pro_marca'] ."</td>";
            echo " <td>" . $row['pro_stock'] . "</td>";
            echo " <td>" . $row['pro_descripcion'] . "</td>";
            echo " <td>" . $row['pro_precio'] . "</td>";  
               
            
           // echo "   <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";      

                echo " <td><img class='perfil' src='../../../imagenes/hidraulicaa/".$row["imagen"].".jpg' width=' 100px'
                height=' 100px'></td>";
                echo " <td> <a href='#' data-pushbar-target='pushbar-carrito'> Comprar </a> </td>";

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
<<<<<<< HEAD

        <!-- Carrito de compras -->
        <div data-pushbar-id="pushbar-carrito" class="pushbar from_right pushbar-carrito">
				<div class="btn-cerrar izquierda">
						<button data-pushbar-close><i class="fas fa-times"></i></button>
						</div>
				
						<p class="titulo">&#x1F6D2; Carrito de compras </p>
						
				</div>
									
			</div>
        <!-- ------------- --->

        <div class="ec-stars-wrapper">
            <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
            <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
            <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
            <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
            <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
        </div>
        <!--   ---------- -->

      <!---Escript para el carrito de compras -->
      <script src="js/pushbar.js"></script>
	<script>
	var pushbar = new Pushbar({
		blur: true,
		overlay: true
	});
	</script>
      <!-- --->


=======
       
        <!--   ---------- -->
         
        
>>>>>>> a9d59caf1c7b4326dc178dd13142626632d43fc5
        <footer>
            <br>
            &copy; Jorge Vinicio Pizarro Romero &#8226; Universidad Politécnica Salesiana &#8226; <a href=»mailto:jpizarror@est.ups.edu.ec»>jpizarror@est.ups.edu.ec</a>
        </footer>
    </body>
</html>