<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$annonces=$model['GestionnaireAnnonce']->getAllPetiteAnnonce();

$filtreGenre=  filter_input(INPUT_POST, 'genreMusical');
$filtreArrondissement=  filter_input(INPUT_POST, 'arrondissement');



/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['annonces']=$annonces;
$vue['genre']=$filtreGenre;
$vie['arrondissement']=$filtreArrondissement;
$view->render('petites_annonces', $vue);

/* fin de l'affichage de la vue */
?>
