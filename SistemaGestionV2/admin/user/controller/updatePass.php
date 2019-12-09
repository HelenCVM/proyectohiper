<?php
session_start();
if (isset($_SESSION['isLogin'])) {
  
} else {
    header("Location: ../../../index.php");
}
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
    <link rel="stylesheet" href="../../../public/css/globalStyle.css">
    <link rel="stylesheet" href="../../../public/css/generalStyle.css">
    <title>Successful4</title>
</head>

<body>
    <header>
    <div class="content">
    <a href="../../index.php"></a>
    <nav class="menu">
        <ul>
            <li><a href="../../../index.php"><img id ="iconmenu" src="../../../img/icon1.png">INICIO</a></li>
            <li><a href="../../../public/view/nosotros.php"><img id ="iconmenu" src="../../../img/icon2.png"> NOSOTROS</a></li>
            <li> <span><img id ="iconmenu" src="../../../img/icon3.png"> PRODUCTOS</span>
                <ul>
                    <li><a href="../../../public/view/categoria.php?categoria=10">Industriales</a></li>
                    <li><a href="../../../public/view/categoria.php?categoria=11">Hidraulicas</a></li>
                    <li><a href="../../../public/view/categoria.php?categoria=12">Alta Temperatura</a></li>
                </ul>
            </li>
            <li><a href="../../../public/view/contacto.php"><img id ="iconmenu" src="../../../img/icon4.png"> CONTACTOS </a></li>       
        </ul>
    </nav>
    <div class="search">
        <div class="barSearch">
            
        </div>
      
    </div>
    <div class="sessionItems">
        <?php
        if (isset($_SESSION['isLogin'])) {
            ?>
        <script>
        carNot('../../../public/controller/updateNotCart.php')
        </script>
        <div class="imgUser">
            <a href="../../../public/view/shoppingcart.php"><i class="fas fa-shopping-cart"
                    id="fa-shopping-cart"></i></a>
        </div>
        <nav class="menu perfil">
            <ul>
                <li><span><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></span> <i
                        class="fas fa-sort-down"></i>
                    <ul>
                        <li><a href="index.php">MI CUENTA</a>
                        </li>
                        <li><a href="shoppinghistory.php">PEDIDOS</a>
                        </li>
                        <li><a href="settings.php">CONFIGURACIONESSS</a></li>
                        <li><a href="../../../config/signout.php">SALIR</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <?php
    } else {

    }
    ?>
    </div>
    </header>

    <div class="headerImg pageError pageSuccess">
        <?php
        include '../../../config/configDB.php';
        $oldpass = isset($_POST["oldpass"]) ? trim($_POST["oldpass"]) : null;
        $newpass = isset($_POST["newpass"]) ? trim($_POST["newpass"]) : null;
        $repeatpass = isset($_POST["repeatpass"]) ? trim($_POST["repeatpass"]) : null;
        $date = date(date("Y-m-d H:i:s"));

        $sql = "SELECT usu_password FROM Usuario WHERE usu_codigo=" . $_SESSION['codigo'] . ";";
        $result = $conn->query($sql);
        $resultP = $result->fetch_assoc();


        if (MD5($oldpass) == $resultP["usu_password"]) {
            if ($newpass == $repeatpass) {
                $sql = "UPDATE Usuario SET 
                usu_password = MD5('$newpass'), 
                usu_fecha_modificacion='$date'   
                WHERE usu_codigo=" . $_SESSION['codigo'] . ";";

                if ($conn->query($sql)) {
                    ?>
        <div class="contentSucce">
            <h2>Contraseña actualizada con exito.</h2>
            <i class="far fa-check-circle"></i>
            <?php header("Refresh:2; url=../view/settings.php");?>
          
        </div>
        <?php
            } else {
                ?>
        <div class="contentSucce">
            <h2>Error al actializar los datos.</h2>
            <p><?php echo mysqli_error($conn) ?></p>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <?php header("Refresh:2; url=../view/settings.php");?>
        </div>
        <?php
            }
        } else {
            ?>
        <div class="contentSucce">
            <h2>Las contraseñas no coinciden.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <?php header("Refresh:2; url=../view/settings.php");?>
        </div>
        <?php
        }
    } else {
        ?>
        <div class="contentSucce">
            <h2>La contraseña no existe en el sistema.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <?php header("Refresh:2; url=../view/settings.php");?>
        </div>
        <?php
    }
    $conn->close();

    ?>
    </div>
    <footer>
        <?php
        include("../../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>
</body>

</html>