-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 12 mai 2026 à 15:58
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `planify`
--

-- --------------------------------------------------------

--
-- Structure de la table `echantillon`
--

DROP TABLE IF EXISTS `echantillon`;
CREATE TABLE IF NOT EXISTS `echantillon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` enum('BLOOD','URINE','TISSUE','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` enum('STAT','URGENT','ROUTINE','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `analysisTimes` int NOT NULL,
  `arrivalTime` timestamp NOT NULL,
  `patientId` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `echantillon`
--

INSERT INTO `echantillon` (`id`, `type`, `priority`, `analysisTimes`, `arrivalTime`, `patientId`) VALUES
(1, 'BLOOD', 'STAT', 45, '2026-05-11 09:19:25', 1),
(2, 'URINE', 'URGENT', 45, '2026-05-11 13:21:04', 2),
(3, 'TISSUE', 'ROUTINE', 50, '2026-05-11 13:21:04', 3),
(4, 'BLOOD', 'ROUTINE', 55, '2026-05-11 13:21:04', 4),
(5, 'BLOOD', 'STAT', 60, '2026-05-11 13:21:04', 5),
(6, 'URINE', 'URGENT', 30, '2026-05-11 13:21:04', 6),
(7, 'BLOOD', 'STAT', 15, '2026-05-11 13:21:04', 7),
(8, 'URINE', 'URGENT', 35, '2026-05-11 13:21:04', 8),
(9, 'URINE', 'STAT', 15, '2026-05-11 13:21:04', 9),
(10, 'TISSUE', 'ROUTINE', 45, '2026-05-11 13:21:04', 10);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
CREATE TABLE IF NOT EXISTS `equipement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('BLOOD','URINE','TISSUE','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `avaible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id`, `name`, `type`, `avaible`) VALUES
(1, 'BLOOD MACHINE\r\n', 'BLOOD', 1),
(6, 'TISSUE MACHINE', 'TISSUE', 1),
(5, 'URINE MACHINE', 'URINE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `metriques`
--

DROP TABLE IF EXISTS `metriques`;
CREATE TABLE IF NOT EXISTS `metriques` (
  `totalTime` int NOT NULL,
  `efficiency` int NOT NULL,
  `conflics` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `SampleId` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technicianId` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipmentId` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `priority` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality` enum('BLOOD','URINE','TISSUE','GENERAL') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startTime` int DEFAULT NULL,
  `endTime` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`id`, `name`, `speciality`, `startTime`, `endTime`) VALUES
(1, 'Lola', 'BLOOD', 9, 18),
(2, 'Mario', 'URINE', 9, 18),
(3, 'Luigi', 'TISSUE', 9, 18),
(4, 'Yoshi', 'GENERAL', 9, 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
