-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 04 2022 г., 15:56
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `itech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `IP` varchar(30) NOT NULL,
  `balance` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id_client`, `name`, `login`, `password`, `IP`, `balance`) VALUES
(1, 'client 1', 'login 1', 'Password1', '127.0.0.1', '13'),
(2, 'client 2', 'login 2', 'Password2', '127.0.0.2', '-5'),
(3, 'client 3', 'login 3', 'Password3', '127.0.0.3', '26');

-- --------------------------------------------------------

--
-- Структура таблицы `seanse`
--

CREATE TABLE `seanse` (
  `id_seance` int(11) NOT NULL,
  `start` time DEFAULT NULL,
  `stop` time NOT NULL,
  `in_trafic` varchar(30) NOT NULL,
  `out_trafic` varchar(30) NOT NULL,
  `fid_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `seanse`
--

INSERT INTO `seanse` (`id_seance`, `start`, `stop`, `in_trafic`, `out_trafic`, `fid_client`) VALUES
(1, '06:00:00', '08:00:00', '200', '200', 1),
(2, '08:10:00', '08:40:00', '188', '222', 1),
(3, '09:10:00', '09:40:00', '117', '333', 2),
(4, '10:10:00', '10:55:00', '220', '444', 2),
(5, '10:10:00', '11:10:00', '300', '555', 3),
(6, '14:10:00', '15:10:00', '320', '111', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Индексы таблицы `seanse`
--
ALTER TABLE `seanse`
  ADD PRIMARY KEY (`id_seance`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
