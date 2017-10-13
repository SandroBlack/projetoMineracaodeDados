-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
<<<<<<< HEAD
-- Generation Time: 13-Out-2017 às 07:19
=======
-- Generation Time: 13-Out-2017 às 05:32
>>>>>>> parent of 58c3c9c... att
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `forms`
--

<<<<<<< HEAD
DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_conteudo` varchar(255) NOT NULL,
  `form_id` int(11) NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `link_ibfk_2` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
=======
INSERT INTO `forms` (`form_id`, `form_titulo`, `form_conteudo`, `form_Qquestoes`, `form_time`, `user_id`) VALUES
(41, 'teste', 't e s t e', '5', 'test', 8),
(42, 'wdq', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>WDQ</h1><br> <h4 style=\'text-align:center;\'>QWD</h4><br><br> <div style=\'margin-left:15px;\'><label>QWD </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 0 Hora(s) 39 Minuto(s)', 8),
(43, 'teste2', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>TESTE2</h1><br> <h4 style=\'text-align:center;\'>TESTE2</h4><br><br> <div style=\'margin-left:15px;\'><label>TESTE2 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 1 Hora(s) 11 Minuto(s)', 8),
(44, 'wqd', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>WQD</h1><br> <h4 style=\'text-align:center;\'>QWD</h4><br><br> <div style=\'margin-left:15px;\'><label>QWDQWD </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 1 Hora(s) 13 Minuto(s)', 8),
(45, 'qwd', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>QWD</h1><br> <h4 style=\'text-align:center;\'>WQD</h4><br><br> <div style=\'margin-left:15px;\'><label>QWDQWD </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br> <div style=\'margin-left:15px;\'><label>QWD </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_1\' name=\'respostas_1\'></div><br> <div style=\'margin-left:15px;\'><label>QWDQWD </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_2\' name=\'respostas_2\'></div><br> <div style=\'margin-left:15px;\'><label>RWGQ </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_3\' name=\'respostas_3\'></div><br> <div style=\'margin-left:15px;\'><label>WERG </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_4\' name=\'respostas_4\'></div><br> <div style=\'margin-left:15px;\'><label>WRGQ </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_5\' name=\'respostas_5\'></div><br> <div style=\'margin-left:15px;\'><label>WERGRG </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_6\' name=\'respostas_6\'></div><br> <div style=\'margin-left:15px;\'><label>AWERGG </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_7\' name=\'respostas_7\'></div><br> <div style=\'margin-left:15px;\'><label>EWRGRGRG </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_8\' name=\'respostas_8\'></div><br> <div style=\'margin-left:15px;\'><label>ERGERG </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_9\' name=\'respostas_9\'></div><br></div></form></div>', '10', 'Formulario criado em: 13/10/2017, às: 1 Hora(s) 16 Minuto(s)', 8),
(46, 'wds', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>WDS</h1><br> <h4 style=\'text-align:center;\'>WQDQWD</h4><br><br> <div style=\'margin-left:15px;\'><label>WQDQWD </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 1 Hora(s) 20 Minuto(s)', 8),
(47, 'qwd213', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>QWD213</h1><br> <h4 style=\'text-align:center;\'>123</h4><br><br> <div style=\'margin-left:15px;\'><label>213231 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 1 Hora(s) 59 Minuto(s)', 8),
(48, '123', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>123</h1><br> <h4 style=\'text-align:center;\'>123</h4><br><br> <div style=\'margin-left:15px;\'><label>123 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 2 Hora(s) 1 Minuto(s)', 8),
(49, '2134', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>2134</h1><br> <h4 style=\'text-align:center;\'>213</h4><br><br> <div style=\'margin-left:15px;\'><label>123 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 2 Hora(s) 3 Minuto(s)', 8),
(50, '21343', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>21343</h1><br> <h4 style=\'text-align:center;\'>213</h4><br><br> <div style=\'margin-left:15px;\'><label>123 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 2 Hora(s) 4 Minuto(s)', 8),
(51, '21343', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>21343</h1><br> <h4 style=\'text-align:center;\'>213</h4><br><br> <div style=\'margin-left:15px;\'><label>123 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 2 Hora(s) 10 Minuto(s)', 8),
(52, '213435', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>213435</h1><br> <h4 style=\'text-align:center;\'>213</h4><br><br> <div style=\'margin-left:15px;\'><label>123 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 2 Hora(s) 18 Minuto(s)', 8),
(53, '2134355', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>2134355</h1><br> <h4 style=\'text-align:center;\'>213</h4><br><br> <div style=\'margin-left:15px;\'><label>123 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 2 Hora(s) 19 Minuto(s)', 8),
(54, 'testePQW', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>TESTEP</h1><br> <h4 style=\'text-align:center;\'>DQWD</h4><br><br> <div style=\'margin-left:15px;\'><label>DQWDQWDQW </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 2 Hora(s) 22 Minuto(s)', 8),
(55, 'TITULO', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>TITULO</h1><br> <h4 style=\'text-align:center;\'>DESCRIÇÃO</h4><br><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 0 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 01 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_1\' name=\'respostas_1\'></div><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 02 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_2\' name=\'respostas_2\'></div><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 03 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_3\' name=\'respostas_3\'></div><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 04 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_4\' name=\'respostas_4\'></div><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 05 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_5\' name=\'respostas_5\'></div><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 06 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_6\' name=\'respostas_6\'></div><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 07 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_7\' name=\'respostas_7\'></div><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 08 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_8\' name=\'respostas_8\'></div><br> <div style=\'margin-left:15px;\'><label>PERGUNTA 09 </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_9\' name=\'respostas_9\'></div><br></div></form></div>', '10', 'Formulario criado em: 13/10/2017, às: 2 Hora(s) 30 Minuto(s)', 8),
(56, 'QDW', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>QDW</h1><br> <h4 style=\'text-align:center;\'>QWD</h4><br><br> <div style=\'margin-left:15px;\'><label>QWD </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br></div></form></div>', '1', 'Formulario criado em: 13/10/2017, às: 2 Hora(s) 31 Minuto(s)', 8);
>>>>>>> parent of 58c3c9c... att

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

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`pergunta_id`, `perguntas_0`, `perguntas_1`, `perguntas_2`, `perguntas_3`, `perguntas_4`, `perguntas_5`, `perguntas_6`, `perguntas_7`, `perguntas_8`, `perguntas_9`, `form_id`) VALUES
(1, '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 52),
(2, NULL, '1', '2', '3', '4', '5', '6', '7', '8', '9', 53),
(3, 'DQWDQWDQW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54),
(4, 'PERGUNTA 0', 'PERGUNTA 01', 'PERGUNTA 02', 'PERGUNTA 03', 'PERGUNTA 04', 'PERGUNTA 05', 'PERGUNTA 06', 'PERGUNTA 07', 'PERGUNTA 08', 'PERGUNTA 09', 55),
(5, 'QWD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56);

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
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_password_temp`, `user_ativado`) VALUES
(9, 'Aquilla Silva Leite', 'aquilla11@hotmail.com', '123456', '', '0');

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_password_temp`, `user_ativado`) VALUES
(8, 'Aquilla Silva Leite', 'aquilla11@hotmail.com', '123456', '', '0');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Limitadores para a tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
