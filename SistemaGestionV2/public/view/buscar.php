

<?php
 //incluir conexión a la base de datos
 include '../../config/configDB.php';     

if ($_GET != '') {
    $sql = "SELECT * FROM Producto  WHERE pro_nombre LIKE '" . $_GET['key'] . "%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>  
            <article >
               
                    <div class="contentImg" >
                        <div class="cardImg">
                            <a href="product.php?producto=<?php echo $row['pro_codigo']; ?>"><img src="../../adminPanel/img/uploads/<?php echo $row['pro_img']; ?>" alt="<?php echo $row['pro_nombre']; ?>"></a>
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
        }
            $conn->close();
            ?>

