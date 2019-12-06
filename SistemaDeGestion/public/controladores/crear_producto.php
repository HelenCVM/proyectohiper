<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Registrar datos del producto</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
</head>
<body>
 <?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $nombre = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $marca = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
 $stock = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $descripcion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
 $precio = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;

 $sql = "INSERT INTO factura detalle VALUES (0, '$nombre', '$marca', '$stock','$descripcion',$precio)"; 

 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>La factura ya fue registrada </p>";
 }else{
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 }
 }
 //cerrar la base de datos
 $conn->close();
 echo "<a href='../../public/vista/login.html '>Regresar</a>";
 ?>
</body>
</html>