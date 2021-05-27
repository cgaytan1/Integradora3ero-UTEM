-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2020 a las 02:01:58
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carxonline`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `borrar` (IN `nid` INT(11))  BEGIN
DELETE FROM usr WHERE id=nid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registro` (IN `id` INT(11), IN `nombre` VARCHAR(30), IN `app` VARCHAR(50), IN `apm` VARCHAR(50), IN `usuario` VARCHAR(20), IN `pass` VARCHAR(100), IN `rol` INT(11), IN `correo` VARCHAR(50), IN `genero` VARCHAR(50))  BEGIN
INSERT INTO usr VALUES (id, nombre, app, apm, usuario,pass, rol, correo, genero);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_usr`
--

CREATE TABLE `control_usr` (
  `id` int(11) NOT NULL,
  `tabla` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idres` int(11) DEFAULT NULL,
  `att` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `olddata` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `newdata` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `action` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dateedit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `control_usr`
--

INSERT INTO `control_usr` (`id`, `tabla`, `idres`, `att`, `olddata`, `newdata`, `action`, `user`, `dateedit`) VALUES
(1, 'usr', NULL, 'ALL_ATRIBUTES', NULL, '27', 'INSERT', 'root@localhost', '2019-08-09 09:01:03'),
(2, 'usr', NULL, 'ALL_ATRIBUTES', NULL, '28', 'INSERT', 'root@localhost', '2019-08-09 09:58:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_dv` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idprod` int(11) NOT NULL,
  `usr` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `prc_unitario` decimal(20,2) NOT NULL,
  `cant` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id_dv`, `idventa`, `idprod`, `usr`, `prc_unitario`, `cant`, `status`, `id_usr`) VALUES
(26, 162, 22, 'lot12', '85.00', 8, 'pendiente', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `categoria` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dic` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prc` decimal(10,2) DEFAULT NULL,
  `modelo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cant` int(6) DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `dic`, `prc`, `modelo`, `cant`, `imagen`) VALUES
(22, 'BolÃ­grafo fino BIC', 'Boligrafos', 'Paquete de 12 boligrafos BIC fino de 0.8 mm', '85.00', 'BICFINO', 10, '12.jpeg'),
(47, 'BolÃ­grafos BIC cristal', 'Boligrafos', 'Paquete de 13 boligrafos BIC fino de 0.8 mm', '50.00', 'DIAFINO', 20, '13.jpeg'),
(48, 'BolÃ­grafos PAPER MATE', 'Boligrafos', 'Paquete de 12 boligrafos Paper mate ', '65.00', 'PA0203', 15, '14.jpeg'),
(49, 'BolÃ­grafos BIC', 'Boligrafos', 'Paquete de 12 boligrafos BIC fino de 0.8 mm', '75.00', 'BIC crista', 15, '15.jpeg'),
(50, 'Broche latonado BARRILITO', 'Broches', 'Paquete de broches marca BACO', '80.00', 'LATOBAR', 10, '16.jpeg'),
(51, 'Broche BACO', 'Broches', 'Paquete de broches marca BACO', '50.00', 'BACOB', 15, '17.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr`
--

CREATE TABLE `usr` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `app` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apm` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usr`
--

INSERT INTO `usr` (`id`, `nombre`, `app`, `apm`, `usuario`, `pass`, `rol`, `correo`, `genero`) VALUES
(12, 'Loret', 'Hudson', 'Perez', 'lot12', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'lot@gmail.com', 'Masculino'),
(13, 'Cesar', 'Gaytan', 'Vargas', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'cesar@admin.com', 'Masculino'),
(14, 'Angel', 'Cabrera', 'Ceja', 'angel12', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'angel@gmail.com', 'Masculino'),
(15, 'Brunito', 'Porras', 'Ocampo', 'bruno12', 'da146e60619d5e8252c3c67597a566eb', 1, 'bruno@admin.com', 'Masculino'),
(17, 'Alfredo', 'MuÃ±oz', 'Perez', 'alfredo778', '5c2bf15004e661d7b7c9394617143d07', 0, 'alfredo@gmail.com', 'Masculino'),
(19, 'Guille', 'Del toro', 'Ortiz', 'guille77', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'guille@gmail.com', 'Masculino'),
(27, 'asdad', 'j', 'hjhn', 'hhjj', 'e10adc3949ba59abbe56e057f20f883e', 0, 'sdasd@asdas', 'Masculino'),
(28, 'Guille', 'Montes', 'De Oca', 'guille2', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'guille@gmail.com', 'Masculino');

--
-- Disparadores `usr`
--
DELIMITER $$
CREATE TRIGGER `control` AFTER INSERT ON `usr` FOR EACH ROW BEGIN
INSERT INTO control_usr (id,tabla, idres, att, olddata, newdata, action, user, dateedit)
VALUES
(NULL,'usr', NULL, 'ALL_ATRIBUTES', NULL, NEW.id, 'INSERT',
CURRENT_USER(),NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vempleados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vempleados` (
`id` int(11)
,`nombre` varchar(30)
,`app` varchar(50)
,`apm` varchar(50)
,`genero` varchar(50)
,`usuario` varchar(20)
,`correo` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `cve_transaccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `paypaldatos` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `correo` varchar(5000) COLLATE utf8_spanish_ci NOT NULL,
  `total` decimal(60,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `cve_transaccion`, `paypaldatos`, `fecha`, `correo`, `total`) VALUES
(157, 'lot12', 'jb2o46ge4k4lkhk0pfha8k9s7e', '2019-08-05 22:37:22', 'lot@gmail.com', '85.00'),
(158, 'lot12', 'jb2o46ge4k4lkhk0pfha8k9s7e', '2019-08-05 22:37:39', 'lot@gmail.com', '85.00'),
(159, 'lot12', 'jb2o46ge4k4lkhk0pfha8k9s7e', '2019-08-05 22:38:41', 'lot@gmail.com', '85.00'),
(160, 'lot12', 'jb2o46ge4k4lkhk0pfha8k9s7e', '2019-08-05 22:39:17', 'lot@gmail.com', '85.00'),
(161, 'lot12', 'jb2o46ge4k4lkhk0pfha8k9s7e', '2019-08-05 22:40:26', 'lot@gmail.com', '85.00'),
(162, 'lot12', 'jb2o46ge4k4lkhk0pfha8k9s7e', '2019-08-05 22:42:56', 'lot@gmail.com', '680.00');

-- --------------------------------------------------------

--
-- Estructura para la vista `vempleados`
--
DROP TABLE IF EXISTS `vempleados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vempleados`  AS  select `usr`.`id` AS `id`,`usr`.`nombre` AS `nombre`,`usr`.`app` AS `app`,`usr`.`apm` AS `apm`,`usr`.`genero` AS `genero`,`usr`.`usuario` AS `usuario`,`usr`.`correo` AS `correo` from `usr` where (`usr`.`rol` = 1) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `control_usr`
--
ALTER TABLE `control_usr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id_dv`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idprod` (`idprod`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `control_usr`
--
ALTER TABLE `control_usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id_dv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usr`
--
ALTER TABLE `usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`idprod`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ventas_ibfk_3` FOREIGN KEY (`id_usr`) REFERENCES `usr` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
