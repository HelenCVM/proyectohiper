<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/view/index.php");
    }
} else {
    header("Location: ../../../index.php");
}
include '../../../config/configDB.php';

$codigo = isset($_POST["codigo"]) ? trim($_POST["codigo"]) : null;
$nombre = isset($_POST["nombre"]) ? mb_strtolower(trim($_POST["nombre"]), 'UTF-8') : null;
$apellido = isset($_POST["apellido"]) ? mb_strtolower(trim($_POST["apellido"]), 'UTF-8') : null;
$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
$fecha = $_POST["fechaNacimiento"];
$email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
$dirCP = isset($_POST["direcCalle1"]) ? mb_strtolower(trim($_POST["direcCalle1"]), 'UTF-8') : null;
$dirCS = isset($_POST["direcCalle2"]) ? mb_strtolower(trim($_POST["direcCalle2"]), 'UTF-8') : null;
$ciudad = isset($_POST["ciudad"]) ? mb_strtolower(trim($_POST["ciudad"]), 'UTF-8') : null;
$provincia = isset($_POST["provincia"]) ? mb_strtolower(trim($_POST["provincia"]), 'UTF-8') : null;

$date = date(date("Y-m-d H:i:s"));

$sql = "UPDATE Usuario SET
            usu_cedula='$cedula ',
            usu_nombres='$nombre',
            usu_apellidos='$apellido',
            usu_telefono='$telefono',
            usu_fecha_nacimiento='$fecha',
            usu_correo='$email',
            usu_fecha_modificacion='$date'
            WHERE usu_codigo='$codigo';";

$sqlDireccion = "SELECT *  FROM Usuario u , Direccion d WHERE
                    u.usu_codigo=d.usu_codigo AND
                    u.usu_codigo='$codigo';";
$result = $conn->query($sqlDireccion);

if ($result->num_rows > 0) {
    $sqlDir = "UPDATE Direccion SET
    dir_calle_principal='$dirCP',
    dir_calle_secundaria='$dirCS',
    ciu_nombre='$ciudad',
    pro_nombre='$provincia'
    WHERE usu_codigo='$codigo';";

    //echo 'si hay datos';
} else {
    $sqlDir = "INSERT INTO Direccion  VALUES (0,$codigo,'$ciudad','$provincia','$dirCP','$dirCS');";
    //echo 'No hay datos';
}

if ($conn->query($sql) && $conn->query($sqlDir)) {
    header("Location: ../view/index.php");
    //echo mysqli_error($conn);
} else {
    echo mysqli_error($conn);
    if ($conn->errno == 1062) {
        echo mysqli_error($conn);
        //header("Location: ../view/index.php?update=false&error=1062");
    } else {
        //header("Location: ../view/index.php?update=false&error=" . mysqli_error($conn));
    }
}
$conn->close();