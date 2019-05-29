-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 29 mai 2019 à 18:43
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
CREATE TABLE IF NOT EXISTS `demandes` (
  `idDem` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(200) NOT NULL,
  `contenu` text NOT NULL,
  `dateCreation` date NOT NULL,
  `dateExpiration` date NOT NULL,
  `mailEtu` varchar(100) NOT NULL,
  `mailProf` varchar(100) NOT NULL,
  `status` enum('Modifier','Valide','Envoyee','EnCours','Archive') NOT NULL,
  PRIMARY KEY (`idDem`),
  KEY `mailEtu` (`mailEtu`),
  KEY `mailProf` (`mailProf`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`idDem`, `sujet`, `contenu`, `dateCreation`, `dateExpiration`, `mailEtu`, `mailProf`, `status`) VALUES
(4, 'Travail bdd', 'bdd', '2019-05-29', '2019-06-05', 'etu@etu.etu', 'prof@prof.prof', 'Valide'),
(5, 'Edited', 'Better like that', '2019-05-29', '2019-06-05', 'etu@etu.etu', 'prof@prof.prof', 'EnCours'),
(6, 'Preuve modification 2', 'Preuve de fonctionnement', '2019-05-29', '2019-05-30', 'etu@etu.etu', 'prof@prof.prof', 'Archive');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `mail` varchar(100) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `password` varchar(70) NOT NULL,
  `travail` enum('Etudiant','Professeur','Service Technique','') NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`mail`, `nom`, `password`, `travail`) VALUES
('etu@etu.etu', 'etu', 'ca3bbd5c1fe06bd6ca97927a6b7b2a7cd1081f42367ffad446e88de80db016a3', 'Etudiant'),
('prof@prof.prof', 'prof', '51d1e6a398acbda7e15b687de747e7dfe95fa13154dcb40aa8ab37f1e2b393a0', 'Professeur'),
('st@st.st', 'st', '56af4bde70a47ae7d0f1ebb30e45ed336165d5c9ec00ba9a92311e33a4256d74', 'Service Technique');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`mailEtu`) REFERENCES `user` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `demandes_ibfk_2` FOREIGN KEY (`mailProf`) REFERENCES `user` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
