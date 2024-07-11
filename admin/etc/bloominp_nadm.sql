-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23/04/2020 às 14:27
-- Versão do servidor: 5.6.47
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bloominp_nadm`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(10) NOT NULL,
  `banner_name` text NOT NULL,
  `banner_alt` text,
  `banner_priority` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_name`, `banner_alt`, `banner_priority`) VALUES
(1, '1.jpg', '', 99),
(2, '2.jpg', '', 99),
(3, '3.jpg', '', 99),
(4, '4.jpg', '', 99),
(5, '5.jpg', '', 99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(250) NOT NULL,
  `cat_priority` int(4) DEFAULT NULL,
  `cat_img` text NOT NULL,
  `cat_pdf` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `images`
--

CREATE TABLE `images` (
  `img_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `img_name` text NOT NULL,
  `img_alt` text,
  `img_priority` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE `logs` (
  `log_id` int(10) NOT NULL,
  `log_user_id` int(10) NOT NULL,
  `log_user_username` varchar(250) NOT NULL,
  `log_type` varchar(50) NOT NULL,
  `log_ip` varchar(100) NOT NULL,
  `log_time` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `logs`
--

INSERT INTO `logs` (`log_id`, `log_user_id`, `log_user_username`, `log_type`, `log_ip`, `log_time`) VALUES
(1, 1, 'master', 'login', '::1', '2020-04-16 11:14:14am'),
(2, 1, 'master', 'login', '168.232.160.66', '2020-04-16 11:26:37am'),
(3, 1, 'master', 'login', '168.232.160.66', '2020-04-16 01:34:59pm'),
(4, 1, 'master', 'login', '168.232.160.66', '2020-04-17 09:25:32am'),
(5, 1, 'master', 'login', '168.232.160.66', '2020-04-17 11:30:52am'),
(6, 1, 'master', 'login', '168.232.160.66', '2020-04-17 12:54:08pm'),
(7, 1, 'master', 'login', '168.232.160.66', '2020-04-18 12:40:18pm'),
(8, 1, 'master', 'login', '168.232.160.66', '2020-04-20 02:14:47pm'),
(9, 1, 'master', 'login', '168.232.160.66', '2020-04-20 03:36:30pm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pdf`
--

CREATE TABLE `pdf` (
  `pdf_id` int(11) NOT NULL,
  `pdf_title` text NOT NULL,
  `prod_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pdf`
--

INSERT INTO `pdf` (`pdf_id`, `pdf_title`, `prod_id`) VALUES
(1, 'bobina de aluminio.pdf', '32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `prod_id` int(10) NOT NULL,
  `subcat_id` int(10) NOT NULL,
  `prod_title` varchar(250) NOT NULL,
  `prod_desc` text,
  `prod_specs` text,
  `prod_priority` int(4) DEFAULT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `subcategories`
--

CREATE TABLE `subcategories` (
  `subcat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `subcat_title` text,
  `subcat_img` text,
  `subcat_priority` int(4) DEFAULT NULL,
  `url` text NOT NULL,
  `subcat_pdf` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `user_username` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_role` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_username`, `user_password`, `user_role`) VALUES
(1, 'Master', 'master@bloomin.com.br', 'master', '$2y$10$IvGzgQaFx4esjY2Yv8dr5utBfO3TYKQ8UxMccJDLAjW47X2YrYg36', 'Master');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Índices de tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Índices de tabela `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Índices de tabela `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`pdf_id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Índices de tabela `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pdf`
--
ALTER TABLE `pdf`
  MODIFY `pdf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
