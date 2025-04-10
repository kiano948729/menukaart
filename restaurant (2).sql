-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 10 apr 2025 om 08:42
-- Serverversie: 5.7.44
-- PHP-versie: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `color`) VALUES
(1, 'Breakfast', '#D8F3DC'),
(2, 'Soups', '#FAD2E1'),
(3, 'Pasta', '#BDE0FE'),
(4, 'Sushi', '#CDB4DB'),
(5, 'Main Course', '#FFC8DD'),
(6, 'Desserts', '#FFAFCC'),
(7, 'Drinks', '#B5E48C'),
(8, 'Alcohol', '#A0C4FF');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`id`, `category_id`, `name`, `price`, `stock`) VALUES
(1, 1, 'Pancakes', 5.99, 25),
(2, 1, 'Scrambled Eggs', 4.50, 15),
(3, 1, 'Croissant', 2.75, 29),
(4, 2, 'Tomato Soup', 3.99, 30),
(5, 2, 'Chicken Soup', 4.50, 10),
(6, 2, 'Miso Soup', 3.25, 20),
(7, 3, 'Spaghetti Bolognese', 7.99, 18),
(8, 3, 'Penne Alfredo', 8.50, 12),
(9, 3, 'Lasagna', 9.25, 7),
(10, 4, 'California Roll', 6.99, 20),
(11, 4, 'Tuna Nigiri', 7.50, 14),
(12, 4, 'Salmon Sashimi', 8.25, 10),
(13, 5, 'Grilled Chicken', 10.99, 8),
(14, 5, 'Steak & Fries', 14.50, 5),
(15, 5, 'Vegetable Stir Fry', 9.75, 12),
(16, 6, 'Chocolate Cake', 4.99, 22),
(17, 6, 'Ice Cream', 3.50, 30),
(18, 6, 'Cheesecake', 5.25, 16),
(19, 7, 'Coca Cola', 2.50, 40),
(20, 7, 'mule kick', 3.00, 35),
(21, 7, 'jugggggggg', 2.75, 51),
(22, 8, 'electric cherry', 6.50, 12),
(23, 8, 'Roooottttt Beer', 4.00, 18),
(24, 8, 'Stamina Up', 8.75, 9),
(25, 8, 'Speed cola', 3000.00, 100),
(26, 8, 'Juggernaut', 2500.00, 8),
(27, 7, 'double tap', 300.00, 21),
(28, 8, 'Tombstoneeee', 2500.00, 20),
(29, 7, 'melee macchiato', 3500.00, 20),
(30, 7, 'Juggernog', 2.99, 100),
(31, 7, 'Quick Revive', 1.99, 150),
(32, 7, 'Speed Cola', 3.49, 120),
(33, 7, 'Double Tap Root Beer', 2.99, 80),
(34, 7, 'Stamin-Up', 2.49, 200),
(35, 7, 'PhD Flopper', 3.99, 70),
(36, 7, 'Deadshot Daiquiri', 2.79, 90),
(37, 7, 'Widow\'s Wine', 4.49, 50),
(38, 7, 'Tombstone Soda', 2.19, 130),
(39, 7, 'Elemental Pop', 3.29, 60),
(40, 7, 'Mule Kick', 3.99, 65),
(41, 7, 'Banana Colada', 2.69, 150),
(42, 7, 'Vulture Aid', 3.69, 90),
(43, 7, 'Electric Cherry', 2.49, 110),
(44, 7, 'Bloodhound Brew', 3.59, 75),
(45, 7, 'Overkill Energy', 2.99, 140),
(46, 7, 'Ghost Cola', 3.49, 100),
(47, 7, 'Sniper\'s Shot', 4.09, 80),
(48, 7, 'Zombie Zapper', 3.89, 60),
(49, 7, 'Marine Boost', 2.29, 200),
(50, 7, 'Steady Aim Shake', 3.79, 50),
(51, 7, 'Commando Cola', 3.19, 90),
(52, 7, 'Perk-A-Punch', 4.49, 40),
(53, 7, 'Shield Smash', 3.69, 70),
(54, 7, 'Riot Reviver', 3.29, 150),
(55, 7, 'Dragon\'s Breath Soda', 4.29, 40),
(56, 7, 'Inferno Energy', 2.99, 180),
(57, 7, 'Mystic Brew', 3.89, 90),
(58, 7, 'Tactical Tonic', 3.49, 70),
(59, 7, 'Urban Reload', 3.19, 80);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `guests` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `email`, `date`, `time`, `guests`, `created_at`) VALUES
(12, 4, 'wilcovanboncen@gmail.com', '2025-03-31', '17:30:00', 3, '2025-03-31 09:33:47'),
(13, 4, 'wilcovanboncen@gmail.com', '2025-03-31', '17:30:00', 3, '2025-03-31 09:44:06'),
(14, 4, 'wilcovanboncen@gmail.com', '2025-04-09', '18:30:00', 3, '2025-04-09 10:07:10'),
(15, 4, 'wilcovanboncen@gmail.com', '2025-04-09', '18:30:00', 3, '2025-04-09 10:07:35');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','guest','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'asdfasdfa', '$2y$10$hrlstytuARiqFwrxq6/KV.cE7q1JylwySPtcZPbpkJeBKTg67FMy6', 'user', '2025-03-19 09:58:48'),
(2, 'wilcovanboven', '$2y$10$2FEiIH9gt4nGv1Fx8LA0ceIvO1mcJFInrVDyXIaqAIFXZjxhNO9GK', 'user', '2025-03-19 10:04:24'),
(4, 'admin', '$2y$10$r3p0.Krdi6QAsej0XekMSOLpUol8yNhSN5/i.U.EEwqwotxHvPdmq', 'admin', '2025-03-24 09:57:50'),
(5, 'asdfasdf', '$2y$10$DxNMjCTN9pM0dYGddJ0aoePmCgaTuh.GTIV/cobu0Ise9vpvDzw9q', 'user', '2025-03-24 10:30:26'),
(7, 'test', '$2y$10$24pdErRs/LK5EAOYn8L4z.CZEsjnYTrrskRDyzlVRA5ZuslXpMIWK', 'user', '2025-03-24 10:54:28'),
(8, 'tadlen', '$2y$10$QJfTbWuBRu4CxHVwyEiMB.3y9E3lhLs9EWv9XciTDUjJ.wJWa.0AK', 'user', '2025-04-07 09:15:33');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
