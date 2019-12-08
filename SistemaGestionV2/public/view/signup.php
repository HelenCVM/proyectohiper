<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    
        header("Location:index.php");
    
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
    <link rel="stylesheet" href="../css/globalStyle.css">
    <link rel="stylesheet" href="../css/generalStyle.css">
    <script src="../js/validaciones.js"></script>
    <title>Registro</title>
</head>

<body>
    <header>
        <?php
        include("../../global/php/headerPublic.php");
        ?>
    </header>

    <div class="content">
        <div class="form">
            <form action="../controller/signup.php"
                onsubmit="return validarCamposObligatorios()" method="POST">
                <h2>IMPORTMANGUERASIV</h2>
                <p>Bienvenido! Por favor, ingrese sus datos.</p>
                <input type="text" name="cedula" id="cedula" placeholder="Cedula" required>
                <div class="nombres">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre"
                        onkeyup="validarLetras(event,this)" required>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido"
                        onkeyup="validarLetras(event,this)" required>
                </div>
                <input type="date" name="fechaNac" id="fechaNac" placeholder="Fecha de Nacimiento" required>
                <input type="text" name="telefono" id="telefono" placeholder="Telefono o Celular" required>
                <input type="email" name="email" id="email" placeholder="Correo" required>
                <input type="password" name="pass" id="pass" placeholder="Contraseña" required>
                <input type="password" name="epass" id="epass" placeholder="Confirmar contraseña"
                    onkeyup="validarPass('errorCPass')" required>
                <span class="error" id="errorCPass">Las contraseñas no coinciden</span>
                <div class="btns">
                    <input type="submit" value="Crear">
                </div>
                <a href="login.php">Ya tienes? Inicia sesión</a>
            </form>
        </div>
    </div>

    <footer>
        <?php
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>