-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 01 2024 г., 22:27
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `avoska`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `cost` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Новый'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `cost`, `status`) VALUES
(5, 32, 5188, 'Подтверждено'),
(6, 32, 6044, 'Подтверждено'),
(7, 33, 372, 'Отменено'),
(8, 32, 1172, 'Отменено'),
(9, 34, 1000, 'Отменено'),
(10, 32, 60, 'Подтверждено'),
(11, 35, 285, 'Отменено'),
(12, 35, 1, 'Отменено');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `tovar_id` int NOT NULL,
  `qnt` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `tovar_id`, `qnt`, `price`) VALUES
(6, 5, 21, 15, 100),
(7, 5, 22, 22, 100),
(8, 5, 23, 12, 124),
(9, 6, 21, 22, 100),
(10, 6, 23, 31, 124),
(11, 7, 23, 3, 124),
(12, 8, 22, 4, 100),
(13, 8, 23, 3, 124),
(14, 8, 21, 4, 100),
(15, 9, 22, 10, 100),
(16, 10, 23, 3, 20),
(17, 11, 21, 3, 20),
(18, 11, 30, 3, 75);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'operator');

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `title`, `description`, `image`, `price`) VALUES
(21, 'Ручка синяя', 'Классическая синяя', 'vendor/image/1931516.jpg', '20'),
(22, 'Ручка красная', 'Красная, гелевая', 'vendor/image/ruchka.jpg', '20'),
(23, 'Ручка чёрная', 'Чёрная, гелевая', 'vendor/image/black.jpg', '20'),
(24, 'Тетрадь ', '24 листа, в клеточку', 'vendor/image/tetr.jpg', '15'),
(25, 'Альбом \"Подсолнух\"', '24 листа', 'vendor/image/169732-1-700.jpg', '80'),
(26, 'Ежедневник \"Лисича\"', '60 листа', 'vendor/image/169481-1-1000.jpg', '120'),
(27, 'Дневник школьный', 'Серый', 'vendor/image/dnevnik.jpg', '50'),
(28, 'Пенал школьный', 'Жёлтый банан', 'vendor/image/penal.png', '70'),
(29, 'Набор карандашей', 'Графит, разной жёсткости', 'vendor/image/grafit.jpg', '150'),
(30, 'Маркер', 'Синий, спиртовой', 'vendor/image/marker.jpg', '75'),
(31, 'Faber-Castell', 'Набор графитовых карандашей и стержней к ним', 'vendor/image/nabor2.jpg', '1500'),
(32, 'Faber-Castell', 'Набор разноцветных карандашей', 'vendor/image/nabor.jpg', '1'),
(33, 'Степлер', 'Степлер', 'vendor/image/step.jpg', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(70) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `full_name`, `telephone`, `email`, `status`) VALUES
(29, 'test', '240903', 'test', 'test', 'test@asda', 1),
(32, 'Login', '240903', 'FIO', '89011234567', 'mail@mail.ru', 2),
(33, 'PAPAANAPA', '240903', 'PAPAANAPA', '89021131221', 'A@A.RU', 2),
(34, 'sergio', '240903', 'Червяков Сергей Андреевич', '89048921499', 'twink-1995@bk.ru', 2),
(35, 'Sergei', '240903', 'Червяков Андрей Евгеньевич', '89011112131', 'pochta@mail.ru', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_ibfk_1` (`order_id`),
  ADD KEY `order_items_ibfk_2` (`tovar_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`tovar_id`) REFERENCES `tovar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
