<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="keywords" content="manguera, importación, import"/>
        <link type="text/css" rel="stylesheet" href="../../css/estiloresu.css">
        <title>Servicio</title>
        <a class="cerrarindex" href="../../config/cerrar_sesion.php">Cerrar sesion</a>
        <link type="text/css" rel="stylesheet" href="../../css/estilos.css">
        <link type="text/css" rel="stylesheet" href="style.css">
   

    </head>
    <body>
    <?php  
include '../../config/conexionBD.php';       
$codigo = $_GET["variable1"];
?> 
            <header class="cabecera">
                    
                    <ul class="menunavegador">
                            <a href="indexusuario.php"><img src="../../../imagenes/banner-imi.png" alt="Import Mangueras"/></a>
                            <hr color="slategrey" >
                        <li><a href="indexusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon1.png"> INICIO</a></li> 
                        <li><a href="nosotrosusuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon2.png"> NOSOTROS</a></li>
                        <li><a href="serviciousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon3.png"> PRODUCTOS</a></li>
                        <li><a href="contactousuario.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CONTACTOS</a></li>                                       
                        <li><a href="cuenta.php?variable1=<?php echo $codigo?>"><img id ="iconmenu" src="img/icon4.png"> CUENTA </a></li> 
                    </ul>
                </header>
                
        </header>
        

        <section class="productos">
        <p class="bienvenida"> 
        <?php echo "BIENVENIDA " ?>
        <?php echo $codigo ?>
       </p>
                <h1 class="h1servicioss">PRODUCTOS</h1> 
                <div class="social">
                        <ul >
                        <li><a href="https://www.facebook.com/importIdrovo/" class="icon-facebook2"></a></li> 
                                    
                            </ul>
                </div>
               
            <table class="produ">
                <tr>
                    <th> <a href="../../public/vista/catalogo1.php"> <img src="../../../imagenes/catalogo1.jpg"  alt=""></a></th>
                    <th class="parrafo"><h1>MANGUERAS HIDRAULICAS</h1>
                        <p>
                                Mangueras para alta presión de 2000 
                                psi a 10000 psi  con alma en acero.
                        </p>
                    </th>
                </tr>
                <br>
                <tr>
                    <th> <a href="../../public/vista/catalogo2.php"> <img src="../../../imagenes/catalogo2.png" alt=""></a></th>
                    <th><h1>MANGERAS INDUSTRIALES</h1>
                            <p>
                                    Estamos comprometidos en aumentar la vida útil de sus activos productivos, 
                                    reducir sus consumos de energía en los procesos y mejorar la disponibilidad
                                    de su maquinaria. Para esto contamos con productos de las
                                     mejores marcas del mercado, personal certificado y servicios de confiabilidad.
                            </p>
                    </th>
                </tr>
                <br>
                <tr> 
                    <th><a href="../../public/vista/catalogo3.php"> <img src="../../../imagenes/catalogo3.jpg"    alt=""></a></th> 
                    <th><h1>MANGUERAS PARA ALTA TEMPERATURA</h1>
                    <p> La manguera de alta temperatura de Ecoosi está hecha de manguera de 
                        tela de fibra de vidrio recubierta de silicona de doble capa que se 
                        fricciona mecánicamente en un proceso continuo. El uso de herramientas
                         duraderas y resistentes al calor es esencial cuando se manejan aplicaciones
                          que requieren ventilación y aire caliente. El uso de una manguera de alta 
                        temperatura adecuada es rentable, mejora la productividad y maximiza la seguridad.</p>
                    </th>
                </tr>

            </table>



        </section>
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