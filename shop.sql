-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2020 г., 19:18
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `cost` int(11) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `extension` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `cost`, `description`, `datetime`, `extension`) VALUES
('castlevania', 'Castlevania', 128, 'Игра для NES', '2020-02-01 21:40:43', 'jpg'),
('castlevania_bloodlines', 'Castlevania Bloodlines', 2048, 'Игра для SEGA', '2020-02-01 21:57:40', 'jpg'),
('castlevania_ii', 'Castlevania II', 256, 'Игра для NES', '2020-02-01 21:41:57', 'jpg'),
('castlevania_iii', 'Castlevania III', 512, 'Игра для NES', '2020-02-01 21:42:28', 'jpg'),
('super_castlevania_iv', 'Super Castlevania IV', 1024, 'Игра для SNES', '2020-02-01 21:43:13', 'jpg'),
('castlevania_dracula_x', 'Castlevania Dracula X', 4096, 'Игра для SNES', '2020-02-02 13:03:14', 'jpg'),
('castlevania_rondo_of_blood', 'Castlevania Rondo of Blood', 8192, 'Игра для PC Engine', '2020-02-02 13:12:15', 'jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
