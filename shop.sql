-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 06 2020 г., 14:14
-- Версия сервера: 10.3.13-MariaDB
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
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `order_id` int(11) NOT NULL,
  `client` varchar(256) NOT NULL,
  `item_id` varchar(256) NOT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`order_id`, `client`, `item_id`, `count`) VALUES
(11, 'Бельмонт', 'castlevania_rondo_of_blood', 2),
(12, 'Бельмонт', 'castlevania_iii', 2),
(34, 'Саймон', 'castlevania_ii', 4),
(38, 'Саймон', 'super_castlevania_iv', 2),
(39, 'Саймон', 'castlevania_iii', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`login`, `password`) VALUES
('user', '12345'),
('Бельмонт', '12345'),
('Саймон', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `cost` int(11) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `extension` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `cost`, `description`, `datetime`, `extension`) VALUES
('castlevania_ii', 'Castlevania II', 256, 'Игра для NES', '2020-02-01 21:41:57', 'jpg'),
('castlevania_iii', 'Castlevania III', 512, 'Игра для NES', '2020-02-01 21:42:28', 'jpg'),
('castlevania_rondo_of_blood', 'Castlevania Rondo of Blood', 8192, 'Игра для PC Engine', '2020-02-02 22:42:29', 'jpg'),
('super_castlevania_iv', 'Super Castlevania IV', 1024, 'Игра для SNES', '2020-02-04 23:09:58', 'jpg'),
('castlevania_bloodlines', 'Castlevania Bloodlines', 8192, 'Игра для SEGA', '2020-02-04 23:11:05', 'jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
