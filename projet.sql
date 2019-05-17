-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 mai 2019 à 13:39
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

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
  `contenu` text NOT NULL,
  `mailEtu` varchar(100) NOT NULL,
  `mailProf` varchar(100) NOT NULL,
  `status` enum('Modifier','Valide','Envoyee','EnCours') NOT NULL,
  PRIMARY KEY (`idDem`),
  KEY `mailEtu` (`mailEtu`),
  KEY `mailProf` (`mailProf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `mail` varchar(100) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `travail` enum('Etudiant','Professeur','Service Technique','') NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`mail`, `nom`, `travail`) VALUES
('akzubfiuaebfioiabzo@jabfbzai.a', 'pefpaszf', 'Professeur'),
('azuge@kzajn.ozin', 'cfiazbi', 'Service Technique'),
('rob@a.b', 'lala', 'Etudiant'),
('rof@ka.c', 'azf', 'Etudiant'),
('test@robidiot.con', 'nom', 'Etudiant'),
('tt@t.t', 't', 'Etudiant');

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
