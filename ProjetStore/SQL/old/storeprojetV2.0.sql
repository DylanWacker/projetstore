-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 04 Juillet 2016 à 13:16
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
  `Nom` varchar(75) NOT NULL,
  `Prenom` varchar(75) NOT NULL,
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

INSERT INTO `client` (`IdClient`, `Nom`, `Prenom`, `Pseudo`, `MotDePasse`, `Adresse`, `Telephone`, `Email`) VALUES
(1, 'Test', 'Test', 'Dylan', '81dc9bdb52d04dc20036dbd8313ed055', 'asdasdad', 'asdasd', 'asdasdasd');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `IdCommande` int(11) NOT NULL AUTO_INCREMENT,
  `PrixTotal` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `IdClient` int(11) NOT NULL,
  PRIMARY KEY (`IdCommande`),
  KEY `IdClient` (`IdClient`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`IdCommande`, `PrixTotal`, `Date`, `IdClient`) VALUES
(1, 300, '2016-07-05 06:14:13', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandestore`
--

CREATE TABLE IF NOT EXISTS `commandestore` (
  `IdCommande` int(11) NOT NULL,
  `IdStore` int(11) NOT NULL,
  KEY `IdCommande` (`IdCommande`,`IdStore`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commandestore`
--

INSERT INTO `commandestore` (`IdCommande`, `IdStore`) VALUES
(1, 1),
(1, 2);

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
-- Structure de la table `couleurstore`
--

CREATE TABLE IF NOT EXISTS `couleurstore` (
  `IdStore` int(11) NOT NULL,
  `IdCouleur` int(11) NOT NULL,
  KEY `IdStore` (`IdStore`,`IdCouleur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `couleurstore`
--

INSERT INTO `couleurstore` (`IdStore`, `IdCouleur`) VALUES
(1, 2),
(1, 6),
(2, 3),
(2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `IdStore` int(11) NOT NULL AUTO_INCREMENT,
  `NomStore` varchar(75) NOT NULL,
  `PrixStore` int(11) NOT NULL,
  `PoidStore` int(11) NOT NULL,
  `IdTypeCommande` int(11) NOT NULL,
  `IdType` int(11) NOT NULL,
  PRIMARY KEY (`IdStore`),
  KEY `IdType` (`IdType`),
  KEY `IdTypeCommande` (`IdTypeCommande`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `store`
--

INSERT INTO `store` (`IdStore`, `NomStore`, `PrixStore`, `PoidStore`, `IdTypeCommande`, `IdType`) VALUES
(1, 'store ultime', 200, 10, 1, 1),
(2, 'twix Store', 100, 200, 2, 1);

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
