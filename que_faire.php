<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$concert = $model['GestionnaireConcert']->getAllConcert();

$participation = filter_input(INPUT_GET, 'nConcert');
if (isset($participation)) {
    if (isset($id)) {
        $model['GestionnaireUtilisateur']->participer($id, $participation);
    }
}

$date= new DateTime();
$date=$date->format('20y-m-d');
$concertCarte = $model['GestionnaireCarte']->getAllSalleConcertByDate($date);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['concert'] = $concert;
$vue['concertCarte'] = $concertCarte;
$view->render('que_faire', $vue);

/* fin de l'affichage de la vue */
?>
