-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2023 a las 15:38:24
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
(17, 'Av. Insurgentes 1700, La Loma, 72150 Puebla, Pue., México', 'Villa Posadas', 'Pue', '13423', '72060', '4', 'Corralon JoseMiguel', 'JoseMiguel@gmail.com', '2223154356', 'Calle 37 Nte 1035, Villa Posadas, 72060 Puebla, Pue., México', 6);

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
(6, 'mayra', 'mayra@gmail.com', 'casitas', 'cliente'),
(7, 'karlos', 'karlos@gmail.com', '951159', 'callcenter');

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
  MODIFY `idRecoleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
