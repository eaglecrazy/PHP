-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 10 2020 г., 22:44
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
  `client` varchar(256) NOT NULL,
  `item_id` varchar(256) NOT NULL,
  `count` int(11) DEFAULT 1,
  `order_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `client`, `item_id`, `count`, `order_id`) VALUES
(58, 'Саймон', 'castlevaniaiii', 2, 13),
(59, 'Саймон', 'castlevania', 2, 13),
(60, 'Саймон', 'castlevania_rondo_of_blood', 2, 13),
(62, 'Саймон', 'super_castlevania_iv', 2, 13),
(63, 'Бельмонт', 'castlevania', 2, 12),
(64, 'Бельмонт', 'castlevaniaiii', 1, 12),
(65, 'Бельмонт', 'castlevania', 1, 12),
(66, 'Саймон', 'castlevania', 2, 14),
(67, 'Саймон', 'super_castlevania_iv', 2, 14),
(68, 'Саймон', 'castlevania', 2, 0),
(69, 'Саймон', 'castlevaniaiii', 1, 0);

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
('castlevaniaiii', 'Castlevania III', 512, 'Игра для NES', '2020-02-01 21:42:28', 'jpg'),
('castlevania_rondo_of_blood', 'Castlevania Rondo of Blood', 8192, 'Игра для PC Engine', '2020-02-02 22:42:29', 'jpg'),
('super_castlevania_iv', 'Super Castlevania IV', 1024, 'Игра для SNES', '2020-02-04 23:09:58', 'jpg'),
('castlevania', 'Castlevania', 128, 'Игра для NES', '2020-02-08 19:56:03', 'jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `adress` text NOT NULL,
  `comment` text NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `name`, `phone`, `adress`, `comment`, `order_status`) VALUES
(12, 'Бельмонт', 'Вася', '(666)456-78-90', 'Трансильвания, замок Дракулы', '', 0),
(13, 'Саймон', 'Панфутий', '(122)343-33-33', 'На деревню дедушке', 'заказ срочный!', 0),
(14, 'Саймон', 'Вася', '(666)456-78-90', 'Трансильвания, замок Дракулы', 'мой второй заказ', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL
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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
