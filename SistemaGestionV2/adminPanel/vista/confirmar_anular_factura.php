<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["fac_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Factura " .
                "SET fac_eliminado ='S' " .
                "WHERE fac_codigo = $cod";
    $resu = $conn->query($sql);
    echo "$sql";
    header("Location:lista_facturas.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["fac_codigo"]) ){
	include '../config/conexionDB.php';
	$fac_codigo=$_GET["fac_codigo"];
    $sql = "SELECT * FROM Factura WHERE fac_codigo=$fac_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $numero=$row['fac_codigo'];
		}
	
	}else{
		header("Location: lista_productos.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Confirma Eliminar Producto</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-alt fa-7x" style="color:#e66262"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere Anular la Siguigueinte Factura?</h2>
			<p>Factura #: <span><?php echo $numero; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="fac_codigo" value="<?php echo $fac_codigo; ?>">
				<a href="lista_facturas.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>