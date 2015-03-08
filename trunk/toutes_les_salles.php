<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//recuperation des profils salles
$profilsSalle=$model['GestionnaireProfil']->getAllProfil_Salle();

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['profils_S']=$profilsSalle;
$view->render('toutes_les_salles', $vue);

/* fin de l'affichage de la vue */
?>
