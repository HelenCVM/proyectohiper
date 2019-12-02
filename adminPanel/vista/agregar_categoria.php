<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../index.php");
} elseif ($_SESSION['rol'] == 'user') {
    //header("Location: ../usuario/index.php");
}
?>
<?php
if(!empty($_POST)){
$alert='';
include '../config/conexionDB.php';
$categoria_nombre=mb_strtoupper($_POST["categoria"]);
$sql="INSERT INTO Categoria VALUES (0,'$categoria_nombre','N')";
if ($conn->query($sql) == true) {
    $alert='<p class="msg_save"> Categoria Agregada!</p>';
//header("Location:../lista_usuarios.php"); 
}

}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php";?>
    <title>Registro Producto</title>
</head>

<body>
    <?php include "../controladores/header.php";?>

    <section id="container">
        <div class="form_register">
            <h1><i class="fas fa-boxes"></i> Agregar Categoria</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert :'';?></div>
            <form action="" method="POST" >
                <hr>
                <label for="categoria">Nombre Categoria</label>
                <br>
                <input type="text" name="categoria" id="categoria" value="" placeholder="Categoria">
                <button type="submit" class=btn_save><i class="fas fa-plus-square"></i> Agregar</button>
            </form>
        </div>
        <br>

    </section>
</body>

</html>