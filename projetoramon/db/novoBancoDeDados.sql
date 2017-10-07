-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Out-2017 às 21:07
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

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
  `form_user` int(11) NOT NULL,
  `form_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_text` varchar(9999) COLLATE utf8_unicode_ci NOT NULL,
  `question_form` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `questions`
--

INSERT INTO `questions` (`question_id`, `question_text`, `question_form`) VALUES
(1, 'tesdasdas', 5),
(2, 'asdasdasdas', 6),
(3, '  <div><form name=\'formUusario\'> <div><label>QWDQWD </label><input type=\'text\' id=\'respostaQWDQWD\' name=\'respostaQWDQWD\' required></div></form></div>', 6),
(4, '  <div><form name=\'formUusario\'> <div><label>QWDQWDQWD </label><br><input type=\'checkbox\' name=\'checkbox3\' value=\'QWDQWD\'>QWDQWD<br></div></form></div>', 5),
(5, '  <div><form name=\'formUusario\'> <div><label>QWDQWDQW </label><input type=\'text\' id=\'respostaQWDQWDQW\' name=\'respostaQWDQWDQW\' required></div></form></div>', 1478);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

DROP TABLE IF EXISTS `respostas`;
CREATE TABLE IF NOT EXISTS `respostas` (
  `respostas_id` int(11) NOT NULL AUTO_INCREMENT,
  `respostas_text` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `respostas_question` int(11) NOT NULL,
  PRIMARY KEY (`respostas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password_temp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_password_temp`) VALUES
(1, 'aquilla', 'aquilla11@hotmail.com', '123456', 'YYL7NXq9Ji'),
(2, 'teste', 'teste@hotmail.com', '123123', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
