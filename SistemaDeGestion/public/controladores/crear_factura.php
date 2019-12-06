
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Factura</title>
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
 $fecha = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $subtotal = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
 $iva = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
 $total = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
 $fac_det_id = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
 $usu_codigos = isset($_POST["ciudad"]) ? mb_strtoupper(trim($_POST["ciudad"]), 'UTF-8') : null; 
 
 $sql = "INSERT INTO factura_cabecera VALUES (0, '$fecha', '$subtotal', '$iva', '$total' ,'$fac_det_id',
 '$usu_codigos', 'N', null, null)"; 
 if ($conn->query($sql) === TRUE) {
 echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
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