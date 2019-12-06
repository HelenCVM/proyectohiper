<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    }
}
//Pendiente query para la tienda 
if (isset($_GET['carId'])) {
    include '../../config/configDB.php';
    $sql = "SELECT * FROM carrito WHERE 
    car_id=" . $_GET['carId'] . ";";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['car_cantidad'] > 1) {
        $cantidad = $row['car_cantidad'] - 1;
        $sql = "UPDATE carrito SET
                    car_cantidad ='$cantidad'
                    WHERE car_id=" . $_GET['carId'] . ";";
        $conn->query($sql);
        writeContent();
    } elseif ($row['car_cantidad'] <= 1) {
        $sqlDropCart = "DELETE FROM carrito WHERE car_id=" . $_GET['carId'] . ";";
        $conn->query($sqlDropCart);
        writeContent();
    }
} else {
    header("Location: ../view/shopingcart.php");
}

function writeContent()
{
    //Pendiente query para la tienda 
    include '../../config/configDB.php';
    $sql = "SELECT * FROM carrito WHERE
            USUARIO_usu_id=" . $_SESSION['codigo'] . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sqlP = "SELECT * FROM carrito c, Producto p WHERE
            c.USUARIO_usu_id=" . $_SESSION['codigo'] . " AND
            p.pro_codigo=" . $row['PRODUCTO_pro_id'] . "
            GROUP BY 1;";

            $resultP = $conn->query($sqlP);
            $rowP = $resultP->fetch_assoc();
            ?>

<article>
    <div class="cartImg">
        <img src="../../adminPanel/img/uploads/<?php echo $rowP['pro_img']; ?>"
            alt="<?php echo $rowP['pro_nombre'] ?>">
    </div>
    <div class="cartDescription">
        <h2><?php echo $rowP['pro_nombre'] ?></h2>
        <h3>Descripcion</h3>
        <p><?php echo $rowP['pro_descripcion'] ?></p>
        <div class="inf">
            
            <div>
                <h3>Cantidad:</h3>
                <span><?php echo $row['car_cantidad'] ?></span>
            </div>
        </div>
    </div>
    <span>$<?php echo $rowP['pro_precio'] ?></span>
    <!--Parametro para eliminar -->
    <i class="fas fa-times" onclick="cartDelete(<?php echo $row['car_id'] ?>)"></i>
</article>

<?php

    }
    //echo '<h2>Si hay productos.</h2>';
} else {
    echo '<h2 style="color: #FF6565">No hay productos.</h2>';
}
}