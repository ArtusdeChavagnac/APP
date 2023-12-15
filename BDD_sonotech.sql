-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 déc. 2023 à 16:20
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sonotech`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_preference_utilisateur`
--

CREATE TABLE `utilisateur_has_preference_utilisateur` (
  `utilisateur_idUtilisateur` int(11) NOT NULL,
  `utilisateur_abonnement_idAbonnement` int(11) NOT NULL,
  `preference_utilisateur_idPreference_utilisateur` int(11) NOT NULL,
  `preference_utilisateur_artiste_idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur_has_preference_utilisateur`
--
ALTER TABLE `utilisateur_has_preference_utilisateur`
  ADD PRIMARY KEY (`utilisateur_idUtilisateur`,`utilisateur_abonnement_idAbonnement`,`preference_utilisateur_idPreference_utilisateur`,`preference_utilisateur_artiste_idArtiste`),
  ADD KEY `fk_Utilisateur_has_Préférence utilisateur_Préférence util1` (`preference_utilisateur_idPreference_utilisateur`,`preference_utilisateur_artiste_idArtiste`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur_has_preference_utilisateur`
--
ALTER TABLE `utilisateur_has_preference_utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_has_Préférence utilisateur_Préférence util1` FOREIGN KEY (`preference_utilisateur_idPreference_utilisateur`,`preference_utilisateur_artiste_idArtiste`) REFERENCES `preference_utilisateur` (`idPreference_utilisateur`, `Artiste_idArtiste`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Utilisateur_has_Préférence utilisateur_Utilisateur1` FOREIGN KEY (`Utilisateur_idUtilisateur`,`Utilisateur_Abonnement_idAbonnement`) REFERENCES `utilisateur` (`idUtilisateur`, `Abonnement_idAbonnement`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
