<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: vista/login_admin.php");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: vista/index.php");     
}else{

}
?>