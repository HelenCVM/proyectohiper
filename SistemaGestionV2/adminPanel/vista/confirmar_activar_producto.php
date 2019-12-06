<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["pro_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Producto " .
                "SET pro_eliminado ='N' " .
                "WHERE pro_codigo = $cod";
                echo"$sql";
	$resu = $conn->query($sql);
    header("Location:lista_productos_eliminados.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["pro_codigo"]) ){
	include '../config/conexionDB.php';
	$pro_codigo=$_GET["pro_codigo"];
    $sql = "SELECT * FROM Producto WHERE pro_codigo=$pro_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['pro_nombre'];
		}
	
	}else{
		header("Location: lista_productos_eliminados.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Activar Producto</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-restore-alt fa-7x" style="color:#64b13c"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere activar el sigueinte reguistro?</h2>
			<p>Producto: <span><?php echo $nombre; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="pro_codigo" value="<?php echo $pro_codigo; ?>">
				<a href="lista_productos_eliminados.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>