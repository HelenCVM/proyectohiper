<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>      
        <link rel="stylesheet" href="css/pushbar.css">
        <!--<link type="text/css" rel="stylesheet" href="../../css/estilos.css"> 
        <link type="text/css" rel="stylesheet" href=" ../../css/estiloresu.css">
        <link type="text/css" rel="stylesheet" href="style.css"> -->

        <script type="text/javascript" src="js/ajaxC1.js"></script>

        <link type="text/css" rel="stylesheet" href="css/pagina.css">
        <title>Productos</title>
       
    </head>
    <body>
    <center><a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a></center>
            <header class="cabecera">
                    <nav class="divmenu">
                    <ul class="menunavegador">
                       <li><a href="index.php"><img id ="iconmenu" src="img/icon1.png">INICIO</a></li> 
                        <li><a href="nosotros.php"><img id ="iconmenu" src="img/icon2.png">NOSOTROS</a></li>
                        <li><a href="servicios.php"><img id ="iconmenu" src="img/icon3.png">PRODUCTOS</a>
                        <ul>
                                    <li> <a href="catalogo1.php">Catalogo Hidraulicas</a></li>
                                    <li> <a href="catalogo2.php">Catalogo Industriales</a></li>
                                    <li> <a href="catalogo3.php">Catalogo de Alta Temperatura</a></li>
                        </ul>
                        </li>
                        <li><a href="contacto.php"><img id ="iconmenu" src="img/icon4.png">CONTACTANOS</a></li>                                       
                        <li><a href="login.php"><img id ="iconmenu" src="img/icon5.png">LOGIN</a></li>                
                        <li><a href="formulario.php"><img id ="iconmenu" src="img/icon6.png">REGISTRATE</a></li>                         
                        <li><a><img id ="iconcarrito" src="img/icon8.png" data-pushbar-target='pushbar-carrito'>CARRITO</a></li>                            
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
        </section>
    <!-- ------- -->
    
        <br>
        <br>
        <br>
        <br>
        <label for="nombres" class="nombresC1">Buscar Manguera:</label>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por nombre" onkeyup="buscarPornombre(this)">
        </form>

        <br>
        <div id="informacion"><b></b></div>
        <br>

      

 <h1>Productos</h1> 
<section class="industriales" >
<table class="indus" >
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
            $sql = "SELECT * FROM Producto  where cate_codigo='1'";
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
             echo " <td><img class='perfil' src='../../../imagenes/hidraulicaa/".$row["pro_img"].".jpg' width=' 100px'
                height=' 100px'></td>";

               echo " <td> <a href='insertarC.php?codigo=" . $row['pro_codigo'] . "' data-pushbar-target='pushbar-carrito' >
               <input type='button' class='comprarCarr' value='Comprar' />
               </a> </td>";
               
              
            }     
            } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen productos registradas en el sistema </td>";
            echo "</tr>";
            }
            $conn->close();
            ?>
            
            </tbody>

            </table> 
        </section>

        <!-- Carrito de compras -->
        <div data-pushbar-id="pushbar-carrito" class="pushbar from_right pushbar-carrito">            
				<div class="btn-cerrar izquierda">
			        <button data-pushbar-close><i class="fas fa-times"></i></button>
				</div>
				
                        <p class="tituloC">&#x1F384;&#x1F6D2; Carrito de compras </p>
                        <!-- Aqui van los productos seleccionados -->
                        <div class="procarrito">
                        
                        </div>
                        <!--     ------------- -->
                      <!--agregamso la parte de los botones --> 
                      <input type="button" id="regresarA" class="regresarA" name="regresar" value="Seguir comprando" data-pushbar-close>
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


      <footer class="footernos">
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>
    </body>
</html>