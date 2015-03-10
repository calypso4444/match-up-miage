<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//on recupere le dernier commentaire posté a propos d'une salle et le dernier commentaire posté a propos d'un artiste
$lastA = $model['GestionnaireCommentaire']->getLastCommentaireArtiste();
$lastS = $model['GestionnaireCommentaire']->getLastCommentaireSalle();
if ($lastA != null and $lastS !== null) {
    //on regarde lequel est de le plus recent et on annule l'autre 
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
