-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 13 2015 г., 14:40
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_changename`
--

CREATE TABLE IF NOT EXISTS `frapsy_changename` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `old_name` varchar(24) NOT NULL,
  `new_name` varchar(24) NOT NULL,
  `status` int(11) NOT NULL,
  `moder_name` varchar(24) NOT NULL,
  `create_time` datetime NOT NULL,
  `moderation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_donate`
--

CREATE TABLE IF NOT EXISTS `frapsy_donate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sum` int(11) NOT NULL,
  `nickname` varchar(24) NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `frapsy_donate`
--

INSERT INTO `frapsy_donate` (`id`, `sum`, `nickname`, `status`, `create_time`) VALUES
(1, 0, 'Nikk_Leiz', 0, '2015-01-22 16:23:29'),
(2, 1, 'Federico_Moretti', 0, '2015-01-23 07:28:23'),
(3, 1, 'Domingo_Benito', 0, '2015-02-04 14:02:37'),
(4, 120, 'Vito_Wess', 0, '2015-02-15 21:46:50'),
(5, 120, 'Vito_Wess', 0, '2015-02-15 21:47:22'),
(6, 115, 'Vito_Wess', 0, '2015-02-15 21:48:07'),
(7, 1, 'Nikk_Leiz', 0, '2015-02-21 14:11:51'),
(8, 1, 'Nikk_Leiz', 0, '2015-02-21 15:05:57'),
(9, 1, 'Jack_Miller', 0, '2015-02-21 15:35:44'),
(10, 1, 'Nikk_Leiz', 0, '2015-02-21 19:41:34'),
(11, 1, 'Nikk_Leiz', 0, '2015-02-21 19:44:39'),
(12, 1, 'Nikk_Leiz', 0, '2015-02-21 19:49:15'),
(13, 1, 'Nikk_Leiz', 0, '2015-02-23 15:50:17'),
(14, 1, 'Fedor_Starcev', 1, '2015-02-24 11:03:01'),
(15, 1, 'Fedor_Starcev', 0, '2015-02-25 05:51:40'),
(16, 1, 'Fedor_Starcev', 0, '2015-02-25 05:54:49'),
(17, 1, 'Jack_Miller', 0, '2015-02-26 19:25:43'),
(18, 1, 'Nikk_Leiz', 1, '2015-03-02 07:33:02'),
(19, 1000, 'Jo_NaTocke', 0, '2015-03-05 17:44:42'),
(20, 500, 'Brain_Molotov', 0, '2015-03-06 15:25:43'),
(21, 7, 'Martin_Hofman', 1, '2015-03-07 15:10:31'),
(22, 47, 'Rich_Robert', 0, '2015-03-11 13:01:07'),
(23, 47, 'Rich_Robert', 0, '2015-03-11 13:01:13'),
(24, 40, 'Rich_Robert', 0, '2015-03-15 19:04:35'),
(25, 40, 'Rich_Robert', 0, '2015-03-16 02:21:54'),
(26, 40, 'Rich_Robert', 0, '2015-03-16 02:22:00'),
(27, 2, 'Jon_Hanzo', 0, '2015-03-16 18:05:39');

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_logins`
--

CREATE TABLE IF NOT EXISTS `frapsy_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(24) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `date` datetime NOT NULL,
  `useragent` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

--
-- Дамп данных таблицы `frapsy_logins`
--

INSERT INTO `frapsy_logins` (`id`, `account`, `ip`, `date`, `useragent`) VALUES
(1, 'Nikk_Leiz', '109.252.74.83', '2015-01-22 12:49:06', 'Maxthon'),
(2, 'Vito_Corleone', '95.28.214.126', '2015-01-22 12:49:12', 'Chrome'),
(3, 'Jack_Miller', '85.26.234.61', '2015-01-22 12:53:02', 'Safari'),
(4, 'Jack_Miller', '85.26.234.61', '2015-01-22 12:53:32', 'Safari'),
(5, 'Jack_Miller', '85.26.234.61', '2015-01-22 13:01:39', 'Chrome'),
(6, 'Jack_Miller', '85.26.234.61', '2015-01-22 13:01:41', 'Chrome'),
(7, 'Jack_Miller', '85.26.234.61', '2015-01-22 13:01:42', 'Chrome'),
(8, 'Jack_Miller', '85.26.234.61', '2015-01-22 13:01:45', 'Chrome'),
(9, 'Jack_Miller', '85.26.234.61', '2015-01-22 13:01:46', 'Chrome'),
(10, 'Jack_Miller', '85.26.234.61', '2015-01-22 13:01:47', 'Chrome'),
(11, 'Zhenya_Bucikin', '37.54.193.212', '2015-01-22 14:29:02', 'Chrome'),
(12, 'Nikk_Leiz', '83.149.8.78', '2015-01-23 05:13:35', 'Safari'),
(13, 'Federico_Moretti', '46.50.145.73', '2015-01-23 07:30:29', 'Chrome'),
(14, 'Nikk_Leiz', '37.144.149.201', '2015-01-23 10:19:39', 'Safari'),
(15, 'Fedor_Starcev', '95.143.214.205', '2015-01-23 12:40:17', 'Яндекс.Браузер'),
(16, 'Nikk_Leiz', '109.252.74.83', '2015-01-23 14:47:11', 'Maxthon'),
(17, 'Make_Miller', '46.0.231.226', '2015-01-23 16:11:57', 'Chrome'),
(18, 'Zhenya_Bucikin', '94.178.160.195', '2015-01-23 17:45:19', 'Chrome'),
(19, 'Nikk_Leiz', '109.252.74.83', '2015-01-24 10:10:45', 'Maxthon'),
(20, 'Nikk_Leiz', '109.252.74.83', '2015-01-25 10:39:28', 'Maxthon'),
(21, 'Nikk_Leiz', '109.252.74.83', '2015-01-26 14:23:23', 'Maxthon'),
(22, 'Antonio_Barderas', '188.94.39.57', '2015-01-26 14:24:14', 'Safari'),
(23, 'Nikk_Leiz', '109.252.74.83', '2015-01-27 19:59:27', 'Maxthon'),
(24, 'Nikk_Leiz', '176.14.18.107', '2015-02-01 14:38:37', 'Maxthon'),
(25, 'Luis_Romero', '46.8.59.221', '2015-02-01 16:39:10', 'Chrome'),
(26, 'Luis_Romero', '46.8.59.221', '2015-02-01 16:39:12', 'Chrome'),
(27, 'Nikk_Leiz', '94.29.127.241', '2015-02-02 07:45:33', 'Firefox'),
(28, 'Nikk_Leiz', '176.14.4.84', '2015-02-06 17:02:02', 'Maxthon'),
(29, 'Nikk_Leiz', '109.252.74.83', '2015-02-08 01:08:22', 'Maxthon'),
(30, 'German_Timov', '128.73.252.124', '2015-02-08 13:26:41', 'Chrome'),
(31, 'German_Timov', '128.73.252.124', '2015-02-08 13:26:44', 'Chrome'),
(32, 'Nikk_Leiz', '109.252.74.83', '2015-02-10 17:18:16', 'Maxthon'),
(33, 'Antonio_Barderas', '37.144.169.39', '2015-02-15 18:44:25', 'Safari'),
(34, 'Nikk_Leiz', '109.252.74.83', '2015-02-15 19:54:49', 'Maxthon'),
(35, 'Nikk_Leiz', '109.252.74.83', '2015-02-15 22:32:56', 'Maxthon'),
(36, 'Nikk_Leiz', '109.252.74.83', '2015-02-15 22:38:17', 'Maxthon'),
(37, 'Nikk_Leiz', '94.29.127.198', '2015-02-16 07:34:38', 'Firefox'),
(38, 'Nikk_Leiz', '109.252.74.83', '2015-02-16 22:00:56', 'Maxthon'),
(39, 'Nikk_Leiz', '109.252.74.83', '2015-02-17 12:49:44', 'Maxthon'),
(40, 'Nikk_Leiz', '94.29.127.232', '2015-02-18 07:15:29', 'Safari'),
(41, 'Adrian_Thomas', '109.185.19.96', '2015-02-18 18:09:47', 'Chrome'),
(42, 'Nikk_Leiz', '109.252.74.83', '2015-02-21 10:42:02', 'Maxthon'),
(43, 'Nikk_Leiz', '46.50.145.73', '2015-02-21 11:31:49', 'Chrome'),
(44, 'Jack_Miller', '5.164.182.158', '2015-02-21 15:36:18', 'Chrome'),
(45, 'Nikk_Leiz', '109.252.74.83', '2015-02-21 22:27:38', 'Maxthon'),
(46, 'Nikk_Leiz', '109.252.74.83', '2015-02-22 11:25:15', 'Maxthon'),
(47, 'Nikk_Leiz', '95.143.214.205', '2015-02-24 11:02:00', 'Maxthon'),
(48, 'Nikk_Leiz', '46.50.145.73', '2015-02-24 21:47:16', 'Chrome'),
(49, 'Kirill_Nizamov', '159.255.0.246', '2015-02-25 05:45:31', 'Browser based on Gecko'),
(50, 'Slava_Benson', '85.26.165.180', '2015-02-26 13:13:01', 'Яндекс.Браузер'),
(51, 'Jack_Miller', '46.0.140.192', '2015-02-26 19:21:01', 'Chrome'),
(52, 'Ritorik_Edwards', '178.57.225.158', '2015-02-28 20:43:22', 'Chrome'),
(53, 'Joseph_Quinn', '193.34.160.73', '2015-03-01 10:53:53', 'Chrome'),
(54, 'Ritorik_Edwards', '178.57.253.44', '2015-03-01 10:57:24', 'Яндекс.Браузер'),
(55, 'Nikk_Leiz', '109.252.74.83', '2015-03-01 10:59:29', 'Maxthon'),
(56, 'Ritorik_Edwards', '178.57.253.44', '2015-03-01 13:43:05', 'Яндекс.Браузер'),
(57, 'Nikk_Leiz', '109.252.74.83', '2015-03-01 19:35:22', 'Maxthon'),
(58, 'Nikk_Leiz', '109.252.74.83', '2015-03-01 19:35:01', 'Maxthon'),
(59, 'Nikk_Leiz', '109.252.74.83', '2015-03-01 21:45:52', 'Maxthon'),
(60, 'Nikk_Leiz', '94.29.127.198', '2015-03-02 07:35:56', 'Firefox'),
(61, 'Sun_Lee', '94.29.127.198', '2015-03-02 07:38:03', 'Firefox'),
(62, 'Brain_Molotov', '194.242.122.91', '2015-03-02 15:07:32', 'Chrome'),
(63, 'Brain_Molotov', '194.242.122.91', '2015-03-02 15:07:33', 'Chrome'),
(64, 'Brain_Molotov', '194.242.122.91', '2015-03-02 15:07:33', 'Chrome'),
(65, 'Dusty_Vegas', '178.121.151.174', '2015-03-02 17:53:26', 'Chrome'),
(66, 'Joseph_Quinn', '193.34.160.73', '2015-03-02 18:35:52', 'Chrome'),
(67, 'Joseph_Quinn', '193.34.160.73', '2015-03-02 18:42:05', 'Safari'),
(68, 'Ritorik_Edwards', '178.57.254.147', '2015-03-03 18:41:12', 'Safari'),
(69, 'Jo_NaTocke', '178.57.249.58', '2015-03-05 17:42:52', 'Safari'),
(70, 'Jo_NaTocke', '178.57.249.58', '2015-03-05 17:55:05', 'Safari'),
(71, 'Brain_Molotov', '80.244.40.4', '2015-03-07 13:03:53', 'Chrome'),
(72, 'Martin_Hofman', '46.0.100.123', '2015-03-07 15:09:28', 'Chrome'),
(73, 'Nikk_Leiz', '109.252.74.83', '2015-03-08 08:48:13', 'Maxthon'),
(74, 'James_Rames', '94.179.225.191', '2015-03-08 15:04:46', 'Chrome'),
(75, 'Nikk_Leiz', '109.252.74.83', '2015-03-09 11:05:37', 'Maxthon'),
(76, 'Rich_Robert', '89.107.116.16', '2015-03-09 13:43:01', 'Safari'),
(77, 'Rich_Robert', '89.107.116.16', '2015-03-09 13:43:06', 'Safari'),
(78, 'Timofey_Kirilov', '178.186.27.136', '2015-03-13 18:58:28', 'Яндекс.Браузер'),
(79, 'Timofey_Kirilov', '37.23.184.208', '2015-03-16 01:46:22', 'Яндекс.Браузер'),
(80, 'Brayn_Macriver', '89.251.156.77', '2015-03-16 12:46:59', 'Яндекс.Браузер'),
(81, 'Nikk_Leiz', '109.252.74.84', '2015-03-16 18:23:13', 'Maxthon'),
(82, 'Nikk_Leiz', '109.252.74.84', '2015-03-16 19:05:24', 'Maxthon'),
(83, 'Nikk_Leiz', '109.252.74.84', '2015-03-17 10:34:18', 'Maxthon');

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_menu`
--

CREATE TABLE IF NOT EXISTS `frapsy_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(64) NOT NULL,
  `url` varchar(256) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `frapsy_menu`
--

INSERT INTO `frapsy_menu` (`id`, `label`, `url`, `parent_id`) VALUES
(1, 'Главная', '/', 0),
(11, 'Новости', '/news', 0),
(12, 'Форум', 'http://forum.rp-florida.ru', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_mon`
--

CREATE TABLE IF NOT EXISTS `frapsy_mon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mon_name` varchar(128) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(128) NOT NULL,
  `condition` varchar(128) NOT NULL,
  `views` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `frapsy_mon`
--

INSERT INTO `frapsy_mon` (`id`, `mon_name`, `table_id`, `table_name`, `condition`, `views`, `active`) VALUES
(1, 'Составы организаций', 0, '---', '---', 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_mon_params`
--

CREATE TABLE IF NOT EXISTS `frapsy_mon_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mon_id` int(11) NOT NULL,
  `field_name` varchar(64) NOT NULL,
  `label` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `frapsy_mon_params`
--

INSERT INTO `frapsy_mon_params` (`id`, `mon_id`, `field_name`, `label`) VALUES
(1, 2, 'Leader', 'Организация'),
(2, 3, 'Admin', 'Уровень администратора'),
(3, 4, 'Owner', 'Номер дома'),
(4, 4, 'Owner', 'Владелец'),
(5, 4, 'Cost', 'Стоимость дома'),
(6, 5, 'Owner', 'Номер дома'),
(7, 5, 'Owner', 'Владелец'),
(8, 5, 'Cost', 'Стоимость дома'),
(9, 6, 'Owner', 'Номер дома'),
(10, 6, 'Owner', 'Владелец'),
(11, 6, 'Cost', 'Стоимость дома'),
(12, 7, 'ID', 'Номер дома'),
(13, 7, 'Owner', 'Владелец'),
(14, 7, 'Cost', 'Стоимость дома'),
(15, 8, 'pLeader', 'Организация'),
(16, 9, 'Admin', 'Звание администратора'),
(17, 9, 'Online_status', 'Онлайн?');

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_names`
--

CREATE TABLE IF NOT EXISTS `frapsy_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(64) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `frapsy_names`
--

INSERT INTO `frapsy_names` (`id`, `label`, `params`) VALUES
(1, 'Названия организаций', 'a:51:{i:0;s:6:"Нет";i:1;s:34:"Полиция Лос-Сантос";i:2;s:34:"Полиция Сан-Фиееро";i:3;s:3:"FBI";i:4;s:4:"SWAT";i:5;s:36:"Больница Лос-Сантос";i:6;s:46:"Правительство Лос-Сантос";i:7;s:46:"Правительство Сан-Фиееро";i:8;s:36:"Больница Сан-Фиееро";i:9;s:22:"Инструкторы";i:10;s:16:"TV- студия";i:11;s:13:"Groove Street";i:12;s:16:"Los Santos Vagos";i:13;s:15:"The Ballas Gang";i:14;s:18:"Los Santos Aztecas";i:15;s:13:"The Rifa Gang";i:16;s:25:"Русская Мафия";i:17;s:7:"Yakudza";i:18;s:14:"La Cosa Nostra";i:19;s:10:"Worlock MC";i:20;s:15:"Армия СФ";i:21;s:31:"Центральный Банк";i:22;s:0:"";i:23;s:19:"Название 23";i:24;s:19:"Название 24";i:25;s:19:"Название 25";i:26;s:19:"Название 26";i:27;s:19:"Название 27";i:28;s:19:"Название 28";i:29;s:19:"Название 29";i:30;s:19:"Название 30";i:31;s:19:"Название 31";i:32;s:19:"Название 32";i:33;s:19:"Название 33";i:34;s:19:"Название 34";i:35;s:19:"Название 35";i:36;s:19:"Название 36";i:37;s:19:"Название 37";i:38;s:19:"Название 38";i:39;s:19:"Название 39";i:40;s:19:"Название 40";i:41;s:19:"Название 41";i:42;s:19:"Название 42";i:43;s:19:"Название 43";i:44;s:19:"Название 44";i:45;s:19:"Название 45";i:46;s:19:"Название 46";i:47;s:19:"Название 47";i:48;s:19:"Название 48";i:49;s:19:"Название 49";i:50;s:19:"Название 50";}'),
(2, 'Ранги администраторов', 'a:51:{i:0;s:6:"Нет";i:1;s:18:"Модератор";i:2;s:33:"Старший модератор";i:3;s:31:"Мл.администратор";i:4;s:26:"Администратор";i:5;s:31:"Гл.администратор";i:6;s:20:"Основатель";i:7;s:0:"";i:8;s:18:"Название 8";i:9;s:18:"Название 9";i:10;s:19:"Название 10";i:11;s:19:"Название 11";i:12;s:19:"Название 12";i:13;s:19:"Название 13";i:14;s:19:"Название 14";i:15;s:19:"Название 15";i:16;s:19:"Название 16";i:17;s:19:"Название 17";i:18;s:19:"Название 18";i:19;s:19:"Название 19";i:20;s:19:"Название 20";i:21;s:19:"Название 21";i:22;s:19:"Название 22";i:23;s:19:"Название 23";i:24;s:19:"Название 24";i:25;s:19:"Название 25";i:26;s:19:"Название 26";i:27;s:19:"Название 27";i:28;s:19:"Название 28";i:29;s:19:"Название 29";i:30;s:19:"Название 30";i:31;s:19:"Название 31";i:32;s:19:"Название 32";i:33;s:19:"Название 33";i:34;s:19:"Название 34";i:35;s:19:"Название 35";i:36;s:19:"Название 36";i:37;s:19:"Название 37";i:38;s:19:"Название 38";i:39;s:19:"Название 39";i:40;s:19:"Название 40";i:41;s:19:"Название 41";i:42;s:19:"Название 42";i:43;s:19:"Название 43";i:44;s:19:"Название 44";i:45;s:19:"Название 45";i:46;s:19:"Название 46";i:47;s:19:"Название 47";i:48;s:19:"Название 48";i:49;s:19:"Название 49";i:50;s:19:"Название 50";}'),
(3, 'Названия работ', 'a:51:{i:0;s:22:"Безработный";i:1;s:45:"Список работ скоро будет";i:2;s:45:"Список работ скоро будет";i:3;s:45:"Список работ скоро будет";i:4;s:45:"Список работ скоро будет";i:5;s:45:"Список работ скоро будет";i:6;s:45:"Список работ скоро будет";i:7;s:45:"Список работ скоро будет";i:8;s:45:"Список работ скоро будет";i:9;s:45:"Список работ скоро будет";i:10;s:45:"Список работ скоро будет";i:11;s:45:"Список работ скоро будет";i:12;s:45:"Список работ скоро будет";i:13;s:45:"Список работ скоро будет";i:14;s:45:"Список работ скоро будет";i:15;s:45:"Список работ скоро будет";i:16;s:45:"Список работ скоро будет";i:17;s:45:"Список работ скоро будет";i:18;s:45:"Список работ скоро будет";i:19;s:45:"Список работ скоро будет";i:20;s:45:"Список работ скоро будет";i:21;s:19:"Название 21";i:22;s:19:"Название 22";i:23;s:19:"Название 23";i:24;s:19:"Название 24";i:25;s:19:"Название 25";i:26;s:19:"Название 26";i:27;s:19:"Название 27";i:28;s:19:"Название 28";i:29;s:19:"Название 29";i:30;s:19:"Название 30";i:31;s:19:"Название 31";i:32;s:19:"Название 32";i:33;s:19:"Название 33";i:34;s:19:"Название 34";i:35;s:19:"Название 35";i:36;s:19:"Название 36";i:37;s:19:"Название 37";i:38;s:19:"Название 38";i:39;s:19:"Название 39";i:40;s:19:"Название 40";i:41;s:19:"Название 41";i:42;s:19:"Название 42";i:43;s:19:"Название 43";i:44;s:19:"Название 44";i:45;s:19:"Название 45";i:46;s:19:"Название 46";i:47;s:19:"Название 47";i:48;s:19:"Название 48";i:49;s:19:"Название 49";i:50;s:19:"Название 50";}');

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_news`
--

CREATE TABLE IF NOT EXISTS `frapsy_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(24) NOT NULL,
  `create_time` datetime NOT NULL,
  `title` varchar(128) NOT NULL,
  `full_content` text NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `frapsy_news`
--

INSERT INTO `frapsy_news` (`id`, `author`, `create_time`, `title`, `full_content`, `content`, `status`) VALUES
(1, 'Nikk_Leiz', '2015-01-22 13:09:33', 'Открытие нового сайта', '<p>Здравствуйте игроки проека Florida Role Play.</p>\r\n<p>Глобальное обновление сайта!</p>\r\n<p>Добавлено:</p>\r\n<p>- Новый стиль сайта</p>\r\n<p>- Доступ в ЛК</p>\r\n<p>- Смена пароля</p>\r\n<p>- Смена EMail</p>\r\n<p>- Смена игрового имени</p>\r\n<p>- Меню лидера</p>\r\n<p>- Повышение и понижение в организации</p>\r\n<p>- Увольнение из организации</p>\r\n<p>и многое другое на этом сайте.</p>\r\n<p><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">Обновление : 2.0.4 - Релиз.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">Что было добавлено:</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">- Сделан новый ЖД вокзал место старого.(скрины внизу)</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">- Включена работа "Машинист" - устроится можно около вокзала.</span><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;"><br />- Доделана аренда лодок.<br />- Сделан звук оповещения(чтоб услышать настройте параметры звука)<br />- Подготовлены песни для Дискотеки (Место проведения: Клуб Алихамбра)<br />- Сделана команда /stopaudio - Остановить музыку сервера если вы не хотите послушать.(обратно песню нельзя включить)<br />Обновление 2.0.5 - Анонс<br />- Добавлен зал ожидания на Вокзале ЖД ЛС<br />- Оповещение о прибытии поезда<br />- Новые здания по городу<br />- Дописаны новые правила РП режима<br />- Новые маршруты для автобусников<br />- Новые функции для пассажира такси<br />- Добавлены банкоматы<br />- Доделана парковка на ЖД вокзале ЛС.<br />- Система /sleep будет новой и простой. Добавлены новые места сна.<img src="https://pp.vk.me/c621417/v621417568/ca15/6PA2aRnrCSE.jpg" alt="Фотография с прокта Florida Role Play" width="861" height="461" /></span></p>', '<p>Здравствуйте игроки проека Florida Role Play.</p>\r\n<p>Глобальное обновление сайта!</p>\r\n<p>Добавлено:</p>\r\n<p>- Новый стиль сайта</p>\r\n<p>- Доступ в ЛК</p>\r\n<p>- Смена пароля</p>\r\n<p>- Смена EMail</p>\r\n<p>- Смена игрового имени</p>\r\n<p>- Меню лидера</p>\r\n<p>&nbsp;</p>', 0),
(2, 'Nikk_Leiz', '2015-01-26 14:31:30', 'Небольшое обновление', '<p><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">Небольшое но приятное обновление.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">- Добавлены указатели на дорогах</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">Теперь когда вы будите ехать по дороге вам будут напоминать указатели о том что надо ехать по свей полосе а не по встречном движении. Сейчас их по городу не так уж и много. Уколо банка,спавна,спального района и на автовокзале.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">- Переделан спавн игроков</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">Теперь спавн более просторный но не до конца доработан.На нем еще будут: зал ожидания, платформа,парковка и мелкие детали.<img src="https://pp.vk.me/c623416/v623416331/199ba/17JpQ9VIvHY.jpg" alt="" width="400" height="400" /></span></p>', '<p><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">Небольшое но приятное обновление.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">- Добавлены указатели на дорогах</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">Теперь когда вы будите ехать по дороге вам будут напоминать указатели о том что надо ехать по свей полосе а не по встречном движении. Сейчас их по городу не так уж и много. Уколо банка,спавна,спального района и на автовокзале.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">- Переделан спавн игроков</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px;">Теперь спавн более просторный но не до конца доработан.На нем еще будут: зал ожидания, платформа,парковка и мелкие детали.<img src="https://pp.vk.me/c623416/v623416331/199ba/17JpQ9VIvHY.jpg" alt="" width="400" height="400" /></span></p>', 0),
(3, 'Nikk_Leiz', '2015-02-02 08:02:37', 'Обновление на 2.02.15', '<p>Небольшое обновление для <span style="color: #ff6600;">Florida Role Play</span>.</p>\r\n<p>Что было добавлено:</p>\r\n<p>-Была увеличена зарплата организации</p>\r\n<p>Теперь гос.организации и нелигальные организации получают зарплату в 10 раз больше.</p>\r\n<p>- Теперь банды могут каптить раз в 2 часа</p>\r\n<p>&nbsp;</p>\r\n<p>Подпишись на паблик <span style="color: #0000ff;">ВКонтакте</span> - <a href="http://vk.com/play_florida" target="_blank">Кликабельно</a></p>\r\n<p>Подпишись на канал <span style="color: #ff0000;">YouTube</span> - <a href="http://www.youtube.com/user/frptv100/featured" target="_blank">Кликабельно</a></p>\r\n<p>Голосуй за сервер! - <a href="http://servers-samp.ru/server-151938" target="_blank">Кликабельно</a></p>', '<p>Небольшое обновление для <span style="color: #ff6600;">Florida Role Play</span>.</p>\r\n<p>Что было добавлено:</p>\r\n<p>-Была увеличена зарплата организации</p>\r\n<p>Теперь гос.организации и нелигальные организации получают зарплату в 10 раз больше.</p>\r\n<p>- Теперь банды могут каптить раз в 2 часа</p>\r\n<p>&nbsp;</p>\r\n<p>Подпишись на паблик <span style="color: #0000ff;">ВКонтакте</span> - <a href="http://vk.com/play_florida" target="_blank">Кликабельно</a></p>\r\n<p>Подпишись на канал <span style="color: #ff0000;">YouTube</span> - <a href="http://www.youtube.com/user/frptv100/featured" target="_blank">Кликабельно</a></p>\r\n<p>Голосуй за сервер! - <a href="http://servers-samp.ru/server-151938" target="_blank">Кликабельно</a></p>', 0),
(4, 'Nikk_Leiz', '2015-03-09 11:08:59', 'Обновление проекта 2.0.9', '<div class="wall_post_text" style="padding-top: 2px; padding-bottom: 1px; line-height: 15px; width: 320px; overflow: hidden; word-wrap: break-word; cursor: pointer; font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans'';">Обновление для Florida RolePlay - 2.0.9<br /><br />Что нового:<br />- Теперь можно надеть глушитель на Desert Eagle командой /silencer<br />- Изменен дизайн некоторых команд и функций<br />- Теперь чем выше у вас скиллы работы, тем выше зарплата.<br />- Теперь лидер организации может давать мут сотруднику своей фракции. Команда /fmute. Убрать мут /funmute.<br />- Теперь если у вас играет серверная музыка вы её можете выключить командой /stopaudio<br />- Добавлен черный список штата. Команду можно узнать в /help.<br />- Теперь можно продать свое авто другому игроку. Команда /sellcarto<br />- Теперь вы можете продать свой дом игроку через меню дома.<br />- Новый дизайн настроек.<br />- Теперь в казино новые звуки выйгрыша и пройгрыша.<br />- Для администрации 4 уровня доступны новые команды.<br /><br />Багофикс:<br />- Исправлен баг с центром занятости.<br />- Исправлен баг с рандомом в казино.<br /><br />Так же закрыты коментарии чтоб не было пиара других серверов<br /><br />Обновление поступит в 16:00<br /><br /><a style="color: #2b587a; text-decoration: none; cursor: pointer;" href="https://vk.com/play_florida/news">#news@play_florida</a>&nbsp;<a style="color: #2b587a; text-decoration: none; cursor: pointer;" href="https://vk.com/play_florida/update">#update@play_florida</a>&nbsp;<a style="color: #2b587a; text-decoration: none; cursor: pointer;" href="https://vk.com/feed?section=search&amp;q=%23FRP">#FRP</a></div>\r\n<div class="page_post_queue_narrow" style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 13px;">\r\n<div class="page_post_sized_thumbs  clear_fix" style="margin: 9px 0px 0px; padding-bottom: 4px; width: 337px; height: 189px;"><a class="page_post_thumb_wrap  page_post_thumb_last_column page_post_thumb_last_row" style="color: #2b587a; cursor: pointer; display: block; overflow: hidden; position: relative; margin: 0px; width: 337px; height: 189px;"><img class="page_post_thumb_sized_photo" style="border: 0px; position: absolute; top: 0px; left: 0px;" src="https://pp.vk.me/c623424/v623424331/1eb77/9vPOYEYmA6I.jpg" alt="" width="337" height="189" /></a></div>\r\n</div>', '<div class="wall_post_text" style="padding-top: 2px; padding-bottom: 1px; line-height: 15px; width: 320px; overflow: hidden; word-wrap: break-word; cursor: pointer; font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans'';">Обновление для Florida RolePlay - 2.0.9<br /><br />Что нового:<br />- Теперь можно надеть глушитель на Desert Eagle командой /silencer<br />- Изменен дизайн некоторых команд и функций<br />- Теперь чем выше у вас скиллы работы, тем выше зарплата.<br />- Теперь лидер организации может давать мут сотруднику своей фракции. Команда /fmute. Убрать мут /funmute.<br />- Теперь если у вас играет серверная музыка вы её можете выключить командой /stopaudio<br />- Добавлен черный список штата. Команду можно узнать в /help.<br />- Теперь можно продать свое авто другому игроку. Команда /sellcarto<br />- Теперь вы можете продать свой дом игроку через меню дома.<br />- Новый дизайн настроек.<br />- Теперь в казино новые звуки выйгрыша и пройгрыша.<br />- Для администрации 4 уровня доступны новые команды.<br /><br />Багофикс:<br />- Исправлен баг с центром занятости.<br />- Исправлен баг с рандомом в казино.<br /><br />Так же закрыты коментарии чтоб не было пиара других серверов<br /><br />Обновление поступит в 16:00<br /><br /><a style="color: #2b587a; text-decoration: none; cursor: pointer;" href="https://vk.com/play_florida/news">#news@play_florida</a>&nbsp;<a style="color: #2b587a; text-decoration: none; cursor: pointer;" href="https://vk.com/play_florida/update">#update@play_florida</a>&nbsp;<a style="color: #2b587a; text-decoration: none; cursor: pointer;" href="https://vk.com/feed?section=search&amp;q=%23FRP">#FRP</a></div>\r\n<div class="page_post_queue_narrow" style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 13px;">\r\n<div class="page_post_sized_thumbs  clear_fix" style="margin: 9px 0px 0px; padding-bottom: 4px; width: 337px; height: 189px;"><a class="page_post_thumb_wrap  page_post_thumb_last_column page_post_thumb_last_row" style="color: #2b587a; cursor: pointer; display: block; overflow: hidden; position: relative; margin: 0px; width: 337px; height: 189px;"><img class="page_post_thumb_sized_photo" style="border: 0px; position: absolute; top: 0px; left: 0px;" src="https://pp.vk.me/c623424/v623424331/1eb77/9vPOYEYmA6I.jpg" alt="" width="337" height="189" /></a></div>\r\n</div>', 0),
(5, 'Nikk_Leiz', '2015-03-16 18:58:23', 'Обновление игрового сервера 2.1.0', '<p style="text-align: center;"><strong>Доброго врмени суток игроки проекта Florida RolePlay</strong></p>\r\n<p style="text-align: center;"><strong><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">Просим прощения за долгое отсутствие обновлений.</span></strong></p>\r\n<p style="text-align: center;"><strong><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">Обновление 2.1.0(Beta)</span></strong></p>\r\n<p style="text-align: center;"><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Если вы взяли кредит и не смогли выплотить его за час то вам прибавят к долгу +200 $</span><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;"><br />- Если вы будите класть деньги на счет банка то каждый час<br />вам будут давать прибавку<br />- Система "День Рождения" если дата совпала с сегодняшним днем то вам напишут о том что вам исполнилось некоторое число лет.<br />- Теперь если вы зайдете за 19 минут до PayDay то вам зарплату не дадут!<br />- Теперь когда вы получите 3 Lvl то вы получите по 10 000$ за каждого игрока которого вы привели на сервер.<br />Обновления для администрации:<br />- Для основателя и гл.администратора добавлена защита.<br />- Сделана команда /ahelp<br />- Оповещения о читерах исправлено и будет работать корректно.</span></p>\r\n<p style="text-align: center;"><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">Багофикс:</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Исправлены часы.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Исправлен баг с анти-флудом.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Исправлен баг с каптами</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Исправлены ошибки в словах.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">Обнолвения поступит 16 марта в 21:00 по московскому времени.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">С уважением администрация проекта Florida RolePlay</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><a style="color: rgb(43, 88, 122); text-decoration: none; cursor: pointer; font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" href="https://vk.com/play_florida/news">#news@play_florida</a><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">&nbsp;</span><a style="color: rgb(43, 88, 122); text-decoration: none; cursor: pointer; font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" href="https://vk.com/play_florida/update">#update@play_florida</a><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">&nbsp;</span><a style="color: rgb(43, 88, 122); text-decoration: none; cursor: pointer; font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" href="https://vk.com/feed?section=search&amp;q=%23FRP">#FRP</a></p>\r\n<p style="text-align: center;"><img src="https://pp.vk.me/c623425/v623425331/2563c/kzKlIVOjqf0.jpg" alt="Florida RolePlay" width="604" height="340" /></p>', '<p style="text-align: center;"><strong>Доброго врмени суток игроки проекта Florida RolePlay</strong></p>\r\n<p style="text-align: center;"><strong><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">Просим прощения за долгое отсутствие обновлений.</span></strong></p>\r\n<p style="text-align: center;"><strong><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">Обновление 2.1.0(Beta)</span></strong></p>\r\n<p style="text-align: center;"><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Если вы взяли кредит и не смогли выплотить его за час то вам прибавят к долгу +200 $</span><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;"><br />- Если вы будите класть деньги на счет банка то каждый час<br />вам будут давать прибавку<br />- Система "День Рождения" если дата совпала с сегодняшним днем то вам напишут о том что вам исполнилось некоторое число лет.<br />- Теперь если вы зайдете за 19 минут до PayDay то вам зарплату не дадут!<br />- Теперь когда вы получите 3 Lvl то вы получите по 10 000$ за каждого игрока которого вы привели на сервер.<br />Обновления для администрации:<br />- Для основателя и гл.администратора добавлена защита.<br />- Сделана команда /ahelp<br />- Оповещения о читерах исправлено и будет работать корректно.</span></p>\r\n<p style="text-align: center;"><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">Багофикс:</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Исправлены часы.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Исправлен баг с анти-флудом.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Исправлен баг с каптами</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">- Исправлены ошибки в словах.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">Обнолвения поступит 16 марта в 21:00 по московскому времени.</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">С уважением администрация проекта Florida RolePlay</span><br style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" /><a style="color: rgb(43, 88, 122); text-decoration: none; cursor: pointer; font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" href="https://vk.com/play_florida/news">#news@play_florida</a><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">&nbsp;</span><a style="color: rgb(43, 88, 122); text-decoration: none; cursor: pointer; font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" href="https://vk.com/play_florida/update">#update@play_florida</a><span style="font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;">&nbsp;</span><a style="color: rgb(43, 88, 122); text-decoration: none; cursor: pointer; font-family: tahoma, arial, verdana, sans-serif, ''Lucida Sans''; line-height: 15px; text-align: left;" href="https://vk.com/feed?section=search&amp;q=%23FRP">#FRP</a></p>\r\n<p style="text-align: center;"><img src="https://pp.vk.me/c623425/v623425331/2563c/kzKlIVOjqf0.jpg" alt="Florida RolePlay" width="604" height="340" /></p>', 1),
(6, 'Nikk_Leiz', '2015-03-16 19:09:21', 'Проверка', '', '<p style="text-align: center;">Центр</p>\r\n<p style="text-align: center;"><img src="https://pp.vk.me/c621231/v621231331/1825c/0qQySEiZ0hU.jpg" alt="" width="997" height="601" /></p>', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_params_fields`
--

CREATE TABLE IF NOT EXISTS `frapsy_params_fields` (
  `table_field_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `field_name` varchar(64) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `label` varchar(64) NOT NULL,
  `desc` varchar(64) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `show` tinyint(1) NOT NULL,
  PRIMARY KEY (`table_field_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `frapsy_params_fields`
--

INSERT INTO `frapsy_params_fields` (`table_field_id`, `table_id`, `field_name`, `alias`, `label`, `desc`, `required`, `sort`, `show`) VALUES
(0, 1, 'id', 'ID', 'Номер аккаунта', 'Уникальный идентификатор', 1, 2, 1),
(1, 1, 'username', 'NickName', 'Имя', 'Никнейм игрока', 1, 0, 1),
(2, 1, 'password', 'Password', 'Мой пароль', 'Пароль', 1, 8, 0),
(3, 1, 'admin', 'Admin', 'Администратор', 'Уровень администрирования (админка)', 1, 7, 1),
(4, 1, 'skin', 'Skin', 'Скин игрока', 'Скин игрока', 1, 2, 0),
(5, 1, 'email', 'Mail', 'E-Mail', 'E-Mail игрока', 1, 3, 1),
(6, 1, 'donate', 'VirMoney', 'F-монет', 'Количество донат-очков', 1, 6, 1),
(7, 1, 'cash', 'Money', 'Наличные', 'Деньги на руках', 1, 4, 1),
(8, 1, 'bank', 'Bank', 'Счет в банке', 'Деньги в банке', 1, 5, 1),
(9, 1, 'leader', 'Leader', 'Лидер', 'Лидерка', 1, 8, 1),
(10, 1, 'member', 'Member', 'Организация', 'Организация (фракция) игрока', 1, 9, 1),
(11, 1, 'rang', 'Rank', 'Ранг', 'Ранг', 1, 10, 1),
(12, 1, 'job', 'Job', 'Работа', 'Работа', 1, 12, 1),
(13, 1, 'online', 'Online_status', 'Онлайн?', 'ID игрока на сервере, если онлайн', 1, 13, 1),
(16, 3, 'myField_16', 'Seria', 'Серия паспорта', 'Пользовательский параметр - 16', 0, 0, 1),
(14, 2, 'myField_14', 'ID', 'Номер дома', 'Пользовательский параметр - 14', 0, 0, 1),
(17, 1, 'myField_17', 'TelNum', 'Номер телефона', 'Пользовательский параметр - 17', 0, 11, 1),
(18, 1, 'myField_18', 'Level', 'Уровень', 'Пользовательский параметр - 18', 0, 1, 1),
(19, 1, 'myField_19', 'VIP', 'Уровень VIP', 'Пользовательский параметр - 19', 0, 0, 0),
(20, 1, 'myField_20', 'HouseKey', 'Дом', 'Пользовательский параметр - 20', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_params_tables`
--

CREATE TABLE IF NOT EXISTS `frapsy_params_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(64) NOT NULL,
  `label` varchar(128) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `frapsy_params_tables`
--

INSERT INTO `frapsy_params_tables` (`id`, `table_name`, `label`, `desc`) VALUES
(1, 'Accounts', 'Аккаунты', ''),
(2, 'Houses', 'Дома', 'Дома'),
(3, 'Passports', 'Паспорта', ''),
(4, 'Businesses', 'Бизнесы', '');

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_queries`
--

CREATE TABLE IF NOT EXISTS `frapsy_queries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(24) NOT NULL,
  `playerid` int(11) NOT NULL,
  `admin_name` varchar(24) NOT NULL,
  `action` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `new_nickname` varchar(24) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Дамп данных таблицы `frapsy_queries`
--

INSERT INTO `frapsy_queries` (`id`, `player_name`, `playerid`, `admin_name`, `action`, `amount`, `new_nickname`, `date`, `flag`) VALUES
(1, 'Dima_Fedorov', 1001, 'Zhenya_Bucikin', 1, 0, '', '2015-01-22 14:33:50', 1),
(2, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:43:11', 1),
(3, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:43:26', 1),
(4, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:43:33', 1),
(5, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:43:36', 1),
(6, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:43:38', 1),
(7, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:43:52', 1),
(8, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:43:54', 1),
(9, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:43:55', 1),
(10, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:43:57', 1),
(11, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:44:11', 1),
(12, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:44:13', 1),
(13, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:44:15', 1),
(14, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:44:16', 1),
(15, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:44:39', 1),
(16, 'Leo_Angello', 4, 'Nikk_Leiz', 1, 0, '', '2015-02-01 14:44:55', 1),
(17, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:52:36', 1),
(18, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:52:38', 1),
(19, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:52:39', 1),
(20, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:52:46', 1),
(21, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:52:48', 1),
(22, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:53:46', 1),
(23, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:54:14', 1),
(24, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:54:25', 1),
(25, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:54:39', 1),
(26, 'Leo_Angello', 2, 'Nikk_Leiz', 2, 0, '', '2015-02-01 14:54:53', 1),
(27, '', 0, '', 6, 10, '', '2015-02-21 14:16:21', 1),
(28, 'Julia_Spirkina', 1001, 'Nikk_Leiz', 3, 0, '', '2015-02-21 14:24:19', 1),
(29, 'Fred_Miclasen', 1001, 'Nikk_Leiz', 3, 0, '', '2015-02-21 14:24:31', 1),
(30, 'Fedor_Starcev', 0, 'Fedor_Starcev', 6, 1, '', '2015-02-24 11:11:33', 1),
(31, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 10:59:52', 1),
(32, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 10:59:55', 1),
(33, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 10:59:56', 1),
(34, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 10:59:58', 1),
(35, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 11:00:25', 1),
(36, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 11:00:27', 1),
(37, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 11:00:31', 1),
(38, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 11:00:32', 1),
(39, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 11:00:34', 1),
(40, 'Yaroslav_Kotov', 1001, 'Joseph_Quinn', 2, 0, '', '2015-03-01 11:00:36', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_tops`
--

CREATE TABLE IF NOT EXISTS `frapsy_tops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `top_name` varchar(64) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(128) NOT NULL,
  `field_for_sort` varchar(32) NOT NULL,
  `label_for_field` varchar(64) NOT NULL,
  `views` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `frapsy_tops`
--

INSERT INTO `frapsy_tops` (`id`, `top_name`, `table_id`, `table_name`, `field_for_sort`, `label_for_field`, `views`, `active`) VALUES
(2, 'Самые богатые(Наличные)', 1, 'Accounts', 'Money', 'Деньги на руках', 43, 0),
(3, 'Самые богатые(Банк)', 1, 'Accounts', 'Bank', 'Счет в банке', 30, 0),
(7, 'Самые дорогие дома', 2, 'Houses', 'Cost', 'Стоимость', 9, 0),
(8, 'Самые дорогие бизнесы', 4, 'Businesses', 'Cost', 'Стоимость', 9, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `frapsy_top_params`
--

CREATE TABLE IF NOT EXISTS `frapsy_top_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `top_id` int(11) NOT NULL,
  `field_name` varchar(32) NOT NULL,
  `label` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `frapsy_top_params`
--

INSERT INTO `frapsy_top_params` (`id`, `top_id`, `field_name`, `label`) VALUES
(3, 4, 'Owner', 'Владелец'),
(4, 5, 'Owner', 'Владелец'),
(5, 6, 'Owner', 'Владелец'),
(6, 6, 'Cost', 'Стоимость'),
(7, 7, 'ID', 'Номер дома'),
(8, 7, 'Owner', 'Владелец'),
(9, 8, 'Name', 'Название'),
(10, 8, 'Owner', 'Владелец');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
