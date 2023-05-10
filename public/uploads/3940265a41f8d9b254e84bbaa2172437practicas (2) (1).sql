-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2023 a las 14:24:06
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
-- Base de datos: `practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_escula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `id_persona`, `id_escula`) VALUES
(332131002, 1, 1),
(332132010, 2, 1),
(332141039, 3, 1),
(332161025, 4, 2),
(332162003, 5, 2),
(332162008, 6, 2),
(332162026, 7, 3),
(332171040, 8, 3),
(332171044, 9, 3),
(332172003, 10, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cuerpo` varchar(250) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_academico`
--

CREATE TABLE `departamento_academico` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(50) NOT NULL,
  `id_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento_academico`
--

INSERT INTO `departamento_academico` (`id_departamento`, `nombre_departamento`, `id_facultad`) VALUES
(1, 'Agronomía', 1),
(2, 'Ingeniería Ambiental', 1),
(3, 'Industrias Alimentarias', 1),
(4, 'Zootecnia ', 1),
(5, 'Ciencias Sociales y Comunicación ', 7),
(6, 'Ingeniería Industrial', 10),
(7, 'Ingeniería de Sistemas, Informática y Electrónicad', 10),
(8, 'Ingeniería Civil', 11),
(9, 'Economía y Finanzas', 12),
(10, 'Ciencias Contable y Financieras', 12),
(11, 'Medicina Humana', 13),
(12, 'Enfermería', 13),
(13, 'Ciencias Formales y Naturales', 8),
(14, 'Ciencias Sociales y Humanidades', 8),
(15, 'Ciencias de la Educación y Tecnología Educativada', 8),
(16, 'Administración y Gestión', 3),
(17, 'Bromatología y Nutrición', 4),
(18, 'Ingeniería Pesquera e Ingeniería Acuícola', 5),
(19, 'Ingeniería Química y Metalúrgica', 6),
(20, 'Biología', 2),
(21, 'Física', 2),
(22, 'Matemática y Estadística', 2),
(23, 'Derecho y Ciencias Políticas', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_pais`
--

CREATE TABLE `departamento_pais` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(20) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento_pais`
--

INSERT INTO `departamento_pais` (`id_departamento`, `nombre_departamento`, `id_pais`) VALUES
(1, 'Amazonas', 18),
(2, 'Áncash', 18),
(3, 'Apurímac', 18),
(4, 'Arequipa', 18),
(5, 'Ayacucho', 18),
(6, 'Cajamarca', 18),
(7, 'Callao', 18),
(8, 'Cusco', 18),
(9, 'Huancavelica', 18),
(10, 'Huánuco', 18),
(11, 'Ica', 18),
(12, 'Junín', 18),
(13, 'La Libertad', 18),
(14, 'Lambayeque', 18),
(15, 'Lima', 18),
(16, 'Loreto', 18),
(17, 'Madre de Dios', 18),
(18, 'Moquegua', 18),
(19, 'Pasco', 18),
(20, 'Piura', 18),
(21, 'Puno', 18),
(22, 'San Martín', 18),
(23, 'Tacna', 18),
(24, 'Tumbes', 18),
(25, 'Ucayali', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_distrito` int(11) NOT NULL,
  `nombre_distrito` varchar(20) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `nombre_distrito`, `id_provincia`) VALUES
(1, 'Ancón', 140),
(2, 'Ate', 140),
(3, 'Barranco', 140),
(4, 'Breña', 140),
(5, 'Carabayllo', 140),
(6, 'Chaclacayo', 140),
(7, 'Chorrillos', 140),
(8, 'Cieneguilla', 140),
(9, 'Comas', 140),
(10, 'El Agustino', 140),
(11, 'Independencia', 140),
(12, 'Jesús María', 140),
(13, 'La Molina', 140),
(14, 'La Victoria', 140),
(15, 'Lince', 140),
(16, 'Los Olivos', 140),
(17, 'Lurigancho-Chosica', 140),
(18, 'Lurín', 140),
(19, 'Magdalena del Mar', 140),
(20, 'Miraflores', 140),
(21, 'Pachacamac', 140),
(22, 'Pucusana', 140),
(23, 'Pueblo Libre', 140),
(24, 'Puente Piedra', 140),
(25, 'Punta Hermosa', 140),
(26, 'Punta Negra', 140),
(27, 'Rímac', 140),
(28, 'San Bartolo', 140),
(29, 'San Borja', 140),
(30, 'San Isidro', 140),
(31, 'San Juan de Luriganc', 140),
(32, 'San Juan de Miraflor', 140),
(33, 'San Luis', 140),
(34, 'San Martín de Porres', 140),
(35, 'San Miguel', 140),
(36, 'Santa Anita', 140),
(37, 'Santa María del Mar', 140),
(38, 'Santa Rosa', 140),
(39, 'Santiago de Surco', 140),
(40, 'Surquillo', 140),
(41, 'Villa El Salvador', 140),
(42, 'Villa María del Triu', 140),
(43, 'Bellavista', 143),
(44, 'Callao', 143),
(45, 'Carmen de La Legua R', 143),
(46, 'La Perla', 143),
(47, 'La Punta', 143),
(48, 'Ventanilla', 143);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL,
  `nombre_documento` text NOT NULL,
  `fecha_documento` date NOT NULL,
  `direccion_documento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_documento`, `nombre_documento`, `fecha_documento`, `direccion_documento`) VALUES
(75, 'practicas (4).sql', '2023-05-10', '/public/uploads/7498fccf07e088de88ce39dbdfa7a262practicas (4).sql'),
(76, 'ChatPDF-10723-18761-2-PB.txt', '2023-05-10', '/public/uploads/7498fccf07e088de88ce39dbdfa7a262ChatPDF-10723-18761-2-PB.txt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `id_escuela` int(11) NOT NULL,
  `nombre_escuela` varchar(60) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id_escuela`, `nombre_escuela`, `id_departamento`) VALUES
(1, 'Agronomía', 1),
(2, 'Industrias Alimentarias y Ambiental', 3),
(3, 'Matemáticas', 22),
(4, 'Física', 21),
(5, 'Química', 19),
(6, 'Ingeniería Civil', 11),
(7, 'Ingeniería de Sistemas', 11),
(8, 'Arquitectura', 11),
(9, 'Derecho', 23),
(10, 'Ciencias Políticas', 23),
(11, 'Educación Inicial y Primaria', 15),
(12, 'Educación Secundaria y Superior', 15),
(13, 'Comunicación Social', 14),
(14, 'Ingeniería Industrial', 6),
(15, 'Ingeniería de Sistemas', 7),
(16, 'Medicina Veterinaria y Zootecnia', 4),
(17, 'Economía', 9),
(18, 'Administración', 10),
(19, 'Contabilidad', 9),
(20, 'Educación', 5),
(21, 'Ciencias Sociales', 14),
(22, 'Humanidades', 14),
(23, 'Enfermería', 12),
(24, 'Obstetricia', 11),
(25, 'Bromatología', 17),
(26, 'Nutrición', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id_facultad` int(11) NOT NULL,
  `nombre_facultad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id_facultad`, `nombre_facultad`) VALUES
(1, 'Ing. Agraria, Industrias Alimentarias y Ambiental'),
(2, 'Ciencias'),
(3, 'Ciencias Empresariales'),
(4, 'Bromatología y Nutrición'),
(5, 'Ingeniería Pesquera'),
(6, 'Ingeniería Química y Metalúrgica'),
(7, 'Ciencias Sociales'),
(8, 'Educación'),
(9, 'Derecho y Ciencias Políticas'),
(10, 'Ingenieria Industrial, Sistemas e Informática'),
(11, 'Ingeniería Civil'),
(12, 'Ciencias Económicas, Contables y Financieras'),
(13, 'Medicina Humana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_semestres` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `ficha_matricula` int(11) DEFAULT NULL,
  `record_academico` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  `estado_matricula` tinyint(1) DEFAULT 0,
  `comentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_semestres`, `id_alumno`, `ficha_matricula`, `record_academico`, `pago`, `estado_matricula`, `comentario`) VALUES
(2, 332131002, 75, 76, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'Argentina'),
(2, 'Bolivia'),
(3, 'Brasil'),
(4, 'Chile'),
(5, 'Colombia'),
(6, 'Costa Rica'),
(7, 'Cuba'),
(8, 'Ecuador'),
(9, 'El Salvador'),
(10, 'Guatemala'),
(11, 'Haití'),
(12, 'Honduras'),
(13, 'Jamaica'),
(14, 'México'),
(15, 'Nicaragua'),
(16, 'Panamá'),
(17, 'Paraguay'),
(18, 'Perú'),
(19, 'República Dominicana'),
(20, 'Uruguay'),
(21, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido_paterno` varchar(60) NOT NULL,
  `apellido_materno` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido_paterno`, `apellido_materno`) VALUES
(1, 'Juan', 'Pérez', 'González'),
(2, 'María', 'García', 'Hernández'),
(3, 'Pedro', 'Martínez', 'Sánchez'),
(4, 'Ana', 'López', 'Rodríguez'),
(5, 'Carlos', 'Fernández', 'Gómez'),
(6, 'Sofía', 'Díaz', 'Gutiérrez'),
(7, 'Jorge', 'González', 'García'),
(8, 'Laura', 'Jiménez', 'Pérez'),
(9, 'David', 'Gómez', 'Herrera'),
(10, 'Isabel', 'Álvarez', 'Torres'),
(11, 'Miguel', 'Ruiz', 'Fernández'),
(12, 'Lucía', 'Hernández', 'Moreno'),
(13, 'José', 'García', 'Martínez'),
(14, 'Paula', 'Sánchez', 'Jiménez'),
(15, 'Mario', 'Gutiérrez', 'González'),
(16, 'Silvia', 'Fernández', 'López'),
(17, 'Roberto', 'Pérez', 'García'),
(18, 'Esther', 'Rodríguez', 'Hernández'),
(19, 'Luis', 'Martínez', 'Sánchez'),
(20, 'Carmen', 'González', 'Fernández');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `nombre_provincia` varchar(20) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nombre_provincia`, `id_departamento`) VALUES
(133, 'Barranca', 15),
(134, 'Cajatambo', 15),
(135, 'Canta', 15),
(136, 'Cañete', 15),
(137, 'Huaral', 15),
(138, 'Huarochirí', 15),
(139, 'Huaura', 15),
(140, 'Lima', 15),
(141, 'Oyón', 15),
(142, 'Yauyos', 15),
(143, 'Callao', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'admin'),
(2, 'docente'),
(3, 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

CREATE TABLE `semestres` (
  `id_semestres` int(11) NOT NULL,
  `nombre_semestres` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id_semestres`, `nombre_semestres`) VALUES
(1, '2022-02'),
(2, '2023-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `correo` varchar(30) NOT NULL,
  `contra` varchar(32) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`correo`, `contra`, `id_role`, `id_user`) VALUES
('332131002@unjfsc.edu.pe', '332131002', 3, 332131002),
('332132010@unjfsc.edu.pe', '332132010', 3, 332132010),
('332141039@unjfsc.edu.pe', '332141039', 3, 332141039),
('332161025@unjfsc.edu.pe', '332161025', 3, 332161025),
('332162003@unjfsc.edu.pe', '332162003', 3, 332162003),
('332162008@unjfsc.edu.pe', '332162008', 3, 332162008),
('332162026@unjfsc.edu.pe', '332162026', 3, 332162026),
('332171040@unjfsc.edu.pe', '332171040', 3, 332171040),
('332171044@unjfsc.edu.pe', '332171044', 3, 332171044),
('332172003@unjfsc.edu.pe', '332172003', 3, 332172003);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `rela_persona` (`id_persona`),
  ADD KEY `rela_escula` (`id_escula`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `rela__role` (`id_role`);

--
-- Indices de la tabla `departamento_academico`
--
ALTER TABLE `departamento_academico`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `rela_facultad` (`id_facultad`);

--
-- Indices de la tabla `departamento_pais`
--
ALTER TABLE `departamento_pais`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `ref_pais` (`id_pais`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_distrito`),
  ADD KEY `rela_provincia` (`id_provincia`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`id_escuela`),
  ADD KEY `red_dep_acad` (`id_departamento`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id_facultad`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_semestres`,`id_alumno`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `semestres`
--
ALTER TABLE `semestres`
  ADD PRIMARY KEY (`id_semestres`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD KEY `rela_role` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento_academico`
--
ALTER TABLE `departamento_academico`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `departamento_pais`
--
ALTER TABLE `departamento_pais`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `semestres`
--
ALTER TABLE `semestres`
  MODIFY `id_semestres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `rela_escula` FOREIGN KEY (`id_escula`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rela_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `rela__role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Filtros para la tabla `departamento_academico`
--
ALTER TABLE `departamento_academico`
  ADD CONSTRAINT `rela_facultad` FOREIGN KEY (`id_facultad`) REFERENCES `facultad` (`id_facultad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento_pais`
--
ALTER TABLE `departamento_pais`
  ADD CONSTRAINT `ref_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `rela_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD CONSTRAINT `red_dep_acad` FOREIGN KEY (`id_departamento`) REFERENCES `departamento_academico` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento_pais` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `rela_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
