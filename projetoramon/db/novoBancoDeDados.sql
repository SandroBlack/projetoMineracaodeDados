-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 09-Out-2017 às 03:14
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
  `form_titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `form_conteudo` varchar(9999) COLLATE utf8_unicode_ci NOT NULL,
  `form_questoes` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `forms`
--

INSERT INTO `forms` (`form_id`, `form_titulo`, `form_conteudo`, `form_questoes`) VALUES
(2, 'sde', 'TESTE', '9'),
(3, 'qwdqwd', '<h1 style=\'text-align:center;\'>QWDQWD</h1><br> <h4 style=\'text-align:center;\'>QWDQWD</h4><br> <div><form> <div style=\'margin-left:15px;\'><label>QWDQWD: </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_3\' name=\'respostas_3\'></div><br></form></div>', '1'),
(4, 'TESTE0', '<h1 style=\'text-align:center;\'>TESTE0</h1><br> <h4 style=\'text-align:center;\'>TESTE1</h4><br> <div><form> <div style=\'margin-left:15px;\'><label>TESTE2: </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_3\' name=\'respostas_3\'></div><br> <div style=\'margin-left:15px;\'><label>TESTE3: </label><br><input type=\'radio\' id=\'respostas_4\' name=\'respostas_4\' value=\'TESTE4\' >TESTE4<br><input type=\'radio\' id=\'respostas_4\' name=\'respostas_4\' value=\'TESTE5\' >TESTE5<br></div><br> <div style=\'margin-left:15px;\'><label>TESTE6: </label><br><input type=\'checkbox\' id=\'respostas_5\' name=\'respostas_5\' value=\'TESTE7\' >TESTE7<br><input type=\'checkbox\' id=\'respostas_5\' name=\'respostas_5\' value=\'TESTE8\' >TESTE8<br></div><br> <div style=\'margin-left:15px;\'><label>TESTE9: </label><input type=\'date\' id=\'respostas_6\' name=\'respostas_6\'></div><br> <div style=\'margin-left:15px;\'><label>TESTE10: </label><input type=\'email\' id=\'respostas_7\' name=\'respostas_7\'></div><br></form></div>', '9'),
(5, 'QWD', '<h1 style=\'text-align:center;\'>QWD</h1><br> <h4 style=\'text-align:center;\'>QWD</h4><br> <div><form> <div style=\'margin-left:15px;\'><label>QWD: </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_3\' name=\'respostas_3\'></div><br> <div style=\'margin-left:15px;\'><label>QWDQWD: </label><br><input type=\'radio\' id=\'respostas_4\' name=\'respostas_4\' value=\'QWD\' >QWD<br><input type=\'radio\' id=\'respostas_4\' name=\'respostas_4\' value=\'QWEDQW\' >QWEDQW<br></div><br> <div style=\'margin-left:15px;\'><label>QWFQWFQ: </label><br><input type=\'checkbox\' id=\'respostas_5\' name=\'respostas_5\' value=\'QWEDQW\' >QWEDQW<br><input type=\'checkbox\' id=\'respostas_5\' name=\'respostas_5\' value=\'QGQGQ\' >QGQGQ<br></div><br> <div style=\'margin-left:15px;\'><label>QGFEQGQEG: </label><input type=\'date\' id=\'respostas_6\' name=\'respostas_6\'></div><br> <div style=\'margin-left:15px;\'><label>QWFWQFQWF: </label><input type=\'email\' id=\'respostas_7\' name=\'respostas_7\'></div><br></form></div>', '9'),
(6, 'QWQWD', '<h1 style=\'text-align:center;\'>QWQWD</h1><br> <h4 style=\'text-align:center;\'>QWD</h4><br> <div><form> <div style=\'margin-left:15px;\'><label>QWSDQWD: </label><br><input type=\'radio\' id=\'respostas_3\' name=\'respostas_3\' value=\'1\' >1<br><input type=\'radio\' id=\'respostas_3\' name=\'respostas_3\' value=\'2\' >2<br></div><br></form></div>', '1'),
(7, 'TESTANDO', '<h1 style=\'text-align:center;\'>TESTANDO</h1><br> <h4 style=\'text-align:center;\'>DESCRICAO</h4><br> <div><form> <div style=\'margin-left:15px;\'><label>TST: </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_3\' name=\'respostas_3\'></div><br> <div style=\'margin-left:15px;\'><label>TST1: </label><br><input type=\'radio\' id=\'respostas_4\' name=\'respostas_4\' value=\'QWD\' >QWD<br><input type=\'radio\' id=\'respostas_4\' name=\'respostas_4\' value=\'QWDWD\' >QWDWD<br></div><br> <div style=\'margin-left:15px;\'><label>TST2: </label><br><input type=\'checkbox\' id=\'respostas_5\' name=\'respostas_5\' value=\'RQWDQWD\' >RQWDQWD<br><input type=\'checkbox\' id=\'respostas_5\' name=\'respostas_5\' value=\'211RE1\' >211RE1<br></div><br> <div style=\'margin-left:15px;\'><label>TST3: </label><input type=\'date\' id=\'respostas_6\' name=\'respostas_6\'></div><br> <div style=\'margin-left:15px;\'><label>TST4: </label><input type=\'email\' id=\'respostas_7\' name=\'respostas_7\'></div><br></form></div>', '5'),
(8, 'QWDQW', '<h1 style=\'text-align:center;\'>QWD</h1><br> <h4 style=\'text-align:center;\'>DQWD</h4><br> <div><form> <div style=\'margin-left:15px;\'><label>WDQWDQW: </label><br><input type=\'radio\' id=\'respostas_0\' name=\'respostas_0\' value=\'QWDQWD\' >QWDQWD<br><input type=\'radio\' id=\'respostas_0\' name=\'respostas_0\' value=\'QWDQWDQWD\' >QWDQWDQWD<br></div><br></form></div>', '1'),
(9, 'TESTETETETE', '<h1 style=\'text-align:center;\'>TESTETETETE</h1><br> <h4 style=\'text-align:center;\'>DQWD</h4><br> <div><form> <div style=\'margin-left:15px;\'><label>QWDQWDQW: </label><input type=\'text\' style=\'height:30px;width:260px;font-size:16px;\' id=\'respostas_0\' name=\'respostas_0\'></div><br> <div style=\'margin-left:15px;\'><label>QWDQWDQWD: </label><br><input type=\'radio\' id=\'respostas_1\' name=\'respostas_1\' value=\'QWDQWD\' >QWDQWD<br><input type=\'radio\' id=\'respostas_1\' name=\'respostas_1\' value=\'QWDQWDQWD\' >QWDQWDQWD<br></div><br> <div style=\'margin-left:15px;\'><label>QWDQWDQQWDQW: </label><br><input type=\'checkbox\' id=\'respostas_2\' name=\'respostas_2\' value=\'QWDQWD\' >QWDQWD<br><input type=\'checkbox\' id=\'respostas_2\' name=\'respostas_2\' value=\'WDQWDQWD\' >WDQWDQWD<br><input type=\'checkbox\' id=\'respostas_2\' name=\'respostas_2\' value=\'QWDQWDQWD\' >QWDQWDQWD<br></div><br> <div style=\'margin-left:15px;\'><label>QWDQWDQWDQWD: </label><input type=\'date\' id=\'respostas_3\' name=\'respostas_3\'></div><br> <div style=\'margin-left:15px;\'><label>QWEGEQGTQWEG: </label><input type=\'email\' id=\'respostas_4\' name=\'respostas_4\'></div><br></form></div>', '5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

DROP TABLE IF EXISTS `respostas`;
CREATE TABLE IF NOT EXISTS `respostas` (
  `respostas_id` int(11) NOT NULL AUTO_INCREMENT,
  `repostas_0` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repostas_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repostas_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repostas_3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repostas_4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repostas_5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repostas_6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repostas_7` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repostas_8` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repostas_9` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `user_ativado` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_password_temp`, `user_ativado`) VALUES
(1, 'aquilla', 'aquilla11@hotmail.com', '123456', 'YYL7NXq9Ji', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
