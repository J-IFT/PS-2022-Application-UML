-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 18 déc. 2022 à 21:06
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

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

CREATE TABLE `account` (
  `number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `history` int(11) NOT NULL,
  `opened` date NOT NULL,
  `state` enum('active','frozen','closed','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`number`, `name`, `firstname`, `mail`, `password`, `history`, `opened`, `state`) VALUES
(1, 'gros', 'flavien', 'flaviengrs@gmail.com', '123soleil', 156, '2022-11-18', 'active'),
(4, 'pouet', 'Francis', 'bg@slt.com', 'pouet', 0, '0000-00-00', 'active');

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `biography` varchar(300) NOT NULL,
  `birthDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `name`, `biography`, `birthDate`) VALUES
(2, 'Antoine de Saint-Exupéry', 'bio', '1900-06-27');

-- --------------------------------------------------------

--
-- Structure de la table `author_book`
--

CREATE TABLE `author_book` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `author_book`
--

INSERT INTO `author_book` (`book_id`, `author_id`) VALUES
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `ISBN` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `overview` varchar(300) NOT NULL,
  `publisher` varchar(300) NOT NULL,
  `publicationDate` date NOT NULL,
  `lang` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`ISBN`, `name`, `subject`, `overview`, `publisher`, `publicationDate`, `lang`) VALUES
(5, 'Le Petit Prince', 'Conte, Jeunesse', 'Le narrateur, un pilote qui est tombé en panne d\'essence dans le Sahara, fait la connaissance d’un prince extraordinaire venant d’une autre planète.', 'Reynal & Hitchcock', '1943-01-01', '1');

-- --------------------------------------------------------

--
-- Structure de la table `bookitem`
--

CREATE TABLE `bookitem` (
  `barcode` varchar(20) NOT NULL,
  `tag` varchar(20) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  `lang` int(10) NOT NULL,
  `numberOfPages` int(11) NOT NULL,
  `format` int(11) NOT NULL,
  `borrowed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bookitem`
--

INSERT INTO `bookitem` (`barcode`, `tag`, `ISBN`, `subject`, `title`, `lang`, `numberOfPages`, `format`, `borrowed`) VALUES
('2', '2', '5', 'Conte, Jeunesse', 'Le Petit Prince', 1, 130, 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`number`);

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `author_book`
--
ALTER TABLE `author_book`
  ADD PRIMARY KEY (`book_id`,`author_id`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Index pour la table `bookitem`
--
ALTER TABLE `bookitem`
  ADD PRIMARY KEY (`barcode`,`tag`),
  ADD KEY `barcode` (`barcode`,`tag`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
