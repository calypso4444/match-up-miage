<!-- web -->
<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id=$_SESSION['user']['id'];

//recuperation des favoris salles
$favorisSalle=$model['GestionnaireUtilisateur']->getAllFavoris_Salle($id);

//recuperation des favoris artistes
$favorisArtiste=$model['GestionnaireUtilisateur']->getAllFavoris_Artiste($id);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['mesFavoris_A']=$favorisArtiste;
$vue['mesFavoris_S']=$favorisSalle;
$view->render('f_mes_favoris', $vue);

/* fin de l'affichage de la vue */
?>
