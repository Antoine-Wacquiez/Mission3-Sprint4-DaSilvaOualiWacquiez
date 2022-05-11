-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 avr. 2022 à 17:50
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mission3`
--

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

DROP TABLE IF EXISTS `bien`;
CREATE TABLE IF NOT EXISTS `bien` (
  `type` varchar(20) DEFAULT NULL,
  `prix` int(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `surface` int(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `nbpieces` int(255) NOT NULL,
  `jardin` varchar(255) NOT NULL,
  `id_bien` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_bien`),
  KEY `ce_bien_type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`type`, `prix`, `description`, `surface`, `ville`, `nbpieces`, `jardin`, `id_bien`) VALUES
('Appartement', 110000, 'Lille Immo vous propose à la vente ce bien de 85m² idéalement situé à Roubaix.\r\n\r\nVous serez séduit par le charme de l\'ancien de cet appartement : parquet d\'origine, cheminée et belle hauteur sous plafond (+3m) sont au rendez-vous !\r\n\r\nIl se compose de la manière suivante:\r\n- d\'une entrée sur un beau double-séjour avec une cuisine ouverte entièrement équipée et fonctionnelle. De grandes ouvertures qui apportent une très belle luminosité naturelle\r\n- d\'une salle d\'eau lumineuse;\r\n- de WC séparés;\r\n- de deux chambres spacieuses avec dressing;\r\n\r\nL\'appartement est en parfait état : il n\'y a plus qu\'à poser ses valises !\r\nParking voitures a proximité.\r\nArrêt de bus sur place.\r\n', 85, 'Lille', 2, 'Non', 1),
('Immeuble', 22817, 'Très belle opportunité à saisir,\r\ntous loués répartis dans trois immeubles de standing des années 70 d\'une même copropriété.\r\nLes appartements sont en bon état, ils sont lumineux, ils bénéficient d\'une belle hauteur sous plafond et sont tous équipés de climatisation réversible.\r\nRénovation de qualité aucun travaux a prévoir.\r\n', 75, 'Lille', 100, 'Non', 2),
('Local', 160000, 'A vendre local commercial ! \r\nDans un hôtel industriel et artisanal situé à proximité des métros et transports, EVOLIS vous propose des surfaces d\'activités au cœur de Paris avec accès livraison et monte charge, sécurisé 24h/24.\r\nIdéal activités artisanales et fabrications.', 182, 'Roubaix', 30, 'Non', 3),
('Maison', 219000, 'Découvrez cette confortable maison entièrement rénovée qui vous propose au rez-de-chaussée une cuisine aménagée séparée, un spacieux séjour de 50 m² avec sa cheminée, une salle de bain, et une chambre. A l\'étage, trois chambres et une salle d\'eau.\r\nVous profiterez également d\'un beau jardin de 150 m² exposé Sud-Ouest sans vis-à-vis avec sa terrasse de 30 m² et en façade d\'un jardin de 90 m². La maison dispose également d\'une cave.\r\nsolation complète des murs, combles et doublage au sol, menuiserie double vitrage bois avec volets électriques\r\nToiture en excellent état et charpente neuve. LE POINT VERT: Isolation complète murs, sols, toiture. Classe C DPE\r\n Les honoraires sont à la charge du vendeur.', 113, 'Douai', 6, 'Oui', 4),
('Terrain nu', 150000, 'Terrain nu idéal pour artisan, commerce ou industries.', 6790, 'Villeneuve-d\'Ascq', 0, 'Non', 5);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) NOT NULL,
  `chemin2` varchar(255) NOT NULL,
  `chemin3` varchar(255) NOT NULL,
  `id_bien` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Type` (`id_bien`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`ID`, `chemin`, `chemin2`, `chemin3`, `id_bien`) VALUES
(1, '../images/app1.jpg', '../images/salledebain1.jpg', '../images/chambre1.jpg', 1),
(2, '../images/imm1.jpg ', '../images/salledebain1.jpg ', '../images/chambre1.jpg ', 2),
(3, '../images/lc4.jpg ', '', '', 3),
(4, '../images/mai1.jpg ', '../images/salledebain1.jpg ', '../images/chambre1.jpg ', 4),
(5, '../images/tn1.jpg ', '../images/tn2.jpg ', '../images/tn3.jpg ', 5);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `nomType` varchar(20) NOT NULL,
  PRIMARY KEY (`nomType`),
  UNIQUE KEY `nomType` (`nomType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`nomType`) VALUES
('Appartement'),
('Immeuble'),
('local'),
('maison'),
('Terrain nu');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `mdp`) VALUES
(1, 'agent', 'agent');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bien`
--
ALTER TABLE `bien`
  ADD CONSTRAINT `ce_bien_type` FOREIGN KEY (`type`) REFERENCES `type` (`nomType`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `Type` FOREIGN KEY (`id_bien`) REFERENCES `bien` (`id_bien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
