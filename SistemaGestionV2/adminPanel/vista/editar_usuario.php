<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>

<?php
if(!empty($_POST)){
    if($_POST["alte"]=='alte'){
        include '../config/conexionDB.php';
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombre = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $apellido = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
        $fechaNac = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
        $codigo = $_POST["usu_codigo"];
        $date = date(date("Y-m-d H:i:s"));
    
                  $sql = "UPDATE Usuario " .
                    "SET usu_cedula = '$cedula', " .
                    "usu_nombres = '$nombre', " .
                    "usu_apellidos = '$apellido', " .
                    "usu_telefono = '$telefono', " .
                    "usu_correo = '$correo', " .
                    "usu_fecha_nacimiento = '$fechaNac', " .
                    "usu_fecha_modificacion = '$date' " .
                    "WHERE usu_codigo = $codigo";
        if ($conn->query($sql) == true) {
            //header("Location:../lista_usuarios.php"); 
            $alert='<p class="msg_save"> Datos Actualizados Correctamente!</p>';
        } else {
            if ($conn->errno == 1062) {
                //header("Refresh:2; url=../update_user.php");    
            } else {
                echo "<h2>Error al actualizar losa datos " . mysqli_error($conn) . "</h2>";
               // echo '<i class="fas fa-exclamation-circle"></i>';
            }
        }
        $conn->close();  
    }else if($_POST["alte"]=='pass'){
        include '../config/conexionDB.php';
        $newPassword = isset($_POST["nuevaContrasena"]) ? trim($_POST["nuevaContrasena"]) : null;
        $cpass = isset($_POST["confirmarContrasena"]) ? trim($_POST["confirmarContrasena"]) : null;
        $usu_codigo = isset($_POST["usu_codigo"]) ? trim($_POST["usu_codigo"]) : null;

        $sql = "SELECT usu_password FROM Usuario WHERE usu_codigo='$usu_codigo';";
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        $date = date(date("Y-m-d H:i:s"));

            if ($newPassword === $cpass) {
                $sql = "UPDATE Usuario " .
            "SET usu_password = MD5('$newPassword'), " .
            "usu_fecha_modificacion = '$date' " .
            "WHERE usu_codigo = $usu_codigo";
                
                if ($conn->query($sql) == true) {
                    $alert2='<p class="msg_save"> Constraseña Actualizada!</p>';
                    //header("Location:../lista_usuarios.php"); 
                    //noerro();
                } else {
                    //echo "<h2>Error al actualizar la contraseña " . mysqli_error($conn) . "</h2>";
                    //error($cod);
                }
            } else {
                echo "<h2>Las contraseñas no coinciden</h2>";
                error($cod);
            } 
        $conn->close();
    }
    
   
}
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    
    <script type="text/javascript" src="../js/funcionesAdmin.js"></script>
<?php include "../controladores/scripts.php";?>
	<title>Modificar Datos</title>
</head>
<body>


<?php include "../controladores/header.php";?>

<?php
            $data = $_GET["user"];
            $datos = stripslashes($data);
            $datos = urldecode($datos);
            $datos = unserialize($datos);
?>
	<section id="container">
		<div class="form_register">
			<h1>Modificar Datos</h1>
			<hr>
            <div class="alert"><?php echo isset($alert) ? $alert :'';?></div>
			<form action="" method="POST" onsubmit="return validarCamposObligatorios()">
            <input type="hidden" name="usu_codigo" id="usu_codigo" value="<?php echo ($datos["usu_codigo"]); ?>">
            <input type="hidden" name="alte" id="alte" value="alte">


			<label for="cedula">Cedula</label>
                <input type="text" name="cedula" id="cedula" value= "<?php echo ($datos["usu_cedula"]); ?>" placeholder="Cedula" 
                onkeypress="return validarNumero(event, this)"
                onkeyup="validarCedula(this)"                
                />

                
                <span id="mensajeCedula" class="error"></span>      






				<label for="nombres">Nombres</label>
                <input type="text" name="nombres" id="nombres" value= "<?php echo ($datos["usu_nombres"]); ?>" placeholder="Nombres"
                onkeyup="this.value = validarLetras(this.value)"                
                />
                
                <span id="mensajeNombre" class="error"></span>




				<label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" value= "<?php echo ($datos["usu_apellidos"]); ?>" placeholder="Apellidos"
                onkeyup="this.value = validarLetras(this.value)"   
                />
                
                <span id="mensajeApellido" class="error"></span>
        




                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" value= "<?php echo ($datos["usu_fecha_nacimiento"]); ?>" placeholder="Fecha de Nacimiento">
                <span id="mensajeDireccion" class="error"></span>
                <span id="mensajeFecha" class="error"></span>



				<label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" value= "<?php echo ($datos["usu_telefono"]); ?>" placeholder="Telefono"
                onkeypress="return validarNumero(event, this)"  />
                <span id="mensajeTelefono" class="error"></span>


				<label for="correo">Correo</label>
                <input type="text" name="correo" id="correo" value= "<?php echo ($datos["usu_correo"]); ?>" placeholder="Correo">
                <span id="mensajeCorreo" class="error"></span>



                <input type="submit" value="Guardar" class="btn_save">
                <span id="mensajeCorreo" class="error"></span>
                
			</form>
        </div>
        <br>
        <div class="form_update_password">
			<h1>Cambiar Contraseña</h1>
            <hr>
            <div class="alert"><?php echo isset($alert2) ? $alert2 :'';?></div>
            <form action="" method="POST">
            <input type="hidden" name="alte" id="alte" value="pass">
            <input type="hidden" name="usu_codigo" id="usu_codigo" value="<?php echo ($datos["usu_codigo"]); ?>">
				<label for="nuevaContrasena">Nueva Contraseña</label>
                <input type="password" name="nuevaContrasena" id="nuevaContrasena" placeholder="Nueva Contraseña"
                
                />


                <label for="confirmarContrasena">Confirmar Contraseña</label>
                <input type="password" name="confirmarContrasena" id="confirmarContrasena" placeholder="Confirmar Contraseña"
                        
                />
                


                <input type="submit" value="Guardar" class="btn_save" >
			</form>
		</div>
	</section>
</body>
</html>