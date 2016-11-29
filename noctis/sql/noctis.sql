-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 28 Novembre 2016 à 16:24
-- Version du serveur :  5.7.9
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `noctis`
--

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id`, `name`) VALUES
(1, 'couvreur'),
(2, 'carreleur'),
(3, 'plombier'),
(4, 'peintre');

-- --------------------------------------------------------

--
-- Structure de la table `service_supplier`
--

DROP TABLE IF EXISTS `service_supplier`;
CREATE TABLE IF NOT EXISTS `service_supplier` (
  `professionnalId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  UNIQUE KEY `professionnalId` (`professionnalId`,`serviceId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `service_supplier`
--

INSERT INTO `service_supplier` (`professionnalId`, `serviceId`) VALUES
(2, 1),
(2, 2),
(6, 2),
(7, 1),
(8, 3),
(9, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `town` varchar(250) DEFAULT NULL,
  `postal` varchar(10) DEFAULT NULL,
  `mail` varchar(250) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `address`, `town`, `postal`, `mail`, `type`, `login`, `password`) VALUES
(1, 'dupont', 'jean', NULL, NULL, NULL, NULL, 1, 'gest', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3 '),
(2, 'smith', 'john', '1 rue Piper', 'Reims', '51100', NULL, 2, 'pro', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3 '),
(3, 'Fritz', 'Johann', NULL, NULL, NULL, NULL, 3, 'client', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3 '),
(4, 'Landru', 'Henri Désire', 'Rue de la machine', 'Paris', '75001', 'cuisinier@gmail.com', 3, 'Landru', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(5, 'nom', 'prenom', '1bis rue werlé', 'Reims', '51100', 'mail', 3, 'login', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(6, 'pro', 'pro', '3 rue Jean Jaurès', 'Reims', '51100', NULL, 2, '', ''),
(7, 'pro2', 'pro2', '4 rue du champ de mars', 'Reims', '51100', NULL, 2, '', ''),
(8, 'por3', 'pro3', '5 rue de Clovis', 'Reims', '51100', NULL, 2, '', ''),
(9, 'pro4', 'pro4', '12 rue du temple', 'Reims', '51100', NULL, 2, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_types`
--

INSERT INTO `user_types` (`id`, `label`) VALUES
(1, 'gestionnaire'),
(2, 'professionnel'),
(3, 'client');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
