-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Juillet 2016 à 18:27
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `storeprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `IdStore` int(11) NOT NULL AUTO_INCREMENT,
  `NomStore` varchar(75) NOT NULL,
  `PrixStore` float NOT NULL,
  `PoidStore` int(11) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `IdTypeCommande` int(11) NOT NULL,
  `IdType` int(11) NOT NULL,
  PRIMARY KEY (`IdStore`),
  KEY `IdType` (`IdType`),
  KEY `IdTypeCommande` (`IdTypeCommande`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `store`
--

INSERT INTO `store` (`IdStore`, `NomStore`, `PrixStore`, `PoidStore`, `Photo`, `IdTypeCommande`, `IdType`) VALUES
(1, 'store ultime', 200, 10, 'Store1.jpg', 1, 1),
(2, 'twix Store', 100, 200, 'Store2.jpg', 2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
