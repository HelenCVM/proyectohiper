<?php
session_start();
if (isset($_SESSION['isLogin'])) {
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="keywords" content="manguera, importación, import" />
    <title>Nosotros</title>
    <link type="text/css" rel="stylesheet" href="css/pagina.css">
    <link rel="stylesheet" href="../css/globalStyle.css">
    <link rel="stylesheet" href="../css/generalStyle.css">
    <link type="text/css" rel="stylesheet" href="../css/pagina.css">
</head>

<body>
    <header>
        <?php
        include_once("../../global/php/headerPublic.php");
        ?>
    </header>

    <section>
        <article class="indexabout">
            <h1 class="h1nosotros">
                QUIENES SOMOS
            </h1>
            <center><iframe id="videoYT" width="1000" height="500" src="https://www.youtube.com/embed/Y9RWAVsWOT8"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe></center>
            <p class="p1nosotros">
                <img class="imanoso"
                    src="../../../imagenes/Comercializar mangueras y marcas ,con estandar y certificaciones internacionales.png"
                    alt="Import Mangueras" />

            </p>
        </article>
    </section>

    <footer>
        <?php
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>