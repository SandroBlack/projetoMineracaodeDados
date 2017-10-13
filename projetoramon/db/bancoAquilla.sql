-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 13-Out-2017 às 03:56
-- Versão do servidor: 5.7.16
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mineracao`
--
CREATE DATABASE IF NOT EXISTS `mineracao` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mineracao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forms`
--

DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_titulo` varchar(255) NOT NULL,
  `form_conteudo` longtext NOT NULL,
  `form_Qquestoes` char(2) NOT NULL,
  `form_time` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`form_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_conteudo` varchar(255) NOT NULL,
  `form_id` int(11) NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `link_ibfk_2` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
CREATE TABLE IF NOT EXISTS `perguntas` (
  `pergunta_id` int(11) NOT NULL AUTO_INCREMENT,
  `perguntas_0` varchar(50) DEFAULT NULL,
  `perguntas_1` varchar(50) DEFAULT NULL,
  `perguntas_2` varchar(50) DEFAULT NULL,
  `perguntas_3` varchar(50) DEFAULT NULL,
  `perguntas_4` varchar(50) DEFAULT NULL,
  `perguntas_5` varchar(50) DEFAULT NULL,
  `perguntas_6` varchar(50) DEFAULT NULL,
  `perguntas_7` varchar(50) DEFAULT NULL,
  `perguntas_8` varchar(50) DEFAULT NULL,
  `perguntas_9` varchar(50) DEFAULT NULL,
  `form_id` int(11) NOT NULL,
  PRIMARY KEY (`pergunta_id`),
  KEY `form_id` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

DROP TABLE IF EXISTS `respostas`;
CREATE TABLE IF NOT EXISTS `respostas` (
  `respostas_id` int(11) NOT NULL AUTO_INCREMENT,
  `respostas_0` varchar(255) DEFAULT NULL,
  `respostas_1` varchar(255) DEFAULT NULL,
  `respostas_2` varchar(255) DEFAULT NULL,
  `respostas_3` varchar(255) DEFAULT NULL,
  `respostas_4` varchar(255) DEFAULT NULL,
  `respostas_5` varchar(255) DEFAULT NULL,
  `respostas_6` varchar(255) DEFAULT NULL,
  `respostas_7` varchar(255) DEFAULT NULL,
  `respostas_8` varchar(255) DEFAULT NULL,
  `respostas_9` varchar(255) DEFAULT NULL,
  `pergunta_id` int(11) NOT NULL,
  PRIMARY KEY (`respostas_id`),
  KEY `pergunta_id` (`pergunta_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_password_temp` varchar(255) NOT NULL,
  `user_ativado` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Limitadores para a tabela `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_ibfk_2` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`);

--
-- Limitadores para a tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
