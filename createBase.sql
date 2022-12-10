CREATE TABLE x_Joueur(
   Id_Joueur INT,
   Nom VARCHAR(50) NOT NULL,
   Prenom VARCHAR(50) NOT NULL,
   Photo VARCHAR(50),
   Licence CHAR(8) NOT NULL,
   DateNaissance DATE NOT NULL,
   Taille NUMBER(3,2),
   Poid NUMBER(5,2),
   Poste VARCHAR(50),
   Statut VARCHAR(50) NOT NULL,
   Commentaire VARCHAR2(512),
   PRIMARY KEY(Id_Joueur),
   UNIQUE(Licence)
);
CREATE SEQUENCE Seq_X_Joueur START WITH 1 INCREMENT BY 1;


CREATE TABLE X_Rencontre(
   Id_Rencontre int,
   DebutMatch DATE NOT NULL,
   FinMatch DATE NOT NULL,
   NomOpposant VARCHAR(50) NOT NULL,
   Lieu_de_rencontre VARCHAR(50) NOT NULL,
   ScoreLocaux SMALLINT ,
   ScoreVisiteurs SMALLINT ,
   PRIMARY KEY(Id_Rencontre)
);
CREATE SEQUENCE Seq_X_Rrencontre START WITH 1 INCREMENT BY 1;


CREATE TABLE X_Entraineur(
   Id_Entraineur int,
   Nom VARCHAR(50) NOT NULL,
   Prenom VARCHAR(50) NOT NULL,
   Photo VARCHAR(50),
   Licence CHAR(8) NOT NULL,
   DateNaissance DATE NOT NULL,
   PRIMARY KEY(Id_Entraineur),
   UNIQUE(Licence)
);

CREATE SEQUENCE Seq_X_Entraineur START WITH 1 INCREMENT BY 1;


CREATE TABLE X_Coatch (
   Id_Rencontre INT,
   Id_Entraineur INT,
   EstCoatchPrincipal INT,
   PRIMARY KEY(Id_Rencontre, Id_Entraineur),
   FOREIGN KEY(Id_Rencontre) REFERENCES X_Rencontre(Id_Rencontre),
   FOREIGN KEY(Id_Entraineur) REFERENCES X_Entraineur(Id_Entraineur),
   CONSTRAINT CK_Coatch_Principal CHECK (EstCoatchPrincipal in (0, 1))
);
CREATE SEQUENCE Seq_X_Coatch START WITH 1 INCREMENT BY 1;


CREATE TABLE X_participe(
   Id_Joueur INT,
   Id_Rencontre INT,
   ApreciationCoatch SMALLINT ,
   EstTitulaire int,
   EstCapitaine int,
   Tirs SMALLINT ,
   Tirs_Reussis SMALLINT ,
   rebonds_offencifs SMALLINT ,
   rebonds_defensifs SMALLINT ,
   Interceptions SMALLINT ,
   PRIMARY KEY(Id_Joueur, Id_Rencontre),
   FOREIGN KEY(Id_Joueur) REFERENCES X_Joueur(Id_Joueur),
   FOREIGN KEY(Id_Rencontre) REFERENCES X_Rencontre(Id_Rencontre),
   CONSTRAINT CK_participe_cap CHECK (EstCapitaine in (0, 1)),
   CONSTRAINT CK_participe_titu CHECK (EstTitulaire in (0, 1))
);
CREATE SEQUENCE Seq_X_participe START WITH 1 INCREMENT BY 1;

