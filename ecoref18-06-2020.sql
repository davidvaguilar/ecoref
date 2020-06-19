-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-06-2020 a las 03:29:05
-- Versión del servidor: 5.7.30-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecoref`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) UNSIGNED DEFAULT NULL,
  `adress` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `code`, `name`, `title`, `phone`, `adress`, `city`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GEN', 'PARTICULAR', 'PARTICULAR', NULL, 'SECTOR CIUDAD', 'NORTE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(2, '681', 'UNIMARC', 'ROTONDA', NULL, 'AV. 18 DE SEPTIEMBRE #2501', 'ARICA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(3, '923', 'UNIMARC', 'SANTA MARIA', NULL, 'AV. SANTA MARIA 2465', 'ARICA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(4, '600', 'UNIMARC', 'ALTO HOSPICIO 2', NULL, 'RUTA A-16 #3350', 'IQUIQUE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(5, '85', 'UNIMARC', 'AMUNATEGUI', NULL, 'AMUNATEGUI # 902', 'IQUIQUE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(6, '86', 'UNIMARC', 'BILBAO', NULL, 'FRANCISCO BILBAO # 3545', 'IQUIQUE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(7, '9004', 'UNIMARC', 'CENTRO PRODUCCION IQUIQUE', NULL, 'FRANCISCO BILBAO # 3545', 'IQUIQUE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(8, '105', 'UNIMARC', 'IQUIQUE CENTRO', NULL, 'TARAPACA # 579', 'IQUIQUE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(9, '87', 'UNIMARC', 'JUAN MARTINEZ', NULL, 'MANUEL RODRIGUEZ # 964', 'IQUIQUE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(10, '106', 'UNIMARC', 'LOS MOLLES', NULL, 'SANTIAGO POLANCO # 2251', 'IQUIQUE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(11, '103', 'UNIMARC', 'VIVAR', NULL, 'VIVAR # 786', 'IQUIQUE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(12, '9002', 'UNIMARC', 'CENTRO PRODUCCION ANTOFAGASTA', NULL, 'PEDRO AGUIRRE CERDA # 8722-8742', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(13, '19', 'UNIMARC', 'BONILLA', NULL, 'HUAMACHUCO # 8481', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(14, '33', 'UNIMARC', 'COVIEFI', NULL, 'AV. ARGENTINA # 1910', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(15, '28', 'UNIMARC', 'EL PARQUE', NULL, 'AV. JOSE MIGUEL CARRERA # 1527', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(16, '29', 'UNIMARC', 'GRAN VIA', NULL, 'AV. ANGAMOS # 0159', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(17, '26', 'UNIMARC', 'SANTOS OSSA', NULL, 'JOSE SANTOS OSSA # 2421', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(18, '34', 'UNIMARC', 'LA CHIMBA I', NULL, 'PEDRO AGUIRRE CERDA # 8722-8742', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(19, '961', 'UNIMARC', 'LA CHIMBA II', NULL, 'PEDRO AGUIRRE CERDA # 11385', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(20, '47', 'UNIMARC', 'LA PLAZA', NULL, 'IGNACIO CARRERA PINTO # 909', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(21, '13', 'UNIMARC', 'LA TORRE I', NULL, 'CARLOS PEZOA VELIZ # 10 AL 22', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(22, '48', 'UNIMARC', 'OVIEDO CAVADA', NULL, 'CARLOS OVIEDO CAVADA # 5319', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(23, '27', 'UNIMARC', 'PAMPINO', NULL, 'AV. SANSOS OSSA # 2350', 'ANTOFAGASTA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(24, '674', 'UNIMARC', 'BRASILIA', NULL, 'BRASILIA # 2386', 'CALAMA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(25, '46', 'UNIMARC', 'CALAMA I', NULL, 'GRANADEROS # 3180', 'CALAMA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(26, '111', 'UNIMARC', 'CALAMA II', NULL, 'ACONCAGUA # 2588', 'CALAMA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(27, '673', 'UNIMARC', 'LA TORRE II', NULL, 'LATORRE # 2149', 'CALAMA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(28, '110', 'UNIMARC', 'TOCOPILLA II', NULL, 'POLICARPO TORO # 215', 'TOCOPILLA', '2020-05-19 13:47:17', '2020-06-09 13:58:04', NULL),
(29, '1', 'AGROSUPER', NULL, NULL, NULL, NULL, '2020-06-09 18:07:53', '2020-06-09 18:09:04', '2020-06-09 18:09:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_people`
--

CREATE TABLE `client_people` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `people_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `client_people`
--

INSERT INTO `client_people` (`id`, `client_id`, `people_id`, `created_at`, `updated_at`) VALUES
(3, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE `emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `people_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id`, `alias`, `domain`, `people_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'david.villegas.aguilar', 'gmail.com', 1, '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(2, 'pepe', 'correo.com', 2, '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(3, 'paco', 'correo.com', 3, '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(4, 'francisco', 'correo.com', 4, '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `detail` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `quote_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materials`
--

INSERT INTO `materials` (`id`, `quantity`, `detail`, `price`, `post_id`, `user_id`, `quote_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'VENTILADOR 300 MM 380V', NULL, 5, 2, NULL, '2020-05-19 14:08:15', '2020-05-19 14:08:15', NULL),
(2, 1, 'CINTA AISLANTE PVC', NULL, 5, 2, NULL, '2020-05-19 14:08:26', '2020-05-19 14:08:26', NULL),
(3, 1, 'CINTA AISLANTE DE GOMA', NULL, 5, 2, NULL, '2020-05-19 14:08:36', '2020-05-19 14:08:36', NULL),
(5, 1, 'SEGUNDO MATERIAL', NULL, 6, 2, NULL, '2020-05-22 02:41:44', '2020-05-22 02:41:44', NULL),
(7, 1, 'MATERIAL 1', NULL, 7, 2, NULL, '2020-05-24 01:31:39', '2020-05-24 01:31:39', NULL),
(8, 1, 'MATERIAL 2', NULL, 7, 2, NULL, '2020-05-24 01:31:51', '2020-05-24 01:31:51', NULL),
(9, 1, 'MATERIAL 1', NULL, 8, 2, NULL, '2020-05-24 22:50:38', '2020-05-24 22:50:38', NULL),
(10, 1, 'MATERIAL 2', NULL, 8, 2, NULL, '2020-05-24 22:50:42', '2020-05-24 22:50:42', NULL),
(11, 1, 'VENTILADOR 400 X220 W', NULL, 10, 8, NULL, '2020-05-27 09:19:14', '2020-05-27 09:19:14', NULL),
(12, 1, 'CINTA AISTANTE', NULL, 10, 8, NULL, '2020-05-27 09:19:39', '2020-05-27 09:19:39', NULL),
(14, 1, 'BOMBONA REFRIGERANTE', NULL, 10, 8, NULL, '2020-05-27 09:20:53', '2020-05-27 09:20:53', NULL),
(15, 1, 'KG DE R-507', NULL, 11, 8, NULL, '2020-05-27 09:36:03', '2020-05-27 09:36:03', NULL),
(16, 1, 'MATERIAL 1', NULL, 18, 2, NULL, '2020-05-29 02:11:34', '2020-05-29 02:11:34', NULL),
(18, 1, 'UNA DESCRIPCIÓN LARGA DE UN MATERIAL CON UN MÁXIMO', NULL, 18, 2, NULL, '2020-05-29 02:12:11', '2020-05-29 02:12:11', NULL),
(19, 1, 'SEGUN COTIZACION 3813', NULL, 21, 1, NULL, '2020-05-29 13:28:36', '2020-05-29 13:28:36', NULL),
(21, 1, 'MATERIAL 1', NULL, 23, 2, NULL, '2020-05-30 11:48:39', '2020-05-30 11:48:39', NULL),
(22, 1, 'MATERIAL 2', NULL, 23, 2, NULL, '2020-05-30 11:48:44', '2020-05-30 11:48:44', NULL),
(23, 1, 'VENTILADOR 10W', NULL, 25, 2, NULL, '2020-06-01 10:40:40', '2020-06-01 10:40:40', NULL),
(24, 1, 'VENTILADOR 10W', NULL, 26, 10, NULL, '2020-06-01 10:40:41', '2020-06-01 10:40:41', NULL),
(25, 1, 'VENTILADOR 10W', NULL, 27, 12, NULL, '2020-06-01 10:40:46', '2020-06-01 10:40:46', NULL),
(26, 1, 'CINTA AISLANTE PLASTICA', NULL, 25, 2, NULL, '2020-06-01 10:41:17', '2020-06-01 10:41:17', NULL),
(27, 1, 'CINTA AISLADORA PLASTICA', NULL, 26, 10, NULL, '2020-06-01 10:41:19', '2020-06-01 10:41:19', NULL),
(28, 1, 'CINTA AISLANTES', NULL, 27, 12, NULL, '2020-06-01 10:41:31', '2020-06-01 10:41:31', NULL),
(29, 1, 'AUTOMATICO', NULL, 29, 10, NULL, '2020-06-01 11:19:38', '2020-06-01 11:19:38', NULL),
(30, 3, 'VENTILADOR', NULL, 32, 9, NULL, '2020-06-01 11:23:18', '2020-06-01 11:23:18', NULL),
(31, 1, 'CINTA AISLANTE', NULL, 32, 9, NULL, '2020-06-01 11:23:43', '2020-06-01 11:23:43', NULL),
(32, 1, 'SANDA NTC', NULL, 33, 10, NULL, '2020-06-01 15:05:01', '2020-06-01 15:05:01', NULL),
(33, 1, 'CONTROLADOR DANFOSS EKC202B', NULL, 34, 1, NULL, '2020-06-02 18:14:38', '2020-06-02 18:14:38', NULL),
(34, 1, 'BOBINA ZOLENOIDE', NULL, 36, 8, NULL, '2020-06-03 11:54:17', '2020-06-03 11:54:17', NULL),
(35, 1, 'BOMBONA R22', NULL, 36, 8, NULL, '2020-06-03 11:54:33', '2020-06-03 11:54:33', NULL),
(36, 2, 'SOLDADURAS15%', NULL, 36, 8, NULL, '2020-06-03 11:54:54', '2020-06-03 11:54:54', NULL),
(37, 1, 'FILTRO SECADOR5/8', NULL, 36, 8, NULL, '2020-06-03 11:55:10', '2020-06-03 11:55:10', NULL),
(38, 1, 'ACETILENO', NULL, 36, 8, NULL, '2020-06-03 11:55:23', '2020-06-03 11:55:23', NULL),
(39, 1, 'VACIO SISTEMA', NULL, 36, 8, NULL, '2020-06-03 11:55:38', '2020-06-03 11:55:38', NULL),
(40, 10, 'TUBOS DE 36W.', NULL, 37, 12, NULL, '2020-06-03 12:20:00', '2020-06-03 12:20:00', NULL),
(41, 5, 'PARTIDORES DE 4W', NULL, 37, 12, NULL, '2020-06-03 12:20:33', '2020-06-03 12:20:33', NULL),
(42, 1, 'MOTOR VENTILADOR DE 10W', NULL, 43, 2, NULL, '2020-06-03 14:29:09', '2020-06-03 14:29:09', NULL),
(43, 1, 'MOTOVENTILADOR 10W', NULL, 38, 14, NULL, '2020-06-03 14:29:10', '2020-06-03 14:29:10', NULL),
(44, 1, 'MOTOR VENTILADOR DE 10W', NULL, 40, 13, NULL, '2020-06-03 14:29:10', '2020-06-03 14:29:10', NULL),
(45, 1, 'MOTO VENTILADOR DE 10W.', NULL, 41, 16, NULL, '2020-06-03 14:29:11', '2020-06-03 14:29:11', NULL),
(46, 1, 'CONTACTOR DE 15A', NULL, 42, 15, NULL, '2020-06-03 14:29:14', '2020-06-03 14:29:14', NULL),
(47, 1, 'CINTA AISLANTE PLASTICA', NULL, 38, 14, NULL, '2020-06-03 14:30:00', '2020-06-03 14:30:00', NULL),
(48, 1, 'CINTA AISLANTE 3M PVC', NULL, 42, 15, NULL, '2020-06-03 14:30:00', '2020-06-03 14:30:00', NULL),
(49, 1, 'CINTA AISLANTE PLASTICA', NULL, 43, 2, NULL, '2020-06-03 14:30:15', '2020-06-03 14:30:15', NULL),
(50, 1, 'CINTA AISLANTE PLÁSTICA', NULL, 41, 16, NULL, '2020-06-03 14:30:16', '2020-06-03 14:30:16', NULL),
(51, 1, 'NITROGENO', NULL, 44, 10, NULL, '2020-06-03 15:07:24', '2020-06-03 15:07:24', NULL),
(52, 1, 'SOLDADURA 15%', NULL, 44, 10, NULL, '2020-06-03 15:07:49', '2020-06-03 15:07:49', NULL),
(53, 1, 'BENZOMATIC MAP/PRO', NULL, 44, 10, NULL, '2020-06-03 15:08:35', '2020-06-03 15:08:35', NULL),
(54, 1, 'VACIO AL SISTEMA', NULL, 44, 10, NULL, '2020-06-03 15:08:58', '2020-06-03 15:08:58', NULL),
(55, 2, 'AILACION DE 7/8×3/4', NULL, 45, 10, NULL, '2020-06-03 15:19:56', '2020-06-03 15:19:56', NULL),
(56, 1, 'CINTA DE AILACION', NULL, 45, 10, NULL, '2020-06-03 15:20:23', '2020-06-03 15:20:23', NULL),
(57, 1, 'PEGAMENTO AEROFLEX', NULL, 45, 10, NULL, '2020-06-03 15:22:38', '2020-06-03 15:22:38', NULL),
(58, 1, 'CONTACTOR 18A  BOBINA 220V 1NO', NULL, 48, 14, NULL, '2020-06-03 16:24:17', '2020-06-03 16:24:17', NULL),
(59, 1, 'BOMBONA GAS REFRIGERANTE R22', NULL, 44, 1, NULL, '2020-06-03 16:45:46', '2020-06-03 16:45:46', NULL),
(60, 1, 'UNION AMERICANA', NULL, 49, 10, NULL, '2020-06-04 12:59:06', '2020-06-04 12:59:06', NULL),
(61, 1, 'PEGAMENTO VINILIT', NULL, 49, 10, NULL, '2020-06-04 12:59:30', '2020-06-04 12:59:30', NULL),
(62, 12, 'TUBOS ILUMINACIÓN 36W', NULL, 57, 12, NULL, '2020-06-04 18:30:37', '2020-06-04 18:30:37', NULL),
(63, 10, 'PARTIDORES DE 4W', NULL, 57, 12, NULL, '2020-06-04 18:30:53', '2020-06-04 18:30:53', NULL),
(64, 15, 'TUBOS LED DE 16W', NULL, 57, 12, NULL, '2020-06-04 18:31:34', '2020-06-04 18:31:34', NULL),
(65, 4, 'VACES PARA TUBOS LED', NULL, 57, 12, NULL, '2020-06-04 18:32:33', '2020-06-04 18:32:33', NULL),
(66, 1, 'VALVULA ZOLENOIDE3/8SOLDABLE', NULL, 58, 8, NULL, '2020-06-05 11:05:55', '2020-06-05 11:05:55', NULL),
(67, 1, 'BOBINA ZOLENOIDE220V', NULL, 58, 8, NULL, '2020-06-05 11:06:15', '2020-06-05 11:06:15', NULL),
(68, 1, 'SOLDADURA15%', NULL, 58, 8, NULL, '2020-06-05 11:06:32', '2020-06-05 11:06:32', NULL),
(69, 1, 'ACETILENO', NULL, 58, 8, NULL, '2020-06-05 11:06:46', '2020-06-05 11:06:46', NULL),
(70, 1, 'VACIO SISTEMA', NULL, 58, 8, NULL, '2020-06-05 11:07:01', '2020-06-05 11:07:01', NULL),
(71, 12, 'EQUIPOS ( CANOAS PARA  FLUORESCENTES LED T8 1X18W', NULL, 59, 9, NULL, '2020-06-05 11:13:22', '2020-06-05 11:13:22', NULL),
(72, 12, 'TUBOS LED 18W', NULL, 59, 9, NULL, '2020-06-05 11:17:47', '2020-06-05 11:17:47', NULL),
(73, 1, 'MOTOR VENTILADOR 10W', NULL, 60, 10, NULL, '2020-06-05 16:34:33', '2020-06-05 16:34:33', NULL),
(74, 1, 'UNION AMERICAN DE PVC 25M.M.', NULL, 65, 10, NULL, '2020-06-09 12:06:26', '2020-06-09 12:06:26', NULL),
(75, 1, 'CODO PVC 25M.M.', NULL, 65, 10, NULL, '2020-06-09 12:06:52', '2020-06-09 12:06:52', NULL),
(76, 1, 'PEGAMENTO VINILIT', NULL, 65, 10, NULL, '2020-06-09 12:07:08', '2020-06-09 12:07:08', NULL),
(77, 1, 'CONTROLADOR DANFOSS ERC 211', NULL, 66, 10, NULL, '2020-06-09 12:13:52', '2020-06-09 12:13:52', NULL),
(78, 1, 'GAS REFRIGERANTE R22', NULL, 67, 17, NULL, '2020-06-09 18:29:20', '2020-06-09 18:29:20', NULL),
(79, 2, 'BALLAST 1X28W', NULL, 70, 1, NULL, '2020-06-10 09:51:58', '2020-06-10 09:51:58', NULL),
(80, 2, 'TUBOS FLUORESCENTES 28W', NULL, 70, 1, NULL, '2020-06-10 09:52:13', '2020-06-10 09:52:13', NULL),
(81, 8, 'TUBOS FLUORESCENTES 36W', NULL, 70, 1, NULL, '2020-06-10 09:52:27', '2020-06-10 09:52:27', NULL),
(82, 4, 'TUBOS FLUORESCENTES LED 14W', NULL, 70, 1, NULL, '2020-06-10 09:52:52', '2020-06-10 09:52:52', NULL),
(83, 8, 'PARTIDORES', NULL, 70, 1, NULL, '2020-06-10 09:53:11', '2020-06-10 09:53:11', NULL),
(84, 2, 'SILICONA EN TUBO', NULL, 70, 1, NULL, '2020-06-10 09:53:27', '2020-06-10 09:53:27', NULL),
(85, 30, 'PERNOS AUTOPERFORANTES 2\"', NULL, 70, 1, NULL, '2020-06-10 09:53:52', '2020-06-10 09:53:52', NULL),
(86, 2, 'MT. PLANCHA ALUMINIO DIAMANTADA', NULL, 70, 1, NULL, '2020-06-10 09:54:19', '2020-06-10 09:54:19', NULL),
(88, 2, 'DISCO CORTE METAL 7\"', NULL, 70, 1, NULL, '2020-06-10 09:55:17', '2020-06-10 09:55:17', NULL),
(89, 4, 'TUBOS FLUORESCENTES LED 14W', NULL, 71, 1, NULL, '2020-06-10 10:24:24', '2020-06-10 10:24:24', NULL),
(90, 2, 'MOTOR VENTILADORES 10W', NULL, 71, 1, NULL, '2020-06-10 10:24:47', '2020-06-10 10:24:47', NULL),
(91, 60, 'AMARRAS PLASTICAS 300 MM', NULL, 71, 1, NULL, '2020-06-10 10:25:10', '2020-06-10 10:25:10', NULL),
(92, 1, 'HUINCHA AISLANTE PLASTICA', NULL, 71, 1, NULL, '2020-06-10 10:25:38', '2020-06-10 10:25:38', NULL),
(93, 30, 'PERNOS AUTOP. CAB. LENTEJA 1\"', NULL, 71, 1, NULL, '2020-06-10 10:26:10', '2020-06-10 10:26:10', NULL),
(94, 2, 'JUEGO COMPLETO DE EMPAQUETADURA MODELO A2L30H', NULL, 76, 10, NULL, '2020-06-12 12:10:45', '2020-06-12 12:10:45', NULL),
(95, 1, 'SILICONA ALTA TEMPERATURA', NULL, 76, 10, NULL, '2020-06-12 12:11:07', '2020-06-12 12:11:07', NULL),
(96, 1, 'MOTOR VENTILADOR 10W', NULL, 78, 2, NULL, '2020-06-12 14:12:19', '2020-06-12 14:12:19', NULL),
(97, 1, 'MOTOR DE VENTILADOR DE 10 W', NULL, 80, 21, NULL, '2020-06-12 14:12:20', '2020-06-12 14:12:20', NULL),
(98, 1, 'MOTOR VENTILADOR 10 W', NULL, 77, 22, NULL, '2020-06-12 14:12:21', '2020-06-12 14:12:21', NULL),
(99, 1, 'MOTOR VENTILADOR 10 WV', NULL, 84, 16, NULL, '2020-06-12 14:12:41', '2020-06-12 14:12:41', NULL),
(100, 1, 'HUINCHA AISLANTE PLASTICA', NULL, 78, 2, NULL, '2020-06-12 14:13:02', '2020-06-12 14:13:02', NULL),
(101, 1, 'CINTA AISLANTE', NULL, 84, 16, NULL, '2020-06-12 14:13:16', '2020-06-12 14:13:16', NULL),
(108, 1, 'SONDA NTC', NULL, 92, 13, NULL, '2020-06-16 13:10:58', '2020-06-16 13:10:58', NULL),
(109, 21, 'TUBOS T5 28W', NULL, 94, 10, NULL, '2020-06-17 11:57:12', '2020-06-17 11:57:12', NULL),
(110, 1, 'SILICONA BLANCA', NULL, 100, 10, NULL, '2020-06-17 12:35:32', '2020-06-17 12:35:32', NULL),
(114, 1, 'MOTOR 34W', NULL, 110, 21, NULL, '2020-06-18 09:04:35', '2020-06-18 09:04:35', NULL),
(115, 4, 'MOTORES VENTILADORES 12X12X220V', NULL, 114, 10, NULL, '2020-06-18 16:56:14', '2020-06-18 16:56:14', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_03_05_040819_create_posts_table', 1),
(4, '2020_03_05_042115_create_categories_table', 1),
(5, '2020_03_05_043328_create_tags_table', 1),
(6, '2020_03_05_043530_create_post_tag_table', 1),
(7, '2020_03_08_012833_create_photos_table', 1),
(8, '2020_03_10_043349_create_permission_tables', 1),
(9, '2020_04_24_143507_create_parameters_table', 1),
(10, '2020_04_24_144445_create_materials_table', 1),
(11, '2020_04_24_145004_create_clients_table', 1),
(12, '2020_04_24_150222_create_types_table', 1),
(13, '2020_04_24_150250_create_problems_table', 1),
(14, '2020_04_26_061927_create_signatures_table', 1),
(15, '2020_04_28_001636_create_orders_table', 1),
(16, '2020_04_29_233919_create_refrigerants_table', 1),
(17, '2020_04_30_033759_create_parameter_refrigerant_table', 1),
(18, '2020_05_10_091139_create_emails_table', 1),
(19, '2020_05_11_233254_create_people_table', 1),
(20, '2020_05_14_003838_create_client_people_table', 1),
(21, '2020_05_14_033439_create_records_table', 1),
(22, '2020_05_15_024444_create_vehicles_table', 1),
(23, '2020_05_15_030528_create_quotes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(1, 'App\\User', 5),
(3, 'App\\User', 7),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(2, 'App\\User', 10),
(2, 'App\\User', 12),
(2, 'App\\User', 13),
(2, 'App\\User', 14),
(2, 'App\\User', 15),
(2, 'App\\User', 16),
(2, 'App\\User', 17),
(2, 'App\\User', 18),
(2, 'App\\User', 19),
(2, 'App\\User', 20),
(2, 'App\\User', 21),
(2, 'App\\User', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` mediumtext COLLATE utf8mb4_unicode_ci,
  `iframe` mediumtext COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `arrival_at` datetime DEFAULT NULL,
  `goes_at` datetime DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `type_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_id` int(10) UNSIGNED DEFAULT NULL,
  `job` text COLLATE utf8mb4_unicode_ci,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `vehicle_id` int(10) UNSIGNED DEFAULT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `signature_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parameters`
--

CREATE TABLE `parameters` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temperature` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pressure_low` int(10) UNSIGNED DEFAULT NULL,
  `pressure_high` int(10) UNSIGNED DEFAULT NULL,
  `refrigerant` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oil` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refrigerant_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `parameters`
--

INSERT INTO `parameters` (`id`, `type`, `temperature`, `pressure_low`, `pressure_high`, `refrigerant`, `oil`, `refrigerant_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MEDIA', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(2, 'BAJO', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(3, 'BAJO', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(4, 'MEDIA', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 14:05:26', '2020-05-19 14:05:26', NULL),
(6, 'MEDIA', 'SI', 20, 34, 'MEDIA', 'ALTA', '4', '2020-05-22 02:38:45', '2020-05-22 02:41:06', NULL),
(7, NULL, 'SI', NULL, NULL, NULL, NULL, NULL, '2020-05-22 02:43:25', '2020-05-24 01:31:27', NULL),
(8, 'BAJA', 'SI', NULL, NULL, NULL, NULL, NULL, '2020-05-24 22:49:15', '2020-05-24 22:50:32', NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-26 15:47:27', '2020-05-26 15:47:27', NULL),
(10, 'MEDIA', 'SI', 50, 250, 'ALTA', 'ALTA', '3', '2020-05-27 09:13:36', '2020-05-27 09:18:46', NULL),
(11, 'MEDIA', 'SI', 50, 250, 'ALTA', 'ALTA', '3', '2020-05-27 09:33:16', '2020-05-27 09:35:26', NULL),
(12, NULL, 'SI', NULL, NULL, 'ALTA', 'ALTA', NULL, '2020-05-27 15:33:23', '2020-05-27 15:36:08', NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-27 16:20:58', '2020-05-27 16:20:58', NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-27 18:12:30', '2020-05-27 18:12:30', NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-28 01:59:06', '2020-05-28 01:59:06', NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-28 15:46:47', '2020-05-28 15:46:47', NULL),
(17, NULL, NULL, NULL, NULL, 'MEDIA', 'BAJA', NULL, '2020-05-28 15:53:15', '2020-05-29 02:11:24', NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-28 17:12:08', '2020-05-28 17:12:08', NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-28 17:53:03', '2020-05-28 17:53:03', NULL),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-29 13:12:32', '2020-05-29 13:12:32', NULL),
(21, 'BAJA', 'SI', NULL, NULL, NULL, NULL, NULL, '2020-05-30 11:47:02', '2020-06-02 01:42:32', NULL),
(22, 'MEDIA', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 09:05:22', '2020-06-01 09:06:27', NULL),
(23, 'BAJA', 'SI', 10, 230, 'ALTA', 'MEDIA', '3', '2020-06-01 10:21:41', '2020-06-01 10:39:17', NULL),
(24, 'BAJA', 'SI', 10, 230, 'ALTA', 'MEDIA', '3', '2020-06-01 10:21:43', '2020-06-01 10:39:18', NULL),
(25, 'BAJA', 'SI', 10, 220, 'ALTA', 'MEDIA', '3', '2020-06-01 10:22:26', '2020-06-01 10:39:18', NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 11:15:19', '2020-06-01 11:15:19', NULL),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 11:16:10', '2020-06-01 11:16:10', NULL),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-01 11:16:32', '2020-06-01 11:16:32', NULL),
(29, 'BAJA', 'SI', 45, 225, 'MEDIA', 'MEDIA', '3', '2020-06-01 11:16:48', '2020-06-01 11:19:12', NULL),
(30, 'MEDIA', 'SI', 30, 240, 'ALTA', 'MEDIA', '3', '2020-06-01 11:20:20', '2020-06-01 11:22:46', NULL),
(31, 'MEDIA', 'SI', NULL, NULL, NULL, NULL, NULL, '2020-06-01 14:56:51', '2020-06-01 15:04:41', NULL),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-02 17:51:08', '2020-06-02 17:51:08', NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 11:47:13', '2020-06-03 11:47:13', NULL),
(34, NULL, 'NO', 40, 200, 'ALTA', 'ALTA', NULL, '2020-06-03 11:51:59', '2020-06-03 11:53:57', NULL),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 12:17:33', '2020-06-03 12:17:33', NULL),
(36, 'MEDIA', 'SI', 48, 250, 'MEDIA', 'MEDIA', '3', '2020-06-03 14:17:01', '2020-06-03 14:28:44', NULL),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 14:17:01', '2020-06-03 14:17:01', NULL),
(38, 'MEDIA', 'SI', 40, 200, 'MEDIA', 'MEDIA', '1', '2020-06-03 14:17:01', '2020-06-03 14:28:44', NULL),
(39, 'MEDIA', 'SI', 40, 200, 'MEDIA', 'MEDIA', '1', '2020-06-03 14:17:02', '2020-06-03 14:28:44', NULL),
(40, 'MEDIA', 'SI', 35, 200, 'MEDIA', 'MEDIA', '1', '2020-06-03 14:17:02', '2020-06-03 14:28:45', NULL),
(41, 'MEDIA', 'SI', 40, 200, 'MEDIA', 'MEDIA', '1', '2020-06-03 14:17:45', '2020-06-03 14:28:45', NULL),
(42, NULL, NULL, 35, 210, 'ALTA', NULL, '1', '2020-06-03 15:02:48', '2020-06-03 15:16:11', NULL),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-03 15:17:18', '2020-06-03 15:17:18', NULL),
(44, NULL, 'SI', 20, 230, 'ALTA', 'ALTA', NULL, '2020-06-03 15:59:46', '2020-06-03 16:01:24', NULL),
(45, NULL, 'SI', NULL, NULL, 'ALTA', 'ALTA', NULL, '2020-06-03 16:04:48', '2020-06-03 16:06:59', NULL),
(46, 'MEDIA', 'SI', NULL, NULL, NULL, NULL, NULL, '2020-06-03 16:21:08', '2020-06-03 16:23:13', NULL),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-04 12:56:08', '2020-06-04 12:56:08', NULL),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-04 14:11:14', '2020-06-04 14:11:14', NULL),
(49, NULL, 'NO', NULL, NULL, 'ALTA', 'ALTA', NULL, '2020-06-04 14:41:41', '2020-06-04 14:43:16', NULL),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-04 18:26:36', '2020-06-04 18:26:36', NULL),
(51, 'MEDIA', 'SI', 40, 250, 'ALTA', 'ALTA', '1', '2020-06-05 11:00:52', '2020-06-05 11:05:18', NULL),
(52, 'MEDIA', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-05 11:08:46', '2020-06-05 11:10:39', NULL),
(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-05 16:32:35', '2020-06-05 16:32:35', NULL),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-07 18:39:46', '2020-06-07 18:39:46', NULL),
(55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-07 18:48:37', '2020-06-07 18:48:37', NULL),
(56, 'MEDIA', 'SI', 40, 220, 'ALTA', 'ALTA', '1', '2020-06-08 11:18:30', '2020-06-08 11:20:55', NULL),
(57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-09 11:54:17', '2020-06-09 11:54:17', NULL),
(58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-09 12:03:43', '2020-06-09 12:03:43', NULL),
(59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-09 12:12:03', '2020-06-09 12:12:03', NULL),
(60, 'MEDIA', 'SI', 30, 200, 'ALTA', 'MEDIA', NULL, '2020-06-09 18:23:05', '2020-06-09 18:28:48', NULL),
(61, 'MEDIA', 'SI', 25, 200, 'ALTA', 'MEDIA', NULL, '2020-06-09 18:51:22', '2020-06-09 18:57:29', NULL),
(62, 'MEDIA', 'SI', 50, 220, 'ALTA', 'ALTA', '3', '2020-06-10 08:38:35', '2020-06-10 08:41:13', NULL),
(63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-10 09:50:32', '2020-06-10 09:50:32', NULL),
(64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-10 10:22:41', '2020-06-10 10:22:41', NULL),
(65, 'MEDIA', 'NO', NULL, NULL, NULL, NULL, NULL, '2020-06-11 12:26:24', '2020-06-11 12:29:07', NULL),
(66, 'MEDIA', 'SI', 50, 220, 'ALTA', 'ALTA', '3', '2020-06-12 09:22:55', '2020-06-12 09:25:37', NULL),
(67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 11:01:26', '2020-06-12 11:01:26', NULL),
(68, 'MEDIA', 'SI', 50, 250, 'ALTA', 'ALTA', '3', '2020-06-12 11:08:24', '2020-06-12 11:10:54', NULL),
(69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 12:00:50', '2020-06-12 12:00:50', NULL),
(70, 'MEDIA', 'SI', 40, 220, 'ALTA', 'MEDIA', '1', '2020-06-12 13:38:16', '2020-06-12 14:11:34', NULL),
(71, 'MEDIA', 'SI', 40, 220, 'MEDIA', 'MEDIA', '1', '2020-06-12 13:38:18', '2020-06-12 14:11:36', NULL),
(72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 13:38:21', '2020-06-12 13:38:21', NULL),
(73, 'MEDIA', 'SI', 40, 220, 'MEDIA', 'MEDIA', '1', '2020-06-12 13:38:44', '2020-06-12 14:11:34', NULL),
(74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 13:40:53', '2020-06-12 13:40:53', NULL),
(75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 13:44:36', '2020-06-12 13:44:36', NULL),
(76, NULL, 'SI', 40, 220, 'MEDIA', 'MEDIA', '1', '2020-06-12 13:45:19', '2020-06-12 14:11:38', NULL),
(77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-14 14:05:20', '2020-06-14 14:05:20', NULL),
(78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-15 00:13:55', '2020-06-15 00:13:55', NULL),
(79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-15 00:15:25', '2020-06-15 00:15:25', NULL),
(80, 'MEDIA', 'SI', 50, 250, 'ALTA', 'ALTA', '1', '2020-06-15 14:33:51', '2020-06-15 14:35:58', NULL),
(81, 'MEDIA', 'SI', 50, 250, 'ALTA', 'ALTA', '1', '2020-06-15 14:40:32', '2020-06-15 14:43:33', NULL),
(82, NULL, 'SI', NULL, NULL, 'ALTA', 'ALTA', NULL, '2020-06-15 14:48:15', '2020-06-15 14:55:20', NULL),
(83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-15 16:34:17', '2020-06-15 16:34:17', NULL),
(84, NULL, 'SI', NULL, NULL, NULL, NULL, NULL, '2020-06-16 13:06:31', '2020-06-16 13:10:46', NULL),
(85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 11:43:34', '2020-06-17 11:43:34', NULL),
(86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 11:54:18', '2020-06-17 11:54:18', NULL),
(87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 12:13:56', '2020-06-17 12:13:56', NULL),
(88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 12:33:31', '2020-06-17 12:33:31', NULL),
(89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 12:41:58', '2020-06-17 12:41:58', NULL),
(90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 12:52:39', '2020-06-17 12:52:39', NULL),
(91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 12:53:27', '2020-06-17 12:53:27', NULL),
(92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 12:53:58', '2020-06-17 12:53:58', NULL),
(93, 'MEDIA', 'SI', 50, 220, 'ALTA', 'ALTA', '3', '2020-06-17 17:28:11', '2020-06-17 17:30:06', NULL),
(94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 17:34:19', '2020-06-17 17:34:19', NULL),
(95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 19:15:00', '2020-06-17 19:15:00', NULL),
(96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17 19:20:07', '2020-06-17 19:20:07', NULL),
(97, 'MEDIA', 'SI', NULL, NULL, NULL, NULL, NULL, '2020-06-18 08:58:23', '2020-06-18 09:03:33', NULL),
(98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-18 10:08:40', '2020-06-18 10:08:40', NULL),
(99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-18 10:49:34', '2020-06-18 10:49:34', NULL),
(100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-18 16:40:25', '2020-06-18 16:40:25', NULL),
(101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-18 16:52:08', '2020-06-18 16:52:08', NULL),
(102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-18 17:00:07', '2020-06-18 17:00:07', NULL),
(103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-18 18:00:45', '2020-06-18 18:00:45', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parameter_refrigerant`
--

CREATE TABLE `parameter_refrigerant` (
  `id` int(10) UNSIGNED NOT NULL,
  `parameter_id` int(10) UNSIGNED NOT NULL,
  `refrigerant_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('david.villegas.aguilar@gmail.com', '$2y$10$OwKKedS6.wvTFAF3oJWZ1eDQSKvTguGR30k9T50UnJjVnfyYWVrhO', '2020-05-24 04:57:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_surname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_surname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `first_name`, `middle_name`, `father_surname`, `mother_surname`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DAVID', NULL, 'VILLEGAS', 'AGUILAR', 'david.villegas.aguilar@gmail.com', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(2, 'DAVID', NULL, 'AGUILAR', NULL, 'david.aguilar@msn.com', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(3, NULL, NULL, NULL, NULL, 'atencionclientes@ecorefchile.cl', '2020-06-18 10:05:50', '2020-06-18 10:05:50', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'View posts', 'Ver ordenes', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(2, 'Create posts', 'Crear ordenes', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(3, 'Update posts', 'Actualizar ordenes', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(4, 'Delete posts', 'Eliminar ordenes', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(5, 'View users', 'Ver usuarios', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(6, 'Create users', 'Crear usuarios', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(7, 'Update users', 'Actualizar usuarios', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(8, 'Delete users', 'Eliminar usuarios', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(9, 'View roles', 'Ver roles', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(10, 'Create roles', 'Crear roles', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(11, 'Update roles', 'Actualizar roles', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(12, 'Delete roles', 'Eliminar roles', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(13, 'View permissions', 'Ver permisos', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(14, 'Update permissions', 'Actualizar permisos', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PROBLEMA',
  `url` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `photos`
--

INSERT INTO `photos` (`id`, `title`, `type`, `url`, `post_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'ANTES', 'PROBLEMA', '/img/orders/ot16057-27052020153813.jpg', 12, '2020-05-27 15:38:13', '2020-05-27 15:38:13', NULL),
(19, 'DESPUES', 'PROBLEMA', '/img/orders/ot16057-27052020153844.jpeg', 12, '2020-05-27 15:38:45', '2020-05-27 15:38:45', NULL),
(20, '', 'ORDEN', '/img/orders/ot16057-27052020155552.jpg', 12, '2020-05-27 15:55:53', '2020-05-27 15:55:53', NULL),
(21, 'ANTES', 'PROBLEMA', '/img/orders/ot16053-27052020162340.jpeg', 13, '2020-05-27 16:23:41', '2020-05-27 16:23:41', NULL),
(28, 'ORDEN', 'ORDEN', '/img/orders/ot16053-28052020114743.jpg', 13, '2020-05-28 11:47:44', '2020-05-28 11:47:44', NULL),
(30, 'PLACA EVAPORADOR', 'PROBLEMA', '/img/orders/ot15261-28052020172811.jpeg', 19, '2020-05-28 17:28:11', '2020-05-28 17:28:11', NULL),
(33, 'EVAPORADOR', 'PROBLEMA', '/img/orders/ot15261-28052020172931.jpeg', 19, '2020-05-28 17:29:31', '2020-05-28 17:29:31', NULL),
(34, '1º FUGA', 'PROBLEMA', '/img/orders/ot15261-28052020172945.jpg', 19, '2020-05-28 17:29:46', '2020-05-28 17:29:46', NULL),
(35, '2º FUGA', 'PROBLEMA', '/img/orders/ot15261-28052020173005.jpeg', 19, '2020-05-28 17:30:05', '2020-05-28 17:30:05', NULL),
(36, 'DAÑOS', 'PROBLEMA', '/img/orders/ot15261-28052020173100.jpeg', 19, '2020-05-28 17:31:00', '2020-05-28 17:31:00', NULL),
(37, 'COMPRESOR, FUGAS', 'PROBLEMA', '/img/orders/ot15262-28052020183837.jpeg', 20, '2020-05-28 18:38:38', '2020-05-28 18:38:38', NULL),
(38, 'COMPONENTES, FUGAS', 'PROBLEMA', '/img/orders/ot15262-28052020183904.jpeg', 20, '2020-05-28 18:39:05', '2020-05-28 18:39:05', NULL),
(39, 'CONDENSADOR CORROIDO', 'PROBLEMA', '/img/orders/ot15262-28052020183955.jpeg', 20, '2020-05-28 18:39:55', '2020-05-28 18:39:55', NULL),
(40, 'EVAPORADOR DETERIORO', 'PROBLEMA', '/img/orders/ot15262-28052020184027.jpeg', 20, '2020-05-28 18:40:27', '2020-05-28 18:40:27', NULL),
(41, 'CALEFACTORES DAÑADOS', 'PROBLEMA', '/img/orders/ot15262-28052020184056.jpeg', 20, '2020-05-28 18:40:56', '2020-05-28 18:40:56', NULL),
(42, 'EVAPORADOR', 'PROBLEMA', '/img/orders/ot15262-28052020184116.jpeg', 20, '2020-05-28 18:41:16', '2020-05-28 18:41:16', NULL),
(45, 'PINTURA DE BANDEJAS', 'PROBLEMA', '/img/orders/ot15263-29052020132513.jpeg', 21, '2020-05-29 13:25:13', '2020-05-29 13:25:13', NULL),
(46, 'PINTURA DE FONDO', 'PROBLEMA', '/img/orders/ot15263-29052020132535.jpeg', 21, '2020-05-29 13:25:35', '2020-05-29 13:25:35', NULL),
(47, 'ARMADO', 'PROBLEMA', '/img/orders/ot15263-29052020132553.jpeg', 21, '2020-05-29 13:25:53', '2020-05-29 13:25:53', NULL),
(48, 'TERMINADO', 'PROBLEMA', '/img/orders/ot15263-29052020132617.jpeg', 21, '2020-05-29 13:26:17', '2020-05-29 13:26:17', NULL),
(49, 'OT16050', 'ORDEN', '/img/orders/ot15263-29052020132640.jpeg', 21, '2020-05-29 13:26:40', '2020-05-29 13:26:40', NULL),
(51, 'VENTILADOR DAÑADO', 'PROBLEMA', '/img/orders/ot15263-01062020104830.jpg', 25, '2020-06-01 10:48:30', '2020-06-18 10:45:24', '2020-06-18 10:45:24'),
(52, 'VENTILADOR ANTIGUO', 'PROBLEMA', '/img/orders/ot15263-01062020104855.jpg', 26, '2020-06-01 10:48:56', '2020-06-18 10:45:48', '2020-06-18 10:45:48'),
(53, 'VENTILADOR ANTIGUO', 'PROBLEMA', '/img/orders/ot15263-01062020104900.jpg', 27, '2020-06-01 10:49:01', '2020-06-18 10:45:39', '2020-06-18 10:45:39'),
(54, 'VENTILADOR NUEVO', 'PROBLEMA', '/img/orders/ot15263-01062020105531.jpg', 26, '2020-06-01 10:55:31', '2020-06-18 10:45:48', '2020-06-18 10:45:48'),
(55, 'VENTILADOR NUEVO', 'PROBLEMA', '/img/orders/ot15263-01062020105539.jpg', 25, '2020-06-01 10:55:40', '2020-06-18 10:45:24', '2020-06-18 10:45:24'),
(56, 'VENTILADOR NUEVOS', 'PROBLEMA', '/img/orders/ot15263-01062020105549.jpg', 27, '2020-06-01 10:55:49', '2020-06-18 10:45:39', '2020-06-18 10:45:39'),
(59, 'OT 15263', 'ORDEN', '/img/orders/ot15263-01062020110209.jpg', 27, '2020-06-01 11:02:10', '2020-06-18 10:45:39', '2020-06-18 10:45:39'),
(60, 'OT 15263', 'ORDEN', '/img/orders/ot15263-01062020110209.jpg', 25, '2020-06-01 11:02:10', '2020-06-18 10:45:24', '2020-06-18 10:45:24'),
(61, '15263', 'ORDEN', '/img/orders/ot15263-01062020110212.jpg', 26, '2020-06-01 11:02:13', '2020-06-18 10:45:48', '2020-06-18 10:45:48'),
(62, 'VENTILADOR ANTIGUO', 'PROBLEMA', '/img/orders/ot15265-01062020112048.jpg', 31, '2020-06-01 11:20:48', '2020-06-01 11:20:48', NULL),
(63, 'VENTILADOR NUEVOS', 'PROBLEMA', '/img/orders/ot15265-01062020112128.jpg', 31, '2020-06-01 11:21:29', '2020-06-01 11:21:29', NULL),
(64, '', 'PROBLEMA', '/img/orders/ot1266-01062020112148.jpg', 29, '2020-06-01 11:21:48', '2020-06-18 10:44:58', '2020-06-18 10:44:58'),
(65, '', 'PROBLEMA', '/img/orders/ot1266-01062020112313.jpg', 29, '2020-06-01 11:23:14', '2020-06-18 10:44:58', '2020-06-18 10:44:58'),
(66, 'OT 15265', 'ORDEN', '/img/orders/ot15265-01062020112318.jpg', 31, '2020-06-01 11:23:18', '2020-06-01 11:23:18', NULL),
(67, '', 'ORDEN', '/img/orders/ot1266-01062020112407.jpg', 29, '2020-06-01 11:24:08', '2020-06-18 10:44:58', '2020-06-18 10:44:58'),
(71, '', 'PROBLEMA', '/img/orders/ot16075-01062020150541.jpg', 33, '2020-06-01 15:05:42', '2020-06-01 15:05:42', NULL),
(72, '', 'PROBLEMA', '/img/orders/ot16075-01062020150557.jpg', 33, '2020-06-01 15:05:58', '2020-06-01 15:05:58', NULL),
(73, '', 'PROBLEMA', '/img/orders/ot16075-01062020150614.jpg', 33, '2020-06-01 15:06:15', '2020-06-01 15:06:15', NULL),
(74, '', 'PROBLEMA', '/img/orders/ot16075-01062020150631.jpg', 33, '2020-06-01 15:06:32', '2020-06-01 15:06:32', NULL),
(75, '', 'ORDEN', '/img/orders/ot16075-01062020150653.jpg', 33, '2020-06-01 15:06:53', '2020-06-01 15:06:53', NULL),
(79, 'TÍTULO', 'ORDEN', '/img/orders/ot1034-02062020014130.jpg', 23, '2020-06-02 01:41:31', '2020-06-18 10:46:23', '2020-06-18 10:46:23'),
(80, 'ANTES', 'PROBLEMA', '/img/orders/ot16070-02062020141203.jpg', 24, '2020-06-02 14:12:04', '2020-06-02 14:12:04', NULL),
(81, 'ANTES', 'PROBLEMA', '/img/orders/ot16070-02062020141633.jpg', 24, '2020-06-02 14:16:34', '2020-06-02 14:16:34', NULL),
(82, 'CONTROLADOR QUEMADO', 'PROBLEMA', '/img/orders/ot16109-02062020175618.jpg', 34, '2020-06-02 17:56:18', '2020-06-02 17:56:18', NULL),
(83, 'CONTROLADOR NUEVO', 'PROBLEMA', '/img/orders/ot16109-02062020175657.jpg', 34, '2020-06-02 17:56:58', '2020-06-02 17:56:58', NULL),
(84, 'OT16109', 'ORDEN', '/img/orders/ot16109-02062020181530.jpg', 34, '2020-06-02 18:15:30', '2020-06-02 18:15:30', NULL),
(85, 'ANTES', 'PROBLEMA', '/img/orders/ot16116-03062020115712.jpg', 36, '2020-06-03 11:57:12', '2020-06-03 11:57:12', NULL),
(86, 'ANTES', 'PROBLEMA', '/img/orders/ot16116-03062020115816.jpg', 36, '2020-06-03 11:58:17', '2020-06-03 11:58:17', NULL),
(87, 'DESPUES', 'PROBLEMA', '/img/orders/ot16116-03062020120601.jpg', 36, '2020-06-03 12:06:02', '2020-06-03 12:06:02', NULL),
(88, 'DESPUES', 'PROBLEMA', '/img/orders/ot16116-03062020120657.jpg', 36, '2020-06-03 12:06:57', '2020-06-03 12:06:57', NULL),
(89, 'TUBOS ANTIGUOS', 'PROBLEMA', '/img/orders/ot16117-03062020122231.jpg', 37, '2020-06-03 12:22:31', '2020-06-03 12:22:31', NULL),
(90, 'TUBOS ANTIGUOS', 'PROBLEMA', '/img/orders/ot16117-03062020122445.jpg', 37, '2020-06-03 12:24:45', '2020-06-03 12:24:45', NULL),
(92, 'TUBOS NUEVOS', 'PROBLEMA', '/img/orders/ot16117-03062020122823.jpg', 37, '2020-06-03 12:28:23', '2020-06-03 12:28:23', NULL),
(94, '16117', 'ORDEN', '/img/orders/ot16117-03062020124148.jpg', 37, '2020-06-03 12:41:48', '2020-06-03 12:41:48', NULL),
(95, 'VENTILADOR DAÑADO', 'PROBLEMA', '/img/orders/ot1005-03062020143352.jpg', 43, '2020-06-03 14:33:53', '2020-06-18 10:42:23', '2020-06-18 10:42:23'),
(96, 'VENTILADOR DAÑADO', 'PROBLEMA', '/img/orders/ot1001-03062020143354.jpg', 38, '2020-06-03 14:33:55', '2020-06-18 10:42:08', '2020-06-18 10:42:08'),
(97, 'CONTACTOR QUEMADO', 'PROBLEMA', '/img/orders/ot1000-03062020143356.jpg', 42, '2020-06-03 14:33:56', '2020-06-18 10:42:14', '2020-06-18 10:42:14'),
(98, 'VENTILADOR DAÑADO', 'PROBLEMA', '/img/orders/ot1103-03062020143358.jpg', 40, '2020-06-03 14:33:58', '2020-06-18 10:43:39', '2020-06-18 10:43:39'),
(99, 'VENTILADOR DAÑADO', 'PROBLEMA', '/img/orders/ot1002-03062020143359.jpg', 41, '2020-06-03 14:33:59', '2020-06-18 10:42:32', '2020-06-18 10:42:32'),
(100, 'CONTACTOR NUEVO', 'PROBLEMA', '/img/orders/ot1000-03062020143454.jpg', 42, '2020-06-03 14:34:54', '2020-06-18 10:42:14', '2020-06-18 10:42:14'),
(101, 'VENTILADOR REPUESTO', 'PROBLEMA', '/img/orders/ot1001-03062020143456.jpg', 38, '2020-06-03 14:34:57', '2020-06-18 10:42:08', '2020-06-18 10:42:08'),
(102, 'VENTILADOR NUEVO', 'PROBLEMA', '/img/orders/ot1005-03062020143504.jpg', 43, '2020-06-03 14:35:05', '2020-06-18 10:42:23', '2020-06-18 10:42:23'),
(104, 'REMPLAZO DEL VENTILA', 'PROBLEMA', '/img/orders/ot1103-03062020143519.jpg', 40, '2020-06-03 14:35:19', '2020-06-18 10:43:39', '2020-06-18 10:43:39'),
(105, 'VENTILADOR REEMPLAZO', 'PROBLEMA', '/img/orders/ot1002-03062020143712.jpg', 41, '2020-06-03 14:37:12', '2020-06-18 10:42:32', '2020-06-18 10:42:32'),
(106, '1000', 'ORDEN', '/img/orders/ot1000-03062020143818.jpg', 42, '2020-06-03 14:38:19', '2020-06-18 10:42:14', '2020-06-18 10:42:14'),
(107, '1002', 'ORDEN', '/img/orders/ot1002-03062020144004.jpg', 41, '2020-06-03 14:40:05', '2020-06-18 10:42:32', '2020-06-18 10:42:32'),
(108, '1103', 'ORDEN', '/img/orders/ot1103-03062020144008.jpg', 40, '2020-06-03 14:40:09', '2020-06-18 10:43:39', '2020-06-18 10:43:39'),
(109, 'OT 1005', 'ORDEN', '/img/orders/ot1005-03062020144026.jpg', 43, '2020-06-03 14:40:27', '2020-06-18 10:42:23', '2020-06-18 10:42:23'),
(110, 'FUGA', 'PROBLEMA', '/img/orders/ot16111-03062020151120.jpg', 44, '2020-06-03 15:11:20', '2020-06-03 15:11:20', NULL),
(111, 'REPARACION', 'PROBLEMA', '/img/orders/ot16111-03062020151208.jpg', 44, '2020-06-03 15:12:08', '2020-06-03 15:12:08', NULL),
(112, '', 'ORDEN', '/img/orders/ot16111-03062020151332.jpg', 44, '2020-06-03 15:13:33', '2020-06-03 15:13:33', NULL),
(114, 'AILACION DAÑADA', 'PROBLEMA', '/img/orders/ot16108-03062020152329.jpg', 45, '2020-06-03 15:23:29', '2020-06-03 15:23:29', NULL),
(115, 'AILACION NUEVA', 'PROBLEMA', '/img/orders/ot16108-03062020152407.jpg', 45, '2020-06-03 15:24:07', '2020-06-03 15:24:07', NULL),
(116, '', 'ORDEN', '/img/orders/ot16108-03062020152502.jpg', 45, '2020-06-03 15:25:03', '2020-06-03 15:25:03', NULL),
(117, 'ANTES', 'PROBLEMA', '/img/orders/ot16119-03062020160213.jpg', 46, '2020-06-03 16:02:14', '2020-06-03 16:02:14', NULL),
(118, 'DESPUES', 'PROBLEMA', '/img/orders/ot16119-03062020160246.jpg', 46, '2020-06-03 16:02:47', '2020-06-03 16:02:47', NULL),
(119, '', 'ORDEN', '/img/orders/ot16119-03062020160326.jpg', 46, '2020-06-03 16:03:27', '2020-06-03 16:03:27', NULL),
(120, 'ANTES', 'PROBLEMA', '/img/orders/ot16120-03062020160901.jpg', 47, '2020-06-03 16:09:01', '2020-06-03 16:09:01', NULL),
(121, 'DESPUES', 'PROBLEMA', '/img/orders/ot16120-03062020160933.jpg', 47, '2020-06-03 16:09:34', '2020-06-03 16:09:34', NULL),
(122, '', 'ORDEN', '/img/orders/ot16120-03062020161016.jpg', 47, '2020-06-03 16:10:17', '2020-06-03 16:10:17', NULL),
(123, 'CONTACTOR CON FALLA', 'PROBLEMA', '/img/orders/ot16123-03062020162455.jpg', 48, '2020-06-03 16:24:55', '2020-06-03 16:24:55', NULL),
(124, '', 'ORDEN', '/img/orders/ot16123-03062020162542.jpg', 48, '2020-06-03 16:25:43', '2020-06-03 16:25:43', NULL),
(130, '', 'PROBLEMA', '/img/orders/ot1004-04062020113511.jpg', 39, '2020-06-04 11:35:11', '2020-06-04 13:40:45', '2020-06-04 13:40:45'),
(131, '', 'PROBLEMA', '/img/orders/ot1004-04062020113556.jpg', 39, '2020-06-04 11:35:57', '2020-06-04 13:40:49', '2020-06-04 13:40:49'),
(132, '', 'PROBLEMA', '/img/orders/ot1004-04062020114101.jpg', 39, '2020-06-04 11:41:02', '2020-06-04 13:40:47', '2020-06-04 13:40:47'),
(141, 'ANTES', 'PROBLEMA', '/img/orders/ot16121-04062020130049.jpg', 49, '2020-06-04 13:00:49', '2020-06-04 13:00:49', NULL),
(142, 'REPARADO', 'PROBLEMA', '/img/orders/ot16121-04062020131430.jpg', 49, '2020-06-04 13:14:30', '2020-06-04 13:14:30', NULL),
(143, '', 'ORDEN', '/img/orders/ot16121-04062020131510.jpg', 49, '2020-06-04 13:15:10', '2020-06-04 13:15:10', NULL),
(144, '', 'ORDEN', '/img/orders/ot1004-04062020134011.jpg', 39, '2020-06-04 13:40:11', '2020-06-04 13:40:42', '2020-06-04 13:40:42'),
(145, 'ANTES', 'PROBLEMA', '/img/orders/ot16027-04062020144358.jpg', 56, '2020-06-04 14:43:59', '2020-06-04 14:43:59', NULL),
(146, 'TUBOS QUEMADO', 'PROBLEMA', '/img/orders/ot16130-04062020183955.jpg', 57, '2020-06-04 18:39:55', '2020-06-04 18:40:00', '2020-06-04 18:40:00'),
(147, 'TUBOS QUEMADOS', 'PROBLEMA', '/img/orders/ot16130-04062020184858.jpg', 57, '2020-06-04 18:48:59', '2020-06-04 18:48:59', NULL),
(148, 'TUBOS NUEVOS', 'PROBLEMA', '/img/orders/ot16130-04062020184923.jpg', 57, '2020-06-04 18:49:24', '2020-06-04 18:49:24', NULL),
(149, 'TUBOS QUEMADOS', 'PROBLEMA', '/img/orders/ot16130-04062020184955.jpg', 57, '2020-06-04 18:49:55', '2020-06-04 18:49:55', NULL),
(150, 'TUBOS NUEVOS', 'PROBLEMA', '/img/orders/ot16130-04062020185031.jpg', 57, '2020-06-04 18:50:32', '2020-06-04 18:50:32', NULL),
(151, '16130', 'ORDEN', '/img/orders/ot16130-04062020185522.jpg', 57, '2020-06-04 18:55:22', '2020-06-04 18:55:22', NULL),
(152, '', 'PROBLEMA', '/img/orders/ot1004-05062020095340.jpg', 39, '2020-06-05 09:53:40', '2020-06-18 10:42:41', '2020-06-18 10:42:41'),
(153, '', 'PROBLEMA', '/img/orders/ot1004-05062020095659.jpg', 39, '2020-06-05 09:57:00', '2020-06-18 10:42:41', '2020-06-18 10:42:41'),
(154, '', 'PROBLEMA', '/img/orders/ot1004-05062020095720.jpg', 39, '2020-06-05 09:57:21', '2020-06-18 10:42:41', '2020-06-18 10:42:41'),
(155, '', 'PROBLEMA', '/img/orders/ot1004-05062020095747.jpg', 39, '2020-06-05 09:57:48', '2020-06-18 10:42:41', '2020-06-18 10:42:41'),
(156, 'ANTES', 'PROBLEMA', '/img/orders/ot16131-05062020110838.jpg', 58, '2020-06-05 11:08:39', '2020-06-05 11:08:39', NULL),
(157, 'ANTES', 'PROBLEMA', '/img/orders/ot16131-05062020110902.jpg', 58, '2020-06-05 11:09:03', '2020-06-05 11:09:03', NULL),
(158, 'ANTES', 'PROBLEMA', '/img/orders/ot16131-05062020110945.jpg', 58, '2020-06-05 11:09:46', '2020-06-05 11:09:46', NULL),
(159, 'DESPUES', 'PROBLEMA', '/img/orders/ot16131-05062020111033.jpg', 58, '2020-06-05 11:10:34', '2020-06-05 11:10:34', NULL),
(160, 'DESPUES', 'PROBLEMA', '/img/orders/ot16131-05062020111104.jpg', 58, '2020-06-05 11:11:05', '2020-06-05 11:11:05', NULL),
(161, 'DESPUES', 'PROBLEMA', '/img/orders/ot16131-05062020111146.jpg', 58, '2020-06-05 11:11:47', '2020-06-05 11:11:47', NULL),
(162, 'ILUMINACIÓN', 'PROBLEMA', '/img/orders/ot16132-05062020111609.jpeg', 59, '2020-06-05 11:16:10', '2020-06-05 11:16:10', NULL),
(163, '', 'ORDEN', '/img/orders/ot16131-05062020113041.jpg', 58, '2020-06-05 11:30:42', '2020-06-05 11:30:42', NULL),
(164, 'ANTIGUO', 'PROBLEMA', '/img/orders/ot16137-05062020163529.jpg', 60, '2020-06-05 16:35:29', '2020-06-05 16:35:29', NULL),
(165, 'NUEVO Y EL  QUEMADO', 'PROBLEMA', '/img/orders/ot16137-05062020163632.jpg', 60, '2020-06-05 16:36:32', '2020-06-05 16:36:32', NULL),
(166, '', 'ORDEN', '/img/orders/ot16137-05062020163702.jpg', 60, '2020-06-05 16:37:02', '2020-06-05 16:37:02', NULL),
(167, 'CON HIELO', 'PROBLEMA', '/img/orders/ot16140-07062020184418.jpg', 61, '2020-06-07 18:44:18', '2020-06-07 18:44:18', NULL),
(168, 'SE RETIRO HIELO', 'PROBLEMA', '/img/orders/ot16140-07062020184445.jpg', 61, '2020-06-07 18:44:45', '2020-06-07 18:44:45', NULL),
(169, '', 'ORDEN', '/img/orders/ot16140-07062020184531.jpg', 61, '2020-06-07 18:45:31', '2020-06-07 18:45:31', NULL),
(170, 'MOJADO', 'PROBLEMA', '/img/orders/ot16142-07062020185215.jpg', 62, '2020-06-07 18:52:15', '2020-06-07 18:52:15', NULL),
(171, 'SECADO', 'PROBLEMA', '/img/orders/ot16142-07062020185339.jpg', 62, '2020-06-07 18:53:40', '2020-06-07 18:53:40', NULL),
(172, '', 'ORDEN', '/img/orders/ot16142-07062020185406.jpg', 62, '2020-06-07 18:54:06', '2020-06-07 18:54:06', NULL),
(173, 'ANTES', 'PROBLEMA', '/img/orders/ot16144-08062020112132.jpg', 63, '2020-06-08 11:21:33', '2020-06-08 11:21:33', NULL),
(174, 'DESPUES', 'PROBLEMA', '/img/orders/ot16144-08062020112325.jpg', 63, '2020-06-08 11:23:26', '2020-06-08 11:23:26', NULL),
(175, 'DESPUES', 'PROBLEMA', '/img/orders/ot16144-08062020112352.jpg', 63, '2020-06-08 11:23:53', '2020-06-08 11:23:53', NULL),
(176, '', 'ORDEN', '/img/orders/ot16144-08062020112506.jpg', 63, '2020-06-08 11:25:07', '2020-06-08 11:25:07', NULL),
(177, 'APAGADO', 'PROBLEMA', '/img/orders/ot16145-09062020115819.jpg', 64, '2020-06-09 11:58:19', '2020-06-09 11:58:19', NULL),
(178, 'ENCENDIDO', 'PROBLEMA', '/img/orders/ot16145-09062020115947.jpg', 64, '2020-06-09 11:59:47', '2020-06-09 12:00:09', '2020-06-09 12:00:09'),
(179, 'ENCENDIDO', 'PROBLEMA', '/img/orders/ot16145-09062020120045.jpg', 64, '2020-06-09 12:00:46', '2020-06-09 12:00:46', NULL),
(180, '', 'ORDEN', '/img/orders/ot16145-09062020120219.jpg', 64, '2020-06-09 12:02:20', '2020-06-09 12:02:20', NULL),
(181, 'QUEMADO', 'PROBLEMA', '/img/orders/ot16149-09062020120807.jpg', 65, '2020-06-09 12:08:07', '2020-06-09 12:08:07', NULL),
(182, 'REPARADO', 'PROBLEMA', '/img/orders/ot16149-09062020120836.jpg', 65, '2020-06-09 12:08:36', '2020-06-09 12:08:36', NULL),
(183, '', 'ORDEN', '/img/orders/ot16149-09062020120905.jpg', 65, '2020-06-09 12:09:05', '2020-06-09 12:09:05', NULL),
(184, 'CONTROLADOR MALO', 'PROBLEMA', '/img/orders/ot16151-09062020121438.jpg', 66, '2020-06-09 12:14:39', '2020-06-09 12:14:39', NULL),
(185, 'CONTROLADOR NUEVO', 'PROBLEMA', '/img/orders/ot16151-09062020121520.jpg', 66, '2020-06-09 12:15:20', '2020-06-09 12:15:20', NULL),
(186, '', 'ORDEN', '/img/orders/ot16151-09062020121542.jpg', 66, '2020-06-09 12:15:43', '2020-06-09 12:15:43', NULL),
(187, 'FUGA EN CARTER DEL C', 'PROBLEMA', '/img/orders/ot16152-09062020183204.jpg', 67, '2020-06-09 18:32:04', '2020-06-09 18:32:04', NULL),
(188, 'TEMPERATURA DE CAMAR', 'PROBLEMA', '/img/orders/ot16152-09062020183557.jpg', 67, '2020-06-09 18:35:58', '2020-06-09 18:35:58', NULL),
(189, '', 'ORDEN', '/img/orders/ot16152-09062020183836.jpg', 67, '2020-06-09 18:38:36', '2020-06-09 18:38:36', NULL),
(190, 'EVAPORADOR CON HIELO', 'PROBLEMA', '/img/orders/ot16160-09062020185941.jpg', 68, '2020-06-09 18:59:41', '2020-06-09 18:59:41', NULL),
(191, 'EVAPORADOR LIMPIO', 'PROBLEMA', '/img/orders/ot16160-09062020190032.jpg', 68, '2020-06-09 19:00:33', '2020-06-09 19:00:33', NULL),
(192, '', 'ORDEN', '/img/orders/ot16160-09062020190109.jpg', 68, '2020-06-09 19:01:09', '2020-06-09 19:01:09', NULL),
(193, 'ANTES', 'PROBLEMA', '/img/orders/ot16154-10062020084159.jpg', 69, '2020-06-10 08:42:00', '2020-06-10 08:42:00', NULL),
(194, 'ANTES', 'PROBLEMA', '/img/orders/ot16154-10062020084238.jpg', 69, '2020-06-10 08:42:39', '2020-06-10 08:42:39', NULL),
(195, 'DESPUES', 'PROBLEMA', '/img/orders/ot16154-10062020084304.jpg', 69, '2020-06-10 08:43:05', '2020-06-10 08:43:05', NULL),
(196, 'DESPUES', 'PROBLEMA', '/img/orders/ot16154-10062020084336.jpg', 69, '2020-06-10 08:43:37', '2020-06-10 08:43:37', NULL),
(197, 'DESPUES', 'PROBLEMA', '/img/orders/ot16154-10062020084402.jpg', 69, '2020-06-10 08:44:02', '2020-06-10 08:44:02', NULL),
(198, '', 'ORDEN', '/img/orders/ot16154-10062020084443.jpg', 69, '2020-06-10 08:44:44', '2020-06-10 08:44:44', NULL),
(199, 'REPARACION PLANCHA 1', 'PROBLEMA', '/img/orders/ot16105-10062020100208.jpg', 70, '2020-06-10 10:02:08', '2020-06-10 10:02:08', NULL),
(200, 'REPARACION PLANCHA 2', 'PROBLEMA', '/img/orders/ot16105-10062020100319.jpg', 70, '2020-06-10 10:03:20', '2020-06-10 10:03:20', NULL),
(201, 'REPARACION MARCO', 'PROBLEMA', '/img/orders/ot16105-10062020101723.jpg', 70, '2020-06-10 10:17:23', '2020-06-10 10:17:23', NULL),
(202, 'REP. ILUMINACION', 'PROBLEMA', '/img/orders/ot16105-10062020101811.jpg', 70, '2020-06-10 10:18:11', '2020-06-10 10:18:11', NULL),
(203, 'REP. ILUMINACION', 'PROBLEMA', '/img/orders/ot16105-10062020101915.jpg', 70, '2020-06-10 10:19:15', '2020-06-10 10:19:15', NULL),
(204, 'REP. ILUMINACION', 'PROBLEMA', '/img/orders/ot16105-10062020101933.jpg', 70, '2020-06-10 10:19:33', '2020-06-10 10:19:33', NULL),
(205, 'REP. ILUMINACIONES', 'PROBLEMA', '/img/orders/ot16106-10062020102634.jpg', 71, '2020-06-10 10:26:34', '2020-06-10 10:26:34', NULL),
(206, 'REP. ILUMINACIONES', 'PROBLEMA', '/img/orders/ot16106-10062020102653.jpg', 71, '2020-06-10 10:26:53', '2020-06-10 10:26:53', NULL),
(207, 'CORTE DE LUCES', 'PROBLEMA', '/img/orders/ot16166-11062020123118.jpg', 72, '2020-06-11 12:31:19', '2020-06-11 12:34:39', '2020-06-11 12:34:39'),
(208, '', 'PROBLEMA', '/img/orders/ot16166-11062020123158.jpg', 72, '2020-06-11 12:31:59', '2020-06-11 12:31:59', NULL),
(209, '', 'PROBLEMA', '/img/orders/ot16166-11062020123224.jpg', 72, '2020-06-11 12:32:24', '2020-06-11 12:32:24', NULL),
(210, 'REAPRACION', 'PROBLEMA', '/img/orders/ot16166-11062020123303.jpg', 72, '2020-06-11 12:33:04', '2020-06-11 12:34:27', '2020-06-11 12:34:27'),
(211, '', 'PROBLEMA', '/img/orders/ot16166-11062020123509.jpg', 72, '2020-06-11 12:35:10', '2020-06-11 12:35:10', NULL),
(212, '', 'PROBLEMA', '/img/orders/ot16166-11062020123528.jpg', 72, '2020-06-11 12:35:28', '2020-06-11 12:35:28', NULL),
(213, 'REPORTE 16166', 'ORDEN', '/img/orders/ot16166-11062020123634.jpg', 72, '2020-06-11 12:36:34', '2020-06-11 12:36:34', NULL),
(214, 'ANTES', 'PROBLEMA', '/img/orders/ot16171-12062020092609.jpg', 73, '2020-06-12 09:26:10', '2020-06-12 09:26:10', NULL),
(215, 'DESPUES', 'PROBLEMA', '/img/orders/ot16171-12062020092633.jpg', 73, '2020-06-12 09:26:33', '2020-06-12 09:26:33', NULL),
(216, '', 'ORDEN', '/img/orders/ot16171-12062020092659.jpg', 73, '2020-06-12 09:26:59', '2020-06-12 09:26:59', NULL),
(217, 'TEMPERATURA CON TERM', 'PROBLEMA', '/img/orders/ot16178-12062020110620.jpg', 74, '2020-06-12 11:06:20', '2020-06-12 11:06:20', NULL),
(218, '', 'ORDEN', '/img/orders/ot16178-12062020110644.jpg', 74, '2020-06-12 11:06:44', '2020-06-12 11:06:44', NULL),
(219, 'ANTES', 'PROBLEMA', '/img/orders/ot16179-12062020111139.jpg', 75, '2020-06-12 11:11:40', '2020-06-12 11:14:23', '2020-06-12 11:14:23'),
(220, 'ANTES', 'PROBLEMA', '/img/orders/ot16179-12062020111219.jpg', 75, '2020-06-12 11:12:19', '2020-06-12 11:12:19', NULL),
(221, 'ANTES', 'PROBLEMA', '/img/orders/ot16179-12062020111417.jpg', 75, '2020-06-12 11:14:17', '2020-06-12 11:14:17', NULL),
(222, 'DESPUES', 'PROBLEMA', '/img/orders/ot16179-12062020111510.jpg', 75, '2020-06-12 11:15:10', '2020-06-12 11:15:10', NULL),
(223, '', 'ORDEN', '/img/orders/ot16179-12062020113709.jpg', 75, '2020-06-12 11:37:10', '2020-06-12 11:37:10', NULL),
(224, '', 'PROBLEMA', '/img/orders/ot16177-12062020120717.jpg', 76, '2020-06-12 12:07:17', '2020-06-12 12:07:17', NULL),
(225, 'NUEVA', 'PROBLEMA', '/img/orders/ot16177-12062020120759.jpg', 76, '2020-06-12 12:07:59', '2020-06-12 12:07:59', NULL),
(226, '', 'ORDEN', '/img/orders/ot16177-12062020120828.jpg', 76, '2020-06-12 12:08:28', '2020-06-12 12:08:28', NULL),
(227, 'VENTILADOR MALO', 'PROBLEMA', '/img/orders/ot102-12062020141709.jpg', 77, '2020-06-12 14:17:09', '2020-06-18 10:43:54', '2020-06-18 10:43:54'),
(228, 'VENTILADOR MALO', 'PROBLEMA', '/img/orders/ot105-12062020141711.jpg', 84, '2020-06-12 14:17:11', '2020-06-18 10:43:48', '2020-06-18 10:43:48'),
(229, 'VENTILADOR DAÑADO', 'PROBLEMA', '/img/orders/ot103-12062020141715.jpg', 78, '2020-06-12 14:17:15', '2020-06-18 10:41:08', '2020-06-18 10:41:08'),
(230, 'VENTILADOR EN CORTO', 'PROBLEMA', '/img/orders/ot101-12062020141716.jpg', 80, '2020-06-12 14:17:17', '2020-06-12 14:17:17', NULL),
(231, 'VENTILADOR NUEVO', 'PROBLEMA', '/img/orders/ot102-12062020141823.jpg', 77, '2020-06-12 14:18:23', '2020-06-18 10:43:54', '2020-06-18 10:43:54'),
(232, 'VENTILADOR NUEVO', 'PROBLEMA', '/img/orders/ot101-12062020141825.jpg', 80, '2020-06-12 14:18:26', '2020-06-12 14:18:26', NULL),
(233, 'VENTILADOR NUEVO', 'PROBLEMA', '/img/orders/ot103-12062020141855.jpg', 78, '2020-06-12 14:18:56', '2020-06-18 10:41:08', '2020-06-18 10:41:08'),
(234, 'VENTILADOR NUEVO', 'PROBLEMA', '/img/orders/ot105-12062020141901.jpg', 84, '2020-06-12 14:19:01', '2020-06-18 10:43:48', '2020-06-18 10:43:48'),
(235, 'OT 102', 'ORDEN', '/img/orders/ot102-12062020142101.jpg', 77, '2020-06-12 14:21:02', '2020-06-18 10:43:54', '2020-06-18 10:43:54'),
(236, '101', 'PROBLEMA', '/img/orders/ot101-12062020142138.jpg', 80, '2020-06-12 14:21:39', '2020-06-12 14:22:29', '2020-06-12 14:22:29'),
(237, 'OT 103', 'ORDEN', '/img/orders/ot103-12062020142142.jpg', 78, '2020-06-12 14:21:43', '2020-06-18 10:41:08', '2020-06-18 10:41:08'),
(238, 'OT 105', 'ORDEN', '/img/orders/ot105-12062020142143.jpg', 84, '2020-06-12 14:21:44', '2020-06-18 10:43:48', '2020-06-18 10:43:48'),
(239, '101', 'ORDEN', '/img/orders/ot101-12062020142334.jpg', 80, '2020-06-12 14:23:35', '2020-06-12 14:23:35', NULL),
(240, 'ANTES', 'PROBLEMA', '/img/orders/ot16188-15062020143651.jpg', 88, '2020-06-15 14:36:52', '2020-06-15 14:36:52', NULL),
(241, 'DESPUES', 'PROBLEMA', '/img/orders/ot16188-15062020143730.jpg', 88, '2020-06-15 14:37:31', '2020-06-15 14:37:31', NULL),
(242, '', 'ORDEN', '/img/orders/ot16188-15062020143827.jpg', 88, '2020-06-15 14:38:28', '2020-06-15 14:38:28', NULL),
(243, 'ANTES', 'PROBLEMA', '/img/orders/ot16189-15062020144411.jpg', 89, '2020-06-15 14:44:12', '2020-06-15 14:44:12', NULL),
(244, 'DESPUES', 'PROBLEMA', '/img/orders/ot16189-15062020144440.jpg', 89, '2020-06-15 14:44:40', '2020-06-15 14:44:40', NULL),
(245, '', 'PROBLEMA', '/img/orders/ot16189-15062020144715.jpg', 89, '2020-06-15 14:47:16', '2020-06-15 14:47:16', NULL),
(246, 'ANTES', 'PROBLEMA', '/img/orders/ot16190-15062020145540.jpg', 90, '2020-06-15 14:55:41', '2020-06-15 14:55:41', NULL),
(247, 'DESPUES', 'PROBLEMA', '/img/orders/ot16190-15062020145604.jpg', 90, '2020-06-15 14:56:04', '2020-06-15 14:56:04', NULL),
(248, '', 'ORDEN', '/img/orders/ot16190-15062020145644.jpg', 90, '2020-06-15 14:56:45', '2020-06-15 14:56:45', NULL),
(249, 'ANTES', 'PROBLEMA', '/img/orders/ot16049-15062020163639.jpg', 91, '2020-06-15 16:36:40', '2020-06-15 16:36:40', NULL),
(250, 'ANTES', 'PROBLEMA', '/img/orders/ot16049-15062020163702.jpg', 91, '2020-06-15 16:37:03', '2020-06-15 16:37:03', NULL),
(251, 'DESPUES', 'PROBLEMA', '/img/orders/ot16049-15062020163742.jpg', 91, '2020-06-15 16:37:43', '2020-06-15 16:37:43', NULL),
(252, '', 'ORDEN', '/img/orders/ot16049-15062020163824.jpg', 91, '2020-06-15 16:38:25', '2020-06-15 16:38:25', NULL),
(253, 'CONTROLADOR', 'PROBLEMA', '/img/orders/ot16193-16062020134206.jpg', 92, '2020-06-16 13:42:07', '2020-06-16 13:42:07', NULL),
(254, '16193', 'ORDEN', '/img/orders/ot16193-16062020134331.jpg', 92, '2020-06-16 13:43:32', '2020-06-16 13:43:32', NULL),
(255, '', 'PROBLEMA', '/img/orders/ot16186-17062020114652.jpg', 93, '2020-06-17 11:46:52', '2020-06-17 11:46:52', NULL),
(256, '', 'PROBLEMA', '/img/orders/ot16186-17062020114723.jpg', 93, '2020-06-17 11:47:23', '2020-06-17 11:47:23', NULL),
(257, '', 'ORDEN', '/img/orders/ot16186-17062020114819.jpg', 93, '2020-06-17 11:48:19', '2020-06-17 11:48:19', NULL),
(258, '', 'PROBLEMA', '/img/orders/ot16194-17062020115809.jpg', 94, '2020-06-17 11:58:09', '2020-06-17 11:58:54', '2020-06-17 11:58:54'),
(259, '', 'PROBLEMA', '/img/orders/ot16194-17062020115928.jpg', 94, '2020-06-17 11:59:28', '2020-06-17 11:59:28', NULL),
(260, '', 'PROBLEMA', '/img/orders/ot16194-17062020115942.jpg', 94, '2020-06-17 11:59:42', '2020-06-17 11:59:42', NULL),
(261, '', 'ORDEN', '/img/orders/ot16194-17062020121117.jpg', 94, '2020-06-17 12:11:18', '2020-06-17 12:11:18', NULL),
(262, '', 'PROBLEMA', '/img/orders/ot16180-17062020121914.jpg', 95, '2020-06-17 12:19:14', '2020-06-17 12:19:14', NULL),
(263, '', 'PROBLEMA', '/img/orders/ot16180-17062020122154.jpg', 95, '2020-06-17 12:21:54', '2020-06-17 12:22:18', '2020-06-17 12:22:18'),
(264, '', 'ORDEN', '/img/orders/ot16180-17062020122247.jpg', 95, '2020-06-17 12:22:48', '2020-06-17 12:22:48', NULL),
(265, '', 'PROBLEMA', '/img/orders/ot16184-17062020123602.jpg', 100, '2020-06-17 12:36:03', '2020-06-17 12:36:03', NULL),
(266, '', 'PROBLEMA', '/img/orders/ot16184-17062020123630.jpg', 100, '2020-06-17 12:36:31', '2020-06-17 12:36:31', NULL),
(267, '', 'ORDEN', '/img/orders/ot16184-17062020123815.jpg', 100, '2020-06-17 12:38:15', '2020-06-17 12:38:15', NULL),
(268, '', 'PROBLEMA', '/img/orders/ot16150-17062020124716.jpg', 101, '2020-06-17 12:47:16', '2020-06-17 12:47:16', NULL),
(269, '', 'ORDEN', '/img/orders/ot16150-17062020124837.jpg', 101, '2020-06-17 12:48:37', '2020-06-17 12:48:37', NULL),
(270, '', 'PROBLEMA', '/img/orders/ot16180-17062020125750.jpg', 105, '2020-06-17 12:57:50', '2020-06-17 12:57:50', NULL),
(271, '', 'ORDEN', '/img/orders/ot16180-17062020125827.jpg', 105, '2020-06-17 12:58:27', '2020-06-17 12:58:27', NULL),
(272, 'ANTES', 'PROBLEMA', '/img/orders/ot16198-17062020173058.jpg', 106, '2020-06-17 17:30:59', '2020-06-17 17:30:59', NULL),
(273, 'DESPUES', 'PROBLEMA', '/img/orders/ot16198-17062020173126.jpg', 106, '2020-06-17 17:31:27', '2020-06-17 17:31:27', NULL),
(274, '', 'ORDEN', '/img/orders/ot16195-17062020185222.jpg', 107, '2020-06-17 18:52:23', '2020-06-17 18:52:23', NULL),
(275, '', 'ORDEN', '/img/orders/ot16166-17062020191827.jpg', 108, '2020-06-17 19:18:28', '2020-06-18 10:40:15', '2020-06-18 10:40:15'),
(276, '', 'ORDEN', '/img/orders/ot16196-17062020192255.jpg', 109, '2020-06-17 19:22:56', '2020-06-17 19:22:56', NULL),
(277, '', 'ORDEN', '/img/orders/ot16198-18062020090432.jpg', 106, '2020-06-18 09:04:33', '2020-06-18 09:04:33', NULL),
(278, 'MOTOR MALO', 'PROBLEMA', '/img/orders/ot16199-18062020090617.jpg', 110, '2020-06-18 09:06:17', '2020-06-18 09:06:17', NULL),
(279, 'MOTOR NUEVO', 'PROBLEMA', '/img/orders/ot16199-18062020090642.jpg', 110, '2020-06-18 09:06:42', '2020-06-18 09:06:42', NULL),
(280, '16199', 'ORDEN', '/img/orders/ot16199-18062020090740.jpg', 110, '2020-06-18 09:07:41', '2020-06-18 09:07:41', NULL),
(281, '', 'PROBLEMA', '/img/orders/ot16201-18062020164556.jpg', 113, '2020-06-18 16:45:56', '2020-06-18 16:45:56', NULL),
(282, '', 'PROBLEMA', '/img/orders/ot16201-18062020164638.jpg', 113, '2020-06-18 16:46:39', '2020-06-18 16:46:39', NULL),
(283, '', 'PROBLEMA', '/img/orders/ot16201-18062020164658.jpg', 113, '2020-06-18 16:46:59', '2020-06-18 16:46:59', NULL),
(284, '', 'ORDEN', '/img/orders/ot16201-18062020164730.jpg', 113, '2020-06-18 16:47:30', '2020-06-18 16:47:30', NULL),
(285, '', 'PROBLEMA', '/img/orders/ot16200-18062020165704.jpg', 114, '2020-06-18 16:57:04', '2020-06-18 16:57:04', NULL),
(286, '', 'PROBLEMA', '/img/orders/ot16200-18062020165720.jpg', 114, '2020-06-18 16:57:21', '2020-06-18 16:57:21', NULL),
(287, 'NUEVOS', 'PROBLEMA', '/img/orders/ot16200-18062020165749.jpg', 114, '2020-06-18 16:57:49', '2020-06-18 16:57:49', NULL),
(288, '', 'ORDEN', '/img/orders/ot16200-18062020165807.jpg', 114, '2020-06-18 16:58:07', '2020-06-18 16:58:07', NULL),
(289, 'COMO ESTABA', 'PROBLEMA', '/img/orders/ot16204-18062020170226.jpg', 115, '2020-06-18 17:02:26', '2020-06-18 17:02:26', NULL),
(290, 'COMO QUEDO', 'PROBLEMA', '/img/orders/ot16204-18062020170253.jpg', 115, '2020-06-18 17:02:54', '2020-06-18 17:02:54', NULL),
(291, '', 'ORDEN', '/img/orders/ot16204-18062020170314.jpg', 115, '2020-06-18 17:03:15', '2020-06-18 17:03:15', NULL),
(292, 'ANTES', 'PROBLEMA', '/img/orders/ot16203-18062020180250.jpg', 116, '2020-06-18 18:02:51', '2020-06-18 18:02:51', NULL),
(293, 'DESPUES', 'PROBLEMA', '/img/orders/ot16203-18062020180308.jpg', 116, '2020-06-18 18:03:09', '2020-06-18 18:03:09', NULL),
(294, '', 'ORDEN', '/img/orders/ot16203-18062020180340.jpg', 116, '2020-06-18 18:03:41', '2020-06-18 18:03:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `started_at` datetime DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `type_other` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serie` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_id` int(10) UNSIGNED DEFAULT NULL,
  `job` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDIENTE',
  `parameter_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `vehicule_id` int(10) UNSIGNED DEFAULT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `signature_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `url`, `started_at`, `finished_at`, `type_id`, `type_other`, `equipment`, `model`, `serie`, `problem_id`, `job`, `status`, `parameter_id`, `client_id`, `vehicule_id`, `observation`, `signature_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1015', '1015', '2020-05-15 13:47:17', '2020-05-19 14:05:32', 2, 'DETALLE', '', '', NULL, 4, '', 'ENVIADO', 1, 2, NULL, NULL, 3, 1, '2020-05-19 13:47:17', '2020-05-20 18:03:05', '2020-05-20 18:03:05'),
(2, '1016', '1016', '2020-05-17 13:47:17', '2020-05-19 13:51:18', 3, NULL, NULL, NULL, NULL, 3, NULL, 'ENVIADO', 2, 3, NULL, NULL, 2, 2, '2020-05-19 13:47:17', '2020-05-24 01:57:20', '2020-05-24 01:57:20'),
(3, '1017', '1017', '2020-05-12 13:47:17', '2020-05-20 08:58:11', 3, NULL, NULL, NULL, NULL, 4, NULL, 'ENVIADO', 3, 4, NULL, NULL, 5, 1, '2020-05-19 13:47:17', '2020-05-20 18:02:57', '2020-05-20 18:02:57'),
(4, '1018', '1018', '2020-05-18 13:47:17', '2020-05-19 13:48:31', 3, NULL, NULL, NULL, NULL, 1, NULL, 'ENVIADO', 4, 1, NULL, NULL, 1, 2, '2020-05-19 13:47:17', '2020-05-28 15:30:51', '2020-05-28 15:30:51'),
(5, '15260', '15260', '2020-05-19 14:05:26', '2020-05-21 14:52:10', 1, '', 'CÁMARA DE LACTEOS', 'MT', 'S/s', 3, 'SE CAMBIA VENTILADOR DE EVAPORADOR QUEMADO', 'ENVIADO', 5, 11, NULL, NULL, 4, 2, '2020-05-19 14:05:26', '2020-05-28 15:30:48', '2020-05-28 15:30:48'),
(6, '1029', '1029', '2020-05-22 02:38:45', '2020-05-22 02:42:46', 4, 'UN DETALLE', 'EQUIPO INTERVE', 'HP', '123', 3, 'TRABAJO REALIZAD', 'ENVIADO', 6, 21, NULL, NULL, 6, 2, '2020-05-22 02:38:45', '2020-05-28 15:30:44', '2020-05-28 15:30:44'),
(7, '1032', '1030', '2020-05-22 02:43:25', '2020-05-24 01:32:53', 2, '12345678901234', '123456789012345678901234567890123456789012345', '123456789012345678901234567890', 'abc', 2, 'NUEVO REGISTRO', 'ENVIADO', 7, 21, NULL, NULL, 7, 2, '2020-05-22 02:43:25', '2020-05-28 15:30:41', '2020-05-28 15:30:41'),
(8, '1033', '1033', '2020-05-24 22:49:15', '2020-05-24 22:51:29', 3, 'DETALLE', 'EQUIPO INTERVEEQUIPO INTERVEEQUIPO INTERVEEQU', 'MODELO MODELO MODELO MODELO MO', '12345678901234567890', 1, 'DESCRIPCION DEL TRABAJO REALIZADO', 'ENVIADO', 8, 21, NULL, NULL, 8, 2, '2020-05-24 22:49:15', '2020-05-28 15:30:38', '2020-05-28 15:30:38'),
(9, '1010', '1010', '2020-05-26 15:47:27', '2020-05-27 18:04:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ENVIADO', 9, 21, NULL, NULL, 9, 2, '2020-05-26 15:47:27', '2020-05-28 15:30:32', '2020-05-28 15:30:32'),
(10, '1011', '1011', '2020-05-27 09:13:36', '2020-05-27 09:26:39', 1, '', 'CAMARA DE CARNE', '', NULL, 3, 'SE CAMBIA VENTILADOR DEL EVAPORADOR', 'ENVIADO', 10, 6, NULL, NULL, 10, 8, '2020-05-27 09:13:36', '2020-05-28 15:30:29', '2020-05-28 15:30:29'),
(11, '1012', '1012', '2020-05-27 09:33:16', '2020-05-27 09:38:46', 2, 'FUGA DE REFRIGERANTE CENTRAL', 'CENTRAL MEDIA', '', NULL, 5, 'REPARACION DE FUGAS', 'ENVIADO', 11, 6, NULL, NULL, 11, 8, '2020-05-27 09:33:16', '2020-05-28 15:30:21', '2020-05-28 15:30:21'),
(12, '16057', '16057', '2020-05-27 15:33:23', '2020-05-27 15:56:21', 1, '', 'VITRINA DE CARNE', '', NULL, 3, 'EQUIPO PROBLEMA TEMPERATURA,DEBIDO A FALLA ELECTRICA SE HABIA DESCONECTADO LA ZOLENOIDE ,EL INTERUPTOR ESTABA ABAJO SE SUBIO Y LLEGO TEMPERA', 'ENVIADO', 12, 10, NULL, NULL, 12, 8, '2020-05-27 15:33:23', '2020-05-27 15:56:28', NULL),
(13, '16053', '16053', '2020-05-27 16:20:58', '2020-05-28 11:48:15', 5, '', 'MANTENEDOR DE POLLO', '', NULL, 3, 'MANTENCION Y REPARACION ELECTRICA', 'ENVIADO', 13, 6, NULL, NULL, 14, 8, '2020-05-27 16:20:58', '2020-05-28 11:48:20', NULL),
(14, '1011', '1011-14', '2020-05-27 18:12:30', '2020-05-27 18:13:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ENVIADO', 14, 21, NULL, NULL, 13, 2, '2020-05-27 18:12:30', '2020-05-28 15:30:11', '2020-05-28 15:30:11'),
(15, '1024', '1024', '2020-05-28 01:59:06', '2020-05-28 11:34:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ENVIADO', 15, 21, NULL, NULL, NULL, 2, '2020-05-28 01:59:06', '2020-05-28 15:30:07', '2020-05-28 15:30:07'),
(16, '975', '975', '2020-05-28 15:46:47', '2020-05-28 15:47:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ENVIADO', 16, 16, NULL, NULL, 15, 2, '2020-05-28 15:46:47', '2020-05-29 13:12:07', '2020-05-29 13:12:07'),
(18, '1009', '1009', '2020-05-28 15:53:15', '2020-05-29 02:13:53', 1, '', '', '', NULL, 1, '', 'ENVIADO', 17, 21, NULL, NULL, 19, 2, '2020-05-28 15:53:15', '2020-05-29 13:12:01', '2020-05-29 13:12:01'),
(19, '15261', '15261', '2020-05-28 17:12:08', '2020-05-28 17:35:50', 4, 'EVALUACION DE EQUIPO EN MAL ESTADO POR VIDA UTIL ACABADA', 'EVAPORADOR CAMARA DE VEGETALES', 'HEATCRAFT EFE4456', 'M11K273880', 2, 'ESTE EVAPORADOR A PRESENTADO FUGAS DE GAS Y CALEFACTORES QUEMADOS, YA SE ENCUENTRA EN DETERIORO, SE SOLICITA DAR DE BAJA.', 'ENVIADO', 18, 6, NULL, NULL, 17, 1, '2020-05-28 17:12:08', '2020-05-28 17:40:15', NULL),
(20, '15262', '15262', '2020-05-28 17:53:02', '2020-05-28 18:41:38', 4, 'EVALUACIÓN DE EQUIPOS EN MAL ESTADO, SOLICITUD DE BAJA.', 'CONDENSADORA Y EVAPORADOR CONGELADO CARNES', 'MANEUROP NTZ271', NULL, 2, 'EQUIPOS EN DETERIORO, ACABADA VIDA UTIL, SE SOLICITA DAR DE BAJA UNIDAD Y EVAPORADOR', 'ENVIADO', 19, 6, NULL, NULL, 18, 1, '2020-05-28 17:53:02', '2020-05-28 18:45:21', NULL),
(21, '15263', '15263', '2020-05-29 13:12:32', '2020-05-29 13:28:49', 5, 'PRESUPUESTO Nº 3813', 'LINEAL MURAL DE LACTEOS', '', NULL, 6, 'SE REALIZA TRATAMIENTO DE PINTURA, LAVADO, DESARME Y ARMADO.', 'ENVIADO', 20, 11, NULL, NULL, 21, 1, '2020-05-29 13:12:32', '2020-05-29 13:32:06', NULL),
(23, '1034', '1034-23', '2020-05-30 11:47:02', '2020-06-02 01:42:44', 4, 'PRUEBA 1 EL EQUIPO INTERVENIDO VA EN ESTA SECCION Y TIEL EQUIPO INTERVEN EL EQUI', 'EL EQUIPO INTERVENIDO VA EN ESTA SECCION Y TIEL EQUIPO INTERVENASDASDSADASD SDAS', 'EL EQUIPO INTERVENIDO VA EN ESTA SE', 'El equipo intervenido va en esta se', 1, '', 'ENVIADO', 21, 21, NULL, NULL, 34, 2, '2020-05-30 11:47:02', '2020-06-18 10:46:23', '2020-06-18 10:46:23'),
(24, '16070', '16070-24', '2020-06-01 09:05:22', '2020-06-03 11:46:48', 2, '', 'VITRINA FIAMBRE', '', NULL, 1, 'TAPAS SUELTAS ,SE APERNARON', 'ENVIADO', 22, 6, NULL, NULL, 40, 8, '2020-06-01 09:05:22', '2020-06-03 11:46:54', NULL),
(25, '15263', '15263-25', '2020-06-01 10:21:41', '2020-06-01 11:04:13', 5, '902', 'VITRINA DE CARNES', '', NULL, 3, 'SE CAMBIA MOTOR VENTILADOR', 'ENVIADO', 23, 23, NULL, NULL, 23, 2, '2020-06-01 10:21:41', '2020-06-18 10:45:24', '2020-06-18 10:45:24'),
(26, '15263', '15263-26', '2020-06-01 10:21:43', '2020-06-01 11:04:13', 5, '133', 'VITRINA DE CARNÉS', '', NULL, 3, 'SE CAMBIA MOTOR VENTILADOR', 'ENVIADO', 24, 23, NULL, NULL, 24, 10, '2020-06-01 10:21:43', '2020-06-18 10:45:48', '2020-06-18 10:45:48'),
(27, '15263', '15263-27', '2020-06-01 10:22:26', '2020-06-01 11:04:12', 5, '133', 'VITRINA DE CARNE', '', NULL, 3, 'SE CAMBIA MOTOR VENTILADOR', 'ENVIADO', 25, 23, NULL, NULL, 22, 12, '2020-06-01 10:22:26', '2020-06-18 10:45:39', '2020-06-18 10:45:39'),
(28, '15265', '15265-28', '2020-06-01 11:15:19', '2020-06-01 11:39:20', 1, '', '', '', NULL, 1, '', 'ENVIADO', 26, 23, NULL, NULL, 29, 12, '2020-06-01 11:15:19', '2020-06-18 10:46:08', '2020-06-18 10:46:08'),
(29, '1266', '1266-29', '2020-06-01 11:16:10', '2020-06-01 11:25:07', 5, '133', 'VITRINA DE CARNÉS', '', NULL, 3, 'CAMBIO AUTOMATICO', 'ENVIADO', 27, 17, NULL, NULL, 26, 10, '2020-06-01 11:16:10', '2020-06-18 10:44:58', '2020-06-18 10:44:58'),
(30, '1567', '1567-30', '2020-06-01 11:16:32', '2020-06-01 11:29:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ENVIADO', 28, 4, NULL, NULL, NULL, 9, '2020-06-01 11:16:32', '2020-06-18 10:44:46', '2020-06-18 10:44:46'),
(31, '15265', '15265', '2020-06-01 11:16:48', '2020-06-01 11:25:36', 1, '133', 'EVAPORADOR DE CÁMARA DE CARNE', '', NULL, 3, 'VENTILADOR DE EVAPORADOR QUEMADO', 'ENVIADO', 29, 23, NULL, NULL, 27, 12, '2020-06-01 11:16:48', '2020-06-01 11:25:42', NULL),
(32, '15267', '15267-32', '2020-06-01 11:20:20', '2020-06-01 11:28:01', 1, '', '', '', NULL, 3, 'CAMBIO ME VENTILADOR', 'ENVIADO', 30, 4, NULL, NULL, 28, 9, '2020-06-01 11:20:20', '2020-06-01 11:38:29', '2020-06-01 11:38:29'),
(33, '16075', '16075-33', '2020-06-01 14:56:51', '2020-06-01 15:13:34', 1, '', 'VITRINA DE CARNE', '', NULL, 6, 'SE REALIZA CAMBIO DE SONDA DE TENPERATURA', 'ENVIADO', 31, 14, NULL, NULL, 33, 10, '2020-06-01 14:56:51', '2020-06-01 15:13:34', NULL),
(34, '16109', '16109-34', '2020-06-02 17:51:08', '2020-06-02 18:16:12', 1, '', 'CÁMARA DE CARNE CONGELADA', '', NULL, 3, 'CONTROLADOR QUEMADO,SE REEMPLAZA QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 32, 23, NULL, NULL, 36, 10, '2020-06-02 17:51:08', '2020-06-02 18:16:12', NULL),
(35, '16118', '16118-35', '2020-06-03 11:47:13', '2020-06-03 11:49:21', 1, '', 'CAMARA DE VEGETALES', '', NULL, 6, 'CAMBIO AISLACION', 'ENVIADO', 33, 6, NULL, NULL, 41, 8, '2020-06-03 11:47:13', '2020-06-03 11:49:28', NULL),
(36, '16116', '16116-36', '2020-06-03 11:51:59', '2020-06-03 12:07:07', 2, 'CAMARA SIN TEMPERATURA', 'CAMARA DE VEGETALES', '', NULL, 5, 'CAMBIO FILTOS 5/8 Y BOBINA SOLENOIDE ,VACIO CARGA DE R-22', 'ENVIADO', 34, 6, NULL, NULL, 42, 8, '2020-06-03 11:51:59', '2020-06-03 12:07:12', NULL),
(37, '16117', '16117-37', '2020-06-03 12:17:33', '2020-06-03 12:42:36', 3, '', 'MURALES DE LÁCTEOS,FIAMBRES,PIZZAS Y CHORIZOS', '', NULL, 3, 'CAMBIOS DE TUBOS DE ILUMINACIÓN', 'ENVIADO', 35, 19, NULL, NULL, 43, 12, '2020-06-03 12:17:33', '2020-06-03 12:42:50', NULL),
(38, '1001', '1001-38', '2020-06-03 14:17:01', '2020-06-03 14:42:32', 1, '', 'VITRINA CARNES', 'NANO', '2345422-2', 3, 'SE REALIZA CAMBIO DE CONTACTOR DE MOTOVENTILADOR', 'ENVIADO', 36, 4, NULL, NULL, 49, 14, '2020-06-03 14:17:01', '2020-06-18 10:42:08', '2020-06-18 10:42:08'),
(39, '1004', '1004-39', '2020-06-03 14:17:01', '2020-06-05 09:58:35', 3, '', '', '', NULL, 1, '', 'PENDIENTE', 37, 4, NULL, NULL, 67, 2, '2020-06-03 14:17:01', '2020-06-18 10:42:41', '2020-06-18 10:42:41'),
(40, '1103', '1103-40', '2020-06-03 14:17:01', '2020-06-03 14:41:30', 1, '', 'VITRINA DE CARNE', '', NULL, 3, 'CAMBIO DEL MOTOR VENTILADOR', 'ENVIADO', 38, 4, NULL, NULL, 45, 13, '2020-06-03 14:17:01', '2020-06-18 10:43:39', '2020-06-18 10:43:39'),
(41, '1002', '1002-41', '2020-06-03 14:17:02', '2020-06-03 14:41:32', 1, '', 'VITRINA DE CARNES N° 1.', '', NULL, 3, 'CAMBIO DE MOTO VENTILADOR', 'ENVIADO', 39, 4, NULL, NULL, 47, 16, '2020-06-03 14:17:02', '2020-06-18 10:42:32', '2020-06-18 10:42:32'),
(42, '1000', '1000-42', '2020-06-03 14:17:02', '2020-06-03 14:41:30', 1, '--', 'TABLERO TIPO DING DE CAMAS DE VERDURAS', '--', '--', 3, 'CONTACTOR  QUEMADO\nCAMBIO DE CONTACTOR', 'ENVIADO', 40, 4, NULL, NULL, 46, 15, '2020-06-03 14:17:02', '2020-06-18 10:42:14', '2020-06-18 10:42:14'),
(43, '1005', '1005-43', '2020-06-03 14:17:45', '2020-06-03 14:41:33', 1, '', 'VITRINA DE CARNES', '', NULL, 3, 'CAMBIO DE MOTO VENTILADOR', 'PENDIENTE', 41, 4, NULL, NULL, 48, 2, '2020-06-03 14:17:45', '2020-06-18 10:42:23', '2020-06-18 10:42:23'),
(44, '16111', '16111-44', '2020-06-03 15:02:48', '2020-06-03 16:46:02', 1, '', 'EVAPORADOR CÁMARA DE LÁCTEOS', '', NULL, 2, 'REPARACIÓN DE FUGA EN EVAPORADOR POR FATIGA MATERIAL Y CARGA DE GAS REFRIGERANTE', 'ENVIADO', 42, 16, NULL, NULL, 57, 10, '2020-06-03 15:02:48', '2020-06-03 16:46:02', NULL),
(45, '16108', '16108-45', '2020-06-03 15:17:18', '2020-06-03 15:25:38', 1, '', 'TENDIDO MECANICO CÁMARA DE FIAMBRE Y VEGETALES', '', NULL, 2, 'CAMBIO DE AILACION TENDIDO MECANICO', 'ENVIADO', 43, 16, NULL, NULL, 53, 10, '2020-06-03 15:17:18', '2020-06-03 15:25:42', NULL),
(46, '16119', '16119-46', '2020-06-03 15:59:46', '2020-06-03 16:04:03', 1, 'AHT PROBLEMA TEMPERATURA', 'AHT CONGELADO HELADO', '', NULL, 5, 'FUJA POR LA PEPA SE REAPRIETA Y SE CARGA R507', 'ENVIADO', 44, 6, NULL, NULL, 54, 8, '2020-06-03 15:59:46', '2020-06-03 16:04:08', NULL),
(47, '16120', '16120-47', '2020-06-03 16:04:48', '2020-06-03 16:10:33', 1, 'ALUMBRADO CAMARA DE CONGELADO', 'CAMARA DE CONGELADOS', '', NULL, 3, 'ALUMBRADO APAGADO,FARSO CONTACTO SE LIMPIAN QUEDA OPERATIVA', 'ENVIADO', 45, 6, NULL, NULL, 55, 8, '2020-06-03 16:04:48', '2020-06-03 16:10:40', NULL),
(48, '16123', '16123-48', '2020-06-03 16:21:08', '2020-06-03 16:26:17', 4, 'COTIZAR REPUESTO', 'TABLERO ELECTRICO CAMARA N°2', '', NULL, 3, 'CONTACTOR DE CALEFACTORES DE DESHIELO CON FALLA, SE SOLICITA COTIZAR CAMBIO.', 'ENVIADO', 46, 1, NULL, NULL, 56, 14, '2020-06-03 16:21:08', '2020-06-03 16:26:26', NULL),
(49, '16121', '16121-49', '2020-06-04 12:56:08', '2020-06-04 13:16:32', 1, '', 'DESAGUE DE EVAPORADOR SALA DE FIAMBRE', '', NULL, 2, 'SE REPARA FILTRACION DE AGUA QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 47, 23, NULL, NULL, 63, 10, '2020-06-04 12:56:08', '2020-06-04 13:16:36', NULL),
(50, '16125', '16125-2', '2020-06-04 14:11:14', '2020-06-04 14:16:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ENVIADO', 48, 10, NULL, NULL, NULL, 8, '2020-06-04 14:11:14', '2020-06-04 14:16:59', NULL),
(56, '16027', '16027-56', '2020-06-04 14:41:41', '2020-06-04 14:44:22', 1, 'CAMARA PROSESO BLOQUEADA', 'CAMARA DE PROCESO', '', NULL, 5, 'CAMARA BLOQUEADA ZOLENOIDE MALA', 'ENVIADO', 49, 9, NULL, NULL, 64, 8, '2020-06-04 14:41:41', '2020-06-04 14:44:34', NULL),
(57, '16130', '16130-57', '2020-06-04 18:26:36', '2020-06-04 18:55:39', 3, '', 'MURALES DE FIAMBRE,TORTA,CARNES,BEBIDA,LACTEOS Y VERDURA', '', NULL, 3, 'SE REALIZA CAMBIO DE ILUMINACIÓN A MUEBLES', 'ENVIADO', 50, 13, NULL, NULL, 65, 12, '2020-06-04 18:26:36', '2020-06-04 18:55:44', NULL),
(58, '16131', '16131-58', '2020-06-05 11:00:52', '2020-06-05 17:05:04', 2, 'CAMARA SIN TEMPERATURA', 'CAMARA LACTEOS', '', NULL, 2, 'CAMBIO VALVULA ZOLENOIDE Y DESBLOQUEO CON RESISTENCIA,Y SOLDADURA DE ZOLENOIDE Y VACIO', 'ENVIADO', 51, 9, NULL, NULL, 73, 8, '2020-06-05 11:00:52', '2020-06-05 17:05:08', NULL),
(59, '16132', '16132-59', '2020-06-05 11:08:46', '2020-06-05 11:18:05', 3, 'COTIZAR REPARACIÓN DE ILUMINACIÓN', 'MURAL DE VERDURAS', '', NULL, 3, 'COTIZAR CAMBIO DE EQUIPOS DE ILUMINACIÓN POR ENCONTRARSE QUEMADOS', 'ENVIADO', 52, 22, NULL, NULL, 68, 9, '2020-06-05 11:08:46', '2020-06-05 11:18:14', NULL),
(60, '16137', '16137-60', '2020-06-05 16:32:35', '2020-06-05 16:39:11', 1, '', 'VITRINA DE CARNE', '', NULL, 3, 'MOTOR VENTILADOR QUEMADO,SE REEMPLAZA QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 53, 28, NULL, NULL, 72, 10, '2020-06-05 16:32:35', '2020-06-05 16:39:16', NULL),
(61, '16140', '16140-61', '2020-06-07 18:39:46', '2020-06-07 18:47:08', 1, '', 'TENDIDO MECANICO CÁMARA DE CONGELADO', '', NULL, 1, 'SE RETIRA HIELO DE TENDIDO MECANICO QUEDANDO EN  FUNCIONAMIENTO', 'ENVIADO', 54, 15, NULL, NULL, 75, 10, '2020-06-07 18:39:46', '2020-06-07 18:47:13', NULL),
(62, '16142', '16142-62', '2020-06-07 18:48:37', '2020-06-07 18:54:16', 2, '', 'PRESOSTATO DE CENTRAL DE MEDIA TEMPERATURA', '', NULL, 1, 'PRESOSTATO MOJADO POR FILTRACIÓN DE AGUA,SE SECAN QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 55, 14, NULL, NULL, 76, 10, '2020-06-07 18:48:37', '2020-06-07 18:54:21', NULL),
(63, '16144', '16144-63', '2020-06-08 11:18:30', '2020-06-08 11:25:30', 1, 'VITRINA PROBLEMA TEMPERATURA', 'VITRINA FIAMBRE', '', NULL, 4, 'CONTROLADOR DANFORSS EKC202C PROGRAMACION Y AJUSTES DE SONDAS', 'ENVIADO', 56, 6, NULL, NULL, 77, 8, '2020-06-08 11:18:30', '2020-06-08 11:25:39', NULL),
(64, '16145', '16145-64', '2020-06-09 11:54:17', '2020-06-09 12:02:40', 1, '', 'TABLERO ELÉCTRICO DE COOLER DE MARISCO', '', NULL, 3, 'SE ENCUENTRA AUTOMATICO APAGADO,SE ENCIENDE Y SE REVISA NO PILLANDO FALLA,QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 57, 22, NULL, NULL, 79, 10, '2020-06-09 11:54:17', '2020-06-09 12:02:50', NULL),
(65, '16149', '16149-65', '2020-06-09 12:03:43', '2020-06-09 12:11:12', 1, '', 'DESAGUE DE EVAPORADOR SALA DE CARNE', '', NULL, 1, 'SE REPARA DESAGUE QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 58, 15, NULL, NULL, 81, 10, '2020-06-09 12:03:43', '2020-06-09 12:11:21', NULL),
(66, '16151', '16151-66', '2020-06-09 12:12:03', '2020-06-09 12:15:57', 1, '', 'MURAL DE LACTEO', '', NULL, 3, 'CONTROLADOR EN MAL ESTADO,SE REEMPLAZA QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 59, 28, NULL, NULL, 82, 10, '2020-06-09 12:12:03', '2020-06-09 12:16:03', NULL),
(67, '16152', '16152-67', '2020-06-09 18:23:05', '2020-06-09 18:39:23', 1, '', 'CÁMARA DE LÁCTEOS', '', NULL, 2, 'FUGA EN EMPAQUETADURA DEL COMPRESOR', 'ENVIADO', 60, 16, NULL, NULL, 83, 17, '2020-06-09 18:23:05', '2020-06-09 18:39:30', NULL),
(68, '16160', '16160-68', '2020-06-09 18:51:22', '2020-06-09 19:02:00', 1, '', 'CÁMARA DE CARNE', '', NULL, 6, 'SE DESBLOQUEÓ EL HIELO DEL EVAPORADOR', 'ENVIADO', 61, 16, NULL, NULL, 84, 17, '2020-06-09 18:51:22', '2020-06-09 19:02:09', NULL),
(69, '16154', '16154-69', '2020-06-10 08:38:35', '2020-06-10 08:45:01', 1, 'CAMARA SIN TEMPERATURA', 'CAMARA FIAMBRE', '', NULL, 3, 'VENTILADORES PARADOS TRANCADOS SE LES HECHA W-40 Y SE DEJAN FUNCIONANDO SE DESBLOQUEA EL EVAPORADOR CON VENTILADORES QUEDA OPERATIVO', 'ENVIADO', 62, 10, NULL, NULL, 85, 8, '2020-06-10 08:38:35', '2020-06-10 08:45:09', NULL),
(70, '16105', '16105-70', '2020-06-10 09:50:32', '2020-06-10 10:21:40', 3, 'MATERIALES MP JUNIO 2020', 'LOCAL 105', '', NULL, 6, 'MATERIALES UTILIZADOS EN MANTENIMIENTO PREVENTIVO', 'ENVIADO', 63, 8, NULL, NULL, 86, 1, '2020-06-10 09:50:32', '2020-06-10 10:22:23', NULL),
(71, '16106', '16106-71', '2020-06-10 10:22:41', '2020-06-10 10:27:04', 3, 'MATERIALES MP JUNIO 2020', 'LOCAL 103', '', NULL, 6, 'REPARACIONES EN MANTENIMIENTO', 'ENVIADO', 64, 11, NULL, NULL, 87, 1, '2020-06-10 10:22:41', '2020-06-10 10:28:22', NULL),
(72, '16166', '16166-72', '2020-06-11 12:26:24', '2020-06-11 12:36:49', 2, 'LUCES EN CORTE', 'VITRINA DE POLLO', '', NULL, 3, 'SE REALIZA REPARACION DE CORTE ELECTRICO EN TARJETA ELECTRONICA DE VITRINA DE POLLO', 'ENVIADO', 65, 4, NULL, NULL, 88, 13, '2020-06-11 12:26:24', '2020-06-11 12:38:15', NULL),
(73, '16171', '16171-73', '2020-06-12 09:22:55', '2020-06-12 09:27:10', 1, 'MURAL Y VITRINA PROBLEMA TEMPERATURA', 'MURAL DE CARNE Y VITRINA DE POLLO', '', NULL, 3, 'SE SOPLA LOS AUTOMATICOS Y SE SUBE ,ESTABAN HUMEDOS EQUIPO QUEDA OPERATIVO', 'ENVIADO', 66, 5, NULL, NULL, 89, 8, '2020-06-12 09:22:55', '2020-06-12 09:28:20', NULL),
(74, '16178', '16178-74', '2020-06-12 11:01:26', '2020-06-12 11:07:10', 1, '', 'MURAL DE CARNE', '', NULL, 4, 'SE TOMA TEMPERATURA CON TERMÓMETRO ENCONTRÁNDOSE 0.7 GRADOS, CON SU TEMPERATURA CORRESPONDIENTE', 'ENVIADO', 67, 13, NULL, NULL, 90, 10, '2020-06-12 11:01:26', '2020-06-12 11:07:17', NULL),
(75, '16179', '16179-75', '2020-06-12 11:08:24', '2020-06-12 11:37:37', 1, 'VITRINA PROBLEMA TEMPERATURA', 'VITRINA DE CARNE', '', NULL, 3, 'SE DESBLOQUEA EL EVAPORADOR CON AGUA,SE RECONECTA LA RESISTENSIA,SE REAJUSTA CONTROLADOR .EQUIPO QUEDA OPERATIVO', 'ENVIADO', 68, 10, NULL, NULL, 91, 8, '2020-06-12 11:08:24', '2020-06-12 11:37:43', NULL),
(76, '16177', '16177-76', '2020-06-12 12:00:50', '2020-06-12 12:11:25', 1, '', 'MOTOR COMPRESOR DE CÁMARA DE LACTEO', '', NULL, 2, 'CAMBIO DE EMPAQUETADURA AL MOTOR COMPRESOR POR FUGA , QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 69, 16, NULL, NULL, 93, 10, '2020-06-12 12:00:50', '2020-06-12 12:11:29', NULL),
(77, '102', '102-2', '2020-06-12 13:38:16', '2020-06-12 14:25:35', 1, '', 'VITRINA DE CARNE', '', NULL, 3, 'SE CAMBIA MOTOR VENTILADOR QUEDANDO OPERATIVO', 'ENVIADO', 70, 8, NULL, NULL, 94, 22, '2020-06-12 13:38:16', '2020-06-18 10:43:54', '2020-06-18 10:43:54'),
(78, '103', '103', '2020-06-12 13:38:18', '2020-06-12 14:25:35', 1, '', 'VITRINA DE CARNES', '', NULL, 3, 'SE CAMBIA MOTOR VENTILADOR. QUEDANDO OPERATIVO.', 'PENDIENTE', 71, 8, NULL, NULL, 95, 2, '2020-06-12 13:38:18', '2020-06-18 10:41:08', '2020-06-18 10:41:08'),
(79, '100', '100', '2020-06-12 13:38:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDIENTE', 72, 8, NULL, NULL, NULL, 20, '2020-06-12 13:38:21', '2020-06-18 10:40:57', '2020-06-18 10:40:57'),
(82, '100', '100-82', '2020-06-12 13:40:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDIENTE', 74, 8, NULL, NULL, NULL, 20, '2020-06-12 13:40:53', '2020-06-18 10:41:23', '2020-06-18 10:41:23'),
(83, '105', '105-83', '2020-06-12 13:44:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDIENTE', 75, 8, NULL, NULL, NULL, 20, '2020-06-12 13:44:36', '2020-06-18 10:40:48', '2020-06-18 10:40:48'),
(84, '105', '105', '2020-06-12 13:45:19', '2020-06-12 14:25:37', 2, '1', 'VITRINA CARNE', '', NULL, 5, 'SE CAMBIA MOTOR VENTILADOR QUEDANDO OPERATIVO', 'ENVIADO', 76, 8, NULL, NULL, 97, 16, '2020-06-12 13:45:19', '2020-06-18 10:43:48', '2020-06-18 10:43:48'),
(85, '987', '987-85', '2020-06-14 14:05:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDIENTE', 77, 21, NULL, NULL, NULL, 2, '2020-06-14 14:05:20', '2020-06-15 00:27:35', '2020-06-15 00:27:35'),
(86, '986', '986-86', '2020-06-15 00:13:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDIENTE', 78, 21, NULL, NULL, NULL, 2, '2020-06-15 00:13:55', '2020-06-15 00:27:32', '2020-06-15 00:27:32'),
(87, '985', '985-87', '2020-06-15 00:15:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDIENTE', 79, 21, NULL, NULL, NULL, 2, '2020-06-15 00:15:25', '2020-06-15 00:27:40', '2020-06-15 00:27:40'),
(88, '16188', '16188-88', '2020-06-15 14:33:51', '2020-06-15 14:39:28', 1, 'VITRINA FIAMBRE BLOQUEADA', 'VITRINA FIAMBRE', '', NULL, 4, 'VITRINA BLOQUEADA CON HIELO,SE DESBLOQUEA Y SE AJUSTAN PARAMETROS', 'ENVIADO', 80, 6, NULL, NULL, 99, 8, '2020-06-15 14:33:51', '2020-06-15 14:39:47', NULL),
(89, '16189', '16189-89', '2020-06-15 14:40:31', '2020-06-15 14:47:33', 1, 'ISLA QUESO BOTANDO AGUA', 'ISLA DE QUESO', '', NULL, 6, 'EQUIPO BOTANDO AGUA SE LIMPIA BANDEJA H SE SACA EL AGUA', 'ENVIADO', 81, 6, NULL, NULL, 100, 8, '2020-06-15 14:40:31', '2020-06-15 14:47:45', NULL),
(90, '16190', '16190-90', '2020-06-15 14:48:15', '2020-06-15 14:57:52', 1, 'CAMARA DE BEBIDA APAGADA', 'CAMARA DE COCA COLA', '', NULL, 6, 'EQUIPO DESCONECTADO SE HABIA DEJADO DESBLOQUEANDO,SE RECONECTA Y SE DEJA OPERATIVO', 'ENVIADO', 82, 6, NULL, NULL, 101, 8, '2020-06-15 14:48:15', '2020-06-15 14:58:12', NULL),
(91, '16049', '16049-91', '2020-06-15 16:34:17', '2020-06-15 16:39:07', 1, 'CAMBIO BURLETE', 'CAMARA CONGELADO', '', NULL, 6, 'CAMBIO BURLETE CAMARA DE CONGELADO', 'ENVIADO', 83, 11, NULL, NULL, 102, 8, '2020-06-15 16:34:17', '2020-06-15 17:01:40', NULL),
(92, '16193', '16193-92', '2020-06-16 13:06:31', '2020-06-16 13:44:24', 1, 'BLOQUEO DE VITRINA', 'VITRINA DE JUGOS', 'BREMA 205BT 3 PUERTAS', NULL, 4, 'PROGRAMACION Y REMPLAZO DE SONDA NTC A CONTROLADOR EKC 102A PERTENECIENTE A VITRINA DE JUGOS', 'ENVIADO', 84, 6, NULL, NULL, 103, 13, '2020-06-16 13:06:31', '2020-06-16 13:44:40', NULL),
(93, '16186', '16186-93', '2020-06-17 11:43:34', '2020-06-17 11:53:14', 1, '', 'DESAGUE DE MURAL DE CARNE', '', NULL, 2, 'MURAL DE CARNÉ CON AGUA POR DESAGUE TAPADO,SE DESTAPA QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 85, 15, NULL, NULL, 105, 10, '2020-06-17 11:43:34', '2020-06-17 11:53:36', NULL),
(94, '16194', '16194-94', '2020-06-17 11:54:18', '2020-06-17 12:11:38', 1, '', 'MURAL DE CARNE Y VEGETALES', '', NULL, 3, 'SE REALIZA REPARACIÓN DE ILUMINACIÓN, QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 86, 15, NULL, NULL, 106, 10, '2020-06-17 11:54:18', '2020-06-17 12:11:55', NULL),
(95, '16180', '16180-2', '2020-06-17 12:13:56', '2020-06-17 12:24:24', 1, '', 'COOLER DE CONGELADO PIZZA', '', NULL, 2, 'MURAL BLOQUEADO CON HIELO POR CONDENSACIÓN,SE DEJA APAGADO A LAS11:00 AM PARA SU DESCONGELAMIENTO,SE PRENDE A LAS 19:00 QUEDANDO EN FUNCIONA', 'ENVIADO', 87, 13, NULL, NULL, 107, 10, '2020-06-17 12:13:56', '2020-06-17 12:40:11', NULL),
(100, '16184', '16184-100', '2020-06-17 12:33:31', '2020-06-17 12:39:11', 1, '', 'MURAL DE VEGETALES', '', NULL, 2, 'LATERAL DE MURAL DESPEGADO,SE PEGA CON SILICONA QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 88, 15, NULL, NULL, 108, 10, '2020-06-17 12:33:31', '2020-06-17 12:39:29', NULL),
(101, '16150', '16150-101', '2020-06-17 12:41:58', '2020-06-17 12:48:50', 1, '', 'CÁMARA DE CONGELADO', '', NULL, 3, 'CÁMARA CON EVAPORADOR BLOQUEADO CON HIELO POR CONTROLADOR QUE NO CORTABA LA TEMPERATURA,  SE DESBLOQUEA EVAPORADOR QUEDANDO EN FUNCIONAMIENT', 'ENVIADO', 89, 19, NULL, NULL, 109, 10, '2020-06-17 12:41:58', '2020-06-17 12:48:56', NULL),
(103, '1618019', '1618019-103', '2020-06-17 12:52:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDIENTE', 90, 13, NULL, NULL, NULL, 10, '2020-06-17 12:52:38', '2020-06-18 10:40:29', '2020-06-18 10:40:29'),
(104, '16180', '16180', '2020-06-17 12:53:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDIENTE', 91, 13, NULL, NULL, NULL, 10, '2020-06-17 12:53:27', '2020-06-18 10:40:34', '2020-06-18 10:40:34'),
(105, '16180', '16180-105', '2020-06-17 12:53:58', '2020-06-17 13:00:28', 1, '', 'COOLER DE CONGELADO PIZZA', '', NULL, 1, 'MURAL BLOQUEADO CON HIELO POR CONDENSACIÓN, SE DEJA APAGADO A LAS 11:00 PARA SU DESCONGELAMIENTO, SE PRENDE A LAS 19:00 QUEDANDO EN FUNCIONA', 'ENVIADO', 92, 14, NULL, NULL, 110, 10, '2020-06-17 12:53:58', '2020-06-17 13:00:39', NULL),
(106, '16198', '16198-106', '2020-06-17 17:28:11', '2020-06-18 09:05:06', 1, 'VITRINA INSTALACION CONTACTOR MAGNETICO', 'VITRINA POLLO', '', NULL, 3, 'INSTALACION CONTACTOR MAGNETICO 10A PARA VENTILADORES DEL EVAPORADOR', 'ENVIADO', 93, 10, NULL, NULL, 113, 8, '2020-06-17 17:28:11', '2020-06-18 09:05:17', NULL),
(107, '16195', '16195-107', '2020-06-17 17:34:19', '2020-06-17 18:52:33', 1, '', 'PILETA DE DESAGUE MURAL DE LACTEOS', '', NULL, 1, 'PILETA DE DESAGUE TAPADA,SE SOLICITA GAFITER PARA SU DESTAPADO', 'ENVIADO', 94, 16, NULL, NULL, 111, 10, '2020-06-17 17:34:19', '2020-06-17 18:52:42', NULL),
(108, '16196', '16196', '2020-06-17 19:15:00', NULL, 1, '', 'ISLA AHT CONGELADO DE HELADO', '', NULL, 1, 'SE REVISAN ISLAS AHT NO LLEGANDO A TEMPERATURA,SE ENVIARÁ COTIZACION PARA CAMBIO DE FILTRO Y GAS REFRIGERANTE,SU BUEN FUNCIONAMIENTO', 'PENDIENTE', 95, 13, NULL, NULL, NULL, 10, '2020-06-17 19:15:00', '2020-06-18 10:40:15', '2020-06-18 10:40:15'),
(109, '16196', '16196-109', '2020-06-17 19:20:07', '2020-06-17 19:23:23', 1, '', 'ISLA AHT CONGELADO DE HELADO', '', NULL, 2, 'SE REVISAN ISLAS AHT NO LLEGANDO A TEMPERATURAS, SE ENVIARÁ COTIZACION PARA CAMBIO DE FILTRO Y GAS REFRIGERANTE,PARA SU BUEN FUNCIONAMIENTO', 'ENVIADO', 96, 13, NULL, NULL, 112, 10, '2020-06-17 19:20:07', '2020-06-17 19:23:33', NULL),
(110, '16199', '16199-110', '2020-06-18 08:58:23', '2020-06-18 09:07:56', 3, 'CAMBIO DE MOTOR DE VENTILADOR DE 34 WATS', 'EVAPORADOR DE SALA PRODUCCIÓN DE TORTAS', '', NULL, 2, 'SE RENPLAZA MOTOR DE VENTILADOR DE 34 W', 'ENVIADO', 97, 7, NULL, NULL, 114, 21, '2020-06-18 08:58:23', '2020-06-18 09:08:03', NULL),
(111, '100', '100-111', '2020-06-18 10:08:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PENDIENTE', 98, 2, NULL, NULL, NULL, 2, '2020-06-18 10:08:40', '2020-06-18 10:08:40', NULL),
(112, '101', '101-112', '2020-06-18 10:49:34', NULL, 1, '', '', '', NULL, 1, '', 'PENDIENTE', 99, 2, NULL, NULL, NULL, 2, '2020-06-18 10:49:34', '2020-06-18 23:24:38', NULL),
(113, '16201', '16201-113', '2020-06-18 16:40:25', '2020-06-18 16:48:51', 1, '', 'EVAPORADOR CÁMARA DE LACTEO', '', NULL, 2, 'EVAPORADOR BLOQUEADO CON HIELO POR VALVULA DE EXPANSIÓN EN MAL ESTADO,SE DESBLOQUEA Y SE CAMBIA VALVULA QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 100, 16, NULL, NULL, 116, 10, '2020-06-18 16:40:25', '2020-06-18 16:48:56', NULL),
(114, '16200', '16200-114', '2020-06-18 16:52:08', '2020-06-18 16:58:27', 1, '', 'VITRINA DE FIAMBRE', '', NULL, 3, 'VITRINA BLOQUEADA CON HIELO POR 4 MOTOR VENTILADOR QUEMADO,  SE DESBLOQUEA Y SE REEMPLAZAN MOTORES VENTILADOR QUEDANDO EN FUNCIONAMIENTO', 'ENVIADO', 101, 14, NULL, NULL, 117, 10, '2020-06-18 16:52:08', '2020-06-18 16:58:34', NULL),
(115, '16204', '16204-115', '2020-06-18 17:00:07', '2020-06-18 17:03:28', 1, '', 'VITRINA DE CARNE', '', NULL, 2, 'SE REALIZA RETIRO DE VIDRIO LATERAL PARA LIMPIEZA', 'ENVIADO', 102, 16, NULL, NULL, 118, 10, '2020-06-18 17:00:07', '2020-06-18 17:03:32', NULL),
(116, '16203', '16203-116', '2020-06-18 18:00:45', '2020-06-18 18:04:02', 1, 'VITRINA CARNE PROBLEMA DE PROGRAMACION', 'VITRINA DE CARNE', '', NULL, 4, 'PROGRAMACION DE TIEMPO DE DESCOGELACION', 'ENVIADO', 103, 10, NULL, NULL, 119, 8, '2020-06-18 18:00:45', '2020-06-18 18:04:09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problems`
--

CREATE TABLE `problems` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `problems`
--

INSERT INTO `problems` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INTERVENCION DE TERCEROS', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(2, 'FALLA MECANICA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(3, 'FALLA ELECTRICA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(4, 'PROGRAMACION PARAMETROS', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(5, 'GAS REFRIGERANTE', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(6, 'OTRO', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes`
--

CREATE TABLE `quotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `records`
--

CREATE TABLE `records` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `records`
--

INSERT INTO `records` (`id`, `url`, `post_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pdf/order/OT1018-2-EcorefChile-19-05-2020-13-48.pdf', 4, '2020-05-19 13:48:31', '2020-05-19 13:48:31', NULL),
(2, 'pdf/order/OT1016-2-EcorefChile-19-05-2020-13-51.pdf', 2, '2020-05-19 13:51:18', '2020-05-19 13:51:18', NULL),
(3, 'pdf/order/OT1015-1-EcorefChile-19-05-2020-14-05.pdf', 1, '2020-05-19 14:05:33', '2020-05-19 14:05:33', NULL),
(4, 'pdf/order/OT15260-2-EcorefChile-19-05-2020-14-14.pdf', 5, '2020-05-19 14:14:18', '2020-05-19 14:14:18', NULL),
(5, 'pdf/order/OT1017-1-EcorefChile-20-05-2020-08-58.pdf', 3, '2020-05-20 08:58:12', '2020-05-20 08:58:12', NULL),
(6, 'pdf/order/OT15260-2-Ecoref Chile-21-05-2020-14-52.pdf', 5, '2020-05-21 14:52:10', '2020-05-21 14:52:10', NULL),
(7, 'pdf/order/OT1029-2-EcorefChile-22-05-2020-02-42.pdf', 6, '2020-05-22 02:42:46', '2020-05-22 02:42:46', NULL),
(8, 'pdf/order/OT1031-2-Ecoref Chile-22-05-2020-02-43.pdf', 7, '2020-05-22 02:43:38', '2020-05-22 02:43:38', NULL),
(9, 'pdf/order/OT1031-2-EcorefChile-23-05-2020-23-50.pdf', 7, '2020-05-23 23:50:50', '2020-05-23 23:50:50', NULL),
(10, 'pdf/order/OT1032-2-EcorefChile-24-05-2020-01-32.pdf', 7, '2020-05-24 01:32:53', '2020-05-24 01:32:53', NULL),
(11, 'pdf/order/OT1033-2-EcorefChile-24-05-2020-22-51.pdf', 8, '2020-05-24 22:51:29', '2020-05-24 22:51:29', NULL),
(12, 'pdf/order/OT1010-2-EcorefChile-26-05-2020-15-49.pdf', 9, '2020-05-26 15:49:12', '2020-05-26 15:49:12', NULL),
(13, 'pdf/order/OT1011-8-EcorefChile-27-05-2020-09-26.pdf', 10, '2020-05-27 09:26:39', '2020-05-27 09:26:39', NULL),
(14, 'pdf/order/OT1012-8-EcorefChile-27-05-2020-09-38.pdf', 11, '2020-05-27 09:38:46', '2020-05-27 09:38:46', NULL),
(15, 'pdf/order/OT16057-8-EcorefChile-27-05-2020-15-56.pdf', 12, '2020-05-27 15:56:21', '2020-05-27 15:56:21', NULL),
(16, 'pdf/order/OT1010-2-EcorefChile-27-05-2020-17-23.pdf', 9, '2020-05-27 17:23:55', '2020-05-27 17:23:55', NULL),
(17, 'pdf/order/OT1010-2-EcorefChile-27-05-2020-17-59.pdf', 9, '2020-05-27 17:59:34', '2020-05-27 17:59:34', NULL),
(18, 'pdf/order/OT1010-2-EcorefChile-27-05-2020-18-02.pdf', 9, '2020-05-27 18:02:24', '2020-05-27 18:02:24', NULL),
(19, 'pdf/order/OT1010-2-EcorefChile-27-05-2020-18-04.pdf', 9, '2020-05-27 18:04:17', '2020-05-27 18:04:17', NULL),
(20, 'pdf/order/OT1011-2-EcorefChile-27-05-2020-18-13.pdf', 14, '2020-05-27 18:13:55', '2020-05-27 18:13:55', NULL),
(21, 'pdf/order/OT1024-2-EcorefChile-28-05-2020-02-00.pdf', 15, '2020-05-28 02:00:10', '2020-05-28 02:00:10', NULL),
(22, 'pdf/order/OT1024-2-EcorefChile-28-05-2020-11-34.pdf', 15, '2020-05-28 11:34:01', '2020-05-28 11:34:01', NULL),
(23, 'pdf/order/OT16053-8-EcorefChile-28-05-2020-11-48.pdf', 13, '2020-05-28 11:48:15', '2020-05-28 11:48:15', NULL),
(24, 'pdf/order/OT975-29-EcorefChile-28-05-2020-15-47.pdf', 16, '2020-05-28 15:47:27', '2020-05-28 15:47:27', NULL),
(25, 'pdf/order/OT15261-86-EcorefChile-28-05-2020-17-31.pdf', 19, '2020-05-28 17:31:46', '2020-05-28 17:31:46', NULL),
(26, 'pdf/order/OT15261-86-EcorefChile-28-05-2020-17-35.pdf', 19, '2020-05-28 17:35:51', '2020-05-28 17:35:51', NULL),
(27, 'pdf/order/OT15262-86-EcorefChile-28-05-2020-18-41.pdf', 20, '2020-05-28 18:41:38', '2020-05-28 18:41:38', NULL),
(28, 'pdf/order/OT1009-13-EcorefChile-29-05-2020-02-13.pdf', 18, '2020-05-29 02:13:53', '2020-05-29 02:13:53', NULL),
(29, 'pdf/order/OT15263-103-EcorefChile-29-05-2020-13-27.pdf', 21, '2020-05-29 13:27:05', '2020-05-29 13:27:05', NULL),
(30, 'pdf/order/OT15263-103-EcorefChile-29-05-2020-13-28.pdf', 21, '2020-05-29 13:28:49', '2020-05-29 13:28:49', NULL),
(31, 'pdf/order/OT1034-13-EcorefChile-30-05-2020-14-32.pdf', 23, '2020-05-30 14:32:37', '2020-05-30 14:32:37', NULL),
(32, 'pdf/order/OT1034-13-EcorefChile-31-05-2020-22-07.pdf', 23, '2020-05-31 22:07:14', '2020-05-31 22:07:14', NULL),
(33, 'pdf/order/OT1034-13-EcorefChile-31-05-2020-22-55.pdf', 23, '2020-05-31 22:55:53', '2020-05-31 22:55:53', NULL),
(34, 'pdf/order/OT15263-27-EcorefChile-01-06-2020-11-04.pdf', 27, '2020-06-01 11:04:13', '2020-06-01 11:04:13', NULL),
(35, 'pdf/order/OT15263-27-EcorefChile-01-06-2020-11-04.pdf', 26, '2020-06-01 11:04:13', '2020-06-01 11:04:13', NULL),
(36, 'pdf/order/OT15263-27-EcorefChile-01-06-2020-11-04.pdf', 25, '2020-06-01 11:04:13', '2020-06-01 11:04:13', NULL),
(37, 'pdf/order/OT15265-27-EcorefChile-01-06-2020-11-23.pdf', 31, '2020-06-01 11:23:56', '2020-06-01 11:23:56', NULL),
(38, 'pdf/order/OT1266-26-EcorefChile-01-06-2020-11-25.pdf', 29, '2020-06-01 11:25:07', '2020-06-01 11:25:07', NULL),
(39, 'pdf/order/OT15265-27-EcorefChile-01-06-2020-11-25.pdf', 31, '2020-06-01 11:25:36', '2020-06-01 11:25:36', NULL),
(40, 'pdf/order/OT15267-600-EcorefChile-01-06-2020-11-28.pdf', 32, '2020-06-01 11:28:01', '2020-06-01 11:28:01', NULL),
(41, 'pdf/order/OT1567-600-EcorefChile-01-06-2020-11-29.pdf', 30, '2020-06-01 11:29:23', '2020-06-01 11:29:23', NULL),
(42, 'pdf/order/OT15265-27-EcorefChile-01-06-2020-11-39.pdf', 28, '2020-06-01 11:39:20', '2020-06-01 11:39:20', NULL),
(43, 'pdf/order/OT16075-33-EcorefChile-01-06-2020-15-11.pdf', 33, '2020-06-01 15:11:04', '2020-06-01 15:11:04', NULL),
(44, 'pdf/order/OT16075-33-EcorefChile-01-06-2020-15-12.pdf', 33, '2020-06-01 15:12:17', '2020-06-01 15:12:17', NULL),
(45, 'pdf/order/OT16075-33-EcorefChile-01-06-2020-15-13.pdf', 33, '2020-06-01 15:13:03', '2020-06-01 15:13:03', NULL),
(46, 'pdf/order/OT16075-33-EcorefChile-01-06-2020-15-13.pdf', 33, '2020-06-01 15:13:35', '2020-06-01 15:13:35', NULL),
(47, 'pdf/order/OT1034-13-EcorefChile-02-06-2020-01-18.pdf', 23, '2020-06-02 01:18:32', '2020-06-02 01:18:32', NULL),
(48, 'pdf/order/OT1034-13-EcorefChile-02-06-2020-01-20.pdf', 23, '2020-06-02 01:20:41', '2020-06-02 01:20:41', NULL),
(49, 'pdf/order/OT1034-13-EcorefChile-02-06-2020-01-27.pdf', 23, '2020-06-02 01:27:41', '2020-06-02 01:27:41', NULL),
(50, 'pdf/order/OT1034-13-EcorefChile-02-06-2020-01-28.pdf', 23, '2020-06-02 01:28:21', '2020-06-02 01:28:21', NULL),
(51, 'pdf/order/OT1034-13-EcorefChile-02-06-2020-01-41.pdf', 23, '2020-06-02 01:41:45', '2020-06-02 01:41:45', NULL),
(52, 'pdf/order/OT1034-13-EcorefChile-02-06-2020-01-42.pdf', 23, '2020-06-02 01:42:44', '2020-06-02 01:42:44', NULL),
(53, 'pdf/order/OT16109-27-EcorefChile-02-06-2020-17-57.pdf', 34, '2020-06-02 17:57:51', '2020-06-02 17:57:51', NULL),
(54, 'pdf/order/OT16109-27-EcorefChile-02-06-2020-18-16.pdf', 34, '2020-06-02 18:16:12', '2020-06-02 18:16:12', NULL),
(55, 'pdf/order/OT16070-86-EcorefChile-03-06-2020-11-46.pdf', 24, '2020-06-03 11:46:41', '2020-06-03 11:46:41', NULL),
(56, 'pdf/order/OT16070-86-EcorefChile-03-06-2020-11-46.pdf', 24, '2020-06-03 11:46:43', '2020-06-03 11:46:43', NULL),
(57, 'pdf/order/OT16070-86-EcorefChile-03-06-2020-11-46.pdf', 24, '2020-06-03 11:46:45', '2020-06-03 11:46:45', NULL),
(58, 'pdf/order/OT16070-86-EcorefChile-03-06-2020-11-46.pdf', 24, '2020-06-03 11:46:48', '2020-06-03 11:46:48', NULL),
(59, 'pdf/order/OT16118-86-EcorefChile-03-06-2020-11-49.pdf', 35, '2020-06-03 11:49:21', '2020-06-03 11:49:21', NULL),
(60, 'pdf/order/OT16116-86-EcorefChile-03-06-2020-12-07.pdf', 36, '2020-06-03 12:07:07', '2020-06-03 12:07:07', NULL),
(61, 'pdf/order/OT16117-961-EcorefChile-03-06-2020-12-42.pdf', 37, '2020-06-03 12:42:36', '2020-06-03 12:42:36', NULL),
(62, 'pdf/order/OT1002-600-EcorefChile-03-06-2020-14-17.pdf', 41, '2020-06-03 14:17:24', '2020-06-03 14:17:24', NULL),
(63, 'pdf/order/OT1004-600-EcorefChile-03-06-2020-14-17.pdf', 39, '2020-06-03 14:17:25', '2020-06-03 14:17:25', NULL),
(64, 'pdf/order/OT1001-600-EcorefChile-03-06-2020-14-17.pdf', 38, '2020-06-03 14:17:27', '2020-06-03 14:17:27', NULL),
(65, 'pdf/order/OT1103-600-EcorefChile-03-06-2020-14-17.pdf', 40, '2020-06-03 14:17:32', '2020-06-03 14:17:32', NULL),
(66, 'pdf/order/OT1001-600-EcorefChile-03-06-2020-14-41.pdf', 38, '2020-06-03 14:41:29', '2020-06-03 14:41:29', NULL),
(67, 'pdf/order/OT1103-600-EcorefChile-03-06-2020-14-41.pdf', 40, '2020-06-03 14:41:30', '2020-06-03 14:41:30', NULL),
(68, 'pdf/order/OT1000-600-EcorefChile-03-06-2020-14-41.pdf', 42, '2020-06-03 14:41:30', '2020-06-03 14:41:30', NULL),
(69, 'pdf/order/OT1002-600-EcorefChile-03-06-2020-14-41.pdf', 41, '2020-06-03 14:41:32', '2020-06-03 14:41:32', NULL),
(70, 'pdf/order/OT1005-600-EcorefChile-03-06-2020-14-41.pdf', 43, '2020-06-03 14:41:34', '2020-06-03 14:41:34', NULL),
(71, 'pdf/order/OT1001-600-EcorefChile-03-06-2020-14-42.pdf', 38, '2020-06-03 14:42:32', '2020-06-03 14:42:32', NULL),
(72, 'pdf/order/OT16111-29-EcorefChile-03-06-2020-15-14.pdf', 44, '2020-06-03 15:14:21', '2020-06-03 15:14:21', NULL),
(73, 'pdf/order/OT16111-29-EcorefChile-03-06-2020-15-16.pdf', 44, '2020-06-03 15:16:23', '2020-06-03 15:16:23', NULL),
(74, 'pdf/order/OT16108-29-EcorefChile-03-06-2020-15-25.pdf', 45, '2020-06-03 15:25:17', '2020-06-03 15:25:17', NULL),
(75, 'pdf/order/OT16108-29-EcorefChile-03-06-2020-15-25.pdf', 45, '2020-06-03 15:25:39', '2020-06-03 15:25:39', NULL),
(76, 'pdf/order/OT16119-86-EcorefChile-03-06-2020-16-04.pdf', 46, '2020-06-03 16:04:03', '2020-06-03 16:04:03', NULL),
(77, 'pdf/order/OT16120-86-EcorefChile-03-06-2020-16-10.pdf', 47, '2020-06-03 16:10:33', '2020-06-03 16:10:33', NULL),
(78, 'pdf/order/OT16123-GEN-EcorefChile-03-06-2020-16-26.pdf', 48, '2020-06-03 16:26:17', '2020-06-03 16:26:17', NULL),
(79, 'pdf/order/OT16111-29-EcorefChile-03-06-2020-16-46.pdf', 44, '2020-06-03 16:46:02', '2020-06-03 16:46:02', NULL),
(80, 'pdf/order/OT1004-600-EcorefChile-04-06-2020-11-15.pdf', 39, '2020-06-04 11:15:09', '2020-06-04 11:15:09', NULL),
(81, 'pdf/order/OT1004-600-EcorefChile-04-06-2020-11-17.pdf', 39, '2020-06-04 11:17:00', '2020-06-04 11:17:00', NULL),
(82, 'pdf/order/OT1004-600-EcorefChile-04-06-2020-11-19.pdf', 39, '2020-06-04 11:19:20', '2020-06-04 11:19:20', NULL),
(83, 'pdf/order/OT1004-600-EcorefChile-04-06-2020-11-21.pdf', 39, '2020-06-04 11:21:02', '2020-06-04 11:21:02', NULL),
(84, 'pdf/order/OT1004-600-EcorefChile-04-06-2020-11-41.pdf', 39, '2020-06-04 11:41:33', '2020-06-04 11:41:33', NULL),
(85, 'pdf/order/OT16121-27-EcorefChile-04-06-2020-13-15.pdf', 49, '2020-06-04 13:15:35', '2020-06-04 13:15:35', NULL),
(86, 'pdf/order/OT16121-27-EcorefChile-04-06-2020-13-16.pdf', 49, '2020-06-04 13:16:32', '2020-06-04 13:16:32', NULL),
(87, 'pdf/order/OT1004-600-EcorefChile-04-06-2020-13-40.pdf', 39, '2020-06-04 13:40:18', '2020-06-04 13:40:18', NULL),
(88, 'pdf/order/OT16125-106-EcorefChile-04-06-2020-14-16.pdf', 50, '2020-06-04 14:16:53', '2020-06-04 14:16:53', NULL),
(89, 'pdf/order/OT16027-87-EcorefChile-04-06-2020-14-44.pdf', 56, '2020-06-04 14:44:23', '2020-06-04 14:44:23', NULL),
(90, 'pdf/order/OT16130-19-EcorefChile-04-06-2020-18-55.pdf', 57, '2020-06-04 18:55:39', '2020-06-04 18:55:39', NULL),
(91, 'pdf/order/OT1004-600-EcorefChile-05-06-2020-09-54.pdf', 39, '2020-06-05 09:54:28', '2020-06-05 09:54:28', NULL),
(92, 'pdf/order/OT1004-600-EcorefChile-05-06-2020-09-58.pdf', 39, '2020-06-05 09:58:35', '2020-06-05 09:58:35', NULL),
(93, 'pdf/order/OT16132-48-EcorefChile-05-06-2020-11-18.pdf', 59, '2020-06-05 11:18:06', '2020-06-05 11:18:06', NULL),
(94, 'pdf/order/OT16131-87-EcorefChile-05-06-2020-11-31.pdf', 58, '2020-06-05 11:31:19', '2020-06-05 11:31:19', NULL),
(95, 'pdf/order/OT16137-110-EcorefChile-05-06-2020-16-37.pdf', 60, '2020-06-05 16:37:33', '2020-06-05 16:37:33', NULL),
(96, 'pdf/order/OT16137-110-EcorefChile-05-06-2020-16-38.pdf', 60, '2020-06-05 16:38:26', '2020-06-05 16:38:26', NULL),
(97, 'pdf/order/OT16137-110-EcorefChile-05-06-2020-16-39.pdf', 60, '2020-06-05 16:39:12', '2020-06-05 16:39:12', NULL),
(98, 'pdf/order/OT16131-87-EcorefChile-05-06-2020-17-05.pdf', 58, '2020-06-05 17:05:04', '2020-06-05 17:05:04', NULL),
(99, 'pdf/order/OT16140-28-EcorefChile-07-06-2020-18-45.pdf', 61, '2020-06-07 18:45:53', '2020-06-07 18:45:53', NULL),
(100, 'pdf/order/OT16140-28-EcorefChile-07-06-2020-18-47.pdf', 61, '2020-06-07 18:47:08', '2020-06-07 18:47:08', NULL),
(101, 'pdf/order/OT16142-33-EcorefChile-07-06-2020-18-54.pdf', 62, '2020-06-07 18:54:16', '2020-06-07 18:54:16', NULL),
(102, 'pdf/order/OT16144-86-EcorefChile-08-06-2020-11-25.pdf', 63, '2020-06-08 11:25:31', '2020-06-08 11:25:31', NULL),
(103, 'pdf/order/OT16145-48-EcorefChile-09-06-2020-11-59.pdf', 64, '2020-06-09 11:59:02', '2020-06-09 11:59:02', NULL),
(104, 'pdf/order/OT16145-48-EcorefChile-09-06-2020-12-02.pdf', 64, '2020-06-09 12:02:40', '2020-06-09 12:02:40', NULL),
(105, 'pdf/order/OT16149-28-EcorefChile-09-06-2020-12-09.pdf', 65, '2020-06-09 12:09:18', '2020-06-09 12:09:18', NULL),
(106, 'pdf/order/OT16149-28-EcorefChile-09-06-2020-12-11.pdf', 65, '2020-06-09 12:11:12', '2020-06-09 12:11:12', NULL),
(107, 'pdf/order/OT16151-110-EcorefChile-09-06-2020-12-15.pdf', 66, '2020-06-09 12:15:57', '2020-06-09 12:15:57', NULL),
(108, 'pdf/order/OT16152-29-EcorefChile-09-06-2020-18-39.pdf', 67, '2020-06-09 18:39:23', '2020-06-09 18:39:23', NULL),
(109, 'pdf/order/OT16160-29-EcorefChile-09-06-2020-19-02.pdf', 68, '2020-06-09 19:02:00', '2020-06-09 19:02:00', NULL),
(110, 'pdf/order/OT16154-106-EcorefChile-10-06-2020-08-45.pdf', 69, '2020-06-10 08:45:01', '2020-06-10 08:45:01', NULL),
(111, 'pdf/order/OT16105-105-EcorefChile-10-06-2020-10-21.pdf', 70, '2020-06-10 10:21:40', '2020-06-10 10:21:40', NULL),
(112, 'pdf/order/OT16106-103-EcorefChile-10-06-2020-10-27.pdf', 71, '2020-06-10 10:27:05', '2020-06-10 10:27:05', NULL),
(113, 'pdf/order/OT16166-600-EcorefChile-11-06-2020-12-36.pdf', 72, '2020-06-11 12:36:50', '2020-06-11 12:36:50', NULL),
(114, 'pdf/order/OT16171-85-EcorefChile-12-06-2020-09-27.pdf', 73, '2020-06-12 09:27:11', '2020-06-12 09:27:11', NULL),
(115, 'pdf/order/OT16178-19-EcorefChile-12-06-2020-11-07.pdf', 74, '2020-06-12 11:07:11', '2020-06-12 11:07:11', NULL),
(116, 'pdf/order/OT16179-106-EcorefChile-12-06-2020-11-37.pdf', 75, '2020-06-12 11:37:37', '2020-06-12 11:37:37', NULL),
(117, 'pdf/order/OT16177-29-EcorefChile-12-06-2020-12-08.pdf', 76, '2020-06-12 12:08:49', '2020-06-12 12:08:49', NULL),
(118, 'pdf/order/OT16177-29-EcorefChile-12-06-2020-12-11.pdf', 76, '2020-06-12 12:11:25', '2020-06-12 12:11:25', NULL),
(119, 'pdf/order/OT102-105-EcorefChile-12-06-2020-14-25.pdf', 77, '2020-06-12 14:25:35', '2020-06-12 14:25:35', NULL),
(120, 'pdf/order/OT103-105-EcorefChile-12-06-2020-14-25.pdf', 78, '2020-06-12 14:25:35', '2020-06-12 14:25:35', NULL),
(121, 'pdf/order/OT101-105-EcorefChile-12-06-2020-14-25.pdf', 80, '2020-06-12 14:25:36', '2020-06-12 14:25:36', NULL),
(122, 'pdf/order/OT105-105-EcorefChile-12-06-2020-14-25.pdf', 84, '2020-06-12 14:25:37', '2020-06-12 14:25:37', NULL),
(123, 'pdf/order/OT101-105-EcorefChile-12-06-2020-14-37.pdf', 80, '2020-06-12 14:37:13', '2020-06-12 14:37:13', NULL),
(124, 'pdf/order/OT16188-86-EcorefChile-15-06-2020-14-39.pdf', 88, '2020-06-15 14:39:28', '2020-06-15 14:39:28', NULL),
(125, 'pdf/order/OT16189-86-EcorefChile-15-06-2020-14-47.pdf', 89, '2020-06-15 14:47:34', '2020-06-15 14:47:34', NULL),
(126, 'pdf/order/OT16190-86-EcorefChile-15-06-2020-14-57.pdf', 90, '2020-06-15 14:57:53', '2020-06-15 14:57:53', NULL),
(127, 'pdf/order/OT16049-103-EcorefChile-15-06-2020-16-39.pdf', 91, '2020-06-15 16:39:07', '2020-06-15 16:39:07', NULL),
(128, 'pdf/order/OT16193-86-EcorefChile-16-06-2020-13-44.pdf', 92, '2020-06-16 13:44:24', '2020-06-16 13:44:24', NULL),
(129, 'pdf/order/OT16186-28-EcorefChile-17-06-2020-11-52.pdf', 93, '2020-06-17 11:52:25', '2020-06-17 11:52:25', NULL),
(130, 'pdf/order/OT16186-28-EcorefChile-17-06-2020-11-53.pdf', 93, '2020-06-17 11:53:14', '2020-06-17 11:53:14', NULL),
(131, 'pdf/order/OT16194-28-EcorefChile-17-06-2020-12-11.pdf', 94, '2020-06-17 12:11:38', '2020-06-17 12:11:38', NULL),
(132, 'pdf/order/OT16180-19-EcorefChile-17-06-2020-12-24.pdf', 95, '2020-06-17 12:24:24', '2020-06-17 12:24:24', NULL),
(133, 'pdf/order/OT16184-28-EcorefChile-17-06-2020-12-39.pdf', 100, '2020-06-17 12:39:11', '2020-06-17 12:39:11', NULL),
(134, 'pdf/order/OT16150-961-EcorefChile-17-06-2020-12-48.pdf', 101, '2020-06-17 12:48:50', '2020-06-17 12:48:50', NULL),
(135, 'pdf/order/OT16180-33-EcorefChile-17-06-2020-13-00.pdf', 105, '2020-06-17 13:00:29', '2020-06-17 13:00:29', NULL),
(136, 'pdf/order/OT16195-29-EcorefChile-17-06-2020-18-52.pdf', 107, '2020-06-17 18:52:33', '2020-06-17 18:52:33', NULL),
(137, 'pdf/order/OT16196-19-EcorefChile-17-06-2020-19-23.pdf', 109, '2020-06-17 19:23:23', '2020-06-17 19:23:23', NULL),
(138, 'pdf/order/OT16198-106-EcorefChile-18-06-2020-09-05.pdf', 106, '2020-06-18 09:05:06', '2020-06-18 09:05:06', NULL),
(139, 'pdf/order/OT16199-9004-EcorefChile-18-06-2020-09-07.pdf', 110, '2020-06-18 09:07:56', '2020-06-18 09:07:56', NULL),
(140, 'pdf/order/OT16201-29-EcorefChile-18-06-2020-16-48.pdf', 113, '2020-06-18 16:48:09', '2020-06-18 16:48:09', NULL),
(141, 'pdf/order/OT16201-29-EcorefChile-18-06-2020-16-48.pdf', 113, '2020-06-18 16:48:51', '2020-06-18 16:48:51', NULL),
(142, 'pdf/order/OT16200-33-EcorefChile-18-06-2020-16-58.pdf', 114, '2020-06-18 16:58:27', '2020-06-18 16:58:27', NULL),
(143, 'pdf/order/OT16204-29-EcorefChile-18-06-2020-17-03.pdf', 115, '2020-06-18 17:03:28', '2020-06-18 17:03:28', NULL),
(144, 'pdf/order/OT16203-106-EcorefChile-18-06-2020-18-04.pdf', 116, '2020-06-18 18:04:03', '2020-06-18 18:04:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refrigerants`
--

CREATE TABLE `refrigerants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `refrigerants`
--

INSERT INTO `refrigerants` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'R.22', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(2, 'R.404', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(3, 'R.507', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(4, 'R', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Administrador', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(2, 'Writer', 'Tecnico', 'web', '2020-05-19 13:47:17', '2020-05-19 13:47:17'),
(3, 'Supervisor', 'Supervisor', 'web', '2020-05-26 15:39:55', '2020-05-26 15:39:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 2),
(3, 2),
(1, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `signatures`
--

CREATE TABLE `signatures` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `signatures`
--

INSERT INTO `signatures` (`id`, `title`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '/img/signatures/ot1018-19052020134831.png', '2020-05-19 13:48:31', '2020-05-19 13:48:31', NULL),
(2, NULL, '/img/signatures/ot1016-19052020135118.png', '2020-05-19 13:51:18', '2020-05-19 13:51:18', NULL),
(3, NULL, '/img/signatures/ot1015-19052020140532.png', '2020-05-19 14:05:32', '2020-05-19 14:05:32', NULL),
(4, NULL, '/img/signatures/ot15260-19052020141417.png', '2020-05-19 14:14:17', '2020-05-19 14:14:17', NULL),
(5, NULL, '/img/signatures/ot1017-20052020085811.png', '2020-05-20 08:58:11', '2020-05-20 08:58:11', NULL),
(6, NULL, '/img/signatures/ot1029-22052020024246.png', '2020-05-22 02:42:46', '2020-05-22 02:42:46', NULL),
(7, NULL, '/img/signatures/ot1032-24052020013253.png', '2020-05-24 01:32:53', '2020-05-24 01:32:53', NULL),
(8, NULL, '/img/signatures/ot1033-24052020225129.png', '2020-05-24 22:51:29', '2020-05-24 22:51:29', NULL),
(9, NULL, '/img/signatures/ot1010-26052020154911.png', '2020-05-26 15:49:11', '2020-05-26 15:49:11', NULL),
(10, NULL, '/img/signatures/ot1011-27052020092639.png', '2020-05-27 09:26:39', '2020-05-27 09:26:39', NULL),
(11, NULL, '/img/signatures/ot1012-27052020093846.png', '2020-05-27 09:38:46', '2020-05-27 09:38:46', NULL),
(12, NULL, '/img/signatures/ot16057-27052020155621.png', '2020-05-27 15:56:21', '2020-05-27 15:56:21', NULL),
(13, NULL, '/img/signatures/ot1011-27052020181355.png', '2020-05-27 18:13:55', '2020-05-27 18:13:55', NULL),
(14, NULL, '/img/signatures/ot16053-28052020114815.png', '2020-05-28 11:48:15', '2020-05-28 11:48:15', NULL),
(15, NULL, '/img/signatures/ot975-28052020154727.png', '2020-05-28 15:47:27', '2020-05-28 15:47:27', NULL),
(16, NULL, '/img/signatures/ot15261-28052020173146.png', '2020-05-28 17:31:46', '2020-05-28 17:31:46', NULL),
(17, NULL, '/img/signatures/ot15261-28052020173550.png', '2020-05-28 17:35:50', '2020-05-28 17:35:50', NULL),
(18, NULL, '/img/signatures/ot15262-28052020184138.png', '2020-05-28 18:41:38', '2020-05-28 18:41:38', NULL),
(19, NULL, '/img/signatures/ot1009-29052020021353.png', '2020-05-29 02:13:53', '2020-05-29 02:13:53', NULL),
(20, NULL, '/img/signatures/ot15263-29052020132704.png', '2020-05-29 13:27:04', '2020-05-29 13:27:04', NULL),
(21, NULL, '/img/signatures/ot15263-29052020132849.png', '2020-05-29 13:28:49', '2020-05-29 13:28:49', NULL),
(22, NULL, '/img/signatures/ot15263-01062020110412.png', '2020-06-01 11:04:12', '2020-06-01 11:04:12', NULL),
(23, NULL, '/img/signatures/ot15263-01062020110413.png', '2020-06-01 11:04:13', '2020-06-01 11:04:13', NULL),
(24, NULL, '/img/signatures/ot15263-01062020110413.png', '2020-06-01 11:04:13', '2020-06-01 11:04:13', NULL),
(25, NULL, '/img/signatures/ot15265-01062020112355.png', '2020-06-01 11:23:55', '2020-06-01 11:23:55', NULL),
(26, NULL, '/img/signatures/ot1266-01062020112507.png', '2020-06-01 11:25:07', '2020-06-01 11:25:07', NULL),
(27, NULL, '/img/signatures/ot15265-01062020112536.png', '2020-06-01 11:25:36', '2020-06-01 11:25:36', NULL),
(28, NULL, '/img/signatures/ot15267-01062020112801.png', '2020-06-01 11:28:01', '2020-06-01 11:28:01', NULL),
(29, NULL, '/img/signatures/ot15265-01062020113920.png', '2020-06-01 11:39:20', '2020-06-01 11:39:20', NULL),
(30, NULL, '/img/signatures/ot16075-01062020151104.png', '2020-06-01 15:11:04', '2020-06-01 15:11:04', NULL),
(31, NULL, '/img/signatures/ot16075-01062020151217.png', '2020-06-01 15:12:17', '2020-06-01 15:12:17', NULL),
(32, NULL, '/img/signatures/ot16075-01062020151302.png', '2020-06-01 15:13:02', '2020-06-01 15:13:02', NULL),
(33, NULL, '/img/signatures/ot16075-01062020151334.png', '2020-06-01 15:13:34', '2020-06-01 15:13:34', NULL),
(34, NULL, '/img/signatures/ot1034-02062020014244.png', '2020-06-02 01:42:44', '2020-06-02 01:42:44', NULL),
(35, NULL, '/img/signatures/ot16109-02062020175751.png', '2020-06-02 17:57:51', '2020-06-02 17:57:51', NULL),
(36, NULL, '/img/signatures/ot16109-02062020181612.png', '2020-06-02 18:16:12', '2020-06-02 18:16:12', NULL),
(37, NULL, '/img/signatures/ot16070-03062020114641.png', '2020-06-03 11:46:41', '2020-06-03 11:46:41', NULL),
(38, NULL, '/img/signatures/ot16070-03062020114643.png', '2020-06-03 11:46:43', '2020-06-03 11:46:43', NULL),
(39, NULL, '/img/signatures/ot16070-03062020114645.png', '2020-06-03 11:46:45', '2020-06-03 11:46:45', NULL),
(40, NULL, '/img/signatures/ot16070-03062020114648.png', '2020-06-03 11:46:48', '2020-06-03 11:46:48', NULL),
(41, NULL, '/img/signatures/ot16118-03062020114921.png', '2020-06-03 11:49:21', '2020-06-03 11:49:21', NULL),
(42, NULL, '/img/signatures/ot16116-03062020120707.png', '2020-06-03 12:07:07', '2020-06-03 12:07:07', NULL),
(43, NULL, '/img/signatures/ot16117-03062020124236.png', '2020-06-03 12:42:36', '2020-06-03 12:42:36', NULL),
(44, NULL, '/img/signatures/ot1001-03062020144129.png', '2020-06-03 14:41:29', '2020-06-03 14:41:29', NULL),
(45, NULL, '/img/signatures/ot1103-03062020144130.png', '2020-06-03 14:41:30', '2020-06-03 14:41:30', NULL),
(46, NULL, '/img/signatures/ot1000-03062020144130.png', '2020-06-03 14:41:30', '2020-06-03 14:41:30', NULL),
(47, NULL, '/img/signatures/ot1002-03062020144132.png', '2020-06-03 14:41:32', '2020-06-03 14:41:32', NULL),
(48, NULL, '/img/signatures/ot1005-03062020144133.png', '2020-06-03 14:41:33', '2020-06-03 14:41:33', NULL),
(49, NULL, '/img/signatures/ot1001-03062020144232.png', '2020-06-03 14:42:32', '2020-06-03 14:42:32', NULL),
(50, NULL, '/img/signatures/ot16111-03062020151421.png', '2020-06-03 15:14:21', '2020-06-03 15:14:21', NULL),
(51, NULL, '/img/signatures/ot16111-03062020151623.png', '2020-06-03 15:16:23', '2020-06-03 15:16:23', NULL),
(52, NULL, '/img/signatures/ot16108-03062020152517.png', '2020-06-03 15:25:17', '2020-06-03 15:25:17', NULL),
(53, NULL, '/img/signatures/ot16108-03062020152538.png', '2020-06-03 15:25:38', '2020-06-03 15:25:38', NULL),
(54, NULL, '/img/signatures/ot16119-03062020160403.png', '2020-06-03 16:04:03', '2020-06-03 16:04:03', NULL),
(55, NULL, '/img/signatures/ot16120-03062020161033.png', '2020-06-03 16:10:33', '2020-06-03 16:10:33', NULL),
(56, NULL, '/img/signatures/ot16123-03062020162617.png', '2020-06-03 16:26:17', '2020-06-03 16:26:17', NULL),
(57, NULL, '/img/signatures/ot16111-03062020164602.png', '2020-06-03 16:46:02', '2020-06-03 16:46:02', NULL),
(58, NULL, '/img/signatures/ot1004-04062020111509.png', '2020-06-04 11:15:09', '2020-06-04 11:15:09', NULL),
(59, NULL, '/img/signatures/ot1004-04062020111700.png', '2020-06-04 11:17:00', '2020-06-04 11:17:00', NULL),
(60, NULL, '/img/signatures/ot1004-04062020111920.png', '2020-06-04 11:19:20', '2020-06-04 11:19:20', NULL),
(61, NULL, '/img/signatures/ot1004-04062020112102.png', '2020-06-04 11:21:02', '2020-06-04 11:21:02', NULL),
(62, NULL, '/img/signatures/ot16121-04062020131535.png', '2020-06-04 13:15:35', '2020-06-04 13:15:35', NULL),
(63, NULL, '/img/signatures/ot16121-04062020131632.png', '2020-06-04 13:16:32', '2020-06-04 13:16:32', NULL),
(64, NULL, '/img/signatures/ot16027-04062020144422.png', '2020-06-04 14:44:22', '2020-06-04 14:44:22', NULL),
(65, NULL, '/img/signatures/ot16130-04062020185539.png', '2020-06-04 18:55:39', '2020-06-04 18:55:39', NULL),
(66, NULL, '/img/signatures/ot1004-05062020095428.png', '2020-06-05 09:54:28', '2020-06-05 09:54:28', NULL),
(67, NULL, '/img/signatures/ot1004-05062020095835.png', '2020-06-05 09:58:35', '2020-06-05 09:58:35', NULL),
(68, NULL, '/img/signatures/ot16132-05062020111805.png', '2020-06-05 11:18:05', '2020-06-05 11:18:05', NULL),
(69, NULL, '/img/signatures/ot16131-05062020113119.png', '2020-06-05 11:31:19', '2020-06-05 11:31:19', NULL),
(70, NULL, '/img/signatures/ot16137-05062020163732.png', '2020-06-05 16:37:32', '2020-06-05 16:37:32', NULL),
(71, NULL, '/img/signatures/ot16137-05062020163826.png', '2020-06-05 16:38:26', '2020-06-05 16:38:26', NULL),
(72, NULL, '/img/signatures/ot16137-05062020163911.png', '2020-06-05 16:39:11', '2020-06-05 16:39:11', NULL),
(73, NULL, '/img/signatures/ot16131-05062020170504.png', '2020-06-05 17:05:04', '2020-06-05 17:05:04', NULL),
(74, NULL, '/img/signatures/ot16140-07062020184553.png', '2020-06-07 18:45:53', '2020-06-07 18:45:53', NULL),
(75, NULL, '/img/signatures/ot16140-07062020184708.png', '2020-06-07 18:47:08', '2020-06-07 18:47:08', NULL),
(76, NULL, '/img/signatures/ot16142-07062020185416.png', '2020-06-07 18:54:16', '2020-06-07 18:54:16', NULL),
(77, NULL, '/img/signatures/ot16144-08062020112530.png', '2020-06-08 11:25:30', '2020-06-08 11:25:30', NULL),
(78, NULL, '/img/signatures/ot16145-09062020115902.png', '2020-06-09 11:59:02', '2020-06-09 11:59:02', NULL),
(79, NULL, '/img/signatures/ot16145-09062020120240.png', '2020-06-09 12:02:40', '2020-06-09 12:02:40', NULL),
(80, NULL, '/img/signatures/ot16149-09062020120918.png', '2020-06-09 12:09:18', '2020-06-09 12:09:18', NULL),
(81, NULL, '/img/signatures/ot16149-09062020121112.png', '2020-06-09 12:11:12', '2020-06-09 12:11:12', NULL),
(82, NULL, '/img/signatures/ot16151-09062020121557.png', '2020-06-09 12:15:57', '2020-06-09 12:15:57', NULL),
(83, NULL, '/img/signatures/ot16152-09062020183923.png', '2020-06-09 18:39:23', '2020-06-09 18:39:23', NULL),
(84, NULL, '/img/signatures/ot16160-09062020190200.png', '2020-06-09 19:02:00', '2020-06-09 19:02:00', NULL),
(85, NULL, '/img/signatures/ot16154-10062020084501.png', '2020-06-10 08:45:01', '2020-06-10 08:45:01', NULL),
(86, NULL, '/img/signatures/ot16105-10062020102140.png', '2020-06-10 10:21:40', '2020-06-10 10:21:40', NULL),
(87, NULL, '/img/signatures/ot16106-10062020102704.png', '2020-06-10 10:27:04', '2020-06-10 10:27:04', NULL),
(88, NULL, '/img/signatures/ot16166-11062020123649.png', '2020-06-11 12:36:49', '2020-06-11 12:36:49', NULL),
(89, NULL, '/img/signatures/ot16171-12062020092710.png', '2020-06-12 09:27:10', '2020-06-12 09:27:10', NULL),
(90, NULL, '/img/signatures/ot16178-12062020110710.png', '2020-06-12 11:07:10', '2020-06-12 11:07:10', NULL),
(91, NULL, '/img/signatures/ot16179-12062020113737.png', '2020-06-12 11:37:37', '2020-06-12 11:37:37', NULL),
(92, NULL, '/img/signatures/ot16177-12062020120849.png', '2020-06-12 12:08:49', '2020-06-12 12:08:49', NULL),
(93, NULL, '/img/signatures/ot16177-12062020121125.png', '2020-06-12 12:11:25', '2020-06-12 12:11:25', NULL),
(94, NULL, '/img/signatures/ot102-12062020142535.png', '2020-06-12 14:25:35', '2020-06-12 14:25:35', NULL),
(95, NULL, '/img/signatures/ot103-12062020142535.png', '2020-06-12 14:25:35', '2020-06-12 14:25:35', NULL),
(96, NULL, '/img/signatures/ot101-12062020142535.png', '2020-06-12 14:25:35', '2020-06-12 14:25:35', NULL),
(97, NULL, '/img/signatures/ot105-12062020142537.png', '2020-06-12 14:25:37', '2020-06-12 14:25:37', NULL),
(98, NULL, '/img/signatures/ot101-12062020143713.png', '2020-06-12 14:37:13', '2020-06-12 14:37:13', NULL),
(99, NULL, '/img/signatures/ot16188-15062020143928.png', '2020-06-15 14:39:28', '2020-06-15 14:39:28', NULL),
(100, NULL, '/img/signatures/ot16189-15062020144733.png', '2020-06-15 14:47:33', '2020-06-15 14:47:33', NULL),
(101, NULL, '/img/signatures/ot16190-15062020145752.png', '2020-06-15 14:57:52', '2020-06-15 14:57:52', NULL),
(102, NULL, '/img/signatures/ot16049-15062020163907.png', '2020-06-15 16:39:07', '2020-06-15 16:39:07', NULL),
(103, NULL, '/img/signatures/ot16193-16062020134424.png', '2020-06-16 13:44:24', '2020-06-16 13:44:24', NULL),
(104, NULL, '/img/signatures/ot16186-17062020115225.png', '2020-06-17 11:52:25', '2020-06-17 11:52:25', NULL),
(105, NULL, '/img/signatures/ot16186-17062020115314.png', '2020-06-17 11:53:14', '2020-06-17 11:53:14', NULL),
(106, NULL, '/img/signatures/ot16194-17062020121138.png', '2020-06-17 12:11:38', '2020-06-17 12:11:38', NULL),
(107, NULL, '/img/signatures/ot16180-17062020122424.png', '2020-06-17 12:24:24', '2020-06-17 12:24:24', NULL),
(108, NULL, '/img/signatures/ot16184-17062020123911.png', '2020-06-17 12:39:11', '2020-06-17 12:39:11', NULL),
(109, NULL, '/img/signatures/ot16150-17062020124850.png', '2020-06-17 12:48:50', '2020-06-17 12:48:50', NULL),
(110, NULL, '/img/signatures/ot16180-17062020130028.png', '2020-06-17 13:00:28', '2020-06-17 13:00:28', NULL),
(111, NULL, '/img/signatures/ot16195-17062020185233.png', '2020-06-17 18:52:33', '2020-06-17 18:52:33', NULL),
(112, NULL, '/img/signatures/ot16196-17062020192323.png', '2020-06-17 19:23:23', '2020-06-17 19:23:23', NULL),
(113, NULL, '/img/signatures/ot16198-18062020090506.png', '2020-06-18 09:05:06', '2020-06-18 09:05:06', NULL),
(114, NULL, '/img/signatures/ot16199-18062020090756.png', '2020-06-18 09:07:56', '2020-06-18 09:07:56', NULL),
(115, NULL, '/img/signatures/ot16201-18062020164809.png', '2020-06-18 16:48:09', '2020-06-18 16:48:09', NULL),
(116, NULL, '/img/signatures/ot16201-18062020164851.png', '2020-06-18 16:48:51', '2020-06-18 16:48:51', NULL),
(117, NULL, '/img/signatures/ot16200-18062020165827.png', '2020-06-18 16:58:27', '2020-06-18 16:58:27', NULL),
(118, NULL, '/img/signatures/ot16204-18062020170328.png', '2020-06-18 17:03:28', '2020-06-18 17:03:28', NULL),
(119, NULL, '/img/signatures/ot16203-18062020180402.png', '2020-06-18 18:04:02', '2020-06-18 18:04:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SERVICIO', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(2, 'EMERGENCIA', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(3, 'MANTENCION', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(4, 'DIAGNOSTICO', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(5, 'EJECUCION PRESUPUESTO', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(6, 'OTRO', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `url`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrador Ecoref', 'administrador@ecorefchile.cl', NULL, '$2y$10$y1uBIanzM2Beq6RQW6ZhVuGolafEffZJ59/.aUyHwD6VKyIdv2rXy', '/img/users/test.png', 'QRlVL0ldEHlWrdlPt5vZCd2JSsxOxnSdoB2pSooM18cV8BCbpPO05kNbmkyT', '2020-05-19 13:47:17', '2020-05-19 13:47:17', NULL),
(2, 'Tecnico a Prueba', 'proyectos@ecorefchile.cl', 56979962824, '$2y$10$R353i.1KipsneIUJy4b2K.BDPkCoHaJatVFcFMg1miGyipOIhnSOe', '/img/users/test.png', 'axkZu7afAAYjRs6Y5BlKyjafSxQqzNfu39mRJDXX1cd30PgIe4ldk5he82dJ', '2020-05-19 13:47:17', '2020-06-18 10:10:57', NULL),
(5, 'David Villegas A.', 'david.villegas.aguilar@gmail.com', NULL, '$2y$10$c2sguzzajQDbb6D.12dEvOLFJBuMcfEe5tAeSiC.XAqaFZFaC/GZC', '/img/users/test.png', '4gHyHe6OPsm7epIP2QUVBBKdypGdwQnKwdkpfd9GsEce1mEdJvX1S5Mzvm1Y', '2020-05-20 13:24:02', '2020-05-26 08:41:14', NULL),
(7, 'Atencion Servicios', 'atencionservicios@ecorefchile.cl', 56944056744, '$2y$10$Z/mqgWtUs3kVFlV/QU0UeuQ6FYoIe/xPmS59M1BUg8xCZniBnEmj.', '/img/users/test.png', 'ImrhxAKWmAZhowClsjTx9b6ra1mJcXdkRiyg07diRnr6ocjUF1ZHPsLTdTwA', '2020-05-20 18:26:20', '2020-06-18 10:35:49', NULL),
(8, 'Jose Redondas', 'tonyredondas@gmail.com', NULL, '$2y$10$54Fl0QezBldwguwEjPARC.st8oLLlXAYdb0gsSvfjvpdApl6uOOHC', NULL, NULL, '2020-05-27 09:08:54', '2020-05-27 09:08:54', NULL),
(9, 'Andres Soto', 'andressoto@ecorefchile.cl', NULL, '$2y$10$7o/kKjATfdGe3R6ycqX3BevChHvrYpTDOfnFXpomhpalsVB.BeO/u', NULL, 'FSBPaBHicLR3oDXYVuIkgunilJhBs2WBJlsrbFNfk22PV2f0FspXknGPJK2J', '2020-06-01 09:59:49', '2020-06-01 09:59:49', NULL),
(10, 'Luiz Pedraza', 'andrespedrazapaz@gmail.com', NULL, '$2y$10$xKUSlEvCMhi64Ux8cpi1Cebcxl.k7MOkjzWJ76oqtkFROsOyq7vwy', NULL, NULL, '2020-06-01 10:03:13', '2020-06-01 10:03:13', NULL),
(12, 'Flavio Justiniano', 'cesarciito995@gmail.com', NULL, '$2y$10$vBWl.eyHrtHeKsgZPF2G0ez9xCJYVtEgDeN0jFMtb6gxmVlb4ciQy', NULL, NULL, '2020-06-01 10:07:30', '2020-06-01 10:07:30', NULL),
(13, 'Angel Salazar', 'serviciosrefriexpress@gmail.com', NULL, '$2y$10$svM9Ai3fNsVF7a//Ws7NseJt2nXUMTajFP2rz19WcTH6VINNlkXPa', NULL, NULL, '2020-06-03 13:59:20', '2020-06-03 13:59:20', NULL),
(14, 'Manuel Diaz', 'manuel.diaz@ecorefchile.cl', NULL, '$2y$10$M0hZohfd0OJH9qmKYEn/Z.PTT6rE3g9thI6nxju8tMIJPVNFUbUGi', NULL, NULL, '2020-06-03 14:02:04', '2020-06-03 14:02:04', NULL),
(15, 'Ivar Vasquez', 'ivarcl1990@gmail.com', NULL, '$2y$10$j7Jk6wrv5cTvrAL.o74l6eHWstq9IhrPyoA68jVNehPJNivB4/pnq', NULL, NULL, '2020-06-03 14:03:46', '2020-06-03 14:03:46', NULL),
(16, 'Juan Arias', 'prevencion@ecorefchile.cl', NULL, '$2y$10$l3wbFbDvFWlN41hsZ6G04OdU0yMA3oRC5OshaFI6jo2fEeP/twBBy', NULL, NULL, '2020-06-03 14:05:34', '2020-06-03 14:05:34', NULL),
(17, 'Juan Campos', 'gabriel03.campos11@gmail.com', NULL, '$2y$10$9naRUGM/jWYLwTfp4sRD..Mk0XK8cbBAdas3wST8dF7mLDgLNEqSu', NULL, NULL, '2020-06-09 18:02:59', '2020-06-09 18:02:59', NULL),
(18, 'Eder Campos', 'ederc9716@gmail.com', NULL, '$2y$10$Qh9VNAId7WRgbsBfN8FFdueJWwwrStIQ7pHfCK1bpOjjHkjFnM386', NULL, NULL, '2020-06-09 18:04:00', '2020-06-09 18:04:00', NULL),
(19, 'Luciano Campos', 'lucianochambi1@gmail.com', NULL, '$2y$10$9pYIWciXVqUQH0lCkRKlQ.NU8j3qnMQaajseRsN/z4o8Lmm6W3cQu', NULL, NULL, '2020-06-09 18:05:10', '2020-06-09 18:05:10', NULL),
(20, 'Edson Medina', 'edsonmedinavani@gmail.com', NULL, '$2y$10$YeKWT5aaZM8rbhYdHX5LZu.8JXBMayjHKkl4t6iHK/x9GYneV0/Pi', NULL, NULL, '2020-06-12 13:14:52', '2020-06-12 13:14:52', NULL),
(21, 'Yothjan Garcia', 'yothjanalexgarcia@gmail.com', NULL, '$2y$10$NdASxyjxqrxMSNiPY1JS.OKx.1BzvOG9HNWJZGobbv4yaPRTzETzK', NULL, NULL, '2020-06-12 13:15:47', '2020-06-12 13:15:47', NULL),
(22, 'Charlith Garcia', 'charlithgarcia@hotmail.com', NULL, '$2y$10$CeQcww1Dt65CaVFahN6e6u3hdnj9umB/x3muXjIuRWpqqDsR.mDWa', NULL, NULL, '2020-06-12 13:16:52', '2020-06-12 13:16:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mileage_start` int(10) UNSIGNED DEFAULT NULL,
  `mileage_end` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `client_people`
--
ALTER TABLE `client_people`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_url_unique` (`url`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parameter_refrigerant`
--
ALTER TABLE `parameter_refrigerant`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_url_unique` (`url`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `refrigerants`
--
ALTER TABLE `refrigerants`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `client_people`
--
ALTER TABLE `client_people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT de la tabla `parameter_refrigerant`
--
ALTER TABLE `parameter_refrigerant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT de la tabla `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT de la tabla `refrigerants`
--
ALTER TABLE `refrigerants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
