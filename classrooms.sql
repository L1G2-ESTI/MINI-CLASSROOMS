-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 02 nov. 2021 à 16:26
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `classrooms`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom_admin` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_admin` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

DROP TABLE IF EXISTS `commenter`;
CREATE TABLE IF NOT EXISTS `commenter` (
  `num_matr` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pub` int(11) NOT NULL,
  `id_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`num_matr`,`id_pub`,`id_prof`),
  KEY `commenter_Publication0_FK` (`id_pub`),
  KEY `commenter_Professseur1_FK` (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

DROP TABLE IF EXISTS `devoir`;
CREATE TABLE IF NOT EXISTS `devoir` (
  `id_dev` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_dev` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_rem` time NOT NULL,
  `num_matr` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_dev`),
  KEY `devoir_Etudiant_FK` (`num_matr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `emploie_du_temps`
--

DROP TABLE IF EXISTS `emploie_du_temps`;
CREATE TABLE IF NOT EXISTS `emploie_du_temps` (
  `id_edp` int(11) NOT NULL AUTO_INCREMENT,
  `date_cours` date NOT NULL,
  `heure_db_cours` time NOT NULL,
  `heure_fin_cours` time NOT NULL,
  `dispo` tinyint(1) NOT NULL,
  `num_classe` int(11) NOT NULL,
  PRIMARY KEY (`id_edp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `num_matr` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_etud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_etud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Niveau` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_etud` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_etud` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`num_matr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`num_matr`, `nom_etud`, `pre_etud`, `Niveau`, `sexe`, `mail_etud`, `mdp_etud`) VALUES
('001', 'RAKOTOARISOA', 'Louis Sergio ', 'L1', 'M', 'sergio@gmail.com', '6ed32edf4e92ab3c0a4dc6f90242953c344051ad'),
('002', 'RAKOTOARINAIVO', 'Diamondra', 'L1', 'M', 'dama@gmail.com', '9c64dc6c5c5f3786a666a6bff7275b72db06b1a4'),
('003', 'DOMINICK', 'Gregoire', 'L1', 'M', 'dominick@gmail.com', 'dominick2021');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `cod_mat` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_mat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `id_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_mat`),
  UNIQUE KEY `Modules_AK` (`id_module`),
  KEY `Modules_Professseur_FK` (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professseur`
--

DROP TABLE IF EXISTS `professseur`;
CREATE TABLE IF NOT EXISTS `professseur` (
  `id_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_prof` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_prof` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_prof` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_prof` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe_prof` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_pub` int(11) NOT NULL AUTO_INCREMENT,
  `heure_pub` time NOT NULL,
  `objet_pub` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `Publication_Professseur_FK` (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `commenter_Etudiant_FK` FOREIGN KEY (`num_matr`) REFERENCES `etudiant` (`num_matr`),
  ADD CONSTRAINT `commenter_Professseur1_FK` FOREIGN KEY (`id_prof`) REFERENCES `professseur` (`id_prof`),
  ADD CONSTRAINT `commenter_Publication0_FK` FOREIGN KEY (`id_pub`) REFERENCES `publication` (`id_pub`);

--
-- Contraintes pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `devoir_Etudiant_FK` FOREIGN KEY (`num_matr`) REFERENCES `etudiant` (`num_matr`);

--
-- Contraintes pour la table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `Modules_Professseur_FK` FOREIGN KEY (`id_prof`) REFERENCES `professseur` (`id_prof`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `Publication_Professseur_FK` FOREIGN KEY (`id_prof`) REFERENCES `professseur` (`id_prof`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
