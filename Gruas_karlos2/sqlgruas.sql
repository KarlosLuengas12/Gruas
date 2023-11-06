-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 02:00:46
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

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
-- Estructura de tabla para la tabla `recoleccion`
--

CREATE TABLE `recoleccion` (
  `idRecoleccion` int(11) NOT NULL,
  `Lugar_de_Recoleccion` varchar(255) NOT NULL,
  `Colonia` varchar(255) DEFAULT NULL,
  `Municipio` varchar(255) DEFAULT NULL,
  `Folio` varchar(50) NOT NULL,
  `Codigo_Postal` varchar(10) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `Corralon` varchar(255) DEFAULT NULL,
  `Contactos` varchar(255) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Ubicacion` varchar(255) DEFAULT NULL,
  `IDUsuario_fk` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recoleccion`
--

INSERT INTO `recoleccion` (`idRecoleccion`, `Lugar_de_Recoleccion`, `Colonia`, `Municipio`, `Folio`, `Codigo_Postal`, `Region`, `Corralon`, `Contactos`, `Telefono`, `Ubicacion`, `IDUsuario_fk`) VALUES
(1, 'aqui', 'NuevaColonia1', 'NuevoMunicipio1', 'aquif', 'aquicp', 'NuevaRegion1', 'NuevoCorralon1', 'aquic', 'aquit', 'NuevaUbicacion1', 6),
(2, 'aqui', 'NuevaColonia2', 'NuevoMunicipio2', 'aquif', 'aquicp', 'NuevaRegion2', 'NuevoCorralon2', 'aquic', 'aquit', 'NuevaUbicacion2', 6),
(3, 'aqui', 'NuevaColonia3', 'NuevoMunicipio3', 'aquif', 'aquicp', 'NuevaRegion3', 'NuevoCorralon3', 'aquic', 'aquit', 'NuevaUbicacion3', 6),
(4, 'aqui', 'aquic', 'aquim', 'aquif', 'aquicp', 'aquir', 'aquia', 'aquic', 'aquit', 'aquiu', 6),
(5, 'haya', 'aquic', 'aquim', 'aquif', 'aquicp', 'aquir', 'aquia', 'aquic', 'aquit', 'aquiu', 6),
(6, 'carretera federal puebla-tlaxcala', 'san pablo xochimehuacan', 'puebla', '4162449498', '72014', '1', '3', 'email@raro.com', '222858596', 'amozoc', 6),
(7, 'carretera federal puebla-tlaxcala', 'san pablo xochimehuacan', 'puebla', '4162449498', '72014', '1', '3', 'email@raro.com', '222858596', 'amozoc', 0),
(8, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 0),
(9, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 0),
(10, 'a', 'a', 'a', 'a', 'a', 'b', 'b', 'b', 'b', 'b', 6);

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
(6, 'mayra', 'mayra@gmail.com', 'dfd', 'cliente'),
(7, 'karlos', 'karlos@gmail.com', '123', 'callcenter');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `recoleccion`
--
ALTER TABLE `recoleccion`
  MODIFY `idRecoleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
