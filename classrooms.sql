-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.4-MariaDB - Arch Linux
-- SE du serveur:                Linux
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour CLASSROOMS
DROP DATABASE IF EXISTS `CLASSROOMS`;
CREATE DATABASE IF NOT EXISTS `CLASSROOMS` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `CLASSROOMS`;

-- Listage de la structure de la table CLASSROOMS. administrateur
DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom_admin` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_admin` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_admin` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdp_admin` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table CLASSROOMS.administrateur : ~1 rows (environ)
/*!40000 ALTER TABLE `administrateur` DISABLE KEYS */;
INSERT INTO `administrateur` (`id_admin`, `nom_admin`, `pre_admin`, `mail_admin`, `mdp_admin`) VALUES
	(1, 'RAKOTO', 'Xavier', 'xavier@gmail.com', '402f589227669e58c0fcbd6e310f6c7ed68d95c7');
/*!40000 ALTER TABLE `administrateur` ENABLE KEYS */;

-- Listage de la structure de la table CLASSROOMS. commenter
DROP TABLE IF EXISTS `commenter`;
CREATE TABLE IF NOT EXISTS `commenter` (
  `num_matr` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pub` int(11) NOT NULL,
  `id_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`num_matr`,`id_pub`,`id_prof`),
  KEY `commenter_Publication0_FK` (`id_pub`),
  KEY `commenter_Professseur1_FK` (`id_prof`),
  CONSTRAINT `commenter_Etudiant_FK` FOREIGN KEY (`num_matr`) REFERENCES `Etudiant` (`num_matr`),
  CONSTRAINT `commenter_Professseur1_FK` FOREIGN KEY (`id_prof`) REFERENCES `Professseur` (`id_prof`),
  CONSTRAINT `commenter_Publication0_FK` FOREIGN KEY (`id_pub`) REFERENCES `Publication` (`id_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table CLASSROOMS.commenter : ~0 rows (environ)
/*!40000 ALTER TABLE `commenter` DISABLE KEYS */;
/*!40000 ALTER TABLE `commenter` ENABLE KEYS */;

-- Listage de la structure de la table CLASSROOMS. devoir
DROP TABLE IF EXISTS `devoir`;
CREATE TABLE IF NOT EXISTS `devoir` (
  `id_dev` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_dev` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_rem` time NOT NULL,
  `num_matr` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_dev`),
  KEY `devoir_Etudiant_FK` (`num_matr`),
  CONSTRAINT `devoir_Etudiant_FK` FOREIGN KEY (`num_matr`) REFERENCES `Etudiant` (`num_matr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table CLASSROOMS.devoir : ~0 rows (environ)
/*!40000 ALTER TABLE `devoir` DISABLE KEYS */;
/*!40000 ALTER TABLE `devoir` ENABLE KEYS */;

-- Listage de la structure de la table CLASSROOMS. emploie_du_temps
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

-- Listage des données de la table CLASSROOMS.emploie_du_temps : ~0 rows (environ)
/*!40000 ALTER TABLE `emploie_du_temps` DISABLE KEYS */;
/*!40000 ALTER TABLE `emploie_du_temps` ENABLE KEYS */;

-- Listage de la structure de la table CLASSROOMS. Etudiant
DROP TABLE IF EXISTS `Etudiant`;
CREATE TABLE IF NOT EXISTS `Etudiant` (
  `num_matr` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_etud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_etud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Niveau` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_etud` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_etud` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkdin` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`num_matr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table CLASSROOMS.Etudiant : ~5 rows (environ)
/*!40000 ALTER TABLE `Etudiant` DISABLE KEYS */;
INSERT INTO `Etudiant` (`num_matr`, `nom_etud`, `pre_etud`, `Niveau`, `sexe`, `photo`, `mail_etud`, `mdp_etud`, `adresse`, `linkdin`) VALUES
	('002', 'RAKOTOARINAIVO', 'Diamondra', 'L1', 'M', 'assets/img/sary/sergio.JPG', 'dama@gmail.com', '9c64dc6c5c5f3786a666a6bff7275b72db06b1a4', 'Amboditsiry', NULL),
	('004', 'RASOAKETAKA', 'Marcellin', 'L1', 'M', NULL, 'marcellin@gmail.com', 'c5f38c6788b79ea4413a22950bab590253846a9e', NULL, NULL),
	('005', 'MAMIKASINA', 'Arielle', 'L1', 'F', NULL, 'arielle@gmail.com', 'c22768522d8ec9453dc278ffa0387cce8dbbafea', NULL, NULL),
	('006', 'RAKOTO', 'Grégoire', 'L1', 'M', NULL, 'rasoaketaka@gmail.com', '454875b48e096aa6a73b678802af3e6379e781dc', NULL, NULL),
	('007', 'RANDRIAVAO', 'Mario', 'L1', 'M', NULL, 'mario@gmail.com', 'addb47291ee169f330801ce73520b96f2eaf20ea', NULL, NULL);
/*!40000 ALTER TABLE `Etudiant` ENABLE KEYS */;

-- Listage de la structure de la table CLASSROOMS. Modules
DROP TABLE IF EXISTS `Modules`;
CREATE TABLE IF NOT EXISTS `Modules` (
  `cod_mat` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_mat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `id_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cod_mat`),
  UNIQUE KEY `Modules_AK` (`id_module`),
  KEY `Modules_Professseur_FK` (`id_prof`),
  CONSTRAINT `Modules_Professseur_FK` FOREIGN KEY (`id_prof`) REFERENCES `Professseur` (`id_prof`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table CLASSROOMS.Modules : ~6 rows (environ)
/*!40000 ALTER TABLE `Modules` DISABLE KEYS */;
INSERT INTO `Modules` (`cod_mat`, `nom_mat`, `id_module`, `id_prof`) VALUES
	('INFO_110', 'CIRCUIT LOGIQUE', 110, 'PROF_001'),
	('INFO_140', 'LANG C', 140, 'PROF_002'),
	('INFO_150', 'BDD', 150, 'PROF_003'),
	('INFO_250', 'PYTHON', 250, 'PROF_004'),
	('INFO_253', 'WEB DYNAMIQUES', 253, 'PROF_005'),
	('INFO_300', 'FLUTTER', 300, 'PROF_006');
/*!40000 ALTER TABLE `Modules` ENABLE KEYS */;

-- Listage de la structure de la table CLASSROOMS. Professseur
DROP TABLE IF EXISTS `Professseur`;
CREATE TABLE IF NOT EXISTS `Professseur` (
  `id_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_prof` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pre_prof` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_prof` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_prof` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe_prof` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoprof` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table CLASSROOMS.Professseur : ~6 rows (environ)
/*!40000 ALTER TABLE `Professseur` DISABLE KEYS */;
INSERT INTO `Professseur` (`id_prof`, `nom_prof`, `pre_prof`, `mail_prof`, `mdp_prof`, `sexe_prof`, `photoprof`) VALUES
	('PROF_001', 'RAKOTO', 'Dina', 'dina@gmail.com', 'ed6e2ba79981a2b7a2bfe64abc4ba40b6586e391', 'M', 'assets/img/sary/sergio.JPG'),
	('PROF_002', 'RANDRIA', 'David', 'david@gmail.com', 'aa743a0aaec8f7d7a1f01442503957f4d7a2d634', 'M', 'assets/img/sary/sergio.JPG'),
	('PROF_003', 'RAMANANA', 'Cristianah', 'cristianah@gmail.com', '5397d88890220f4d089bae561df2715ba8c4550e', 'F', 'assets/img/sary/sergio.JPG'),
	('PROF_004', 'RANDIMBY', 'Honore', 'honore@gmail.com', '4d3da2ecf9f30ccd21648a4019dbb0ab8c642141', 'M', 'assets/img/sary/sergio.JPG'),
	('PROF_005', 'RAVAO', 'Martine', 'martine@gmail.com', '7617c29953aade895d95878432f5118b2ad5bb54', 'F', 'assets/img/sary/sergio.JPG'),
	('PROF_006', 'RABARY', 'Paul', 'paul@gmail.com', 'a027184a55211cd23e3f3094f1fdc728df5e0500', 'M', 'assets/img/sary/sergio.JPG');
/*!40000 ALTER TABLE `Professseur` ENABLE KEYS */;

-- Listage de la structure de la table CLASSROOMS. Publication
DROP TABLE IF EXISTS `Publication`;
CREATE TABLE IF NOT EXISTS `Publication` (
  `id_pub` int(11) NOT NULL AUTO_INCREMENT,
  `heure_pub` time NOT NULL,
  `objet_pub` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `Publication_Professseur_FK` (`id_prof`),
  CONSTRAINT `Publication_Professseur_FK` FOREIGN KEY (`id_prof`) REFERENCES `Professseur` (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table CLASSROOMS.Publication : ~0 rows (environ)
/*!40000 ALTER TABLE `Publication` DISABLE KEYS */;
/*!40000 ALTER TABLE `Publication` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
