-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Août 2016 à 17:34
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
  `Numero` varchar(25) NOT NULL,
  `Npa` varchar(75) NOT NULL,
  `Localite` varchar(255) NOT NULL,
  `Ville` varchar(75) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Statut` enum('Administrateur','Utilisateur') NOT NULL,
  `DateInscription` datetime NOT NULL,
  `Remember_token` varchar(255) NOT NULL,
  `Reset_token` varchar(255) NOT NULL,
  `Reset_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IdClient`, `Nom`, `Prenom`, `Pseudo`, `MotDePasse`, `Adresse`, `Numero`, `Npa`, `Localite`, `Ville`, `Pays`, `Telephone`, `Email`, `Statut`, `DateInscription`, `Remember_token`, `Reset_token`, `Reset_at`) VALUES
(1, 'Test', 'Test', 'Dylan', '81dc9bdb52d04dc20036dbd8313ed055', 'asdasdad', '0', '', '', '', '', 'asdasd', 'dylan.carlu@gmail.com', 'Administrateur', '0000-00-00 00:00:00', '', 'GzGZyMtwKSqMvq9IZid9P0dzOkduSwStmRXX2R7T5UdokuqBeQRx8aTtQJ21', '2016-07-13 18:38:30'),
(6, 'Carluccio', 'Dylan', 'dylan555', '81dc9bdb52d04dc20036dbd8313ed055', 'rue Oscar-Bider', '12', '1220', 'Les avanchets', 'Geneve', 'Suisse', '0766931891', 'dylan.carluccio@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', 'Pb00VYWhD7BWkZ64aMDvqDAGzRwRaqCoWXCUCAHLIECQ8kCXegF6ee7NMikT', '2016-07-07 20:33:34'),
(7, 'Token', 'Token', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Token', '0', 'Token', '', 'Token', '', 'Token', 'Token@Token.bom', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(8, 'Paulo', 'Garcia', 'Paulo', '81dc9bdb52d04dc20036dbd8313ed055', 'Garcia', '0', 'Garcia', '', 'Garcia', '', 'Garcia', 'Garcia@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(9, 'strzs', 'srtzsre', 'tzs', '81dc9bdb52d04dc20036dbd8313ed055', 'srtzswrte', '0', 'strezs', '', 'ztsrzsretz', '', 'sgfh', 'strzsrt@hdfl.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(10, 'fydfgyfd', 'ygfdgyd', 'yfdgy', '81dc9bdb52d04dc20036dbd8313ed055', 'gyfdgyfd', '0', 'fd<ysf', '', 'sfg', '', '4351q2', 'sfg@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(11, 'yfdg', 'yfdg', 'yfdg', '81dc9bdb52d04dc20036dbd8313ed055', 'gyfdgyfd', '0', 'fd<ysf', '', 'sfg', '', '4351q2', 'sfg@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(12, 'Carluccio', 'Dylan', 'dylan55f', '81dc9bdb52d04dc20036dbd8313ed055', '12 rue Oscar-Bider', '0', 'ff', '', 'Les Avanchets', '', '0766931891', 'dylan.carluccio@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(13, 'fsdgd', 'sdfg', 'dgfhdfg', '17ae171e9ba67b7472519545c39363e0', 'dsf', '0', 'gfsd', '', 'gdsf', '', 'sfg', 'dylan.carluccio@gmail.com', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(14, 'str', 'dsrt', 'SS', 'a2e4822a98337283e39f7b60acf85ec9', 'rtd', '0', 'z', '', 'f', '', 'z', 'tr@gdf.vd', 'Utilisateur', '0000-00-00 00:00:00', '', '', NULL),
(15, 'adsfs', 'adsfs', 'adsfsadsfs', '4b8884ba6083ce54cd255c3d40edaa89', 'adsfads', '0', 'adsfas', '', 'asdfasd', '', 'asdfsad', 'adsfs@adsfs.vdf', 'Utilisateur', '2016-07-13 19:12:21', '', '', NULL),
(16, 'adsfs', 'adsfs', 'gyfdgysdfgsd', '81dc9bdb52d04dc20036dbd8313ed055', 'adsfads', '0', 'adsfas', '', 'asdfasd', '', 'asdfsad', 'adsfs@adsfs.vdf', 'Utilisateur', '2016-07-13 19:14:20', '', '', NULL),
(17, 'Rocoo', 'Sifredi', 'Rocoo69', '81dc9bdb52d04dc20036dbd8313ed055', 'Rue des chatte siamoise', '69', '1216', 'Cointrin', 'Geneve', 'Suisse', '0786113504', 'rocco@gmail.com', 'Utilisateur', '2016-07-18 16:54:57', '', '', NULL),
(18, 'fhgcjfg', 'fhgjfhg', 'hfcgj', '81dc9bdb52d04dc20036dbd8313ed055', 'jfhgjfhgj', '12', 'fghj', 'fghj', 'fghj', 'fgj', 'adfgd', 'sfdgd@fdlsdgf.cvo', 'Utilisateur', '2016-07-18 16:58:13', '', '', NULL);

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
-- Structure de la table `soustypestore`
--

CREATE TABLE IF NOT EXISTS `soustypestore` (
  `IdSousTypeStore` int(11) NOT NULL AUTO_INCREMENT,
  `NomSousType` varchar(50) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  PRIMARY KEY (`IdSousTypeStore`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `soustypestore`
--

INSERT INTO `soustypestore` (`IdSousTypeStore`, `NomSousType`, `Photo`) VALUES
(1, 'Store toile à bras articulés', 'SousTypeStore1.jpg'),
(2, 'Store toile à descente verticale', 'SousTypeStore2.jpg'),
(3, 'Store toile à bras latéraux', 'SousTypeStore3.jpg'),
(4, 'Store à lamelles', 'SousTypeStore4.jpg'),
(5, 'Volet roulant Eco 39', 'SousTypeStore5.jpg'),
(6, 'Volet roulant Monobloc', 'SousTypeStore6.jpg');

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
  `TailleMin` int(11) NOT NULL,
  `TailleMax` int(11) NOT NULL,
  `IdTypeCommande` int(11) NOT NULL,
  `IdType` int(11) NOT NULL,
  `IdSousType` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdStore`),
  KEY `IdType` (`IdType`),
  KEY `IdTypeCommande` (`IdTypeCommande`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `store`
--

INSERT INTO `store` (`IdStore`, `NomStore`, `PrixStore`, `PoidStore`, `Photo`, `TailleMin`, `TailleMax`, `IdTypeCommande`, `IdType`, `IdSousType`) VALUES
(1, 'Horizon', 200, 10, 'Store1.jpg', 165, 600, 1, 1, 1),
(2, 'Monaco', 100, 200, 'Store2.jpg', 165, 600, 2, 1, 1),
(3, 'Maxi Compact', 300, 200, 'Store3.jpg', 165, 600, 1, 1, 1),
(4, 'BGN', 160, 200, 'Store4.jpg', 165, 600, 2, 1, 2),
(5, 'BGNC', 200, 300, 'Store5.jpg', 165, 600, 2, 1, 2),
(6, 'BAG', 330, 200, 'Store6.jpg', 165, 600, 2, 1, 2),
(7, 'Store à lamelles 50mm', 400, 200, 'Store7.jpg', 165, 600, 1, 4, 4),
(8, 'Store à lamelles 65mm', 430, 200, 'Store8.jpg', 165, 600, 1, 4, 4),
(9, 'Store à lamelles 80mm', 450, 400, 'Store9.jpg', 165, 600, 2, 4, 4),
(10, 'AV 70', 350, 440, 'Store10.jpg', 165, 600, 1, 4, 4),
(11, 'AV 90', 450, 500, 'Store11.jpg', 165, 600, 2, 4, 4),
(12, 'Eco 39', 500, 400, 'Store12.jpg', 165, 600, 2, 4, 5),
(13, 'MonoBloc', 400, 300, 'Store13.jpg', 165, 600, 2, 4, 6),
(14, 'Parasol 1', 200, 100, 'Store14.jpg', 165, 600, 2, 3, NULL),
(15, 'Parasol 2', 250, 120, 'Store15.jpg', 165, 600, 1, 3, NULL),
(16, 'Parasol 3', 270, 150, 'Store16.jpg', 165, 600, 1, 3, NULL),
(17, 'Parasol 4', 300, 158, 'Store17.jpg', 165, 600, 1, 3, NULL),
(18, 'Parasol 5', 400, 250, 'Store18.jpg', 165, 600, 2, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typecommande`
--

CREATE TABLE IF NOT EXISTS `typecommande` (
  `IdTypeCommande` int(11) NOT NULL AUTO_INCREMENT,
  `Commande` varchar(25) NOT NULL,
  `PrixCommande` int(11) NOT NULL,
  PRIMARY KEY (`IdTypeCommande`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `typecommande`
--

INSERT INTO `typecommande` (`IdTypeCommande`, `Commande`, `PrixCommande`) VALUES
(1, 'Manuelle', 0),
(2, 'Moteur SL', 150),
(3, 'Télécommande', 200),
(4, 'Moteur VR', 300),
(5, 'Détecteur', 320),
(6, 'Récepteur', 400);

-- --------------------------------------------------------

--
-- Structure de la table `typestore`
--

CREATE TABLE IF NOT EXISTS `typestore` (
  `IdType` int(11) NOT NULL AUTO_INCREMENT,
  `NomType` varchar(100) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  PRIMARY KEY (`IdType`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `typestore`
--

INSERT INTO `typestore` (`IdType`, `NomType`, `Photo`) VALUES
(1, 'Store Exterieur en toile', 'TypeStore1.jpg'),
(2, 'Store Intérieur', 'TypeStore2.jpg'),
(3, 'Parasol', 'TypeStore3.jpg'),
(4, 'Store extérieur en alu', 'TypeStore4.jpg'),
(5, 'Moustiquaire', 'TypeStore5.jpg\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `typestoreavecsoustype`
--

CREATE TABLE IF NOT EXISTS `typestoreavecsoustype` (
  `IdType` int(11) NOT NULL,
  `IdSousType` int(11) NOT NULL,
  PRIMARY KEY (`IdType`,`IdSousType`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typestoreavecsoustype`
--

INSERT INTO `typestoreavecsoustype` (`IdType`, `IdSousType`) VALUES
(1, 1),
(1, 2),
(1, 3),
(4, 4),
(4, 5),
(4, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
