<script src="../js/funciones.js"></script>
<center><a href="index.php" ><img src="../../img/banner-imi.png"  alt="Import Mangueras"/></a></center>

<div class="content">
    <a href="../../index.php"></a>   
    <nav class="menu">
        <ul>
            <li><a href="../../index.php"><img id ="iconmenu" src="../../img/icon1.png">INICIO</a></li>
            <li><a href="nosotros.php"><img id ="iconmenu" src="../../img/icon2.png"> NOSOTROS</a></li>
            <li> <span><img id ="iconmenu" src="../../img/icon3.png"> PRODUCTOS</span> <i class="fas fa-sort-down"></i>
                <ul>
                    <li><a href="categoria.php?categoria=10">Industriales</a></li>
                    <li><a href="categoria.php?categoria=11">Hidraulicas</a></li>
                    <li><a href="categoria.php?categoria=12">Alta Temperatura</a></li>
                </ul>
            </li>
            <li><span>Mision y Vision </span></li>
            <li><a href="contacto.php"><img id ="iconmenu" src="../../img/icon4.png"> CONTACTOS </a></li>
                <li><a href="login.php"><img id ="iconmenu" src="../../img/icon5.png"> LOGIN</a></li>                
                <li><a href="formulario.php"> <img id ="iconmenu" src="../../img/icon6.png"> REGISTRATE</a></li>     
                
        </ul>
    </nav>
   
    <!-- <div class="buyCar itemsUser">
        <a href="../../public/view/shoppingcart.php"><i class="fas fa-shopping-cart"></i></a>
    </div> -->
    <div class="sessionItems">
        <?php
        if (isset($_SESSION['isLogin'])) {
            ?>
        <script>
        carNot('../controller/updateNotCart.php')
        </script>
        <div class="imgUser">
            <a href="../../public/view/shoppingcart.php"><i class="fas fa-shopping-cart" id="fa-shopping-cart"></i></a>
        </div>
        <nav class="menu perfil">
            <ul>
                <li><span><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></span> <i
                        class="fas fa-sort-down"></i>
                    <ul>
                        <li><a href="../../admin/user/view/index.php">Perfil</a>
                        </li>
                        <li><a href="../../admin/user/view/shoppinghistory.php">Historial</a>
                        </li>
                        <li><a href="../../admin/user/view/settings.php">Opciones</a></li>
                        <li><a href="../../config/signout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <?php
    } else {
        echo '<a href="login.php">Iniciar Sesión</a>';
        echo '<a href="signup.php">Registrarse</a>';
    }
    ?>

    </div>
</div>