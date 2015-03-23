<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$estConnecte='';
$participe=false;

$evenements = $model['GestionnaireConcert']->getEvenementsLesPlusSuivis();

$participation = filter_input(INPUT_GET, 'nConcert');
if (isset($participation)) {
    $id = $_SESSION['user']['id'];
    if (!isset($id)) {
        $estConnecte = false;
    } else {
        $estConnecte = true;
        $participe=true;
        $model['GestionnaireUtilisateur']->participer($id, $participation);
    }
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte']=$estConnecte;
$vue['participe']=$participe;
$vue['evenements']=$evenements;
$view->render('tous_les_evenements_attendus', $vue);

/* fin de l'affichage de la vue */
?>
