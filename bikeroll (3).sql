-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2023 a las 23:01:05
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bikeroll`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `user_name` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`user_name`, `passwd`, `created_at`, `updated_at`) VALUES
('admin', 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ensures`
--

CREATE TABLE `ensures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_insurances` bigint(20) UNSIGNED NOT NULL,
  `id_race` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ensures`
--

INSERT INTO `ensures` (`id`, `id_insurances`, `id_race`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 62, '2023-04-06 10:58:34', '2023-04-06 10:58:34'),
(2, 5, 2, 101, '2023-04-08 11:26:13', '2023-04-08 11:26:13'),
(3, 4, 4, 98, '2023-04-27 18:22:15', '2023-04-27 18:22:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `runner_id` bigint(20) UNSIGNED NOT NULL,
  `race_id` bigint(20) UNSIGNED NOT NULL,
  `id_insurances` bigint(20) UNSIGNED DEFAULT NULL,
  `dorsal` int(11) DEFAULT NULL,
  `PayPal_email` text NOT NULL,
  `finish_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `runner_id`, `race_id`, `id_insurances`, `dorsal`, `PayPal_email`, `finish_time`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, 43, 'salma@gmail.com\r\n', '22:51:27', '2023-04-06 11:04:15', '2023-04-27 20:51:27'),
(3, 4, 2, NULL, 850, 'diana@gmail.com', '19:57:36', NULL, '2023-04-10 17:57:36'),
(4, 6, 2, 2, 190, 'diana@gmail.com', '23:43:39', NULL, '2023-04-11 21:43:39'),
(5, 7, 2, 1, 162, 'pau@gmail.com', '22:52:05', '2023-04-08 11:29:17', '2023-04-11 20:52:05'),
(8, 8, 2, 1, 200, 'alex@gmail.com', '15:15:14', '2023-04-08 11:46:45', '2023-04-09 13:15:14'),
(12, 11, 2, 1, 224, '', NULL, '2023-04-10 22:21:07', '2023-04-10 22:21:07'),
(13, 16, 2, 1, 274, '', NULL, '2023-04-11 08:06:18', '2023-04-11 08:06:18'),
(14, 17, 2, 1, 77, '', NULL, '2023-04-11 08:37:54', '2023-04-11 08:37:54'),
(15, 18, 2, NULL, 163, '', NULL, '2023-04-11 11:53:13', '2023-04-11 11:53:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insurances`
--

CREATE TABLE `insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CIF` varchar(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `insurances`
--

INSERT INTO `insurances` (`id`, `CIF`, `name`, `address`, `price`, `estado`, `created_at`, `updated_at`) VALUES
(1, '777777777', 'Asegu1', 'ss', 150, 1, '2023-04-06 10:56:52', '2023-04-07 11:31:41'),
(2, '888888888', 'Aseguradora2', 'Mataro', 20, 1, '2023-04-06 10:57:14', '2023-04-27 19:47:12'),
(3, '999999999', 'Aseguradora3', 'hh', 15, 1, '2023-04-06 10:57:34', '2023-04-07 11:49:04'),
(4, '666666666', 'aa', 'll', 55, 1, '2023-04-07 12:27:42', '2023-04-27 19:47:29'),
(5, '222222222', 'kkk', 'kk', 100, 1, '2023-04-07 12:27:54', '2023-04-10 23:17:59'),
(6, '555555555', 'hh', 'h', 88, 1, '2023-04-07 12:28:57', '2023-04-07 12:28:57'),
(7, '777', 'jj', 'j', 4, 0, '2023-04-07 12:47:13', '2023-04-27 19:47:26'),
(8, '444444444', 'kk', 'h', 48, 0, '2023-04-07 12:47:36', '2023-04-27 19:47:18'),
(9, '101010101', 'KIKO', 'Blanes', 14, 0, '2023-04-27 19:48:09', '2023-04-27 19:48:15');

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
(17, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2023_01_28_133527_create_admins_table', 1),
(21, '2023_01_28_133546_create_runners_table', 1),
(22, '2023_01_28_133659_create_insurances_table', 1),
(23, '2023_01_28_133714_create_races_table', 1),
(24, '2023_01_28_133728_create_ensures_table', 1),
(25, '2023_01_28_133746_create_sponsors_table', 1),
(26, '2023_01_28_133802_create_pictures_table', 1),
(27, '2023_01_28_133826_create_patronize_table', 1),
(28, '2023_01_28_143426_create_inscriptions_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patronize`
--

CREATE TABLE `patronize` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sponsor_id` bigint(20) UNSIGNED NOT NULL,
  `race_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `patronize`
--

INSERT INTO `patronize` (`id`, `sponsor_id`, `race_id`, `created_at`, `updated_at`) VALUES
(11, 3, 1, '2023-04-10 15:08:15', '2023-04-10 15:08:15'),
(12, 5, 1, '2023-04-10 15:09:02', '2023-04-10 15:09:02'),
(13, 4, 1, '2023-04-10 15:09:16', '2023-04-10 15:09:16'),
(16, 2, 2, '2023-04-10 23:12:22', '2023-04-10 23:12:22'),
(17, 5, 2, '2023-04-10 23:12:33', '2023-04-10 23:12:33'),
(18, 1, 2, '2023-04-10 23:28:25', '2023-04-10 23:28:25'),
(19, 1, 1, '2023-04-11 00:00:53', '2023-04-11 00:00:53'),
(20, 3, 2, '2023-04-11 08:29:19', '2023-04-11 08:29:19'),
(21, 1, 3, '2023-04-27 19:48:41', '2023-04-27 19:48:41'),
(22, 1, 4, '2023-04-27 19:48:41', '2023-04-27 19:48:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pictures`
--

CREATE TABLE `pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `race_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pictures`
--

INSERT INTO `pictures` (`id`, `race_id`, `image`, `created_at`, `updated_at`) VALUES
(113, 2, '/storage/app/public/imagenes/1uAsRhzDr9iBM3elp5IdxFv9TDT8KvU6FmNcnKA5.jpg', '2023-04-11 19:22:34', '2023-04-11 19:22:34'),
(114, 2, '/storage/app/public/imagenes/PQ4txWdelLLqShqMFCte15nkhL3pshUzr20mZVA3.png', '2023-04-11 19:23:53', '2023-04-11 19:23:53'),
(115, 2, '/storage/app/public/imagenes/RBtSUtQfQ6fJ3vIQEaO09RhGrYxJ3WUl2oi3R5Ei.jpg', '2023-04-11 19:23:53', '2023-04-11 19:23:53'),
(116, 2, '/storage/app/public/imagenes/NqvhfLp51O5eldcERU7wuW05s8NUAkP74MCnzQLa.png', '2023-04-11 19:23:53', '2023-04-11 19:23:53'),
(117, 2, '/storage/app/public/imagenes/uBJ8wEwZrMRPCo3MOSwzkLyEBcXg2c0MmV4nvTpz.png', '2023-04-11 19:23:53', '2023-04-11 19:23:53'),
(118, 2, '/storage/app/public/imagenes/GgvzVdaSMjLMXZAaHe5LYpBGGXq386mTURS4qagB.png', '2023-04-11 19:23:53', '2023-04-11 19:23:53'),
(119, 2, '/storage/app/public/imagenes/48CzxxyMoG1ObACOsxx4P46oRnYJlGHa9Ze62cYU.png', '2023-04-11 19:23:53', '2023-04-11 19:23:53'),
(120, 2, '/storage/app/public/imagenes/awz7Eh9KXCVEqrTW3ATOfrPeRPvWsRGbtPxOoDPs.jpg', '2023-04-11 19:26:15', '2023-04-11 19:26:15'),
(121, 2, '/storage/app/public/imagenes/HDdqdZn4vKuIzrkmhD46ZrA2BXVr8ULiloGu3iLY.png', '2023-04-11 19:26:25', '2023-04-11 19:26:25'),
(122, 2, '/storage/app/public/imagenes/rVm3s7a9k1IAyJL8sAdb2yjc4LRB7hTfut9xc6Mu.jpg', '2023-04-11 19:26:25', '2023-04-11 19:26:25'),
(123, 2, '/storage/app/public/imagenes/eMG8tjPO7wj16e77gT9ExuetKMcmJp8FLalz8n5w.jpg', '2023-04-11 19:26:25', '2023-04-11 19:26:25'),
(124, 2, '/storage/app/public/imagenes/ZH1gBvOLq0R4mjDQB4qWJnK3T90GyZv5hxGqAfsX.jpg', '2023-04-12 06:08:04', '2023-04-12 06:08:04'),
(125, 2, '/storage/app/public/imagenes/FiLTMI5HZjuBw2S5N3WBTwlGY6GO4VysevjcWNZ3.jpg', '2023-04-12 06:08:04', '2023-04-12 06:08:04'),
(126, 2, '/storage/app/public/imagenes/JIdyavKGbK8LPkQYHXTSkvzB5AM9q9tefmOTRMcw.jpg', '2023-04-12 06:08:04', '2023-04-12 06:08:04'),
(127, 2, '/storage/app/public/imagenes/fiMharazT5quCJEpsYCbRw4AMZxoLGitjdkcNEZQ.png', '2023-04-12 06:08:05', '2023-04-12 06:08:05'),
(128, 1, '/storage/app/public/imagenes/TWu2raE2BxPzDWQlXVMLtA0A2JgKAfuRlFHn8HHJ.png', '2023-04-27 19:40:52', '2023-04-27 19:40:52'),
(129, 1, '/storage/app/public/imagenes/fvOmU3rtCbZvr3syTMAvAnWbvN1roDZtXpdjireR.jpg', '2023-04-27 19:40:52', '2023-04-27 19:40:52'),
(130, 1, '/storage/app/public/imagenes/NCk3qiG777CQNnplUqy81bHZnMRWZ2102fi1Kbn6.png', '2023-04-27 19:40:52', '2023-04-27 19:40:52'),
(131, 1, '/storage/app/public/imagenes/sQ51mLOyOYFmFzLe0rzkOO8jLXXMAOusy9s13jCm.jpg', '2023-04-27 19:40:52', '2023-04-27 19:40:52'),
(132, 1, '/storage/app/public/imagenes/vXI6vbBaIHdmxwQCBYMw3DrNvzZ9NmnGgSdxccDL.jpg', '2023-04-27 19:40:53', '2023-04-27 19:40:53'),
(133, 1, '/storage/app/public/imagenes/hAOmcnBH9HaMQ5ohjlEs46yerNz3waQVWNYhkB3H.jpg', '2023-04-27 19:40:53', '2023-04-27 19:40:53'),
(134, 1, '/storage/app/public/imagenes/mvesa8ommV3ZY8tes58zA461gNWObUfLTDtdwzmu.png', '2023-04-27 19:40:53', '2023-04-27 19:40:53'),
(135, 1, '/storage/app/public/imagenes/KEiloTBXaggNXYBSqLKowEG8JL6JJnMhOQ9G0gyD.jpg', '2023-04-27 19:40:53', '2023-04-27 19:40:53'),
(136, 1, '/storage/app/public/imagenes/QdP6QIG8q2THaSmajT0eK46hkSGU0LnVjaxOx6Po.png', '2023-04-27 19:40:54', '2023-04-27 19:40:54'),
(137, 1, '/storage/app/public/imagenes/O3Ny958T1Nc7T5Hy1dVRsd5aoHeIXo9wkm1gzNd4.png', '2023-04-27 19:40:54', '2023-04-27 19:40:54'),
(138, 1, '/storage/app/public/imagenes/pophy5praIDQPXUpJvSfhDxoa2ikdENBhs1NkKZS.png', '2023-04-27 19:40:54', '2023-04-27 19:40:54'),
(139, 1, '/storage/app/public/imagenes/JizcBVmdQKizYfzUAQ46YRa7K2yAKTIr9H79U2Xt.png', '2023-04-27 19:40:54', '2023-04-27 19:40:54'),
(140, 1, '/storage/app/public/imagenes/CPJ2CflcBlmbNxh1dHRwroGRCDtjwCTwI2QthaMw.png', '2023-04-27 19:40:54', '2023-04-27 19:40:54'),
(141, 1, '/storage/app/public/imagenes/d9L3VT9m11uT5ZQeAIcFizF62g1jrydQNE999iqj.png', '2023-04-27 19:40:54', '2023-04-27 19:40:54'),
(142, 1, '/storage/app/public/imagenes/sIDFrO7Hi6XTVRtcBet5WdofsS34ABXEQ0za7RBi.png', '2023-04-27 19:40:54', '2023-04-27 19:40:54'),
(143, 1, '/storage/app/public/imagenes/0gVLbAtYETZLRw2JLrqcPLRW7ZjKfU1iejUDj1bA.jpg', '2023-04-27 19:40:54', '2023-04-27 19:40:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `races`
--

CREATE TABLE `races` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `unevenness` double(4,2) NOT NULL,
  `image` longtext NOT NULL,
  `number_participants` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `promotion` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `price` double(4,2) NOT NULL,
  `sponsor_price` double(4,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `races`
--

INSERT INTO `races` (`id`, `title`, `description`, `unevenness`, `image`, `number_participants`, `km`, `date`, `promotion`, `start`, `state`, `price`, `sponsor_price`, `created_at`, `updated_at`) VALUES
(1, 'Carrera1', 'es un índice que sirve como referencia, legalmente prevista, para conceder subvenciones y ayudas públicas y para poder acceder al subsidio por desempleo.', 14.00, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d95512.72758282111!2d2.473399700235223!3d41.57416296063052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x12bb39039b413fcb%3A0x5473500e0cf05f8b!2sEstaci%C3%B3n%20de%20tren%20Calella%2C%20Calella!3m2!1d41.6146983!2d2.6661989!4m5!1s0x12a4b4ddfd856abf%3A0xfbb1446a90b33e6b!2sEstaci%C3%B3n%20de%20tren%20Matar%C3%B3%2C%20Av.%20del%20Maresme%2C%20166%2C%2008301%20Matar%C3%B3%2C%20Barcelona!3m2!1d41.533407499999996!2d2.4454702!5e0!3m2!1ses!2ses!4v1680778453022!5m2!1ses!2ses\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 20, 50, '2023-04-14 12:54:00', 'C:\\xampp\\tmp\\phpB8D5.tmp', 'Calella', 1, 20.00, NULL, '2023-04-06 10:54:50', '2023-04-08 10:28:51'),
(2, 'Carre2', 'lll', 15.00, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d23919.71570688105!2d2.2567632096177754!3d41.461686073680546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x12a4b0986941e379%3A0x3a7409a335e8940a!2zTWFzbsOzdQ!3m2!1d41.4770934!2d2.3106203!4m5!1s0x12a4bb1298efb741%3A0x987b0abc3e6ea84d!2sBadalona%2C%20Barcelona!3m2!1d41.4469883!2d2.2450324999999998!5e0!3m2!1ses!2ses!4v1680952858974!5m2!1ses!2ses\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 3, 12, '2023-04-01 13:22:00', 'C:\\xampp\\tmp\\php6DA6.tmp', 'Masnou', 1, 20.00, NULL, '2023-04-08 11:25:06', '2023-04-10 15:16:24'),
(3, 'JJJJJJJJ', 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW', 15.00, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d47838.5756229913!2d2.233652519488827!3d41.462846121936735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x12a4b0986941e379%3A0x3a7409a335e8940a!2sEl%20Masnou!3m2!1d41.4770939!2d2.3106201!4m5!1s0x12a4bb7236bf4449%3A0xc6b13e5d825a85a7!2sInstituto%20p%C3%BAblico%20La%20Pineda%2C%20Carrer%20de%20la%20Batll%C3%B2ria%2C%20s%2Fn%2C%2008917%20Badalona%2C%20Barcelona!3m2!1d41.452383999999995!2d2.2394472999999997!5e0!3m2!1ses!2ses!4v1682614237788!5m2!1ses!2ses\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 20, 15, '2023-04-27 18:51:00', 'C:\\xampp\\tmp\\phpC485.tmp', 'Masnou', 0, 10.00, NULL, '2023-04-27 16:51:53', '2023-04-27 16:51:53'),
(4, 'AXAXAXAX', 'JKAKAKAKAKAAMKM', 12.00, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d47838.5756229913!2d2.233652519488827!3d41.462846121936735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x12a4b0986941e379%3A0x3a7409a335e8940a!2sEl%20Masnou!3m2!1d41.4770939!2d2.3106201!4m5!1s0x12a4bb7236bf4449%3A0xc6b13e5d825a85a7!2sInstituto%20p%C3%BAblico%20La%20Pineda%2C%20Carrer%20de%20la%20Batll%C3%B2ria%2C%20s%2Fn%2C%2008917%20Badalona%2C%20Barcelona!3m2!1d41.452383999999995!2d2.2394472999999997!5e0!3m2!1ses!2ses!4v1682614237788!5m2!1ses!2ses\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 20, 15, '2023-04-28 18:56:00', 'C:\\xampp\\tmp\\php7833.tmp', 'masnou', 1, 10.00, NULL, '2023-04-27 16:57:01', '2023-04-27 18:23:22'),
(5, 'Casa carlos', 'casa carlos es uuuuuuu', 15.00, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d47838.5756229913!2d2.233652519488827!3d41.462846121936735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x12a4b0986941e379%3A0x3a7409a335e8940a!2sEl%20Masnou!3m2!1d41.4770939!2d2.3106201!4m5!1s0x12a4bb7236bf4449%3A0xc6b13e5d825a85a7!2sInstituto%20p%C3%BAblico%20La%20Pineda%2C%20Carrer%20de%20la%20Batll%C3%B2ria%2C%20s%2Fn%2C%2008917%20Badalona%2C%20Barcelona!3m2!1d41.452383999999995!2d2.2394472999999997!5e0!3m2!1ses!2ses!4v1682614237788!5m2!1ses!2ses\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 20, 10, '2023-04-30 20:20:00', 'C:\\xampp\\tmp\\phpC5C3.tmp', 'masnou', 0, 14.00, NULL, '2023-04-27 18:21:28', '2023-04-27 18:21:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `runners`
--

CREATE TABLE `runners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `adress` text NOT NULL,
  `birth_date` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `pro` tinyint(1) NOT NULL,
  `federation_number` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `runners`
--

INSERT INTO `runners` (`id`, `name`, `last_name`, `adress`, `birth_date`, `sex`, `pro`, `federation_number`, `points`, `created_at`, `updated_at`) VALUES
(2, 'Salma', 'Alami', 'Calella', '1993-04-14', 0, 0, NULL, 800, '2023-04-06 11:03:51', '2023-04-27 19:55:14'),
(4, 'Diana', 'Martos', 'Masnou', '1983-04-12', 1, 0, '111111111', 900, NULL, '2023-04-11 20:06:23'),
(6, 'Maiol', 'Pons', 'Mataro', '1983-04-09', 0, 0, NULL, 600, NULL, '2023-04-11 21:13:43'),
(7, 'Pau', 'Rodri', 'Badalona', '1983-04-09', 1, 0, NULL, 700, '2023-04-08 11:29:12', '2023-04-27 19:55:14'),
(8, 'Alex', 'Puig', 'Mataro', '1983-04-09', 1, 0, NULL, 1000, '2023-04-08 11:46:41', '2023-04-11 20:05:05'),
(9, 'gg', 'gg', 'gg', '1983-04-09', 0, 1, '14785', 0, '2023-04-08 13:34:21', '2023-04-08 13:34:21'),
(10, 'gg', 'gg', 'gg', '1983-04-09', 0, 1, '14785', 0, '2023-04-08 13:42:37', '2023-04-08 13:42:37'),
(11, 'hh', 'h', 'h', '2004-04-04', 0, 0, NULL, 0, '2023-04-10 22:02:53', '2023-04-10 22:02:53'),
(12, 'ss', 'ss', 'ss', '2023-04-01', 1, 1, 'DD-1234', 0, '2023-04-11 07:33:28', '2023-04-11 07:33:28'),
(13, 'ss', 'ss', 'ss', '2023-04-01', 1, 1, 'DD-1234', 0, '2023-04-11 07:46:33', '2023-04-11 07:46:33'),
(14, 'ss', 'ss', 'ss', '2023-04-01', 1, 1, 'DD-1234', 0, '2023-04-11 07:51:17', '2023-04-11 07:51:17'),
(15, 'Maria', 'll', 'l', '1945-05-05', 0, 0, NULL, 0, '2023-04-11 07:54:52', '2023-04-11 07:54:52'),
(16, 'Maria', 'll', 'l', '1945-05-05', 0, 0, NULL, 0, '2023-04-11 07:56:24', '2023-04-11 07:56:24'),
(17, 'dq', 'dq', 'Calle jovara, 16, Calella, Barcelona', '2023-04-08', 0, 0, 'hhhh', 0, '2023-04-11 08:37:49', '2023-04-11 08:37:49'),
(18, 'Aina', 'Perez', 'Calle Roma, 17, Mataro, Barcelona', '1982-08-16', 0, 1, 'FF-789', 0, '2023-04-11 11:53:07', '2023-04-11 11:53:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `main_plain` tinyint(1) NOT NULL,
  `sponsorState` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `description`, `logo`, `main_plain`, `sponsorState`, `created_at`, `updated_at`) VALUES
(1, 'Spon1', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 'C:\\xampp\\tmp\\phpA2CC.tmp', 1, 0, '2023-04-06 10:57:52', '2023-04-27 19:48:31'),
(2, 'Spons2', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 'C:\\xampp\\tmp\\phpF7CB.tmp', 1, 1, '2023-04-06 10:58:04', '2023-04-10 14:56:33'),
(3, 'Spons3', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 'C:\\xampp\\tmp\\php26FA.tmp', 1, 0, '2023-04-06 10:58:16', '2023-04-11 00:04:07'),
(4, 'Sponsor 7', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 'C:\\xampp\\tmp\\php752C.tmp', 1, 1, '2023-04-09 13:00:56', '2023-04-10 14:56:30'),
(5, 'Spons5', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos,', 'C:\\xampp\\tmp\\php6D27.tmp', 1, 1, '2023-04-10 14:55:07', '2023-04-10 14:56:39'),
(6, 'GTGT', 'asdfyguijokl', 'C:\\xampp\\tmp\\php660E.tmp', 0, 1, '2023-04-27 19:49:31', '2023-04-27 19:49:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_name`);

--
-- Indices de la tabla `ensures`
--
ALTER TABLE `ensures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ensures_id_insurances_foreign` (`id_insurances`);

--
-- Indices de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscriptions_id_insurances_foreign` (`id_insurances`),
  ADD KEY `inscriptions_runner_id_foreign` (`runner_id`),
  ADD KEY `inscriptions_race_id_foreign` (`race_id`);

--
-- Indices de la tabla `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `patronize`
--
ALTER TABLE `patronize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patronize_sponsor_id_foreign` (`sponsor_id`),
  ADD KEY `patronize_race_id_foreign` (`race_id`);

--
-- Indices de la tabla `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_race_id_foreign` (`race_id`);

--
-- Indices de la tabla `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `races_title_unique` (`title`) USING HASH;

--
-- Indices de la tabla `runners`
--
ALTER TABLE `runners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ensures`
--
ALTER TABLE `ensures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `patronize`
--
ALTER TABLE `patronize`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `races`
--
ALTER TABLE `races`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `runners`
--
ALTER TABLE `runners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ensures`
--
ALTER TABLE `ensures`
  ADD CONSTRAINT `ensures_id_insurances_foreign` FOREIGN KEY (`id_insurances`) REFERENCES `insurances` (`id`);

--
-- Filtros para la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_id_insurances_foreign` FOREIGN KEY (`id_insurances`) REFERENCES `insurances` (`id`),
  ADD CONSTRAINT `inscriptions_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`),
  ADD CONSTRAINT `inscriptions_runner_id_foreign` FOREIGN KEY (`runner_id`) REFERENCES `runners` (`id`);

--
-- Filtros para la tabla `patronize`
--
ALTER TABLE `patronize`
  ADD CONSTRAINT `patronize_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`),
  ADD CONSTRAINT `patronize_sponsor_id_foreign` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`);

--
-- Filtros para la tabla `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
