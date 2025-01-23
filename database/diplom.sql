-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 23 2025 г., 16:47
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `meaning` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `value`, `meaning`) VALUES
(1, 'online', 'Онлайн'),
(2, 'away', 'Отошел'),
(3, 'do_not_disturb', 'Не беспокоить');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vk` varchar(255) NOT NULL,
  `telegram` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `password`, `username`, `job_title`, `status_id`, `image`, `phone`, `address`, `vk`, `telegram`, `instagram`) VALUES
(33, 'dima1@mail.ru', 'user', '$2y$10$SwxqDlS7SdJaFR1E0ByioubVC1FwlzxYj.Utr1dTwd4l0U.UmGIHO', 'Dmitry Smolka', 'IT Director, Gotbootstrap Inc', 2, '../img/user-images/67924de85c40d-avatar-admin-lg.png', '8 888 8888 88', ' 55 Smyth Rd, Detroit, MI, 48341, USA', '', '', ''),
(34, 'admin@admin.com', 'admin', '$2y$10$q8FCbk09RI.GF0VI3O2EXesQIGTYj97JVV/tAYsCZHoHv4B0/21Nm', 'Arseniy Gabbasov', 'Project Manager, Gotbootstrap Inc.', 2, '../img/user-images/67924df6462e5-avatar-g.png', '0 488 423888 88', '134 Hamtrammac, Detroit, MI, 48314, USA', 'vk.com', '', ''),
(51, 'haygoogle@google.com', 'user', '$2y$10$KriVUoQixNmVEQev8SWoQOhg5cE.8oEIUjCI/OT8BsbityOtMQbXa', 'Kolya Zlobin', 'United States Google', 3, '../img/user-images/67924dff1bad5-avatar-i.png', '4359349432', 'USA, Florida', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
