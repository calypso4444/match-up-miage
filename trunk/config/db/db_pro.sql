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
`nomArtiste` varchar(30) NOT NULL,
`noteArtiste` float(3),
`descriptionArtiste` varchar(255),
`genreMusicalArtiste` varchar(255),
`proprietaireArtiste` int(255),
KEY `nArtiste` (`nArtiste`),
FOREIGN KEY(proprietaireArtiste) REFERENCES utilisateur(id)
);

CREATE TABLE `salle` (
`nSalle` int(255) NOT NULL AUTO_INCREMENT,
`nomSalle` varchar(30) NOT NULL,
`noteSalle` float(3),
`descriptionSalle` varchar(255),
`genreMusicalSalle` varchar(255),
`adresseSalle` varchar(255),
`proprietaireSalle` int(255),
`telSalle` varchar(12),
`nomGerant` varchar (50),
`prenomGerant` varchar (50),
`contactGerant` varchar (50),
KEY `nSalle` (`nSalle`),
FOREIGN KEY(proprietaireSalle) REFERENCES utilisateur(id)
);

CREATE TABLE `concert` (
`nSalle` int(255) NOT NULL,
`nArtiste` int(255) NOT NULL,
`dateConcert` date NOT NULL,
nConcert int(255) NOT NULL,
KEY (`nSalle`,`nArtiste`,`dateConcert`),
FOREIGN KEY(nSalle) REFERENCES salle (nSalle),
FOREIGN KEY(nArtiste) REFERENCES artiste (nArtiste)
);

CREATE TABLE `petiteAnnonce` (
`nSalle` int(255) NOT NULL,
`nPetiteAnnonce` int(255) NOT NULL,
`textePetiteAnnonce` varchar(255),
`dateDeb` DATE NOT NULL,
`dateFin` DATE,
`dateEditionPetiteAnnonce` timestamp,
KEY (`nSalle`,`nPetiteAnnonce`),
FOREIGN KEY(nSalle) REFERENCES salle (nSalle)
);

CREATE TABLE `annonceEvenementSalle` (
`nSalle` int(255) NOT NULL,
`nAnnonceEvenementSalle` int(255) NOT NULL,
`texteAnnonceEvenementSalle` varchar(255),
`dateEditionAnnonceEvenementSalle` timestamp,
KEY (`nSalle`,`nAnnonceEvenementSalle`),
FOREIGN KEY(nSalle) REFERENCES salle (nSalle)
);

CREATE TABLE `annonceEvenementArtiste` (
`nSalle` int(255) NOT NULL,
`nAnnonceEvenementArtiste` int(255) NOT NULL,
`texteAnnonceEvenementArtiste` varchar(255),
`dateEditionAnnonceEvenementArtiste` timestamp,
KEY (`nSalle`,`nAnnonceEvenementArtiste`),
FOREIGN KEY(nSalle) REFERENCES salle (nSalle)
);

CREATE TABLE `commentaireSalle` (
`cible` int(255) NOT NULL,
`nCommentaireSalle` int(255) NOT NULL,
`texteCommentaireSalle` varchar(255),
`dateEditionCommentaireSalle` timestamp,
`auteur` int(255)NOT NULL,
KEY (`cible`,`nCommentaireSalle`),
FOREIGN KEY(cible) REFERENCES salle (nSalle),
FOREIGN KEY(auteur) REFERENCES utilisateur (id)
);

CREATE TABLE `commentaireArtiste` (
`cible` int(255) NOT NULL,
`nCommentaireArtiste` int(255) NOT NULL,
`texteCommentaireArtiste` varchar(255),
`dateEditionCommentaireArtiste` timestamp,
`auteur` int(255) NOT NULL,
KEY (`cible`,`nCommentaireArtiste`),
FOREIGN KEY(cible) REFERENCES artiste (nArtiste),
FOREIGN KEY(auteur) REFERENCES utilisateur (id)
);

CREATE TABLE `albumPhotoArtiste` (
`proprietaire` int(255) NOT NULL,
`nPhotoArtiste` int(255) NOT NULL,
`photoArtiste` varchar(255),
KEY (`proprietaire`,`nPhotoArtiste`),
FOREIGN KEY(proprietaire) REFERENCES artiste (nArtiste)
);

CREATE TABLE `albumPhotoSalle` (
`proprietaire` int(255) NOT NULL,
`nPhotoSalle` int(255) NOT NULL,
`photoSalle` varchar(255),
KEY (`proprietaire`,`nPhotoSalle`),
FOREIGN KEY(proprietaire) REFERENCES salle (nSalle)
);

CREATE TABLE `bibliothequeMusicale` (
`proprietaire` int(255) NOT NULL,
`nMorceau` int(255) NOT NULL,
`morceau` varchar(255),
KEY (`proprietaire`,`nMorceau`),
FOREIGN KEY(proprietaire) REFERENCES artiste (nArtiste)
);

-- mq les tables commentaireSalle, commentaireArtiste, celle pour la gestion d'adresse et la generation des coordonnées gps , les tables pour la gestion des favoris et des evenements suivis