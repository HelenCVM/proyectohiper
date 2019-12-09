<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../vista/index.php");
} 
include '../config/conexionDB.php';
?>

<?php
if(!empty($_POST)){
    $categoria_codigo=$_POST['categoria'];
    $pro_nombre=$_POST['nombreP'];
    $pro_marca=$_POST['marca'];
    $pro_caracteristicas=$_POST['Caracteristicas'];
    $pro_descripcion=$_POST['Descripcion'];
    $pro_aplicaciones=$_POST['Aplicaciones'];
    $pro_diametro=$_POST['diamtreo'];
    $pro_peso=$_POST['peso'];
    $pro_presion=$_POST['presion'];
    $pro_longitud=$_POST['Longitud'];
    $pro_precio=$_POST['Precio'];
    $pro_stock=$_POST['Stock'];
    
    $foto=$_FILES['foto'];
    $nombre_foto=$foto['name'];
    $foto_type=$foto['type'];
    $url_temp=$foto['tmp_name'];
    
    $img_producto= "img_producto.png";
    if($nombre_foto!=''){
    $destino='../img/uploads/';
    $img_nombre='img_'.md5(date('d-m-y H:m:s'));
    $img_producto=$img_nombre.'.jpg';
    $src=$destino.$img_producto;
    }
    
    include '../config/conexionDB.php';

    $sql = "UPDATE Producto " .
    "SET pro_nombre = '$pro_nombre', " .
    "pro_categoria = '$categoria_codigo', " .
    "pro_img = '$telefono', " .
    "WHERE pro_codigo = $codigo";
    if ($conn->query($sql) == true) {
        //header("Location:../lista_usuarios.php"); 
        $alert='<p class="msg_save"> Producto Actualizado!</p>';
        } 
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php";?>
    <title>Editar Producto</title>
</head>

<body>

    <?php include "../controladores/header.php";?>
    <?php
    include '../config/conexionDB.php';
    $proCodigo=$_GET['producto'];
    $sql = "SELECT * FROM Producto WHERE pro_codigo=$proCodigo";
    echo "$proCodigo";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre_pro=$row['pro_nombre'];
            $marca=$row['pro_marca'];
            //$Caracteristica=$row['pro_marca'];
            $Descripcion=$row['pro_descripcion'];
            //$Aplicaciones=$row['pro_dia_in'];
            $Diametro=$row['pro_dia_in'];
            $Peso=$row['pro_peso_gm'];
            $Presion=$row['pro_presi_bar'];
            $Longitud=$row['pro_long_m'];
            $Precio=$row['pro_precio'];
            $Stock=$row['pro_stock'];
            $FotoR=$row['pro_img'];
            $categoria=$row['cate_codigo'];
        }
    }
?>

    <section id="container">
        <div class="form_register">
            <h1><i class="fas fa-box-open"></i> Editar Producto</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert :'';?></div>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="categoria">Categoria</label>
                <?php

$sql = "SELECT * FROM Categoria WHERE cate_eliminado='N' ORDER BY cate_nombre ASC";
$result = $conn->query($sql);
$conn->close();
?>
                <select name="categoria" id="categoria">
                    <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

                    ?>
                    <option value="<?php echo $row['cate_codigo'];?>"><?php echo$row['cate_nombre'] ;?></option>
                    <?php
                        }
                    } 
                    ?>
                </select>
                <label for="nombreP">Nombre</label>
                <input type="text" name="nombreP" id="nombreP" value="<?php echo ($nombre_pro); ?>" placeholder="Nombre del Producto">
                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" value="<?php echo ($marca); ?>" placeholder="marca">
                <label for="Descripcion">Descripcion</label>
                <input type="text" name="Descripcion" id="Descripcion" value="<?php echo ($Descripcion); ?>"
                    placeholder="Descripcion">
                <label for="diamtreo">Diametro</label>
                <input type="text" name="diamtreo" id="diamtreo" value="<?php echo ($Diametro); ?>" placeholder="Diamtreo">
                <label for="peso">Peso</label>
                <input type="text" name="peso" id="peso" value="<?php echo ($Peso); ?>" placeholder="Peso">
                <label for="presion">Presion</label>
                <input type="text" name="presion" id="presion" value="<?php echo ($Presion); ?>" placeholder="Presion">
                <label for="Longitud">Longitud</label>
                <input type="text" name="Longitud" id="Longitud" value="<?php echo ($Longitud); ?>" placeholder="Longitud">
                <label for="Precio">Precio</label>
                <input type="number" name="Precio" id="Precio" value="<?php echo ($Precio); ?>" placeholder="Precio">
                <label for="Stock">Stock</label>
                <input type="number" name="Stock" id="Stock" value="<?php echo ($Stock); ?>" placeholder="Stock">

                <div class="photo">
                    <label for="foto">Foto</label>
                    <div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="foto"></label>
                    </div>
                    <div class="upimg">
                        <input type="file" name="foto" id="foto">
                    </div>
                    <div id="form_alert"></div>
                </div>
                <button type="submit" class=btn_save><i class="fas fa-plus-square"></i> Agregar</button>
            </form>
        </div>
        <br>

    </section>
</body>

</html>