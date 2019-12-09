# proyectohiper
conexionDB.php
<?php
$servername = "34.70.4.57:3389";
$database = "mangueras";
$username = "root";
$password = "importamangueras2019@";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, "utf8");
?>
sessionEnd.php
<?php
session_start();
session_destroy();
if (isset($_SESSION['isLogin']) and $_SESSION['isLogin'] == true) {
    $_SESSION['isLogin'] = false;
    session_destroy();
}
header("Location: ../public/vista/login.php");

buscar_categoria_eliminada.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM Categoria WHERE cate_nombre LIKE '" . $_GET['key'] . "%' AND cate_eliminado='S';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["cate_codigo"] . "</td>";
            echo "<td>" . $row["cate_nombre"] . "</td>";
    
            $user = serialize($row);
            $user = urlencode($user);
                echo '<td>
                <a class="link_activar" href="confirmar_activar_categoria.php?cate_codigo=' . $row["cate_codigo"] . '"><i class="fas fa-trash-restore-alt"></i> Activar</a> <br>
                </td>';
            
    
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo '<td colspan="3" class="db_null"><p>No existen Categorias eliminadas con ese nombre</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
} else {

}
$conn->close();
?>

buscar_categoria.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM Categoria WHERE cate_nombre LIKE '" . $_GET['key'] . "%' AND cate_eliminado='N';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["cate_codigo"] . "</td>";
            echo "<td>" . $row["cate_nombre"] . "</td>";
    
            $user = serialize($row);
            $user = urlencode($user);
                echo '<td>
                <a class="link_delete" href="confirmar_eliminar_categoria.php?cate_codigo=' . $row["cate_codigo"] . '"><i class="fas fa-trash-alt"></i> Delete </a> <br>
                </td>';
            
    
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo '<td colspan="3" class="db_null"><p>No existen Categorias con ese nombre</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
} else {

}
$conn->close();
?>

buscar_producto_eliminado.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT p.pro_codigo,c.cate_nombre, p.pro_nombre , p.pro_img,p.pro_eliminado FROM Producto p INNER JOIN Categoria c ON p.cate_codigo = c.cate_codigo WHERE p.pro_nombre LIKE '" . $_GET['key'] . "%' AND p.pro_eliminado='S'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row["pro_img"]!="img_producto.png"){
                $foto='../img/uploads/'.$row["pro_img"];
    
            }else{
                $foto='../img/'.$row["pro_img"];
            }
            echo "<tr>";
            echo "<td>" . $row["pro_codigo"] . "</td>";
            echo "<td>" . $row["cate_nombre"] . "</td>";
            echo "<td>" . $row["pro_nombre"] . "</td>";
            echo "<td><img class='img_producto'src=" . $foto . " alt=".$row["cate_nombre"]."></td>";
            echo '<td>
            <a class="link_activar" href="confirmar_activar_producto.php?pro_codigo=' . $row["pro_codigo"] . '"><i class="fas fa-trash-restore-alt"></i> Activar </a> <br>
            </td>';
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo '<td colspan="5" class="db_null"><p>No existen productos eliminados con ese nombre</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
    $conn->close();
} else {

}

?>

buscar_producto.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT p.pro_codigo,c.cate_nombre, p.pro_nombre , p.pro_img,p.pro_eliminado 
    FROM Producto p INNER JOIN Categoria c ON p.cate_codigo = c.cate_codigo WHERE p.pro_nombre LIKE '" 
    . $_GET['key'] . "%' AND p.pro_eliminado='N'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row["pro_img"]!="img_producto.png"){
                $foto='../img/uploads/'.$row["pro_img"];
    
            }else{
                $foto='../img/'.$row["pro_img"];
            }
            echo "<tr>";
            echo "<td>" . $row["pro_codigo"] . "</td>";
            echo "<td>" . $row["cate_nombre"] . "</td>";
            echo "<td>" . $row["pro_nombre"] . "</td>";
            echo "<td><img class='img_producto'src=" . $foto . " alt=".$row["cate_nombre"]."></td>";
            echo '<td>
            <a class="link_add" href="update_user.php?user=">Agregar</a> <br>
            <a class="link_edit" href="update_user.php?user=">Editar</a> <br>
            <a class="link_delete" href="confirmar_eliminar_producto.php?pro_codigo=' . $row["pro_codigo"] . '">Eliminar </a> <br>
            </td>';
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo '<td colspan="5" class="db_null"><p>No existen productos registrados con ese nombre</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
    $conn->close();
} else {

}

?>

buscar_usuario_eliminado.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM Usuario WHERE usu_cedula LIKE '" . $_GET['key'] . "%' AND usu_eliminado='S';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["usu_codigo"] . "</td>";
            echo "<td>" . $row["usu_cedula"] . "</td>";
            echo "<td>" . $row["usu_rol"] . "</td>";
            echo "<td>" . $row["usu_nombres"] . "</td>";
            echo "<td>" . $row["usu_apellidos"] . "</td>";
            echo "<td>" . $row["usu_fecha_nacimiento"] . "</td>";
            echo "<td>" . $row["usu_telefono"] . "</td>";
            echo "<td>" . $row["usu_correo"] . "</td>";
            echo "<td>" . $row["usu_fecha_creacion"] . "</td>";
            echo "<td>" . $row["usu_fecha_modificacion"] . "</td>";
            $user = serialize($row);
            $user = urlencode($user);
            echo '<td>
                <a class="link_activar" href="confirmar_activar_user.php?usu_codigo=' . $row["usu_codigo"] . '"><i class="fas fa-trash-restore-alt"></i> Activar </a> <br>
                </td>';
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo '<td colspan="10" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
} else {

}
$conn->close();
?>

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM Usuario WHERE usu_cedula LIKE '" . $_GET['key'] . "%' AND usu_eliminado='N';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["usu_codigo"] . "</td>";
            echo "<td>" . $row["usu_cedula"] . "</td>";
            echo "<td>" . $row["usu_rol"] . "</td>";
            echo "<td>" . $row["usu_nombres"] . "</td>";
            echo "<td>" . $row["usu_apellidos"] . "</td>";
            echo "<td>" . $row["usu_fecha_nacimiento"] . "</td>";
            echo "<td>" . $row["usu_telefono"] . "</td>";
            echo "<td>" . $row["usu_correo"] . "</td>";
            echo "<td>" . $row["usu_fecha_creacion"] . "</td>";
            echo "<td>" . $row["usu_fecha_modificacion"] . "</td>";
            $user = serialize($row);
            $user = urlencode($user);
            if($row["usu_codigo"]!=1){
                echo '<td>
                <a class="link_edit" href="update_user.php?user=' . $user . '">Editar </a> <br>
                <a class="link_delete" href="eliminar_confimar.php?usu_codigo=' . $row["usu_codigo"] . '">Eliminar </a> <br>
                </td>';
            }else{
                echo '<td>
                <a class="link_edit" href="update_user.php?user=' . $user . '">Editar </a> <br>
                </td>';   
            }
    
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo '<td colspan="11" class="db_null"><p>No existen usuarios registrados en el sistema</p></td>';
        echo "</tr>";
    }
} else {

}
$conn->close();
?>

buscar_usuario.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    //header("Location: ../../vista/admin/index.php");
}

include '../config/conexionDB.php';

if ($_GET != '') {
    $sql = "SELECT * FROM Usuario WHERE usu_cedula LIKE '" . $_GET['key'] . "%' AND usu_eliminado='N';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["usu_codigo"] . "</td>";
            echo "<td>" . $row["usu_cedula"] . "</td>";
            echo "<td>" . $row["usu_rol"] . "</td>";
            echo "<td>" . $row["usu_nombres"] . "</td>";
            echo "<td>" . $row["usu_apellidos"] . "</td>";
            echo "<td>" . $row["usu_fecha_nacimiento"] . "</td>";
            echo "<td>" . $row["usu_telefono"] . "</td>";
            echo "<td>" . $row["usu_correo"] . "</td>";
            echo "<td>" . $row["usu_fecha_creacion"] . "</td>";
            echo "<td>" . $row["usu_fecha_modificacion"] . "</td>";
            $user = serialize($row);
            $user = urlencode($user);
            if($row["usu_codigo"]!=1){
                echo '<td>
                <a class="link_edit" href="update_user.php?user=' . $user . '">Editar </a> <br>
                <a class="link_delete" href="eliminar_confimar.php?usu_codigo=' . $row["usu_codigo"] . '">Eliminar </a> <br>
                </td>';
            }else{
                echo '<td>
                <a class="link_edit" href="update_user.php?user=' . $user . '">Editar </a> <br>
                </td>';   
            }
    
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo '<td colspan="11" class="db_null"><p>No existen usuarios registrados en el sistema</p></td>';
        echo "</tr>";
    }
} else {

}
$conn->close();
?>

header.php

<header>
		<div class="header">
			
			<h1>ADMIN PANEL</h1>
			<div class="optionsBar">
                <span class="user"><?php echo ($_SESSION['nombre'] . ' ' . $_SESSION['apellido']) ?></span>
				<img class="photouser" src="../img/user.png" alt="Usuario">
				<a href="#"><img class="close" src="../img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<nav>
			<ul>
				<li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
				<li class="principal">
					<a href="#"><i class="fas fa-users"></i> Usuarios</a>
					<ul>
						<li><a href="lista_users_activos.php"><i class="fas fa-user-check"></i> Lista de Usuarios Activos</a></li>
						<li><a href="lista_users_eliminados.php"><i class="fas fa-user-minus"></i> Lista de Usuarios Inactivos</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#"><i class="fas fa-boxes"></i> Categoria</a>
					<ul>
						<li><a href="agregar_categoria.php"><i class="fas fa-plus-square"></i> Agregar Categoria</a></li>
						<li><a href="lista_categoria.php"><i class="fas fa-th"></i> Lista de Categorias</a></li>
						<li><a href="lista_categoria_eliminadas.php"><i class="fas fa-th"></i> Lista de Categorias Eliminadas</a></li>
					</ul>
				</li>


				<li class="principal">
					<a href="#"><i class="fas fa-parachute-box"></i> Productos</a>
					<ul>
						<li><a href="agregar_producto.php"><i class="fas fa-plus-square"></i> Agregar Producto</a></li>
						<li><a href="lista_productos.php"><i class="fas fa-th-list"></i> Lista de Productos</a></li>
						<li><a href="lista_productos_eliminados.php"><i class="fas fa-th-list"></i> Lista de Productos Eliminados</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#"><i class="fas fa-thumbs-up"></i> Review</a>
					<ul>
						<li><a href="lista_calificaciones.php"><i class="fas fa-star"></i> Lista de Calificaciones</a></li>
						</ul>
				</li>

				<li class="principal">
					<a href="#"><i class="fas fa-map-marker-alt"></i> Direcciones</a>
					<ul>
						<li><a href="#"><i class="fas fa-plus-square"></i> Agregar Direccion</a></li>
						<li><a href="lista_direcciones.php"><i class="fas fa-atlas"></i> Lista de Direcciones</a></li>
					</ul>
				</li>

				<li class="principal">
					<a href="#"><i class="fas fa-shopping-basket"></i> Pedidos</a>
					<ul>
						<li><a href="pedidos.php"><i class="fas fa-th-list"></i> Lista de Pedidos</a></li>
						<li><a href="generar_ruta.php"><i class="fas fa-map-marked"></i> Generar Ruta</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#"><i class="fas fa-receipt"></i> Facturas</a>
					<ul>
						<li><a href="lista_facturas.php"><i class="fas fa-archive"></i> Lista de Facturas</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>


mapDirection.php

<?php
/*session_start();
if (isset($_SESSION['isLogin'])) {
        if ($_SESSION['rol'] == 'admin') {
                header("Location: ../../admin/view/index.php");
        }
} else {
        header("Location: ../../../index.php");
}*/
include '../config/conexionDB.php';
//if (isset($_GET['fac'])) { }
$fac_codigo=$_GET['fac'];
$sql="SELECT * FROM Factura f INNER JOIN Usuario u ON f.usu_codigo=u.usu_codigo INNER JOIN Direccion d ON u.usu_codigo= d.usu_codigo WHERE f.fac_codigo=$fac_codigo";
$sqlDirUser = $conn->query($sql);
$sqlDirUser = $sqlDirUser->fetch_assoc();
$dirEnd = $sqlDirUser['dir_calle_principal'] . ', ' . $sqlDirUser['dir_calle_secundaria'] . ', ' . $sqlDirUser['ciu_nombre'] . ', ' . $sqlDirUser['pro_nombre'].',Ecuador';
$dirStart = "Calle Mariscal Lamar, Manuel Vega, Cuenca, Ecuador";
echo '<input id="start" type="hidden" name="" value="' . $dirStart . '">';
echo '<input id="end" type="hidden" name="" value="' . $dirEnd . '">';

scripts.php

<link rel="stylesheet" type="text/css" href="../css/estilosAdmin.css">
<script src="../js/funcionesAdmin.js"></script>
<script src="https://kit.fontawesome.com/3c72c3b5fc.js" crossorigin="anonymous"></script>

validar_login.php
<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    header("Location: ../vista/index.php");
}else{
    include '../config/conexionDB.php';
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql = "SELECT * FROM Usuario WHERE usu_correo ='$correo' AND usu_password = MD5('$contrasena');";
    
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $_SESSION['isLogin'] = true;
        $_SESSION['codigo'] = $user["usu_codigo"];
        $_SESSION['nombre'] = $user["usu_nombres"];
        $_SESSION['apellido'] = $user["usu_apellidos"];
        $_SESSION['rol'] = $user["usu_rol"];
        if ($_SESSION['rol'] == 'admin') {
            header("Location:../vista/index.php");
           // echo "Entra";
        } else {
           // header("Refresh:2; url=../../admin/vista/usuario/index.php");
        }
        } else {
            //header("Refresh:2; url=../vista/login.php");
        }
    $conn->close();
}
?>

agregar_categoria.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../index.php");
} 
?>
<?php
if(!empty($_POST)){
$alert='';
include '../config/conexionDB.php';
$categoria_nombre=mb_strtoupper($_POST["categoria"]);
$sql="INSERT INTO Categoria VALUES (0,'$categoria_nombre','N')";
if ($conn->query($sql) == true) {
    $alert='<p class="msg_save"> Categoria Agregada!</p>';
//header("Location:../lista_usuarios.php"); 
}

}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    
    <script type="text/javascript" src="../js/funcionesAdmin.js"></script>
    <?php include "../controladores/scripts.php";?>

    <title>Registro Producto</title>
</head>

<body>
    <?php include "../controladores/header.php";?>

    <section id="container">
        <div class="form_register">
            <h1><i class="fas fa-boxes"></i> Agregar Categoria</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert :'';?></div>
            <form action="" method="POST" >
                <hr>
                <label for="categoria">Nombre Categoria</label>
                <br>
                <input type="text" name="categoria" id="categoria" value="" placeholder="Categoria"
                onkeyup="this.value = validarLetras(this.value)"
                >
                <button type="submit" class=btn_save><i class="fas fa-plus-square"></i> Agregar</button>
            </form>
        </div>
        <br>

    </section>
</body>

</html>

agregar_producto.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../vista/index.php");
}
include '../config/conexionDB.php';
?>

<?php
if(!empty($_POST)){
    $categoria_codigo=$_POST['categoria'];
    $pro_nombre=mb_strtoupper($_POST['nombreP']);
    $pro_marca=mb_strtoupper($_POST['marca']);
    $pro_caracteristicas=$_POST['Caracteristicas'];
    //$pro_descripcion=$_POST['Descripcion'];
    //$pro_aplicaciones=$_POST['Aplicaciones'];
    $pro_diametro=$_POST['diamtreo'];
    $pro_peso=$_POST['peso'];
    $pro_presion=$_POST['presion'];
    $pro_longitud=$_POST['Longitud'];
    $pro_precio=$_POST['Precio'];
    $pro_stock=$_POST['Stock'];
    
    $foto=$_FILES['foto'];
    $nombre_foto=$foto['name'];
    $foto_type=$foto['type'];
    $url_temp=$foto['tmp_name'];
    
    $img_producto= "img_producto.png";
    if($nombre_foto!=''){
    $destino='../img/uploads/';
    $img_nombre='img_'.md5(date('d-m-y H:m:s'));
    $img_producto=$img_nombre.'.jpg';
    $src=$destino.$img_producto;
    }
    
    include '../config/conexionDB.php';
    //$sql="INSERT INTO Producto VALUES (0,$categoria_codigo,'$pro_nombre','$img_producto','$pro_marca','$pro_caracteristicas','$pro_descripcion','$pro_aplicaciones',$pro_diametro,$pro_peso,$pro_presion,$pro_longitud,$pro_precio,$pro_stock,'N')";
    $sql="INSERT INTO Producto VALUES (0,$categoria_codigo,'$pro_nombre','$img_producto','$pro_marca','$pro_caracteristicas',$pro_diametro,$pro_peso,$pro_presion,$pro_longitud,$pro_precio,$pro_stock,'N')";
    if ($conn->query($sql) == true) {
        if($nombre_foto!=''){
            move_uploaded_file($url_temp,$src);
            $alert='<p class="msg_save"> Producto Agregado!</p>';
            //echo "Prodcuto guardado";
        }
        $alert='<p class="msg_save"> Producto Agregado!</p>';
    //header("Location:../lista_usuarios.php"); 
    
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    
    <script type="text/javascript" src="../js/funcionesAdmin.js"></script>
    <?php include "../controladores/scripts.php";?>
    <title>Registro Producto</title>
</head>

<body>

    <?php include "../controladores/header.php";?>


    <section id="container">
        <div class="form_register">
            <h1><i class="fas fa-box-open"></i> Agregar Producto</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert :'';?></div>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="categoria">Categoria</label>
                <?php

$sql = "SELECT * FROM Categoria WHERE cate_eliminado='N' ORDER BY cate_nombre ASC";
$result = $conn->query($sql);
$conn->close();
?>
                <select name="categoria" id="categoria">
                    <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

                    ?>
                    <option value="<?php echo $row['cate_codigo'];?>"><?php echo$row['cate_nombre'] ;?></option>
                    <?php
                        }
                    } 
                    ?>
                </select>
                <label for="nombreP">Nombre</label>
                <input type="text" name="nombreP" id="nombreP" value="" placeholder="Nombre del Producto"
                onkeyup="this.value = validarLetras(this.value)"  
                
                >




                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" value="" placeholder="marca"
                onkeyup="this.value = validarLetras(this.value)"  
                >


                <label for="Caracteristicas">Caracteristicas</label>
                <input type="Caracteristicas" name="Caracteristicas" id="Caracteristicas" value=""
                    placeholder="Caracteristicas del Producto"                   
                    >
                <label for="diamtreo">Diametro</label>
                <input type="text" name="diamtreo" id="diamtreo" value="" placeholder="Diamtreo"
                onkeypress="return validarNumero(event, this)"
                >
                <label for="peso">Peso</label>
                <input type="text" name="peso" id="peso" value="" placeholder="Peso"
                >
                <label for="presion">Presion</label>
                <input type="text" name="presion" id="presion" value="" placeholder="Presion"
                >
                <label for="Longitud">Longitud</label>
                <input type="text" name="Longitud" id="Longitud" value="" placeholder="Longitud"
                >
                <label for="Precio">Precio</label>
                <input type="number" name="Precio" id="Precio" value="" placeholder="Precio"
                >
                <label for="Stock">Stock</label>
                <input type="number" name="Stock" id="Stock" value="" placeholder="Stock"
                onkeypress="return validarNumero(event, this)"
                >

                <div class="photo">
                    <label for="foto">Foto</label>
                    <div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="foto"></label>
                    </div>
                    <div class="upimg">
                        <input type="file" name="foto" id="foto">
                    </div>
                    <div id="form_alert"></div>
                </div>
                <button type="submit" class=btn_save><i class="fas fa-plus-square"></i> Agregar</button>
            </form>
        </div>
        <br>

    </section>
</body>

</html>

confirmar_activar_categoria.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["cate_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Categoria " .
                "SET cate_eliminado ='N' " .
                "WHERE cate_codigo = $cod";
	$resu = $conn->query($sql);
    header("Location:lista_categoria_eliminadas.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["cate_codigo"]) ){
	include '../config/conexionDB.php';
	$cate_codigo=$_GET["cate_codigo"];
    $sql = "SELECT * FROM Categoria WHERE cate_codigo=$cate_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['cate_nombre'];
		}
	
	}else{
		header("Location: lista_categoria_eliminadas.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Activar Categoria</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-restore-alt fa-7x" style="color:#64b13c"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere activar el sigueinte reguistro?</h2>
			<p>Categoria: <span><?php echo $nombre; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="cate_codigo" value="<?php echo $cate_codigo; ?>">
				<a href="lista_categoria_eliminadas.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>

confirmar_activar_producto.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["pro_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Producto " .
                "SET pro_eliminado ='N' " .
                "WHERE pro_codigo = $cod";
                echo"$sql";
	$resu = $conn->query($sql);
    header("Location:lista_productos_eliminados.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["pro_codigo"]) ){
	include '../config/conexionDB.php';
	$pro_codigo=$_GET["pro_codigo"];
    $sql = "SELECT * FROM Producto WHERE pro_codigo=$pro_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['pro_nombre'];
		}
	
	}else{
		header("Location: lista_productos_eliminados.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Activar Producto</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-restore-alt fa-7x" style="color:#64b13c"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere activar el sigueinte reguistro?</h2>
			<p>Producto: <span><?php echo $nombre; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="pro_codigo" value="<?php echo $pro_codigo; ?>">
				<a href="lista_productos_eliminados.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>

confirmar_activar_user.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	if($_POST["usu_codigo"]==1){
	header("Location:lista_users_eliminados.php");
	exit;
	}
	include '../config/conexionDB.php';
	$cod = $_POST["usu_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Usuario " .
                "SET usu_eliminado = 'N', " .
                "usu_fecha_modificacion = '$date' " .
				"WHERE usu_codigo = $cod";
	$resu = $conn->query($sql);
	header("Location:lista_users_eliminados.php");
}


if(empty($_GET["usu_codigo"]) ||$_GET["usu_codigo"]==1 ){
header("Location: lista_users_eliminados.php");
}else{
	include '../config/conexionDB.php';
	$usu_codigo=$_GET["usu_codigo"];
	$sql = "SELECT * FROM Usuario WHERE usu_codigo=$usu_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['usu_nombres'];
		  $apellidos=$row['usu_apellidos']; 
		}
	
	}else{
		header("Location: lista_users_eliminados.php");
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Eliminar Usuario</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-restore-alt fa-7x" style="color:#64b13c"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere activar el sigueinte registro de Usuario?</h2>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>Apellido: <span><?php echo $apellidos; ?></span></p>
			<form action="" method="POST">
				<input type="hidden" name="usu_codigo" value="<?php echo $usu_codigo; ?>">
				<a href="lista_users_eliminados.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>

confirmar_anular_factura.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["fac_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Factura " .
                "SET fac_eliminado ='S' " .
                "WHERE fac_codigo = $cod";
    $resu = $conn->query($sql);
    echo "$sql";
    header("Location:lista_facturas.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["fac_codigo"]) ){
	include '../config/conexionDB.php';
	$fac_codigo=$_GET["fac_codigo"];
    $sql = "SELECT * FROM Factura WHERE fac_codigo=$fac_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $numero=$row['fac_codigo'];
		}
	
	}else{
		header("Location: lista_productos.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Confirma Eliminar Producto</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-alt fa-7x" style="color:#e66262"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere Anular la Siguigueinte Factura?</h2>
			<p>Factura #: <span><?php echo $numero; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="fac_codigo" value="<?php echo $fac_codigo; ?>">
				<a href="lista_facturas.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>

confirmar_eliminar_categoria.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["cate_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Categoria " .
                "SET cate_eliminado ='S' " .
                "WHERE cate_codigo = $cod";
	$resu = $conn->query($sql);
    header("Location:lista_categoria.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["cate_codigo"]) ){
	include '../config/conexionDB.php';
	$cate_codigo=$_GET["cate_codigo"];
    $sql = "SELECT * FROM Categoria WHERE cate_codigo=$cate_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['cate_nombre'];
		}
	
	}else{
		header("Location: lista_categoria.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Eliminar Usuario</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-alt fa-7x" style="color:#e66262"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere eliminar la siguiente Categoria?</h2>
			<p>Categoria: <span><?php echo $nombre; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="cate_codigo" value="<?php echo $cate_codigo; ?>">
				<a href="lista_categoria.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>
confirmar_eliminar_comentario.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["comentario_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Calificaciones " .
                "SET cali_estado ='S' " .
                "WHERE cali_codigo = $cod";
	$resu = $conn->query($sql);
    header("Location:lista_calificaciones.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["comentario_codigo"]) ){
	include '../config/conexionDB.php';
	$cali_codigo=$_GET["comentario_codigo"];
    $sql = "SELECT cali_codigo, pro_nombre,cali_valor,cali_comentario FROM Calificaciones c,Producto p 
    WHERE c.pro_codigo=p.pro_codigo and  cali_codigo=$cali_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['cali_comentario'];
		}
	
	}else{
		header("Location: lista_calificaciones.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Eliminar Usuario</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-alt fa-7x" style="color:#e66262"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere eliminar el siguiente Comentario?</h2>
			<p>Calificaciones: <span><?php echo $nombre; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="cate_codigo" value="<?php echo $cali_codigo; ?>">
				<a href="lista_calificaciones.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>

confirmar_eliminar_producto.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	include '../config/conexionDB.php';
	$cod = $_POST["pro_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Producto " .
                "SET pro_eliminado ='S' " .
                "WHERE pro_codigo = $cod";
    $resu = $conn->query($sql);
    echo "$sql";
    header("Location:lista_productos.php");
    $conn->close();
}
?>
<?php
if(!empty($_GET["pro_codigo"]) ){
	include '../config/conexionDB.php';
	$pro_codigo=$_GET["pro_codigo"];
    $sql = "SELECT * FROM Producto WHERE pro_codigo=$pro_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['pro_nombre'];
		}
	
	}else{
		header("Location: lista_productos.php");
	}
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Confirma Eliminar Producto</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
        <i class="fas fa-trash-alt fa-7x" style="color:#e66262"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere eliminar el sigueinte Registro?</h2>
			<p>Producto: <span><?php echo $nombre; ?></span></p>

			<form action="" method="POST">
				<input type="hidden" name="pro_codigo" value="<?php echo $pro_codigo; ?>">
				<a href="lista_productos.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>
confirmar_eliminar_user.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<?php
if(!empty($_POST)){
	if($_POST["usu_codigo"]==1){
	header("Location:lista_users_activos.php");
	exit;
	}
	include '../config/conexionDB.php';
	$cod = $_POST["usu_codigo"];
	$date = date(date("Y-m-d H:i:s"));
	$sql = "UPDATE Usuario " .
                "SET usu_eliminado = 'S', " .
                "usu_fecha_modificacion = '$date' " .
				"WHERE usu_codigo = $cod";
	$resu = $conn->query($sql);
	header("Location:lista_users_activos.php");
	$conn->close();
}


if(empty($_GET["usu_codigo"]) ||$_GET["usu_codigo"]==1 ){
header("Location: lista_users_activos.php");
}else{
	include '../config/conexionDB.php';
	$usu_codigo=$_GET["usu_codigo"];
	$sql = "SELECT * FROM Usuario WHERE usu_codigo=$usu_codigo";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		  $nombre=$row['usu_nombres'];
		  $apellidos=$row['usu_apellidos']; 
		}
	
	}else{
		header("Location: lista_users_activos.php");
	}
	$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Eliminar Usuario</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<div class="data_delete">
            <i class="fas fa-user-times fa-7x" style="color:#e66262"></i>
            <br><br>
			<h2>¿Esta seguro de que quiere eliminar el sigueinte registro de Usuario?</h2>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>Apellido: <span><?php echo $apellidos; ?></span></p>
			<form action="" method="POST">
				<input type="hidden" name="usu_codigo" value="<?php echo $usu_codigo; ?>">
				<a href="lista_users_activos.php" class="btn_cancelar">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_aceptar">
			</form>
		</div>
	</section>
</body>
editar_producto.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../vista/index.php");
} 
include '../config/conexionDB.php';
?>

<?php
if(!empty($_POST)){
    $categoria_codigo=$_POST['categoria'];
    $pro_nombre=$_POST['nombreP'];
    $pro_marca=$_POST['marca'];
    $pro_caracteristicas=$_POST['Caracteristicas'];
    $pro_descripcion=$_POST['Descripcion'];
    $pro_aplicaciones=$_POST['Aplicaciones'];
    $pro_diametro=$_POST['diamtreo'];
    $pro_peso=$_POST['peso'];
    $pro_presion=$_POST['presion'];
    $pro_longitud=$_POST['Longitud'];
    $pro_precio=$_POST['Precio'];
    $pro_stock=$_POST['Stock'];
    
    $foto=$_FILES['foto'];
    $nombre_foto=$foto['name'];
    $foto_type=$foto['type'];
    $url_temp=$foto['tmp_name'];
    
    $img_producto= "img_producto.png";
    if($nombre_foto!=''){
    $destino='../img/uploads/';
    $img_nombre='img_'.md5(date('d-m-y H:m:s'));
    $img_producto=$img_nombre.'.jpg';
    $src=$destino.$img_producto;
    }
    
    include '../config/conexionDB.php';
    $sql="INSERT INTO Producto VALUES (0,$categoria_codigo,'$pro_nombre','$img_producto','$pro_marca','$pro_caracteristicas','$pro_descripcion','$pro_aplicaciones',$pro_diametro,$pro_peso,$pro_presion,$pro_longitud,$pro_precio,$pro_stock,'N')";

    if ($conn->query($sql) == true) {
        if($nombre_foto!=''){
            move_uploaded_file($url_temp,$src);
            $alert='<p class="msg_save"> Producto Agregado!</p>';
            echo "Prodcuto guardado";
        }
        $alert='<p class="msg_save"> Producto Agregado!</p>';
    //header("Location:../lista_usuarios.php"); 
    
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php";?>
    <title>Editar Producto</title>
</head>

<body>

    <?php include "../controladores/header.php";?>
    <?php
    include '../config/conexionDB.php';
    $proCodigo=$_GET['producto'];
    $sql = "SELECT * FROM Producto WHERE pro_codigo=$proCodigo";
    echo "$proCodigo";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre_pro=$row['pro_nombre'];
            $marca=$row['pro_marca'];
            //$Caracteristica=$row['pro_marca'];
            $Descripcion=$row['pro_descripcion'];
            //$Aplicaciones=$row['pro_dia_in'];
            $Diametro=$row['pro_dia_in'];
            $Peso=$row['pro_peso_gm'];
            $Presion=$row['pro_presi_bar'];
            $Longitud=$row['pro_long_m'];
            $Precio=$row['pro_precio'];
            $Stock=$row['pro_stock'];
            $FotoR=$row['pro_img'];
            $categoria=$row['cate_codigo'];
        }
    }
?>

    <section id="container">
        <div class="form_register">
            <h1><i class="fas fa-box-open"></i> Editar Producto</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert :'';?></div>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="categoria">Categoria</label>
                <?php

$sql = "SELECT * FROM Categoria WHERE cate_eliminado='N' ORDER BY cate_nombre ASC";
$result = $conn->query($sql);
$conn->close();
?>
                <select name="categoria" id="categoria">
                    <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

                    ?>
                    <option value="<?php echo $row['cate_codigo'];?>"><?php echo$row['cate_nombre'] ;?></option>
                    <?php
                        }
                    } 
                    ?>
                </select>
                <label for="nombreP">Nombre</label>
                <input type="text" name="nombreP" id="nombreP" value="<?php echo ($nombre_pro); ?>" placeholder="Nombre del Producto">
                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" value="<?php echo ($marca); ?>" placeholder="marca">
                <label for="Descripcion">Descripcion</label>
                <input type="text" name="Descripcion" id="Descripcion" value="<?php echo ($Descripcion); ?>"
                    placeholder="Descripcion">
                <label for="diamtreo">Diametro</label>
                <input type="text" name="diamtreo" id="diamtreo" value="<?php echo ($Diametro); ?>" placeholder="Diamtreo">
                <label for="peso">Peso</label>
                <input type="text" name="peso" id="peso" value="<?php echo ($Peso); ?>" placeholder="Peso">
                <label for="presion">Presion</label>
                <input type="text" name="presion" id="presion" value="<?php echo ($Presion); ?>" placeholder="Presion">
                <label for="Longitud">Longitud</label>
                <input type="text" name="Longitud" id="Longitud" value="<?php echo ($Longitud); ?>" placeholder="Longitud">
                <label for="Precio">Precio</label>
                <input type="number" name="Precio" id="Precio" value="<?php echo ($Precio); ?>" placeholder="Precio">
                <label for="Stock">Stock</label>
                <input type="number" name="Stock" id="Stock" value="<?php echo ($Stock); ?>" placeholder="Stock">

                <div class="photo">
                    <label for="foto">Foto</label>
                    <div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="foto"></label>
                    </div>
                    <div class="upimg">
                        <input type="file" name="foto" id="foto">
                    </div>
                    <div id="form_alert"></div>
                </div>
                <button type="submit" class=btn_save><i class="fas fa-plus-square"></i> Agregar</button>
            </form>
        </div>
        <br>

    </section>
</body>

</html>
editar_usuario.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>

<?php
if(!empty($_POST)){
    if($_POST["alte"]=='alte'){
        include '../config/conexionDB.php';
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombre = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $apellido = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
        $fechaNac = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
        $codigo = $_POST["usu_codigo"];
        $date = date(date("Y-m-d H:i:s"));
    
                  $sql = "UPDATE Usuario " .
                    "SET usu_cedula = '$cedula', " .
                    "usu_nombres = '$nombre', " .
                    "usu_apellidos = '$apellido', " .
                    "usu_telefono = '$telefono', " .
                    "usu_correo = '$correo', " .
                    "usu_fecha_nacimiento = '$fechaNac', " .
                    "usu_fecha_modificacion = '$date' " .
                    "WHERE usu_codigo = $codigo";
        if ($conn->query($sql) == true) {
            //header("Location:../lista_usuarios.php"); 
            $alert='<p class="msg_save"> Datos Actualizados Correctamente!</p>';
        } else {
            if ($conn->errno == 1062) {
                //header("Refresh:2; url=../update_user.php");    
            } else {
                echo "<h2>Error al actualizar losa datos " . mysqli_error($conn) . "</h2>";
               // echo '<i class="fas fa-exclamation-circle"></i>';
            }
        }
        $conn->close();  
    }else if($_POST["alte"]=='pass'){
        include '../config/conexionDB.php';
        $newPassword = isset($_POST["nuevaContrasena"]) ? trim($_POST["nuevaContrasena"]) : null;
        $cpass = isset($_POST["confirmarContrasena"]) ? trim($_POST["confirmarContrasena"]) : null;
        $usu_codigo = isset($_POST["usu_codigo"]) ? trim($_POST["usu_codigo"]) : null;

        $sql = "SELECT usu_password FROM Usuario WHERE usu_codigo='$usu_codigo';";
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        $date = date(date("Y-m-d H:i:s"));

            if ($newPassword === $cpass) {
                $sql = "UPDATE Usuario " .
            "SET usu_password = MD5('$newPassword'), " .
            "usu_fecha_modificacion = '$date' " .
            "WHERE usu_codigo = $usu_codigo";
                
                if ($conn->query($sql) == true) {
                    $alert2='<p class="msg_save"> Constraseña Actualizada!</p>';
                    //header("Location:../lista_usuarios.php"); 
                    //noerro();
                } else {
                    //echo "<h2>Error al actualizar la contraseña " . mysqli_error($conn) . "</h2>";
                    //error($cod);
                }
            } else {
                echo "<h2>Las contraseñas no coinciden</h2>";
                error($cod);
            } 
        $conn->close();
    }
    
   
}
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    
    <script type="text/javascript" src="../js/funcionesAdmin.js"></script>
<?php include "../controladores/scripts.php";?>
	<title>Modificar Datos</title>
</head>
<body>


<?php include "../controladores/header.php";?>

<?php
            $data = $_GET["user"];
            $datos = stripslashes($data);
            $datos = urldecode($datos);
            $datos = unserialize($datos);
?>
	<section id="container">
		<div class="form_register">
			<h1>Modificar Datos</h1>
			<hr>
            <div class="alert"><?php echo isset($alert) ? $alert :'';?></div>
			<form action="" method="POST" onsubmit="return validarCamposObligatorios()">
            <input type="hidden" name="usu_codigo" id="usu_codigo" value="<?php echo ($datos["usu_codigo"]); ?>">
            <input type="hidden" name="alte" id="alte" value="alte">


			<label for="cedula">Cedula</label>
                <input type="text" name="cedula" id="cedula" value= "<?php echo ($datos["usu_cedula"]); ?>" placeholder="Cedula" 
                onkeypress="return validarNumero(event, this)"
                onkeyup="validarCedula(this)"                
                />

                
                <span id="mensajeCedula" class="error"></span>      






				<label for="nombres">Nombres</label>
                <input type="text" name="nombres" id="nombres" value= "<?php echo ($datos["usu_nombres"]); ?>" placeholder="Nombres"
                onkeyup="this.value = validarLetras(this.value)"                
                />
                
                <span id="mensajeNombre" class="error"></span>




				<label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" value= "<?php echo ($datos["usu_apellidos"]); ?>" placeholder="Apellidos"
                onkeyup="this.value = validarLetras(this.value)"   
                />
                
                <span id="mensajeApellido" class="error"></span>
        




                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" value= "<?php echo ($datos["usu_fecha_nacimiento"]); ?>" placeholder="Fecha de Nacimiento">
                <span id="mensajeDireccion" class="error"></span>
                <span id="mensajeFecha" class="error"></span>



				<label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" value= "<?php echo ($datos["usu_telefono"]); ?>" placeholder="Telefono"
                onkeypress="return validarNumero(event, this)"  />
                <span id="mensajeTelefono" class="error"></span>


				<label for="correo">Correo</label>
                <input type="text" name="correo" id="correo" value= "<?php echo ($datos["usu_correo"]); ?>" placeholder="Correo">
                <span id="mensajeCorreo" class="error"></span>



                <input type="submit" value="Guardar" class="btn_save">
                <span id="mensajeCorreo" class="error"></span>
                
			</form>
        </div>
        <br>
        <div class="form_update_password">
			<h1>Cambiar Contraseña</h1>
            <hr>
            <div class="alert"><?php echo isset($alert2) ? $alert2 :'';?></div>
            <form action="" method="POST">
            <input type="hidden" name="alte" id="alte" value="pass">
            <input type="hidden" name="usu_codigo" id="usu_codigo" value="<?php echo ($datos["usu_codigo"]); ?>">
				<label for="nuevaContrasena">Nueva Contraseña</label>
                <input type="password" name="nuevaContrasena" id="nuevaContrasena" placeholder="Nueva Contraseña"
                
                />


                <label for="confirmarContrasena">Confirmar Contraseña</label>
                <input type="password" name="confirmarContrasena" id="confirmarContrasena" placeholder="Confirmar Contraseña"
                        
                />
                


                <input type="submit" value="Guardar" class="btn_save" >
			</form>
		</div>
	</section>
</body>
</html>

index.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<?php include "../controladores/scripts.php";?>
	<title>Sistema Ventas</title>
</head>
<body>
<?php include "../controladores/header.php";?>
	<section id="container">
		<h1>Bienvenido al sistema</h1>
	</section>
</body>
</html>

lista_calificaciones.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title> Lista de Categorias</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-boxes"></i> Lista de Comentario</h1>
        

        <table>
            <thead>
                <tr>
                     <th>Codigo</th>
                    <th>Producto</th>
                    <th>Valor de Estrella</th>
                    <th>Comentarios</th>
                
                 
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT cali_codigo, pro_nombre,cali_valor,cali_comentario FROM Calificaciones c,Producto p 
WHERE c.pro_codigo=p.pro_codigo;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        
        echo "<td>" . $row["cali_codigo"] . "</td>";
        echo "<td>" . $row["pro_nombre"] . "</td>";
        echo "<td>" . $row["cali_valor"] . "</td>";
        echo "<td>" . $row["cali_comentario"] . "</td>";

        $user = serialize($row);
        $user = urlencode($user);

        echo '<td>
        <a class="link_delete" href="confirmar_eliminar_comentario.php?comentario_codigo=' 
        . $row["cali_codigo"] . '"><i class="fas fa-trash-alt"></i> Delete </a> <br>
        </td>';
    

    echo "</tr>";
    
    }
} else {
    echo "<tr>";
    echo '<td colspan="3" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>
lista_categoria_eliminadas.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title> Lista de Categorias Eliminadas</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-boxes"></i> Lista de Categorias Eliminadas</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por nombre" onkeyup="buscar(this, 'categoriaEliminada')">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT * FROM Categoria WHERE cate_eliminado='S'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["cate_codigo"] . "</td>";
        echo "<td>" . $row["cate_nombre"] . "</td>";

        $user = serialize($row);
        $user = urlencode($user);
            echo '<td>
            <a class="link_activar" href="confirmar_activar_categoria.php?cate_codigo=' . $row["cate_codigo"] . '"><i class="fas fa-trash-restore-alt"></i> Activar</a> <br>
            </td>';
        

        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="3" class="db_null"><p>No existen Categorias Eliminadas</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>
lista_categoria.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title> Lista de Categorias</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-boxes"></i> Lista de Categorias</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por nombre" onkeyup="buscar(this, 'categoria')">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT * FROM Categoria WHERE cate_eliminado='N'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["cate_codigo"] . "</td>";
        echo "<td>" . $row["cate_nombre"] . "</td>";

        $user = serialize($row);
        $user = urlencode($user);
            echo '<td>
            <a class="link_delete" href="confirmar_eliminar_categoria.php?cate_codigo=' . $row["cate_codigo"] . '"><i class="fas fa-trash-alt"></i> Delete </a> <br>
            </td>';
        

        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="3" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>

lista_facturas.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title> Lista de Pedidos</title>
    <script src="gene.js"></script>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-archive"></i> Lista de Pedidos</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por # Factura" onkeyup="buscar(this, 'index')">
        </form>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Fecha / Hora</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th class="textrigth">Total Factura</th>
                    <th class="textrigth">Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT f.fac_codigo,f.fac_fecha, f.fac_total,f.fac_estado, u.usu_nombres,f.usu_codigo , u.usu_apellidos FROM Factura f INNER JOIN Usuario u ON f.usu_codigo= u.usu_codigo AND f.fac_eliminado='N'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($row["fac_estado"]=='creado'){
            $estado='<span class="creado">Creada</span>';
        }elseif($row["fac_estado"]=='Aceptado'){
            $estado='<span class="aceptado">Aceptado</span>';
        }elseif($row["fac_estado"]=='EnCamino'){
            $estado='<span class="EnCamino">En Camino</span>';
        }elseif($row["fac_estado"]=='Finalizada'){
            $estado='<span class="finalizada"> Finalizada</span>';
        }elseif($row["fac_estado"]=='Rechazada'){
            $estado='<span class="rechazada"> Rechazada</span>';
        }
        echo "<tr id=".$row["fac_codigo"].">";
        echo "<td>" . $row["fac_codigo"] . "</td>";
        echo "<td>" . $row["fac_fecha"] . "</td>";
        echo "<td>" . $row["usu_nombres"] .' '.$row["usu_apellidos"]. "</td>";
        echo "<td>" . $estado . "</td>";
        echo "<td>$ " . $row["fac_total"] . "</td>";
        echo '<td>
        <button onclick="generarFactura('. $row["usu_codigo"] .','.$row["fac_codigo"].')"><i class="fas fa-eye"></i> Ver</button>
        <a class="link_delete" href="confirmar_anular_factura.php?fac_codigo='.$row["fac_codigo"].'"><i class="fas fa-minus-circle"></i> Anular </a> <br>
        </td>';
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="6" class="db_null"><p>No existen Facturas</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>

lista_pedido.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title>Lista de Productos</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-pallet"></i> Lista de Productos</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por Nombre" onkeyup="buscar(this, 'producto')">
        <input type="submit" value="Buscar" class="btn_search">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php

include '../config/conexionDB.php';
$sql = "SELECT p.pro_codigo,c.cate_nombre, p.pro_nombre , p.pro_img FROM Producto p INNER JOIN Categoria c ON p.cate_codigo = c.cate_codigo WHERE p.pro_eliminado='N'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($row["pro_img"]!="img_producto.png"){
            $foto='../img/uploads/'.$row["pro_img"];

        }else{
            $foto='../img/'.$row["pro_img"];
        }
        echo "<tr>";
        echo "<td>" . $row["pro_codigo"] . "</td>";
        echo "<td>" . $row["cate_nombre"] . "</td>";
        echo "<td>" . $row["pro_nombre"] . "</td>";
        echo "<td><img class='img_producto'src=" . $foto . " alt=".$row["cate_nombre"]."></td>";
        echo '<td>
        <a class="link_add" href="agregar_cantidad_producto.php?producto=' . $row["pro_codigo"] . '"><i class="fas fa-plus-square"></i> Agregar</a> <br>
        <a class="link_edit" href="editar_producto.php?producto=' .$row["pro_codigo"] . '"><i class="far fa-edit"></i> Editar</a> <br>
        <a class="link_delete" href="confirmar_eliminar_producto.php?pro_codigo=' . $row["pro_codigo"] . '"><i class="fas fa-trash-alt"></i> Eliminar </a> <br>
        </td>';
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="5" class="db_null"><p>No existen productos registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>

lista_productos.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title>Lista de Productos</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-pallet"></i> Lista de Productos</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por Nombre" onkeyup="buscar(this, 'producto')">
        <input type="submit" value="Buscar" class="btn_search">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php

include '../config/conexionDB.php';
$sql = "SELECT p.pro_codigo,c.cate_nombre, p.pro_nombre , p.pro_img FROM Producto p INNER JOIN Categoria c ON p.cate_codigo = c.cate_codigo WHERE p.pro_eliminado='N'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($row["pro_img"]!="img_producto.png"){
            $foto='../img/uploads/'.$row["pro_img"];

        }else{
            $foto='../img/'.$row["pro_img"];
        }
        echo "<tr>";
        echo "<td>" . $row["pro_codigo"] . "</td>";
        echo "<td>" . $row["cate_nombre"] . "</td>";
        echo "<td>" . $row["pro_nombre"] . "</td>";
        echo "<td><img class='img_producto'src=" . $foto . " alt=".$row["cate_nombre"]."></td>";
        echo '<td>
        <a class="link_add" href="agregar_cantidad_producto.php?producto=' . $row["pro_codigo"] . '"><i class="fas fa-plus-square"></i> Agregar</a> <br>
        <a class="link_edit" href="editar_producto.php?producto=' .$row["pro_codigo"] . '"><i class="far fa-edit"></i> Editar</a> <br>
        <a class="link_delete" href="confirmar_eliminar_producto.php?pro_codigo=' . $row["pro_codigo"] . '"><i class="fas fa-trash-alt"></i> Eliminar </a> <br>
        </td>';
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="5" class="db_null"><p>No existen productos registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>

lista_users_activos.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title> Lista de Usuarios</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-user-check"></i> Lista de Usuarios Activos</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por cedula" onkeyup="buscar(this, 'index')">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Cedula</th>
                    <th>Rol</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Fecha de Creacion</th>
                    <th>Fecha de Modificacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT * FROM Usuario WHERE usu_eliminado='N'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["usu_codigo"] . "</td>";
        echo "<td>" . $row["usu_cedula"] . "</td>";
        echo "<td>" . $row["usu_rol"] . "</td>";
        echo "<td>" . $row["usu_nombres"] . "</td>";
        echo "<td>" . $row["usu_apellidos"] . "</td>";
        echo "<td>" . $row["usu_fecha_nacimiento"] . "</td>";
        echo "<td>" . $row["usu_telefono"] . "</td>";
        echo "<td>" . $row["usu_correo"] . "</td>";
        echo "<td>" . $row["usu_fecha_creacion"] . "</td>";
        echo "<td>" . $row["usu_fecha_modificacion"] . "</td>";
        $user = serialize($row);
        $user = urlencode($user);
        if($row["usu_codigo"]!=1){
            echo '<td>
            <a class="link_edit" href="editar_usuario.php?user=' . $user . '"><i class="fas fa-user-edit"></i> Edit </a> <br>
            <a class="link_delete" href="confirmar_eliminar_user.php?usu_codigo=' . $row["usu_codigo"] . '"><i class="fas fa-trash-alt"></i> Delete </a> <br>
            </td>';
        }else{
            echo '<td>
            <a class="link_edit" href="editar_usuario.php?user=' . $user . '"><i class="fas fa-user-edit"></i> Edit </a> <br>
            </td>';   
        }

        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="12" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>
lista_users_eliminados.php

<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title> Lista de Usuarios</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-user-minus"></i> Lista de Usuarios Inactivos</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por cedula" onkeyup="buscar(this, 'eliminado')">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Cedula</th>
                    <th>Rol</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Fecha de Creacion</th>
                    <th>Fecha de Modificacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT * FROM Usuario WHERE usu_eliminado='S'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["usu_codigo"] . "</td>";
        echo "<td>" . $row["usu_cedula"] . "</td>";
        echo "<td>" . $row["usu_rol"] . "</td>";
        echo "<td>" . $row["usu_nombres"] . "</td>";
        echo "<td>" . $row["usu_apellidos"] . "</td>";
        echo "<td>" . $row["usu_fecha_nacimiento"] . "</td>";
        echo "<td>" . $row["usu_telefono"] . "</td>";
        echo "<td>" . $row["usu_correo"] . "</td>";
        echo "<td>" . $row["usu_fecha_creacion"] . "</td>";
        echo "<td>" . $row["usu_fecha_modificacion"] . "</td>";
        $user = serialize($row);
        $user = urlencode($user);
       
            echo '<td>
            <a class="link_activar" href="confirmar_activar_user.php?usu_codigo=' . $row["usu_codigo"] . '"><i class="fas fa-trash-restore-alt"></i> Activar </a> <br>
            </td>';
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="12" class="db_null"><p>No existen usuarios registrados en el sistema</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
    </section>

</body>

</html>

login_admin.php

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script type="text/javascript" src="../js/funcionesAdmin.js"></script>
</head>
<body>
    <section id="container">
    <form method="POST" action="../controladores/validar_login.php">
    <h3>AMDIN PANEL</h3>
<img src="../img/usu_login.png" alt="adminLogin">
<span class="error" id="errorEmail"></span>
    <input type="text" name="correo" id= "correo "placeholder="Correo Corporativo" onkeyup="validarCorreo('errorEmail',this)">
    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña">
    <input type="submit" value="INGRESAR">
    </form>
    </section>
</body>
</html>

pedido.php
<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: admin_login.php");
} 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include "../controladores/scripts.php"; ?>
    <title> Lista de Pedidos</title>
</head>

<body>
    <?php include "../controladores/header.php"; ?>
    <section id="container">
        <h1><i class="fas fa-th-list"></i> Lista de Pedidos</h1>
        <form action="" method="GET" class="form_search">
        <input type="search" id="busqueda" placeholder="Buscar por # Factura" onkeyup="buscar(this, 'index')">
        </form>
        <div id="floatWindow">
                                <div class="contentMap">
                                    <i class="fas fa-times" onclick="cluseWindow()"></i>
                                    <div id="map"></div>
                                </div>
                            </div>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Fecha / Hora</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th class="textrigth">Acciones</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
include '../config/conexionDB.php';
$sql = "SELECT f.fac_codigo,f.fac_fecha, f.fac_total,f.fac_estado, u.usu_nombres , u.usu_apellidos FROM Factura f INNER JOIN Usuario u ON f.usu_codigo= u.usu_codigo";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($row["fac_estado"]=='creado'){
            $estado='<span class="creado">Creada</span>';
        }elseif($row["fac_estado"]=='Aceptado'){
            $estado='<span class="aceptado">Aceptado</span>';
        }elseif($row["fac_estado"]=='EnCamino'){
            $estado='<span class="EnCamino">En Camino</span>';
        }elseif($row["fac_estado"]=='Finalizada'){
            $estado='<span class="finalizada"> Finalizada</span>';
        }elseif($row["fac_estado"]=='Rechazada'){
            $estado='<span class="rechazada"> Rechazada</span>';
        }
        echo "<tr id=".$row["fac_codigo"].">";
        echo "<td>" . $row["fac_codigo"] . "</td>";
        echo "<td>" . $row["fac_fecha"] . "</td>";
        echo "<td>" . $row["usu_nombres"] .' '.$row["usu_apellidos"]. "</td>";
        echo "<td>" . $estado . "</td>";
        echo '<td>
        <button onclick="mapDirection('. $row["fac_codigo"] .')"><i class="fas fa-map-marked-alt"></i> Generar Ruta</button>
    
        <a class="link_delete" href="confirmar_anular_factura.php?fac_codigo="><i class="fas fa-edit"></i> Cambiar Estado </a> <br>
        </td>';
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo '<td colspan="12" class="db_null"><p>No Existen Pedidos</p><i class="fas fa-exclamation-circle"></i></td>';
    echo "</tr>";
}
$conn->close();
?>

            </tbody>
        </table>
        <div id="mapDir">
                                    <input id="start" type="hidden" name="" value="Gualaceo">
                                    <input id="end" type="hidden" name="" value="Cuenca">
                                </div>
    </section>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf5KFvi9htNXOs4ov2TmNyxEonww9rAVM&callback=initMap">
    </script>
    <script src="map.js"></script>

</body>

</html>

traza_ruta.php

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions Service</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto', 'sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
    </style>
</head>

<body>
    <div id="floating-panel">
        <b>Start: </b>
        <select id="start">
      <option value="Chiguauh,El Dorado, Cuenca, Ecuador">Cuenca</option>
      <option value="st louis, mo">St Louis</option>
      <option value="joplin, mo">Joplin, MO</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option>
    </select>
        <b>End: </b>
        <select id="end">
      <option value="chicago, il">Chicago</option>
      <option value="st louis, mo">St Louis</option>
      <option value="joplin, mo">Joplin, MO</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="Calle 10 de Agosto, Calle Rivera, Azogues, Ecuador">Azogues</option>
    </select>
    </div>
    <div id="map"></div>
    <script>
        function initMap() {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {
                    lat: 41.85,
                    lng: -87.65
                }
            });
            directionsDisplay.setMap(map);

            var onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            };
            document.getElementById('start').addEventListener('change', onChangeHandler);
            document.getElementById('end').addEventListener('change', onChangeHandler);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            directionsService.route({
                origin: document.getElementById('start').value,
                destination: document.getElementById('end').value,
                travelMode: 'DRIVING'
            }, function(response, status) {
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf5KFvi9htNXOs4ov2TmNyxEonww9rAVM&callback=initMap">
    </script>
</body>

</html>


Parte del Usuario

footerPublic.php
<div class="content">
    <div class="listFooter">
        <h3>Categorias</h3>
        <ul>
            <li><a href="#">Industriales</a></li>
            <li><a href="#">Hidraulicas</a></li>
            <li><a href="#">Alta Temperatura</a></li>
        </ul>
    </div>
    <div class="infoFooter">
        <p>Copyright &copy; 2019 Todos los derechos reservados</p>
    </div>
</div>

footerPublicUser.php

<div class="content">
    <div class="listFooter">
        <h3>Categorias</h3>
        <ul>
            <li><a href="#">Industriales</a></li>
            <li><a href="#">Hidraulicas</a></li>
            <li><a href="#">Alta Temperatura</a></li>

        </ul>
    </div>

    <div class="infoFooter">
        <p>Copyright &copy; 2019 Todos los derechos reservados</p>
        <p>Designed by Group 5</p>
    </div>
</div>
}

headerPublic.php

<script src="../js/funciones.js"></script>
<a href="index.php"><img src="../../img/banner-imi.png" id="imagenPri" alt="ImportManguerasIV" /></a>

<div class="content">
    <div class="sessionItems">
        <?php
        if (isset($_SESSION['isLogin'])) {  
            ?>
        <a href="../../index.php"></a>
        <nav class="menu">
            <ul>
                <li><a href="../../index.php"><img id="iconmenu" src="../../img/icon1.png">INICIO</a></li>
                <li><a href="nosotros.php"><img id="iconmenu" src="../../img/icon2.png"> NOSOTROS</a></li>
                <li> <span><img id="iconmenu" src="../../img/icon3.png"> PRODUCTOS</span>
                    <ul>
                        <li><a href="categoria.php?categoria=10">Industriales</a></li>
                        <li><a href="categoria.php?categoria=11">Hidraulicas</a></li>
                        <li><a href="categoria.php?categoria=12">Alta Temperatura</a></li>
                    </ul>
                </li>
                <li><a href="../../public/view/contacto.php"><img id="iconmenu" src="../../img/icon4.png"> CONTACTOS
                    </a></li>
            </ul>
        </nav>
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
                        <li><a href="../../admin/user/view/index.php">Mi Cuenta</a>
                        </li>
                        <li><a href="../../admin/user/view/shoppinghistory.php">Pedidos</a>
                        </li>
                        <li><a href="../../admin/user/view/settings.php">Configuraciones</a></li>
                        <li><a href="../../config/signout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <?php
    } else {
        ?>
        <a href="../../index.php"></a>
        <nav class="menu">
            <ul>
                <li><a href="../../index.php"><img id="iconmenu" src="../../img/icon1.png">INICIO</a></li>
                <li><a href="nosotros.php"><img id="iconmenu" src="../../img/icon2.png"> NOSOTROS</a></li>
                <li> <span><img id="iconmenu" src="../../img/icon3.png"> PRODUCTOS</span>
                    <ul>
                        <li><a href="categoria.php?categoria=10">Industriales</a></li>
                        <li><a href="categoria.php?categoria=11">Hidraulicas</a></li>
                        <li><a href="categoria.php?categoria=12">Alta Temperatura</a></li>
                    </ul>
                </li>
                <li><a href="../../public/view/contacto.php"><img id="iconmenu" src="../../img/icon4.png"> CONTACTOS
                    </a></li>
                <li><a href="login.php"><img id="iconmenu" src="../../img/icon5.png"> LOGIN</a></li>
                <li><a href="signup.php"> <img id="iconmenu" src="../../img/icon6.png"> REGISTRATE</a></li>

            </ul>
        </nav>
        <?php
    }
    ?>

    </div>
</div>

headerPublicUser.php
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

headerUser.php
<div class="perfil">
    <div class="img">
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

cart_Add.php
<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    }
}
if (isset($_GET['codProd'])&&isset($_SESSION['isLogin'])) {

    include '../../config/configDB.php';
    /*$sql = "SELECT * FROM carrito WHERE 
    PRODUCTO_pro_id=" . $_GET['codProd'] . " AND
    USUARIO_usu_id=" . $_SESSION['codigo'] . " AND
    SUCURSAL_suc_id=" . $_GET['storeID'] . ";";*/
    $sql = "SELECT * FROM carrito WHERE 
    PRODUCTO_pro_id=" . $_GET['codProd'] . " AND
    USUARIO_usu_id=" . $_SESSION['codigo'] . " ;";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cantidad = $row['car_cantidad'] + 1;
        $sql = "UPDATE carrito SET
        car_cantidad ='$cantidad'
        WHERE car_id=" . $row['car_id'] . ";";
        if ($conn->query($sql)) {
            ?>
<div class="cartAdd" id="cartAdd">
    <p>Producto agregado al carrito.</p>
    <i class=" fas fa-times" onclick="cluseWindowCart()"></i>
</div>
<?php
    } else {
        ?>
<div class="cartAdd" id="cartAdd" style="background-color: #FF6565;">
    <p>No se agregado al carrito.</p>
    <i class=" fas fa-times" style="color: #FFF;" onclick="cluseWindowCart()"></i>
</div>
<?php
    }
} else {
    $sql = "INSERT INTO carrito VALUES (0," . $_GET['codProd'] . "," . $_SESSION['codigo'] . ",1 );";

    if ($conn->query($sql)) {
        ?>
<div class="cartAdd" id="cartAdd">
    <p>Producto agregado al carrito. </p>
    <i class=" fas fa-times" onclick="cluseWindowCart()"></i>
</div>
<?php
    } else {
        ?>
<div class="cartAdd" id="cartAdd" style="background-color: #FF6565;">
    <p>No se agregado al carrito. </p>
    <i class=" fas fa-times" style="color: #FFF;" onclick="cluseWindowCart()"></i>
</div>
<?php
    }
}
}

cartRemove.php
<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    }
}

if (isset($_GET['carId'])) {
    include '../../config/configDB.php';
    $sql = "SELECT * FROM carrito WHERE 
    car_id=" . $_GET['carId'] . ";";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['car_cantidad'] > 1) {
        $cantidad = $row['car_cantidad'] - 1;
        $sql = "UPDATE carrito SET
                    car_cantidad ='$cantidad'
                    WHERE car_id=" . $_GET['carId'] . ";";
        $conn->query($sql);
        writeContent();
    } elseif ($row['car_cantidad'] <= 1) {
        $sqlDropCart = "DELETE FROM carrito WHERE car_id=" . $_GET['carId'] . ";";
        $conn->query($sqlDropCart);
        writeContent();
    }
} else {
    header("Location: ../view/shopingcart.php");
}

function writeContent()
{
    include '../../config/configDB.php';
    $sql = "SELECT * FROM carrito WHERE
            USUARIO_usu_id=" . $_SESSION['codigo'] . ";";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sqlP = "SELECT * FROM carrito c, Producto p WHERE
            c.USUARIO_usu_id=" . $_SESSION['codigo'] . " AND
            p.pro_codigo=" . $row['PRODUCTO_pro_id'] . "
            GROUP BY 1;";

            $resultP = $conn->query($sqlP);
            $rowP = $resultP->fetch_assoc();
            ?>

<article>
    <div class="cartImg">
        <img src="../../adminPanel/img/uploads/<?php echo $rowP['pro_img']; ?>"
            alt="<?php echo $rowP['pro_nombre'] ?>">
    </div>
    <div class="cartDescription">
        <h2><?php echo $rowP['pro_nombre'] ?></h2>
        <h3>Descripcion</h3>
        <p><?php echo $rowP['pro_descripcion'] ?></p>
        <div class="inf">
            
            <div>
                <h3>Cantidad:</h3>
                <span><?php echo $row['car_cantidad'] ?></span>
            </div>
        </div>
    </div>
    <span>$<?php echo $rowP['pro_precio'] ?></span>
    <i class="fas fa-times" onclick="cartDelete(<?php echo $row['car_id'] ?>)"></i>
</article>

<?php

    }
} else {
    echo '<h2 style="color: #FF6565">No hay productos.</h2>';
}
}

login.php
<?php
session_start();
/*if (isset($_SESSION['isLogin'])) {
    header("Location: ../../index.php");
}*/
include '../../config/configDB.php';
$email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
$pass = isset($_POST["pass"]) ? trim($_POST["pass"]) : null;
$sql = "SELECT * FROM Usuario WHERE usu_correo ='$email' AND usu_password = MD5('$pass')";

$result = $conn->query($sql);
$result2 = $conn->query($sql);
$rowUsuario = mysqli_fetch_assoc($result2);

$id = $rowUsuario['usu_codigo'];
$eliminado = $rowUsuario['usu_eliminado'];
$rol = $rowUsuario['usu_rol'];
//$img = $rowUsuario['img_nombre'];
$nombres = $rowUsuario["usu_nombres"];
$apellidos = $rowUsuario["usu_apellidos"];
$correo = $rowUsuario["usu_correo"];

if ($eliminado == 'S') {

    echo "<p>Has sido eliminado por los administradores</p>";
} else {

    if ($result->num_rows > 0 && $rol == "admin") {
        session_start();
        $_SESSION['codigo'] = $id;
        $_SESSION['isLogin'] = true;
        $_SESSION["rol"] = "admin";
        $_SESSION['img'] = $img;
        $_SESSION['nombre'] = $nombres;
        $_SESSION['apellido'] = $apellidos;
        header("Location: ../../admin/admin/view/index.php");
    } else if ($result->num_rows > 0 && $rol == "user") {
        session_start();
        $_SESSION['codigo'] = $id;
        $_SESSION['isLogin'] = true;
        $_SESSION["rol"] = "user";
       // $_SESSION['img'] = $img;
        $_SESSION['nombre'] = $nombres;
        $_SESSION['apellido'] = $apellidos;
        header("Location: ../view/successful.php?login=true&delete=" . $rowUsuario['usu_eliminado'] . "");
    } else {
        header("Location: ../view/successful.php?login=false");
    }
}


/*if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    $_SESSION['codigo'] = $user["usu_id"];
    $_SESSION['nombre'] = $user["usu_nombres"];
    $_SESSION['apellido'] = $user["usu_apellidos"];
    $_SESSION['correo'] = $user["usu_correo"];
    $_SESSION['img'] = $user["img_nombre"];
    $_SESSION['rol'] = $user["usu_rol"];

    header("Location: ../view/successful.php?login=true");
} else {

    header("Location: ../view/successful.php?login=false");
} */

$conn->close();

payments.php

<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    }
} else {
    header("Location: ../view/index.php");
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
    <title>Successful4</title>
</head>

<body>
    <header>
        <?php
        //echo (getcwd());
        include("../../global/php/headerPublic.php");
        ?>
    </header>

    <div class="headerImg pageError pageSuccess">
        <?php
        include '../../config/configDB.php';

        $cardNumber = isset($_POST["numbreCard"]) ? trim($_POST["numbreCard"]) : null;
        $dateCard = isset($_POST["dateCard"]) ? trim($_POST["dateCard"]) : null;
        $cvcCard = isset($_POST["cvcCard"]) ? trim($_POST["cvcCard"]) : null;
        $nameCard = isset($_POST["nameCard"]) ? mb_strtolower(trim($_POST["nameCard"]), 'UTF-8') : null;
        $countryCard = isset($_POST["countryCard"]) ? mb_strtolower(trim($_POST["countryCard"]), 'UTF-8') : null;
        $date = date(date("Y-m-d H:i:s"));

        //echo 'NUMERO DE TARJETA' . $cardNumber . '<br>';

        $sql = "SELECT * FROM Tarjeta WHERE
            usu_codigo=" . $_SESSION['codigo'] . ";";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sqlCard = "UPDATE Tarjeta SET
            tar_nombreU='$nameCard',
            tar_numero='$cardNumber',
            tar_fechaVen='$dateCard',
            tar_cvv='$cvcCard',
            tar_pais='$countryCard'
            WHERE tar_codigo=" . $row['tar_codigo'] . ";";
        } else {
            $sqlCard = "INSERT INTO Tarjeta  VALUES (0, " . $_SESSION['codigo'] . ",'$cardNumber','$dateCard', '$nameCard',
        '$cvcCard','MasterCard','$countryCard');";
        }
        if ($conn->query($sqlCard)) {

            $sqlCart = "SELECT * FROM carrito WHERE
                        USUARIO_usu_id=" . $_SESSION['codigo'] . ";";

            $resultCart = $conn->query($sqlCart);
            //echo 'Datos del carrito. ' . $resultCart->num_rows;
            if ($resultCart->num_rows > 0) {

                $sqlTarUsu = "SELECT * FROM Tarjeta WHERE
                                usu_codigo=" . $_SESSION['codigo'] . ";";
                $sqlTarUsu = $conn->query($sqlTarUsu);
                $sqlTarUsu = $sqlTarUsu->fetch_assoc();
                $cardUser = $sqlTarUsu['tar_codigo'];
                //echo 'Tarjeta usuario' . $cardUser;

                $sqlSubTot = "SELECT SUM(c.car_cantidad*(p.pro_precio)) AS sub_total FROM carrito c, Producto p WHERE 
                        c.PRODUCTO_pro_id = p.pro_codigo AND 
                        c.USUARIO_usu_id = " . $_SESSION['codigo'] . ";";
                $sqlSubTot = $conn->query($sqlSubTot);
                $subTot = $sqlSubTot->fetch_assoc();
                $subTotal = round($subTot['sub_total'], 2);
                $subIva=round($subTotal*0.12);
                // echo 'SUBTOTAL: ' . $subTotal . '<br>';
                $total = round(($subTotal * 1.12));
                // echo 'TOTAL: ' . $total . '<br>';

                $sqlCabFact = "INSERT INTO Factura VALUES ( 0, " . $_SESSION['codigo'] . ",'$date', 
                        $subTotal, 
                        $subIva,
                        $total,
                        'Tarjeta', 
                        $cardUser,'N','creado'
                        );";
                echo"$sqlCabFact";
                //echo 'Codigo de la cabecera.' . $codigoNewFacCab;

                if ($conn->query($sqlCabFact)) {
                    $sql = "SELECT MAX(fac_codigo) AS codigo  
                    FROM Factura;";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $codigoNewFacCab = ($row['codigo']);

                    while ($rowCart = $resultCart->fetch_assoc()) {

                        $sqlDetFact = "INSERT INTO FacturaDetalle VALUES ( 0, " . $rowCart['PRODUCTO_pro_id'] . ",
                                " . $rowCart['car_cantidad'] . ", 
                                '$codigoNewFacCab');";

                        if ($conn->query($sqlDetFact)) {
                            

                            $sqlDropCart = "DELETE FROM carrito WHERE USUARIO_usu_id =" . $_SESSION['codigo'] . ";";
                            $conn->query($sqlDropCart);


                            //echo 'Detalle agregado stok en: ' . $rowStok . '<br>';
                        } else {
                            ?>
        <div class="contentSucce">
            <h2>Error al agregar los datos en el.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <button onclick="window.location.href = '../view/shoppingcart.php'">Inicio</button>
        </div>
        <?php
                    }
                }

                $conn->close();
                ?>
        <div class="contentSucce">
            <h2>Pago realizado con exito</h2>
            <p>Gracias por su compra..</p>
            <i class="far fa-check-circle"></i>
            <button onclick="window.location.href = '../view/index.php'">Inicio</button>
        </div>
        <?php
            } else {
                ?>
        <div class="contentSucce">
            <h2>Error al agregar los datos.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <button onclick="window.location.href = '../view/shoppingcart.php'">Inicio</button>
        </div>
        <?php
                //echo 'error al introducir la cabecera';
                //echo mysqli_error($conn);
            }
        } else {
            ?>
        <div class="contentSucce">
            <h2>Error al agregar los datos.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <button onclick="window.location.href = '../view/shoppingcart.php'">Inicio</button>
        </div>
        <?php
        }
    } else {
        ?>
        <div class="contentSucce">
            <h2>La tarjeta no es correcta.</h2>
            <p>Intente de nuevo...</p>
            <i class="far fa-times-circle"></i>
            <button onclick="window.location.href = '../view/shoppingcart.php'">Inicio</button>
        </div>
        <?php
    }
    ?>

    </div>
    <footer>
        <?php
        //echo (getcwd());
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>
</body>

</html>

signup.php

<?php
session_start();
if (isset($_SESSION['isLogin'])) {
   /* if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    } else {
        //header("Location: ../../index.php");
    }*/
    header("Location: ../../index.php");
}
include '../../config/configDB.php';

$nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
$apellido = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
$fecha = $_POST["fechaNac"];
$email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
$date = date(date("Y-m-d H:i:s"));
$pass=$_POST["pass"];

$sql = "INSERT INTO Usuario  VALUES ( 0,'$cedula','user',
    '$nombre', '$apellido','$fecha','$telefono', '$email', MD5('$pass'),'N','$date',null);";

if ($conn->query($sql) == true) {
    header("Location: ../view/successful.php?register=true");
} else {
    if ($conn->errno == 1062) {
        header("Location: ../view/successful.php?register=false&error=1062");
    } else {
        echo mysqli_error($conn);
        header("Location: ../view/successful.php?register=false&error=" . mysqli_error($conn));
    }
}
$conn->close();
?>  


updateNotCart.php
<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    }
}
include '../../config/configDB.php';
$sql = "SELECT SUM(car_cantidad) AS car_cantidad FROM carrito WHERE 
    USUARIO_usu_id=" . $_SESSION['codigo'] . ";";
$result = $conn->query($sql);
$res = $result->fetch_assoc();
if ($res['car_cantidad'] > 0) {
    echo '<span>' . $res['car_cantidad'] . '</span>';
}

updatePrice.php
<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['rol'] == 'admin') {
        header("Location: ../../admin/admin/view/index.php");
    }
}
include '../../config/configDB.php';
$sqlSubTot = "SELECT SUM(c.car_cantidad*(p.pro_precio)) AS sub_total FROM carrito c, Producto p WHERE 
                c.PRODUCTO_pro_id = p.pro_codigo AND 
                c.USUARIO_usu_id = " . $_SESSION['codigo'] . ";";

$sqlSubTot = $conn->query($sqlSubTot);
$subTot = $sqlSubTot->fetch_assoc();
$subTotal = $subTot['sub_total'];
$total = $subTotal + ($subTotal * 1.12);

?>
<h2>Detalle</h2>
<div class="price">
    <p><span>Sub-Total: </span>$<?php echo $subTotal ?></p>
    <p><span>IVA: </span>12%</p>
    <p><span>Total: </span>$<?php echo $total ?></p>
</div>
<?php
if ($subTotal > 0) {
    ?>
<div class="btns">
    <button onclick="openWindow()">
        <i class="far fa-credit-card"></i> Tarjeta
    </button>
</div>
<?php
}
?>

buscar.php
<?php
session_start();
if (isset($_SESSION['isLogin'])) {
}
?>

<?php

 include '../../config/configDB.php';     

if ($_GET != '') {
    $sql = "SELECT * FROM Producto  WHERE pro_nombre LIKE '" . $_GET['key'] . "%'";
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
        }
            $conn->close();
?>

categoria.php
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
                 GROUP BY pro.pro_codigo ORDER BY 1 DESC limit 10;";

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

contacto.php
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
    <title>Contacto</title>
    <link rel="stylesheet" href="../css/globalStyle.css">
    <link rel="stylesheet" href="../css/generalStyle.css">

</head>

<body>

    <header>

        <?php
        include_once("../../global/php/headerPublic.php");
        ?>

    </header>
    <br>
    <br>
    <br>
    <center>
        <section class="columna1">
            <h1 id="localM">&#128205;LOCALIZACION :</h1>
            <br>
            <iframe id="mapa"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.720758876699!2d-78.99957548518545!3d-2.8966001978901956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd1816254c84e9%3A0x5453d59aeec7e540!2sImport%20Mangueras%20Idrovo!5e0!3m2!1ses!2sec!4v1574872033881!5m2!1ses!2sec"
                width="90%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

        </section>
    </center>

    <br>
    <br>
    <br>
    <center>
        <section class="columna22">
            <h2 id="Contactanos"> &#128222 Contactanos :</h2>
            <br>
            <form id="formularioc" action="../controladores/enviar2.php" method="POST">
                <br>
                <label for="nomrbes" id="nombreslabel">Ingrese su nombre:</label>
                <input type="text" id="nombres" name="name" required="required"
                    placeholder="Ingrese su nombre completo" />
                <br>
                <br>
                <label for="correo" id="nombreslabel">Ingrese su correo :</label>
                <input type="email" id="nombres" name="email" required="required" placeholder="Ingrese su correo" />
                <br>
                <br>
                <textarea type="text" name="message" rows="15" cols="40">Escribe aquí tus comentarios</textarea>
                <br>
                <center><input type="submit" class="enviar" id="enviar" name="enviar" value="Enviar" /></center>
            </form>
            <br>
        </section>
        <center>

            <br>
            <br>
            <footer>
                <?php
        include("../../global/php/footerPublic.php");
        ?>
            </footer>

</body>

</html>
index.php
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

login.php
<?php
session_start();
if (isset($_SESSION['isLogin'])) {
        header("Location:index.php"); 
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
    <title>Login</title>
</head>

<body>
    <header>
        <?php
        include("../../global/php/headerPublic.php");
        ?>
    </header>

    <div class="content">
        <div class="form">
            <form action="../controller/login.php" method="post">
                <h2>IMPORTMANGUERAS</h2>
                <p>Bienvenido! Por favor, ingrese sus datos.</p>
                <input type="email" name="email" id="email" placeholder="Correo" required>
                <input type="password" name="pass" id="pass" placeholder="Contraseña" required>
                <div class="btns">
                    <input type="submit" value="Iniciar Sesión">
                    <input type="button" value="Registro" onclick="window.location.href = 'signup.php'">
                </div>
            </form>
        </div>
    </div>

    <footer>
        <?php
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>
nosotros.php
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

product.php
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

shoppingcart.php

<?php
session_start();
if (isset($_SESSION['isLogin'])) {

} else {
    header("Location:index.php");
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
    <title>Carrito</title>
</head>

<body>
    <header>
        <?php
        include("../../global/php/headerPublic.php");
        ?>
    </header>

    <div id="floatWindow">
        <div class="contentWindow" id="payWindow">
            <div class="form">
                <form action="../controller/payments.php" method="post">
                    <h2>Pagar con tarjeta</h2>
                    <p>Introdisca los datos de su tarjeta</p>
                    <input type="text" name="numbreCard" id="numbreCard" placeholder="1234 1234 1234 1234" required>
                    <div class="nombres">
                        <input type="text" name="dateCard" id="dateCard" placeholder="MM/YY" required>
                        <input type="text" name="cvcCard" id="cvcCard" placeholder="CVC" required>
                    </div>

                    <input type="text" name="nameCard" id="nameCard" placeholder="Nombre del propietario" required>
                    <input type="text" name="countryCard" id="countryCard" placeholder="Pais" required>
                    <div class="btns">
                        <input type="submit" value="Pagar">
                    </div>
                </form>
            </div>
            <i class=" fas fa-times" onclick="cluseWindow()"></i>
        </div>

    </div>

    <div class="content">
        <section class="product">
            <div class="productSlide cart" id="cart">

                <?php
                include '../../config/configDB.php';
                $sql = "SELECT * FROM carrito WHERE
                        USUARIO_usu_id=" . $_SESSION['codigo'] . ";";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sqlP = "SELECT * FROM carrito c, Producto p WHERE
                        c.USUARIO_usu_id=" . $_SESSION['codigo'] . " AND
                        p.pro_codigo=" . $row['PRODUCTO_pro_id'] . "
                        GROUP BY 1;";

                        $resultP = $conn->query($sqlP);
                        $rowP = $resultP->fetch_assoc();
                        ?>

                <article>
                    <div class="cartImg">
                        <img src="../../adminPanel/img/uploads/<?php echo $rowP['pro_img']; ?>"
                            alt="<?php echo $rowP['pro_nombre'] ?>">
                    </div>
                    <div class="cartDescription">
                        <h2><?php echo $rowP['pro_nombre'] ?></h2>
                        <h3>Descripcion</h3>
                        <p><?php echo $rowP['pro_descripcion'] ?></p>
                        <div class="inf">
                            <div>
                                <h3>Cantidad:</h3>
                                <span><?php echo $row['car_cantidad'] ?></span>
                            </div>
                        </div>
                    </div>
                    <span>$<?php echo $rowP['pro_precio'] ?></span>
                    <i class="fas fa-times" onclick="cartDelete(<?php echo $row['car_id'] ?>)"></i>
                </article>
                <?php
                }
            } else {
                echo '<h2 style="color: #FF6565">No hay productos.</h2>';
            }
            ?>

            </div>

            <div class="productInfo bill">
                <div class="billInfo">
                    <div class="nameBill">
                        <?php
                        $sqlUser = "SELECT * FROM Usuario, Direccion 
                        WHERE Usuario.usu_codigo=Direccion.usu_codigo AND 
                        Usuario.usu_codigo = " . $_SESSION['codigo'] . ";";
                        $sqlUser = $conn->query($sqlUser);

                        $sqlUser = $sqlUser->fetch_assoc();
                        if ($sqlUser['usu_nombres'] != '' && $sqlUser['usu_apellidos'] != '' && $sqlUser['usu_cedula'] != '' && $sqlUser['dir_calle_principal'] != '' && $sqlUser['dir_calle_secundaria'] != '' && $sqlUser['ciu_nombre'] != '') {
                            ?>
                        <h2>Factura</h2>
                        <p><?php echo $sqlUser['usu_nombres'] . ' ' . $sqlUser['usu_apellidos'] ?></p>
                        <span><?php echo  $sqlUser['dir_calle_principal'] . ' ' . $sqlUser['dir_calle_secundaria'] ?></span>
                        <span
                            class="data"><?php echo $sqlUser['usu_cedula'] . ', ' . $sqlUser['ciu_nombre'] . ', ' . $sqlUser['pro_nombre'] ?></span>

                        <?php
                            $usuDates = true;
                        } else {
                            $usuDates = false;
                            echo '<h3 style="color: #FF6565">Por favor complete la informacion de su perfil.</h3>';
                            echo '<p>Para continuar con el pago...</p>';
                        }
                        ?>
                    </div>
                    <button onclick="window.location.href = '../../admin/user/view/index.php'">
                        <i class="far fa-edit"></i> Editar
                    </button>
                </div>
                <div class="buydetall" id="buydetall">
                    <?php
                    $sqlSubTot = "SELECT SUM(c.car_cantidad*(p.pro_precio)) AS sub_total FROM carrito c, Producto p WHERE 
                                        c.PRODUCTO_pro_id = p.pro_codigo AND 
                                        c.USUARIO_usu_id = " . $_SESSION['codigo'] . ";";

                    $sqlSubTot = $conn->query($sqlSubTot);
                    $subTot = $sqlSubTot->fetch_assoc();
                    $subTotal = $subTot['sub_total'];
                    $total = ($subTotal * 1.12);

                    ?>
                    <h2>Detalle</h2>
                    <div class="price">
                        <p><span>Sub-Total: </span>$<?php echo round($subTotal, 2) ?></p>
                        <p><span>IVA: </span>12%</p>
                        <p><span>Total: </span>$<?php echo round($total, 2) ?></p>
                    </div>
                    <?php
                    if ($subTotal > 0 ) {
                        ?>
                    <div class="btns">
                        <button onclick="openWindow()">
                            <i class="far fa-credit-card"></i> Tarjeta
                        </button>
                    </div>
                    <?php
                }
                ?>
                </div>
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

singup.php
<?php
session_start();
if (isset($_SESSION['isLogin'])) {
        header("Location:index.php");    
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
    <script src="../js/validaciones.js"></script>
    <title>Registro</title>
</head>

<body>
    <header>
        <?php
        include("../../global/php/headerPublic.php");
        ?>
    </header>

    <div class="content">
        <div class="form">
            <form action="../controller/signup.php"
                onsubmit="return validarCamposObligatorios()" method="POST">
                <h2>IMPORTMANGUERASIV</h2>
                <p>Bienvenido! Por favor, ingrese sus datos.</p>
                <input type="text" name="cedula" id="cedula" placeholder="Cedula" required>
                <div class="nombres">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre"
                        onkeyup="validarLetras(event,this)" required>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido"
                        onkeyup="validarLetras(event,this)" required>
                </div>
                <input type="date" name="fechaNac" id="fechaNac" placeholder="Fecha de Nacimiento" required>
                <input type="text" name="telefono" id="telefono" placeholder="Telefono o Celular" required>
                <input type="email" name="email" id="email" placeholder="Correo" required>
                <input type="password" name="pass" id="pass" placeholder="Contraseña" required>
                <input type="password" name="epass" id="epass" placeholder="Confirmar contraseña"
                    onkeyup="validarPass('errorCPass')" required>
                <span class="error" id="errorCPass">Las contraseñas no coinciden</span>
                <div class="btns">
                    <input type="submit" value="Crear">
                </div>
                <a href="login.php">Ya tienes? Inicia sesión</a>
            </form>
        </div>
    </div>

    <footer>
        <?php
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>

successful.php
<?php
session_start();
/*if (!isset($_GET['register']) || !isset($_GET['login'])) {
    header("Location:index.php");
}*/
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
    <title>Successful</title>
</head>

<body>
    <header>
        <?php
        include("../../global/php/headerPublic.php");
        ?>
    </header>

    <div class="headerImg pageError pageSuccess">

        <?php
        if (isset($_GET['register'])) {
            if ($_GET['register'] == 'true') {
                ?>
        <div class="contentSucce">
            <h2>Registro exitoso....</h2>
            <p>Redirigiendo por favor espere...</p>
            <i class="far fa-check-circle"></i>

        </div>
        <?php
                header("Refresh:2; url=login.php");
            } else {
                //fracaso
                if (isset($_GET['error'])) {
                    //fracaso
                    if ($_GET['error'] == '1062') {
                        ?>
        <div class="contentSucce">
            <h2>El usuario ya existe</h2>
            <p>Error al registrar..</p>
            <i class="far fa-times-circle"></i>
        </div>
        <?php
                        header("Refresh:2; url=signup.php");
                    } else {
                        ?>
        <div class="contentSucce">
            <h2>Error insesperado</h2>
            <p><?php echo $_GET['error'] ?></p>
            <p>Error al registrar..</p>
            <i class="far fa-times-circle"></i>
        </div>
        <?php
                        header("Refresh:2; url=signup.php");
                    }
                } else {
                    header("Location: signup.php");
                }
            }
        } elseif (isset($_GET['login'])) {


            if ($_GET['login'] === 'true') {
                if ($_GET['delete'] == 'S') {
                    ?>
        <div class="contentSucce">
            <h2>Tu cuenta a sido desactivada </h2>
            <p>Activando cuenta espere en breve sera redirigido gracias...</p>
            <i class="far fa-check-circle"></i>
        </div>
        <?php
                    $sql = "UPDATE usuario SET
                    usu_eliminado='S',
                    usu_fecha_modificacion='$date'
                    WHERE usu_id=" . $_SESSION['codigo'] . ";";

                    if ($conn->query($sql)) {
                        if ($_SESSION['rol'] == 'user') {
                            header("Refresh:2; url=index.php");
                        } else {
                            header("Refresh:2; url=../../admin/admin/view/index.php");
                        }
                    } else {
                        header("Refresh:1; url=index.php");
                    }
                } else {
                    ?>
        <div class="contentSucce">
            <h2>Logeo exitoso</h2>
            <p>Redirigiendo por favor espere...</p>
            <i class="far fa-check-circle"></i>
        </div>
        <?php
                    if ($_SESSION['rol'] == 'user') {
                        header("Refresh:2; url=index.php");
                    } else {
                        header("Refresh:2; url=../../admin/admin/view/index.php");
                    }
                }
            } else {
                ?>
        <div class="contentSucce">
            <h2>Error datos de inicio incorrectos.</h2>
            <p>Redirigiendo por favor espere...</p>
            <i class="far fa-times-circle"></i>
        </div>
        <?php
                header("Refresh:2; url=login.php");
            }
        }
        ?>
    </div>
    <footer>
        <?php
        //echo (getcwd());
        include("../../global/php/footerPublic.php");
        ?>
    </footer>

</body>

</html>
</body>

</html>

CSS Admin

*{
margin: 0;
padding: 0;
box-sizing: border-box;
}
h3{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 25pt;
    letter-spacing: 1px;
    width: 100%;
    background: #2980b9;
    padding: 15px;
    color: #FFF;
    text-align: center;
text-transform: uppercase;
}
#container{
   background: #5d6d7e;
   width: 100%;
   height: 100vh;
   display: -webkit-flex;
   display: -moz-flex;
   display: -ms-flex;
   display: -o-flex;
   display: flex;
   justify-content: center;
   align-items: center; 
}
#container form{
    width: 400px;
    background: #FFF;
    padding: 10px;
}

#container form img{
margin: 15px auto;
text-align: center;
display: block;
}

#container form input{
width: 100%;
padding:5px ;
font-size: 16pt;
display: block;
margin: 25px auto;
border-radius: 5px;
border:1px solid #CCC;
text-align: center;
}

#container form input[type="submit"]{
    background: #5dade2;
    padding: 10px;
    color: #FFF;
    letter-spacing: 1px;
    border: 0;
    cursor: pointer;
}
.error {
    color: red;
    font-size: 8px;
}

estilosAdmin.css
@import url(../fonts/GothamBook.css);
@import url(../fonts/GothamBold.css);
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body{
	background: #ededed;
}
h1, h2, h3, h4, h5, h6 {
    font-family: 'arial';
    font-weight: bold;
    letter-spacing: 1px;
}
h1{
	font-size: 26px;
}
h2{
	font-size: 20px;
}
h3{
	font-size: 18px;
}
h4{
	font-size: 16px;
}
h5{
	font-size: 14px;
}
h6{
	font-size: 12px;
}
p{
	font-family: 'arial';
	letter-spacing: 2px;
	font-size: 14px;
	line-height: 20px;
}
a{
	text-decoration: none;
	font-family: arial;
	letter-spacing: 1px;
}
span {
    font-family: 'GothamBook';
    letter-spacing: 1px;
    font-size: 14px;
    line-height: 20px;
}
header{
	position: fixed;
	width: 100%;
}
.header{
	color: #FFF;
	background: #0a4661;
	height: 35px;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 10px;
}
.optionsBar{
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: center;
    align-items: center;
}
.optionsBar span {
    color: #FFF;
    font-size: 11pt;
    font-family: 'GothamBook';
    text-transform: uppercase;
    margin-left: 30px;
}
.photouser {
    margin-left: 30px;
    width: 25px;
    height: 25px;
}
.close{
	width: 25px;
    height: 25px;
}
.optionsBar a {
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    margin-left: 30px;
}
nav ul{
	background: #058167;
	/*background: #05817d;*/
	list-style: none;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: left;
	align-items: center;
}
nav ul > li a{
	position: relative;
}
nav a{
	color: #FFF;
	display: block;
	font-size: 10pt;
	font-family: 'GothamBook';
	padding: 15px 30px;
	text-transform: uppercase;
	letter-spacing: 2px;
	transition: background .5s;
	border-right: 1px solid #319B8F;
}
nav .principal > a{
    background: url(../images/arrow_bottom.png) no-repeat;
    background-position-x: 0%;
    background-position-y: 0%;
    background-size: auto auto;
    background-position: 94% center;
    background-size: 10px;
}
nav ul li:hover ul{
	display: block;
}
nav li ul{
	/*background: #177470;*/
	background: #2d9872;
	display: none;
	flex-direction: column;
	position: absolute;
	align-items: flex-start;
	border-radius: 0 0 10px 10px;
}
nav li ul a{
	position: relative;
	padding: 10px 30px;
	border-right: initial;
}
nav li ul a:hover{
	/*background: #2c9595;*/
	background: #147556;
}
nav li ul li:last-child{
	border-radius: 0 0 10px 10px;
	overflow: hidden;
}
#container{
	padding: 90px 15px 15px;
}
/*****************************************************************/

/*LISTA USUARIOS*/
#container h1{
	font-size: 35px;
	display: inline-block;
}

table{
	border-collapse: collapse;
	font-size: 12pt;
	font-family: 'arial';
	width: 100%;
}

table th{
	text-align: center;
	padding: 10px;
	background:#3d7ba8;
	color: #FFF;
}
table tr:nth-child(odd){
	background: #FFF;

}
table td{
	padding: 10px;
	text-align: center;
}
.link_edit{
	color: #3ca4ce;
}
.link_activar{
	color: #64b13c;
}

.link_add{
	color: #64b13c;
}
.link_delete{
	color: #f26b6b;
}

/*UPDATE USUARIO*/
.form_register {
width: 450px;
margin: auto;
}
.form_register h1{
	color: #3c93b0;

}
hr{
	border:0;
	height: #CCC;
	height: 1px;
	margin: 10px 0;
	display: block;
}
form {
	background: #FFF;
	margin: auto;
	padding: 20px 50px;
	border: 1px solid #d1d1d1;
}
label {
	display: block;
	font-size: 12pt;
	font-family: 'GothamBook';
	margin: 15px auto 5x auto;
}

input {
	display: block;
	width: 100%;
	font-size: 11pt;
	padding: 5px;
	border: 1px solid#85929e;
	border-radius: 5px;
}

.btn_save {
	font-size: 12pt;
	background: #12a4c6;
	padding: 10px;
	color: #FFF;
	letter-spacing: 1px;
	border: 0;
	cursor: pointer;
	margin: 30px auto 15px auto;
	display: block;
	border-radius: 5px;

}

/*Update Password*/
.form_update_password {
	width: 450px;
	margin: auto ;
	}
	.form_update_password h1{
		color: #3c93b0;
	
	}
.alert{
	width: 100%;
	background: #66e87d66;
	border-radius: #126e00;
	margin: 20px auto;
}

.alertP{
	width: 100%;
	background: #66e87d66;
	border-radius: #126e00;
	margin: 20px auto;
}
	.msg_error{
		color: #e65656;
	}
	.msg_save{
		color: #126e00;
	}
	.alert p{
		padding: 10px;
	}

	/*Confirmar eliminar*/
	.data_delete{
		text-align: center;
	}
	.data_delete h2{
		font-size: 12pt;
	}
	.data_delete span{
		font-weight: bold;
		color: #4f72d4;
		font-size: 12pt;
	}

.btn_cancelar, .btn_aceptar{
width: 124px;
background:#478ba2 ;
color: #FFF;
display: inline-block;
padding: 5px;
border-radius: 5px;
cursor: pointer;
margin-left: 15px;

}
.btn_cancelar{
background: #126e00;	
}

.data_delete form{
	
		background: initial;
		margin: auto;
		padding: 20px 50px;
		border: 0;
	
}

/*Paginador*/
.paginador ul{
	padding: 15px;
	list-style: none;
	background: #FFF;
	margin-top: 15px;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: flex-end;
}
.paginador a, .pageSelected{
	color: #428bca;
	border: 1px solid #ddd;
	padding: 5px;
	display: inline-block;
	font-size: 14px;
	text-align: center;
	width: 35px;
}

.paginador a:hover{
	background: #ddd;
}
.pageSelected{
	color: #fff;
	background: #428bca;
	border:1px solid #428bca
}



/*Form Buscar*/
.form_search {
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	float: right;
	background: initial;
	padding: 10px;
	border-radius: 10px;
}

.form_search .btn_search {
	background: #1faac8;
	color: #FFF;
	padding: 0 20px;
	border: 0;
	cursor: pointer;
	margin-left: 10px;

}


/*FOTO*/
.prevPhoto {
    display: flex;
    justify-content: space-between;
    width: 160px;
    height: 150px;
    border: 1px solid #CCC;
    position: relative;
    cursor: pointer;
    background: url(../images/uploads/user.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    margin: auto;
}
.prevPhoto label{
	cursor: pointer;
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	left: 0;
	z-index: 2;
}
.prevPhoto img{
	width: 100%;
	height: 100%;
}
.upimg, .notBlock{
	display: none !important;
}
.errorArchivo{
	font-size: 16px;
	font-family: arial;
	color: #cc0000;
	text-align: center;
	font-weight: bold; 
	margin-top: 10px;
}
.delPhoto{
	color: #FFF;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 50%;
	width: 25px;
	height: 25px;
	background: red;
	position: absolute;
	right: -10px;
	top: -10px;
	z-index: 10;
}
#tbl_list_productos img{
	width: 50px;
}
.imgProductoDelete{
	width: 175px;
}

/*asdasdasd*/
.img_producto {
	width: 60px;
	height: auto;
	margin: auto;
}

#floatWindow{
    background-color: rgba(0, 0, 0, 0.5);
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    transition: all ease 1s;
    z-index: 100;
    display: none;
    justify-content: center;
    align-items: center;
}
#floatWindow .contentMap{
    width: 80%;
    height: 500px;
}
#floatWindow #map{
    width: 100%;
    height: 100%;
    background-color: var(--bgColor);
    
}
#floatWindow i {
    color: var(--bgColor);
    font-size: 1.6em;
    float: right;
    z-index: 300;
}
#floatWindow i:hover{
    color: var(--colorRojo);
    cursor: pointer;
}

#floatWindow .contentWindow{
    background-color: var(--bgColor);
    position: relative;
}
#floatWindow .contentWindow i{
    position: absolute;
    top: 10px;
    right: 10px;
    color: var(--colorAzul);
}
#floatWindow .contentWindow i:hover{
    color: var(--colorRojo);
}

pagina.css
body {
    width: 80%;
   
    max-width: 1500px;
    padding-left: 0.9%;
    padding-right: 0.9%;
    margin: 0px auto auto auto;
    clear: none;
    float: none;
    background-color: white;
    -moz-box-shadow: rgba(136, 147, 209, 0.9) 20px 0px 25px,  rgba(136, 147, 209, 0.9) -20px 0px 25px;
    -webkit-box-shadow: rgba(136, 147, 209, 0.9) 20px 0px 25px,  rgba(136, 147, 209, 0.9) -20px 0px 25px;
    box-shadow: rgba(136, 147, 209, 0.9) 20px 0px 25px,  rgba(136, 147, 209, 0.9) -20px 0px 25px;
}
html{
background-image: url("../img/img7.jpg");
background-size: 100%;
}

.formulario0 input{
    width: 100%;
    height: 100%;
}


/* menu css*/
/* menu */

.divmenu ul {
    list-style:none;
    margin:0;
    padding: 1px 1px;
   }
   
   /* items del menu */
   
   .divmenu ul li {
    background-color:#2e518b;
    width: 14.28%;
   }
   
   /* enlaces del menu */
   
   .divmenu ul li a {
    display:block;
    color:#fff;
    text-decoration:none;
    width: 100%;
    padding:10px;
    font-family:"HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform:uppercase;
    
   }
   
   /* items del menu */
   
   .divmenu ul li {
    position:relative;
    float:left;
    margin:0;
    padding:0;
   }
   
   /* efecto al pasar el ratón por los items del menu */
   
   .divmenu ul li:hover {
    background:#5b78a7;
 
}

/* menu desplegable */

.divmenu ul ul {
    display:none;
    position:absolute;
    background:#eee;
    padding:0;
   }
   
   /* items del menu desplegable */
   
   .divmenu ul ul li {
    float:none;
    width:190px;
   }

   
   /* enlaces de los items del menu desplegable */
   
   .divmenu ul ul a {
    line-height:100%;
    padding:5px 5px;
   }
   
   /* items del menu desplegable al pasar el ratón */
   
   .divmenu ul li:hover > ul {
    display:block;
   }

/*iconos menu */
#iconmenu{
    width: 10%;
    height: 11%;
}

#iconcarrito{
    width: 10%;
    height: 12%;
}

/*flotante facebook*/
.seccion {
    width: 50%;
    float: left;
}

.social{
    position:fixed;
    left: 0;
    top: 5px;
    
}

.social ul {
    list-style: none;
    padding: 1px 20px;
}
/*es para la publicodad de servicios*/
.social1{
    position:fixed;
    left: 0;
    top: 8px;
    text-align: left;
    
}
.social1 ul {
    list-style: none;
    padding: 15px 32px;
}

.social ul li .icon-mail4 { background:#666666;}
.social ul li .icon-whatsapp { background:green;}

 /*index transcicion*/

     
 .swiper-container {
    width: 100%;
    padding-top: 50px;
    padding-bottom: 50px;
  }
  .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 300px;
    height: 300px;

    border-radius:10px;
    border: white 3px inset;
  }
  .transcicion{
      /*background-color: rgb(15, 75, 134);*/
      width: 97%; 
    }
    .swiper-container{
       /* background-color: rgb(15, 75, 134);*/
       background-image: url("../../../../imagenes/formularioimg.jpg");
        background-size: 60%;
        background-size: 100%;
    }

    /*contenido del index*/
    .indexcontenido{
        text-align: justify;
     padding: 0px 20px;
          }

          .indexcontenido {
            width: 60%;
            float: left;
        }

        .imgcontenido {
            width: 30%;
            float: left;
            position: relative;
        }
        .imgcontenido1 {
            width: 30%;
            float: left;
            margin-left: 935px;
        }
        
        /*css para cuando el cursor pase por las opciones del maenu */           
        nav > ul > li > ul > :hover, nav > ul > li> ul >  :active { 
            text-decoration: none; 
           /* background-color: #ce726c;*/
            /*border-radius: 9px;*/
            border-bottom: 3px solid #ce726c;
        	
            }
            nav > ul >  :hover, nav > ul >    :active { 
                text-decoration: none; 
               /* background-color: #ce726c;*/
                /*border-radius: 9px;*/
                border-bottom: 3px solid #ce726c;
                
                }
            /*-------------------------------------------------------*/
              .footernos {
                      
                    text-align: center;
                    font-size: 1em;
                    margin-top: 4%;
                    background-color: rgb(15, 75, 134); 
                    color:black;
                    clear: both;
                    padding-bottom: 20px;
                }

/*--------------------- fin index css-------------------*/                
/*estilos de la pagina nosotros */

.h1nosotros {
    color: red;
   
   text-align: center;
    padding: 5%;
    font-size: 200%;

}

.p1nosotros{
    color: rgb(65, 60, 60);
    float: left;
    padding: 2%;
    font-size: 150%;

  }

  .imanoso{
    width: 100%;
    float: left;
    padding: 0%;
  }

  .imgabout{
    width: 40%;
    float: left;
}
 #videoYT{
     text-align: center;
     padding: 50px;
 }
/*-----------------------------------------*/
/* servicios css */
/*titulo */
.h1servicioss{
    color: red;
    text-align: center;
    size: 500%;
    float: none;
    padding: 3%;
    font-size: 200%;
}  
/*-------------------*/
.productos .produ .parrafo{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color: black;
    width: 100px;

  }

  /*productos */
  .produ  th{
    width: 600px;
    height: 380px;
    padding: 5px;
    background-color: #fcc;
    font-size: 0.8em;
    text-align: justify;
    
   }
   .produ h1{
    font-family: cursive;
   text-align:center;
    
   }
   .produ .imagenproductos img{
       width: 200px;
       height: 200px;
       display: block;
   }

 .imagenproductos{
    padding: 1px 15px;
}

/*----------------------------*/
.produ .imagenproductos img{
    width: 200px;
    height: 200px;
    display: block;
}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
.valoracion {
 position: relative;
 overflow: hidden;
 display: inline-block;
}
.valoracion input {
 position: absolute;
 top: -100px;
}
.valoracion label {
 float: right;
 color: #c1b8b8;
 font-size: 30px; 
}
.valoracion label:hover,
.valoracion label:hover ~ label,
.valoracion input:checked ~ label {
color: #ffff00;
text-shadow: 5px 5px 15px #AAA;
cursor: pointer;

}
.mensajes input {
    border: 0;
}

.produ{
 background-image: url("../img/img8.jpg");
 background-size: 100%;
border-radius: 10px;
}

.productos{
    background-color: rgb(255, 255, 255);
    border-radius: 2px ;
    border: rgb(114, 56, 56) 3px inset;
    
}

.video{
    padding: 20px 0px;
    border-bottom: 3px solid #5c5f96;
}

.perfil{
    border-radius: 20px;
 
}
/*---------- login css estilos ----------*/

.login-box{
    width:320px;
    height:360px ;
    background: rgb(235, 232, 197);
    color: #ffffffff;
    top: 45%;
    left: 50%;
    position: relative;
    transform: translate(-50%,-10%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.login-box .avatar{
    width: 100px;
    height: 100px;
    border-radius: 50px;
    position: absolute;
    top: -50px;
    left:calc(50% - 50px);
}
.login-box h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
    color: black;

}
.login-box label{
    margin: 0;
    padding: 0;
    font-weight: bold;
    display: block;
    color: black;
}
.login-box input{
    width: 100%;
    margin-bottom: 20px;
}
.login-box input [type="text"],
.login-box input [type="password"]{
    border: none;
    border-bottom: 1px solid #ffffffff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}

.login-box input[type="submit"]{
    border:none;
    outline: none;
    height: 40px;
    background: rgb(107, 129, 224);
    color: #fff;
font-size: 18px;
border-radius: 20px;
}
.login-box input[type="reset"]{
    border:none;
    outline: none;
    height: 40px;
    background: rgb(107, 129, 224);
    color: #fff;
font-size: 18px;
border-radius: 20px;
}

/*---------------------------------------*/

/*------------------Pagina de contactos---------------*/
#Contactanos{
    text-align: center;
}

#formularioc{
    text-align: center;
    background-image: url("../img/img6.jpg");
    padding: 1px 5px;
}

.columna1{
    padding: 0px 90px;
    
}

.columna2{
    padding: 50px 20px;
}

 .enviar{
    background: linear-gradient(rgb(63, 49, 138), rgb(161, 84, 78));
    border: 0;
    color: white;
    opacity: 0.8;
     cursor: pointer;
      border-radius: 25px;
      height: 40px;
    width:20%;
  }

/*---------------------------------------------------*/
/*------- formulario estilos --------------*/

.loginboxe{

    width:320px;
    height:750px ;
    background: rgb(235, 232, 197);
    color: rgb(0, 0, 0);
    top: 45%;
    left: 50%;
    position: relative;
    transform: translate(-50%,-10%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.loginboxe label{
    margin: 0;
    padding: 0;
    font-weight: bold;
    display: block;
    color: black;
}
.loginboxe input{
    width: 100%;
    margin-bottom: 20px;
}
.loginboxe input [type="text"],
.loginboxe input [type="password"]{
    border: none;
    border-bottom: 1px solid #ffffffff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}

.loginboxe input[type="submit"]{
    border:none;
    outline: none;
    height: 40px;
    background: rgb(107, 129, 224);
    color: #fff;
font-size: 18px;
border-radius: 20px;
}
.loginboxe input[type="reset"]{
    border:none;
    outline: none;
    height: 40px;
    background: rgb(107, 129, 224);
    color: #fff;
font-size: 18px;
border-radius: 20px;
}

/*-----------------------------------------*/

/*-----CARDS-------*/
.content section {
    margin-top: 2em;
}
.content section>a{
    text-decoration: none;
    
}
.content section>a>h2{
    margin: 1.5em 0;
    color: var(--colorDark);
    font-size: 2em;  
}.content section>h2{
    margin: 1.5em 0;
    color: var(--colorDark);
    font-size: 2em;  
}
.content .contentCards{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-column-gap: 15px;
}
.content section article{
    background-color: var(--colorBlanco); 
}
.content .contentCards article{
    margin-top: 20px;
}
article .contentImg{
    width: 100%;
    position: relative;
}
article .contentImg img{
    width: 100%;
}
article .contentImg img:hover{
    opacity: .7;
    cursor: pointer;
}
article .contentImg>span{
    background: var(--colorRojo);
    width: 5em;
    font-size: .6em;
    text-align: center;
    border-radius: 20px;
    padding: .5em 0;
    position: absolute;
    top: 1em;
    left: 1em;
}
article .contentImg>span:hover{
    color: var(--colorBlanco)
}
article .contentImg .ranking{
    position: absolute;
    top: .5em;
    right: 1em;
    display: flex;
    align-items: center;
    background: rgba(0, 0, 0, .5);
    padding: 0px 5px;
    border-radius: 20px;
}
article .contentImg .ranking i{
    color: #FFCA83;
    font-size: 1.3em;
}
article .contentImg .ranking span{
    color: var(--colorBlanco);
    font-size: 1.1em;
}
article .contentImg .rankingi:hover{
    cursor: pointer;
}
article .contentDescription{
    display: flex;
    justify-content: space-between;
    margin: 2em 1em;
    
}
article .contentDescription .descripProduct{
    margin: 0 1em;
}
article .contentDescription .descripProduct a{
    text-decoration: none;
    color: var(--colorDark);
}
article .contentDescription .descripProduct a h2{
    font-size: 1.3em;
}
article .contentDescription .descripProduct p{
    overflow: hidden;
    height: 1.5em;
    font-size: .7em;
    color: var(--color1);
    opacity: .5;
}
article .contentDescription span{
    color: var(--colorAzul);
    font-size: 1.4em;
}

/****Tabla descripcion productos**/
.restante table{
    
border-collapse: separate;
text-align: left;
caption-side: top;
letter-spacing: 2px;
}
.restante .tablapro h6{
    font-family: Georgia, 'Times New Roman', Times, serif;
    align-content: center;
}

.promedio table{
    
    border-collapse: separate;
    text-align: center;
    caption-side: top;
    letter-spacing: 1px;
    font-size: 20px;
    color: gray;
}

.promedio label:hover,
.promedio label:hover ~ label{

    color: #ffff00;
    text-shadow: 5px 5px 15px #AAA;
    cursor: pointer;
}

.columna1{
    float: left;
    width: 30%;
    }
    
    .columna2{
    float: left;
    width: 45%;}
CSS para Usuario
    
   generalStyle.css
*{
    --color1: #3B3B53;;
    --color2: #A3A0FB;
    --colorBlanco:#FFFFFF;
    --colorRojo: #FF6565;
    --colorAzul:#3B86FF;
    --bgColor:#F0F0F7;
    --colorFontGeneral:#4D4F5C;
}

/*--------PAGINA PRODUCTO---------*/
.content .product{
    display: grid;
    grid-template-columns: 50% 50%;
    grid-column-gap: 15px;
}

/*---SECCION IMAGEN----------*/
.content .product .productSlide{
    height: 34em;
    text-align: center;
}
.content .product .productSlide .productSlideImg{
    width: 100%;
    margin-bottom: 10px;
    position: relative;  
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--colorBlanco);
}
.content .product .productSlide .productSlideImg .contetImg{
    width: 70%;
    height: 500px;    
}
.content .product .productSlide .productSlideImg img{
    width: 100%;
    height: 100%;
}
.content .product .productSlide .productSlideImg i{
    color: var(--color1);
    opacity: .5;
    font-size: 5em;
    position: absolute;
    top: 45%;
    transition: all ease .25s;
}
.content .product .productSlide .productSlideImg i.fa-angle-left{
    left: 0;
}
.content .product .productSlide .productSlideImg i.fa-angle-right{
    right: 0;
}
.content .product .productSlide .productSlideImg i:hover{
    cursor: pointer;
    color: rgba(0, 0, 0, .1);
}
/*---SECCION PRODUCTO----*/

.content .product .productInfo{
    padding: 10px 50px 10px 10px;
}
.content .product .productInfo>h2{
    font-weight: 700;
    font-size: 22pt;
    margin-bottom: 20px;
}
.content .product .productInfo>h3{
    color: var(--colorFontGeneral);
    opacity: .7;
    font-weight: normal;
    margin-bottom: 20px;
}
.content .product .productInfo>p{
    color: var(--colorFontGeneral);
    opacity: .5;
    margin-bottom: 4em;
}
.content .product .productInfo>span{
    font-size: 20pt;
    color: var(--colorFontGeneral);
    font-weight: 600;
    margin-bottom: 10px;
}
.content .product .productInfo .dataStore{
    display: flex;
    justify-content: space-between; 
}
.content .product .productInfo .dataStore label{
    color: var(--colorFontGeneral);
    opacity: .7;
    font-weight: normal;
    margin-bottom: 20px;
    margin-right: 5px;
}
.content .product .productInfo .dataStore p{
    display: flex;
    align-items: center;
    color: #3B3B53;
    font-size: 1em;
}
.content .product .productInfo .dataStore p span{
    color: var(--colorFontGeneral);
    opacity: .7;
    font-weight: normal;
    margin-right: 5px;
    font-size: 1em;
}
.content .product .productInfo span:hover{
    cursor: text;
}
.content .product .productInfo .productPrice{
    color: var(--colorFontGeneral);
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    margin-bottom: 15px;

}
.content .product .productInfo .productPrice p{
    display: flex;
    align-items: center;
    font-size: 1em;
}
.content .product .productInfo .productPrice span{
    color: var(--colorFontGeneral);
    font-weight: 700;
    font-size: 1em;
    margin-right: 5px;
}
.content .product .productInfo .productBtns{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.content .product .productInfo .productBtns button{
    padding: 10px 15px;
    background-color: var(--colorAzul);
}
.content .product .productInfo .productBtns button:hover{
    background-color: #79ACFF;
}
.content .product .productInfo .productBtns button:active{
    background-color: #1062E5;
}
.content .product .productInfo .productBtns button i{
    font-size: 13pt;
    color: var(--colorBlanco);
}.content .product .productInfo .productBtns button i:hover{
    color: var(--colorBlanco);
}
.content .product .productInfo .productBtns i{
    font-size: 25pt;
    color: var(--colorAzul);
    margin-left: 10px;
}
.content .product .productInfo .productBtns i:hover{
    cursor: pointer;
    color: #1062E5;
}
.content .product .productInfo .productBtns .valoration{
    display: flex;
    align-items: center;
}
.content .product .productInfo .productBtns .valoration span{
    font-size: 1.5em;
    color: var(--colorFontGeneral);
    margin-left: 10px;
}
.content .product .productInfo .productBtns .valoration .clasificacion {
    position: relative;
    overflow: hidden;
    display: inline-block;
    font-size: 1.5em;
  }
  
  .content .product .productInfo .productBtns .valoration .clasificacion input {
    position: absolute;
    top: -100px;  
  }
  
  .content .product .productInfo .productBtns .valoration .clasificacion label {
    float: right;
    color: rgb(119, 193, 236);
  }
  
  .content .product .productInfo .productBtns .valoration .clasificacion label:hover,
  .content .product .productInfo .productBtns .valoration .clasificacion label:hover ~ label,
  .content .product .productInfo .productBtns .valoration .clasificacion input:checked ~ label {
    color: var(--colorAzul);
    }
/*------FORM-------*/

.content .form form .nombres input{
    margin-right: 10px;
}
.content .form form .remember{
    display: flex;
    flex-direction: column;
    align-items: baseline;
    margin-bottom: 25px;
}
.content .form form .remember input{
    width: 100%;
    margin-bottom: 0px;
}
.content .form form .remember label{
    font-size: .9em;
    width: 100%;
    margin-left: 5px;
    text-align: left;
}
.content .form form a{
    text-decoration: none;
    color: var(--colorAzul);
}
.content>h2{
    text-transform: uppercase;
    letter-spacing: 4px;
    color: var(--colorBtns);
    font-size: 2.5em;
    font-weight: 600;
    margin-bottom: 15px;
    text-align: center;
    margin-top: 1.5em;
}
/*--------SHOPPING CART---------*/
.content .product .cart{
    overflow: scroll;
}
.content .product .cart article{
    width: 100%;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    padding: 10px;
}
.content .product .cart article .cartImg{
    width: 17em;
    margin-right: 10px;
    
}
.content .product .cart article .cartImg img{
    width: 10em;
    margin: 0;
}
.content .product .cart article .cartDescription{
    text-align: left;
    color: var(--colorFontGeneral);
}
.content .product .cart article .cartDescription h2{
    color: #43425D;
}
.content .product .cart article .cartDescription h3{
    opacity: .7;
    font-weight: normal;
    font-size: 1.2em;
}
.content .product .cart article .cartDescription p{
    opacity: .5;
    font-size: .9em;
    margin-bottom: 10px;
    overflow: hidden;
}
.content .product .cart article .cartDescription span{
    color: var(--colorAzul);
    font-size: 1.1em;
}
.content .product .cart article .cartDescription .inf{
    display: flex;
    justify-content: space-between;
}
.content .product .cart article .cartDescription .inf div{
    display: flex;
    align-items: center;
}
.content .product .cart article>span{
    color: var(--colorFontGeneral);
    font-size: 2em;
    font-weight: 600;
    margin-left: 10px;
}
.content .product .cart article span:hover{
    cursor: text;
}
.content .product .cart article>i{
    color: var(--colorAzul);
    font-size: 1.5em;
    position: absolute;
    top: .4em;
    right: .4em;
    transition: all ease .5s;
}
.content .product .cart article>i:hover{
    cursor: pointer;
    color: var(--colorRojo);
}
/*-------FACTURA-------*/
.content .product .bill .billInfo{
    background-color: var(--colorBlanco);
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: var(--colorFontGeneral);
    margin-bottom: 20px;
}
.content .product .bill .billInfo h2{
    color: var(--color1);
    margin-bottom: 15px;
}
.content .product .bill .billInfo span{
    color: var(--colorFontGeneral);
    margin-top: 10px;
    margin-bottom: -20px;
    opacity: .5;
}
.content .product .bill .billInfo .data{
    margin-bottom: 10px;
}
/*------------DETALLE FACTURA---------------*/
.content .product .bill .buydetall{
    background-color: var(--colorBlanco);
    padding: 15px;
}
.content .product .bill .buydetall h2{
    color: var(--color1);
}
.content .product .bill .buydetall .price p{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    font-size: 1.5em;
}
.content .product .bill .buydetall .price span{
    color: var(--colorFontGeneral);
    font-weight: 700;
    font-size: 1em;
    margin-right: 5px;
}
.content .product .bill .buydetall .btns{
    text-align: center;
    margin-top: 20px;
}

#floatWindow .form{
    width: 500px;
    height: 80%;
    margin: 0;
}
#floatWindow .form form{
    width: 100%;
    height: 100%;
    padding: 20px 15px;
}
#floatWindow .form form .nombres{
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-column-gap: 10px;
}
#floatWindow .contentWindow .confirmVtn{
    height: 300px;
    width: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
#floatWindow .contentWindow .confirmVtn h2{
    text-transform: uppercase;
    letter-spacing: 4px;
    color: var(--colorBtns);
    font-size: 1.5em;
    margin-bottom: 5px;
}
#floatWindow .contentWindow .confirmVtn p{
    color: var(--colorFontGeneral);
    opacity: .5;
}
#floatWindow .contentWindow .confirmVtn i{
    position: relative;
    font-size: 4em;
    opacity: .7;
    text-align: center;
    padding: 0;
    left: 0;
    right: 0;
    margin: 15px 0;
}
#floatWindow .contentWindow .confirmVtn i.fa-check-circle{
    color: #69E4A6;
}
#floatWindow .contentWindow .confirmVtn i.fa-times-circle{
    color: var(--colorRojo);
}

#floatWindow .contentWindow .confirmVtn i:hover{
    cursor: text;
}
#floatWindow .contentWindow .confirmVtn .btns{
    margin-top: 25px;
    color: var(--colorAzul);
    font-size: 1.2em;
    text-transform: uppercase;
}
#floatWindow .contentWindow .confirmVtn .btns input:last-child{
    color: var(--colorFontGeneral);
    background-color: var(--colorBlanco);
    border: 1px solid var(--colorFontGeneral);
    margin-left: 15px;
}
#floatWindow .contentWindow .confirmVtn .btns input:last-child:hover{
    background-color: var(--bgColor);
}

body .cartAdd{
    width: 100%;
    height: 50px;
    background-color: #69E4A6;
    position: fixed;
    z-index: 200;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
body .cartAdd p{
    color: var(--colorFontGeneral);
}
body .cartAdd i{
    color: var(--colorRojo);
    margin-left: 15px;
    font-size: 1.3em;
}
#errorCPass{
    color: #FF6565;
}
/* 
td {
	padding-top: 10px;
	padding-right: 15px;
}

h1{
	text-align: center;
	color:black;
}
#btn {
	display: inline-block;
    text-align: center;

}
#form {
    display: inline-block;
    text-align: center;
}
body {
    
    text-align: center;
} */


/*************/
/* comments area */
#comments { display: block; }

#comments .cmmnt, ul .cmmnt, ul ul .cmmnt { display: block; position: relative; padding-left: 65px; border-top: 1px solid #ddd; }

#comments .cmmnt .cmmnt-content { padding: 0px 3px; padding-bottom: 12px; padding-top: 8px; }

#comments .cmmnt .cmmnt-content header { font-size: 1.3em; display: block; margin-bottom: 8px; }

globalStyle.css
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    --color1: #3B3B53;
    --color2: #A3A0FB;
    --colorBlanco:#FFFFFF;
    --colorRojo: #FF6565;
    --colorAzul:#3B86FF;
    --bgColor:#F0F0F7;
    --colorDark:#4D4F5C;
    --colorBtns:#43425D;
}
.content{
    width: 90%;
    margin: auto;
}
body{
    background-color: var(--bgColor);
    font-family: 'Source Sans Pro', sans-serif;
}

/*-----HEADER-----------*/
body header{
    width: 100%;
    background-color: var(--color1);
}body header li{
    list-style: none;
}
body header a,span,i{
    display: block;
    text-decoration: none;
    color: var(--colorBlanco);
    font-size: .9em;
    padding: 5px;
}
body header i.fa-apple{
    font-size: 1.5em;
}
body header i.fa-apple:hover{
    color: var(--color2);
    cursor: pointer;
}
body header i.fa-shopping-cart{
    font-size: 1.3em;
}
body header i.fa-shopping-cart:hover{
    color: var(--color2);
    cursor: pointer;
}
body header i.fa-heart{
    font-size: 1.3em;
}
body header i.fa-heart:hover{
    color: var(--colorRojo);
    cursor: pointer;
}

body header a:hover,span:hover{
    color: var(--color2);
    cursor: pointer;
}
body header i{
    color: var(--colorBlanco);
    font-size: 25px;
}
body header .content{
    display: flex;
    justify-content: space-around;
    align-items: center;
}
/*------------MENU-----------------*/
body header .content .menu ul li i{
    font-size: .7em;
    margin-left: -4px;
}
body header .content .menu ul{
    display: flex;
    
}
body header .content .menu>ul>li{
    position: relative;
    float: left;
    padding: 10px 0;
    display: flex;
    align-items: center;
}
body header .content .menu ul ul{
    display: none;
    position: absolute;
    padding: 0;
    background-color: var(--colorBlanco);
    /* box-shadow: 1px 1px 10px 0px #000; */
    border-radius: 3px;
    width: 12em;   
    z-index: 100;
    top: 48px;
    box-shadow: 0px 0px 4px 0px rgba(0,0,0,.1);
}
body header .content .menu ul ul:before {
    content: "";
    position: absolute;
    top: -10px;
    left: 20px;
    width: 0;
    height: 0;
    border-width: 0 8px 13px;
    border-style: solid;
    border-color: transparent transparent var(--colorBlanco);
}

body header .content .menu ul ul li{ 
    float: none;
    border-bottom: 1px solid var(--bgColor);
}
body header .content .menu ul ul li:last-child{
    border: none;
}
body header .content .menu ul li ul li a:hover{
    color: var(--color2);
}
body header .content .menu ul ul a{
    line-height: 120%;
    padding: 10px 15px;
    color:#404040;
}
body header .content .menu ul ul a:hover{
    color: ver(--color2);
}
body header .content .menu ul li:hover>ul{
    display: block;
}

body header{
    background-color:#2e518b;;
}
/*-------------SEARCH BAR--------------------*/
header .content .search{
    display: flex;
    justify-content: center;
    align-items: center;
}

header .content .search .barSearch{
    position: relative;
}
header .content .search .barSearch input{
    padding: .7em 3.5em;
    border-radius: 20px;
    width: 25em;
    border: none;
    background-color: var(--colorBlanco);
}
header .content .search .barSearch i{
    color: var(--color1);
    opacity: .5;
    position: absolute;
    left: 5px;
    top: 3px;
    font-size: 1.3em;
}
header .content .sessionItems{
    display: flex;
    align-items: center;
}
header .content .sessionItems .imgUser{
    margin: 0 5px 0 25px;
    display: flex;
    align-items: center;
}
header .content .sessionItems .imgUser i{
    position: relative;
    padding: 10px;
}
header .content .sessionItems .imgUser i span{
    background-color: var(--colorRojo);
    color: #FFF;
    font-weight: 800;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: .5em;
    width: 19px;
    height: 19px;
    border: 2px solid var(--color1);
    text-align: center;
    border-radius: 50%;
    position: absolute;
    top: 0;
    right: 0;
}
header .content .sessionItems .imgUser img{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-left: 20px;
}
header .content .sessionItems .imgUser img:hover{
    opacity: .7;
}
/*-----CARDS-------*/
.content section {
    margin-top: 2em;
}
.content section>a{
    text-decoration: none;
    
}
.content section>a>h2{
    margin: 1.5em 0;
    color: var(--colorDark);
    font-size: 2em;  
}.content section>h2{
    margin: 1.5em 0;
    color: var(--colorDark);
    font-size: 2em;  
}
.content .contentCards{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-column-gap: 15px;
}
.content section article{
    background-color: var(--colorBlanco); 
}
.content .contentCards article{
    margin-top: 20px;
}
article .contentImg{
    width: 100%;
    position: relative;
}
article .contentImg img{
    width: 100%;
}
article .contentImg img:hover{
    opacity: .7;
    cursor: pointer;
}
article .contentImg>span{
    background: var(--colorRojo);
    width: 5em;
    font-size: .6em;
    text-align: center;
    border-radius: 20px;
    padding: .5em 0;
    position: absolute;
    top: 1em;
    left: 1em;
}
article .contentImg>span:hover{
    color: var(--colorBlanco)
}
article .contentImg .ranking{
    position: absolute;
    top: .5em;
    right: 1em;
    display: flex;
    align-items: center;
    background: rgba(0, 0, 0, .5);
    padding: 0px 5px;
    border-radius: 20px;
}
article .contentImg .ranking i{
    color: #FFCA83;
    font-size: 1.3em;
}
article .contentImg .ranking span{
    color: var(--colorBlanco);
    font-size: 1.1em;
}
article .contentImg .rankingi:hover{
    cursor: pointer;
}
article .contentDescription{
    display: flex;
    justify-content: space-between;
    margin: 2em 1em;
    
}
article .contentDescription .descripProduct{
    margin: 0 1em;
}
article .contentDescription .descripProduct a{
    text-decoration: none;
    color: var(--colorDark);
}
article .contentDescription .descripProduct a h2{
    font-size: 1.3em;
}
article .contentDescription .descripProduct p{
    overflow: hidden;
    height: 1.5em;
    font-size: .7em;
    color: var(--color1);
    opacity: .5;
}
article .contentDescription span{
    color: var(--colorAzul);
    font-size: 1.4em;
}

/*------FOOTER-----*/
footer{
    margin-top: 2em;
    width: 100%;
    background-color: #2e518b;;
}
footer .content{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap: 15em;;
    padding: 15px 0;
}
/*footer .content .listFooter ul{
    display: flex;
    flex-direction: column;
    justify-items: center;
    background-color: #3B86FF;
}*/

footer .content .listFooter h3{
    width: 100%;
    color: var(--colorBlanco);
    padding: 10px 0;
    margin-bottom: 10px;
    border-bottom: 1px solid var(--bgColor);
    font-size: 1.2em;

}
footer .content .listFooter a{
    display: block;
    text-decoration: none;
    color: var(--colorBlanco);
    font-size: 1em;
}
footer .content .listFooter a:hover{
    color: var(--color2);
}
footer .content .listFooter li{
    list-style: none;  
}
footer .content .infoFooter{
    grid-column: span 3;
    margin-top: 15px;
    border-top: 1px solid var(--bgColor);
    display: flex;
    justify-content: space-between;
    padding: 20px 0;
    color: var(--colorBlanco);
    font-size: .7em;
}
/*-----buttons------*/
body button, input[type=button], input[type=submit]{
    padding: 10px 30px;
    border: none;
    background-color: var(--colorBtns);
    border-radius: 5px;
    color: #F0F0F7;
    font-size: 11pt;
}
body button:hover, input[type=button]:hover, input[type=submit]:hover{
    background-color: #838296;
    cursor: pointer;
}
body button:active, input[type=button]:active, input[type=submit]:active{
    background-color: #2F2E50;
}


body select{
    background: var(--colorBlanco);
    border: 1px solid #D7DAE2;
    padding: 10px 40px 10px 15px;
    border-radius: 5px;
    font-size: 11pt;
    background-image: url(../../global/img/down.png); 
    background-repeat: no-repeat;
    background-position: right center;
    -webkit-appearance: none;
    -moz-appearance: none;
    -o-appearance: none;
    appearance:none;
}
body select::-ms-expand{
    display: none;
}
body select option {
    background-color: var(--colorBlanco);
    border: none;
}

/*-------FORMS-------*/
.form{
    background-color: #FFFFFF;
    text-align: center;
    width: 55%;
    margin: 25px auto;
}
.form form{
    display: flex;
    flex-direction: column;
    
    padding: 5em 10em;
}
.form form h2{
    text-transform: uppercase;
    letter-spacing: 4px;
    color: var(--colorBtns);
    font-size: 1.8em;
    margin-bottom: 15px;
}
.form form p{
    color: #4D4F5C;
    opacity: .5;
    font-size: .9em;
    margin-bottom: 50px;
}
.form form input{
    margin-bottom: 25px;
    padding: 10px 10px;
    border: none;
    border-bottom: 2px solid #E9E9F0; 
}

.form form input[type=checkbox]{
    border-radius: 6px;
}
.form form .remember label{
    margin-right: 16px;
    color: var(--colorBtns);
    font-size: .9em;
}
.form form .remember a{
    text-decoration: none;
    color: var(--colorAzul);
    font-size: .9em;
}
.form form .btns input{
    border: none;
    border-radius: 5px;
    padding: 10px 30px;
    margin-top: 15px;
}
.form form .btns input[type=button]{
    background: var(--colorBlanco);
    color: var(--colorBtns);
    border: 1px solid var(--colorBtns);
    margin-left: 15px;
    padding: 9px 40px;
    transition: all ease .5s;
}
.form form .btns input[type=button]:hover{
    border: transparent;
    color: var(--colorBlanco);
    background: var(--colorAzul);
}

body .headerImg{
    height: 6.5em;
    background-color: var(--bgColor);
    display: flex;
    justify-content: center;
    align-items: center;
    color: var(--colorBlanco);
    font-size: 5em;
    text-transform: uppercase;
    letter-spacing: 3px;
}
body .headerImg h1{
    font-size: .9em;
    text-transform: uppercase;
}
body .headerImg .bg{
    height: 100%;
    width: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: flex;
    justify-content: center;
    align-items: center;
}

body .storeInf .storeMap{
    margin-left: 50px;
    width: 50%;
    height: 450px;
}
body .storeInf .storeMap #map{
    height: 100%;
    width: 100%;
}
body .headerImg.pageError{
    background-color: var(--bgColor);
    flex-direction: column;
}
body .headerImg.pageError h2{
    color: var(--colorRojo);
    opacity: .4;
    font-size: 3em;
    font-weight: 900;
}
body .headerImg.pageError p{
    color: var(--colorDark);
    opacity: .5;
    font-size: .3em;
}
#floatWindow{
    background-color: rgba(0, 0, 0, 0.5);
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    transition: all ease 1s;
    z-index: 100;
    display: none;
    justify-content: center;
    align-items: center;
}
#floatWindow .contentMap{
    width: 80%;
    height: 500px;
}
#floatWindow #map{
    width: 100%;
    height: 100%;
    background-color: var(--bgColor);
    
}
#floatWindow i {
    color: var(--bgColor);
    font-size: 1.6em;
    float: right;
    z-index: 300;
}
#floatWindow i:hover{
    color: var(--colorRojo);
    cursor: pointer;
}

#floatWindow .contentWindow{
    background-color: var(--bgColor);
    position: relative;
}
#floatWindow .contentWindow i{
    position: absolute;
    top: 10px;
    right: 10px;
    color: var(--colorAzul);
}
#floatWindow .contentWindow i:hover{
    color: var(--colorRojo);
}

body .pageSuccess .contentSucce{
    width: 40%;
    height: 400px;
    background-color: #FFF;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 10px;
    text-align: center;
}
body .pageSuccess .contentSucce h2{
    font-size: .4em;
    color: var(--colorDark);
    opacity: .6;
    text-align: center;
}
body .pageSuccess .contentSucce p{
    font-size: .2em;
}
body .pageSuccess .contentSucce i{ 
    opacity: .5;
}
body .pageSuccess .contentSucce i.fa-check-circle{
    color: #69E4A6;
}
body .pageSuccess .contentSucce i.fa-times-circle{
    color: var(--colorRojo);
}


#iconmenu{
    width: 10%;
    height: 11%;
}

#imagenPri{
    width: 100%;
}

.h1nosotros {
    color: red;
   
   text-align: center;
    padding: 5%;
    font-size: 200%;

}
#videoYT{
    text-align: center;
    padding: 50px;
}

.p1nosotros{
    color: rgb(65, 60, 60);
  
    padding: 2%;
    font-size: 150%;

  }

  .imanoso{
      width: 100%;
      height: 10%;
  }

  .columna1{
    float: left;
    width: 100%;
    padding: 20px 200px;
	border-bottom: 2px solid rgba(70, 66, 66, 0.16);
	margin-bottom: 20px
    
}
    
    .columna22{
    float: initial;
        width: 35%;
        padding: 20px 100px;
        border-bottom: 2px solid rgba(70, 66, 66, 0.16);
        margin-bottom: 20px
    }
    
    #formularioc{
        text-align: center;
        background-image: url("../../img/img6.jpg");

        width: 150%;
    }

    #Contactanos{
        padding: 20px 0px;
        border-bottom: 2px solid rgba(70, 66, 66, 0.16);
        margin-bottom: 20px
    }
    
    #localM{
        padding: 20px 0px;
        border-bottom: 2px solid rgba(70, 66, 66, 0.16);
        margin-bottom: 20px
        
    }

pagina.css
body {
    width: 80%;
   
    max-width: 1500px;
    padding-left: 0.9%;
    padding-right: 0.9%;
    margin: 0px auto auto auto;
    clear: none;
    float: none;
    background-color: white;
    -moz-box-shadow: rgba(136, 147, 209, 0.9) 20px 0px 25px,  rgba(136, 147, 209, 0.9) -20px 0px 25px;
    -webkit-box-shadow: rgba(136, 147, 209, 0.9) 20px 0px 25px,  rgba(136, 147, 209, 0.9) -20px 0px 25px;
    box-shadow: rgba(136, 147, 209, 0.9) 20px 0px 25px,  rgba(136, 147, 209, 0.9) -20px 0px 25px;
}
html{
background-image: url("../img/img7.jpg");
background-size: 100%;
}

.formulario0 input{
    width: 100%;
    height: 100%;
}


/* menu css*/
/* menu */

.divmenu ul {
    list-style:none;
    margin:0;
    padding: 1px 1px;
   }
   
   /* items del menu */
   
   .divmenu ul li {
    background-color:#2e518b;
    width: 14.28%;
   }
   
   /* enlaces del menu */
   
   .divmenu ul li a {
    display:block;
    color:#fff;
    text-decoration:none;
    width: 100%;
    padding:10px;
    font-family:"HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform:uppercase;
    
   }
   
   /* items del menu */
   
   .divmenu ul li {
    position:relative;
    float:left;
    margin:0;
    padding:0;
   }
   
   /* efecto al pasar el ratón por los items del menu */
   
   .divmenu ul li:hover {
    background:#5b78a7;
 
}

/* menu desplegable */

.divmenu ul ul {
    display:none;
    position:absolute;
    background:#eee;
    padding:0;
   }
   
   /* items del menu desplegable */
   
   .divmenu ul ul li {
    float:none;
    width:190px;
   }

   
   /* enlaces de los items del menu desplegable */
   
   .divmenu ul ul a {
    line-height:100%;
    padding:5px 5px;
   }
   
   /* items del menu desplegable al pasar el ratón */
   
   .divmenu ul li:hover > ul {
    display:block;
   }

/*iconos menu */
#iconmenu{
    width: 10%;
    height: 11%;
}

#iconcarrito{
    width: 10%;
    height: 12%;
}

/*flotante facebook*/
.seccion {
    width: 50%;
    float: left;
}

.social{
    position:fixed;
    left: 0;
    top: 5px;
    
}

.social ul {
    list-style: none;
    padding: 1px 20px;
}
/*es para la publicodad de servicios*/
.social1{
    position:fixed;
    left: 0;
    top: 8px;
    text-align: left;
    
}
.social1 ul {
    list-style: none;
    padding: 15px 32px;
}

.social ul li .icon-mail4 { background:#666666;}
.social ul li .icon-whatsapp { background:green;}

 /*index transcicion*/

     
 .swiper-container {
    width: 100%;
    padding-top: 50px;
    padding-bottom: 50px;
  }
  .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 300px;
    height: 300px;

    border-radius:10px;
    border: white 3px inset;
  }
  .transcicion{
      /*background-color: rgb(15, 75, 134);*/
      width: 97%; 
    }
    .swiper-container{
       /* background-color: rgb(15, 75, 134);*/
       background-image: url("../../../../imagenes/formularioimg.jpg");
        background-size: 60%;
        background-size: 100%;
    }

    /*contenido del index*/
    .indexcontenido{
        text-align: justify;
     padding: 0px 20px;
          }

          .indexcontenido {
            width: 60%;
            float: left;
        }

        .imgcontenido {
            width: 30%;
            float: left;
            position: relative;
        }
        .imgcontenido1 {
            width: 30%;
            float: left;
            margin-left: 935px;
        }
        
        /*css para cuando el cursor pase por las opciones del maenu */           
        nav > ul > li > ul > :hover, nav > ul > li> ul >  :active { 
            text-decoration: none; 
           /* background-color: #ce726c;*/
            /*border-radius: 9px;*/
            border-bottom: 3px solid #ce726c;
        	
            }
            nav > ul >  :hover, nav > ul >    :active { 
                text-decoration: none; 
               /* background-color: #ce726c;*/
                /*border-radius: 9px;*/
                border-bottom: 3px solid #ce726c;
                
                }
            /*-------------------------------------------------------*/
              .footernos {
                      
                    text-align: center;
                    font-size: 1em;
                    margin-top: 4%;
                    background-color: rgb(15, 75, 134); 
                    color:black;
                    clear: both;
                    padding-bottom: 20px;
                }

/*--------------------- fin index css-------------------*/                
/*estilos de la pagina nosotros */

.h1nosotros {
    color: red;
   
   text-align: center;
    padding: 5%;
    font-size: 200%;

}

.p1nosotros{
    color: rgb(65, 60, 60);
    float: left;
    padding: 2%;
    font-size: 150%;

  }

  .imanoso{
    width: 100%;
    float: left;
    padding: 0%;
  }

  .imgabout{
    width: 40%;
    float: left;
}
 #videoYT{
     text-align: center;
     padding: 50px;
 }
/*-----------------------------------------*/
/* servicios css */
/*titulo */
.h1servicioss{
    color: red;
    text-align: center;
    size: 500%;
    float: none;
    padding: 3%;
    font-size: 200%;
}  
/*-------------------*/
.productos .produ .parrafo{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color: black;
    width: 100px;

  }

  /*productos */
  .produ  th{
    width: 600px;
    height: 380px;
    padding: 5px;
    background-color: #fcc;
    font-size: 0.8em;
    text-align: justify;
    
   }
   .produ h1{
    font-family: cursive;
   text-align:center;
    
   }
   .produ .imagenproductos img{
       width: 200px;
       height: 200px;
       display: block;
   }

 .imagenproductos{
    padding: 1px 15px;
}

/*----------------------------*/
.produ .imagenproductos img{
    width: 200px;
    height: 200px;
    display: block;
}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
.valoracion {
 position: relative;
 overflow: hidden;
 display: inline-block;
}
.valoracion input {
 position: absolute;
 top: -100px;
}
.valoracion label {
 float: right;
 color: #c1b8b8;
 font-size: 30px; 
}
.valoracion label:hover,
.valoracion label:hover ~ label,
.valoracion input:checked ~ label {
color: #ffff00;
text-shadow: 5px 5px 15px #AAA;
cursor: pointer;

}
.mensajes input {
    border: 0;
}

.produ{
 background-image: url("../img/img8.jpg");
 background-size: 100%;
border-radius: 10px;
}

.productos{
    background-color: rgb(255, 255, 255);
    border-radius: 2px ;
    border: rgb(114, 56, 56) 3px inset;
    
}

.video{
    padding: 20px 0px;
    border-bottom: 3px solid #5c5f96;
}

.perfil{
    border-radius: 20px;
 
}
/*---------- login css estilos ----------*/

.login-box{
    width:320px;
    height:360px ;
    background: rgb(235, 232, 197);
    color: #ffffffff;
    top: 45%;
    left: 50%;
    position: relative;
    transform: translate(-50%,-10%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.login-box .avatar{
    width: 100px;
    height: 100px;
    border-radius: 50px;
    position: absolute;
    top: -50px;
    left:calc(50% - 50px);
}
.login-box h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
    color: black;

}
.login-box label{
    margin: 0;
    padding: 0;
    font-weight: bold;
    display: block;
    color: black;
}
.login-box input{
    width: 100%;
    margin-bottom: 20px;
}
.login-box input [type="text"],
.login-box input [type="password"]{
    border: none;
    border-bottom: 1px solid #ffffffff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}

.login-box input[type="submit"]{
    border:none;
    outline: none;
    height: 40px;
    background: rgb(107, 129, 224);
    color: #fff;
font-size: 18px;
border-radius: 20px;
}
.login-box input[type="reset"]{
    border:none;
    outline: none;
    height: 40px;
    background: rgb(107, 129, 224);
    color: #fff;
font-size: 18px;
border-radius: 20px;
}

/*---------------------------------------*/

/*------------------Pagina de contactos---------------*/
#Contactanos{
    text-align: center;
}

#formularioc{
    text-align: center;
    background-image: url("../img/img6.jpg");
    padding: 1px 5px;
}

.columna1{
    padding: 0px 90px;
    
}

.columna2{
    padding: 50px 20px;
}

 .enviar{
    background: linear-gradient(rgb(63, 49, 138), rgb(161, 84, 78));
    border: 0;
    color: white;
    opacity: 0.8;
     cursor: pointer;
      border-radius: 25px;
      height: 40px;
    width:20%;
  }

/*---------------------------------------------------*/
/*------- formulario estilos --------------*/

.loginboxe{

    width:320px;
    height:750px ;
    background: rgb(235, 232, 197);
    color: rgb(0, 0, 0);
    top: 45%;
    left: 50%;
    position: relative;
    transform: translate(-50%,-10%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.loginboxe label{
    margin: 0;
    padding: 0;
    font-weight: bold;
    display: block;
    color: black;
}
.loginboxe input{
    width: 100%;
    margin-bottom: 20px;
}
.loginboxe input [type="text"],
.loginboxe input [type="password"]{
    border: none;
    border-bottom: 1px solid #ffffffff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}

.loginboxe input[type="submit"]{
    border:none;
    outline: none;
    height: 40px;
    background: rgb(107, 129, 224);
    color: #fff;
font-size: 18px;
border-radius: 20px;
}
.loginboxe input[type="reset"]{
    border:none;
    outline: none;
    height: 40px;
    background: rgb(107, 129, 224);
    color: #fff;
font-size: 18px;
border-radius: 20px;
}

/*-----------------------------------------*/

/*-----CARDS-------*/
.content section {
    margin-top: 2em;
}
.content section>a{
    text-decoration: none;
    
}
.content section>a>h2{
    margin: 1.5em 0;
    color: var(--colorDark);
    font-size: 2em;  
}.content section>h2{
    margin: 1.5em 0;
    color: var(--colorDark);
    font-size: 2em;  
}
.content .contentCards{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-column-gap: 15px;
}
.content section article{
    background-color: var(--colorBlanco); 
}
.content .contentCards article{
    margin-top: 20px;
}
article .contentImg{
    width: 100%;
    position: relative;
}
article .contentImg img{
    width: 100%;
}
article .contentImg img:hover{
    opacity: .7;
    cursor: pointer;
}
article .contentImg>span{
    background: var(--colorRojo);
    width: 5em;
    font-size: .6em;
    text-align: center;
    border-radius: 20px;
    padding: .5em 0;
    position: absolute;
    top: 1em;
    left: 1em;
}
article .contentImg>span:hover{
    color: var(--colorBlanco)
}
article .contentImg .ranking{
    position: absolute;
    top: .5em;
    right: 1em;
    display: flex;
    align-items: center;
    background: rgba(0, 0, 0, .5);
    padding: 0px 5px;
    border-radius: 20px;
}
article .contentImg .ranking i{
    color: #FFCA83;
    font-size: 1.3em;
}
article .contentImg .ranking span{
    color: var(--colorBlanco);
    font-size: 1.1em;
}
article .contentImg .rankingi:hover{
    cursor: pointer;
}
article .contentDescription{
    display: flex;
    justify-content: space-between;
    margin: 2em 1em;
    
}
article .contentDescription .descripProduct{
    margin: 0 1em;
}
article .contentDescription .descripProduct a{
    text-decoration: none;
    color: var(--colorDark);
}
article .contentDescription .descripProduct a h2{
    font-size: 1.3em;
}
article .contentDescription .descripProduct p{
    overflow: hidden;
    height: 1.5em;
    font-size: .7em;
    color: var(--color1);
    opacity: .5;
}
article .contentDescription span{
    color: var(--colorAzul);
    font-size: 1.4em;
}

/****Tabla descripcion productos**/
.restante table{
    
border-collapse: separate;
text-align: left;
caption-side: top;
letter-spacing: 2px;
}
.restante .tablapro h6{
    font-family: Georgia, 'Times New Roman', Times, serif;
    align-content: center;
}

.promedio table{
    
    border-collapse: separate;
    text-align: center;
    caption-side: top;
    letter-spacing: 1px;
    font-size: 20px;
    color: gray;
}

.promedio label:hover,
.promedio label:hover ~ label{

    color: #ffff00;
    text-shadow: 5px 5px 15px #AAA;
    cursor: pointer;
}


Imagenes

![img_producto](https://user-images.githubusercontent.com/46982373/70442997-55b27800-1a65-11ea-8bea-2f09b426f6cf.png)

![salir](https://user-images.githubusercontent.com/46982373/70442999-55b27800-1a65-11ea-9fa6-dbe778b4a4b7.png)

![user](https://user-images.githubusercontent.com/46982373/70443000-564b0e80-1a65-11ea-81c3-f189cd2c48ca.png)

![usu_login](https://user-images.githubusercontent.com/46982373/70443002-564b0e80-1a65-11ea-8b88-4fc842eeb0a6.png)

![arrow_bottom](https://user-images.githubusercontent.com/46982373/70443004-564b0e80-1a65-11ea-82cf-d9f992758e0a.png)


 
  








 
