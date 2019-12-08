<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insertar calificaciones</title>
<style type="text/css" rel="stylesheet">
.error{
color: red;
}
</style>
</head>
<body>
<?php
//incluir conexión a la base de datos
include '../../config/configDB.php';
$radio = isset($_POST["radio"]) ? trim($_POST["radio"]) : null;
$codigo = $_GET["codigo"];
$codigoo = $_GET["codigo"];
$mensaje = isset($_POST["mensaje"]) ? trims($_POST["mensaje"]) : null;
$sql = "INSERT INTO Calificaciones VALUES (0, '$codigo','$radio','$mensaje','$codigoo','N')";
if ($conn->query($sql) === TRUE) {
header("Location:product.php");
echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
} else {
if($conn->errno == 1062){
echo "<p class='error'> </p>";
}else{echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
}
}
//cerrar la base de datos
$conn->close();
echo "<a href='../public/login.php'>Regresar</a>";
?>
</body>
</html>