-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 18 jan. 2024 à 15:05
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
  `fonctionalite` varchar(45) NOT NULL,
  `Cout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`idAbonnement`, `fonctionalite`, `Cout`) VALUES
(0, 'Premium', 50),
(1, 'Gratuit', 0),
(2, 'Admin', 0);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdministrateur` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `experience` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdministrateur`, `nom`, `prenom`, `experience`) VALUES
(1, 'de Corta', 'Etienne', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur_has_capteur_sonore`
--

CREATE TABLE `administrateur_has_capteur_sonore` (
  `idAmdinistrateur_has_capteur` int(11) NOT NULL,
  `administrateur_idAdministrateur` int(11) NOT NULL,
  `capteur_sonore_idCapteur_sonore` int(11) NOT NULL,
  `carte_sonore` varchar(45) DEFAULT NULL,
  `informations` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `administrateur_has_capteur_sonore`
--

INSERT INTO `administrateur_has_capteur_sonore` (`idAmdinistrateur_has_capteur`, `administrateur_idAdministrateur`, `capteur_sonore_idCapteur_sonore`, `carte_sonore`, `informations`) VALUES
(1, 1, 1, 'image.carte_sonore_1.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `idArtiste` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `adresse_email` varchar(45) NOT NULL,
  `numero_de_telephone` varchar(10) NOT NULL,
  `style_de_musique` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`idArtiste`, `nom`, `prenom`, `pseudo`, `adresse_email`, `numero_de_telephone`, `style_de_musique`) VALUES
(1, 'Scott', 'Travis', NULL, 'example@gmail.com', '0111111111', 'Rap');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idAvis` int(11) NOT NULL,
  `critique` varchar(45) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`idAvis`, `critique`, `note`, `date`) VALUES
(1, NULL, '9', '2024-01-20');

-- --------------------------------------------------------

--
-- Structure de la table `capteur_sonore`
--

CREATE TABLE `capteur_sonore` (
  `idCapteur_sonore` int(11) NOT NULL,
  `position` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `niveau_sonore` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `capteur_sonore`
--

INSERT INTO `capteur_sonore` (`idCapteur_sonore`, `position`, `date`, `niveau_sonore`) VALUES
(1, '0', '2024-01-01', '30');

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

CREATE TABLE `concert` (
  `idConcert` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `duree` int(11) NOT NULL,
  `heure_debut` int(11) NOT NULL,
  `salle_idSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `concert`
--

INSERT INTO `concert` (`idConcert`, `image`, `date`, `duree`, `heure_debut`, `salle_idSalle`) VALUES
(1, 'images/imgconcert/img1.jpg', '2024-01-19', 243, 1800, 1);

-- --------------------------------------------------------

--
-- Structure de la table `concert_has_artiste`
--

CREATE TABLE `concert_has_artiste` (
  `idConcert_has_artiste` int(11) NOT NULL,
  `concert_idConcert` int(11) NOT NULL,
  `artiste_idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `concert_has_artiste`
--

INSERT INTO `concert_has_artiste` (`idConcert_has_artiste`, `concert_idConcert`, `artiste_idArtiste`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `concert_has_utilisateur`
--

CREATE TABLE `concert_has_utilisateur` (
  `idConcert_has_utilisateur` int(11) NOT NULL,
  `concert_idConcert` int(11) NOT NULL,
  `utilisateur_idUtilisateur` int(11) NOT NULL,
  `avis_idAvis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `concert_has_utilisateur`
--

INSERT INTO `concert_has_utilisateur` (`idConcert_has_utilisateur`, `concert_idConcert`, `utilisateur_idUtilisateur`, `avis_idAvis`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idfaq` int(11) NOT NULL,
  `texte` varchar(1024) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`idfaq`, `texte`, `date`) VALUES
(1, 'Quels sont vos modes de paiement acceptés ?', '2024-01-01'),
(2, 'Comment puis-je annuler ma réservation ?', '2024-01-01'),
(3, 'Proposez-vous des réductions pour les étudiants ?', '2024-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `preference_utilisateur`
--

CREATE TABLE `preference_utilisateur` (
  `idPreference_utilisateur` int(11) NOT NULL,
  `style_de_musique` varchar(45) DEFAULT NULL,
  `artiste_idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `preference_utilisateur`
--

INSERT INTO `preference_utilisateur` (`idPreference_utilisateur`, `style_de_musique`, `artiste_idArtiste`) VALUES
(1, 'Rap', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idReponse` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date` date NOT NULL,
  `faq_idFaq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `texte`, `date`, `faq_idFaq`) VALUES
(1, 'Nous acceptons les paiements par carte bancaire, virement et espèces.', '2024-01-02', 1),
(2, 'Pour annuler votre réservation, veuillez nous contacter par téléphone ou par email au moins 48 heures à l\'avance.', '2024-01-02', 2),
(3, 'Oui, nous offrons des réductions spéciales pour les étudiants sur présentation d\'une carte étudiante valide.', '2024-01-02', 3);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `idSalle` int(11) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `capteur_sonore_idCapteur_sonore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idSalle`, `adresse`, `capteur_sonore_idCapteur_sonore`) VALUES
(1, '10 rue de Vanves', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `place` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`idTicket`, `place`) VALUES
(1, '45b');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adresse_email` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `numero_de_telephone` varchar(10) NOT NULL,
  `mot_de_passe` int(255) NOT NULL,
  `abonnement_idAbonnement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `date_de_naissance`, `adresse_email`, `numero_de_telephone`, `mot_de_passe`, `abonnement_idAbonnement`) VALUES
(1, 'De Corta', 'Étienne', '2002-10-25', 'etienne.corta@gmail.com', '0652986299', 0, 2),
(2, 'Dupont', 'Jean', '2002-10-25', 'jeandupont@gmail.com', '0611223344', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_concert`
--

CREATE TABLE `utilisateur_has_concert` (
  `idUtilisateur_has_concert` int(11) NOT NULL,
  `utilisateur_idUtilisateur` int(11) NOT NULL,
  `concert_idConcert` int(11) NOT NULL,
  `ticket_idTicket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur_has_concert`
--

INSERT INTO `utilisateur_has_concert` (`idUtilisateur_has_concert`, `utilisateur_idUtilisateur`, `concert_idConcert`, `ticket_idTicket`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_preference_utilisateur`
--

CREATE TABLE `utilisateur_has_preference_utilisateur` (
  `idUtilisateur_has_preference_utilisateur` int(11) NOT NULL,
  `utilisateur_idUtilisateur` int(11) NOT NULL,
  `preference_utilisateur_idPreference_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur_has_preference_utilisateur`
--

INSERT INTO `utilisateur_has_preference_utilisateur` (`idUtilisateur_has_preference_utilisateur`, `utilisateur_idUtilisateur`, `preference_utilisateur_idPreference_utilisateur`) VALUES
(1, 2, 1);

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
  ADD PRIMARY KEY (`administrateur_idAdministrateur`,`capteur_sonore_idCapteur_sonore`,`idAmdinistrateur_has_capteur`) USING BTREE,
  ADD KEY `fk_capteur_sonore_admin` (`capteur_sonore_idCapteur_sonore`),
  ADD KEY `fk_admin_capteur_sonore` (`administrateur_idAdministrateur`);

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
  ADD PRIMARY KEY (`idConcert`,`salle_idSalle`),
  ADD KEY `fk_concert_salle` (`salle_idSalle`);

--
-- Index pour la table `concert_has_artiste`
--
ALTER TABLE `concert_has_artiste`
  ADD PRIMARY KEY (`idConcert_has_artiste`,`concert_idConcert`,`artiste_idArtiste`) USING BTREE,
  ADD KEY `fk_concert_artiste` (`artiste_idArtiste`) USING BTREE,
  ADD KEY `fk_concert_artiste2` (`concert_idConcert`);

--
-- Index pour la table `concert_has_utilisateur`
--
ALTER TABLE `concert_has_utilisateur`
  ADD PRIMARY KEY (`concert_idConcert`,`utilisateur_idUtilisateur`,`avis_idAvis`,`idConcert_has_utilisateur`) USING BTREE,
  ADD KEY `fk_avis_concert` (`avis_idAvis`) USING BTREE,
  ADD KEY `fk_utilisateur_concert` (`utilisateur_idUtilisateur`,`concert_idConcert`) USING BTREE;

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idfaq`);

--
-- Index pour la table `preference_utilisateur`
--
ALTER TABLE `preference_utilisateur`
  ADD PRIMARY KEY (`idPreference_utilisateur`,`artiste_idArtiste`),
  ADD KEY `fk_artiste_preference` (`artiste_idArtiste`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idReponse`,`faq_idFaq`) USING BTREE,
  ADD KEY `fk_reponse_faq` (`faq_idFaq`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idSalle`,`capteur_sonore_idCapteur_sonore`),
  ADD KEY `fk_salle_capteur_sonore` (`capteur_sonore_idCapteur_sonore`) USING BTREE;

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
  ADD KEY `fk_abonnement_idAbonnement1` (`abonnement_idAbonnement`) USING BTREE;

--
-- Index pour la table `utilisateur_has_concert`
--
ALTER TABLE `utilisateur_has_concert`
  ADD PRIMARY KEY (`utilisateur_idUtilisateur`,`concert_idConcert`,`ticket_idTicket`,`idUtilisateur_has_concert`) USING BTREE,
  ADD KEY `fk_utilisateur_ticket` (`ticket_idTicket`),
  ADD KEY `fk_concert_utilisateur3` (`concert_idConcert`),
  ADD KEY `fk_utilisateur_concert3` (`utilisateur_idUtilisateur`) USING BTREE;

--
-- Index pour la table `utilisateur_has_preference_utilisateur`
--
ALTER TABLE `utilisateur_has_preference_utilisateur`
  ADD PRIMARY KEY (`utilisateur_idUtilisateur`,`preference_utilisateur_idPreference_utilisateur`,`idUtilisateur_has_preference_utilisateur`) USING BTREE,
  ADD KEY `fk_utilisateur_preference` (`utilisateur_idUtilisateur`) USING BTREE,
  ADD KEY `fk_preference_utilisateur` (`preference_utilisateur_idPreference_utilisateur`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `idAbonnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `idArtiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `capteur_sonore`
--
ALTER TABLE `capteur_sonore`
  MODIFY `idCapteur_sonore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `concert`
--
ALTER TABLE `concert`
  MODIFY `idConcert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `concert_has_artiste`
--
ALTER TABLE `concert_has_artiste`
  MODIFY `idConcert_has_artiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idfaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `preference_utilisateur`
--
ALTER TABLE `preference_utilisateur`
  MODIFY `idPreference_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `idSalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur_has_capteur_sonore`
--
ALTER TABLE `administrateur_has_capteur_sonore`
  ADD CONSTRAINT `fk_admin_capteur_sonore` FOREIGN KEY (`administrateur_idAdministrateur`) REFERENCES `administrateur` (`idAdministrateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_capteur_sonore_admin` FOREIGN KEY (`capteur_sonore_idCapteur_sonore`) REFERENCES `capteur_sonore` (`idCapteur_sonore`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `fk_concert_salle` FOREIGN KEY (`salle_idSalle`) REFERENCES `salle` (`idSalle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `concert_has_artiste`
--
ALTER TABLE `concert_has_artiste`
  ADD CONSTRAINT `fk_concert_artiste` FOREIGN KEY (`artiste_idArtiste`) REFERENCES `artiste` (`idArtiste`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_concert_artiste2` FOREIGN KEY (`concert_idConcert`) REFERENCES `concert` (`idConcert`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_concert_artiste_2` FOREIGN KEY (`concert_idConcert`) REFERENCES `concert` (`idConcert`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `concert_has_utilisateur`
--
ALTER TABLE `concert_has_utilisateur`
  ADD CONSTRAINT `fk_avis_concert` FOREIGN KEY (`avis_idAvis`) REFERENCES `avis` (`idAvis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_concert_utilisateur` FOREIGN KEY (`concert_idConcert`) REFERENCES `concert` (`idConcert`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_concert` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `preference_utilisateur`
--
ALTER TABLE `preference_utilisateur`
  ADD CONSTRAINT `fk_artiste_preference` FOREIGN KEY (`artiste_idArtiste`) REFERENCES `artiste` (`idArtiste`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_reponse_faq` FOREIGN KEY (`faq_idFaq`) REFERENCES `faq` (`idfaq`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `fk_salle_capteur_sonore` FOREIGN KEY (`capteur_sonore_idCapteur_sonore`) REFERENCES `capteur_sonore` (`idCapteur_sonore`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_Abonnement1` FOREIGN KEY (`abonnement_idAbonnement`) REFERENCES `abonnement` (`idAbonnement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur_has_concert`
--
ALTER TABLE `utilisateur_has_concert`
  ADD CONSTRAINT `fk_concert_utilisateur3` FOREIGN KEY (`concert_idConcert`) REFERENCES `concert` (`idConcert`),
  ADD CONSTRAINT `fk_utilisateur_concert3` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_ticket` FOREIGN KEY (`ticket_idTicket`) REFERENCES `ticket` (`idTicket`);

--
-- Contraintes pour la table `utilisateur_has_preference_utilisateur`
--
ALTER TABLE `utilisateur_has_preference_utilisateur`
  ADD CONSTRAINT `fk_preference_utilisateur` FOREIGN KEY (`preference_utilisateur_idPreference_utilisateur`) REFERENCES `preference_utilisateur` (`idPreference_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_preference` FOREIGN KEY (`utilisateur_idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
