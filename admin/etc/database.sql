
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
/* -------------------------------------------------- */
CREATE TABLE `banners` (
  `banner_id` int(10) NOT NULL,
  `banner_name` text NOT NULL,
  `banner_alt` text,
  `banner_priority` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/* -------------------------------------------------- */
INSERT INTO `banners` (`banner_id`, `banner_name`, `banner_alt`, `banner_priority`) VALUES
(1, '1.jpg', '', 99),
(2, '2.jpg', '', 99),
(3, '3.jpg', '', 99),
(4, '4.jpg', '', 99),
(5, '5.jpg', '', 99);
/* -------------------------------------------------- */
CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(250) NOT NULL,
  `cat_priority` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/* -------------------------------------------------- */
INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_priority`) VALUES
(1, 'Categoria 1', 9999),
(2, 'Categoria 2', 9999),
(3, 'Categoria 3', 9999),
(4, 'Categoria 4', 9999),
(5, 'Categoria 5', 9999);
/* -------------------------------------------------- */
CREATE TABLE `subcategories` (
  `subcat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `subcat_title` text,
  `subcat_img` text,
  `subcat_priority` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/* -------------------------------------------------- */
INSERT INTO `subcategories` (`subcat_id`, `cat_id`, `subcat_title`, `subcat_img`, `subcat_priority`) VALUES
(1, 1, 'Subcategoria 1 da Categoria 1', '', 9999),
(2, 1, 'Subcategoria 2 da Categoria 1', '', 9999),
(3, 2, 'Subcategoria 1 da Categoria 2', '', 9999),
(4, 2, 'Subcategoria 2 da Categoria 2', '', 9999),
(5, 3, 'Subcategoria 1 da Categoria 3', '', 9999),
(6, 3, 'Subcategoria 2 da Categoria 3', '', 9999),
(7, 4, 'Subcategoria 1 da Categoria 4', '', 9999),
(8, 4, 'Subcategoria 2 da Categoria 4', '', 9999),
(9, 5, 'Subcategoria 1 da Categoria 5', '', 9999),
(10, 5, 'Subcategoria 2 da Categoria 5', '', 9999);
/* -------------------------------------------------- */
CREATE TABLE `products` (
  `prod_id` int(10) NOT NULL,
  `subcat_id` int(10) NOT NULL,
  `prod_title` varchar(250) NOT NULL,
  `prod_desc` text,
  `prod_specs` text,
  `prod_priority` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/* -------------------------------------------------- */
INSERT INTO `products` (`prod_id`, `subcat_id`, `prod_title`, `prod_desc`, `prod_specs`, `prod_priority`) VALUES
(1, 1, 'Produto 1', 'Descrição do Produto', 'Especificações do Produto', 9999),
(2, 1, 'Produto 2', 'Descrição do Produto', 'Especificações do Produto', 9999),
(3, 1, 'Produto 3', 'Descrição do Produto', 'Especificações do Produto', 9999),
(4, 2, 'Produto 4', 'Descrição do Produto', 'Especificações do Produto', 9999),
(5, 2, 'Produto 5', 'Descrição do Produto', 'Especificações do Produto', 9999),
(6, 2, 'Produto 6', 'Descrição do Produto', 'Especificações do Produto', 9999),
(7, 3, 'Produto 7', 'Descrição do Produto', 'Especificações do Produto', 9999),
(8, 3, 'Produto 8', 'Descrição do Produto', 'Especificações do Produto', 9999),
(9, 3, 'Produto 9', 'Descrição do Produto', 'Especificações do Produto', 9999),
(10, 4, 'Produto 10', 'Descrição do Produto', 'Especificações do Produto', 9999),
(11, 4, 'Produto 11', 'Descrição do Produto', 'Especificações do Produto', 9999),
(12, 4, 'Produto 12', 'Descrição do Produto', 'Especificações do Produto', 9999),
(13, 5, 'Produto 13', 'Descrição do Produto', 'Especificações do Produto', 9999),
(14, 5, 'Produto 14', 'Descrição do Produto', 'Especificações do Produto', 9999),
(15, 5, 'Produto 15', 'Descrição do Produto', 'Especificações do Produto', 9999),
(16, 6, 'Produto 16', 'Descrição do Produto', 'Especificações do Produto', 9999),
(17, 6, 'Produto 17', 'Descrição do Produto', 'Especificações do Produto', 9999),
(18, 6, 'Produto 18', 'Descrição do Produto', 'Especificações do Produto', 9999),
(19, 7, 'Produto 19', 'Descrição do Produto', 'Especificações do Produto', 9999),
(20, 7, 'Produto 20', 'Descrição do Produto', 'Especificações do Produto', 9999),
(21, 7, 'Produto 21', 'Descrição do Produto', 'Especificações do Produto', 9999),
(22, 8, 'Produto 22', 'Descrição do Produto', 'Especificações do Produto', 9999),
(23, 8, 'Produto 23', 'Descrição do Produto', 'Especificações do Produto', 9999),
(24, 8, 'Produto 24', 'Descrição do Produto', 'Especificações do Produto', 9999),
(25, 9, 'Produto 25', 'Descrição do Produto', 'Especificações do Produto', 9999),
(26, 9, 'Produto 26', 'Descrição do Produto', 'Especificações do Produto', 9999),
(27, 9, 'Produto 27', 'Descrição do Produto', 'Especificações do Produto', 9999),
(28, 10, 'Produto 28', 'Descrição do Produto', 'Especificações do Produto', 9999),
(29, 10, 'Produto 29', 'Descrição do Produto', 'Especificações do Produto', 9999),
(30, 10, 'Produto 30', 'Descrição do Produto', 'Especificações do Produto', 9999);
/* -------------------------------------------------- */
CREATE TABLE `images` (
  `img_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `img_name` text NOT NULL,
  `img_alt` text,
  `img_priority` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/* -------------------------------------------------- */
CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `user_username` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_role` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/* -------------------------------------------------- */
CREATE TABLE `logs` (
  `log_id` int(10) NOT NULL,
  `log_user_id` int(10) NOT NULL,
  `log_user_username` varchar(250) NOT NULL,
  `log_type` varchar(50) NOT NULL,
  `log_ip` varchar(100) NOT NULL,
  `log_time` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/* -------------------------------------------------- */
INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_username`, `user_password`, `user_role`) VALUES
(1, 'Master', 'master@bloomin.com.br', 'master', '$2y$10$IvGzgQaFx4esjY2Yv8dr5utBfO3TYKQ8UxMccJDLAjW47X2YrYg36', 'Master');
/* -------------------------------------------------- */
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);
/* -------------------------------------------------- */
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);
/* -------------------------------------------------- */
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcat_id`);
/* -------------------------------------------------- */
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);
/* -------------------------------------------------- */
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);
/* -------------------------------------------------- */
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);
/* -------------------------------------------------- */
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);
/* -------------------------------------------------- */
ALTER TABLE `banners`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/* -------------------------------------------------- */
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/* -------------------------------------------------- */
ALTER TABLE `subcategories`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/* -------------------------------------------------- */
ALTER TABLE `products`
  MODIFY `prod_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/* -------------------------------------------------- */
ALTER TABLE `images`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT;
/* -------------------------------------------------- */
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/* -------------------------------------------------- */
ALTER TABLE `logs`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT;
/* -------------------------------------------------- */
COMMIT;