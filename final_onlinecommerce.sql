-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 23:08:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `onlinecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `descripcion`) VALUES
(1, 'Electrodomesticos'),
(2, 'Ropa'),
(3, 'Comida'),
(5, 'Zapatos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_locales`
--

CREATE TABLE `categorias_locales` (
  `idCategoriaLocal` int(11) NOT NULL,
  `nombreCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_locales`
--

INSERT INTO `categorias_locales` (`idCategoriaLocal`, `nombreCategoria`) VALUES
(1, 'Ropa'),
(2, 'Comida'),
(3, 'Electronica'),
(4, 'Comida'),
(5, 'Electronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `idContratos` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `Local_idLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetallePedido` int(11) NOT NULL,
  `OrdenPedido_idOrdenPedido` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precioUnitario` int(11) DEFAULT NULL,
  `Producto_idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`idDetallePedido`, `OrdenPedido_idOrdenPedido`, `cantidad`, `precioUnitario`, `Producto_idProducto`) VALUES
(1, 1, 10, 20000, 5),
(2, 1, 2, 30000, 6),
(3, 1, 3, 4000, 2),
(4, 2, 5, 100, 3),
(5, 2, 10, 20, 4),
(6, 3, 5, 40, 6),
(7, 3, 1, 20, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `idDevolucion` int(11) DEFAULT NULL,
  `cantidadDevuelta` int(11) DEFAULT NULL,
  `motivo` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idLocal` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `devoluciones`
--

INSERT INTO `devoluciones` (`idDevolucion`, `cantidadDevuelta`, `motivo`, `fecha`, `idLocal`, `idProducto`) VALUES
(NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `idEntregas` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `Estado_idEstado` int(11) NOT NULL,
  `OrdenPedido_idOrdenPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`idEntregas`, `fecha`, `direccion`, `Estado_idEstado`, `OrdenPedido_idOrdenPedido`) VALUES
(1, '2023-09-03', 'cr18#4c30', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `tipo`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `montoTotal` int(11) DEFAULT NULL,
  `Entregas_idEntregas` int(11) NOT NULL,
  `Entregas_OrdenPedido_idOrdenPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `fecha`, `montoTotal`, `Entregas_idEntregas`, `Entregas_OrdenPedido_idOrdenPedido`) VALUES
(1, '2023-09-05', 20000, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL,
  `idLocal` int(11) DEFAULT NULL,
  `Producto_idProducto` int(11) NOT NULL,
  `Stock` int(11) DEFAULT NULL,
  `idTipoMovimiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idInventario`, `idLocal`, `Producto_idProducto`, `Stock`, `idTipoMovimiento`) VALUES
(1, 1, 1, 50, 1),
(2, 1, 4, 15, 1),
(3, 1, 7, 30, 1),
(4, 2, 2, 10, 1),
(5, 2, 5, 25, 2),
(6, 2, 8, 18, 2),
(7, 6, 3, 50, 1),
(8, 6, 6, 22, 1),
(9, 6, 4, 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `nombreLocal` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `barrio` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `categoria_local` int(11) NOT NULL,
  `nit_empresa` varchar(50) NOT NULL,
  `descripcion_tienda` varchar(200) NOT NULL,
  `logo_tienda` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `habilitar` int(11) NOT NULL DEFAULT 1,
  `idLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`nombreLocal`, `direccion`, `barrio`, `correo`, `telefono`, `categoria_local`, `nit_empresa`, `descripcion_tienda`, `logo_tienda`, `facebook`, `instagram`, `habilitar`, `idLocal`) VALUES
('CAMLTASKS', 'Calle 57c sur 77i 60', 'Nueva roma', 'c.a.m.l.123@hotmail.com', 2147483647, 1, '65945', 'nuevo elemento', 'dashboard/upload/11_12_2023_02_16net.png', 'https://fa', 'https://fa', 1, 1),
('Local Uno', '123 Calle Principal', '', '', 0, 0, '', '', '', '', '', 1, 2),
('Local Dos', '456 Avenida Secundaria', '', '', 0, 0, '', '', '', '', '', 1, 3),
('Local Tres', '789 Calle Secundaria', '', '', 0, 0, '', '', '', '', '', 1, 4),
('Local Cuatro', '321 Avenida Principal', '', '', 0, 0, '', '', '', '', '', 1, 5),
('Local Cinco', '654 Avenida Central', '', '', 0, 0, '', '', '', '', '', 1, 6),
('Local Seis', '987 Calle Central', '', '', 0, 0, '', '', '', '', '', 1, 7),
('Local Siete', '741 Avenida Principal', '', '', 0, 0, '', '', '', '', '', 1, 8),
('Local Ocho', '852 Calle Secundaria', '', '', 0, 0, '', '', '', '', '', 1, 9),
('Local Nueve', '963 Avenida Central', '', '', 0, 0, '', '', '', '', '', 1, 10),
('Local Diez', '147 Calle Principal', '', '', 0, 0, '', '', '', '', '', 1, 11),
('Tienda fanny', 'CL 57C SUR 77I 60 BQ 5 AP 110', 'Britalia', 'tienda@fanny.com', 2147483647, 2, '24564', 'Tienda de comidas rapidas', 'dashboard/upload/11_12_2023_22_34net.png', 'https://re', 'https://re', 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenpedido`
--

CREATE TABLE `ordenpedido` (
  `idOrdenPedido` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ordenpedido`
--

INSERT INTO `ordenpedido` (`idOrdenPedido`, `fecha`, `total`) VALUES
(1, '2023-09-03', 272000),
(2, '2023-09-13', 700),
(3, '2023-08-10', 220);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE `privilegio` (
  `idPrivilegios` int(11) NOT NULL,
  `Tipo` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`idPrivilegios`, `Tipo`) VALUES
(1, 'Select'),
(2, 'Update'),
(3, 'Delete'),
(4, 'Insert');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `nombreProducto` varchar(45) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  `descripcion` longtext NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `id_usuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`nombreProducto`, `precio`, `Categoria_idCategoria`, `descripcion`, `imagen`, `deleted`, `id_usuario`, `idProducto`) VALUES
('Diadema gamer', 150000, 1, 'dafa', 'dashboard/upload/11_12_2023_21_13diadema.png', 0, 0, 1),
('Lavadora', 500, 1, '', '', 0, 22, 2),
('Refrigerador', 700, 1, '', '', 0, 0, 3),
('Microondas', 100, 1, '', '', 0, 0, 4),
('Camiseta', 20, 2, '', '', 0, 0, 5),
('Pantalones', 30, 2, '', '', 0, 0, 6),
('Vestido', 40, 2, '', '', 0, 0, 7),
('Arroz', 3, 3, '', '', 0, 0, 8),
('Pasta', 2, 3, '', '', 0, 0, 9),
('Carne de Res', 9, 3, '', '', 0, 0, 10),
('Licuadora', 40, 1, '', '', 0, 0, 11),
('Aspiradora', 90, 1, '', '', 0, 0, 12),
('Chaqueta de Cuero', 100, 2, '', '', 0, 0, 13),
('Sombrero de Sol', 15, 2, '', '', 0, 0, 14),
('Leche', 2, 3, '', '', 0, 0, 15),
('Cereal', 3, 3, '', '', 0, 0, 16),
('Televisor', 500, 1, '', '', 0, 0, 17),
('Diadema gamer', 150000, 1, 'dafa', 'dashboard/upload/11_12_2023_21_15diadema.png', 1, 22, 18),
('Diadema gamer', 150000, 1, 'dafa', 'dashboard/upload/11_12_2023_21_27diadema.png', 0, 22, 19),
('Diadema gamer', 150000, 1, 'dafa', 'dashboard/upload/11_12_2023_21_27diadema.png', 1, 22, 20),
('Pc gamer', 580000, 1, 'Nuevo pc gamer', 'dashboard/upload/11_12_2023_21_31pc.png', 0, 22, 21),
('Pc gamer', 580000, 1, 'Nuevo pc gamer', 'dashboard/upload/11_12_2023_21_31pc.png', 1, 22, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Tendero'),
(3, 'Domiciliario'),
(4, 'Comprador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_has_privilegios`
--

CREATE TABLE `rol_has_privilegios` (
  `Rol_idRol` int(11) NOT NULL,
  `Privilegios_idPrivilegios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idSolicitudes` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `Local_idLocal` int(11) NOT NULL,
  `TipoSolicitud_idTipoSolicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovimiento`
--

CREATE TABLE `tipomovimiento` (
  `idTipoMovimiento` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipomovimiento`
--

INSERT INTO `tipomovimiento` (`idTipoMovimiento`, `descripcion`) VALUES
(1, 'Entrada'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposolicitud`
--

CREATE TABLE `tiposolicitud` (
  `idTipoSolicitud` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `cedula` int(11) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `Rol_idRol` int(11) NOT NULL DEFAULT 4,
  `contrasena` varchar(250) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `barrio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombre`, `cedula`, `direccion`, `Rol_idRol`, `contrasena`, `user_name`, `apellido`, `barrio`) VALUES
(1, 'juan', 100155056, 'Cr18#4c30', 1, '12345', '', '', ''),
(2, 'Ana María', 200225178, 'Av. Principal #123', 2, '2323', '', '', ''),
(3, 'Carlos Pérez', 300356789, 'Calle Secundaria #45', 1, NULL, '', '', ''),
(4, 'Laura González', 400489012, 'Calle 5A #67', 2, NULL, '', '', ''),
(5, 'David López', 500512345, 'Av. Central #789', 1, NULL, '', '', ''),
(6, 'María Rodríguez', 600633022, 'Calle 7B #90', 1, NULL, '', '', ''),
(7, 'Pedro García', 700744123, 'Av. Principal #456', 2, NULL, '', '', ''),
(8, 'Sofía Martínez', 800855234, 'Calle 10A #32', 1, NULL, '', '', ''),
(9, 'Luis Torres', 900966345, 'Av. Central #789', 3, NULL, '', '', ''),
(10, 'Ana María Pérez', 1000111123, 'Cr18#4c30', 1, NULL, '', '', ''),
(20, 'Sebastian', 1000155056, 'cr18#4c30', 1, '12334', '', '', ''),
(21, 'Pedro', 79611418, 'cr18#4c30', 4, '1101', '', '', ''),
(22, 'Alejandro pruebas', 1000, 'Calle 57', 2, '123', 'c.a.m.l.123@hotmail.com', '', ''),
(24, 'Alejandro', NULL, NULL, 4, '123', 'carlos@gmail.com', 'Maldonado', ''),
(26, 'sebastian', NULL, NULL, 4, '123Sebastian.', 'sebastian@gmail.com', 'rodriguez', ''),
(27, 'prueba', NULL, NULL, 2, '123', 'prueba@gmail.com', 'prueba', ''),
(28, 'Admin', NULL, NULL, 1, '123', 'admin@onlinecommerce.com', 'Admin', ''),
(29, 'normal', NULL, NULL, 4, '123', 'normal@gmail.com', 'normal', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `Local_idLocal` int(11) NOT NULL,
  `Factura_idFactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVentas`, `fecha`, `Local_idLocal`, `Factura_idFactura`) VALUES
(1, '2023-09-04', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vs_invenariodetails`
--

CREATE TABLE `vs_invenariodetails` (
  `nombreLocal` varchar(45) DEFAULT NULL,
  `nombreProducto` varchar(45) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vs_usuariosroles`
--

CREATE TABLE `vs_usuariosroles` (
  `nombre` varchar(45) DEFAULT NULL,
  `cedula` int(11) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vs_ventasdetails`
--

CREATE TABLE `vs_ventasdetails` (
  `idVentas` int(11) DEFAULT NULL,
  `idFactura` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nombreLocal` varchar(45) DEFAULT NULL,
  `montoTotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `categorias_locales`
--
ALTER TABLE `categorias_locales`
  ADD PRIMARY KEY (`idCategoriaLocal`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`idContratos`,`Local_idLocal`),
  ADD KEY `Local_idLocal` (`Local_idLocal`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetallePedido`,`OrdenPedido_idOrdenPedido`) USING BTREE,
  ADD KEY `OrdenPedido_idOrdenPedido` (`OrdenPedido_idOrdenPedido`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`idEntregas`,`OrdenPedido_idOrdenPedido`),
  ADD KEY `OrdenPedido_idOrdenPedido` (`OrdenPedido_idOrdenPedido`),
  ADD KEY `Estado_idEstado` (`Estado_idEstado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`,`Entregas_idEntregas`,`Entregas_OrdenPedido_idOrdenPedido`),
  ADD KEY `Entregas_idEntregas` (`Entregas_idEntregas`),
  ADD KEY `Entregas_OrdenPedido_idOrdenPedido` (`Entregas_OrdenPedido_idOrdenPedido`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD KEY `idLocal` (`idLocal`),
  ADD KEY `idTipoMovimiento` (`idTipoMovimiento`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`idLocal`);

--
-- Indices de la tabla `ordenpedido`
--
ALTER TABLE `ordenpedido`
  ADD PRIMARY KEY (`idOrdenPedido`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`idPrivilegios`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `Categoria_idCategoria` (`Categoria_idCategoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `rol_has_privilegios`
--
ALTER TABLE `rol_has_privilegios`
  ADD PRIMARY KEY (`Rol_idRol`,`Privilegios_idPrivilegios`),
  ADD KEY `Privilegios_idPrivilegios` (`Privilegios_idPrivilegios`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idSolicitudes`,`Local_idLocal`),
  ADD KEY `Local_idLocal` (`Local_idLocal`),
  ADD KEY `TipoSolicitud_idTipoSolicitud` (`TipoSolicitud_idTipoSolicitud`);

--
-- Indices de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  ADD PRIMARY KEY (`idTipoMovimiento`);

--
-- Indices de la tabla `tiposolicitud`
--
ALTER TABLE `tiposolicitud`
  ADD PRIMARY KEY (`idTipoSolicitud`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `Rol_idRol` (`Rol_idRol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVentas`,`Factura_idFactura`),
  ADD KEY `Local_idLocal` (`Local_idLocal`),
  ADD KEY `Factura_idFactura` (`Factura_idFactura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias_locales`
--
ALTER TABLE `categorias_locales`
  MODIFY `idCategoriaLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `idLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ordenpedido`
--
ALTER TABLE `ordenpedido`
  MODIFY `idOrdenPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`Local_idLocal`) REFERENCES `local` (`idLocal`);

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`OrdenPedido_idOrdenPedido`) REFERENCES `ordenpedido` (`idOrdenPedido`);

--
-- Filtros para la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD CONSTRAINT `devoluciones_ibfk_1` FOREIGN KEY (`idLocal`) REFERENCES `local` (`idLocal`);

--
-- Filtros para la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`OrdenPedido_idOrdenPedido`) REFERENCES `ordenpedido` (`idOrdenPedido`),
  ADD CONSTRAINT `entregas_ibfk_2` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Entregas_idEntregas`) REFERENCES `entregas` (`idEntregas`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`Entregas_OrdenPedido_idOrdenPedido`) REFERENCES `ordenpedido` (`idOrdenPedido`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`idLocal`) REFERENCES `local` (`idLocal`),
  ADD CONSTRAINT `inventario_ibfk_4` FOREIGN KEY (`idTipoMovimiento`) REFERENCES `tipomovimiento` (`idTipoMovimiento`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `rol_has_privilegios`
--
ALTER TABLE `rol_has_privilegios`
  ADD CONSTRAINT `rol_has_privilegios_ibfk_1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `rol_has_privilegios_ibfk_2` FOREIGN KEY (`Privilegios_idPrivilegios`) REFERENCES `privilegio` (`idPrivilegios`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`Local_idLocal`) REFERENCES `local` (`idLocal`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`TipoSolicitud_idTipoSolicitud`) REFERENCES `tiposolicitud` (`idTipoSolicitud`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
