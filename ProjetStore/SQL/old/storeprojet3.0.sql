-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Juillet 2016 à 20:02
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

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
  `Npa` varchar(75) NOT NULL,
  `Ville` varchar(75) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Statut` enum('Administrateur','Utilisateur') NOT NULL,
  `DateInscription` datetime NOT NULL,
  `Remember_token` varchar(255) NOT NULL,
  `Reset_token` varchar(255) NOT NULL,
  `Reset_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IdClient`, `Nom`, `Prenom`, `Pseudo`, `MotDePasse`, `Adresse`, `Npa`, `Ville`, `Telephone`, `Email`, `Statut`, `DateInscription`, `Remember_token`, `Reset_token`, `Reset_at`) VALUES
(1, 'Test', 'Test', 'Dylan', '81dc9bdb52d04dc20036dbd8313ed055', 'asdasdad', '', '', 'asdasd', 'dylan.carlu@gmail.com', 'Administrateur', '0000-00-00 00:00:00', '', 'GzGZyMtwKSqMvq9IZid9P0dzOkduSwStmRXX2R7T5UdokuqBeQRx8aTtQJ21', '2016-07-13 18:38:30'),
(6, 'Carluccio', 'Dylan', 'dylan555', '81dc9bdb52d04dc20036dbd8313ed055', '12 rue Oscar-Bider', '1220', 'Geneve', '0766931891', 'dylan.carluccio@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', 'Pb00VYWhD7BWkZ64aMDvqDAGzRwRaqCoWXCUCAHLIECQ8kCXegF6ee7NMikT', '2016-07-07 20:33:34'),
(7, 'Token', 'Token', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Token', 'Token', 'Token', 'Token', 'Token@Token.bom', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(8, 'Paulo', 'Garcia', 'Paulo', '81dc9bdb52d04dc20036dbd8313ed055', 'Garcia', 'Garcia', 'Garcia', 'Garcia', 'Garcia@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(9, 'strzs', 'srtzsre', 'tzs', '81dc9bdb52d04dc20036dbd8313ed055', 'srtzswrte', 'strezs', 'ztsrzsretz', 'sgfh', 'strzsrt@hdfl.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(10, 'fydfgyfd', 'ygfdgyd', 'yfdgy', '81dc9bdb52d04dc20036dbd8313ed055', 'gyfdgyfd', 'fd<ysf', 'sfg', '4351q2', 'sfg@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(11, 'yfdg', 'yfdg', 'yfdg', '81dc9bdb52d04dc20036dbd8313ed055', 'gyfdgyfd', 'fd<ysf', 'sfg', '4351q2', 'sfg@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(12, 'Carluccio', 'Dylan', 'dylan55f', '81dc9bdb52d04dc20036dbd8313ed055', '12 rue Oscar-Bider', 'ff', 'Les Avanchets', '0766931891', 'dylan.carluccio@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(13, 'fsdgd', 'sdfg', 'dgfhdfg', '17ae171e9ba67b7472519545c39363e0', 'dsf', 'gfsd', 'gdsf', 'sfg', 'dylan.carluccio@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(14, 'str', 'dsrt', 'SS', 'a2e4822a98337283e39f7b60acf85ec9', 'rtd', 'z', 'f', 'z', 'tr@gdf.vd', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(15, 'adsfs', 'adsfs', 'adsfsadsfs', '4b8884ba6083ce54cd255c3d40edaa89', 'adsfads', 'adsfas', 'asdfasd', 'asdfsad', 'adsfs@adsfs.vdf', 'Utilisateur', '2016-07-13 19:12:21', '', '', NULL),
(16, 'adsfs', 'adsfs', 'gyfdgysdfgsd', '81dc9bdb52d04dc20036dbd8313ed055', 'adsfads', 'adsfas', 'asdfasd', 'asdfsad', 'adsfs@adsfs.vdf', 'Utilisateur', '2016-07-13 19:14:20', '', '', NULL);

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
  `PrixCouleur` float NOT NULL,
  PRIMARY KEY (`IdCouleur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` (`IdCouleur`, `NomCouleur`, `PrixCouleur`) VALUES
(1, 'gris', 1),
(2, 'vert', 1),
(3, 'rouge', 1),
(4, 'Jaune', 1),
(5, 'Bleu Pétrole', 2),
(6, 'Métal', 10),
(7, 'Bois', 5),
(8, 'Or', 100);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typestore`
--

INSERT INTO `typestore` (`IdType`, `NomType`) VALUES
(1, 'Store Exterieur'),
(2, 'Store Intérieur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
