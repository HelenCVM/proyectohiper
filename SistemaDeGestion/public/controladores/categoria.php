<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear categoria de productos</title>
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
 
 $descripcion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
 $pro_id= isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $subtotal = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $codigo_producto = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 
 $sql = "INSERT INTO factura_cabecera VALUES (0,'$descripcion','$codigo_producto')"; 
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha creado las categorias correctamente!!!</p>";
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