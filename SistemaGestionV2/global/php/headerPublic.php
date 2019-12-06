<script src="../js/funciones.js"></script>
<div class="content">
    <a href="../../index.php"></a>
    <nav class="menu">
        <ul>
            <li><a href="../../index.php">Inicio</a></li>
            <li> <span>Categorias</span> <i class="fas fa-sort-down"></i>
                <ul>
                    <li><a href="categoria.php?categoria=10">Industriales</a></li>
                    <li><a href="categoria.php?categoria=11">Hidraulicas</a></li>
                    <li><a href="categoria.php?categoria=12">Alta Temperatura</a></li>
                </ul>
            </li>
            <li><span>Mision y Vision </span></li>
<li><span>¿Quienes somo?</span></li>
<li><span>Contactanos</span></li>
        </ul>
    </nav>
    <div class="search">
        <div class="barSearch">
            <input type="search" name="search" id="search" placeholder="Buscar" onkeyup="searchBox(this)">
            <i class="fas fa-search"></i>
        </div>
        <a onclick="searchBtn('search.php')">Buscar</a>
    </div>
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