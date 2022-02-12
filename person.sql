-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 16 2021 г., 11:13
-- Версия сервера: 10.1.44-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `person`
--

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE `person` (
  `id` int(5) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info1` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(2) NOT NULL,
  `earnings` int(2) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`id`, `name`, `info`, `info1`, `age`, `earnings`, `status`) VALUES
(1, 'Нейт', 'YouTuber', 'Pretium quisque vulputate nostra semper fermentum morbi erat lacinia hac, fringilla pulvinar nullam vel finibus eleifend massa curabitur litora, proin vestibulum congue tristique aliquam purus turpis adipiscing. ', 24, 41367, 'Popular'),
(2, 'Моника', 'Character', 'Pretium quisque vulputate nostra semper fermentum morbi erat lacinia hac, fringilla pulvinar nullam vel finibus eleifend massa curabitur litora, proin vestibulum congue tristique aliquam purus turpis adipiscing. ', 22, 24566, 'Popular'),
(3, 'Ваня', 'Derector', 'Pretium quisque vulputate nostra semper fermentum morbi erat lacinia hac, fringilla pulvinar nullam vel finibus eleifend massa curabitur litora, proin vestibulum congue tristique aliquam purus turpis adipiscing. ', 54, 4125, 'Popular'),
(4, 'Сталин', 'Diktator', 'Pretium quisque vulputate nostra semper fermentum morbi erat lacinia hac, fringilla pulvinar nullam vel finibus eleifend massa curabitur litora, proin vestibulum congue tristique aliquam purus turpis adipiscing. ', 62, 24626, 'Popular');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
