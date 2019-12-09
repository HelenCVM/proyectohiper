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
						<li><a href="lista_facturas_eliminadas.php"><i class="fas fa-archive"></i> Lista de Facturas Eliminadas</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>