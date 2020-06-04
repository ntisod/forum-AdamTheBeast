-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 04 jun 2020 kl 14:20
-- Serverversion: 10.4.6-MariaDB
-- PHP-version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `loginsystem`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id_users` int(100) NOT NULL,
  `fullname` longtext NOT NULL,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pass` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id_users`, `fullname`, `username`, `email`, `pass`) VALUES
(1, 'adam', 'nasser', 'adamjamal22@gmail.com', '$2y$10$c2AW68TRDvZlgZWxJg.1wuyqGa7r09wVk9vNF2vOziYtXsXtWLi2u'),
(2, 'adam32', 'nasser', 'adamjamal11@gmail.com', '$2y$10$ARmuPLd1BQX8/JdWt/Pv0.EwknumbKK3PgcZYl6ebfdHxGVd/db96'),
(3, 'Adam Nasser', 'adam33', 'adamjamal800@gmail.com', '$2y$10$WTsmAGaaPBxY5KnxLtVrTu6hm6KDEhx2bZzcr4gUmpi/9l859uOaa'),
(4, 'adam34', 'adam55', 'adamjamal77@gmail.com', '$2y$10$8CNldv23WLVHJ3iXtG24xOMiJmxZBgCajYjFFUz2MBhinTl0VPRqa'),
(5, 'Adam Jamal', 'adam77', 'adam77@gmail.com', '$2y$10$RgZNF1zcDfjhYL9aGWRcU.A8iuudGZbb2nQpITtC0Tsf1vb8hldC2'),
(6, 'Adam Nasser', 'adam32', 'adamr@gmail.com', '$2y$10$UO3hAkl9tTrJT3A0I5uOH.gsuFFXGh3yTlFszZvz5gVfrrUE/tUta'),
(7, 'Adam Nasser', 'adam', 'adamjs@gmail.com', '$2y$10$jg6yGtBc1XDWk7azt9gLBOcr3Y2ZQcL052ngDmYiE.D706Vd35fFC'),
(8, 'Adam Nasser', 'adam', 'adams@gmail.com', '$2y$10$NKEB2WPEHBrXfxxUX1T8Vu4LL946MaP9BIXCyD00mHAXISD44gSmi'),
(9, 'Adam Nasser', 'adam32', 'adamjamal33@gmail.com', '$2y$10$Tin6e/xpVme4qnk8XAPG6edIuSYl8KXRWsElVa5AspnAlhScfFpY6');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
