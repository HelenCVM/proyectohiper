<?php
include '../../config/conexionBD.php';
if(isset($_POST["provincia"])){
    // Capture selected country
    $country = $_POST["provincia"];
     
    // Define country and city array     
    $countryArr = array( 
        "Seleccione" => array("Mazatlan","Cuba") );
     
    
    foreach($countryArr[$country] as $value){
        echo "<option>". $value . "</option>";
    }
}
?>