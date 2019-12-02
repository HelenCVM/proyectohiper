<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>      
        <link rel="stylesheet" href="css/pushbar.css">
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css"> 
        
        <link type="text/css" rel="stylesheet" href=" ../../css/estiloresu.css">
        <link type="text/css" rel="stylesheet" href="style.css"> 

        <script type="text/javascript" src="js/ajaxC1.js"></script>

        <title>Productos</title>
       
    </head>
    <body>
            <header class="cabecera">
                    <a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                    <ul class="menunavegador">


                        <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png">INICIO</a></li> 
                        <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png">NOSOTROS</a></li>
                        <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png">PRODUCTOS</a></li>
                        <li><a href="contacto.php">CONTACTANOS</a></li>                                       
                        <li><a href="login.php">LOGIN</a></li>                
                        <li><a href="formulario.php">REGISTRATE</a></li>                         
                <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png">INICIO</a></li> 
                        <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png">NOSOTROS</a></li>
                        <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png">PRODUCTOS</a></li>
                        <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png">CONTACTANOS</a></li>                                       
                        <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png">LOGIN</a></li>                
                        <li><a href="formulario.php"><img id ="iconmenu" src="img/icon6.png">REGISTRATE</a></li>                         

                        <li><a href="index.php">INICIO</a></li> 
                        <li><a href="nosotros.php">NOSOTROS</a></li>
                        <li><a href="servicios.php">PRODUCTOS</a></li>
                        <li><a href="contacto.php">CONTACTANOS</a></li>                                       
                        <li><a href="login.php">LOGIN</a></li>                

                        <li><a href="formulario.php">REGISTRATE</a></li>   

                        <li><a href="buscar.php">BUSCAR</a></li>

                        <li><a href="carrito.php"><img id ="iconcarrito" src="img/icon8.png" data-pushbar-target='pushbar-carrito'> </a></li>
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
     
 <th></th>
 <th>Nombre</th>
 <th>Marca</th>
 <th>Stock</th>
 <th>Descripcion</th>
 <th>Precio</th>
 </tr>              
            
            <?php
            include '../../config/conexionBD.php';               
            $sql = "SELECT * FROM Producto  where cate_codigo='1'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td> <a href='../controladores/buscar.php?codigo=" . $row["pro_nombre"] ."'></a></td>";
            echo "</br>";                 
            echo " <td id='nombreP' >" . $row['pro_nombre'] ."</td>";
            echo " <td>" . $row['pro_marca'] ."</td>";
            echo " <td>" . $row['pro_stock'] . "</td>";
            echo " <td>" . $row['pro_descripcion'] . "</td>";
            echo " <td>" . $row['pro_precio'] . "</td>";  
             echo " <td><img class='perfil' src='../../../imagenes/hidraulicaa/".$row["pro_img"].".jpg' width=' 100px'
                height=' 100px'></td>";

               echo " <td> <a href='#' data-pushbar-target='pushbar-carrito'> Comprar </a> </td>";
              
            }     
            } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen productos registradas en el sistema </td>";
            echo "</tr>";
            }
            $conn->close();
            ?>

            </table> 
        </section>

        <!-- Carrito de compras -->
        <div data-pushbar-id="pushbar-carrito" class="pushbar from_right pushbar-carrito" style="background: brown;
	width: 365px; font-size: 18px;   font-weight: 300;">            
				<div class="btn-cerrar izquierda">
           

                    
						<button data-pushbar-close><i class="fas fa-times"></i></button>
						</div>
				
                        <p class="tituloC">&#x1F6D2; Carrito de compras </p>



                      <!--agregamso la parte de los botones --> 
                      <input type="button" id="regresarA" class="regresarA" name="regresar" value="regresar" onkeypress=" ">
                      <input type="button" id="comprarP" class="comprarP" name="comprarP" value="Ir a comprar" onkeypress=" ">
        

                        
                       
						

				</div>
									
			</div>
        <!-- ------Estrellas------ --->

        
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


      <footer class="footernoso">
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>
    </body>
</html>