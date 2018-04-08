-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 08 avr. 2018 à 17:05
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `ancien_etudiant`
--

DROP TABLE IF EXISTS `ancien_etudiant`;
CREATE TABLE IF NOT EXISTS `ancien_etudiant` (
  `id_etud` int(11) NOT NULL AUTO_INCREMENT,
  `nom_etud` varchar(50) DEFAULT NULL,
  `prenom_etud` varchar(25) DEFAULT NULL,
  `mail_etud` varchar(50) DEFAULT NULL,
  `promotion_etud` year(4) DEFAULT NULL,
  `fk_id_specialite_etud` int(11) DEFAULT NULL,
  `fk_id_cursus_etud` int(10) DEFAULT NULL,
  `fk_id_moyenne_l3_etud` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_etud`),
  KEY `FK_ancien_etudiant_id_moyenne` (`fk_id_moyenne_l3_etud`),
  KEY `FK_ancien_etudiant_id_specialite` (`fk_id_specialite_etud`),
  KEY `FK_ancien_etudiant_id_cursus` (`fk_id_cursus_etud`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ancien_etudiant`
--

INSERT INTO `ancien_etudiant` (`id_etud`, `nom_etud`, `prenom_etud`, `mail_etud`, `promotion_etud`, `fk_id_specialite_etud`, `fk_id_cursus_etud`, `fk_id_moyenne_l3_etud`) VALUES
(1, 'Bonnet', 'Jonathan', 'jbonnet.contact@gmail.com', 2011, 0, 0, 2),
(2, 'Boyer', 'Benjamin', 'benjaminboyer12000@gmail.com', 2016, 0, 0, 1),
(3, 'Gamblin', 'Benjamin', 'benjamin.gamblin1@gmail.com', 2011, 0, 0, 4),
(4, 'Agez', 'Romain', 'romainagez@gmail.com', 2017, 0, 0, 3),
(5, 'Casano', 'Rémi', 'remi.casano@gmail.com ', 2010, 0, 0, 1),
(6, 'Estebe', 'Nicolas', 'nicolasestebe@hotmail.fr', 2003, 0, 0, 2),
(7, 'Cheikh', 'Younes', 'younes.cheikh@gmail.com', 2012, 0, 0, 1),
(8, 'Vincens', 'Damien', 'damien.vincens@laposte.net', 2015, 0, 0, 1),
(9, 'Belugou', 'Fabien', 'fbelugou@gmail.com', 2016, 0, 0, 3),
(10, 'Rebois', 'Guillaume', 'guillaume.rebois@orange.fr', 2015, 0, 0, 2),
(11, 'Risser-Maroix', 'Olivier', 'orissermaroix@gmail.com', 2017, 0, 0, 3),
(12, 'Jores', 'Oliver', 'gamingd@live.com', 2015, 0, 0, 1),
(13, 'Cordeau', 'Julien', 'julien.cordeau@outlook.com', 2016, 0, 0, 3),
(14, 'Lacombe', 'Julien', 'julien.lacombe.it@gmail.com', 2016, 0, 0, 3),
(15, 'Lagier', 'Eloan', 'eloanlagier@yahoo.fr', 2017, 0, 0, 1),
(16, 'Guinedor', 'Guillaume', 'guillaume.guinedor@gmail.com', 2013, 0, 0, 3),
(17, 'Gamez', 'Lucas', 'lucasgamez31@gmail.com', 2016, 0, 0, 3),
(18, 'Moreno', 'Maxime', 'maxime.moreno@orange.fr', 2017, 0, 0, 1),
(19, 'Frances', 'Benjamin', 'benjamin.frances@hotmail.fr', 2010, 0, 0, 1),
(20, 'Fuzier', 'Pauline', 'paulinefuzier@hotmail.fr', 2017, 0, 0, 2),
(21, 'Roch', 'Romain', 'roch.romain@live.fr', 2016, 0, 0, 2),
(22, 'Zhao', 'Mengzi', 'Mengzizhao@gmail.com', 2016, 0, 0, 2),
(23, 'Picardat', 'Franck', 'picardat.f.r@gmail.com', 2015, 0, 0, 2),
(24, 'Bouteilloux', 'Guillian', 'guillianbouteilloux@gmail.com', 2010, 0, 0, 2),
(25, 'Des Plas', 'Léonore', 'leonore.desplas@gmail.com', 2014, 0, 0, 3),
(26, 'Alexandre', 'Jean-Philippe', 'horfee@gmail.com', 2007, 0, 0, 1),
(27, 'Roy', 'Erwan', 'erwan.roy78@gmail.com', 2012, 0, 0, 2),
(28, 'Moeller', 'Charlotte', 'charlotte.b.moller@gmail.com', 2016, 0, 0, 2),
(29, 'Bousquet', 'Romain', '', 2007, 0, 0, 3),
(30, 'Machu', 'Kévin', 'sackboy31@live.fr', 2015, 0, 0, 1),
(31, 'Culié', 'Jean-Benoit', 'culie3@gmail.com', 2016, 0, 0, 1),
(32, 'Bernard', 'Camille', '', 2015, 0, 0, 3),
(33, 'Loup', 'Guillaume', 'guillaume.loup.pro@gmail.com', 2005, 0, 0, 2),
(34, 'Kahn', 'Tristan', 'kahn.tristan@gmail.com', 2009, 0, 0, 4),
(35, 'Antoons', 'Robin', 'robin.antoons@gmail.com', 2013, 0, 0, 1),
(36, 'Heim', 'Laura', 'laura.heim81@gmail.com', 2009, 0, 0, 1),
(37, 'Clement', 'Hugo', 'hugoc.pro@gmail.com', 2017, 0, 0, 2),
(38, 'Gachelin', 'Jérémie', 'jeremiegachelin@orange.fr', 2016, 0, 0, 1),
(39, 'Chaumeil ', 'Anais ', 'Chaumeilanais@gmail.com ', 2016, 0, 0, 2),
(40, 'Yuksel', 'Chilan-Eli', 'yuksel-eli@hotmail.fr', 2016, 0, 0, 2),
(41, 'Djemai', 'Mehdi', 'mehdietzohra@gmail.com ', 2016, 0, 0, 2),
(42, 'Maillot', 'Sylvain', 'Sylvain.maillot1@gmail.com', 2017, 0, 0, 1),
(43, 'Delorme', 'Théo', 'theodelormedu12@gmail.com', 2017, 0, 0, 1),
(44, 'Frejaville', 'Jérémy', 'jeremy.frejaville@gmail.com', 2011, 0, 0, 2),
(45, 'Martinez', 'Loic', 'loic.martinux@gmail.com', 2012, 0, 0, 2),
(46, 'Pezzetti', 'Marc', 'marc.pezzetti@gmail.com', 2005, 0, 0, 2),
(47, 'El Akroudi', 'Abdessamad', 'lsroudi@gmail.com', 2014, 0, 0, 2),
(48, 'Labbé', 'Brice', 'brice.labbe@curiositymatrix.com', 2006, 0, 0, 2),
(49, 'Vabre', 'Benoît', 'benoit.vabre@gmail.com', 2005, 0, 0, 2),
(50, 'O\'Rourke', 'Marvyn', 'marvyn81@hotmail.fr', 2017, 0, 0, 3),
(51, 'Vidal', 'Ghislain', 'ghislain.vidal1@gmail.com', 2017, 0, 0, 2),
(52, 'Fallieres', 'Nicolas', 'nicolas.fallieres@gmail.com', 2013, 0, 0, 1),
(53, 'Constans', 'Cédric ', 'cedr.constans@gmail.com', 2006, 0, 0, 2),
(55, 'Lacoste', 'Quentin', 'Lacoste.quentin31@gmail.com', 2015, 0, 0, 2),
(56, 'Sudre', 'Stéphanie ', 'stephanie.labrot81@gmail.com', 2005, 0, 0, 1),
(57, 'Ongaro-Carcy', 'Régis', 'regis.ongaro-carcy.1@ulaval.ca', 2011, 0, 0, 2),
(58, 'Bille', 'Jean-Bernard', 'jb.bille@gmail.com', 2015, 0, 0, 1),
(59, 'Escourrou', 'Adrien', 'ad.escourrou@gmail.', 2015, 0, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `a_effectue`
--

DROP TABLE IF EXISTS `a_effectue`;
CREATE TABLE IF NOT EXISTS `a_effectue` (
  `debut_formation` year(4) DEFAULT NULL,
  `fk_id_formation` int(11) NOT NULL,
  `fk_id_etud` int(11) NOT NULL,
  `fk_statut_id` int(11) NOT NULL,
  PRIMARY KEY (`fk_id_formation`,`fk_id_etud`,`fk_statut_id`),
  KEY `FK_a_effectue_id_etud` (`fk_id_etud`),
  KEY `FK_a_effectue_id_statut` (`fk_statut_id`),
  KEY `id_formation` (`fk_id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `a_effectue`
--

INSERT INTO `a_effectue` (`debut_formation`, `fk_id_formation`, `fk_id_etud`, `fk_statut_id`) VALUES
(2012, 1, 1, 3),
(2010, 1, 5, 3),
(2016, 1, 10, 5),
(2008, 1, 26, 3),
(2006, 1, 48, 4),
(2017, 2, 2, 3),
(2017, 3, 4, 1),
(2016, 3, 28, 1),
(2016, 3, 31, 2),
(2015, 4, 8, 2),
(2016, 4, 13, 5),
(2013, 4, 16, 3),
(2015, 4, 23, 2),
(2015, 4, 30, 3),
(2015, 4, 32, 3),
(2017, 4, 37, 1),
(2012, 4, 45, 4),
(2015, 4, 58, 5),
(2017, 5, 11, 1),
(2017, 7, 15, 1),
(2017, 7, 42, 1),
(2016, 8, 14, 5),
(2016, 10, 17, 1),
(2011, 10, 19, 3),
(2017, 10, 50, 1),
(2015, 10, 59, 3),
(2017, 11, 18, 1),
(2017, 11, 21, 1),
(2017, 12, 20, 1),
(2009, 12, 36, 4),
(2017, 13, 12, 5),
(2013, 13, 27, 5),
(2016, 14, 22, 1),
(2012, 16, 24, 3),
(2014, 17, 25, 3),
(2014, 18, 27, 3),
(2007, 19, 29, 3),
(2009, 20, 33, 3),
(2009, 21, 34, 3),
(2016, 22, 38, 1),
(2017, 23, 40, 1),
(2016, 23, 55, 1),
(2011, 23, 57, 3),
(2016, 24, 41, 2),
(2017, 25, 43, 1),
(2011, 26, 44, 3),
(2005, 27, 49, 3),
(2017, 28, 51, 1),
(2006, 29, 52, 3),
(2006, 30, 53, 3);

-- --------------------------------------------------------

--
-- Structure de la table `cursus`
--

DROP TABLE IF EXISTS `cursus`;
CREATE TABLE IF NOT EXISTS `cursus` (
  `id_cursus` int(10) NOT NULL,
  `lib_cursus` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cursus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cursus`
--

INSERT INTO `cursus` (`id_cursus`, `lib_cursus`) VALUES
(0, 'L1-L2-L3 à Champollion'),
(1, 'IUT Informatique + L3 champollion'),
(2, 'L2-L3 à Champollion'),
(3, 'Autre cursus');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ese` varchar(100) DEFAULT NULL,
  `adresse_ese` varchar(150) DEFAULT NULL,
  `secteur_activite_ese` varchar(150) DEFAULT NULL,
  `ville_ese` varchar(50) DEFAULT NULL,
  `code_postal_ese` varchar(25) DEFAULT NULL,
  `pays_ese` varchar(50) DEFAULT NULL,
  `fk_id_region_ese` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_entreprise`),
  KEY `FK_entreprise_id_region` (`fk_id_region_ese`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_ese`, `adresse_ese`, `secteur_activite_ese`, `ville_ese`, `code_postal_ese`, `pays_ese`, `fk_id_region_ese`) VALUES
(1, 'Continental Digital Services', '', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(2, 'Thales Communications & Security, Centre d\'Évaluation de la Sécurité des Technologies de l\'Informati', '', '', 'Labège', '31254', 'France', 'FR-OCC'),
(3, 'EURL Lughart', '', '', 'Rouffiac', '81150', 'France', 'FR-OCC'),
(4, 'Eclerage Technique International', '', '', 'Toulouse', '31100', 'France', 'FR-OCC'),
(5, 'TGW France Intralogistique', '', 'fournisseur des entrepôts automatiques', 'Blagnac', '31000', 'France', 'FR-OCC'),
(6, 'AMIO, CRP', '', '', 'Millau', '12100', 'France', 'FR-OCC'),
(7, 'VegaFrance', '', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(8, 'Apside', '', '', 'Toulouse', '31001', 'France', 'FR-OCC'),
(9, 'Sogeti High Tech', '', '', 'Toulouse', '31002', 'France', 'FR-OCC'),
(10, 'Anyware Services', '40 rue du village d entreprises', '', 'Labège', '31254', 'France', 'FR-OCC'),
(11, 'Sofyne active technologiy', '11 avenue morane saulnier', '', 'VELIZY VILLACOUBLAY', '78140', 'France', 'FR-IDF'),
(12, 'Sopra Steria', '550 rue pierre berthier', 'Services du numérique', 'Aix-en-Provence', '13100', 'France', 'FR-PAC'),
(13, 'IBM', '', '', 'Blagnac', '31700', 'France', 'FR-OCC'),
(14, 'IBM', '', '', 'Paris', '75000', 'France', 'FR-IDF'),
(15, 'Diginext', 'Les Hauts de la Duranne, 370 rue René Descartes', 'Simulation militaire', 'Aix-en-Provence', '13290', 'France', 'FR-PAC'),
(16, 'Avanade', '3 Espl. du Foncet', '', 'Issy-les-Moulineaux', '92130', 'France', 'FR-IDF'),
(17, 'CapGemini', '', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(18, 'Apside', 'Espace Jeanne d’Arc, 9, rue Matabiau', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(19, 'IUT de Laval', '', '', 'Laval', '53000', 'France', 'FR-PDL'),
(20, 'Report One', '', '', 'Terssac', '81150', 'France', 'FR-OCC'),
(21, 'I-BP', '', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(22, 'AKKA, société de services informatiques', '', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(23, 'Ceicom Solutions', '17 Rue Gaston Evrard', 'éditeur d\'ERP', 'Toulouse', '31100', 'France', 'FR-OCC'),
(24, 'Orange', '', '', 'Paris', '75000', 'France', 'FR-IDF'),
(25, 'Cube.nc', '', '', 'Nouméa', '98800', 'France', 'FR-FOM'),
(26, 'Almerys', 'rue du ressort', '', 'Clermont-ferrand', '63000', 'France', 'FR-ARA'),
(27, 'EDF, Centre de production nucléaire de Golfech', '', '', 'Valence d\'agen', '82400', 'France', 'FR-NAQ'),
(28, 'Caplaser', '', '', 'Castre', '81100', 'France', 'FR-OCC'),
(29, 'Inside group', '', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(30, 'Computational Biology Laboratory, Centre de recherche du CHU de Québec - Université Laval', '2705 boul. Laurier', 'bioinformatique', 'Québec', 'R-4773', 'Canada', 'ETR'),
(31, 'Alten', '', '', 'Labège', '31254', 'France', 'FR-OCC'),
(32, 'Labo IRIT', '', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(33, 'EuroImportMoto', '', '', 'Albi', '81000', 'France', 'FR-OCC'),
(34, 'Aéroport de Lyon', '', '', 'Lyon', '69000', 'France', 'FR-ARA'),
(35, 'Sylob S.A.', '', '', 'Albi', '81000', 'France', 'FR-OCC'),
(36, 'Alcior', '', '', 'Laval', '53000', 'France', 'FR-PDL'),
(37, 'Enozone', '', '', 'Laval', '53000', 'France', 'FR-PDL'),
(38, 'Clarte', '', '', 'Laval', '53000', 'France', 'FR-PDL'),
(39, 'Arts et Métiers', '', '', 'Laval', '53000', 'France', 'FR-PDL'),
(40, 'Laboratoire d’Informatique de l’Université du Maine', '', '', 'Laval', '53000', 'France', 'FR-PDL'),
(41, 'Ubisoft', '', '', 'Montpellier', '34000', 'France', 'FR-OCC'),
(42, 'Spinergie', '96 bis boulevard Raspail', '', 'Paris', '75006', 'France', 'FR-IDF'),
(43, 'Airbus', '', '', 'Blagnac', '31700', 'France', 'FR-OCC'),
(44, 'Ansaldo', '32 avenue Georges Gershwin', '', 'Riom', '63200', 'France', 'FR-ARA'),
(45, 'Exyzt', '26-28 rue Milhau Ducommun', '', 'Castre', '81100', 'France', 'FR-OCC'),
(46, 'CGx System', 'Le Causse, rue Claude Galien', '', 'Castre', '81100', 'France', 'FR-OCC'),
(47, 'AFPA', '', '', '', '', '', 'NA'),
(48, 'Atos', '', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(49, 'collège J.Jaurès', '', '', 'Albi', '81000', 'France', 'FR-OCC'),
(50, 'INRA', '', '', 'Toulouse-Auzeville', '31320', 'France', 'FR-OCC'),
(51, 'CEA Tech', 'INSA de Toulouse', '', 'Toulouse', '31000', 'France', 'FR-OCC'),
(99, 'ND', '0', '', '', '0', '', 'NA');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `id_etablissement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_etab` varchar(50) DEFAULT NULL,
  `sigle_etab` varchar(25) DEFAULT NULL,
  `code_postal_etab` varchar(25) DEFAULT NULL,
  `ville_etab` varchar(50) DEFAULT NULL,
  `pays_etab` varchar(50) DEFAULT NULL,
  `fk_id_region_etab` varchar(6) DEFAULT NULL,
  `latitude_etab` varchar(25) DEFAULT NULL,
  `longitude_etab` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_etablissement`),
  KEY `fk_id_region` (`fk_id_region_etab`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`id_etablissement`, `nom_etab`, `sigle_etab`, `code_postal_etab`, `ville_etab`, `pays_etab`, `fk_id_region_etab`, `latitude_etab`, `longitude_etab`) VALUES
(1, 'Université Paul Sabatier - Toulouse 3', 'UPS', '31000', 'Toulouse', 'France', 'FR-OCC', '43.223813', '0.049147'),
(2, 'Institut National Universitaire de Champollion', 'INUC', '81000', 'Albi', 'France', 'FR-OCC', '43.919499', '2.138867'),
(3, 'Université Marie et Pierre Curie Paris VI', 'UMPC', '75000', 'Paris', 'France', 'FR-IDF', '48.847104', '2.357499'),
(4, 'Montpellier 2', '', '34000', 'Montpellier', 'France', 'FR-OCC', '43.631621', '3.863449'),
(5, 'Paul Valery – Montpellier  3', '', '34000', 'Montpellier', 'France', 'FR-OCC', '43.632441', '3.870243'),
(6, 'Université Claude Bernard Lyon 1', '', '69000', 'Lyon', 'France', 'FR-ARA', '45.778873', '4.867961'),
(7, 'Pole Universitaire de Vichy', '', '03200', 'Vichy', 'France', 'FR-ARA', '46.11957', '3.425277'),
(8, 'Telecom Paristech', '', '75000', 'Paris', 'France', 'FR-IDF', '48.826294', '2.346419'),
(9, 'Université Paris Sud', '', '75000', 'Paris', 'France', 'FR-IDF', '48.697685', '2.176484'),
(10, 'Université Denis Diderot Paris', '', '75000', 'Paris', 'France', 'FR-IDF', '48.829319', '2.381794'),
(11, 'Université d Aix-Marseille', '', '13007', 'Marseille', 'France', 'FR-PAC', '43.293621', '5.358066'),
(12, 'Ecole d ingénieur 3IL', '3IL', '87000', 'Limoges', 'France', 'FR-NAQ', '45.819058', '1.272046'),
(13, 'Arts et Métiers ParisTech Angers - site de Laval', '', '53000', 'Laval', 'France', 'FR-PDL', '47.475189', '-0.559352'),
(14, 'Rennes 1', '', '35000', 'Rennes', 'France', 'FR-BRE', '48.11593', '-1.67296'),
(15, 'ISIS', 'ISIS', '81100', 'Castres', 'France', 'FR-OCC', '43.62416', '2.268675'),
(16, 'Polytech Orléans', '', '45072', 'Orléans', 'France', 'FR-PDL', '47.844261', '1.938959'),
(17, 'IUT de Rodez', '', '12000', 'Rodez', 'France', 'FR-OCC', '44.360247', '2.575833'),
(18, 'Faculté des Sciences et techniques', 'Limoges-FST', '87000', 'Limoges', 'France', 'FR-NAQ', '45.837936', '1.238622');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `intitule_form` varchar(100) DEFAULT NULL,
  `sigle_form` varchar(25) DEFAULT NULL,
  `type_form` varchar(50) DEFAULT NULL,
  `fk_id_specialite_form` int(11) DEFAULT NULL,
  `fk_id_etablissement_form` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_formation`),
  KEY `FK_fomation_id_specialite` (`fk_id_specialite_form`),
  KEY `FK_formation_id_etablissement` (`fk_id_etablissement_form`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `intitule_form`, `sigle_form`, `type_form`, `fk_id_specialite_form`, `fk_id_etablissement_form`) VALUES
(1, 'Informatique', '', 'Master', 0, 1),
(2, 'Stratégie Internet et Pilotage de Projets en Entreprise', 'SIPPE', 'Master', 0, 7),
(3, 'Données et Connaissances', 'DC', 'Master', 0, 1),
(4, 'Développement logiciel', 'DL', 'Master', 0, 1),
(5, 'Data Science', 'DAC', 'Master', 0, 3),
(6, 'Intelligence artificielle', 'IA', 'Master', 0, 3),
(7, 'Mathématiques, Informatique Appliquées et Sciences Humaines et Sociales', 'MIASHS', 'Master', 0, 5),
(8, 'Intelligence artificielle', 'IA', 'Master', 0, 6),
(9, 'Informatique', '', 'Master', 0, 6),
(10, 'Intelligence Artificielle et Reconnaissance de forme', 'IARF', 'Master', 0, 1),
(11, 'Audiovisuel, Médias Interactifs Numériques, Jeux', 'AMINJ', 'Master', 0, 2),
(12, 'Interactions homme-machine', 'IHM', 'Master', 0, 1),
(13, 'Images, Games et Intelligent Agents', 'IMAGINA', 'Master', 0, 2),
(14, 'BIG Data', '', 'Master', 0, 8),
(15, 'Informatique', '', 'Master', 0, 9),
(16, 'Système, réseau et internet ', 'SRI', 'Master', 0, 10),
(17, 'Fiabilité Sécurité et  Intégration Logiciels', 'FSIL', 'Master', 0, 11),
(18, 'Informatique, Synthèse d\'Images et Conception Graphique', 'ISICG', 'Master', 0, 18),
(19, 'Ecole d\'ingénieur', '3IL', 'Ecole inge', 0, 12),
(20, 'Modélisation Numérique et Réalité Virtuelle', 'MNRV', 'Master', 0, 13),
(21, 'Architectures et Ingénierie du logiciel et du Web', 'AIGLE', 'Master', 0, 4),
(22, 'Cybersécurité', 'CYBER', 'Master', 0, 14),
(23, 'Ecole d’ingénieur', 'ISIS', 'Ecole inge', 0, 15),
(24, 'Informatique Graphique et Analyse de l\'Image', 'IGAI', 'Master', 0, 1),
(25, 'Mecatronique, Automatique, Robotique et Signal', 'MARS', 'Master', 0, 16),
(26, 'Systèmes Interactifs et Robotique', 'SIR', 'Master', 0, 1),
(27, 'Conception d\'Architecture de Machines et Systèmes Informatiques', 'CAMSI', 'Master', 0, 1),
(28, 'Systèmes de télécoms & réseaux informatique', 'STRI', 'Master', 0, 1),
(29, 'Développement intranet/internet', '', 'Licence pro', 0, 17),
(30, 'Sciences de la Modélisation, de l\'Information et des Systèmes ', 'SMIS', 'Master', 0, 1),
(31, 'Génie Logiciel, Logiciels Répartis et Embarqués', 'GLRE', 'Master', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `moyenne_l3`
--

DROP TABLE IF EXISTS `moyenne_l3`;
CREATE TABLE IF NOT EXISTS `moyenne_l3` (
  `id_moyenne` int(11) NOT NULL AUTO_INCREMENT,
  `mention` varchar(25) NOT NULL,
  PRIMARY KEY (`id_moyenne`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `moyenne_l3`
--

INSERT INTO `moyenne_l3` (`id_moyenne`, `mention`) VALUES
(1, 'Passable'),
(2, 'Assez bien'),
(3, 'Bien'),
(4, 'Très bien');

-- --------------------------------------------------------

--
-- Structure de la table `offre_emploi`
--

DROP TABLE IF EXISTS `offre_emploi`;
CREATE TABLE IF NOT EXISTS `offre_emploi` (
  `id_emploi` int(11) NOT NULL AUTO_INCREMENT,
  `intitule_emploi` varchar(100) DEFAULT NULL,
  `debut_emploi` date DEFAULT NULL,
  `fin_emploi` date DEFAULT NULL,
  `type_emploi` varchar(25) DEFAULT NULL,
  `description_emploi` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_emploi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offre_stage`
--

DROP TABLE IF EXISTS `offre_stage`;
CREATE TABLE IF NOT EXISTS `offre_stage` (
  `id_stage` int(11) NOT NULL AUTO_INCREMENT,
  `nom_stage` varchar(100) DEFAULT NULL,
  `debut_stage` date DEFAULT NULL,
  `fin_stage` date DEFAULT NULL,
  PRIMARY KEY (`id_stage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE IF NOT EXISTS `poste` (
  `intitule_poste` varchar(200) NOT NULL,
  `debut_poste` year(4) NOT NULL DEFAULT '0000',
  `fin_poste` year(4) DEFAULT NULL,
  `description_poste` varchar(500) DEFAULT NULL,
  `specialite_poste` varchar(100) DEFAULT NULL,
  `fk_id_etud_poste` int(11) NOT NULL,
  `fk_id_entreprise_poste` int(11) NOT NULL,
  PRIMARY KEY (`fk_id_etud_poste`,`fk_id_entreprise_poste`,`debut_poste`),
  KEY `FK_poste_id_entreprise` (`fk_id_entreprise_poste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`intitule_poste`, `debut_poste`, `fin_poste`, `description_poste`, `specialite_poste`, `fk_id_etud_poste`, `fk_id_entreprise_poste`) VALUES
('Ingénieur Recherche Machine Learning', 2017, 0000, '', '', 1, 1),
('Doctorant', 0000, 2017, '', '', 1, 32),
('Ingénieur évaluateur sécurité', 2013, 0000, '', '', 3, 2),
('Infographiste Webdesigner', 2013, 0000, '', '', 5, 3),
('Concepteur web', 2013, 2014, '', '', 5, 33),
('Développeur web/mobile', 2014, 0000, '', '', 6, 4),
('Ingénieur informatique (Développement WCS)', 2014, 0000, '', '', 7, 5),
('Ingénieur d\'étude et développement', 2013, 2014, '', '', 7, 34),
('Développeur informatique', 2017, 0000, '', '', 9, 6),
('Développeur C#', 2017, 0000, '', '', 10, 99),
('Lead Developer Front End', 2016, 0000, '', '', 12, 7),
('Ingénieur d\'étude et développement', 2015, 0000, '', '', 16, 8),
('Concepteur en composante logicielle', 2013, 2017, '', '', 19, 9),
('Concepteur en composante logicielle', 2017, 0000, '', '', 19, 99),
('Développeur ', 2017, 0000, '', '', 23, 10),
('Développeur logiciel', 2014, 2017, '', '', 24, 11),
('Chef de projet', 2017, 0000, '', '', 24, 11),
('Ingénieur d\'étude et développement', 2016, 0000, '', '', 25, 12),
('Avant vente / Technico-commercial', 2012, 0000, 'solution IBM Maximo', '', 26, 13),
('Ingénieur software', 2016, 0000, '', '', 27, 15),
('Architecte de données', 0000, 0000, '', '', 28, 16),
('Responsable informatique', 2010, 0000, '', '', 29, 99),
('Ingénieur en DevOps', 2017, 0000, '', '', 30, 17),
('Ingénieur d\'étude', 2017, 0000, '', '', 32, 18),
('Attaché temporaire d\'enseignement et de recherche', 2017, 0000, '', '', 33, 19),
('Analyste Programmeur', 2006, 2007, '', '', 33, 35),
('Responsable maintenance et développement', 2007, 2008, '', '', 33, 36),
('Développeur d\'application 3D interactives', 2010, 2011, '', '', 33, 37),
('Ingénieur réalité virtuelle', 2011, 2012, '', '', 33, 38),
('Ingénieur chercheur', 2013, 2014, '', '', 33, 39),
('Doctorant', 2014, 2017, '', '', 33, 40),
('Scrum Master', 0000, 0000, '', '', 34, 9),
('Développeur', 2011, 0000, '', '', 34, 20),
('Engine developper', 0000, 0000, '', '', 34, 41),
('Ingénieur en Informatique', 2017, 0000, '', '', 35, 17),
('Scrum Master, developpeur Android', 2015, 0000, '', '', 36, 21),
('Analyste Développeur', 2014, 0000, '', '', 44, 22),
('Ingénieur bureau d\'études', 2015, 0000, '', '', 45, 23),
('Lead developer Java', 2009, 0000, '', '', 46, 99),
('Big Data Architect', 2017, 0000, '', '', 47, 24),
('Développeur Big Data', 2016, 2017, '', '', 47, 42),
('Développeur de logiciels informatiques', 2017, 0000, '', '', 48, 25),
('Ingénieur intégration système', 0000, 0000, '', '', 49, 2),
('Ingénieur validation', 2008, 0000, '', '', 49, 26),
('Ingénieur intégration système', 0000, 0000, '', '', 49, 43),
('Ingénieur intégration système', 0000, 0000, '', '', 49, 44),
('Responsable système d\'informations / sécurité informatique', 2017, 0000, '', '', 51, 27),
('Développeur multimédia', 2017, 0000, '', '', 52, 28),
('Développeur d\'application ', 2007, 2010, '', '', 52, 45),
('Développeur d\'application ', 2010, 2014, '', '', 52, 46),
('Développeur d\'application ', 2016, 2017, '', '', 52, 47),
('Ingénieur d\'étude', 0000, 0000, '', '', 53, 12),
('Ingénieur d\'études', 2008, 0000, '', '', 53, 29),
('Ingénieur d\'étude', 0000, 0000, '', '', 53, 48),
('Assistant réseaux', 2011, 2013, '', '', 56, 49),
('Professeur contractuel en mathématiques ', 2013, 0000, '', '', 56, 99),
('Doctorant', 2017, 0000, 'médecine moléculaire/bioinformatique', '', 57, 30),
('Ingénieur d\'études', 2014, 2015, '', '', 57, 50),
('Ingénieur d\'étude', 2016, 2017, '', '', 57, 50),
('Ingénieur chercheur', 2015, 2016, '', '', 57, 51),
('Ingénieur Développeur', 2017, 0000, '', '', 58, 17),
('Ingénieur développement', 2017, 0000, '', '', 59, 31);

-- --------------------------------------------------------

--
-- Structure de la table `propose_emploi`
--

DROP TABLE IF EXISTS `propose_emploi`;
CREATE TABLE IF NOT EXISTS `propose_emploi` (
  `date_emission_emploi` date DEFAULT NULL,
  `id_entreprise` int(11) NOT NULL,
  `id_emploi` int(11) NOT NULL,
  PRIMARY KEY (`id_entreprise`,`id_emploi`),
  KEY `FK_propose_emploi_id_emploi` (`id_emploi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `propose_stage`
--

DROP TABLE IF EXISTS `propose_stage`;
CREATE TABLE IF NOT EXISTS `propose_stage` (
  `date_emission_stage` date DEFAULT NULL,
  `id_entreprise` int(11) NOT NULL,
  `id_stage` int(11) NOT NULL,
  PRIMARY KEY (`id_entreprise`,`id_stage`),
  KEY `FK_propose_stage_id_stage` (`id_stage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id_region` varchar(6) NOT NULL,
  `nom_region` varchar(100) NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id_region`, `nom_region`) VALUES
('ETR', 'Etranger'),
('FR-ARA', 'Auvergne-Rhône-Alpes'),
('FR-BRE', 'Bretagne'),
('FR-COR', 'Corse'),
('FR-CVL', 'Centre-Val de Loire'),
('FR-FOM', 'France Outre-Mer'),
('FR-IDF', 'Ile-de-France'),
('FR-NAQ', 'Nouvelle Aquitaine'),
('FR-OCC', 'Occitanie'),
('FR-PAC', 'Provence-Alpes-Côte d\'Azur'),
('FR-PDL', 'Pays de la Loire'),
('NA', 'Non renseigné');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `id_specialite` int(11) NOT NULL AUTO_INCREMENT,
  `lib_specialite` varchar(100) NOT NULL,
  PRIMARY KEY (`id_specialite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id_specialite`, `lib_specialite`) VALUES
(0, 'Non mentioné'),
(1, 'Développement Logiciel');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int(11) NOT NULL AUTO_INCREMENT,
  `lib_statut` varchar(50) NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `lib_statut`) VALUES
(1, 'En cours 1ère inscription'),
(2, 'En cours 2ème inscription'),
(3, 'Obtenu en 1 an'),
(4, 'Obtenu en 2 ans'),
(5, 'Abandonné');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ancien_etudiant`
--
ALTER TABLE `ancien_etudiant`
  ADD CONSTRAINT `FK_ancien_etudiant_id_cursus` FOREIGN KEY (`fk_id_cursus_etud`) REFERENCES `cursus` (`id_cursus`),
  ADD CONSTRAINT `FK_ancien_etudiant_id_moyenne` FOREIGN KEY (`fk_id_moyenne_l3_etud`) REFERENCES `moyenne_l3` (`id_moyenne`),
  ADD CONSTRAINT `FK_ancien_etudiant_id_specialite` FOREIGN KEY (`fk_id_specialite_etud`) REFERENCES `specialite` (`id_specialite`);

--
-- Contraintes pour la table `a_effectue`
--
ALTER TABLE `a_effectue`
  ADD CONSTRAINT `FK_a_effectue_id_etud` FOREIGN KEY (`fk_id_etud`) REFERENCES `ancien_etudiant` (`id_etud`),
  ADD CONSTRAINT `FK_a_effectue_id_formation` FOREIGN KEY (`fk_id_formation`) REFERENCES `formation` (`id_formation`),
  ADD CONSTRAINT `FK_a_effectue_id_statut` FOREIGN KEY (`fk_statut_id`) REFERENCES `statut` (`id_statut`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `FK_entreprise_id_region` FOREIGN KEY (`fk_id_region_ese`) REFERENCES `region` (`id_region`);

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `FK_etablissement_id_region` FOREIGN KEY (`fk_id_region_etab`) REFERENCES `region` (`id_region`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_fomation_id_specialite` FOREIGN KEY (`fk_id_specialite_form`) REFERENCES `specialite` (`id_specialite`),
  ADD CONSTRAINT `FK_formation_id_etablissement` FOREIGN KEY (`fk_id_etablissement_form`) REFERENCES `etablissement` (`id_etablissement`);

--
-- Contraintes pour la table `poste`
--
ALTER TABLE `poste`
  ADD CONSTRAINT `FK_poste_id_entreprise` FOREIGN KEY (`fk_id_entreprise_poste`) REFERENCES `entreprise` (`id_entreprise`),
  ADD CONSTRAINT `FK_poste_id_etud` FOREIGN KEY (`fk_id_etud_poste`) REFERENCES `ancien_etudiant` (`id_etud`);

--
-- Contraintes pour la table `propose_emploi`
--
ALTER TABLE `propose_emploi`
  ADD CONSTRAINT `FK_propose_emploi_id_emploi` FOREIGN KEY (`id_emploi`) REFERENCES `offre_emploi` (`id_emploi`),
  ADD CONSTRAINT `FK_propose_emploi_id_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `propose_stage`
--
ALTER TABLE `propose_stage`
  ADD CONSTRAINT `FK_propose_stage_id_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`),
  ADD CONSTRAINT `FK_propose_stage_id_stage` FOREIGN KEY (`id_stage`) REFERENCES `offre_stage` (`id_stage`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
