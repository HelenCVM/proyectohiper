<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    header("Location: ../vista/index.php");
}else{
    include '../config/conexionDB.php';
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql = "SELECT * FROM Usuario WHERE usu_correo ='$correo' AND usu_password = MD5('$contrasena');";
    
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $_SESSION['isLogin'] = true;
        $_SESSION['codigo'] = $user["usu_codigo"];
        $_SESSION['nombre'] = $user["usu_nombres"];
        $_SESSION['apellido'] = $user["usu_apellidos"];
        $_SESSION['rol'] = $user["usu_rol"];
        if ($_SESSION['rol'] == 'admin') {
            header("Location:../vista/index.php");
           // echo "Entra";
        } else {
           // header("Refresh:2; url=../../admin/vista/usuario/index.php");
        }
        } else {
            //header("Refresh:2; url=../vista/login.php");
        }
    $conn->close();
}
?>