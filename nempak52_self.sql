-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 06 2016 г., 12:22
-- Версия сервера: 5.6.28-76.1-beget-log
-- Версия PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nempak52_self`
--

-- --------------------------------------------------------

--
-- Структура таблицы `training`
--
-- Создание: Апр 15 2016 г., 07:51
--

DROP TABLE IF EXISTS `training`;
CREATE TABLE `training` (
  `id` mediumint(9) NOT NULL,
  `date` date DEFAULT NULL,
  `result` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `training`
--

INSERT INTO `training` (`id`, `date`, `result`) VALUES
(23, '1111-11-11', 1),
(24, '0000-00-00', 1),
(25, '0000-00-00', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `training`
--
ALTER TABLE `training`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
