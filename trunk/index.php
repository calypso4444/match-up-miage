<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$lastA = $model['GestionnaireCommentaire']->getLastCommentaireArtiste();
$lastS = $model['GestionnaireCommentaire']->getLastCommentaireSalle();
if ($lastA != null and $lastS !== null) {
    if ($lastA['dateEditionCommentaireArtiste'] <= $lastS['dateEditionCommentaireSalle']) {
        $lastA = null;
    } else {
        $lastS = null;
    }
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['dernierCommentaireArtiste'] = $lastA;
$vue['dernierCommentaireSalle'] = $lastS;
$view->render('index', $vue);

/* fin de l'affichage de la vue */
?>
