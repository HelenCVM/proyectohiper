<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../vista/login.html");
} elseif ($_SESSION['rol'] == 'U') {
   header("Location:../public/index.html");
}
?>

<?php
//incluir conexión a la base de datos
include 'conexionBD.php';
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$sql = "SELECT * FROM usuario WHERE usu_email = '$usuario' and usu_password ='$contrasena'";
echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$_SESSION['isLogged'] = TRUE;
while($row = $result->fetch_assoc()) {
if($row['usu_rol']=='admin'){
header("Location:../admin/controladores/admin/GestionUsuario.php");
}else{
header("Location:../admin/controladores/usuario/index.php?correo=".$row['usu_email']); 
}
}
}
else{
    header("Location: ../vista/login.html");
}
$conn->close();
//constraseña encriptada con md5
?>