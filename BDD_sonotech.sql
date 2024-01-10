-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 jan. 2024 à 12:26
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
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `idAbonnement` int(11) NOT NULL,
  `fonctionalite` varchar(45) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`idAbonnement`, `fonctionalite`, `cout`) VALUES
(0, 'Premium', 10),
(1, 'Gratuit', 0);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdministrateur` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `experience` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur_has_capteur_sonore`
--

CREATE TABLE `administrateur_has_capteur_sonore` (
  `administrateur_idAdministrateur` int(11) NOT NULL,
  `capteur_sonore_idCapteur_sonore` int(11) NOT NULL,
  `carte_sonore` varchar(45) DEFAULT NULL,
  `informations` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `idArtiste` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `adresse_email` varchar(45) DEFAULT NULL,
  `numero_de_telephone` varchar(45) DEFAULT NULL,
  `style_de_musique` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idAvis` int(11) NOT NULL,
  `critique` varchar(45) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `capteur_sonore`
--

CREATE TABLE `capteur_sonore` (
  `idCapteur_sonore` int(11) NOT NULL,
  `position` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `niveau_sonore` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `capteur_sonore`
--

INSERT INTO `capteur_sonore` (`idCapteur_sonore`, `position`, `date`, `niveau_sonore`) VALUES
(1, '0', '2000-01-01', '60');

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

CREATE TABLE `concert` (
  `idConcert` int(11) NOT NULL,
  `date` varchar(45) NOT NULL,
  `duree` time(6) NOT NULL,
  `heure_debut` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `utilisateur_idUtilisateur` int(11) NOT NULL,
  `utilisateur_abonnement_idAbonnement` int(11) NOT NULL,
  `utilisateur_concert_idConcert` int(11) NOT NULL,
  `salle_idSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `concert2`
--

CREATE TABLE `concert2` (
  `idConcert` int(11) NOT NULL,
  `date` date NOT NULL,
  `duree` time(6) NOT NULL,
  `heure_debut` time(6) NOT NULL,
  `salle_idSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `concert_has_artiste`
--

CREATE TABLE `concert_has_artiste` (
  `concert_idConcert` int(11) NOT NULL,
  `concert_utilisateur_idUtilisateur` int(11) NOT NULL,
  `concert_utilisateur_abonnement_idAbonnement` int(11) NOT NULL,
  `concert_utilisateur_concert_idConcert` int(11) NOT NULL,
  `artiste_idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `concert_has_utilisateur`
--

CREATE TABLE `concert_has_utilisateur` (
  `concert_idConcert` int(11) NOT NULL,
  `concert_utilisateur_idUtilisateur` int(11) NOT NULL,
  `concert_utilisateur_abonnement_idAbonnement` int(11) NOT NULL,
  `concert_utilisateur_concert_idConcert` int(11) NOT NULL,
  `utilisateur_idUtilisateur` int(11) NOT NULL,
  `utilisateur_abonnement_idAbonnement` int(11) NOT NULL,
  `avis_idAvis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `preference_utilisateur`
--

CREATE TABLE `preference_utilisateur` (
  `idPreference_utilisateur` int(11) NOT NULL,
  `style_de_musique` varchar(45) DEFAULT NULL,
  `artiste_idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `idSalle` int(11) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `carte_sonore` varchar(45) DEFAULT NULL,
  `capteur_sonore_idCapteur_sonore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `place` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adresse_email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `numero_de_telephone` varchar(45) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `abonnement_idAbonnement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `date_de_naissance`, `adresse_email`, `numero_de_telephone`, `mot_de_passe`, `abonnement_idAbonnement`) VALUES
(1, 'De Corta', 'Étienne', '2002-10-25', 'etienne.corta@gmail.com', '0652986299', '$2y$10$LPZdIiEt409NF6eTxvrroOzHBdP42IiHXNapoi3qr3r62TLo4SGrm', 1),
(4, 'Artus', 'de Chavagnac', '2003-02-03', 'artusdechavagnac@gmail.com', '0659055992', '$2y$10$cJaBOEtlqnmfgwsGIFV6auFZ1Wjh6FxqMlN8OWPh0qEgX1jzQIQvi', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_concert`
--

CREATE TABLE `utilisateur_has_concert` (
  `utilisateur_idUtilisateur` int(11) NOT NULL,
  `utilisateur_abonnement_idAbonnement` int(11) NOT NULL,
  `concert_idConcert` int(11) NOT NULL,
  `concert_utilisateur_idUtilisateur` int(11) NOT NULL,
  `concert_utilisateur_abonnement_idAbonnement` int(11) NOT NULL,
  `concert_utilisateur_concert_idConcert` int(11) NOT NULL,
  `ticket_idTicket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`idAbonnement`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdministrateur`);

--
-- Index pour la table `administrateur_has_capteur_sonore`
--
ALTER TABLE `administrateur_has_capteur_sonore`
  ADD PRIMARY KEY (`administrateur_idAdministrateur`,`capteur_sonore_idCapteur_sonore`),
  ADD KEY `fk_Administrateur_has_Capteur Sonore_Capteur Sonore1` (`capteur_sonore_idCapteur_sonore`);

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`idArtiste`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idAvis`);

--
-- Index pour la table `capteur_sonore`
--
ALTER TABLE `capteur_sonore`
  ADD PRIMARY KEY (`idCapteur_sonore`);

--
-- Index pour la table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`idConcert`,`utilisateur_idUtilisateur`,`utilisateur_abonnement_idAbonnement`,`utilisateur_concert_idConcert`,`salle_idSalle`);

--
-- Index pour la table `concert2`
--
ALTER TABLE `concert2`
  ADD PRIMARY KEY (`idConcert`),
  ADD KEY `fk_salle1` (`salle_idSalle`);

--
-- Index pour la table `concert_has_artiste`
--
ALTER TABLE `concert_has_artiste`
  ADD PRIMARY KEY (`concert_idConcert`,`concert_utilisateur_idUtilisateur`,`concert_utilisateur_abonnement_idAbonnement`,`concert_utilisateur_concert_idConcert`,`artiste_idArtiste`),
  ADD KEY `fk_Concert_has_Artiste_Artiste1` (`artiste_idArtiste`);

--
-- Index pour la table `concert_has_utilisateur`
--
ALTER TABLE `concert_has_utilisateur`
  ADD PRIMARY KEY (`concert_idConcert`,`concert_utilisateur_idUtilisateur`,`concert_utilisateur_abonnement_idAbonnement`,`concert_utilisateur_concert_idConcert`,`utilisateur_idUtilisateur`,`utilisateur_abonnement_idAbonnement`,`avis_idAvis`),
  ADD KEY `fk_Concert_has_Utilisateur_Utilisateur1` (`utilisateur_idUtilisateur`,`utilisateur_abonnement_idAbonnement`),
  ADD KEY `fk_Concert_has_Utilisateur_Avis1` (`avis_idAvis`);

--
-- Index pour la table `preference_utilisateur`
--
ALTER TABLE `preference_utilisateur`
  ADD PRIMARY KEY (`idPreference_utilisateur`,`artiste_idArtiste`),
  ADD KEY `fk_Préférence utilisateur_Artiste1` (`artiste_idArtiste`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idSalle`,`capteur_sonore_idCapteur_sonore`),
  ADD KEY `fk_Salle_Capteur Sonore1` (`capteur_sonore_idCapteur_sonore`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`,`abonnement_idAbonnement`),
  ADD KEY `fk_Utilisateur_Abonnement1` (`abonnement_idAbonnement`);

--
-- Index pour la table `utilisateur_has_concert`
--
ALTER TABLE `utilisateur_has_concert`
  ADD PRIMARY KEY (`utilisateur_idUtilisateur`,`utilisateur_abonnement_idAbonnement`,`concert_idConcert`,`concert_utilisateur_idUtilisateur`,`concert_utilisateur_abonnement_idAbonnement`,`concert_utilisateur_concert_idConcert`,`ticket_idTicket`),
  ADD KEY `fk_Utilisateur_has_Concert_Concert1` (`concert_idConcert`,`concert_utilisateur_idUtilisateur`,`concert_utilisateur_abonnement_idAbonnement`,`concert_utilisateur_concert_idConcert`),
  ADD KEY `fk_Utilisateur_has_Concert_Ticket1` (`ticket_idTicket`);

--
-- Index pour la table `utilisateur_has_preference_utilisateur`
--
ALTER TABLE `utilisateur_has_preference_utilisateur`
  ADD PRIMARY KEY (`utilisateur_idUtilisateur`,`utilisateur_abonnement_idAbonnement`,`preference_utilisateur_idPreference_utilisateur`,`preference_utilisateur_artiste_idArtiste`),
  ADD KEY `fk_Utilisateur_has_Préférence utilisateur_Préférence util1` (`preference_utilisateur_idPreference_utilisateur`,`preference_utilisateur_artiste_idArtiste`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `capteur_sonore`
--
ALTER TABLE `capteur_sonore`
  MODIFY `idCapteur_sonore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `concert`
--
ALTER TABLE `concert`
  MODIFY `idConcert` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `concert2`
--
ALTER TABLE `concert2`
  MODIFY `idConcert` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur_has_capteur_sonore`
--
ALTER TABLE `administrateur_has_capteur_sonore`
  ADD CONSTRAINT `fk_Administrateur_has_Capteur Sonore_Administrateur1` FOREIGN KEY (`Administrateur_idAdministrateur`) REFERENCES `administrateur` (`idAdministrateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Administrateur_has_Capteur Sonore_Capteur Sonore1` FOREIGN KEY (`Capteur_Sonore_idCapteur_Sonore`) REFERENCES `capteur_sonore` (`idCapteur_Sonore`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `fk_Concert_Salle1` FOREIGN KEY (`Salle_idSalle`) REFERENCES `salle` (`idSalle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_salle` FOREIGN KEY (`salle_idSalle`) REFERENCES `salle` (`idSalle`);

--
-- Contraintes pour la table `concert2`
--
ALTER TABLE `concert2`
  ADD CONSTRAINT `fk_salle1` FOREIGN KEY (`salle_idSalle`) REFERENCES `salle` (`idSalle`);

--
-- Contraintes pour la table `concert_has_artiste`
--
ALTER TABLE `concert_has_artiste`
  ADD CONSTRAINT `fk_Concert_has_Artiste_Artiste1` FOREIGN KEY (`Artiste_idArtiste`) REFERENCES `artiste` (`idArtiste`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Concert_has_Artiste_Concert1` FOREIGN KEY (`Concert_idConcert`,`Concert_Utilisateur_idUtilisateur`,`Concert_Utilisateur_Abonnement_idAbonnement`,`Concert_Utilisateur_Concert_idConcert`) REFERENCES `concert` (`idConcert`, `Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Utilisateur_Concert_idConcert`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `concert_has_utilisateur`
--
ALTER TABLE `concert_has_utilisateur`
  ADD CONSTRAINT `fk_Concert_has_Utilisateur_Avis1` FOREIGN KEY (`Avis_idAvis`) REFERENCES `avis` (`idAvis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Concert_has_Utilisateur_Concert1` FOREIGN KEY (`Concert_idConcert`,`Concert_Utilisateur_idUtilisateur`,`Concert_Utilisateur_Abonnement_idAbonnement`,`Concert_Utilisateur_Concert_idConcert`) REFERENCES `concert` (`idConcert`, `Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Utilisateur_Concert_idConcert`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Concert_has_Utilisateur_Utilisateur1` FOREIGN KEY (`Utilisateur_idUtilisateur`,`Utilisateur_Abonnement_idAbonnement`) REFERENCES `utilisateur` (`idUtilisateur`, `Abonnement_idAbonnement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `preference_utilisateur`
--
ALTER TABLE `preference_utilisateur`
  ADD CONSTRAINT `fk_Préférence utilisateur_Artiste1` FOREIGN KEY (`artiste_idArtiste`) REFERENCES `artiste` (`idArtiste`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `fk_Salle_Capteur Sonore1` FOREIGN KEY (`capteur_sonore_idCapteur_sonore`) REFERENCES `capteur_sonore` (`idCapteur_Sonore`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_Abonnement1` FOREIGN KEY (`Abonnement_idAbonnement`) REFERENCES `abonnement` (`idAbonnement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur_has_concert`
--
ALTER TABLE `utilisateur_has_concert`
  ADD CONSTRAINT `fk_Utilisateur_has_Concert_Concert1` FOREIGN KEY (`Concert_idConcert`,`Concert_Utilisateur_idUtilisateur`,`Concert_Utilisateur_Abonnement_idAbonnement`,`Concert_Utilisateur_Concert_idConcert`) REFERENCES `concert` (`idConcert`, `Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Utilisateur_Concert_idConcert`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Utilisateur_has_Concert_Ticket1` FOREIGN KEY (`Ticket_idTicket`) REFERENCES `ticket` (`idTicket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Utilisateur_has_Concert_Utilisateur1` FOREIGN KEY (`Utilisateur_idUtilisateur`,`Utilisateur_Abonnement_idAbonnement`) REFERENCES `utilisateur` (`idUtilisateur`, `Abonnement_idAbonnement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur_has_preference_utilisateur`
--
ALTER TABLE `utilisateur_has_preference_utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_has_Préférence utilisateur_Préférence util1` FOREIGN KEY (`preference_utilisateur_idPreference_utilisateur`,`preference_utilisateur_artiste_idArtiste`) REFERENCES `preference_utilisateur` (`idPreference_utilisateur`, `artiste_idArtiste`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Utilisateur_has_Préférence utilisateur_Utilisateur1` FOREIGN KEY (`utilisateur_idUtilisateur`,`utilisateur_abonnement_idAbonnement`) REFERENCES `utilisateur` (`idUtilisateur`, `Abonnement_idAbonnement`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
