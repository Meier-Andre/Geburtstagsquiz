-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 03. Nov 2016 um 14:13
-- Server-Version: 5.6.24
-- PHP-Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `quiz`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Antworten`
--

CREATE TABLE IF NOT EXISTS `Antworten` (
  `ID` int(5) NOT NULL,
  `F_ID` int(5) NOT NULL,
  `U_ID` int(5) NOT NULL,
  `Antwort` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Antworten`
--

INSERT INTO `Antworten` (`ID`, `F_ID`, `U_ID`, `Antwort`) VALUES
(73, 2, 0, 'A');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Fragen`
--

CREATE TABLE IF NOT EXISTS `Fragen` (
  `ID` int(5) NOT NULL,
  `Frage` varchar(1000) NOT NULL,
  `A` varchar(255) NOT NULL,
  `B` varchar(255) NOT NULL,
  `C` varchar(255) NOT NULL,
  `D` varchar(255) NOT NULL,
  `Antwort` varchar(100) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Fragen`
--

INSERT INTO `Fragen` (`ID`, `Frage`, `A`, `B`, `C`, `D`, `Antwort`, `Active`) VALUES
(1, 'Wie wird das Wetter heut?\r\n', 'Regen', 'Schnee\r\n', 'Sonne', 'Wolken', 'C', 0),
(2, 'Bla Bla', 'A', 'B ', 'C', 'D', 'A', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `ID` int(5) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `User`
--

INSERT INTO `User` (`ID`, `Name`) VALUES
(2, 'Ben'),
(4, 'Andre'),
(9, 'Andre'),
(10, 'Andre'),
(11, 'Andre'),
(12, 'Andre'),
(13, 'Andre'),
(14, 'Andre');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Antworten`
--
ALTER TABLE `Antworten`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `Fragen`
--
ALTER TABLE `Fragen`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Antworten`
--
ALTER TABLE `Antworten`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT für Tabelle `Fragen`
--
ALTER TABLE `Fragen`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
