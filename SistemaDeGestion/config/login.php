<?php
//incluir conexión a la base de datos
include 'conexionBD.php';
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$sql = "SELECT * FROM Usuario WHERE usu_correo = '$usuario' and usu_password ='$contrasena'";
echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$_SESSION['isLogged'] = TRUE;
while($row = $result->fetch_assoc()) {
    echo"cb";
if($row['usu_rol']=='admin'){
echo "hola";
}else{
header("Location:../public/vista/indexusuario.php?variable1=".$row['usu_nombres']);
echo "hola";
}
}
}
else{
    header("Location:../public/vista/login.php");
}
$conn->close();
//constraseña encriptada con md5
?>