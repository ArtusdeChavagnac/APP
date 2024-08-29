set @old_unique_checks=@@unique_checks, unique_checks=0;
set @old_foreign_key_checks=@@foreign_key_checks, foreign_key_checks=0;
set @old_sql_mode=@@sql_mode, sql_mode='only_full_group_by,strict_trans_tables,no_zero_in_date,no_zero_date,error_for_division_by_zero,no_engine_substitution';
create table if not exists `abonnement` (
`idabonnement` int not null,
`type d'abonnement` varchar(45) not null,
`fonctionalité` varchar(45) not null,
`cout` varchar(45) not null,
`date début` varchar(45) null,
`date fin` varchar(45) null,
primary key (`idabonnement`))
engine = innodb;
create table if not exists `utilisateur` (
`idutilisateur` int not null,
`nom` varchar(45) not null,
`prénom` varchar(45) not null,
`date de naissance` varchar(45) not null,
`adresse email` varchar(45) binary not null,
`numéro de téléphone` varchar(45) not null,
`abonnement_idabonnement` int not null,
primary key (`idutilisateur`, `abonnement_idabonnement`),
constraint `fk_utilisateur_abonnement1`
foreign key (`abonnement_idabonnement`)
references `abonnement` (`idabonnement`)
on delete no action
on update no action)
engine = innodb;
create table if not exists `artiste` (
`idartiste` int not null,
`nom` varchar(45) not null,
`prénom` varchar(45) not null,
`pseudo` varchar(45) null,
`adresse email` varchar(45) not null,
`numéro de téléphone` varchar(45) not null,
`style de musique` varchar(45) not null,
primary key (`idartiste`))
engine = innodb;
create table if not exists `préférence utilisateur` (
`idpréférence utilisateur` int not null,
`style de musique` varchar(45) null,
`artiste_idartiste` int not null,
primary key (`idpréférence utilisateur`, `artiste_idartiste`),
constraint `fk_préférence utilisateur_artiste1`
foreign key (`artiste_idartiste`)
references `artiste` (`idartiste`)
on delete no action
on update no action)
engine = innodb;
create table if not exists `ticket` (
`idticket` int not null,
`place` varchar(45) null,
primary key (`idticket`))
engine = innodb;
create table if not exists `avis` (
`idavis` int null,
`critique` varchar(45) null,
`note` varchar(45) null,
`date` varchar(45) null,
primary key (`idavis`))
engine = innodb;
create table if not exists `capteur sonore` (
`idcapteur sonore` int not null,
`position` varchar(45) not null,
`date` varchar(45) not null,
`niveau sonore` varchar(45) not null,
primary key (`idcapteur sonore`))
engine = innodb;
create table if not exists `salle` (
`idsalle` int not null,
`adresse` varchar(45) not null,
`carte sonore` varchar(45) null,
`capteur sonore_idcapteur sonore` int not null,
primary key (`idsalle`, `capteur sonore_idcapteur sonore`),
constraint `fk_salle_capteur sonore1`
foreign key (`capteur sonore_idcapteur sonore`)
references `capteur sonore` (`idcapteur sonore`)
on delete no action
on update no action)
engine = innodb;
create table if not exists `concert` (
`idconcert` int not null,
`date` varchar(45) not null,
`durée` varchar(45) not null,
`heure début` varchar(45) not null,
`utilisateur_idutilisateur` int not null,
`utilisateur_abonnement_idabonnement` int not null,
`utilisateur_concert_idconcert` int not null,
`salle_idsalle` int not null,
primary key (`idconcert`, `utilisateur_idutilisateur`, `utilisateur_abonnement_idabonnement`, `utilisateur_concert_idconcert`, `salle_idsalle`),
constraint `fk_concert_salle1`
foreign key (`salle_idsalle`)
references `salle` (`idsalle`)
on delete no action
on update no action)
engine = innodb;
create table if not exists `administrateur` (
`idadministrateur` int not null,
`nom` varchar(45) not null,
`prénom` varchar(45) not null,
`expérience` varchar(45) null,
primary key (`idadministrateur`))
engine = innodb;
create table if not exists `utilisateur_has_concert` (
`utilisateur_idutilisateur` int not null,
`utilisateur_abonnement_idabonnement` int not null,
`concert_idconcert` int not null,
`concert_utilisateur_idutilisateur` int not null,
`concert_utilisateur_abonnement_idabonnement` int not null,
`concert_utilisateur_concert_idconcert` int not null,
`ticket_idticket` int not null,
primary key (`utilisateur_idutilisateur`, `utilisateur_abonnement_idabonnement`, `concert_idconcert`, `concert_utilisateur_idutilisateur`, `concert_utilisateur_abonnement_idabonnement`, `concert_utilisateur_concert_idconcert`, `ticket_idticket`),
constraint `fk_utilisateur_has_concert_utilisateur1`
foreign key (`utilisateur_idutilisateur` , `utilisateur_abonnement_idabonnement`)
references `utilisateur` (`idutilisateur` , `abonnement_idabonnement`)
on delete no action
on update no action,
constraint `fk_utilisateur_has_concert_concert1`
foreign key (`concert_idconcert` , `concert_utilisateur_idutilisateur` , `concert_utilisateur_abonnement_idabonnement` , `concert_utilisateur_concert_idconcert`)
references `concert` (`idconcert` , `utilisateur_idutilisateur` , `utilisateur_abonnement_idabonnement` , `utilisateur_concert_idconcert`)
on delete no action
on update no action,
constraint `fk_utilisateur_has_concert_ticket1`
foreign key (`ticket_idticket`)
references `ticket` (`idticket`)
on delete no action
on update no action)
engine = innodb;
create table if not exists `concert_has_utilisateur` (
`concert_idconcert` int not null,
`concert_utilisateur_idutilisateur` int not null,
`concert_utilisateur_abonnement_idabonnement` int not null,
`concert_utilisateur_concert_idconcert` int not null,
`utilisateur_idutilisateur` int not null,
`utilisateur_abonnement_idabonnement` int not null,
`avis_idavis` int not null,
primary key (`concert_idconcert`, `concert_utilisateur_idutilisateur`, `concert_utilisateur_abonnement_idabonnement`, `concert_utilisateur_concert_idconcert`, `utilisateur_idutilisateur`, `utilisateur_abonnement_idabonnement`, `avis_idavis`),
constraint `fk_concert_has_utilisateur_concert1`
foreign key (`concert_idconcert` , `concert_utilisateur_idutilisateur` , `concert_utilisateur_abonnement_idabonnement` , `concert_utilisateur_concert_idconcert`)
references `concert` (`idconcert` , `utilisateur_idutilisateur` , `utilisateur_abonnement_idabonnement` , `utilisateur_concert_idconcert`)
on delete no action
on update no action,
constraint `fk_concert_has_utilisateur_utilisateur1`
foreign key (`utilisateur_idutilisateur` , `utilisateur_abonnement_idabonnement`)
references `utilisateur` (`idutilisateur` , `abonnement_idabonnement`)
on delete no action
on update no action,
constraint `fk_concert_has_utilisateur_avis1`
foreign key (`avis_idavis`)
references `avis` (`idavis`)
on delete no action
on update no action)
engine = innodb;
create table if not exists `administrateur_has_capteur sonore` (
`administrateur_idadministrateur` int not null,
`capteur sonore_idcapteur sonore` int not null,
`carte sonore` varchar(45) null,
`informations` varchar(45) null,
primary key (`administrateur_idadministrateur`, `capteur sonore_idcapteur sonore`),
constraint `fk_administrateur_has_capteur sonore_administrateur1`
foreign key (`administrateur_idadministrateur`)
references `administrateur` (`idadministrateur`)
on delete no action
on update no action,
constraint `fk_administrateur_has_capteur sonore_capteur sonore1`
foreign key (`capteur sonore_idcapteur sonore`)
references `capteur sonore` (`idcapteur sonore`)
on delete no action
on update no action)
engine = innodb;
create table if not exists `concert_has_artiste` (
`concert_idconcert` int not null,
`concert_utilisateur_idutilisateur` int not null,
`concert_utilisateur_abonnement_idabonnement` int not null,
`concert_utilisateur_concert_idconcert` int not null,
`artiste_idartiste` int not null,
primary key (`concert_idconcert`, `concert_utilisateur_idutilisateur`, `concert_utilisateur_abonnement_idabonnement`, `concert_utilisateur_concert_idconcert`, `artiste_idartiste`),
constraint `fk_concert_has_artiste_concert1`
foreign key (`concert_idconcert` , `concert_utilisateur_idutilisateur` , `concert_utilisateur_abonnement_idabonnement` , `concert_utilisateur_concert_idconcert`)
references `concert` (`idconcert` , `utilisateur_idutilisateur` , `utilisateur_abonnement_idabonnement` , `utilisateur_concert_idconcert`)
on delete no action
on update no action,
constraint `fk_concert_has_artiste_artiste1`
foreign key (`artiste_idartiste`)
references `artiste` (`idartiste`)
on delete no action
on update no action)
engine = innodb;
create table if not exists `utilisateur_has_préférence utilisateur` (
`utilisateur_idutilisateur` int not null,
`utilisateur_abonnement_idabonnement` int not null,
`préférence utilisateur_idpréférence utilisateur` int not null,
`préférence utilisateur_artiste_idartiste` int not null,
primary key (`utilisateur_idutilisateur`, `utilisateur_abonnement_idabonnement`, `préférence utilisateur_idpréférence utilisateur`, `préférence utilisateur_artiste_idartiste`),
constraint `fk_utilisateur_has_préférence utilisateur_utilisateur1`
foreign key (`utilisateur_idutilisateur` , `utilisateur_abonnement_idabonnement`)
references `utilisateur` (`idutilisateur` , `abonnement_idabonnement`)
on delete no action
on update no action,
constraint `fk_utilisateur_has_préférence utilisateur_préférence util1`
foreign key (`préférence utilisateur_idpréférence utilisateur` , `préférence utilisateur_artiste_idartiste`)
references `préférence utilisateur` (`idpréférence utilisateur` , `artiste_idartiste`)
on delete no action
on update no action)
engine = innodb;
set sql_mode=@old_sql_mode;
set foreign_key_checks=@old_foreign_key_checks;
set unique_checks=@old_unique_checks;