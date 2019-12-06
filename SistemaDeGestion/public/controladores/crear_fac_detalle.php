<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Factura Detalle</title>
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
 $cantidad = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $subtotal = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $codigo_producto = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 
 $sql = "INSERT INTO factura_cabecera VALUES (0, '$cantidad', '$subtotal', '$codigo_producto','N', null, null)"; 
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