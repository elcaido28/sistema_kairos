-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-11-2019 a las 16:58:12
-- Versión del servidor: 10.2.29-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kairoskids_HRM`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_advance_salaries`
--

CREATE TABLE `xin_advance_salaries` (
  `advance_salary_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `month_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advance_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `one_time_deduct` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `monthly_installment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_paid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `is_deducted_from_salary` int(11) DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `xin_advance_salaries`
--

INSERT INTO `xin_advance_salaries` (`advance_salary_id`, `company_id`, `employee_id`, `month_year`, `advance_amount`, `one_time_deduct`, `monthly_installment`, `total_paid`, `reason`, `status`, `is_deducted_from_salary`, `created_at`) VALUES
(1, 1, 141, '2019-01', '200', '0', '', '0', 'por ser familia', 1, NULL, '2019-01-18 11:13:02'),
(2, 2, 20, '2018-11', '100', '1', '0', '0', 'trhrher', NULL, NULL, '2019-08-28 09:20:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_announcements`
--

CREATE TABLE `xin_announcements` (
  `announcement_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `company_id` int(111) NOT NULL,
  `department_id` int(111) NOT NULL,
  `published_by` int(111) NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_announcements`
--

INSERT INTO `xin_announcements` (`announcement_id`, `title`, `start_date`, `end_date`, `company_id`, `department_id`, `published_by`, `summary`, `description`, `is_active`, `created_at`) VALUES
(1, 'Reunion General', '2018-08-14', '2018-08-14', 1, 1, 1, 'Alas 14:00 p.m.', 'Todos los funcionarias y funcionarios sin excepción.', 0, '14-08-2018'),
(2, 'REUNION ', '2019-05-13', '2019-05-13', 1, 16, 6, 'Se necesitan todos los empleados reunidos', '', 0, '13-05-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_attendance_time`
--

CREATE TABLE `xin_attendance_time` (
  `time_attendance_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `attendance_date` varchar(255) NOT NULL,
  `clock_in` varchar(255) NOT NULL,
  `clock_in_ip_address` varchar(255) NOT NULL,
  `clock_out` varchar(255) NOT NULL,
  `clock_out_ip_address` varchar(255) NOT NULL,
  `clock_in_out` varchar(255) NOT NULL,
  `time_late` varchar(255) NOT NULL,
  `early_leaving` varchar(255) NOT NULL,
  `overtime` varchar(255) NOT NULL,
  `total_work` varchar(255) NOT NULL,
  `total_rest` varchar(255) NOT NULL,
  `attendance_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_attendance_time`
--

INSERT INTO `xin_attendance_time` (`time_attendance_id`, `employee_id`, `attendance_date`, `clock_in`, `clock_in_ip_address`, `clock_out`, `clock_out_ip_address`, `clock_in_out`, `time_late`, `early_leaving`, `overtime`, `total_work`, `total_rest`, `attendance_status`) VALUES
(1, 1, '2018-07-17', '2018-07-17 08:15:00', '', '2018-07-17 16:15:00', '', '0', '2018-07-17 08:15:00', '2018-07-17 16:15:00', '2018-07-17 16:15:00', '8:0', '', 'Present'),
(2, 7, '2018-08-03', '2018-08-03 11:45:30', '190.214.49.253', '2018-08-03 11:45:34', '190.214.49.253', '0', '2018-08-03 11:45:30', '2018-08-03 11:45:34', '2018-08-03 11:45:34', '0:0', '', 'Present'),
(3, 7, '2018-08-03', '2018-08-03 11:46:29', '190.214.49.253', '', '', '1', '2018-08-03 11:46:29', '2018-08-03 11:46:29', '2018-08-03 11:46:29', '', '0:0', 'Present'),
(4, 13, '2018-08-14', '2018-08-14 11:19:22', '181.196.247.26', '2018-09-30 00:13:03', '181.175.107.27', '0', '2018-08-14 11:19:22', '2018-09-30 00:13:03', '2018-09-30 00:13:03', '0:0', '', 'Present'),
(5, 13, '2018-09-30', '2018-09-30 00:15:14', '181.175.107.27', '2018-09-30 00:15:18', '181.175.107.27', '0', '2018-09-30 00:15:14', '2018-09-30 00:15:18', '2018-09-30 00:15:18', '0:0', '', 'Present'),
(6, 17, '2019-09-01', '2019-09-01 22:45:02', '181.199.38.239', '2019-09-01 22:45:05', '181.199.38.239', '0', '2019-09-01 22:45:02', '2019-09-01 22:45:05', '2019-09-01 22:45:05', '0:0', '', 'Present'),
(7, 17, '2019-09-02', '2019-09-02 01:10:27', '190.154.28.110', '2019-09-02 01:12:27', '190.154.28.110', '0', '2019-09-02 01:10:27', '2019-09-02 01:12:27', '2019-09-02 01:12:27', '0:2', '', 'Present'),
(8, 145, '2019-09-02', '2019-09-02 22:32:05', '181.113.153.166', '2019-09-02 22:32:19', '181.113.153.166', '0', '2019-09-02 22:32:05', '2019-09-02 22:32:19', '2019-09-02 22:32:19', '0:0', '', 'Present'),
(9, 145, '2019-09-03', '2019-09-03 08:31:36', '181.113.153.166', '2019-09-03 08:40:44', '181.113.153.166', '0', '2019-09-03 08:31:36', '2019-09-03 08:40:44', '2019-09-03 08:40:44', '0:9', '', 'Present'),
(11, 17, '2019-09-05', '2019-09-05 22:30:08', '181.199.33.14', '2019-09-05 22:30:12', '181.199.33.14', '0', '2019-09-05 22:30:08', '2019-09-05 22:30:12', '2019-09-05 22:30:12', '0:0', '', 'Present'),
(12, 17, '2019-09-18', '2019-09-18 00:56:50', '186.33.143.122', '2019-09-18 00:56:52', '186.33.143.122', '0', '2019-09-18 00:56:50', '2019-09-18 00:56:52', '2019-09-18 00:56:52', '0:0', '', 'Present');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_companies`
--

CREATE TABLE `xin_companies` (
  `company_id` int(111) NOT NULL,
  `type_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `trading_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `government_tax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_companies`
--

INSERT INTO `xin_companies` (`company_id`, `type_id`, `name`, `trading_name`, `username`, `password`, `registration_no`, `government_tax`, `email`, `logo`, `contact_number`, `website_url`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `country`, `is_active`, `added_by`, `created_at`) VALUES
(1, 2, 'FUNDACIÓN KAÍROS', 'FUNDACIÓN KAÍROS', 'MAHISH JOGENDRA KUMAR', '', '0992242388001', '12', 'info@fundacionkairos.org', 'logo_1531636552.png', '0999067575', 'http://fundacionkairos.org', 'Isla Trinitaria, Coop. 4 de marzo mz 16 sl 27.', '', 'Guayaquil', 'Guayas', '090510', 61, 0, 1, '22-05-2018'),
(2, 2, 'ESCUELA FISCOMISIONAL EL PROFETA JEREMÍAS', 'FUNDACIÓN KAÍROS', 'MARIA ELENA TACURI SAQUISELA', '', '0992242388001', '12', 'info@fundacionkairos.org', 'logo_1534044352.png', '0999067575', 'http://fundacionkairos.org', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', 'Guayaquil', 'Guayas', '090510', 61, 0, 1, '11-08-2018'),
(3, 2, 'COLEGIO FISCOMISIONAL EL PROFETA JEREMÍAS', 'FUNDACIÓN KAÍROS', 'MARIA ELENA TACURI SAQUISELA', '', '0992242388001', '12', 'info@fundacionkairos.org', 'logo_1534045229.png', '0999067575', 'http://fundacionkairos.org/', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', 'Guayaquil', 'Guayas', '593042', 61, 0, 1, '11-08-2018'),
(4, 2, 'ESCUELA Nª 497 SANTA MARÍA EUFRASIA', 'ESCUELA Nª 497 SANTA MARÍA EUFRASIA', 'VICELA BRANDA HURTADO', '', '0992242388001', '12', 'info@fundacionkairos.org', 'logo_1534045428.png', '0999067575', 'http://fundacionkairos.org/', 'Isla Trinitaria Coop. Brisas del Salado.', '', 'Guayaquil', 'Guayas', '593042', 61, 0, 1, '11-08-2018'),
(5, 2, 'ESCUELA FISCOMISIONAL Nº 18 PADRE NUMAEL LÓPEZ', 'ESCUELA FISCOMISIONAL Nº 18 PADRE NUMAEL LÓPEZ', 'NORY ILEANA LINDAO ESPINOZA', '', '0992242388001', '12', 'info@fundacionkairos.org', 'logo_1534045970.png', '0999067575', 'http://fundacionkairos.org/', 'Isla Trinitaria Coop. Che Guevara', '', 'Guayaquil', 'Guayas', '593042', 61, 0, 1, '11-08-2018'),
(6, 2, 'ESCUELA FISCOMISIONAL Nº 17 SAN CARLOS LWANGA', 'ESCUELA FISCOMISIONAL Nº 17 SAN CARLOS LWANGA', 'MARTITA MARIA HARO PACHA', '', '0992242388001', '12', 'info@fundacionkairos.org', 'logo_1534046159.png', '0999067575', 'http://fundacionkairos.org/', 'Isla Trinitaria Coop.  Independencia.', '', 'Guayaquil', 'Guayas', '090510', 61, 0, 1, '11-08-2018'),
(7, 2, 'ESCUELA PADRE SIMÓN EL AMIGO DEL MILLÓN', 'ESCUELA PADRE SIMÓN EL AMIGO DEL MILLÓN', 'MIRNA AURORAMORAN PILOZO', '', '0992242388001', '12', 'info@fundacionkairos.org', 'logo_1534046305.png', '0999067575', 'http://fundacionkairos.org/', 'Isla Trinitaria Coop. 22 de Abril.', '', 'Guayaquil', 'Guayas', '090510', 61, 0, 1, '11-08-2018'),
(8, 2, 'ESCUELA SANTA MARÍA MONTE DE PAZ', 'ESCUELA SANTA MARÍA MONTE DE PAZ', 'MAURA HIPATIA CASTRO VALENZUELA', '', '0992242388001', '12', 'info@fundacionkairos.org', 'logo_1534046403.png', '0999067575', 'http://fundacionkairos.org/', 'Sector Monte Sinai.', '', 'Guayaquil', 'Guayas', '593042', 61, 0, 1, '11-08-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_company_info`
--

CREATE TABLE `xin_company_info` (
  `company_info_id` int(111) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `logo_second` varchar(255) NOT NULL,
  `sign_in_logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `website_url` text NOT NULL,
  `starting_year` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_contact` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_company_info`
--

INSERT INTO `xin_company_info` (`company_info_id`, `logo`, `logo_second`, `sign_in_logo`, `favicon`, `website_url`, `starting_year`, `company_name`, `company_email`, `company_contact`, `contact_person`, `email`, `phone`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `country`, `updated_at`) VALUES
(1, 'logo_1534141292.png', 'logo2_1520609223.png', 'signin_logo_1531635725.png', 'favicon_1534141292.png', '', '', 'Fundación Kaíros', '', '', 'MAHISH JOGENDRA KUMAR', 'info@fundacionkairos.org', '04-25145256 / 0999067575', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', 'Guayaquil', 'Guayaquil', 'Guayas', '593042', 61, '2017-05-20 12:05:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_company_policy`
--

CREATE TABLE `xin_company_policy` (
  `policy_id` int(111) NOT NULL,
  `company_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_company_policy`
--

INSERT INTO `xin_company_policy` (`policy_id`, `company_id`, `title`, `description`, `added_by`, `created_at`) VALUES
(1, 0, 'Area libre de humo', '&lt;p&gt;Se prohibe fumar dentro de las instalaciones de la fundación.&lt;br&gt;&lt;/p&gt;', 1, '28-02-2018'),
(2, 0, 'Prohibido la Falta de respeto', '&lt;p&gt;Prohibido la Falta de respeto entre los compañeros y compañeras sea cual sea el rango o Jerarquía.&lt;/p&gt;', 1, '14-08-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_company_type`
--

CREATE TABLE `xin_company_type` (
  `type_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_company_type`
--

INSERT INTO `xin_company_type` (`type_id`, `name`, `created_at`) VALUES
(1, 'Corporación', ''),
(2, 'Organización No Gubernamental', ''),
(3, 'Sociedad Anónima', ''),
(4, 'Fundación Privada', ''),
(6, 'Sociedades Y Organizaciones No Gubernamentales sin fines de lucro', '12-08-2018 02:30:22'),
(7, 'Multinacional', '12-08-2018 02:30:36'),
(8, 'Entidad Pública', '12-08-2018 02:31:41'),
(9, 'Entidad Privada', '12-08-2018 02:31:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_contract_type`
--

CREATE TABLE `xin_contract_type` (
  `contract_type_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_contract_type`
--

INSERT INTO `xin_contract_type` (`contract_type_id`, `company_id`, `name`, `created_at`) VALUES
(2, 1, 'Contrato', '12-08-2018 01:16:46'),
(3, 1, 'Distrito', '12-08-2018 01:16:58'),
(4, 1, 'Nombramiento Permanente', '12-08-2018 01:17:09'),
(5, 1, 'Nombramiento Ocasional', '12-08-2018 01:17:31'),
(6, 1, 'Factura', '12-08-2018 01:17:58'),
(7, 1, 'Servicio Prestado', '12-08-2018 01:18:15'),
(8, 1, 'Prácticas Estudiantiles', '12-08-2018 01:20:22'),
(9, 1, 'Prácticas Empresariales', '12-08-2018 01:20:34'),
(10, 1, 'Voluntario', '12-08-2018 01:21:08'),
(12, 2, 'Distrito', '12-08-2018 01:27:27'),
(13, 2, 'Nombramiento Permanente', '12-08-2018 01:27:33'),
(14, 2, 'Nombramiento Ocasional', '12-08-2018 01:27:39'),
(15, 2, 'Factura', '12-08-2018 01:27:44'),
(16, 2, 'Servicio Prestado', '12-08-2018 01:27:48'),
(17, 2, 'Prácticas Estudiantiles', '12-08-2018 01:27:54'),
(18, 2, 'Prácticas Empresariales', '12-08-2018 01:27:59'),
(19, 2, 'Voluntario', '12-08-2018 01:28:04'),
(20, 3, 'Contrato', '12-08-2018 01:28:38'),
(21, 3, 'Distrito', '12-08-2018 01:28:44'),
(22, 3, 'Nombramiento Permanente', '12-08-2018 01:28:52'),
(23, 3, 'Nombramiento Ocasional', '12-08-2018 01:28:57'),
(24, 3, 'Factura', '12-08-2018 01:29:02'),
(25, 3, 'Servicio Prestado', '12-08-2018 01:29:07'),
(26, 3, 'Prácticas Estudiantiles', '12-08-2018 01:29:12'),
(27, 3, 'Prácticas Empresariales', '12-08-2018 01:29:17'),
(28, 3, 'Voluntario', '12-08-2018 01:29:26'),
(29, 4, 'Contrato', '12-08-2018 01:30:31'),
(30, 4, 'Distrito', '12-08-2018 01:30:37'),
(31, 4, 'Nombramiento Permanente', '12-08-2018 01:30:43'),
(32, 4, 'Nombramiento Ocasional', '12-08-2018 01:30:48'),
(33, 4, 'Factura', '12-08-2018 01:30:53'),
(34, 4, 'Servicio Prestado', '12-08-2018 01:30:57'),
(35, 4, 'Prácticas Estudiantiles', '12-08-2018 01:31:02'),
(36, 4, 'Prácticas Empresariales', '12-08-2018 01:31:07'),
(37, 4, 'Voluntario', '12-08-2018 01:31:13'),
(40, 5, 'Contrato', '12-08-2018 01:33:25'),
(41, 5, 'Distrito', '12-08-2018 01:33:32'),
(42, 5, 'Nombramiento Permanente', '12-08-2018 01:33:39'),
(43, 5, 'Nombramiento Ocasional', '12-08-2018 01:33:45'),
(44, 5, 'Factura', '12-08-2018 01:33:51'),
(45, 5, 'Servicio Prestado', '12-08-2018 01:33:56'),
(46, 5, 'Prácticas Estudiantiles', '12-08-2018 01:34:01'),
(47, 5, 'Prácticas Empresariales', '12-08-2018 01:34:07'),
(48, 5, 'Voluntario', '12-08-2018 01:34:13'),
(49, 6, 'Contrato', '12-08-2018 01:34:38'),
(50, 6, 'Distrito', '12-08-2018 01:34:45'),
(51, 6, 'Nombramiento Permanente', '12-08-2018 01:34:52'),
(52, 6, 'Nombramiento Ocasional', '12-08-2018 01:34:58'),
(53, 6, 'Factura', '12-08-2018 01:35:09'),
(54, 6, 'Servicio Prestado', '12-08-2018 01:35:16'),
(55, 6, 'Prácticas Estudiantiles', '12-08-2018 01:35:22'),
(56, 6, 'Prácticas Empresariales', '12-08-2018 01:35:27'),
(57, 6, 'Voluntario', '12-08-2018 01:35:33'),
(58, 7, 'Contrato', '12-08-2018 01:36:52'),
(59, 7, 'Distrito', '12-08-2018 01:37:00'),
(60, 7, 'Nombramiento Permanente', '12-08-2018 01:37:09'),
(61, 7, 'Nombramiento Ocasional', '12-08-2018 01:37:14'),
(62, 7, 'Factura', '12-08-2018 01:37:22'),
(63, 7, 'Servicio Prestado', '12-08-2018 01:37:27'),
(64, 7, 'Prácticas Estudiantiles', '12-08-2018 01:37:32'),
(65, 7, 'Prácticas Empresariales', '12-08-2018 01:37:38'),
(66, 7, 'Voluntario', '12-08-2018 01:37:43'),
(67, 8, 'Contrato', '12-08-2018 01:38:48'),
(68, 8, 'Distrito', '12-08-2018 01:38:55'),
(69, 8, 'Nombramiento Permanente', '12-08-2018 01:39:00'),
(70, 8, 'Nombramiento Ocasional', '12-08-2018 01:39:06'),
(71, 8, 'Factura', '12-08-2018 01:39:13'),
(72, 8, 'Servicio Prestado', '12-08-2018 01:39:18'),
(73, 8, 'Prácticas Estudiantiles', '12-08-2018 01:39:24'),
(74, 8, 'Prácticas Empresariales', '12-08-2018 01:39:29'),
(75, 8, 'Voluntario', '12-08-2018 01:39:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_countries`
--

CREATE TABLE `xin_countries` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_flag` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xin_countries`
--

INSERT INTO `xin_countries` (`country_id`, `country_code`, `country_name`, `country_flag`) VALUES
(1, '+93', 'Afghanistan', 'flag_1500831780.gif'),
(2, '+355', 'Albania', 'flag_1500831815.gif'),
(3, 'DZ', 'Algeria', ''),
(4, 'DS', 'American Samoa', ''),
(5, 'AD', 'Andorra', ''),
(6, 'AO', 'Angola', ''),
(7, 'AI', 'Anguilla', ''),
(8, 'AQ', 'Antarctica', ''),
(9, 'AG', 'Antigua and Barbuda', ''),
(10, 'AR', 'Argentina', ''),
(11, 'AM', 'Armenia', ''),
(12, 'AW', 'Aruba', ''),
(13, 'AU', 'Australia', ''),
(14, 'AT', 'Austria', ''),
(15, 'AZ', 'Azerbaijan', ''),
(16, 'BS', 'Bahamas', ''),
(17, 'BH', 'Bahrain', ''),
(18, 'BD', 'Bangladesh', ''),
(19, 'BB', 'Barbados', ''),
(20, 'BY', 'Belarus', ''),
(21, 'BE', 'Belgium', ''),
(22, 'BZ', 'Belize', ''),
(23, 'BJ', 'Benin', ''),
(24, 'BM', 'Bermuda', ''),
(25, 'BT', 'Bhutan', ''),
(26, 'BO', 'Bolivia', ''),
(27, 'BA', 'Bosnia and Herzegovina', ''),
(28, 'BW', 'Botswana', ''),
(29, 'BV', 'Bouvet Island', ''),
(30, 'BR', 'Brazil', ''),
(31, 'IO', 'British Indian Ocean Territory', ''),
(32, 'BN', 'Brunei Darussalam', ''),
(33, 'BG', 'Bulgaria', ''),
(34, 'BF', 'Burkina Faso', ''),
(35, 'BI', 'Burundi', ''),
(36, 'KH', 'Cambodia', ''),
(37, 'CM', 'Cameroon', ''),
(38, 'CA', 'Canada', ''),
(39, 'CV', 'Cape Verde', ''),
(40, 'KY', 'Cayman Islands', ''),
(41, 'CF', 'Central African Republic', ''),
(42, 'TD', 'Chad', ''),
(43, 'CL', 'Chile', ''),
(44, 'CN', 'China', ''),
(45, 'CX', 'Christmas Island', ''),
(46, 'CC', 'Cocos (Keeling) Islands', ''),
(47, 'CO', 'Colombia', ''),
(48, 'KM', 'Comoros', ''),
(49, 'CG', 'Congo', ''),
(50, 'CK', 'Cook Islands', ''),
(51, 'CR', 'Costa Rica', ''),
(52, 'HR', 'Croatia (Hrvatska)', ''),
(53, 'CU', 'Cuba', ''),
(54, 'CY', 'Cyprus', ''),
(55, 'CZ', 'Czech Republic', ''),
(56, 'DK', 'Denmark', ''),
(57, 'DJ', 'Djibouti', ''),
(58, 'DM', 'Dominica', ''),
(59, 'DO', 'Dominican Republic', ''),
(60, 'TP', 'East Timor', ''),
(61, 'EC', 'Ecuador', ''),
(62, 'EG', 'Egypt', ''),
(63, 'SV', 'El Salvador', ''),
(64, 'GQ', 'Equatorial Guinea', ''),
(65, 'ER', 'Eritrea', ''),
(66, 'EE', 'Estonia', ''),
(67, 'ET', 'Ethiopia', ''),
(68, 'FK', 'Falkland Islands (Malvinas)', ''),
(69, 'FO', 'Faroe Islands', ''),
(70, 'FJ', 'Fiji', ''),
(71, 'FI', 'Finland', ''),
(72, 'FR', 'France', ''),
(73, 'FX', 'France, Metropolitan', ''),
(74, 'GF', 'French Guiana', ''),
(75, 'PF', 'French Polynesia', ''),
(76, 'TF', 'French Southern Territories', ''),
(77, 'GA', 'Gabon', ''),
(78, 'GM', 'Gambia', ''),
(79, 'GE', 'Georgia', ''),
(80, 'DE', 'Germany', ''),
(81, 'GH', 'Ghana', ''),
(82, 'GI', 'Gibraltar', ''),
(83, 'GK', 'Guernsey', ''),
(84, 'GR', 'Greece', ''),
(85, 'GL', 'Greenland', ''),
(86, 'GD', 'Grenada', ''),
(87, 'GP', 'Guadeloupe', ''),
(88, 'GU', 'Guam', ''),
(89, 'GT', 'Guatemala', ''),
(90, 'GN', 'Guinea', ''),
(91, 'GW', 'Guinea-Bissau', ''),
(92, 'GY', 'Guyana', ''),
(93, 'HT', 'Haiti', ''),
(94, 'HM', 'Heard and Mc Donald Islands', ''),
(95, 'HN', 'Honduras', ''),
(96, 'HK', 'Hong Kong', ''),
(97, 'HU', 'Hungary', ''),
(98, 'IS', 'Iceland', ''),
(99, 'IN', 'India', ''),
(100, 'IM', 'Isle of Man', ''),
(101, 'ID', 'Indonesia', ''),
(102, 'IR', 'Iran (Islamic Republic of)', ''),
(103, 'IQ', 'Iraq', ''),
(104, 'IE', 'Ireland', ''),
(105, 'IL', 'Israel', ''),
(106, 'IT', 'Italy', ''),
(107, 'CI', 'Ivory Coast', ''),
(108, 'JE', 'Jersey', ''),
(109, 'JM', 'Jamaica', ''),
(110, 'JP', 'Japan', ''),
(111, 'JO', 'Jordan', ''),
(112, 'KZ', 'Kazakhstan', ''),
(113, 'KE', 'Kenya', ''),
(114, 'KI', 'Kiribati', ''),
(115, 'KP', 'Korea, Democratic People\'s Republic of', ''),
(116, 'KR', 'Korea, Republic of', ''),
(117, 'XK', 'Kosovo', ''),
(118, 'KW', 'Kuwait', ''),
(119, 'KG', 'Kyrgyzstan', ''),
(120, 'LA', 'Lao People\'s Democratic Republic', ''),
(121, 'LV', 'Latvia', ''),
(122, 'LB', 'Lebanon', ''),
(123, 'LS', 'Lesotho', ''),
(124, 'LR', 'Liberia', ''),
(125, 'LY', 'Libyan Arab Jamahiriya', ''),
(126, 'LI', 'Liechtenstein', ''),
(127, 'LT', 'Lithuania', ''),
(128, 'LU', 'Luxembourg', ''),
(129, 'MO', 'Macau', ''),
(130, 'MK', 'Macedonia', ''),
(131, 'MG', 'Madagascar', ''),
(132, 'MW', 'Malawi', ''),
(133, 'MY', 'Malaysia', ''),
(134, 'MV', 'Maldives', ''),
(135, 'ML', 'Mali', ''),
(136, 'MT', 'Malta', ''),
(137, 'MH', 'Marshall Islands', ''),
(138, 'MQ', 'Martinique', ''),
(139, 'MR', 'Mauritania', ''),
(140, 'MU', 'Mauritius', ''),
(141, 'TY', 'Mayotte', ''),
(142, 'MX', 'Mexico', ''),
(143, 'FM', 'Micronesia, Federated States of', ''),
(144, 'MD', 'Moldova, Republic of', ''),
(145, 'MC', 'Monaco', ''),
(146, 'MN', 'Mongolia', ''),
(147, 'ME', 'Montenegro', ''),
(148, 'MS', 'Montserrat', ''),
(149, 'MA', 'Morocco', ''),
(150, 'MZ', 'Mozambique', ''),
(151, 'MM', 'Myanmar', ''),
(152, 'NA', 'Namibia', ''),
(153, 'NR', 'Nauru', ''),
(154, 'NP', 'Nepal', ''),
(155, 'NL', 'Netherlands', ''),
(156, 'AN', 'Netherlands Antilles', ''),
(157, 'NC', 'New Caledonia', ''),
(158, 'NZ', 'New Zealand', ''),
(159, 'NI', 'Nicaragua', ''),
(160, 'NE', 'Niger', ''),
(161, 'NG', 'Nigeria', ''),
(162, 'NU', 'Niue', ''),
(163, 'NF', 'Norfolk Island', ''),
(164, 'MP', 'Northern Mariana Islands', ''),
(165, 'NO', 'Norway', ''),
(166, 'OM', 'Oman', ''),
(167, 'PK', 'Pakistan', ''),
(168, 'PW', 'Palau', ''),
(169, 'PS', 'Palestine', ''),
(170, 'PA', 'Panama', ''),
(171, 'PG', 'Papua New Guinea', ''),
(172, 'PY', 'Paraguay', ''),
(173, 'PE', 'Peru', ''),
(174, 'PH', 'Philippines', ''),
(175, 'PN', 'Pitcairn', ''),
(176, 'PL', 'Poland', ''),
(177, 'PT', 'Portugal', ''),
(178, 'PR', 'Puerto Rico', ''),
(179, 'QA', 'Qatar', ''),
(180, 'RE', 'Reunion', ''),
(181, 'RO', 'Romania', ''),
(182, 'RU', 'Russian Federation', ''),
(183, 'RW', 'Rwanda', ''),
(184, 'KN', 'Saint Kitts and Nevis', ''),
(185, 'LC', 'Saint Lucia', ''),
(186, 'VC', 'Saint Vincent and the Grenadines', ''),
(187, 'WS', 'Samoa', ''),
(188, 'SM', 'San Marino', ''),
(189, 'ST', 'Sao Tome and Principe', ''),
(190, 'SA', 'Saudi Arabia', ''),
(191, 'SN', 'Senegal', ''),
(192, 'RS', 'Serbia', ''),
(193, 'SC', 'Seychelles', ''),
(194, 'SL', 'Sierra Leone', ''),
(195, 'SG', 'Singapore', ''),
(196, 'SK', 'Slovakia', ''),
(197, 'SI', 'Slovenia', ''),
(198, 'SB', 'Solomon Islands', ''),
(199, 'SO', 'Somalia', ''),
(200, 'ZA', 'South Africa', ''),
(201, 'GS', 'South Georgia South Sandwich Islands', ''),
(202, 'ES', 'Spain', ''),
(203, 'LK', 'Sri Lanka', ''),
(204, 'SH', 'St. Helena', ''),
(205, 'PM', 'St. Pierre and Miquelon', ''),
(206, 'SD', 'Sudan', ''),
(207, 'SR', 'Suriname', ''),
(208, 'SJ', 'Svalbard and Jan Mayen Islands', ''),
(209, 'SZ', 'Swaziland', ''),
(210, 'SE', 'Sweden', ''),
(211, 'CH', 'Switzerland', ''),
(212, 'SY', 'Syrian Arab Republic', ''),
(213, 'TW', 'Taiwan', ''),
(214, 'TJ', 'Tajikistan', ''),
(215, 'TZ', 'Tanzania, United Republic of', ''),
(216, 'TH', 'Thailand', ''),
(217, 'TG', 'Togo', ''),
(218, 'TK', 'Tokelau', ''),
(219, 'TO', 'Tonga', ''),
(220, 'TT', 'Trinidad and Tobago', ''),
(221, 'TN', 'Tunisia', ''),
(222, 'TR', 'Turkey', ''),
(223, 'TM', 'Turkmenistan', ''),
(224, 'TC', 'Turks and Caicos Islands', ''),
(225, 'TV', 'Tuvalu', ''),
(226, 'UG', 'Uganda', ''),
(227, 'UA', 'Ukraine', ''),
(228, 'AE', 'United Arab Emirates', ''),
(229, 'GB', 'United Kingdom', ''),
(230, 'US', 'United States', ''),
(231, 'UM', 'United States minor outlying islands', ''),
(232, 'UY', 'Uruguay', ''),
(233, 'UZ', 'Uzbekistan', ''),
(234, 'VU', 'Vanuatu', ''),
(235, 'VA', 'Vatican City State', ''),
(236, 'VE', 'Venezuela', ''),
(237, 'VN', 'Vietnam', ''),
(238, 'VG', 'Virgin Islands (British)', ''),
(239, 'VI', 'Virgin Islands (U.S.)', ''),
(240, 'WF', 'Wallis and Futuna Islands', ''),
(241, 'EH', 'Western Sahara', ''),
(242, 'YE', 'Yemen', ''),
(243, 'ZR', 'Zaire', ''),
(244, 'ZM', 'Zambia', ''),
(245, 'ZW', 'Zimbabwe', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_currencies`
--

CREATE TABLE `xin_currencies` (
  `currency_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_currencies`
--

INSERT INTO `xin_currencies` (`currency_id`, `company_id`, `name`, `code`, `symbol`) VALUES
(1, 1, 'Dolar Americano', 'USD', '$');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_database_backup`
--

CREATE TABLE `xin_database_backup` (
  `backup_id` int(111) NOT NULL,
  `backup_file` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_database_backup`
--

INSERT INTO `xin_database_backup` (`backup_id`, `backup_file`, `created_at`) VALUES
(6, 'backup_09-05-2019_23_32_42.sql.gz', '09-05-2019 23:32:42'),
(7, 'backup_31-08-2019_17_36_49.sql.gz', '31-08-2019 17:36:49'),
(8, 'backup_01-09-2019_23_56_10.sql.gz', '01-09-2019 23:56:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_departments`
--

CREATE TABLE `xin_departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `location_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xin_departments`
--

INSERT INTO `xin_departments` (`department_id`, `department_name`, `company_id`, `location_id`, `employee_id`, `added_by`, `created_at`, `status`) VALUES
(1, 'DIRECCIÓN TECNOLOGÍAS DE LA INFORMACIÓN', 1, 1, 1, 0, '06-03-2018', 1),
(2, 'DIRECCIÓN FINANCIERA', 1, 0, 13, 1, '17-03-2018', 1),
(3, 'DIRECCIÓN DE TALENTO HUMANO', 1, 0, 12, 1, '2018-07-15 01:39:27', 1),
(4, 'RELACIONES PÚBLICAS', 1, 0, 12, 1, '2018-08-09 17:51:05', 1),
(5, 'ODONTOLOGÍA', 1, 0, 139, 1, '2018-08-11 23:07:14', 1),
(6, 'MEDICINA GENERAL', 1, 0, 1, 1, '2018-08-11 23:07:49', 1),
(7, 'GINECOLOGÍA', 1, 0, 1, 1, '2018-08-11 23:08:13', 1),
(8, 'DIRECCIÓN ADMINISTRATIVA', 1, 0, 12, 1, '2018-08-11 23:08:57', 1),
(9, 'GERENCIA GENERAL', 1, 0, 11, 1, '2018-08-11 23:09:47', 1),
(10, 'SECRETARÍA GENERAL', 1, 0, 1, 1, '2018-08-11 23:10:22', 1),
(11, 'ACOGIMIENTO INSTITUCIONAL', 1, 0, 1, 1, '2018-08-11 23:18:51', 1),
(12, 'ACOGIMIENTO FAMILIAR', 1, 0, 1, 1, '2018-08-11 23:19:08', 1),
(13, 'PSICOLOGÍA', 1, 0, 1, 1, '2018-08-11 23:19:54', 1),
(14, 'TRABAJO SOCIAL', 1, 0, 1, 1, '2018-08-11 23:20:17', 1),
(15, 'LEGAL', 1, 0, 1, 1, '2018-08-11 23:20:53', 1),
(16, 'APOYO ECONÓMICO', 1, 0, 1, 1, '2018-08-11 23:21:14', 1),
(17, 'DOCENTES FUNDACIÓN KAÍROS', 1, 0, 1, 1, '2018-08-11 23:24:30', 1),
(18, 'DIRECCIÓN ESC. PROFETA JEREMÍAS', 2, 0, 17, 1, '2018-08-11 23:28:40', 1),
(19, 'INSPECTORÍA ESC. PROFETA JEREMÍAS', 2, 0, 0, 1, '2018-08-11 23:41:32', 1),
(20, 'SECRETARÍA ESC. PROFETA JEREMÍAS', 2, 0, 17, 1, '2018-08-11 23:42:07', 1),
(21, 'DOCENTES ESC. PROFETA JEREMÍAS', 2, 0, 0, 1, '2018-08-11 23:42:48', 1),
(22, 'DIRECCIÓN COL. PROFETA JEREMÍAS', 3, 0, 0, 1, '2018-08-11 23:45:48', 1),
(23, 'INSPECTORÍA COL. PROFETA JEREMÍAS', 3, 0, 0, 1, '2018-08-11 23:45:58', 1),
(24, 'SECRETARÍA COL. PROFETA JEREMÍAS', 3, 0, 0, 1, '2018-08-11 23:46:05', 1),
(25, 'DOCENTES COL. PROFETA JEREMÍAS', 3, 0, 0, 1, '2018-08-11 23:46:12', 1),
(26, 'DIRECCIÓN ESC. Nª 497 SANTA MARÍA EUFRASIA', 4, 0, 16, 1, '2018-08-11 23:46:35', 1),
(27, 'INSPECTORÍA ESC. Nª 497 SANTA MARÍA EUFRASIA', 4, 0, 0, 1, '2018-08-11 23:46:41', 1),
(28, 'SECRETARÍA ESC. Nª 497 SANTA MARÍA EUFRASIA', 4, 0, 16, 1, '2018-08-11 23:46:49', 1),
(29, 'DOCENTES ESC. Nª 497 SANTA MARÍA EUFRASIA', 4, 0, 0, 1, '2018-08-11 23:46:54', 1),
(30, 'DIRECCIÓN ESC. Nº 18 PADRE NUMAEL LÓPEZ', 5, 0, 19, 1, '2018-08-11 23:47:19', 1),
(31, 'INSPECTORÍA ESC. Nº 18 PADRE NUMAEL LÓPEZ', 5, 0, 0, 1, '2018-08-11 23:47:27', 1),
(32, 'SECRETARÍA ESC. Nº 18 PADRE NUMAEL LÓPEZ', 5, 0, 0, 1, '2018-08-11 23:47:33', 1),
(33, 'DOCENTES ESC. Nº 18 PADRE NUMAEL LÓPEZ', 5, 0, 0, 1, '2018-08-11 23:47:43', 1),
(34, 'DIRECCIÓN ESC. Nº 17 SAN CARLOS LWANGA', 6, 0, 14, 1, '2018-08-11 23:48:18', 1),
(35, 'INSPECTORÍA ESC. Nº 17 SAN CARLOS LWANGA', 6, 0, 0, 1, '2018-08-11 23:48:28', 1),
(36, 'SECRETARÍA ESC. Nº 17 SAN CARLOS LWANGA', 6, 0, 0, 1, '2018-08-11 23:48:37', 1),
(37, 'DOCENTES ESC. Nº 17 SAN CARLOS LWANGA', 6, 0, 0, 1, '2018-08-11 23:48:49', 1),
(38, 'DIRECCIÓN ESC. PADRE SIMÓN EL AMIGO DEL MILLÓN', 7, 0, 15, 1, '2018-08-11 23:48:59', 1),
(39, 'INSPECTORÍA ESC. PADRE SIMÓN EL AMIGO DEL MILLÓN', 7, 0, 0, 1, '2018-08-11 23:49:11', 1),
(40, 'SECRETARÍA ESC. PADRE SIMÓN EL AMIGO DEL MILLÓN', 7, 0, 0, 1, '2018-08-11 23:49:19', 1),
(41, 'DOCENTES ESC. PADRE SIMÓN EL AMIGO DEL MILLÓN', 7, 0, 0, 1, '2018-08-11 23:49:28', 1),
(42, 'DIRECCIÓN ESC. SANTA MARÍA MONTE DE PAZ', 8, 0, 18, 1, '2018-08-11 23:49:55', 1),
(43, 'INSPECTORÍA ESC. SANTA MARÍA MONTE DE PAZ', 8, 0, 0, 1, '2018-08-11 23:50:03', 1),
(44, 'SECRETARÍA ESC. SANTA MARÍA MONTE DE PAZ', 8, 0, 0, 1, '2018-08-11 23:50:12', 1),
(45, 'DOCENTES ESC. SANTA MARÍA MONTE DE PAZ', 8, 0, 0, 1, '2018-08-11 23:50:17', 1),
(46, 'CASA FAMILIA', 1, 0, 11, 1, '2018-08-15 01:47:28', 1),
(47, 'TALLERES', 1, 0, 11, 1, '2018-08-15 02:00:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_designations`
--

CREATE TABLE `xin_designations` (
  `designation_id` int(11) NOT NULL,
  `top_designation_id` int(11) NOT NULL DEFAULT 0,
  `department_id` int(200) NOT NULL,
  `company_id` int(11) NOT NULL,
  `designation_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_designations`
--

INSERT INTO `xin_designations` (`designation_id`, `top_designation_id`, `department_id`, `company_id`, `designation_name`, `added_by`, `created_at`, `status`) VALUES
(9, 0, 1, 1, 'Analista de Tecnológicas de la Información', 1, '06-03-2018', 1),
(10, 0, 2, 1, 'Jefa(e)', 1, '18-03-2018', 1),
(11, 0, 4, 1, ' Jefa(e)', 1, '09-08-2018', 1),
(12, 0, 13, 1, 'Psicóloga(o)', 1, '11-08-2018', 1),
(13, 0, 8, 1, 'Jefa(e)', 1, '11-08-2018', 1),
(14, 0, 8, 1, 'Secretaria(o)', 1, '11-08-2018', 1),
(15, 0, 1, 1, 'Jefa(e)', 1, '11-08-2018', 1),
(16, 0, 1, 1, 'Asistente de Tecnológicas de la Información', 1, '11-08-2018', 1),
(17, 0, 18, 2, 'Rector', 1, '12-08-2018', 1),
(18, 0, 18, 2, 'Secretaria(o)', 1, '12-08-2018', 1),
(19, 0, 18, 2, 'Rectora', 1, '12-08-2018', 1),
(20, 0, 19, 2, 'Inspector', 1, '12-08-2018', 1),
(21, 0, 19, 2, 'Inspectora', 1, '12-08-2018', 1),
(22, 0, 19, 2, 'Jefa(e)', 1, '12-08-2018', 1),
(23, 0, 20, 2, 'Jefa(e)', 1, '12-08-2018', 1),
(24, 0, 21, 2, 'Profesor', 1, '12-08-2018', 1),
(25, 0, 21, 2, 'Profesora', 1, '12-08-2018', 1),
(26, 0, 20, 2, 'Asistente', 1, '12-08-2018', 1),
(27, 0, 22, 3, 'Rector', 1, '12-08-2018', 1),
(28, 0, 22, 3, 'Secretaria(o)', 1, '12-08-2018', 1),
(29, 0, 22, 3, 'Rectora', 1, '12-08-2018', 1),
(30, 0, 23, 3, 'Inspector', 1, '12-08-2018', 1),
(31, 0, 23, 3, 'Inspectora', 1, '12-08-2018', 1),
(32, 0, 23, 3, 'Jefa(e)', 1, '12-08-2018', 1),
(33, 0, 24, 3, 'Jefa(e)', 1, '12-08-2018', 1),
(34, 0, 24, 3, 'Asistente', 1, '12-08-2018', 1),
(35, 0, 25, 3, 'Profesor', 1, '12-08-2018', 1),
(36, 0, 25, 3, 'Profesora', 1, '12-08-2018', 1),
(37, 0, 26, 4, 'Rector', 1, '12-08-2018', 1),
(38, 0, 26, 4, 'Secretaria(o)', 1, '12-08-2018', 1),
(39, 0, 26, 4, 'Rectora', 1, '12-08-2018', 1),
(40, 0, 27, 4, 'Inspector', 1, '12-08-2018', 1),
(41, 0, 27, 4, 'Inspectora', 1, '12-08-2018', 1),
(42, 0, 27, 4, 'Jefa(e)', 1, '12-08-2018', 1),
(43, 0, 28, 4, 'Jefa(e)', 1, '12-08-2018', 1),
(44, 0, 28, 4, 'Asistente', 1, '12-08-2018', 1),
(45, 0, 29, 4, 'Profesor', 1, '12-08-2018', 1),
(46, 0, 29, 4, 'Profesora', 1, '12-08-2018', 1),
(47, 0, 30, 5, 'Rector', 1, '12-08-2018', 1),
(48, 0, 30, 5, 'Secretaria(o)', 1, '12-08-2018', 1),
(49, 0, 30, 5, 'Rectora', 1, '12-08-2018', 1),
(50, 0, 31, 5, 'Inspector', 1, '12-08-2018', 1),
(51, 0, 31, 5, 'Inspectora', 1, '12-08-2018', 1),
(52, 0, 31, 5, 'Jefa(e)', 1, '12-08-2018', 1),
(53, 0, 32, 5, 'Jefa(e)', 1, '12-08-2018', 1),
(54, 0, 32, 5, 'Asistente', 1, '12-08-2018', 1),
(55, 0, 33, 5, 'Profesor', 1, '12-08-2018', 1),
(56, 0, 33, 5, 'Profesora', 1, '12-08-2018', 1),
(57, 0, 34, 6, 'Rector', 1, '12-08-2018', 1),
(58, 0, 34, 6, 'Secretaria(o)', 1, '12-08-2018', 1),
(59, 0, 34, 6, 'Rectora', 1, '12-08-2018', 1),
(60, 0, 35, 6, 'Inspector', 1, '12-08-2018', 1),
(61, 0, 35, 6, 'Inspectora', 1, '12-08-2018', 1),
(62, 0, 35, 6, 'Jefa(e)', 1, '12-08-2018', 1),
(63, 0, 36, 6, 'Jefa(e)', 1, '12-08-2018', 1),
(64, 0, 36, 6, 'Asistente', 1, '12-08-2018', 1),
(65, 0, 37, 6, 'Profesor', 1, '12-08-2018', 1),
(66, 0, 37, 6, 'Profesora', 1, '12-08-2018', 1),
(67, 0, 38, 7, 'Rector', 1, '12-08-2018', 1),
(68, 0, 38, 7, 'Secretaria(o)', 1, '12-08-2018', 1),
(69, 0, 38, 7, 'Rectora', 1, '12-08-2018', 1),
(70, 0, 39, 7, 'Inspector', 1, '12-08-2018', 1),
(71, 0, 39, 7, 'Inspectora', 1, '12-08-2018', 1),
(72, 0, 39, 7, 'Jefa(e)', 1, '12-08-2018', 1),
(73, 0, 40, 7, 'Jefa(e)', 1, '12-08-2018', 1),
(74, 0, 40, 7, 'Asistente', 1, '12-08-2018', 1),
(75, 0, 41, 7, 'Profesor', 1, '12-08-2018', 1),
(77, 0, 41, 7, 'Profesora', 1, '12-08-2018', 1),
(78, 0, 42, 8, 'Rector', 1, '12-08-2018', 1),
(79, 0, 42, 8, 'Secretaria(o)', 1, '12-08-2018', 1),
(80, 0, 42, 8, 'Rectora', 1, '12-08-2018', 1),
(81, 0, 43, 8, 'Inspector', 1, '12-08-2018', 1),
(82, 0, 43, 8, 'Inspectora', 1, '12-08-2018', 1),
(83, 0, 43, 8, 'Jefa(e)', 1, '12-08-2018', 1),
(84, 0, 44, 8, 'Jefa(e)', 1, '12-08-2018', 1),
(85, 0, 44, 8, 'Asistente', 1, '12-08-2018', 1),
(86, 0, 45, 8, 'Profesor', 1, '12-08-2018', 1),
(87, 0, 45, 8, 'Profesora', 1, '12-08-2018', 1),
(88, 0, 5, 1, 'Odontóloga(o)', 1, '12-08-2018', 1),
(89, 0, 2, 1, 'Asistente Financiero', 1, '12-08-2018', 1),
(90, 0, 2, 1, 'Secretaria(o)', 1, '12-08-2018', 1),
(91, 0, 17, 1, 'Educador', 1, '12-08-2018', 1),
(92, 0, 3, 1, 'Jefa(e)', 1, '12-08-2018', 1),
(93, 0, 3, 1, 'Asistente', 1, '12-08-2018', 1),
(94, 0, 4, 1, 'Asistente', 1, '12-08-2018', 1),
(95, 0, 5, 1, 'Asistente', 1, '12-08-2018', 1),
(96, 0, 6, 1, 'Jefa(e)', 1, '12-08-2018', 1),
(97, 0, 6, 1, 'Asistente', 1, '12-08-2018', 1),
(98, 0, 7, 1, 'Ginecóloga(o)', 1, '12-08-2018', 1),
(99, 0, 7, 1, 'Asistente', 1, '12-08-2018', 1),
(100, 0, 9, 1, 'Presidenta(e)', 1, '12-08-2018', 1),
(101, 0, 9, 1, 'Director Ejecutivo', 1, '12-08-2018', 1),
(102, 0, 9, 1, 'Staff', 1, '12-08-2018', 1),
(103, 0, 9, 1, 'Secretaria(o)', 1, '12-08-2018', 1),
(104, 0, 9, 1, 'Asistente', 1, '12-08-2018', 1),
(105, 0, 10, 1, 'Jefa(e)', 1, '12-08-2018', 1),
(106, 0, 10, 1, 'Asistente', 1, '12-08-2018', 1),
(107, 0, 11, 1, 'Educadora', 1, '12-08-2018', 1),
(108, 0, 11, 1, 'Educador', 1, '12-08-2018', 1),
(109, 0, 11, 1, 'Psicóloga(o)', 1, '12-08-2018', 1),
(110, 0, 12, 1, 'Educadora', 1, '12-08-2018', 1),
(111, 0, 12, 1, 'Psicóloga(o)', 1, '12-08-2018', 1),
(112, 0, 12, 1, 'Educador', 1, '12-08-2018', 1),
(113, 0, 13, 1, 'Asistente', 1, '12-08-2018', 1),
(114, 0, 14, 1, 'Jefa(e)', 1, '12-08-2018', 1),
(115, 0, 14, 1, 'Psicóloga(o)', 1, '12-08-2018', 1),
(116, 0, 14, 1, 'Asistente', 1, '12-08-2018', 1),
(117, 0, 16, 1, 'Jefa(e)', 1, '12-08-2018', 1),
(118, 0, 16, 1, 'Asistente', 1, '12-08-2018', 1),
(119, 0, 17, 1, 'Educadora', 1, '12-08-2018', 1),
(120, 0, 17, 1, 'Profesor', 1, '12-08-2018', 1),
(121, 0, 17, 1, 'Profesora', 1, '12-08-2018', 1),
(122, 0, 15, 1, 'Abogada(o)', 1, '15-08-2018', 1),
(123, 0, 11, 1, 'Psicóloga(o)', 1, '15-08-2018', 1),
(124, 0, 12, 1, 'Psicóloga(o)', 1, '15-08-2018', 1),
(125, 0, 11, 1, 'Trabajadora Social', 1, '15-08-2018', 1),
(126, 0, 12, 1, 'Trabajadora Social', 1, '15-08-2018', 1),
(127, 0, 46, 1, 'Facilitadora Comunitaria', 1, '15-08-2018', 1),
(128, 0, 8, 1, 'Conserje', 1, '15-08-2018', 1),
(129, 0, 8, 1, 'Auxiliar de Servicios', 1, '15-08-2018', 1),
(130, 0, 17, 1, 'Ayudante Kinder', 1, '15-08-2018', 1),
(131, 0, 21, 2, 'Ayudante Kinder', 1, '15-08-2018', 1),
(132, 0, 25, 3, 'Ayudante Kinder', 1, '15-08-2018', 1),
(133, 0, 29, 4, 'Ayudante Kinder', 1, '15-08-2018', 1),
(134, 0, 33, 5, 'Ayudante Kinder', 1, '15-08-2018', 1),
(135, 0, 37, 6, 'Ayudante Kinder', 1, '15-08-2018', 1),
(136, 0, 41, 7, 'Ayudante Kinder', 1, '15-08-2018', 1),
(137, 0, 45, 8, 'Ayudante Kinder', 1, '15-08-2018', 1),
(138, 0, 18, 2, 'Conserje', 1, '15-08-2018', 1),
(139, 0, 22, 3, 'Conserje', 1, '15-08-2018', 1),
(140, 0, 26, 4, 'Conserje', 1, '15-08-2018', 1),
(141, 0, 30, 5, 'Conserje', 1, '15-08-2018', 1),
(142, 0, 34, 6, 'Conserje', 1, '15-08-2018', 1),
(143, 0, 38, 7, 'Conserje', 1, '15-08-2018', 1),
(144, 0, 42, 8, 'Conserje', 1, '15-08-2018', 1),
(145, 0, 8, 1, 'Servicios Varios', 1, '15-08-2018', 1),
(146, 0, 18, 2, 'Servicios Varios', 1, '15-08-2018', 1),
(147, 0, 22, 3, 'Servicios Varios', 1, '15-08-2018', 1),
(148, 0, 26, 4, 'Servicios Varios', 1, '15-08-2018', 1),
(149, 0, 30, 5, 'Servicios Varios', 1, '15-08-2018', 1),
(150, 0, 34, 6, 'Servicios Varios', 1, '15-08-2018', 1),
(151, 0, 38, 7, 'Servicios Varios', 1, '15-08-2018', 1),
(152, 0, 42, 8, 'Servicios Varios', 1, '15-08-2018', 1),
(153, 0, 2, 1, 'Contadora', 1, '15-08-2018', 1),
(154, 0, 2, 1, 'Contador', 1, '15-08-2018', 1),
(155, 0, 6, 1, 'Doctor', 1, '15-08-2018', 1),
(156, 0, 6, 1, 'Doctora', 1, '15-08-2018', 1),
(157, 0, 47, 1, 'Jefa(e)', 1, '15-08-2018', 1),
(158, 0, 47, 1, 'Ayudante', 1, '15-08-2018', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_document_type`
--

CREATE TABLE `xin_document_type` (
  `document_type_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_document_type`
--

INSERT INTO `xin_document_type` (`document_type_id`, `company_id`, `document_type`, `created_at`) VALUES
(1, 1, 'Licencia Conducir', '09-05-2018 12:34:55'),
(2, 1, 'Cédula de Identidad', '12-08-2018 02:03:39'),
(3, 1, 'Cédula de Extranjero', '12-08-2018 02:04:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_email_template`
--

CREATE TABLE `xin_email_template` (
  `template_id` int(111) NOT NULL,
  `template_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_email_template`
--

INSERT INTO `xin_email_template` (`template_id`, `template_code`, `name`, `subject`, `message`, `status`) VALUES
(2, 'code1', 'Olvido de Clave', 'Olvido de Clave', '&lt;p&gt;Hemos recibido una solicitud de cambio de clave desde la cuenta  {var site_name} .&lt;/p&gt;&lt;p&gt;Por favor, anote esta clave para evitar olvidarla.&lt;/p&gt;&lt;p&gt;Su Usuario: {var username}&lt;br&gt;Su email: {var email}&lt;br&gt;Su Clave: {var password}&lt;/p&gt;&lt;p&gt;Gracias,&lt;br&gt;del equipo de {var site_name} &lt;br&gt;&lt;/p&gt;', 1),
(3, 'code2', 'Nuevo proyecto', 'Nuevo proyecto', '&lt;p&gt;Estimado {nombre var},&lt;/p&gt;&lt;p&gt;Se le ha asignado un nuevo proyecto.&lt;/p&gt;&lt;p&gt;Nombre del proyecto: {var project_name}&lt;/p&gt;&lt;p&gt;Fecha de inicio del proyecto: {var project_start_date}&lt;/p&gt;&lt;p&gt;Gracias,&lt;/p&gt;&lt;p&gt;El equipo {var site_name}&lt;/p&gt;', 1),
(5, 'code3', 'Dejar petición', 'Una solicitud de licencia de usted', '&lt;p&gt;Estimado administrador,&lt;/p&gt;&lt;p&gt;{var employee_name} quiere un permiso tuyo.&lt;/p&gt;&lt;p&gt;Puede ver esta solicitud de licencia iniciando sesión en el portal utilizando el siguiente enlace.&lt;/p&gt;&lt;p&gt;{var site_url} admin /&lt;/p&gt;&lt;p&gt;Saludos&lt;/p&gt;&lt;p&gt;El equipo {var site_name}&lt;/p&gt;', 1),
(6, 'code4', 'Dejar aprobar', 'Su solicitud de licencia ha sido aprobada', '&lt;p&gt;Su solicitud de licencia ha sido aprobada&lt;/p&gt;&lt;p&gt;¡Felicidades! Su solicitud de licencia de {var leave_start_date} a {var leave_end_date} ha sido aprobada por la administración de su empresa.&lt;/p&gt;&lt;p&gt;Chequea aquí&lt;/p&gt;&lt;p&gt;{var site_url} hr / user / leave /&lt;/p&gt;&lt;p&gt;Saludos&lt;/p&gt;&lt;p&gt;El equipo {var site_name}&lt;/p&gt;', 1),
(7, 'code5', 'Dejar rechazar', 'Su solicitud de licencia ha sido rechazada', '&lt;p&gt;Su solicitud de licencia ha sido rechazada&lt;/p&gt;&lt;p&gt;Desafortunadamente ! Su solicitud de licencia de {var leave_start_date} a {var leave_end_date} ha sido rechazada por la administración de su empresa.&lt;/p&gt;&lt;p&gt;Chequea aquí&lt;/p&gt;&lt;p&gt;{var site_url} hr / user / leave /&lt;/p&gt;&lt;p&gt;Saludos&lt;/p&gt;&lt;p&gt;El equipo {var site_name}&lt;/p&gt;', 1),
(8, 'code6', 'Correo electrónico de bienvenida', 'Correo electrónico de bienvenida', '&lt;p&gt;Hola {var employee_name},&lt;/p&gt;&lt;p&gt;Bienvenido a {var site_name}. Gracias por unirse a {var site_name}. Enumeramos los detalles de su inicio de sesión a continuación, asegúrese de mantenerlos seguros.&lt;/p&gt;&lt;p&gt;Su nombre de usuario: {var username}&lt;/p&gt;&lt;p&gt;Su ID de empleado: {var employee_id}&lt;/p&gt;&lt;p&gt;Su dirección de correo electrónico: {var email}&lt;/p&gt;&lt;p&gt;Su contraseña: {var contraseña}&lt;/p&gt;&lt;p&gt;Panel de inicio de sesión&lt;/p&gt;&lt;p&gt;¿El enlace no funciona? Copie el siguiente enlace a la barra de direcciones de su navegador:&lt;/p&gt;&lt;p&gt;{var site_url} / hr /&lt;/p&gt;&lt;p&gt;¡Que te diviertas!&lt;/p&gt;&lt;p&gt;El equipo {var site_name}.&lt;/p&gt;', 1),
(9, 'code7', 'Transferir', 'Nueva transferencia', '&lt;p&gt;Hola {var employee_name},&lt;/p&gt;&lt;p&gt;Ha sido transferido a otro departamento y ubicación.&lt;/p&gt;&lt;p&gt;Puede ver los detalles de la transferencia iniciando sesión en el portal utilizando el siguiente enlace.&lt;/p&gt;&lt;p&gt;{var site_url} hr / user / transfer /&lt;/p&gt;&lt;p&gt;Saludos&lt;/p&gt;&lt;p&gt;El equipo {var site_name}&lt;/p&gt;', 1),
(10, 'code8', 'Premio', 'Premio recibido', '&lt;p&gt;Hola {var employee_name},&lt;/p&gt;&lt;p&gt;Le han otorgado {var award_name}.&lt;/p&gt;&lt;p&gt;Puede ver este premio iniciando sesión en el portal utilizando el siguiente enlace.&lt;/p&gt;&lt;p&gt;{var site_url} hr / user / awards /&lt;/p&gt;&lt;p&gt;Saludos&lt;/p&gt;&lt;p&gt;El equipo {var site_name}&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1),
(14, 'code9', 'Nueva tarea', 'Tarea asignada', '&lt;p&gt;Estimado empleado,&lt;/p&gt;&lt;p&gt;{Var task_assigned_by} le ha asignado una nueva tarea {var task_name}.&lt;/p&gt;&lt;p&gt;Puede ver esta tarea iniciando sesión en el portal utilizando el siguiente enlace.&lt;/p&gt;&lt;p&gt;{var site_url} hr / usuario / tareas /&lt;/p&gt;&lt;p&gt;¿El enlace no funciona? Copie el siguiente enlace a la barra de direcciones de su navegador:&lt;/p&gt;&lt;p&gt;{var site_url}&lt;/p&gt;&lt;p&gt;Saludos,&lt;/p&gt;&lt;p&gt;El equipo {var site_name}&lt;/p&gt;', 1),
(15, 'code10', 'Nueva investigación', 'Nueva consulta [# {var ticket_code}]', '&lt;p xss=\\&quot;removed\\&quot; rgb(51,=\\&quot;\\\\\\&quot; font-family:=\\&quot;\\\\\\&quot; sans-serif,=\\&quot;\\\\\\&quot; arial,=\\&quot;\\\\\\&quot; verdana,=\\&quot;\\\\\\&quot; trebuchet=\\&quot;\\\\\\\\\\&quot;&gt;Estimado administrador,&lt;/p&gt;&lt;p xss=\\&quot;removed\\&quot; rgb(51,=\\&quot;\\\\\\&quot; font-family:=\\&quot;\\\\\\&quot; sans-serif,=\\&quot;\\\\\\&quot; arial,=\\&quot;\\\\\\&quot; verdana,=\\&quot;\\\\\\&quot; trebuchet=\\&quot;\\\\\\\\\\&quot;&gt;Has recibido una nueva consulta.&lt;/p&gt;&lt;p xss=\\&quot;removed\\&quot; rgb(51,=\\&quot;\\\\\\&quot; font-family:=\\&quot;\\\\\\&quot; sans-serif,=\\&quot;\\\\\\&quot; arial,=\\&quot;\\\\\\&quot; verdana,=\\&quot;\\\\\\&quot; trebuchet=\\&quot;\\\\\\\\\\&quot;&gt;Código de consulta: # {var ticket_code}&lt;/p&gt;&lt;p xss=\\&quot;removed\\&quot; rgb(51,=\\&quot;\\\\\\&quot; font-family:=\\&quot;\\\\\\&quot; sans-serif,=\\&quot;\\\\\\&quot; arial,=\\&quot;\\\\\\&quot; verdana,=\\&quot;\\\\\\&quot; trebuchet=\\&quot;\\\\\\\\\\&quot;&gt;Estado: abierto&lt;/p&gt;&lt;p xss=\\&quot;removed\\&quot; rgb(51,=\\&quot;\\\\\\&quot; font-family:=\\&quot;\\\\\\&quot; sans-serif,=\\&quot;\\\\\\&quot; arial,=\\&quot;\\\\\\&quot; verdana,=\\&quot;\\\\\\&quot; trebuchet=\\&quot;\\\\\\\\\\&quot;&gt;Haga clic en el siguiente enlace para ver los detalles de la consulta y publicar comentarios adicionales.&lt;/p&gt;&lt;p xss=\\&quot;removed\\&quot; rgb(51,=\\&quot;\\\\\\&quot; font-family:=\\&quot;\\\\\\&quot; sans-serif,=\\&quot;\\\\\\&quot; arial,=\\&quot;\\\\\\&quot; verdana,=\\&quot;\\\\\\&quot; trebuchet=\\&quot;\\\\\\\\\\&quot;&gt;{var site_url} admin / tickets /&lt;/p&gt;&lt;p xss=\\&quot;removed\\&quot; rgb(51,=\\&quot;\\\\\\&quot; font-family:=\\&quot;\\\\\\&quot; sans-serif,=\\&quot;\\\\\\&quot; arial,=\\&quot;\\\\\\&quot; verdana,=\\&quot;\\\\\\&quot; trebuchet=\\&quot;\\\\\\\\\\&quot;&gt;Saludos&lt;/p&gt;&lt;p xss=\\&quot;removed\\&quot; rgb(51,=\\&quot;\\\\\\&quot; font-family:=\\&quot;\\\\\\&quot; sans-serif,=\\&quot;\\\\\\&quot; arial,=\\&quot;\\\\\\&quot; verdana,=\\&quot;\\\\\\&quot; trebuchet=\\&quot;\\\\\\\\\\&quot;&gt;El equipo {var site_name}&lt;/p&gt;', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employees`
--

CREATE TABLE `xin_employees` (
  `user_id` int(11) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `office_shift_id` int(111) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `clave` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_of_birth` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `e_status` int(11) NOT NULL,
  `user_role_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `designation_id` int(100) NOT NULL,
  `company_id` int(111) DEFAULT NULL,
  `salary_template` varchar(255) NOT NULL,
  `hourly_grade_id` int(111) NOT NULL,
  `monthly_grade_id` int(111) NOT NULL,
  `date_of_joining` varchar(200) NOT NULL,
  `date_of_leaving` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `profile_picture` text NOT NULL,
  `profile_background` text NOT NULL,
  `resume` text NOT NULL,
  `skype_id` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `facebook_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `blogger_link` text NOT NULL,
  `linkdedin_link` text NOT NULL,
  `google_plus_link` text NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `pinterest_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `last_login_date` varchar(255) NOT NULL,
  `last_logout_date` varchar(255) NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `is_logged_in` int(111) NOT NULL,
  `online_status` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employees`
--

INSERT INTO `xin_employees` (`user_id`, `employee_id`, `office_shift_id`, `first_name`, `last_name`, `username`, `email`, `password`, `clave`, `date_of_birth`, `gender`, `e_status`, `user_role_id`, `department_id`, `designation_id`, `company_id`, `salary_template`, `hourly_grade_id`, `monthly_grade_id`, `date_of_joining`, `date_of_leaving`, `marital_status`, `salary`, `address`, `profile_picture`, `profile_background`, `resume`, `skype_id`, `contact_no`, `facebook_link`, `twitter_link`, `blogger_link`, `linkdedin_link`, `google_plus_link`, `instagram_link`, `pinterest_link`, `youtube_link`, `is_active`, `last_login_date`, `last_logout_date`, `last_login_ip`, `is_logged_in`, `online_status`, `created_at`) VALUES
(1, '0913180030', 3, 'ANGEL ARMANDO', 'ASCENCIO ACUÑA', 'aascencio', 'a_asc_acu@hotmail.com', '$2y$12$Ac1oIWt854vFfGMoQf1Cgensz/FsE1GIqFhTESB/55H3YXy2ifMTy', 'kairos2018*', '1983-12-21', 'Male', 0, 1, 1, 15, 1, 'monthly', 0, 17, '2018-02-01', '', 'Single', '', 'Cdla. Los Esteros 3 MZ 52A Villa 2', 'profile_1538269493.png', 'profile_background_1537041384.png', '', '', '0968753103', '', '', '', '', '', '', '', '', 1, '11-11-2019 22:31:34', '02-10-2019 23:22:45', '181.199.39.149', 1, 1, '2018-02-28 05:30:44'),
(6, '0925574584', 3, 'ISRAEL YAMIL', 'CARRASCO RENDON', 'icarrasco', 'carrascorendoni@gmail.com', '$2y$12$9NCKpOCdZYLCrwKokKPIJeCUYNwpLvUeL33PbgSXQE3A3Fl7EdBT2', 'icarrasco', '2019-02-28', 'Male', 0, 1, 1, 16, 1, 'monthly', 0, 17, '2018-07-17', '', 'Single', '', 'La novena 101 y diez de agosto', 'Foto0033.jpg', '', '', '', '0994942494', 'https://www.facebook.com/', '', '', '', '', '', '', '', 1, '12-11-2019 02:29:32', '12-11-2019 14:57:36', '190.111.82.146', 0, 0, '2018-07-17 08:20:09'),
(11, '0952110203', 2, 'KUMAR', 'MAHISH JOGENDRA', 'kmahish', 'new.colo.angel24@gmail.com', '$2y$12$7DzOt1UE2JA9PHMz3p/sz.ZlQCYPpUlmPYCOc5ONqxPlwDL80oc9u', 'clave123', '1983-08-01', 'Male', 0, 3, 9, 101, 1, 'monthly', 0, 4, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', 'profile_1534217870.jpg', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '31-08-2019 19:54:17', '01-09-2019 09:41:07', '190.154.28.110', 0, 0, '2018-08-12 06:08:30'),
(12, '0918121625', 3, 'JOHANA MONSERRATE', 'ARTEAGA RIZZO', 'jarteaga', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 8, 13, 1, 'monthly', 0, 7, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', 'profile_background_1538288484.jpeg', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 08:51:34', '23-10-2018 20:52:27', '181.175.59.167', 0, 0, '2018-08-12 06:18:23'),
(13, '0919204073', 3, 'SUSANA ELIZABETH', 'ABARCA THZACAN', 'sabarca', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 3, 2, 10, 1, 'monthly', 0, 8, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', 'FB_IMG_1567148102571.jpg', '', '', '', '0912345673', '', '', '', '', '', '', '', '', 1, '26-10-2018 15:41:46', '27-10-2018 04:32:54', '181.196.247.26', 0, 0, '2018-08-12 06:28:20'),
(14, '0912505138', 2, 'MARTITA MARIA', 'HARO PACHA', 'mharo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 34, 59, 6, 'monthly', 0, 17, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '29-08-2019 12:37:46', '30-08-2019 01:43:04', '190.154.28.110', 0, 0, '2018-08-12 06:30:54'),
(15, '0916197064', 2, 'MIRNA AURORA', 'MORAN PILOZO', 'mmoran', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 38, 69, 7, 'monthly', 0, 16, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:09:59', '23-10-2018 22:10:03', '181.175.59.167', 0, 0, '2018-08-12 06:34:04'),
(16, '0801574666', 2, 'VICELA', 'BRANDA HURTADO', 'vbranda', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 26, 39, 4, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:10:20', '23-10-2018 22:10:30', '181.175.59.167', 0, 0, '2018-08-12 06:38:08'),
(17, '0915410492', 5, 'MARIA ELENA', 'TACURI SAQUISELA', 'mtacuri', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 18, 17, 2, 'monthly', 0, 32, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', 'IMG-20190830-WA0131.jpg', 'profile_background_1567402567.jpg', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '12-11-2019 11:14:33', '12-11-2019 23:18:22', '190.111.82.146', 0, 0, '2018-08-12 06:41:21'),
(18, '1000659183', 2, 'MAURA HIPATIA', 'CASTRO VALENZUELA', 'mcastro', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 42, 80, 8, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:11:58', '23-10-2018 22:12:09', '181.175.59.167', 0, 0, '2018-08-12 06:47:00'),
(19, '0913119251', 2, 'NORY ILEANA', 'LINDAO ESPINOZA', 'nlindao', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 30, 49, 5, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:12:21', '23-10-2018 22:12:38', '181.175.59.167', 0, 0, '2018-08-12 06:49:21'),
(20, '0910445386', 1, 'PATRICIA ALEXANDRA', 'MACIAS FAJARDO ', 'pmacias', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 21, 25, 2, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '28-08-2019 21:17:50', '29-08-2019 09:24:23', '190.154.28.110', 0, 0, '2018-08-12 02:45:50'),
(21, '0911794980', 1, 'JUANA PIEDAD', 'RIVERA MOSQUERA', 'jrivera', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 21, 25, 2, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:14:38', '23-10-2018 22:15:29', '181.175.59.167', 0, 0, '2018-08-12 02:45:50'),
(22, '0914420344', 1, 'JESSICA IVON ', 'MACIAS TORRES', 'jmaciast', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 21, 25, 2, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:16:59', '23-10-2018 22:17:26', '181.175.59.167', 0, 0, '2018-08-12 02:45:50'),
(23, '0927860296', 1, 'KARINA ESTEFANIA', 'URQUIZA PERLAZA', 'kurquiza', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-10-01', 'Female', 0, 2, 21, 25, 2, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:19:57', '23-10-2018 22:20:02', '181.175.59.167', 0, 0, '2018-08-12 02:45:50'),
(24, '0917818742', 1, 'JORGE CHRISTIAN', 'CORDOVA DE LA VERA', 'jcordova', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Male', 0, 2, 21, 25, 2, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:20:41', '23-10-2018 22:20:44', '181.175.59.167', 0, 0, '2018-08-12 02:45:50'),
(25, '0906081286', 1, 'LENIN BOLIVAR', 'POTES DUQUE', 'lpotes', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-10-01', 'Male', 0, 2, 21, 25, 2, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:22:21', '23-10-2018 22:22:26', '181.175.59.167', 0, 0, '2018-08-12 02:45:50'),
(26, '0917458507', 1, 'MONICA KARINA', 'CHAVEZ PULLA', 'mchavez', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-10-01', 'Female', 0, 2, 21, 25, 2, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 02:45:50'),
(27, '0921488276', 1, 'PAOLA JAZMIN', 'MARTILLO MOREIRA', 'pmartillo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 21, 25, 2, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:33:47', '23-10-2018 22:33:52', '181.175.59.167', 0, 0, '2018-08-12 03:03:34'),
(28, '0920145141', 1, 'MARIA MONICA', 'ALARCON RODRIGUEZ', 'malarcon', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:35:29', '23-10-2018 22:35:32', '181.175.59.167', 0, 0, '2018-08-12 03:50:55'),
(29, '0912405859', 1, 'ANDREA ELIZABETH', 'VASCONEZ VASCONEZ', 'avascomez', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 10:50:38', '23-10-2018 22:50:41', '181.175.59.167', 0, 0, '2018-08-12 03:50:55'),
(30, '0920821543', 1, 'ERIKA LEONELA', 'OSORIO CASTILLO', 'eosorio', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(31, '0917586240', 1, 'MARIA GARDENIA ', 'RENDON VELIZ', 'mrendon', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, 'monthly', 0, 9, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 11:03:37', '23-10-2018 23:04:51', '181.175.59.167', 0, 0, '2018-08-12 03:50:55'),
(32, '1712723954', 1, 'LUIS EDUARDO', 'MANTILLA OLMEDO', 'lmantilla', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Male', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 11:05:17', '23-10-2018 23:05:24', '181.175.59.167', 0, 0, '2018-08-12 03:50:55'),
(34, '0919757214', 1, 'LEONARDO LICARIO', 'MERO SALAZAR', 'lmero', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Male', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(35, '0923323349', 1, 'SUSANA RAQUEL ', 'COROZO ARROYO', 'scorozo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(36, '0922144357', 1, 'VICTOR VICENTE', 'CELLERI ZAPATA', 'vcelleri', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Male', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(37, '0919318782', 1, 'SILVANA PATRICIA', 'ALVARADO SANTOS', 'salvarado', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(38, '0910406008', 1, 'ZAIDA YOLANDA', 'VILLAMAR PLUAS', 'zvillamar', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '28-08-2019 21:24:57', '29-08-2019 09:35:53', '190.154.28.110', 0, 0, '2018-08-12 03:50:55'),
(40, '0904877214', 1, 'ROSARIO DEL PILAR', 'LOMAS MUÑOZ', 'rlomas', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(41, '1201152400', 1, 'MERCY NICOLAZA ', 'BARROS MORANTE', 'mbarros', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(42, '0927337857', 1, 'EVELYN LUCIA', 'FLORES BARRAGAN', 'eflores', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(43, '0914653100', 1, 'JULIA ANGELINE', 'CHEME AVILA', 'jcheme', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 25, 36, 3, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(44, '0931598296', 1, 'JOSE GABRIEL', 'PERALTA PIÑA', 'jperalta', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 25, 36, 3, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 03:50:55'),
(45, '0920145141', 1, 'ENMA MARIANELA', 'LUCIO PONCE', 'elucio', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 37, 66, 6, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:03:38'),
(46, '0912405859', 1, 'MARIELA DEL PILAR', 'BANCHON ZAMBRANO', 'mbanchon', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 37, 66, 6, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:03:38'),
(47, '0920821543', 1, 'CARMEN ISABEL ', 'TAPIA RIVAS', 'ctapia', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 37, 66, 6, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 11:09:58', '23-10-2018 23:10:03', '181.175.59.167', 0, 0, '2018-08-12 04:03:38'),
(48, '0917586240', 1, 'JANETH JACQUELINE', 'CAICEDO AYOVI', 'jcaicedo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 37, 66, 6, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:03:38'),
(49, '1712723954', 1, 'JUAN CARLOS', 'HERRERA VACA', 'jherrera', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Male', 0, 2, 37, 66, 6, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:03:38'),
(50, '0922213335', 1, 'JAZMIN ALEXANDRA', 'LANDA SANCHEZ', 'jlanda', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 37, 66, 6, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:03:38'),
(51, '0919757214', 1, 'MARTHA LORENA', 'DELGADO ANCHUNDIA', 'mdelgado', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 37, 66, 6, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:03:38'),
(52, '0923323349', 1, 'ISABEL MARIA', 'LARREA SERVONET', 'ilarrea', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 37, 66, 6, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:03:38'),
(53, '0917476406', 1, 'VIRGINIA VICTORIA', 'MONTENEGRO RIVADENEIRA', 'vmontenegro', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 33, 56, 5, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:14:36'),
(54, '0917567570', 1, 'ARACELI MARIBEL', 'TOMALA TOMALA', 'atomala', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 33, 56, 5, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:14:36'),
(55, '0914893326', 1, 'MONICA VICENTA', 'GAIBOR LUQUE', 'mgaibor', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 33, 56, 5, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:14:36'),
(56, '0920960143', 1, 'ANDREA PAMELA', 'ALBAN BARCO', 'aalban', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 33, 56, 5, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:14:36'),
(57, '0924218944', 1, 'ERWIN FERNANDO ', 'ITURRALDE ARELLANO', 'eiturralde', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Male', 0, 2, 33, 56, 5, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:14:36'),
(58, '0922065719', 1, 'JESSICA YESENIA', 'MEREJILDO YAGUAL', 'jmerejildo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 33, 56, 5, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:14:36'),
(59, '0914821335', 1, 'YESENIA JANET', 'NAZARENO QUIÑONEZ', 'ynazareno', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 33, 56, 5, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 04:14:36'),
(60, '0924845878', 2, 'ERICKA RAFAELA', 'HERNANDEZ CLEMENTE', 'ehernandez', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 33, 56, 5, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 09:49:04'),
(61, '0923838049', 1, 'KARLA ALEJANDRA', 'SANCHEZ RAMOS', 'ksanchez', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 21, 25, 4, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:00:00'),
(62, '0916626708', 1, 'PEGGY VANESSA', 'TUMBACO ALAVA', 'ptumbaco', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 21, 25, 4, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:00:00'),
(63, '0922823737', 1, 'JESSICA MARITZA', 'SUAREZ ESPINALES', 'jsuarez', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 21, 25, 4, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:00:00'),
(64, '0926444050', 1, 'JOSE MARIA', 'VILLON LINDAO', 'jvillon', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Male', 0, 2, 21, 25, 4, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:00:00'),
(65, '1308655370', 1, 'JESSICA KARINA ', 'SANCAN SUAREZ', 'jsancan', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 21, 25, 4, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:00:00'),
(66, '0920327798', 1, 'MARIA ELENA', 'MENDOZA BARBERAN', 'mmendoza', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 21, 25, 4, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:00:00'),
(67, '0915405922', 1, 'JULISSA MERCEDES', 'CALI ARGANDOÑA', 'jcali', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 21, 25, 4, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:00:00'),
(68, '0920292513', 2, 'MARTHA CECILIA', 'CHALEN CRUZ', 'mchalen', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 29, 46, 4, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 10:06:37'),
(69, '0923838049', 1, 'DAYANNA JULISSA', 'CONSTANTE CALI', 'dconstante', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 41, 77, 7, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:17:38'),
(70, '0916626708', 1, 'KEILYN MICHELLE', 'POLANCO PAZMIÑO', 'kpolanco', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 41, 77, 7, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:17:38'),
(71, '0922823737', 1, 'JENNIFER ABIGAIL', 'RENTERIA COROZO', 'jrenteria', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 41, 77, 7, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:17:38'),
(72, '0926444050', 1, 'LIZBETH MADELEINE', 'ARREAGA CAJAS', 'larreaga', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Male', 0, 2, 41, 77, 7, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:17:38'),
(73, '1308655370', 1, 'MARICELA MARIUXI', 'MURILLO BARROS', 'mmurillo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 41, 77, 7, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:17:38'),
(74, '0924761935', 1, 'BETZABETH NOEMI', 'VARGAS PROAÑO', 'bvargas', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(75, '0920653912', 1, 'MARIA DEL PILAR', 'CEDEÑO GUERRERO', 'mcedeno', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(76, '1203954936', 1, 'ELSA AZUCENA', 'VARGAS MANZABA', 'evargas', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(77, '0921286282', 1, 'ESTHER FRANCISCA', 'SANTIBAÑEZ MITE', 'esantibanez', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(78, '0917335028', 1, 'PATRICIA ALEXANDRA', 'CALIXTO URETA', 'ecalixto', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(79, '0913472007', 1, 'GLORIA DEL CARMEN ', 'ALFARO PEREZ', 'galfaro', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(80, '0911062719', 1, 'REINA ISABEL ', 'RUGEL SANCHEZ', 'rrugel', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(81, '0915707442', 1, 'ANA DEL ROCIO', 'MERA SANCHEZ', 'amera', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(82, '0940432511', 1, 'DIEGO JUAN', 'VACA MONCADA', 'dvaca', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Male', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(83, '0913423000', 1, 'GRACIELA MERCEDES', 'ROSALES VILLAMAR', 'grosales', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(84, '0951666098', 1, 'VERONICA JESSICA', 'YANTALEMA CAIN', 'vyantalema', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(85, '0909648768', 1, 'ACELY BIRMANIA', 'SOLANO RODRIGUEZ', 'asolano', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(86, '0915604797', 1, 'ELSA MARIA', 'TOMALA LEAL', 'etomala', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(87, '0940279771', 1, 'MARTHA VERONICA', 'NINA VACACELA', 'mnina', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1/8/1983', 'Female', 0, 2, 45, 87, 8, '', 0, 0, '1/2/2018', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-12 05:27:43'),
(88, '0909437899', 1, 'GILBERTO AURELIO', 'PINO HERRERA', 'gpino', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 11, 108, 1, 'monthly', 0, 11, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(89, '0908232432', 1, 'NELLY FELICITA', 'VERA VERA', 'nvera', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, 'monthly', 0, 17, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(90, '1314724293', 1, 'LADY FERNANDA', 'CEDEÑO FARFAN', 'lcedeno', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(91, '0931405682', 1, 'BRIGITH CAROLINA', 'GUARACA AYNAGUANO', 'bguaraca', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(92, '0700964638', 1, 'GLADYS MARIA DEL PILAR', 'CABRERA MEJIA', 'gcabrera', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, 'monthly', 0, 12, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(93, '0931358238', 1, 'ARIANA MEILIN', 'AU HING CUJILAN', 'aau', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(94, '1203625163', 1, 'ALEXANDRA ELIZABETH', 'CEVALLOS PUGA', 'acevallos', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(95, '0921994471', 1, 'GENESIS MARIUXI', 'RIVERA QUIMIS', 'grivera', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(96, '0703546861', 1, 'BRENDA MERCEDES', 'OCHOA GOMEZ', 'bochoa', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(97, '1206224402', 1, 'ANDREINA NATHALY', 'CHICAIZA HURTADO', 'achicaiza', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(98, '0925547044', 1, 'SANDRA ADRIANA', 'LEON ARAUJO', 'sleon', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(99, '0916889934', 1, 'MONICA ELENA', 'GARCIA ZAPATA', 'mgarcia', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(100, '0910077759', 1, 'FANNY VLADYS', 'LLERENA PINCAY', 'fllerena', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(101, '1202497754', 1, 'KONY HUMBERTINA', 'CHANG COELLO', 'kchang', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(102, '0924790983', 1, 'DIANA YADIRA', 'VERA BEDOR', 'dvera', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(103, '0940620784', 1, 'AMBAR MELISSA', 'UREÑA HURTADO', 'aurena', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 11:15:58', '23-10-2018 23:16:01', '181.175.59.167', 0, 0, '2018-08-15 01:31:12'),
(104, '1302342744', 1, 'MARIA CECILIA', 'PINCAY TOALA', 'mpincay', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(105, '1202943583', 1, 'ZORAYA', 'ALVARADO AGUILAR', 'zalvarado', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(106, '1202835474', 1, 'MARIA ELENA', 'SACON QUINATOA', 'msacon', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(107, '0955778295', 1, 'ANGIE KAROLAY', 'MOSQUERA FRANCO', 'amosquera', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(108, '0926531492', 1, 'JOSELYNE PAMELA', 'BASANTES FIGUEROA', 'jbasantes', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 20, 26, 2, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(109, '0951950286', 1, 'SOLANGE XIOMARA', 'ESPINOZA BALLADARES', 'sespinoza', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(110, '0929792349', 1, 'DIANA LISSETTE', 'CASTRO FAJARDO', 'dcastro', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(111, '0923187157', 1, 'JOSELYN DALYXA', 'CAJAPE VERA', 'jcajape', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 32, 54, 5, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(112, '0926534587', 1, 'KATHERINE MARISOL', 'CHOEZ MIRABA', 'kchoez', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 28, 44, 4, 'monthly', 0, 10, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 09:07:49', '23-10-2018 21:09:03', '181.175.59.167', 0, 0, '2018-08-15 01:31:12'),
(113, '0923415194', 1, 'JOSE ESTUARDO', 'CASTRO VERA', 'jcastro', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 11, 108, 1, 'monthly', 0, 9, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 09:06:21', '23-10-2018 21:06:24', '181.175.59.167', 0, 0, '2018-08-15 01:31:12'),
(114, '0921635132', 1, 'GENESIS JUDITH', 'CAICEDO VELEZ', 'gcaicedo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(115, '0915026322', 1, 'EDISON MARIO', 'ARREAGA PATIÑO', 'earreaga', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(116, '1720483740', 1, 'MARIA JOSE', 'CASTILLO MONTAÑO', 'mcastillo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(117, '0702763087', 1, 'HECTOR CARLIN', 'ARMIJOS ENCALADA', 'harmijos', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(118, '0941004657', 1, 'DAYANA JULISSA', 'CONSTANTE CALI', 'dconstante', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(119, '0926792441', 1, 'FERNANDO BRYAN', 'VITERI BAJAÑA', 'fviteri', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(120, '0954440244', 1, 'KEILYN MICHELLE', 'POLANCO PAZMIÑO', 'kpolanco', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(121, '0930869748', 1, 'LISBETH MADELEINE', 'ARREAGA CARPIO', 'larreaga', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(122, '0917393076', 1, 'CELIA JANETH', 'CASTELO TROYA', 'ccastelo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(123, '0941067001', 1, 'JENNIFER ABIGAIL', 'RENTERIA COROZO', 'jrenteria', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(124, '0916197064', 1, 'MIRNA AURORA', 'MORAN PILOZO', 'mmoran', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(125, '0911062719', 1, 'REYNA ISABEL', 'RUGEL SANCHEZ', 'rrugel', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(126, '0913472007', 1, 'GLORIA DEL CARMEN', 'ALFARO PEREZ', 'galfaro', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(127, '0921286282', 1, 'ESTHER FRANCISCA', 'SANTIBAÑEZ MITE', 'esantibanez', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(128, '1201189576', 1, 'PASCUALA MARIBEL', 'VEAS CEREZO', 'pveas', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12');
INSERT INTO `xin_employees` (`user_id`, `employee_id`, `office_shift_id`, `first_name`, `last_name`, `username`, `email`, `password`, `clave`, `date_of_birth`, `gender`, `e_status`, `user_role_id`, `department_id`, `designation_id`, `company_id`, `salary_template`, `hourly_grade_id`, `monthly_grade_id`, `date_of_joining`, `date_of_leaving`, `marital_status`, `salary`, `address`, `profile_picture`, `profile_background`, `resume`, `skype_id`, `contact_no`, `facebook_link`, `twitter_link`, `blogger_link`, `linkdedin_link`, `google_plus_link`, `instagram_link`, `pinterest_link`, `youtube_link`, `is_active`, `last_login_date`, `last_logout_date`, `last_login_ip`, `is_logged_in`, `online_status`, `created_at`) VALUES
(129, '0908916182', 1, 'CESAR IVAN', 'ASCENCIO CAMPOS', 'cascencio', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(130, '0940432511', 1, 'DIEGO JUAN', 'VACA MONCADA', 'dvaca', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(131, '1203734874', 1, 'ESTHER MARIA', 'CERVANTES CARPIO', 'ecervantes', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(132, '0911620326', 1, 'JOSEFINA MARGARITA', 'BERNARDINO RAMIREZ', 'jbernardino', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(133, '0940649163', 1, 'ROBERT STALIN', 'BAQUE GANCHOZO', 'rbaque', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(135, '0803721968', 1, 'MONICA LISBETH', 'MERA LOPEZ', 'mmera', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(136, '0907087027', 1, 'BELQUIS MARIA', 'ALARCON OVIEDO', 'balarcon', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(137, '0927352930', 1, 'STEFANIA EUGENIA', 'MEJIA GARCIA', 'smejia', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(138, '0954429429', 1, 'BRYAN ALEXANDER', 'BERMUDEZ CANTOS', 'bbermudez', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Male', 0, 2, 11, 108, 1, '', 0, 0, '2018-02-01', '', '', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2018-08-15 01:31:12'),
(139, '0927067108', 1, 'EMILY KAREN', 'RIZO RODRIGUEZ', 'erizo', 'info@fundacionkairos.org', '$2y$12$iy3TyjGPUJXi8HQCIL4Nh.eMQv/t0XkUeoUuspqZawCt3ezlM6tbu', 'clave123', '1983-08-01', 'Female', 0, 2, 5, 88, 1, 'monthly', 0, 13, '2018-02-01', '', 'Single', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', '', '', '', '', '0999067575', '', '', '', '', '', '', '', '', 1, '23-10-2018 11:48:51', '23-10-2018 23:52:00', '181.175.59.167', 0, 0, '2018-08-15 01:31:12'),
(141, '0901382374', 3, 'Mary', 'Rendon Limones', 'mrendon', 'maryrendonl@live.com', '$2y$12$XbiARVNfHsx4pTpf5tCMieq/9W/rgalKEVYfPJkFyAMxS2DxE3kNq', 'mrendon', '2018-06-01', 'Female', 0, 2, 2, 89, 1, 'monthly', 0, 18, '2019-01-18', '', '', '', 'la novena y diez de agosto', '', '', '', '', '042360687', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2019-01-18 03:48:45'),
(142, '0925574584', 3, 'Wilson', 'Molina', 'wmolina', 'wmolina@gmail.com', '$2y$12$RG5EFvTX4RPTNTd8dOjafuNSHe7DgcNTKoXDZxPMRmsfH9FPaEX8K', 'wmolina', '2017-01-04', 'Male', 0, 2, 16, 117, 1, '', 0, 0, '2019-05-13', '', '', '', 'El Oro y Tungurahua', '', '', '', '', '0956874521', '', '', '', '', '', '', '', '', 1, '13-05-2019 13:39:54', '14-05-2019 01:46:09', '181.198.35.119', 0, 0, '2019-05-13 05:33:59'),
(144, '0915454862', 3, 'Elke', 'Jerovi Ricaurte', 'ejerovi', 'ejerovi@gmail.com', '$2y$12$WjSHhAQdtlaRhkVZzmfizua5Rb3Z/7Y9MC6cY.NPfvkxlCalU3gpW', 'ejerovi', '2015-12-09', 'Female', 0, 2, 1, 15, 1, 'monthly', 0, 31, '2019-05-13', '', '', '', 'de julio y la que cruza', '', '', '', '', '0956456789', '', '', '', '', '', '', '', '', 1, '', '', '', 0, 0, '2019-05-13 07:00:55'),
(145, '0925574584', 1, 'Laura', 'Carrasco', 'laurac', 'dsdsds@ddsdsd.com', '$2y$12$s5eQfO6dU.NLNUs6odKve.S26Wzl3zgsDAA3p1gETGnVTXxvJsupe', 'laurac', '1986-06-01', 'Female', 0, 2, 2, 89, 1, '', 0, 0, '2019-06-01', '', 'Single', '', 'la novena 101 @ 10 de agosto', '', '', '', '', '658', '', '', '', '', '', '', '', '', 1, '24-09-2019 19:47:46', '25-09-2019 07:49:48', '190.63.240.237', 0, 0, '2019-06-22 02:49:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_bankaccount`
--

CREATE TABLE `xin_employee_bankaccount` (
  `bankaccount_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `is_primary` int(11) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `bank_branch` text NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_bankaccount`
--

INSERT INTO `xin_employee_bankaccount` (`bankaccount_id`, `employee_id`, `is_primary`, `account_title`, `account_number`, `bank_name`, `bank_code`, `bank_branch`, `created_at`) VALUES
(2, 6, 0, 'Israel Yamil Carrasco Rendon', '1045200227', 'Pacifico', '1', '', '12-08-2018'),
(3, 6, 0, 'Israel Carrasco', '1083457658u', 'Banco del Pacifico2', 'XXX', '', '13-09-2018'),
(5, 1, 0, 'Cuenta Bolivariano', '2514256325', 'Banco Bolibariano', 'BB', 'Policentro', '15-09-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_complaints`
--

CREATE TABLE `xin_employee_complaints` (
  `complaint_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `complaint_from` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `complaint_date` varchar(255) NOT NULL,
  `complaint_against` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_complaints`
--

INSERT INTO `xin_employee_complaints` (`complaint_id`, `company_id`, `complaint_from`, `title`, `complaint_date`, `complaint_against`, `description`, `status`, `created_at`) VALUES
(1, 1, 6, 'Acoso Laboral', '2018-08-08', '1', 'Falta de respecto y acoso a compañero de trabajo', 1, '14-08-2018'),
(2, 2, 17, 'Verbal', '2019-09-01', '27', 'wetweafsdfsdfdsfs', 0, '01-09-2019'),
(3, 2, 20, 'Acoso', '2019-09-01', '17', 'dfasfdadfasdf', 0, '01-09-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_contacts`
--

CREATE TABLE `xin_employee_contacts` (
  `contact_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `is_primary` int(111) NOT NULL,
  `is_dependent` int(111) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `work_phone` varchar(255) NOT NULL,
  `work_phone_extension` varchar(255) NOT NULL,
  `mobile_phone` varchar(255) NOT NULL,
  `home_phone` varchar(255) NOT NULL,
  `work_email` varchar(255) NOT NULL,
  `personal_email` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_contacts`
--

INSERT INTO `xin_employee_contacts` (`contact_id`, `employee_id`, `relation`, `is_primary`, `is_dependent`, `contact_name`, `work_phone`, `work_phone_extension`, `mobile_phone`, `home_phone`, `work_email`, `personal_email`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `country`, `created_at`) VALUES
(3, 6, 'In Laws', 0, 1, 'Angel', '987456321', '', '991006991', '', 'a_asc_acu@hotmail.com', 'a_asc_acu@hotmail.com', 'Isla Trinitaria', 'Ciudadela Girasoles', 'Guayaquil', 'Guayas', '', '61', '13-09-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_contract`
--

CREATE TABLE `xin_employee_contract` (
  `contract_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `contract_type_id` int(111) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_documents`
--

CREATE TABLE `xin_employee_documents` (
  `document_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `document_type_id` int(111) NOT NULL,
  `date_of_expiry` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notification_email` varchar(255) NOT NULL,
  `is_alert` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `document_file` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_documents`
--

INSERT INTO `xin_employee_documents` (`document_id`, `employee_id`, `document_type_id`, `date_of_expiry`, `title`, `notification_email`, `is_alert`, `description`, `document_file`, `created_at`) VALUES
(1, 6, 2, '2018-09-13', 'cedula', 'a_asc_acu@hotmail.com', 1, '', 'document_1536861016.jpg', '13-09-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_exit`
--

CREATE TABLE `xin_employee_exit` (
  `exit_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `exit_date` varchar(255) NOT NULL,
  `exit_type_id` int(111) NOT NULL,
  `exit_interview` int(111) NOT NULL,
  `is_inactivate_account` int(111) NOT NULL,
  `reason` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_exit`
--

INSERT INTO `xin_employee_exit` (`exit_id`, `company_id`, `employee_id`, `exit_date`, `exit_type_id`, `exit_interview`, `is_inactivate_account`, `reason`, `added_by`, `created_at`) VALUES
(1, 1, 145, '2019-09-02', 2, 1, 1, 'porque así lo decidí', 6, '03-09-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_exit_type`
--

CREATE TABLE `xin_employee_exit_type` (
  `exit_type_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_exit_type`
--

INSERT INTO `xin_employee_exit_type` (`exit_type_id`, `company_id`, `type`, `created_at`) VALUES
(2, 1, 'Hurto', '14-08-2018 07:27:31'),
(3, 1, 'Faltas Graves', '14-08-2018 07:56:29'),
(4, 1, 'Faltas muy graves', '15-08-2018 12:08:50'),
(5, 1, 'Indisciplina o Desobediencia', '15-08-2018 12:09:40'),
(6, 1, 'Faltas repetidas e injustificadas de puntualidad', '15-08-2018 12:10:11'),
(7, 1, 'Falta de probidad o por conducta inmoral del trabajador', '15-08-2018 12:10:40'),
(8, 1, 'Injurias graves ', '15-08-2018 12:11:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_immigration`
--

CREATE TABLE `xin_employee_immigration` (
  `immigration_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `document_type_id` int(111) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `document_file` varchar(255) NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `eligible_review_date` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_leave`
--

CREATE TABLE `xin_employee_leave` (
  `leave_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `contract_id` int(111) NOT NULL,
  `casual_leave` varchar(255) NOT NULL,
  `medical_leave` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_location`
--

CREATE TABLE `xin_employee_location` (
  `office_location_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `location_id` int(111) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_promotions`
--

CREATE TABLE `xin_employee_promotions` (
  `promotion_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `promotion_date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_promotions`
--

INSERT INTO `xin_employee_promotions` (`promotion_id`, `company_id`, `employee_id`, `title`, `promotion_date`, `description`, `added_by`, `created_at`) VALUES
(1, 2, 17, 'Plan de Telefono', '2019-09-02', 'Semana del Plan de celular', 1, '01-09-2019'),
(3, 1, 6, 'Venta de Garaje', '2019-09-06', 'Desde las 6 a.m.', 1, '04-09-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_qualification`
--

CREATE TABLE `xin_employee_qualification` (
  `qualification_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `education_level_id` int(111) NOT NULL,
  `from_year` varchar(255) NOT NULL,
  `language_id` int(111) NOT NULL,
  `to_year` varchar(255) NOT NULL,
  `skill_id` text NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_qualification`
--

INSERT INTO `xin_employee_qualification` (`qualification_id`, `employee_id`, `name`, `education_level_id`, `from_year`, `language_id`, `to_year`, `skill_id`, `description`, `created_at`) VALUES
(3, 139, 'Universidad Catolica', 3, '2015-08-01', 4, '2018-08-01', '', '', '21-08-2018'),
(4, 6, 'Francisco de Orellana', 1, '1998-04-06', 4, '2004-12-17', '', 'fgfgfgfgf55y656565 @', '13-09-2018'),
(5, 6, 'universidad agraria', 2, '2018-10-18', 1, '2023-12-01', '', '', '13-09-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_resignations`
--

CREATE TABLE `xin_employee_resignations` (
  `resignation_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `notice_date` varchar(255) NOT NULL,
  `resignation_date` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_resignations`
--

INSERT INTO `xin_employee_resignations` (`resignation_id`, `company_id`, `employee_id`, `notice_date`, `resignation_date`, `reason`, `added_by`, `created_at`) VALUES
(1, 1, 145, '2019-09-02', '2019-09-02', 'Porque yo quiero', 6, '02-09-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_shift`
--

CREATE TABLE `xin_employee_shift` (
  `emp_shift_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `shift_id` int(111) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_terminations`
--

CREATE TABLE `xin_employee_terminations` (
  `termination_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `terminated_by` int(111) NOT NULL,
  `termination_type_id` int(111) NOT NULL,
  `termination_date` varchar(255) NOT NULL,
  `notice_date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_transfer`
--

CREATE TABLE `xin_employee_transfer` (
  `transfer_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `transfer_date` varchar(255) NOT NULL,
  `transfer_department` int(111) NOT NULL,
  `transfer_location` int(111) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_transfer`
--

INSERT INTO `xin_employee_transfer` (`transfer_id`, `company_id`, `employee_id`, `transfer_date`, `transfer_department`, `transfer_location`, `description`, `status`, `added_by`, `created_at`) VALUES
(1, 1, 142, '2019-05-14', 1, 2, '', 0, 6, '13-05-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_travels`
--

CREATE TABLE `xin_employee_travels` (
  `travel_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `visit_purpose` varchar(255) NOT NULL,
  `visit_place` varchar(255) NOT NULL,
  `travel_mode` int(111) DEFAULT NULL,
  `arrangement_type` int(111) DEFAULT NULL,
  `expected_budget` varchar(255) NOT NULL,
  `actual_budget` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_warnings`
--

CREATE TABLE `xin_employee_warnings` (
  `warning_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `warning_to` int(111) NOT NULL,
  `warning_by` int(111) NOT NULL,
  `warning_date` varchar(255) NOT NULL,
  `warning_type_id` int(111) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_warnings`
--

INSERT INTO `xin_employee_warnings` (`warning_id`, `company_id`, `warning_to`, `warning_by`, `warning_date`, `warning_type_id`, `subject`, `description`, `status`, `created_at`) VALUES
(1, 2, 17, 17, '2019-09-02', 3, 'por venir tarde', '', 0, '02-09-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_employee_work_experience`
--

CREATE TABLE `xin_employee_work_experience` (
  `work_experience_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_employee_work_experience`
--

INSERT INTO `xin_employee_work_experience` (`work_experience_id`, `employee_id`, `company_name`, `from_date`, `to_date`, `post`, `description`, `created_at`) VALUES
(3, 12, 'sfsdf', '1376456400', '2018-08-14', 'dfdsf', 'dsfsf', '14-08-2018'),
(4, 6, 'Constructora Chaw', '2018-09-19', '2023-09-07', 'Asistente', 'bdsbdsd sjds 4343434 @', '13-09-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_events`
--

CREATE TABLE `xin_events` (
  `event_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `event_note` text NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_events`
--

INSERT INTO `xin_events` (`event_id`, `company_id`, `employee_id`, `event_title`, `event_date`, `event_time`, `event_note`, `created_at`) VALUES
(1, 1, 1, 'Reunion con Ing Molina', '2019-08-30', '13:00', 'Asistencia Obligatoria, no faltar', '2019-08-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_file_manager`
--

CREATE TABLE `xin_file_manager` (
  `file_id` int(111) NOT NULL,
  `user_id` int(111) NOT NULL,
  `department_id` int(111) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `file_extension` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_file_manager`
--

INSERT INTO `xin_file_manager` (`file_id`, `user_id`, `department_id`, `file_name`, `file_size`, `file_extension`, `created_at`) VALUES
(2, 17, 18, 'file_1567095599.png', '2131587', 'png', '2019-08-29 11:20:00'),
(4, 14, 34, 'file_1567101622.pdf', '492854', 'pdf', '2019-08-29 01:00:21'),
(5, 1, 1, 'file_1567101893.pdf', '492854', 'pdf', '2019-08-29 01:04:53'),
(6, 14, 34, 'file_1567102193.jpg', '10251', 'jpg', '2019-08-29 01:09:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_file_manager_settings`
--

CREATE TABLE `xin_file_manager_settings` (
  `setting_id` int(111) NOT NULL,
  `allowed_extensions` text NOT NULL,
  `maximum_file_size` varchar(255) NOT NULL,
  `is_enable_all_files` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_file_manager_settings`
--

INSERT INTO `xin_file_manager_settings` (`setting_id`, `allowed_extensions`, `maximum_file_size`, `is_enable_all_files`, `updated_at`) VALUES
(1, 'gif,png,pdf,doc,docx,jpeg,jpg,xls,xlsx', '10', '', '2019-08-29 01:08:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_holidays`
--

CREATE TABLE `xin_holidays` (
  `holiday_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_holidays`
--

INSERT INTO `xin_holidays` (`holiday_id`, `company_id`, `event_name`, `description`, `start_date`, `end_date`, `is_publish`, `created_at`) VALUES
(2, 1, 'Año nuevo', '&lt;p&gt;&lt;span lang=\\&quot;ES-EC\\&quot; xss=removed&gt;No\nrecuperable&lt;/span&gt;&lt;/p&gt;', '2018-01-01', '2018-01-01', 1, '2018-08-12'),
(3, 1, 'Carnaval', '&lt;p&gt;&lt;span lang=\\&quot;ES-EC\\&quot; xss=removed&gt;Feriado\nde carnaval 2018, no recuperables&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '2018-02-12', '2018-02-13', 1, '2018-08-12'),
(4, 1, 'Viernes Santo', '&lt;p class=\\&quot;MsoNormal\\&quot;&gt;&lt;span lang=\\&quot;ES-EC\\&quot;&gt;No\nrecuperable&lt;o&gt;&lt;/o&gt;&lt;/span&gt;&lt;/p&gt;', '2018-03-30', '2018-03-30', 1, '2018-08-12'),
(5, 1, 'Día del Trabajo', '&lt;p class=\\&quot;\\\\\\\\\\&quot;&gt;&lt;span lang=\\&quot;\\\\\\\\\\&quot; xss=\\&quot;removed\\&quot;&gt;Feriado\nse adelanta al lunes 30 de abril (recuperable),\nel 1 de mayo es feriado también\nsiendo no recuperable&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '2018-04-30', '2018-04-30', 1, '2018-08-12'),
(6, 1, 'Batalla del Pichincha', '&lt;p class=\\&quot;\\\\\\\\\\&quot;&gt;&lt;span lang=\\&quot;\\\\\\\\\\&quot; xss=\\&quot;removed\\&quot;&gt;Pasa\nal viernes 25 de mayo, no recuperable&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '2018-05-25', '2018-05-25', 1, '2018-08-12'),
(7, 1, 'Fiestas de Guayaquil', '&lt;p class=\\&quot;MsoNormal\\&quot;&gt;&lt;span lang=\\&quot;ES-EC\\&quot;&gt;Feriado el\nviernes 27 de julio solo para uayaquil,\nno recuperable&lt;o&gt;&lt;/o&gt;&lt;/span&gt;&lt;/p&gt;', '2018-07-25', '2018-07-25', 1, '2018-08-12'),
(8, 1, 'Primer Grito de la Independencia', '&lt;p class=\\&quot;MsoNormal\\&quot;&gt;&lt;span lang=\\&quot;ES-EC\\&quot; xss=removed&gt;No\nrecuperable&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '2018-08-10', '2018-08-10', 1, '2018-08-12'),
(9, 1, 'Independencia de Guayaquil', '&lt;p class=\\&quot;MsoNormal\\&quot;&gt;&lt;span lang=\\&quot;ES-EC\\&quot;&gt;Pasa al\nlunes 8 de octubre (de acuerdo a ley\nde feriados), no recuperable&lt;o&gt;&lt;/o&gt;&lt;/span&gt;&lt;/p&gt;', '2018-10-09', '2018-10-09', 1, '2018-08-12'),
(10, 1, 'Día de los difuntos', '&lt;p class=\\&quot;MsoNormal\\&quot;&gt;&lt;span lang=\\&quot;ES-EC\\&quot;&gt;No\nrecuperable&lt;o&gt;&lt;/o&gt;&lt;/span&gt;&lt;/p&gt;', '2018-11-02', '2018-11-02', 1, '2018-08-12'),
(11, 1, 'Independencia de Cuenca', '&lt;p class=\\&quot;\\\\\\\\\\&quot;&gt;FERIADO NO RECUPERABLE&lt;/p&gt;&lt;p class=\\&quot;\\\\\\\\\\&quot;&gt;&lt;span xss=removed&gt;Cae sábado 3 de noviembre, se pasa al jueves 1 conforme lo dispuesto en la Ley de Feriados para 2018.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '2018-11-01', '2018-11-01', 1, '2018-08-12'),
(12, 1, 'Navidad', '&lt;p class=\\&quot;MsoNormal\\&quot;&gt;&lt;span lang=\\&quot;ES-EC\\&quot; xss=removed&gt;No\nrecuperable&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '2018-12-25', '2018-12-25', 1, '2018-08-12'),
(13, 1, 'FERIADO', 'TOMENSE EL DIA', '2019-05-24', '2019-05-24', 1, '2019-05-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_hourly_templates`
--

CREATE TABLE `xin_hourly_templates` (
  `hourly_rate_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `hourly_grade` varchar(255) NOT NULL,
  `hourly_rate` varchar(255) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_hrsale_invoices`
--

CREATE TABLE `xin_hrsale_invoices` (
  `invoice_id` int(111) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `project_id` int(111) NOT NULL,
  `invoice_date` varchar(255) NOT NULL,
  `invoice_due_date` varchar(255) NOT NULL,
  `sub_total_amount` varchar(255) NOT NULL,
  `discount_type` varchar(11) NOT NULL,
  `discount_figure` varchar(255) NOT NULL,
  `total_tax` varchar(255) NOT NULL,
  `total_discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `invoice_note` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_hrsale_invoices_items`
--

CREATE TABLE `xin_hrsale_invoices_items` (
  `invoice_item_id` int(111) NOT NULL,
  `invoice_id` int(111) NOT NULL,
  `project_id` int(111) NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `item_tax_type` varchar(255) NOT NULL,
  `item_tax_rate` varchar(255) NOT NULL,
  `item_qty` varchar(255) NOT NULL,
  `item_unit_price` varchar(255) NOT NULL,
  `item_sub_total` varchar(255) NOT NULL,
  `sub_total_amount` varchar(255) NOT NULL,
  `total_tax` varchar(255) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `discount_figure` varchar(255) NOT NULL,
  `total_discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_iess`
--

CREATE TABLE `xin_iess` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `porciento` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_iess`
--

INSERT INTO `xin_iess` (`id_tipo`, `tipo`, `porciento`) VALUES
(1, 'Privado', 12.15),
(2, 'Público', 10.15),
(11, 'Empleado', 9.45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_income_categories`
--

CREATE TABLE `xin_income_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_income_categories`
--

INSERT INTO `xin_income_categories` (`category_id`, `name`, `status`, `created_at`) VALUES
(1, 'Envato', 1, '25-03-2018 09:36:20'),
(2, 'Salary', 1, '25-03-2018 09:36:28'),
(3, 'Other Income', 1, '25-03-2018 09:36:32'),
(4, 'Interest Income', 1, '25-03-2018 09:36:53'),
(5, 'Part Time Work', 1, '25-03-2018 09:37:13'),
(6, 'Regular Income', 1, '25-03-2018 09:37:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_languages`
--

CREATE TABLE `xin_languages` (
  `language_id` int(111) NOT NULL,
  `language_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language_flag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `xin_languages`
--

INSERT INTO `xin_languages` (`language_id`, `language_name`, `language_code`, `language_flag`, `is_active`, `created_at`) VALUES
(1, 'Spanish', 'spanish', 'language_flag_1531701862.gif', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_leave_applications`
--

CREATE TABLE `xin_leave_applications` (
  `leave_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(222) NOT NULL,
  `leave_type_id` int(222) NOT NULL,
  `from_date` varchar(200) NOT NULL,
  `to_date` varchar(200) NOT NULL,
  `applied_on` varchar(200) NOT NULL,
  `reason` text NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_leave_applications`
--

INSERT INTO `xin_leave_applications` (`leave_id`, `company_id`, `employee_id`, `leave_type_id`, `from_date`, `to_date`, `applied_on`, `reason`, `remarks`, `status`, `created_at`) VALUES
(1, 1, 12, 3, '2018-08-19', '2018-08-25', '2018-08-14 12:23:59', 'descanso', '', 3, '2018-08-14 12:23:59'),
(5, 1, 12, 3, '2018-08-19', '2018-08-25', '2018-08-14 12:24:38', 'descanso', 'descanzo', 2, '2018-08-14 12:24:38'),
(13, 1, 145, 5, '2019-09-03', '2019-09-17', '2019-09-03 09:02:49', 'son mias', 'danme vacaciones', 2, '2019-09-03 09:02:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_leave_type`
--

CREATE TABLE `xin_leave_type` (
  `leave_type_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL,
  `days_per_year` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_leave_type`
--

INSERT INTO `xin_leave_type` (`leave_type_id`, `company_id`, `type_name`, `days_per_year`, `status`, `created_at`) VALUES
(5, 1, 'Vacaciones Anuales', '15', 1, '29-09-2018 10:59:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_make_payment`
--

CREATE TABLE `xin_make_payment` (
  `make_payment_id` int(111) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `department_id` int(111) NOT NULL,
  `company_id` int(111) NOT NULL,
  `location_id` int(111) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `payment_date` varchar(200) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `salario_bruto` varchar(255) NOT NULL,
  `total_ingresos` varchar(255) NOT NULL,
  `total_egresos` varchar(255) NOT NULL,
  `salario_neto` varchar(255) NOT NULL,
  `decimo_tercero` varchar(255) NOT NULL,
  `decimo_cuarto` varchar(255) NOT NULL,
  `fondo_reserva` varchar(255) NOT NULL,
  `vacaciones` varchar(255) NOT NULL,
  `bonificacion` varchar(255) NOT NULL,
  `aporte_iess` varchar(255) NOT NULL,
  `quirografario` varchar(255) NOT NULL,
  `hipotecario` varchar(100) NOT NULL,
  `anticipos` varchar(100) NOT NULL,
  `otros_admin` varchar(100) NOT NULL,
  `overtime_rate` varchar(255) NOT NULL,
  `is_advance_salary_deduct` int(11) NOT NULL,
  `advance_salary_amount` varchar(255) NOT NULL,
  `is_payment` tinyint(1) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `hourly_rate` varchar(255) NOT NULL,
  `total_hours_work` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_make_payment`
--

INSERT INTO `xin_make_payment` (`make_payment_id`, `employee_id`, `department_id`, `company_id`, `location_id`, `designation_id`, `payment_date`, `basic_salary`, `payment_amount`, `salario_bruto`, `total_ingresos`, `total_egresos`, `salario_neto`, `decimo_tercero`, `decimo_cuarto`, `fondo_reserva`, `vacaciones`, `bonificacion`, `aporte_iess`, `quirografario`, `hipotecario`, `anticipos`, `otros_admin`, `overtime_rate`, `is_advance_salary_deduct`, `advance_salary_amount`, `is_payment`, `payment_method`, `hourly_rate`, `total_hours_work`, `comments`, `status`, `created_at`) VALUES
(1, 6, 2, 1, 0, 10, '2018-08', '1500', '1359.75', '1500', '0', '140.25', '1359.75', '0', '0', '0', '0', '0', '0', '140.25', '', '', '', '0', 0, '0', 1, 5, '', '', 'mes de ', 1, '12-08-2018 03:13:13'),
(2, 1, 1, 1, 0, 15, '2018-09', '384.00', '443.71', '384.00', '96', '36.29', '443.71', '32', '32', '32', '0', '36.29', '0', '0', '', '', '', '2.40', 0, '0', 1, 6, '', '', 'Salario Septiembre', 1, '11-09-2018 05:59:07'),
(3, 112, 28, 4, 0, 44, '2018-10', '500', '536.09', '500', '124.99', '88.9', '536.0899999999999', '41.65', '41.67', '41.67', '0', '47.25', '41.65', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:42:17'),
(4, 1, 1, 1, 0, 15, '2018-10', '384.00', '443.71', '384.00', '96', '36.29', '443.71', '32', '32', '32', '0', '36.29', '0', '0', '', '', '', '2.40', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:46:18'),
(5, 6, 1, 1, 0, 16, '2018-10', '1500', '1359.75', '1500', '0', '140.25', '1359.75', '0', '0', '0', '0', '0', '0', '140.25', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:46:32'),
(6, 11, 9, 1, 0, 101, '2018-10', '2000', '2000', '2000', '0', '0', '2000', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:46:41'),
(7, 12, 8, 1, 0, 13, '2018-10', '1000', '1072.16', '1000', '249.96', '177.8', '1072.16', '83.30', '83.33', '83.33', '0', '94.50', '83.30', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:46:48'),
(8, 13, 2, 1, 0, 10, '2018-10', '700', '758.33', '700', '174.97', '124.46', '758.33', '58.31', '58.33', '58.33', '0', '66.15', '58.31', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:46:57'),
(9, 88, 11, 1, 0, 108, '2018-10', '800', '857.74', '800', '199.98', '142.24', '857.74', '66.64', '66.67', '66.67', '0', '75.60', '66.64', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:47:06'),
(10, 92, 11, 1, 0, 108, '2018-10', '800', '866.67', '800', '199.98', '142.24', '866.67', '66.64', '66.67', '66.67', '0', '75.60', '66.64', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:47:20'),
(11, 113, 11, 1, 0, 108, '2018-10', '500', '541.67', '500', '124.99', '88.9', '541.67', '41.65', '41.67', '41.67', '0', '47.25', '41.65', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:47:42'),
(12, 139, 5, 1, 0, 88, '2018-10', '500', '541.67', '500', '124.99', '88.9', '541.67', '41.65', '41.67', '41.67', '0', '47.25', '41.65', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 08:47:58'),
(13, 31, 25, 3, 0, 36, '2018-10', '500', '541.67', '500', '124.99', '88.9', '541.67', '41.65', '41.67', '41.67', '0', '47.25', '41.65', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'octubre', 1, '23-10-2018 11:00:12'),
(14, 112, 28, 4, 0, 44, '2018-09', '500', '536.09', '500', '124.99', '88.9', '536.0899999999999', '41.65', '41.67', '41.67', '0', '47.25', '41.65', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'SEPTIEMBRE', 1, '23-10-2018 11:41:42'),
(15, 6, 1, 1, 0, 16, '2018-09', '1500', '1359.75', '1500', '0', '140.25', '1359.75', '0', '0', '0', '0', '0', '0', '140.25', '', '', '', '0', 0, '0', 1, 6, '', '', 'SEPTIEMBRE', 1, '23-10-2018 11:42:21'),
(16, 12, 8, 1, 0, 13, '2018-09', '1000', '1072.16', '1000', '249.96', '177.8', '1072.16', '83.30', '83.33', '83.33', '0', '94.50', '83.30', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'SEPTIEMBRE', 1, '23-10-2018 11:42:42'),
(17, 13, 2, 1, 0, 10, '2018-09', '700', '758.33', '700', '174.97', '124.46', '758.33', '58.31', '58.33', '58.33', '0', '66.15', '58.31', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'SEPTIEMBRE', 1, '23-10-2018 11:42:53'),
(18, 88, 11, 1, 0, 108, '2018-09', '800', '857.74', '800', '199.98', '142.24', '857.74', '66.64', '66.67', '66.67', '0', '75.60', '66.64', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'SEPTIEMBRE', 1, '23-10-2018 11:43:10'),
(19, 92, 11, 1, 0, 108, '2018-09', '800', '866.67', '800', '199.98', '142.24', '866.67', '66.64', '66.67', '66.67', '0', '75.60', '66.64', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'SEPTIEMBRE', 1, '23-10-2018 11:43:23'),
(20, 113, 11, 1, 0, 108, '2018-09', '500', '541.67', '500', '124.99', '88.9', '541.67', '41.65', '41.67', '41.67', '0', '47.25', '41.65', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'SEPTIEMBRE', 1, '23-10-2018 11:43:45'),
(21, 139, 5, 1, 0, 88, '2018-09', '500', '541.67', '500', '124.99', '88.9', '541.67', '41.65', '41.67', '41.67', '0', '47.25', '41.65', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'SEPTIEMBRE', 1, '23-10-2018 11:44:03'),
(22, 11, 9, 1, 0, 101, '2018-09', '2000', '2000', '2000', '0', '0', '2000', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'SEPTIEMBRE', 1, '23-10-2018 11:44:18'),
(23, 139, 5, 1, 0, 88, '2018-08', '500', '541.67', '500', '124.99', '88.9', '541.67', '41.65', '41.67', '41.67', '0', '47.25', '41.65', '0', '', '', '', '0', 0, '0', 1, 6, '', '', 'agosto', 1, '23-10-2018 11:51:10'),
(24, 89, 11, 1, 0, 108, '2018-12', '500', '494.4', '500', '41.65', '47.25', '494.40', '0', '0', '41.65', '0', '0.00', '47.25', '0', '0', '0.00', '0.00', '0', 0, '0', 1, 6, '', '', 'sdssf', 1, '12-12-2018 10:14:22'),
(25, 89, 11, 1, 0, 108, '2019-01', '400', '411.02', '400', '98.82', '87.8', '411.02', '33.33', '32.17', '33.32', '0', '0.00', '37.80', '0', '50', '0.00', '0.00', '0', 0, '0', 1, 6, '', '', 'le ágamos el mes', 1, '05-01-2019 02:25:43'),
(26, 141, 2, 1, 0, 89, '2019-01', '600.00', '663.45', '600.00', '132.15', '68.7', '663.45', '50.00', '32.17', '49.98', '0.00', '0.00', '68.70', '0.00', '0.00', '0.00', '0.00', '0', 0, '0', 1, 6, '', '', 'mes de enero', 1, '18-01-2019 11:03:03'),
(27, 1, 1, 1, 0, 15, '2019-02', '400.00', '453.68', '400.00', '99.48', '45.8', '453.68', '33.33', '32.83', '33.32', '0.00', '0.00', '45.80', '0.00', '0.00', '0.00', '0.00', '1.20', 0, '0', 1, 5, '', '', 'Pago mensual', 1, '17-02-2019 01:05:44'),
(28, 89, 11, 1, 0, 108, '2019-03', '400.00', '411.02', '400.00', '98.82', '87.8', '411.02', '33.33', '32.17', '33.32', '0.00', '0.00', '37.80', '0.00', '50.00', '0.00', '0.00', '0', 0, '0', 1, 4, '', '', 'pago', 1, '05-03-2019 04:56:16'),
(29, 144, 1, 1, 0, 15, '2019-05', '800.00', '805.05', '800.00', '96.65', '91.6', '805.05', '0', '30.00', '66.65', '0.00', '0.00', '91.60', '0.00', '0.00', '0.00', '0.00', '0', 0, '0', 1, 4, '', '', 'sueldo mayo', 1, '13-05-2019 02:17:19'),
(30, 6, 1, 1, 0, 16, '2019-08', '400.00', '411.02', '400.00', '98.82', '87.8', '411.02', '33.33', '32.17', '33.32', '0.00', '0.00', '37.80', '0.00', '50.00', '0.00', '0.00', '0', 0, '0', 1, 6, '', '', 'Pago Agosto', 1, '14-08-2019 11:38:31'),
(31, 17, 18, 2, 0, 17, '2019-08', '817.00', '563.45', '817.00', '110', '363.55', '563.45', '0', '0', '0', '10.00', '100.00', '93.55', '100.00', '50.00', '100.00', '20.00', '0', 0, '0', 1, 4, '', '', 'PAGO AGOSTO', 1, '29-08-2019 01:28:39'),
(32, 17, 18, 2, 0, 17, '2019-09', '817.00', '563.45', '817.00', '110', '363.55', '563.45', '0', '0', '0', '10.00', '100.00', '93.55', '100.00', '50.00', '100.00', '20.00', '0', 0, '0', 1, 4, '', '', 'septiembre', 1, '01-09-2019 11:13:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_meetings`
--

CREATE TABLE `xin_meetings` (
  `meeting_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `meeting_title` varchar(255) NOT NULL,
  `meeting_date` varchar(255) NOT NULL,
  `meeting_time` varchar(255) NOT NULL,
  `meeting_note` text NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_meetings`
--

INSERT INTO `xin_meetings` (`meeting_id`, `company_id`, `employee_id`, `meeting_title`, `meeting_date`, `meeting_time`, `meeting_note`, `created_at`) VALUES
(1, 1, 6, 'Reunión Tesis', '2019-08-30', '01:30', 'Puntual a las 1:30', '2019-08-29'),
(2, 1, 1, 'Reunion App', '2019-08-30', '13:30', 'Reunion con el Ing. Bryan ', '2019-08-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_office_location`
--

CREATE TABLE `xin_office_location` (
  `location_id` int(11) NOT NULL,
  `company_id` int(111) NOT NULL,
  `location_head` int(111) NOT NULL,
  `location_manager` int(111) NOT NULL,
  `location_name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_office_location`
--

INSERT INTO `xin_office_location` (`location_id`, `company_id`, `location_head`, `location_manager`, `location_name`, `email`, `phone`, `fax`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `country`, `added_by`, `created_at`, `status`) VALUES
(1, 1, 1, 0, 'EDIFICIO MATRIZ DE LA FUNDACIÓN KAÍROS', 'info@fundacionkairos.org', '0999067575', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', 'Guayaquil', 'Guayaquil', 'Guayas', '090510', 61, 1, '28-02-2018', 1),
(2, 1, 1, 0, 'ESCUELA SANTA MARÍA MONTE DE PAZ', 'info@fundacionkairos.org', '0999067575', '', 'Sector Monte Sinai.', 'Guayaquil', 'Guayaquil', 'Guayas', '593042', 61, 1, '11-08-2018', 1),
(3, 1, 1, 0, 'ESCUELA PADRE SIMÓN EL AMIGO DEL MILLÓN', 'info@fundacionkairos.org', '0999067575', '', 'Isla Trinitaria Coop. 22 de Abril.', 'Guayaquil', 'Guayaquil', 'Guayas', '090510', 61, 1, '11-08-2018', 1),
(4, 1, 1, 0, 'ESCUELA FISCOMISIONAL Nº 17 SAN CARLOS LWANGA', 'info@fundacionkairos.org', '0999067575', '', 'Isla Trinitaria Coop. Independencia.', 'Guayaquil', 'Guayaquil', 'Guayas', '090510', 61, 1, '11-08-2018', 1),
(5, 1, 1, 0, 'ESCUELA Nª 497 SANTA MARÍA EUFRASIA', 'info@fundacionkairos.org', '0999067575', '', 'Isla Trinitaria Coop. Brisas del Salado.', 'Guayaquil', 'Guayaquil', 'Guayas', '593042', 61, 1, '11-08-2018', 1),
(6, 1, 1, 0, 'ESCUELA FISCOMISIONAL Nº 18 PADRE NUMAEL LÓPEZ', 'info@fundacionkairos.org', '0999067575', '', 'Isla Trinitaria Coop. Che Guevara.', 'Guayaquil', 'Guayaquil', 'Guayas', '593042', 61, 1, '11-08-2018', 1),
(7, 1, 1, 0, 'COLEGIO FISCOMISIONAL EL PROFETA JEREMÍAS', 'info@fundacionkairos.org', '0999067575', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', 'Guayaquil', 'Guayaquil', 'Guayas', '593042', 61, 1, '11-08-2018', 1),
(8, 1, 1, 0, 'ESCUELA FISCOMISIONAL EL PROFETA JEREMÍAS', 'info@fundacionkairos.org', '0999067575', '', 'Isla Trinitaria Coop. 4 de marzo mz 16 sl 27', 'Guayaquil', 'Guayaquil', 'Guayas', '090510', 61, 1, '11-08-2018', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_office_shift`
--

CREATE TABLE `xin_office_shift` (
  `office_shift_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `shift_name` varchar(255) NOT NULL,
  `default_shift` int(111) NOT NULL,
  `monday_in_time` varchar(222) NOT NULL,
  `monday_out_time` varchar(222) NOT NULL,
  `tuesday_in_time` varchar(222) NOT NULL,
  `tuesday_out_time` varchar(222) NOT NULL,
  `wednesday_in_time` varchar(222) NOT NULL,
  `wednesday_out_time` varchar(222) NOT NULL,
  `thursday_in_time` varchar(222) NOT NULL,
  `thursday_out_time` varchar(222) NOT NULL,
  `friday_in_time` varchar(222) NOT NULL,
  `friday_out_time` varchar(222) NOT NULL,
  `saturday_in_time` varchar(222) NOT NULL,
  `saturday_out_time` varchar(222) NOT NULL,
  `sunday_in_time` varchar(222) NOT NULL,
  `sunday_out_time` varchar(222) NOT NULL,
  `created_at` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_office_shift`
--

INSERT INTO `xin_office_shift` (`office_shift_id`, `company_id`, `shift_name`, `default_shift`, `monday_in_time`, `monday_out_time`, `tuesday_in_time`, `tuesday_out_time`, `wednesday_in_time`, `wednesday_out_time`, `thursday_in_time`, `thursday_out_time`, `friday_in_time`, `friday_out_time`, `saturday_in_time`, `saturday_out_time`, `sunday_in_time`, `sunday_out_time`, `created_at`) VALUES
(1, 1, 'Jornada Laboral 6:00 - 18:00', 0, '06:00', '18:00', '06:00', '18:00', '06:00', '18:00', '06:00', '18:00', '06:00', '18:00', '', '', '', '', '2018-02-28'),
(2, 1, 'Jornada Laboral 18:00 - 06:00', 1, '18:00', '06:00', '18:00', '06:00', '18:00', '06:00', '18:00', '06:00', '18:00', '06:00', '', '', '', '', '2018-08-12'),
(3, 1, 'Jornada Laboral 8:30 - 17:00', 0, '08:30', '17:00', '08:30', '17:00', '08:30', '17:00', '08:30', '17:00', '08:30', '17:00', '', '', '', '', '2018-08-12'),
(4, 1, 'Jornada Laboral 06:30 - 18:00', 0, '06:30', '18:00', '06:30', '18:00', '06:30', '18:00', '06:30', '18:00', '06:30', '18:00', '', '', '', '', '2018-08-12'),
(5, 1, 'Jornada Laboral 06:45 - 14:45 ', 0, '06:45', '14:45', '06:45', '14:45', '06:45', '14:45', '06:45', '14:45', '06:45', '14:45', '', '', '', '', '2018-08-21'),
(6, 1, 'Jornada Laboral Sábado Lunes 06:00 - 06:00 ', 0, '06:00', '06:00', '', '', '', '', '', '', '', '', '06:00', '06:00', '06:00', '06:00', '2018-08-21'),
(7, 2, 'PRUEBA', 0, '06:00', '14:00', '', '', '', '', '', '', '', '', '', '', '', '', '2019-08-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_payment_method`
--

CREATE TABLE `xin_payment_method` (
  `payment_method_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `method_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_payment_method`
--

INSERT INTO `xin_payment_method` (`payment_method_id`, `company_id`, `method_name`, `created_at`) VALUES
(1, 1, 'Tarjeta de Crédito', '23-04-2018 05:13:52'),
(2, 1, 'Efectivo', '28-08-2019 09:41:57'),
(3, 1, 'Transferencia Bancaria', '28-08-2019 09:42:40'),
(4, 1, 'Cheque', '28-08-2019 09:43:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_payroll_custom_fields`
--

CREATE TABLE `xin_payroll_custom_fields` (
  `payroll_custom_id` int(11) NOT NULL,
  `allow_custom_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_allow_1` int(11) NOT NULL,
  `allow_custom_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_allow_2` int(11) NOT NULL,
  `allow_custom_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_allow_3` int(11) NOT NULL,
  `allow_custom_4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_allow_4` int(11) NOT NULL,
  `allow_custom_5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_allow_5` int(111) NOT NULL,
  `deduct_custom_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_deduct_1` int(11) NOT NULL,
  `deduct_custom_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_deduct_2` int(11) NOT NULL,
  `deduct_custom_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_deduct_3` int(11) NOT NULL,
  `deduct_custom_4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_deduct_4` int(11) NOT NULL,
  `deduct_custom_5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active_deduct_5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_performance_appraisal`
--

CREATE TABLE `xin_performance_appraisal` (
  `performance_appraisal_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_id` int(111) NOT NULL,
  `appraisal_year_month` varchar(255) NOT NULL,
  `customer_experience` int(111) NOT NULL,
  `marketing` int(111) NOT NULL,
  `management` int(111) NOT NULL,
  `administration` int(111) NOT NULL,
  `presentation_skill` int(111) NOT NULL,
  `quality_of_work` int(111) NOT NULL,
  `efficiency` int(111) NOT NULL,
  `integrity` int(111) NOT NULL,
  `professionalism` int(111) NOT NULL,
  `team_work` int(111) NOT NULL,
  `critical_thinking` int(111) NOT NULL,
  `conflict_management` int(111) NOT NULL,
  `attendance` int(111) NOT NULL,
  `ability_to_meet_deadline` int(111) NOT NULL,
  `remarks` text NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_performance_appraisal`
--

INSERT INTO `xin_performance_appraisal` (`performance_appraisal_id`, `company_id`, `employee_id`, `appraisal_year_month`, `customer_experience`, `marketing`, `management`, `administration`, `presentation_skill`, `quality_of_work`, `efficiency`, `integrity`, `professionalism`, `team_work`, `critical_thinking`, `conflict_management`, `attendance`, `ability_to_meet_deadline`, `remarks`, `added_by`, `created_at`) VALUES
(1, 1, 5, '2018-03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '22-03-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_performance_indicator`
--

CREATE TABLE `xin_performance_indicator` (
  `performance_indicator_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `designation_id` int(111) NOT NULL,
  `customer_experience` int(111) NOT NULL,
  `marketing` int(111) NOT NULL,
  `management` int(111) NOT NULL,
  `administration` int(111) NOT NULL,
  `presentation_skill` int(111) NOT NULL,
  `quality_of_work` int(111) NOT NULL,
  `efficiency` int(111) NOT NULL,
  `integrity` int(111) NOT NULL,
  `professionalism` int(111) NOT NULL,
  `team_work` int(111) NOT NULL,
  `critical_thinking` int(111) NOT NULL,
  `conflict_management` int(111) NOT NULL,
  `attendance` int(111) NOT NULL,
  `ability_to_meet_deadline` int(111) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_performance_indicator`
--

INSERT INTO `xin_performance_indicator` (`performance_indicator_id`, `company_id`, `designation_id`, `customer_experience`, `marketing`, `management`, `administration`, `presentation_skill`, `quality_of_work`, `efficiency`, `integrity`, `professionalism`, `team_work`, `critical_thinking`, `conflict_management`, `attendance`, `ability_to_meet_deadline`, `added_by`, `created_at`) VALUES
(1, 1, 10, 3, 4, 2, 3, 0, 0, 0, 0, 2, 0, 3, 3, 2, 3, 1, '05-04-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_qualification_education_level`
--

CREATE TABLE `xin_qualification_education_level` (
  `education_level_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_qualification_education_level`
--

INSERT INTO `xin_qualification_education_level` (`education_level_id`, `company_id`, `name`, `created_at`) VALUES
(1, 1, 'Secundarios', '09-05-2018 03:11:59'),
(2, 1, 'Universitarios', '12-08-2018 01:43:41'),
(3, 1, 'Postgrado-Diplomado', '12-08-2018 01:43:48'),
(4, 1, 'Maestría', '12-08-2018 01:43:55'),
(5, 1, 'PHD Doctorado en Investigación Original', '12-08-2018 01:47:28'),
(43, 1, 'Educación Superior', '28-08-2019 09:46:17'),
(44, 1, 'Tercer Nivel Técnico-Tecnológico Superior', '28-08-2019 09:48:55'),
(45, 1, 'Cuarto Nivel O Posgrado', '28-08-2019 09:53:34'),
(46, 1, 'Tercer Nivel De Grado', '28-08-2019 09:53:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_qualification_language`
--

CREATE TABLE `xin_qualification_language` (
  `language_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_qualification_language`
--

INSERT INTO `xin_qualification_language` (`language_id`, `company_id`, `name`, `created_at`) VALUES
(1, 1, 'English', '09-05-2018 03:12:03'),
(2, 1, 'Multi Idiomas', '12-08-2018 01:56:24'),
(3, 1, 'Quechua', '12-08-2018 01:57:43'),
(4, 1, 'Español', '12-08-2018 01:57:49'),
(5, 1, 'Italiano', '12-08-2018 01:58:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_qualification_skill`
--

CREATE TABLE `xin_qualification_skill` (
  `skill_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_qualification_skill`
--

INSERT INTO `xin_qualification_skill` (`skill_id`, `company_id`, `name`, `created_at`) VALUES
(2, 1, 'Negocios', '31-08-2019 06:52:19'),
(3, 1, 'Enseñanza Dinámica', '31-08-2019 06:53:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_salary_templates`
--

CREATE TABLE `xin_salary_templates` (
  `salary_template_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `basic_salary` decimal(6,2) NOT NULL,
  `overtime_rate` varchar(255) DEFAULT NULL,
  `decimo_tercero` decimal(6,2) DEFAULT NULL,
  `decimo_cuarto` decimal(6,2) DEFAULT NULL,
  `vacaciones` decimal(6,2) DEFAULT NULL,
  `hipotecario` decimal(6,2) DEFAULT NULL,
  `aporte_iess` decimal(6,2) NOT NULL,
  `quirografario` decimal(6,2) DEFAULT NULL,
  `salario_bruto` decimal(6,2) NOT NULL,
  `total_ingresos` decimal(6,2) NOT NULL,
  `total_egresos` decimal(6,2) NOT NULL,
  `salario_neto` decimal(6,2) NOT NULL,
  `added_by` int(111) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `aporte_type` decimal(10,2) NOT NULL,
  `salario_basico_unificado` decimal(10,2) NOT NULL,
  `tercero_acu` tinyint(1) DEFAULT 0,
  `cuarto_acu` tinyint(1) DEFAULT 0,
  `fondo_acu` tinyint(1) DEFAULT 0,
  `fondo_reserva` decimal(6,2) DEFAULT NULL,
  `anticipos` decimal(6,2) DEFAULT NULL,
  `bonificacion` decimal(6,2) DEFAULT NULL,
  `aporte_patronal_ing` decimal(6,2) NOT NULL,
  `aporte_patronal_egre` decimal(6,2) NOT NULL,
  `otros_admin` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_salary_templates`
--

INSERT INTO `xin_salary_templates` (`salary_template_id`, `company_id`, `template_name`, `basic_salary`, `overtime_rate`, `decimo_tercero`, `decimo_cuarto`, `vacaciones`, `hipotecario`, `aporte_iess`, `quirografario`, `salario_bruto`, `total_ingresos`, `total_egresos`, `salario_neto`, `added_by`, `created_at`, `aporte_type`, `salario_basico_unificado`, `tercero_acu`, `cuarto_acu`, `fondo_acu`, `fondo_reserva`, `anticipos`, `bonificacion`, `aporte_patronal_ing`, `aporte_patronal_egre`, `otros_admin`) VALUES
(15, 1, 'lilo', 500.00, '', NULL, NULL, 0.00, 0.00, 47.25, 0.00, 500.00, 41.65, 47.25, 494.40, 1, '01-12-2018 04:49:27', 12.15, 99.99, 1, 1, NULL, 41.65, 0.00, 0.00, 60.75, 60.75, 0.00),
(16, 1, 'Pepe', 450.00, '', 37.50, 32.17, 0.00, 0.00, 42.52, 0.00, 450.00, 107.15, 42.52, 514.63, 1, '12-12-2018 08:42:13', 12.15, 99.99, NULL, NULL, NULL, 37.48, 0.00, 0.00, 54.67, 54.67, 0.00),
(17, 1, 'Prueba 2019', 400.00, '', 33.33, 32.17, 0.00, 50.00, 37.80, 0.00, 400.00, 98.82, 87.80, 411.02, 1, '05-01-2019 01:56:13', 12.15, 99.99, NULL, NULL, NULL, 33.32, 0.00, 0.00, 48.60, 48.60, 0.00),
(18, 1, 'mrendon', 400.00, '', 33.33, 32.17, 0.00, 0.00, 37.80, 0.00, 400.00, 98.82, 37.80, 461.02, 6, '18-01-2019 10:58:48', 12.15, 99.99, 0, 0, 0, 33.32, 0.00, 0.00, 0.00, 0.00, 0.00),
(27, 1, 'popote', 0.00, '', 125.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 249.95, 0.00, 249.95, 1, '16-02-2019 11:05:46', 12.15, 394.00, 0, 1, 0, 124.95, 0.00, 0.00, 0.00, 0.00, 0.00),
(28, 1, 'hyhy', 0.00, '', 0.00, 33.33, 0.00, 0.00, 0.00, 0.00, 0.00, 33.33, 0.00, 33.33, 1, '16-02-2019 11:21:49', 12.15, 400.00, 1, 0, 1, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(29, 1, 'aqaq', 800.00, '', NULL, NULL, 0.00, 0.00, 75.60, 0.00, 800.00, 66.64, 75.60, 791.04, 1, '17-02-2019 12:20:31', 12.15, 394.00, 1, 1, 0, 66.64, 0.00, 0.00, 0.00, 0.00, 0.00),
(30, 1, 'lolo benitez', 400.00, '1.20', 33.33, 32.83, 0.00, 0.00, 45.80, 0.00, 400.00, 99.48, 45.80, 453.68, 1, '17-02-2019 01:03:01', 12.15, 394.00, 0, 0, 0, 33.32, 0.00, 0.00, 48.60, 48.60, 0.00),
(31, 1, 'jerovi', 800.00, '', NULL, 30.00, 0.00, 0.00, 91.60, 0.00, 800.00, 96.65, 91.60, 805.05, 6, '13-05-2019 02:07:06', 12.15, 360.00, 1, 0, 0, 66.65, 0.00, 0.00, 97.20, 97.20, 0.00),
(32, 2, 'ROL ESCUELA', 817.00, '', NULL, NULL, 10.00, 50.00, 93.55, 100.00, 817.00, 110.00, 363.55, 563.45, 1, '29-08-2019 01:24:15', 12.15, 817.00, 1, 1, 1, NULL, 100.00, 100.00, 99.27, 99.27, 20.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_system_setting`
--

CREATE TABLE `xin_system_setting` (
  `setting_id` int(111) NOT NULL,
  `application_name` varchar(255) NOT NULL,
  `default_currency` varchar(255) NOT NULL,
  `default_currency_symbol` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `show_currency` varchar(255) NOT NULL,
  `currency_position` varchar(255) NOT NULL,
  `notification_position` varchar(255) NOT NULL,
  `notification_close_btn` varchar(255) NOT NULL,
  `notification_bar` varchar(255) NOT NULL,
  `enable_registration` varchar(255) NOT NULL,
  `login_with` varchar(255) NOT NULL,
  `date_format_xi` varchar(255) NOT NULL,
  `employee_manage_own_contact` varchar(255) NOT NULL,
  `employee_manage_own_profile` varchar(255) NOT NULL,
  `employee_manage_own_qualification` varchar(255) NOT NULL,
  `employee_manage_own_work_experience` varchar(255) NOT NULL,
  `employee_manage_own_document` varchar(255) NOT NULL,
  `employee_manage_own_picture` varchar(255) NOT NULL,
  `employee_manage_own_social` varchar(255) NOT NULL,
  `employee_manage_own_bank_account` varchar(255) NOT NULL,
  `enable_attendance` varchar(255) NOT NULL,
  `enable_clock_in_btn` varchar(255) NOT NULL,
  `enable_email_notification` varchar(255) NOT NULL,
  `payroll_include_day_summary` varchar(255) NOT NULL,
  `payroll_include_hour_summary` varchar(255) NOT NULL,
  `payroll_include_leave_summary` varchar(255) NOT NULL,
  `enable_job_application_candidates` varchar(255) NOT NULL,
  `job_logo` varchar(255) NOT NULL,
  `payroll_logo` varchar(255) NOT NULL,
  `is_payslip_password_generate` int(11) NOT NULL,
  `payslip_password_format` varchar(255) NOT NULL,
  `enable_profile_background` varchar(255) NOT NULL,
  `enable_policy_link` varchar(255) NOT NULL,
  `enable_layout` varchar(255) NOT NULL,
  `job_application_format` text NOT NULL,
  `project_email` varchar(255) NOT NULL,
  `holiday_email` varchar(255) NOT NULL,
  `leave_email` varchar(255) NOT NULL,
  `payslip_email` varchar(255) NOT NULL,
  `award_email` varchar(255) NOT NULL,
  `recruitment_email` varchar(255) NOT NULL,
  `announcement_email` varchar(255) NOT NULL,
  `training_email` varchar(255) NOT NULL,
  `task_email` varchar(255) NOT NULL,
  `compact_sidebar` varchar(255) NOT NULL,
  `fixed_header` varchar(255) NOT NULL,
  `fixed_sidebar` varchar(255) NOT NULL,
  `boxed_wrapper` varchar(255) NOT NULL,
  `layout_static` varchar(255) NOT NULL,
  `system_skin` varchar(255) NOT NULL,
  `animation_effect` varchar(255) NOT NULL,
  `animation_effect_modal` varchar(255) NOT NULL,
  `animation_effect_topmenu` varchar(255) NOT NULL,
  `footer_text` varchar(255) NOT NULL,
  `system_timezone` varchar(200) NOT NULL,
  `system_ip_address` varchar(255) NOT NULL,
  `system_ip_restriction` varchar(200) NOT NULL,
  `google_maps_api_key` text NOT NULL,
  `module_recruitment` varchar(100) NOT NULL,
  `module_travel` varchar(100) NOT NULL,
  `module_performance` varchar(100) NOT NULL,
  `module_files` varchar(100) NOT NULL,
  `module_awards` varchar(100) NOT NULL,
  `module_training` varchar(100) NOT NULL,
  `module_inquiry` varchar(100) NOT NULL,
  `module_language` varchar(100) NOT NULL,
  `module_orgchart` varchar(100) NOT NULL,
  `module_accounting` varchar(111) NOT NULL,
  `module_events` varchar(100) NOT NULL,
  `module_goal_tracking` varchar(100) NOT NULL,
  `module_assets` varchar(100) NOT NULL,
  `module_projects_tasks` varchar(100) NOT NULL,
  `module_chat_box` varchar(100) NOT NULL,
  `enable_page_rendered` varchar(255) NOT NULL,
  `enable_current_year` varchar(255) NOT NULL,
  `employee_login_id` varchar(200) NOT NULL,
  `enable_auth_background` varchar(11) NOT NULL,
  `hr_version` varchar(200) NOT NULL,
  `hr_release_date` varchar(100) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_system_setting`
--

INSERT INTO `xin_system_setting` (`setting_id`, `application_name`, `default_currency`, `default_currency_symbol`, `show_currency`, `currency_position`, `notification_position`, `notification_close_btn`, `notification_bar`, `enable_registration`, `login_with`, `date_format_xi`, `employee_manage_own_contact`, `employee_manage_own_profile`, `employee_manage_own_qualification`, `employee_manage_own_work_experience`, `employee_manage_own_document`, `employee_manage_own_picture`, `employee_manage_own_social`, `employee_manage_own_bank_account`, `enable_attendance`, `enable_clock_in_btn`, `enable_email_notification`, `payroll_include_day_summary`, `payroll_include_hour_summary`, `payroll_include_leave_summary`, `enable_job_application_candidates`, `job_logo`, `payroll_logo`, `is_payslip_password_generate`, `payslip_password_format`, `enable_profile_background`, `enable_policy_link`, `enable_layout`, `job_application_format`, `project_email`, `holiday_email`, `leave_email`, `payslip_email`, `award_email`, `recruitment_email`, `announcement_email`, `training_email`, `task_email`, `compact_sidebar`, `fixed_header`, `fixed_sidebar`, `boxed_wrapper`, `layout_static`, `system_skin`, `animation_effect`, `animation_effect_modal`, `animation_effect_topmenu`, `footer_text`, `system_timezone`, `system_ip_address`, `system_ip_restriction`, `google_maps_api_key`, `module_recruitment`, `module_travel`, `module_performance`, `module_files`, `module_awards`, `module_training`, `module_inquiry`, `module_language`, `module_orgchart`, `module_accounting`, `module_events`, `module_goal_tracking`, `module_assets`, `module_projects_tasks`, `module_chat_box`, `enable_page_rendered`, `enable_current_year`, `employee_login_id`, `enable_auth_background`, `hr_version`, `hr_release_date`, `updated_at`) VALUES
(1, 'CAAS Talento Humano', 'USD - $', 'USD - $', 'symbol', 'Prefix', 'toast-top-center', 'false', 'true', 'no', 'username', 'd-m-Y', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'job_logo_1531635731.png', 'payroll_logo_1531635734.png', 0, 'employee_id', 'yes', 'yes', 'yes', 'doc,docx,pdf', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', 'fixed-header', 'fixed-sidebar', '', '', 'skin-default', 'fadeInDown', 'tada', 'tada', 'CAAS Talento Humano / Fundación Kaíros', 'America/Bogota', '::1', '', 'AIzaSyB3gP8H3eypotNeoEtezbRiF_f8Zh_p4ck', '', '', '', 'true', '', '', '', '', 'true', '', 'true', '', '', '', '', '', 'yes', 'username', 'yes', '1.0.3', '2018-03-28', '2018-03-28 04:27:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_tax_types`
--

CREATE TABLE `xin_tax_types` (
  `tax_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_tax_types`
--

INSERT INTO `xin_tax_types` (`tax_id`, `name`, `rate`, `type`, `description`, `created_at`) VALUES
(1, 'No Tax', '0', 'fixed', 'test', '25-05-2018'),
(2, 'IVU', '2', 'fixed', 'test', '25-05-2018'),
(3, 'VAT', '5', 'percentage', 'testttt', '25-05-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_termination_type`
--

CREATE TABLE `xin_termination_type` (
  `termination_type_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_termination_type`
--

INSERT INTO `xin_termination_type` (`termination_type_id`, `company_id`, `type`, `created_at`) VALUES
(1, 1, 'Renuncia Voluntaria', '22-03-2018 01:38:41'),
(2, 1, 'Despido intempestivo', '12-08-2018 02:17:55'),
(3, 1, 'Visto bueno', '12-08-2018 02:18:28'),
(4, 1, 'Muerte del empleado', '12-08-2018 02:18:45'),
(5, 1, 'Muerte o incapacidad del empleado', '12-08-2018 02:19:05'),
(6, 1, 'Liquidación de la empresa', '12-08-2018 02:19:23'),
(7, 1, 'Desahucio', '12-08-2018 02:19:33'),
(8, 1, 'Terminación de una obra', '12-08-2018 02:19:49'),
(9, 1, 'Caso fortuito', '12-08-2018 02:20:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_theme_settings`
--

CREATE TABLE `xin_theme_settings` (
  `theme_settings_id` int(11) NOT NULL,
  `fixed_layout` varchar(200) NOT NULL,
  `fixed_footer` varchar(200) NOT NULL,
  `boxed_layout` varchar(200) NOT NULL,
  `page_header` varchar(200) NOT NULL,
  `footer_layout` varchar(200) NOT NULL,
  `statistics_cards` varchar(200) NOT NULL,
  `statistics_cards_background` varchar(200) NOT NULL,
  `employee_cards` varchar(200) NOT NULL,
  `card_border_color` varchar(200) NOT NULL,
  `compact_menu` varchar(200) NOT NULL,
  `flipped_menu` varchar(200) NOT NULL,
  `right_side_icons` varchar(200) NOT NULL,
  `bordered_menu` varchar(200) NOT NULL,
  `form_design` varchar(200) NOT NULL,
  `is_semi_dark` int(11) NOT NULL,
  `semi_dark_color` varchar(200) NOT NULL,
  `top_nav_dark_color` varchar(200) NOT NULL,
  `menu_color_option` varchar(200) NOT NULL,
  `export_orgchart` varchar(100) NOT NULL,
  `export_file_title` text NOT NULL,
  `org_chart_layout` varchar(200) NOT NULL,
  `org_chart_zoom` varchar(100) NOT NULL,
  `org_chart_pan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_theme_settings`
--

INSERT INTO `xin_theme_settings` (`theme_settings_id`, `fixed_layout`, `fixed_footer`, `boxed_layout`, `page_header`, `footer_layout`, `statistics_cards`, `statistics_cards_background`, `employee_cards`, `card_border_color`, `compact_menu`, `flipped_menu`, `right_side_icons`, `bordered_menu`, `form_design`, `is_semi_dark`, `semi_dark_color`, `top_nav_dark_color`, `menu_color_option`, `export_orgchart`, `export_file_title`, `org_chart_layout`, `org_chart_zoom`, `org_chart_pan`) VALUES
(1, 'false', 'true', 'false', '', '', '4', '', '', '', 'true', 'false', 'false', 'false', 'basic_form', 1, 'bg-primary', 'bg-blue-grey', 'menu-dark', 'true', 'Kairos', 't2b', 'true', 'true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_travel_arrangement_type`
--

CREATE TABLE `xin_travel_arrangement_type` (
  `arrangement_type_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_travel_arrangement_type`
--

INSERT INTO `xin_travel_arrangement_type` (`arrangement_type_id`, `company_id`, `type`, `status`, `created_at`) VALUES
(1, 1, 'Viajes de negocios', 1, '19-03-2018 08:45:17'),
(2, 1, 'Eventos', 1, '19-03-2018 08:45:27'),
(3, 1, 'Comisión de Servicios.', 1, '12-08-2018 02:23:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_users`
--

CREATE TABLE `xin_users` (
  `user_id` int(11) NOT NULL,
  `user_role` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'administrator',
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address_1` text COLLATE utf8_unicode_ci NOT NULL,
  `address_2` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `last_login_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `xin_users`
--

INSERT INTO `xin_users` (`user_id`, `user_role`, `first_name`, `last_name`, `company_name`, `company_logo`, `user_type`, `email`, `username`, `password`, `profile_photo`, `profile_background`, `contact_number`, `gender`, `address_1`, `address_2`, `city`, `state`, `zipcode`, `country`, `last_login_date`, `last_login_ip`, `is_logged_in`, `is_active`, `created_at`) VALUES
(1, 'administrator', 'Thomas', 'Fleming', '', '', 2, 'alexiscm72@hotmail.com', 'admin', 'test123', 'user_1520720863.jpg', 'profile_background_1505458640.jpg', '12333332', 'Male', 'Address Line 1', 'Address Line 2', 'City', 'State', '12345', 230, '15-04-2018 07:36:12', '::1', 0, 1, '14-09-2017 10:02:54'),
(2, 'administrator', 'Main', 'Office', '', '', 2, 'test@test.com', 'test', 'test123', 'user_1523821315.jpg', '', '1234567890', 'Male', 'Address Line 1', 'Address Line 2', 'City', 'State', '11461', 190, '23-04-2018 05:34:47', '::1', 0, 1, '15-04-2018 06:13:08'),
(4, 'administrator', 'Fiona', 'Grace', 'HRSALE', 'employer_1524025572.jpg', 1, 'employer@test.com', '', 'test123', '', '', '1234567890', 'Male', 'Address Line 1', 'Address Line 2', 'City', 'State', '11461', 190, '23-04-2018 05:34:54', '::1', 0, 1, '18-04-2018 07:26:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_user_roles`
--

CREATE TABLE `xin_user_roles` (
  `role_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `role_access` varchar(200) NOT NULL,
  `role_resources` text NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_user_roles`
--

INSERT INTO `xin_user_roles` (`role_id`, `company_id`, `role_name`, `role_access`, `role_resources`, `created_at`) VALUES
(1, 1, 'Administrador de Sistema', '1', '0,103,13,92,88,12,14,15,16,17,18,19,20,21,22,23,2,11,9,96,3,4,5,6,7,8,10,24,25,26,97,98,99,27,28,29,30,31,48,49,50,51,52,32,33,34,35,36,37,38,39,40,41,42,43,46,104,44,45,119,120,121,122,106,107,108,47,53,54,55,56,57,60,61,62,63,93,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,89,90,91,94,95,110,111,112,113,114,115,116,117,118', '28-02-2018'),
(2, 1, 'Empleado', '2', '0,47,95', '21-03-2018'),
(3, 1, 'Dirección Talento Humano', '2', '0,103,13,92,88,12,14,15,16,17,18,19,20,21,22,23,2,11,9,96,3,4,5,6,7,8,10,24,25,26,97,98,99,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,46,47,71,72,73,74,75,76,77,78,95,111,112,117', '17-07-2018'),
(4, 1, 'Asistente de Talento Humano', '2', '0,88,14,15,18,19,9,8,97,98,99,28,29,37,38,39,46,95,112,116', '29-09-2018'),
(5, 1, 'Asistente de Departamento', '2', '0,28,29', '29-09-2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xin_warning_type`
--

CREATE TABLE `xin_warning_type` (
  `warning_type_id` int(111) NOT NULL,
  `company_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `xin_warning_type`
--

INSERT INTO `xin_warning_type` (`warning_type_id`, `company_id`, `type`, `created_at`) VALUES
(1, 1, 'Primer Memorandum', '22-03-2018 01:38:02'),
(2, 1, 'Segundo Memorandum', '16-07-2018 01:55:30'),
(3, 1, 'Pecuniaria', '31-08-2019 07:02:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `xin_advance_salaries`
--
ALTER TABLE `xin_advance_salaries`
  ADD PRIMARY KEY (`advance_salary_id`);

--
-- Indices de la tabla `xin_announcements`
--
ALTER TABLE `xin_announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indices de la tabla `xin_attendance_time`
--
ALTER TABLE `xin_attendance_time`
  ADD PRIMARY KEY (`time_attendance_id`);

--
-- Indices de la tabla `xin_companies`
--
ALTER TABLE `xin_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indices de la tabla `xin_company_info`
--
ALTER TABLE `xin_company_info`
  ADD PRIMARY KEY (`company_info_id`);

--
-- Indices de la tabla `xin_company_policy`
--
ALTER TABLE `xin_company_policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indices de la tabla `xin_company_type`
--
ALTER TABLE `xin_company_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indices de la tabla `xin_contract_type`
--
ALTER TABLE `xin_contract_type`
  ADD PRIMARY KEY (`contract_type_id`);

--
-- Indices de la tabla `xin_countries`
--
ALTER TABLE `xin_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indices de la tabla `xin_currencies`
--
ALTER TABLE `xin_currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indices de la tabla `xin_database_backup`
--
ALTER TABLE `xin_database_backup`
  ADD PRIMARY KEY (`backup_id`);

--
-- Indices de la tabla `xin_departments`
--
ALTER TABLE `xin_departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indices de la tabla `xin_designations`
--
ALTER TABLE `xin_designations`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indices de la tabla `xin_document_type`
--
ALTER TABLE `xin_document_type`
  ADD PRIMARY KEY (`document_type_id`);

--
-- Indices de la tabla `xin_email_template`
--
ALTER TABLE `xin_email_template`
  ADD PRIMARY KEY (`template_id`);

--
-- Indices de la tabla `xin_employees`
--
ALTER TABLE `xin_employees`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `xin_employee_bankaccount`
--
ALTER TABLE `xin_employee_bankaccount`
  ADD PRIMARY KEY (`bankaccount_id`);

--
-- Indices de la tabla `xin_employee_complaints`
--
ALTER TABLE `xin_employee_complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indices de la tabla `xin_employee_contacts`
--
ALTER TABLE `xin_employee_contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indices de la tabla `xin_employee_contract`
--
ALTER TABLE `xin_employee_contract`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indices de la tabla `xin_employee_documents`
--
ALTER TABLE `xin_employee_documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indices de la tabla `xin_employee_exit`
--
ALTER TABLE `xin_employee_exit`
  ADD PRIMARY KEY (`exit_id`);

--
-- Indices de la tabla `xin_employee_exit_type`
--
ALTER TABLE `xin_employee_exit_type`
  ADD PRIMARY KEY (`exit_type_id`);

--
-- Indices de la tabla `xin_employee_immigration`
--
ALTER TABLE `xin_employee_immigration`
  ADD PRIMARY KEY (`immigration_id`);

--
-- Indices de la tabla `xin_employee_leave`
--
ALTER TABLE `xin_employee_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indices de la tabla `xin_employee_location`
--
ALTER TABLE `xin_employee_location`
  ADD PRIMARY KEY (`office_location_id`);

--
-- Indices de la tabla `xin_employee_promotions`
--
ALTER TABLE `xin_employee_promotions`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indices de la tabla `xin_employee_qualification`
--
ALTER TABLE `xin_employee_qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indices de la tabla `xin_employee_resignations`
--
ALTER TABLE `xin_employee_resignations`
  ADD PRIMARY KEY (`resignation_id`);

--
-- Indices de la tabla `xin_employee_shift`
--
ALTER TABLE `xin_employee_shift`
  ADD PRIMARY KEY (`emp_shift_id`);

--
-- Indices de la tabla `xin_employee_terminations`
--
ALTER TABLE `xin_employee_terminations`
  ADD PRIMARY KEY (`termination_id`);

--
-- Indices de la tabla `xin_employee_transfer`
--
ALTER TABLE `xin_employee_transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indices de la tabla `xin_employee_travels`
--
ALTER TABLE `xin_employee_travels`
  ADD PRIMARY KEY (`travel_id`);

--
-- Indices de la tabla `xin_employee_warnings`
--
ALTER TABLE `xin_employee_warnings`
  ADD PRIMARY KEY (`warning_id`);

--
-- Indices de la tabla `xin_employee_work_experience`
--
ALTER TABLE `xin_employee_work_experience`
  ADD PRIMARY KEY (`work_experience_id`);

--
-- Indices de la tabla `xin_events`
--
ALTER TABLE `xin_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indices de la tabla `xin_file_manager`
--
ALTER TABLE `xin_file_manager`
  ADD PRIMARY KEY (`file_id`);

--
-- Indices de la tabla `xin_file_manager_settings`
--
ALTER TABLE `xin_file_manager_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indices de la tabla `xin_holidays`
--
ALTER TABLE `xin_holidays`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indices de la tabla `xin_hourly_templates`
--
ALTER TABLE `xin_hourly_templates`
  ADD PRIMARY KEY (`hourly_rate_id`);

--
-- Indices de la tabla `xin_hrsale_invoices`
--
ALTER TABLE `xin_hrsale_invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indices de la tabla `xin_hrsale_invoices_items`
--
ALTER TABLE `xin_hrsale_invoices_items`
  ADD PRIMARY KEY (`invoice_item_id`);

--
-- Indices de la tabla `xin_iess`
--
ALTER TABLE `xin_iess`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `xin_income_categories`
--
ALTER TABLE `xin_income_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `xin_languages`
--
ALTER TABLE `xin_languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Indices de la tabla `xin_leave_applications`
--
ALTER TABLE `xin_leave_applications`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indices de la tabla `xin_leave_type`
--
ALTER TABLE `xin_leave_type`
  ADD PRIMARY KEY (`leave_type_id`);

--
-- Indices de la tabla `xin_make_payment`
--
ALTER TABLE `xin_make_payment`
  ADD PRIMARY KEY (`make_payment_id`);

--
-- Indices de la tabla `xin_meetings`
--
ALTER TABLE `xin_meetings`
  ADD PRIMARY KEY (`meeting_id`);

--
-- Indices de la tabla `xin_office_location`
--
ALTER TABLE `xin_office_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indices de la tabla `xin_office_shift`
--
ALTER TABLE `xin_office_shift`
  ADD PRIMARY KEY (`office_shift_id`);

--
-- Indices de la tabla `xin_payment_method`
--
ALTER TABLE `xin_payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indices de la tabla `xin_payroll_custom_fields`
--
ALTER TABLE `xin_payroll_custom_fields`
  ADD PRIMARY KEY (`payroll_custom_id`);

--
-- Indices de la tabla `xin_performance_appraisal`
--
ALTER TABLE `xin_performance_appraisal`
  ADD PRIMARY KEY (`performance_appraisal_id`);

--
-- Indices de la tabla `xin_performance_indicator`
--
ALTER TABLE `xin_performance_indicator`
  ADD PRIMARY KEY (`performance_indicator_id`);

--
-- Indices de la tabla `xin_qualification_education_level`
--
ALTER TABLE `xin_qualification_education_level`
  ADD PRIMARY KEY (`education_level_id`);

--
-- Indices de la tabla `xin_qualification_language`
--
ALTER TABLE `xin_qualification_language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indices de la tabla `xin_qualification_skill`
--
ALTER TABLE `xin_qualification_skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indices de la tabla `xin_salary_templates`
--
ALTER TABLE `xin_salary_templates`
  ADD PRIMARY KEY (`salary_template_id`);

--
-- Indices de la tabla `xin_system_setting`
--
ALTER TABLE `xin_system_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indices de la tabla `xin_tax_types`
--
ALTER TABLE `xin_tax_types`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indices de la tabla `xin_termination_type`
--
ALTER TABLE `xin_termination_type`
  ADD PRIMARY KEY (`termination_type_id`);

--
-- Indices de la tabla `xin_theme_settings`
--
ALTER TABLE `xin_theme_settings`
  ADD PRIMARY KEY (`theme_settings_id`);

--
-- Indices de la tabla `xin_travel_arrangement_type`
--
ALTER TABLE `xin_travel_arrangement_type`
  ADD PRIMARY KEY (`arrangement_type_id`);

--
-- Indices de la tabla `xin_users`
--
ALTER TABLE `xin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `xin_user_roles`
--
ALTER TABLE `xin_user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indices de la tabla `xin_warning_type`
--
ALTER TABLE `xin_warning_type`
  ADD PRIMARY KEY (`warning_type_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `xin_advance_salaries`
--
ALTER TABLE `xin_advance_salaries`
  MODIFY `advance_salary_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `xin_announcements`
--
ALTER TABLE `xin_announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `xin_attendance_time`
--
ALTER TABLE `xin_attendance_time`
  MODIFY `time_attendance_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `xin_companies`
--
ALTER TABLE `xin_companies`
  MODIFY `company_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `xin_company_info`
--
ALTER TABLE `xin_company_info`
  MODIFY `company_info_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_company_policy`
--
ALTER TABLE `xin_company_policy`
  MODIFY `policy_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `xin_company_type`
--
ALTER TABLE `xin_company_type`
  MODIFY `type_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `xin_contract_type`
--
ALTER TABLE `xin_contract_type`
  MODIFY `contract_type_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `xin_countries`
--
ALTER TABLE `xin_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT de la tabla `xin_currencies`
--
ALTER TABLE `xin_currencies`
  MODIFY `currency_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `xin_database_backup`
--
ALTER TABLE `xin_database_backup`
  MODIFY `backup_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `xin_departments`
--
ALTER TABLE `xin_departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `xin_designations`
--
ALTER TABLE `xin_designations`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `xin_document_type`
--
ALTER TABLE `xin_document_type`
  MODIFY `document_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `xin_email_template`
--
ALTER TABLE `xin_email_template`
  MODIFY `template_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `xin_employees`
--
ALTER TABLE `xin_employees`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `xin_employee_bankaccount`
--
ALTER TABLE `xin_employee_bankaccount`
  MODIFY `bankaccount_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `xin_employee_complaints`
--
ALTER TABLE `xin_employee_complaints`
  MODIFY `complaint_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `xin_employee_contacts`
--
ALTER TABLE `xin_employee_contacts`
  MODIFY `contact_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `xin_employee_contract`
--
ALTER TABLE `xin_employee_contract`
  MODIFY `contract_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_employee_documents`
--
ALTER TABLE `xin_employee_documents`
  MODIFY `document_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_employee_exit`
--
ALTER TABLE `xin_employee_exit`
  MODIFY `exit_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_employee_exit_type`
--
ALTER TABLE `xin_employee_exit_type`
  MODIFY `exit_type_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `xin_employee_immigration`
--
ALTER TABLE `xin_employee_immigration`
  MODIFY `immigration_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_employee_leave`
--
ALTER TABLE `xin_employee_leave`
  MODIFY `leave_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_employee_location`
--
ALTER TABLE `xin_employee_location`
  MODIFY `office_location_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_employee_promotions`
--
ALTER TABLE `xin_employee_promotions`
  MODIFY `promotion_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `xin_employee_qualification`
--
ALTER TABLE `xin_employee_qualification`
  MODIFY `qualification_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `xin_employee_resignations`
--
ALTER TABLE `xin_employee_resignations`
  MODIFY `resignation_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_employee_shift`
--
ALTER TABLE `xin_employee_shift`
  MODIFY `emp_shift_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_employee_terminations`
--
ALTER TABLE `xin_employee_terminations`
  MODIFY `termination_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_employee_transfer`
--
ALTER TABLE `xin_employee_transfer`
  MODIFY `transfer_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_employee_travels`
--
ALTER TABLE `xin_employee_travels`
  MODIFY `travel_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_employee_warnings`
--
ALTER TABLE `xin_employee_warnings`
  MODIFY `warning_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_employee_work_experience`
--
ALTER TABLE `xin_employee_work_experience`
  MODIFY `work_experience_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `xin_events`
--
ALTER TABLE `xin_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_file_manager`
--
ALTER TABLE `xin_file_manager`
  MODIFY `file_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `xin_file_manager_settings`
--
ALTER TABLE `xin_file_manager_settings`
  MODIFY `setting_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_holidays`
--
ALTER TABLE `xin_holidays`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `xin_hourly_templates`
--
ALTER TABLE `xin_hourly_templates`
  MODIFY `hourly_rate_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_hrsale_invoices`
--
ALTER TABLE `xin_hrsale_invoices`
  MODIFY `invoice_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_hrsale_invoices_items`
--
ALTER TABLE `xin_hrsale_invoices_items`
  MODIFY `invoice_item_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_iess`
--
ALTER TABLE `xin_iess`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `xin_income_categories`
--
ALTER TABLE `xin_income_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `xin_languages`
--
ALTER TABLE `xin_languages`
  MODIFY `language_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `xin_leave_applications`
--
ALTER TABLE `xin_leave_applications`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `xin_leave_type`
--
ALTER TABLE `xin_leave_type`
  MODIFY `leave_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `xin_make_payment`
--
ALTER TABLE `xin_make_payment`
  MODIFY `make_payment_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `xin_meetings`
--
ALTER TABLE `xin_meetings`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `xin_office_location`
--
ALTER TABLE `xin_office_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `xin_office_shift`
--
ALTER TABLE `xin_office_shift`
  MODIFY `office_shift_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `xin_payment_method`
--
ALTER TABLE `xin_payment_method`
  MODIFY `payment_method_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `xin_payroll_custom_fields`
--
ALTER TABLE `xin_payroll_custom_fields`
  MODIFY `payroll_custom_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xin_performance_appraisal`
--
ALTER TABLE `xin_performance_appraisal`
  MODIFY `performance_appraisal_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_performance_indicator`
--
ALTER TABLE `xin_performance_indicator`
  MODIFY `performance_indicator_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_qualification_education_level`
--
ALTER TABLE `xin_qualification_education_level`
  MODIFY `education_level_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `xin_qualification_language`
--
ALTER TABLE `xin_qualification_language`
  MODIFY `language_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `xin_qualification_skill`
--
ALTER TABLE `xin_qualification_skill`
  MODIFY `skill_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `xin_salary_templates`
--
ALTER TABLE `xin_salary_templates`
  MODIFY `salary_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `xin_system_setting`
--
ALTER TABLE `xin_system_setting`
  MODIFY `setting_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_tax_types`
--
ALTER TABLE `xin_tax_types`
  MODIFY `tax_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `xin_termination_type`
--
ALTER TABLE `xin_termination_type`
  MODIFY `termination_type_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `xin_theme_settings`
--
ALTER TABLE `xin_theme_settings`
  MODIFY `theme_settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `xin_travel_arrangement_type`
--
ALTER TABLE `xin_travel_arrangement_type`
  MODIFY `arrangement_type_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `xin_users`
--
ALTER TABLE `xin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `xin_user_roles`
--
ALTER TABLE `xin_user_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `xin_warning_type`
--
ALTER TABLE `xin_warning_type`
  MODIFY `warning_type_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
