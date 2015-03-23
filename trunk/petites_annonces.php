<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$annonces=$model['GestionnaireAnnonce']->getAllPetiteAnnonce();

$filtreGenre=  filter_input(INPUT_POST, 'genreMusical');
$filtreArrondissement=  filter_input(INPUT_POST, 'arrondissement');

if(!empty($filtreArrondissement)){
    $filtreArrondissement=substr($filtreArrondissement,0,2);
    $annonces=$model['GestionnaireAnnonce']->getAllPetiteAnnonceByArrondissement($filtreArrondissement);
}

if(!empty($filtreGenre)){
    $annonces=$model['GestionnaireAnnonce']->getAllPetiteAnnonceByGenre($filtreGenre);
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['annonces']=$annonces;
$view->render('petites_annonces', $vue);

/* fin de l'affichage de la vue */
?>
