/*==============================================================*/
/* Nom de SGBD :  MySQL 4.0                                     */
/* Date de création :  24/12/2024 13:10:12                      */
/*==============================================================*/


drop index ASSOCIATION6_FK on adulte;

drop index ASSOCIATION_5_FK on adulte;

drop table if exists adulte;

drop table if exists baignoire;

drop index ASSOCIATION_1_FK on chambre;

drop table if exists chambre;

drop table if exists douche;

drop table if exists enfant;

drop table if exists hotel;

drop index ASSOCIATION_3_FK on occupation;

drop index ASSOCIATION_2_FK on occupation;

drop table if exists occupation;

drop table if exists personne;

drop index ASSOCIATION_4_FK on salle;

drop table if exists salle;

/*==============================================================*/
/* Table : adulte                                               */
/*==============================================================*/
create table adulte
(
   id_personne                    int                            not null,
   id_hotell                      int,
   hot_id_hotell                  int,
   age_adulte                     int,
   primary key (id_personne)
)
type = InnoDB;

/*==============================================================*/
/* Index : ASSOCIATION_5_FK                                     */
/*==============================================================*/
create index ASSOCIATION_5_FK on adulte
(
   hot_id_hotell
);

/*==============================================================*/
/* Index : ASSOCIATION6_FK                                      */
/*==============================================================*/
create index ASSOCIATION6_FK on adulte
(
   id_hotell
);

/*==============================================================*/
/* Table : baignoire                                            */
/*==============================================================*/
create table baignoire
(
   id_salle                       int                            not null,
   primary key (id_salle)
)
type = InnoDB;

/*==============================================================*/
/* Table : chambre                                              */
/*==============================================================*/
create table chambre
(
   id_hotell                      int                            not null,
   id_chambre                     int                            not null,
   nbre_lits                      int,
   prix_chambre                   float,
   numero_chambre                 int,
   primary key (id_hotell, id_chambre)
)
type = InnoDB;

/*==============================================================*/
/* Index : ASSOCIATION_1_FK                                     */
/*==============================================================*/
create index ASSOCIATION_1_FK on chambre
(
   id_hotell
);

/*==============================================================*/
/* Table : douche                                               */
/*==============================================================*/
create table douche
(
   id_salle                       int                            not null,
   primary key (id_salle)
)
type = InnoDB;

/*==============================================================*/
/* Table : enfant                                               */
/*==============================================================*/
create table enfant
(
   id_personne                    int                            not null,
   age_enfant                     int,
   primary key (id_personne)
)
type = InnoDB;

/*==============================================================*/
/* Table : hotel                                                */
/*==============================================================*/
create table hotel
(
   id_hotell                      int                            not null,
   adresse                        varchar(254),
   nbre_piece                     int,
   categorie                      varchar(254),
   primary key (id_hotell),
   key AK_id_hotel (id_hotell)
)
type = InnoDB;

/*==============================================================*/
/* Table : occupation                                           */
/*==============================================================*/
create table occupation
(
   id_occupation                  int                            not null,
   id_hotell                      int                            not null,
   id_chambre                     int                            not null,
   id_personne                    int                            not null,
   date                           datetime,
   primary key (id_occupation)
)
type = InnoDB;

/*==============================================================*/
/* Index : ASSOCIATION_2_FK                                     */
/*==============================================================*/
create index ASSOCIATION_2_FK on occupation
(
   id_hotell,
   id_chambre
);

/*==============================================================*/
/* Index : ASSOCIATION_3_FK                                     */
/*==============================================================*/
create index ASSOCIATION_3_FK on occupation
(
   id_personne
);

/*==============================================================*/
/* Table : personne                                             */
/*==============================================================*/
create table personne
(
   id_personne                    int                            not null,
   nom_personne                   varchar(254),
   prenom                         varchar(254),
   primary key (id_personne)
)
type = InnoDB;

/*==============================================================*/
/* Table : salle                                                */
/*==============================================================*/
create table salle
(
   id_salle                       int                            not null,
   id_hotell                      int                            not null,
   id_chambre                     int                            not null,
   primary key (id_salle)
)
type = InnoDB;

/*==============================================================*/
/* Index : ASSOCIATION_4_FK                                     */
/*==============================================================*/
create index ASSOCIATION_4_FK on salle
(
   id_hotell,
   id_chambre
);

alter table adulte add constraint FK_Association_5 foreign key (hot_id_hotell)
      references hotel (id_hotell) on delete restrict on update restrict;

alter table adulte add constraint FK_Generalisation_2 foreign key (id_personne)
      references personne (id_personne) on delete restrict on update restrict;

alter table adulte add constraint FK_association6 foreign key (id_hotell)
      references hotel (id_hotell) on delete restrict on update restrict;

alter table baignoire add constraint FK_Generalisation_4 foreign key (id_salle)
      references salle (id_salle) on delete restrict on update restrict;

alter table chambre add constraint FK_Association_1 foreign key (id_hotell)
      references hotel (id_hotell) on delete restrict on update restrict;

alter table douche add constraint FK_Generalisation_3 foreign key (id_salle)
      references salle (id_salle) on delete restrict on update restrict;

alter table enfant add constraint FK_Generalisation_1 foreign key (id_personne)
      references personne (id_personne) on delete restrict on update restrict;

alter table occupation add constraint FK_Association_2 foreign key (id_hotell, id_chambre)
      references chambre (id_hotell, id_chambre) on delete restrict on update restrict;

alter table occupation add constraint FK_Association_3 foreign key (id_personne)
      references adulte (id_personne) on delete restrict on update restrict;

alter table salle add constraint FK_Association_4 foreign key (id_hotell, id_chambre)
      references chambre (id_hotell, id_chambre) on delete restrict on update restrict;

