/* pour l'instant nous avons deux tables dans la base de donn�es afin de g�rer l'inscription et la connexion des utilisateur */
/* il suffit de cr�er une bdd mu_db sur phpMyAdmin puis de copier ces deux scripts et de les executer */

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
`avatar` longblob,
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