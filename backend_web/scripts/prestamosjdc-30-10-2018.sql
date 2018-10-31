-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authorizations`
--

CREATE TABLE `authorizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `request_id` int(10) UNSIGNED NOT NULL,
  `authorization_status_id` int(10) UNSIGNED NOT NULL,
  `approved_by` int(10) UNSIGNED DEFAULT NULL,
  `received_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authorizations`
--

INSERT INTO `authorizations` (`id`, `description`, `request_id`, `authorization_status_id`, `approved_by`, `received_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, NULL, 5, 2, 1, NULL, NULL, '2018-10-07 19:11:16', '2018-10-07 19:11:16'),
(4, NULL, 7, 2, NULL, NULL, NULL, '2018-10-14 02:05:38', '2018-10-14 02:05:38'),
(5, NULL, 8, 2, NULL, NULL, NULL, '2018-10-16 14:16:52', '2018-10-16 14:16:52'),
(6, NULL, 8, 2, NULL, NULL, NULL, '2018-10-23 01:10:53', '2018-10-23 01:10:53'),
(7, NULL, 8, 2, NULL, NULL, NULL, '2018-10-23 01:11:04', '2018-10-23 01:11:04'),
(8, NULL, 8, 2, NULL, NULL, NULL, '2018-10-23 01:11:17', '2018-10-23 01:11:17'),
(9, NULL, 8, 4, 1, NULL, NULL, '2018-10-23 01:42:50', '2018-10-23 01:42:50'),
(10, NULL, 7, 2, NULL, NULL, NULL, '2018-10-23 13:17:39', '2018-10-23 13:17:39'),
(11, NULL, 7, 4, 1, NULL, NULL, '2018-10-23 13:19:21', '2018-10-23 13:19:21'),
(12, NULL, 9, 2, NULL, NULL, NULL, '2018-10-23 13:20:31', '2018-10-23 13:20:31'),
(13, NULL, 5, 5, NULL, NULL, NULL, '2018-10-26 15:50:36', '2018-10-26 15:50:36'),
(14, NULL, 5, 2, NULL, NULL, NULL, '2018-10-26 18:10:24', '2018-10-26 18:10:24'),
(15, NULL, 5, 5, NULL, NULL, NULL, '2018-10-26 21:08:25', '2018-10-26 21:08:25'),
(16, NULL, 5, 2, NULL, NULL, NULL, '2018-10-26 21:08:37', '2018-10-26 21:08:37'),
(17, NULL, 5, 5, NULL, NULL, NULL, '2018-10-26 21:08:51', '2018-10-26 21:08:51'),
(18, NULL, 5, 2, NULL, NULL, NULL, '2018-10-26 21:11:53', '2018-10-26 21:11:53'),
(19, NULL, 10, 1, NULL, NULL, NULL, '2018-10-30 14:24:27', '2018-10-30 14:24:27'),
(20, NULL, 10, 4, 1, NULL, NULL, '2018-10-30 14:25:51', '2018-10-30 14:25:51'),
(21, NULL, 11, 1, NULL, NULL, NULL, '2018-10-30 14:33:56', '2018-10-30 14:33:56'),
(22, NULL, 11, 4, 1, NULL, NULL, '2018-10-30 14:35:53', '2018-10-30 14:35:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authorizations_has_resources`
--

CREATE TABLE `authorizations_has_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `resource_id` int(10) UNSIGNED NOT NULL,
  `authorization_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authorizations_has_resources`
--

INSERT INTO `authorizations_has_resources` (`id`, `quantity`, `resource_id`, `authorization_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 4, '2018-10-14 02:05:38', '2018-10-14 02:05:38'),
(3, 1, 3, 5, '2018-10-14 02:05:38', '2018-10-14 02:05:38'),
(4, 1, 3, 6, '2018-10-23 01:10:53', '2018-10-23 01:10:53'),
(5, 1, 3, 7, '2018-10-23 01:11:04', '2018-10-23 01:11:04'),
(6, 1, 4, 7, '2018-10-23 01:11:04', '2018-10-23 01:11:04'),
(7, 1, 3, 8, '2018-10-23 01:11:18', '2018-10-23 01:11:18'),
(8, 1, 6, 10, '2018-10-23 13:17:39', '2018-10-23 13:17:39'),
(9, 1, 6, 12, '2018-10-23 13:20:31', '2018-10-23 13:20:31'),
(10, 1, 2, 19, '2018-10-30 14:24:28', '2018-10-30 14:24:28'),
(11, 1, 3, 21, '2018-10-30 14:33:57', '2018-10-30 14:33:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authorizations_has_spaces`
--

CREATE TABLE `authorizations_has_spaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `authorization_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authorizations_has_spaces`
--

INSERT INTO `authorizations_has_spaces` (`id`, `space_id`, `authorization_id`, `created_at`, `updated_at`) VALUES
(2, 6, 2, '2018-10-07 19:11:16', '2018-10-07 19:11:16'),
(3, 1, 5, '2018-10-16 14:16:52', '2018-10-16 14:16:52'),
(4, 1, 6, '2018-10-23 01:10:53', '2018-10-23 01:10:53'),
(5, 1, 7, '2018-10-23 01:11:04', '2018-10-23 01:11:04'),
(6, 1, 8, '2018-10-23 01:11:18', '2018-10-23 01:11:18'),
(7, 6, 13, '2018-10-26 15:50:36', '2018-10-26 15:50:36'),
(8, 6, 14, '2018-10-26 18:10:24', '2018-10-26 18:10:24'),
(9, 6, 15, '2018-10-26 21:08:25', '2018-10-26 21:08:25'),
(10, 6, 16, '2018-10-26 21:08:37', '2018-10-26 21:08:37'),
(11, 6, 17, '2018-10-26 21:08:51', '2018-10-26 21:08:51'),
(12, 6, 18, '2018-10-26 21:11:54', '2018-10-26 21:11:54'),
(13, 1, 21, '2018-10-30 14:33:56', '2018-10-30 14:33:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authorization_statuses`
--

CREATE TABLE `authorization_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authorization_statuses`
--

INSERT INTO `authorization_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente', '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(2, 'Aprobada', '2018-08-26 08:13:24', '2018-08-26 08:13:24'),
(3, 'No Aprobada', '2018-08-26 08:14:50', '2018-08-26 08:14:50'),
(4, 'Cancelada', '2018-08-26 08:18:10', '2018-08-26 08:18:10'),
(5, 'Entregada', '2018-08-26 08:18:10', '2018-08-26 08:18:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buildings`
--

CREATE TABLE `buildings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomenclature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headquarter_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `nomenclature`, `headquarter_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Edificio Central', 'EC', 1, NULL, '2018-08-29 10:00:00', '2018-08-29 10:00:00'),
(2, 'Edificio Prueba', 'EP-1', 2, NULL, '2018-08-29 10:00:00', '2018-08-29 10:00:00'),
(3, 'Edificio de Prueba del campo', 'EPDC', 4, NULL, '2018-10-03 09:43:24', '2018-10-03 09:44:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complements`
--

CREATE TABLE `complements` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `complements`
--

INSERT INTO `complements` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Video Proyector', '2018-08-26 20:05:00', '2018-08-26 20:05:00'),
(2, 'Extension Polo a Tierra', '2018-08-26 20:06:00', '2018-08-26 20:06:00'),
(3, 'Maletin en Cuero', '2018-08-26 20:07:00', '2018-08-26 20:07:00'),
(4, 'Cable de Poder', '2018-08-26 20:07:00', '2018-08-26 20:07:00'),
(5, 'Cable de Interfase', '2018-08-26 20:08:00', '2018-08-26 20:08:00'),
(6, 'Cable USB', '2018-08-26 20:08:00', '2018-08-26 20:09:00'),
(7, 'Control Remoto', '2018-08-26 20:09:00', '2018-08-26 20:09:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complements_has_resources`
--

CREATE TABLE `complements_has_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `resource_id` int(10) UNSIGNED NOT NULL,
  `complement_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departaments`
--

CREATE TABLE `departaments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departaments`
--

INSERT INTO `departaments` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Antioquia', 5, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(2, 'Atlantico', 8, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(3, 'D. C. Santa Fe de Bogotá', 11, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(4, 'Bolivar', 13, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(5, 'Boyaca', 15, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(6, 'Caldas', 17, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(7, 'Caqueta', 18, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(8, 'Cauca', 19, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(9, 'Cesar', 20, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(10, 'Cordova', 23, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(11, 'Cundinamarca', 25, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(12, 'Choco', 27, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(13, 'Huila', 41, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(14, 'La Guajira', 44, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(15, 'Magdalena', 47, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(16, 'Meta', 50, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(17, 'Nariño', 52, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(18, 'Norte de Santander', 54, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(19, 'Quindio', 63, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(20, 'Risaralda', 66, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(21, 'Santander', 68, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(22, 'Sucre', 70, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(23, 'Tolima', 73, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(24, 'Valle', 76, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(25, 'Arauca', 81, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(26, 'Casanare', 85, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(27, 'Putumayo', 86, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(28, 'San Andres', 88, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(29, 'Amazonas', 91, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(30, 'Guainia', 94, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(31, 'Guaviare', 95, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(32, 'Vaupes', 97, '2018-08-26 08:12:28', '2018-08-26 08:12:28'),
(33, 'Vichada', 99, '2018-08-26 08:12:28', '2018-08-26 08:12:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencies`
--

CREATE TABLE `dependencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headquarter_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencies`
--

INSERT INTO `dependencies` (`id`, `name`, `email`, `headquarter_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dependencia de Prueba', 'francisco@appsolution.co', 1, '2018-10-23 13:00:12', '2018-08-26 10:00:00', '2018-10-23 13:00:12'),
(2, 'Parranderia', 'fjgonzalezs@correo.udistrital.edu.co', 4, '2018-10-23 13:00:12', '2018-08-26 10:00:00', '2018-10-23 13:00:12'),
(3, 'Jardineria', 'asmunlothar@gmail.com', 3, '2018-10-23 13:00:03', '2018-08-27 12:18:34', '2018-10-23 13:00:03'),
(4, 'asdasd', 'aaa@aa.com', 1, '2018-08-28 00:55:36', '2018-08-27 12:38:17', '2018-08-28 00:55:36'),
(5, 'Audiovisuales', 'audiovisuales@gmail.com', 1, NULL, '2018-10-23 12:57:37', '2018-10-23 12:57:37'),
(6, 'Bienestar Universitario', 'bienestar@gmail.com', 1, NULL, '2018-10-23 12:58:07', '2018-10-23 12:58:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencies_has_users`
--

CREATE TABLE `dependencies_has_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendant_id` int(10) UNSIGNED NOT NULL,
  `dependency_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencies_has_users`
--

INSERT INTO `dependencies_has_users` (`id`, `attendant_id`, `dependency_id`, `created_at`, `updated_at`) VALUES
(6, 2, 3, '2018-08-27 12:35:04', '2018-08-27 12:35:04'),
(7, 1, 3, '2018-08-27 12:35:04', '2018-08-27 12:35:04'),
(8, 4, 4, '2018-08-27 12:38:17', '2018-08-27 12:38:17'),
(9, 4, 5, '2018-10-23 12:57:37', '2018-10-23 12:57:37'),
(10, 4, 6, '2018-10-23 12:58:07', '2018-10-23 12:58:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `push_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dni_types`
--

CREATE TABLE `dni_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dni_types`
--

INSERT INTO `dni_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cedula de Ciudadania', '2018-08-26 08:20:00', '2018-08-26 08:20:00'),
(2, 'Tarjeta de Identidad', '2018-08-26 08:21:00', '2018-08-26 08:21:00'),
(3, 'Pasaporte', '2018-08-26 08:24:00', '2018-08-26 08:24:00'),
(4, 'Cedula de Extranjeria', '2018-08-26 08:25:00', '2018-08-26 08:25:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Femenino', '2018-08-26 08:26:00', '2018-08-26 08:26:00'),
(2, 'Masculino', '2018-08-26 08:27:00', '2018-08-26 08:27:00'),
(3, 'Comunidad LGBT', '2018-08-26 08:31:00', '2018-08-26 08:31:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `headquarters`
--

CREATE TABLE `headquarters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `headquarters`
--

INSERT INTO `headquarters` (`id`, `name`, `address`, `town_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Alvaro Castillo', 'Carrera 11 # 11-44', 215, NULL, '2018-08-26 20:25:00', '2018-08-26 20:25:00'),
(2, 'Crisanto Luque', 'Calle 17 # 9 - 85', 215, NULL, '2018-08-26 20:29:00', '2018-08-26 20:29:00'),
(3, 'Campus Universitario', 'Kilómetro 1 Via Tunja - Villa de Leyva', 215, NULL, '2018-08-26 20:31:00', '2018-10-17 10:36:53'),
(4, 'Clinica Veterinaria Francisco de Asis', 'Vereda Otrolado', 316, NULL, '2018-08-26 20:34:00', '2018-08-26 20:34:00'),
(5, 'Sede principal Leticia', 'Selvita siempre viva 123', 1092, NULL, '2018-10-03 08:17:03', '2018-10-17 10:36:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_25_222127_create_user_types_table', 1),
(2, '2018_08_25_222539_create_user_statuses_table', 1),
(3, '2018_08_25_222600_create_dni_types_table', 1),
(4, '2018_08_25_222620_create_genders_table', 1),
(5, '2018_08_25_222756_create_modalities_table', 1),
(6, '2018_08_25_222809_create_program_types_table', 1),
(7, '2018_08_25_222826_create_working_days_table', 1),
(8, '2018_08_25_222938_create_departaments_table', 1),
(9, '2018_08_25_223006_create_towns_table', 1),
(10, '2018_08_25_223028_create_space_types_table', 1),
(11, '2018_08_25_223038_create_space_statuses_table', 1),
(12, '2018_08_25_223051_create_property_types_table', 1),
(13, '2018_08_25_223109_create_resource_types_table', 1),
(14, '2018_08_25_223120_create_resource_categories_table', 1),
(15, '2018_08_25_223136_create_complements_table', 1),
(16, '2018_08_25_223154_create_physical_states_table', 1),
(17, '2018_08_25_223211_create_resource_statuses_table', 1),
(18, '2018_08_25_223231_create_participant_types_table', 1),
(19, '2018_08_25_223519_create_authorization_statuses_table', 1),
(20, '2018_08_25_223539_create_request_types_table', 1),
(21, '2018_08_25_223643_create_headquarters_table', 1),
(22, '2018_08_25_223700_create_buildings_table', 1),
(23, '2018_08_25_223724_create_dependencies_table', 1),
(24, '2018_08_25_223739_create_programs_table', 1),
(25, '2018_08_25_223758_create_spaces_table', 1),
(26, '2018_08_25_223836_create_resources_table', 1),
(27, '2018_08_25_223950_create_spaces_has_resources_table', 1),
(28, '2018_08_25_224023_create_complements_has_resources_table', 1),
(29, '2018_08_25_224024_create_users_table', 1),
(30, '2018_08_25_224025_create_password_resets_table', 1),
(31, '2018_08_25_224026_create_devices_table', 1),
(32, '2018_08_25_224208_create_dependencies_has_users_table', 1),
(33, '2018_08_25_224255_create_resources_has_users_table', 1),
(34, '2018_08_25_224324_create_requests_table', 1),
(35, '2018_08_25_224922_create_participant_types_has_requests_table', 1),
(36, '2018_08_25_225143_create_authorizations_table', 1),
(37, '2018_08_25_225203_create_authorizations_has_resources_table', 1),
(38, '2018_08_25_225216_create_authorizations_has_spaces_table', 1),
(39, '2018_08_26_014914_create_programs_has_modalities_table', 1),
(40, '2018_08_26_015105_create_programs_has_working_days_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalities`
--

CREATE TABLE `modalities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modalities`
--

INSERT INTO `modalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Presencial', '2018-08-26 08:32:00', '2018-08-26 08:32:00'),
(2, 'Semi Presencial', '2018-08-26 08:33:00', '2018-08-26 08:33:00'),
(3, 'Distancia', '2018-08-26 08:33:00', '2018-08-26 08:33:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participant_types`
--

CREATE TABLE `participant_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `participant_types`
--

INSERT INTO `participant_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Interno', '2018-08-26 08:34:00', '2018-08-26 08:34:00'),
(2, 'Externo', '2018-08-26 08:35:00', '2018-08-26 08:35:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participant_types_has_requests`
--

CREATE TABLE `participant_types_has_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `participant_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `participant_types_has_requests`
--

INSERT INTO `participant_types_has_requests` (`id`, `request_id`, `participant_type_id`, `created_at`, `updated_at`) VALUES
(6, 8, 1, '2018-10-23 01:11:17', '2018-10-23 01:11:17'),
(12, 5, 1, '2018-10-26 21:11:53', '2018-10-26 21:11:53'),
(13, 11, 1, '2018-10-30 14:33:56', '2018-10-30 14:33:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `physical_states`
--

CREATE TABLE `physical_states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `physical_states`
--

INSERT INTO `physical_states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bueno', '2018-08-26 08:36:00', '2018-08-26 08:36:00'),
(2, 'Regular', '2018-08-26 08:36:00', '2018-08-26 08:36:00'),
(3, 'Malo', '2018-08-26 08:37:00', '2018-08-26 08:37:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_type_id` int(10) UNSIGNED NOT NULL,
  `dependency_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programs`
--

INSERT INTO `programs` (`id`, `name`, `program_type_id`, `dependency_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ingenieria de Prueba', 1, 5, NULL, '2018-08-27 07:35:56', '2018-10-17 10:39:25'),
(2, 'Programita de pruebita', 3, 6, NULL, '2018-08-27 11:01:50', '2018-08-27 11:08:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programs_has_modalities`
--

CREATE TABLE `programs_has_modalities` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `modality_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programs_has_modalities`
--

INSERT INTO `programs_has_modalities` (`id`, `program_id`, `modality_id`, `created_at`, `updated_at`) VALUES
(4, 1, 2, '2018-08-27 10:24:01', '2018-08-27 10:24:01'),
(5, 2, 2, '2018-08-27 11:01:50', '2018-08-27 11:01:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programs_has_working_days`
--

CREATE TABLE `programs_has_working_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `working_day_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programs_has_working_days`
--

INSERT INTO `programs_has_working_days` (`id`, `program_id`, `working_day_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2018-08-27 10:24:01', '2018-08-27 10:24:01'),
(5, 1, 2, '2018-08-27 10:24:01', '2018-08-27 10:24:01'),
(6, 2, 2, '2018-08-27 11:01:50', '2018-08-27 11:01:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `program_types`
--

CREATE TABLE `program_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `program_types`
--

INSERT INTO `program_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pregrado', '2018-08-26 08:38:00', '2018-08-26 08:38:00'),
(2, 'Postgrado', '2018-08-26 08:38:00', '2018-08-26 08:39:00'),
(3, 'Diplomado', '2018-08-26 08:39:00', '2018-08-26 08:39:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `property_types`
--

CREATE TABLE `property_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Propio', '2018-08-26 08:41:00', '2018-08-26 08:41:00'),
(2, 'Alquilado', '2018-08-26 08:42:00', '2018-08-26 08:42:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `participants` int(11) DEFAULT NULL,
  `internal_participants` int(11) DEFAULT NULL,
  `external_participants` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `responsible_id` int(10) UNSIGNED NOT NULL,
  `request_type_id` int(10) UNSIGNED NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `received_date` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `requests`
--

INSERT INTO `requests` (`id`, `participants`, `internal_participants`, `external_participants`, `value`, `description`, `user_id`, `responsible_id`, `request_type_id`, `start_date`, `end_date`, `received_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 32, 30, 2, 0, 'Taller de programación para todo público', 4, 4, 1, '2018-10-31 12:00:00', '2018-10-31 13:00:00', NULL, NULL, '2018-10-07 19:11:16', '2018-10-26 21:11:53'),
(7, NULL, NULL, NULL, 0, NULL, 4, 4, 2, '2018-10-27 14:00:00', '2018-10-27 18:00:00', NULL, '2018-10-23 13:19:21', '2018-10-14 02:05:38', '2018-10-23 13:19:21'),
(8, 100, 20, 80, 0, 'skjf ankjfdnaskjndsakjndsand kjsankjdnsakjndjsadsadsadsadasdsadasd skjf ankjfdnaskjndsakjndsand kjsankjdnsakjndjsadsadsadsadasdsadasdskjf ankjfdnaskjndsakjndsand kjsankjdnsakjndjsadsadsadsadasdsadasdskjf ankjfdnaskjndsakjndsand kjsankjdnsakjndjsadsadsadsadasdsadasd', 4, 4, 1, '2018-10-23 14:00:00', '2018-10-23 16:00:00', NULL, '2018-10-23 01:42:50', '2018-10-16 14:16:52', '2018-10-23 01:42:50'),
(9, NULL, NULL, NULL, 0, NULL, 9, 9, 2, '2018-10-27 12:00:00', '2018-10-27 13:00:00', NULL, NULL, '2018-10-23 13:20:31', '2018-10-23 13:20:31'),
(10, NULL, NULL, NULL, 0, NULL, 6, 6, 2, '2018-11-05 13:00:00', '2018-11-05 14:00:00', NULL, '2018-10-30 14:25:51', '2018-10-30 14:24:27', '2018-10-30 14:25:51'),
(11, 10, 5, 5, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc luctus nisi eu nulla euismod vehicula. Praesent quis risus et justo luctus tincidunt viverra ut elit. Vestibulum pretium mi eu urna pellentesque, quis scelerisque lectus porttitor. Pellentesque porta commodo malesuada. Ut tortor ex, facilisis tempus urna ac, molestie sollicitudin velit. Sed arcu leo, gravida nec hendrerit at, sodales sit amet metus. Morbi ac nisl vel ex scelerisque feugiat ut sed purus. Vestibulum enim nunc, suscipit ut mauris ac, malesuada varius diam. Vestibulum urna arcu, ultrices vitae facilisis nec, egestas nec mi. Quisque ac tellus in nisl dignissim ultrices ac eu nunc. Vivamus faucibus leo sit amet iaculis tristique. Suspendisse dignissim condimentum justo, maximus pharetra purus mattis eget. Nam lacinia convallis velit nec imperdiet. Nulla eros risus, elementum a nibh id, congue tempus turpis', 8, 8, 1, '2018-11-28 12:00:00', '2018-11-28 15:00:00', NULL, '2018-10-30 14:35:53', '2018-10-30 14:33:56', '2018-10-30 14:35:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_types`
--

CREATE TABLE `request_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_types`
--

INSERT INTO `request_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Espacio', '2018-08-26 08:46:00', '2018-08-26 08:46:00'),
(2, 'Recurso Audiovisual', '2018-08-26 08:47:00', '2018-08-26 08:47:00'),
(3, 'Recurso Bienestar', '2018-08-26 08:47:00', '2018-08-26 08:47:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_type_id` int(10) UNSIGNED NOT NULL,
  `resource_status_id` int(10) UNSIGNED NOT NULL,
  `dependency_id` int(10) UNSIGNED NOT NULL,
  `resource_category_id` int(10) UNSIGNED NOT NULL,
  `physical_state_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resources`
--

INSERT INTO `resources` (`id`, `name`, `reference`, `description`, `image`, `image_thumbnail`, `resource_type_id`, `resource_status_id`, `dependency_id`, `resource_category_id`, `physical_state_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Colchon', 'As345353dd', 'El colchon es un implemento fundamental para la práctica de ejercicios', 'http://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_1_1535518677.png', 'http://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_1_1535518677_thumbnail.png', 1, 1, 6, 1, 1, NULL, '2018-08-29 09:48:06', '2018-10-23 12:59:18'),
(2, 'Video Beam', 'A1232312-1235asdasd', 'Un video beam es un proyector de video liviano y fácil detransportar, por medio del cual puedes mostrar tus trabajos ypresentaciones desde tu pc a un auditorio o simplemente verdesde la comodidad de tu hogar una pantalla que imite a las delcine.', 'http://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_2_1537748191.jpg', 'http://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_2_1537748191_thumbnail.jpg', 1, 1, 5, 2, 1, NULL, '2018-09-24 05:16:31', '2018-10-30 14:25:51'),
(3, 'Microfono', 'A2312-5515Z', 'Aparato para transformar las ondas sonoras en energía eléctrica y viceversa en procesos de grabación y reproducción de sonido; consiste esencialmente en un diafragma atraído intermitentemente por un electroimán, que, al vibrar, modifica la corriente transmitida por las diferentes presiones a un circuito.', 'https://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_3_1539956682.jpg', 'https://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_3_1539956682_thumbnail.jpg', 2, 1, 5, 2, 1, NULL, '2018-10-19 13:44:42', '2018-10-30 14:35:53'),
(4, 'Microfono', '123123123-2515AER#4', 'Aparato para transformar las ondas sonoras en energía eléctrica y viceversa en procesos de grabación y reproducción de sonido; consiste esencialmente en un diafragma atraído intermitentemente por un electroimán, que, al vibrar, modifica la corriente transmitida por las diferentes presiones a un circuito.', 'https://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_4_1539956727.jpg', 'https://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_4_1539956727_thumbnail.jpg', 2, 1, 5, 2, 1, NULL, '2018-10-19 13:45:27', '2018-10-23 01:11:18'),
(5, 'Balon de Futbol', 'Klasd123123', 'El balón de fútbol utilizado en competiciones oficiales es regulado en sus medidas por la FIFA. Tiene forma de esfera en un 99.9%, una circunferencia de 69 centímetros y pesa 440 gramos', 'https://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_5_1539956864.jpg', 'https://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_5_1539956865_thumbnail.jpg', 1, 1, 6, 1, 1, NULL, '2018-10-19 13:47:44', '2018-10-23 12:58:21'),
(6, 'Video Beam', '#4255-2323', 'Un proyector de vídeo o vídeo proyector es un aparato óptico que recibe una señal de vídeo y proyecta la imagen correspondiente en una pantalla de proyección usando un sistema de lentes, permitiendo así mostrar imágenes fijas o en movimiento.', 'https://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_6_1540300356.jpg', 'https://franciscogsilva.com/prestamosjdc/img/resources/prestamosjdc_resource_6_1540300356_thumbnail.jpg', 1, 2, 5, 2, 2, NULL, '2018-10-23 13:12:36', '2018-10-23 13:20:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources_has_users`
--

CREATE TABLE `resources_has_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `resource_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resource_categories`
--

CREATE TABLE `resource_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resource_categories`
--

INSERT INTO `resource_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Deportivo', '2018-08-26 08:48:00', '2018-08-26 08:48:00'),
(2, 'Audiovisual', '2018-08-26 08:49:00', '2018-08-26 08:49:00'),
(3, 'Musical', '2018-08-26 08:49:00', '2018-08-26 08:49:00'),
(4, 'Folclor', '2018-08-26 08:50:00', '2018-08-26 08:50:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resource_statuses`
--

CREATE TABLE `resource_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resource_statuses`
--

INSERT INTO `resource_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Disponible', '2018-08-26 08:53:00', '2018-08-26 08:53:00'),
(2, 'Ocupado', '2018-08-26 08:53:00', '2018-08-26 20:19:00'),
(3, 'En mantenimiento', '2018-08-26 08:54:00', '2018-08-26 08:54:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resource_types`
--

CREATE TABLE `resource_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resource_types`
--

INSERT INTO `resource_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Devolutivo', '2018-08-26 09:05:00', '2018-08-26 09:05:00'),
(2, 'No Devolutivo', '2018-08-26 09:06:00', '2018-08-26 09:06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spaces`
--

CREATE TABLE `spaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_persons` int(11) DEFAULT NULL,
  `space_type_id` int(10) UNSIGNED NOT NULL,
  `space_status_id` int(10) UNSIGNED NOT NULL,
  `property_type_id` int(10) UNSIGNED NOT NULL,
  `building_id` int(10) UNSIGNED DEFAULT NULL,
  `headquarter_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `spaces`
--

INSERT INTO `spaces` (`id`, `name`, `max_persons`, `space_type_id`, `space_status_id`, `property_type_id`, `building_id`, `headquarter_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Auditorio 1', 200, 3, 1, 1, 2, NULL, NULL, '2018-08-29 13:44:32', '2018-10-30 14:35:53'),
(2, 'Salon 2', 10, 1, 1, 2, 1, NULL, NULL, '2018-08-29 14:22:19', '2018-10-07 18:43:34'),
(3, 'Cancha de Futbol', NULL, 4, 1, 1, NULL, NULL, NULL, '2018-08-29 14:30:42', '2018-08-29 14:30:42'),
(4, 'Laboratorio Veterinaria', 50, 2, 1, 2, NULL, 4, NULL, '2018-08-29 14:31:46', '2018-08-29 14:33:36'),
(5, 'AJNDSJNDFMF', 32, 1, 2, 1, NULL, 1, NULL, '2018-09-25 23:18:22', '2018-10-07 19:11:16'),
(6, 'Auditorio 2 de prueba', 100, 3, 2, 1, 1, NULL, NULL, '2018-10-18 13:32:30', '2018-10-26 15:50:36'),
(7, 'Auditorio 3 de Prueba', 60, 3, 1, 1, 2, NULL, NULL, '2018-10-18 13:33:20', '2018-10-18 13:33:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spaces_has_resources`
--

CREATE TABLE `spaces_has_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `resource_id` int(10) UNSIGNED NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `spaces_has_resources`
--

INSERT INTO `spaces_has_resources` (`id`, `resource_id`, `space_id`, `created_at`, `updated_at`) VALUES
(3, 3, 1, '2018-10-19 13:44:42', '2018-10-19 13:44:42'),
(4, 3, 6, '2018-10-19 13:44:42', '2018-10-19 13:44:42'),
(5, 3, 7, '2018-10-19 13:44:42', '2018-10-19 13:44:42'),
(6, 4, 1, '2018-10-19 13:45:28', '2018-10-19 13:45:28'),
(7, 4, 6, '2018-10-19 13:45:28', '2018-10-19 13:45:28'),
(8, 4, 7, '2018-10-19 13:45:28', '2018-10-19 13:45:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `space_statuses`
--

CREATE TABLE `space_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `space_statuses`
--

INSERT INTO `space_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Disponible', '2018-08-26 09:09:00', '2018-08-26 09:09:00'),
(2, 'Ocupado', '2018-08-26 09:09:00', '2018-08-26 20:40:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `space_types`
--

CREATE TABLE `space_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `space_types`
--

INSERT INTO `space_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aula', '2018-08-26 08:57:00', '2018-08-26 08:57:00'),
(2, 'Laboratorio', '2018-08-26 08:57:00', '2018-08-26 08:57:00'),
(3, 'Auditorio', '2018-08-26 08:58:00', '2018-08-26 08:58:00'),
(4, 'Espacio Deportivo', '2018-08-26 08:59:00', '2018-08-26 08:59:00'),
(5, 'Aula Interactiva', '2018-09-22 10:00:00', '2018-09-29 10:00:00'),
(6, 'Sala de Cómputo', '2018-09-22 10:00:00', '2018-09-22 10:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `towns`
--

CREATE TABLE `towns` (
  `id` int(10) UNSIGNED NOT NULL,
  `departament_id` int(10) UNSIGNED NOT NULL,
  `code` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `towns`
--

INSERT INTO `towns` (`id`, `departament_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'MEDELLIN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(2, 1, 2, 'ABEJORRAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(3, 1, 4, 'ABRIAQUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(4, 1, 21, 'ALEJANDRIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(5, 1, 30, 'AMAGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(6, 1, 31, 'AMALFI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(7, 1, 34, 'ANDES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(8, 1, 36, 'ANGELOPOLIS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(9, 1, 38, 'ANGOSTURA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(10, 1, 40, 'ANORI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(11, 1, 42, 'ANTIOQUIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(12, 1, 44, 'ANZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(13, 1, 45, 'APARTADO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(14, 1, 51, 'ARBOLETES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(15, 1, 55, 'ARGELIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(16, 1, 59, 'ARMENIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(17, 1, 79, 'BARBOSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(18, 1, 86, 'BELMIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(19, 1, 88, 'BELLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(20, 1, 91, 'BETANIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(21, 1, 93, 'BETULIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(22, 1, 101, 'BOLIVAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(23, 1, 107, 'BRICEÑO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(24, 1, 113, 'BURITICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(25, 1, 120, 'CACERES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(26, 1, 125, 'CAICEDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(27, 1, 129, 'CALDAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(28, 1, 134, 'CAMPAMENTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(29, 1, 138, 'CAÑASGORDAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(30, 1, 142, 'CARACOLI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(31, 1, 145, 'CARAMANTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(32, 1, 147, 'CAREPA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(33, 1, 148, 'CARMEN DE VIBORAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(34, 1, 150, 'CAROLINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(35, 1, 154, 'CAUCASIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(36, 1, 172, 'CHIGORODO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(37, 1, 190, 'CISNEROS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(38, 1, 197, 'COCORNA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(39, 1, 206, 'CONCEPCION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(40, 1, 209, 'CONCORDIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(41, 1, 212, 'COPACABANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(42, 1, 234, 'DABEIBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(43, 1, 237, 'DON MATIAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(44, 1, 240, 'EBEJICO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(45, 1, 250, 'EL BAGRE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(46, 1, 264, 'ENTRERRIOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(47, 1, 266, 'ENVIGADO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(48, 1, 282, 'FREDONIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(49, 1, 284, 'FRONTINO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(50, 1, 306, 'GIRALDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(51, 1, 308, 'GIRARDOTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(52, 1, 310, 'GOMEZ PLATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(53, 1, 313, 'GRANADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(54, 1, 315, 'GUADALUPE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(55, 1, 318, 'GUARNE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(56, 1, 321, 'GUATAPE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(57, 1, 347, 'HELICONIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(58, 1, 353, 'HISPANIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(59, 1, 360, 'ITAGUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(60, 1, 361, 'ITUANGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(61, 1, 364, 'JARDIN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(62, 1, 368, 'JERICO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(63, 1, 376, 'LA CEJA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(64, 1, 380, 'LA ESTRELLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(65, 1, 390, 'LA PINTADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(66, 1, 400, 'LA UNION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(67, 1, 411, 'LIBORINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(68, 1, 425, 'MACEO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(69, 1, 440, 'MARINILLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(70, 1, 467, 'MONTEBELLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(71, 1, 475, 'MURINDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(72, 1, 480, 'MUTATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(73, 1, 483, 'NARIÑO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(74, 1, 490, 'NECOCLI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(75, 1, 495, 'NECHI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(76, 1, 501, 'OLAYA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(77, 1, 541, 'PEÑOL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(78, 1, 543, 'PEQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(79, 1, 576, 'PUEBLORRICO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(80, 1, 579, 'PUERTO BERRIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(81, 1, 585, 'PUERTO NARE (LA MAGDALENA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(82, 1, 591, 'PUERTO TRIUNFO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(83, 1, 604, 'REMEDIOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(84, 1, 607, 'RETIRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(85, 1, 615, 'RIONEGRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(86, 1, 628, 'SABANALARGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(87, 1, 631, 'SABANETA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(88, 1, 642, 'SALGAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(89, 1, 647, 'SAN ANDRES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(90, 1, 649, 'SAN CARLOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(91, 1, 652, 'SAN FRANCISCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(92, 1, 656, 'SAN JERONIMO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(93, 1, 658, 'SAN JOSE DE LA MONTAÑA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(94, 1, 659, 'SAN JUAN DE URABA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(95, 1, 660, 'SAN LUIS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(96, 1, 664, 'SAN PEDRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(97, 1, 665, 'SAN PEDRO DE URABA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(98, 1, 667, 'SAN RAFAEL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(99, 1, 670, 'SAN ROQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(100, 1, 674, 'SAN VICENTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(101, 1, 679, 'SANTA BARBARA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(102, 1, 686, 'SANTA ROSA DE OSOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(103, 1, 690, 'SANTO DOMINGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(104, 1, 697, 'SANTUARIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(105, 1, 736, 'SEGOVIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(106, 1, 756, 'SONSON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(107, 1, 761, 'SOPETRAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(108, 1, 789, 'TAMESIS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(109, 1, 790, 'TARAZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(110, 1, 792, 'TARSO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(111, 1, 809, 'TITIRIBI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(112, 1, 819, 'TOLEDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(113, 1, 837, 'TURBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(114, 1, 842, 'URAMITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(115, 1, 847, 'URRAO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(116, 1, 854, 'VALDIVIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(117, 1, 856, 'VALPARAISO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(118, 1, 858, 'VEGACHI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(119, 1, 861, 'VENECIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(120, 1, 873, 'VIGIA DEL FUERTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(121, 1, 885, 'YALI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(122, 1, 887, 'YARUMAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(123, 1, 890, 'YOLOMBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(124, 1, 893, 'YONDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(125, 1, 895, 'ZARAGOZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(126, 2, 1, 'BARRANQUILLA (DISTRITO ESPECIAL INDUSTRIAL Y PORTUARIO DE BARRANQUILLA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(127, 2, 78, 'BARANOA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(128, 2, 137, 'CAMPO DE LA CRUZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(129, 2, 141, 'CANDELARIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(130, 2, 296, 'GALAPA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(131, 2, 372, 'JUAN DE ACOSTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(132, 2, 421, 'LURUACO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(133, 2, 433, 'MALAMBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(134, 2, 436, 'MANATI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(135, 2, 520, 'PALMAR DE VARELA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(136, 2, 549, 'PIOJO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(137, 2, 558, 'POLO NUEVO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(138, 2, 560, 'PONEDERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(139, 2, 573, 'PUERTO COLOMBIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(140, 2, 606, 'REPELON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(141, 2, 634, 'SABANAGRANDE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(142, 2, 638, 'SABANALARGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(143, 2, 675, 'SANTA LUCIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(144, 2, 685, 'SANTO TOMAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(145, 2, 758, 'SOLEDAD', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(146, 2, 770, 'SUAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(147, 2, 832, 'TUBARA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(148, 2, 849, 'USIACURI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(149, 3, 1, 'Santa Fe de Bogotá', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(150, 3, 1, 'USAQUEN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(151, 3, 2, 'CHAPINERO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(152, 3, 3, 'SANTA FE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(153, 3, 4, 'SAN CRISTOBAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(154, 3, 5, 'USME', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(155, 3, 6, 'TUNJUELITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(156, 3, 7, 'BOSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(157, 3, 8, 'KENNEDY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(158, 3, 9, 'FONTIBON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(159, 3, 10, 'ENGATIVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(160, 3, 11, 'SUBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(161, 3, 12, 'BARRIOS UNIDOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(162, 3, 13, 'TEUSAQUILLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(163, 3, 14, 'MARTIRES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(164, 3, 15, 'ANTONIO NARIÑO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(165, 3, 16, 'PUENTE ARANDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(166, 3, 17, 'CANDELARIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(167, 3, 18, 'RAFAEL URIBE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(168, 3, 19, 'CIUDAD BOLIVAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(169, 3, 20, 'SUMAPAZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(170, 4, 1, 'CARTAGENA (DISTRITO TURISTICO Y CULTURAL DE CARTAGENA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(171, 4, 6, 'ACHI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(172, 4, 30, 'ALTOS DEL ROSARIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(173, 4, 42, 'ARENAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(174, 4, 52, 'ARJONA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(175, 4, 62, 'ARROYOHONDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(176, 4, 74, 'BARRANCO DE LOBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(177, 4, 140, 'CALAMAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(178, 4, 160, 'CANTAGALLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(179, 4, 188, 'CICUCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(180, 4, 212, 'CORDOBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(181, 4, 222, 'CLEMENCIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(182, 4, 244, 'EL CARMEN DE BOLIVAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(183, 4, 248, 'EL GUAMO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(184, 4, 268, 'EL PEÑON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(185, 4, 300, 'HATILLO DE LOBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(186, 4, 430, 'MAGANGUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(187, 4, 433, 'MAHATES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(188, 4, 440, 'MARGARITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(189, 4, 442, 'MARIA LA BAJA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(190, 4, 458, 'MONTECRISTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(191, 4, 468, 'MOMPOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(192, 4, 473, 'MORALES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(193, 4, 549, 'PINILLOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(194, 4, 580, 'REGIDOR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(195, 4, 600, 'RIO VIEJO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(196, 4, 620, 'SAN CRISTOBAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(197, 4, 647, 'SAN ESTANISLAO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(198, 4, 650, 'SAN FERNANDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(199, 4, 654, 'SAN JACINTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(200, 4, 655, 'SAN JACINTO DEL CAUCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(201, 4, 657, 'SAN JUAN NEPOMUCENO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(202, 4, 667, 'SAN MARTIN DE LOBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(203, 4, 670, 'SAN PABLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(204, 4, 673, 'SANTA CATALINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(205, 4, 683, 'SANTA ROSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(206, 4, 688, 'SANTA ROSA DEL SUR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(207, 4, 744, 'SIMITI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(208, 4, 760, 'SOPLAVIENTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(209, 4, 780, 'TALAIGUA NUEVO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(210, 4, 810, 'TIQUISIO (PUERTO RICO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(211, 4, 836, 'TURBACO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(212, 4, 838, 'TURBANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(213, 4, 873, 'VILLANUEVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(214, 4, 894, 'ZAMBRANO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(215, 5, 1, 'TUNJA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(216, 5, 22, 'ALMEIDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(217, 5, 47, 'AQUITANIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(218, 5, 51, 'ARCABUCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(219, 5, 87, 'BELEN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(220, 5, 90, 'BERBEO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(221, 5, 92, 'BETEITIVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(222, 5, 97, 'BOAVITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(223, 5, 104, 'BOYACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(224, 5, 106, 'BRICEÑO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(225, 5, 109, 'BUENAVISTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(226, 5, 114, 'BUSBANZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(227, 5, 131, 'CALDAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(228, 5, 135, 'CAMPOHERMOSO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(229, 5, 162, 'CERINZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(230, 5, 172, 'CHINAVITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(231, 5, 176, 'CHIQUINQUIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(232, 5, 180, 'CHISCAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(233, 5, 183, 'CHITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(234, 5, 185, 'CHITARAQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(235, 5, 187, 'CHIVATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(236, 5, 189, 'CIENEGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(237, 5, 204, 'COMBITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(238, 5, 212, 'COPER', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(239, 5, 215, 'CORRALES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(240, 5, 218, 'COVARACHIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(241, 5, 223, 'CUBARA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(242, 5, 224, 'CUCAITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(243, 5, 226, 'CUITIVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(244, 5, 232, 'CHIQUIZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(245, 5, 236, 'CHIVOR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(246, 5, 238, 'DUITAMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(247, 5, 244, 'EL COCUY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(248, 5, 248, 'EL ESPINO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(249, 5, 272, 'FIRAVITOBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(250, 5, 276, 'FLORESTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(251, 5, 293, 'GACHANTIVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(252, 5, 296, 'GAMEZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(253, 5, 299, 'GARAGOA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(254, 5, 317, 'GUACAMAYAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(255, 5, 322, 'GUATEQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(256, 5, 325, 'GUAYATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(257, 5, 332, 'GUICAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(258, 5, 362, 'IZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(259, 5, 367, 'JENESANO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(260, 5, 368, 'JERICO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(261, 5, 377, 'LABRANZAGRANDE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(262, 5, 380, 'LA CAPILLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(263, 5, 401, 'LA VICTORIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(264, 5, 403, 'LA UVITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(265, 5, 407, 'VILLA DE LEIVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(266, 5, 425, 'MACANAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(267, 5, 442, 'MARIPI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(268, 5, 455, 'MIRAFLORES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(269, 5, 464, 'MONGUA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(270, 5, 466, 'MONGUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(271, 5, 469, 'MONIQUIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(272, 5, 476, 'MOTAVITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(273, 5, 480, 'MUZO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(274, 5, 491, 'NOBSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(275, 5, 494, 'NUEVO COLON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(276, 5, 500, 'OICATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(277, 5, 507, 'OTANCHE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(278, 5, 511, 'PACHAVITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(279, 5, 514, 'PAEZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(280, 5, 516, 'PAIPA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(281, 5, 518, 'PAJARITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(282, 5, 522, 'PANQUEBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(283, 5, 531, 'PAUNA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(284, 5, 533, 'PAYA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(285, 5, 537, 'PAZ DEL RIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(286, 5, 542, 'PESCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(287, 5, 550, 'PISBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(288, 5, 572, 'PUERTO BOYACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(289, 5, 580, 'QUIPAMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(290, 5, 599, 'RAMIRIQUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(291, 5, 600, 'RAQUIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(292, 5, 621, 'RONDON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(293, 5, 632, 'SABOYA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(294, 5, 638, 'SACHICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(295, 5, 646, 'SAMACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(296, 5, 660, 'SAN EDUARDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(297, 5, 664, 'SAN JOSE DE PARE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(298, 5, 667, 'SAN LUIS DE GACENO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(299, 5, 673, 'SAN MATEO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(300, 5, 676, 'SAN MIGUEL DE SEMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(301, 5, 681, 'SAN PABLO DE BORBUR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(302, 5, 686, 'SANTANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(303, 5, 690, 'SANTA MARIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(304, 5, 693, 'SANTA ROSA DE VITERBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(305, 5, 696, 'SANTA SOFIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(306, 5, 720, 'SATIVANORTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(307, 5, 723, 'SATIVASUR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(308, 5, 740, 'SIACHOQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(309, 5, 753, 'SOATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(310, 5, 755, 'SOCOTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(311, 5, 757, 'SOCHA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(312, 5, 759, 'SOGAMOSO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(313, 5, 761, 'SOMONDOCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(314, 5, 762, 'SORA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(315, 5, 763, 'SOTAQUIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(316, 5, 764, 'SORACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(317, 5, 774, 'SUSACON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(318, 5, 776, 'SUTAMARCHAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(319, 5, 778, 'SUTATENZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(320, 5, 790, 'TASCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(321, 5, 798, 'TENZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(322, 5, 804, 'TIBANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(323, 5, 806, 'TIBASOSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(324, 5, 808, 'TINJACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(325, 5, 810, 'TIPACOQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(326, 5, 814, 'TOCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(327, 5, 816, 'TOGUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(328, 5, 820, 'TOPAGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(329, 5, 822, 'TOTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(330, 5, 832, 'TUNUNGUA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(331, 5, 835, 'TURMEQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(332, 5, 837, 'TUTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(333, 5, 839, 'TUTASA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(334, 5, 842, 'UMBITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(335, 5, 861, 'VENTAQUEMADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(336, 5, 879, 'VIRACACHA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(337, 5, 897, 'ZETAQUIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(338, 6, 1, 'MANIZALES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(339, 6, 13, 'AGUADAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(340, 6, 42, 'ANSERMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(341, 6, 50, 'ARANZAZU', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(342, 6, 88, 'BELALCAZAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(343, 6, 174, 'CHINCHINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(344, 6, 272, 'FILADELFIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(345, 6, 380, 'LA DORADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(346, 6, 388, 'LA MERCED', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(347, 6, 433, 'MANZANARES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(348, 6, 442, 'MARMATO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(349, 6, 444, 'MARQUETALIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(350, 6, 446, 'MARULANDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(351, 6, 486, 'NEIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(352, 6, 495, 'NORCASIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(353, 6, 513, 'PACORA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(354, 6, 524, 'PALESTINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(355, 6, 541, 'PENSILVANIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(356, 6, 614, 'RIOSUCIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(357, 6, 616, 'RISARALDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(358, 6, 653, 'SALAMINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(359, 6, 662, 'SAMANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(360, 6, 665, 'SAN JOSE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(361, 6, 777, 'SUPIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(362, 6, 867, 'VICTORIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(363, 6, 873, 'VILLAMARIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(364, 6, 877, 'VITERBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(365, 7, 1, 'FLORENCIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(366, 7, 29, 'ALBANIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(367, 7, 94, 'BELEN DE LOS ANDAQUIES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(368, 7, 150, 'CARTAGENA DEL CHAIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(369, 7, 205, 'CURILLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(370, 7, 247, 'EL DONCELLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(371, 7, 256, 'EL PAUJIL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(372, 7, 410, 'LA MONTAÑITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(373, 7, 460, 'MILAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(374, 7, 479, 'MORELIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(375, 7, 592, 'PUERTO RICO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(376, 7, 610, 'SAN JOSE DE FRAGUA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(377, 7, 753, 'SAN VICENTE DEL CAGUAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(378, 7, 756, 'SOLANO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(379, 7, 785, 'SOLITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(380, 7, 860, 'VALPARAISO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(381, 8, 1, 'POPAYAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(382, 8, 22, 'ALMAGUER', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(383, 8, 50, 'ARGELIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(384, 8, 75, 'BALBOA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(385, 8, 100, 'BOLIVAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(386, 8, 110, 'BUENOS AIRES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(387, 8, 130, 'CAJIBIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(388, 8, 137, 'CALDONO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(389, 8, 142, 'CALOTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(390, 8, 212, 'CORINTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(391, 8, 256, 'EL TAMBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(392, 8, 290, 'FLORENCIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(393, 8, 318, 'GUAPI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(394, 8, 355, 'INZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(395, 8, 364, 'JAMBALO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(396, 8, 392, 'LA SIERRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(397, 8, 397, 'LA VEGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(398, 8, 418, 'LOPEZ (MICAY)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(399, 8, 450, 'MERCADERES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(400, 8, 455, 'MIRANDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(401, 8, 473, 'MORALES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(402, 8, 513, 'PADILLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(403, 8, 517, 'PAEZ (BELALCAZAR)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(404, 8, 532, 'PATIA (EL BORDO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(405, 8, 533, 'PIAMONTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(406, 8, 548, 'PIENDAMO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(407, 8, 573, 'PUERTO TEJADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(408, 8, 585, 'PURACE (COCONUCO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(409, 8, 622, 'ROSAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(410, 8, 693, 'SAN SEBASTIAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(411, 8, 698, 'SANTANDER DE QUILICHAO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(412, 8, 701, 'SANTA ROSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(413, 8, 743, 'SILVIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(414, 8, 760, 'SOTARA (PAISPAMBA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(415, 8, 780, 'SUAREZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(416, 8, 807, 'TIMBIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(417, 8, 809, 'TIMBIQUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(418, 8, 821, 'TORIBIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(419, 8, 824, 'TOTORO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(420, 8, 845, 'VILLARICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(421, 9, 1, 'VALLEDUPAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(422, 9, 11, 'AGUACHICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(423, 9, 13, 'AGUSTIN CODAZZI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(424, 9, 32, 'ASTREA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(425, 9, 45, 'BECERRIL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(426, 9, 60, 'BOSCONIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(427, 9, 175, 'CHIMICHAGUA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(428, 9, 178, 'CHIRIGUANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(429, 9, 228, 'CURUMANI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(430, 9, 238, 'EL COPEY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(431, 9, 250, 'EL PASO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(432, 9, 295, 'GAMARRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(433, 9, 310, 'GONZALEZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(434, 9, 383, 'LA GLORIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(435, 9, 400, 'LA JAGUA IBIRICO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(436, 9, 443, 'MANAURE (BALCON DEL CESAR)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(437, 9, 517, 'PAILITAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(438, 9, 550, 'PELAYA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(439, 9, 570, 'PUEBLO BELLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(440, 9, 614, 'RIO DE ORO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(441, 9, 621, 'LA PAZ (ROBLES)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(442, 9, 710, 'SAN ALBERTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(443, 9, 750, 'SAN DIEGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(444, 9, 770, 'SAN MARTIN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(445, 9, 787, 'TAMALAMEQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(446, 10, 1, 'MONTERIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(447, 10, 68, 'AYAPEL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(448, 10, 79, 'BUENAVISTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(449, 10, 90, 'CANALETE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(450, 10, 162, 'CERETE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(451, 10, 168, 'CHIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(452, 10, 182, 'CHINU', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(453, 10, 189, 'CIENAGA DE ORO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(454, 10, 300, 'COTORRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(455, 10, 350, 'LA APARTADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(456, 10, 417, 'LORICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(457, 10, 419, 'LOS CORDOBAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(458, 10, 464, 'MOMIL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(459, 10, 466, 'MONTELIBANO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(460, 10, 500, 'MOÑITOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(461, 10, 555, 'PLANETA RICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(462, 10, 570, 'PUEBLO NUEVO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(463, 10, 574, 'PUERTO ESCONDIDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(464, 10, 580, 'PUERTO LIBERTADOR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(465, 10, 586, 'PURISIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(466, 10, 660, 'SAHAGUN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(467, 10, 670, 'SAN ANDRES SOTAVENTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(468, 10, 672, 'SAN ANTERO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(469, 10, 675, 'SAN BERNARDO DEL VIENTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(470, 10, 678, 'SAN CARLOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(471, 10, 686, 'SAN PELAYO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(472, 10, 807, 'TIERRALTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(473, 10, 855, 'VALENCIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(474, 11, 1, 'AGUA DE DIOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(475, 11, 19, 'ALBAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(476, 11, 35, 'ANAPOIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(477, 11, 40, 'ANOLAIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(478, 11, 53, 'ARBELAEZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(479, 11, 86, 'BELTRAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(480, 11, 95, 'BITUIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(481, 11, 99, 'BOJACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(482, 11, 120, 'CABRERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(483, 11, 123, 'CACHIPAY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(484, 11, 126, 'CAJICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(485, 11, 148, 'CAPARRAPI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(486, 11, 151, 'CAQUEZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(487, 11, 154, 'CARMEN DE CARUPA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(488, 11, 168, 'CHAGUANI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(489, 11, 175, 'CHIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(490, 11, 178, 'CHIPAQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(491, 11, 181, 'CHOACHI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(492, 11, 183, 'CHOCONTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(493, 11, 200, 'COGUA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(494, 11, 214, 'COTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(495, 11, 224, 'CUCUNUBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(496, 11, 245, 'EL COLEGIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(497, 11, 258, 'EL PEÑON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(498, 11, 260, 'EL ROSAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(499, 11, 269, 'FACATATIVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(500, 11, 279, 'FOMEQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(501, 11, 281, 'FOSCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(502, 11, 286, 'FUNZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(503, 11, 288, 'FUQUENE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(504, 11, 290, 'FUSAGASUGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(505, 11, 293, 'GACHALA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(506, 11, 295, 'GACHANCIPA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(507, 11, 297, 'GACHETA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(508, 11, 299, 'GAMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(509, 11, 307, 'GIRARDOT', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(510, 11, 312, 'GRANADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(511, 11, 317, 'GUACHETA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(512, 11, 320, 'GUADUAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(513, 11, 322, 'GUASCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(514, 11, 324, 'GUATAQUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(515, 11, 326, 'GUATAVITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(516, 11, 328, 'GUAYABAL DE SIQUIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(517, 11, 335, 'GUAYABETAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(518, 11, 339, 'GUTIERREZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(519, 11, 368, 'JERUSALEN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(520, 11, 372, 'JUNIN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(521, 11, 377, 'LA CALERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(522, 11, 386, 'LA MESA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(523, 11, 394, 'LA PALMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(524, 11, 398, 'LA PEÑA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(525, 11, 402, 'LA VEGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(526, 11, 407, 'LENGUAZAQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(527, 11, 426, 'MACHETA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(528, 11, 430, 'MADRID', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(529, 11, 436, 'MANTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(530, 11, 438, 'MEDINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(531, 11, 473, 'MOSQUERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(532, 11, 483, 'NARIÑO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(533, 11, 486, 'NEMOCON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(534, 11, 488, 'NILO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(535, 11, 489, 'NIMAIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(536, 11, 491, 'NOCAIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(537, 11, 506, 'VENECIA (OSPINA PEREZ)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(538, 11, 513, 'PACHO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(539, 11, 518, 'PAIME', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(540, 11, 524, 'PANDI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(541, 11, 530, 'PARATEBUENO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(542, 11, 535, 'PASCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(543, 11, 572, 'PUERTO SALGAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(544, 11, 580, 'PULI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(545, 11, 592, 'QUEBRADANEGRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(546, 11, 594, 'QUETAME', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(547, 11, 596, 'QUIPILE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(548, 11, 599, 'APULO (RAFAEL REYES)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(549, 11, 612, 'RICAURTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(550, 11, 645, 'SAN ANTONIO DEL TEQUENDAMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(551, 11, 649, 'SAN BERNARDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(552, 11, 653, 'SAN CAYETANO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(553, 11, 658, 'SAN FRANCISCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(554, 11, 662, 'SAN JUAN DE RIOSECO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(555, 11, 718, 'SASAIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(556, 11, 736, 'SESQUILE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(557, 11, 740, 'SIBATE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(558, 11, 743, 'SILVANIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(559, 11, 745, 'SIMIJACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(560, 11, 754, 'SOACHA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(561, 11, 758, 'SOPO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(562, 11, 769, 'SUBACHOQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(563, 11, 772, 'SUESCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(564, 11, 777, 'SUPATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(565, 11, 779, 'SUSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(566, 11, 781, 'SUTATAUSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(567, 11, 785, 'TABIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(568, 11, 793, 'TAUSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(569, 11, 797, 'TENA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(570, 11, 799, 'TENJO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(571, 11, 805, 'TIBACUY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(572, 11, 807, 'TIBIRITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(573, 11, 815, 'TOCAIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(574, 11, 817, 'TOCANCIPA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(575, 11, 823, 'TOPAIPI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(576, 11, 839, 'UBALA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(577, 11, 841, 'UBAQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(578, 11, 843, 'UBATE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(579, 11, 845, 'UNE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(580, 11, 851, 'UTICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(581, 11, 862, 'VERGARA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(582, 11, 867, 'VIANI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(583, 11, 871, 'VILLAGOMEZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(584, 11, 873, 'VILLAPINZON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(585, 11, 875, 'VILLETA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(586, 11, 878, 'VIOTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(587, 11, 885, 'YACOPI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(588, 11, 898, 'ZIPACON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(589, 11, 899, 'ZIPAQUIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(590, 12, 1, 'QUIBDO (SAN FRANCISCO DE QUIBDO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(591, 12, 6, 'ACANDI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(592, 12, 25, 'ALTO BAUDO (PIE DE PATO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(593, 12, 50, 'ATRATO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(594, 12, 73, 'BAGADO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(595, 12, 75, 'BAHIA SOLANO (MUTIS)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(596, 12, 77, 'BAJO BAUDO (PIZARRO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(597, 12, 99, 'BOJAYA (BELLAVISTA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(598, 12, 135, 'CANTON DE SAN PABLO (MANAGRU)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(599, 12, 205, 'CONDOTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(600, 12, 245, 'EL CARMEN DE ATRATO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(601, 12, 250, 'LITORAL DEL BAJO SAN JUAN (SANTA GENOVEVA DE DOCORDO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(602, 12, 361, 'ISTMINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(603, 12, 372, 'JURADO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(604, 12, 413, 'LLORO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(605, 12, 425, 'MEDIO ATRATO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(606, 12, 430, 'MEDIO BAUDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(607, 12, 491, 'NOVITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(608, 12, 495, 'NUQUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(609, 12, 600, 'RIOQUITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(610, 12, 615, 'RIOSUCIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(611, 12, 660, 'SAN JOSE DEL PALMAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(612, 12, 745, 'SIPI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(613, 12, 787, 'TADO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(614, 12, 800, 'UNGUIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(615, 12, 810, 'UNION PANAMERICANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(616, 13, 1, 'NEIVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(617, 13, 6, 'ACEVEDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(618, 13, 13, 'AGRADO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(619, 13, 16, 'AIPE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(620, 13, 20, 'ALGECIRAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(621, 13, 26, 'ALTAMIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(622, 13, 78, 'BARAYA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(623, 13, 132, 'CAMPOALEGRE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(624, 13, 206, 'COLOMBIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(625, 13, 244, 'ELIAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(626, 13, 298, 'GARZON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(627, 13, 306, 'GIGANTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(628, 13, 319, 'GUADALUPE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(629, 13, 349, 'HOBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(630, 13, 357, 'IQUIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(631, 13, 359, 'ISNOS (SAN JOSE DE ISNOS)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(632, 13, 378, 'LA ARGENTINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(633, 13, 396, 'LA PLATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(634, 13, 483, 'NATAGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(635, 13, 503, 'OPORAPA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(636, 13, 518, 'PAICOL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(637, 13, 524, 'PALERMO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(638, 13, 530, 'PALESTINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(639, 13, 548, 'PITAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(640, 13, 551, 'PITALITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(641, 13, 615, 'RIVERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(642, 13, 660, 'SALADOBLANCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(643, 13, 668, 'SAN AGUSTIN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(644, 13, 676, 'SANTA MARIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(645, 13, 770, 'SUAZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(646, 13, 791, 'TARQUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(647, 13, 797, 'TESALIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(648, 13, 799, 'TELLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(649, 13, 801, 'TERUEL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(650, 13, 807, 'TIMANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(651, 13, 872, 'VILLAVIEJA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(652, 13, 885, 'YAGUARA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(653, 14, 1, 'RIOHACHA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(654, 14, 78, 'BARRANCAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(655, 14, 90, 'DIBULLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(656, 14, 98, 'DISTRACCION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(657, 14, 110, 'EL MOLINO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(658, 14, 279, 'FONSECA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(659, 14, 378, 'HATONUEVO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(660, 14, 420, 'LA JAGUA DEL PILAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(661, 14, 430, 'MAICAO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(662, 14, 560, 'MANAURE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(663, 14, 650, 'SAN JUAN DEL CESAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(664, 14, 847, 'URIBIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(665, 14, 855, 'URUMITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(666, 14, 874, 'VILLANUEVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(667, 15, 1, 'SANTA MARTA (DISTRITO TURISTICO CULTURAL E HISTORICO DE SANTA MARTA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(668, 15, 30, 'ALGARROBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(669, 15, 53, 'ARACATACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(670, 15, 58, 'ARIGUANI (EL DIFICIL)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(671, 15, 161, 'CERRO SAN ANTONIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(672, 15, 170, 'CHIVOLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(673, 15, 189, 'CIENAGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(674, 15, 205, 'CONCORDIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(675, 15, 245, 'EL BANCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(676, 15, 258, 'EL PIÑON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(677, 15, 268, 'EL RETEN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(678, 15, 288, 'FUNDACION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(679, 15, 318, 'GUAMAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(680, 15, 541, 'PEDRAZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(681, 15, 545, 'PIJIÑO DEL CARMEN (PIJIÑO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(682, 15, 551, 'PIVIJAY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(683, 15, 555, 'PLATO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(684, 15, 570, 'PUEBLOVIEJO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(685, 15, 605, 'REMOLINO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(686, 15, 660, 'SABANAS DE SAN ANGEL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(687, 15, 675, 'SALAMINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(688, 15, 692, 'SAN SEBASTIAN DE BUENAVISTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(689, 15, 703, 'SAN ZENON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(690, 15, 707, 'SANTA ANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00');
INSERT INTO `towns` (`id`, `departament_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(691, 15, 745, 'SITIONUEVO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(692, 15, 798, 'TENERIFE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(693, 16, 1, 'VILLAVICENCIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(694, 16, 6, 'ACACIAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(695, 16, 110, 'BARRANCA DE UPIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(696, 16, 124, 'CABUYARO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(697, 16, 150, 'CASTILLA LA NUEVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(698, 16, 223, 'SAN LUIS DE CUBARRAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(699, 16, 226, 'CUMARAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(700, 16, 245, 'EL CALVARIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(701, 16, 251, 'EL CASTILLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(702, 16, 270, 'EL DORADO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(703, 16, 287, 'FUENTE DE ORO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(704, 16, 313, 'GRANADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(705, 16, 318, 'GUAMAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(706, 16, 325, 'MAPIRIPAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(707, 16, 330, 'MESETAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(708, 16, 350, 'LA MACARENA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(709, 16, 370, 'LA URIBE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(710, 16, 400, 'LEJANIAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(711, 16, 450, 'PUERTO CONCORDIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(712, 16, 568, 'PUERTO GAITAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(713, 16, 573, 'PUERTO LOPEZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(714, 16, 577, 'PUERTO LLERAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(715, 16, 590, 'PUERTO RICO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(716, 16, 606, 'RESTREPO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(717, 16, 680, 'SAN CARLOS DE GUAROA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(718, 16, 683, 'SAN JUAN DE ARAMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(719, 16, 686, 'SAN JUANITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(720, 16, 689, 'SAN MARTIN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(721, 16, 711, 'VISTAHERMOSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(722, 17, 1, 'PASTO (SAN JUAN DE PASTO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(723, 17, 19, 'ALBAN (SAN JOSE)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(724, 17, 22, 'ALDANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(725, 17, 36, 'ANCUYA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(726, 17, 51, 'ARBOLEDA (BERRUECOS)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(727, 17, 79, 'BARBACOAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(728, 17, 83, 'BELEN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(729, 17, 110, 'BUESACO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(730, 17, 203, 'COLON (GENOVA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(731, 17, 207, 'CONSACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(732, 17, 210, 'CONTADERO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(733, 17, 215, 'CORDOBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(734, 17, 224, 'CUASPUD (CARLOSAMA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(735, 17, 227, 'CUMBAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(736, 17, 233, 'CUMBITARA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(737, 17, 240, 'CHACHAGUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(738, 17, 250, 'EL CHARCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(739, 17, 254, 'EL PEÑOL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(740, 17, 256, 'EL ROSARIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(741, 17, 258, 'EL TABLON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(742, 17, 260, 'EL TAMBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(743, 17, 287, 'FUNES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(744, 17, 317, 'GUACHUCAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(745, 17, 320, 'GUAITARILLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(746, 17, 323, 'GUALMATAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(747, 17, 352, 'ILES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(748, 17, 354, 'IMUES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(749, 17, 356, 'IPIALES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(750, 17, 378, 'LA CRUZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(751, 17, 381, 'LA FLORIDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(752, 17, 385, 'LA LLANADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(753, 17, 390, 'LA TOLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(754, 17, 399, 'LA UNION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(755, 17, 405, 'LEIVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(756, 17, 411, 'LINARES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(757, 17, 418, 'LOS ANDES (SOTOMAYOR)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(758, 17, 427, 'MAGUI (PAYAN)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(759, 17, 435, 'MALLAMA (PIEDRANCHA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(760, 17, 473, 'MOSQUERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(761, 17, 490, 'OLAYA HERRERA (BOCAS DE SATINGA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(762, 17, 506, 'OSPINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(763, 17, 520, 'FRANCISCO PIZARRO (SALAHONDA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(764, 17, 540, 'POLICARPA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(765, 17, 560, 'POTOSI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(766, 17, 565, 'PROVIDENCIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(767, 17, 573, 'PUERRES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(768, 17, 585, 'PUPIALES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(769, 17, 612, 'RICAURTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(770, 17, 621, 'ROBERTO PAYAN (SAN JOSE)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(771, 17, 678, 'SAMANIEGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(772, 17, 683, 'SANDONA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(773, 17, 685, 'SAN BERNARDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(774, 17, 687, 'SAN LORENZO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(775, 17, 693, 'SAN PABLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(776, 17, 694, 'SAN PEDRO DE CARTAGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(777, 17, 696, 'SANTA BARBARA (ISCUANDE)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(778, 17, 699, 'SANTA CRUZ (GUACHAVES)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(779, 17, 720, 'SAPUYES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(780, 17, 786, 'TAMINANGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(781, 17, 788, 'TANGUA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(782, 17, 835, 'TUMACO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(783, 17, 838, 'TUQUERRES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(784, 17, 885, 'YACUANQUER', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(785, 18, 1, 'CUCUTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(786, 18, 3, 'ABREGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(787, 18, 51, 'ARBOLEDAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(788, 18, 99, 'BOCHALEMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(789, 18, 109, 'BUCARASICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(790, 18, 125, 'CACOTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(791, 18, 128, 'CACHIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(792, 18, 172, 'CHINACOTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(793, 18, 174, 'CHITAGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(794, 18, 206, 'CONVENCION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(795, 18, 223, 'CUCUTILLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(796, 18, 239, 'DURANIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(797, 18, 245, 'EL CARMEN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(798, 18, 250, 'EL TARRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(799, 18, 261, 'EL ZULIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(800, 18, 313, 'GRAMALOTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(801, 18, 344, 'HACARI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(802, 18, 347, 'HERRAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(803, 18, 377, 'LABATECA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(804, 18, 385, 'LA ESPERANZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(805, 18, 398, 'LA PLAYA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(806, 18, 405, 'LOS PATIOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(807, 18, 418, 'LOURDES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(808, 18, 480, 'MUTISCUA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(809, 18, 498, 'OCAÑA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(810, 18, 518, 'PAMPLONA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(811, 18, 520, 'PAMPLONITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(812, 18, 553, 'PUERTO SANTANDER', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(813, 18, 599, 'RAGONVALIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(814, 18, 660, 'SALAZAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(815, 18, 670, 'SAN CALIXTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(816, 18, 673, 'SAN CAYETANO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(817, 18, 680, 'SANTIAGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(818, 18, 720, 'SARDINATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(819, 18, 743, 'SILOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(820, 18, 800, 'TEORAMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(821, 18, 810, 'TIBU', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(822, 18, 820, 'TOLEDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(823, 18, 871, 'VILLACARO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(824, 18, 874, 'VILLA DEL ROSARIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(825, 19, 1, 'ARMENIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(826, 19, 111, 'BUENAVISTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(827, 19, 130, 'CALARCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(828, 19, 190, 'CIRCASIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(829, 19, 212, 'CORDOBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(830, 19, 272, 'FILANDIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(831, 19, 302, 'GENOVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(832, 19, 401, 'LA TEBAIDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(833, 19, 470, 'MONTENEGRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(834, 19, 548, 'PIJAO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(835, 19, 594, 'QUIMBAYA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(836, 19, 690, 'SALENTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(837, 20, 1, 'PEREIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(838, 20, 45, 'APIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(839, 20, 75, 'BALBOA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(840, 20, 88, 'BELEN DE UMBRIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(841, 20, 170, 'DOS QUEBRADAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(842, 20, 318, 'GUATICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(843, 20, 383, 'LA CELIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(844, 20, 400, 'LA VIRGINIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(845, 20, 440, 'MARSELLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(846, 20, 456, 'MISTRATO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(847, 20, 572, 'PUEBLO RICO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(848, 20, 594, 'QUINCHIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(849, 20, 682, 'SANTA ROSA DE CABAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(850, 20, 687, 'SANTUARIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(851, 21, 1, 'BUCARAMANGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(852, 21, 13, 'AGUADA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(853, 21, 20, 'ALBANIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(854, 21, 51, 'ARATOCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(855, 21, 77, 'BARBOSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(856, 21, 79, 'BARICHARA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(857, 21, 81, 'BARRANCABERMEJA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(858, 21, 92, 'BETULIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(859, 21, 101, 'BOLIVAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(860, 21, 121, 'CABRERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(861, 21, 132, 'CALIFORNIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(862, 21, 147, 'CAPITANEJO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(863, 21, 152, 'CARCASI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(864, 21, 160, 'CEPITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(865, 21, 162, 'CERRITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(866, 21, 167, 'CHARALA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(867, 21, 169, 'CHARTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(868, 21, 176, 'CHIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(869, 21, 179, 'CHIPATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(870, 21, 190, 'CIMITARRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(871, 21, 207, 'CONCEPCION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(872, 21, 209, 'CONFINES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(873, 21, 211, 'CONTRATACION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(874, 21, 217, 'COROMORO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(875, 21, 229, 'CURITI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(876, 21, 235, 'EL CARMEN DE CHUCURY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(877, 21, 245, 'EL GUACAMAYO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(878, 21, 250, 'EL PEÑON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(879, 21, 255, 'EL PLAYON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(880, 21, 264, 'ENCINO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(881, 21, 266, 'ENCISO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(882, 21, 271, 'FLORIAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(883, 21, 276, 'FLORIDABLANCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(884, 21, 296, 'GALAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(885, 21, 298, 'GAMBITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(886, 21, 307, 'GIRON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(887, 21, 318, 'GUACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(888, 21, 320, 'GUADALUPE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(889, 21, 322, 'GUAPOTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(890, 21, 324, 'GUAVATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(891, 21, 327, 'GUEPSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(892, 21, 344, 'HATO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(893, 21, 368, 'JESUS MARIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(894, 21, 370, 'JORDAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(895, 21, 377, 'LA BELLEZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(896, 21, 385, 'LANDAZURI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(897, 21, 397, 'LA PAZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(898, 21, 406, 'LEBRIJA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(899, 21, 418, 'LOS SANTOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(900, 21, 425, 'MACARAVITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(901, 21, 432, 'MALAGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(902, 21, 444, 'MATANZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(903, 21, 464, 'MOGOTES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(904, 21, 468, 'MOLAGAVITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(905, 21, 498, 'OCAMONTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(906, 21, 500, 'OIBA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(907, 21, 502, 'ONZAGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(908, 21, 522, 'PALMAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(909, 21, 524, 'PALMAS DEL SOCORRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(910, 21, 533, 'PARAMO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(911, 21, 547, 'PIEDECUESTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(912, 21, 549, 'PINCHOTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(913, 21, 572, 'PUENTE NACIONAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(914, 21, 573, 'PUERTO PARRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(915, 21, 575, 'PUERTO WILCHES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(916, 21, 615, 'RIONEGRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(917, 21, 655, 'SABANA DE TORRES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(918, 21, 669, 'SAN ANDRES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(919, 21, 673, 'SAN BENITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(920, 21, 679, 'SAN GIL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(921, 21, 682, 'SAN JOAQUIN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(922, 21, 684, 'SAN JOSE DE MIRANDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(923, 21, 686, 'SAN MIGUEL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(924, 21, 689, 'SAN VICENTE DE CHUCURI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(925, 21, 705, 'SANTA BARBARA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(926, 21, 720, 'SANTA HELENA DEL OPON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(927, 21, 745, 'SIMACOTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(928, 21, 755, 'SOCORRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(929, 21, 770, 'SUAITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(930, 21, 773, 'SUCRE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(931, 21, 780, 'SURATA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(932, 21, 820, 'TONA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(933, 21, 855, 'VALLE SAN JOSE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(934, 21, 861, 'VELEZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(935, 21, 867, 'VETAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(936, 21, 872, 'VILLANUEVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(937, 21, 895, 'ZAPATOCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(938, 22, 1, 'SINCELEJO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(939, 22, 110, 'BUENAVISTA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(940, 22, 124, 'CAIMITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(941, 22, 204, 'COLOSO (RICAURTE)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(942, 22, 215, 'COROZAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(943, 22, 230, 'CHALAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(944, 22, 235, 'GALERAS (NUEVA GRANADA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(945, 22, 265, 'GUARANDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(946, 22, 400, 'LA UNION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(947, 22, 418, 'LOS PALMITOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(948, 22, 429, 'MAJAGUAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(949, 22, 473, 'MORROA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(950, 22, 508, 'OVEJAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(951, 22, 523, 'PALMITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(952, 22, 670, 'SAMPUES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(953, 22, 678, 'SAN BENITO ABAD', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(954, 22, 702, 'SAN JUAN DE BETULIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(955, 22, 708, 'SAN MARCOS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(956, 22, 713, 'SAN ONOFRE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(957, 22, 717, 'SAN PEDRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(958, 22, 742, 'SINCE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(959, 22, 771, 'SUCRE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(960, 22, 820, 'TOLU', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(961, 22, 823, 'TOLUVIEJO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(962, 23, 1, 'IBAGUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(963, 23, 24, 'ALPUJARRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(964, 23, 26, 'ALVARADO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(965, 23, 30, 'AMBALEMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(966, 23, 43, 'ANZOATEGUI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(967, 23, 55, 'ARMERO (GUAYABAL)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(968, 23, 67, 'ATACO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(969, 23, 124, 'CAJAMARCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(970, 23, 148, 'CARMEN APICALA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(971, 23, 152, 'CASABIANCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(972, 23, 168, 'CHAPARRAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(973, 23, 200, 'COELLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(974, 23, 217, 'COYAIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(975, 23, 226, 'CUNDAY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(976, 23, 236, 'DOLORES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(977, 23, 268, 'ESPINAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(978, 23, 270, 'FALAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(979, 23, 275, 'FLANDES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(980, 23, 283, 'FRESNO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(981, 23, 319, 'GUAMO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(982, 23, 347, 'HERVEO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(983, 23, 349, 'HONDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(984, 23, 352, 'ICONONZO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(985, 23, 408, 'LERIDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(986, 23, 411, 'LIBANO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(987, 23, 443, 'MARIQUITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(988, 23, 449, 'MELGAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(989, 23, 461, 'MURILLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(990, 23, 483, 'NATAGAIMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(991, 23, 504, 'ORTEGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(992, 23, 520, 'PALOCABILDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(993, 23, 547, 'PIEDRAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(994, 23, 555, 'PLANADAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(995, 23, 563, 'PRADO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(996, 23, 585, 'PURIFICACION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(997, 23, 616, 'RIOBLANCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(998, 23, 622, 'RONCESVALLES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(999, 23, 624, 'ROVIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1000, 23, 671, 'SALDAÑA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1001, 23, 675, 'SAN ANTONIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1002, 23, 678, 'SAN LUIS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1003, 23, 686, 'SANTA ISABEL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1004, 23, 770, 'SUAREZ', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1005, 23, 854, 'VALLE DE SAN JUAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1006, 23, 861, 'VENADILLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1007, 23, 870, 'VILLAHERMOSA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1008, 23, 873, 'VILLARRICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1009, 24, 1, 'CALI (SANTIAGO DE CALI)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1010, 24, 20, 'ALCALA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1011, 24, 36, 'ANDALUCIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1012, 24, 41, 'ANSERMANUEVO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1013, 24, 54, 'ARGELIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1014, 24, 100, 'BOLIVAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1015, 24, 109, 'BUENAVENTURA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1016, 24, 111, 'BUGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1017, 24, 113, 'BUGALAGRANDE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1018, 24, 122, 'CAICEDONIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1019, 24, 126, 'CALIMA (DARIEN)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1020, 24, 130, 'CANDELARIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1021, 24, 147, 'CARTAGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1022, 24, 233, 'DAGUA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1023, 24, 243, 'EL AGUILA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1024, 24, 246, 'EL CAIRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1025, 24, 248, 'EL CERRITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1026, 24, 250, 'EL DOVIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1027, 24, 275, 'FLORIDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1028, 24, 306, 'GINEBRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1029, 24, 318, 'GUACARI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1030, 24, 364, 'JAMUNDI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1031, 24, 377, 'LA CUMBRE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1032, 24, 400, 'LA UNION', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1033, 24, 403, 'LA VICTORIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1034, 24, 497, 'OBANDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1035, 24, 520, 'PALMIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1036, 24, 563, 'PRADERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1037, 24, 606, 'RESTREPO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1038, 24, 616, 'RIOFRIO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1039, 24, 622, 'ROLDANILLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1040, 24, 670, 'SAN PEDRO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1041, 24, 736, 'SEVILLA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1042, 24, 823, 'TORO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1043, 24, 828, 'TRUJILLO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1044, 24, 834, 'TULUA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1045, 24, 845, 'ULLOA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1046, 24, 863, 'VERSALLES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1047, 24, 869, 'VIJES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1048, 24, 890, 'YOTOCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1049, 24, 892, 'YUMBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1050, 24, 895, 'ZARZAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1051, 25, 1, 'ARAUCA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1052, 25, 65, 'ARAUQUITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1053, 25, 220, 'CRAVO NORTE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1054, 25, 300, 'FORTUL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1055, 25, 591, 'PUERTO RONDON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1056, 25, 736, 'SARAVENA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1057, 25, 794, 'TAME', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1058, 26, 1, 'YOPAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1059, 26, 10, 'AGUAZUL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1060, 26, 15, 'CHAMEZA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1061, 26, 125, 'HATO COROZAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1062, 26, 136, 'LA SALINA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1063, 26, 139, 'MANI', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1064, 26, 162, 'MONTERREY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1065, 26, 225, 'NUNCHIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1066, 26, 230, 'OROCUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1067, 26, 250, 'PAZ DE ARIPORO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1068, 26, 263, 'PORE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1069, 26, 279, 'RECETOR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1070, 26, 300, 'SABANALARGA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1071, 26, 315, 'SACAMA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1072, 26, 325, 'SAN LUIS DE PALENQUE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1073, 26, 400, 'TAMARA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1074, 26, 410, 'TAURAMENA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1075, 26, 430, 'TRINIDAD', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1076, 26, 440, 'VILLANUEVA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1077, 27, 1, 'MOCOA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1078, 27, 219, 'COLON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1079, 27, 320, 'ORITO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1080, 27, 568, 'PUERTO ASIS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1081, 27, 569, 'PUERTO CAICEDO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1082, 27, 571, 'PUERTO GUZMAN', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1083, 27, 573, 'PUERTO LEGUIZAMO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1084, 27, 749, 'SIBUNDOY', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1085, 27, 755, 'SAN FRANCISCO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1086, 27, 757, 'SAN MIGUEL (LA DORADA)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1087, 27, 760, 'SANTIAGO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1088, 27, 865, 'LA HORMIGA (VALLE DEL GUAMUEZ)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1089, 27, 885, 'VILLAGARZON', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1090, 28, 1, 'SAN ANDRES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1091, 28, 564, 'PROVIDENCIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1092, 29, 1, 'LETICIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1093, 29, 263, 'EL ENCANTO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1094, 29, 405, 'LA CHORRERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1095, 29, 407, 'LA PEDRERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1096, 29, 430, 'LA VICTORIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1097, 29, 460, 'MIRITI-PARANA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1098, 29, 530, 'PUERTO ALEGRIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1099, 29, 536, 'PUERTO ARICA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1100, 29, 540, 'PUERTO NARIÑO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1101, 29, 669, 'PUERTO SANTANDER', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1102, 29, 798, 'TARAPACA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1103, 30, 1, 'PUERTO INIRIDA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1104, 30, 343, 'BARRANCO MINAS', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1105, 30, 883, 'SAN FELIPE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1106, 30, 884, 'PUERTO COLOMBIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1107, 30, 885, 'LA GUADALUPE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1108, 30, 886, 'CACAHUAL', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1109, 30, 887, 'PANA PANA (CAMPO ALEGRE)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1110, 30, 888, 'MORICHAL (MORICHAL NUEVO)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1111, 31, 1, 'SAN JOSE DEL GUAVIARE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1112, 31, 15, 'CALAMAR', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1113, 31, 25, 'EL RETORNO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1114, 31, 200, 'MIRAFLORES', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1115, 32, 1, 'MITU', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1116, 32, 161, 'CARURU', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1117, 32, 511, 'PACOA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1118, 32, 666, 'TARAIRA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1119, 32, 777, 'PAPUNAUA (MORICHAL)', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1120, 32, 889, 'YAVARATE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1121, 33, 1, 'PUERTO CARREÑO', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1122, 33, 524, 'LA PRIMAVERA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1123, 33, 572, 'SANTA RITA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1124, 33, 666, 'SANTA ROSALIA', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1125, 33, 760, 'SAN JOSE DE OCUNE', '2018-08-25 10:00:00', '2018-08-25 10:00:00'),
(1126, 33, 773, 'CUMARIBO', '2018-08-25 10:00:00', '2018-08-25 10:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` bigint(20) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `user_status_id` int(10) UNSIGNED NOT NULL,
  `dni_type_id` int(10) UNSIGNED NOT NULL,
  `dependency_id` int(10) UNSIGNED DEFAULT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `town_id` int(10) UNSIGNED DEFAULT NULL,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `logged_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dni`, `image`, `image_thumbnail`, `company_name`, `cellphone_number`, `semester`, `user_type_id`, `user_status_id`, `dni_type_id`, `dependency_id`, `gender_id`, `town_id`, `confirmation_code`, `confirmed_at`, `logged_at`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Francisco GSilva', 'javiergonzalezsilva@gmail.com', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 1049622748, 'http://oddiss.appsolution.co/img/system32/user_profile.png', 'http://oddiss.appsolution.co/img/system32/user_profile.png', NULL, '3177348312', NULL, 1, 1, 1, NULL, 2, NULL, NULL, NULL, NULL, 'ajg7oaH2FUxExU7Ae3O9w61rqU42Ndhv4NT52SxNFCNt6rNFqn2bxOgLOx2u', NULL, '2018-08-27 02:50:38', '2018-08-27 02:50:38'),
(2, 'Camila Peña', 'melizacamila1196@gmail.com', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 123456789, 'http://oddiss.appsolution.co/img/system32/user_profile.png', 'http://oddiss.appsolution.co/img/system32/user_profile.png', NULL, '3100000000', NULL, 1, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, '56O0XDgN7euoPZGukRjp8mAHiNVdLi1nKqLIPtim0P2VOmOALtgHQWK5xsdQ', NULL, '2018-08-27 02:55:11', '2018-08-27 02:55:11'),
(4, 'Julio Alejandro Pinzon Nuñez', 'jpinzon@jdc.edu.co', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 987654321, 'http://oddiss.appsolution.co/img/system32/user_profile.png', 'http://oddiss.appsolution.co/img/system32/user_profile.png', NULL, '3100000000', NULL, 1, 1, 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-27 02:57:04', '2018-08-27 02:57:04'),
(6, 'H.M. Murdock', 'hmmurdock@gmail.com', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 123655985, 'http://franciscogsilva.com/prestamosjdc/img/system32/icon.png', 'http://franciscogsilva.com/prestamosjdc/img/system32/icon.png', NULL, '32569874512', 5, 3, 1, 1, 1, 2, 215, 'qQlcrkHCm57NA51x5qVOEHxfl9s0vB1cQZIoLXQDKckpXuZHDwYBM0XkQk6Z41NoQRyZvy36ndNK4YO9xnNPA3qbwwwG4e5cxueE', NULL, NULL, '2zemUijn4a7QX9lPS7i55LanR5a8ptoBzTZywnD1wGqgtAMZWFPHYBhAKeLZ', NULL, '2018-09-06 10:17:36', '2018-10-30 15:54:44'),
(7, 'sdfsdf', 'sdf@gmail.copm', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 12312312312, 'http://franciscogsilva.com/prestamosjdc/img/system32/icon.png', 'http://franciscogsilva.com/prestamosjdc/img/system32/icon.png', NULL, '123123', 5, 3, 1, 1, 1, 2, 1092, 'LdyFciH3Zy8SewPSL33nBZYtoHYAhCcg0Pvdgc9P0slmyQlvP4Z6NTFIQQ3Zu2auniWDfbX8C34C5Ctp4OrdAcIOFXZbTPRyG1iU', NULL, NULL, NULL, NULL, '2018-09-06 10:27:08', '2018-09-06 10:27:08'),
(8, 'Administrativo User', 'administrativo@correo.com', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 12313123, 'http://franciscogsilva.com/prestamosjdc/img/system32/icon.png', 'http://franciscogsilva.com/prestamosjdc/img/system32/icon.png', NULL, '123123', NULL, 4, 1, 1, 3, 1, 1094, 'NeYCOrMvDI6FddCZ0wgJz5kzbudnBxAFo85FrPwIfm3KsM5w5Hb4uX1FYi2AB8eSpKxgEtm0VD10vtGs7T27vj9jhnXMPFGfj5SC', NULL, NULL, 'NEKFXqyK2UiSh85U2rcSw6lMh4Qrv70EYygRdBf2heMpzJDKqIFieIe4Q10E', NULL, '2018-09-06 10:27:34', '2018-09-07 08:42:42'),
(9, 'Docente User', 'docente@correo.com', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 123123123, 'http://franciscogsilva.com/prestamosjdc/img/system32/icon.png', 'http://franciscogsilva.com/prestamosjdc/img/system32/icon.png', NULL, '12312312', NULL, 2, 1, 4, 1, 3, 126, 'YvXIEDE9P4SLjTHJ3H4lQPEi1739fSExFeuJOwSkEEFGFnJxemfPXzL8gNTIFvkNOL5KNTyR56SKpX67vFdlJ9NByaaVJVG4S8Eh', NULL, NULL, 'AuOXhyRRH01zrCsX976Oh8aqVeHSNV7ni8Ofi9SwpH878p57kD4YZTUhdXTk', NULL, '2018-09-06 10:28:08', '2018-09-07 08:42:41'),
(10, 'asdasdaqwd', 'asdqwxcqw@gmail.com', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 1231231237869, 'http://franciscogsilva.com/prestamosjdc/img/users/prestamosjdc_user_10_1536212328.jpg', 'http://franciscogsilva.com/prestamosjdc/img/users/prestamosjdc_user_10_1536212329_thumbnail.jpg', 'Frikis S.A', '12312124', NULL, 5, 1, 1, NULL, 2, 590, 'ffhLspadRBFkmr8mK4Nen1DcCxvVB6XNLC6EFmt7FtjogGBtkcoZTSEkcpExK6LGu3nexqz2Bkchwx2ZXRgljx3O6AYSJPSntGhv', NULL, NULL, NULL, NULL, '2018-09-06 10:38:48', '2018-09-07 08:42:41'),
(11, 'Admin Planeación', 'fjgonzalez@jdc.edu.co', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 10496227486, 'https://franciscogsilva.com/prestamosjdc/img/users/prestamosjdc_user_11_1540761580.jpg', 'https://franciscogsilva.com/prestamosjdc/img/users/prestamosjdc_user_11_1540761580_thumbnail.jpg', NULL, '3177348312', NULL, 6, 1, 1, NULL, 2, 215, 'OkAA2iijttkr9ycBlvt0XwqpsWaSIOu4UxTKPGz4aRoVB7sVKJZElIqdjYC5PGR8JWByGyoTC19hfyRpyv3XRazy63X6efQv2MGf', NULL, NULL, '8zxO4vfImz280s13bwVTyXm2pmAZoXZsxvkLpYrTXj4I8Skv4Agzf1blrETu', NULL, '2018-10-28 21:19:40', '2018-10-28 21:19:40'),
(12, 'Admin Audiovisuales', 'fjgonzalezs@correo.udistrital.edu.co', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 104962274854, 'https://franciscogsilva.com/prestamosjdc/img/users/prestamosjdc_user_12_1540762388.jpg', 'https://franciscogsilva.com/prestamosjdc/img/users/prestamosjdc_user_12_1540762388_thumbnail.jpg', NULL, '3177348312', NULL, 7, 1, 1, 6, 2, 215, '8qW1Ux1q2dASxm7yDpidpqgIBhDs6d9tiNzpM5aimKOpV1e34YySQFZDjHux0ItUehbIsspdeurYfhSsvwlLFMIyWebR2NFJWtBi', NULL, NULL, 'Xk5Ckzdqitwbqzmk7kwOLQWpKaZ1bsEVI3NWK4xIH8Dqwph2PmYznvvu5iPo', NULL, '2018-10-28 21:30:51', '2018-10-28 21:33:08'),
(13, 'Admin Bienestar', 'francisco@appsolution.co', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 104965512515, 'https://franciscogsilva.com/prestamosjdc/img/users/prestamosjdc_user_13_1540763207.png', 'https://franciscogsilva.com/prestamosjdc/img/users/prestamosjdc_user_13_1540763207_thumbnail.png', NULL, '3177348312', NULL, 8, 1, 1, 5, 2, 215, 'vQcipLUCrGta2z2NFEEpGvHYopDo6PRrpOUoYRBDHcYFulix1dt35R5nMLegVA7lmUjfK7KeD434iDmBrfmwU3Rl0WF4JeT5CzLW', NULL, NULL, 'Rwio0vk1RqKr23Lo1a2lHYOuS3R35yZp8wHYSWQ5OXF69tge2Lk1YEJ0Htiy', NULL, '2018-10-28 21:46:47', '2018-10-28 21:46:47'),
(14, 'Pepito Externo', 'externo@gmail.com', '$2y$10$Tolnp4tKVjCwS9JkMqFUOeHXxQ/DIzLEAkZ4Sg/RxVy7IoMAd8hci', 9010028054952525, NULL, NULL, 'Pepito Company', '3177348312', NULL, 5, 1, 1, NULL, 2, NULL, NULL, NULL, NULL, 'kho79JKx7dJgMNa8mSW0HTbzVwjSEBnsoJnz8P96Nw8OalckvKoTQq0ofK4v', NULL, '2018-10-30 13:26:27', '2018-10-30 13:26:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_statuses`
--

CREATE TABLE `user_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_statuses`
--

INSERT INTO `user_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2018-08-26 09:16:00', '2018-08-26 09:16:00'),
(2, 'Inactivo', '2018-08-26 09:17:00', '2018-08-26 09:17:00'),
(3, 'Inhabilitado', '2018-08-26 09:18:00', '2018-08-26 09:18:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2018-08-26 09:20:00', '2018-08-26 09:20:00'),
(2, 'Docente', '2018-08-26 09:21:00', '2018-08-26 09:21:00'),
(3, 'Estudiante', '2018-08-26 09:22:00', '2018-08-26 09:22:00'),
(4, 'Administrativo', '2018-08-26 09:22:00', '2018-08-26 09:23:00'),
(5, 'Externo', '2018-08-26 09:23:00', '2018-08-26 09:23:00'),
(6, 'Administrador Planeación', '2018-10-28 05:00:00', '2018-10-28 05:00:00'),
(7, 'Administrador Audiovisuales', '2018-10-28 05:00:00', '2018-10-28 05:00:00'),
(8, 'Administrador Bienestar', '2018-10-28 05:00:00', '2018-10-28 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `working_days`
--

CREATE TABLE `working_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `working_days`
--

INSERT INTO `working_days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Diurna', '2018-08-26 09:13:00', '2018-08-26 09:13:00'),
(2, 'Nocturna', '2018-08-26 09:13:00', '2018-08-26 09:13:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authorizations`
--
ALTER TABLE `authorizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorizations_request_id_foreign` (`request_id`),
  ADD KEY `authorizations_authorization_status_id_foreign` (`authorization_status_id`),
  ADD KEY `authorizations_approved_by_foreign` (`approved_by`),
  ADD KEY `authorizations_received_by_foreign` (`received_by`);

--
-- Indices de la tabla `authorizations_has_resources`
--
ALTER TABLE `authorizations_has_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorizations_has_resources_resource_id_foreign` (`resource_id`),
  ADD KEY `authorizations_has_resources_authorization_id_foreign` (`authorization_id`);

--
-- Indices de la tabla `authorizations_has_spaces`
--
ALTER TABLE `authorizations_has_spaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorizations_has_spaces_space_id_foreign` (`space_id`),
  ADD KEY `authorizations_has_spaces_authorization_id_foreign` (`authorization_id`);

--
-- Indices de la tabla `authorization_statuses`
--
ALTER TABLE `authorization_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buildings_headquarter_id_foreign` (`headquarter_id`);

--
-- Indices de la tabla `complements`
--
ALTER TABLE `complements`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `complements_has_resources`
--
ALTER TABLE `complements_has_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complements_has_resources_resource_id_foreign` (`resource_id`),
  ADD KEY `complements_has_resources_complement_id_foreign` (`complement_id`);

--
-- Indices de la tabla `departaments`
--
ALTER TABLE `departaments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dependencies`
--
ALTER TABLE `dependencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dependencies_email_unique` (`email`),
  ADD KEY `dependencies_headquarter_id_foreign` (`headquarter_id`);

--
-- Indices de la tabla `dependencies_has_users`
--
ALTER TABLE `dependencies_has_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependencies_has_users_attendant_id_foreign` (`attendant_id`),
  ADD KEY `dependencies_has_users_dependency_id_foreign` (`dependency_id`);

--
-- Indices de la tabla `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devices_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `dni_types`
--
ALTER TABLE `dni_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `headquarters`
--
ALTER TABLE `headquarters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `headquarters_town_id_foreign` (`town_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalities`
--
ALTER TABLE `modalities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participant_types`
--
ALTER TABLE `participant_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participant_types_has_requests`
--
ALTER TABLE `participant_types_has_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participant_types_has_requests_request_id_foreign` (`request_id`),
  ADD KEY `participant_types_has_requests_participant_type_id_foreign` (`participant_type_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `physical_states`
--
ALTER TABLE `physical_states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_program_type_id_foreign` (`program_type_id`),
  ADD KEY `programs_dependency_id_foreign` (`dependency_id`);

--
-- Indices de la tabla `programs_has_modalities`
--
ALTER TABLE `programs_has_modalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_has_modalities_program_id_foreign` (`program_id`),
  ADD KEY `programs_has_modalities_modality_id_foreign` (`modality_id`);

--
-- Indices de la tabla `programs_has_working_days`
--
ALTER TABLE `programs_has_working_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_has_working_days_program_id_foreign` (`program_id`),
  ADD KEY `programs_has_working_days_working_day_id_foreign` (`working_day_id`);

--
-- Indices de la tabla `program_types`
--
ALTER TABLE `program_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_responsible_id_foreign` (`responsible_id`),
  ADD KEY `requests_request_type_id_foreign` (`request_type_id`);

--
-- Indices de la tabla `request_types`
--
ALTER TABLE `request_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_resource_type_id_foreign` (`resource_type_id`),
  ADD KEY `resources_resource_status_id_foreign` (`resource_status_id`),
  ADD KEY `resources_dependency_id_foreign` (`dependency_id`),
  ADD KEY `resources_resource_category_id_foreign` (`resource_category_id`),
  ADD KEY `resources_physical_state_id_foreign` (`physical_state_id`);

--
-- Indices de la tabla `resources_has_users`
--
ALTER TABLE `resources_has_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_has_users_user_id_foreign` (`user_id`),
  ADD KEY `resources_has_users_resource_id_foreign` (`resource_id`);

--
-- Indices de la tabla `resource_categories`
--
ALTER TABLE `resource_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resource_statuses`
--
ALTER TABLE `resource_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resource_types`
--
ALTER TABLE `resource_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `spaces`
--
ALTER TABLE `spaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spaces_space_type_id_foreign` (`space_type_id`),
  ADD KEY `spaces_space_status_id_foreign` (`space_status_id`),
  ADD KEY `spaces_property_type_id_foreign` (`property_type_id`),
  ADD KEY `spaces_building_id_foreign` (`building_id`),
  ADD KEY `spaces_headquarter_id_foreign` (`headquarter_id`);

--
-- Indices de la tabla `spaces_has_resources`
--
ALTER TABLE `spaces_has_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spaces_has_resources_resource_id_foreign` (`resource_id`),
  ADD KEY `spaces_has_resources_space_id_foreign` (`space_id`);

--
-- Indices de la tabla `space_statuses`
--
ALTER TABLE `space_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `space_types`
--
ALTER TABLE `space_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `towns_departament_id_foreign` (`departament_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_dni_unique` (`dni`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`),
  ADD KEY `users_user_status_id_foreign` (`user_status_id`),
  ADD KEY `users_dni_type_id_foreign` (`dni_type_id`),
  ADD KEY `users_dependency_id_foreign` (`dependency_id`),
  ADD KEY `users_gender_id_foreign` (`gender_id`),
  ADD KEY `users_town_id_foreign` (`town_id`);

--
-- Indices de la tabla `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `working_days`
--
ALTER TABLE `working_days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `authorizations`
--
ALTER TABLE `authorizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `authorizations_has_resources`
--
ALTER TABLE `authorizations_has_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `authorizations_has_spaces`
--
ALTER TABLE `authorizations_has_spaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `authorization_statuses`
--
ALTER TABLE `authorization_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `complements`
--
ALTER TABLE `complements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `complements_has_resources`
--
ALTER TABLE `complements_has_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departaments`
--
ALTER TABLE `departaments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `dependencies`
--
ALTER TABLE `dependencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `dependencies_has_users`
--
ALTER TABLE `dependencies_has_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dni_types`
--
ALTER TABLE `dni_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `headquarters`
--
ALTER TABLE `headquarters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `modalities`
--
ALTER TABLE `modalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `participant_types`
--
ALTER TABLE `participant_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `participant_types_has_requests`
--
ALTER TABLE `participant_types_has_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `physical_states`
--
ALTER TABLE `physical_states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `programs_has_modalities`
--
ALTER TABLE `programs_has_modalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `programs_has_working_days`
--
ALTER TABLE `programs_has_working_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `program_types`
--
ALTER TABLE `program_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `request_types`
--
ALTER TABLE `request_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `resources_has_users`
--
ALTER TABLE `resources_has_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `resource_categories`
--
ALTER TABLE `resource_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `resource_statuses`
--
ALTER TABLE `resource_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `resource_types`
--
ALTER TABLE `resource_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `spaces`
--
ALTER TABLE `spaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `spaces_has_resources`
--
ALTER TABLE `spaces_has_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `space_statuses`
--
ALTER TABLE `space_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `space_types`
--
ALTER TABLE `space_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `towns`
--
ALTER TABLE `towns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1127;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `working_days`
--
ALTER TABLE `working_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authorizations`
--
ALTER TABLE `authorizations`
  ADD CONSTRAINT `authorizations_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `authorizations_authorization_status_id_foreign` FOREIGN KEY (`authorization_status_id`) REFERENCES `authorization_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `authorizations_received_by_foreign` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `authorizations_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `authorizations_has_resources`
--
ALTER TABLE `authorizations_has_resources`
  ADD CONSTRAINT `authorizations_has_resources_authorization_id_foreign` FOREIGN KEY (`authorization_id`) REFERENCES `authorizations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `authorizations_has_resources_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `authorizations_has_spaces`
--
ALTER TABLE `authorizations_has_spaces`
  ADD CONSTRAINT `authorizations_has_spaces_authorization_id_foreign` FOREIGN KEY (`authorization_id`) REFERENCES `authorizations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `authorizations_has_spaces_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildings_headquarter_id_foreign` FOREIGN KEY (`headquarter_id`) REFERENCES `headquarters` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `complements_has_resources`
--
ALTER TABLE `complements_has_resources`
  ADD CONSTRAINT `complements_has_resources_complement_id_foreign` FOREIGN KEY (`complement_id`) REFERENCES `complements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complements_has_resources_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `dependencies`
--
ALTER TABLE `dependencies`
  ADD CONSTRAINT `dependencies_headquarter_id_foreign` FOREIGN KEY (`headquarter_id`) REFERENCES `headquarters` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `dependencies_has_users`
--
ALTER TABLE `dependencies_has_users`
  ADD CONSTRAINT `dependencies_has_users_attendant_id_foreign` FOREIGN KEY (`attendant_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dependencies_has_users_dependency_id_foreign` FOREIGN KEY (`dependency_id`) REFERENCES `dependencies` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `headquarters`
--
ALTER TABLE `headquarters`
  ADD CONSTRAINT `headquarters_town_id_foreign` FOREIGN KEY (`town_id`) REFERENCES `towns` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `participant_types_has_requests`
--
ALTER TABLE `participant_types_has_requests`
  ADD CONSTRAINT `participant_types_has_requests_participant_type_id_foreign` FOREIGN KEY (`participant_type_id`) REFERENCES `participant_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participant_types_has_requests_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_dependency_id_foreign` FOREIGN KEY (`dependency_id`) REFERENCES `dependencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `programs_program_type_id_foreign` FOREIGN KEY (`program_type_id`) REFERENCES `program_types` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `programs_has_modalities`
--
ALTER TABLE `programs_has_modalities`
  ADD CONSTRAINT `programs_has_modalities_modality_id_foreign` FOREIGN KEY (`modality_id`) REFERENCES `modalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `programs_has_modalities_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `programs_has_working_days`
--
ALTER TABLE `programs_has_working_days`
  ADD CONSTRAINT `programs_has_working_days_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `programs_has_working_days_working_day_id_foreign` FOREIGN KEY (`working_day_id`) REFERENCES `working_days` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_request_type_id_foreign` FOREIGN KEY (`request_type_id`) REFERENCES `request_types` (`id`),
  ADD CONSTRAINT `requests_responsible_id_foreign` FOREIGN KEY (`responsible_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_dependency_id_foreign` FOREIGN KEY (`dependency_id`) REFERENCES `dependencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resources_physical_state_id_foreign` FOREIGN KEY (`physical_state_id`) REFERENCES `physical_states` (`id`),
  ADD CONSTRAINT `resources_resource_category_id_foreign` FOREIGN KEY (`resource_category_id`) REFERENCES `resource_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resources_resource_status_id_foreign` FOREIGN KEY (`resource_status_id`) REFERENCES `resource_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resources_resource_type_id_foreign` FOREIGN KEY (`resource_type_id`) REFERENCES `resource_types` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `resources_has_users`
--
ALTER TABLE `resources_has_users`
  ADD CONSTRAINT `resources_has_users_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resources_has_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `spaces`
--
ALTER TABLE `spaces`
  ADD CONSTRAINT `spaces_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spaces_headquarter_id_foreign` FOREIGN KEY (`headquarter_id`) REFERENCES `headquarters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spaces_property_type_id_foreign` FOREIGN KEY (`property_type_id`) REFERENCES `property_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spaces_space_status_id_foreign` FOREIGN KEY (`space_status_id`) REFERENCES `space_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spaces_space_type_id_foreign` FOREIGN KEY (`space_type_id`) REFERENCES `space_types` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `spaces_has_resources`
--
ALTER TABLE `spaces_has_resources`
  ADD CONSTRAINT `spaces_has_resources_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `spaces_has_resources_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `towns`
--
ALTER TABLE `towns`
  ADD CONSTRAINT `towns_departament_id_foreign` FOREIGN KEY (`departament_id`) REFERENCES `departaments` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_dependency_id_foreign` FOREIGN KEY (`dependency_id`) REFERENCES `dependencies` (`id`),
  ADD CONSTRAINT `users_dni_type_id_foreign` FOREIGN KEY (`dni_type_id`) REFERENCES `dni_types` (`id`),
  ADD CONSTRAINT `users_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `users_town_id_foreign` FOREIGN KEY (`town_id`) REFERENCES `towns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_user_status_id_foreign` FOREIGN KEY (`user_status_id`) REFERENCES `user_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;