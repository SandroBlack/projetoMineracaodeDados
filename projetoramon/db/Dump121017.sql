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

CREATE TABLE `forms` (
  `form_id` int(11) NOT NULL,
  `form_titulo` varchar(255) NOT NULL,
  `form_desc` varchar(255) NOT NULL,
  `form_conteudo` longtext NOT NULL,
  `form_questoes` char(2) NOT NULL,
  `form_datatime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `forms`
--

INSERT INTO `forms` (`form_id`, `form_titulo`, `form_desc`, `form_conteudo`, `form_questoes`, `form_datatime`, `user_id`) VALUES
(1, 'form de pesquisa de teste', 'testando...', '<div><form style=\'padding: 20px 0px 0px 20px;\' name=\'formResposta\' id=\'formResposta\' class=\'forms\' method=\'POST\' action=\'\'><div class=\'container\'><input type=\'hidden\' id=\'responderForm\' name=\'responderForm\' value=\'teste\'> <br><h1 style=\'text-align:center;\'>FORM DE PESQUISA DE TESTE</h1><br> <h4 style=\'text-align:center;\'>TESTANDO...</h4><br><br> <div style=\'margin-left:15px;\'><label>NOME </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br> <div style=\'margin-left:15px;\'><label>EMAIL </label><input type=\'email\' id=\'respostas_1\' name=\'respostas_1\'></div><br> <div style=\'margin-left:15px;\'><label>SEXO </label><br><input type=\'radio\' id=\'respostas_2\'name=\'respostas_2\' value=\'M\' >M<br><input type=\'radio\' id=\'respostas_2\'name=\'respostas_2\' value=\'F\' >F<br></div><br> <div style=\'margin-left:15px;\'><label>NASCIMENTO </label><input type=\'date\' id=\'respostas_3\' name=\'respostas_3\'></div><br> <div style=\'margin-left:15px;\'><label>ANIMAIS PREFERIDOS </label><br><input type=\'checkbox\' id=\'check[]\'name=\'check[]\' value=\'CACHORRO\' >CACHORRO<br><input type=\'checkbox\' id=\'check[]\'name=\'check[]\' value=\'GATO\' >GATO<br><input type=\'checkbox\' id=\'check[]\'name=\'check[]\' value=\'PAPAGAIO\' >PAPAGAIO<br></div><br></div></form></div>', '5', '2017-10-13 03:52:17', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `pergunta_id` int(11) NOT NULL,
  `pergunta_title` varchar(50) NOT NULL,
  `pergunta_text` varchar(9999) NOT NULL,
  `pergunta_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `respostas_id` int(11) NOT NULL,
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
  `pergunta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_password_temp` varchar(255) NOT NULL,
  `user_ativado` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_password_temp`, `user_ativado`) VALUES
(1, 'Elissandro Santos', 'sandro-95@hotmail.com', '123456', '123456', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`pergunta_id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`respostas_id`),
  ADD KEY `pergunta_id` (`pergunta_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `respostas_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`pergunta_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
