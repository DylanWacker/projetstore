-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 01 Juillet 2016 à 12:59
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
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `IdClient` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(50) NOT NULL,
  `MotDePasse` varchar(75) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Email` varchar(75) NOT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IdClient`, `Pseudo`, `MotDePasse`, `Adresse`, `Telephone`, `Email`) VALUES
(1, 'Dylan', '81dc9bdb52d04dc20036dbd8313ed055', 'asdasdad', 'asdasd', 'asdasdasd');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE IF NOT EXISTS `couleur` (
  `IdCouleur` int(11) NOT NULL AUTO_INCREMENT,
  `NomCouleur` varchar(40) NOT NULL,
  `PrixCouleur` int(11) NOT NULL,
  PRIMARY KEY (`IdCouleur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` (`IdCouleur`, `NomCouleur`, `PrixCouleur`) VALUES
(1, 'gris', 1),
(2, 'vert', 1),
(3, 'rouge', 1),
(4, 'or', 10),
(5, 'argent', 10),
(6, 'platine', 10),
(7, 'aigue-marine', 5),
(8, 'dylan', 1000);

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `IdStore` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(75) NOT NULL,
  `PrixStore` int(11) NOT NULL,
  `Poids` int(11) NOT NULL,
  PRIMARY KEY (`IdStore`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `store`
--

INSERT INTO `store` (`IdStore`, `Nom`, `PrixStore`, `Poids`) VALUES
(1, 'store ultime', 200, 10),
(2, 'twix Store', 100, 200);

-- --------------------------------------------------------

--
-- Structure de la table `typecommande`
--

CREATE TABLE IF NOT EXISTS `typecommande` (
  `IdTypeCommande` int(11) NOT NULL AUTO_INCREMENT,
  `Commande` varchar(25) NOT NULL,
  PRIMARY KEY (`IdTypeCommande`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typecommande`
--

INSERT INTO `typecommande` (`IdTypeCommande`, `Commande`) VALUES
(1, 'Manuelle'),
(2, 'Motorisée');

-- --------------------------------------------------------

--
-- Structure de la table `typestore`
--

CREATE TABLE IF NOT EXISTS `typestore` (
  `IdType` int(11) NOT NULL AUTO_INCREMENT,
  `NomType` varchar(100) NOT NULL,
  PRIMARY KEY (`IdType`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `typestore`
--

INSERT INTO `typestore` (`IdType`, `NomType`) VALUES
(1, 'Store Exterieur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
