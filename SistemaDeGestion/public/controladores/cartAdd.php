<?php
if (isset($_GET['codProd'])) {
    include  '../../config/conexionBD.php';  
    $sql = "INSERT INTO carrito (
        car_cantidad, 
        USUARIO_usu_id,  
        PRODUCTO_PRO_ID) VALUES (  
        1, 50, 
        " . $_GET['codProd'] . ");";
    if ($conn->query($sql)) {
        ?>
   
    <div class="cartAdd" id="cartAdd">
    <p>Producto agregado al carrito. </p>
    <i class=" fas fa-times" onclick="cluseWindowCart()"></i>
    </div>
    <?php
    }else{
        ?>
        <div class="cartAdd" id="cartAdd" style="background-color: #FF6565;">
        <p>No se agregado al carrito. </p>
        <i class=" fas fa-times" style="color: #FFF;" onclick="cluseWindowCart()"></i>
    </div>  
    <?php 
    }



}

?>
