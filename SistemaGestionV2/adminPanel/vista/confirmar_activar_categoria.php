<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["cate_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Categoria " .
                "SET cate_eliminado ='N' " .
                "WHERE cate_codigo = $cod";
	$resu = $conn->query($sql);
    header("Location:lista_categoria_eliminadas.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["cate_codigo"]) ){
	include '../config/conexionDB.php';
	$cate_codigo=$_GET["cate_codigo"];
    $sql = "SELECT * FROM Categoria WHERE cate_codigo=$cate_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['cate_nombre'];
		}
	
	}else{
		header("Location: lista_categoria_eliminadas.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Activar Categoria</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-restore-alt fa-7x" style="color:#64b13c"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere activar el sigueinte reguistro?</h2>
			<p>Categoria: <span><?php echo $nombre; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="cate_codigo" value="<?php echo $cate_codigo; ?>">
				<a href="lista_categoria_eliminadas.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>