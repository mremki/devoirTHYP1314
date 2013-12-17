-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 17 Décembre 2013 à 16:12
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `etunote`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `exercices` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `note`, `exercices`) VALUES
(1, 'Mehdi', 'Salim', '15', 'Math'),
(2, 'Himeur', 'Katia', '12', 'Science'),
(3, 'Moustakbal ', 'Jihane', '14', 'Francais'),
(4, 'El', 'Frihmat', '18', 'AN'),
(5, 'Boumarsel', 'Firdaous', '18', 'Math'),
(6, 'SAID', 'Maroua', '18', 'Math'),
(7, 'CAM00050', 'vide', '18', 'Math'),
(8, 'Chttou', 'Soukaina', '18', 'Math'),
(9, 'Billel', 'REMKI', '18', 'Math'),
(10, 'Ghandri', 'Naoufel', '18', 'Math'),
(11, 'Bouchentouf', 'Abdelhafid', '18', 'Math'),
(12, 'CAM00056', 'vide', '18', 'Art'),
(13, 'Géralodin', 'RANDRIAMBOLOLON', '18', 'Math'),
(14, 'Ouhsine', 'Souhail', '18', 'Math'),
(15, 'CAM00060', 'vide', '18', 'Anglais'),
(16, 'CAM00063[1]', 'vide', '18', 'Math'),
(17, 'CAM00064[1]', 'vide', '18', 'Math'),
(18, 'JEBALI', 'Souhail', '18', 'Math'),
(19, 'Khamkham', 'AAAA', '20', 'Math'),
(20, 'cxvcx', 'FEDRE', 'FDEGERG', 'GFHGRG'),
(21, 'dsds', 'dsfdf', 'gfdfd²', 'fdgd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
