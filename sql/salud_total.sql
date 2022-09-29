-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2022 a las 17:50:22
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `salud_total`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcitas`
--

CREATE TABLE `tblcitas` (
  `id` bigint(20) NOT NULL,
  `id_paciente` bigint(20) NOT NULL,
  `id_medico` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `observaciones` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcitas`
--

INSERT INTO `tblcitas` (`id`, `id_paciente`, `id_medico`, `fecha`, `observaciones`) VALUES
(19, 890900293, 1017178241, '2019-11-20 11:00:00', ''),
(14, 890900293, 1234567, '2019-11-20 12:00:00', 'abc'),
(16, 890900293, 1017178241, '2019-11-20 13:00:00', ''),
(23, 987654321, 1017178241, '2019-11-29 08:00:00', 'Ninguna.'),
(22, 1017178240, 1234567, '2019-11-20 11:00:00', ''),
(20, 1017178240, 1234567, '2019-11-29 13:00:00', ''),
(17, 1234567890, 1017178241, '2019-11-20 12:00:00', 'abc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblciudades`
--

CREATE TABLE `tblciudades` (
  `id` bigint(20) NOT NULL,
  `nom_ciu` varchar(50) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecham` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblciudades`
--

INSERT INTO `tblciudades` (`id`, `nom_ciu`, `fechar`, `fecham`) VALUES
(1, 'Medellin', '2019-11-15 14:44:41', '2019-11-15 14:46:39'),
(2, 'Bogota', '2019-11-15 14:44:41', '2019-11-15 14:46:39'),
(4, 'Cali', '2019-11-15 14:48:04', '2019-11-15 14:48:04'),
(5, 'Bucaramanga', '2019-11-15 19:28:19', '2019-11-15 19:28:19'),
(6, 'Cartagena', '2019-11-18 17:27:32', '2019-11-18 17:27:32'),
(7, 'Pereira', '2019-11-19 12:43:59', '2019-11-19 12:43:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldiagnosticos`
--

CREATE TABLE `tbldiagnosticos` (
  `id` bigint(20) NOT NULL,
  `descripcion_diagnostico` varchar(50) NOT NULL,
  `cod_diagnostico` varchar(50) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecham` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbldiagnosticos`
--

INSERT INTO `tbldiagnosticos` (`id`, `descripcion_diagnostico`, `cod_diagnostico`, `fechar`, `fecham`) VALUES
(9, 'COLERA DEBIDO A VIBRIO CHOLERAE O1, BIOTIPO CHOLER', 'A000', '2019-11-15 20:34:57', '2019-11-15 20:34:57'),
(10, 'COLERA DEBIDO A VIBRIO CHOLERAE O1, BIOTIPO EL TOR', 'A001', '2019-11-15 20:34:57', '2019-11-15 20:34:57'),
(11, 'COLERA NO ESPECIFICADO', 'A009', '2019-11-15 20:34:57', '2019-11-15 20:34:57'),
(12, 'FIEBRE TIFOIDEA', 'A010', '2019-11-15 20:34:57', '2019-11-15 20:34:57'),
(13, 'FIEBRE PARATIFOIDEA B', 'A012', '2019-11-15 20:35:35', '2019-11-15 20:35:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblespecialidad`
--

CREATE TABLE `tblespecialidad` (
  `id` bigint(20) NOT NULL,
  `nombre_especi` varchar(50) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecham` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblespecialidad`
--

INSERT INTO `tblespecialidad` (`id`, `nombre_especi`, `fechar`, `fecham`) VALUES
(1, 'Angiología', '2019-11-16 13:33:31', '2019-11-16 13:33:31'),
(2, 'Dermatología', '2019-11-16 13:33:37', '2019-11-16 13:33:37'),
(3, 'Ginecología', '2019-11-16 13:33:46', '2019-11-16 13:33:46'),
(4, 'Oftalmología', '2019-11-16 13:33:53', '2019-11-16 13:33:53'),
(5, 'Otorrinolaringología', '2019-11-16 13:33:58', '2019-11-16 13:33:58'),
(6, 'Urología', '2019-11-16 13:34:03', '2019-11-16 13:34:03'),
(7, 'Traumatología', '2019-11-16 13:34:09', '2019-11-16 13:34:09'),
(8, 'Pediatría', '2019-11-16 13:36:33', '2019-11-16 13:36:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblformula`
--

CREATE TABLE `tblformula` (
  `id` bigint(20) NOT NULL,
  `id_paciente` bigint(20) NOT NULL,
  `id_medico` bigint(20) NOT NULL,
  `fecha_form` date NOT NULL,
  `referencia1` varchar(15) NOT NULL,
  `cantidad1` int(20) NOT NULL,
  `referencia2` varchar(15) NOT NULL,
  `cantidad2` int(20) NOT NULL,
  `referencia3` varchar(15) NOT NULL,
  `cantidad3` int(20) NOT NULL,
  `observaciones` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblformula`
--

INSERT INTO `tblformula` (`id`, `id_paciente`, `id_medico`, `fecha_form`, `referencia1`, `cantidad1`, `referencia2`, `cantidad2`, `referencia3`, `cantidad3`, `observaciones`) VALUES
(1, 1017178240, 1017178241, '2019-11-20', '2', 1, '', 0, '', 0, '<p>\n	Tomar 1 pastilla cada 8 horas.</p>\n'),
(2, 1234567890, 1017178241, '2019-11-10', '2', 1, '1', 1, '', 0, '<p>\n	Ninguna.</p>\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblhistoriaclinica`
--

CREATE TABLE `tblhistoriaclinica` (
  `id` bigint(20) NOT NULL,
  `id_paciente` bigint(20) NOT NULL,
  `id_medico` bigint(20) NOT NULL,
  `id_ciudad` bigint(20) NOT NULL,
  `estatura` decimal(10,0) NOT NULL,
  `peso` decimal(10,0) NOT NULL,
  `id_profesion` bigint(20) NOT NULL,
  `id_motivo_consulta` bigint(20) NOT NULL,
  `antecedente` mediumtext NOT NULL,
  `id_diagnostico` bigint(20) NOT NULL,
  `tratamiento` mediumtext NOT NULL,
  `fecha_ingreso` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblhistoriaclinica`
--

INSERT INTO `tblhistoriaclinica` (`id`, `id_paciente`, `id_medico`, `id_ciudad`, `estatura`, `peso`, `id_profesion`, `id_motivo_consulta`, `antecedente`, `id_diagnostico`, `tratamiento`, `fecha_ingreso`) VALUES
(3, 890900293, 1234567, 5, '170', '85', 4, 6, '<p>\n	Dolor en la espalda.</p>\n', 12, '<p>\n	Aplicar spray en zona con dolor.</p>\n', '2019-11-18 09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmarcamedi`
--

CREATE TABLE `tblmarcamedi` (
  `id` bigint(20) NOT NULL,
  `nombre_marca` varchar(50) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecham` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblmarcamedi`
--

INSERT INTO `tblmarcamedi` (`id`, `nombre_marca`, `fechar`, `fecham`) VALUES
(2, 'Bayer', '2019-11-15 17:15:56', '2019-11-15 17:15:56'),
(4, 'La sante', '2019-11-15 17:16:41', '2019-11-15 17:16:41'),
(5, 'Roche', '2019-11-15 17:16:46', '2019-11-15 17:16:46'),
(6, 'Genfar', '2019-11-15 17:16:57', '2019-11-15 17:16:57'),
(7, 'Pfizer', '2019-11-15 17:18:40', '2019-11-15 17:18:40'),
(8, 'MK', '2019-11-15 17:59:44', '2019-11-15 17:59:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedicamentos`
--

CREATE TABLE `tblmedicamentos` (
  `id` bigint(20) NOT NULL,
  `referencia` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `costo` decimal(10,0) NOT NULL,
  `impuestos` decimal(10,0) NOT NULL,
  `presentacion` bigint(20) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `marca` bigint(20) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecham` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblmedicamentos`
--

INSERT INTO `tblmedicamentos` (`id`, `referencia`, `nombre`, `descripcion`, `costo`, `impuestos`, `presentacion`, `imagen`, `marca`, `fechar`, `fecham`) VALUES
(1, 'AGAG', 'ABC', '<p>\n	ASDASD</p>\n', '1000', '12', 2, '39230-ibuprofeno.jpg', 4, '2019-11-15 17:26:54', '2019-11-15 17:26:54'),
(2, 'DEF-001', 'Advil Max', '<p>\n	Advil&reg; contiene el analg&eacute;sico ibuprofeno, que es parte de un tipo de medicamentos llamados antiinflamatorios no esteroideos</p>\n', '1000', '19', 1, '3b203-advil-max.jpg', 7, '2019-11-15 17:27:47', '2019-11-15 17:27:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedicos`
--

CREATE TABLE `tblmedicos` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_especmed` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblmedicos`
--

INSERT INTO `tblmedicos` (`nombre`, `apellido`, `telefono`, `email`, `direccion`, `ciudad`, `id`, `imagen`, `id_especmed`) VALUES
('Adriana', 'Ramos', '123', 'adriana@gmail.com', 'Calle 30', 4, 1234567, '21fb4-aa.png', 2),
('Chaparron', 'Bonaparte', '1234567', 'chaparron@gmail.com', 'Cesde', 1, 1017178241, '11e30-doctor.png', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmotivosdeconsulta`
--

CREATE TABLE `tblmotivosdeconsulta` (
  `id` bigint(20) NOT NULL,
  `nombre_motivo` varchar(50) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecham` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblmotivosdeconsulta`
--

INSERT INTO `tblmotivosdeconsulta` (`id`, `nombre_motivo`, `fechar`, `fecham`) VALUES
(1, 'Dolor abdominal', '2019-11-15 20:04:57', '2019-11-15 20:04:57'),
(2, 'Trauma', '2019-11-15 20:05:07', '2019-11-15 20:05:07'),
(3, 'Cefalea', '2019-11-15 20:05:15', '2019-11-15 20:05:15'),
(4, 'Cuerpo extraño esofágico', '2019-11-15 20:05:27', '2019-11-15 20:05:27'),
(5, 'Síntomas oculares', '2019-11-15 20:05:40', '2019-11-15 20:05:40'),
(6, 'Dolor lumbar', '2019-11-15 20:05:51', '2019-11-15 20:05:51'),
(7, 'Dolor torácico, palpitaciones', '2019-11-15 20:06:00', '2019-11-15 20:06:00'),
(8, 'Disnea y ahogo', '2019-11-15 20:06:08', '2019-11-15 20:06:08'),
(9, 'Masas y abultamientos', '2019-11-15 20:06:16', '2019-11-15 20:06:16'),
(10, 'Postoperatorio', '2019-11-15 20:06:22', '2019-11-15 20:06:22'),
(11, 'Otros', '2019-11-15 20:06:29', '2019-11-15 20:06:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpacientes`
--

CREATE TABLE `tblpacientes` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL,
  `observaciones` mediumtext NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblpacientes`
--

INSERT INTO `tblpacientes` (`nombre`, `apellido`, `telefono`, `email`, `direccion`, `ciudad`, `id`, `observaciones`, `imagen`) VALUES
('Paciente', 'Prueba', '12345678', 'paciente@hotmail.com', 'Cr 14', 1, 987654321, '<p>\n	Ninguna.</p>\n', 'bae48-person.png'),
('bryan', 'guerrero', '2392896', 'bryanmorales8240@gmail.com', 'CL 13', 1, 1017178240, 'asdasdasdd', '62224-user2.png'),
('Prueba', 'Piloto', '1234567', 'prueba@gmail.com', 'Calle', 1, 1234567890, '<p>\n	Ninguna.</p>\n', '88550-754554.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpresenmedicamentos`
--

CREATE TABLE `tblpresenmedicamentos` (
  `id` bigint(20) NOT NULL,
  `nombre_med` varchar(50) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecham` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblpresenmedicamentos`
--

INSERT INTO `tblpresenmedicamentos` (`id`, `nombre_med`, `fechar`, `fecham`) VALUES
(1, 'Caja', '2019-11-15 16:36:21', '2019-11-15 16:36:21'),
(2, 'Tableta', '2019-11-15 16:36:25', '2019-11-15 16:36:25'),
(3, 'Gotas', '2019-11-15 16:36:29', '2019-11-15 16:36:29'),
(4, 'Frasco', '2019-11-15 17:14:28', '2019-11-15 17:14:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprofesiones`
--

CREATE TABLE `tblprofesiones` (
  `id` bigint(20) NOT NULL,
  `nombre_profesion` varchar(50) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecham` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblprofesiones`
--

INSERT INTO `tblprofesiones` (`id`, `nombre_profesion`, `fechar`, `fecham`) VALUES
(1, 'Empleado', '2019-11-15 19:51:53', '2019-11-15 19:51:53'),
(2, 'Estudiante', '2019-11-15 19:51:58', '2019-11-15 19:51:58'),
(3, 'Jubilado', '2019-11-15 19:52:03', '2019-11-15 19:52:03'),
(4, 'Independiente', '2019-11-18 17:28:32', '2019-11-18 17:28:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltiposdeusuarios`
--

CREATE TABLE `tbltiposdeusuarios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecham` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbltiposdeusuarios`
--

INSERT INTO `tbltiposdeusuarios` (`id`, `nombre`, `fechar`, `fecham`) VALUES
(1, 'Adminstrador', '2019-10-09 23:54:32', '2019-10-09 23:54:32'),
(2, 'Ventas', '2019-10-09 23:54:34', '2019-10-09 23:54:34'),
(3, 'Pedidos', '2019-10-09 23:54:45', '2019-10-09 23:54:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `pkid` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecham` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`pkid`, `nombre`, `telefono`, `correo`, `clave`, `activo`, `fechar`, `fecham`, `foto`) VALUES
(4, 'admin', '3194536968', 'admin@admin.com', '$2y$10$im.8fgkQnI24oXUaUkvCDuBY5XDY1pSWmQy89F76BbMu8rC9w10aq', 1, '2022-09-29 15:28:54', '2022-09-29 15:44:13', 'b4f80-9d8b9-admin-settings-male.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcitas`
--
ALTER TABLE `tblcitas`
  ADD PRIMARY KEY (`id_paciente`,`fecha`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `tblciudades`
--
ALTER TABLE `tblciudades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_ciu` (`nom_ciu`);

--
-- Indices de la tabla `tbldiagnosticos`
--
ALTER TABLE `tbldiagnosticos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblespecialidad`
--
ALTER TABLE `tblespecialidad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_especi` (`nombre_especi`);

--
-- Indices de la tabla `tblformula`
--
ALTER TABLE `tblformula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblhistoriaclinica`
--
ALTER TABLE `tblhistoriaclinica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblmarcamedi`
--
ALTER TABLE `tblmarcamedi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_marca` (`nombre_marca`);

--
-- Indices de la tabla `tblmedicamentos`
--
ALTER TABLE `tblmedicamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referencia` (`referencia`);

--
-- Indices de la tabla `tblmedicos`
--
ALTER TABLE `tblmedicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `tblmotivosdeconsulta`
--
ALTER TABLE `tblmotivosdeconsulta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_motivo` (`nombre_motivo`);

--
-- Indices de la tabla `tblpacientes`
--
ALTER TABLE `tblpacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `tblpresenmedicamentos`
--
ALTER TABLE `tblpresenmedicamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_med` (`nombre_med`);

--
-- Indices de la tabla `tblprofesiones`
--
ALTER TABLE `tblprofesiones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_profesion` (`nombre_profesion`);

--
-- Indices de la tabla `tbltiposdeusuarios`
--
ALTER TABLE `tbltiposdeusuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `claveunica` (`nombre`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `claveunca` (`correo`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `portelefono` (`telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblcitas`
--
ALTER TABLE `tblcitas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tblciudades`
--
ALTER TABLE `tblciudades`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbldiagnosticos`
--
ALTER TABLE `tbldiagnosticos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tblespecialidad`
--
ALTER TABLE `tblespecialidad`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tblformula`
--
ALTER TABLE `tblformula`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblhistoriaclinica`
--
ALTER TABLE `tblhistoriaclinica`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblmarcamedi`
--
ALTER TABLE `tblmarcamedi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tblmedicamentos`
--
ALTER TABLE `tblmedicamentos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblmotivosdeconsulta`
--
ALTER TABLE `tblmotivosdeconsulta`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tblpresenmedicamentos`
--
ALTER TABLE `tblpresenmedicamentos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblprofesiones`
--
ALTER TABLE `tblprofesiones`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbltiposdeusuarios`
--
ALTER TABLE `tbltiposdeusuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `pkid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
