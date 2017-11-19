-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 19-Nov-2017 às 17:23
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mineracao`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `forms`
--

INSERT INTO `forms` (`form_id`, `form_titulo`, `form_conteudo`, `form_Qquestoes`, `form_time`, `user_id`) VALUES
(25, 'qwdqw', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>QWD</h1><br> <h4 style=\'text-align:center;\'>WQD</h4><br><br> <div style=\'margin-left:15px;\'><label>1 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br> <div style=\'margin-left:15px;\'><label>2 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_1\' name=\'respostas_1\'></div><br> <div style=\'margin-left:15px;\'><label>3 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_2\' name=\'respostas_2\'></div><br> <div style=\'margin-left:15px;\'><label>4 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_3\' name=\'respostas_3\'></div><br> <div style=\'margin-left:15px;\'><label>5 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_4\' name=\'respostas_4\'></div><br> <div style=\'margin-left:15px;\'><label>6 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_5\' name=\'respostas_5\'></div><br> <div style=\'margin-left:15px;\'><label>7 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_6\' name=\'respostas_6\'></div><br> <div style=\'margin-left:15px;\'><label>8 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_7\' name=\'respostas_7\'></div><br> <div style=\'margin-left:15px;\'><label>9 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_8\' name=\'respostas_8\'></div><br> <div style=\'margin-left:15px;\'><label>10 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_9\' name=\'respostas_9\'></div><br></div></form></div>', '10', '2/11/2017, às: 13 Horas 47 Minuto(s)', 10);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `link`
--

INSERT INTO `link` (`link_id`, `link_conteudo`, `form_id`) VALUES
(13, '4HC5vI7sFLlduDgddzhNUfBCme0Yt4', 25);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`pergunta_id`, `perguntas_0`, `perguntas_1`, `perguntas_2`, `perguntas_3`, `perguntas_4`, `perguntas_5`, `perguntas_6`, `perguntas_7`, `perguntas_8`, `perguntas_9`, `form_id`) VALUES
(13, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

DROP TABLE IF EXISTS `respostas`;
CREATE TABLE IF NOT EXISTS `respostas` (
  `respostas_id` int(11) NOT NULL AUTO_INCREMENT,
  `respostas_data` varchar(100) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`respostas_id`, `respostas_data`, `respostas_0`, `respostas_1`, `respostas_2`, `respostas_3`, `respostas_4`, `respostas_5`, `respostas_6`, `respostas_7`, `respostas_8`, `respostas_9`, `pergunta_id`) VALUES
(10, '19/11/17', 'wd', '', '', '', '', '', '', '', '', '', 13);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_password_temp`, `user_ativado`) VALUES
(10, 'Aquilla Silva Leite', 'aquilla11@hotmail.com', '123456', '', '1');

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

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`pergunta_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
