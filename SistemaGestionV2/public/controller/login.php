<?php
session_start();
/*if (isset($_SESSION['isLogin'])) {
    header("Location: ../../index.php");
}*/
include '../../config/configDB.php';
$email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
$pass = isset($_POST["pass"]) ? trim($_POST["pass"]) : null;
$sql = "SELECT * FROM Usuario WHERE usu_correo ='$email' AND usu_password = MD5('$pass') AND usu_rol='user'";

$result = $conn->query($sql);
$result2 = $conn->query($sql);
$rowUsuario = mysqli_fetch_assoc($result2);

$id = $rowUsuario['usu_codigo'];
$eliminado = $rowUsuario['usu_eliminado'];
$rol = $rowUsuario['usu_rol'];
$nombres = $rowUsuario["usu_nombres"];
$apellidos = $rowUsuario["usu_apellidos"];
$correo = $rowUsuario["usu_correo"];

if ($eliminado == 'S') {

    echo "<p>Su cuenta se encuentra desactivada, contacte se con el administrador de la pagina</p>";
} else {
     if ($result->num_rows > 0 && $rol == "user") {
        session_start();
        $_SESSION['codigo'] = $id;
        $_SESSION['isLogin'] = true;
        $_SESSION["rol"] = "user";
        $_SESSION['nombre'] = $nombres;
        $_SESSION['apellido'] = $apellidos;
        header("Location: ../view/successful.php?login=true&delete=" . $rowUsuario['usu_eliminado'] . "");
    } else {
        header("Location: ../view/successful.php?login=false");
    }
}

$conn->close();