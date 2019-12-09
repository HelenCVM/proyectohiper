-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-12-2019 a las 17:42:14
-- Versión del servidor: 10.1.41-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mangueras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calificaciones`
--

CREATE TABLE `Calificaciones` (
  `cali_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `cali_valor` int(11) DEFAULT NULL,
  `cali_comentario` varchar(255) DEFAULT NULL,
  `usu_codigo` int(11) NOT NULL,
  `cali_estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Calificaciones`
--

INSERT INTO `Calificaciones` (`cali_codigo`, `pro_codigo`, `cali_valor`, `cali_comentario`, `usu_codigo`, `cali_estado`) VALUES
(5, 50, 4, 'buen producto', 101, 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `car_id` int(11) NOT NULL,
  `PRODUCTO_pro_id` int(11) NOT NULL,
  `USUARIO_usu_id` int(11) NOT NULL,
  `car_cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE `Categoria` (
  `cate_codigo` int(11) NOT NULL,
  `cate_nombre` varchar(50) NOT NULL,
  `cate_eliminado` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`cate_codigo`, `cate_nombre`, `cate_eliminado`) VALUES
(10, 'INDUSTRIALES', 'N'),
(11, 'HIDRAULICAS', 'N'),
(12, 'ALTA TEMPERATURA', 'N'),
(13, 'ALTAS', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comentarios`
--

CREATE TABLE `Comentarios` (
  `com_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `com_comentario` varchar(255) NOT NULL,
  `com_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `com_eliminado` varchar(1) NOT NULL,
  `com_cali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Comentarios`
--

INSERT INTO `Comentarios` (`com_codigo`, `usu_codigo`, `pro_codigo`, `com_comentario`, `com_fecha`, `com_eliminado`, `com_cali`) VALUES
(8, 103, 45, 'Excelente producto, de gran calidad.', '2019-12-09 05:01:55', 'N', 0),
(9, 103, 44, 'Excelente calidad, y precios super comodos.', '2019-12-09 14:23:00', 'N', 0),
(11, 103, 45, 'TEST DE COMETARIO', '2019-12-09 15:29:49', 'N', 2),
(12, 103, 45, 'TEST DE COMENTARIO', '2019-12-09 15:55:35', 'N', 5),
(13, 103, 45, 'TEST DE COMENTARIO', '2019-12-09 15:56:05', 'N', 5),
(14, 103, 49, 'Producto de excelente calidad', '2019-12-09 16:05:25', 'N', 4),
(15, 103, 43, 'Este producto es bueno', '2019-12-09 16:40:22', 'N', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nit` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `iva` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nit`, `nombre`, `razon_social`, `telefono`, `email`, `direccion`, `iva`) VALUES
(1, '123456789', 'IMPORTMANGUERASIV', '65464684', '0123456789', 'contac@importmanguerasiv.com', 'CUENCA', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Direccion`
--

CREATE TABLE `Direccion` (
  `dir_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `ciu_nombre` varchar(30) NOT NULL,
  `pro_nombre` varchar(30) NOT NULL,
  `dir_calle_principal` varchar(100) NOT NULL,
  `dir_calle_secundaria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Direccion`
--

INSERT INTO `Direccion` (`dir_codigo`, `usu_codigo`, `ciu_nombre`, `pro_nombre`, `dir_calle_principal`, `dir_calle_secundaria`) VALUES
(2, 103, 'gualaceo', 'azuay', 'heroes del 41', 'beningno vazquez'),
(3, 104, 'azogues', 'cañar', 'av. marcial guillen', 'av. marcial guillen'),
(4, 106, 'azogues', 'cañar', 'azogues', 'azogues');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Factura`
--

CREATE TABLE `Factura` (
  `fac_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `fac_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fac_subtotal` decimal(6,2) NOT NULL,
  `fac_iva` decimal(6,2) NOT NULL,
  `fac_total` decimal(6,2) NOT NULL,
  `fac_metodoPago` varchar(30) NOT NULL,
  `fac_tarjeta` int(11) NOT NULL,
  `fac_eliminado` varchar(1) NOT NULL,
  `fac_estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Factura`
--

INSERT INTO `Factura` (`fac_codigo`, `usu_codigo`, `fac_fecha`, `fac_subtotal`, `fac_iva`, `fac_total`, `fac_metodoPago`, `fac_tarjeta`, `fac_eliminado`, `fac_estado`) VALUES
(16, 103, '2019-12-09 05:34:24', '65.00', '8.00', '73.00', 'Tarjeta', 4, 'N', 'creado'),
(17, 103, '2019-12-09 04:57:56', '50.00', '6.00', '56.00', 'Tarjeta', 4, 'S', 'creado'),
(18, 103, '2019-12-09 13:51:20', '19.99', '2.00', '22.00', 'Tarjeta', 4, 'N', 'creado'),
(19, 103, '2019-12-09 13:53:26', '28.50', '3.00', '32.00', 'Tarjeta', 4, 'S', 'creado'),
(20, 104, '2019-12-09 16:13:44', '25.99', '3.00', '29.00', 'Tarjeta', 5, 'N', 'creado'),
(21, 103, '2019-12-09 16:42:54', '37.99', '5.00', '43.00', 'Tarjeta', 4, 'N', 'creado'),
(22, 106, '2019-12-09 16:57:25', '120.99', '15.00', '136.00', 'Tarjeta', 6, 'N', 'creado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FacturaDetalle`
--

CREATE TABLE `FacturaDetalle` (
  `facd_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `facd_cantidad` int(11) NOT NULL,
  `fac_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `FacturaDetalle`
--

INSERT INTO `FacturaDetalle` (`facd_codigo`, `pro_codigo`, `facd_cantidad`, `fac_codigo`) VALUES
(31, 50, 1, 16),
(32, 63, 1, 16),
(33, 50, 1, 17),
(34, 45, 1, 18),
(35, 44, 1, 19),
(36, 59, 1, 19),
(37, 43, 1, 20),
(38, 43, 1, 21),
(39, 65, 1, 21),
(40, 50, 1, 22),
(41, 51, 1, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Producto`
--

CREATE TABLE `Producto` (
  `pro_codigo` int(11) NOT NULL,
  `cate_codigo` int(11) NOT NULL,
  `pro_nombre` varchar(100) NOT NULL,
  `pro_img` text NOT NULL,
  `pro_marca` varchar(50) NOT NULL,
  `pro_descripcion` mediumtext NOT NULL,
  `pro_dia_in` varchar(6) NOT NULL,
  `pro_peso_gm` varchar(6) NOT NULL,
  `pro_presi_bar` varchar(6) NOT NULL,
  `pro_long_m` varchar(6) NOT NULL,
  `pro_precio` decimal(6,2) NOT NULL,
  `pro_stock` int(11) NOT NULL,
  `pro_eliminado` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Producto`
--

INSERT INTO `Producto` (`pro_codigo`, `cate_codigo`, `pro_nombre`, `pro_img`, `pro_marca`, `pro_descripcion`, `pro_dia_in`, `pro_peso_gm`, `pro_presi_bar`, `pro_long_m`, `pro_precio`, `pro_stock`, `pro_eliminado`) VALUES
(43, 10, 'WATER FLEX', 'img_7a385480df6fdb2922a5719b96f660c5.jpg', 'GATES', 'Succión y descarga para servicio de succion, descarga y limpieza de tanques septicos. Tubería ligera y flexible constituida por PVC plastificado con espiral de refuerzo de PVC rígido antichoc, elementos que le brindan la flexibilidad de una manguera.', '0.7500', '270', '9', '0.5000', '25.99', 100, 'N'),
(44, 10, 'MASTERFLEX HD', 'img_4989c8a2f149b1b6b1c7dc47f22ea8ff.jpg', 'GATES', 'Tubería ligera y flexible constituida por PVC plastificado con espiral de refuerzo de PVC rígido antichoc. Superficie interna lisa. Excelente resistencia en aspiración e impulsión.', '1', '450', '8', '0.5000', '23.50', 75, 'N'),
(45, 10, 'MASTERFLEX BLUE SPIRAL', 'img_82e1ba3d75dfa845a7fa5dcb5b81b7db.jpg', 'GATES', 'Tubería ligera y flexible constituida por PVC plastificado con espiral de refuerzo de PVC rígido antichoc. Superficie interna lisa. Buena resistencia en aspiración e impulsión. ', '0.7500', '300', '7', '0.5000', '19.99', 50, 'N'),
(46, 10, 'MASTER WIND', 'img_9fa145b61e2494c8ab59fcef7e321296.jpg', 'GATES', 'Tubería ligera y flexible constituida por PVC plastificado y por espiral de refuerzo de PVC rígido antichoc, lo que lo hace muy flexible. Resistente a la acción de los agentes atmosféricos y a numerosos productos químicos.', '0.3125', '90', '1.5', '0.6000', '22.99', 20, 'N'),
(47, 10, 'MASTER DUCT HEAVY', 'img_ce665e4fb9745503c0e7564aad89eedc.jpg', 'GATES', 'Tubería ligera y flexible constituida por PVC plastificado y por espiral de refuerzo de PVC rígido antichoc, lo que lo hace muy flexible. Resistente a la acción de los agentes atmosféricos y a numerosos productos químicos. Interior liso. Fabricado con Com', '4', '2000', '2.5', '0.5000', '26.99', 20, 'N'),
(48, 10, 'MASTER DUCT MEDIUM', 'img_f1a9f70c79b1e5a2f1b1840b2d7e3245.jpg', 'GATES', 'Tubería ligera y flexible constituida por PVC plastificado y por espiral de refuerzo de PVC rígido antichoc, lo que lo hace muy flexible. Resistente a la acción de los agentes atmosféricos.', '4', '1260', '2', '0.5000', '33.00', 25, 'N'),
(49, 10, 'VACUUM', 'img_599455b9aa5891a357b7f9991c5683ea.jpg', 'GATES', 'Tubería corrugada, muy ligera y flexible fabricada con distintos tipos de EVA. Elementos que le confieren flexibilidad y resistencia al esfuerzo e impacto.', '1.25', '175', '2', '15', '60.00', 30, 'N'),
(50, 10, 'VACUUM BICAPA', 'img_94c5596d635240633d9115dbfdcfa93f.jpg', 'GATES', 'Tubería corrugada muy ligera y flexible constituida por Polietileno de baja densidad y EVA. Elementos que le confieren flexibilidad y resistencia al esfuerzo e impacto. Resistente a la fricción por arrastre.', '1.25', '200', '2.5', '15', '50.00', 60, 'N'),
(51, 10, 'VACUUM PVC', 'img_90efd1443928f9feae7812c86c26864e.jpg', 'GATES', 'Tubería ligera y muy flexible, constituida por PVC con un refuerzo en espiral rígido antichoc, lo que le confiere una gran flexibilidad y una alta resistencia al impacto. Resistencia a la fricción por arrastre. ', '1.25', '300', '2', '0.5000', '70.99', 15, 'N'),
(52, 10, 'BEVERAGE DUCT', 'img_3ce7ed048a463951ae231803fdad993a.jpg', 'GATES', 'Tubería robusta, atóxica, constituida por PVC plastificado con un refuerzo en espiral rígido antichoc, elementos que le confieren la flexibilidad de una manguera y la resistencia de un tubo rígido. Superficie interna lisa. Resistente a la acción de los ag', '0.5000', '180', '10', '0.5000', '45.99', 27, 'N'),
(53, 10, 'TRANSFER KRYSTAL LIGHT', 'img_951201236d0d643009e3e2b5189c9640.jpg', 'GATES', 'Tubería ligera y flexible constituida por PVC plastificado y por espiral de refuerzo de PVC. Rígido antichoc, lo que lo hace muy flexible. Resistente a la acción de los agentes atmosféricos y a numerosos productos químicos.', '0.6250', '168', '7', '0.5000', '37.99', 12, 'N'),
(54, 10, 'ELECTRON LIGHT', 'img_fbf7382f6cb0ad033802e0958dadf67b.jpg', 'GATES', 'Tubería ligera y flexible constituida por PVC plastificado y por espiral de refuerzo de PVC rígido antichoc, lo que lo hace muy flexible. Resistente a la acción de los agentes atmosféricos y a numerosos productos químicos, con excelentes propiedades aisla', '0.3750', '80', '2', '0.5000', '14.99', 68, 'N'),
(58, 11, 'AIRE VACIO', 'img_4e6a27178e290e8f62918214e4e18d32.jpg', 'PVC', 'Apropiada para aspiración de partículas en suspension ', '55', '120', '23', '130', '2.00', 10, 'N'),
(59, 11, 'ALTA PRESION', 'img_eb5221f8ea2e43aba09b134307e02912.jpg', 'DISENSA', 'Son llamadas mangueras de dos alambres porque generar alta presion', '123', '56', '45', '48', '5.00', 12, 'N'),
(60, 11, 'BAJA PRESION', 'img_8e0debad55185dcabf2cf8215780b1d8.jpg', 'PVC', 'Tubería robusta, atóxica, constituida por PVC plastificado con un refuerzo en espiral rígido antichoc', '23', '65', '15', '125', '6.00', 15, 'N'),
(61, 11, 'CORAZA', 'img_1fb5065e8a26efe44a6d2480958e7d5c.jpg', 'PVC', 'Recomentado para la transferencia de polvo, perdigones, materiales granulares.', '56', '14', '125', '53', '5.00', 16, 'N'),
(62, 11, 'DRAGA', 'img_82124ff1ae47a085077bfd90e7835023.jpg', 'PVC', '. Resistente a la acción de los agentes atmosféricos y a un gran número de productos químicos.', '65', '45', '12', '15', '15.00', 16, 'N'),
(63, 12, 'CALENTADOR', 'img_ae2e78e288e1ca78bbbc31cdd6f64565.jpg', 'PVC', 'Ducto Constituido por PVC plastificado con refuerzo de PVC semi-rigido antichoc. ', '15', '26', '15', '15', '15.00', 12, 'N'),
(64, 12, 'FLEXIBLE HIERRO', 'img_e9fd0698201def9ccce7cb841f446516.jpg', 'PVC', 'Tubería ligera corrugada, fabricada en polietileno de alta densidad.', '62', '65', '15', '12', '3.00', 15, 'N'),
(65, 12, 'NEOPREN', 'img_ac83b0c0b29d5db74e14821b9af1731c.jpg', 'PVC', ' Resistente a la acción de los agentes atmosféricos y a un gran número de productos químicos', '32', '56', '15', '14', '12.00', 13, 'S'),
(68, 11, 'MARQUEZ', 'img_producto.png', 'MARQUEZ', 'Asdasdasd', '154', '15', '154', '15', '45.00', 45, 'N'),
(69, 12, 'NUEVO', 'img_producto.png', 'NUEO', 'asdasdasd', '15', '15', '15', '15', '15.00', 15, 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tarjeta`
--

CREATE TABLE `Tarjeta` (
  `tar_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `tar_numero` varchar(16) NOT NULL,
  `tar_fechaVen` date NOT NULL,
  `tar_nombreU` varchar(50) NOT NULL,
  `tar_cvv` varchar(3) NOT NULL,
  `tar_tipo` varchar(20) NOT NULL,
  `tar_pais` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Tarjeta`
--

INSERT INTO `Tarjeta` (`tar_codigo`, `usu_codigo`, `tar_numero`, `tar_fechaVen`, `tar_nombreU`, `tar_cvv`, `tar_tipo`, `tar_pais`) VALUES
(4, 103, '2123456789112233', '0000-00-00', 'daniel guzman', '593', 'MasterCard', 'ecuador'),
(5, 104, '1234 1234 1234 1', '0000-00-00', 'edwin marquez', '984', 'MasterCard', 'ecuador'),
(6, 106, '1234567894578956', '0000-00-00', 'asdasd', '155', 'MasterCard', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `usu_codigo` int(11) NOT NULL,
  `usu_cedula` varchar(10) NOT NULL,
  `usu_rol` varchar(5) NOT NULL DEFAULT 'user',
  `usu_nombres` varchar(50) NOT NULL,
  `usu_apellidos` varchar(50) NOT NULL,
  `usu_fecha_nacimiento` date NOT NULL,
  `usu_telefono` varchar(10) NOT NULL,
  `usu_correo` varchar(100) NOT NULL,
  `usu_password` varchar(255) NOT NULL,
  `usu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
  `usu_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usu_fecha_modificacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`usu_codigo`, `usu_cedula`, `usu_rol`, `usu_nombres`, `usu_apellidos`, `usu_fecha_nacimiento`, `usu_telefono`, `usu_correo`, `usu_password`, `usu_eliminado`, `usu_fecha_creacion`, `usu_fecha_modificacion`) VALUES
(1, '1401069131', 'admin', 'DANIEL DIONICIO', 'GUZMAN CHUVA', '1999-07-10', '0958758905', 'admin@importmanguerasiv.com', '25f9e794323b453885f5181f1b624d0b', 'N', '2019-12-01 02:55:49', '2019-12-01 03:55:33'),
(103, '1724934110', 'user', 'daniel', 'guzman', '1999-10-10', '0958758904', 'dguzmanc4@est.ups.edu.ec', '81dc9bdb52d04dc20036dbd8313ed055', 'S', '2019-12-09 16:45:00', '2019-12-09 16:45:00'),
(104, '0302127022', 'user', 'JAVIER', 'MARQUEZ', '1999-08-26', '0983353730', 'emarquezl@est.ups.edu.ec', '81dc9bdb52d04dc20036dbd8313ed055', 'S', '2019-12-09 16:48:10', '2019-12-09 16:48:10'),
(105, '1724934111', 'user', 'CINTHIA', 'IZA', '1998-08-23', '0987129327', 'cinthia@gmail.com', '11f76e80bf26e54e26f209f072259a08', 'N', '2019-12-09 16:48:23', '2019-12-09 16:48:23'),
(106, '0302127055', 'user', 'cristian', 'marquez', '1998-04-20', '0983353730', 'cmarquezl@est.ups.edu.ec', '202cb962ac59075b964b07152d234b70', 'N', '2019-12-09 16:57:05', '2019-12-09 16:57:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Calificaciones`
--
ALTER TABLE `Calificaciones`
  ADD PRIMARY KEY (`cali_codigo`),
  ADD KEY `Calificaciones_Libro` (`pro_codigo`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`car_id`);

--
-- Indices de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`cate_codigo`);

--
-- Indices de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`com_codigo`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Direccion`
--
ALTER TABLE `Direccion`
  ADD PRIMARY KEY (`dir_codigo`);

--
-- Indices de la tabla `Factura`
--
ALTER TABLE `Factura`
  ADD PRIMARY KEY (`fac_codigo`);

--
-- Indices de la tabla `FacturaDetalle`
--
ALTER TABLE `FacturaDetalle`
  ADD PRIMARY KEY (`facd_codigo`),
  ADD KEY `FacturaDetalle_Libro` (`pro_codigo`);

--
-- Indices de la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`pro_codigo`),
  ADD KEY `cate_producto` (`cate_codigo`);

--
-- Indices de la tabla `Tarjeta`
--
ALTER TABLE `Tarjeta`
  ADD PRIMARY KEY (`tar_codigo`),
  ADD KEY `Tarjeta_Usuario` (`usu_codigo`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD UNIQUE KEY `Usuario_ak_1` (`usu_cedula`,`usu_correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Calificaciones`
--
ALTER TABLE `Calificaciones`
  MODIFY `cali_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `cate_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  MODIFY `com_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Direccion`
--
ALTER TABLE `Direccion`
  MODIFY `dir_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Factura`
--
ALTER TABLE `Factura`
  MODIFY `fac_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `FacturaDetalle`
--
ALTER TABLE `FacturaDetalle`
  MODIFY `facd_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `Producto`
--
ALTER TABLE `Producto`
  MODIFY `pro_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `Tarjeta`
--
ALTER TABLE `Tarjeta`
  MODIFY `tar_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Calificaciones`
--
ALTER TABLE `Calificaciones`
  ADD CONSTRAINT `Calificaciones_Libro` FOREIGN KEY (`pro_codigo`) REFERENCES `Producto` (`pro_codigo`);

--
-- Filtros para la tabla `FacturaDetalle`
--
ALTER TABLE `FacturaDetalle`
  ADD CONSTRAINT `FacturaDetalle_Libro` FOREIGN KEY (`pro_codigo`) REFERENCES `Producto` (`pro_codigo`);

--
-- Filtros para la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD CONSTRAINT `cate_producto` FOREIGN KEY (`cate_codigo`) REFERENCES `Categoria` (`cate_codigo`);

--
-- Filtros para la tabla `Tarjeta`
--
ALTER TABLE `Tarjeta`
  ADD CONSTRAINT `Tarjeta_Usuario` FOREIGN KEY (`usu_codigo`) REFERENCES `Usuario` (`usu_codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
