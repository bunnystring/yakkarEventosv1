-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2022 a las 06:39:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yakkareventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `idrol` int(11) NOT NULL,
  `nombrerol` varchar(45) DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Logisticos', 'Acceso a Eventos', 1),
(2, 'Jefe de Cocina', 'Acceso Productos', 1),
(22, 'Desarrollador', 'Acceso a todo el sistema', 1),
(23, 'Coordinador de Eventos', 'Acceso condicional', 1),
(24, 'Vendedores', 'Area ventas Yakkar', 0),
(25, 'Clientes', 'Clientes de yakkar', 0),
(26, 'Servicio al cliente', 'Servicio al cliente sistema yakkar', 1),
(27, 'Actualizar', 'aaaaa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `identificacion` bigint(20) NOT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `nombre`, `identificacion`, `celular`, `created_by`) VALUES
(3, 'Andres', 1022428023, 30084569631, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `identificacion` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `celular` bigint(12) NOT NULL,
  `cargo_fk` int(11) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL,
  `estado` int(1) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `identificacion`, `email`, `celular`, `cargo_fk`, `usuario`, `clave`, `token`, `estado`, `fecha_registro`) VALUES
(1, 'Silvio Hernandezito', '120202', 'acceron2@misena.edu.com', 23094234, 1, 'silvio', 'da4bb298d82e8b0c1cde703b60549806e385df057824e9c9b032167c945b0fa8', '', 0, '2022-07-12'),
(2, 'Julian Sanchez', '1002425', 'juliansanchez@gmail.com', 3005698323, 2, 'Julian2022', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '3205e1c1790364d38df6-421df7daa4dbdecd6025-53e94c363b3f6f490223-53987b724ea082af2b0d', 1, '2022-08-01'),
(6, 'Arlez Camilo Ceron Herrera', '1022428022', 'acceron2@misena.edu.co', 3008490788, 22, 'Camilo', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'e880800a3797c2b2bb6a-42a049cb7faaf5738f8e-22a545ef9007788b661d-8c3904ef46b0bfad08df', 1, '2022-09-18'),
(7, 'Juan Oliver', '52108758', 'camela455@hotmail.com', 3208614080, 1, 'Luz', 'da4bb298d82e8b0c1cde703b60549806e385df057824e9c9b032167c945b0fa8', '84a072e216eb77d5d367-f4cce2fcf791bce87a86-b5032f4267f0a1097ee7-a3412bfcfc086c321f48', 1, '2022-09-19'),
(8, 'Grupo ASD', '1022325', 'aceron@grupoasd.com', 3045760134, 22, 'ASD', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '', 0, '2022-09-22'),
(9, 'Camilo Ceron', '1022428023', 'comunicacionesbaderas@gmail.co', 3112325355, 22, 'Arlezitos', 'da4bb298d82e8b0c1cde703b60549806e385df057824e9c9b032167c945b0fa8', '', 0, '2022-09-22'),
(10, 'Camilo', '5255652', 'camilofreak@hotmail.com', 3008490788, 1, 'camnilo', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '', 1, '2022-10-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_Even` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `crono_actividades` varchar(250) NOT NULL,
  `estado_evento` varchar(45) NOT NULL,
  `lugar_evento` varchar(250) NOT NULL,
  `detalle_evento` varchar(250) NOT NULL,
  `observacion_evento` varchar(250) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_has_cliente`
--

CREATE TABLE `evento_has_cliente` (
  `Evento_id_Even` int(11) NOT NULL,
  `Cliente_id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_has_producto`
--

CREATE TABLE `evento_has_producto` (
  `Evento_id_Even` int(11) NOT NULL,
  `producto_id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` int(4) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Empleados', 'Empleados del sistema', 1),
(3, 'Clientes', 'Clientes Yakkar', 1),
(4, 'Productos', 'Todos los productos', 1),
(5, 'Pedidos', 'Pedidos', 1),
(6, 'Eventos', 'Eventos de yakkar', 1),
(7, 'Ventas', 'Ventas yakkar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` int(4) NOT NULL,
  `rolid` int(4) NOT NULL,
  `moduloid` int(4) NOT NULL,
  `r` int(4) NOT NULL,
  `w` int(4) NOT NULL,
  `u` int(4) NOT NULL,
  `d` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(15, 1, 1, 1, 1, 1, 1),
(16, 1, 2, 0, 0, 0, 0),
(17, 1, 3, 0, 0, 0, 0),
(18, 1, 4, 1, 1, 1, 0),
(19, 1, 5, 1, 1, 1, 0),
(20, 1, 6, 1, 1, 1, 0),
(21, 1, 7, 1, 1, 1, 0),
(29, 22, 1, 1, 1, 1, 1),
(30, 22, 2, 1, 1, 1, 1),
(31, 22, 3, 1, 1, 1, 1),
(32, 22, 4, 1, 1, 1, 1),
(33, 22, 5, 1, 1, 1, 1),
(34, 22, 6, 1, 1, 1, 1),
(35, 22, 7, 1, 1, 1, 1),
(43, 24, 1, 0, 0, 0, 0),
(44, 24, 2, 0, 0, 0, 0),
(45, 24, 3, 1, 1, 1, 0),
(46, 24, 4, 1, 0, 0, 0),
(47, 24, 5, 1, 0, 1, 0),
(48, 24, 6, 1, 0, 0, 0),
(49, 24, 7, 0, 0, 0, 0),
(50, 23, 1, 1, 1, 1, 1),
(51, 23, 2, 1, 1, 1, 1),
(52, 23, 3, 1, 1, 0, 0),
(53, 23, 4, 1, 1, 1, 1),
(54, 23, 5, 1, 0, 1, 0),
(55, 23, 6, 1, 1, 0, 0),
(56, 23, 7, 1, 1, 1, 0),
(57, 27, 1, 1, 0, 0, 0),
(58, 27, 2, 0, 0, 0, 0),
(59, 27, 3, 0, 0, 0, 0),
(60, 27, 4, 0, 0, 0, 0),
(61, 27, 5, 0, 0, 0, 0),
(62, 27, 6, 0, 0, 0, 0),
(63, 27, 7, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `serial` varchar(45) NOT NULL,
  `costo` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `marca`, `serial`, `costo`) VALUES
(1, 'Silla Plasticas', 'Rimax', 'XDASD4221332', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `valor_total` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_has_evento`
--

CREATE TABLE `venta_has_evento` (
  `venta_id_venta` int(11) NOT NULL,
  `Evento_id_Even` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_Cliente`),
  ADD KEY `created_by_idx` (`created_by`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `cargo_idx` (`cargo_fk`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_Even`),
  ADD UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`),
  ADD KEY `id_producto_idx` (`id_producto`);

--
-- Indices de la tabla `evento_has_cliente`
--
ALTER TABLE `evento_has_cliente`
  ADD PRIMARY KEY (`Evento_id_Even`,`Cliente_id_Cliente`),
  ADD KEY `fk_Evento_has_Cliente_Cliente1_idx` (`Cliente_id_Cliente`),
  ADD KEY `fk_Evento_has_Cliente_Evento1_idx` (`Evento_id_Even`);

--
-- Indices de la tabla `evento_has_producto`
--
ALTER TABLE `evento_has_producto`
  ADD PRIMARY KEY (`Evento_id_Even`,`producto_id_producto`),
  ADD KEY `fk_Evento_has_producto_producto1_idx` (`producto_id_producto`),
  ADD KEY `fk_Evento_has_producto_Evento1_idx` (`Evento_id_Even`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `evento_idx` (`id_evento`),
  ADD KEY `cliente_idx` (`id_cliente`);

--
-- Indices de la tabla `venta_has_evento`
--
ALTER TABLE `venta_has_evento`
  ADD PRIMARY KEY (`venta_id_venta`,`Evento_id_Even`),
  ADD KEY `fk_venta_has_Evento_Evento1_idx` (`Evento_id_Even`),
  ADD KEY `fk_venta_has_Evento_venta1_idx` (`venta_id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_Even` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `created_by` FOREIGN KEY (`created_by`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `cargo` FOREIGN KEY (`cargo_fk`) REFERENCES `cargos` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento_has_cliente`
--
ALTER TABLE `evento_has_cliente`
  ADD CONSTRAINT `fk_Evento_has_Cliente_Cliente1` FOREIGN KEY (`Cliente_id_Cliente`) REFERENCES `cliente` (`id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Evento_has_Cliente_Evento1` FOREIGN KEY (`Evento_id_Even`) REFERENCES `evento` (`id_Even`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento_has_producto`
--
ALTER TABLE `evento_has_producto`
  ADD CONSTRAINT `fk_Evento_has_producto_Evento1` FOREIGN KEY (`Evento_id_Even`) REFERENCES `evento` (`id_Even`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Evento_has_producto_producto1` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_Cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_Even`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta_has_evento`
--
ALTER TABLE `venta_has_evento`
  ADD CONSTRAINT `fk_venta_has_Evento_Evento1` FOREIGN KEY (`Evento_id_Even`) REFERENCES `evento` (`id_Even`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_has_Evento_venta1` FOREIGN KEY (`venta_id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
