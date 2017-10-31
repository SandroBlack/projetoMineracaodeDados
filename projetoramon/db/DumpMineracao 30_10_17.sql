-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.19 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para mineracao
CREATE DATABASE IF NOT EXISTS `mineracao` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mineracao`;

-- Copiando estrutura para tabela mineracao.forms
CREATE TABLE IF NOT EXISTS `forms` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_titulo` varchar(255) NOT NULL,
  `form_conteudo` longtext NOT NULL,
  `form_Qquestoes` char(2) NOT NULL,
  `form_time` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`form_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `forms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mineracao.forms: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;

-- Copiando estrutura para tabela mineracao.link
CREATE TABLE IF NOT EXISTS `link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_conteudo` varchar(255) NOT NULL,
  `form_id` int(11) NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `link_ibfk_2` (`form_id`),
  CONSTRAINT `link_ibfk_2` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mineracao.link: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
/*!40000 ALTER TABLE `link` ENABLE KEYS */;

-- Copiando estrutura para tabela mineracao.perguntas
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
  KEY `form_id` (`form_id`),
  CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mineracao.perguntas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;

-- Copiando estrutura para tabela mineracao.respostas
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
  KEY `pergunta_id` (`pergunta_id`) USING BTREE,
  CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`pergunta_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mineracao.respostas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `respostas` DISABLE KEYS */;
/*!40000 ALTER TABLE `respostas` ENABLE KEYS */;

-- Copiando estrutura para tabela mineracao.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_password_temp` varchar(255) NOT NULL,
  `user_ativado` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mineracao.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
