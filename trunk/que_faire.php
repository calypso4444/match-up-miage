<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//on initialise une variable qui permettra d'indiquer si l'utilisateur est connecté, il pourra interagir avec le systeme si oui, si non il sera redirigé  
$estConnecte = '';

//recupere tous les concerts qui se deroulent à partir de la date courante
$concert = $model['GestionnaireConcert']->getAllConcert();

//si un utilisateur essaye participer a un concert, si il est connecte le concert est ajouté a ses participations sinon il est redirigé vers la page d'accueil
$participation = filter_input(INPUT_GET, 'nConcert');
if (isset($participation)) {
    $id = $_SESSION['user']['id'];
    if (!isset($id)) {
        $estConnecte = false;
    } else {
        $estConnecte = true;
        $model['GestionnaireUtilisateur']->participer($id, $participation);
    }
}

//permet l'affichage sur la carte des concerts de la date courante
$date = new DateTime();
$date = $date->format('20y-m-d');
$concertCarte = $model['GestionnaireCarte']->getAllSalleConcertByDate($date);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$vue['concert'] = $concert;
$vue['concertCarte'] = $concertCarte;
$view->render('que_faire', $vue);

/* fin de l'affichage de la vue */
?>
