-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01/09/2024 às 06:49
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
-- Estrutura para tabela `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_category_id` char(26) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` smallint NOT NULL DEFAULT '0',
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `click_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `click_url_target` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '_self',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banners_sort_index` (`sort`),
  KEY `banners_is_visible_index` (`is_visible`),
  KEY `banners_start_date_index` (`start_date`),
  KEY `banners_end_date_index` (`end_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `banners`
--

INSERT INTO `banners` (`id`, `banner_category_id`, `sort`, `is_visible`, `title`, `description`, `image_url`, `click_url`, `click_url_target`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
('01j6k29n9qtta7wac5x56949jt', '01j6p51fsacqncw76v524exb90', 1, 1, 'O gerente ficou maluco', 'Isso mesmo que você ouviu, a metade do dobro.\n\nCompre já\n![puro-osso](http://tallcms.test/storage/R5wU5Oqennt7nICmwrQWKx7KsxWES5rhAlfNmfmC.jpg)\n', NULL, 'https://google.com', '_blank', '2024-08-29 22:54:48', '2024-08-29 22:54:58', '2024-08-31 01:55:17', '2024-09-01 06:44:19'),
('01j6p5ae17pt1rp9dt48t4h6eq', '01j6p5224scrk5f9c3ypgd2exd', 2, 1, 'Favor não pisar na grama', 'É sério, elas tem sentimentos!\n\n*Parem com isso, caras...*\n', NULL, '#', NULL, '2024-09-02 03:47:30', '2024-09-30 03:47:39', '2024-09-01 06:45:51', '2024-09-01 06:47:43'),
('01j6p5cz7n5jphjr1rgv0mq13y', '01j6p53135beyfrfsam22kar6e', 3, 1, 'O significado da vida e tudo mais', '42\n\nEu fiz os cálculos no ábaco, deu certo. Confia.', NULL, '#', NULL, NULL, NULL, '2024-09-01 06:47:14', '2024-09-01 06:47:14'),
('01j6p5g4ejkjx0rb60vxgezgmk', '01j6p53ezptfa106gtyhda65xg', 4, 1, 'Esse banner foi desativado', 'É uma pena que somente você consiga ler...\n\nTinhamos tanto pra **conversar**.', NULL, '#', NULL, NULL, NULL, '2024-09-01 06:48:58', '2024-09-01 06:48:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
