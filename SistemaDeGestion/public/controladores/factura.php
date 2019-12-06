<?php
    include  '../../config/conexionBD.php';  
    $usuario=$_GET['codUsu'];
    echo"$usuario";
    $subtotal=$_GET['subt'];
    echo"$subtotal";
    $iva=$_GET['iva'];
    echo"$iva";
    $total=$_GET['total'];
    echo"$total";
    $date = date(date("Y-m-d H:i:s"));
    echo"$date";
    $sql = "INSERT INTO Factura VALUES (  
        0, 50,'$date', $subtotal,$iva,$total);";
        echo "$sql";
    if ($conn->query($sql)) {
        $sqlFD="SELECT fac_codigo
        FROM Factura WHERE usu_codigo=$usuario
        ORDER by 1 DESC
        LIMIT 1";
        $resultFac= $conn->query($sqlFD);
        $rowF = $resultFac->fetch_assoc();
        $codigoFac=$rowF['fac_codigo'];
        echo "$codigoFac";
        $sqlt = "SELECT * FROM carrito WHERE
        USUARIO_usu_id=50;";
    $resultt = $conn->query($sqlt);
    if ($resultt->num_rows > 0) {
    while ($row5 = $resultt->fetch_assoc()) {
        $sqlProducto="SELECT * FROM Producto WHERE pro_codigo=".$row5['PRODUCTO_PRO_ID'].";";
        $resultProducto = $conn->query($sqlProducto);
        $rowProducto = $resultProducto->fetch_assoc();
        $c=$row5['PRODUCTO_PRO_ID'];
        $cantidad=$row5['car_cantidad'];
        $precio=$rowProducto['pro_precio'];
        $subtotal=$precio*$cantidad;
        $facD= "INSERT INTO FacturaDetalle VALUES (0, $c,$cantidad,$precio,$subtotal,$codigoFac);";  
        $Insertar = $conn->query($facD);
    }
}   
        ?>
   
    <div class="cartAdd" id="cartAdd">
    <p>Factura Generada </p>
    <i class=" fas fa-times" onclick="cluseWindowCart()"></i>
    </div>
    <?php
    }else{
        ?>
        <div class="cartAdd" id="cartAdd" style="background-color: #FF6565;">
        <p>No se genera factura </p>
        <i class=" fas fa-times" style="color: #FFF;" onclick="cluseWindowCart()"></i>
    </div>  
    <?php 
    }

?>