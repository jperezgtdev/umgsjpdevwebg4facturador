-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2023 a las 03:08:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS g4facturador;

USE g4facturador;


--
-- Base de datos: `g4facturador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cliente_id` int(11) NOT NULL,
  `Cliente_nombre` varchar(45) NOT NULL,
  `Cliente_apellido` varchar(45) NOT NULL,
  `Cliente_nit` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cliente_id`, `Cliente_nombre`, `Cliente_apellido`, `Cliente_nit`) VALUES
(1, 'Chris', 'Espana', NULL),
(2, 'María', 'Gómez', NULL),
(3, 'Carlos', 'López', NULL),
(4, 'Ana', 'Martínez', NULL),
(5, 'Luis', 'Rodríguez', NULL),
(6, 'Laura', 'Fernández', NULL),
(7, 'Pedro', 'García', NULL),
(8, 'Marta', 'Luna', NULL),
(9, 'Sara', 'Vega', NULL),
(10, 'Javier', 'Navarro', NULL),
(11, 'Pedro', 'Porro', NULL),
(12, 'Manuelito', 'Diego', NULL),
(13, 'mitzi', 'mia', NULL),
(14, 'pepe', 'pepe', NULL),
(15, 'Doris', 'Garcia', NULL),
(25, 'Miguel', 'Ohara', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `Compra_id` int(11) NOT NULL,
  `Compra_descripcion` varchar(45) NOT NULL,
  `Compra_cantidad` varchar(45) NOT NULL,
  `Compra_monto` varchar(45) NOT NULL,
  `Compra_metodo_pago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `detalle_id` int(11) NOT NULL,
  `Detalle_Venta_id` int(11) NOT NULL,
  `Detalle_Producto_id` int(11) NOT NULL,
  `Detalle_descripcion` varchar(45) NOT NULL,
  `Detalle_cantidad` varchar(45) NOT NULL,
  `Detalle_precioUnitario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`detalle_id`, `Detalle_Venta_id`, `Detalle_Producto_id`, `Detalle_descripcion`, `Detalle_cantidad`, `Detalle_precioUnitario`) VALUES
(1, 14, 1, 'producto 1', '1', '23'),
(2, 19, 1, 'producto1', '1', '23'),
(3, 20, 1, 'segundo insert', '23', '1'),
(4, 21, 1, 'tercer insert', '23', '1'),
(5, 23, 1, 'descripcion 1', '1', '12'),
(6, 24, 4, 'desc1', '1', '12'),
(7, 24, 5, 'desc2', '2', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Estado_id` int(11) NOT NULL,
  `Estado_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Estado_id`, `Estado_descripcion`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `Login_Usuario_id` int(11) NOT NULL,
  `Login_email` varchar(45) NOT NULL,
  `Login_pass` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodopago`
--

CREATE TABLE `metodopago` (
  `MetodoPago_id` int(11) NOT NULL,
  `MetodoPago_Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `metodopago`
--

INSERT INTO `metodopago` (`MetodoPago_id`, `MetodoPago_Descripcion`) VALUES
(1, 'Tarjeta de Crédito'),
(2, 'Transferencia Bancaria'),
(3, 'Efectivo'),
(4, 'Cheque'),
(5, 'Pago Móvil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Pedido_Compra_id` int(11) NOT NULL,
  `Pedido_Proveedor_id` int(11) NOT NULL,
  `Pedido_fechaCompra` varchar(45) NOT NULL,
  `Pedido_vencimiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Producto_id` int(11) NOT NULL,
  `Producto_nombre` varchar(255) NOT NULL,
  `Producto_stock` varchar(255) NOT NULL,
  `Producto_Proveedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Producto_id`, `Producto_nombre`, `Producto_stock`, `Producto_Proveedor_id`) VALUES
(1, 'producto1', '23', 1),
(4, 'producto 2', '22', 1),
(5, 'producto 3', '26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Proveedor_id` int(11) NOT NULL,
  `Proveedor_name` varchar(45) NOT NULL,
  `Proveedor_direccion` varchar(45) NOT NULL,
  `Proveedor_categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Proveedor_id`, `Proveedor_name`, `Proveedor_direccion`, `Proveedor_categoria`) VALUES
(1, 'Proveedor A', 'Dirección A', 'Categoría 1'),
(2, 'Proveedor B', 'Dirección B', 'Categoría 2'),
(3, 'Proveedor C', 'Dirección C', 'Categoría 1'),
(4, 'Proveedor D', 'Dirección D', 'Categoría 3'),
(5, 'Proveedor E', 'Dirección E', 'Categoría 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Rol_id` int(11) NOT NULL,
  `Rol_Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Rol_id`, `Rol_Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Normal'),
(3, 'Editor'),
(4, 'Invitado'),
(5, 'Moderador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usuario_id` int(11) NOT NULL,
  `Usuario_nombre` varchar(45) NOT NULL,
  `Usuario_apellido` varchar(45) NOT NULL,
  `Usuario_email` varchar(45) NOT NULL,
  `Usuario_password` varchar(45) NOT NULL,
  `Usuario_estado` int(45) NOT NULL,
  `Usuario_Rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usuario_id`, `Usuario_nombre`, `Usuario_apellido`, `Usuario_email`, `Usuario_password`, `Usuario_estado`, `Usuario_Rol_id`) VALUES
(1, 'Chris', 'Espana', 'cespana@gmail.com', '1214df4f35bd00203a43dec71f5c4f34c1fe1263', 1, 1),
(2, 'María', 'Gómez', 'maria@example.com', '393fc26f61a55b0a5419750bd1af46ed3e536593', 1, 2),
(3, 'Carlos', 'López', 'carlos@example.com', '3f3d83c0bd93b08a1a8f1413d6d9930e4f58dae0', 1, 2),
(4, 'Ana', 'Martínez', 'ana@example.com', '895f2d81ad5aac236d946caf58df425959cf1e0b', 1, 3),
(5, 'Luis', 'Rodríguez', 'luis@example.com', '343426bb03403951e16a88cae93077e1ca90b16a', 1, 3),
(6, 'Laura', 'Fernández', 'laura@example.com', 'e1773cc9a936c95d88cfd8de2900232ec44c0ccb', 1, 3),
(7, 'Pedro', 'García', 'pedro@example.com', 'ff55498d9d779567fc173880c6a742b501934bb2', 1, 4),
(8, 'Marta', 'Luna', 'marta@example.com', 'c719edb2e6b67e0d073eddf2c763caa6d8312cec', 1, 4),
(9, 'Sara', 'Vega', 'sara@example.com', '5672879ff6b2c19efdab1a756b9cf6affb4e296f', 1, 5),
(10, 'Javier', 'Navarro', 'javier@example.com', '154def606da1c679916fc057a6a7840ff923d637', 1, 5),
(11, 'Pedro', 'Porro', 'pedropro@example.com', '35d8978e618c56d6cdd78d67d3374c4bda92e47d', 1, 1),
(12, 'Manuelito', 'Diego', 'manuel@example.com', 'c52516fdf85a45cd8c5a43630b5c78573e464d6d', 1, 2),
(13, 'mitzi', 'mia', 'mmia@example.com', '9ea0fd28b413ef192eddf5a69e6f4e84931d6f7c', 1, 3),
(14, 'pepe', 'pepe', 'pepe@example.com', '413ccd0ae68d640052689ec7696600e69fd7f355', 1, 4),
(15, 'Doris', 'Garcia', 'dg@gmail.com', '1214df4f35bd00203a43dec71f5c4f34c1fe1263', 1, 1),
(16, 'Miguel', 'Ohara', 'mg@gmail.com', '1214df4f35bd00203a43dec71f5c4f34c1fe1263', 1, 1),
(17, 'Jenner', 'Perez', 'jperezgtdev@gmail.com', sha1('Patito23'), 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `Venta_id` int(11) NOT NULL,
  `Venta_Cliente_id` int(11) NOT NULL,
  `Venta_fecha` varchar(45) NOT NULL,
  `Venta_MetodoPago_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`Venta_id`, `Venta_Cliente_id`, `Venta_fecha`, `Venta_MetodoPago_id`) VALUES
(1, 25, '2023-08-12', 1),
(2, 25, '2023-08-13', 3),
(3, 25, '2023-08-13', 3),
(4, 15, '2023-08-02', 2),
(5, 10, '2023-08-15', 1),
(6, 15, '2023-08-28', 1),
(7, 15, '2023-08-28', 1),
(8, 4, '2023-08-26', 1),
(9, 4, '2023-08-26', 1),
(10, 14, '2023-08-05', 1),
(11, 14, '2023-08-05', 1),
(12, 14, '2023-08-04', 3),
(13, 13, '2023-08-10', 3),
(14, 25, '2023-08-09', 1),
(15, 25, '2023-08-27', 1),
(16, 6, '2023-08-26', 3),
(17, 15, '2023-08-26', 2),
(18, 15, '2023-08-26', 2),
(19, 25, '2023-08-26', 2),
(20, 25, '2023-08-26', 4),
(21, 25, '2023-08-26', 2),
(22, 15, '2023-08-28', 2),
(23, 13, '2023-08-28', 2),
(24, 10, '2023-08-28', 2),
(25, 25, '2023-08-28', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cliente_id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`Compra_id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `fk_Detalle_Venta` (`Detalle_Venta_id`),
  ADD KEY `fk_Detalle_Producto` (`Detalle_Producto_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Estado_id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD KEY `fk_Login_Usuario1` (`Login_Usuario_id`);

--
-- Indices de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  ADD PRIMARY KEY (`MetodoPago_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Pedido_Compra_id`,`Pedido_Proveedor_id`),
  ADD KEY `fk_Compra_has_Proveedor_Proveedor1` (`Pedido_Proveedor_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Producto_id`),
  ADD KEY `fk_Producto_Proveedor` (`Producto_Proveedor_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Proveedor_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Rol_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Usuario_id`),
  ADD KEY `fk_Usuario_Rol1` (`Usuario_Rol_id`),
  ADD KEY `fk_UsuarioEstado` (`Usuario_estado`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`Venta_id`),
  ADD KEY `fk_Venta_Cliente1` (`Venta_Cliente_id`),
  ADD KEY `fk_Venta_MetodoPago` (`Venta_MetodoPago_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `Compra_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Proveedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `Venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `fk_DetalleVenta_a_Venta` FOREIGN KEY (`Detalle_Venta_id`) REFERENCES `venta` (`Venta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Detalle_Producto` FOREIGN KEY (`Detalle_Producto_id`) REFERENCES `producto` (`Producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Detalle_Venta` FOREIGN KEY (`Detalle_Venta_id`) REFERENCES `venta` (`Venta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_has_Producto_Producto1` FOREIGN KEY (`Detalle_Producto_id`) REFERENCES `producto` (`Producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_Login_Usuario1` FOREIGN KEY (`Login_Usuario_id`) REFERENCES `usuario` (`Usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Compra_has_Proveedor_Compra1` FOREIGN KEY (`Pedido_Compra_id`) REFERENCES `compra` (`Compra_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Compra_has_Proveedor_Proveedor1` FOREIGN KEY (`Pedido_Proveedor_id`) REFERENCES `proveedor` (`Proveedor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Proveedor` FOREIGN KEY (`Producto_Proveedor_id`) REFERENCES `proveedor` (`Proveedor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_UsuarioEstado` FOREIGN KEY (`Usuario_estado`) REFERENCES `estado` (`Estado_id`),
  ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`Usuario_Rol_id`) REFERENCES `rol` (`Rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_Venta_Cliente1` FOREIGN KEY (`Venta_Cliente_id`) REFERENCES `cliente` (`Cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_MetodoPago` FOREIGN KEY (`Venta_MetodoPago_id`) REFERENCES `metodopago` (`MetodoPago_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
