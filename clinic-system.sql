-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 23 2018 г., 00:20
-- Версия сервера: 5.7.16
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `clinic-system`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `charge` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `created_at`, `updated_at`, `employee_type`, `name`, `degree`, `gender`, `birthDate`, `specialist`, `charge`, `mobile`, `email`, `hAddress`, `oAddress`, `image`, `size`, `type`) VALUES
(1, '2018-05-20 17:43:22', '2018-05-20 18:00:03', 'doctor', 'Doc   ', '12 ', 'Male', '2018-05-18   ', 'medicine', 2, 2147483647, 'njaaav@gmail.com', 'sdfgsdg   ', 'sdgsdg   ', '', '', ''),
(2, '2018-05-20 18:04:01', '2018-05-20 18:04:01', 'nurse', 'Nurse', '1', 'Female', '2018-05-19', 'medicine', 3, 2147483647, 'njaaav@gmail.com', 'dsfh', 'dfhdh', '', '', ''),
(3, '2018-05-20 18:04:34', '2018-05-20 18:04:34', 'accountant', 'Dfhd', '3', 'Male', '2018-05-13', 'neurologiest', 4, 2147483647, 'njaaav@gmail.com', 'rfy', 'dfjh', '', '', ''),
(4, '2018-05-20 18:05:21', '2018-05-20 18:05:21', 'LabStaff', 'Lab', '5737', 'Female', '2018-05-13', 'medicine', 3, 2147483647, 'njaaav@gmail.com', 'fgj', 'fgj', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_06_015026_create_employees_table', 1),
('2016_08_06_032821_create_seats_table', 1),
('2016_08_06_050243_create_report_types_table', 1),
('2016_08_06_064118_create_reports_table', 1),
('2016_08_06_080355_create_operation_types_table', 1),
('2016_08_06_080410_create_operations_table', 1),
('2016_08_06_161105_create_patients_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `operations`
--

CREATE TABLE `operations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `operationType_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `operations`
--

INSERT INTO `operations` (`id`, `created_at`, `updated_at`, `date`, `time`, `description`, `operationType_id`, `patient_id`, `doctor_id`, `seat_id`) VALUES
(5, '2018-05-22 16:49:52', '2018-05-22 16:49:52', '0000-00-00', '00:02:36', 'dsgsdg', 1, 1, 1, 1),
(6, '2018-05-22 17:16:55', '2018-05-22 17:16:55', '2018-10-11', '00:35:21', 'Стерилизация питомца', 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `operation_types`
--

CREATE TABLE `operation_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `operation_types`
--

INSERT INTO `operation_types` (`id`, `created_at`, `updated_at`, `name`, `cost`) VALUES
(1, '2018-05-21 18:12:57', '2018-05-22 17:49:54', 'Коронарное шунтирование', '3666 ');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_type` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bloodGroup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symptoms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `created_at`, `updated_at`, `patient_type`, `name`, `gender`, `birthDate`, `bloodGroup`, `symptoms`, `mobile`, `email`, `address`, `image`, `size`, `type`, `employee_id`, `seat_id`) VALUES
(1, '2018-05-21 00:12:48', '2018-05-21 00:12:48', 1, 'Fdhdf', 'Male', '2018-05-19', 'A+', 'dfhdfh', '44444444444', 'njaaav@gmail.com', 'sdgsgd', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reportType_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `reports`
--

INSERT INTO `reports` (`id`, `created_at`, `updated_at`, `description`, `image`, `size`, `type`, `reportType_id`, `patient_id`) VALUES
(2, '2018-05-22 17:28:49', '2018-05-22 17:28:49', 'Диагностика питомца', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `report_types`
--

CREATE TABLE `report_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `report_types`
--

INSERT INTO `report_types` (`id`, `created_at`, `updated_at`, `name`, `cost`) VALUES
(1, '2018-05-22 17:21:10', '2018-05-22 17:21:10', 'Диагностика', 200),
(2, '2018-05-22 17:28:21', '2018-05-22 17:28:21', 'Стерилизация', 2000);

-- --------------------------------------------------------

--
-- Структура таблицы `seats`
--

CREATE TABLE `seats` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seatNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seatFloor` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `seatType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `seats`
--

INSERT INTO `seats` (`id`, `created_at`, `updated_at`, `seatNo`, `seatFloor`, `rent`, `seatType`, `status`, `image`, `size`, `type`) VALUES
(1, '2018-05-20 17:46:15', '2018-05-20 18:12:02', 'Test  ', 1, 2, 'general', 'empty', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `operation_types`
--
ALTER TABLE `operation_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `report_types`
--
ALTER TABLE `report_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `operation_types`
--
ALTER TABLE `operation_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `report_types`
--
ALTER TABLE `report_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
