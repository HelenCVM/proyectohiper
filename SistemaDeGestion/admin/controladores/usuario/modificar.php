<!DOCTYPE html> 
<html> 
    <head>     
        <meta charset="UTF-8">     
        <title>Modificar datos de persona </title> 
    </head> 
    <body>
<?php         
        //incluir conexión a la base de datos     
        include '../../../config/conexionBD.php';  
 
    $codigo = $_POST["codigo"];     
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;     
    $nombres = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;     
    $apellidos = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null; 
    $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;         
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;         
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;     
    
 
    
    $sql = "UPDATE Usuario " .
    "SET usu_cedula = '$cedula', " .
    "usu_nombres = '$nombres', " .            
    "usu_apellidos = '$apellidos', " .                                  
    "usu_fecha_nacimiento = '$fechaNacimiento', " .            
    "usu_telefono = '$telefono', " .            
    "usu_correo = '$correo' " .         
    "WHERE usu_codigo = $codigo";
 
    if ($conn->query($sql) === TRUE) {         
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";
        header("Location:../../../public/vista/login.php");       
    } else {                 
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";             
    }      
    $conn->close();      
    ?> 
    </body> 
    </html> 