<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'user') {
    header("Location: ../usuario/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Sisteme Ventas</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<h1>Bienvenido al sistema</h1>
	</section>
</body>
</html>