-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 jan. 2024 à 20:22
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
  `pseudo` varchar(45) DEFAULT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse_email` varchar(45) NOT NULL,
  `numero_de_telephone` varchar(10) NOT NULL,
  `style_de_musique` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`idArtiste`, `pseudo`, `nom`, `prenom`, `adresse_email`, `numero_de_telephone`, `style_de_musique`) VALUES
(1, 'Travis Scott', 'Scott', 'Travis', 'example@gmail.com', '0111111111', 'Rap'),
(4, 'DJ Snake', 'Grigahcine', 'William', 'example1@gmail.com', '0111111112', 'Rap'),
(5, 'Booba', 'Yaffa', 'Elie', 'example2@gmail.com', '0111111113', 'Rap'),
(6, 'Rainbow Sisters', 'Chapin', 'Erin', 'example3@gmail.com', '0111111114', 'Accoustic'),
(7, 'Sloane', 'Richard', 'Chantal', 'example4@gmail.com', '0111111115', '80\'s');

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
(1, 'Opera Garnier', '2024-01-01', '30'),
(2, 'Olympia', '2024-01-21', '75'),
(3, 'Stade de France', '2024-01-22', '71'),
(4, 'Seine musicale', '2024-01-20', '60'),
(5, 'Bercy', '2024-01-25', '92');

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
(1, 'images/imgconcert/img1.jpg', '2024-01-19', 243, 1800, 1),
(2, 'images/imgconcert/img2.jpg', '2024-01-23', 315, 1900, 5),
(3, 'images/imgconcert/img3.jpg', '2024-01-27', 430, 1730, 4),
(4, 'images/imgconcert/img4.jpg', '2024-01-20', 265, 1800, 2),
(5, 'images/imgconcert/img5.jpg', '2024-01-29', 289, 1745, 1),
(7, 'images/imgconcert/img6.jpg', '2024-01-23', 265, 1745, 3);

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
(1, 1, 1),
(2, 2, 6),
(3, 2, 7),
(4, 3, 4),
(5, 4, 7),
(6, 5, 5),
(7, 7, 4);

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
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `question` varchar(1028) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `question`, `user_id`) VALUES
(1, 'Combien coute l\'abonnement premium', 1),
(2, 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `idPartenaires` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `siret` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`idPartenaires`, `nom`, `mail`, `siret`) VALUES
(1, 'Société Générale', 'societegenerale@gmail.com', '552 120 222 00013'),
(2, 'Orange', 'orange@gmail.com', '380 129 866'),
(3, 'Google', 'gmail@gmail.com', '443 061 841'),
(4, 'Tesla', 'tesla@gmail.com', '524 335 262 00431'),
(5, 'OpenAI', 'chatgpt@gmail.com', '443 061 841 00047');

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
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `reponse` varchar(1024) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id`, `question_id`, `reponse`, `user_id`) VALUES
(1, 1, 'Beaucoup', 1),
(2, 1, 'oui', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponse_faq`
--

CREATE TABLE `reponse_faq` (
  `idReponse` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date` date NOT NULL,
  `faq_idFaq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `reponse_faq`
--

INSERT INTO `reponse_faq` (`idReponse`, `texte`, `date`, `faq_idFaq`) VALUES
(1, 'Nous acceptons les paiements par carte bancaire, virement et espèces.', '2024-01-02', 1),
(2, 'Pour annuler votre réservation, veuillez nous contacter par téléphone ou par email au moins 48 heures à l\'avance.', '2024-01-02', 2),
(3, 'Oui, nous offrons des réductions spéciales pour les étudiants sur présentation d\'une carte étudiante valide.', '2024-01-02', 3);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `idSalle` int(11) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  `capteur_sonore_idCapteur_sonore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idSalle`, `adresse`, `capteur_sonore_idCapteur_sonore`) VALUES
(1, '8 Rue Scribe, 75009 Paris', 1),
(2, '28 Bd des Capucines, 75009 Paris', 2),
(3, 'Stade de France 93200 Saint-Denis', 3),
(4, 'La Seine Musicale, Île Seguin, 92100 Boulogne-Billancourt', 4),
(5, '8 Bd de Bercy, 75012 Paris', 5);

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
(1, 'normale'),
(2, 'VIP');

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
  `mot_de_passe` varchar(255) NOT NULL,
  `abonnement_idAbonnement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `date_de_naissance`, `adresse_email`, `numero_de_telephone`, `mot_de_passe`, `abonnement_idAbonnement`) VALUES
(1, 'de Corta', 'Etienne', '2002-10-25', 'etienne.corta@gmail.com', '0652986299', '$2y$10$jBtq.A1qCUOWwemNRGQxveX./m61ms9e25pQd89I8rbLb8h5NcrZq', 2),
(2, 'Dupont', 'Jean', '2002-10-25', 'jeandupont@gmail.com', '0611223344', '$2y$10$zqhuzRkLkxyGxF.u27JnU.9Fvg0z2bT.I6nbElgJAO/2Hs0PWWFwy', 1),
(3, 'De Corta', 'Étienne', '2002-10-25', 'titousteam@gmail.com', '0652986299', '$2y$10$zqhuzRkLkxyGxF.u27JnU.9Fvg0z2bT.I6nbElgJAO/2Hs0PWWFwy', 1),
(5, 'Admin', 'Sonotech', '2023-10-21', 'sonotech@gmail.com', '0606060606', '$2y$10$NMFccX0NMJNNf84tAaXzge1iioQ7L6ZBCjMEs/vSUVbY0r7Q7JMGq', 2);

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
(1, 2, 1, 1),
(43, 3, 3, 1),
(44, 3, 3, 1),
(45, 3, 3, 1),
(46, 2, 4, 2),
(47, 2, 7, 2),
(48, 2, 7, 2),
(49, 2, 7, 2);

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
  ADD PRIMARY KEY (`idAmdinistrateur_has_capteur`,`capteur_sonore_idCapteur_sonore`,`administrateur_idAdministrateur`) USING BTREE,
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
  ADD PRIMARY KEY (`idConcert_has_utilisateur`,`concert_idConcert`,`utilisateur_idUtilisateur`,`avis_idAvis`) USING BTREE,
  ADD KEY `fk_avis_concert` (`avis_idAvis`) USING BTREE,
  ADD KEY `fk_utilisateur_concert` (`utilisateur_idUtilisateur`,`concert_idConcert`) USING BTREE,
  ADD KEY `fk_concert_utilisateur` (`concert_idConcert`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idfaq`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`,`user_id`) USING BTREE,
  ADD KEY `fk_utilisateur_forum` (`user_id`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`idPartenaires`);

--
-- Index pour la table `preference_utilisateur`
--
ALTER TABLE `preference_utilisateur`
  ADD PRIMARY KEY (`idPreference_utilisateur`,`artiste_idArtiste`),
  ADD KEY `fk_artiste_preference` (`artiste_idArtiste`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`,`user_id`) USING BTREE,
  ADD KEY `fk_utilisateur_reponse_forum` (`user_id`);

--
-- Index pour la table `reponse_faq`
--
ALTER TABLE `reponse_faq`
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
  ADD PRIMARY KEY (`idUtilisateur_has_concert`,`concert_idConcert`,`ticket_idTicket`,`utilisateur_idUtilisateur`) USING BTREE,
  ADD KEY `fk_utilisateur_ticket` (`ticket_idTicket`),
  ADD KEY `fk_concert_utilisateur3` (`concert_idConcert`),
  ADD KEY `fk_utilisateur_concert3` (`utilisateur_idUtilisateur`) USING BTREE;

--
-- Index pour la table `utilisateur_has_preference_utilisateur`
--
ALTER TABLE `utilisateur_has_preference_utilisateur`
  ADD PRIMARY KEY (`idUtilisateur_has_preference_utilisateur`,`preference_utilisateur_idPreference_utilisateur`,`utilisateur_idUtilisateur`) USING BTREE,
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
-- AUTO_INCREMENT pour la table `administrateur_has_capteur_sonore`
--
ALTER TABLE `administrateur_has_capteur_sonore`
  MODIFY `idAmdinistrateur_has_capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `idArtiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `capteur_sonore`
--
ALTER TABLE `capteur_sonore`
  MODIFY `idCapteur_sonore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `concert`
--
ALTER TABLE `concert`
  MODIFY `idConcert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `concert_has_artiste`
--
ALTER TABLE `concert_has_artiste`
  MODIFY `idConcert_has_artiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `concert_has_utilisateur`
--
ALTER TABLE `concert_has_utilisateur`
  MODIFY `idConcert_has_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idfaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `idPartenaires` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `preference_utilisateur`
--
ALTER TABLE `preference_utilisateur`
  MODIFY `idPreference_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reponse_faq`
--
ALTER TABLE `reponse_faq`
  MODIFY `idReponse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `idSalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur_has_concert`
--
ALTER TABLE `utilisateur_has_concert`
  MODIFY `idUtilisateur_has_concert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `utilisateur_has_preference_utilisateur`
--
ALTER TABLE `utilisateur_has_preference_utilisateur`
  MODIFY `idUtilisateur_has_preference_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `fk_utilisateur_forum` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `preference_utilisateur`
--
ALTER TABLE `preference_utilisateur`
  ADD CONSTRAINT `fk_artiste_preference` FOREIGN KEY (`artiste_idArtiste`) REFERENCES `artiste` (`idArtiste`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `fk_utilisateur_reponse_forum` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reponse_faq`
--
ALTER TABLE `reponse_faq`
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
