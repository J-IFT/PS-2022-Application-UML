-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 nov. 2022 à 12:54
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `umlapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `history` int(11) NOT NULL,
  `opened` date NOT NULL,
  `state` enum('active','frozen','closed','') NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `name` varchar(300) NOT NULL,
  `biography` varchar(300) NOT NULL,
  `birthDate` date NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`name`, `biography`, `birthDate`) VALUES
('oui', 'oui', '2022-11-01');

-- --------------------------------------------------------

--
-- Structure de la table `author_book`
--

DROP TABLE IF EXISTS `author_book`;
CREATE TABLE IF NOT EXISTS `author_book` (
  `book_id` int(11) NOT NULL,
  `author_id` varchar(300) NOT NULL,
  PRIMARY KEY (`book_id`,`author_id`) USING BTREE,
  KEY `author_id` (`author_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `author_book`
--

INSERT INTO `author_book` (`book_id`, `author_id`) VALUES
(1, 'oui'),
(2, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `ISBN` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `overview` varchar(300) NOT NULL,
  `publisher` varchar(300) NOT NULL,
  `publicationDate` date NOT NULL,
  `lang` varchar(300) NOT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`ISBN`, `name`, `subject`, `overview`, `publisher`, `publicationDate`, `lang`) VALUES
(1, 'oui_1', 'oui_1', 'oui_1', 'oui1', '2022-11-02', 'ouient'),
(2, 'oui_2', 'oui_2', 'oui_2', 'oui2', '2022-11-02', 'ouients');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `author_book`
--
ALTER TABLE `author_book`
  ADD CONSTRAINT `authors` FOREIGN KEY (`author_id`) REFERENCES `author` (`name`),
  ADD CONSTRAINT `books` FOREIGN KEY (`book_id`) REFERENCES `book` (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
