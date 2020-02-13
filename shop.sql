-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 13 2020 г., 18:41
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
  `cart_id` int(11) NOT NULL,
  `client` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `count` int(11) DEFAULT 1,
  `order_id` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `client`, `item_id`, `count`, `order_id`) VALUES
(99, 'Саймон', 'castlevania', 2, 15),
(100, 'Саймон', 'castlevania', 2, 16),
(101, 'Саймон', 'castlevania', 2, 17),
(102, 'Саймон', 'castlevaniaiii', 2, 17),
(110, 'Саймон', 'castlevania', 2, 18),
(111, 'Саймон', 'castlevania_rondo_of_blood', 2, 18),
(112, 'Саймон', 'super_castlevania_iv', 1, 18),
(113, 'admin', 'castlevania', 1, -1),
(114, 'Саймон', 'castlevania', 2, 19),
(115, 'Саймон', 'castlevaniaiii', 1, 20),
(116, 'Саймон', 'castlevaniabloodlines', 1, 20),
(118, 'Бельмонт', 'castlevaniasymphonyofthenight', 2, 21);

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `extension` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `cost`, `description`, `datetime`, `extension`) VALUES
('castlevania', 'Castlevania', 128, 'Игра для NES', '2020-02-08 19:56:03', 'jpg'),
('castlevaniabloodlines', 'Castlevania Bloodlines', 32, 'Игра для Sega', '2020-02-13 18:28:49', 'jpg'),
('castlevaniadraculax', 'Castlevania Dracula X', 16, 'Игра для SNES', '2020-02-13 18:29:32', 'jpg'),
('castlevaniaii', 'Castlevania II', 64, 'Игра для NES', '2020-02-13 18:27:44', 'jpg'),
('castlevaniaiii', 'Castlevania III', 512, 'Игра для NES', '2020-02-01 21:42:28', 'jpg'),
('castlevaniasymphonyofthenight', 'Castlevania Symphony of the Night', 8, 'Игра для Sony PS', '2020-02-13 18:30:16', 'jpg'),
('castlevania_rondo_of_blood', 'Castlevania Rondo of Blood', 8192, 'Игра для PC Engine', '2020-02-02 22:42:29', 'jpg'),
('super_castlevania_iv', 'Super Castlevania IV', 1024, 'Игра для SNES', '2020-02-04 23:09:58', 'jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` text NOT NULL,
  `comment` text NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `name`, `phone`, `adress`, `comment`, `order_status`) VALUES
(19, 'Саймон', 'Антон', '(123)456-78-90', 'Трансильвания, замок Дракулы', 'первый заказ', 1),
(20, 'Саймон', 'Антон', '(123)456-78-90', 'Трансильвания, замок Дракулы', 'второй заказ', 0),
(21, 'Бельмонт', 'Василий', '(222)123-12-12', 'на деревню дедушке', 'срочно', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`, `role`) VALUES
('admin', '202cb962ac59075b964b07152d234b70POsdfs459+:0dsjpOIGHf', 'user'),
('Бельмонт', '202cb962ac59075b964b07152d234b70POsdfs459+:0dsjpOIGHf', 'user'),
('Саймон', '202cb962ac59075b964b07152d234b70POsdfs459+:0dsjpOIGHf', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
