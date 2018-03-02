-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2016 a las 16:11:14
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jfk`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarBachillerato` (IN `nombre_estudiante` VARCHAR(45), IN `apellido_estudiante` VARCHAR(45), IN `grado_estudiante` VARCHAR(45), IN `codigo_estudiante` VARCHAR(45), IN `num_documento` VARCHAR(45), IN `email_estudiante` VARCHAR(45), IN `password_estudiante` VARCHAR(45), IN `ultimaconexion_estudiante` DATETIME)  INSERT INTO users_bachillerato VALUES (id_bachillerato, nombre_estudiante, apellido_estudiante, grado_estudiante, codigo_estudiante, num_documento, email_estudiante, password_estudiante, ultimaconexion_estudiante)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarBachillerato_media` (IN `nombre_estudiante` VARCHAR(45), IN `apellido_estudiante` VARCHAR(45), `grado_estudiante` VARCHAR(45), `codigo_estudiante` VARCHAR(45), `num_documento` VARCHAR(45), `ultimaconexion_estudiante` DATETIME)  INSERT INTO users_bachillerato VALUES (id_bachillerato, nombre_estudiante, apellido_estudiante, grado_estudiante, codigo_estudiante, num_documento, ultimaconexion_estudiante)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarPrimaria` (IN `nombre_estudiante` VARCHAR(45), IN `apellido_estudiante` VARCHAR(45), `grado_estudiante` VARCHAR(45), `codigo_estudiante` VARCHAR(45), `ultimaconexion_estudiante` DATETIME)  INSERT INTO users_primaria VALUES (id_primaria, nombre_estudiante, apellido_estudiante, grado_estudiante, codigo_estudiante, ultimaconexion_estudiante)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarProfesor` (IN `nombre_profesor` VARCHAR(45), IN `apellido_profesor` VARCHAR(45), `correo_profesor` VARCHAR(45), `password_profesor` VARCHAR(45), `ultimaconexion_profesor` DATETIME)  INSERT INTO users_profesor VALUES (id_profesor, nombre_profesor, apellido_profesor, correo_profesor, password_profesor, ultimaconexion_profesor)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academico`
--

CREATE TABLE `TBL_academico` (
  `idAcademico` int(11) NOT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `DescripcionCorta` varchar(200) DEFAULT NULL,
  `Activo` int(11) DEFAULT NULL,
  `FotoPerfil` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `academico`
--

INSERT INTO `academico` (`idAcademico`, `Titulo`, `DescripcionCorta`, `Activo`, `FotoPerfil`, `url`) VALUES
(1, 'Proyecto !!!!!', 'Proyecto Ingenieria de software 1.', 1, 'decimales.jpg', ''),
(2, 'Actividades!!', 'En esta secciÃ³n encontraras actividades y demÃ¡s interacciones que la plataforma tendrÃ¡ para ti...', 1, 'actividades.jpg', ''),
(3, 'Estudiantes!!', 'En esta secciÃ³n encontraras tu respectivo menÃº, para que selecciones el curso al cual perteneces.\r\nY disfrutes de EduTime...', 1, 'estudiantes.jpg', '/~jfkservidor/presentacion/menu/estudiantes/'),
(4, 'Profesores!!', 'SecciÃ³n exclusiva para los Profesores.', 1, 'profesor.jpg', ''),
(8, 'Clases', 'Clases interactivas U', 1, 'animals.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `IdFoto` int(11) NOT NULL,
  `idAcademico` int(11) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`IdFoto`, `idAcademico`, `Foto`) VALUES
(3, 0, 'actividades.jpg'),
(5, 0, 'estudiantes.jpg'),
(6, 0, 'estudiantes.jpg'),
(11, 4, 'profesor.jpg'),
(12, 5, 'masonry_02-400x400.jpg'),
(13, 3, 'estudiantes.jpg'),
(14, 2, 'actividades.jpg'),
(15, 1, 'decimales.jpg'),
(16, 0, '5.jpg'),
(17, 0, '5.jpg'),
(18, 0, 'post_video-400x400.jpg'),
(19, 0, 'post_video-400x400.jpg'),
(20, 6, 'masonry_02-400x400.jpg'),
(23, 7, 'masonry_15-400x400.jpg'),
(24, 0, 'animals.jpg'),
(25, 8, 'animals.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `social_id` varchar(100) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_admin`
--

CREATE TABLE `users_admin` (
  `id_admin` int(11) NOT NULL,
  `nombre_admin` varchar(45) DEFAULT NULL,
  `apellido_admin` varchar(45) DEFAULT NULL,
  `correo_admin` varchar(45) DEFAULT NULL,
  `password_admin` varchar(45) DEFAULT NULL,
  `ultimaconexion_admin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_admin`
--

INSERT INTO `users_admin` (`id_admin`, `nombre_admin`, `apellido_admin`, `correo_admin`, `password_admin`, `ultimaconexion_admin`) VALUES
(1, 'Sandra', 'Serrato', 'serratosandra1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-05-03 14:41:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_contacto`
--

CREATE TABLE `users_contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombre_contacto` varchar(45) DEFAULT NULL,
  `email_contacto` varchar(45) DEFAULT NULL,
  `mensaje_contacto` varchar(150) DEFAULT NULL,
  `ultimaconexion_contacto` datetime DEFAULT NULL,
  `colegio_id_colegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_primaria`
--

CREATE TABLE `users_primaria` (
  `id_primaria` int(11) NOT NULL,
  `nombre_estudiante` varchar(45) DEFAULT NULL,
  `apellido_estudiante` varchar(45) DEFAULT NULL,
  `grado_estudiante` varchar(45) DEFAULT NULL,
  `codigo_estudiante` int(11) DEFAULT NULL,
  `ultimaconexion_estudiante` datetime DEFAULT NULL,
  `colegio_id_colegio` int(11) NOT NULL,
  `users_profesor_id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_primaria`
--

INSERT INTO `users_primaria` (`id_primaria`, `nombre_estudiante`, `apellido_estudiante`, `grado_estudiante`, `codigo_estudiante`, `ultimaconexion_estudiante`, `colegio_id_colegio`, `users_profesor_id_profesor`) VALUES
(1, 'Luis Felipe', 'Vergara', 'Cero-01', 1, '2016-03-08 21:33:24', 0, 0),
(2, 'Luna', 'Vergara', 'Primero-03', 20, '2016-03-16 18:32:31', 0, 0),
(3, 'luis', 'Vergara', 'Tercero-01', 1, '2016-04-02 22:43:53', 0, 0),
(4, 'Luna', 'Vergara', 'Primero-01', 1, '2016-04-03 22:34:09', 0, 0),
(5, 'Camilo', 'Mojica', 'Segundo-01', 1, '2016-04-04 22:01:55', 0, 0),
(6, 'camilo', 'Guerra', 'Cero-01', 2, '2016-04-07 10:48:07', 0, 0),
(7, 'lucas', 'silva', 'Cero-01', 4, '2016-04-07 11:10:11', 0, 0),
(10, 'Santiago', 'Henao', 'Cuarto-01', 1, '2016-04-07 14:26:35', 0, 0),
(11, 'Miguel', 'Moreno', 'Quinto-01', 1, '2016-04-07 15:53:36', 0, 0),
(12, 'camilo', 'perez', 'Cero-01', 3, '2016-04-19 12:00:28', 0, 0),
(13, 'Diego', 'Bustos', 'Cuarto-04', 1, '2016-05-12 16:51:53', 0, 0),
(14, 'ERICK FERNANDO', 'AVILA CORTES', 'Quinto-01', 2, '2016-05-25 08:54:48', 0, 0),
(21, 'DANA MICHEL', 'CALDERON HERNANDEZ', 'Cero-01', 15, '2016-05-25 09:06:20', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_profesor`
--

CREATE TABLE `users_profesor` (
  `id_profesor` int(11) NOT NULL,
  `nombre_profesor` varchar(45) DEFAULT NULL,
  `apellido_profesor` varchar(45) DEFAULT NULL,
  `grado_profesor` varchar(45) DEFAULT NULL,
  `correo_profesor` varchar(45) DEFAULT NULL,
  `password_profesor` varchar(45) DEFAULT NULL,
  `ultimaconexion_profesor` datetime DEFAULT NULL,
  `colegio_id_colegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_profesor`
--

INSERT INTO `users_profesor` (`id_profesor`, `nombre_profesor`, `apellido_profesor`, `grado_profesor`, `correo_profesor`, `password_profesor`, `ultimaconexion_profesor`, `colegio_id_colegio`) VALUES
(1, 'Rocio', 'Serrato', 'Cero-04', 'serratosandra1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-04-02 22:15:16', 0),
(6, 'Luis ', 'Vergara', 'Cero-02', 'pipe11@gmail.com', NULL, NULL, 0),
(7, 'Antonio', 'Padilla', 'Cuarto-04', 'antonio@gmail.com', NULL, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academico`
--
ALTER TABLE `academico`
  ADD PRIMARY KEY (`idAcademico`) USING BTREE;

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`IdFoto`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`),
  ADD KEY `login` (`password`);

--
-- Indices de la tabla `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `users_contacto`
--
ALTER TABLE `users_contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `users_primaria`
--
ALTER TABLE `users_primaria`
  ADD PRIMARY KEY (`id_primaria`);

--
-- Indices de la tabla `users_profesor`
--
ALTER TABLE `users_profesor`
  ADD PRIMARY KEY (`id_profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academico`
--
ALTER TABLE `academico`
  MODIFY `idAcademico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `IdFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users_contacto`
--
ALTER TABLE `users_contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users_primaria`
--
ALTER TABLE `users_primaria`
  MODIFY `id_primaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `users_profesor`
--
ALTER TABLE `users_profesor`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
