
<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';     


 echo"ksenksjdf";
 $valor = $_GET['keyy'];
 $producto=$_GET['key'];
  $sql="INSERT INTO Calificaciones VALUES (0,$producto,$valor,'posi')";
    if ($conn->query($sql) == true) {
    $alert='<p class="msg_save"> Categoria Agregada!</p>';    
    }   
    $conn->close();

?>