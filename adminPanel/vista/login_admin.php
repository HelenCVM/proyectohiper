<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script type="text/javascript" src="../js/funcionesAdmin.js"></script>
</head>
<body>
    <section id="container">
    <form method="POST" action="../controladores/validar_login.php">
    <h3>AMDIN PANEL</h3>
<img src="../img/usu_login.png" alt="adminLogin">
<span class="error" id="errorEmail"></span>
    <input type="text" name="correo" id= "correo "placeholder="Correo Corporativo" onkeyup="validarCorreo('errorEmail',this)">
    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña">
    <input type="submit" value="INGRESAR">
    </form>
    </section>
</body>
</html>