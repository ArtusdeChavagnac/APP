-- Configuration des paramètres de la session
SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'ONLY_FULL_GROUP_BY, STRICT_TRANS_TABLES, NO_ZERO_IN_DATE, NO_ZERO_DATE, ERROR_FOR_DIVISION_BY_ZERO, NO_ENGINE_SUBSTITUTION';
CREATE SCHEMA IF NOT EXISTS `Base_de_données` DEFAULT CHARACTER SET utf8;
USE `Base_de_données`;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Abonnement` (
`id_Abonnement` INT NOT NULL,
`Type_abonnement` VARCHAR(45) NOT NULL,
`Fonctionalité` VARCHAR(45) NOT NULL,
`Coût` VARCHAR(45) NOT NULL,
`Date_début` VARCHAR(45) NULL,
`Date_fin` VARCHAR(45) NULL,
PRIMARY KEY (`id_Abonnement`)
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Utilisateur` (
`id_Utilisateur` INT NOT NULL,
`Nom` VARCHAR(45) NOT NULL,
`Prénom` VARCHAR(45) NOT NULL,
`Date_de_naissance` VARCHAR(45) NOT NULL,
`Adresse_email` VARCHAR(45) BINARY NOT NULL,
`Numéro_de_téléphone` VARCHAR(45) NOT NULL,
`Abonnement_id_Abonnement` INT NOT NULL,
PRIMARY KEY (`id_Utilisateur`, `Abonnement_id_Abonnement`),
UNIQUE INDEX `Numéro_de_téléphone_UNIQUE` (`Numéro_de_téléphone` ASC),
INDEX `fk_Utilisateur_Abonnement1_idx` (`Abonnement_id_Abonnement` ASC),
CONSTRAINT `fk_Utilisateur_Abonnement1`
FOREIGN KEY (`Abonnement_id_Abonnement`)
REFERENCES `Base_de_données`.`Abonnement` (`id_Abonnement`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Artiste` (
`id_Artiste` INT NOT NULL,
`Nom` VARCHAR(45) NOT NULL,
`Prénom` VARCHAR(45) NOT NULL,
`Pseudo` VARCHAR(45) NULL,
`Adresse_email` VARCHAR(45) NOT NULL,
`Numéro_de_téléphone` VARCHAR(45) NOT NULL,
`Style_de_musique` VARCHAR(45) NOT NULL,
PRIMARY KEY (`id_Artiste`),
UNIQUE INDEX `Numéro_de_téléphone_UNIQUE` (`Numéro_de_téléphone` ASC),
UNIQUE INDEX `Adresse_email_UNIQUE` (`Adresse_email` ASC),
UNIQUE INDEX `Pseudo_UNIQUE` (`Pseudo` ASC)
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Préférences_utilisateur` (
`id_Préférences_utilisateur` INT NOT NULL,
`Style_de_musique` VARCHAR(45) NULL,
`Artiste_id_Artiste` INT NOT NULL,
PRIMARY KEY (`id_Préférences_utilisateur`, `Artiste_id_Artiste`),
INDEX `fk_Préférences_utilisateur_Artiste1_idx` (`Artiste_id_Artiste` ASC),
CONSTRAINT `fk_Préférences_utilisateur_Artiste1`
FOREIGN KEY (`Artiste_id_Artiste`)
REFERENCES `Base_de_données`.`Artiste` (`id_Artiste`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Billet` (
`id_Billet` INT NOT NULL,
`Place` VARCHAR(45) NULL,
PRIMARY KEY (`id_Billet`)
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Avis` (
`id_Avis` INT NULL,
`Critique` VARCHAR(45) NULL,
`Note` VARCHAR(45) NULL,
`Date` VARCHAR(45) NULL,
PRIMARY KEY (`id_Avis`)
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Capteur_sonore` (
`id_Capteur_sonore` INT NOT NULL,
`Position` VARCHAR(45) NOT NULL,
`Date` VARCHAR(45) NOT NULL,
`Niveau_sonore` VARCHAR(45) NOT NULL,
PRIMARY KEY (`id_Capteur_sonore`)
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Salle` (
`id_Salle` INT NOT NULL,
`Adresse` VARCHAR(45) NOT NULL,
`Carte_sonore` VARCHAR(45) NULL,
`Capteur_sonore_id_Capteur_sonore` INT NOT NULL,
PRIMARY KEY (`id_Salle`, `Capteur_sonore_id_Capteur_sonore`),
UNIQUE INDEX `Adresse_UNIQUE` (`Adresse` ASC),
UNIQUE INDEX `Carte_sonore_UNIQUE` (`Carte_sonore` ASC),
INDEX `fk_Salle_Capteur_sonore1_idx` (`Capteur_sonore_id_Capteur_sonore` ASC),
CONSTRAINT `fk_Salle_Capteur_sonore1`
FOREIGN KEY (`Capteur_sonore_id_Capteur_sonore`)
REFERENCES `Base_de_données`.`Capteur_sonore` (`id_Capteur_sonore`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Concert` (
`id_Concert` INT NOT NULL,
`Date` VARCHAR(45) NOT NULL,
`Durée` VARCHAR(45) NOT NULL,
`Heure_de_début` VARCHAR(45) NOT NULL,
`Utilisateur_id_Utilisateur` INT NOT NULL,
`Utilisateur_Abonnement_id_Abonnement` INT NOT NULL,
`Utilisateur_Concert_id_Concert` INT NOT NULL,
`Salle_id_Salle` INT NOT NULL,
PRIMARY KEY (
`id_Concert`,
`Utilisateur_id_Utilisateur`,
`Utilisateur_Abonnement_id_Abonnement`,
`Utilisateur_Concert_id_Concert`,
`Salle_id_Salle`
),
INDEX `fk_Concert_Salle1_idx` (`Salle_id_Salle` ASC),
CONSTRAINT `fk_Concert_Salle1`
FOREIGN KEY (`Salle_id_Salle`)
REFERENCES `Base_de_données`.`Salle` (`id_Salle`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Administrateur` (
`id_Administrateur` INT NOT NULL,
`Nom` VARCHAR(45) NOT NULL,
`Prénom` VARCHAR(45) NOT NULL,
`Expérience` VARCHAR(45) NULL,
PRIMARY KEY (`id_Administrateur`)
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Utilisateur_has_Concert` (
`Utilisateur_id_Utilisateur` INT NOT NULL,
`Utilisateur_Abonnement_id_Abonnement` INT NOT NULL,
`Concert_id_Concert` INT NOT NULL,
`Concert_Utilisateur_id_Utilisateur` INT NOT NULL,
`Concert_Utilisateur_Abonnement_id_Abonnement` INT NOT NULL,
`Concert_Utilisateur_Concert_id_Concert` INT NOT NULL,
`Billet_id_Billet` INT NOT NULL,
PRIMARY KEY (
`Utilisateur_id_Utilisateur`,
`Utilisateur_Abonnement_id_Abonnement`,
`Concert_id_Concert`,
`Concert_Utilisateur_id_Utilisateur`,
`Concert_Utilisateur_Abonnement_id_Abonnement`,
`Concert_Utilisateur_Concert_id_Concert`,
`Billet_id_Billet`
),
INDEX `fk_Utilisateur_has_Concert_Concert1_idx` (
`Concert_id_Concert` ASC,
`Concert_Utilisateur_id_Utilisateur` ASC,
`Concert_Utilisateur_Abonnement_id_Abonnement` ASC,
`Concert_Utilisateur_Concert_id_Concert` ASC
),
INDEX `fk_Utilisateur_has_Concert_Utilisateur1_idx` (
`Utilisateur_id_Utilisateur` ASC,
`Utilisateur_Abonnement_id_Abonnement` ASC
),
INDEX `fk_Utilisateur_has_Concert_Billet1_idx` (`Billet_id_Billet` ASC),
CONSTRAINT `fk_Utilisateur_has_Concert_Utilisateur1`
FOREIGN KEY (`Utilisateur_id_Utilisateur`, `Utilisateur_Abonnement_id_Abonnement`)
REFERENCES `Base_de_données`.`Utilisateur` (`id_Utilisateur`, `Abonnement_id_Abonnement`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Utilisateur_has_Concert_Concert1`
FOREIGN KEY (
`Concert_id_Concert`,
`Concert_Utilisateur_id_Utilisateur`,
`Concert_Utilisateur_Abonnement_id_Abonnement`,
`Concert_Utilisateur_Concert_id_Concert`
)
REFERENCES `Base_de_données`.`Concert` (
`id_Concert`,
`Utilisateur_id_Utilisateur`,
`Utilisateur_Abonnement_id_Abonnement`,
`Utilisateur_Concert_id_Concert`
)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Utilisateur_has_Concert_Billet1`
FOREIGN KEY (`Billet_id_Billet`)
REFERENCES `Base_de_données`.`Billet` (`id_Billet`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Concert_has_Utilisateur` (
`Concert_id_Concert` INT NOT NULL,
`Concert_Utilisateur_id_Utilisateur` INT NOT NULL,
`Concert_Utilisateur_Abonnement_id_Abonnement` INT NOT NULL,
`Concert_Utilisateur_Concert_id_Concert` INT NOT NULL,
`Utilisateur_id_Utilisateur` INT NOT NULL,
`Utilisateur_Abonnement_id_Abonnement` INT NOT NULL,
`Avis_id_Avis` INT NOT NULL,
PRIMARY KEY (
`Concert_id_Concert`,
`Concert_Utilisateur_id_Utilisateur`,
`Concert_Utilisateur_Abonnement_id_Abonnement`,
`Concert_Utilisateur_Concert_id_Concert`,
`Utilisateur_id_Utilisateur`,
`Utilisateur_Abonnement_id_Abonnement`,
`Avis_id_Avis`
),
INDEX `fk_Concert_has_Utilisateur_Utilisateur1_idx` (
`Utilisateur_id_Utilisateur` ASC,
`Utilisateur_Abonnement_id_Abonnement` ASC
),
INDEX `fk_Concert_has_Utilisateur_Concert1_idx` (
`Concert_id_Concert` ASC,
`Concert_Utilisateur_id_Utilisateur` ASC,
`Concert_Utilisateur_Abonnement_id_Abonnement` ASC,
`Concert_Utilisateur_Concert_id_Concert` ASC
),
INDEX `fk_Concert_has_Utilisateur_Avis1_idx` (`Avis_id_Avis` ASC),
CONSTRAINT `fk_Concert_has_Utilisateur_Concert1`
FOREIGN KEY (
`Concert_id_Concert`,
`Concert_Utilisateur_id_Utilisateur`,
`Concert_Utilisateur_Abonnement_id_Abonnement`,
`Concert_Utilisateur_Concert_id_Concert`
)
REFERENCES `Base_de_données`.`Concert` (
`id_Concert`,
`Utilisateur_id_Utilisateur`,
`Utilisateur_Abonnement_id_Abonnement`,
`Utilisateur_Concert_id_Concert`
)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Concert_has_Utilisateur_Utilisateur1`
FOREIGN KEY (`Utilisateur_id_Utilisateur`, `Utilisateur_Abonnement_id_Abonnement`)
REFERENCES `Base_de_données`.`Utilisateur` (`id_Utilisateur`, `Abonnement_id_Abonnement`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Concert_has_Utilisateur_Avis1`
FOREIGN KEY (`Avis_id_Avis`)
REFERENCES `Base_de_données`.`Avis` (`id_Avis`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Administrateur_has_Capteur_sonore` (
`Administrateur_id_Administrateur` INT NOT NULL,
`Capteur_sonore_id_Capteur_sonore` INT NOT NULL,
`Carte_sonore` VARCHAR(45) NULL,
`Informations` VARCHAR(45) NULL,
PRIMARY KEY (`Administrateur_id_Administrateur`, `Capteur_sonore_id_Capteur_sonore`),
INDEX `fk_Administrateur_has_Capteur_sonore_Capteur_sonore1_idx` (`Capteur_sonore_id_Capteur_sonore` ASC),
INDEX `fk_Administrateur_has_Capteur_sonore_Administrateur1_idx` (`Administrateur_id_Administrateur` ASC),
UNIQUE INDEX `Carte_sonore_UNIQUE` (`Carte_sonore` ASC),
UNIQUE INDEX `Administrateur_has_Capteur_sonorecol_UNIQUE` (`Informations` ASC),
CONSTRAINT `fk_Administrateur_has_Capteur_sonore_Administrateur1`
FOREIGN KEY (`Administrateur_id_Administrateur`)
REFERENCES `Base_de_données`.`Administrateur` (`id_Administrateur`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Administrateur_has_Capteur_sonore_Capteur_sonore1`
FOREIGN KEY (`Capteur_sonore_id_Capteur_sonore`)
REFERENCES `Base_de_données`.`Capteur_sonore` (`id_Capteur_sonore`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Concert_has_Artiste` (
`Concert_id_Concert` INT NOT NULL,
`Concert_Utilisateur_id_Utilisateur` INT NOT NULL,
`Concert_Utilisateur_Abonnement_id_Abonnement` INT NOT NULL,
`Concert_Utilisateur_Concert_id_Concert` INT NOT NULL,
`Artiste_id_Artiste` INT NOT NULL,
PRIMARY KEY (
`Concert_id_Concert`,
`Concert_Utilisateur_id_Utilisateur`,
`Concert_Utilisateur_Abonnement_id_Abonnement`,
`Concert_Utilisateur_Concert_id_Concert`,
`Artiste_id_Artiste`
),
INDEX `fk_Concert_has_Artiste_Artiste1_idx` (`Artiste_id_Artiste` ASC),
INDEX `fk_Concert_has_Artiste_Concert1_idx` (
`Concert_id_Concert` ASC,
`Concert_Utilisateur_id_Utilisateur` ASC,
`Concert_Utilisateur_Abonnement_id_Abonnement` ASC,
`Concert_Utilisateur_Concert_id_Concert` ASC
),
CONSTRAINT `fk_Concert_has_Artiste_Concert1`
FOREIGN KEY (
`Concert_id_Concert`,
`Concert_Utilisateur_id_Utilisateur`,
`Concert_Utilisateur_Abonnement_id_Abonnement`,
`Concert_Utilisateur_Concert_id_Concert`
)
REFERENCES `Base_de_données`.`Concert` (
`id_Concert`,
`Utilisateur_id_Utilisateur`,
`Utilisateur_Abonnement_id_Abonnement`,
`Utilisateur_Concert_id_Concert`
)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Concert_has_Artiste_Artiste1`
FOREIGN KEY (`Artiste_id_Artiste`)
REFERENCES `Base_de_données`.`Artiste` (`id_Artiste`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `Base_de_données`.`Utilisateur_has_Préférences_utilisateur` (
`Utilisateur_id_Utilisateur` INT NOT NULL,
`Utilisateur_Abonnement_id_Abonnement` INT NOT NULL,
`Préférences_utilisateur_id_Préférences_utilisateur` INT NOT NULL,
`Préférences_utilisateur_Artiste_id_Artiste` INT NOT NULL,
PRIMARY KEY (
`Utilisateur_id_Utilisateur`,
`Utilisateur_Abonnement_id_Abonnement`,
`Préférences_utilisateur_id_Préférences_utilisateur`,
`Préférences_utilisateur_Artiste_id_Artiste`
),
INDEX `fk_Utilisateur_has_Préférences_utilisateur_Préférence ut_idx` (
`Préférences_utilisateur_id_Préférences_utilisateur` ASC,
`Préférences_utilisateur_Artiste_id_Artiste` ASC
),
INDEX `fk_Utilisateur_has_Préférences_utilisateur_Utilisateur1_idx` (
`Utilisateur_id_Utilisateur` ASC,
`Utilisateur_Abonnement_id_Abonnement` ASC
),
CONSTRAINT `fk_Utilisateur_has_Préférences_utilisateur_Utilisateur1`
FOREIGN KEY (`Utilisateur_id_Utilisateur`, `Utilisateur_Abonnement_id_Abonnement`)
REFERENCES `Base_de_données`.`Utilisateur` (`id_Utilisateur`, `Abonnement_id_Abonnement`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Utilisateur_has_Préférences_utilisateur_Préférence util1`
FOREIGN KEY (`Préférences_utilisateur_id_Préférences_utilisateur`, `Préférences_utilisateur_Artiste_id_Artiste`)
REFERENCES `Base_de_données`.`Préférences_utilisateur` (`id_Préférences_utilisateur`, `Artiste_id_Artiste`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;
-- Restauration des paramètres de la session
SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;
-- Utilisation de types de données appropriés
-- Assurez-vous d'utiliser les types de données les plus appropriés pour chaque colonne. Par exemple, utilisez des types de date pour les colonnes de date au lieu de VARCHAR.
-- Utilisation de noms de colonnes sans espaces
-- Évitez d'utiliser des espaces dans les noms de colonnes. Utilisez plutôt une notation comme "nom_colonne" ou "nomColonne".
-- Utilisation de clés primaires auto-incrémentées
-- Pour les colonnes d'ID, vous pouvez utiliser des clés primaires auto-incrémentées (par exemple, id INT AUTO_INCREMENT PRIMARY KEY pour MySQL) au lieu de spécifier les valeurs manuellement.
-- Utilisation de FOREIGN KEY avec ON DELETE CASCADE
-- Selon la logique métier de votre application, vous pourriez envisager d'utiliser ON DELETE CASCADE pour les clés étrangères afin de maintenir la cohérence des données.
-- Gestion des contraintes UNIQUE
-- L'utilisation de contraintes UNIQUE sur des colonnes telles que "Numéro_de_téléphone" et "Adresse_email" est une bonne pratique, mais assurez-vous que cela correspond à vos besoins métier.
-- Normalisation de la base_de_données
-- En fonction des besoins de votre application, envisagez de normaliser davantage votre schéma de base_de_données pour éviter la redondance des données.
-- Assurez-vous également de tester soigneusement votre script SQL sur un environnement de test avant de l'appliquer à une base_de_données en production.