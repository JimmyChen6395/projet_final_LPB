-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 24 juin 2021 à 19:22
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `magasin_tech`
--

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `basketId` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`basketId`),
  KEY `FK_CONCERNE_USER` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int NOT NULL AUTO_INCREMENT,
  `typeProduct` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`categoryId`, `typeProduct`) VALUES
(1, 'pc portable'),
(2, 'ordinateur de bureau'),
(3, 'pc gaming'),
(4, NULL),
(5, 'test 3'),
(6, 'ok ca marche'),
(7, 'Est ce que ca fonctionne tjs ?'),
(8, 'test5'),
(9, 'test6');

-- --------------------------------------------------------

--
-- Structure de la table `fichetechnique`
--

DROP TABLE IF EXISTS `fichetechnique`;
CREATE TABLE IF NOT EXISTS `fichetechnique` (
  `ficheId` int NOT NULL AUTO_INCREMENT,
  `productId` int DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  `tailleMemoire` int DEFAULT NULL,
  `processeur` varchar(100) DEFAULT NULL,
  `processeurFab` varchar(100) DEFAULT NULL,
  `resolutionEcran` varchar(100) DEFAULT NULL,
  `tailleEcran` varchar(50) DEFAULT NULL,
  `carteGraphique` varchar(100) DEFAULT NULL,
  `typeHdd` varchar(20) DEFAULT NULL,
  `tailleHdd` int DEFAULT NULL,
  `poids` decimal(10,0) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ficheId`),
  KEY `FK_CONCERNE_PRODUIT` (`productId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(300) NOT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  `description` text,
  `categoryID` int DEFAULT NULL,
  `onTop` bit(1) DEFAULT NULL,
  PRIMARY KEY (`productId`),
  KEY `FK_APPARTIENT_A` (`categoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `productlist`
--

DROP TABLE IF EXISTS `productlist`;
CREATE TABLE IF NOT EXISTS `productlist` (
  `productId` int DEFAULT NULL,
  `basketId` int DEFAULT NULL,
  KEY `FK_REFERENCE_PRODUIT` (`productId`),
  KEY `FK_APPARTIEN_PANIER` (`basketId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int NOT NULL AUTO_INCREMENT,
  `roleName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`roleId`, `roleName`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `ban` varchar(50) DEFAULT NULL,
  `roleId` int DEFAULT '2',
  PRIMARY KEY (`userId`),
  KEY `FK_ROLE_DEFINI` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `login`, `email`, `password`, `ban`, `roleId`) VALUES
(9, 'nouveau', '11ED2wiC5nao2', 'hello@dsfsqff.com', NULL, 2),
(5, 'Jimmy6395', 'hello@fdsgsdfsfsdf.com', '166E.ZqfinEAs', '167333628', 1),
(6, 'la', 'jim@sqdq.com', '144G1sC70NXrM', '1418382217', 2),
(7, 'test3', '', '20D3nU/OhwMU.', '2045872386', 2),
(8, 'Jimmychen6395', 'jimmychen6395@gmail.com', '82UE/5mb/OF3E', '82030167', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
