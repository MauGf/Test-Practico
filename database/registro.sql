-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 13, 2021 at 07:17 AM
-- Server version: 5.7.32
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registro`
--

-- --------------------------------------------------------

--
-- Table structure for table `alm_alumnos`
--

CREATE TABLE `alm_alumnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alm_codigo` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alm_nombre` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alm_edad` int(11) NOT NULL,
  `alm_sexo` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grd_id` bigint(20) UNSIGNED NOT NULL,
  `alm_observacion` char(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alm_alumnos`
--

INSERT INTO `alm_alumnos` (`id`, `alm_codigo`, `alm_nombre`, `alm_edad`, `alm_sexo`, `grd_id`, `alm_observacion`, `created_at`, `updated_at`) VALUES
(2, '334433', 'María Torrez', 16, 'Femenino', 4, NULL, '2021-12-13 12:38:35', '2021-12-13 12:40:09'),
(3, '1111', 'Pedro Gomez', 17, 'Noveno', 5, 'De prueba', '2021-12-13 12:39:39', '2021-12-13 12:39:39'),
(4, '1111', 'Juan Carlos', 17, 'Masculino', 6, 'Observaciones test', '2021-12-13 12:45:27', '2021-12-13 12:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grd_grados`
--

CREATE TABLE `grd_grados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grd_nombre` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grd_grados`
--

INSERT INTO `grd_grados` (`id`, `grd_nombre`, `created_at`, `updated_at`) VALUES
(4, 'Sexto Grado', '2021-12-13 08:03:45', '2021-12-13 08:05:07'),
(5, 'Primero', '2021-12-13 10:58:45', '2021-12-13 10:58:45'),
(6, 'Septimo', '2021-12-13 12:43:55', '2021-12-13 12:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `materias_grados`
--

CREATE TABLE `materias_grados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grd_grado_id` bigint(20) UNSIGNED NOT NULL,
  `mat_materia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materias_grados`
--

INSERT INTO `materias_grados` (`id`, `grd_grado_id`, `mat_materia_id`, `created_at`, `updated_at`) VALUES
(5, 4, 1, '2021-12-13 08:03:45', '2021-12-13 08:03:45'),
(6, 4, 3, '2021-12-13 08:05:07', '2021-12-13 08:05:07'),
(7, 5, 1, '2021-12-13 10:58:45', '2021-12-13 10:58:45'),
(8, 6, 1, '2021-12-13 12:43:55', '2021-12-13 12:43:55'),
(9, 6, 3, '2021-12-13 12:43:55', '2021-12-13 12:43:55'),
(10, 6, 4, '2021-12-13 12:43:55', '2021-12-13 12:43:55'),
(11, 6, 5, '2021-12-13 12:43:55', '2021-12-13 12:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `mat_materias`
--

CREATE TABLE `mat_materias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mat_nombre` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mat_materias`
--

INSERT INTO `mat_materias` (`id`, `mat_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ciencias Naturales', '2021-12-13 06:11:12', '2021-12-13 07:52:33'),
(3, 'Matematicas 3', '2021-12-13 06:20:15', '2021-12-13 06:20:15'),
(4, 'Lenguaje', '2021-12-13 12:42:55', '2021-12-13 12:42:55'),
(5, 'Sociales', '2021-12-13 12:43:03', '2021-12-13 12:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_12_210536_create_grd_grados_table', 1),
(6, '2021_12_12_210538_create_alm_alumnos_table', 1),
(7, '2021_12_12_211128_create_mat_materias_table', 1),
(8, '2021_12_12_211549_create_materias_grados_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alm_alumnos`
--
ALTER TABLE `alm_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alm_alumnos_grd_id_foreign` (`grd_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grd_grados`
--
ALTER TABLE `grd_grados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materias_grados`
--
ALTER TABLE `materias_grados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materias_grados_grd_grado_id_foreign` (`grd_grado_id`),
  ADD KEY `materias_grados_mat_materia_id_foreign` (`mat_materia_id`);

--
-- Indexes for table `mat_materias`
--
ALTER TABLE `mat_materias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alm_alumnos`
--
ALTER TABLE `alm_alumnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grd_grados`
--
ALTER TABLE `grd_grados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `materias_grados`
--
ALTER TABLE `materias_grados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mat_materias`
--
ALTER TABLE `mat_materias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alm_alumnos`
--
ALTER TABLE `alm_alumnos`
  ADD CONSTRAINT `alm_alumnos_grd_id_foreign` FOREIGN KEY (`grd_id`) REFERENCES `grd_grados` (`id`);

--
-- Constraints for table `materias_grados`
--
ALTER TABLE `materias_grados`
  ADD CONSTRAINT `materias_grados_grd_grado_id_foreign` FOREIGN KEY (`grd_grado_id`) REFERENCES `grd_grados` (`id`),
  ADD CONSTRAINT `materias_grados_mat_materia_id_foreign` FOREIGN KEY (`mat_materia_id`) REFERENCES `mat_materias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
