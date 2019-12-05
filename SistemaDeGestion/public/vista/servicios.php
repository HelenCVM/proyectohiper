<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <title>Servicio</title>
       <!-- <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="style.css">
    
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">-->
        
        
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <link rel="stylesheet" href="css/bootstrap.min.css">
       <script src="js/bootstrap.min.js"></script>
       <link href="css/starrr.css" rel=stylesheet/>
    <script src="js/starrr.js"></script>
       <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    
        <script type="text/javascript" src="../../public/vista/js/validacionusuario.js"></script>
        <link type="text/css" rel="stylesheet" href="css/pagina.css">

    </head>
    <body>
    <center><a href="index.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a><center>

            <header class="cabecera">
                <nav class="divmenu">
                    <ul class="menunavegador">
                        
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
              
                echo " <td colspan='7'> No existen productos registradas en el sistema </td>";
                
                }
                $conn->close();
                ?>
        </section>
<form  action="" method="GET" class="form_search"   >

<div class='valoracion'>
<input id='radio5' type='radio' name='estrellas' onclick="ShowHideDiv(5)" >
<label for='radio5'>&#9733</label>
<input id='radio4' type='radio' name='estrellas' onclick="ShowHideDiv(4)" >
<label for='radio4'>&#9733</label>
<input id='radio3' type='radio' name='estrellas' onclick="ShowHideDiv(3)" >
<label for='radio3'>&#9733</label>
<input id='radio2' type='radio' name='estrellass' onclick="ShowHideDiv(2)"/>
 <label for='radio2'>&#9733</label>
<input id='radio1' type='radio' name='estrellas' onclick="ShowHideDiv(1)" >
<label for='radio1'>&#9733</label>

</div>

</form>



<script>
    function ShowHideDiv(x){
    var chkYes = document.getElementById ( "radio1" );
    console.log("ya");
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        }
    };
    if(x==1){
        x=1;
        
        console.log("pakajsn");
        console.log(x);
    xmlhttp.open("GET", "../vista/phpajax/insertarestrellas.php?keyy=" +x, true);
        xmlhttp.send();
    }else if( x==2)
    {
        x=2;
        console.log(x);
        xmlhttp.open("GET", "../vista/phpajax/insertarestrellas.php?keyy=" +x, true);
        xmlhttp.send();    
    console.log("2")
    } else if( x==3){
        
    console.log("3")
    } else if (x==4)
    {
        
    console.log("4")
    }
    else if (x==5){

        console.log("5")
    }

        
    }
</script>

        
            </p>
            <hr/>
            Calificar: <span id="Estrellas"></span>
            <hr/>
    </div>
	<script>
   $('#Estrellas').starrr({
       rating:3,
       change:function(e,valor){
           alert(valor);
           
       }
       
   });
    
    </script>
    

        <section class="video">
                <iframe width="1150" height="315" src="https://www.youtube.com/embed/lR4MaqQWvaw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </section>
        <footer class="footernos">
                <br>
                &copy;  &#8226; Dirección: Mariscal Lamar 1-67 y Manuel Vega <br/>
                &#8226; Telefono: 074115436 <br/>
                &#8226; Celular: +593985633576 <br/>
                &#8226; Whatsapp: +593985633576 <br/>
                &#8226; Correo: importmanguerasiv@gmail.com 
            </footer>
    </body>
</html>