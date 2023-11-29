SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'ONLY_FULL_GROUP_BY, STRICT_TRANS_TABLES, NO_ZERO_IN_DATE, NO_ZERO_DATE, ERROR_FOR_DIVISION_BY_ZERO, NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Abonnement` (
	`idAbonnement` INT NOT NULL,
	`Type d'abonnement` VARCHAR(45) NOT NULL,
	`Fonctionalité` VARCHAR(45) NOT NULL,
	`Cout` VARCHAR(45) NOT NULL,
	`Date début` VARCHAR(45) NULL,
	`Date fin` VARCHAR(45) NULL,
	PRIMARY KEY (`idAbonnement`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Utilisateur` (
	`idUtilisateur` INT NOT NULL,
	`Nom` VARCHAR(45) NOT NULL,
	`Prénom` VARCHAR(45) NOT NULL,
	`Date de Naissance` VARCHAR(45) NOT NULL,
	`Adresse Email` VARCHAR(45) BINARY NOT NULL,
	`Numéro de Téléphone` VARCHAR(45) NOT NULL,
	`Abonnement_idAbonnement` INT NOT NULL,
	PRIMARY KEY (`idUtilisateur`, `Abonnement_idAbonnement`),
	UNIQUE INDEX `Numéro de Téléphone_UNIQUE` (`Numéro de Téléphone` ASC) VISIBLE,
	INDEX `fk_Utilisateur_Abonnement1_idx` (`Abonnement_idAbonnement` ASC) VISIBLE,
	CONSTRAINT `fk_Utilisateur_Abonnement1`
		FOREIGN KEY (`Abonnement_idAbonnement`)
		REFERENCES `mydb`.`Abonnement` (`idAbonnement`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Artiste` (
	`idArtiste` INT NOT NULL,
	`Nom` VARCHAR(45) NOT NULL,
	`Prénom` VARCHAR(45) NOT NULL,
	`Pseudo` VARCHAR(45) NULL,
	`Adresse Email` VARCHAR(45) NOT NULL,
	`Numéro de téléphone` VARCHAR(45) NOT NULL,
	`Style de musique` VARCHAR(45) NOT NULL,
	PRIMARY KEY (`idArtiste`),
	UNIQUE INDEX `Numéro de téléphone_UNIQUE` (`Numéro de téléphone` ASC) VISIBLE,
	UNIQUE INDEX `Adresse Email_UNIQUE` (`Adresse Email` ASC) VISIBLE,
	UNIQUE INDEX `Pseudo_UNIQUE` (`Pseudo` ASC) VISIBLE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Préférence utilisateur` (
	`idPréférence utilisateur` INT NOT NULL,
	`Style de musique` VARCHAR(45) NULL,
	`Artiste_idArtiste` INT NOT NULL,
	PRIMARY KEY (`idPréférence utilisateur`, `Artiste_idArtiste`),
	INDEX `fk_Préférence utilisateur_Artiste1_idx` (`Artiste_idArtiste` ASC) VISIBLE,
	CONSTRAINT `fk_Préférence utilisateur_Artiste1`
		FOREIGN KEY (`Artiste_idArtiste`)
		REFERENCES `mydb`.`Artiste` (`idArtiste`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Ticket` (
	`idTicket` INT NOT NULL,
	`Place` VARCHAR(45) NULL,
	PRIMARY KEY (`idTicket`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Avis` (
	`idAvis` INT NULL,
	`Critique` VARCHAR(45) NULL,
	`Note` VARCHAR(45) NULL,
	`Date` VARCHAR(45) NULL,
	PRIMARY KEY (`idAvis`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Capteur Sonore` (
	`idCapteur Sonore` INT NOT NULL,
	`Position` VARCHAR(45) NOT NULL,
	`Date` VARCHAR(45) NOT NULL,
	`Niveau sonore` VARCHAR(45) NOT NULL,
	PRIMARY KEY (`idCapteur Sonore`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Salle` (
	`idSalle` INT NOT NULL,
	`Adresse` VARCHAR(45) NOT NULL,
	`Carte Sonore` VARCHAR(45) NULL,
	`Capteur Sonore_idCapteur Sonore` INT NOT NULL,
	PRIMARY KEY (`idSalle`, `Capteur Sonore_idCapteur Sonore`),
	UNIQUE INDEX `Adresse_UNIQUE` (`Adresse` ASC) VISIBLE,
	UNIQUE INDEX `Carte Sonore_UNIQUE` (`Carte Sonore` ASC) VISIBLE,
	INDEX `fk_Salle_Capteur Sonore1_idx` (`Capteur Sonore_idCapteur Sonore` ASC) VISIBLE,
	CONSTRAINT `fk_Salle_Capteur Sonore1`
		FOREIGN KEY (`Capteur Sonore_idCapteur Sonore`)
		REFERENCES `mydb`.`Capteur Sonore` (`idCapteur Sonore`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Concert` (
	`idConcert` INT NOT NULL,
	`Date` VARCHAR(45) NOT NULL,
	`Durée` VARCHAR(45) NOT NULL,
	`Heure début` VARCHAR(45) NOT NULL,
	`Utilisateur_idUtilisateur` INT NOT NULL,
	`Utilisateur_Abonnement_idAbonnement` INT NOT NULL,
	`Utilisateur_Concert_idConcert` INT NOT NULL,
	`Salle_idSalle` INT NOT NULL,
	PRIMARY KEY (`idConcert`, `Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Utilisateur_Concert_idConcert`, `Salle_idSalle`),
	INDEX `fk_Concert_Salle1_idx` (`Salle_idSalle` ASC) VISIBLE,
	CONSTRAINT `fk_Concert_Salle1`
		FOREIGN KEY (`Salle_idSalle`)
		REFERENCES `mydb`.`Salle` (`idSalle`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Administrateur` (
	`idAdministrateur` INT NOT NULL,
	`Nom` VARCHAR(45) NOT NULL,
	`Prénom` VARCHAR(45) NOT NULL,
	`Expérience` VARCHAR(45) NULL,
	PRIMARY KEY (`idAdministrateur`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Utilisateur_has_Concert` (
	`Utilisateur_idUtilisateur` INT NOT NULL,
	`Utilisateur_Abonnement_idAbonnement` INT NOT NULL,
	`Concert_idConcert` INT NOT NULL,
	`Concert_Utilisateur_idUtilisateur` INT NOT NULL,
	`Concert_Utilisateur_Abonnement_idAbonnement` INT NOT NULL,
	`Concert_Utilisateur_Concert_idConcert` INT NOT NULL,
	`Ticket_idTicket` INT NOT NULL,
	PRIMARY KEY (`Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Concert_idConcert`, `Concert_Utilisateur_idUtilisateur`, `Concert_Utilisateur_Abonnement_idAbonnement`, `Concert_Utilisateur_Concert_idConcert`, `Ticket_idTicket`),
	INDEX `fk_Utilisateur_has_Concert_Concert1_idx` (`Concert_idConcert` ASC, `Concert_Utilisateur_idUtilisateur` ASC, `Concert_Utilisateur_Abonnement_idAbonnement` ASC, `Concert_Utilisateur_Concert_idConcert` ASC) VISIBLE,
	INDEX `fk_Utilisateur_has_Concert_Utilisateur1_idx` (`Utilisateur_idUtilisateur` ASC, `Utilisateur_Abonnement_idAbonnement` ASC) VISIBLE,
	INDEX `fk_Utilisateur_has_Concert_Ticket1_idx` (`Ticket_idTicket` ASC) VISIBLE,
	CONSTRAINT `fk_Utilisateur_has_Concert_Utilisateur1`
		FOREIGN KEY (`Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`)
		REFERENCES `mydb`.`Utilisateur` (`idUtilisateur`, `Abonnement_idAbonnement`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_Utilisateur_has_Concert_Concert1`
		FOREIGN KEY (`Concert_idConcert`, `Concert_Utilisateur_idUtilisateur`, `Concert_Utilisateur_Abonnement_idAbonnement`, `Concert_Utilisateur_Concert_idConcert`)
		REFERENCES `mydb`.`Concert` (`idConcert`, `Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Utilisateur_Concert_idConcert`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_Utilisateur_has_Concert_Ticket1`
		FOREIGN KEY (`Ticket_idTicket`)
		REFERENCES `mydb`.`Ticket` (`idTicket`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Concert_has_Utilisateur` (
	`Concert_idConcert` INT NOT NULL,
	`Concert_Utilisateur_idUtilisateur` INT NOT NULL,
	`Concert_Utilisateur_Abonnement_idAbonnement` INT NOT NULL,
	`Concert_Utilisateur_Concert_idConcert` INT NOT NULL,
	`Utilisateur_idUtilisateur` INT NOT NULL,
	`Utilisateur_Abonnement_idAbonnement` INT NOT NULL,
	`Avis_idAvis` INT NOT NULL,
	PRIMARY KEY (`Concert_idConcert`, `Concert_Utilisateur_idUtilisateur`, `Concert_Utilisateur_Abonnement_idAbonnement`, `Concert_Utilisateur_Concert_idConcert`, `Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Avis_idAvis`),
	INDEX `fk_Concert_has_Utilisateur_Utilisateur1_idx` (`Utilisateur_idUtilisateur` ASC, `Utilisateur_Abonnement_idAbonnement` ASC) VISIBLE,
	INDEX `fk_Concert_has_Utilisateur_Concert1_idx` (`Concert_idConcert` ASC, `Concert_Utilisateur_idUtilisateur` ASC, `Concert_Utilisateur_Abonnement_idAbonnement` ASC, `Concert_Utilisateur_Concert_idConcert` ASC) VISIBLE,
	INDEX `fk_Concert_has_Utilisateur_Avis1_idx` (`Avis_idAvis` ASC) VISIBLE,
	CONSTRAINT `fk_Concert_has_Utilisateur_Concert1`
		FOREIGN KEY (`Concert_idConcert`, `Concert_Utilisateur_idUtilisateur`, `Concert_Utilisateur_Abonnement_idAbonnement`, `Concert_Utilisateur_Concert_idConcert`)
		REFERENCES `mydb`.`Concert` (`idConcert`, `Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Utilisateur_Concert_idConcert`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_Concert_has_Utilisateur_Utilisateur1`
		FOREIGN KEY (`Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`)
		REFERENCES `mydb`.`Utilisateur` (`idUtilisateur`, `Abonnement_idAbonnement`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_Concert_has_Utilisateur_Avis1`
		FOREIGN KEY (`Avis_idAvis`)
		REFERENCES `mydb`.`Avis` (`idAvis`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Administrateur_has_Capteur Sonore` (
	`Administrateur_idAdministrateur` INT NOT NULL,
	`Capteur Sonore_idCapteur Sonore` INT NOT NULL,
	`Carte sonore` VARCHAR(45) NULL,
	`Informations` VARCHAR(45) NULL,
	PRIMARY KEY (`Administrateur_idAdministrateur`, `Capteur Sonore_idCapteur Sonore`),
	INDEX `fk_Administrateur_has_Capteur Sonore_Capteur Sonore1_idx` (`Capteur Sonore_idCapteur Sonore` ASC) VISIBLE,
	INDEX `fk_Administrateur_has_Capteur Sonore_Administrateur1_idx` (`Administrateur_idAdministrateur` ASC) VISIBLE,
	UNIQUE INDEX `Carte sonore_UNIQUE` (`Carte sonore` ASC) VISIBLE,
	UNIQUE INDEX `Administrateur_has_Capteur Sonorecol_UNIQUE` (`Informations` ASC) VISIBLE,
	CONSTRAINT `fk_Administrateur_has_Capteur Sonore_Administrateur1`
		FOREIGN KEY (`Administrateur_idAdministrateur`)
		REFERENCES `mydb`.`Administrateur` (`idAdministrateur`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_Administrateur_has_Capteur Sonore_Capteur Sonore1`
		FOREIGN KEY (`Capteur Sonore_idCapteur Sonore`)
		REFERENCES `mydb`.`Capteur Sonore` (`idCapteur Sonore`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Concert_has_Artiste` (
	`Concert_idConcert` INT NOT NULL,
	`Concert_Utilisateur_idUtilisateur` INT NOT NULL,
	`Concert_Utilisateur_Abonnement_idAbonnement` INT NOT NULL,
	`Concert_Utilisateur_Concert_idConcert` INT NOT NULL,
	`Artiste_idArtiste` INT NOT NULL,
	PRIMARY KEY (`Concert_idConcert`, `Concert_Utilisateur_idUtilisateur`, `Concert_Utilisateur_Abonnement_idAbonnement`, `Concert_Utilisateur_Concert_idConcert`, `Artiste_idArtiste`),
	INDEX `fk_Concert_has_Artiste_Artiste1_idx` (`Artiste_idArtiste` ASC) VISIBLE,
	INDEX `fk_Concert_has_Artiste_Concert1_idx` (`Concert_idConcert` ASC, `Concert_Utilisateur_idUtilisateur` ASC, `Concert_Utilisateur_Abonnement_idAbonnement` ASC, `Concert_Utilisateur_Concert_idConcert` ASC) VISIBLE,
	CONSTRAINT `fk_Concert_has_Artiste_Concert1`
		FOREIGN KEY (`Concert_idConcert`, `Concert_Utilisateur_idUtilisateur`, `Concert_Utilisateur_Abonnement_idAbonnement`, `Concert_Utilisateur_Concert_idConcert`)
		REFERENCES `mydb`.`Concert` (`idConcert`, `Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Utilisateur_Concert_idConcert`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_Concert_has_Artiste_Artiste1`
		FOREIGN KEY (`Artiste_idArtiste`)
		REFERENCES `mydb`.`Artiste` (`idArtiste`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Utilisateur_has_Préférence utilisateur` (
	`Utilisateur_idUtilisateur` INT NOT NULL,
	`Utilisateur_Abonnement_idAbonnement` INT NOT NULL,
	`Préférence utilisateur_idPréférence utilisateur` INT NOT NULL,
	`Préférence utilisateur_Artiste_idArtiste` INT NOT NULL,
	PRIMARY KEY (`Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`, `Préférence utilisateur_idPréférence utilisateur`, `Préférence utilisateur_Artiste_idArtiste`),
	INDEX `fk_Utilisateur_has_Préférence utilisateur_Préférence ut_idx` (`Préférence utilisateur_idPréférence utilisateur` ASC, `Préférence utilisateur_Artiste_idArtiste` ASC) VISIBLE,
	INDEX `fk_Utilisateur_has_Préférence utilisateur_Utilisateur1_idx` (`Utilisateur_idUtilisateur` ASC, `Utilisateur_Abonnement_idAbonnement` ASC) VISIBLE,
	CONSTRAINT `fk_Utilisateur_has_Préférence utilisateur_Utilisateur1`
		FOREIGN KEY (`Utilisateur_idUtilisateur`, `Utilisateur_Abonnement_idAbonnement`)
		REFERENCES `mydb`.`Utilisateur` (`idUtilisateur`, `Abonnement_idAbonnement`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_Utilisateur_has_Préférence utilisateur_Préférence util1`
		FOREIGN KEY (`Préférence utilisateur_idPréférence utilisateur`, `Préférence utilisateur_Artiste_idArtiste`)
		REFERENCES `mydb`.`Préférence utilisateur` (`idPréférence utilisateur`, `Artiste_idArtiste`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;
