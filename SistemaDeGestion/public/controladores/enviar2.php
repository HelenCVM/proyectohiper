<?php
 $destino="admin@importmanguerasiv.com";
 $nombre=$_POST["name"];
 $correo=$_POST["email"];;
 $mensaje=$_POST["message"];
 $contenido="Nombre: ".$nombre."\nCorreo: ".$correo."\nMensaje: ".$mensaje;
 mail($destino,"Contacto", $contenido);
if(mail){
 header("Location: ../vista/index.php");
}
?>