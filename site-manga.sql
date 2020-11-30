-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 30 nov. 2020 à 01:08
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site-manga`
--

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

DROP TABLE IF EXISTS `manga`;
CREATE TABLE IF NOT EXISTS `manga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `nombreChapitre` int(11) NOT NULL,
  `green` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `manga`
--

INSERT INTO `manga` (`id`, `nom`, `libelle`, `nombreChapitre`, `green`) VALUES
(1, 'one-piece', 'One Piece', 997, 1),
(2, 'kingdom', 'Kingdom', 662, 1),
(3, 'batuque', 'Batuque', 23, 0),
(4, 'shangri-la-frontier', 'Shangri La Frontier', 19, 0),
(5, 'ron-kamonohashi', 'Ron Kamonohashi', 6, 0),
(6, 'my-hero-academia', 'My Hero Academia', 293, 1),
(7, 'vinland-saga', 'Vinland Saga', 177, 1),
(8, 'berserk', 'Berserk', 362, 0),
(9, 'dr-stone', 'Dr Stone', 175, 1),
(10, 'chainsaw-man', 'Chainsaw-Man', 94, 1),
(11, 'black-clover', 'Black Clover', 273, 1),
(12, 'bokura-no-ketsumei', 'Bokura no Ketsumei', 11, 0),
(13, 'dai-dark', 'Dai Dark', 15, 0),
(14, 'the-fable', 'The Fable', 69, 0),
(15, 'bouncer', 'Bouncer', 61, 0),
(16, 'begin', 'Begin', 41, 0),
(17, 'solo-leveling', 'Solo Leveling', 128, 1),
(18, 'kaiju-no-8', 'Kaiju no 8', 18, 1),
(19, 'blue-lock', 'Blue Lock', 109, 1),
(20, 'jujutsu-kaisen', 'Jujutsu Kaisen', 130, 1),
(21, 'kamen-byoutou', 'Kamen Byoutou', 5, 0),
(22, 'one-punch-man', 'One Punch Man', 135, 0),
(23, 'shingeki-no-kyojin', 'Shingeki no Kyojin', 134, 0),
(24, 'two-crowns', 'Two Crowns', 3, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
