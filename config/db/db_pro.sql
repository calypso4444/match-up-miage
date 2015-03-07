-- db en cours de creation

CREATE TABLE`utilisateur` (
  `id` int(255) NOT NULL AUTO_INCREMENT ,
  `pseudo` varchar(30) NOT NULL,
  `passe` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
`dateInscription` timestamp NULL DEFAULT NULL,
`nom` varchar(50),
`prenom` varchar(50),
`adresse` varchar(50),
`CP` varchar(5),
`ville` varchar(30) DEFAULT NULL,
`avatar` varchar(255),
  KEY `id` (`id`)
);

CREATE TABLE `validation` (
  `idValidation` int(255) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) NOT NULL,
  `passe` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateValidation` timestamp NULL DEFAULT NULL,
  KEY `idValidation` (`idValidation`)
);

CREATE TABLE `artiste` (
`nArtiste` int(255) NOT NULL AUTO_INCREMENT,
`photoProfilArtiste`varchar(255),
`nomArtiste` varchar(30) NOT NULL,
`descriptionArtiste` varchar(255),
`genreMusicalArtiste` varchar(255),
`proprietaireArtiste` int(255),
KEY `nArtiste` (`nArtiste`),
FOREIGN KEY(proprietaireArtiste) REFERENCES utilisateur(id)
);

CREATE TABLE `salle` (
`nSalle` int(255) NOT NULL AUTO_INCREMENT,
`photoProfilSalle`varchar(255),
`nomSalle` varchar(30) NOT NULL,
`descriptionSalle` varchar(255),
`genreMusicalSalle` varchar(255),
`adresseSalle` varchar(255),
`latitude` varchar(255),
`longitude` varchar(255),
`proprietaireSalle` int(255),
`telSalle` varchar(12),
`nomGerant` varchar (50),
`prenomGerant` varchar (50),
`contactGerant` varchar (50),
KEY `nSalle` (`nSalle`),
FOREIGN KEY(proprietaireSalle) REFERENCES utilisateur(id)
);

CREATE TABLE `concert` (
`nConcert` int(255) NOT NULL,
`nSalle` int(255) NOT NULL,
`nArtiste` int(255) NOT NULL,
`dateConcert` date NOT NULL,
KEY `nConcert`(`nConcert`),
FOREIGN KEY(nSalle) REFERENCES salle (nSalle),
FOREIGN KEY(nArtiste) REFERENCES artiste (nArtiste)
);

CREATE TABLE `petiteAnnonce` (
`nPetiteAnnonce` int(255) NOT NULL,
`auteur` int(255) NOT NULL,
`textePetiteAnnonce` varchar(255),
`dateDeb` DATE NOT NULL,
`dateFin` DATE,
`dateEditionPetiteAnnonce` timestamp,
KEY `nPetiteAnnonce`(`nPetiteAnnonce`),
FOREIGN KEY(auteur) REFERENCES salle (nSalle)
);

CREATE TABLE `annonceEvenementSalle` (
`nAnnonceEvenementSalle` int(255) NOT NULL,
`auteur` int(255) NOT NULL,
`texteAnnonceEvenementSalle` varchar(255),
`dateEditionAnnonceEvenementSalle` timestamp,
KEY `nAnnonceEvenementSalle`(`nAnnonceEvenementSalle`),
FOREIGN KEY(auteur) REFERENCES salle (nSalle)
);

CREATE TABLE `annonceEvenementArtiste` (
`auteur` int(255) NOT NULL,
`nAnnonceEvenementArtiste` int(255) NOT NULL,
`texteAnnonceEvenementArtiste` varchar(255),
`dateEditionAnnonceEvenementArtiste` timestamp,
KEY `nAnnonceEvenementArtiste`(`nAnnonceEvenementArtiste`),
FOREIGN KEY(auteur) REFERENCES salle (nSalle)
);

CREATE TABLE `commentaireSalle` (
`nCommentaireSalle` int(255) NOT NULL,
`cible` int(255) NOT NULL,
`texteCommentaireSalle` varchar(255),
`dateEditionCommentaireSalle` timestamp,
`auteur` int(255)NOT NULL,
KEY `nCommentaireSalle`(`nCommentaireSalle`),
FOREIGN KEY(cible) REFERENCES salle (nSalle),
FOREIGN KEY(auteur) REFERENCES utilisateur (id)
);

CREATE TABLE `commentaireArtiste` (
`nCommentaireArtiste` int(255) NOT NULL,
`cible` int(255) NOT NULL,
`texteCommentaireArtiste` varchar(255),
`dateEditionCommentaireArtiste` timestamp,
`auteur` int(255) NOT NULL,
KEY `nCommentaireArtiste`(`nCommentaireArtiste`),
FOREIGN KEY(cible) REFERENCES artiste (nArtiste),
FOREIGN KEY(auteur) REFERENCES utilisateur (id)
);

CREATE TABLE `albumPhotoArtiste` (
`nPhotoArtiste` int(255) NOT NULL,
`proprietaire` int(255) NOT NULL,
`photoArtiste` varchar(255),
KEY `nPhotoArtiste`(`nPhotoArtiste`),
FOREIGN KEY(proprietaire) REFERENCES artiste (nArtiste)
);

CREATE TABLE `albumPhotoSalle` (
`nPhotoSalle` int(255) NOT NULL,
`proprietaire` int(255) NOT NULL,
`photoSalle` varchar(255),
KEY `nPhotoSalle`(`nPhotoSalle`),
FOREIGN KEY(proprietaire) REFERENCES salle (nSalle)
);

CREATE TABLE `bibliothequeMusicale` (
`nMorceau` int(255) NOT NULL,
`proprietaire` int(255) NOT NULL,
`morceau` varchar(255),
KEY `nMorceau`(`nMorceau`),
FOREIGN KEY(proprietaire) REFERENCES artiste (nArtiste)
);

CREATE TABLE `favoriArtiste`(
`proprietaire` int(255) NOT NULL,
`cible` int(255) NOT NULL,
KEY(`proprietaire`,`cible`),
FOREIGN KEY(cible) REFERENCES artiste (nArtiste),
FOREIGN KEY(proprietaire) REFERENCES utilisateur (id)
);

CREATE TABLE `favoriSalle`(
`proprietaire` int(255) NOT NULL,
`cible` int(255) NOT NULL,
KEY(`proprietaire`,`cible`),
FOREIGN KEY(cible) REFERENCES salle (nSalle),
FOREIGN KEY(proprietaire) REFERENCES utilisateur (id)
);

CREATE TABLE `evenementSuivi`(
`proprietaire` int(255) NOT NULL,
`cible` int(255) NOT NULL,
KEY(`proprietaire`,`cible`),
FOREIGN KEY(cible) REFERENCES concert (nConcert),
FOREIGN KEY(proprietaire) REFERENCES utilisateur (id)
);


-- mq table gestion des notes salle et artiste, table bibliotheque à revoir (ajouter le detail des attributs pour le morceau)