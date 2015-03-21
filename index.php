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

$evenements=$model['GestionnaireConcert']->getEvenementsLesPlusSuivis();

$participation=filter_input(INPUT_GET, 'nConcert');
if(isset($participation)){
    if(isset($id)){
        $model['GestionnaireUtilisateur']->participer($id,$participation);
    }
}

$salleFavorite=$model['GestionnaireProfil']->getClassementFavoriSalle();
$artisteFavori=$model['GestionnaireProfil']->getClassementFavoriArtiste();

$selectionRandom=$model['GestionnaireProfil']->getMorceauRandom();

$date=new DateTime();
$date=$date->format('20y-m-d');
$concertCarte=$model['GestionnaireCarte']->getAllSalleConcertByDate($date);

$nS=filter_input(INPUT_GET,'nS');
$nA=filter_input(INPUT_GET,'nA');
$dC=filter_input(INPUT_GET,'dC');
if(isset($nS)and isset($nA)and isset($dC)){
    $model['GestionnaireConcert']->newConcert($nS,$nA,$dC);
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['dernierCommentaireArtiste'] = $lastA;
$vue['dernierCommentaireSalle'] = $lastS;
$vue['evenements']=$evenements;
$vue['salleFavorite']=$salleFavorite;
$vue['artisteFavori']=$artisteFavori;
$vue['selectionRandom']=$selectionRandom;
$vue['concertCarte']=$concertCarte;
$view->render('index', $vue);

/* fin de l'affichage de la vue */
?>
