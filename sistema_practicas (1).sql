-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2023 a las 20:37:14
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
-- Base de datos: `sistema_practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `alumno_codigo` varchar(20) NOT NULL,
  `alumnos_escuela` int(11) DEFAULT NULL,
  `user_persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`alumno_codigo`, `alumnos_escuela`, `user_persona_id`) VALUES
('0332132038', 10, 264),
('0332151036', 10, 259),
('0332152034', 10, 256),
('0332152036', 10, 237),
('0332171040', 10, 254),
('0332181006', 10, 241),
('0332181008', 10, 243),
('0332181010', 10, 247),
('0332181024', 10, 250),
('0332181027', 10, 255),
('0332181032', 10, 262),
('0332182002', 10, 238),
('0332182004', 10, 239),
('0332182006', 10, 240),
('0332182007', 10, 242),
('0332182008', 10, 244),
('0332182009', 10, 245),
('0332182010', 10, 246),
('0332182014', 10, 248),
('0332182016', 10, 249),
('0332182017', 10, 251),
('0332182018', 10, 252),
('0332182019', 10, 253),
('0332182023', 10, 257),
('0332182024', 10, 258),
('0332182025', 10, 260),
('0332182026', 10, 261),
('0332182029', 10, 263),
('3220021025', 10, 265);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario_id` int(11) NOT NULL,
  `comentario_role` int(11) DEFAULT NULL,
  `comentario_user` int(11) DEFAULT NULL,
  `comentario_cuerpo` text DEFAULT NULL,
  `comentario_fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`comentario_id`, `comentario_role`, `comentario_user`, `comentario_cuerpo`, `comentario_fecha`) VALUES
(17, 2, 1332131007, 'Corregir', '2023-08-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos_academicos`
--

CREATE TABLE `departamentos_academicos` (
  `da_id` int(11) NOT NULL,
  `da_nombre` varchar(50) DEFAULT NULL,
  `da_padre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos_academicos`
--

INSERT INTO `departamentos_academicos` (`da_id`, `da_nombre`, `da_padre`) VALUES
(1, 'Derecho y Ciencias Políticas', 1),
(2, 'Ciencias Sociales y Comunicación', 2),
(3, 'Administración y Gestión', 3),
(4, 'Economía y Finanzas', 4),
(5, 'Ciencias Contables y Financieras', 4),
(6, 'Medicina Humana', 5),
(7, 'Enfermería', 5),
(8, 'Bromatología y Nutrición', 6),
(9, 'Ciencias Formales y Naturales', 7),
(10, 'Ciencias Sociales y Humanidades', 7),
(11, 'Ciencias de la Educación y Tecnología Educativa', 7),
(12, 'Ingeniería Industrial', 8),
(13, 'Ingeniería de Sistemas, Informática y Electrónica', 8),
(14, 'Ingeniería Civil', 9),
(15, 'Ingeniería Química y Metalúrgica', 10),
(16, 'Agronomía', 11),
(17, 'Zootecnia', 11),
(18, 'Ingeniería en Industrias Alimentarias', 11),
(19, 'Ingeniería Pesquera e Ingeniería Acuícola', 12),
(20, 'Matemática y Estadística', 13),
(21, 'Física', 13),
(22, 'Biología', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos_pais`
--

CREATE TABLE `departamentos_pais` (
  `departamento_id` int(11) NOT NULL,
  `departamento_nombre` varchar(30) DEFAULT NULL,
  `departamento_padre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos_pais`
--

INSERT INTO `departamentos_pais` (`departamento_id`, `departamento_nombre`, `departamento_padre_id`) VALUES
(1, 'Amazonas', 18),
(2, 'Ancash', 18),
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
-- Estructura de tabla para la tabla `distritos_pais`
--

CREATE TABLE `distritos_pais` (
  `distrito_id` int(11) NOT NULL,
  `distrito_nombre` varchar(30) DEFAULT NULL,
  `distrito_padre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distritos_pais`
--

INSERT INTO `distritos_pais` (`distrito_id`, `distrito_nombre`, `distrito_padre_id`) VALUES
(1, 'Lima', 1),
(2, 'Miraflores', 1),
(3, 'San Isidro', 1),
(4, 'Barranco', 1),
(5, 'San Borja', 1),
(6, 'La Molina', 1),
(7, 'Surco', 1),
(8, 'San Miguel', 1),
(9, 'Jesús María', 1),
(10, 'Magdalena del Mar', 1),
(11, 'Barranca', 2),
(12, 'Paramonga', 2),
(13, 'Pativilca', 2),
(14, 'Supe', 2),
(15, 'Supe Puerto', 2),
(16, 'Cajatambo', 3),
(17, 'Copa', 3),
(18, 'Gorgor', 3),
(19, 'Huancapón', 3),
(20, 'Manás', 3),
(21, 'Cahuas', 3),
(22, 'Canta', 4),
(23, 'Arahuay', 4),
(24, 'Huamantanga', 4),
(25, 'Huaros', 4),
(26, 'Lachaqui', 4),
(27, 'San Buenaventura', 4),
(28, 'San Vicente de Cañete', 5),
(29, 'Asia', 5),
(30, 'Calango', 5),
(31, 'Cerro Azul', 5),
(32, 'Chilca', 5),
(33, 'Coayllo', 5),
(34, 'Huaral', 6),
(35, 'Atavillos Alto', 6),
(36, 'Atavillos Bajo', 6),
(37, 'Aucallama', 6),
(38, 'Chancay', 6),
(39, 'Ihuari', 6),
(40, 'Matucana', 7),
(41, 'Antioquia', 7),
(42, 'Callahuanca', 7),
(43, 'Carampoma', 7),
(44, 'Chicla', 7),
(45, 'Cuenca', 7),
(46, 'Huacho', 8),
(47, 'Ambar', 8),
(48, 'Caleta de Carquín', 8),
(49, 'Checras', 8),
(50, 'Hualmay', 8),
(51, 'Hualqui', 8),
(52, 'Oyón', 9),
(53, 'Andajes', 9),
(54, 'Caujul', 9),
(55, 'Cochamarca', 9),
(56, 'Naván', 9),
(57, 'Pachangara', 9),
(58, 'Yauyos', 10),
(59, 'Alis', 10),
(60, 'Ayauca', 10),
(61, 'Ayaviri', 10),
(62, 'Azángaro', 10),
(63, 'Carania', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `docente_codigo` varchar(20) NOT NULL,
  `user_persona_id` int(11) DEFAULT NULL,
  `docente_puesto` int(11) DEFAULT NULL,
  `docente_departamento_academico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `documento_id` int(11) NOT NULL,
  `documento_nombre` text DEFAULT NULL,
  `documento_fecha` date DEFAULT NULL,
  `documente_direc` text DEFAULT NULL,
  `documento_comentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`documento_id`, `documento_nombre`, `documento_fecha`, `documente_direc`, `documento_comentario`) VALUES
(13, 'FichaMatricula.pdf', '2023-07-24', '/public/uploads/1d1c3c6bcbb640f34d0f3a2123fb7613FichaMatricula.pdf', NULL),
(14, 'RecordAcademico.pdf', '2023-07-24', '/public/uploads/1d1c3c6bcbb640f34d0f3a2123fb7613RecordAcademico.pdf', NULL),
(15, 'FichaMatricula.pdf', '2023-07-26', '/public/uploads/0e0ab834238274dd8134411f723e3e42FichaMatricula.pdf', NULL),
(16, 'RecordAcademico.pdf', '2023-07-26', '/public/uploads/0e0ab834238274dd8134411f723e3e42RecordAcademico.pdf', NULL),
(17, 'CartaAceptacion.pdf', '2023-08-09', '/public/uploads/61f18940c6e4b0229b9abab6946c846eCartaAceptacion.pdf', NULL),
(18, 'CartaAceptacion.pdf', '2023-08-10', '/public/uploads/34a986f60f8db1c0b548d126180b7d72CartaAceptacion.pdf', NULL),
(19, 'CartaAceptacion.pdf', '2023-08-10', '/public/uploads/26d2a49d6c004f5676acc51e2b1fe2ccCartaAceptacion.pdf', NULL),
(20, 'CartaAceptacion.pdf', '2023-08-10', '/public/uploads/af43882a1477fcc729f7d99f043aaf11CartaAceptacion.pdf', NULL),
(21, 'FichaMatricula.pdf', '2023-08-10', '/public/uploads/454a8510bb7a17cda9b611be52befca4FichaMatricula.pdf', NULL),
(22, 'FichaMatricula.pdf', '2023-08-10', '/public/uploads/8eee47c1b64425fe818b0dc3366d8133FichaMatricula.pdf', NULL),
(23, 'CartaAceptacion.pdf', '2023-08-10', '/public/uploads/5455acfbb2a4e282ac59f8df2fcaaabfCartaAceptacion.pdf', NULL),
(27, 'FichaMatricula.pdf', '2023-08-10', '/public/uploads/02fa166e3449fd210858e836dc9244d8FichaMatricula.pdf', NULL),
(60, 'FichaControlMensual.pdf', '2023-08-10', '/public/uploads/727a3e9282a17198380551702bccdd984FichaControlMensual.pdf', NULL),
(61, 'FichaControlMensual.pdf', '2023-08-10', '/public/uploads/727a3e9282a17198380551702bccdd982FichaControlMensual.pdf', NULL),
(62, 'FichaControlMensual.pdf', '2023-08-10', '/public/uploads/727a3e9282a17198380551702bccdd986FichaControlMensual.pdf', NULL),
(63, 'FichaControlMensual.pdf', '2023-08-10', '/public/uploads/727a3e9282a17198380551702bccdd988FichaControlMensual.pdf', NULL),
(66, 'FichaMatricula.pdf', '2023-08-10', '/public/uploads/2ed1519ab8db4a97844949db2dfd4b062FichaMatricula.pdf', NULL),
(67, 'RecordAcademico.pdf', '2023-08-10', '/public/uploads/2ed1519ab8db4a97844949db2dfd4b063RecordAcademico.pdf', NULL),
(68, 'TrabajoClase1.pdf', '2023-08-24', '/public/uploads/8d8acc3d02567f76b29517b1e44b50652TrabajoClase1.pdf', NULL),
(69, 'Value Grocers Expanded Project - 2023-2.pdf', '2023-08-24', '/public/uploads/8d8acc3d02567f76b29517b1e44b50653Value Grocers Expanded Project - 2023-2.pdf', NULL),
(72, 'ConjuntoLectura3.pdf', '2023-08-25', '/public/uploads/8484f54c3504b3a3d7a2652774a4a7c34ConjuntoLectura3.pdf', NULL),
(73, 'Bovero, Michelangelo - Modernidad.pdf', '2023-08-25', '/public/uploads/8484f54c3504b3a3d7a2652774a4a7c37Bovero, Michelangelo - Modernidad.pdf', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas_datos`
--

CREATE TABLE `empresas_datos` (
  `empresa_id` int(11) NOT NULL,
  `empresa_RUC` varchar(20) DEFAULT NULL,
  `empresa_razon_social` text DEFAULT NULL,
  `empresa_direcion` text DEFAULT NULL,
  `empresa_ubi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas_datos`
--

INSERT INTO `empresas_datos` (`empresa_id`, `empresa_RUC`, `empresa_razon_social`, `empresa_direcion`, `empresa_ubi`) VALUES
(21, '2020123412', 'Empresa1', 'calle1', 6),
(23, '2020123412', 'Juan Alverto', 'Urb San Angela', 1),
(24, '20', 'Ajipo', 'Urb San Angela', 1),
(25, '2020123412', 'Juan Alverto', 'Urb San Angela', 1),
(26, '211111121212', 'ajipihay', 'calle 0', 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_documentos`
--

CREATE TABLE `empresa_documentos` (
  `empresa_documento_id` int(11) NOT NULL,
  `empresa_documento_tipo` int(11) DEFAULT NULL,
  `empresa_documento_proceso` int(11) DEFAULT NULL,
  `empresa_documento` int(11) DEFAULT NULL,
  `empresa_documento_estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_encargado`
--

CREATE TABLE `empresa_encargado` (
  `encargado_id` int(11) NOT NULL,
  `encargado_empresa` int(11) DEFAULT NULL,
  `encargado_puesto` int(11) DEFAULT NULL,
  `encargado_nombres` varchar(50) DEFAULT NULL,
  `encargado_papellido` varchar(30) DEFAULT NULL,
  `encargado_mapellido` varchar(30) DEFAULT NULL,
  `encargado_cargo` varchar(8) DEFAULT NULL,
  `encargado_correo` varchar(100) DEFAULT NULL,
  `encargado_celular` varchar(20) DEFAULT NULL,
  `encargado_genero` varchar(20) DEFAULT NULL,
  `encargado_dni` varchar(20) DEFAULT NULL,
  `encargado_grado_instruccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa_encargado`
--

INSERT INTO `empresa_encargado` (`encargado_id`, `encargado_empresa`, `encargado_puesto`, `encargado_nombres`, `encargado_papellido`, `encargado_mapellido`, `encargado_cargo`, `encargado_correo`, `encargado_celular`, `encargado_genero`, `encargado_dni`, `encargado_grado_instruccion`) VALUES
(19, 20, 4, 'Nombre', 'Apellido', 'Apellido2', '12', NULL, NULL, 'masculino', NULL, 'CCO'),
(21, 21, 5, 'Tutos', 'aRTER', 'Pro', '123123', '123123@COM.COM', '2133', 'femenino', '74085467', 'CCO'),
(22, 22, 4, 'Tutos', '12', 'Pro', 'Supervis', NULL, NULL, 'femenino', NULL, 'CCO'),
(24, 23, 4, 'Tutos', 'Gamer', 'Pro', 'Supervis', NULL, NULL, 'femenino', NULL, 'CCO'),
(26, 24, 4, 'Tutos', '12', 'Pro', '12', NULL, NULL, 'femenino', NULL, 'Presidente'),
(33, 24, 5, 'Tutos', 'aRTER', 'Pro', '123123', '123123@COM.COM', '123', 'masculino', '74085467', 'Presidente'),
(34, 25, 4, 'v', 'Cornejo', 'Gracia', 'xd', NULL, NULL, 'masculino', NULL, 'CCO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_proceso`
--

CREATE TABLE `empresa_proceso` (
  `empresa_proceso_id` int(11) NOT NULL,
  `empresa_proceso` int(11) DEFAULT NULL,
  `empresa_alumno` varchar(20) DEFAULT NULL,
  `empresa_datos` int(11) DEFAULT NULL,
  `empresa_representante` int(11) DEFAULT NULL,
  `empresa_jefe_inmediato` int(11) DEFAULT NULL,
  `empresa_fecha_inicio` date DEFAULT NULL,
  `empresa_fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE `escuelas` (
  `escuela_id` int(11) NOT NULL,
  `escuela_nombre` varchar(50) DEFAULT NULL,
  `escuela_padre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`escuela_id`, `escuela_nombre`, `escuela_padre`) VALUES
(1, 'Derecho y Ciencias Políticas', 1),
(2, 'Trabajo Social', 2),
(3, 'Sociología', 2),
(4, 'Ciencias de la Comunicación', 2),
(5, 'Administración', 3),
(6, 'Negocios Internacionales', 3),
(7, 'Gestión en Turismo y Hotelería', 3),
(8, 'Ciencias Contables y Financieras', 5),
(9, 'Economía y Finanzas', 4),
(10, 'Medicina Humana', 6),
(11, 'Enfermería', 7),
(12, 'Bromatología y Nutrición', 8),
(13, 'Educación Inicial', 10),
(14, 'Educación Primaria', 10),
(15, 'Educación Secundaria', 10),
(16, 'Educación Física y Deportes', 9),
(17, 'Educación Tecnológica', 11),
(18, 'Educación Semiescolarizada', 8),
(19, 'Ingeniería Industrial', 12),
(20, 'Ingeniería de Sistemas', 13),
(21, 'Ingeniería Informática', 13),
(22, 'Ingeniería Electrónica', 13),
(23, 'Ingeniería Civil', 14),
(24, 'Ingeniería Metalúrgica', 15),
(25, 'Ingeniería Química', 15),
(26, 'Ingeniería Agronómica', 16),
(27, 'Ingeniería Zootécnica', 17),
(28, 'Ingeniería Ambiental', 16),
(29, 'Ingeniería en Industrias Alimentarias', 18),
(30, 'Ingeniería Pesquera', 19),
(31, 'Ingeniería Acuícola', 19),
(32, 'Matemática Aplicada', 20),
(33, 'Física', 21),
(34, 'Estadística e Informática', 20),
(35, 'Biología con mención en Biotecnología', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultads`
--

CREATE TABLE `facultads` (
  `facultad_id` int(11) NOT NULL,
  `facultad_nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facultads`
--

INSERT INTO `facultads` (`facultad_id`, `facultad_nombre`) VALUES
(1, 'Derecho y Ciencias Políticas'),
(2, 'Ciencias Sociales'),
(3, 'Ciencias Empresariales'),
(4, 'Ciencias Económicas, Contables y Financieras'),
(5, 'Medicina Humana'),
(6, 'Bromatología y Nutrición'),
(7, 'Educación'),
(8, 'Ingeniería Industrial, Sistemas e Informática'),
(9, 'Ingeniería Civil'),
(10, 'Ingeniería Química y Metalúrgica'),
(11, 'Ingeniería Agraria, Industrias Alimentarias y Ambi'),
(12, 'Ingeniería Pesquera'),
(13, 'Ciencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `matricula_fecha` date DEFAULT NULL,
  `matricula_id_semestre` int(11) DEFAULT NULL,
  `matricula_alumno` varchar(20) DEFAULT NULL,
  `matricula_ficha` int(11) DEFAULT NULL,
  `matricula_record_academico` int(11) DEFAULT NULL,
  `matricula_pago` int(11) DEFAULT NULL,
  `matricula_estado` int(11) DEFAULT NULL,
  `matricula_comentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`matricula_fecha`, `matricula_id_semestre`, `matricula_alumno`, `matricula_ficha`, `matricula_record_academico`, `matricula_pago`, `matricula_estado`, `matricula_comentario`) VALUES
('2023-07-24', 2, '0332131002', 13, 14, NULL, 3, NULL),
('2023-07-26', 2, '0332131006', 15, 16, NULL, 3, NULL),
('2023-08-24', 3, '0332131002', 68, 69, NULL, 3, NULL),
('2023-08-25', 3, '0332131010', 72, 73, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paiss`
--

CREATE TABLE `paiss` (
  `pais_id` int(11) NOT NULL,
  `pais_nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paiss`
--

INSERT INTO `paiss` (`pais_id`, `pais_nombre`) VALUES
(1, 'Estados Unidos'),
(2, 'Canadá'),
(3, 'México'),
(4, 'Argentina'),
(5, 'Brasil'),
(6, 'España'),
(7, 'Francia'),
(8, 'Alemania'),
(9, 'China'),
(10, 'Japón'),
(11, 'India'),
(12, 'Australia'),
(13, 'Italia'),
(14, 'Reino Unido'),
(15, 'Rusia'),
(16, 'Colombia'),
(17, 'Chile'),
(18, 'Perú'),
(19, 'Egipto'),
(20, 'Sudáfrica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `persona_id` int(11) NOT NULL,
  `persona_nombres` varchar(50) DEFAULT NULL,
  `persona_papellido` varchar(30) DEFAULT NULL,
  `persona_mapellido` varchar(30) DEFAULT NULL,
  `persona_DNI` varchar(8) DEFAULT NULL,
  `persona_direccion` varchar(100) DEFAULT NULL,
  `persona_correo` varchar(100) DEFAULT NULL,
  `persona_celular` varchar(20) DEFAULT NULL,
  `persona_ubi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`persona_id`, `persona_nombres`, `persona_papellido`, `persona_mapellido`, `persona_DNI`, `persona_direccion`, `persona_correo`, `persona_celular`, `persona_ubi`) VALUES
(237, 'VICENTE LUIS', 'ALOR', 'SALAZAR', NULL, NULL, NULL, NULL, NULL),
(238, 'JUNIOR ALEXANDER', 'ARAYA', 'SUAREZ', NULL, NULL, NULL, NULL, NULL),
(239, 'JUAN SEBASTIAN', 'CAMPOS', 'LOYOLA', NULL, NULL, NULL, NULL, NULL),
(240, 'AXZEL JUNIOR', 'COSME', 'CELMI', NULL, NULL, NULL, NULL, NULL),
(241, 'SHEYLA JOHANA', 'CRUZ', 'OLIVAS', NULL, NULL, NULL, NULL, NULL),
(242, 'MICHEL CARLOS', 'CUEVAS', 'SALINAS', NULL, NULL, NULL, NULL, NULL),
(243, 'ALFREDO', 'DAVILA', 'GALDO', NULL, NULL, NULL, NULL, NULL),
(244, 'MARYLIN HELLEN', 'DEPAZ', 'GOMEZ', NULL, NULL, NULL, NULL, NULL),
(245, 'ZINEDINE JEANPIERRE', 'ERIQUE', 'TORRES', NULL, NULL, NULL, NULL, NULL),
(246, 'KENNETH RAUL', 'FARFAN', 'LARA', NULL, NULL, NULL, NULL, NULL),
(247, 'MANUEL JEFFRY', 'FLORES', 'CARBAJAL', NULL, NULL, NULL, NULL, NULL),
(248, 'JHONNY ALEXIS', 'MELENDREZ', 'MONTES', NULL, NULL, NULL, NULL, NULL),
(249, 'MARIA DEL CARMEN', 'MENDEZ', 'ENRIQUEZ', NULL, NULL, NULL, NULL, NULL),
(250, 'DIEGO ALEJANDRO', 'MENDOZA', 'MAURICIO', NULL, NULL, NULL, NULL, NULL),
(251, 'ERICK MANUEL', 'MORALES', 'JULCA', NULL, NULL, NULL, NULL, NULL),
(252, 'KIARA ANTONELLA', 'MORALES', 'MARCELO', NULL, NULL, NULL, NULL, NULL),
(253, 'YAHAROM', 'MORAN', 'MORAN', NULL, NULL, NULL, NULL, NULL),
(254, 'KEVIN ALDO', 'NOEL', 'DULANTO', NULL, NULL, NULL, NULL, NULL),
(255, 'LANFRANCO AYRTON', 'P?REZ', 'CALDER?N', NULL, NULL, NULL, NULL, NULL),
(256, 'LEONARDO MANUEL', 'PINEDA', 'CARRION', NULL, NULL, NULL, NULL, NULL),
(257, 'ERICK GIANCARLOS', 'PINEDA', 'CUEVA', NULL, NULL, NULL, NULL, NULL),
(258, 'JOSE ANTONIO', 'PORLES', 'ALDAVE', NULL, NULL, NULL, NULL, NULL),
(259, 'RICARDO SEBASTIAN', 'RAMIREZ', 'LOARTE', NULL, NULL, NULL, NULL, NULL),
(260, 'JACK ANDERSON', 'RIVERA', 'LIBERATO', NULL, NULL, NULL, NULL, NULL),
(261, 'LUIS KEVIN', 'RUCANA', 'REVELO', NULL, NULL, NULL, NULL, NULL),
(262, 'ALDO ALDAIR', 'SOLIS', 'ORTIZ', NULL, NULL, NULL, NULL, NULL),
(263, 'JORGE LUIS', 'VALDEZ', 'PACHECO', NULL, NULL, NULL, NULL, NULL),
(264, 'NURIA ANGELICA', 'VELARDE', 'VARGAS', NULL, NULL, NULL, NULL, NULL),
(265, 'YVAN ANTONIO', 'YMAN', 'CRUZ', NULL, NULL, NULL, NULL, NULL),
(266, 'VICENTE LUIS', 'ALOR', 'SALAZAR', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `procesos_id` int(11) NOT NULL,
  `procesos_semestre` int(11) DEFAULT NULL,
  `procesos_alumno` varchar(20) DEFAULT NULL,
  `procesos_tipo` int(11) DEFAULT NULL,
  `proceso_etapa` int(11) DEFAULT NULL,
  `procesos_estado` int(11) DEFAULT NULL,
  `procesos_comentario` int(11) DEFAULT NULL,
  `procesos_fecha_inicio` date DEFAULT current_timestamp(),
  `procesos_finalizado` int(1) DEFAULT NULL,
  `procesos_docente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias_pais`
--

CREATE TABLE `provincias_pais` (
  `provincia_id` int(11) NOT NULL,
  `provincia_nombre` varchar(30) DEFAULT NULL,
  `provincia_padre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincias_pais`
--

INSERT INTO `provincias_pais` (`provincia_id`, `provincia_nombre`, `provincia_padre_id`) VALUES
(1, 'Lima', 15),
(2, 'Barranca', 15),
(3, 'Cajatambo', 15),
(4, 'Canta', 15),
(5, 'Cañete', 15),
(6, 'Huaral', 15),
(7, 'Huarochirí', 15),
(8, 'Huaura', 15),
(9, 'Oyón', 15),
(10, 'Yauyos', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `puesto_id` int(11) NOT NULL,
  `puesto_nombre` varchar(20) DEFAULT NULL,
  `puesto_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`puesto_id`, `puesto_nombre`, `puesto_role`) VALUES
(1, 'decano', 2),
(2, 'docente', 2),
(3, 'asistente', 2),
(4, 'representante', 4),
(5, 'jefe inmediato', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_id`, `role_nombre`) VALUES
(1, 'admin'),
(2, 'docente'),
(3, 'alumno'),
(4, 'empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `semestre_id` int(11) NOT NULL,
  `semestre_nombre` varchar(20) DEFAULT NULL,
  `semestre_inicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`semestre_id`, `semestre_nombre`, `semestre_inicio`) VALUES
(1, '2023-1', '2023-04-15'),
(2, '2023-2', '2023-08-15'),
(3, '2023-III', '2023-08-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdocumento`
--

CREATE TABLE `tdocumento` (
  `tdocumento_id` int(11) NOT NULL,
  `tdocumento_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tdocumento`
--

INSERT INTO `tdocumento` (`tdocumento_id`, `tdocumento_name`) VALUES
(1, 'Plan de actividades'),
(2, 'Ficha control mensual'),
(3, 'Carta de Presentacion'),
(4, 'Ficha encuesta al empleador'),
(5, 'Informe Final'),
(6, 'Constancias de Practicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testados_proceso`
--

CREATE TABLE `testados_proceso` (
  `tep_id_estado` int(11) NOT NULL,
  `tep_nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `testados_proceso`
--

INSERT INTO `testados_proceso` (`tep_id_estado`, `tep_nombre`) VALUES
(1, 'Pendiente'),
(2, 'Enviado'),
(3, 'Completado'),
(4, 'Fallido'),
(5, 'En proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tetapas_proceso`
--

CREATE TABLE `tetapas_proceso` (
  `tetp_id_etapa` int(11) NOT NULL,
  `tetp_id_proceso` int(11) DEFAULT NULL,
  `tetp_nombre` varchar(50) DEFAULT NULL,
  `tetp_id_siguiente_etapa` int(11) DEFAULT NULL,
  `tetp_numero_idas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tetapas_proceso`
--

INSERT INTO `tetapas_proceso` (`tetp_id_etapa`, `tetp_id_proceso`, `tetp_nombre`, `tetp_id_siguiente_etapa`, `tetp_numero_idas`) VALUES
(1, 1, 'Carta de Presentación', 2, 10),
(2, 1, 'Carta de aceptación', 3, 10),
(3, 1, 'Datos de Jefe Inmediato', 4, 10),
(4, 1, 'Plan de actividades', 5, 10),
(5, 1, 'Ficha control mensual', 6, 10),
(6, 1, 'Informe Final', 6, 15),
(7, 2, 'Ficha de Datos', 8, 10),
(8, 2, 'Datos jefe inmediato', 9, 10),
(9, 2, 'Contrato de trabajo', 10, 10),
(10, 2, 'Boletas de pago', 11, 10),
(11, 2, 'Informe final', NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprocesos`
--

CREATE TABLE `tprocesos` (
  `tp_id_tprocesos` int(11) NOT NULL,
  `tp_nombre` varchar(50) DEFAULT NULL,
  `tp_inicio` int(11) DEFAULT NULL,
  `tp_numero_pasos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tprocesos`
--

INSERT INTO `tprocesos` (`tp_id_tprocesos`, `tp_nombre`, `tp_inicio`, `tp_numero_pasos`) VALUES
(1, 'Efectivas', 10, NULL),
(2, 'Desempeno', 10, NULL),
(3, 'Emprendimiento', 0, NULL),
(4, 'Convalidacion', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_correo` varchar(100) NOT NULL,
  `user_contra` varchar(32) DEFAULT NULL,
  `user_type_role` int(11) DEFAULT NULL,
  `user_role_id` varchar(20) DEFAULT NULL,
  `user_persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_correo`, `user_contra`, `user_type_role`, `user_role_id`, `user_persona_id`) VALUES
('0332132038@unjfsc.edu.pe', 'a05f786ba48f06a9f9396a5d63be7fff', 3, '0332132038', 264),
('0332151036@unjfsc.edu.pe', 'ef730a09290b395b37bc1011de3de748', 3, '0332151036', 259),
('0332152034@unjfsc.edu.pe', 'd296072860916ed5e141ea66ce1514ea', 3, '0332152034', 256),
('0332152036@unjfsc.edu.pe', '2aebd89d1db5d68e8aee95299d771167', 3, '0332152036', 237),
('0332171040@unjfsc.edu.pe', '6f70e356d409d199e10ed7a8262b31be', 3, '0332171040', 254),
('0332181006@unjfsc.edu.pe', '0302adaf44b4ff7ab725884c7d81cc6d', 3, '0332181006', 241),
('0332181008@unjfsc.edu.pe', '24c871e90847b65313b27c808df3d107', 3, '0332181008', 243),
('0332181010@unjfsc.edu.pe', '873684f77b75c9595e617a6caa7a9e62', 3, '0332181010', 247),
('0332181024@unjfsc.edu.pe', 'b95b3b73380a65144d44c89c351edf3a', 3, '0332181024', 250),
('0332181027@unjfsc.edu.pe', 'e30e3569baea8bb2b6a3f4b9892e011a', 3, '0332181027', 255),
('0332181032@unjfsc.edu.pe', '68d297d1065d74ba92e05e501f4ab93e', 3, '0332181032', 262),
('0332182002@unjfsc.edu.pe', 'fc9fc7d7ac139425117051bd183252bd', 3, '0332182002', 238),
('0332182004@unjfsc.edu.pe', 'cae4c05631ba85d50783d6d4dde85d84', 3, '0332182004', 239),
('0332182006@unjfsc.edu.pe', '3fd7066010f8addec157277f0c16057d', 3, '0332182006', 240),
('0332182007@unjfsc.edu.pe', '68717691dad11579e449f4bd4748cd84', 3, '0332182007', 242),
('0332182008@unjfsc.edu.pe', '68389ce7be7e768c696ca6ae9c8e361b', 3, '0332182008', 244),
('0332182009@unjfsc.edu.pe', '366da2fd6482bdd59f2a62a8886d0655', 3, '0332182009', 245),
('0332182010@unjfsc.edu.pe', 'eb929b4ad25ce6e8e18a75144563c350', 3, '0332182010', 246),
('0332182014@unjfsc.edu.pe', '2f7f15c387a359445f7b9fffaaae8204', 3, '0332182014', 248),
('0332182016@unjfsc.edu.pe', '40f9dbd9b02d3508d474057c90291395', 3, '0332182016', 249),
('0332182017@unjfsc.edu.pe', '2d4d0bc31aab5afc5cccdab0ffb6f4ae', 3, '0332182017', 251),
('0332182018@unjfsc.edu.pe', '56f5e540ed080a2efbabd7585855360e', 3, '0332182018', 252),
('0332182019@unjfsc.edu.pe', '30298ea60e25eafc2cd825fba7cbe458', 3, '0332182019', 253),
('0332182023@unjfsc.edu.pe', '9d8d39dfc0d8689637f853103a81ace0', 3, '0332182023', 257),
('0332182024@unjfsc.edu.pe', '09d6aafc3d84894e8f0428a1622f3821', 3, '0332182024', 258),
('0332182025@unjfsc.edu.pe', '66364b0c20786582536b648f2f210309', 3, '0332182025', 260),
('0332182026@unjfsc.edu.pe', 'd80586e17d8cb13386a20ada33fc7cf2', 3, '0332182026', 261),
('0332182029@unjfsc.edu.pe', '61b0e7bd6df23916df77b445292a8a20', 3, '0332182029', 263),
('3220021025@unjfsc.edu.pe', '8b08a0d50d1cbb23ee02ecc4f4784164', 3, '3220021025', 265),
('admin@unjfsc.edu.pe', 'c93ccd78b2076528346216b3b2f701e6', 1, '1', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`alumno_codigo`),
  ADD KEY `alumnos_ibfk_1` (`alumnos_escuela`),
  ADD KEY `alumnos_ibfk_2` (`user_persona_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`);

--
-- Indices de la tabla `departamentos_academicos`
--
ALTER TABLE `departamentos_academicos`
  ADD PRIMARY KEY (`da_id`),
  ADD KEY `da_padre` (`da_padre`);

--
-- Indices de la tabla `departamentos_pais`
--
ALTER TABLE `departamentos_pais`
  ADD PRIMARY KEY (`departamento_id`),
  ADD KEY `departamento_padre_id` (`departamento_padre_id`);

--
-- Indices de la tabla `distritos_pais`
--
ALTER TABLE `distritos_pais`
  ADD PRIMARY KEY (`distrito_id`),
  ADD KEY `distrito_padre_id` (`distrito_padre_id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`docente_codigo`),
  ADD KEY `docente_departamento_academico` (`docente_departamento_academico`),
  ADD KEY `docente_puesto` (`docente_puesto`),
  ADD KEY `docentes_ibfk_3` (`user_persona_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`documento_id`),
  ADD KEY `ref_comentarios` (`documento_comentario`);

--
-- Indices de la tabla `empresas_datos`
--
ALTER TABLE `empresas_datos`
  ADD PRIMARY KEY (`empresa_id`),
  ADD KEY `empresa_ubi` (`empresa_ubi`);

--
-- Indices de la tabla `empresa_documentos`
--
ALTER TABLE `empresa_documentos`
  ADD PRIMARY KEY (`empresa_documento_id`),
  ADD KEY `empresa_documento_tipo` (`empresa_documento_tipo`),
  ADD KEY `empresa_documento_proceso` (`empresa_documento_proceso`),
  ADD KEY `empresa_documento` (`empresa_documento`);

--
-- Indices de la tabla `empresa_encargado`
--
ALTER TABLE `empresa_encargado`
  ADD PRIMARY KEY (`encargado_id`),
  ADD KEY `encargado_puesto` (`encargado_puesto`),
  ADD KEY `encargado_empresa` (`encargado_empresa`);

--
-- Indices de la tabla `empresa_proceso`
--
ALTER TABLE `empresa_proceso`
  ADD PRIMARY KEY (`empresa_proceso_id`),
  ADD KEY `empresa_proceso` (`empresa_proceso`),
  ADD KEY `empresa_alumno` (`empresa_alumno`),
  ADD KEY `empresa_datos` (`empresa_datos`),
  ADD KEY `empresa_representante` (`empresa_representante`),
  ADD KEY `empresa_jefe_inmediato` (`empresa_jefe_inmediato`);

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`escuela_id`),
  ADD KEY `escuela_padre` (`escuela_padre`);

--
-- Indices de la tabla `facultads`
--
ALTER TABLE `facultads`
  ADD PRIMARY KEY (`facultad_id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD UNIQUE KEY `matricula_id_semestre_2` (`matricula_id_semestre`,`matricula_alumno`),
  ADD KEY `matricula_estado` (`matricula_estado`),
  ADD KEY `matricula_id_semestre` (`matricula_id_semestre`),
  ADD KEY `matricula_ibfk_3` (`matricula_ficha`),
  ADD KEY `matricula_ibfk_4` (`matricula_record_academico`);

--
-- Indices de la tabla `paiss`
--
ALTER TABLE `paiss`
  ADD PRIMARY KEY (`pais_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`persona_id`),
  ADD KEY `persona_ubi` (`persona_ubi`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`procesos_id`),
  ADD KEY `procesos_semestre` (`procesos_semestre`),
  ADD KEY `procesos_alumno` (`procesos_alumno`),
  ADD KEY `procesos_tipo` (`procesos_tipo`),
  ADD KEY `procesos_estado` (`procesos_estado`),
  ADD KEY `procesos_comentario` (`procesos_comentario`),
  ADD KEY `procesos_docente` (`procesos_docente`);

--
-- Indices de la tabla `provincias_pais`
--
ALTER TABLE `provincias_pais`
  ADD PRIMARY KEY (`provincia_id`),
  ADD KEY `provincia_padre_id` (`provincia_padre_id`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`puesto_id`),
  ADD KEY `puesto_role` (`puesto_role`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`semestre_id`);

--
-- Indices de la tabla `tdocumento`
--
ALTER TABLE `tdocumento`
  ADD PRIMARY KEY (`tdocumento_id`);

--
-- Indices de la tabla `testados_proceso`
--
ALTER TABLE `testados_proceso`
  ADD PRIMARY KEY (`tep_id_estado`);

--
-- Indices de la tabla `tetapas_proceso`
--
ALTER TABLE `tetapas_proceso`
  ADD PRIMARY KEY (`tetp_id_etapa`),
  ADD KEY `tetp_id_proceso` (`tetp_id_proceso`);

--
-- Indices de la tabla `tprocesos`
--
ALTER TABLE `tprocesos`
  ADD PRIMARY KEY (`tp_id_tprocesos`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_correo`),
  ADD KEY `user_persona_id` (`user_persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `departamentos_pais`
--
ALTER TABLE `departamentos_pais`
  MODIFY `departamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `distritos_pais`
--
ALTER TABLE `distritos_pais`
  MODIFY `distrito_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `documento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `empresas_datos`
--
ALTER TABLE `empresas_datos`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `empresa_documentos`
--
ALTER TABLE `empresa_documentos`
  MODIFY `empresa_documento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `empresa_encargado`
--
ALTER TABLE `empresa_encargado`
  MODIFY `encargado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `empresa_proceso`
--
ALTER TABLE `empresa_proceso`
  MODIFY `empresa_proceso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  MODIFY `escuela_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `paiss`
--
ALTER TABLE `paiss`
  MODIFY `pais_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `persona_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `procesos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `provincias_pais`
--
ALTER TABLE `provincias_pais`
  MODIFY `provincia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `puesto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `semestre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tdocumento`
--
ALTER TABLE `tdocumento`
  MODIFY `tdocumento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `testados_proceso`
--
ALTER TABLE `testados_proceso`
  MODIFY `tep_id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tetapas_proceso`
--
ALTER TABLE `tetapas_proceso`
  MODIFY `tetp_id_etapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tprocesos`
--
ALTER TABLE `tprocesos`
  MODIFY `tp_id_tprocesos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`alumnos_escuela`) REFERENCES `escuelas` (`escuela_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`user_persona_id`) REFERENCES `personas` (`persona_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamentos_academicos`
--
ALTER TABLE `departamentos_academicos`
  ADD CONSTRAINT `departamentos_academicos_ibfk_1` FOREIGN KEY (`da_padre`) REFERENCES `facultads` (`facultad_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamentos_pais`
--
ALTER TABLE `departamentos_pais`
  ADD CONSTRAINT `departamentos_pais_ibfk_1` FOREIGN KEY (`departamento_padre_id`) REFERENCES `paiss` (`pais_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `distritos_pais`
--
ALTER TABLE `distritos_pais`
  ADD CONSTRAINT `distritos_pais_ibfk_1` FOREIGN KEY (`distrito_padre_id`) REFERENCES `provincias_pais` (`provincia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`docente_departamento_academico`) REFERENCES `departamentos_academicos` (`da_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`docente_puesto`) REFERENCES `puestos` (`puesto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `docentes_ibfk_3` FOREIGN KEY (`user_persona_id`) REFERENCES `personas` (`persona_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `ref_comentarios` FOREIGN KEY (`documento_comentario`) REFERENCES `comentarios` (`comentario_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresas_datos`
--
ALTER TABLE `empresas_datos`
  ADD CONSTRAINT `empresas_datos_ibfk_1` FOREIGN KEY (`empresa_ubi`) REFERENCES `distritos_pais` (`distrito_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa_documentos`
--
ALTER TABLE `empresa_documentos`
  ADD CONSTRAINT `empresa_documentos_ibfk_1` FOREIGN KEY (`empresa_documento_tipo`) REFERENCES `tdocumento` (`tdocumento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empresa_documentos_ibfk_2` FOREIGN KEY (`empresa_documento_proceso`) REFERENCES `procesos` (`procesos_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `empresa_documentos_ibfk_3` FOREIGN KEY (`empresa_documento`) REFERENCES `documentos` (`documento_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa_encargado`
--
ALTER TABLE `empresa_encargado`
  ADD CONSTRAINT `empresa_encargado_ibfk_1` FOREIGN KEY (`encargado_puesto`) REFERENCES `puestos` (`puesto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa_proceso`
--
ALTER TABLE `empresa_proceso`
  ADD CONSTRAINT `empresa_proceso_ibfk_1` FOREIGN KEY (`empresa_proceso`) REFERENCES `procesos` (`procesos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `empresa_proceso_ibfk_2` FOREIGN KEY (`empresa_alumno`) REFERENCES `alumnos` (`alumno_codigo`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `empresa_proceso_ibfk_3` FOREIGN KEY (`empresa_datos`) REFERENCES `empresas_datos` (`empresa_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `empresa_proceso_ibfk_4` FOREIGN KEY (`empresa_representante`) REFERENCES `empresa_encargado` (`encargado_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `empresa_proceso_ibfk_5` FOREIGN KEY (`empresa_jefe_inmediato`) REFERENCES `empresa_encargado` (`encargado_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD CONSTRAINT `escuelas_ibfk_1` FOREIGN KEY (`escuela_padre`) REFERENCES `departamentos_academicos` (`da_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`matricula_estado`) REFERENCES `testados_proceso` (`tep_id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`matricula_id_semestre`) REFERENCES `semestre` (`semestre_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`matricula_ficha`) REFERENCES `documentos` (`documento_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_4` FOREIGN KEY (`matricula_record_academico`) REFERENCES `documentos` (`documento_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`persona_ubi`) REFERENCES `distritos_pais` (`distrito_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD CONSTRAINT `procesos_ibfk_1` FOREIGN KEY (`procesos_semestre`) REFERENCES `semestre` (`semestre_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `procesos_ibfk_2` FOREIGN KEY (`procesos_alumno`) REFERENCES `alumnos` (`alumno_codigo`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `procesos_ibfk_3` FOREIGN KEY (`procesos_tipo`) REFERENCES `tprocesos` (`tp_id_tprocesos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `procesos_ibfk_4` FOREIGN KEY (`procesos_estado`) REFERENCES `testados_proceso` (`tep_id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `procesos_ibfk_5` FOREIGN KEY (`procesos_comentario`) REFERENCES `comentarios` (`comentario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `procesos_ibfk_6` FOREIGN KEY (`procesos_docente`) REFERENCES `docentes` (`docente_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincias_pais`
--
ALTER TABLE `provincias_pais`
  ADD CONSTRAINT `provincias_pais_ibfk_1` FOREIGN KEY (`provincia_padre_id`) REFERENCES `departamentos_pais` (`departamento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD CONSTRAINT `puestos_ibfk_1` FOREIGN KEY (`puesto_role`) REFERENCES `roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tetapas_proceso`
--
ALTER TABLE `tetapas_proceso`
  ADD CONSTRAINT `tetapas_proceso_ibfk_1` FOREIGN KEY (`tetp_id_proceso`) REFERENCES `tprocesos` (`tp_id_tprocesos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_persona_id`) REFERENCES `personas` (`persona_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
