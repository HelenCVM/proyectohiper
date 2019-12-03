
<?php
if(isset($_POST['enviar'])){
    if(!empty($_POST['name']) && !empty($_POST['msg'])
     && !empty($_POST['email'])){
     $name = $_POST['name'];
     $asunto = 'Mensaje de mi sitio web';
     $msg = $_POST['msg']; 
     $email= $_POST['email'] ;
     $header = "From: admin@importmanguerasiv.com" . "\r\n";
     $header.= "Reply-To: admin@importmanguerasiv.com" . "\r\n";
     $header.= "X-Mailer: PHP/".phpversion();
     $mail= mail($email,$asunto,$msg,$header);
     if($mail){
         echo"<h4>Mail enviado</h4>";
     }
    }
}

?>