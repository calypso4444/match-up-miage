<?php

/* db File */

include_once 'modele/database/Connexion.php';

/* model File */
include_once 'modele/Gestionnaire.php';
include_once 'modele/GestionnaireUtilisateur.php';
include_once 'modele/GestionnaireProfil.php';
include_once 'modele/GestionnaireCarte.php';
include_once 'modele/GestionnaireCommentaire.php';
include_once 'modele/GestionnaireAnnonce.php';

$model = array();
$model['GestionnaireUtilisateur'] = new GestionnaireUtilisateur();
$model['GestionnaireProfil'] = new GestionnaireProfil();
$model['GestionnaireAnnonce'] = new GestionnaireAnnonce();
$model['GestionnaireCommentaire'] = new GestionnaireCommentaire();

/* view File */

include_once 'vue/View.php';
$view = new View();

?>