<?php

/* db File */

include_once 'modele/database/Connexion.php';

/* model File */
include_once 'modele/Gestionnaire.php';
include_once 'modele/GestionnaireUtilisateur.php';
include_once 'modele/GestionnaireCarte.php';
include_once 'modele/GestionnaireCommentaire.php';

$model = array();
$model['GestionnaireUtilisateur'] = new GestionnaireUtilisateur();

/* view File */

include_once 'vue/View.php';
$view = new View();

?>