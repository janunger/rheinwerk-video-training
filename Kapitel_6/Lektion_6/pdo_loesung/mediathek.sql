-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 08. Aug 2016 um 18:32
-- Server-Version: 5.5.42
-- PHP-Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mediathek`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cds`
--

DROP TABLE IF EXISTS `cds`;
CREATE TABLE `cds` (
  `id` int(11) NOT NULL,
  `kuenstler_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `erscheinungsjahr` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `cds`
--

INSERT INTO `cds` (`id`, `kuenstler_id`, `name`, `erscheinungsjahr`) VALUES
(1, 1, 'Wallflower', 2015),
(2, 2, 'Wo der Pfeffer wächst', 2004),
(3, 1, 'The Girl In The Other Room', 2004);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kuenstler`
--

DROP TABLE IF EXISTS `kuenstler`;
CREATE TABLE `kuenstler` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `kuenstler`
--

INSERT INTO `kuenstler` (`id`, `name`) VALUES
(1, 'Diana Krall'),
(2, 'Wise Guys');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lieder`
--

DROP TABLE IF EXISTS `lieder`;
CREATE TABLE `lieder` (
  `id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `track` int(11) NOT NULL,
  `titel` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `lieder`
--

INSERT INTO `lieder` (`id`, `cd_id`, `track`, `titel`) VALUES
(1, 1, 1, 'California Dreamin'''),
(2, 1, 2, 'Desperado'),
(3, 1, 3, 'Superstar'),
(4, 2, 1, 'Wo der Pfeffer wächst'),
(5, 2, 2, 'Einer von den Wise Guys'),
(6, 3, 1, 'Stop This World');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuenstler_id` (`kuenstler_id`);

--
-- Indizes für die Tabelle `kuenstler`
--
ALTER TABLE `kuenstler`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `lieder`
--
ALTER TABLE `lieder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cd_id` (`cd_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cds`
--
ALTER TABLE `cds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `kuenstler`
--
ALTER TABLE `kuenstler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `lieder`
--
ALTER TABLE `lieder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cds`
--
ALTER TABLE `cds`
  ADD CONSTRAINT `cds_ibfk_1` FOREIGN KEY (`kuenstler_id`) REFERENCES `kuenstler` (`id`);

--
-- Constraints der Tabelle `lieder`
--
ALTER TABLE `lieder`
  ADD CONSTRAINT `lieder_ibfk_1` FOREIGN KEY (`cd_id`) REFERENCES `cds` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
