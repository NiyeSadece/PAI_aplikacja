-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 17, 2023 at 10:52 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restauracja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `city_id`, `address`) VALUES
(1, 1, 'Malinowa 15'),
(2, 2, 'Aleja Grunwaldzka 270'),
(3, 3, 'Marszałka Ferdynanda Focha 14'),
(4, 4, 'Marszałkowska 140'),
(5, 5, 'Rynek Staromiejski 16'),
(6, 1, 'Mickiewicza 24'),
(20, 7, 'Kościuszki 34'),
(23, 4, 'Krakowska 34');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(1, 'Poznań'),
(2, 'Gdańsk'),
(3, 'Bydgoszcz'),
(4, 'Warszawa'),
(5, 'Toruń'),
(7, 'Kraków');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `address_ip` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `status`, `address_ip`, `created_at`) VALUES
(31, 13, 1, '::1', '2023-06-10 06:57:10'),
(40, 15, 1, '::1', '2023-06-11 10:29:59'),
(41, 15, 1, '::1', '2023-06-11 10:53:06'),
(42, 13, 1, '::1', '2023-06-11 18:08:27'),
(43, 13, 1, '::1', '2023-06-11 18:09:02'),
(44, 15, 1, '::1', '2023-06-11 18:09:45'),
(46, 15, 1, '::1', '2023-06-15 09:50:40'),
(47, 13, 1, '::1', '2023-06-16 14:01:41'),
(48, 15, 0, '::1', '2023-06-16 14:07:38'),
(49, 15, 1, '::1', '2023-06-16 14:07:42'),
(50, 15, 1, '::1', '2023-06-17 19:36:15'),
(51, 15, 1, '::1', '2023-06-17 19:54:27'),
(52, 13, 1, '::1', '2023-06-17 20:27:46'),
(53, 15, 1, '::1', '2023-06-17 22:48:47');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `restaurant_id`, `user_id`, `table_id`, `reservation_date`, `startTime`, `endTime`, `created_at`, `status_id`) VALUES
(2, 8, 13, 18, '2024-11-02', '11:00:00', '16:00:00', '2023-06-16 14:05:54', 1),
(3, 7, 13, 17, '1233-03-12', '12:00:00', '16:00:00', '2023-06-16 21:05:34', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `name`, `phoneNumber`, `address_id`) VALUES
(7, 'Kukła Poznań', '123455555', 1),
(8, 'Kukła Gdańsk', '1234587634', 2),
(9, 'Kukła Bydgoszcz', '657489203', 3),
(10, 'Kukła Warszawa', '345987567', 4),
(11, 'Kukła Toruń', '3789547536', 5),
(12, 'Kukła Poznań 2', '546378293', 6),
(13, 'Kukła Kraków', '45632343', 20),
(16, 'Kukła Warszawa 2', '34689843', 23);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(11) NOT NULL,
  `role` enum('user','employee','administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'user'),
(2, 'employee'),
(3, 'administrator');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `id` int(10) NOT NULL,
  `status` enum('niepotwierdzona','potwierdzona','anulowana','zrealizowana') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'niepotwierdzona'),
(2, 'potwierdzona'),
(3, 'anulowana'),
(4, 'zrealizowana');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tables`
--

CREATE TABLE `tables` (
  `table_id` int(10) NOT NULL,
  `restaurant_id` int(10) NOT NULL,
  `tableNumber` int(50) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `restaurant_id`, `tableNumber`, `seats`) VALUES
(5, 7, 1, 6),
(6, 8, 1, 5),
(7, 9, 1, 6),
(8, 10, 1, 4),
(9, 11, 1, 6),
(10, 12, 1, 4),
(11, 7, 2, 6),
(12, 8, 2, 8),
(13, 9, 2, 8),
(14, 10, 2, 2),
(15, 11, 2, 4),
(16, 12, 2, 4),
(17, 7, 3, 4),
(18, 8, 3, 6),
(19, 9, 3, 4),
(20, 13, 3, 6),
(24, 16, 1, 6),
(25, 16, 2, 4),
(26, 16, 3, 2),
(27, 16, 4, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `role_id`, `phoneNumber`, `created_at`) VALUES
(13, 'q', 'q', 'q@test.pl', '$argon2id$v=19$m=65536,t=4,p=1$STM0dmV4OFN6dEY2NEh4Qw$qNO8/j159of6LCg9XdSFAScbVN0QzUCy4xgIzZDoiZQ', 1, '1234555', '2023-06-10 06:56:56'),
(15, 'daj', 'paj', 'daj@test.pl', '$argon2id$v=19$m=65536,t=4,p=1$Z0VFRTlqenA3NHB0T1QvYQ$wo4ClrR8FGyuJcIKlm6O+6TYi0JAoay5nsXlVrTLAxY', 3, '4444444', '2023-06-11 10:29:46'),
(17, 'kk', 'kk', 'kk@test.pl', '$argon2id$v=19$m=65536,t=4,p=1$Q1haUVdkRjlud1lkUWw5Vw$qarzwgBmzR97+XbWalOSIORHxdJomEqYMLnJ6p/QElw', 2, '343763', '2023-06-15 21:15:46');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indeksy dla tabeli `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs` (`user_id`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `restauracja` (`restaurant_id`),
  ADD KEY `stolik` (`table_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`) USING BTREE;

--
-- Indeksy dla tabeli `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `address` (`address_id`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `restauracja` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stolik` FOREIGN KEY (`table_id`) REFERENCES `tables` (`table_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `address` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
