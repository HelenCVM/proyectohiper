<?php 

    include '../../../config/configDB.php';

    session_start();

    if (isset($_SESSION['codigo']))
        $id=$_SESSION['codigo'];

    if($_SESSION["rol"] != "admin")
        header("Location: ../controller/logout.php");

    $sqlUsuario = "SELECT * FROM usuario user, imagen img WHERE user.usu_id = $id AND img.USUARIO_usu_id = $id";

    $resultUsuario = $conn->query($sqlUsuario);
    $rowUsuario = mysqli_fetch_assoc($resultUsuario);

    $nombres = $rowUsuario['usu_nombres'];
    $apellidos = $rowUsuario['usu_apellidos'];
    $img = $rowUsuario['img_nombre'];

    $sucId = $rowUsuario['SUCURSAL_suc_id'];

    $sqlSucursal = "SELECT * FROM sucursal suc WHERE suc.suc_id = $sucId";

    $resultSucursal = $conn->query($sqlSucursal);
    $rowSucursal = mysqli_fetch_assoc($resultSucursal);

    $sucNombre = $rowSucursal['suc_nombre'];
    $sucTelefono = $rowSucursal['suc_telefono'];
    $sucCelular = $rowSucursal['suc_celular'];
    $sucUrl = $rowSucursal['suc_url'];
    $sucEliminado = $rowSucursal['suc_eliminado'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/globalStyle.css">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Perfil</title>
</head>

<body>
    <header>
        <div class="content">        
            <div class="sessionItems">
                    <div class="header">
                        <ul class="nav">
                            <li> <a><?php echo strtoupper($nombres) ?> <?php echo strtoupper($apellidos) ?></a>
                                <ul>
                                    <li><a href="modify.php">Ajustes</a></li>
                                    <li><a href="../controller/logout.php">Cerrar Sesion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <div class="imgUser">
                    <img src="../../../img/user/<?php echo $id; ?>/<?php echo ($img); ?>" alt="">
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <header>
            <div class="perfil">
                <li><a>APPLE STORE EC</a></li>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="orders.php"><i class="fas fa-chart-bar"></i> Ordenes</a></li>
                    <li><a href="inbox.php"><i class="far fa-envelope"></i> Mensajes</a></li>
                    <li><a href="products.php"><i class="fa fa-barcode"></i> Productos</a></li>
                    <li><a href="clients.php"><i class="fas fa-users"></i> Clientes</a></li>
                    <li><a href="settings.php"><i class="fas fa-cog"></i> Configuracion</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <div class="cardContent">
        <?php
            //Incluir conexion a la BD
            include "../../../config/configDB.php";
            $codigo = $_POST["codigo"];
            $contrasena1 = isset($_POST["contrasena1"]) ? trim($_POST["contrasena1"]) : null;
            $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null;

            $sqlContrasena1 = "SELECT * FROM usuario WHERE usu_id=$codigo and usu_password=MD5('$contrasena1')";
            $result = $conn->query($sqlContrasena1);

            if ($result->num_rows > 0){
                date_default_timezone_set("America/Guayaquil");
                $fecha = date('Y-m-d H:i:s',time());

                $sqlContrasena2 = "UPDATE usuario SET usu_password=MD5($contrasena2), usu_fecha_modificacion='$fecha' WHERE usu_id=$codigo";

                if ($conn->query($sqlContrasena2) === TRUE){
                    echo "Se ha actualizado la contrasena correctamente";
                }else{
                    echo "<p>Error: ".mysqli_error($conn)."</p>";
                }
            }else{
                echo "<p>La contrasena actual no coincide con nuestros registros!!!</p>";
            }
            echo "<a href='../view/clients.php?codigo=".$codigo."'>Regresar</a>";
            $conn->close();
        ?>
        </div>
        </section>
    </body>
</html>