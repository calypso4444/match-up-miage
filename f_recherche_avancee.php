<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$mot = filter_input(INPUT_POST, 'recherche');
$resultat = null;
if (isset($mot)and $mot !== '') {
    $mot = htmlspecialchars($mot);
    $resultat = $model['GestionnaireRecherche']->rechercheParMotClef($mot);
}

$filtreGenre=  filter_input(INPUT_POST, 'genreMusical');
$filtreArrondissement=  filter_input(INPUT_POST, 'arrondissement');

if(!empty($filtreArrondissement)){
    $filtreArrondissement=substr($filtreArrondissement,0,2);
    $resultat=$model['GestionnaireRecherche']->rechercheParMotClefArrondissement($mot,$filtreArrondissement);
}

if(!empty($filtreGenre)){
    $resultat=$model['GestionnaireRecherche']->rechercheParMotClefGenre($mot,$filtreGenre);
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['mot'] = $mot;
$vue['resultat'] = $resultat;
$view->render('f_recherche_avancee', $vue);

/* fin de l'affichage de la vue */
?>
