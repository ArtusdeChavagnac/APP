set @old_unique_checks = @@unique_checks, unique_checks = 0;
set @old_foreign_key_checks = @@foreign_key_checks, foreign_key_checks = 0;
set @old_sql_mode = @@sql_mode, sql_mode = 'only_full_group_by, strict_trans_tables, no_zero_in_date, no_zero_date, error_for_division_by_zero, no_engine_substitution';
create schema if not exists `base_de_données` default character set utf8;
use `base_de_données`;
create table if not exists `base_de_données`.`abonnement` (
`id_abonnement` int not null,
`type_abonnement` varchar(45) not null,
`fonctionalité` varchar(45) not null,
`coût` varchar(45) not null,
`date_début` varchar(45) null,
`date_fin` varchar(45) null,
primary key (`id_abonnement`)
)
engine = innodb;
create table if not exists `base_de_données`.`utilisateur` (
`id_utilisateur` int not null,
`nom` varchar(45) not null,
`prénom` varchar(45) not null,
`date_de_naissance` varchar(45) not null,
`adresse_email` varchar(45) binary not null,
`numéro_de_téléphone` varchar(45) not null,
`abonnement_id_abonnement` int not null,
primary key (`id_utilisateur`, `abonnement_id_abonnement`),
unique index `numéro_de_téléphone_unique` (`numéro_de_téléphone` asc),
index `fk_utilisateur_abonnement1_idx` (`abonnement_id_abonnement` asc),
constraint `fk_utilisateur_abonnement1`
foreign key (`abonnement_id_abonnement`)
references `base_de_données`.`abonnement` (`id_abonnement`)
on delete no action
on update no action
)
engine = innodb;
create table if not exists `base_de_données`.`artiste` (
`id_artiste` int not null,
`nom` varchar(45) not null,
`prénom` varchar(45) not null,
`pseudo` varchar(45) null,
`adresse_email` varchar(45) not null,
`numéro_de_téléphone` varchar(45) not null,
`style_de_musique` varchar(45) not null,
primary key (`id_artiste`),
unique index `numéro_de_téléphone_unique` (`numéro_de_téléphone` asc),
unique index `adresse_email_unique` (`adresse_email` asc),
unique index `pseudo_unique` (`pseudo` asc)
)
engine = innodb;
create table if not exists `base_de_données`.`préférences_utilisateur` (
`id_préférences_utilisateur` int not null,
`style_de_musique` varchar(45) null,
`artiste_id_artiste` int not null,
primary key (`id_préférences_utilisateur`, `artiste_id_artiste`),
index `fk_préférences_utilisateur_artiste1_idx` (`artiste_id_artiste` asc),
constraint `fk_préférences_utilisateur_artiste1`
foreign key (`artiste_id_artiste`)
references `base_de_données`.`artiste` (`id_artiste`)
on delete no action
on update no action
)
engine = innodb;
create table if not exists `base_de_données`.`billet` (
`id_billet` int not null,
`place` varchar(45) null,
primary key (`id_billet`)
)
engine = innodb;
create table if not exists `base_de_données`.`avis` (
`id_avis` int null,
`critique` varchar(45) null,
`note` varchar(45) null,
`date` varchar(45) null,
primary key (`id_avis`)
)
engine = innodb;
create table if not exists `base_de_données`.`capteur_sonore` (
`id_capteur_sonore` int not null,
`position` varchar(45) not null,
`date` varchar(45) not null,
`niveau_sonore` varchar(45) not null,
primary key (`id_capteur_sonore`)
)
engine = innodb;
create table if not exists `base_de_données`.`salle` (
`id_salle` int not null,
`adresse` varchar(45) not null,
`carte_sonore` varchar(45) null,
`capteur_sonore_id_capteur_sonore` int not null,
primary key (`id_salle`, `capteur_sonore_id_capteur_sonore`),
unique index `adresse_unique` (`adresse` asc),
unique index `carte_sonore_unique` (`carte_sonore` asc),
index `fk_salle_capteur_sonore1_idx` (`capteur_sonore_id_capteur_sonore` asc),
constraint `fk_salle_capteur_sonore1`
foreign key (`capteur_sonore_id_capteur_sonore`)
references `base_de_données`.`capteur_sonore` (`id_capteur_sonore`)
on delete no action
on update no action
)
engine = innodb;
create table if not exists `base_de_données`.`concert` (
`id_concert` int not null,
`date` varchar(45) not null,
`durée` varchar(45) not null,
`heure_de_début` varchar(45) not null,
`utilisateur_id_utilisateur` int not null,
`utilisateur_abonnement_id_abonnement` int not null,
`utilisateur_concert_id_concert` int not null,
`salle_id_salle` int not null,
primary key (
`id_concert`,
`utilisateur_id_utilisateur`,
`utilisateur_abonnement_id_abonnement`,
`utilisateur_concert_id_concert`,
`salle_id_salle`
),
index `fk_concert_salle1_idx` (`salle_id_salle` asc),
constraint `fk_concert_salle1`
foreign key (`salle_id_salle`)
references `base_de_données`.`salle` (`id_salle`)
on delete no action
on update no action
)
engine = innodb;
create table if not exists `base_de_données`.`administrateur` (
`id_administrateur` int not null,
`nom` varchar(45) not null,
`prénom` varchar(45) not null,
`expérience` varchar(45) null,
primary key (`id_administrateur`)
)
engine = innodb;
create table if not exists `base_de_données`.`utilisateur_has_concert` (
`utilisateur_id_utilisateur` int not null,
`utilisateur_abonnement_id_abonnement` int not null,
`concert_id_concert` int not null,
`concert_utilisateur_id_utilisateur` int not null,
`concert_utilisateur_abonnement_id_abonnement` int not null,
`concert_utilisateur_concert_id_concert` int not null,
`billet_id_billet` int not null,
primary key (
`utilisateur_id_utilisateur`,
`utilisateur_abonnement_id_abonnement`,
`concert_id_concert`,
`concert_utilisateur_id_utilisateur`,
`concert_utilisateur_abonnement_id_abonnement`,
`concert_utilisateur_concert_id_concert`,
`billet_id_billet`
),
index `fk_utilisateur_has_concert_concert1_idx` (
`concert_id_concert` asc,
`concert_utilisateur_id_utilisateur` asc,
`concert_utilisateur_abonnement_id_abonnement` asc,
`concert_utilisateur_concert_id_concert` asc
),
index `fk_utilisateur_has_concert_utilisateur1_idx` (
`utilisateur_id_utilisateur` asc,
`utilisateur_abonnement_id_abonnement` asc
),
index `fk_utilisateur_has_concert_billet1_idx` (`billet_id_billet` asc),
constraint `fk_utilisateur_has_concert_utilisateur1`
foreign key (`utilisateur_id_utilisateur`, `utilisateur_abonnement_id_abonnement`)
references `base_de_données`.`utilisateur` (`id_utilisateur`, `abonnement_id_abonnement`)
on delete no action
on update no action,
constraint `fk_utilisateur_has_concert_concert1`
foreign key (
`concert_id_concert`,
`concert_utilisateur_id_utilisateur`,
`concert_utilisateur_abonnement_id_abonnement`,
`concert_utilisateur_concert_id_concert`
)
references `base_de_données`.`concert` (
`id_concert`,
`utilisateur_id_utilisateur`,
`utilisateur_abonnement_id_abonnement`,
`utilisateur_concert_id_concert`
)
on delete no action
on update no action,
constraint `fk_utilisateur_has_concert_billet1`
foreign key (`billet_id_billet`)
references `base_de_données`.`billet` (`id_billet`)
on delete no action
on update no action
)
engine = innodb;
create table if not exists `base_de_données`.`concert_has_utilisateur` (
`concert_id_concert` int not null,
`concert_utilisateur_id_utilisateur` int not null,
`concert_utilisateur_abonnement_id_abonnement` int not null,
`concert_utilisateur_concert_id_concert` int not null,
`utilisateur_id_utilisateur` int not null,
`utilisateur_abonnement_id_abonnement` int not null,
`avis_id_avis` int not null,
primary key (
`concert_id_concert`,
`concert_utilisateur_id_utilisateur`,
`concert_utilisateur_abonnement_id_abonnement`,
`concert_utilisateur_concert_id_concert`,
`utilisateur_id_utilisateur`,
`utilisateur_abonnement_id_abonnement`,
`avis_id_avis`
),
index `fk_concert_has_utilisateur_utilisateur1_idx` (
`utilisateur_id_utilisateur` asc,
`utilisateur_abonnement_id_abonnement` asc
),
index `fk_concert_has_utilisateur_concert1_idx` (
`concert_id_concert` asc,
`concert_utilisateur_id_utilisateur` asc,
`concert_utilisateur_abonnement_id_abonnement` asc,
`concert_utilisateur_concert_id_concert` asc
),
index `fk_concert_has_utilisateur_avis1_idx` (`avis_id_avis` asc),
constraint `fk_concert_has_utilisateur_concert1`
foreign key (
`concert_id_concert`,
`concert_utilisateur_id_utilisateur`,
`concert_utilisateur_abonnement_id_abonnement`,
`concert_utilisateur_concert_id_concert`
)
references `base_de_données`.`concert` (
`id_concert`,
`utilisateur_id_utilisateur`,
`utilisateur_abonnement_id_abonnement`,
`utilisateur_concert_id_concert`
)
on delete no action
on update no action,
constraint `fk_concert_has_utilisateur_utilisateur1`
foreign key (`utilisateur_id_utilisateur`, `utilisateur_abonnement_id_abonnement`)
references `base_de_données`.`utilisateur` (`id_utilisateur`, `abonnement_id_abonnement`)
on delete no action
on update no action,
constraint `fk_concert_has_utilisateur_avis1`
foreign key (`avis_id_avis`)
references `base_de_données`.`avis` (`id_avis`)
on delete no action
on update no action
)
engine = innodb;
create table if not exists `base_de_données`.`administrateur_has_capteur_sonore` (
`administrateur_id_administrateur` int not null,
`capteur_sonore_id_capteur_sonore` int not null,
`carte_sonore` varchar(45) null,
`informations` varchar(45) null,
primary key (`administrateur_id_administrateur`, `capteur_sonore_id_capteur_sonore`),
index `fk_administrateur_has_capteur_sonore_capteur_sonore1_idx` (`capteur_sonore_id_capteur_sonore` asc),
index `fk_administrateur_has_capteur_sonore_administrateur1_idx` (`administrateur_id_administrateur` asc),
unique index `carte_sonore_unique` (`carte_sonore` asc),
unique index `administrateur_has_capteur_sonorecol_unique` (`informations` asc),
constraint `fk_administrateur_has_capteur_sonore_administrateur1`
foreign key (`administrateur_id_administrateur`)
references `base_de_données`.`administrateur` (`id_administrateur`)
on delete no action
on update no action,
constraint `fk_administrateur_has_capteur_sonore_capteur_sonore1`
foreign key (`capteur_sonore_id_capteur_sonore`)
references `base_de_données`.`capteur_sonore` (`id_capteur_sonore`)
on delete no action
on update no action
)
engine = innodb;
create table if not exists `base_de_données`.`concert_has_artiste` (
`concert_id_concert` int not null,
`concert_utilisateur_id_utilisateur` int not null,
`concert_utilisateur_abonnement_id_abonnement` int not null,
`concert_utilisateur_concert_id_concert` int not null,
`artiste_id_artiste` int not null,
primary key (
`concert_id_concert`,
`concert_utilisateur_id_utilisateur`,
`concert_utilisateur_abonnement_id_abonnement`,
`concert_utilisateur_concert_id_concert`,
`artiste_id_artiste`
),
index `fk_concert_has_artiste_artiste1_idx` (`artiste_id_artiste` asc),
index `fk_concert_has_artiste_concert1_idx` (
`concert_id_concert` asc,
`concert_utilisateur_id_utilisateur` asc,
`concert_utilisateur_abonnement_id_abonnement` asc,
`concert_utilisateur_concert_id_concert` asc
),
constraint `fk_concert_has_artiste_concert1`
foreign key (
`concert_id_concert`,
`concert_utilisateur_id_utilisateur`,
`concert_utilisateur_abonnement_id_abonnement`,
`concert_utilisateur_concert_id_concert`
)
references `base_de_données`.`concert` (
`id_concert`,
`utilisateur_id_utilisateur`,
`utilisateur_abonnement_id_abonnement`,
`utilisateur_concert_id_concert`
)
on delete no action
on update no action,
constraint `fk_concert_has_artiste_artiste1`
foreign key (`artiste_id_artiste`)
references `base_de_données`.`artiste` (`id_artiste`)
on delete no action
on update no action
)
engine = innodb;
create table if not exists `base_de_données`.`utilisateur_has_préférences_utilisateur` (
`utilisateur_id_utilisateur` int not null,
`utilisateur_abonnement_id_abonnement` int not null,
`préférences_utilisateur_id_préférences_utilisateur` int not null,
`préférences_utilisateur_artiste_id_artiste` int not null,
primary key (
`utilisateur_id_utilisateur`,
`utilisateur_abonnement_id_abonnement`,
`préférences_utilisateur_id_préférences_utilisateur`,
`préférences_utilisateur_artiste_id_artiste`
),
index `fk_utilisateur_has_préférences_utilisateur_préférence ut_idx` (
`préférences_utilisateur_id_préférences_utilisateur` asc,
`préférences_utilisateur_artiste_id_artiste` asc
),
index `fk_utilisateur_has_préférences_utilisateur_utilisateur1_idx` (
`utilisateur_id_utilisateur` asc,
`utilisateur_abonnement_id_abonnement` asc
),
constraint `fk_utilisateur_has_préférences_utilisateur_utilisateur1`
foreign key (`utilisateur_id_utilisateur`, `utilisateur_abonnement_id_abonnement`)
references `base_de_données`.`utilisateur` (`id_utilisateur`, `abonnement_id_abonnement`)
on delete no action
on update no action,
constraint `fk_utilisateur_has_préférences_utilisateur_préférence util1`
foreign key (`préférences_utilisateur_id_préférences_utilisateur`, `préférences_utilisateur_artiste_id_artiste`)
references `base_de_données`.`préférences_utilisateur` (`id_préférences_utilisateur`, `artiste_id_artiste`)
on delete no action
on update no action
)
engine = innodb;
set sql_mode = @old_sql_mode;
set foreign_key_checks = @old_foreign_key_checks;
set unique_checks = @old_unique_checks;