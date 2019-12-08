<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["comentario_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Calificaciones " .
                "SET cali_estado ='S' " .
                "WHERE cali_codigo = $cod";
	$resu = $conn->query($sql);
    header("Location:lista_calificaciones.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["comentario_codigo"]) ){
	include '../config/conexionDB.php';
	$cali_codigo=$_GET["comentario_codigo"];
    $sql = "SELECT cali_codigo, pro_nombre,cali_valor,cali_comentario FROM Calificaciones c,Producto p 
    WHERE c.pro_codigo=p.pro_codigo and  cali_codigo=$cali_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['cali_comentario'];
		}
	
	}else{
		header("Location: lista_calificaciones.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Eliminar Usuario</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-alt fa-7x" style="color:#e66262"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere eliminar el siguiente Comentario?</h2>
			<p>Calificaciones: <span><?php echo $nombre; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="cate_codigo" value="<?php echo $cali_codigo; ?>">
				<a href="lista_calificaciones.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>