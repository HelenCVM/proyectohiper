
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
 include '../../config/conexionBD.php';
 $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
 $apellido = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
 $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
 $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null; 
 $ciudad = isset($_POST["ciudad"]) ? mb_strtoupper(trim($_POST["ciudad"]), 'UTF-8') : null;
 $provincia = isset($_POST["provincia"]) ? mb_strtoupper(trim($_POST["provincia"]), 'UTF-8') : null; 
 $correo = isset($_POST["correo"]) ? mb_strtoupper(trim($_POST["correo"]), 'UTF-8') : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;


 
 $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombre', '$apellido',
'$direccion', '$telefono','$ciudad','$provincia','$correo', '$contrasena','usuario','N',null,null)";
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