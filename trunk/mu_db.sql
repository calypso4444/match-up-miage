/* pour l'instant nous avons deux tables dans la base de données afin de gérer l'inscription et la connexion des utilisateur */
/* il suffit de créer une bdd mu_db sur phpMyAdmin puis de copier ces deux scripts et de les executer */

CREATE TABLE IF NOT EXISTS `connexion` (
  `id` int(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `passe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  KEY `id` (`id`)
);

CREATE TABLE IF NOT EXISTS `validation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `passe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  KEY `id` (`id`)
);