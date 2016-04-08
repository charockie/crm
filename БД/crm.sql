-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 08 2016 г., 15:18
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `crm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id`, `title`) VALUES
(1, 'Отдел по продажам'),
(2, 'Отдел по маркетингу'),
(3, 'Отдел по обратным звонкам'),
(18, 'Отдел маркетинга');

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depart_id` int(11) DEFAULT NULL,
  `title` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `depart_id`, `title`, `description`) VALUES
(1, 1, 'Начальник группы', 'Начальник группы данного отдела'),
(2, 1, 'Продавец', 'продавец данного отдела'),
(3, 1, 'Менеджер по продажам', 'Менеджер по продажам отдела'),
(6, 3, 'вывфывфыв', 'вфывфывфывфы'),
(20, 18, 'Главный маркетолог', 'начальник группы маркетологов'),
(21, 18, 'маркетолог', 'маркетолог, подчинен главному маркетологу'),
(22, 18, 'маркетолог', 'маркетолог, подчинен главному маркетологу'),
(23, 18, 'Бухгалтер', 'считает денежки'),
(26, 3, 'Оператор кол центра', 'звонит и отвечает на звонки'),
(27, 1, 'Уборщик', 'убирает в комнате'),
(28, 27, 'Раб', 'работнички'),
(29, 28, 'vvvvvvvvvvvvvvvvvvvv', 'cccccccccccccccccccc'),
(30, 29, 'cvbcvbcb', 'cvbcvvbcvb'),
(31, 29, 'yyyyyyyyyy', 'uuuuuuuuuuuuu'),
(32, 30, 'dvsdvsdvsdv', 'dvsdvsdvsdv'),
(33, 31, 'dvsdvsdvsdv', 'dvsdvsdvsdv'),
(34, 32, 'fdefgwerg4444444444444', 'fdefgwerg4444444444444'),
(35, 32, 'fdefgwerg4444444444444', 'fdefgwerg4444444444444');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accessToken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `privilege` tinyint(1) NOT NULL DEFAULT '0',
  `position_id` int(11) NOT NULL DEFAULT '0',
  `group` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `authKey`, `accessToken`, `name`, `surname`, `password`, `phone`, `privilege`, `position_id`, `group`) VALUES
(1, 'test1key', '1-token', 'admin', 'Nik', '123456', 930240366, 1, 3, 0),
(3, 'key', 'token', 'Джон', 'Смит', '123456', 939876543, 0, 28, 1),
(5, 'ауку', 'куцкцу', 'Вася', 'Пупкин', '123456', 98231456, 0, 1, 1),
(6, 'gfgf', 'gfgfgfg', 'Петя', 'Бампер', '123456', 575643367, 0, 27, 1),
(7, 'папапап', 'апапапапап', 'Кирил', 'Мураев', '123456', 2147483647, 0, 0, 1),
(8, 'прапрап', 'апрапра', 'Вася', 'Пппффффффффф', '123456', 1234567811, 0, 0, 1),
(9, '', '', 'Дмитрий', 'Иванов', '123456', 930202022, 0, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
