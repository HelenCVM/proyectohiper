<?php
	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;
	/*session_start();
	if(emptyisset($_SESSION['isLogin']))
	{
		header('location: ../');
	}*/

	include "configDB.php";
	require_once '../pdf/vendor/autoload.php';
	use Dompdf\Dompdf;

	if(empty($_REQUEST['cl']) || empty($_REQUEST['f']))
	{
		echo "No es posible generar la factura.";
	}else{
		$codCliente = $_REQUEST['cl'];
		$noFactura = $_REQUEST['f'];
		$anulada = '';
		$sql="SELECT * FROM configuracion";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$configuracion = $result->fetch_assoc();
		}

		$sqlF="SELECT f.fac_codigo, DATE_FORMAT(f.fac_fecha,'%d/%m/%Y') as fecha, DATE_FORMAT(f.fac_fecha,'%H:%i:%s') as  hora, f.usu_codigo, cl.usu_cedula, cl.usu_nombres, cl.usu_apellidos, cl.usu_telefono, dir.ciu_nombre, dir.dir_calle_principal,dir.dir_calle_secundaria
		FROM Factura f
		INNER JOIN Usuario cl
		ON f.usu_codigo= cl.usu_codigo
		INNER JOIN Direccion dir 
		ON f.usu_codigo=dir.usu_codigo
		WHERE f.fac_codigo = $noFactura AND f.usu_codigo =$codCliente AND f.fac_eliminado='N'";
		/*$query = mysqli_query($conection,"SELECT f.nofactura, DATE_FORMAT(f.fecha, '%d/%m/%Y') as fecha, DATE_FORMAT(f.fecha,'%H:%i:%s') as  hora, f.codcliente, f.estatus,
												 v.nombre as vendedor,
												 cl.nit, cl.nombre, cl.telefono,cl.direccion
											FROM factura f
											INNER JOIN usuario v
											ON f.usuario = v.idusuario
											INNER JOIN cliente cl
											ON f.codcliente = cl.idcliente
											WHERE f.nofactura = $noFactura AND f.codcliente = $codCliente  AND f.estatus != 10 ");*/
		$result1 = $conn->query($sqlF);
		if ($result1->num_rows > 0) {
			$factura = $result1->fetch_assoc();							

			if($factura['fac_estado'] == 'anulado'){
				$anulada = '<img class="anulada" src="img/anulado.png" alt="Anulada">';
			}

			/*$query_productos = mysqli_query($conection,"SELECT p.descripcion,dt.cantidad,dt.precio_venta,(dt.cantidad * dt.precio_venta) as precio_total
														FROM factura f
														INNER JOIN detallefactura dt
														ON f.nofactura = dt.nofactura
														INNER JOIN producto p
														ON dt.codproducto = p.codproducto
														WHERE f.nofactura = $no_factura ");
			$result_detalle = mysqli_num_rows($query_productos);*/

			$sqlPro="SELECT p.pro_nombre,dt.facd_cantidad,p.pro_precio,(dt.facd_cantidad * p.pro_precio) as precio_total
			FROM Factura f
			INNER JOIN FacturaDetalle dt
			ON f.fac_codigo = dt.fac_codigo
			INNER JOIN Producto p
			ON dt.pro_codigo = p.pro_codigo
			WHERE f.fac_codigo =$noFactura ";
			$result_detalle = $conn->query($sqlPro);

			ob_start();
		    include(dirname('__FILE__').'/factura.php');
		    $html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf();

			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('letter', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			ob_get_clean();
			// Output the generated PDF to Browser
			$dompdf->stream('factura_'.$noFactura.'.pdf',array('Attachment'=>0));
			exit;
		}
	}

?>