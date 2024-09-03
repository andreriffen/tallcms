-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01/09/2024 às 06:58
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tallcms`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', '4f57e9eb-73b3-43ad-b199-bc04b2b012e7', '62e57a4c-1c19-4263-8113-ee32f9a34b3d', 'avatars', 'IFSC_vertical_texto_branco_fundo_transparente', '01J6K135Z58HZRBJWCVSMHVDEW.png', 'image/png', 'public', 'public', 32411, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-08-31 01:34:17', '2024-08-31 01:34:20'),
(2, 'App\\Models\\Banner', '01j6k29n9qtta7wac5x56949jt', 'a6523acc-621e-428a-b765-db7f2454f2a8', 'banners', 'IFSC_vertical_preto_fundo_transparente', '01J6K29NAJHCAT3MGSVDANJQZE.png', 'image/png', 'public', 'public', 26664, '[]', '[]', '{\"preview\": true}', '[]', 1, '2024-08-31 01:55:17', '2024-08-31 01:55:18'),
(5, 'App\\Models\\Blog\\Post', '01j6k488wgsg0zwr08r4mgt0cv', 'e6908114-7ab4-40c5-9b96-6fad13147a1b', 'blog/posts', 'logo', '01J6K488XEB5TJ7G2FV0AE480E.jpg', 'image/jpeg', 'public', 'public', 73039, '[]', '[]', '[]', '[]', 1, '2024-08-31 02:29:29', '2024-08-31 02:29:29'),
(6, 'App\\Models\\Blog\\Post', '01j6k4a325pk62pjazj856m0rh', '443b4ae7-3e39-422b-9ff6-af82c5fc2504', 'blog/posts', 'me', '01J6K4A334Q5TWVA95VX15ARA5.jpg', 'image/jpeg', 'public', 'public', 17781, '[]', '[]', '[]', '[]', 1, '2024-08-31 02:30:28', '2024-08-31 02:30:28'),
(7, 'App\\Models\\Banner', '01j6p5ae17pt1rp9dt48t4h6eq', 'e1b2cc5f-ae6f-45fd-b670-a783b288888d', 'banners', '4', '01J6P5AE6RQB0DVBJ02JA23C67.jpg', 'image/jpeg', 'public', 'public', 300978, '[]', '[]', '{\"preview\": true}', '[]', 1, '2024-09-01 06:45:52', '2024-09-01 06:45:55'),
(8, 'App\\Models\\Banner', '01j6p5cz7n5jphjr1rgv0mq13y', '80b0a839-cb46-4cf1-87d6-359b5cf2b48f', 'banners', '1', '01J6P5CZ95WSM01TM3EV1TM2BK.jpg', 'image/jpeg', 'public', 'public', 349628, '[]', '[]', '{\"preview\": true}', '[]', 1, '2024-09-01 06:47:15', '2024-09-01 06:47:15'),
(9, 'App\\Models\\Banner', '01j6p5g4ejkjx0rb60vxgezgmk', 'bef01514-a18f-418a-bf62-3ad0203565bc', 'banners', '7', '01J6P5G4FJW0RR701QJKHQSGAX.jpg', 'image/jpeg', 'public', 'public', 1168256, '[]', '[]', '{\"preview\": true}', '[]', 1, '2024-09-01 06:48:58', '2024-09-01 06:48:59'),
(10, 'App\\Models\\Blog\\Post', '01j6p5xvf0dapc6qvv55gxh55y', '8a32fb1d-2e3f-4710-a0c4-91888c6fd0de', 'blog/posts', 'me', '01J6P5XVFS7EWB2A8P7Y2P0RQP.jpg', 'image/jpeg', 'public', 'public', 17781, '[]', '[]', '[]', '[]', 1, '2024-09-01 06:56:28', '2024-09-01 06:56:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
