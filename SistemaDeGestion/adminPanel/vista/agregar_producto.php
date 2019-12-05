<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../vista/index.php");
} elseif ($_SESSION['rol'] == 'user') {
   // header("Location: ../usuario/index.php");
}
include '../config/conexionDB.php';
?>

<?php
if(!empty($_POST)){
    $categoria_codigo=$_POST['categoria'];
    $pro_nombre=$_POST['nombreP'];
    $pro_marca=$_POST['marca'];
    $pro_caracteristicas=$_POST['Caracteristicas'];
    //$pro_descripcion=$_POST['Descripcion'];
    //$pro_aplicaciones=$_POST['Aplicaciones'];
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
    //$sql="INSERT INTO Producto VALUES (0,$categoria_codigo,'$pro_nombre','$img_producto','$pro_marca','$pro_caracteristicas','$pro_descripcion','$pro_aplicaciones',$pro_diametro,$pro_peso,$pro_presion,$pro_longitud,$pro_precio,$pro_stock,'N')";
    $sql="INSERT INTO Producto VALUES (0,$categoria_codigo,'$pro_nombre','$img_producto','$pro_marca','$pro_caracteristicas',$pro_diametro,$pro_peso,$pro_presion,$pro_longitud,$pro_precio,$pro_stock,'N')";
    if ($conn->query($sql) == true) {
        if($nombre_foto!=''){
            move_uploaded_file($url_temp,$src);
            $alert='<p class="msg_save"> Producto Agregado!</p>';
            //echo "Prodcuto guardado";
        }
        $alert='<p class="msg_save"> Producto Agregado!</p>';
    //header("Location:../lista_usuarios.php"); 
    
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    
    <script type="text/javascript" src="../js/funcionesAdmin.js"></script>
    <?php include "../controladores/scripts.php";?>
    <title>Registro Producto</title>
</head>

<body>

    <?php include "../controladores/header.php";?>


    <section id="container">
        <div class="form_register">
            <h1><i class="fas fa-box-open"></i> Agregar Producto</h1>
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
                <input type="text" name="nombreP" id="nombreP" value="" placeholder="Nombre del Producto"
                onkeyup="this.value = validarLetras(this.value)"  
                
                >




                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" value="" placeholder="marca"
                onkeyup="this.value = validarLetras(this.value)"  
                >


                <label for="Caracteristicas">Caracteristicas</label>
                <input type="Caracteristicas" name="Caracteristicas" id="Caracteristicas" value=""
                    placeholder="Caracteristicas del Producto"
                    onkeyup="this.value = validarLetras(this.value)"  
                    
                    >
                <label for="diamtreo">Diametro</label>
                <input type="text" name="diamtreo" id="diamtreo" value="" placeholder="Diamtreo"
                onkeypress="return validarNumero(event, this)"
                >
                <label for="peso">Peso</label>
                <input type="text" name="peso" id="peso" value="" placeholder="Peso"
                onkeypress="return validarNumero(event, this)"
                >
                <label for="presion">Presion</label>
                <input type="text" name="presion" id="presion" value="" placeholder="Presion"
                onkeypress="return validarNumero(event, this)"
                >
                <label for="Longitud">Longitud</label>
                <input type="text" name="Longitud" id="Longitud" value="" placeholder="Longitud"
                onkeypress="return validarNumero(event, this)"
                >
                <label for="Precio">Precio</label>
                <input type="number" name="Precio" id="Precio" value="" placeholder="Precio"
                onkeypress="return validarNumero(event, this)"
                >
                <label for="Stock">Stock</label>
                <input type="number" name="Stock" id="Stock" value="" placeholder="Stock"
                onkeypress="return validarNumero(event, this)"
                >

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