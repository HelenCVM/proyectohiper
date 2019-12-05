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
    
    }

}

?>
