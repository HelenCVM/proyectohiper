<script src="../../../public/js/funciones.js"></script>
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