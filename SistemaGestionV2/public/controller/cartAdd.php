<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    }
}
if (isset($_GET['codProd'])&&isset($_SESSION['isLogin'])) {

    include '../../config/configDB.php';
    /*$sql = "SELECT * FROM carrito WHERE 
    PRODUCTO_pro_id=" . $_GET['codProd'] . " AND
    USUARIO_usu_id=" . $_SESSION['codigo'] . " AND
    SUCURSAL_suc_id=" . $_GET['storeID'] . ";";*/
    $sql = "SELECT * FROM carrito WHERE 
    PRODUCTO_pro_id=" . $_GET['codProd'] . " AND
    USUARIO_usu_id=" . $_SESSION['codigo'] . " ;";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cantidad = $row['car_cantidad'] + 1;
        $sql = "UPDATE carrito SET
        car_cantidad ='$cantidad'
        WHERE car_id=" . $row['car_id'] . ";";
        if ($conn->query($sql)) {
            ?>
<div class="cartAdd" id="cartAdd">
    <p>Producto agregado al carrito.</p>
    <i class=" fas fa-times" onclick="cluseWindowCart()"></i>
</div>
<?php
    } else {
        ?>
<div class="cartAdd" id="cartAdd" style="background-color: #FF6565;">
    <p>No se agregado al carrito.</p>
    <i class=" fas fa-times" style="color: #FFF;" onclick="cluseWindowCart()"></i>
</div>
<?php
    }
} else {
    $sql = "INSERT INTO carrito VALUES (0," . $_GET['codProd'] . "," . $_SESSION['codigo'] . ",1 );";

    if ($conn->query($sql)) {
        ?>
<div class="cartAdd" id="cartAdd">
    <p>Producto agregado al carrito. </p>
    <i class=" fas fa-times" onclick="cluseWindowCart()"></i>
</div>
<?php
    } else {
        ?>
<div class="cartAdd" id="cartAdd" style="background-color: #FF6565;">
    <p>No se agregado al carrito. </p>
    <i class=" fas fa-times" style="color: #FFF;" onclick="cluseWindowCart()"></i>
</div>
<?php
    }
}
}