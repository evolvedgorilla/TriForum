-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 07.02.2022 klo 13:01
-- Palvelimen versio: 10.1.48-MariaDB-0+deb9u2
-- PHP Version: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e1900918_triforum`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci COMMENT='Foorumi Kategoria';

-- --------------------------------------------------------

--
-- Rakenne taululle `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci COMMENT='Postaukset';

--
-- Vedos taulusta `posts`
--

INSERT INTO `posts` (`post_id`, `message`, `topic_id`, `user_id`, `name`, `created`) VALUES
(1, 'Hei kaikille!\r\nMinua kiinnostaa tietää mitä kaikkea triathloniin kuuluu? Ainakin kolmelajia sen tiedän jo triathlon nimestä :D\r\n', 1, 1, 'Mitä triathlonissa tehdään?', '2022-01-19 08:15:04'),
(2, 'Kuinka hyvän kunnon tarvitsee, että voi harrastaa triathlonia?\r\n', 1, 2, 'Kysymys kunnosta', '2022-01-19 08:19:36'),
(3, 'Mitkä on teidän mielestä parhaat triathlon kisat? Itse tykkään paljon Joroisten triathloninsta, hyvät maisemat ja hyvää porukkaa.', 1, 3, 'Triathlon paikat', '2022-01-18 11:38:23'),
(4, 'Onko kuinka vaikeaa suorittaa Ironman?', 1, 1, 'Ironman', '2022-01-25 12:59:42'),
(5, 'Miten nostan Cooper-tulosta?', 2, 1, 'Cooper', '2022-01-25 13:00:13'),
(6, 'Mistä voin ostaa polkupyörän Vaasassa?', 1, 1, 'Mistä voi ostaa pyöriä?', '2022-02-07 12:36:25'),
(7, 'Ootteko ikinä juosseet marathonia?', 2, 1, 'Marathon', '2022-02-07 12:36:56'),
(8, 'Onko triathlonissa 4 lajia?', 1, 1, 'triathlon', '2022-02-07 12:57:44'),
(9, 'Kuinka monta kertaa viikossa on hyvä juosta?', 2, 1, 'Juoksu', '2022-02-07 12:58:28');

-- --------------------------------------------------------

--
-- Rakenne taululle `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `subject` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci COMMENT='Aihe';

--
-- Vedos taulusta `topic`
--

INSERT INTO `topic` (`topic_id`, `subject`, `user_id`, `created`, `category_id`) VALUES
(1, 'Yleinen', 0, '2022-01-17 12:56:53', 0),
(2, 'Urheilu', 0, '2022-01-17 12:58:42', 0);

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci COMMENT='käyttäjät';

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `password`) VALUES
(1, 'eljefe', 'Väinö Nyström', 'nystromvaino@gmail.com', '1234'),
(2, 'elpistolero', 'Jere Zat', 'jere@gmail.com', '1234'),
(3, 'kööler', 'Joonas Köhler', 'kohler@gmail.com', '1234'),
(4, 'arska', 'Milla Nyström', 'milla@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
