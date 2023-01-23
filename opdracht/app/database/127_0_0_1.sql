-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 21 nov 2022 om 11:39
-- Serverversie: 5.7.31
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc-2109b`
--
CREATE DATABASE IF NOT EXISTS `mvc-2109b` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mvc-2109b`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `CapitalCity` varchar(100) NOT NULL,
  `Continent` enum('Europa','Azi&euml;','Noord-Amerika','Zuid-Amerika','Oceani&euml;','Antarctica','Afrika') NOT NULL,
  `Population` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `country`
--

INSERT INTO `country` (`Id`, `Name`, `CapitalCity`, `Continent`, `Population`) VALUES
(5, 'Belgi&euml;', 'Brussel', 'Europa', 1600000);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Instructeur`
--

DROP TABLE IF EXISTS `Instructeur`;
CREATE TABLE IF NOT EXISTS `Instructeur` (
  `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Instructeur`
--

INSERT INTO `Instructeur` (`Id`, `Email`, `Naam`) VALUES
(1, 'groen@gmail.com', 'Groen'),
(2, 'konijn@gmail.com', 'Konijn'),
(3, 'frasi@google.com', 'Frasi');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Leerling`
--

DROP TABLE IF EXISTS `Leerling`;
CREATE TABLE IF NOT EXISTS `Leerling` (
  `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Leerling`
--

INSERT INTO `Leerling` (`Id`, `Naam`) VALUES
(3, 'Konijn'),
(4, 'Slavink'),
(6, 'Otto');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Les`
--

DROP TABLE IF EXISTS `Les`;
CREATE TABLE IF NOT EXISTS `Les` (
  `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DatumTijd` datetime NOT NULL,
  `LeerlingId` smallint(5) UNSIGNED NOT NULL,
  `InstructeurId` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Les_InstructeurId_Instructeur_Id` (`InstructeurId`),
  KEY `FK_Les_LeerlingId_Leerling_Id` (`LeerlingId`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Les`
--

INSERT INTO `Les` (`Id`, `DatumTijd`, `LeerlingId`, `InstructeurId`) VALUES
(45, '2022-05-20 09:31:14', 3, 1),
(46, '2022-05-20 14:00:00', 6, 3),
(47, '2022-05-21 15:00:00', 4, 2),
(48, '2022-05-21 18:30:00', 6, 3),
(49, '2022-05-22 21:00:00', 3, 1),
(50, '2022-06-28 12:00:00', 4, 2),
(51, '2022-06-01 09:36:06', 3, 2),
(52, '2022-06-12 16:30:00', 3, 1),
(53, '2022-06-22 16:30:00', 3, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Onderwerp`
--

DROP TABLE IF EXISTS `Onderwerp`;
CREATE TABLE IF NOT EXISTS `Onderwerp` (
  `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `LesId` smallint(5) UNSIGNED NOT NULL,
  `Onderwerp` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Onderwerp_LesId` (`LesId`)
) ENGINE=InnoDB AUTO_INCREMENT=2357 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Onderwerp`
--

INSERT INTO `Onderwerp` (`Id`, `LesId`, `Onderwerp`) VALUES
(2343, 45, 'File Parkeren'),
(2344, 46, 'Achteruit rijden'),
(2345, 49, 'File parkeren'),
(2346, 49, 'Invoegen snelweg'),
(2347, 50, 'Achteruit rijden'),
(2348, 52, 'Achteruit rijden'),
(2349, 52, 'Invoegen snelweg'),
(2350, 52, 'File parkeren'),
(2356, 50, 'Test123RRA');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Opmerking`
--

DROP TABLE IF EXISTS `Opmerking`;
CREATE TABLE IF NOT EXISTS `Opmerking` (
  `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `LesId` smallint(5) UNSIGNED NOT NULL,
  `Opmerking` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Opmerking_LesId` (`LesId`)
) ENGINE=InnoDB AUTO_INCREMENT=1130 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Opmerking`
--

INSERT INTO `Opmerking` (`Id`, `LesId`, `Opmerking`) VALUES
(1123, 45, 'File parkeren kan beter'),
(1124, 46, 'Beter in de spiegel kijken'),
(1125, 49, 'Opletten op aankomend verkeer'),
(1126, 49, 'Langer doorrijden bij invoegen'),
(1127, 50, 'Langzaam aan'),
(1128, 52, 'Beter in de spiegels kijken'),
(1129, 52, 'Richtingaanwijzer aan');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Les`
--
ALTER TABLE `Les`
  ADD CONSTRAINT `FK_Les_InstructeurId_Instructeur_Id` FOREIGN KEY (`InstructeurId`) REFERENCES `Instructeur` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Les_LeerlingId_Leerling_Id` FOREIGN KEY (`LeerlingId`) REFERENCES `Leerling` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Onderwerp`
--
ALTER TABLE `Onderwerp`
  ADD CONSTRAINT `FK_Onderwerp_LesId` FOREIGN KEY (`LesId`) REFERENCES `Les` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Opmerking`
--
ALTER TABLE `Opmerking`
  ADD CONSTRAINT `FK_Opmerking_LesId` FOREIGN KEY (`LesId`) REFERENCES `Les` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
