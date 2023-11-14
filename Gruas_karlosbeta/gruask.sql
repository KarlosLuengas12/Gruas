-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 21:22:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gruask`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corralones`
--

CREATE TABLE `corralones` (
  `IdCorralon` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `lat` decimal(10,6) NOT NULL,
  `longi` decimal(10,6) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `diaslaboral` varchar(150) NOT NULL,
  `region` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `corralones`
--

INSERT INTO `corralones` (`IdCorralon`, `nombre`, `lat`, `longi`, `direccion`, `diaslaboral`, `region`) VALUES
(6, 'Corralon zaragoza', 19.044700, -98.197900, 'Av 2 Ote 3f, Centro histórico de Puebla, 72000 Puebla, Pue., México', 'Martes,Viernes,Domingo', 1),
(7, 'chulavista', 19.034500, -98.210800, 'Av. 33 Pte. 702, Chulavista, 72420 Puebla, Pue., México', 'Lunes,Sábado', 1),
(9, 'Corralon 4', 19.045800, -98.197200, 'Av. 4 Ote. 6, Centro histórico de Puebla, 72000 Puebla, Pue., México', 'Lunes,Martes,Domingo', 2),
(10, 'Corralon 5', 19.050500, -98.185700, 'Calz. de los Fuertes 6, Rincón del Bosque, 72290 Puebla, Pue., México', 'Martes,Viernes,Domingo', 3),
(11, 'Corralon 6', 19.040000, -98.220000, 'Av. 31 Pte. 2114, Los Volcanes, 72410 Puebla, Pue. México', 'Lunes,Sábado', 3),
(12, 'Corralon 7', 19.030000, -98.200000, 'Av. Manuel Espinosa Yglesias 620, Ladrillera de Benítez, 72530 Puebla, Pue., México', 'Miercoles,Jueves,Viernes\r\n', 4),
(13, 'Corralon 8', 19.055000, -98.207500, 'Av 12 Pte 1522, San Miguelito, 72000 Puebla, Pue., México', 'Lunes,Martes,Sabado,Domingo', 4),
(14, 'Corralon 9', 19.065000, -98.220000, 'Calle 37 Nte 1035, Villa Posadas, 72060 Puebla, Pue., México', 'Lunes,Martes,Domingo', 5),
(15, 'Corralon 10', 19.070000, -98.190000, '52 poniente 701B, Guadalupe Victoria, 72230 Puebla, Pue., México', 'Miercoles,Jueves,Viernes,Sabado', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recoleccion`
--

CREATE TABLE `recoleccion` (
  `idRecoleccion` int(11) NOT NULL,
  `Lugar_de_Recoleccion` varchar(255) NOT NULL,
  `Colonia` varchar(255) DEFAULT NULL,
  `Municipio` varchar(255) DEFAULT NULL,
  `Folio` varchar(50) NOT NULL,
  `IDCorralonFK` int(5) NOT NULL,
  `Codigo_Postal` varchar(10) DEFAULT NULL,
  `Contactos` varchar(255) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Ubicacion` varchar(255) DEFAULT NULL,
  `IDUsuario_fk` int(15) NOT NULL,
  `Corralon` varchar(250) NOT NULL,
  `Region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recoleccion`
--

INSERT INTO `recoleccion` (`idRecoleccion`, `Lugar_de_Recoleccion`, `Colonia`, `Municipio`, `Folio`, `IDCorralonFK`, `Codigo_Postal`, `Contactos`, `Telefono`, `Ubicacion`, `IDUsuario_fk`, `Corralon`, `Region`) VALUES
(12, 'C. Independencia 708_1, Ángeles Mayorazgo, 72440 Heroica Puebla de Zaragoza, Pue., México', 'Chulavista', 'Pue.', '123-U32-4C1', 0, '72420', 'sanjuan@gmail.com', '222351434', 'Av. 33 Pte. 702', 6, 'Sanjuan', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUsuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwor` varchar(15) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuario`, `usuario`, `email`, `passwor`, `tipo`) VALUES
(6, 'mayra', 'mayra@gmail.com', 'may', 'cliente'),
(7, 'karlos', 'karlos@gmail.com', '123', 'callcenter');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `corralones`
--
ALTER TABLE `corralones`
  ADD PRIMARY KEY (`IdCorralon`);

--
-- Indices de la tabla `recoleccion`
--
ALTER TABLE `recoleccion`
  ADD PRIMARY KEY (`idRecoleccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `corralones`
--
ALTER TABLE `corralones`
  MODIFY `IdCorralon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `recoleccion`
--
ALTER TABLE `recoleccion`
  MODIFY `idRecoleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
