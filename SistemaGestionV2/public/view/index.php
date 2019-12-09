<?php
session_start();
if (isset($_SESSION['isLogin'])) {
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/globalStyle.css">
    <link rel="stylesheet" href="../css/generalStyle.css">
    <title>ImportManguerasIV</title>
</head>

<body>
    <header>
    <!--Reutilizamos llamamos al metodo header de un archivo php para optimizar el sitio web-->        
        <?php
        include_once("../../global/php/headerPublic.php");
        ?>

    </header>
    </div>
    <div class="content">
        <section>
            <a href="#">
                <h2>Ultimos productos</h2>
            </a>
            <div class="contentCards">

                <?php
                include '../../config/configDB.php';
                $sql="SELECT pro.pro_nombre,pro.pro_codigo,pro.pro_descripcion, pro.pro_precio,
                pro.pro_img FROM Producto pro WHERE pro.pro_eliminado='N' 
                 GROUP BY pro.pro_codigo ORDER BY 1 DESC limit 8;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                <article>
                    <div class="contentImg">
                        <div class="cardImg">
                            <a href="product.php?producto=<?php echo $row['pro_codigo']; ?>"><img
                                    src="../../adminPanel/img/uploads/<?php echo $row['pro_img']; ?>"
                                    alt="<?php echo $row['pro_nombre']; ?>"></a>
                        </div>
                    </div>
                    <div class="contentDescription">
                        <div class="descripProduct">
                            <a href="product.php?producto=<?php echo $row['pro_codigo']; ?>">
                                <h2><?php echo $row['pro_nombre']; ?></h2>
                            </a>
                            <p><?php echo $row['pro_descripcion']; ?></p>
                        </div>
                        <span>$<?php echo $row['pro_precio']; ?></span>
                    </div>
                </article>
                <?php
                }
            }
            $conn->close();
            ?>

            </div>
        </section> 
    </div>

    <footer>
        <?php
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>