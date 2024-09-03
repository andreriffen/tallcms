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
-- Estrutura para tabela `banner_categories`
--

DROP TABLE IF EXISTS `banner_categories`;
CREATE TABLE IF NOT EXISTS `banner_categories` (
  `id` char(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banner_categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `banner_categories`
--

INSERT INTO `banner_categories` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
('01j6p51fsacqncw76v524exb90', 'Promoções', 'promocoes', 'Descrição da Categoria de promoções', 1, '2024-09-01 06:40:58', '2024-09-01 06:40:58'),
('01j6p5224scrk5f9c3ypgd2exd', 'Avisos', 'avisos', 'Atenção, isso é um aviso!', 1, '2024-09-01 06:41:17', '2024-09-01 06:41:17'),
('01j6p53135beyfrfsam22kar6e', 'Informativos', 'informativos', 'Para informar os desinformados', 1, '2024-09-01 06:41:49', '2024-09-01 06:41:49'),
('01j6p53ezptfa106gtyhda65xg', 'Desativado', 'desativado', NULL, 0, '2024-09-01 06:42:03', '2024-09-01 06:42:03'),
('01j6p54q7bs979rc1wf5y7ts42', 'Estilo de Vida', 'estilo-de-vida', 'Definindo a vida através de conceitos', 1, '2024-09-01 06:42:44', '2024-09-01 06:42:44'),
('01j6p55c6f5bhbhagm3c44vh1q', 'Viagens', 'viagens', 'Dicas para viagens', 1, '2024-09-01 06:43:06', '2024-09-01 06:43:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
