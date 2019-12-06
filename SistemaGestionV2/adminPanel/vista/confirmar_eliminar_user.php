<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	if($_POST["usu_codigo"]==1){
	header("Location:lista_users_activos.php");
	exit;
	}
	include '../config/conexionDB.php';
	$cod = $_POST["usu_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Usuario " .
                "SET usu_eliminado = 'S', " .
                "usu_fecha_modificacion = '$date' " .
				"WHERE usu_codigo = $cod";
	$resu = $conn->query($sql);
	header("Location:lista_users_activos.php");
	$conn->close();
}


if(empty($_GET["usu_codigo"]) ||$_GET["usu_codigo"]==1 ){
header("Location: lista_users_activos.php");
}else{
	include '../config/conexionDB.php';
	$usu_codigo=$_GET["usu_codigo"];
	$sql = "SELECT * FROM Usuario WHERE usu_codigo=$usu_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['usu_nombres'];
		  $apellidos=$row['usu_apellidos']; 
		}
	
	}else{
		header("Location: lista_users_activos.php");
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
            <i class="fas fa-user-times fa-7x" style="color:#e66262"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere eliminar el sigueinte registro de Usuario?</h2>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>Apellido: <span><?php echo $apellidos; ?></span></p>
			<form action="" method="POST">
				<input type="hidden" name="usu_codigo" value="<?php echo $usu_codigo; ?>">
				<a href="lista_users_activos.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>