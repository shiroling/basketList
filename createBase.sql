CREATE TABLE Joueur(
   Id_Joueur INT,
   Nom VARCHAR(50) NOT NULL,
   Prenom VARCHAR(50) NOT NULL,
   Photo VARCHAR(50),
   Licence CHAR(8) NOT NULL,
   DateNaissance DATE NOT NULL,
   Taille float,
   Poid float,
   Poste VARCHAR(50),
   Statut VARCHAR(50) NOT NULL,
   Commentaire VARCHAR(512),
   PRIMARY KEY(Id_Joueur),
   CONSTRAINT CK_Joueur_Status CHECK (Statut in ('ACTIF', 'BLESSE', 'SUSPENDU', 'ABSENT')),
   UNIQUE(Licence)
);
CREATE SEQUENCE Seq_Joueur START WITH 1 INCREMENT BY 1;


CREATE TABLE Rencontre(
   Id_Rencontre int,
   DebutMatch DATE NOT NULL,
   FinMatch DATE NOT NULL,
   NomOpposant VARCHAR(50) NOT NULL,
   Lieu_de_rencontre VARCHAR(50) NOT NULL,
   ScoreLocaux SMALLINT ,
   ScoreVisiteurs SMALLINT ,
   PRIMARY KEY(Id_Rencontre)
);
CREATE SEQUENCE Seq_Rrencontre START WITH 1 INCREMENT BY 1;


CREATE TABLE Entraineur(
   Id_Entraineur int,
   Nom VARCHAR(50) NOT NULL,
   Prenom VARCHAR(50) NOT NULL,
   Photo VARCHAR(50),
   Licence CHAR(8) NOT NULL,
   DateNaissance DATE NOT NULL,
   PRIMARY KEY(Id_Entraineur),
   UNIQUE(Licence)
);

CREATE SEQUENCE Seq_Entraineur START WITH 1 INCREMENT BY 1;


CREATE TABLE Coatch (
   Id_Rencontre INT,
   Id_Entraineur INT,
   EstCoatchPrincipal INT,
   PRIMARY KEY(Id_Rencontre, Id_Entraineur),
   FOREIGN KEY(Id_Rencontre) REFERENCES Rencontre(Id_Rencontre),
   FOREIGN KEY(Id_Entraineur) REFERENCES Entraineur(Id_Entraineur),
   CONSTRAINT CK_Coatch_Principal CHECK (EstCoatchPrincipal in (0, 1))
); 

CREATE TABLE participe(
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
   FOREIGN KEY(Id_Joueur) REFERENCES Joueur(Id_Joueur),
   FOREIGN KEY(Id_Rencontre) REFERENCES Rencontre(Id_Rencontre),
   CONSTRAINT CK_participe_cap CHECK (EstCapitaine in (0, 1)),
   CONSTRAINT CK_participe_titu CHECK (EstTitulaire in (0, 1))
);
