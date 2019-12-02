<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Crear Nuevo Usuario</title>
<style type="text/css" rel="stylesheet">
.error{
color: red;
}
</style>
</head>
<body>
<?php
//incluir conexión a la base de datos
include 'conexionBD.php';
$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
$nombres = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
$apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
$fechanaci = isset($_POST["fechanaci"]) ? trim($_POST["fechanaci"]): null;
$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
$ciudad = isset($_POST["ciudad"]) ? trim($_POST["ciudad"]): null;
$provincia = isset($_POST["provincia"]) ? trim($_POST["provincia"]): null;
$correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$rol=isset($_POST["rol"]) ? trim($_POST["rol"]): 'user'; 
$sql = "INSERT INTO Usuario VALUES (0, '$cedula','$rol', '$nombres', '$apellidos','$fechanaci', '$telefono','$correo','$contrasena','N', null, null )";
if ($conn->query($sql) === TRUE) {
header("Location:../public/vista/login.php");
echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
} else {
if($conn->errno == 1062){
echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
}else{echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
}
}
//cerrar la base de datos
$conn->close();
echo "<a href='../public/login.html'>Regresar</a>";
?>
</body>
</html>