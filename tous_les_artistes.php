<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//recuperation des profils artistes
$profilsArtiste=$model['GestionnaireProfil']->getAllProfil_Artiste();

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['profils_A']=$profilsArtiste;
$view->render('tous_les_artistes', $vue);

/* fin de l'affichage de la vue */
?>
