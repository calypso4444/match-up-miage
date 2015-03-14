<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$mot = filter_input(INPUT_POST, 'recherche');
if (isset($mot)) {
    $mot=  htmlspecialchars($mot);
    $resultat = $model['GestionnaireRecherche']->rechercheParMotClef($mot);
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['mot']=$mot;
$vue['resultat'] = $resultat;
$view->render('f_recherche_avancee', $vue);

/* fin de l'affichage de la vue */
?>
