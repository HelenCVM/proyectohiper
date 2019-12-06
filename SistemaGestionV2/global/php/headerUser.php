<div class="perfil">
    <div class="img">
        <img src="../../../img/user/<?php echo ($_SESSION['codigo']) ?>/<?php echo ($_SESSION['img']) ?>" alt="">
    </div>
    <h2><?php echo ($_SESSION['nombre'] . ' ' . $_SESSION['apellido']) ?></h2>
</div>
<nav>
    <ul>
        <li><a href="index.php"><i class="fas fa-user"></i> MI CUENTA</a></li>
        <li><a href="shoppinghistory.php"><i class="fas fa-history"></i> PEDIDOS</a></li>
        <!--<li><a href="../../../public/view/shoppingcart.php"><i class="fas fa-shopping-cart"></i> CARRITO</a>-->
        </li>
        <!-- <li><a href="favorites.php"><i class="far fa-heart"></i> Favoritos</a></li> -->
        <li><a href="settings.php"><i class="fas fa-cog"></i> CONFIGURACION DE CUENTA</a></li>
        <!-- <li><a href="messages.php"><i class="fas fa-envelope-open-text"></i> Mensajes</a></li> -->
    </ul>
</nav>