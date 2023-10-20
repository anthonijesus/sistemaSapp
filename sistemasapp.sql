-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 13:13:39
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
-- Base de datos: `sistemasapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(3, 'Solicitudes a Mantenimiento', 'Esta categoria se crea para registrar todas las solicitudes realizadas al departamento de Mantenimiento', '2023-10-13 03:10:57', '2023-10-13 03:10:57'),
(4, 'Solicitudes a Padron Social', 'Esta categoria se crea para registrar todas las solicitudes realizadas al departamento de Padron Social', '2023-10-13 03:12:18', '2023-10-16 18:39:14'),
(5, 'Solicitudes a Marketing', 'Esta categoria se crea para registrar todas las solicitudes realizadas al departamento de Marketing', '2023-10-13 03:13:57', '2023-10-13 03:13:57'),
(6, 'Solicitudes a Departamento de Compras', 'Esta categoria se crea para registrar todas las solicitudes realizadas al departamento de Compras', '2023-10-13 03:23:47', '2023-10-16 22:13:16'),
(7, 'Solicitudes a Recursos Humanos', 'En esta categoria podrás realizar solicitudes a nuestro departamento de RRHH, referente a: recibo de sueldo, información general.', '2023-10-13 15:20:26', '2023-10-13 15:20:26'),
(8, 'Solicitudes a Tesorería', 'Esta categoria se crea para registrar todas las solicitudes realizadas al departamento de Tesorería', '2023-10-13 22:12:18', '2023-10-16 18:39:26'),
(11, 'Solicitudes a Departamento TI', 'En esta sección podrás realizar solicitudes al departamento de TI relacionadas con el sistema SAPP, redes, impresoras, sistema Windows, entre otros', '2023-10-14 19:50:23', '2023-10-16 22:13:02'),
(14, 'Solicitudes a Calidad', 'Esta categoria se crea para registrar todas las solicitudes realizadas al departamento de Calidad', '2023-10-16 22:53:06', '2023-10-16 22:53:06'),
(15, 'Solicitud de Eventos a Despacho', 'En esta sección podrás realizar solicitudes que realizan a despacho', '2023-10-16 22:55:28', '2023-10-16 22:55:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `profesor` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `descripcion`, `profesor`, `created_at`, `updated_at`) VALUES
(1, 'Laravael', 'Curso de Laravel 10', 'Youtube.com', '2023-09-01 01:13:21', '2023-09-01 01:13:21'),
(2, 'PHP', 'Curso de php', 'pedrito', NULL, NULL),
(3, 'java', 'curso de javascrip', 'marcos', NULL, NULL),
(4, 'css', 'curso de ccs', 'marcos', NULL, NULL),
(5, 'diseño web', 'curso de diseño web', 'marcos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_17_210715_create_cursos_table', 1),
(6, '2023_08_30_212306_add_avatar_to_users_table', 2),
(7, '2023_08_30_220740_cambiar_avatar_to_users_table', 3),
(8, '2023_08_31_224216_cambia_avatar_to_users_table', 4),
(10, '2023_09_20_210043_add_usuario_users_table', 5),
(11, '2023_09_21_220028_create_sol_t_i_table', 6),
(12, '2023_09_21_220028_create_solTI_table', 7),
(13, '2023_10_09_180320_create_categorias_table', 7),
(14, '2023_10_16_145426_create_sub-categorias_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('anthonijesus@gmail.com', '$2y$10$O2ypyeLrlL54KIGrHEMjEu/ddv/1Jufjqx15Vu2t6WWI17N9/09sy', '2023-10-11 21:46:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solti`
--

CREATE TABLE `solti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `categoria_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 11, 'Hardware PCs', '2023-10-16 18:58:36', '2023-10-16 22:11:02'),
(2, 11, 'Software Sistema Operativo', '2023-10-16 18:59:17', '2023-10-16 18:59:17'),
(57, 11, 'Sistema SAPP', '2023-10-16 21:45:46', '2023-10-16 21:45:46'),
(60, 11, 'Hardware - Impresoras', '2023-10-16 22:13:44', '2023-10-16 22:13:44'),
(61, 11, 'Hardware - Redes e Internet', '2023-10-16 22:17:29', '2023-10-16 22:17:29'),
(62, 11, 'Software Imbit', '2023-10-16 22:34:30', '2023-10-16 22:34:30'),
(63, 11, 'Software Magik', '2023-10-16 22:34:42', '2023-10-16 22:34:42'),
(64, 11, 'Software Historia Clínica Electrónica', '2023-10-16 22:35:03', '2023-10-16 22:35:03'),
(65, 11, 'Software Otros', '2023-10-16 22:35:20', '2023-10-16 22:35:20'),
(66, 11, 'Software Tempo', '2023-10-16 22:35:42', '2023-10-16 22:35:42'),
(67, 11, 'Otro Tipo de Solicitud', '2023-10-16 22:36:30', '2023-10-16 22:36:30'),
(68, 5, 'Papelería', '2023-10-16 22:37:47', '2023-10-16 22:37:47'),
(69, 5, 'Folletos', '2023-10-16 22:37:59', '2023-10-16 22:37:59'),
(70, 5, 'Lapiceras', '2023-10-16 22:38:13', '2023-10-16 22:38:13'),
(71, 5, 'Pantallas', '2023-10-16 22:38:23', '2023-10-16 22:38:23'),
(72, 5, 'Carteleras', '2023-10-16 22:38:37', '2023-10-16 22:38:37'),
(73, 5, 'Tapabocas', '2023-10-16 22:38:48', '2023-10-16 22:38:48'),
(74, 5, 'Sitio Web', '2023-10-16 22:39:06', '2023-10-16 22:39:06'),
(75, 11, 'Otro Tipo de Solicitud', '2023-10-16 22:39:15', '2023-10-16 22:39:15'),
(76, 3, 'Inmuebles / Instalaciones', '2023-10-16 22:40:46', '2023-10-16 22:40:46'),
(77, 3, 'Vehículos', '2023-10-16 22:41:00', '2023-10-16 22:41:00'),
(78, 3, 'Equipos', '2023-10-16 22:41:10', '2023-10-16 22:41:10'),
(79, 3, 'Solicitud de Oxigeno', '2023-10-16 22:41:31', '2023-10-16 22:41:31'),
(80, 3, 'Otro Tipo de Solicitud', '2023-10-16 22:41:39', '2023-10-16 22:41:39'),
(81, 3, 'Tendido Eléctrico', '2023-10-16 22:42:24', '2023-10-16 22:42:24'),
(82, 3, 'Tendido de Red', '2023-10-16 22:42:35', '2023-10-16 22:42:35'),
(83, 7, 'Liquidación de Sueldos', '2023-10-16 22:43:12', '2023-10-16 22:43:12'),
(84, 7, 'Constancias', '2023-10-16 22:43:24', '2023-10-16 22:43:24'),
(85, 7, 'Capacitaciones', '2023-10-16 22:43:40', '2023-10-16 22:43:40'),
(86, 7, 'Necesidades del Personal', '2023-10-16 22:43:55', '2023-10-16 22:43:55'),
(87, 7, 'Otro Tipo de Solicitud', '2023-10-16 22:44:07', '2023-10-16 22:44:07'),
(88, 4, 'Socio SAPP', '2023-10-16 22:45:08', '2023-10-16 22:45:08'),
(89, 4, 'Socio Mutual', '2023-10-16 22:45:26', '2023-10-16 22:45:26'),
(90, 4, 'Área Protegida', '2023-10-16 22:45:36', '2023-10-16 22:45:36'),
(91, 4, 'Alta de Cliente', '2023-10-16 22:45:51', '2023-10-16 22:45:51'),
(92, 4, 'Otro Tipo de Solicitud', '2023-10-16 22:46:02', '2023-10-16 22:46:02'),
(93, 6, 'Bobina de Cable UTP', '2023-10-16 22:47:11', '2023-10-16 22:47:11'),
(94, 6, 'Cable de Carga', '2023-10-16 22:47:41', '2023-10-16 22:47:41'),
(95, 6, 'Capsula de Café', '2023-10-16 22:47:51', '2023-10-16 22:47:51'),
(96, 6, 'Disco Portatil', '2023-10-16 22:48:10', '2023-10-16 22:48:10'),
(97, 6, 'Otro Tipo de Solicitud', '2023-10-16 22:48:23', '2023-10-16 22:48:23'),
(98, 8, 'Comsultas Sobre Débito / Tarjetas', '2023-10-16 22:49:44', '2023-10-16 22:50:14'),
(99, 8, 'Cobradores', '2023-10-16 22:51:04', '2023-10-16 22:51:04'),
(100, 8, 'Recibos de Pago en Domicilio', '2023-10-16 22:51:28', '2023-10-16 22:51:28'),
(101, 8, 'Otro Tipo de Solicitud', '2023-10-16 22:51:51', '2023-10-16 22:51:51'),
(102, 14, 'Nuevos Documentos', '2023-10-16 22:53:27', '2023-10-16 22:53:27'),
(103, 14, 'Actualización de Documentos', '2023-10-16 22:53:44', '2023-10-16 22:53:44'),
(104, 14, 'Obsoletos', '2023-10-16 22:53:57', '2023-10-16 22:53:57'),
(105, 15, 'Eventos No Presencial', '2023-10-16 22:55:54', '2023-10-16 22:55:54'),
(106, 15, 'Evento Presencial', '2023-10-16 22:56:03', '2023-10-16 22:56:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `rol` varchar(50) DEFAULT 'usuario',
  `email` varchar(255) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `telefono`, `rol`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anthoni Jesus Merchan', '097414377', 'administrador', 'anthonijesus@gmail.com', 'images/1697304096.jpg', NULL, '$2y$10$HxPf3gDRYrRE47ICTZJgX.5GRI9SqFoMJfpEpEwJlQFXfvsG7ULqW', NULL, '2023-10-14 19:41:06', '2023-10-15 01:05:49'),
(22, 'Rocio Marquez', '095784519', 'jefe', 'rocio@gmail.com', 'images/1697199243.png', NULL, '$2y$10$2Xr37EZNXUY6S9.gj3xtgOHbBvAnkKMt7rEVypxy8VBoxZH1sKZbS', NULL, '2023-10-04 03:17:39', '2023-10-13 22:39:47'),
(24, 'Juan Prado', '095784514', 'usuario', 'Anthoni@gmail.com', NULL, NULL, '$2y$10$BPCnos8gx2WOe1FUAAITremAXJQ/qIoBDid4ZfEhbuEtTJyeJdc9q', NULL, '2023-10-06 20:58:20', '2023-10-12 00:59:25'),
(28, 'Margot Suarez', '95845621', 'usuario', 'margot@gmail.com', NULL, NULL, '$2y$10$xyct/.4b49z1jX6vi/kLg.wK8qwCX6XZK/Ujfopp0ZCndeHg88yXu', NULL, '2023-10-07 01:14:44', '2023-10-07 01:14:44'),
(30, 'Norelky Vanezca', '097094806', 'administrador', 'norelky@gmail.com', 'images/1696973386.jpg', NULL, '$2y$10$cIZ7cGaCl5SB7/lP4RtnlebKWY5M0x4pveAASBIia0F4ln7Bqtt6W', NULL, '2023-10-09 17:11:40', '2023-10-11 00:29:46'),
(32, 'Maria Prado', '095125748', 'usuario', 'mprado@gmail.com', NULL, NULL, '$2y$10$oZIaOGvvreWFGxAIe2zFUubScz2U446cpKwwo7NeLTsT2p0NTSBbW', NULL, '2023-10-09 17:39:41', '2023-10-09 17:45:22'),
(33, 'Carlos Mendez', '085451236', 'usuario', 'cmendez@gmail.com', NULL, NULL, '$2y$10$4z9gmw96SZtHTn45Gtaa3OwCsGcXLUcMCOSl9fPl8En.dg810wssC', NULL, '2023-10-09 17:40:37', '2023-10-09 17:47:11'),
(34, 'Jesus Marcano', '095126895', 'usuario', 'Jesus@gmail.com', NULL, NULL, '$2y$10$tviE04dWkeoEKV5YfNeq3epv1HDVJ.wkagz7EP.8NIWjcHRI4.g72', NULL, '2023-10-09 17:41:39', '2023-10-09 17:46:45'),
(35, 'Roberto Marquez', '095845269', 'usuario', 'robert@gmail.com', NULL, NULL, '$2y$10$FjaWfRj0tsrmbgRjA.6sIuVnFOTd0NcQPtl7WllGUjsY7DTO.7Us.', NULL, '2023-10-11 15:22:58', '2023-10-11 15:22:58'),
(36, 'Raul Suarez', '095784854', 'usuario', 'raul@gmail.com', NULL, NULL, '$2y$10$949mWXze6zBCbqZVjp6rnuI6l2ZSLZuX9vqxSqRJpLMsQXgFgsiSu', NULL, '2023-10-11 22:09:23', '2023-10-16 16:52:08'),
(37, 'Pedro perez', '095632145', 'usuario', 'pedro@gmail.com', NULL, NULL, '$2y$10$DA6e/OJyXyP784vPnTqx1eOXPMTSqmryafGTXVCAJx2QOISH9bTQa', NULL, '2023-10-12 00:47:29', '2023-10-12 00:47:29'),
(38, 'juan carmona', '095451263', 'usuario', 'juanjaj@gmail.com', NULL, NULL, '$2y$10$jnr.NszoPHVzKqJOgWXwLOye434miZDRn4Klv9SXEvXWrJLyOlEYi', NULL, '2023-10-12 00:59:58', '2023-10-12 00:59:58'),
(39, 'Pepe Gomez', '095621121', 'usuario', 'pepegome@gmail.com', NULL, NULL, '$2y$10$4dNkdtFPBtIj2a6vz/BCFeEXMLcNt0HKZblKMRHW0hmHPJ2xoB4S.', NULL, '2023-10-12 03:59:26', '2023-10-12 03:59:46'),
(40, 'Ramón Carpio', '096784562', 'usuario', 'ramonc@gmail.com', NULL, NULL, '$2y$10$/7lAcSjAaJTEnEuBsjNDyuvKwJ6zYAQ6iZx57.w4AkJEw5kgxYx3.', NULL, '2023-10-12 15:20:31', '2023-10-12 15:20:31'),
(41, 'Juana Peña', '092156125', 'usuario', 'juanapena@gmail.com', NULL, NULL, '$2y$10$47.iAGB9qgcDYWuKP2WRmuxIu49SxnNjcPayszNgNTfPLPJAEzmsW', NULL, '2023-10-12 15:29:34', '2023-10-12 15:30:29'),
(42, 'Patricia Herrera', '098451632', 'usuario', 'patriciaherrera@gmail.com', NULL, NULL, '$2y$10$6LRQMOJ4uXsxh0RL3z1iP.g5SInnPllP52/Vm066tGPJr8VBwz4z2', NULL, '2023-10-12 15:30:05', '2023-10-12 15:30:05'),
(43, 'Carmen Delgado', '095125784', 'usuario', 'carmendelagado@gmail.com', NULL, NULL, '$2y$10$gvhS4sbqaVHE.90r.N1KYeKg6bLN42AuF5n6eveqTeB5mlcZjDUP2', NULL, '2023-10-12 15:31:33', '2023-10-12 15:31:33'),
(44, 'Juana Camejo', '095874562', 'usuario', 'juanacamejo@gmail.com', NULL, NULL, '$2y$10$0v7CUg9aP16ROKPCLqp8B.usd/XMarn4Kc1ANgdYWrfoX/os12ckm', NULL, '2023-10-13 03:14:31', '2023-10-13 03:14:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `solti`
--
ALTER TABLE `solti`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategorias_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solti`
--
ALTER TABLE `solti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
