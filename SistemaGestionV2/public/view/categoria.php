<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    }
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
    
    <script type="text/javascript" src="../js/ajaxC1.js"></script>
    <title>ImportManguerasIV</title>
</head>

<body>
    <header>
        <?php
        include_once("../../global/php/headerPublic.php");
        ?>
    </header>
    </div>
    <section>
    <label for="nombres" class="nombresC1">Buscar Manguera:</label>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por nombre" onkeyup="buscarPornombre(this)">
        </form>
    </section>
    <div class="content">
        <section>
            <a href="#">
                <h2>Productos Disponibles</h2>
            </a>
          
            <div class="contentCards" id="data">

                <?php
                include '../../config/configDB.php';
                $categoria=$_GET['categoria'];
                $sql="SELECT pro.pro_nombre,pro.pro_codigo,pro.pro_descripcion, pro.pro_precio,
                pro.pro_img FROM Producto pro WHERE pro.cate_codigo=$categoria AND pro.pro_eliminado='N' 
                 GROUP BY pro.pro_codigo ORDER BY 1 DESC limit 8;";
                /*$sql = "SELECT pro.pro_fecha_creacion, pro.pro_id, pro.pro_nombre, pro.pro_descripcion, pro.pro_precio, img.img_nombre
                            FROM producto pro, imagen img 
                            WHERE pro.pro_id = img.PRODUCTO_pro_id AND
                                pro.pro_estado=0 
                            GROUP BY pro.pro_id
                            ORDER BY 1 DESC limit 8;";*/

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
                        <!--<span>Nuevo</span>
                        <div class="ranking">
                            <i class="fas fa-star"></i>
                            <?php
                                  /*  $sqlRating = "SELECT COALESCE(AVG(rat.rat_calificacion),0) AS rat_calificacion FROM producto pro, rating rat 
                                            WHERE rat.PRODUCTO_pro_id = pro.pro_id AND
                                            pro.pro_id=" . $row['pro_id'] . ";";

                                    $resultRating = $conn->query($sqlRating);
                                    $rowRating = $resultRating->fetch_assoc();
                                    echo '<span>' . $rowRating['rat_calificacion'] . '</span>';*/
                                    ?>
                        </div>-->
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