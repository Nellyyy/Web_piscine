-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 30 avr. 2019 à 21:05
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
-- Base de données :  `piscine_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_titre` varchar(255) NOT NULL,
  `item_prix` int(11) NOT NULL,
  `item_description` text,
  `item_photo` varchar(255) DEFAULT NULL,
  `item_video` varchar(255) DEFAULT NULL,
  `item_qte_stock` int(11) NOT NULL,
  `item_qte_vendue` int(11) NOT NULL,
  `item_type` varchar(8) NOT NULL,
  `item_livre_auteur` varchar(255) DEFAULT NULL,
  `item_livre_date_publication` int(11) DEFAULT NULL,
  `item_musique_artiste` varchar(255) DEFAULT NULL,
  `item_musique_style` varchar(255) DEFAULT NULL,
  `item_date_sortie` int(11) DEFAULT NULL,
  `item_vetement_sexe` varchar(1) DEFAULT NULL,
  `item_vetement_couleur` varchar(10) DEFAULT NULL,
  `item_vetement_taille` varchar(3) DEFAULT NULL,
  `item_sport_categorie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateur_nom` varchar(255) NOT NULL,
  `utilisateur_prenom` varchar(255) NOT NULL,
  `utilisateur_email` varchar(255) NOT NULL,
  `utilisateur_pseudo` varchar(255) NOT NULL,
  `utilisateur_mdp` varchar(255) NOT NULL,
  `utilisateur_photo` varchar(255) DEFAULT NULL,
  `utilisateur_type` varchar(8) NOT NULL,
  `utilisateur_acheteur_adresse` varchar(255) DEFAULT NULL,
  `utilisateur_acheteur_cb` int(11) DEFAULT NULL,
  PRIMARY KEY (`utilisateur_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_nom`, `utilisateur_prenom`, `utilisateur_email`, `utilisateur_pseudo`, `utilisateur_mdp`, `utilisateur_photo`, `utilisateur_type`, `utilisateur_acheteur_adresse`, `utilisateur_acheteur_cb`) VALUES
('BRUNO', 'charlene', 'charlene.bruno', 'cha', 'kingking', 'c.jpg', 'vendeur', '180 rue Jean Monnet', 128763);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
