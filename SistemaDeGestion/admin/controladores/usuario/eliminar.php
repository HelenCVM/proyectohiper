<!DOCTYPE html> 
<html> 
    <head>     
        <meta charset="UTF-8">     
        <title>Eliminar datos de persona </title> 
        </head> 
        <body> 
            <?php     //incluir conexión a la base de datos     
            include '../../../config/conexionBD.php';  
 
    $codigo = $_POST["codigo"];              
    
    date_default_timezone_set("America/Guayaquil");     
    $fecha = date('Y-m-d H:i:s', time());    
    $sql = "DELETE FROM Usuario WHERE usu_codigo = '$codigo'";  
    if ($conn->query($sql) === TRUE) {                 
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
        header("Location:../../../public/vista/login.php");  

    } else {                 
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";             
    }     echo "<a href='../../vista/usuario/index.php'>Regresar</a>"; 
 
    $conn->close();     
     ?> 
</body> 
</html> 
 