-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2026 a las 20:32:04
-- Versión del servidor: 8.0.36
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `malditacarlita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cestas`
--

CREATE TABLE `cestas` (
  `idCesta` int UNSIGNED NOT NULL,
  `idProducto` int UNSIGNED NOT NULL,
  `cantidadCesta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `codigoDescuento` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidadDescuento` decimal(2,2) NOT NULL,
  `fechaValidez` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `idDevolucion` int NOT NULL,
  `idProducto` int UNSIGNED NOT NULL,
  `idPagoDevolucion` int NOT NULL,
  `razonDevolucion` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fechaDevolucion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaRecepcion` date DEFAULT NULL,
  `estadoDevolucion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidadDevolucion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `idEnvio` int UNSIGNED NOT NULL,
  `fechaEnvio` date NOT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `estadoEnvio` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'Enviado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int UNSIGNED NOT NULL,
  `fechaMensaje` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `textoMensaje` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `respondido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idPago` int UNSIGNED NOT NULL,
  `idTransaccion` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cantidadPago` int UNSIGNED NOT NULL,
  `fechaPago` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `realizadoPago` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_devoluciones`
--

CREATE TABLE `pagos_devoluciones` (
  `idPagoDevolucion` int NOT NULL,
  `fechaPagoDevolucion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cantidadPagoDevolucion` decimal(10,2) NOT NULL,
  `realizadoPago` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int UNSIGNED NOT NULL,
  `idUsuario` int UNSIGNED NOT NULL,
  `idCesta` int UNSIGNED NOT NULL,
  `idPago` int UNSIGNED NOT NULL,
  `idEnvio` int UNSIGNED NOT NULL,
  `codigoDescuento` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `idDevolucion` int UNSIGNED DEFAULT NULL,
  `cantidadPedido` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int UNSIGNED NOT NULL,
  `nombreProducto` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `cantidad` int UNSIGNED NOT NULL,
  `stockProducto` int NOT NULL DEFAULT '1',
  `medidas` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `materiales` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `colores` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `categoriaProducto` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `precio` decimal(10,2) UNSIGNED NOT NULL,
  `imagen` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `idTransaccion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `metodoPago` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaTransaccion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autorizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int UNSIGNED NOT NULL,
  `idPedido` int UNSIGNED DEFAULT NULL,
  `idMensaje` int UNSIGNED DEFAULT NULL,
  `nombreUsuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int UNSIGNED NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cp` int UNSIGNED NOT NULL,
  `localidad` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `provincia` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contrasenha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `autorizado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cestas`
--
ALTER TABLE `cestas`
  ADD PRIMARY KEY (`idCesta`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`codigoDescuento`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`idDevolucion`),
  ADD KEY `fk_devoluciones_productos` (`idProducto`),
  ADD KEY `fk_devoluciones_pagos_devoluciones` (`idPagoDevolucion`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`idEnvio`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMensaje`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `fk_pagos_transacciones` (`idTransaccion`);

--
-- Indices de la tabla `pagos_devoluciones`
--
ALTER TABLE `pagos_devoluciones`
  ADD PRIMARY KEY (`idPagoDevolucion`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_pedidos_envios` (`idEnvio`),
  ADD KEY `fk_pedidos_cestas` (`idCesta`),
  ADD KEY `fk_pedidos_pagos` (`idPago`),
  ADD KEY `fk_pedidos_usuarios` (`idUsuario`),
  ADD KEY `fk_pedidos_descuentos` (`codigoDescuento`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `nombreProducto` (`nombreProducto`),
  ADD KEY `categoriaProducto` (`categoriaProducto`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`idTransaccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `fk_usuarios_pedidos` (`idPedido`),
  ADD KEY `fk_usuarios_mensajes` (`idMensaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cestas`
--
ALTER TABLE `cestas`
  MODIFY `idCesta` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `idDevolucion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `idEnvio` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idPago` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos_devoluciones`
--
ALTER TABLE `pagos_devoluciones`
  MODIFY `idPagoDevolucion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD CONSTRAINT `fk_devoluciones_pagos_devoluciones` FOREIGN KEY (`idPagoDevolucion`) REFERENCES `pagos_devoluciones` (`idPagoDevolucion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_devoluciones_productos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_transacciones` FOREIGN KEY (`idTransaccion`) REFERENCES `transacciones` (`idTransaccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_cestas` FOREIGN KEY (`idCesta`) REFERENCES `cestas` (`idCesta`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_pedidos_descuentos` FOREIGN KEY (`codigoDescuento`) REFERENCES `descuentos` (`codigoDescuento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedidos_envios` FOREIGN KEY (`idEnvio`) REFERENCES `envios` (`idEnvio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedidos_pagos` FOREIGN KEY (`idPago`) REFERENCES `pagos` (`idPago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pedidos_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_mensajes` FOREIGN KEY (`idMensaje`) REFERENCES `mensajes` (`idMensaje`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios_pedidos` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
