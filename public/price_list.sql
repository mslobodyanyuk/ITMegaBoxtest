-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Вер 22 2017 р., 16:57
-- Версія сервера: 5.6.25
-- Версія PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `price_list`
--
CREATE DATABASE IF NOT EXISTS `price_list` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `price_list`;

-- --------------------------------------------------------

--
-- Структура таблиці `docprice`
--

CREATE TABLE IF NOT EXISTS `docprice` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `price_type` varchar(30) NOT NULL,
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `docprice`
--

INSERT INTO `docprice` (`id`, `datetime`, `price_type`, `status`) VALUES
(2, '2017-09-04 00:00:00', 'закупочная', 1),
(3, '2017-09-05 00:00:00', 'мелкооптовая', 0),
(4, '2017-09-05 00:00:00', 'мелкооптовая', 1),
(5, '2017-09-06 00:00:00', 'оптовая', 0),
(6, '2017-09-06 00:00:00', 'оптовая', 1),
(7, '2017-09-07 00:00:00', 'плановая себестоимость', 0),
(8, '2017-09-07 00:00:00', 'плановая себестоимость', 1),
(9, '2017-09-08 00:00:00', 'розничная', 0),
(10, '2017-09-08 00:00:00', 'розничная', 1),
(12, '2017-09-15 00:00:00', 'закупочная', 0),
(13, '2017-09-17 00:00:00', 'закупочная', 0),
(14, '2017-09-18 00:00:00', 'закупочная', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `docpricebody`
--

CREATE TABLE IF NOT EXISTS `docpricebody` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `docpricebody`
--

INSERT INTO `docpricebody` (`id`, `doc_id`, `product_id`, `price`) VALUES
(2, 2, 2, 12500),
(3, 3, 5, 5000),
(4, 4, 6, 3000),
(13, 5, 9, 2499),
(14, 6, 10, 13000),
(15, 12, 1, 2600),
(16, 13, 1, 2700),
(17, 14, 1, 2800);

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `status`) VALUES
(1, 'Lenovo', 'телефон', 'в наличии'),
(2, 'Asus', 'ноутбук', 'в наличии'),
(3, 'Lenovo1', 'телефон', 'нет в наличии'),
(4, 'Asus1', 'ноутбук', 'нет в наличии'),
(5, 'goPro', 'видеокамера', 'в наличии'),
(6, 'Olympus', 'диктофон', 'в наличии'),
(7, 'goPro1', 'видеокамера', 'нет в наличии'),
(8, 'Olympus1', 'диктофон', 'нет в наличии'),
(9, 'nomi', 'смартфон', 'в наличии'),
(10, 'hp', 'ноутбук', 'в наличии'),
(11, 'nomi1', 'смартфон', 'нет в наличии'),
(12, 'hp1', 'ноутбук', 'нет в наличии'),
(13, 'PHILIPS', 'монитор', 'в наличии'),
(14, 'PHILIPS1', 'монитор', 'нет в наличии');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `docprice`
--
ALTER TABLE `docprice`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `docpricebody`
--
ALTER TABLE `docpricebody`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `docprice`
--
ALTER TABLE `docprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблиці `docpricebody`
--
ALTER TABLE `docpricebody`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
