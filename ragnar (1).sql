-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 05:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ragnar`
--

-- --------------------------------------------------------

--
-- Table structure for table `capacitacions`
--

CREATE TABLE `capacitacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icono` text DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `capacitacions`
--

INSERT INTO `capacitacions` (`id`, `icono`, `texto`, `created_at`, `updated_at`) VALUES
(1, 'lQrisA5gqbDnxDIC5Oz6ip1zZq6sKX.png', 'Capacitados para la seguridad privada', '2024-06-28 04:49:57', '2024-06-28 04:49:57'),
(2, 'dCqB2yzcea2IOwFvQCFqR4v8ahzNVu.png', 'Capacitados para la seguridad privada', '2024-06-28 22:08:57', '2024-06-28 22:08:57'),
(5, '1IoF2QnL0nK0DLqMxDMldLNx6UMzoF.png', 'Capacitados para la seguridad privada', '2024-06-28 22:20:45', '2024-06-28 22:20:45'),
(6, 'UGTZNybNcZeXBupuJPOyy1jvyYOA5P.png', 'Capacitados para la seguridad privada', '2024-06-28 22:20:58', '2024-06-28 22:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `destinatario` varchar(255) DEFAULT NULL,
  `destinatario2` varchar(255) DEFAULT NULL,
  `remitente` varchar(255) DEFAULT NULL,
  `remitentepass` varchar(255) DEFAULT NULL,
  `remitentehost` varchar(255) DEFAULT NULL,
  `remitenteport` varchar(255) DEFAULT NULL,
  `remitenteseguridad` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `whatsapp2` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `envio` varchar(255) DEFAULT NULL,
  `envioglobal` varchar(255) DEFAULT NULL,
  `iva` varchar(255) DEFAULT NULL,
  `incremento` varchar(255) DEFAULT NULL,
  `mapa` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configuracions`
--

INSERT INTO `configuracions` (`id`, `titulo`, `descripcion`, `destinatario`, `destinatario2`, `remitente`, `remitentepass`, `remitentehost`, `remitenteport`, `remitenteseguridad`, `telefono`, `whatsapp`, `whatsapp2`, `facebook`, `instagram`, `youtube`, `linkedin`, `envio`, `envioglobal`, `iva`, `incremento`, `mapa`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'Ragnar', 'Descripción del sitio', 'mikeed1998@gmail.com', NULL, 'testeolocal@proyectoswozial.com', 'D(]$I6s7)vBV', 'mail.proyectoswozial.com', '465', NULL, '3329768968', '3329768968', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.6745427148135!2d-103.39920042561187!3d20.642118580912236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae0ed241a9bb%3A0xbb4c3906c38265fd!2sWozial%20Marketing%20Lovers!5e0!3m2!1ses-419!2smx!4v1719427426099!5m2!1ses-419!2smx\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Av. Lapizlazuli 2074, 44560 Guadalajara, Jal.', NULL, '2024-07-01 20:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `elementos`
--

CREATE TABLE `elementos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `elemento` varchar(255) NOT NULL,
  `texto` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `contenido` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `seccion` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elementos`
--

INSERT INTO `elementos` (`id`, `elemento`, `texto`, `imagen`, `url`, `contenido`, `activo`, `orden`, `seccion`, `created_at`, `updated_at`) VALUES
(17, 'Titulo - Nosotros (Home)', 'QUIÉNES SOMOS...ds', NULL, NULL, 0, 1, 666, 4, NULL, '2024-06-28 00:29:21'),
(18, 'Descripción - Nosotros (Home)', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum necessitatibus aspernatur sunt sequi. Saepe voluptas pariatur a at blanditiis ex!\n                                                434', NULL, NULL, 0, 1, 666, 4, NULL, '2024-06-28 00:30:37'),
(19, 'Imagen - Nosotros (Home)', NULL, 'Iikl9B5CiUnspHb2ncjEAJ30FFl2n8.png', NULL, 1, 1, 666, 4, NULL, '2024-06-28 00:40:53'),
(20, 'Imagen - Home', NULL, '427UwGWHicYbOdQt7NLJg0Okbqb18D.png', NULL, 1, 1, 666, 4, NULL, '2024-06-28 00:51:41'),
(21, 'Imagen - Contacto (Home)', NULL, 'akqcVo9wPpLUPE35VsBfeLc87ZIrMN.png', NULL, 1, 1, 666, 4, NULL, '2024-06-28 00:55:30'),
(22, 'Aux - Servicio', NULL, NULL, NULL, 0, 1, 666, 7, NULL, NULL),
(23, 'Imagen - Nosotros ', NULL, 'RiafPUQGrq75qp3UDAhPwxLnSpRMI2.png', NULL, 1, 1, 666, 5, NULL, '2024-06-28 01:34:04'),
(24, 'Titulo - Nosotros', NULL, NULL, NULL, 0, 1, 666, 5, NULL, NULL),
(25, 'Descripción - Nosotros', 'df      Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa nam commodi exercitationem nostrum quisquam quia eius dolor perferendis nulla animi.\n                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus distinctio dolore dolor eligendi, perferendis molestias accusamus nulla. Rerum reprehenderit cum sequi! Nostrum facere quas cum illo dolorem doloribus id enim.', NULL, NULL, 0, 1, 666, 5, NULL, '2024-06-28 01:38:15'),
(26, 'Misión - Nosotros', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, exercitationem!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem iure, alias neque illum veritatis, doloremque cupiditate vel id corrupti laudantium fugit, porro at quod harum vero dolor saepe pariatur voluptates!', NULL, NULL, 0, 1, 666, 5, NULL, NULL),
(27, 'Visión - Nosotros', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut, odio.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur ad quasi ipsum tenetur non fuga. Cupiditate ad blanditiis recusandae consequatur soluta ex eveniet nobis aspernatur. Ad sunt repudiandae nemo pariatur.', NULL, NULL, 0, 1, 666, 5, NULL, NULL),
(28, 'Imagen - Contacto', NULL, 'Rk6AkeOjOFvHUOHPXCvnZTcdXqUF89.png', NULL, 1, 1, 666, 6, NULL, '2024-06-28 01:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `imagen`, `created_at`, `updated_at`) VALUES
(6, 'pTwtlj9NPrnNBFc4c9G5BejF4FzXlb.png', '2024-06-27 21:33:03', '2024-06-27 21:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta` varchar(255) DEFAULT NULL,
  `respuesta` text DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `pregunta`, `respuesta`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'uno', 'dksndsmnk', 666, '2024-05-07 00:06:55', '2024-07-01 20:47:29'),
(5, 'momfmqom|osmdosmdosmd', '<p>dsmdosmdosmdomsds</p>', 666, '2024-07-01 20:48:19', '2024-07-01 20:48:19'),
(6, 'gdfgdf', '<p>ggfd</p>', 666, '2024-07-02 01:13:22', '2024-07-02 01:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `galerias`
--

CREATE TABLE `galerias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galerias`
--

INSERT INTO `galerias` (`id`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'eiHOJXZPQk0uufIgK0ERaNf44VISHi.png', '2024-06-27 21:52:41', '2024-06-27 21:52:41'),
(2, 'RsMil0SmgRnOOuxBKJsyXHLiAFK1f2.png', '2024-06-27 21:55:32', '2024-06-27 21:55:32'),
(3, 'm527u9CDGS8TJS31OPqWGwf4kvdEgi.png', '2024-06-27 21:56:22', '2024-06-27 21:56:22'),
(4, 'z7baDpYQiVhKz3rSdnDdIe2Re2xwVF.png', '2024-06-27 21:56:42', '2024-06-27 21:56:42'),
(5, 'UWxT9oBqNlp0uZFYr0C95cK658xoUA.png', '2024-06-27 21:56:51', '2024-06-27 21:56:51'),
(6, 'SIuilZLzd4kkUC76RnlQ9ATuk9OQrX.png', '2024-06-27 21:57:00', '2024-06-27 21:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2024_05_06_155145_create_configuracions_table', 1),
(16, '2024_05_06_160217_create_seccions_table', 1),
(17, '2024_05_06_160342_create_elementos_table', 1),
(18, '2024_05_06_170557_create_faqs_table', 1),
(19, '2024_05_06_171045_create_politicas_table', 1),
(20, '2024_05_16_190750_create_slider_principals_table', 2),
(21, '2024_05_16_191510_create_empresas_table', 2),
(22, '2024_05_16_191628_create_servicios_table', 2),
(23, '2024_06_27_154126_create_galerias_table', 3),
(24, '2024_06_27_215755_create_capacitacions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `politicas`
--

CREATE TABLE `politicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `politicas`
--

INSERT INTO `politicas` (`id`, `titulo`, `descripcion`, `archivo`, `created_at`, `updated_at`) VALUES
(1, 'Aviso de Privacidad', 'TEXTO', NULL, NULL, '2024-07-01 20:28:26'),
(2, 'Métodos de Pago', '<p>TEXTO</p>', NULL, NULL, '2024-07-01 20:28:33'),
(3, 'Devoluciones', '<p>TEXTO</p>', NULL, NULL, '2024-07-01 20:28:39'),
(4, 'Términos y Condiciones', '<p>TEXTO</p>', NULL, NULL, '2024-07-01 20:28:46'),
(5, 'Garantías', '<p>fdsfdsfdsfdf fds df dsf&nbsp; &nbsp;dfs ds fdsf</p><table class=\"table table-bordered\"><tbody><tr><td>dsdf</td><td>fgfg</td><td>r343</td></tr><tr><td>fdsf</td><td><table class=\"table table-bordered\"><tbody><tr><td>rew</td><td>rtt</td></tr><tr><td>rew</td><td>trtr</td></tr></tbody></table><br></td><td>dsadsda</td></tr></tbody></table><p><br></p>', NULL, NULL, '2024-06-28 01:53:16'),
(6, 'Políticas de Envío', '<p>TEXTO</p>', NULL, NULL, '2024-07-01 20:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `seccions`
--

CREATE TABLE `seccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `portada` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seccions`
--

INSERT INTO `seccions` (`id`, `seccion`, `portada`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'configuracion', 'bi bi-gear-fill', 'configuracion', NULL, NULL),
(2, 'politicas', 'bi bi-shield-fill-exclamation', 'politicas', NULL, NULL),
(3, 'faqs', 'bi bi-question-circle-fill', 'faqs', NULL, NULL),
(4, 'home', 'bi bi-house-door-fill', 'home', NULL, NULL),
(5, 'nosotros', 'bi bi-postcard-fill', 'nosotros', NULL, NULL),
(6, 'contacto', 'bi bi-send-fill', 'contacto', NULL, NULL),
(7, 'servicios', 'bi bi-stack', 'servicios', NULL, NULL),
(8, 'sliders', 'bi bi-card-image', 'sliders', NULL, NULL),
(9, 'empresas', 'bi bi-building-fill', 'empresas', NULL, NULL),
(10, 'galeria', 'bi bi-camera-fill', 'galeria', NULL, NULL),
(11, 'capacitacion', 'bi bi-clipboard-check-fill', 'capacitacion', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portada` text DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `inicio` int(11) NOT NULL DEFAULT 0,
  `aux` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id`, `portada`, `titulo`, `descripcion`, `inicio`, `aux`, `created_at`, `updated_at`) VALUES
(20, 'wGTkbbuT25sYKOV7BtaO5tXklKuoXE.png', 'Vigilancia y patrullaje', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p><p></p>', 1, NULL, '2024-06-29 01:00:21', '2024-06-29 01:00:28'),
(21, 'miPMGTTy3SpvWGG7D2WJNEwLLR6jhG.png', 'Monitoreo de alarmas', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p><p></p>', 1, NULL, '2024-06-29 01:00:54', '2024-06-29 01:01:01'),
(22, 'PAxo7HwJql6zxAnvoahyI9HOTMbttg.png', 'Protección personal', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p><p></p>', 1, NULL, '2024-06-29 01:01:25', '2024-06-29 01:02:10'),
(23, 'WN8xuxBjjCtGdSayisGmX2ZfM4Q0xo.png', 'Ejemplo 4', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p><p></p>', 1, NULL, '2024-06-29 01:02:01', '2024-06-29 01:02:11'),
(24, 'XVpJJ6GyBpioDAXF6kpbTJjlDajdrU.png', 'Ejemplo 5', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p><p></p>', 1, NULL, '2024-06-29 01:02:46', '2024-06-29 01:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `slider_principals`
--

CREATE TABLE `slider_principals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_principals`
--

INSERT INTO `slider_principals` (`id`, `imagen`, `created_at`, `updated_at`) VALUES
(24, 'qYzrhoV92m9oTvZWlzijeWqchfjUz4.png', '2024-06-27 21:30:28', '2024-06-27 21:30:28'),
(27, 'RtZA679QqFgh0u6osm3JlXORua1WIE.png', '2024-06-29 01:38:29', '2024-06-29 01:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@wozial.com', NULL, '$2y$10$bd2hbnNc91XPGuCvP5DNLujrfhcVte6zjvyb/TSlKseACBvpbmRxe', 1, NULL, '2024-05-06 23:57:30', '2024-05-06 23:57:30'),
(3, 'michael', 'michael@gmail.com', NULL, '$2y$10$3QMydj15UEFN8ldM2N0Ncuipwuq4jOlkQksaxV/PEqUKxcIvjdkbC', 0, NULL, '2024-05-07 01:18:59', '2024-05-07 01:18:59'),
(4, 'Michael', 'michael@wozial.com', NULL, '$2y$10$pTZvU12IbJgV5MHYG9XTneTii1PgZazwwJhzg5GFe7BN7r09K36pq', 0, NULL, '2024-05-23 01:08:42', '2024-05-23 01:08:42'),
(5, 'testeo', 'testeo@gmail.com', NULL, '$2y$10$rIm3eDii4J3WOeupTI0fieWjVg2h6cILd3zcVC6T9V/GH9D9KQgvS', 0, NULL, '2024-06-04 21:18:05', '2024-06-04 21:18:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capacitacions`
--
ALTER TABLE `capacitacions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elementos_seccion_foreign` (`seccion`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerias`
--
ALTER TABLE `galerias`
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
-- Indexes for table `politicas`
--
ALTER TABLE `politicas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seccions`
--
ALTER TABLE `seccions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seccions_slug_unique` (`slug`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_principals`
--
ALTER TABLE `slider_principals`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `capacitacions`
--
ALTER TABLE `capacitacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `politicas`
--
ALTER TABLE `politicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `slider_principals`
--
ALTER TABLE `slider_principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_seccion_foreign` FOREIGN KEY (`seccion`) REFERENCES `seccions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
