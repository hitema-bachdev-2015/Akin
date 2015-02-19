-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Février 2015 à 13:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `akin`
--
CREATE DATABASE IF NOT EXISTS `akin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `akin`;

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE IF NOT EXISTS `personnages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`) VALUES
(1, 'Napoléon'),
(2, 'Georges B.'),
(3, 'PeterPan'),
(4, 'Robert');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `libelle`) VALUES
(1, 'Votre personnage, est-il vivant?'),
(2, 'Votre personnage est fictif?');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE IF NOT EXISTS `reponses` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `reponse` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`id`, `id_personnage`, `id_question`, `reponse`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 2, 1, 1),
(4, 2, 2, 0),
(5, 3, 1, 0),
(6, 3, 2, 1),
(7, 4, 1, 1),
(8, 4, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
