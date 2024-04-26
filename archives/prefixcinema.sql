-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 21 2024 г., 09:14
-- Версия сервера: 8.0.32
-- Версия PHP: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `prefixcinema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'testuser', '1111', 'test@test.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `userstesttable`
--

CREATE TABLE `userstesttable` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `userstesttable`
--

INSERT INTO `userstesttable` (`id`, `username`, `password`, `email`) VALUES
(1, 'testuser', '1111', 'test@test.ru'),
(2, 'testuser2', '2222', 'test2@test.ru'),
(3, 'dua_lipa', 'qw', 'dua@mail.com'),
(4, 'ADMINISTRATOR', '1234qwer', 'bgv1561@yandex.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `userstesttable`
--
ALTER TABLE `userstesttable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `userstesttable`
--
ALTER TABLE `userstesttable`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
