<?php
session_start();
if (isset($_SESSION['isLogin'])) {
}
if (!isset($_GET['producto'])) {
    header("Location: index.php");
}
?>
<?php
	if(isset($_POST['comentar'])) {
        include '../../config/configDB.php';
        $comentario=$_POST['comentario'];
        $usuario=$_POST['usu_codigo'];
        $producto=$_POST['pro_codigo'];
    
        $date = date(date("Y-m-d H:i:s"));
        $SqlCo="INSERT INTO Comentarios  VALUES (0,$usuario,$producto,'$comentario','$date','N')";	
        echo "$SqlCo";
        if($conn->query($SqlCo) == true){
        echo"Comentario Insertado";
        }else{
            echo"Comentaio no insertado";
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
    <script src="../js/funciones.js"></script>
    <title>Producto</title>
</head>

<body>

    <header>
        <?php
        include("../../global/php/headerPublic.php");
        ?>
    </header>


    <div class="content">
        <?php
        include '../../config/configDB.php';
                $sql="SELECT c.cate_codigo, p.pro_codigo, p.pro_nombre, p.pro_descripcion,p.pro_dia_in,p.pro_peso_gm,p.pro_presi_bar,p.pro_long_m,
                p.pro_precio,
                 p.pro_stock, p.pro_img
                FROM Producto p, Categoria c
                WHERE p.pro_codigo=". $_GET['producto'] ." AND c.cate_codigo=p.cate_codigo;";

        $result = $conn->query($sql);
        if (isset($_GET['producto']) && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre = $row['pro_nombre'];
            $descripcion = $row['pro_descripcion'];
            $precio = $row['pro_precio'];
            $categoria = $row['cate_codigo'];
            $imagen=$row['pro_img'];
            $stok = $row['pro_stock'];
        }
        ?>

        <section class="product">
            <div class="productSlide">
                <div class="productSlideImg">
                    <div class="contetImg">
                        <img id="galeria" src="../../adminPanel/img/uploads/<?php echo $row['pro_img']; ?>" alt="">
                    </div>
                </div>
            </div>

            <div class="productInfo">
                <h2><?php echo $nombre; ?></h2>
                <h3>Descripcion</h3>
                <p><?php echo $descripcion; ?></p>
                <h3>Caracteristicas</h3>
                <div class="restante">
                    <table class="tablapro">
                        <tr>
                            <td>
                                <h6>Diametro Interno (in): </h6>
                            </td>
                            <td><?php echo $row['pro_dia_in']; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Peso Teorico (g): </h6>
                            </td>
                            <td> <?php echo $row['pro_peso_gm']; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Presion de Trabajo(bar): </h6>
                            </td>
                            <td><?php echo $row['pro_presi_bar']; ?> </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Longitud (m): </h6>
                            </td>
                            <td> <?php echo $row['pro_long_m']; ?></td>
                        </tr>

                    </table>
                </div>
                <span>$<?php echo $precio; ?></span>
                <div class="dataStore">
                    <p><span>Stock:</span> <span id="stok"><?php echo $stok; ?></span></p>
                </div>
                <div class="productPrice">
                    <p><span>Sub-Total: </span>$<?php echo $precio; ?></p>
                    <p><span id="shopTotal">Total: </span>$<?php 
                                                            echo $precio; ?></p>
                </div>

                <div class="productBtns">

                    <div class="btns">
                        <button onclick="cartAdd(<?php echo $_GET['producto']; ?>)">
                            <i class="fas fa-cart-plus"></i>
                            Agregar al carrito
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <form name="form1" method="POST">
                <label for="textarea"></label>
                <center>
                    <p>
                        <textarea name="comentario" cols="80" rows="5" id="textarea"
                            placeholder="Escriba su comentario"></textarea>
                        <input type="hidden" name="usu_codigo" id="usu_codigo"
                            value="<?php echo ($_SESSION['codigo']); ?>">
                        <input type="hidden" name="pro_codigo" id="pro_codigo"
                            value="<?php echo ($_GET['producto']); ?>">
                    </p>
                    <p>
                        <input type="submit" name="comentar" value="Comentar">
                    </p>
                </center>
            </form>
            <br>
            <div id="container">
                <ul id="comments">
                    <?php
        $codPro=$_GET['producto'];
         include '../../config/configDB.php';
        $sqlC = "SELECT * FROM Comentarios c INNER JOIN Usuario us WHERE c.usu_codigo= us.usu_codigo AND c.com_eliminado='N' AND c.pro_codigo=$codPro;";
        $resultC = $conn->query($sqlC);
        if ($resultC->num_rows > 0) {
            while ($row = $resultC->fetch_assoc()) {
		?>
                    <li class="cmmnt">
                        <div class="cmmnt-content">
                            <header>
                                <p> <?php echo $row['usu_nombres'].' '.$row['usu_apellidos']; ?></p> <span
                                    class="pubdate"><?php echo $row['com_fecha']; ?></span>
                            </header>
                            <p>
                                <?php echo $row['com_comentario']; ?>
                        </div>
                    </li>
                    <?php
            }
        }
        ?>
                </ul>
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