set sql_mode = "no_auto_value_on_zero";
start transaction;
set time_zone = "+00:00";
create table `abonnement` (
`idabonnement` int(11) not null,
`fonctionalite` varchar(45) not null,
`cout` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `abonnement` (`idabonnement`, `fonctionalite`, `cout`) values
(0, 'premium', 50),
(1, 'gratuit', 0),
(2, 'admin', 0);
create table `administrateur` (
`idadministrateur` int(11) not null,
`nom` varchar(45) not null,
`prenom` varchar(45) not null,
`experience` varchar(45) default null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `administrateur` (`idadministrateur`, `nom`, `prenom`, `experience`) values
(1, 'de corta', 'etienne', null);
create table `administrateur_has_capteur_sonore` (
`idamdinistrateur_has_capteur` int(11) not null,
`administrateur_idadministrateur` int(11) not null,
`capteur_sonore_idcapteur_sonore` int(11) not null,
`carte_sonore` varchar(45) default null,
`informations` varchar(45) default null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `administrateur_has_capteur_sonore` (`idamdinistrateur_has_capteur`, `administrateur_idadministrateur`, `capteur_sonore_idcapteur_sonore`, `carte_sonore`, `informations`) values
(1, 1, 1, 'image.carte_sonore_1.png', null);
create table `artiste` (
`idartiste` int(11) not null,
`pseudo` varchar(45) default null,
`nom` varchar(45) not null,
`prenom` varchar(45) not null,
`adresse_email` varchar(45) not null,
`numero_de_telephone` varchar(10) not null,
`style_de_musique` varchar(45) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `artiste` (`idartiste`, `pseudo`, `nom`, `prenom`, `adresse_email`, `numero_de_telephone`, `style_de_musique`) values
(1, 'travis scott', 'scott', 'travis', 'example@gmail.com', '0111111111', 'rap'),
(4, 'dj snake', 'grigahcine', 'william', 'example1@gmail.com', '0111111112', 'rap'),
(5, 'booba', 'yaffa', 'elie', 'example2@gmail.com', '0111111113', 'rap'),
(6, 'rainbow sisters', 'chapin', 'erin', 'example3@gmail.com', '0111111114', 'accoustic'),
(7, 'sloane', 'richard', 'chantal', 'example4@gmail.com', '0111111115', '80\'s');
create table `avis` (
`idavis` int(11) not null,
`critique` varchar(45) default null,
`note` varchar(45) default null,
`date` date default null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `avis` (`idavis`, `critique`, `note`, `date`) values
(1, null, '9', '2024-01-20');
create table `capteur_sonore` (
`idcapteur_sonore` int(11) not null,
`position` varchar(45) not null,
`date` date not null,
`niveau_sonore` varchar(45) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `capteur_sonore` (`idcapteur_sonore`, `position`, `date`, `niveau_sonore`) values
(1, 'opera garnier', '2024-01-01', '30'),
(2, 'olympia', '2024-01-21', '75'),
(3, 'stade de france', '2024-01-22', '71'),
(4, 'seine musicale', '2024-01-20', '60'),
(5, 'bercy', '2024-01-25', '92');
create table `concert` (
`idconcert` int(11) not null,
`image` varchar(256) not null,
`date` date not null,
`duree` int(11) not null,
`heure_debut` int(11) not null,
`salle_idsalle` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `concert` (`idconcert`, `image`, `date`, `duree`, `heure_debut`, `salle_idsalle`) values
(1, 'images/imgconcert/img1.jpg', '2024-01-19', 243, 1800, 1),
(2, 'images/imgconcert/img2.jpg', '2024-01-23', 315, 1900, 5),
(3, 'images/imgconcert/img3.jpg', '2024-01-27', 430, 1730, 4),
(4, 'images/imgconcert/img4.jpg', '2024-01-20', 265, 1800, 2),
(5, 'images/imgconcert/img5.jpg', '2024-01-29', 289, 1745, 1),
(7, 'images/imgconcert/img6.jpg', '2024-01-23', 265, 1745, 3);
create table `concert_has_artiste` (
`idconcert_has_artiste` int(11) not null,
`concert_idconcert` int(11) not null,
`artiste_idartiste` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `concert_has_artiste` (`idconcert_has_artiste`, `concert_idconcert`, `artiste_idartiste`) values
(1, 1, 1),
(2, 2, 6),
(3, 2, 7),
(4, 3, 4),
(5, 4, 7),
(6, 5, 5),
(7, 7, 4);
create table `concert_has_utilisateur` (
`idconcert_has_utilisateur` int(11) not null,
`concert_idconcert` int(11) not null,
`utilisateur_idutilisateur` int(11) not null,
`avis_idavis` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `concert_has_utilisateur` (`idconcert_has_utilisateur`, `concert_idconcert`, `utilisateur_idutilisateur`, `avis_idavis`) values
(1, 1, 1, 1),
(2, 1, 2, 1);
create table `faq` (
`idfaq` int(11) not null,
`texte` varchar(1024) not null,
`date` date not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `faq` (`idfaq`, `texte`, `date`) values
(1, 'quels sont vos modes de paiement acceptés ?', '2024-01-01'),
(2, 'comment puis-je annuler ma réservation ?', '2024-01-01'),
(3, 'proposez-vous des réductions pour les étudiants ?', '2024-01-01');
create table `forum` (
`id` int(11) not null,
`question` varchar(1028) not null,
`user_id` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `forum` (`id`, `question`, `user_id`) values
(1, 'combien coute l\'abonnement premium', 1),
(2, 'test', 1);
create table `partenaires` (
`idpartenaires` int(11) not null,
`nom` varchar(64) not null,
`mail` varchar(64) not null,
`siret` varchar(20) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `partenaires` (`idpartenaires`, `nom`, `mail`, `siret`) values
(1, 'société générale', 'societegenerale@gmail.com', '552 120 222 00013'),
(2, 'orange', 'orange@gmail.com', '380 129 866'),
(3, 'google', 'gmail@gmail.com', '443 061 841'),
(4, 'tesla', 'tesla@gmail.com', '524 335 262 00431'),
(5, 'openai', 'chatgpt@gmail.com', '443 061 841 00047');
create table `preference_utilisateur` (
`idpreference_utilisateur` int(11) not null,
`style_de_musique` varchar(45) default null,
`artiste_idartiste` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `preference_utilisateur` (`idpreference_utilisateur`, `style_de_musique`, `artiste_idartiste`) values
(1, 'rap', 1);
create table `reponses` (
`id` int(11) not null,
`question_id` int(11) not null,
`reponse` varchar(1024) not null,
`user_id` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `reponses` (`id`, `question_id`, `reponse`, `user_id`) values
(1, 1, 'beaucoup', 1),
(2, 1, 'oui', 1);
create table `reponse_faq` (
`idreponse` int(11) not null,
`texte` text not null,
`date` date not null,
`faq_idfaq` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `reponse_faq` (`idreponse`, `texte`, `date`, `faq_idfaq`) values
(1, 'nous acceptons les paiements par carte bancaire, virement et espèces.', '2024-01-02', 1),
(2, 'pour annuler votre réservation, veuillez nous contacter par téléphone ou par email au moins 48 heures à l\'avance.', '2024-01-02', 2),
(3, 'oui, nous offrons des réductions spéciales pour les étudiants sur présentation d\'une carte étudiante valide.', '2024-01-02', 3);
create table `salle` (
`idsalle` int(11) not null,
`adresse` varchar(80) not null,
`capteur_sonore_idcapteur_sonore` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `salle` (`idsalle`, `adresse`, `capteur_sonore_idcapteur_sonore`) values
(1, '8 rue scribe, 75009 paris', 1),
(2, '28 bd des capucines, 75009 paris', 2),
(3, 'stade de france 93200 saint-denis', 3),
(4, 'la seine musicale, île seguin, 92100 boulogne-billancourt', 4),
(5, '8 bd de bercy, 75012 paris', 5);
create table `ticket` (
`idticket` int(11) not null,
`place` varchar(45) default null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `ticket` (`idticket`, `place`) values
(1, 'normale'),
(2, 'vip');
create table `utilisateur` (
`idutilisateur` int(11) not null,
`nom` varchar(45) not null,
`prenom` varchar(45) not null,
`date_de_naissance` date not null,
`adresse_email` varchar(45) character set utf8 colate utf8_bin not null,
`numero_de_telephone` varchar(10) not null,
`mot_de_passe` varchar(255) not null,
`abonnement_idabonnement` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `utilisateur` (`idutilisateur`, `nom`, `prenom`, `date_de_naissance`, `adresse_email`, `numero_de_telephone`, `mot_de_passe`, `abonnement_idabonnement`) values
(1, 'de corta', 'etienne', '2002-10-25', 'etienne.corta@gmail.com', '0652986299', '$2y$10$jbtq.a1qcuowwemnrgqxvex./m61ms9e25pqd89i8rblb8h5ncrzq', 2),
(2, 'dupont', 'jean', '2002-10-25', 'jeandupont@gmail.com', '0611223344', '$2y$10$zqhuzrklkxygxf.u27jnu.9fvg0z2bt.i6nbelgjao/2hs0pwwfwy', 1),
(3, 'de corta', 'étienne', '2002-10-25', 'titousteam@gmail.com', '0652986299', '$2y$10$zqhuzrklkxygxf.u27jnu.9fvg0z2bt.i6nbelgjao/2hs0pwwfwy', 1),
(5, 'admin', 'sonotech', '2023-10-21', 'sonotech@gmail.com', '0606060606', '$2y$10$nmfccx0nmjnnf84taaxzge1iioq7l6zbcjmes/vsuvby0r7q7jmgq', 2);
create table `utilisateur_has_concert` (
`idutilisateur_has_concert` int(11) not null,
`utilisateur_idutilisateur` int(11) not null,
`concert_idconcert` int(11) not null,
`ticket_idticket` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `utilisateur_has_concert` (`idutilisateur_has_concert`, `utilisateur_idutilisateur`, `concert_idconcert`, `ticket_idticket`) values
(1, 2, 1, 1),
(43, 3, 3, 1),
(44, 3, 3, 1),
(45, 3, 3, 1),
(46, 2, 4, 2),
(47, 2, 7, 2),
(48, 2, 7, 2),
(49, 2, 7, 2);
create table `utilisateur_has_preference_utilisateur` (
`idutilisateur_has_preference_utilisateur` int(11) not null,
`utilisateur_idutilisateur` int(11) not null,
`preference_utilisateur_idpreference_utilisateur` int(11) not null
) engine=innodb default charset=utf8 colate=utf8_general_ci;
insert into `utilisateur_has_preference_utilisateur` (`idutilisateur_has_preference_utilisateur`, `utilisateur_idutilisateur`, `preference_utilisateur_idpreference_utilisateur`) values
(1, 2, 1);
alter table `abonnement`
add primary key (`idabonnement`);
alter table `administrateur`
add primary key (`idadministrateur`);
alter table `administrateur_has_capteur_sonore`
add primary key (`idamdinistrateur_has_capteur`,`capteur_sonore_idcapteur_sonore`,`administrateur_idadministrateur`) using btree,
add key `fk_capteur_sonore_admin` (`capteur_sonore_idcapteur_sonore`),
add key `fk_admin_capteur_sonore` (`administrateur_idadministrateur`);
alter table `artiste`
add primary key (`idartiste`);
alter table `avis`
add primary key (`idavis`);
alter table `capteur_sonore`
add primary key (`idcapteur_sonore`);
alter table `concert`
add primary key (`idconcert`,`salle_idsalle`),
add key `fk_concert_salle` (`salle_idsalle`);
alter table `concert_has_artiste`
add primary key (`idconcert_has_artiste`,`concert_idconcert`,`artiste_idartiste`) using btree,
add key `fk_concert_artiste` (`artiste_idartiste`) using btree,
add key `fk_concert_artiste2` (`concert_idconcert`);
alter table `concert_has_utilisateur`
add primary key (`idconcert_has_utilisateur`,`concert_idconcert`,`utilisateur_idutilisateur`,`avis_idavis`) using btree,
add key `fk_avis_concert` (`avis_idavis`) using btree,
add key `fk_utilisateur_concert` (`utilisateur_idutilisateur`,`concert_idconcert`) using btree,
add key `fk_concert_utilisateur` (`concert_idconcert`);
alter table `faq`
add primary key (`idfaq`);
alter table `forum`
add primary key (`id`,`user_id`) using btree,
add key `fk_utilisateur_forum` (`user_id`);
alter table `partenaires`
add primary key (`idpartenaires`);
alter table `preference_utilisateur`
add primary key (`idpreference_utilisateur`,`artiste_idartiste`),
add key `fk_artiste_preference` (`artiste_idartiste`);
alter table `reponses`
add primary key (`id`,`user_id`) using btree,
add key `fk_utilisateur_reponse_forum` (`user_id`);
alter table `reponse_faq`
add primary key (`idreponse`,`faq_idfaq`) using btree,
add key `fk_reponse_faq` (`faq_idfaq`);
alter table `salle`
add primary key (`idsalle`,`capteur_sonore_idcapteur_sonore`),
add key `fk_salle_capteur_sonore` (`capteur_sonore_idcapteur_sonore`) using btree;
alter table `ticket`
add primary key (`idticket`);
alter table `utilisateur`
add primary key (`idutilisateur`,`abonnement_idabonnement`),
add key `fk_abonnement_idabonnement1` (`abonnement_idabonnement`) using btree;
alter table `utilisateur_has_concert`
add primary key (`idutilisateur_has_concert`,`concert_idconcert`,`ticket_idticket`,`utilisateur_idutilisateur`) using btree,
add key `fk_utilisateur_ticket` (`ticket_idticket`),
add key `fk_concert_utilisateur3` (`concert_idconcert`),
add key `fk_utilisateur_concert3` (`utilisateur_idutilisateur`) using btree;
alter table `utilisateur_has_preference_utilisateur`
add primary key (`idutilisateur_has_preference_utilisateur`,`preference_utilisateur_idpreference_utilisateur`,`utilisateur_idutilisateur`) using btree,
add key `fk_utilisateur_preference` (`utilisateur_idutilisateur`) using btree,
add key `fk_preference_utilisateur` (`preference_utilisateur_idpreference_utilisateur`) using btree;
alter table `abonnement`
modify `idabonnement` int(11) not null auto_increment, auto_increment=4;
alter table `administrateur`
modify `idadministrateur` int(11) not null auto_increment, auto_increment=2;
alter table `administrateur_has_capteur_sonore`
modify `idamdinistrateur_has_capteur` int(11) not null auto_increment, auto_increment=2;
alter table `artiste`
modify `idartiste` int(11) not null auto_increment, auto_increment=8;
alter table `avis`
modify `idavis` int(11) not null auto_increment, auto_increment=2;
alter table `capteur_sonore`
modify `idcapteur_sonore` int(11) not null auto_increment, auto_increment=6;
alter table `concert`
modify `idconcert` int(11) not null auto_increment, auto_increment=8;
alter table `concert_has_artiste`
modify `idconcert_has_artiste` int(11) not null auto_increment, auto_increment=8;
alter table `concert_has_utilisateur`
modify `idconcert_has_utilisateur` int(11) not null auto_increment, auto_increment=3;
alter table `faq`
modify `idfaq` int(11) not null auto_increment, auto_increment=4;
alter table `forum`
modify `id` int(11) not null auto_increment, auto_increment=3;
alter table `partenaires`
modify `idpartenaires` int(11) not null auto_increment, auto_increment=6;
alter table `preference_utilisateur`
modify `idpreference_utilisateur` int(11) not null auto_increment, auto_increment=2;
alter table `reponses`
modify `id` int(11) not null auto_increment, auto_increment=3;
alter table `reponse_faq`
modify `idreponse` int(11) not null auto_increment, auto_increment=4;
alter table `salle`
modify `idsalle` int(11) not null auto_increment, auto_increment=6;
alter table `ticket`
modify `idticket` int(11) not null auto_increment, auto_increment=16;
alter table `utilisateur`
modify `idutilisateur` int(11) not null auto_increment, auto_increment=9;
alter table `utilisateur_has_concert`
modify `idutilisateur_has_concert` int(11) not null auto_increment, auto_increment=50;
alter table `utilisateur_has_preference_utilisateur`
modify `idutilisateur_has_preference_utilisateur` int(11) not null auto_increment, auto_increment=2;
alter table `administrateur_has_capteur_sonore`
add constraint `fk_admin_capteur_sonore` foreign key (`administrateur_idadministrateur`) references `administrateur` (`idadministrateur`) on delete no action on unpdate no action,
add constraint `fk_capteur_sonore_admin` foreign key (`capteur_sonore_idcapteur_sonore`) references `capteur_sonore` (`idcapteur_sonore`) on delete no action on unpdate no action;
alter table `concert`
add constraint `fk_concert_salle` foreign key (`salle_idsalle`) references `salle` (`idsalle`) on delete no action on unpdate no action;
alter table `concert_has_artiste`
add constraint `fk_concert_artiste` foreign key (`artiste_idartiste`) references `artiste` (`idartiste`) on delete no action on unpdate no action,
add constraint `fk_concert_artiste2` foreign key (`concert_idconcert`) references `concert` (`idconcert`) on delete no action on unpdate no action,
add constraint `fk_concert_artiste_2` foreign key (`concert_idconcert`) references `concert` (`idconcert`) on delete no action on unpdate no action;
alter table `concert_has_utilisateur`
add constraint `fk_avis_concert` foreign key (`avis_idavis`) references `avis` (`idavis`) on delete no action on unpdate no action,
add constraint `fk_concert_utilisateur` foreign key (`concert_idconcert`) references `concert` (`idconcert`) on delete no action on unpdate no action,
add constraint `fk_utilisateur_concert` foreign key (`utilisateur_idutilisateur`) references `utilisateur` (`idutilisateur`) on delete no action on unpdate no action;
alter table `forum`
add constraint `fk_utilisateur_forum` foreign key (`user_id`) references `utilisateur` (`idutilisateur`) on delete no action on unpdate no action;
alter table `preference_utilisateur`
add constraint `fk_artiste_preference` foreign key (`artiste_idartiste`) references `artiste` (`idartiste`) on delete no action on unpdate no action;
alter table `reponses`
add constraint `fk_utilisateur_reponse_forum` foreign key (`user_id`) references `utilisateur` (`idutilisateur`) on delete no action on unpdate no action;
alter table `reponse_faq`
add constraint `fk_reponse_faq` foreign key (`faq_idfaq`) references `faq` (`idfaq`) on delete no action;
alter table `salle`
add constraint `fk_salle_capteur_sonore` foreign key (`capteur_sonore_idcapteur_sonore`) references `capteur_sonore` (`idcapteur_sonore`) on delete no action on unpdate no action;
alter table `utilisateur`
add constraint `fk_utilisateur_abonnement1` foreign key (`abonnement_idabonnement`) references `abonnement` (`idabonnement`) on delete no action on unpdate no action;
alter table `utilisateur_has_concert`
add constraint `fk_concert_utilisateur3` foreign key (`concert_idconcert`) references `concert` (`idconcert`),
add constraint `fk_utilisateur_concert3` foreign key (`utilisateur_idutilisateur`) references `utilisateur` (`idutilisateur`) on delete no action on unpdate no action,
add constraint `fk_utilisateur_ticket` foreign key (`ticket_idticket`) references `ticket` (`idticket`);
alter table `utilisateur_has_preference_utilisateur`
add constraint `fk_preference_utilisateur` foreign key (`preference_utilisateur_idpreference_utilisateur`) references `preference_utilisateur` (`idpreference_utilisateur`) on delete no action on unpdate no action,
add constraint `fk_utilisateur_preference` foreign key (`utilisateur_idutilisateur`) references `utilisateur` (`idutilisateur`) on delete no action on unpdate no action;
commit;