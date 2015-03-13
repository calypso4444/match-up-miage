<!-- web -->
<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id = $_SESSION['user']['id'];

//supression d'un favori salle
$supS = filter_input(INPUT_GET, 'nSalle');
if (!empty($supS)) {
    $model['GestionnaireUtilisateur']->supprimerFavoris_Salle($id, $supS);
}

//supression d'un favori artiste
$supA = filter_input(INPUT_GET, 'nArtiste');
if (!empty($supA)) {
    $model['GestionnaireUtilisateur']->supprimerFavoris_Artiste($id, $supA);
}

//recuperation des favoris salles
$favorisSalle = $model['GestionnaireUtilisateur']->getAllFavoris_Salle($id);

//recuperation des favoris artistes
$favorisArtiste = $model['GestionnaireUtilisateur']->getAllFavoris_Artiste($id);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['mesFavoris_A'] = $favorisArtiste;
$vue['mesFavoris_S'] = $favorisSalle;
$view->render('f_mes_favoris', $vue);

/* fin de l'affichage de la vue */
?>
