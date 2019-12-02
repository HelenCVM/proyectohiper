<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../public/vista/login.php");
} elseif ($_SESSION['usu_rol'] == 'user') {
   header("Location:../public/vista/index copy.php");
}
?>

<?php
//incluir conexión a la base de datos
include 'conexionBD.php';
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$sql = "SELECT * FROM Usuario WHERE usu_correo = '$usuario' and usu_password ='$contrasena'";
echo $sql;
$result = $conn->query($sql);
$user=$result->fetch_assoc();
if ($result->num_rows > 0) {
$_SESSION['isLogged'] = TRUE;
$_SESSION['nombre'] =$user['usu_nombres'];
$_SESSION['apellidos']=$user['usu_apellidos'];
$_SESSION['rol'] = $user["usu_rol"];
while($row = $result->fetch_assoc()) {
if($row['usu_rol']=='admin'){
header("Location:../admin/controladores/admin/GestionUsuario.php");
}else{
header("Location:../public/vista/index copy.php?correo=".$row['usu_nombres']);
}
}
}
else{
    header("Location: ../public/vista/login.html");
}
$conn->close();
//constraseña encriptada con md5
?>